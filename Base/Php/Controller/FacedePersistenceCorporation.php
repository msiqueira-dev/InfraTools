<?php

/************************************************************************
Class: FacedePersistenceCorporation
Creation: 23/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/Corporation.php
	
Description: 
			Classe used to access and deal with information of the database about corporation.
Functions: 
			public function CorporationDelete($Name, $Debug);
			public function CorporationInsert($CorporationActive, $Name, $Debug);
			public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug);
			public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug);
			public function CorporationSelectByName($Name, &$CorporationInstance, $Debug);
			public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug);
			public function CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug);
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

if (!class_exists("Corporation"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Corporation.php"))
		include_once(BASE_PATH_PHP_MODEL . "Corporation.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Corporation');
}

if (!class_exists("Persistence"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Persistence.php"))
		include_once(BASE_PATH_PHP_MODEL . "Persistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Persistence');
}

class FacedePersistenceCorporation
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
																	 $this->Config->DefaultMySqlPassword);
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
	
	public function CorporationDelete($Name, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlCorporationDelete() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlCorporationDelete());
			if ($stmt)
			{
				$stmt->bind_param("s", $Name);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_CORPORATION_DELETE_FAILED;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_CORPORATION_DELETE_FAILED;
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
	
	public function CorporationInsert($CorporationActive, $Name, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;		
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlCorporationInsert() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlCorporationInsert());
			if ($stmt)
			{
				$stmt->bind_param("is", $CorporationActive, $Name);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_CORPORATION_INSERT_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug)
	{
		$ArrayInstanceCorporation = array();
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlCorporationSelect() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlCorporationSelect());
			if($stmt != NULL)
			{
				$stmt->bind_param("ii", $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->Factory->CreateCorporation
							                             (NULL, $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
						                                  $row[Config::TABLE_CORPORATION_FIELD_NAME], 
											              $row[Config::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceCorporation, $InstanceCorporation);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceCorporation))
						return Config::SUCCESS;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_CORPORATION_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $mySqlConnection->error;
					$return = Config::MYSQL_CORPORATION_SELECT_FAILED;
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$ArrayInstanceCorporation = array();
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlCorporationSelectActiveNoLimit() . "<br>";
			if($result = $mySqlConnection->query(Persistence::SqlCorporationSelectActiveNoLimit()))
			{
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceCorporation = $this->Factory->CreateCorporation
						                                    (NULL, $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
					                                         $row[Config::TABLE_CORPORATION_FIELD_NAME], 
										                     $row[Config::TABLE_FIELD_REGISTER_DATE]);
					array_push($ArrayInstanceCorporation, $InstanceCorporation);
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				if(!empty($ArrayInstanceCorporation))
					return Config::SUCCESS;
				else return Config::MYSQL_CORPORATION_SELECT_FETCH_FAILED;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::MYSQL_CORPORATION_SELECT_FAILED;
			}
			$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
			return $return;
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function CorporationSelectByName($Name, &$CorporationInstance, $Debug)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlCorporationSelectByName() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlCorporationSelectByName());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $Name);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($corpActive, $Name, $registerDate);
					if ($stmt->fetch())
					{
						$CorporationInstance = $this->Factory->CreateCorporation(NULL, $corpActive, 
																				 $Name, $registerDate);
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::MYSQL_CORPORATION_SELECT_BY_NAME_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_CORPORATION_SELECT_BY_NAME_FAILED;
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$ArrayInstanceCorporation = array();
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlCorporationSelectNoLimit() . "<br>";
			if($result = $mySqlConnection->query(Persistence::SqlCorporationSelectNoLimit()))
			{
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceCorporation = $this->Factory->CreateCorporation(NULL, $row[Config::TABLE_CORPORATION_FIELD_ACTIVE], 
																			 $row[Config::TABLE_CORPORATION_FIELD_NAME], 
										                                     $row[Config::TABLE_FIELD_REGISTER_DATE]);
					array_push($ArrayInstanceCorporation, $InstanceCorporation);
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				if(!empty($ArrayInstanceCorporation))
					return Config::SUCCESS;
				else return Config::MYSQL_CORPORATION_SELECT_FETCH_FAILED;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::MYSQL_CORPORATION_SELECT_FAILED;
			}
			$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
			return $return;
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlCorporationUpdateByName() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlCorporationUpdateByName());
			if ($stmt)
			{
				$stmt->bind_param("iss", $CorporationActive, $NameNew, $NameOld);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_CORPORATION_UPDATE_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
}
?>