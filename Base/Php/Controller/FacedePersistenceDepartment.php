<?php

/************************************************************************
Class: FacedePersistenceDepartment
Creation: 19/02/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/Department.php
	
Description: 
			Classe used to access and deal with information of the database about a corporation's department.
Functions: 
			public function DepartmentDelete($CorporationName, $DepartmentName, $Debug, $MySqlConnection);
			public function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug, $MySqlConnection);
			public function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug, $MySqlConnection);
			public function DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, 
			                                                  &$ArrayInstanceDepartment, &$RowCount, $Debug, $MySqlConnection);
			public function DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, 
			                                                         $Debug, $MySqlConnection);
			public function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug, $MySqlConnection);
			public function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
			                                                                   &$DepartmentInstance, $Debug, $MySqlConnection);
			public function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug, $MySqlConnection);
			public function DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName, $DepartmentInitialsNew,
			                                                                     $DepartmentNameNew, $DepartmentNameOld, 
																				 $Debug, $MySqlConnection);
			public function DepartmentUpdateCorporationByCorporationAndDepartment($CorporationNameNew, $CorporationNameOld, 
																				  $DepartmentName, $Debug, $MySqlConnection);
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

class FacedePersistenceDepartment
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
	
	public function DepartmentDelete($CorporationName, $DepartmentName, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentDelete');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentDelete());
			if ($stmt)
			{
				$stmt->bind_param("ss", $CorporationName, $DepartmentName);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_DEPARTMENT_DELETE_FAILED;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_DEPARTMENT_DELETE_FAILED;
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
	
	public function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;		
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentInsert());
			if ($stmt)
			{
				$stmt->bind_param("sss", $CorporationName, $DepartmentInitials, $DepartmentName);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL)
					return Config::SUCCESS;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE;
					else return Config::MYSQL_DEPARTMENT_INSERT_FAILED;
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
	
	public function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $mySqlError = NULL;
		$ArrayInstanceDepartment = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentSelect());
			if($stmt != NULL)
			{
				$stmt->bind_param("ii", $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
																			$row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
						                                                    $row[Config::TABLE_CORPORATION_FIELD_NAME], 
																		    $row["Corporation".Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation,
																			$row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
						                                                    $row[Config::TABLE_DEPARTMENT_FIELD_NAME],
																	        $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceDepartment, $InstanceDepartment);
					}
					if(!empty($ArrayInstanceDepartment))
						return Config::SUCCESS;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_DEPARTMENT_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					$return = Config::MYSQL_DEPARTMENT_SELECT_FAILED;
				}
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
		
	public function DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, 
			                                          &$ArrayInstanceDepartment, &$RowCount, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $mySqlError = NULL;
		$ArrayInstanceDepartment = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelectByCorporationName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentSelectByCorporationName());
			if($stmt != NULL)
			{
				$stmt->bind_param("sii", $CorporationName, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc())
					{
						$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
																		  $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
						                                                  $row[Config::TABLE_CORPORATION_FIELD_NAME], 
											                              $row["Corporation".Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, 
																			$row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
																		    $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
																		    $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceDepartment, $InstanceDepartment);
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_DEPARTMENT_SELECT_BY_CORPORATION_NAME_FAILED;
				}
				if(!empty($ArrayInstanceDepartment))
					return Config::SUCCESS;
				else return Config::MYSQL_DEPARTMENT_SELECT_BY_CORPORATION_NAME_FETCH_FAILED;
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
	
	public function DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceDepartment = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelectByCorporationNameNoLimit');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentSelectByCorporationNameNoLimit());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $CorporationName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc())
					{
						$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
																		  $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
						                                                  $row[Config::TABLE_CORPORATION_FIELD_NAME], 
											                              $row["Corporation".Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, 
																			$row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
																		    $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
																		    $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceDepartment, $InstanceDepartment);
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_DEPARTMENT_SELECT_BY_CORPORATION_NAME_FAILED;
				}
				if(!empty($ArrayInstanceDepartment))
					return Config::SUCCESS;
				else return Config::MYSQL_DEPARTMENT_SELECT_BY_CORPORATION_NAME_FETCH_FAILED;
			}
			if($Debug == Config::CHECKBOX_CHECKED) 
				echo "Prepare Error: " . $MySqlConnection->error;
			return Config::MYSQL_QUERY_PREPARE_FAILED;
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceDepartment = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelectByDepartmentName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentSelectByDepartmentName());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $DepartmentName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
																		   $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
						                                                   $row[Config::TABLE_CORPORATION_FIELD_NAME], 
											                               $row["Corporation".Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation,
																			$row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
						                                                    $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
											                                $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceDepartment, $InstanceDepartment);
					}
					if(!empty($ArrayInstanceDepartment))
						return Config::SUCCESS;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_DEPARTMENT_SELECT_BY_DEPARTMENT_NAME_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					$return = Config::MYSQL_DEPARTMENT_SELECT_BY_DEPARTMENT_NAME_FAILED;
				}
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
																	   &$DepartmentInstance, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $mySqlError = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelectByDepartmentNameAndCorporationName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentSelectByDepartmentNameAndCorporationName());
			if($stmt != NULL)
			{
				$stmt->bind_param("ss", $CorporationName, $DepartmentName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($CorporationName, $depIni, $depName, $depRegDate, $corpActive, $corpName, $corpRegDate);
					if ($stmt->fetch())
					{
						$CorporationInstance = $this->Factory->CreateCorporation(NULL, $corpActive, $corpName, $corpRegDate);
						$DepartmentInstance = $this->Factory->CreateDepartment($CorporationInstance, $depIni, $depName, $depRegDate);
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::MYSQL_DEPARTMENT_SELECT_BY_CORP_DEP_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_DEPARTMENT_SELECT_BY_CORP_DEP_FAILED;
				}
				return $return;
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
	
	public function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $mySqlError = NULL;
		$ArrayInstanceDepartment = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelectNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlDepartmentSelectNoLimit()))
			{
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
						                                                $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
						                                                $row[Config::TABLE_CORPORATION_FIELD_NAME], 
											                            $row["Corporation".Config::TABLE_FIELD_REGISTER_DATE]);
					$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, 
																		$row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
																		$row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
										                                $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
					array_push($ArrayInstanceDepartment, $InstanceDepartment);
				}
				if(!empty($ArrayInstanceDepartment))
					return Config::SUCCESS;
				else return Config::MYSQL_DEPARTMENT_SELECT_FETCH_FAILED;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::MYSQL_DEPARTMENT_SELECT_FAILED;
			}
			return $return;
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName, $DepartmentInitialsNew,
																		 $DepartmentNameNew, $DepartmentNameOld, $Debug,
																		 $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{ 
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentUpdateDepartmentByDepartmentAndCorporation');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentUpdateDepartmentByDepartmentAndCorporation());
			if ($stmt)
			{
				$stmt->bind_param("ssss", $DepartmentInitialsNew, $DepartmentNameNew, $DepartmentNameOld, $CorporationName);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_DEPARTMENT_UPDATE_FAILED;
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
	
	public function DepartmentUpdateCorporationByCorporationAndDepartment($DepartmentName, $CorporationNameNew,
																          $CorporationNameOld, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentUpdateCorporationByCorporationAndDepartment');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentUpdateCorporationByCorporationAndDepartment());
			if ($stmt)
			{
				$stmt->bind_param("sss", $DepartmentName, $CorporationNameNew, $CorporationNameOld);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_DEPARTMENT_UPDATE_CORPORATION_FAILED;
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
}
?>