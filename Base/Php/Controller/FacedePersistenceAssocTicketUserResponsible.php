<?php

/************************************************************************
Class: FacedePersistenceAssocTicketUserResponsible
Creation: 2018/06/14
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Factory.php
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/TypeAssocTicketUserResponsible.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of association between Ticket and User Responsible
Functions: 
			public function AssocTicketUserResponsibleDeleteByTicketId($AssocTicketUserResponsibleTicketId, $Debug,
			                                                           $MySqlConnection);
			public function AssocTicketUserResponsibleInsert($AssocTicketUserResponsibleUserEmail, $Debug, $MySqlConnection);
			public function AssocTicketUserResponsibleSelect($Limit1, $Limit2, &$AssocTicketUserResponsible, &$RowCount, 
													         $Debug, $MySqlConnection);
			public function AssocTicketUserResponsibleSelectByTicketId($AssocTicketUserResponsibleTicketId, 
			                                                   &$AssocTicketUserResponsible, $Debug, $MySqlConnection);
			public function AssocTicketUserResponsibleUpdateByTicketId($AssocTicketUserResponsibleUserEmail, 
			                                                           $AssocTicketUserResponsibleTicketId, $Debug, $MySqlConnection)
**************************************************************************/

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

class FacedePersistenceAssocUserResponsible
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
	
	public function AssocTicketUserResponsibleDeleteByTicketId($AssocTicketUserResponsibleTicketId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserResponsibleDeleteByTicketId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserResponsibleDeleteByTicketId());
			if ($stmt)
			{
				$stmt->bind_param("i", $AssocTicketUserResponsibleTicketId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_ASSOC_TICKET_USER_RESPONSIBLE_DEL;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_ASSOC_TICKET_USER_RESPONSIBLE_DEL;
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
	
	public function AssocTicketUserResponsibleInsert($AssocTicketUserResponsibleUserEmail, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserResponsibleInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserResponsibleInsert());
			if ($stmt)
			{
				$stmt->bind_param("s", $TypeAssocUserTeamDescription);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_ASSOC_TICKET_USER_RESPONSIBLE_INSERT;
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
	
	public function AssocTicketUserResponsibleSelect($Limit1, $Limit2, &$ArrayInstanceAssocTicketUserResponsible, &$RowCount, 
													 $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceAssocTicketUserResponsible = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserResponsibleSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserResponsibleSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceAssocTicketUserResponsible = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceAssocTicketUserResponsible = $this->Factory->CreateTypeAssocUserTeam
							                            ($row[Config::TB_FD_REGISTER_DATE],
														 $row[Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION]);	
						array_push($ArrayInstanceAssocTicketUserResponsible, $InstanceAssocTicketUserResponsible);
					}
					if(!empty($ArrayInstanceAssocTicketUserResponsible))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_ASSOC_TICKET_USER_RESPONSIBLE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_ASSOC_TICKET_USER_RESPONSIBLE_SEL;
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
	
	public function AssocTicketUserResponsibleSelectByTicketId($AssocTicketUserResponsibleTicketId, 
			                                                   &$InstanceAssocTicketUserResponsible, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserResponsibleSelectByTicketId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserResponsibleSelectByTicketId());
			if($stmt != NULL)
			{
				$stmt->bind_param("i", $AssocTicketUserResponsibleTicketId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($registerDate, $typeAssocUserTeamDescription, $AssocTicketUserResponsibleTicketId);
					if ($stmt->fetch())
					{
						$InstanceAssocTicketUserResponsible = $this->Factory->CreateTypeAssocUserTeam($registerDate,
																									  $typeAssocUserTeamDescription,
																			                          $AssocTicketUserResponsibleTicketId);
						return Config::RET_OK;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_ASSOC_USER_RESPONSIBLE_SEL_BY_ID_FETCH;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_ASSOC_USER_RESPONSIBLE_SEL_BY_ID;
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
	
	public function AssocTicketUserResponsibleUpdateByTicketId($AssocTicketUserResponsibleUserEmail, 
			                                                   $AssocTicketUserResponsibleTicketId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection  != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocTicketUserResponsibleUpdateByTicketId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocTicketUserResponsibleUpdateByTicketId());
			if ($stmt)
			{
				$stmt->bind_param("si", $TypeAssocUserTeamDescription, $AssocTicketUserResponsibleTicketId);
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
					return Config::DB_ERROR_ASSOC_TICKET_USER_RESPONSIBLE_UPDT;
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