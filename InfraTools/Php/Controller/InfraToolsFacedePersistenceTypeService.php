<?php

/************************************************************************
Class: InfraToolsFacedePersistenceTypeService
Creation: 09/07/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/ConfigInfraTools.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/InfraToolsPersistence.php
			Base       - Php/Model/InfraToolsService.php
	
Description: 
			Classe used to access and deal with information of the database about the service type.
Functions: 
			public function TypeServiceSelect($Limit1, $Limit2, &ArrayInstanceInfraToolsTypeService, &$RowCount, 
			                                  $Debug, $MySqlConnection);
	        public function TypeServiceSelectNoLimit(&ArrayInstanceInfraToolsTypeService, $Debug, $MySqlConnection);
			public function TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
			                                               &$ArrayInstanceInfraToolsTypeService, 
			                                               $Debug, $MySqlConnection);
			public function TypeServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, $UserEmail, 
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
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsFacedePersistenceTypeService
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
	
	public function TypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "<b>Query (SqlTypeServiceSelect)</b>  : " . 
				             InfraToolsPersistence::SqlTypeServiceSelect() . "<br>";
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlTypeServiceSelect());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("ii", $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsTypeService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						array_push($ArrayInstanceInfraToolsTypeService, $InstanceceInfraToolsTypeService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FAILED;
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
	
	public function TypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "<b>Query (SqlTypeServiceSelectNoLimit)</b>  : " . 
				             InfraToolsPersistence::SqlTypeServiceSelectNoLimit() . "<br>";
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(InfraToolsPersistence::SqlTypeServiceSelectNoLimit()))
			{
				$ArrayInstanceInfraToolsTypeService = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
																$row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
																$row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
																$row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
					array_push($ArrayInstanceInfraToolsTypeService, $InstanceceInfraToolsTypeService);
				}
				if(!empty($ArrayInstanceInfraToolsTypeService))
					return ConfigInfraTools::SUCCESS;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FETCH_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
												   &$ArrayInstanceInfraToolsTypeService, 
			                                       $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "<b>Query (SqlTypeServiceSelectOnUserContext)</b>  : " . 
				             InfraToolsPersistence::SqlTypeServiceSelectOnUserContext() . "<br>";
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlTypeServiceSelectOnUserContext());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("sii", $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsTypeService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						array_push($ArrayInstanceInfraToolsTypeService, $InstanceceInfraToolsTypeService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FAILED;
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
	
	public function TypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "<b>Query (SqlTypeServiceSelectOnUserContextNoLimit)</b>  : " . 
				             InfraToolsPersistence::SqlTypeServiceSelectOnUserContextNoLimit() . "<br>";
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlTypeServiceSelectOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsTypeService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						array_push($ArrayInstanceInfraToolsTypeService, $InstanceceInfraToolsTypeService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FAILED;
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
}