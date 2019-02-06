<?php

/************************************************************************
Class: FacedePersistenceTicket
Creation: 07/11/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/Ticket.php
	
Description: 
			Classe used to access and deal with information of the database about tickets.
Functions: 
			public function TicketDeleteByTicketId($TicketDescription, $Debug, $MySqlConnection);
			public function TicketInsert($TypeTicketDescription, $Debug, $MySqlConnection);
			public function TicketSelect($Limit1, $Limit2, &ArrayInstanceTypeTicket, &$RowCount, $Debug, $MySqlConnection);
			public function TicketSelectByTypeTicketDescription($TypeTicketDescription, &$InstanceTypeTicket, $Debug, $MySqlConnection);
			public function TicketUpdateByTypeTicketDescription($TypeTicketDescription, $Debug, $MySqlConnection);
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

class FacedePersistenceTicket
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
	
	public function TicketDeleteByTypeTicketDescription($TypeTicketDescription, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeTicketDeleteByTypeTicketDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeTicketDeleteByTypeTicketDescription());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeTicketDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_TICKET_DEL;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_TICKET_DEL;
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
	
	public function TicketInsert($TypeTicketDescription, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeTicketInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeTicketInsert());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeTicketDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_TICKET_INSERT;
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
	
	public function TicketSelect($Limit1, $Limit2, &$ArrayInstanceTicket, &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceTicket = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTicketSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTicketSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceTicket = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceTicket = $this->Factory->CreateTicket
							                            ($row[Config::TB_FD_REGISTER_DATE],
														 $row[Config::TB_TICKET_FD_TICKET_DESCRIPTION],
														 $row[Config::TB_TICKET_FD_TICKET_ID],
														 $row[Config::TB_TICKET_FD_TICKET_STATUS],
														 $row[Config::TB_TICKET_FD_TICKET_SUGGESTION],
														 $row[Config::TB_TICKET_FD_TICKET_TITLE],
														 $row[Config::TB_TICKET_FD_TICKET_TYPE]);	
						array_push($ArrayInstanceTicket, $InstanceTicket);
					}
					if(!empty($ArrayInstanceTicket))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_TICKET_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_TICKET_SEL;
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
	
	public function TicketSelectByDescription($TypeTicketDescription, &$TypeTicket, $Debug, $MySqlConnection)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTicketSelectByDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTicketSelectByDescription());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $TypeTicketDescription);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($registerDate, $TypeTicketDescription, $typeTicketId);
					if ($stmt->fetch())
					{
						$TypeTicket = $this->Factory->CreateTypeTicket($registerDate, $TypeTicketDescription, $typeTicketId);
						return Config::RET_OK;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_TICKET_SEL_BY_DESCRIPTION_FETCH;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_TICKET_SEL_BY_DESCRIPTION;
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
	
	public function TicketUpdateByTypeTicketDescription($TypeTicketDescription, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlTypeTicketUpdateByTypeTicketDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlTypeTicketUpdateByTypeTicketDescription());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeTicketDescription);
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
					return Config::DB_ERROR_TICKET_UPDT;
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