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
			                                                                           $MySqlConnection = NULL);
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
	
	public function SystemConfigurationDeleteBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, $Debug, 
																			   $MySqlConnection = NULL)
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
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_SYSTEM_CONFIGURATION_DELETE_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_SYSTEM_CONFIGURATION_DELETE_FAILED;
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
					return Config::SUCCESS;
				else
				{
					if($errorCode == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE;
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_SYSTEM_CONFIGURATION_INSERT_FAILED;
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
	
	public function SystemConfigurationSelect($Limit1, $Limit2, &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug, $MySqlConnection)
	{
		$ArrayInstanceSystemConfiguration = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlSystemConfigurationSelect());
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
						$InstanceSystemConfiguration = $this->Factory->CreateSystemConfiguration
							                            ($row[Config::TABLE_FIELD_REGISTER_DATE],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_ACTIVE],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_DESCRIPTION],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_VALUE]);	
						array_push($ArrayInstanceSystemConfiguration, $InstanceSystemConfiguration);
					}
					if(!empty($ArrayInstanceSystemConfiguration))
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
	
	public function SystemConfigurationSelectBySystemConfigurationOptionName($Limit1, $Limit2, $SystemConfigurationOptionName, 
																			 &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug,
																			 $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceSystemConfiguration = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationSelectBySystemConfigurationOptionName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlSystemConfigurationSelectBySystemConfigurationOptionName());
			if($stmt != NULL)
			{
				$SystemConfigurationOptionName = "%".$SystemConfigurationOptionName."%"; 
				$stmt->bind_param("sii", $SystemConfigurationOptionName, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceSystemConfiguration = $this->Factory->CreateSystemConfiguration
														($row[Config::TABLE_FIELD_REGISTER_DATE],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_ACTIVE],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_DESCRIPTION],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER],
														 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_VALUE]);
						array_push($ArrayInstanceSystemConfiguration, $InstanceSystemConfiguration);
					}
					if(!empty($ArrayInstanceSystemConfiguration))
						return Config::SUCCESS;
					else return Config::MYSQL_SYSTEM_CONFIGURATION_SELECT_BY_OPTION_NAME_FETCH_FAILED;
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_SYSTEM_CONFIGURATION_SELECT_BY_OPTION_NAME_FAILED;
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
				if($return == Config::SUCCESS)
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
						return Config::SUCCESS;
					}
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::MYSQL_SYSTEM_CONFIGURATION_SELECT_BY_OPTION_NUMB_FETCH_FAILED;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_SYSTEM_CONFIGURATION_SELECT_BY_OPTION_NUMB_FAILED;
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
	
	public function SystemConfigurationSelectNoLimit(&$ArrayInstanceSystemConfiguration, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceSystemConfiguration = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationSelectNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlSystemConfigurationSelectNoLimit()))
			{
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceSystemConfiguration = $this->Factory->CreateSystemConfiguration
													($row[Config::TABLE_FIELD_REGISTER_DATE],
													 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_ACTIVE],
													 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_DESCRIPTION],
													 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME],
													 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER],
													 $row[Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_VALUE]);	
					array_push($ArrayInstanceSystemConfiguration, $InstanceSystemConfiguration);
				}
				if(!empty($ArrayInstanceSystemConfiguration))
					return Config::SUCCESS;
				else return Config::MYSQL_SYSTEM_CONFIGURATION_SELECT_FETCH_FAILED;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::MYSQL_SYSTEM_CONFIGURATION_SELECT_FAILED;
			}
			return $return;
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function SystemConfigurationUpdateByOptionNumber($TypeAssocUserTeamDescription, $SystemConfigurationOptionNumber, 
															$Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlSystemConfigurationUpdateByOptionNumber');
			$stmt = $MySqlConnection->prepare(Persistence::SqlSystemConfigurationUpdateByOptionNumber());
			if ($stmt)
			{
				$stmt->bind_param("si", $TypeAssocUserTeamDescription, $SystemConfigurationOptionNumber);
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
					return Config::MYSQL_TYPE_ASSOC_USER_TEAM_UPDATE_FAILED;
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