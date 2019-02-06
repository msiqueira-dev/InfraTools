<?php

/************************************************************************
Class: MySqlManager.php
Creation: 03/06/2014
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe de controle de Banco de Dados MySql
Functions: 
			public function CloseDataBaseConnection($MySqlConnection, $Statement);
			public function DestroyMySqlManagerInstance();
			public function ExecuteInsertOrUpdate($MySqlConnection, $Statement, &$ErrorCode, &$ErrorString, &$QueryResult)
			public function ExecuteSqlSelectQuery($Query, $MySqlConnection, &$Statement, &$QueryError);
			public function GetDataBaseProccess($MySqlConnection, &$ArrayMySqlProccess, &$MySqlError);
			public function OpenDataBaseConnection(&$MySqlConnection, &$MySqlError);
**************************************************************************/

if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Config');
}

class MySqlManager
{	
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
	
	public function CloseDataBaseConnection($MySqlConnection, $Statement)
	{
		if (!is_null($MySqlConnection) && is_a($MySqlConnection, "mysqli"))
		{
			if(!is_null($Statement))
			{
				if (mysqli_close($MySqlConnection) == TRUE && $Statement->close() == TRUE)
					return Config::RET_OK;
			}
			else if (mysqli_close($MySqlConnection))
				return Config::RET_OK;
			return Config::DB_ERROR_CONNECTION_CLOSE;
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function DestroyMySqlManagerInstance()
	{
		self::$Instance = NULL;
	}
	
	public function ExecuteInsertOrUpdate($MySqlConnection, $Statement, &$ErrorCode, &$ErrorString, &$QueryResult)
	{
		$QueryResult = NULL; $ErrorCode = NULL; $ErrorString = NULL;

		if (!is_null($Statement))
		{
			if ($this->Config->EnableLogMySqlQuery || $this->Config->EnableLogMySqlError)
			{
				$Log = $this->Factory->CreateLog($this->Config->DefaultLogPath);
				if ($this->Config->EnableLogMySqlQuery)
					$Log->WriteLog(Config::DB_LOG_QUERY, $Statement);	
			}
			if($QueryResult = $Statement->execute())
				return Config::RET_OK;
			else
			{
				$ErrorCode = mysqli_errno($MySqlConnection);
				$ErrorString = $Statement->error;
				if ($this->Config->EnableLogMySqlError)
					$Log->WriteLog(Config::DB_LOG_ERROR, $ErrorCode . ": " . $ErrorString);
				return Config::DB_ERROR_QUERY_SQL;
			}
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function ExecuteSqlSelectQuery($Query, $MySqlConnection, &$Statement, &$QueryError)
	{
		$QueryResult = NULL; $QueryError = NULL;

		if (!is_null($MySqlConnection))
		{
			if ($this->Config->EnableLogMySqlQuery || $this->Config->EnableLogMySqlError)
			{
				$Log = $this->Factory->CreateLog($this->Config->DefaultLogPath);
				if ($this->Config->EnableLogMySqlQuery)
					$Log->WriteLog(Config::DB_LOG_QUERY, $Query);	
				if ($this->Config->EnableLogMySqlError)
					$Log->WriteLog(Config::DB_LOG_ERROR, $QueryError);
			}
			if($Statement == NULL)
			{
				if(!is_null($Query))
				{
					if(!($Statement = $MySqlConnection->prepare($Query)))
					{
						$QueryError = $MySqlConnection->error;
						return Config::DB_ERROR_QUERY_PREPARE;
					}
				}
				else return Config::DB_ERROR_QUERY_EMPTY;
			}
			if($Statement->execute())
				return Config::RET_OK;
			else
			{
				$QueryError = $Statement->error; 
				return Config::DB_ERROR_QUERY_SQL;
			}
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function GetDataBaseProccess($MySqlConnection, &$ArrayMySqlProccess, &$MySqlError)
	{
		$ArrayMySqlProccess = array(); $MySqlConnection = NULL;
		
		if (!is_null($MySqlConnection))
		{
			$queryResult = mysqli_get_client_stats ($MySqlConnection);
			while ($row = mysqli_fetch_assoc($queryResult))
				array_push($ArrayMySqlProccess, $row["Id"] . " " .  $row["Host"] . " " 
				           . $row["db"] . " " . $row["Command"] . " " . $row["Time"]);
			mysqli_free_result($queryResult);	
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function OpenDataBaseConnection(&$MySqlConnection, &$MySqlError)
	{
		$return = NULL; $selectedDataBase = NULL; $MySqlError = NULL;
		if ($MySqlConnection == NULL || !is_a($MySqlConnection, "mysqli"))
		{
			try
			{
				
				$MySqlConnection = @mysqli_connect($this->MySqlAddress, $this->MySqlUser, $this->MySqlPassword,
												   $this->MySqlDataBase, $this->MySqlPort);
				if (is_object($MySqlConnection)) 
				{
					$MySqlConnection->set_charset(Config::DB_CHATSET_UTF8);
					$MySqlConnection->options(MYSQLI_OPT_CONNECT_TIMEOUT, ProjectConfig::$MySqlOptionTimeOut);
					return Config::RET_OK;
				}
				else 
				{
					$MySqlError = "Error: " . mysqli_connect_error() . " - " . mysqli_connect_errno();
					if(mysqli_connect_errno() == Config::DB_CODE_ERROR_ACCESS_DENIED)
						return Config::DB_CODE_ERROR_ACCESS_DENIED;
					return Config::DB_ERROR_CONNECTION_OPEN;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				if(mysqli_connect_errno() == "1049")
					return Config::DB_ERROR_CONNECTION_REFUSED;
				elseif(mysqli_connect_errno() == "1049")
					return Config::DB_ERROR_DATABASE_NOT_FOUND;
				else return Config::DB_ERROR_CONNECTION_OPEN;
			}
		}
		elseif(is_a($MySqlConnection, "mysqli"))
			return Config::RET_OK;
		else return Config::DB_ERROR_CONNECTION_NOT_EMPTY;
	}
}
?>