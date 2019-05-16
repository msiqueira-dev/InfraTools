<?php

/************************************************************************
Class: FacedePersistenceDepartment
Creation: 2018/02/19
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Factory.php
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/Department.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of Department
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
	
	public function DepartmentDelete($CorporationName, $DepartmentName, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
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
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_DEPARTMENT_DEL;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_DEPARTMENT_DEL;
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
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE;
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_INSERT_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_INSERT_RESTRICT;
					else return Config::DB_ERROR_DEPARTMENT_INSERT;
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
	
	public function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $mySqlError = NULL;
		$ArrayInstanceDepartment = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceDepartment = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
																			$row[Config::TB_CORPORATION_FD_ACTIVE],
						                                                    $row[Config::TB_CORPORATION_FD_NAME], 
																		    $row["Corporation".Config::TB_FD_REGISTER_DATE]);
						$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation,
																			$row[Config::TB_DEPARTMENT_FD_INITIALS],
						                                                    $row[Config::TB_DEPARTMENT_FD_NAME],
																	        $row["Department".Config::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceDepartment, $InstanceDepartment);
					}
					if(!empty($ArrayInstanceDepartment))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_DEPARTMENT_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					$return = Config::DB_ERROR_DEPARTMENT_SEL;
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
		
	public function DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, 
			                                          &$ArrayInstanceDepartment, &$RowCount, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $mySqlError = NULL;
		$ArrayInstanceDepartment = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelectByCorporationName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentSelectByCorporationName());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $CorporationName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceDepartment = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc())
					{
						$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
																		  $row[Config::TB_CORPORATION_FD_ACTIVE],
						                                                  $row[Config::TB_CORPORATION_FD_NAME], 
											                              $row["Corporation".Config::TB_FD_REGISTER_DATE]);
						$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, 
																			$row[Config::TB_DEPARTMENT_FD_INITIALS],
																		    $row[Config::TB_DEPARTMENT_FD_NAME], 
																		    $row["Department".Config::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceDepartment, $InstanceDepartment);
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_DEPARTMENT_SEL_BY_CORPORATION_NAME;
				}
				if(!empty($ArrayInstanceDepartment))
					return Config::RET_OK;
				else return Config::DB_ERROR_DEPARTMENT_SEL_BY_CORPORATION_NAME_FETCH;
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
	
	public function DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceDepartment = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelectByCorporationNameNoLimit');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentSelectByCorporationNameNoLimit());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $CorporationName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceDepartment = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc())
					{
						$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
																		  $row[Config::TB_CORPORATION_FD_ACTIVE],
						                                                  $row[Config::TB_CORPORATION_FD_NAME], 
											                              $row["Corporation".Config::TB_FD_REGISTER_DATE]);
						$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, 
																			$row[Config::TB_DEPARTMENT_FD_INITIALS],
																		    $row[Config::TB_DEPARTMENT_FD_NAME], 
																		    $row["Department".Config::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceDepartment, $InstanceDepartment);
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_DEPARTMENT_SEL_BY_CORPORATION_NAME;
				}
				if(!empty($ArrayInstanceDepartment))
					return Config::RET_OK;
				else return Config::DB_ERROR_DEPARTMENT_SEL_BY_CORPORATION_NAME_FETCH;
			}
			if($Debug == Config::CHECKBOX_CHECKED) 
				echo "Prepare Error: " . $MySqlConnection->error;
			return Config::DB_ERROR_QUERY_PREPARE;
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceDepartment = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelectByDepartmentName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlDepartmentSelectByDepartmentName());
			if($stmt != NULL)
			{
				$DepartmentName = "%".$DepartmentName."%"; 
				$stmt->bind_param("s", $DepartmentName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceDepartment = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
																		   $row[Config::TB_CORPORATION_FD_ACTIVE],
						                                                   $row[Config::TB_CORPORATION_FD_NAME], 
											                               $row["Corporation".Config::TB_FD_REGISTER_DATE]);
						$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation,
																			$row[Config::TB_DEPARTMENT_FD_INITIALS],
						                                                    $row[Config::TB_DEPARTMENT_FD_NAME], 
											                                $row["Department".Config::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceDepartment, $InstanceDepartment);
					}
					if(!empty($ArrayInstanceDepartment))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_DEPARTMENT_SEL_BY_DEPARTMENT_NAME_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					$return = Config::DB_ERROR_DEPARTMENT_SEL_BY_DEPARTMENT_NAME;
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
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($CorporationName, $depIni, $depName, $depRegDate, $corpActive, $corpName, $corpRegDate);
					if ($stmt->fetch())
					{
						$CorporationInstance = $this->Factory->CreateCorporation(NULL, $corpActive, $corpName, $corpRegDate);
						$DepartmentInstance = $this->Factory->CreateDepartment($CorporationInstance, $depIni, $depName, $depRegDate);
						return Config::RET_OK;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_DEPARTMENT_SEL_BY_CORP_DEP_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_DEPARTMENT_SEL_BY_CORP_DEP;
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
	
	public function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $mySqlError = NULL;
		$ArrayInstanceDepartment = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlDepartmentSelectNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlDepartmentSelectNoLimit()))
			{
				$ArrayInstanceDepartment = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceCorporation = $this->Factory->CreateCorporation(NULL,
						                                                $row[Config::TB_CORPORATION_FD_ACTIVE],
						                                                $row[Config::TB_CORPORATION_FD_NAME], 
											                            $row["Corporation".Config::TB_FD_REGISTER_DATE]);
					$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, 
																		$row[Config::TB_DEPARTMENT_FD_INITIALS],
																		$row[Config::TB_DEPARTMENT_FD_NAME], 
										                                $row["Department".Config::TB_FD_REGISTER_DATE]);
					array_push($ArrayInstanceDepartment, $InstanceDepartment);
				}
				if(!empty($ArrayInstanceDepartment))
					return Config::RET_OK;
				else return Config::DB_ERROR_DEPARTMENT_SEL_FETCH;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::DB_ERROR_DEPARTMENT_SEL;
			}
			return $return;
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
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
					return Config::RET_OK;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_UPDT_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_DEPARTMENT_UPDT;
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
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_UPDT_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_DEPARTMENT_UPDT_CORPORATION;
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