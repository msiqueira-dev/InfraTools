<?php

/************************************************************************
Class: InfraToolsFacedePersistenceAssocUserServiceInfraTools
Creation: 05/06/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Model/MySqlManager.php
			InfraTools - Php/Controller/Config.php
			InfraTools - Php/Model/InfraToolsPersistence.php
			InfraTools - Php/Model/AssocUserService.php
	
Description: 
			Classe used to access and deal with information of the database about the association with user and a service.
Functions:
			public function AssocUserServiceCheckUserTypeAdministrator($AssocUserServiceServiceId, 
			                                                           $AssocUserServiceUserEmail,
			                                                           $Debug, $MySqlConnection);
			public function AssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceServiceId, 
			                                                                  $Debug,
																			  $MySqlConnection);
			public function AssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceServiceId, 
			                                                                          $AssocUserServiceUserEmail, 
															                          $Debug,
																					  $MySqlConnection);
			public function AssocUserServiceInsert($AssocUserServiceServiceName, $AssocUserServiceUserEmail, 
										           $AssocUserServiceUserType, $Debug, $MySqlConnection);
			public function AssocUserServiceSelectByAssocUserServiceServiceId($Limit1, $Limit2, $AssocUserServiceId, 
			                                                                  &$ArrayInstanceInfraToolAssocUserService, 
											                                  &$RowCount, $Debug,
																			  $MySqlConnection);
			public function AssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
			                                                                  &$ArrayInstanceInfraToolAssocUserService, 
																			  $Debug, $MySqlConnection);
**************************************************************************/

if (!class_exists("ConfigInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class ConfigInfraTools');
}

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Factory');
}

class InfraToolsFacedePersistenceAssocUserService
{	
	/* Instance */
	protected static $Instance;
	protected        $Config            = NULL;
	protected        $MySqlManager      = NULL;
	protected        $InfraToolsFactory = NULL;
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->InfraToolsFactory == NULL)
			$this->InfraToolsFactory = InfraToolsFactory::__create();
		if ($this->Config == NULL)
			$this->Config = $this->InfraToolsFactory->CreateConfig();
		if ($this->MySqlManager == NULL)
		{
			$this->MySqlManager = $this->InfraToolsFactory->CreateMySqlManager($this->Config->DefaultMySqlAddress,
			                                                         $this->Config->DefaultMySqlPort,
																	 $this->Config->DefaultMySqlDataBase,
			                                                         $this->Config->DefaultMySqlUser, 
																	 $this->Config->DefaultMySqlUserPassword);
		}
    }
	
	/* Create */
	public static function __create()
    {
        if (!isset(self::$Instance) || strcmp(get_class(self::$Instance), __CLASS__) != 0) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	
	public function AssocUserServiceCheckUserTypeAdministrator($AssocUserServiceServiceId, $AssocUserServiceUserEmail,
			                                                   $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlAssocUserServiceCheckUserTypeAdministrator');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlAssocUserServiceCheckUserTypeAdministrator());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("is", $AssocUserServiceServiceId, $AssocUserServiceUserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					if ($stmt->fetch())
						return ConfigInfraTools::SUCCESS;
					return ConfigInfraTools::MYSQL_ASSOC_USER_SERVICE_CHECK_USER_TYPE_ADMINISTRATOR_FETCH_FAILED; 
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_ASSOC_USER_SERVICE_CHECK_USER_TYPE_ADMINISTRATOR_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function AssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceServiceId, $Debug, 
																	  $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlAssocUserServiceDeleteByAssocUserServiceServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlAssocUserServiceDeleteByAssocUserServiceServiceId());
			if ($stmt)
			{
				$stmt->bind_param("i", $AssocUserServiceServiceId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_ASSOC_USER_SERVICE_DELETE_BY_ASSOC_USER_SERVICE_ID_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_ASSOC_USER_SERVICE_DELETE_BY_ASSOC_USER_SERVICE_ID_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function AssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceServiceId, 
																			  $AssocUserServiceUserEmail, 
																			  $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail');
		if($MySqlConnection != NULL)
		{
			$stmt = $mySqlConnection->prepare(InfraToolsPersistence::SqlAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail());
			if ($stmt)
			{
				$stmt->bind_param("is", $AssocUserServiceServiceId, $AssocUserServiceUserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_ASSOC_USER_SERVICE_DELETE_BY_ASSOC_USER_SERVICE_ID_AND_USER_EMAIL_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_ASSOC_USER_SERVICE_DELETE_BY_ASSOC_USER_SERVICE_ID_AND_USER_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function AssocUserServiceInsert($AssocUserServiceServiceName, $AssocUserServiceUserEmail, 
										   $AssocUserServiceUserType, $Debug, 
										   $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlAssocUserServiceInsert');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlAssocUserServiceInsert());
			if ($stmt)
			{
				$stmt->bind_param("ssi", $AssocUserServiceServiceName,
								         $AssocUserServiceUserEmail,$AssocUserServiceUserType);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL)
					return Config::SUCCESS;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_ASSOC_USER_SERVICE_INSERT_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function AssocUserServiceSelectByAssocUserServiceServiceId($Limit1, $Limit2, $AssocUserServiceId, 
															          &$ArrayInstanceInfraToolAssocUserService, 
											                          &$RowCount, $Debug, 
																	  $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolAssocUserService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlAssocUserServiceSelectByAssocUserServiceServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $mySqlConnection->prepare(InfraToolsPersistence::SqlAssocUserServiceSelectByAssocUserServiceServiceId());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("iii", $AssocUserServiceId, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsAssocUserService = $this->InfraToolsFactory->CreateInfraToolsAssocUserService(
																	$row[ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID], 
																	$row[ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE], 
																	$row[ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL],
						                                            $row["AssocUserService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolAssocUserService, $InstanceInfraToolsAssocUserService);
					}
					if(!empty($ArrayInstanceInfraToolAssocUserService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_ASSOC_USER_SERVICE_SELECT_BY_ASSOC_USER_SERVICE_ID_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_ASSOC_USER_SERVICE_SELECT_BY_ASSOC_USER_SERVICE_ID_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function AssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
																	         &$ArrayInstanceInfraToolAssocUserService, 
																	         $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolAssocUserService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $mySqlConnection->prepare(InfraToolsPersistence::SqlAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("i", $AssocUserServiceId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsAssocUserService = $this->InfraToolsFactory->CreateInfraToolsAssocUserService(
																	$row[ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID], 
																	$row[ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE], 
																	$row[ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL],
						                                            $row["AssocUserService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolAssocUserService, $InstanceInfraToolsAssocUserService);
					}
					if(!empty($ArrayInstanceInfraToolAssocUserService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
}
?>