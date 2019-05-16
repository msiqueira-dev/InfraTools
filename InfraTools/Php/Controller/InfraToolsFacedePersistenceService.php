<?php

/************************************************************************
Class: InfraToolsFacedePersistenceService
Creation: 2018/06/25
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Model/MySqlManager.php
			InfraTools - Php/Controller/Config.php
			InfraTools - Php/Model/InfraToolsPersistence.php
			InfraTools - Php/Model/Service.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of InfraTools Service
Functions: 
			public function InfraToolsServiceDeleteByServiceId($ServiceId, $Debug, $MySqlConnection);
			public function InfraToolsServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                                        $ServiceDepartment, $ServiceDepartmentCanChange,
										            $ServiceDescription, $ServiceName, $ServiceType, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                                     &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                                       &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                                              $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, $UserEmail,
			                                                                    &$ArrayInstanceInfraToolsService, 
			                                                                    &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                                           &$ArrayInstanceInfraToolsService, 
			                                                                           $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation, &$ArrayInstanceInfraToolsService, 
										    					        &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
			                                                         $Debug, $MySqlConnection);
			public function ServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2,
			                                                               $ServiceCorporation, $UserEmail, 
			                                                               &$ArrayInstanceInfraToolsService, 
			                                                               &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
			                                                                                &$ArrayInstanceInfraToolsService, 
			                                                                                $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceDepartment($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment,
			                                                           &$ArrayInstanceInfraToolsService, &$RowCount, 
															           $Debug, $MySqlConnection);
	        public function InfraToolsServiceSelectByServiceDepartmentNoLimit($ServiceCorporation $ServiceDepartment,
			                                                                  &$ArrayInstanceInfraToolsService, $Debug);
			public function InfraToolsServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, $ServiceCorporation, 
			                                                                        $ServiceDepartment, $UserEmail, 
			                                                                        &$ArrayInstanceInfraToolsService, 
			                                                                        $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
			                                                                               &$ArrayInstanceInfraToolsService, $Debug,
																						   $MySqlConnection);
			public function InfraToolsServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, $Debug, $MySqlConnection);	
			public function InfraToolsServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
			                                                                &$TypeAssocUserServiceId, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceName($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
			                                                     &$RowCount, $Debug, $MySqlConnection);	
			public function InfraToolsServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
			                                                            $Debug, $MySqlConnection);	
			public function InfraToolsServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail, 
			                                                                  &$ArrayInstanceInfraToolsService, 
			                                                                 &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
			                                                                         &$ArrayInstanceInfraToolsService, 
			                                                                         $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceType($Limit1, $Limit2, $ServiceType, &$ArrayInstanceInfraToolsService, 
			                                                     &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, 
			                                                            $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail,
			                                                                  &$ArrayInstanceInfraToolsService, &$RowCount, 
																	          $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
			                                                                         &$ArrayInstanceInfraToolsService, 
																		             $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2, $TypeAssocUserServiceDescription, 
			                                                                         &$ArrayInstanceInfraToolsService,  &$RowCount, 
	 																	             $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription, 
			                                                                               &$ArrayInstanceInfraToolsService, 
																                           $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2,
			                                                                                     $TypeAssocUserServiceDescription, $UserEmail, 
			                                                                                     &$ArrayInstanceInfraToolsService, &$RowCount, 
																			                     $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit(
			                                                                                   $TypeAssocUserServiceDescription, 
			                                                                                   $UserEmail,
			                                                                                   &$ArrayInstanceInfraToolsService, 
																		                       $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByUser($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                              &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, 
			                                                     $Debug, $MySqlConnection);
			public function InfraToolsServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection);
			public function InfraToolsServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
			                                                   $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
											                   $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
													           $Debug, $MySqlConnection);	
			public function InfraToolsServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, 
			                                                           $ServiceNameNew, $ServiceTypeNew, 
													                   $ServiceId, $Debug, $MySqlConnection);
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

class InfraToolsFacedePersistenceService
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
	
	public function InfraToolsServiceDeleteByServiceId($ServiceId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceDeleteById');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceDeleteById());
			if ($stmt)
			{
				$stmt->bind_param("i", $ServiceId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_DEL_BY_SERVICE_ID;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					else return ConfigInfraTools::DB_ERROR_SERVICE_DEL_BY_SERVICE_ID;
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
	
	public function InfraToolsServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
							  	            $ServiceDepartment, $ServiceDepartmentCanChange,
								            $ServiceDescription, $ServiceName, $ServiceType, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL; $mySqlError = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceInsert');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceInsert());
			if ($stmt)
			{
				$stmt->bind_param("isisisss", $ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
								              $ServiceDepartment, $ServiceDepartmentCanChange, $ServiceDescription,
								              $ServiceName, $ServiceType);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_INSERT;
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
	
	public function InfraToolsServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelect');
		if($MySqlConnection != NULL)
		{
			
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else 
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = ConfigInfraTools::DB_ERROR_SERVICE_SEL;
				}
				return $return;
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
	
	public function InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                   &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectOnUserContext());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else 
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = ConfigInfraTools::DB_ERROR_SERVICE_SEL;
				}
				return $return;
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
	
	public function InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive, &$ArrayInstanceInfraToolsService, 
												           &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceActive');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceActive());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("iii", $ServiceActive, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE;
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
	
	public function InfraToolsServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceActiveNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceActiveNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("i", $ServiceActive);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE;
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
	
	public function InfraToolsServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, $UserEmail,
															            &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceActiveOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceActiveOnUserContext());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("isii", $ServiceActive, $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE;
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
	
	public function InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                                         $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceActiveOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceActiveOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("is", $ServiceActive, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE;
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
	
	public function InfraToolsServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation, &$ArrayInstanceInfraToolsService, 
													  &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceCorporation');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceCorporation());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$ServiceDepartment = "%".$ServiceCorporation."%";  
				$stmt->bind_param("sii", $ServiceCorporation, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
																	$row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																$row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																$InstanceInfraToolsCorporation, 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
															    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
															    $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													            $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION;
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
	
	public function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
															 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceCorporationNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceCorporationNoLimit());
			if($stmt != NULL)
			{
				$ServiceDepartment = "%".$ServiceCorporation."%";  
				$stmt->bind_param("s", $ServiceCorporation);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
																	$row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																$row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																$InstanceInfraToolsCorporation, 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																$row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT], 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																$row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													            $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION;
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
	
	public function ServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2, $ServiceCorporation, $UserEmail,
																   &$ArrayInstanceInfraToolsService, &$RowCount, 
																   $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceCorporationOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceCorporationOnUserContext());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$ServiceCorporation = "%".$ServiceCorporation."%";  
				$stmt->bind_param("ssii", $ServiceCorporation, $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
																	$row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																$row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																$InstanceInfraToolsCorporation, 
																$row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT], 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																$row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													            $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION;
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
	
	public function InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		            &$ArrayInstanceInfraToolsService, 
																		            $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit());
			if($stmt != NULL)
			{
				$ServiceDepartment = "%".$ServiceCorporation."%"; 
				$stmt->bind_param("ss", $ServiceCorporation, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
																	$row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																$row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																$InstanceInfraToolsCorporation, 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																$row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT], 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																$row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													            $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION;
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
	
	public function InfraToolsServiceSelectByServiceDepartment($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment, 
													           &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceDepartment');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceDepartment());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$ServiceDepartment = "%".$ServiceDepartment."%"; 
				$stmt->bind_param("ssii", $ServiceCorporation, $ServiceDepartment, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
																	$row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsDepartment = $this->InfraToolsFactory->CreateDepartment(
									                                  $InstanceInfraToolsCorporation, 
									                                  $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									                                  $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									                                  $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																$row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																$InstanceInfraToolsCorporation, 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																$InstanceInfraToolsDepartment, 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																$row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													            $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT;
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
	
	public function InfraToolsServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment, 
															          &$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceDepartmentNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceDepartmentNoLimit());
			if($stmt != NULL)
			{
				$ServiceDepartment = "%".$ServiceDepartment."%"; 
				$stmt->bind_param("ss", $ServiceCorporation, $ServiceDepartment);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
																	$row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsDepartment = $this->InfraToolsFactory->CreateDepartment(
									                                  $InstanceInfraToolsCorporation, 
									                                  $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									                                  $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									                                  $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																$row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																$InstanceInfraToolsCorporation, 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																$InstanceInfraToolsDepartment, 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																$row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													            $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT;
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
	
	public function InfraToolsServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, $ServiceCorporation, 
																			$ServiceDepartment, $UserEmail,
																            &$ArrayInstanceInfraToolsService, &$RowCount, $Debug,
																            $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceDepartmentOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceDepartmentOnUserContext());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$ServiceDepartment = "%".$ServiceDepartment."%"; 
				$stmt->bind_param("sssii", $ServiceCorporation, $ServiceDepartment, $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
																	$row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsDepartment = $this->InfraToolsFactory->CreateDepartment(
									                                  $InstanceInfraToolsCorporation, 
									                                  $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									                                  $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									                                  $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																$row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																$InstanceInfraToolsCorporation, 
																$row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
							                                    $InstanceInfraToolsDepartment,  
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																$row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													            $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT;
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
	
	public function InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail,
																		           &$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$ServiceDepartment = "%".$ServiceDepartment."%";
				$stmt->bind_param("sss", $ServiceCorporation, $ServiceDepartment, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
						                                            $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
																	$row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsDepartment = $this->InfraToolsFactory->CreateDepartment(
									                                  $InstanceInfraToolsCorporation, 
									                                  $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									                                  $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									                                  $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																$row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																$InstanceInfraToolsCorporation,
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																$InstanceInfraToolsDepartment, 
							                                    $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																$row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													            $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT;
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
	
	public function InfraToolsServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceId());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("i", $ServiceId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$stmt->bind_result($serviceActive, $serviceCorporation, $serviceCorporationCanChange, 
									   $serviceDepartment, $serviceDepartmentCanChange, $serviceDescription,
									   $serviceId, $serviceName, $serviceType, $serviceRegDate,
									   $typeServiceName, $typeServiceSla, $typeServiceRegDate);
					if ($stmt->fetch())
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $typeServiceRegDate,
						                                            $serviceName,
						                                            $typeServiceSla);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                        $serviceRegDate, 
																	$serviceActive, 
																	$serviceCorporation,
							                                        $serviceCorporationCanChange,
																	$serviceDepartment, 
							                                        $serviceDepartmentCanChange,
								                                    $serviceDescription, 
																	$serviceId, 
													                $serviceName,
																	$InstanceInfraToolsTypeService);
						return ConfigInfraTools::RET_OK;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ID;
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
	
	public function InfraToolsServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
														            &$TypeAssocUserServiceId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$TypeAssocUserServiceId = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceIdOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceIdOnUserContext());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("is", $ServiceId, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$stmt->bind_result($serviceActive, $serviceCorporation, $serviceCorporationCanChange,
									   $serviceDepartment, $serviceDepartmentCanChange, $serviceDescription,
									   $serviceId, $serviceName, $serviceType, $serviceRegDate,
									   $typeServiceName, $typeServiceSla, $typeServiceRegDate, $TypeAssocUserServiceId);
					if ($stmt->fetch())
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $typeServiceRegDate,
						                                            $typeServiceName,
						                                            $typeServiceSla);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                        $serviceRegDate, 
																	$serviceActive, 
																	$serviceCorporation, 
							                                        $serviceCorporationCanChange,
																	$serviceDepartment, 
							                                        $serviceDepartmentCanChange,
								                                    $serviceDescription, 
																	$serviceId, 
													                $serviceName, 
																	$InstanceInfraToolsTypeService);
						return ConfigInfraTools::RET_OK;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_ID;
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
	
	public function InfraToolsServiceSelectByServiceName($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
											             &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceName());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$ServiceName = "%".$ServiceName."%";  
				$stmt->bind_param("sii", $ServiceName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME;
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
	
	public function InfraToolsServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
													            $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceNameNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceNameNoLimit());
			if($stmt != NULL)
			{
				$ServiceName = "%".$ServiceName."%";  
				$stmt->bind_param("s", $ServiceName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME;
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
	
	public function InfraToolsServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail,
															          &$ArrayInstanceInfraToolsService, &$RowCount, 
															          $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceNameOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceNameOnUserContext());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$ServiceName = "%".$ServiceName."%";  
				$stmt->bind_param("ssii", $ServiceName, $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME;
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
	
	public function InfraToolsServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, &$ArrayInstanceInfraToolsService, 
																			 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceNameOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceNameOnUserContextNoLimit());
			if($stmt != NULL)
			{
				$ServiceName = "%".$ServiceName."%"; 
				$stmt->bind_param("ss", $ServiceName, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME;
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
	
	public function InfraToolsServiceSelectByServiceType($Limit1, $Limit2, $ServiceNType, &$ArrayInstanceInfraToolsService, 
											             &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceType');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceType());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$ServiceType = "%".$ServiceType."%"; 
				$stmt->bind_param("sii", $ServiceNType, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE;
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
	
	public function InfraToolsServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, 
													            $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceType');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceTypeNoLimit());
			if($stmt != NULL)
			{ 
				$ServiceType = "%".$ServiceType."%";
				$stmt->bind_param("s", $ServiceType);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE;
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
	
	public function InfraToolsServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail,
															          &$ArrayInstanceInfraToolsService, &$RowCount, 
															          $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceTypeOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceTypeOnUserContext());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$ServiceType = "%".$ServiceType."%";
				$stmt->bind_param("ssii", $ServiceType, $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE;
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
	
	public function InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail, 
																             &$ArrayInstanceInfraToolsService, 
																             $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByServiceTypeOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByServiceTypeOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$ServiceType = "%".$ServiceType."%";
				$stmt->bind_param("ss", $ServiceType, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE;
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
	
	public function InfraToolsServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2, $TypeAssocUserServiceDescription,
			                                                                 &$ArrayInstanceInfraToolsService, &$RowCount, 
																			 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByTypeAssocUserServiceDescription');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByTypeAssocUserServiceDescription());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$TypeAssocUserServiceDescription = "%".$TypeAssocUserServiceDescription."%"; 
				$stmt->bind_param("sii", $TypeAssocUserServiceDescription, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE;
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
	
	public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription,
																					&$ArrayInstanceInfraToolsService, 
															                        $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit());
			if($stmt != NULL)
			{ 
				$TypeAssocUserServiceDescription = "%".$TypeAssocUserServiceDescription."%";
				$stmt->bind_param("s", $TypeAssocUserServiceDescription);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE;
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
	
	public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2, $TypeAssocUserServiceDescription,
																						  $UserEmail, &$ArrayInstanceInfraToolsService,
																						  &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$TypeAssocUserServiceDescription = "%".$TypeAssocUserServiceDescription."%";
				$stmt->bind_param("ssii", $TypeAssocUserServiceDescription, $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE;
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
	
	public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit($TypeAssocUserServiceDescription, 
																								 $UserEmail,
			                                                                                     &$ArrayInstanceInfraToolsService, 
																								 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$TypeAssocUserServiceDescription = "%".$TypeAssocUserServiceDescription."%";
				$stmt->bind_param("ss", $TypeAssocUserServiceDescription, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE;
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
	
	public function InfraToolsServiceSelectByUser($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
										          &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByUser');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByUser());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("sii", $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_USER_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_USER;
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
	
	public function InfraToolsServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, 
											             $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectByUserNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceSelectByUserNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_USER_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_SERVICE_SEL_BY_SERVICE_USER;
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
	
	public function InfraToolsServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceSelectNoLimit');
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(InfraToolsPersistence::SqlInfraToolsServiceSelectNoLimit()))
			{
				$ArrayInstanceInfraToolsService = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TB_FD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME],
						                                            $row[ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TB_FD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_ACTIVE], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION], 
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION], 
																 $row[ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID], 
													             $row[ConfigInfraTools::TB_SERVICE_FD_NAME], 
																 $InstanceInfraToolsTypeService);
					array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
				}
				if(!empty($ArrayInstanceInfraToolsService))
					return ConfigInfraTools::RET_OK;
				else return ConfigInfraTools::DB_ERROR_SERVICE_SEL_FETCH;
			}
			else 
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = ConfigInfraTools::DB_ERROR_SERVICE_SEL;
			}
			return $return;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
											           $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
									                   $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											           $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceUpdateByServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceUpdateByServiceId());
			if ($stmt)
			{
				$stmt->bind_param("isisisssi", $ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
								             $ServiceDepartmentNew, $ServiceCorporationCanChangeNew,
								             $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId);
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
					else return ConfigInfraTools::DB_ERROR_USER_UPDT_BY_USER_EMAIL;
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
	
	public function InfraToolsServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, 
													           $ServiceId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL; $mySqlError = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQuery('SqlInfraToolsServiceUpdateRestrictByServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsServiceUpdateRestrictByServiceId());
			if ($stmt)
			{
				$stmt->bind_param("isssi", $ServiceActiveNew, $ServiceDescriptionNew, 
								           $ServiceNameNew, $ServiceTypeNew, $ServiceId);
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
					else return ConfigInfraTools::DB_ERROR_SERVICE_UPDT_RESTRICT_BY_SERVICE_ID;
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