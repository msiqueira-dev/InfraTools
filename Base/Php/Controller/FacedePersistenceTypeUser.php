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
			public function TypeUserDeleteByTypeUserDescription($TypeUserDescription, $Debug, $MySqlConnection);
			public function TypeUserInsert($TypeUserDescription, $Debug, $MySqlConnection);
			public function TypeUserSelect($Limit1, $Limit2, &ArrayInstanceTypeUser, &$RowCount, $Debug, $MySqlConnection);
			public function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug, $MySqlConnection);
			public function TypeUserSelectByTypeUserDescription($TypeUserDescription, &$InstanceTypeUser, $Debug, $MySqlConnection);
			public function TypeUserSelectByTypeUserDescriptionLike($TypeUserDescription, &$ArrayInstanceTypeUser, $Debug, $MySqlConnection);
			public function TypeUserUpdateByTypeUserDescription($TypeUserDescriptionNew, $TypeUserDescription, $Debug, $MySqlConnection);
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
	
	public function TypeUserDeleteByTypeUserDescription($TypeUserDescription, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeUserDeleteByTypeUserDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeUserDeleteByTypeUserDescription());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeUserDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_TYPE_USER_DEL;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_TYPE_USER_DEL;
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
	
	public function TypeUserInsert($TypeUserDescription, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeUserInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeUserInsert());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeUserDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_TYPE_USER_INSERT;
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
	
	public function TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceTypeUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeUserSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeUserSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceTypeUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceTypeUser = $this->Factory->CreateTypeUser
							                            ($row[Config::TB_TYPE_USER_FD_DESCRIPTION], 
														 $row[Config::TB_FD_REGISTER_DATE]);	
						array_push($ArrayInstanceTypeUser, $InstanceTypeUser);
					}
					if(!empty($ArrayInstanceTypeUser))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_TYPE_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_TYPE_USER_SEL;
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
	
	public function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceTypeUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeUserSelectNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlTypeUserSelectNoLimit()))
			{
				$ArrayInstanceTypeUser = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceTypeUser = $this->Factory->CreateTypeUser($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
										                               $row[Config::TB_FD_REGISTER_DATE]);
					array_push($ArrayInstanceTypeUser, $InstanceTypeUser);
				}
				if(!empty($ArrayInstanceTypeUser))
					return Config::RET_OK;
				else return Config::DB_ERROR_TYPE_USER_SEL_FETCH;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::DB_ERROR_TYPE_USER_SEL;
			}
			return $return;
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function TypeUserSelectByTypeUserDescription($TypeUserDescription, &$InstanceTypeUser, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeUserSelectByDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeUserSelectByDescription());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $TypeUserDescription);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($TypeUserDescription, $registerDate);
					if ($stmt->fetch())
					{
						$InstanceTypeUser = $this->Factory->CreateTypeUser($TypeUserDescription, $registerDate);
						return Config::RET_OK;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_TYPE_USER_SEL_BY_DESCRIPTION_FETCH;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_TYPE_USER_SEL_BY_DESCRIPTION;
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
	
	public function TypeUserSelectByTypeUserDescriptionLike($TypeUserDescription, &$ArrayInstanceTypeUser, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceTypeUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeUserSelectByDescriptionLike');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeUserSelectByDescriptionLike());
			if($stmt != NULL)
			{
				$TypeUserDescription = "%".$TypeUserDescription."%"; 
				$stmt->bind_param("s", $TypeUserDescription);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceTypeUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc())  
					{
						$InstanceTypeUser = $this->Factory->CreateTypeUser($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
										                                   $row[Config::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceTypeUser, $InstanceTypeUser);
						return Config::RET_OK;
					}
					if(!empty($ArrayInstanceTeam))
						return Config::RET_OK;
					else return Config::DB_ERROR_TYPE_USER_SEL_BY_DESCRIPTION_FETCH;
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_TYPE_USER_SEL_BY_DESCRIPTION;
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
	
	public function TypeUserUpdateByTypeUserDescription($TypeUserDescriptionNew, $TypeUserDescription, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeUserUpdateByTypeUserDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeUserUpdateByTypeUserDescription());
			if ($stmt)
			{
				$stmt->bind_param("ss", $TypeUserDescriptionNew, $TypeUserDescription);
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
					return Config::DB_ERROR_TYPE_USER_UPDT;
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