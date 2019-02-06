<?php

/************************************************************************
Class: InfraToolsFacedePersistenceNetwork
Creation: 2019/01/24
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Model/MySqlManager.php
			InfraTools - Php/Controller/Config.php
			InfraTools - Php/Model/InfraToolsPersistence.php
			InfraTools - Php/Model/InfraToolsNetwork.php
	
Description: 
			Classe used to deal with network database information.
Functions: 
			public function InfraToolsNetworkDeleteByNetworkName($NetworkName, $Debug, $MySqlConnection);
			public function InfraToolsNetworkInsert($NetworkIp, $NetworkName, $NetworkNetmask, $Debug, $MySqlConnection);
			public function InfraToolsNetworkSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsNetwork, &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsNetworkSelectByNetworkIp($Limit1, $Limit2, $NetworkIp, &$ArrayInstanceInfraToolsNetwork 
															   &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsNetworkSelectByNetworkName($Limit1, $Limit2, $NetworkName, &$ArrayInstanceInfraToolsNetwork, 
													             &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsNetworkSelectByNetworkNetmask($Limit1, $Limit2, $NetworkNetmask, &$ArrayInstanceInfraToolsNetwork, 
															        &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsNetworkSelectNoLimit(&$ArrayInstanceInfraToolsNetwork, $Debug, $MySqlConnection);
			public function InfraToolsNetworkUpdateByNetworkName($NetworkIpNew, $NetworkNameNew, $NetworkNetmaskNew, $NetworkName,
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

class InfraToolsFacedePersistenceNetwork
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
	
	public function InfraToolsNetworkDeleteByNetworkName($NetworkName, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsNetworkDeleteByNetworkName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsNetworkDeleteByNetworkName());
			if ($stmt)
			{
				$stmt->bind_param("s", $NetworkName);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_NETWORK_DEL_BY_NETWORK_NAME;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return ConfigInfraTools::DB_ERROR_NETWORK_DEL_BY_NETWORK_NAME;
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
	
	public function InfraToolsNetworkInsert($NetworkIp, $NetworkName, $NetworkNetmask, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsNetworkInsert');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsNetworkInsert());
			if ($stmt)
			{
				$stmt->bind_param("sss", $NetworkIp, $NetworkName, $NetworkNetmask);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL)
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_NETWORK_INSERT;
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
	
	public function InfraToolsNetworkSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsNetwork, &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsNetwork = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsNetworkSelect');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsNetworkSelect());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsNetwork = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork(
							                                        $row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK],
						                                            $row["Network".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsNetwork, $InstanceInfraToolsNetwork);
					}
					if(!empty($ArrayInstanceInfraToolsNetwork))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_NETWORK_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_NETWORK_SEL;
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
	
	public function InfraToolsNetworkSelectByNetworkIp($Limit1, $Limit2, $NetworkIp, &$ArrayInstanceInfraToolsNetwork, 
													   &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsNetwork = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsNetworkSelectByNetworkIp');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsNetworkSelectByNetworkIp());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $NetworkIp, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsNetwork = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork(
							                                        $row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK],
						                                            $row["Network".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsNetwork, $InstanceInfraToolsNetwork);
					}
					if(!empty($ArrayInstanceInfraToolsNetwork))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_NETWORK_SEL_BY_NETWORK_IP_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_NETWORK_SEL_BY_NETWORK_IP;
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
	
	public function InfraToolsNetworkSelectByNetworkName($Limit1, $Limit2, $NetworkName, &$ArrayInstanceInfraToolsNetwork, 
													     &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsNetwork = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsNetworkSelectByNetworkName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsNetworkSelectByNetworkName());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;	
				$stmt->bind_param("sii", $NetworkName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsNetwork = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork(
							                                        $row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK],
						                                            $row["Network".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsNetwork, $InstanceInfraToolsNetwork);
					}
					if(!empty($ArrayInstanceInfraToolsNetwork))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_NETWORK_SEL_BY_NETWORK_NAME_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_NETWORK_SEL_BY_NETWORK_NAME;
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
	
	public function InfraToolsNetworkSelectByNetworkNetmask($Limit1, $Limit2, $NetworkNetmask, &$ArrayInstanceInfraToolsNetwork, 
															&$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsNetwork = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsNetworkSelectByNetworkNetmask');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsNetworkSelectByNetworkNetmask());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $NetworkNetmask, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsNetwork = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork(
							                                        $row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME],
																	$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK],
						                                            $row["Network".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsNetwork, $InstanceInfraToolsNetwork);
					}
					if(!empty($ArrayInstanceInfraToolsNetwork))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_NETWORK_SEL_BY_NETWORK_NETMASK_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_NETWORK_SEL_BY_NETWORK_NETMASK;
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
	
	public function InfraToolsNetworkSelectNoLimit(&$ArrayInstanceInfraToolsNetwork, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $errorCode = NULL;	
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlInfraToolsNetworkSelectNoLimit');
			if($result = $MySqlConnection->query(Persistence::SqlInfraToolsNetworkSelectNoLimit()))
			{
				$ArrayInstanceInfraToolsNetwork = array();
				while ($row = $result->fetch_assoc()) 
				{

					$InstanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork(
																$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP],
																$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME],
																$row[ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK],
																$row["Network".ConfigInfraTools::TB_FD_REGISTER_DATE]);
					array_push($ArrayInstanceInfraToolsNetwork, $InstanceInfraToolsNetwork);
				}
				if(!empty($ArrayInstanceInfraToolsNetwork))
					return ConfigInfraTools::RET_OK;
				else return ConfigInfraTools::DB_ERROR_NETWORK_SEL_FETCH;
			}
			else 
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = ConfigInfraTools::DB_ERROR_NETWORK_SEL;
			}
			return $return;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}

	
	public function InfraToolsNetworkUpdateByNetworkName($NetworkIpNew, $NetworkNameNew, $NetworkNetmaskNew, $NetworkName,
														 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolAssocUserService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsNetworkUpdateByNetworkName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsNetworkUpdateByNetworkName());
			if ($stmt)
			{
				$stmt->bind_param("ssss", $NetworkIpNew, $NetworkNameNew, $NetworkNetmaskNew, $NetworkName);
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
					else return ConfigInfraTools::DB_ERROR_NETWORK_UPDT_BY_NETWORK_NAME;
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