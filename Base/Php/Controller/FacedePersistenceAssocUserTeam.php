<?php

/************************************************************************
Class: FacedePersistenceAssocUserTeam
Creation: 23/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/AssocUserTeam.php
	
Description: 
			Classe used to access and deal with information of the database about the association with user and a team.
Functions: 
			public function AssocUserTeamDelete($TeamId, $UserEmail, $Debug);
			public function AssocUserTeamInsert($TeamName, $TypeAssocUserTeamDescription, $UserEmail, $Debug);
			
**************************************************************************/

if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Config');
}

if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

class FacedePersistenceAssocUserTeam
{	
	/* Instance */
	protected static $Instance;
	protected        $Config       = NULL;
	protected        $MySqlManager = NULL;
	protected        $Factory      = NULL;
	
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
		if ($this->Config == NULL)
			$this->Config = $this->Factory->CreateConfig();
		if ($this->MySqlManager == NULL)
		{
			$this->MySqlManager = $this->Factory->CreateMySqlManager($this->Config->DefaultMySqlAddress,
			                                                         $this->Config->DefaultMySqlPort,
																	 $this->Config->DefaultMySqlDataBase,
			                                                         $this->Config->DefaultMySqlUser, 
																	 $this->Config->DefaultMySqlUserPassword);
		}
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
	
	public function AssocUserTeamDelete($TeamId, $UserEmail, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($return == Config::RET_OK)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocUserTeamDelete');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocUserTeamDelete());
			if ($stmt)
			{
				$stmt->bind_param("ss", $TeamName, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_ASSOC_USER_TEAM_DEL;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_ASSOC_USER_TEAM_DEL;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function AssocUserTeamInsert($TeamName, $TypeAssocUserTeamDescription, $UserEmail, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($return == Config::RET_OK)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocUserTeamInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocUserTeamInsert());
			if ($stmt)
			{
				$stmt->bind_param("sss", $TeamName, $TypeAssocUserTeamDescription, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL)
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_ASSOC_USER_TEAM_INSERT;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
}
?>