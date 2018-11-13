<?php

/************************************************************************
Class: InfraToolsFacedePersistenceService
Creation: 25/06/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Model/MySqlManager.php
			InfraTools - Php/Controller/Config.php
			InfraTools - Php/Model/InfraToolsPersistence.php
			InfraTools - Php/Model/Service.php
	
Description: 
			Classe used to access and deal with information of the database about group user.
Functions: 
			public function ServiceDeleteById($ServiceId, $Debug, $MySqlConnection);
			public function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug, $MySqlConnection);
			public function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                              $ServiceDepartment, $ServiceDepartmentCanChange,
										  $ServiceDescription, $ServiceName, $ServiceType, $Debug, $MySqlConnection);
			public function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                           &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                             &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                                    $Debug, $MySqlConnection);
			public function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2,
			                                                          &$ArrayInstanceInfraToolsService, 
			                                                          &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                                 &$ArrayInstanceInfraToolsService, 
			                                                                 $Debug, $MySqlConnection);
			public function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
															  &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
			                                                         $Debug, $MySqlConnection);
			public function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail, 
			                                                                $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                                                &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
			                                                                       &$ArrayInstanceInfraToolsService, 
			                                                                       $Debug, $MySqlConnection);
			public function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2,
			                                                 &$ArrayInstanceInfraToolsService, &$RowCount, 
															 $Debug, $MySqlConnection);
	        public function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation $ServiceDepartment,
			                                                        &$ArrayInstanceInfraToolsService, $Debug);
			public function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation, $ServiceDepartment, $UserEmail, 
			                                                              $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                                              $Debug, $MySqlConnection);
			public function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
			                                                                     &$ArrayInstanceInfraToolsService, 
			                                                                     $Debug, $MySqlConnection);
			public function ServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, $Debug, $MySqlConnection);	
			public function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
			                                                      &$TypeAssocUserServiceId, $Debug, $MySqlConnection);
			public function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                           &$RowCount, $Debug, $MySqlConnection);	
			public function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
			                                                  $Debug, $MySqlConnection);	
			public function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
			                                                        $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                                        &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
			                                                               &$ArrayInstanceInfraToolsService, 
			                                                               $Debug, $MySqlConnection);
			public function ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                           &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, 
			                                                  $Debug, $MySqlConnection);
			public function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, $Limit1, $Limit2, 
			                                                        &$ArrayInstanceInfraToolsService, &$RowCount, 
																	$Debug, $MySqlConnection);
			public function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
			                                                              &$ArrayInstanceInfraToolsService, 
																		  $Debug, $MySqlConnection);
			public function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                                    &$ArrayInstanceInfraToolsService, 
			                                                    &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                           &$ArrayInstanceInfraToolsService, 
																       $Debug, $MySqlConnection);
			public function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
			                                                                 $UserEmail, $Limit1, $Limit2, 
			                                                                 &$ArrayInstanceInfraToolsService, &$RowCount, 
																			 $Debug, $MySqlConnection);
			public function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
			                                                                        $UserEmail,
			                                                                        &$ArrayInstanceInfraToolsService, 
																		            $Debug, $MySqlConnection);
			public function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                    &$RowCount, $Debug, $MySqlConnection);
			public function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, 
			                                           $Debug, $MySqlConnection);
			public function ServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, 
			                                     $Debug, $MySqlConnection);
			public function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
			                                         $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
											         $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
													 $Debug, $MySqlConnection);	
			public function ServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, 
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
																	 $this->InfraToolsConfig->DefaultMySqlPassword);
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
	
	public function ServiceDeleteById($ServiceId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceDeleteById');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceDeleteById());
			if ($stmt)
			{
				$stmt->bind_param("i", $ServiceId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_DELETE_BY_SERVICE_ID_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return ConfigInfraTools::MYSQL_SERVICE_DELETE_BY_SERVICE_ID_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}

		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlServiceDeleteByIdOnUserContext');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceDeleteByIdOnUserContext());
			if ($stmt)
			{
				$stmt->bind_param("is", $ServiceId, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_DELETE_BY_SERVICE_ID_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return ConfigInfraTools::MYSQL_SERVICE_DELETE_BY_SERVICE_ID_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}

		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
								  $ServiceDepartment, $ServiceDepartmentCanChange,
								  $ServiceDescription, $ServiceName, $ServiceType, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceInsert');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceInsert());
			if ($stmt)
			{
				$stmt->bind_param("isisisss", $ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
								              $ServiceDepartment, $ServiceDepartmentCanChange, $ServiceDescription,
								              $ServiceName, $ServiceType);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return ConfigInfraTools::SUCCESS;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_INSERT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelect');
		if($MySqlConnection != NULL)
		{
			
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelect());
			if($stmt != NULL)
			{
				$stmt->bind_param("ii", $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else 
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = ConfigInfraTools::MYSQL_SERVICE_SELECT_FAILED;
				}
				return $return;
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                   &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectOnUserContext());
			if($stmt != NULL)
			{
				$stmt->bind_param("sii", $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else 
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = ConfigInfraTools::MYSQL_SERVICE_SELECT_FAILED;
				}
				return $return;
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
												 &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceActive');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceActive());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("iii", $ServiceActive, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceActiveNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceActiveNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("i", $ServiceActive);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2,
															  &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceActiveOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceActiveOnUserContext());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("isii", $ServiceActive, $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                                         $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceActiveOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceActiveOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("is", $ServiceActive, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
													  &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceCorporation');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceCorporation());
			if($stmt != NULL)
			{
				$ServiceDepartment = "%".$ServiceCorporation."%";  
				$stmt->bind_param("sii", $ServiceCorporation, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																$InstanceCorporation, 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
															    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
															    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													            $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
															 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceCorporationNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceCorporationNoLimit());
			if($stmt != NULL)
			{
				$ServiceDepartment = "%".$ServiceCorporation."%";  
				$stmt->bind_param("s", $ServiceCorporation);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																$InstanceCorporation, 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT], 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													            $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail,$Limit1, $Limit2,
																   &$ArrayInstanceInfraToolsService, &$RowCount, 
																   $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceCorporationOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceCorporationOnUserContext());
			if($stmt != NULL)
			{
				$ServiceCorporation = "%".$ServiceCorporation."%";  
				$stmt->bind_param("ssii", $ServiceCorporation, $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																$InstanceCorporation, 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT], 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													            $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		  &$ArrayInstanceInfraToolsService, 
																		  $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceCorporationOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceCorporationOnUserContextNoLimit());
			if($stmt != NULL)
			{
				$ServiceDepartment = "%".$ServiceCorporation."%"; 
				$stmt->bind_param("ss", $ServiceCorporation, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																$InstanceCorporation, 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT], 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													            $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_CORPORATION_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, 
													 $Limit1, $Limit2, &$ArrayInstanceInfraToolsService,
													 &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceDepartment');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceDepartment());
			if($stmt != NULL)
			{
				$ServiceDepartment = "%".$ServiceDepartment."%"; 
				$stmt->bind_param("ssii", $ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceDepartment = $this->InfraToolsFactory->CreateDepartment(
									                                  $InstanceCorporation, 
									                                  $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									                                  $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									                                  $row["Department".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																$InstanceCorporation, 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																$InstanceDepartment, 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													            $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment, 
															&$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceDepartmentNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceDepartmentNoLimit());
			if($stmt != NULL)
			{
				$ServiceDepartment = "%".$ServiceDepartment."%"; 
				$stmt->bind_param("ss", $ServiceCorporation, $ServiceDepartment);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceDepartment = $this->InfraToolsFactory->CreateDepartment(
									                                  $InstanceCorporation, 
									                                  $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									                                  $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									                                  $row["Department".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																$InstanceCorporation, 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																$InstanceDepartment, 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													            $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation, $ServiceDepartment, 
																  $UserEmail, $Limit1, $Limit2,
																  &$ArrayInstanceInfraToolsService, &$RowCount, $Debug,
																  $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceDepartmentOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceDepartmentOnUserContext());
			if($stmt != NULL)
			{
				$ServiceDepartment = "%".$ServiceDepartment."%"; 
				$stmt->bind_param("sssii", $ServiceCorporation, $ServiceDepartment, $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceDepartment = $this->InfraToolsFactory->CreateDepartment(
									                                  $InstanceCorporation, 
									                                  $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									                                  $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									                                  $row["Department".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																$InstanceCorporation, 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
							                                    $InstanceDepartment,  
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													            $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail,
																		 &$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceDepartmentOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceDepartmentOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$ServiceDepartment = "%".$ServiceDepartment."%";
				$stmt->bind_param("sss", $ServiceCorporation, $ServiceDepartment, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceCorporation = $this->InfraToolsFactory->CreateInfraToolsCorporation(NULL,
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE],
						                                            $row[ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME],
																	$row["Corporation".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceDepartment = $this->InfraToolsFactory->CreateDepartment(
									                                  $InstanceCorporation, 
									                                  $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									                                  $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									                                  $row["Department".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                    $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																$InstanceCorporation,
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																$InstanceDepartment, 
							                                    $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																$row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													            $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																$InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceId());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("i", $ServiceId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
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
						return ConfigInfraTools::SUCCESS;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ID_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
														  &$TypeAssocUserServiceId, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$TypeAssocUserServiceId = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceIdOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceIdOnUserContext());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("is", $ServiceId, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
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
						return ConfigInfraTools::SUCCESS;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_ID_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
											   &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceName());
			if($stmt != NULL)
			{
				$ServiceName = "%".$ServiceName."%";  
				$stmt->bind_param("sii", $ServiceName, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
													  $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceNameNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceNameNoLimit());
			if($stmt != NULL)
			{
				$ServiceName = "%".$ServiceName."%";  
				$stmt->bind_param("s", $ServiceName);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail,$Limit1, $Limit2,
															&$ArrayInstanceInfraToolsService, &$RowCount, 
															$Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceNameOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceNameOnUserContext());
			if($stmt != NULL)
			{
				$ServiceName = "%".$ServiceName."%";  
				$stmt->bind_param("ssii", $ServiceName, $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																   &$ArrayInstanceInfraToolsService, 
																   $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceNameOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceNameOnUserContextNoLimit());
			if($stmt != NULL)
			{
				$ServiceName = "%".$ServiceName."%"; 
				$stmt->bind_param("ss", $ServiceName, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceType($ServiceNType, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
											   &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceType');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceType());
			if($stmt != NULL)
			{
				$ServiceType = "%".$ServiceType."%"; 
				$stmt->bind_param("sii", $ServiceNType, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, 
													  $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceType');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceTypeNoLimit());
			if($stmt != NULL)
			{ 
				$ServiceType = "%".$ServiceType."%";
				$stmt->bind_param("s", $ServiceType);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail,$Limit1, $Limit2,
															&$ArrayInstanceInfraToolsService, &$RowCount, 
															$Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceTypeOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceTypeOnUserContext());
			if($stmt != NULL)
			{
				$ServiceType = "%".$ServiceType."%";
				$stmt->bind_param("ssii", $ServiceType, $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail, 
																   &$ArrayInstanceInfraToolsService, 
																   $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByServiceTypeOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByServiceTypeOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$ServiceType = "%".$ServiceType."%";
				$stmt->bind_param("ss", $ServiceType, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                            &$ArrayInstanceInfraToolsService, 
			                                            &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByTypeAssocUserService');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByTypeAssocUserService());
			if($stmt != NULL)
			{
				$TypeAssocUserService = "%".$TypeAssocUserService."%"; 
				$stmt->bind_param("sii", $TypeAssocUserService, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                   &$ArrayInstanceInfraToolsService, 
															   $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByTypeAssocUserServiceNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByTypeAssocUserServiceNoLimit());
			if($stmt != NULL)
			{ 
				$TypeAssocUserService = "%".$TypeAssocUserService."%";
				$stmt->bind_param("s", $TypeAssocUserService);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
			                                                         $UserEmail, $Limit1, $Limit2, 
			                                                         &$ArrayInstanceInfraToolsService, 
																	 &$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByTypeAssocUserServiceOnUserContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByTypeAssocUserServiceOnUserContext());
			if($stmt != NULL)
			{
				$TypeAssocUserService = "%".$TypeAssocUserService."%";
				$stmt->bind_param("ssii", $TypeAssocUserService, $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
			                                                                $UserEmail,
			                                                                &$ArrayInstanceInfraToolsService, 
																		    $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByTypeAssocUserServiceOnUserContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByTypeAssocUserServiceOnUserContextNoLimit());
			if($stmt != NULL)
			{ 
				$TypeAssocUserService = "%".$TypeAssocUserService."%";
				$stmt->bind_param("ss", $TypeAssocUserService, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
										&$RowCount, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByUser');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByUser());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("sii", $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_USER_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_USER_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, 
											   $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectByUserNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceSelectByUserNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsService = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
						array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
					}
					if(!empty($ArrayInstanceInfraToolsService))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_USER_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_SERVICE_SELECT_BY_SERVICE_USER_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsService = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceSelectNoLimit');
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(InfraToolsPersistence::SqlServiceSelectNoLimit()))
			{
				$ArrayInstanceInfraToolsService = array();
				while ($row = $result->fetch_assoc()) 
				{
					$InstanceInfraToolsTypeService = $this->InfraToolsFactory->CreateInfraToolsTypeService(
						                                            $row["TypeService".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME],
						                                            $row[ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA]);
						$InstanceInfraToolsService = $this->InfraToolsFactory->CreateInfraToolsService(
							                                     $row["Service".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION], 
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE],
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT],
							                                     $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE],
								                                 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION], 
																 $row[ConfigInfraTools::TABLE_SERVICE_FIELD_ID], 
													             $row[ConfigInfraTools::TABLE_SERVICE_FIELD_NAME], 
																 $InstanceInfraToolsTypeService);
					array_push($ArrayInstanceInfraToolsService, $InstanceInfraToolsService);
				}
				if(!empty($ArrayInstanceInfraToolsService))
					return ConfigInfraTools::SUCCESS;
				else return ConfigInfraTools::MYSQL_SERVICE_SELECT_FETCH_FAILED;
			}
			else 
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = ConfigInfraTools::MYSQL_SERVICE_SELECT_FAILED;
			}
			return $return;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
											 $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
									         $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($Debug == Config::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceUpdateByServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceUpdateByServiceId());
			if ($stmt)
			{
				$stmt->bind_param("isisisssi", $ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
								             $ServiceDepartmentNew, $ServiceCorporationCanChangeNew,
								             $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId);
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
					if($errorCode == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE;
					else return Config::MYSQL_USER_UPDATE_BY_EMAIL_FAILED;
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
	
	public function ServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, 
													 $ServiceId, $Debug, $MySqlConnection)
{
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL; $mySqlError = NULL;
		if($Debug == Config::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlServiceUpdateRestrictByServiceId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlServiceUpdateRestrictByServiceId());
			if ($stmt)
			{
				$stmt->bind_param("isssi", $ServiceActiveNew, $ServiceDescriptionNew, 
								           $ServiceNameNew, $ServiceTypeNew, $ServiceId);
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
					if($errorCode == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE;
					else return Config::MYSQL_USER_UPDATE_BY_EMAIL_FAILED;
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
}
}