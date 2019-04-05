<?php

/************************************************************************
Class: InfraToolsFacedePersistenceIpAddress
Creation: 2019/01/24
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Model/MySqlManager.php
			InfraTools - Php/Controller/Config.php
			InfraTools - Php/Model/InfraToolsPersistence.php
			InfraTools - Php/Model/InfraToolsIpAddress.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of InfraTools Ip Address
Functions: 
			public function InfraToolsIpAddressDeleteByIpAddressIpv4($IpAddressIpv4, $Debug, $MySqlConnection);
			public function InfraToolsIpAddressInsert($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $IpAddressNetwork, 
			                                          $Debug, $MySqlConnection);
			public function InfraToolsIpAddressSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsIpAddress, &$RowCount, 
			                                          $Debug, $MySqlConnection);
			public function InfraToolsIpAddressSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsIpAddress, 
															         &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsIpAddressSelectByIpAddressIpv6($Limit1, $Limit2, $IpAddressIpv6, &$ArrayInstanceInfraToolsIpAddress, 
															         &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsIpAddressSelectNoLimit(&$ArrayInstanceInfraToolsIpAddress, $Debug, $MySqlConnection);
			public function InfraToolsIpAddressUpdateByIpAddressIpv4($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
			                                                         $IpAddressNetworkNew, $IpAddressIpv4, $Debug, $MySqlConnection)
			public function InfraToolsIpAddressUpdateByIpAddressIpv6($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
			                                                         $IpAddressNetworkNew, $IpAddressIpv6, 
			                                                         $Debug, $MySqlConnection);
**************************************************************************/

if (!class_exists("ConfigInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class ConfigInfraTools');
}

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsFacedePersistenceIpAddress
{	
	/* Instance */
	protected static $Instance;
	protected        $InfraToolsConfig  = NULL;
	protected        $MySqlManager      = NULL;
	protected        $InfraToolsFactory = NULL;
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->InfraToolsFactory == NULL)
			$this->InfraToolsFactory = InfraToolsFactory::__create();
		if ($this->InfraToolsConfig == NULL)
			$this->InfraToolsConfig = $this->InfraToolsFactory->CreateConfigInfraTools();
		if ($this->MySqlManager == NULL)
		{
			$this->MySqlManager = $this->InfraToolsFactory->CreateMySqlManager($this->InfraToolsConfig->DefaultMySqlAddress,
			                                                         $this->InfraToolsConfig->DefaultMySqlPort,
																	 $this->InfraToolsConfig->DefaultMySqlDataBase,
			                                                         $this->InfraToolsConfig->DefaultMySqlUser, 
																	 $this->InfraToolsConfig->DefaultMySqlUserPassword);
		}
    }
	
	/* Create */
	public static function __create()
    {
        if (!isset(self::$Instance) || strcmp(get_class(self::$Instance), __CLASS__) != 0) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	public function InfraToolsIpAddressDeleteByIpAddressIpv4($IpAddressIpv4, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsIpAddressDeleteByIpAddressIpv4');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsIpAddressDeleteByIpAddressIpv4());
			if ($stmt)
			{
				$stmt->bind_param("s", $IpAddressIpv4);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_IP_ADDRESS_DEL_BY_IP_ADDRESS_IPV4;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return ConfigInfraTools::DB_ERROR_IP_ADDRESS_DEL_BY_IP_ADDRESS_IPV4;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsIpAddressInsert($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $IpAddressNetwork, 
											  $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsIpAddressInsert');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsIpAddressInsert());
			if ($stmt)
			{
				$stmt->bind_param("ssss", $IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $IpAddressNetwork);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL)
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_IP_ADDRESS_INSERT;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsIpAddressSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsIpAddress, &$RowCount, 
											  $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsIpAddress = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsIpAddressSelect');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsIpAddressSelect());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsIpAddress = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if(isset($row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME]))
						{
							$InstanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork(
																		$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP],
																		$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME],
																		$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK],
																		$row["Network".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						} 
						else $InstanceInfraToolsNetwork = $row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK];
						$InstanceInfraToolsIpAddress = $this->InfraToolsFactory->CreateInfraToolsIpAddress(
							                                        $row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION],
																	$row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4],
																	$row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6],
						                                            $InstanceInfraToolsNetwork,
						                                            $row["IpAddress".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsIpAddress, $InstanceInfraToolsIpAddress);
					}
					if(!empty($ArrayInstanceInfraToolsIpAddress))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_IP_ADDRESS_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_IP_ADDRESS_SEL;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
		}
			}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsIpAddressSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsIpAddress, 
															 &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsIpAddress = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsIpAddressSelectByIpAddressIpv4');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsIpAddressSelectByIpAddressIpv4());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$IpAddressIpv4Like = "%".$IpAddressIpv4."%";
				$stmt->bind_param("ssii", $IpAddressIpv4, $IpAddressIpv4Like, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsIpAddress = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if(isset($row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME]))
						{
							$InstanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork(
																		$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP],
																		$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME],
																		$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK],
																		$row["Network".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						} 
						else $InstanceInfraToolsNetwork = $row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK];
						$InstanceInfraToolsIpAddress = $this->InfraToolsFactory->CreateInfraToolsIpAddress(
							                                        $row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION],
																	$row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4],
																	$row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6],
						                                            $InstanceInfraToolsNetwork,
						                                            $row["IpAddress".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsIpAddress, $InstanceInfraToolsIpAddress);
					}
					if(!empty($ArrayInstanceInfraToolsIpAddress))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function InfraToolsIpAddressSelectByIpAddressIpv6($Limit1, $Limit2, $IpAddressIpv6, &$ArrayInstanceInfraToolsIpAddress, 
															 &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsIpAddress = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsIpAddressSelectByIpAddressIpv6');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsIpAddressSelectByIpAddressIpv6());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $IpAddressIpv6, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsIpAddress = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if(isset($row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME]))
						{
							$InstanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork(
																		$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP],
																		$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME],
																		$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK],
																		$row["Network".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						} 
						else $InstanceInfraToolsNetwork = $row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK];
						$InstanceInfraToolsIpAddress = $this->InfraToolsFactory->CreateInfraToolsIpAddress(
							                                        $row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION],
																	$row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4],
																	$row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6],
						                                            $InstanceInfraToolsNetwork,
						                                            $row["IpAddress".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsIpAddress, $InstanceInfraToolsIpAddress);
					}
					if(!empty($ArrayInstanceInfraToolsIpAddress))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV6_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV6;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsIpAddressSelectNoLimit(&$ArrayInstanceInfraToolsIpAddress, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;	
		$ArrayInstanceInfraToolsIpAddress = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlInfraToolsIpAddressSelectNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlInfraToolsIpAddressSelectNoLimit()))
			{
				$ArrayInstanceInfraToolsIpAddress = array();
				while ($row = $result->fetch_assoc()) 
				{
					if(isset($row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME]))
					{
						$InstanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork(
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK],
																	$row["Network".ConfigInfraTools::TB_FD_REGISTER_DATE]);
					} 
					else $InstanceInfraToolsNetwork = $row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK];
					$InstanceInfraToolsIpAddress = $this->InfraToolsFactory->CreateInfraToolsIpAddress(
																$row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION],
																$row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4],
																$row[ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6],
																$InstanceInfraToolsNetwork,
																$row["IpAddress".ConfigInfraTools::TB_FD_REGISTER_DATE]);
					array_push($ArrayInstanceInfraToolsIpAddress, $InstanceIpAddress);
				}
				if(!empty($ArrayInstanceInfraToolsIpAddress))
					return ConfigInfraTools::RET_OK;
				else return ConfigInfraTools::DB_ERROR_IP_ADDRESS_SEL_FETCH;
			}
			else 
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = ConfigInfraTools::DB_ERROR_IP_ADDRESS_SEL;
			}
			return $return;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsIpAddressUpdateByIpAddressIpv4($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
															 $IpAddressNetworkNew, $IpAddressIpv4, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsIpAddressUpdateByIpAddressIpv4');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsIpAddressUpdateByIpAddressIpv4());
			if ($stmt)
			{
				$stmt->bind_param("sssss", $IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New, $IpAddressNetworkNew,
								           $IpAddressIpv4);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_UPDT_SAME_VALUE;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
						return ConfigInfraTools::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE;
					else return ConfigInfraTools::DB_ERROR_IP_ADDRESS_UPDT_BY_IP_ADDRESS_IPV4;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsIpAddressUpdateByIpAddressIpv6($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
															 $IpAddressNetworkNew, $IpAddressIpv6, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsIpAddressUpdateByIpAddressIpv6');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsIpAddressUpdateByIpAddressIpv6());
			if ($stmt)
			{
				$stmt->bind_param("sssss", $IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New, $IpAddressNetworkNew,
								           $IpAddressIpv6);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_UPDT_SAME_VALUE;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
						return ConfigInfraTools::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE;
					else return ConfigInfraTools::DB_ERROR_IP_ADDRESS_UPDT_BY_IP_ADDRESS_IPV6;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
}