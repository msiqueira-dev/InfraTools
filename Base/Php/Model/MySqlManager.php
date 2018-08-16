<?php

/************************************************************************
Class: MySqlManager.php
Creation: 03/06/2014
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe de controle de Banco de Dados MySql
Functions: 
			public function OpenDataBaseConnection(&$mySqlConnection, &$MySqlError);
			public function CloseDataBaseConnection($MySqlConnection, $Statement);
			public function ExecuteInsertOrUpdate($MySqlConnection, $Statement, &$ErrorCode, &$ErrorString, &$QueryResult)
			public function ExecuteSqlSelectQuery($Query, $MySqlConnection, &$Statement, &$QueryError);
			public function GetDataBaseProccess($MySqlConnection, &$ArrayMySqlProccess, &$MySqlError);
**************************************************************************/

if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Config');
}

class MySqlManager
{	
	/* Constantes de Retorno */
	const MYSQL_ERROR_CONNECTION_CLOSE      = "RetMySqlErrorConnectionClose";
	const MYSQL_ERROR_CONNECTION_EMPTY      = "RetMySqlErrorConnectionEmpty";
	const MYSQL_ERROR_CONNECTION_NOT_EMPTY  = "RetMySqlErrorConnectionNotEmpty";
	const MYSQL_ERROR_CONNECTION_OPEN       = "RetMySqlErrorConnectionOpen";
	const MYSQL_ERROR_QUERY_PREPARE         = "RetMySqlErrorQueryPrepare";
 	const MYSQL_ERROR_QUERY_EMPTY           = "RetMySqlErrorQueryEmpty";
	const MYSQL_ERROR_QUERY_SQL             = "RetMySqlErrorQuerySql";
	
	/* Constantes de Comandos */
	const MYSQL_CHATSET_UTF8       = "utf8";
	
	/* Constantes de Log */
	const MYSQL_LOG_ERROR          = "LogMySqlError";
	const MYSQL_LOG_QUERY          = "LogMySqlQuery";
	
	/* Instância usadas nessa classe */
	private $Config;
	private $Factory = NULL;
	
	/* Class Properties */
	private $MySqlAddress;
	private $MySqlPort;
	private $MySqlUser;
	private $MySqlPassword;
	private $MySqlDataBase;
	
	/* Singleton */
	private static $Instance;
	
	/* Get Instance */
	public static function __create($MySqlAddress, $MySqlPort, $MySqlDataBase, $MySqlUser, $MySqlPassword)
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class($MySqlAddress, $MySqlPort, $MySqlDataBase, $MySqlUser, $MySqlPassword);
        }
        return self::$Instance;
    }
	
	/* Constructor */
	private function __construct($MySqlAddress, $MySqlPort, $MySqlDataBase, $MySqlUser, $MySqlPassword) 
    {
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
		if ($this->Config == NULL)
			$this->Config = $this->Factory->CreateConfig();
		$this->MySqlAddress  = $MySqlAddress;
		$this->MySqlPort     = $MySqlPort;
		$this->MySqlUser     = $MySqlUser; 
		$this->MySqlPassword = $MySqlPassword; 
		$this->MySqlDataBase = $MySqlDataBase;
    }
	
	/* Clone */
	public function __clone()
    {
        exit(get_class($this) . ": Error! Clone Not Allowed!");
    }
	
	public function OpenDataBaseConnection(&$MySqlConnection, &$MySqlError)
	{
		$return = NULL; $selectedDataBase = NULL; $MySqlError = NULL;
		if ($MySqlConnection == NULL)
		{
			$MySqlConnection = mysqli_connect($this->MySqlAddress, $this->MySqlUser, $this->MySqlPassword,
			                                  $this->MySqlDataBase, $this->MySqlPort);
			if ($MySqlConnection != NULL) 
			{
				$MySqlConnection->set_charset(self::MYSQL_CHATSET_UTF8);
				return Config::SUCCESS;
			}
			else 
			{
				$MySqlError = "Error: " . mysqli_connect_error();
				return self::MYSQL_ERROR_CONNECTION_OPEN;
			}
		}
		else return self::MYSQL_ERROR_CONNECTION_NOT_EMPTY;
	}
	
	public function CloseDataBaseConnection($MySqlConnection, $Statement)
	{
		if ($MySqlConnection != NULL)
		{
			if($Statement != NULL)
			{
				if (mysqli_close($MySqlConnection) == TRUE && $Statement->close() == TRUE)
					return Config::SUCCESS;
			}
			else if (mysqli_close($MySqlConnection))
				return Config::SUCCESS;
			return self::MYSQL_ERROR_CONNECTION_CLOSE;
		}
		else return self::MYSQL_ERROR_CONNECTION_EMPTY;
	}
	
	public function ExecuteInsertOrUpdate($MySqlConnection, $Statement, &$ErrorCode, &$ErrorString, &$QueryResult)
	{
		$QueryResult = NULL; $ErrorCode = NULL; $ErrorString = NULL;

		if ($Statement != NULL)
		{
			if ($this->Config->EnableLogMySqlQuery || $this->Config->EnableLogMySqlError)
			{
				$Log = $this->Factory->CreateLog($this->Config->DefaultLogPath);
				if ($this->Config->EnableLogMySqlQuery)
					$Log->WriteLog(self::MYSQL_LOG_QUERY, $Statement);	
			}
			if($QueryResult = $Statement->execute())
				return Config::SUCCESS;
			else
			{
				$ErrorCode = mysqli_errno($MySqlConnection);
				$ErrorString = $Statement->error;
				if ($this->Config->EnableLogMySqlError)
					$Log->WriteLog(self::MYSQL_LOG_ERROR, $ErrorCode . ": " . $ErrorString);
				return self::MYSQL_ERROR_QUERY_SQL;
			}
		}
		else return self::MYSQL_ERROR_CONNECTION_EMPTY;
	}
	
	public function ExecuteSqlSelectQuery($Query, $MySqlConnection, &$Statement, &$QueryError)
	{
		$QueryResult = NULL; $QueryError = NULL;

		if ($MySqlConnection != NULL)
		{
			if ($this->Config->EnableLogMySqlQuery || $this->Config->EnableLogMySqlError)
			{
				$Log = $this->Factory->CreateLog($this->Config->DefaultLogPath);
				if ($this->Config->EnableLogMySqlQuery)
					$Log->WriteLog(self::MYSQL_LOG_QUERY, $Query);	
				if ($this->Config->EnableLogMySqlError)
					$Log->WriteLog(self::MYSQL_LOG_ERROR, $QueryError);
			}
			if($Statement == NULL)
			{
				if($Query != NULL)
				{
					if(!($Statement = $MySqlConnection->prepare($Query)))
					{
						$QueryError = $MySqlConnection->error;
						return self::MYSQL_ERROR_QUERY_PREPARE;
					}
				}
				else return self::MYSQL_ERROR_QUERY_EMPTY;
			}
			if($Statement->execute())
				return Config::SUCCESS;
			else
			{
				$QueryError = $Statement->error; 
				return self::MYSQL_ERROR_QUERY_SQL;
			}
		}
		else return self::MYSQL_ERROR_CONNECTION_EMPTY;
	}
	
	public function GetDataBaseProccess($MySqlConnection, &$ArrayMySqlProccess, &$MySqlError)
	{
		$ArrayMySqlProccess = array(); $MySqlConnection = NULL;
		
		if ($MySqlConnection != NULL)
		{
			$queryResult = mysqli_get_client_stats ($MySqlConnection);
			while ($row = mysqli_fetch_assoc($queryResult))
				array_push($ArrayMySqlProccess, $row["Id"] . " " .  $row["Host"] . " " 
				           . $row["db"] . " " . $row["Command"] . " " . $row["Time"]);
			mysqli_free_result($queryResult);	
		}
		else return self::MYSQL_ERROR_CONNECTION_EMPTY;
	}
}
?>