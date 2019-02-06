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
				$stmt->bind_param("i", $AssocTicketUserRequestingTicketId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_ASSOC_TICKET_USER_REQUESTING_DEL;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_ASSOC_USER_REQUESTING_DEL;
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
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_ASSOC_TICKET_USER_REQUESTING_INSERT;
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
	
	public function AssocTicketUserRequestingSelect($Limit1, $Limit2, &$ArrayAssocTicketUserRequesting, 
			                                        &$RowCount, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		$ArrayAssocTicketUserRequesting = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserRequestingSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayAssocTicketUserRequesting = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceAssocTicketUserRequesting = $this->Factory->CreateAssocTicketUserRequesting
							                                 ($row[Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_TICKET_ID],
															  $row[Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_USER_BOND],
														      $row[Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_USER_EMAIL],
														      $row[Config::TB_FD_REGISTER_DATE]);
						array_push($ArrayAssocTicketUserRequesting, $InstanceAssocTicketUserRequesting);
					}
					if(!empty($ArrayAssocTicketUserRequesting))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_ASSOC_TICKET_USER_REQUESTING_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_ASSOC_TICKET_USER_REQUESTING_SEL;
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
	
	public function AssocTicketUserRequestingSelectByUserEmail($Limit1, $Limit2, $AssocTicketUserRequestingUserEmail,
			                                                   &$ArrayAssocTicketUserRequesting, &$RowCount,
			                                                   $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserRequestingSelectByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingSelectByUserEmail());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $AssocTicketUserRequestingUserEmail,$Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayAssocTicketUserRequesting = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceAssocTicketUserRequesting = $this->Factory->CreateAssocTicketUserRequesting
							                                 ($row[Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_TICKET_ID],
															  $row[Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_USER_BOND],
														      $row[Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_USER_EMAIL],
														      $row[Config::TB_FD_REGISTER_DATE]);
						array_push($ArrayAssocTicketUserRequesting, $InstanceAssocTicketUserRequesting);
					}
					if(!empty($ArrayAssocTicketUserRequesting))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_ASSOC_TICKET_USER_REQUESTING_SEL_FETCH;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_ASSOC_TICKET_USER_REQUESTING_SEL;
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
	
	public function AssocTicketUserRequestingSelectByTicketId($AssocTicketUserRequestingTicketId,
			                                                  &$InstanceAssocTicketUserRequesting, 
			                                                  $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserRequestingSelectByTicketId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingSelectByTicketId());
			if($stmt != NULL)
			{
				$stmt->bind_param("i", $AssocTicketUserRequestingTicketId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($registerDate, $assocTicketUserRequestingUserBond,
									   $assocTicketUserRequestingUserEmail, $AssocTicketUserRequestingTicketId);
					if ($stmt->fetch())
					{
						$InstanceAssocTicketUserRequesting = $this->Factory->CreateAssocTicketUserRequesting(
						                                                             $AssocTicketUserRequestingTicketId,
							                                                         $assocTicketUserRequestingUserBond,
																			         $assocTicketUserRequestingUserEmail,
																					 $registerDate);
						return Config::RET_OK;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_ASSOC_TICKET_USER_REQUESTING_SEL_BY_ID_FETCH;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_ASSOC_TICKET_USER_REQUESTING_SEL_BY_ID;
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
	
	public function AssocTicketUserRequestingUpdateByTicketId($AssocTicketUserRequestingUserBond,
			                                                  $AssocTicketUserRequestingUserEmail, 
			                                                  $AssocUserRequestingTicketId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('AssocTicketUserRequestingUpdateByTicketId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserRequestingUpdateByTicketId());
			if ($stmt)
			{
				$stmt->bind_param("ssi", $AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail, 
								         $AssocUserRequestingTicketId);
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
					return Config::DB_ERROR_ASSOC_TICKET_USER_REQUESTING_UPDT;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::DB_ERROR_QUERY_PREPARE;
			}
		}
	}
}
?>