<?php

/************************************************************************
Class: InfraToolsFacedePersistenceTypeAssocUserService
Creation: 2018/07/09
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/ConfigInfraTools.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/InfraToolsPersistence.php
			Base       - Php/Model/InfraToolsServiceInformation.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of a type of assocition between InfraTools User and InfraTools Service
Functions: 
			public function InfraToolsTypeAssocUserServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService,&$RowCount,
			                                                     $Debug, $MySqlConnection);
			public function InfraToolsTypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, $Debug,
			                                                            $MySqlConnection);
			public function InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService, 
															                  $UserEmail, $Debug, $MySqlConnection);
			public function InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
																                     $UserEmail, $Debug, $MySqlConnection);
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
																	 $this->InfraToolsConfig->DefaultMySqlUserPassword);
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
	
	public function InfraToolsTypeAssocUserServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService,&$RowCount,
			                                             $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeAssocUserService = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQuery('TypeAssocUserServiceSelect');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::TypeAssocUserServiceSelect());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsTypeAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeAssocUserService(
						                                   $row["TypeAssocUserService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                   $row[ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION],
						                                   $row[ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID]);
						array_push($ArrayInstanceInfraToolsTypeAssocUserService, $InstanceInfraToolsTypeService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeAssocUserService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL;
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
	
	public function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, $Debug)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeAssocUserService = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQuery('SqlTypeAssocUserServiceSelectOnUserContextNoLimit');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlTypeAssocUserServiceSelectOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsTypeAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceceInfraToolsTypeAssocUserService = $this->InfraToolsFactory->CreateInfraToolsTypeAssocUserService(
						                                            $row["TypeAssocUserService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION],
						                                            $row[ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID]);
						array_push($ArrayInstanceInfraToolsTypeAssocUserService, $InstanceceInfraToolsTypeAssocUserService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeAssocUserService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL;
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
	
	public function InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService, 
															$UserEmail, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeAssocUserService = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQuery('SqlTypeAssocUserServiceSelectOnUserContext');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlTypeAssocUserServiceSelectOnUserContext());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsTypeAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeAssocUserService(
						                                   $row["TypeAssocUserService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                   $row[ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION],
						                                   $row[ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID]);
						array_push($ArrayInstanceInfraToolsTypeAssocUserService, $InstanceInfraToolsTypeService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeAssocUserService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL;
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
	
	public function InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
																   $UserEmail, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeAssocUserService = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQuery('SqlTypeAssocUserServiceSelectOnUserContextNoLimit');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlTypeAssocUserServiceSelectOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsTypeAssocUserService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceceInfraToolsTypeAssocUserService = $this->InfraToolsFactory->CreateInfraToolsTypeAssocUserService(
							                                        $row["TypeAssocUserService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION],
						                                            $row[ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID]);
						array_push($ArrayInstanceInfraToolsTypeAssocUserService, $InstanceceInfraToolsTypeAssocUserService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeAssocUserService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL;
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