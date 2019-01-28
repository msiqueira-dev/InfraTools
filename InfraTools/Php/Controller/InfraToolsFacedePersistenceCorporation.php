<?php

/************************************************************************
Class: InfraToolsFacedePersistenceCorporation
Creation: 26/06/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/InfraToolsPersistence.php
			Base       - Php/Model/InfraToolsCorporation.php
	
Description: 
			Classe used to access and deal with information of the database about group user.
Functions: 
			public function InfraToolsCorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, 
			                                            $Debug, $MySqlConnection);
			public function InfraToolsCorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, 
			                                                         $Debug, $MySqlConnection);
			public function InfraToolsCorporationSelectByName($CorporationName, &$CorporationInstance, 
			                                                  $Debug, $MySqlConnection);
			public function InfraTools(&$ArrayInstanceCorporation, $Debug, $MySqlConnection);
			public function InfraToolsCorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail, 
			                                                                &$ArrayInstanceInfraToolsCorporation, 
																            &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsCorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, 
			                                                                        $Debug, $MySqlConnection);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsFacedePersistenceCorporation
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
	
	public function InfraToolsCorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlCorporationSelect');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(Persistence::SqlCorporationSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceCorporation = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation
							                             (NULL, $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                  $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME], 
											              $row[ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceCorporation, $InstanceCorporation);
					}
					if(!empty($ArrayInstanceCorporation))
						return ConfigInfraTools::SUCCESS;
					else 
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_CORPORATION_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					$return = ConfigInfraTools::MYSQL_CORPORATION_SELECT_FAILED;
				}
				return $return;
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function InfraToolsCorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceCorporation = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlCorporationSelectActiveNoLimit');
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(Persistence::SqlCorporationSelectActiveNoLimit()))
			{
				$ArrayInstanceCorporation = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation
						                                    (NULL, $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
					                                         $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME], 
										                     $row[ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
					array_push($ArrayInstanceCorporation, $InstanceCorporation);
				}
				if(!empty($ArrayInstanceCorporation))
					return ConfigInfraTools::SUCCESS;
				else return ConfigInfraTools::MYSQL_CORPORATION_SELECT_FETCH_FAILED;
			}
			else 
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = ConfigInfraTools::MYSQL_CORPORATION_SELECT_FAILED;
			}
			return $return;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function InfraToolsCorporationSelectByName($CorporationName, &$CorporationInstance, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlCorporationSelectByName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(Persistence::SqlCorporationSelectByName());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $CorporationName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$stmt->bind_result($corpActive, $CorporationName, $registerDate);
					if ($stmt->fetch())
					{
						$CorporationInstance = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL, $corpActive, 
																						             $CorporationName, $registerDate);
						return ConfigInfraTools::SUCCESS;
					}
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = ConfigInfraTools::MYSQL_CORPORATION_SELECT_BY_NAME_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = ConfigInfraTools::MYSQL_CORPORATION_SELECT_BY_NAME_FAILED;
				}
				return $return;
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function InfraTools(&$ArrayInstanceCorporation, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceCorporation = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlCorporationSelectNoLimit');
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(Persistence::SqlCorporationSelectNoLimit()))
			{
				$ArrayInstanceCorporation = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation
						                                                      (NULL,
																			   $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
																			   $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME], 
										                                       $row[ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
					array_push($ArrayInstanceCorporation, $InstanceCorporation);
				}
				if(!empty($ArrayInstanceCorporation))
					return ConfigInfraTools::SUCCESS;
				else return ConfigInfraTools::MYSQL_CORPORATION_SELECT_FETCH_FAILED;
			}
			else 
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = ConfigInfraTools::MYSQL_CORPORATION_SELECT_FAILED;
			}
			return $return;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function InfraToolsCorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail, 
			                                                        &$ArrayInstanceInfraToolsCorporation, 
														            &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsCorporation = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlCorporationSelectOnUserServiceContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlCorporationSelectOnUserServiceContext());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsCorporation = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporationCreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsCorporation, $InstanceceInfraToolsCorporation);
					}
					if(!empty($ArrayInstanceInfraToolsCorporation))
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
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function InfraToolsCorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, 
																           $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsCorporation = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlCorporationSelectOnUserServiceContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlCorporationSelectOnUserServiceContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsCorporation = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsCorporation, $InstanceceInfraToolsCorporation);
					}
					if(!empty($ArrayInstanceInfraToolsCorporation))
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
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
}