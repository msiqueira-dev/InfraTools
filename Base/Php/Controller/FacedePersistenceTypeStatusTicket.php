<?php

/************************************************************************
Class: FacedePersistenceTypeStatusTicket
Creation: 13/11/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/Ticket.php
	
Description: 
			Classe used to access and deal with information of the database about type status ticket.
Functions: 
			public function TypeStatusTicketDeleteByTypeStatusTicketDescription($TypeStatusTicketDescription, $Debug, $MySqlConnection);
			public function TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug, $MySqlConnection);
			public function TypeStatusTicketSelect($Limit1, $Limit2, &ArrayInstanceTypeStatusTicket, &$RowCount, $Debug, $MySqlConnection);
			public function TypeStatusTicketSelectByTypeStatusTicketDescription($TypeStatusTicketDescription, &$TypeStatusTicket, 
			                                                                    $Debug, $MySqlConnection);
			public function TypeStatusTicketUpdateByTypeStatusTicketDescription($TypeStatusTicketDescriptionNew, $TypeStatusTicketDescription, 
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

class FacedePersistenceTypeStatusTicket
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
	
	public function TypeStatusTicketDeleteByTypeStatusTicketDescription($TypeStatusTicketDescription, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeStatusTicketDeleteByTypeStatusTicketDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeStatusTicketDeleteByTypeStatusTicketDescription());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeStatusTicketDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_TYPE_USER_DELETE_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_TYPE_USER_DELETE_FAILED;
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
	
	public function TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeStatusTicketInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeStatusTicketInsert());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeStatusTicketDescription);
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
	
	public function TypeStatusTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeStatusTicket, &$RowCount, $Debug, $MySqlConnection)
	{
		$ArrayInstanceTypeStatusTicket = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeStatusTicketSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeStatusTicketSelect());
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
						$InstanceTypeStatusTicket = $this->Factory->CreateTypeStatusTicket
							                            ($row[Config::TABLE_FIELD_REGISTER_DATE],
														 $row[Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION]);	
						array_push($ArrayInstanceTypeStatusTicket, $InstanceTypeStatusTicket);
					}
					if(!empty($ArrayInstanceTypeStatusTicket))
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
	
	public function TypeStatusTicketSelectByTypeStatusTicketDescription($TypeStatusTicketDescription, &$TypeStatusTicket, 
																		$Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeStatusTicketSelectByTypeStatusTicketDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeStatusTicketSelectByTypeStatusTicketDescription());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $TypeStatusTicketDescription);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($registerDate, $TypeStatusTicketDescription);
					if ($stmt->fetch())
					{
						$TypeStatusTicket = $this->Factory->CreateTypeStatusTicket($registerDate, 
																				   $TypeStatusTicketDescription);
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
	
	public function TypeStatusTicketUpdateByTypeStatusTicketDescription($TypeStatusTicketDescriptionNew, $TypeStatusTicketDescription, 
																		$Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeStatusTicketUpdateByTypeStatusTicketDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeStatusTicketUpdateByTypeStatusTicketDescription());
			if ($stmt)
			{
				$stmt->bind_param("ss", $TypeStatusTicketDescriptionNew, $TypeStatusTicketDescription);
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
					return Config::MYSQL_TYPE_USER_UPDATE_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
	}
}
?>