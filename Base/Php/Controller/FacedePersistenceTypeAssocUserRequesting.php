<?php

/************************************************************************
Class: FacedePersistenceTypeAssocUserRequesting
Creation: 14/06/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/TypeAssocUserRequesting.php
	
Description: 
			Classe used to access and deal with information of the database about type of association betweeen a user and a team.
Functions: 
			public function TypeAssocUserRequestingDelete($TypeAssocUserRequestingBond, $Debug, $MySqlConnection);
			public function TypeAssocUserRequestingInsert($TypeAssocUserRequestingBond, $Debug, $MySqlConnection);
			public function TypeAssocUserRequestingSelect($Limit1, $Limit2, &&ArrayAssocUserRequesting, 
			                                              &$RowCount, $Debug, $MySqlConnection);
			public function TypeAssocUserRequestingSelectByTypeBond($TypeAssocUserRequestingBond,
			                                                        &$TypeAssocUserRequesting, $Debug, $MySqlConnection);
			public function TypeAssocUserRequestingUpdateByTypeBond($TypeAssocUserRequestingTypeBond,
			                                                        $Debug, $MySqlConnection);
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

class FacedePersistenceTypeAssocUserRequesting
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
	
	public function TypeAssocUserRequestingDelete($TypeAssocUserRequestingBond, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeAssocUserTeamDelete() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeAssocUserTeamDelete());
			if ($stmt)
			{
				$stmt->bind_param("i", $TypeAssocUserTeamId);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_TYPE_ASSOC_USER_TEAM_DELETE_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_TYPE_ASSOC_USER_TEAM_DELETE_FAILED;
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
	
	public function TypeAssocUserRequestingInsert($TypeAssocUserRequestingBond, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeAssocUserTeamInsert() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeAssocUserTeamInsert());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeAssocUserTeamDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_CORPORATION_INSERT_FAILED;
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
	
	public function TypeAssocUserRequestingSelect($Limit1, $Limit2, &$ArrayAssocUserRequesting,  &$RowCount, 
												  $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		$ArrayTypeAssocUserTeam = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeAssocUserRequestingSelect() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeAssocUserRequestingSelect());
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
						$InstanceTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam
							                            ($row[Config::TABLE_FIELD_REGISTER_DATE],
														 $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION], 
						                                 $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID]);	
						array_push($ArrayTypeAssocUserTeam, $InstanceTypeAssocUserTeam);
					}
					if(!empty($ArrayTypeAssocUserTeam))
						return Config::SUCCESS;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_FAILED;
				}
				return $return;
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
	
	public function TypeAssocUserRequestingSelectByTypeBond($TypeAssocUserRequestingBond, &$TypeAssocUserRequesting, 
															$Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeAssocUserRequestingSelectByTypeBond() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeAssocUserRequestingSelectByTypeBond());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $TypeAssocUserTeam);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($registerDate, $TypeAssocUserTeam, $typeAssocUserTeamId);
					if ($stmt->fetch())
					{
						$TypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam($registerDate, $TypeAssocUserTeam,
																					 $typeAssocUserTeamId);
						return Config::SUCCESS;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_BY_DESCRIPTION_FETCH_FAILED;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_BY_DESCRIPTION_FAILED;
				}
				return $return;
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
	
	public function TypeAssocUserRequestingUpdateByTypeBond($TypeAssocUserRequestingTypeBond, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Query: " . Persistence::SqlTypeAssocUserRequestingUpdateByTypeBond() . "<br>";
			$stmt = $mySqlConnection->prepare(Persistence::SqlTypeAssocUserRequestingUpdateByTypeBond());
			if ($stmt)
			{
				$stmt->bind_param("si", $TypeAssocUserTeamDescription, $TypeAssocUserTeamId);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
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
					return Config::MYSQL_TYPE_ASSOC_USER_TEAM_UPDATE_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
	}
}
?>