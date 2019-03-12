<?php

/************************************************************************
Class: InfraToolsFacedePersistenceAssocUserServiceInfraTools
Creation: 2018/06/05
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Model/MySqlManager.php
			InfraTools - Php/Controller/Config.php
			InfraTools - Php/Model/InfraToolsPersistence.php
			InfraTools - Php/Model/AssocUserService.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of association between User and Service
Functions:
			public function InfraToolsAssocUserServiceCheckUserTypeAdministrator($AssocUserServiceServiceId, $AssocUserServiceUserEmail,
			                                                                     $Debug, $MySqlConnection);
			public function InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceServiceId, $Debug,
																			            $MySqlConnection);
			public function InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceServiceId, 
			                                                                          $AssocUserServiceUserEmail, $Debug,
																					  $MySqlConnection);
			public function InfraToolsAssocUserServiceInsert($AssocUserServiceServiceName, $AssocUserServiceUserEmail, 
										                     $AssocUserServiceUserType, $Debug, $MySqlConnection);
			public function InfraToolsAssocUserServiceSelectByAssocUserServiceServiceId($Limit1, $Limit2, $AssocUserServiceId, 
			                                                                            &$ArrayInstanceInfraToolAssocUserService, &$RowCount,
																						$Debug, $MySqlConnection);
			public function InfraToolsAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
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
	
	
	public function InfraToolsAssocUserServiceCheckUserTypeAdministrator($AssocUserServiceServiceId, $AssocUserServiceUserEmail,
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
				if($return == ConfigInfraTools::RET_OK)
				{
					if ($stmt->fetch())
						return ConfigInfraTools::RET_OK;
					return ConfigInfraTools::DB_ERROR_ASSOC_USER_SERVICE_CHECK_USER_TYPE_ADMINISTRATOR_FETCH; 
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_USER_SERVICE_CHECK_USER_TYPE_ADMINISTRATOR;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceServiceId, $Debug, 
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
					return ConfigInfraTools::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_USER_SERVICE_DEL_BY_ASSOC_USER_SERVICE_ID;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return ConfigInfraTools::DB_ERROR_ASSOC_USER_SERVICE_DEL_BY_ASSOC_USER_SERVICE_ID;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceServiceId, $AssocUserServiceUserEmail, 
																			            $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail());
			if ($stmt)
			{
				$stmt->bind_param("is", $AssocUserServiceServiceId, $AssocUserServiceUserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					return ConfigInfraTools::RET_OK;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_USER_SERVICE_DEL_BY_ASSOC_USER_SERVICE_ID_AND_USER_EMAIL;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return ConfigInfraTools::DB_ERROR_ASSOC_USER_SERVICE_DEL_BY_ASSOC_USER_SERVICE_ID_AND_USER_EMAIL;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsAssocUserServiceInsert($AssocUserServiceServiceName, $AssocUserServiceUserEmail, $AssocUserServiceUserType,
													 $Debug, $MySqlConnection)
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
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_USER_SERVICE_INSERT;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsAssocUserServiceSelectByAssocUserServiceServiceId($Limit1, $Limit2, $AssocUserServiceId, 
															                    &$ArrayInstanceInfraToolAssocUserService, 
											                                    &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolAssocUserService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlAssocUserServiceSelectByAssocUserServiceServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlAssocUserServiceSelectByAssocUserServiceServiceId());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("iii", $AssocUserServiceId, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsAssocUserService = $this->InfraToolsFactory->CreateInfraToolsAssocUserService(
																	$row[ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID], 
																	$row[ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE], 
																	$row[ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL],
						                                            $row["AssocUserService".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolAssocUserService, $InstanceInfraToolsAssocUserService);
					}
					if(!empty($ArrayInstanceInfraToolAssocUserService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_ASSOC_USER_SERVICE_SEL_BY_ASSOC_USER_SERVICE_ID_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_USER_SERVICE_SEL_BY_ASSOC_USER_SERVICE_ID;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
																	                   &$ArrayInstanceInfraToolAssocUserService, 
																	                   $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolAssocUserService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("i", $AssocUserServiceId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsAssocUserService = $this->InfraToolsFactory->CreateInfraToolsAssocUserService(
																	$row[ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID], 
																	$row[ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE], 
																	$row[ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL],
						                                            $row["AssocUserService".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolAssocUserService, $InstanceInfraToolsAssocUserService);
					}
					if(!empty($ArrayInstanceInfraToolAssocUserService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
}
?>