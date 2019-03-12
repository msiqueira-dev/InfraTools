<?php

/************************************************************************
Class: FacedePersistenceCorporation
Creation: 2017/10/23
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Factory.php
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/Corporation.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of Corporation
Functions: 
			public function CorporationDelete($CorporationName, $Debug, $MySqlConnection);
			public function CorporationInsert($CorporationActive, $CorporationName, $Debug, $MySqlConnection);
			public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug, $MySqlConnection);
			public function CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount,
			                                        $Debug, $MySqlConnection);
			public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug, $MySqlConnection);
			public function CorporationSelectByName($CorporationName, &$CorporationInstance, $Debug, $MySqlConnection);
			public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug, $MySqlConnection);
			public function CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug, $MySqlConnection);
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
	
	public function CorporationDelete($CorporationName, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlCorporationDelete');
			$stmt = $MySqlConnection->prepare(Persistence::SqlCorporationDelete());
			if ($stmt)
			{
				$stmt->bind_param("s", $CorporationName);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_CORPORATION_DEL;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_CORPORATION_DEL;
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
	
	public function CorporationInsert($CorporationActive, $CorporationName, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;		
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlCorporationInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlCorporationInsert());
			if ($stmt)
			{
				$stmt->bind_param("is", $CorporationActive, $CorporationName);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL)
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_CORPORATION_INSERT;
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
	
	public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;	
		$ArrayInstanceCorporation = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlCorporationSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlCorporationSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceCorporation = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->Factory->CreateCorporation
							                             (NULL, $row[Config::TB_CORPORATION_FD_ACTIVE],
						                                  $row[Config::TB_CORPORATION_FD_NAME], 
											              $row[Config::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceCorporation, $InstanceCorporation);
					}
					if(!empty($ArrayInstanceCorporation))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_CORPORATION_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					$return = Config::DB_ERROR_CORPORATION_SEL;
				}
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				return Config::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;	
		$ArrayInstanceCorporation = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlCorporationSelectActive');
			$stmt = $MySqlConnection->prepare(Persistence::SqlCorporationSelectActive());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceCorporation = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->Factory->CreateCorporation
							                             (NULL, $row[Config::TB_CORPORATION_FD_ACTIVE],
						                                  $row[Config::TB_CORPORATION_FD_NAME], 
											              $row[Config::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceCorporation, $InstanceCorporation);
					}
					if(!empty($ArrayInstanceCorporation))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_CORPORATION_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					$return = Config::DB_ERROR_CORPORATION_SEL;
				}
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				return Config::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;	
		$ArrayInstanceCorporation = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlCorporationSelectActiveNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlCorporationSelectActiveNoLimit()))
			{
				$ArrayInstanceCorporation = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceCorporation = $this->Factory->CreateCorporation
						                                    (NULL, $row[Config::TB_CORPORATION_FD_ACTIVE],
					                                         $row[Config::TB_CORPORATION_FD_NAME], 
										                     $row[Config::TB_FD_REGISTER_DATE]);
					array_push($ArrayInstanceCorporation, $InstanceCorporation);
				}
				if(!empty($ArrayInstanceCorporation))
					return Config::RET_OK;
				else return Config::DB_ERROR_CORPORATION_SEL_FETCH;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::DB_ERROR_CORPORATION_SEL;
			}
			return $return;
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CorporationSelectByName($CorporationName, &$CorporationInstance, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL; $errorCode = NULL;	
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlCorporationSelectByName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlCorporationSelectByName());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $CorporationName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($corpActive, $CorporationName, $registerDate);
					if ($stmt->fetch())
					{
						$CorporationInstance = $this->Factory->CreateCorporation(NULL, $corpActive, 
																				 $CorporationName, $registerDate);
						return Config::RET_OK;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_CORPORATION_SEL_BY_NAME_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_CORPORATION_SEL_BY_NAME;
				}
				return $return;
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
	
	public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceCorporation = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlCorporationSelectNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlCorporationSelectNoLimit()))
			{
				$ArrayInstanceCorporation = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceCorporation = $this->Factory->CreateCorporation(NULL, $row[Config::TB_CORPORATION_FD_ACTIVE], 
																			 $row[Config::TB_CORPORATION_FD_NAME], 
										                                     $row[Config::TB_FD_REGISTER_DATE]);
					array_push($ArrayInstanceCorporation, $InstanceCorporation);
				}
				if(!empty($ArrayInstanceCorporation))
					return Config::RET_OK;
				else return Config::DB_ERROR_CORPORATION_SEL_FETCH;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::DB_ERROR_CORPORATION_SEL;
			}
			return $return;
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlCorporationUpdateByName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlCorporationUpdateByName());
			if ($stmt)
			{
				$stmt->bind_param("iss", $CorporationActive, $NameNew, $NameOld);
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
					if($errorCode == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE;
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_CORPORATION_UPDT;
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