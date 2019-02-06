<?php

/************************************************************************
Class: FacedePersistenceSystemConfiguration
Creation: 14/06/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/SystemConfiguration.php
	
Description: 
			Classe used to access and deal with information of the database about type of association betweeen a user and a team.
Functions: 
			public function SystemConfigurationDeleteBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, $Debug,
			                                                                           $MySqlConnection);
			public function SystemConfigurationInsert($SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
													  $SystemConfigurationOptionName, $SystemConfigurationOptionValue, $Debug,
													  $MySqlConnection);
			public function SystemConfigurationSelect($Limit1, $Limit2, &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug,
			                                          $MySqlConnection);
			public function SystemConfigurationSelectBySystemConfigurationOptionName($Limit1, $Limit2, $SystemConfigurationOptionName, 
																					 &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug,
																					 $MySqlConnection);
			public function SystemConfigurationSelectBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, 
																					   &$InstanceSystemConfiguration, $Debug,
																					   $MySqlConnection);
			public function SystemConfigurationSelectNoLimit(&$ArrayInstanceSystemConfiguration, $Debug, $MySqlConnection);
			public function SystemConfigurationUpdateBySystemConfigurationOptionNumber($SystemConfigurationOptionActiveNew,
																					   $SystemConfigurationOptionDescriptionNew,
																					   $SystemConfigurationOptionNameNew,
																					   $SystemConfigurationOptionValueNew,
																					   $SystemConfigurationOptionNumber, $Debug,
																					   $MySqlConnection);
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

class FacedePersistenceSystemConfiguration
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
	
	public function SystemConfigurationDeleteBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationDeleteBySystemConfigurationOptionNumber');
			$stmt = $MySqlConnection->prepare(Persistence::SqlSystemConfigurationDeleteBySystemConfigurationOptionNumber());
			if ($stmt)
			{
				$stmt->bind_param("i", $SystemConfigurationOptionNumber);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_SYSTEM_CONFIGURATION_DEL;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return Config::DB_ERROR_SYSTEM_CONFIGURATION_DEL;
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
	
	public function SystemConfigurationInsert($SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
											  $SystemConfigurationOptionName, $SystemConfigurationOptionValue, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlSystemConfigurationInsert());
			if ($stmt)
			{
				$stmt->bind_param("isss", $SystemConfigurationOptionActive, $SystemConfigurationOptionDescription, 
								          $SystemConfigurationOptionName, $SystemConfigurationOptionValue);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				else
				{
					if($errorCode == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE;
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_SYSTEM_CONFIGURATION_INSERT;
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
	
	public function SystemConfigurationSelect($Limit1, $Limit2, &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceSystemConfiguration = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlSystemConfigurationSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceSystemConfiguration = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceSystemConfiguration = $this->Factory->CreateSystemConfiguration
							                            ($row[Config::TB_FD_REGISTER_DATE],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_ACTIVE],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_DESCRIPTION],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NAME],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_VALUE]);	
						array_push($ArrayInstanceSystemConfiguration, $InstanceSystemConfiguration);
					}
					if(!empty($ArrayInstanceSystemConfiguration))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_SYSTEM_CONFIGURATION_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_SYSTEM_CONFIGURATION_SEL;
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
	
	public function SystemConfigurationSelectBySystemConfigurationOptionName($Limit1, $Limit2, $SystemConfigurationOptionName, 
																			 &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug,
																			 $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceSystemConfiguration = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationSelectBySystemConfigurationOptionName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlSystemConfigurationSelectBySystemConfigurationOptionName());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$SystemConfigurationOptionName = "%".$SystemConfigurationOptionName."%"; 
				$stmt->bind_param("sii", $SystemConfigurationOptionName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceSystemConfiguration = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceSystemConfiguration = $this->Factory->CreateSystemConfiguration
														($row[Config::TB_FD_REGISTER_DATE],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_ACTIVE],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_DESCRIPTION],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NAME],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER],
														 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_VALUE]);
						array_push($ArrayInstanceSystemConfiguration, $InstanceSystemConfiguration);
					}
					if(!empty($ArrayInstanceSystemConfiguration))
						return Config::RET_OK;
					else return Config::DB_ERROR_SYSTEM_CONFIGURATION_SEL_BY_OPTION_NAME_FETCH;
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_SYSTEM_CONFIGURATION_SEL_BY_OPTION_NAME;
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
	
	public function SystemConfigurationSelectBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, 
																			   &$InstanceSystemConfiguration, $Debug,
																			   $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationSelectBySystemConfigurationOptionNumber');
			$stmt = $MySqlConnection->prepare(Persistence::SqlSystemConfigurationSelectBySystemConfigurationOptionNumber());
			if($stmt != NULL)
			{
				$stmt->bind_param("i", $SystemConfigurationOptionNumber);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
									   $SystemConfigurationOptionName, $SystemConfigurationOptionNumber, $SystemConfigurationOptionValue,
									   $RegisterDate);
					if ($stmt->fetch())
					{

						$InstanceSystemConfiguration = $this->Factory->CreateSystemConfiguration($RegisterDate,
																								 $SystemConfigurationOptionActive,
																								 $SystemConfigurationOptionDescription,
																								 $SystemConfigurationOptionName,
																								 $SystemConfigurationOptionNumber,
																								 $SystemConfigurationOptionValue);
						return Config::RET_OK;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_SYSTEM_CONFIGURATION_SEL_BY_OPTION_NUMB_FETCH;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_SYSTEM_CONFIGURATION_SEL_BY_OPTION_NUMB;
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
	
	public function SystemConfigurationSelectNoLimit(&$ArrayInstanceSystemConfiguration, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceSystemConfiguration = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationSelectNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlSystemConfigurationSelectNoLimit()))
			{
				$ArrayInstanceSystemConfiguration = array();
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceSystemConfiguration = $this->Factory->CreateSystemConfiguration
													($row[Config::TB_FD_REGISTER_DATE],
													 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_ACTIVE],
													 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_DESCRIPTION],
													 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NAME],
													 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER],
													 $row[Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_VALUE]);	
					array_push($ArrayInstanceSystemConfiguration, $InstanceSystemConfiguration);
				}
				if(!empty($ArrayInstanceSystemConfiguration))
					return Config::RET_OK;
				else return Config::DB_ERROR_SYSTEM_CONFIGURATION_SEL_FETCH;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::DB_ERROR_SYSTEM_CONFIGURATION_SEL;
			}
			return $return;
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function SystemConfigurationUpdateBySystemConfigurationOptionNumber($SystemConfigurationOptionActiveNew,
																			   $SystemConfigurationOptionDescriptionNew,
																			   $SystemConfigurationOptionNameNew,
																			   $SystemConfigurationOptionValueNew,
																		       $SystemConfigurationOptionNumber, $Debug,
																			   $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationUpdateBySystemConfigurationOptionNumber');
			$stmt = $MySqlConnection->prepare(Persistence::SqlSystemConfigurationUpdateBySystemConfigurationOptionNumber());
			if ($stmt)
			{
				$stmt->bind_param("isssi", $SystemConfigurationOptionActiveNew, $SystemConfigurationOptionDescriptionNew,
								        $SystemConfigurationOptionNameNew, $SystemConfigurationOptionValueNew,
								        $SystemConfigurationOptionNumber);
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
					return Config::DB_ERROR_SYSTEM_CONFIGURATION_UPDT;
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