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
			public function InfraToolsTypeServiceSelect($Limit1, $Limit2, &ArrayInstanceInfraToolsTypeService, &$RowCount, 
			                                            $Debug, $MySqlConnection);
	        public function InfraToolsTypeServiceSelectNoLimit(&ArrayInstanceInfraToolsTypeService, $Debug, $MySqlConnection);
			public function InfraToolsTypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
			                                                         &$ArrayInstanceInfraToolsTypeService, 
			                                                         $Debug, $MySqlConnection);
			public function InfraToolsTypeServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, $UserEmail, 
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
	
	public function InfraToolsTypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsTypeServiceSelect');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsTypeServiceSelect());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsTypeService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						array_push($ArrayInstanceInfraToolsTypeService, $InstanceInfraToolsTypeService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL;
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
	
	public function InfraToolsTypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsTypeServiceSelectNoLimit');
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(InfraToolsPersistence::SqlInfraToolsTypeServiceSelectNoLimit()))
			{
				$ArrayInstanceInfraToolsTypeService = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
																$row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
																$row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
																$row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
					array_push($ArrayInstanceInfraToolsTypeService, $InstanceInfraToolsTypeService);
				}
				if(!empty($ArrayInstanceInfraToolsTypeService))
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL_FETCH;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsTypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,&$ArrayInstanceInfraToolsTypeService, 
			                                                 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsTypeServiceSelectOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsTypeServiceSelectOnUserContext());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsTypeService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						array_push($ArrayInstanceInfraToolsTypeService, $InstanceInfraToolsTypeService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL;
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
	
	public function InfraToolsTypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsTypeService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsTypeServiceSelectOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsTypeServiceSelectOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsTypeService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						array_push($ArrayInstanceInfraToolsTypeService, $InstanceInfraToolsTypeService);
					}
					if(!empty($ArrayInstanceInfraToolsTypeService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL;
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