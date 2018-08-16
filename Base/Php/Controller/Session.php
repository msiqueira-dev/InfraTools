<?php

/************************************************************************
Class: Session.php
Creation: 06/11/2013
Creator: Marcus Siqueira
Dependencies:
			Base/Php/Controller/Config.php
			Base/Php/Controller/SessionHandlerCustom.php
Description: 
			Classe que cuida da Sessão de usuário, capturando valor, 
			atribuindo valor, validando valor, e limpando valor da Sessão.
			Padrões: Singleton.
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
		if($this->GetSessionValue($ActivityKey, $Value) == Config::SUCCESS)
		{
			if($Value != $UnlimitedSession)
			{
				if (time() - $Value > $SessionTime)
				{
					if($this->GetSessionValue($UserKey, $Value))
					{
						session_unset();
						session_destroy();
						return Config::WARNING;
					}
					session_unset();
					session_destroy();
				}
				$this->SetSessionValue($ActivityKey, time());
			}
		}
		else $this->SetSessionValue($ActivityKey, time());
		return Config::SUCCESS;
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
				return Config::SUCCESS;
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
	
	public function RemoveSessionVariable($Key)
	{
		if(isset($Key))
		{
			if(is_string($Key) || is_int($Key))
			{
				if(array_key_exists($Key, $_SESSION))
				{
					unset($_SESSION[$Key]);
					return Config::SUCCESS;
				} else return Config::ERROR;
			} else return Config::ERROR;
		} else return Config::ERROR;
	}
	
	public function GetSessionValue($Key, &$Value)
	{
		if($Key != NULL)
		{
			if (isset($_SESSION[$Key]))
			{
				$Value = $_SESSION[$Key];
				return Config::SUCCESS;
			}
			else return self::ERROR_EMPTY_SESSION_VALUE_FOR_PARAMETER;
		}
		else return self::ERROR_EMPTY_PARAMETER_VARIABLE;
	}
	
	public function SetSessionValue($Key, $Value)
	{
		if ($Key != NULL)
		{
			if(isset($Value))
			{
				$_SESSION[$Key] = $Value;
				return Config::SUCCESS;
			}
			else return self::ERROR_EMPTY_PARAMETER_VALUE;
		}
		else return self::ERROR_EMPTY_PARAMETER_VARIABLE;
	}
}

?>