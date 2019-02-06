<?php

/************************************************************************
Class: FacedePersistenceAssocUserCorporation
Creation: 23/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/AssocUserCorporation.php
	
Description: 
			Classe used to access and deal with information of the database about the association with user and a corporation.
Functions: 
			public function AssocUserCorporationDelete($CorporationName, $UserEmail, $Debug, $MySqlConnection);
			public function AssocUserCorporationInsert($CorporationName, $RegistrationDate, $RegistrationId, 
			                                           $UserEmail, $Debug, $MySqlConnection);
			public function AssocUserCorporationUpdateByUserEmailAndCorporationName($AssocUserCorporationDepartmentNameNew,
			                                                                        $AssocUserCorporationRegistrationDateNew, 
			                                                                        $AssocUserCorporationRegistrationIdNew, 
																					$CorporationName, $UserEmail, $Debug, $MySqlConnection);
**************************************************************************/

if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

if (!class_exists("Persistence"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Persistence.php"))
		include_once(BASE_PATH_PHP_MODEL . "Persistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Persistence');
}

class FacedePersistenceAssocUserCorporation
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
	
	public function AssocUserCorporationDelete($CorporationName, $UserEmail, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocUserCorporationDelete');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocUserCorporationDelete());
			if ($stmt)
			{
				$stmt->bind_param("ss", $CorporationName, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_ASSOC_USER_CORPORATION_DEL;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_ASSOC_USER_CORPORATION_DEL;
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
	
	public function AssocUserCorporationInsert($CorporationName, $RegistrationDate, $RegistrationId, $UserEmail, 
											   $Debug, $MySqlConnection)
	{
		$errorCode = NULL; $errorStr = NULL; $mySqlError = NULL; $queryResult = NULL;		
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocUserCorporationInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocUserCorporationInsert());
			if ($stmt)
			{
				$stmt->bind_param("ssss", $CorporationName, $RegistrationDate, $RegistrationId, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL)
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_ASSOC_USER_CORPORATION_INSERT;
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
	
	public function AssocUserCorporationUpdateByUserEmailAndCorporationName($AssocUserCorporationDepartmentNameNew,
		                                                                    $AssocUserCorporationRegistrationDateNew, 
																			$AssocUserCorporationRegistrationIdNew, 
																			$CorporationName, $UserEmail, $Debug, $MySqlConnection)
	{
		$errorCode = NULL; $errorStr = NULL; $mySqlError = NULL; $queryResult = NULL;		
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocUserCorporationUpdateByUserEmailAndCorporationName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocUserCorporationUpdateByUserEmailAndCorporationName());
			if ($stmt)
			{
				$stmt->bind_param("sssss", $AssocUserCorporationDepartmentNameNew, $AssocUserCorporationRegistrationDateNew, 
								           $AssocUserCorporationRegistrationIdNew, $CorporationName, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_UPDT_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_UPDT_ASSOC_USER_CORPORATION_BY_USER_EMAIL;
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