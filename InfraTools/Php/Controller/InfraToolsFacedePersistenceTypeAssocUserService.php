<?php

/************************************************************************
Class: InfraToolsFacedePersistenceTypeAssocUserService
Creation: 09/07/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/ConfigInfraTools.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/InfraToolsPersistence.php
			Base       - Php/Model/InfraToolsServiceInformation.php
	
Description: 
			Classe used to access and deal with information of the database about informations of the type of associantions between users and services.
Functions: 
			public function TypeAssocUserServiceSelect(&$ArrayInstanceInfraToolsTypeAssocUserService,&$RowCount,
			                                   $Limit1, $Limit2, $Debug);
			public function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, $Debug);
			public function TypeAssocUserServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeAssocUserService, 
															$UserEmail, 
			                                                $Limit1, $Limit2, $Debug);
			public function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
																   $UserEmail, 
																   $Debug);
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
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsFacedePersistenceTypeAssocUserService
{	
	/* Instance */
	protected static $Instance;
	protected        $InfraToolsConfig  = NULL;
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
		if ($this->InfraToolsConfig == NULL)
			$this->InfraToolsConfig = $this->InfraToolsFactory->CreateConfigInfraTools();
		if ($this->MySqlManager == NULL)
		{
			$this->MySqlManager = $this->InfraToolsFactory->CreateMySqlManager($this->InfraToolsConfig->DefaultMySqlAddress,
			                                                         $this->InfraToolsConfig->DefaultMySqlPort,
																	 $this->InfraToolsConfig->DefaultMySqlDataBase,
			                                                         $this->InfraToolsConfig->DefaultMySqlUser, 
																	 $this->InfraToolsConfig->DefaultMySqlPassword);
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
	
	public function TypeAssocUserServiceSelect(&$ArrayInstanceInfraToolsTypeAssocUserService,&$RowCount,
			                                   $Limit1, $Limit2, $Debug)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeAssocUserService = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('TypeAssocUserServiceSelect');
			$stmt = $mySqlConnection->prepare(InfraToolsPersistence::TypeAssocUserServiceSelect());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("ii", $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsTypeAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeAssocUserService(
						                                   $row["TypeAssocUserService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                   $row[ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION],
						                                   $row[ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID]);
						array_push($ArrayInstanceInfraToolsTypeAssocUserService, $InstanceceInfraToolsTypeService);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceInfraToolsTypeAssocUserService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return ConfigInfraTools::MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, $Debug)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeAssocUserService = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlTypeAssocUserServiceSelectOnUserContextNoLimit');
			$stmt = $mySqlConnection->prepare(InfraToolsPersistence::SqlTypeAssocUserServiceSelectOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsTypeAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceceInfraToolsTypeAssocUserService = $this->InfraToolsFactory->CreateInfraToolsTypeAssocUserService(
						                                            $row["TypeAssocUserService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION],
						                                            $row[ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID]);
						array_push($ArrayInstanceInfraToolsTypeAssocUserService, $InstanceceInfraToolsTypeAssocUserService);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceInfraToolsTypeAssocUserService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return ConfigInfraTools::MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function TypeAssocUserServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeAssocUserService, 
															$UserEmail, 
			                                                $Limit1, $Limit2, $Debug)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeAssocUserService = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlTypeAssocUserServiceSelectOnUserContext');
			$stmt = $mySqlConnection->prepare(InfraToolsPersistence::SqlTypeAssocUserServiceSelectOnUserContext());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("sii", $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsTypeAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeAssocUserService(
						                                   $row["TypeAssocUserService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                   $row[ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION],
						                                   $row[ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID]);
						array_push($ArrayInstanceInfraToolsTypeAssocUserService, $InstanceceInfraToolsTypeService);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceInfraToolsTypeAssocUserService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return ConfigInfraTools::MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
																   $UserEmail, 
																   $Debug)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeAssocUserService = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlTypeAssocUserServiceSelectOnUserContextNoLimit');
			$stmt = $mySqlConnection->prepare(InfraToolsPersistence::SqlTypeAssocUserServiceSelectOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsTypeAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceceInfraToolsTypeAssocUserService = $this->InfraToolsFactory->CreateInfraToolsTypeAssocUserService(
							                                        $row["TypeAssocUserService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION],
						                                            $row[ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID]);
						array_push($ArrayInstanceInfraToolsTypeAssocUserService, $InstanceceInfraToolsTypeAssocUserService);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceInfraToolsTypeAssocUserService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return ConfigInfraTools::MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
}