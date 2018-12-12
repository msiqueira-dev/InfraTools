<?php

/************************************************************************
Class: FacedePersistenceAssocTicketUserRequesting
Creation: 14/06/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/AssocTicketUserRequesting.php
	
Description: 
			Classe used to access and deal with information of the database about type of association betweeen a user and a team.
Functions: 
			public function AssocTicketUserRequestingDeleteByTicketId($AssocTicketUserRequestingTicketId, $Debug, $MySqlConnection);
			public function AssocTicketUserRequestingInsert($AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail,
			                                                $AssocUserRequestingTicketId, $Debug, $MySqlConnection);
			public function AssocTicketUserRequestingSelect($Limit1, $Limit2, &$ArrayAssocTicketUserRequesting, 
			                                                &$RowCount, $Debug, $MySqlConnection);
			public function AssocTicketUserRequestingSelectByUserEmail($Limit1, $Limit2, $AssocTicketUserRequestingUserEmail,
			                                                          &$ArrayAssocTicketUserRequesting, &$RowCount,
			                                                          $Debug, $MySqlConnection);
			public function AssocTicketUserRequestingSelectByTicketId($AssocTicketUserRequestingTicketId,
			                                                          &$AssocTicketUserRequesting, 
			                                                          $Debug, $MySqlConnection);
			public function AssocTicketUserRequestingUpdateByTicketId($AssocTicketUserRequestingUserBond,
			                                                          $AssocTicketUserRequestingUserEmail, 
			                                                          $AssocUserRequestingTicketId, $Debug, $MySqlConnection);
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

class FacedePersistenceAssocTicketUserRequesting
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
	
	public function AssocTicketUserRequestingDeleteByTicketId($AssocTicketUserRequestingTicketId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserRequestingDeleteByTicketId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingDeleteByTicketId());
			if ($stmt)
			{
				$stmt->bind_param("i", $TypeAssocUserTeamId);
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
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_TYPE_ASSOC_USER_TEAM_DELETE_FAILED;
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
	
	public function AssocTicketUserRequestingInsert($AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail,
			                                        $AssocUserRequestingTicketId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserRequestingInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingInsert());
			if ($stmt)
			{
				$stmt->bind_param("ssi", $AssocTicketUserRequestingUserBond, 
								         $AssocTicketUserRequestingUserEmail,
								         $AssocUserRequestingTicketId);
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
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function AssocTicketUserRequestingSelect($Limit1, $Limit2, &$ArrayAssocTicketUserRequesting, 
			                                        &$RowCount, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		$ArrayAssocTicketUserRequesting = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserRequestingSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingSelect());
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
						$InstanceAssocTicketUserRequesting = $this->Factory->CreateAssocTicketUserRequesting
							                                 ($row[Config::TABLE_ASSOC_TICKET_USER_FIELD_REQUESTING_TICKET_ID],
															  $row[Config::TABLE_ASSOC_TICKET_USER_FIELD_REQUESTING_USER_BOND],
														      $row[Config::TABLE_ASSOC_TICKET_USER_FIELD_REQUESTING_USER_EMAIL],
														      $row[Config::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayAssocTicketUserRequesting, $InstanceAssocTicketUserRequesting);
					}
					if(!empty($ArrayAssocTicketUserRequesting))
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
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function AssocTicketUserRequestingSelectByUserEmail($Limit1, $Limit2, $AssocTicketUserRequestingUserEmail,
			                                                   &$ArrayAssocTicketUserRequesting, &$RowCount,
			                                                   $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		$ArrayAssocTicketUserRequesting = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserRequestingSelectByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingSelectByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("sii", $AssocTicketUserRequestingUserEmail,$Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceAssocTicketUserRequesting = $this->Factory->CreateAssocTicketUserRequesting
							                                 ($row[Config::TABLE_ASSOC_TICKET_USER_FIELD_REQUESTING_TICKET_ID],
															  $row[Config::TABLE_ASSOC_TICKET_USER_FIELD_REQUESTING_USER_BOND],
														      $row[Config::TABLE_ASSOC_TICKET_USER_FIELD_REQUESTING_USER_EMAIL],
														      $row[Config::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayAssocTicketUserRequesting, $InstanceAssocTicketUserRequesting);
					}
					if(!empty($ArrayAssocTicketUserRequesting))
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
	
	public function AssocTicketUserRequestingSelectByTicketId($AssocTicketUserRequestingTicketId,
			                                                  &$AssocTicketUserRequesting, 
			                                                  $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserRequestingSelectByTicketId');
			$stmt = $mySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingSelectByTicketId());
			if($stmt != NULL)
			{
				$stmt->bind_param("i", $AssocTicketUserRequestingTicketId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($registerDate, $assocTicketUserRequestingUserBond,
									   $assocTicketUserRequestingUserEmail, $AssocTicketUserRequestingTicketId);
					if ($stmt->fetch())
					{
						$TypeAssocUserTeam = $this->Factory->CreateAssocTicketUserRequesting(
						                                                             $AssocTicketUserRequestingTicketId,
							                                                         $assocTicketUserRequestingUserBond,
																			         $assocTicketUserRequestingUserEmail,
																					 $registerDate);
						return Config::SUCCESS;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_BY_ID_FETCH_FAILED;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_BY_ID_FAILED;
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
	
	public function AssocTicketUserRequestingUpdateByTicketId($AssocTicketUserRequestingUserBond,
			                                                  $AssocTicketUserRequestingUserEmail, 
			                                                  $AssocUserRequestingTicketId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('AssocTicketUserRequestingUpdateByTicketId');
			$stmt = $mySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingUpdateByTicketId());
			if ($stmt)
			{
				$stmt->bind_param("ssi", $AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail, 
								         $AssocUserRequestingTicketId);
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