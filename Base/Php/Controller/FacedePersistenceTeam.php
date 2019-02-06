<?php

/************************************************************************
Class: FacedePersistenceTeam
Creation: 30/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/Team.php
	
Description: 
			Classe used to access and deal with information of the database about group user.
Functions: 
			public function TeamDeleteByTeamDescription($TeamDescription, $Debug, $MySqlConnection)
			public function TeamDeleteByTeamId($TeamId, $Debug, $MySqlConnection)
			public function TeamInsert($TeamDescription, $TeamName, $Debug, $MySqlConnection);
			public function TeamSelect($Limit1, $Limit2, &$ArrayInstanceTeam, &$RowCount, $Debug, $MySqlConnection);
			public function TeamSelectByTeamId($TeamId, &$TeamInstance, $Debug, $MySqlConnection);
			public function TeamSelectByTeamName($TeamName, &$ArrayInstanceTeam, $Debug, $MySqlConnection);
			public function TeamUpdateByTeamId($TeamDescription, $TeamId, $TeamName, $Debug, $MySqlConnection);
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

class FacedePersistenceTeam
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
	
	public function TeamDeleteByTeamDescription($TeamDescription, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTeamDeleteByTeamDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTeamDeleteByTeamDescription());
			if ($stmt)
			{
				$stmt->bind_param("s", $TeamDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_TEAM_DEL_BY_TEAM_DESCRIPTION;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_TEAM_DEL_BY_TEAM_DESCRIPTION;
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
	
	public function TeamDeleteByTeamId($TeamId, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTeamDeleteByTeamId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTeamDeleteByTeamId());
			if ($stmt)
			{
				$stmt->bind_param("i", $TeamId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_TEAM_DEL_BY_TEAM_ID;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_TEAM_DEL_BY_TEAM_ID;
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
	
	public function TeamInsert($TeamDescription, $TeamName, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTeamInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTeamInsert());
			if ($stmt)
			{
				$stmt->bind_param("ss", $TeamDescription, $TeamName);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_TEAM_INSERT;
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
	
	public function TeamSelect($Limit1, $Limit2, &$ArrayInstanceTeam, &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceTeam = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTeamSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTeamSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceTeam = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceTeam = $this->Factory->CreateTeam($row[Config::TB_FD_REGISTER_DATE],
							                                       $row[Config::TB_TEAM_FD_TEAM_DESCRIPTION], 
						                                           $row[Config::TB_TEAM_FD_TEAM_ID], 
														           $row[Config::TB_TEAM_FD_TEAM_NAME]);	
						array_push($ArrayInstanceTeam, $InstanceTeam);
					}
					if(!empty($ArrayInstanceTeam))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_TEAM_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_TEAM_SEL;
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
	
	public function TeamSelectNoLimit(&$ArrayInstanceTeam, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceTeam = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTeamSelectNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlTeamSelectNoLimit()))
			{
				$ArrayInstanceTeam = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceTeam = $this->Factory->CreateTeam($row[Config::TB_FD_REGISTER_DATE],
															   $row[Config::TB_TEAM_FD_TEAM_DESCRIPTION], 
						                                       $row[Config::TB_TEAM_FD_TEAM_ID],
														       $row[Config::TB_TEAM_FD_TEAM_NAME]);	
					array_push($ArrayInstanceTeam, $InstanceTeam);
				}
				if(!empty($ArrayInstanceTeam))
					return Config::RET_OK;
				else return Config::DB_ERROR_TEAM_SEL_FETCH;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::DB_ERROR_TEAM_SEL;
			}
			return $return;
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function TeamSelectByTeamId($TeamId, &$InstanceTeam, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTeamSelectByTeamId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTeamSelectByTeamId());
			if($stmt != NULL)
			{
				$stmt->bind_param("i", $TeamId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($registerDate, $teamDescription, $TeamId, $teamName);
					if ($stmt->fetch())
					{
						$InstanceTeam = $this->Factory->CreateTeam($registerDate, $teamDescription, $TeamId, $teamName);
						return Config::RET_OK;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_TEAM_SEL_BY_TEAM_ID_FETCH;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_TEAM_SEL_BY_TEAM_ID;
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
	
	public function TeamSelectByTeamName($TeamName, &$ArrayInstanceTeam, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceTeam = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTeamSelectByTeamName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTeamSelectByTeamName());
			if($stmt)
			{
				$TeamName = "%".$TeamName."%";  
				$stmt->bind_param("s", $TeamName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceTeam = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc())  
					{
						$InstanceTeam = $this->Factory->CreateTeam($row[Config::TB_FD_REGISTER_DATE],
																   $row[Config::TB_TEAM_FD_TEAM_DESCRIPTION], 
																   $row[Config::TB_TEAM_FD_TEAM_ID], 
																   $row[Config::TB_TEAM_FD_TEAM_NAME]);	
						array_push($ArrayInstanceTeam, $InstanceTeam);
					}
					if(!empty($ArrayInstanceTeam))
						return Config::RET_OK;
					else return Config::DB_ERROR_TEAM_SEL_BY_TEAM_NAME_FETCH;
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_TEAM_SEL_BY_TEAM_NAME;
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
	
	public function TeamUpdateByTeamId($TeamDescription, $TeamId, $TeamName, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTeamUpdateByTeamId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTeamUpdateByTeamId());
			if ($stmt)
			{
				$stmt->bind_param("ssi", $TeamDescription, $TeamName, $TeamId);
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
					return Config::DB_ERROR_TEAM_UPDT;
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