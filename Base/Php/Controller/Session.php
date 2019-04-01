<?php

/************************************************************************
Class: Session.php
Creation: 2013/11/06
Creator: Marcus Siqueira
Dependencies:
			Base/Php/Controller/Config.php
			Base/Php/Controller/SessionHandlerCustom.php
Description: 
			Class with Singleton pattern for Session
Functions: 
			public function CheckActivity($ActivityKey, $UserKey, $SessionTime, $UnlimitedSession);
			public function CreateBasic($Application, $SessionTime);
			public function CreatePersonalized($Application, $Id, $SessionTime);
			public function DestroyCustomSession();
			public function GetSessionValue($Key, &$Value);
			public function RemoveSessionVariable($Key);
			public function SetSessionValue($Key, $Value);
**************************************************************************/
if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

class Session
{
	/* Constantes de Retorno */
	const ERROR_EMPTY_PARAMETER_VARIABLE          = "ReturnErrorEmptyParameterVariable";
	const ERROR_EMPTY_PARAMETER_VALUE             = "ReturnErrorEmptyParameterValue";
	const ERROR_EMPTY_SESSION_VALUE_FOR_PARAMETER = "ReturnErrorEmptySessionValueForParameter";
	
	/* Instaces */
	private static $Instance;
	private        $Factory = NULL;
	private        $InstanceSessionHandlerCustom;
	
	/**                               **/
	/************* METODOS *************/
	/**                               **/
	
	/* Clone */
	protected function __clone()
    {
        exit(get_class($this) . ": Error! Clone Not Allowed!");
    }
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
    }
	
	/* Singleton */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	public function CheckActivity($ActivityKey, $UserKey, $SessionTime, $UnlimitedSession)
	{
		if($this->GetSessionValue($ActivityKey, $Value) == Config::RET_OK)
		{
			if($Value != $UnlimitedSession)
			{
				if (time() - $Value > $SessionTime)
				{
					if($this->GetSessionValue($UserKey, $Value))
					{
						session_unset();
						session_destroy();
						return Config::RET_WARNING;
					}
					session_unset();
					session_destroy();
				}
				$this->SetSessionValue($ActivityKey, time());
			}
		}
		else $this->SetSessionValue($ActivityKey, time());
		return Config::RET_OK;
	}
	
	public function CreateBasic($Application, $SessionTime)
	{
		$this->InstanceSessionHandlerCustom = $this->Factory->CreateSessionHandlerCustom();
		session_set_save_handler($this->InstanceSessionHandlerCustom, true);
		ini_set("session.gc_maxlifetime", $SessionTime);
		session_name($Application);
		session_save_path(SESSION_PATH . $Application);
		session_start();
	}
	
	public function CreatePersonalized($Application, $Id, $SessionTime)
	{
		$this->InstanceSessionHandlerCustom = $this->Factory->CreateSessionHandlerCustom();
		if($Id != NULL)
		{
			$Id = preg_replace('/[^A-Za-z0-9\-]/', '', $Id);
			$oldId = session_id();
			session_commit();
			session_unset();
			if(session_status() == PHP_SESSION_ACTIVE)
				session_destroy();
			if(unlink(SESSION_PATH . $Application . "/sess_" . $oldId))
			{
				session_set_save_handler($this->InstanceSessionHandlerCustom, true);
				ini_set("session.gc_maxlifetime", $SessionTime);
				session_name($Application);
				session_id($Id);
				session_start();
				return Config::RET_OK;
			}
		}		
	}
	
	public function DestroyCustomSession()
	{
		session_unset();
		session_destroy();
		session_id(md5(uniqid(rand(), true)));
		session_start();
	}
	
	public function GetSessionValue($Key, &$Value)
	{
		if($Key != NULL)
		{
			if (isset($_SESSION[$Key]))
			{
				$Value = $_SESSION[$Key];
				return Config::RET_OK;
			}
			else return self::ERROR_EMPTY_SESSION_VALUE_FOR_PARAMETER;
		}
		else return self::ERROR_EMPTY_PARAMETER_VARIABLE;
	}
	
	public function RemoveSessionVariable($Key)
	{
		if(isset($Key))
		{
			if(is_string($Key) || is_int($Key))
			{
				if(array_key_exists($Key, $_SESSION))
				{
					unset($_SESSION[$Key]);
					return Config::RET_OK;
				} else return Config::RET_ERROR;
			} else return Config::RET_ERROR;
		} else return Config::RET_ERROR;
	}
	
	public function SetSessionValue($Key, $Value)
	{
		if ($Key != NULL)
		{
			if(isset($Value))
			{
				$_SESSION[$Key] = $Value;
				return Config::RET_OK;
			}
			else return self::ERROR_EMPTY_PARAMETER_VALUE;
		}
		else return self::ERROR_EMPTY_PARAMETER_VARIABLE;
	}
	
	public function SessionFileGetValueByHashCode(&$Value, $Application, $SessionId, $Key)
	{
		$Value = NULL;
		if(isset($Application) && !empty($Application) && isset($SessionId) && !empty($SessionId) && isset($Key) && !empty($Key))
		{
			$file = SESSION_PATH . $Application . "/sess_" . $SessionId;
			if(file_exists(($file)))
			{
				$str = $this->InstanceSessionHandlerCustom->read($SessionId);
				$start = strpos($str, $Key);
				$end=$start;
				while($str[$end] != '"')
				{
					$Value .= $str[$end];
					$end++;
				}
				$Value .= '"';
				$end++;
				while($str[$end] != '"')
				{
					$Value .= $str[$end];
					$end++;
				}
				$Value .= '"';
				if($Value != NULL)
					return Config::RET_OK;
			}
		}
		return Config::RET_ERROR;
	}
	
	public function SessionFileUpdateValueByHashCode($Application, $SessionId, $OldValue, $NewValue)
	{
		if(isset($Application) && !empty($Application) && isset($SessionId) && !empty($SessionId) 
		                       && isset($OldValue) && !empty($OldValue) && isset($NewValue) && !empty($NewValue))
		{
			$file = SESSION_PATH . $Application . "/sess_" . $SessionId;
			if(file_exists(($file)))
			{
				$str = $this->InstanceSessionHandlerCustom->read($SessionId);
				$str = str_replace($OldValue, $NewValue, $str, $count);
				if($count > 0)
				{
					$str = $this->InstanceSessionHandlerCustom->destroy($SessionId);
					$this->CreatePersonalized($Application, $SessionId, 3600);
					//$handle = fopen($file, 'w');
					//fwrite($handle, $str);
					//fclose($handle);
				}
			}
		}
		return Config::RET_ERROR;
	}
}

?>