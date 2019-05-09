<?php

/************************************************************************
Class: InfraToolsFacedePersistenceAssocIpAddressService
Creation: 2019/02/11
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/ConfigInfraTools.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/InfraToolsPersistence.php
			Base       - Php/Model/InfraToolsAssocIpAddressService.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of association between InfraTools Ip Address and InfraTools Service
Functions: 
			public function InfraToolsAssocIpAddressServiceDeleteByServiceId($AssocIpAddressServiceServiceId, $Debug, $MySqlConnection);
			public function InfraToolsAssocIpAddressServiceDeleteByServiceIdAndIpAddressIpv4($AssocIpAddressServiceServiceId,
			                                                                                 $AssocIpAddressServiceServiceIp, 
			                                                                                 $Debug, $MySqlConnection);
			public function InfraToolsAssocIpAddressServiceInsert($AssocIpAddressServiceServiceId, $AssocIpAddressServiceServiceIp,
													              $Debug, $MySqlConnection)
			public function InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2, &ArrayInstanceInfraToolsAssocIpAddressService, 
																  &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsAssocIpAddressServiceSelectByServiceId($Limit1, $Limit2, $AssocIpAddressServiceServiceId,
			                                                                 &$ArrayInstanceInfraToolsAssocIpAddressService,
			                                                                 $RowCount, $Debug, $MySqlConnection);
			public function InfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit($AssocIpAddressServiceServiceId,
			                                                                        &$ArrayInstanceInfraToolsAssocIpAddressService,
			                                                                        $Debug, $MySqlConnection);
	        public function InfraToolsAssocIpAddressServiceSelectNoLimit(&ArrayInstanceInfraToolsAssocIpAddressService,
			                                                             $Debug, $MySqlConnection);
			public function InfraToolsAssocIpAddressServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
			                                                                   &$ArrayInstanceInfraToolsAssocIpAddressService, 
			                                                                  $Debug, $MySqlConnection);
			public function InfraToolsAssocIpAddressServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsAssocIpAddressService,
			                                                                          $UserEmail, $Debug, $MySqlConnection);

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

class InfraToolsFacedePersistenceAssocIpAddressService
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

	public function InfraToolsAssocIpAddressServiceDeleteByServiceId($AssocIpAddressServiceServiceId, $Debug, $MySqlConnection)
	{
	    $errorStr = NULL; $errorCode = NULL; $mySqlError = NULL; $queryResult = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsAssocIpAddressServiceDeleteByServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsAssocIpAddressServiceDeleteByServiceId());
			if ($stmt)
			{
				$stmt->bind_param("i", $AssocIpAddressServiceServiceId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_DEL_BY_SERVICE_ID;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_DEL_BY_SERVICE_ID;
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
	
	public function InfraToolsAssocIpAddressServiceDeleteByServiceIdAndIpAddressIpv4($AssocIpAddressServiceServiceId,
			                                                                         $AssocIpAddressServiceServiceIp, 
																					 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsAssocIpAddressServiceDeleteByServiceIdAndIpAddressIpv4');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsAssocIpAddressServiceDeleteByServiceIdAndIpAddressIpv4());
			if ($stmt)
			{
				$stmt->bind_param("is", $AssocIpAddressServiceServiceId, $AssocIpAddressServiceServiceIp);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_DEL_BY_IP_ADDRESS_AND_SERVICE_ID;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_DEL_BY_IP_ADDRESS_AND_SERVICE_ID;
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

	public function InfraToolsAssocIpAddressServiceInsert($AssocIpAddressServiceServiceId, $AssocIpAddressServiceServiceIp,
													      $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsAssocIpAddressServiceInsert');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsAssocIpAddressServiceInsert());
			if ($stmt)
			{
				$stmt->bind_param("is", $AssocIpAddressServiceServiceId, $AssocIpAddressServiceServiceIp);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL)
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_INSERT;
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

	public function InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsAssocIpAddressService, &$RowCount, 
														  $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsAssocIpAddressService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsAssocIpAddressServiceSelect');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsAssocIpAddressServiceSelect());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsAssocIpAddressService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsAssocIpAddressService = $this->InfraToolsFactory->CreateInfraToolsAssocIpAddressService(
													$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID],
													$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4],
													$row["AssocIpAddressService".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsAssocIpAddressService, $InstanceInfraToolsAssocIpAddressService);
					}
					if(!empty($ArrayInstanceInfraToolsAssocIpAddressService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL;
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

	public function InfraToolsAssocIpAddressServiceSelectByServiceId($Limit1, $Limit2, $AssocIpAddressServiceServiceId,
			                                                                 &$ArrayInstanceInfraToolsAssocIpAddressService,
																			 $RowCount, $Debug, $MySqlConnection)
	{

	}
	public function InfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit($AssocIpAddressServiceServiceId,
																			&$ArrayInstanceInfraToolsAssocIpAddressService,
																			$Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsAssocIpAddressService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("i", $AssocIpAddressServiceServiceId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsAssocIpAddressService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsAssocIpAddressService = $this->InfraToolsFactory->CreateInfraToolsAssocIpAddressService(
																	$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID],
																	$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4],
						                                            $row["AssocIpAddressService".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsAssocIpAddressService, $InstanceInfraToolsAssocIpAddressService);
					}
					if(!empty($ArrayInstanceInfraToolsAssocIpAddressService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL;
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
	
	public function InfraToolsAssocIpAddressServiceSelectNoLimit(&$ArrayInstanceInfraToolsAssocIpAddressService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsAssocIpAddressService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsAssocIpAddressServiceSelectNoLimit');
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(InfraToolsPersistence::SqlInfraToolsAssocIpAddressServiceSelectNoLimit()))
			{
				$ArrayInstanceInfraToolsAssocIpAddressService = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceInfraToolsAssocIpAddressService = $this->InfraToolsFactory->CreateInfraToolsAssocIpAddressService(
											$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID],
											$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4],
											$row["AssocIpAddressService".ConfigInfraTools::TB_FD_REGISTER_DATE]);
					array_push($ArrayInstanceInfraToolsAssocIpAddressService, $InstanceInfraToolsAssocIpAddressService);
				}
				if(!empty($ArrayInstanceInfraToolsAssocIpAddressService))
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL_FETCH;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsAssocIpAddressServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
																	   &$ArrayInstanceInfraToolsAssocIpAddressService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsAssocIpAddressService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsAssocIpAddressServiceSelectOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::InfraToolsAssocIpAddressServiceSelectOnUserContext());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsAssocIpAddressService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsAssocIpAddressService = $this->InfraToolsFactory->CreateInfraToolsAssocIpAddressService(
													$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID],
													$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4],
													$row["AssocIpAddressService".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsAssocIpAddressService, $InstanceInfraToolsAssocIpAddressService);
					}
					if(!empty($ArrayInstanceInfraToolsAssocIpAddressService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL;
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
	
	public function InfraToolsAssocIpAddressServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsAssocIpAddressService, 
																			  $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsAssocIpAddressService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsAssocIpAddressServiceSelectOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsAssocIpAddressServiceSelectOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsAssocIpAddressService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsAssocIpAddressService = $this->InfraToolsFactory->CreateInfraToolsAssocIpAddressService(
													$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID],
													$row[ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4],
													$row["AssocIpAddressService".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsAssocIpAddressService, $InstanceInfraToolsAssocIpAddressService);
					}
					if(!empty($ArrayInstanceInfraToolsAssocIpAddressService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL;
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