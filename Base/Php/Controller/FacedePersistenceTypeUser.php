<?php

/************************************************************************
Class: FacedePersistenceTypeUser
Creation: 23/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/TypeUser.php
	
Description: 
			Classe used to access and deal with information of the database about type user.
Functions: 
			public function TypeUserDelete($Id, $Debug);
			public function TypeUserInsert($Description, $Debug);
			public function TypeUserSelect($Limit1, $Limit2, &ArrayInstanceTypeUser, &$RowCount, $Debug);
			public function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug)
			public function TypeUserSelectByDescription($Description, &$TypeUser, $Debug);
			public function TypeUserSelectById($Id, &$TypeUser, $Debug);
			public function TypeUserUpdateById($Id, $Description, $Debug);
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

if (!class_exists("Persistence"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Persistence.php"))
		include_once(BASE_PATH_PHP_MODEL . "Persistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Persistence');
}

if (!class_exists("TypeUser"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "TypeUser.php"))
		include_once(BASE_PATH_PHP_MODEL . "TypeUser.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeUser');
}

class FacedePersistenceTypeUser
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
	
	public function TypeUserDelete($Id, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeUserDelete() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeUserDelete());
			if ($stmt)
			{
				$stmt->bind_param("i", $Id);
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
					return Config::MYSQL_TYPE_USER_DELETE_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_TYPE_USER_DELETE_FAILED;
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
	
	public function TypeUserInsert($Description, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeUserInsert() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeUserInsert());
			if ($stmt)
			{
				$stmt->bind_param("s", $Description);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
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
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug)
	{
		$ArrayInstanceTypeUser = array();
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeUserSelect() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeUserSelect());
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
						$InstanceTypeUser = $this->Factory->CreateTypeUser
							                            ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION], 
						                                 $row[Config::TABLE_TYPE_USER_FIELD_ID], 
														 $row[Config::TABLE_FIELD_REGISTER_DATE]);	
						array_push($ArrayInstanceTypeUser, $InstanceTypeUser);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceTypeUser))
						return Config::SUCCESS;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_TYPE_USER_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_TYPE_USER_SELECT_FAILED;
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
	
	public function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug)
	{
		$ArrayInstanceTypeUser = array();
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeUserSelectNoLimit() . "<br>";
			if($result = $mySqlConnection->query(Persistence::SqlTypeUserSelectNoLimit()))
			{
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceTypeUser = $this->Factory->CreateTypeUser($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION], 
																	   $row[Config::TABLE_TYPE_USER_FIELD_ID], 
										                               $row[Config::TABLE_FIELD_REGISTER_DATE]);
					array_push($ArrayInstanceTypeUser, $InstanceTypeUser);
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				if(!empty($ArrayInstanceTypeUser))
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
	
	public function TypeUserSelectByDescription($Description, &$TypeUser, $Debug)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeUserSelectByDescription() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeUserSelectByDescription());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $Description);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($Description, $id, $registerDate);
					if ($stmt->fetch())
					{
						$TypeUser = $this->Factory->CreateTypeUser($Description, $id, $registerDate);
						return Config::SUCCESS;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::MYSQL_TYPE_USER_SELECT_BY_DESCRIPTION_FETCH_FAILED;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_TYPE_USER_SELECT_BY_DESCRIPTION_FAILED;
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
	
	public function TypeUserSelectById($Id, &$TypeUser, $Debug)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeUserSelectById() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeUserSelectById());
			if($stmt != NULL)
			{
				$stmt->bind_param("i", $Id);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($descritpion, $Id, $registerDate);
					if ($stmt->fetch())
					{
						$TypeUser = $this->Factory->CreateTypeUser($descritpion, $Id, $registerDate);
						return Config::SUCCESS;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::MYSQL_TYPE_USER_SELECT_BY_ID_FETCH_FAILED;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_TYPE_USER_SELECT_BY_ID_FAILED;
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
	
	public function TypeUserUpdateById($Id, $Description, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeUserUpdateById() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeUserUpdateById());
			if ($stmt)
			{
				$stmt->bind_param("si", $Description, $Id);
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
					return Config::MYSQL_TYPE_USER_UPDATE_FAILED;
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