<?php

/************************************************************************
Class: FacedePersistenceTypeAssocUserTeam
Creation: 23/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/TypeAssocUserTeam.php
	
Description: 
			Classe used to access and deal with information of the database about type of association betweeen a user and a team.
Functions: 
			public function TypeAssocUserTeamDeleteByTypeAssocUserDescription($TypeAssocUserTeamDescription, $Debug, $MySqlConnection);
			public function TypeAssocUserTeamInsert($TypeAssocUserTeamDescription, $Debug, $MySqlConnection);
			public function TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayInstanceTypeAssocUserTeam, &$RowCount, $Debug, $MySqlConnection);
			public function TypeAssocUserTeamSelectByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription,
			                                                                      &$InstanceTypeAssocUserTeam, 
			                                                                      $Debug, $MySqlConnection);
			public function TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, 
			                                                                      $InstanceTypeAssocUserTeam, $Debug, $MySqlConnection);
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

class FacedePersistenceTypeAssocUserTeam
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
	
	public function TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeAssocUserTeamDeleteByTypeAssocUserTeamDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeAssocUserTeamDeleteByTypeAssocUserTeamDescription());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeAssocUserTeamDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
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
					if($errorCode == Config::MYSQL_ERROR_CODE_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_CODE_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_TYPE_ASSOC_USER_TEAM_DELETE_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}

		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function TypeAssocUserTeamInsert($TypeAssocUserTeamDescription, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeAssocUserTeamInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeAssocUserTeamInsert());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeAssocUserTeamDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
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
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayInstanceTypeAssocUserTeam, &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceTypeAssocUserTeam = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeAssocUserTeamSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeAssocUserTeamSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$ArrayInstanceTypeAssocUserTeam = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam
							                            ($row[Config::TABLE_FIELD_REGISTER_DATE],
														 $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION]);	
						array_push($ArrayInstanceTypeAssocUserTeam, $InstanceTypeAssocUserTeam);
					}
					if(!empty($ArrayInstanceTypeAssocUserTeam))
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
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;
	}
	public function TypeAssocUserTeamSelectByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, &$InstanceTypeAssocUserTeam, 
																		  $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeAssocUserTeamSelectByTypeAssocUserTeamDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeAssocUserTeamSelectByTypeAssocUserTeamDescription());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $TypeAssocUserTeamDescription);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($registerDate, $TypeAssocUserTeamDescription);
					if ($stmt->fetch())
					{
						$InstanceTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam($registerDate, $TypeAssocUserTeamDescription);
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
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription($TypeAssocUserTeamDescriptionNew, $TypeAssocUserTeamDescription,
																		  $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeAssocUserTeamUpdateByTypeAssocUserTeamDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeAssocUserTeamUpdateByTypeAssocUserTeamDescription());
			if ($stmt)
			{
				$stmt->bind_param("ss", $TypeAssocUserTeamDescriptionNew, $TypeAssocUserTeamDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_ERROR_UPDATE_SAME_VALUE;
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
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
	}
}
?>