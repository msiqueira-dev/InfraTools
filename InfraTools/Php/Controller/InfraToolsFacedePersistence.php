<?php

/************************************************************************
Class: InfraToolsFacedePersistence
Creation: 02/12/2015
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Country.php
			Base       - Php/Model/TypeUser.php
			InfraTools - Php/Model/CorporationInfraTools.php
	
Description: 
			Classe para funcionalidades que irão fazer requisições ao banco de dados.
Methods: 
			public function AssocUserServiceCheckUserTypeAdministrator($AssocUserServiceServiceId, $AssocUserServiceUserEmail,
			                                                          $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceId, $Debug,
			                                                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceId, 
			                                                                          $AssocUserServiceEmail, 
																					  $Debug, 
																					  $MySqlConnection = NULL, 
																					  $CloseConnectaion = TRUE);
			public function AssocUserServiceInsert($AssocUserServiceId, $AssocUserServiceEmail, $AssocUserServiceTypeAssocUserService,
										           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocUserServiceSelectByAssocUserServiceServiceId($Limit1, $Limit2, $AssocUserServiceId, 
			                                                                  &$ArrayInstanceInfraToolsAssocUserService, 
			                                                                  &$RowCount, $Debug, 
																			  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
			                                                                         &$ArrayInstanceInfraToolsAssocUserService, 
			                                                                         $Debug,
																					 $MySqlConnection = NULL, 
																					 $CloseConnectaion = TRUE);
			public function InfraToolsCorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, 
			                                            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsCorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, 
			                                                         $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function CorporationInfraToolsSelectByName($CorporationName, &$CorporationInstance, 
			                                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function CorporationInfraToolsSelectNoLimit(&$ArrayInstanceCorporation, 
			                                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function CorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail 
			                                                      &$ArrayInstanceInfraToolsCorporation, 
																  &$RowCount, $Debug, $MySqlConnection = NULL, 
																  $CloseConnectaion = TRUE);
			public function CorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, 
			                                                             $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentSelectOnUserServiceContext($Limit1, $Limit2, $UserCorporation, $UserEmail, 
	                                                             &$ArrayInstanceInfraToolsDepartment, &$RowCount, $Debug,
																 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, 
			                                                            &$ArrayInstanceInfraToolsDepartment, $Debug,
																		$MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsDataBackup(&$FileName, &$FileNamePath, $Debug)
			public function InfraToolsDataBaseCheck(&$ArrayTables, &$StringMessage, $Debug);
			public function InfraToolsDataBaseCreate(&$StringMessage, $Debug);
			public function InfraToolsDataBaseGetRowCount(&$RowCount, $Debug);
			public function InfraToolsDataBaseImport($InsertQueries, &$ErrorQueires, &$StringMessage, $Debug);
			public function ServiceDeleteById($ServiceId, $UserEmail, $Debug);
			public function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug,);
			public function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                              $ServiceDepartment, $ServiceDepartmentCanChange,
										  $ServiceDescription, $ServiceName, $ServiceType, $Debug);
			public function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, 
			                              $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                           &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                             &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, $Debug,
			                                                    $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, $UserEmail, 
			                                                          &$ArrayInstanceInfraToolsService, &$RowCount, 
																	  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail, 
			                                                                 &$ArrayInstanceInfraToolsService, 
																			 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation, &$ArrayInstanceInfraToolsService, 
															  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
			                                                         $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2,$ServiceCorporation, $UserEmail, 
																		   &$ArrayInstanceInfraToolsService, 
																		   &$RowCount, $Debug,
																		   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																				  &$ArrayInstanceInfraToolsService, 
																				  $Debug, 
																				  $MySqlConnection = NULL, 
																				  $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceDepartment($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment,
			                                                 &$ArrayInstanceInfraToolsService, &$RowCount, $Debug,
															 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
			                                                        &$ArrayInstanceInfraToolsService, $Debug,
																	$MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment, $UserEmail, 
																		  &$ArrayInstanceInfraToolsService, 
																		  &$RowCount, $Debug, $MySqlConnection = NULL, 
																		  $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																				 &$ArrayInstanceInfraToolsService, 
																				 $Debug, $MySqlConnection = NULL, 
																				 $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceId($ServiceId, $Debug, $MySqlConnection = NULL, 
			                                         $CloseConnectaion = TRUE);	
			public function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$Service, &$TypeAssocUserServiceId,
			                                                      $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);	
			public function ServiceSelectByServiceName($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
			                                           &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);	
			public function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
			                                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);	
			public function ServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail, 
																	&$ArrayInstanceInfraToolsService, 
																	&$RowCount, $Debug,$MySqlConnection = NULL, 
																	$CloseConnectaion = TRUE);
			public function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																		   &$ArrayInstanceInfraToolsService, 
																		   $Debug, $MySqlConnection = NULL, 
																		   $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceType($Limit1, $Limit2, $ServiceType, &$ArrayInstanceInfraToolsService, 
			                                           &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, 
			                                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail, 
																	&$ArrayInstanceInfraToolsService, &$RowCount, 
																	$Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																		   &$ArrayInstanceInfraToolsService, 
																		   $Debug, $MySqlConnection = NULL, 
																		   $CloseConnectaion = TRUE);
			public function ServiceSelectByTypeAssocUserServiceDescription(TypeAssocUserServiceDescription, $Limit1, $Limit2, 
			                                                               &$ArrayInstanceInfraToolsService, &$RowCount, 
																           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription,
			                                                                      &$ArrayInstanceInfraToolsService, 
																                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2,
			                                                                            $TypeAssocUserServiceDescription, $UserEmail, 
			                                                                            &$ArrayInstanceInfraToolsService, 
																			            &$RowCount, $Debug,
																			            $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit($TypeAssocUserServiceDescription, 
			                                                                                   $UserEmail, &$ArrayInstanceInfraToolsService, 
																		                       $Debug,
																					           $MySqlConnection = NULL, 
																							   $CloseConnectaion = TRUE);
			public function ServiceSelectByUser($Limit1, $Limit2, $UserEmail, &A$rrayInstanceInfraToolService, 
			                                    &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, 
			                                           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, 
			                                     $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
			                                         $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
									                 $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											         $Debug, MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function ServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew,
			                                                 $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											                 $Debug, MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeAssocUserServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService, &$RowCount,
													   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2, 
			                                                        &$ArrayInstanceInfraToolsTypeAssocUserService, $UserEmail, &$RowCount, 
																	$Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
			                                                               $UserEmail, $Debug,
																		   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeServiceDeleteByTypeTypeServiceName($TypeServiceName, $Debug, $MySqlConnection = NULL, 
			                                                       $CloseConnectaion = TRUE);
			public function TypeServiceInsert($TypeServiceName, $TypeServiceSLA, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, 
			                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
	        public function TypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, 
			                                         $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeServiceSelectOnUserContext(Limit1, $Limit2, $UserEmail,
			                                               &$ArrayInstanceInfraToolsTypeService, $Debug,
														   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, 
			                                                      $UserEmail, $Debug,
																  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug,
			                                     $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                                      $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, 
			                                                     &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug, 
																 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
			                                                MySqlConnection = NULL, $CloseConnectaion = TRUE));
			public function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
			                                              $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2,$TypeUserDescription, &$ArrayInstanceInfraToolsUser, 
			                                                          &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceUser, 
			                                                          &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug, 
			                                                $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, 
			                                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
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
if (!class_exists("FacedePersistence"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistence.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistence');
}

class InfraToolsFacedePersistence extends FacedePersistence
{	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
	{
		if($this->Factory == NULL)
			$this->Factory = InfraToolsFactory::__create();
		if ($this->Config == NULL)
			$this->Config = $this->Factory->CreateConfigInfraTools();
		if ($this->MySqlManager == NULL)
		{
			$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
			$this->MySqlManager = $this->Factory->CreateMySqlManager($ConfigInfraTools->DefaultMySqlAddress,
			                                                         $ConfigInfraTools->DefaultMySqlPort,
																	 $ConfigInfraTools->DefaultMySqlDataBase,
			                                                         $ConfigInfraTools->DefaultMySqlUser, 
																	 $ConfigInfraTools->DefaultMySqlUserPassword);
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
	
	public function AssocUserServiceCheckUserTypeAdministrator($AssocUserServiceServiceId, $AssocUserServiceUserEmail,
			                                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceCheckUserTypeAdministrator(
																								$AssocUserServiceServiceId,
																								$AssocUserServiceUserEmail,
																								$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
		
	}
	
	public function AssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceId, $Debug, 
																	  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceDeleteByAssocUserServiceServiceId(
																							$AssocUserServiceId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceId, 
																			  $AssocUserServiceEmail, 
																			  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail(
																							$AssocUserServiceId, 
																							$AssocUserServiceEmail, 
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocUserServiceInsert($AssocUserServiceId, $AssocUserServiceEmail, $AssocUserServiceTypeAssocUserService,
										   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceInsert($AssocUserServiceId, 
																						   $AssocUserServiceEmail,
																						   $AssocUserServiceTypeAssocUserService,
																						   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocUserServiceSelectByAssocUserServiceServiceId($Limit1, $Limit2, $AssocUserServiceId, 
			                                                          &$ArrayInstanceInfraToolsAssocUserService, 
			                                                          &$RowCount, $Debug, 
																	  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceSelectByAssocUserServiceServiceId($Limit1, $Limit2,
																							$AssocUserServiceId,  
																							$ArrayInstanceInfraToolsAssocUserService, 
																							$RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function AssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
																			 &$ArrayInstanceInfraToolsAssocUserService, 
			                                                                 $Debug, 
																			 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceSelectByAssocUserServiceServiceIdNoLimit(
																							$AssocUserServiceId,
																							$ArrayInstanceInfraToolsAssocUserService, 
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsCorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, 
												$Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->InfraToolsCorporationSelect($Limit1, $Limit2, 
																						   $ArrayInstanceCorporation, $RowCount,
																						   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsCorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug, 
															 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->InfraToolsCorporationSelectActiveNoLimit($ArrayInstanceCorporation,
																										$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function CorporationInfraToolsSelectByName($CorporationName, &$CorporationInstance, 
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->CorporationInfraToolsSelectByName($CorporationName, $CorporationInstance, 
																								 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function CorporationInfraToolsSelectNoLimit(&$ArrayInstanceCorporation, $Debug, 
													   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->CorporationInfraToolsSelectNoLimit($ArrayInstanceCorporation, 
																								  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function CorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail, 
			                                              &$ArrayInstanceInfraToolsCorporation, 
														  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->CorporationSelectOnUserServiceContext($Limit1, $Limit2,$UserEmail,
																									 $ArrayInstanceInfraToolsCorporation, 
																									 $RowCount, $Debug,
																									 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
																	  
	
	public function CorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, 
																 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->CorporationSelectOnUserServiceContextNoLimit($UserEmail,
																									$ArrayInstanceInfraToolsCorporation, 
																									$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function DepartmentSelectOnUserServiceContext($Limit1, $Limit2, $UserCorporation, $UserEmail, 
	                                                     &$ArrayInstanceInfraToolsDepartment, &$RowCount, 
														 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceDepartment = $this->Factory->CreateInfraToolsFacedePersistenceDepartment();
			$return = $InfraToolsFacedePersistenceDepartment->DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail,
																								   $ArrayInstanceInfraToolsDepartment, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, 
																&$ArrayInstanceInfraToolsDepartment, 
																$Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceDepartment = $this->Factory->CreateInfraToolsFacedePersistenceDepartment();
			$return = $InfraToolsFacedePersistenceDepartment->DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail,
																									  $ArrayInstanceInfraToolsDepartment,
																									  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsDataBackup(&$FileName, &$FileNamePath, $Debug)
	{
		$FileName = ProjectConfig::$ApplicationName . "-Dump-".date("Y-m-d-H-i") . ".sql";
		$FileNamePath = ProjectConfig::$UploadDirectory . "/" . $FileName;
		$Command = "    "     .      ProjectConfig::$MySqlDumpCompletePath          . " --extended-insert=FALSE  " .
			       " -u "     .      ProjectConfig::$MySqlDataBaseSuperUser         .
			       "  -p"     .      ProjectConfig::$MySqlDataBaseSuperUserPassword .
			       " --port=" .      ProjectConfig::$MySqlDataBasePort              .
			       " -h "     .      ProjectConfig::$MySqlDataBaseAddress           . " --no-create-info --skip-triggers --complete-insert" .
					                                                                  " --order-by-primary " .
				         			 ProjectConfig::$MySqlDataBaseName              .  " > " . $FileNamePath;
		exec($Command);
		if(file_exists($FileNamePath) && filesize($FileNamePath) > 0)
			return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::ERROR;
	}
	
	public function InfraToolsDataBaseCheck(&$ArrayTables, &$StringMessage, $Debug)
	{
		$mySqlConnection;
		$this->MySqlManager->DestroyMySqlManagerInstance();
		unset($this->MySqlManager);
		$this->MySqlManager = $this->Factory->CreateMySqlManager($this->Config->DefaultMySqlAddress,
			                                                     $this->Config->DefaultMySqlPort,
												                 $this->Config->DefaultMySqlDataBase,
			                                                     $this->Config->DefaultMySqlSuperUser, 
												                 $this->Config->DefaultMySqlSuperUserPassword);
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::MYSQL_ERROR_DATABASE_NOT_FOUND)
			return ConfigInfraTools::MYSQL_ERROR_DATABASE_NOT_FOUND;
		elseif($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();
			$return = $InfraToolsFacedePersistenceDataBase->InfraToolsDataBaseCheck($ArrayTables, $StringMessage, $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				$StringMessage = NULL;
		}
		return $return;
	}
	
	public function InfraToolsDataBaseCreate(&$StringMessage, $Debug)
	{
		$mySqlConnection;
		$this->MySqlManager->DestroyMySqlManagerInstance();
		unset($this->MySqlManager);
		$this->MySqlManager = $this->Factory->CreateMySqlManager($this->Config->DefaultMySqlAddress,
			                                                     $this->Config->DefaultMySqlPort,
												                 NULL,
			                                                     $this->Config->DefaultMySqlSuperUser, 
												                 $this->Config->DefaultMySqlSuperUserPassword);
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();
			$return = $InfraToolsFacedePersistenceDataBase->DropInfraToolsDataBase($StringMessage, $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
			else return $mySqlConnection->rollback();
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBase($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableCorporation($StringMessage,
																										 $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";		
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableCountry($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeUser($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableUser($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableDepartment($StringMessage, 
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeTicket($StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeService($StringMessage,
																										 $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableService($StringMessage, 
																									 $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeStatusTicket($StringMessage,
																											  $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";		
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTicket($StringMessage,
																									$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocTicketUserResponsible($StringMessage,
																														$Debug,
																											            $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableHistoryTicket($StringMessage,
																										   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeAssocUserService($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserService($StringMessage,
																											  $Debug,
																											  $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeTimeMonitoring($StringMessage,
																												$Debug,
																												$mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeMonitoring($StringMessage,
																											$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeStatusMonitoring($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableStatusMonitoring($StringMessage,
																											  $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableMonitoring($StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableHistoryService($StringMessage,
																											$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableHistoryMonitoring($StringMessage,
																											   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeAssocUserRequesting($StringMessage,
																													 $Debug,
																												     $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocTicketUserRequesting($StringMessage,
																													   $Debug,
																												       $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableNotification($StringMessage,
																										  $Debug,
																									      $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserNotification($StringMessage,
																												  $Debug,
																											      $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserCorporation($StringMessage,
																												  $Debug,
																											      $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableSystemConfiguration($StringMessage,
																												 $Debug,
																											     $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTeam($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeAssocUserTeam($StringMessage, 
																											   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserTeam($StringMessage, 
																										   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableInformationService($StringMessage,
																												$Debug,
																												$mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTablePreference($StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableRole($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserRole($StringMessage,
																										   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserPreference($StringMessage,
																												 $Debug,
																												 $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableIpAddress($StringMessage,
																									   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocIpAddressService($StringMessage,
																												   $Debug,
																												   $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableUrlAddress($StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUrlAddressService($StringMessage,
																													$Debug,
																													$mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerServiceAfterInsert($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerServiceAfterUpdate($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerUserGenderAfterInsert($StringMessage,
																													 $Debug,
																													 $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerUserGenderAfterUpdate($StringMessage,
																													 $Debug,
																													 $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertCountry($StringMessage,
																									  $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertPreference($StringMessage,
																										 $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertRole($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertSystemConfiguration($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeAssocUserTeam($StringMessage,
																												$Debug,
																												$mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeAssocUserService($StringMessage,
																												   $Debug,
																												   $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeService($StringMessage,
																										  $Debug,
																										  $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeStatusTicket($StringMessage,
																											   $Debug,
																										       $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeTicket($StringMessage,
																										 $Debug,
																										 $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeUser($StringMessage,
																									   $Debug,
																									   $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseUserApplication($this->Config->DefaultMySqlUser,
																							            $this->Config->DefaultMySqlUserPassword,
																										$StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS || ConfigInfraTools::MYSQL_ERROR_USER_EXISTS)
				{
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br>";	
					$return = ConfigInfraTools::SUCCESS;
				}
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseUserApplicationImport(
					                                                                            $this->Config->DefaultMySqlImportUser,
																							    $this->Config->DefaultMySqlImportUserPassword,
																								$StringMessage,
																								$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS || ConfigInfraTools::MYSQL_ERROR_USER_EXISTS)
				{
					$StringMessage .= ": " . ConfigInfraTools::SUCCESS . "<br><br>";	
					$return = ConfigInfraTools::SUCCESS;
				}
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::SUCCESS)
				$mySqlConnection->commit();	
			else $mySqlConnection->rollback();
			$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsDataBaseGetRowCount(&$RowCount, $Debug)
	{
		$mySqlConnection;
		$this->MySqlManager->DestroyMySqlManagerInstance();
		unset($this->MySqlManager);
		$this->MySqlManager = $this->Factory->CreateMySqlManager($this->Config->DefaultMySqlAddress,
			                                                     $this->Config->DefaultMySqlPort,
												                 $this->Config->DefaultMySqlDataBase,
			                                                     $this->Config->DefaultMySqlSuperUser, 
												                 $this->Config->DefaultMySqlSuperUserPassword);
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::MYSQL_ERROR_DATABASE_NOT_FOUND)
			return ConfigInfraTools::MYSQL_ERROR_DATABASE_NOT_FOUND;
		elseif($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();
			$return = $InfraToolsFacedePersistenceDataBase->InfraToolsDataBaseGetRowCount($RowCount, $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				$StringMessage = NULL;
		}
		return $return;
	}
	
	public function InfraToolsDataBaseImport($InsertQueries, &$ErrorQueires, &$StringMessage, $Debug)
	{
		$mySqlConnection;
		$this->MySqlManager->DestroyMySqlManagerInstance();
		unset($this->MySqlManager);
		$this->MySqlManager = $this->Factory->CreateMySqlManager($this->Config->DefaultMySqlAddress,
			                                                     $this->Config->DefaultMySqlPort,
												                 $this->Config->DefaultMySqlDataBase,
			                                                     $this->Config->DefaultMySqlImportUser, 
												                 $this->Config->DefaultMySqlImportUserPassword);
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::MYSQL_ERROR_DATABASE_NOT_FOUND)
			$return = ConfigInfraTools::MYSQL_ERROR_DATABASE_NOT_FOUND;
		elseif($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();
			$return = $InfraToolsFacedePersistenceDataBase->InfraToolsDataBaseImport($InsertQueries, $ErrorQueires, $StringMessage, 
																					 $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				$mySqlConnection->commit();
			else $mySqlConnection->rollback();
			$StringMessage .= "<br><br>";
		}
		return $return;
	}
	
	public function ServiceDeleteById($ServiceId, $UserEmail, $Debug)
	{
		$mySqlConnection = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $this->AssocUserServiceCheckUserTypeAdministrator($ServiceId, 
																		$UserEmail, 
																		$Debug, $mySqlConnection, FALSE);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$mySqlConnection->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				$return = $this->AssocUserServiceDeleteByAssocUserServiceServiceId($ServiceId, 
																				   $Debug, $mySqlConnection, FALSE);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
					$return = $InfraToolsFacedePersistenceService->ServiceDeleteById($ServiceId, 
																					 $Debug, $mySqlConnection);
					if($return == ConfigInfraTools::SUCCESS)
					{
						$mySqlConnection->commit();
						$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
						$return = ConfigInfraTools::SUCCESS;
					}
					else $mySqlConnection->rollback();
				}
				else $mySqlConnection->rollback();
			}
			$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug)
	{
		$mySqlConnection = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $this->AssocUserServiceCheckUserTypeAdministrator($ServiceId, 
																		$UserEmail, 
																		$Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$mySqlConnection->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				$return = $this->AssocUserServiceDeleteByAssocUserServiceServiceId($ServiceId, 
																				   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
					$return = $InfraToolsFacedePersistenceService->ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, 
																								  $Debug, $mySqlConnection);
					if($return == ConfigInfraTools::SUCCESS)
					{
						$mySqlConnection->commit();
						$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
						$return = ConfigInfraTools::SUCCESS;
					}
					else $mySqlConnection->rollback();
				}
				else $mySqlConnection->rollback();
			}
			$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		}
		return $return;
	}
	public function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
								  $ServiceDepartment, $ServiceDepartmentCanChange,
								  $ServiceDescription, $ServiceName, $ServiceType, $UserEmail, $Debug)
	{
		$mySqlConnection;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceInsert($ServiceActive, $ServiceCorporation,
																		 $ServiceCorporationCanChange,
																		 $ServiceDepartment, $ServiceDepartmentCanChange,
																		 $ServiceDescription, $ServiceName, $ServiceType, 
																		 $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $this->AssocUserServiceInsert($mySqlConnection->insert_id, $UserEmail,
														1, $Debug, $mySqlConnection, FALSE);
				if($return == ConfigInfraTools::SUCCESS)
					$mySqlConnection->commit();
				else $mySqlConnection->rollback();
			}
			$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		}
		return $return;
	}
	public function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, 
								  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsService, 
																		 $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                   &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
																					  $ArrayInstanceInfraToolsService, 
																					  $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive, &$ArrayInstanceInfraToolsService, 
												 &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive,
																						$ArrayInstanceInfraToolsService,
																						$RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, 
														$Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceActiveNoLimit($ServiceActive,
																							$ArrayInstanceInfraToolsService, 
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, $UserEmail,
															  &$ArrayInstanceInfraToolsService, 
															  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, 
																									 $UserEmail,
																									 $ArrayInstanceInfraToolsService, 
																								     $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail, &$ArrayInstanceInfraToolsService, 
																	 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
																										 $ArrayInstanceInfraToolsService, 
																										 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation, &$ArrayInstanceInfraToolsService, 
													  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation,
																							 $ArrayInstanceInfraToolsService, 
																							 $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
															 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceCorporationNoLimit($ServiceCorporation,
																									$ArrayInstanceInfraToolsService,
																									$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2, $ServiceCorporation, $UserEmail,
																   &$ArrayInstanceInfraToolsService, 
																   &$RowCount, $Debug, 
																   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2,
				                                                                                          $ServiceCorporation, 
																										  $UserEmail,
																										  $ArrayInstanceInfraToolsService, 
																										  $RowCount, $Debug,
																										  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		  &$ArrayInstanceInfraToolsService, 
																		  &$RowCount, $Debug,
																		  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation,
																										   $UserEmail,
																										   $ArrayInstanceInfraToolsService,
																										   $RowCount,
																										   $Debug,
																										   $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceDepartment($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment,
													 &$ArrayInstanceInfraToolsService, &$RowCount, 
													 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceDepartment($Limit1, $Limit2, 
																							$ServiceCorporation, $ServiceDepartment,
																							$ArrayInstanceInfraToolsService, $RowCount,
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment, 
															&$ArrayInstanceInfraToolsService, 
															$Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation,
																								$ServiceDepartment,
																								$ArrayInstanceInfraToolsService,
																								$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment, $UserEmail, 
																  &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $MySqlConnection = NULL, 
																  $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, $ServiceCorporation,
																									     $ServiceDepartment, $UserEmail,
																									     $ArrayInstanceInfraToolsService, 
																									     $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail,
																		 &$ArrayInstanceInfraToolsService, 
																		 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation,
																										$ServiceDepartment,
																										$UserEmail,
																										$ArrayInstanceInfraToolsService, 
																										$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceId($ServiceId, &$Service, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceId($ServiceId, $Service, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$Service, 
														  &$TypeAssocUserServiceId, $Debug, 
														  $MySqlConnection = NULL, $CloseConnectaion = TRUE)	
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, 
																								 $Service, 
																								 $TypeAssocUserServiceId,
																								 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function ServiceSelectByServiceName($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
											   &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceName($Limit1, $Limit2, $ServiceName,
																					  $ArrayInstanceInfraToolsService,
																					  $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceNameNoLimit($ServiceName, 
																							 $ArrayInstanceInfraToolsService, 
																							 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail,
															&$ArrayInstanceInfraToolsService, &$RowCount, 
															$Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail, 
																								   $ArrayInstanceInfraToolsService,
																								   $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																   &$ArrayInstanceInfraToolsService, 
																   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail,
																										  $ArrayInstanceInfraToolsService,
																										  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceType($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
											   &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceType($Limit1, $Limit2, $ServiceName,
																					  $ArrayInstanceInfraToolsService,
																					  $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, 
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceTypeNoLimit($ServiceType, $ArrayInstanceInfraToolsService,
																							 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail,
															&$ArrayInstanceInfraToolsService, &$RowCount, 
															$Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail, 
																								   $ArrayInstanceInfraToolsService,
																								   $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																   &$ArrayInstanceInfraToolsService, 
																   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																										  $ArrayInstanceInfraToolsService,
																										  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2, $TypeAssocUserServiceDescription, 
			                                                       &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, 
																   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2,
																										  $TypeAssocUserServiceDescription,
																										  $ArrayInstanceInfraToolsService, 
																							              $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription, &$ArrayInstanceInfraToolsService, 
															              $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByTypeAssocUserServiceDescriptionNoLimit(
																			$TypeAssocUserServiceDescription, 
																			$ArrayInstanceInfraToolsService, 
																			$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2, $TypeAssocUserServiceDescription, $UserEmail, 
																	            &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, 
																	            $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2,
																							$TypeAssocUserServiceDescription,
																							$UserEmail,
																							$ArrayInstanceInfraToolsService, 
																							$RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit($TypeAssocUserServiceDescription, $UserEmail,
																			           &$ArrayInstanceInfraToolsService, $Debug, 
																			           $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit(
																							$TypeAssocUserServiceDescription,
																							$UserEmail,
																							$ArrayInstanceInfraToolsService, 
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByUser($Limit1, $Limit2, $UserEmail,
										&$ArrayInstanceInfraToolsService, 
										&$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByUser($Limit1, $Limit2, $UserEmail,
																			   $ArrayInstanceInfraToolsService, 
																			   $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, 
											   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectByUserNoLimit($UserEmail, $ArrayInstanceInfraToolsService, 
																					  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug,
										$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceSelectNoLimit($ArrayInstanceInfraToolsService, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
											 $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
									         $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew,
																					$ServiceCorporationCanChangeNew,
																					$ServiceDepartmentNew, 
																					$ServiceDepartmentCanChangeNew,
																					$ServiceDescriptionNew, $ServiceNameNew,
																					$ServiceTypeNew, 
																					$ServiceId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function ServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, 
													 $ServiceId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->ServiceUpdateRestrictByServiceId($ServiceActiveNew,
																							$ServiceDescriptionNew,
																							$ServiceNameNew,
																							$ServiceTypeNew, 
																							$ServiceId, 
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeAssocUserServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService,&$RowCount,
			                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
			$return = $InfraToolsFacedePersistenceTypeAssocUserService->TypeAssocUserServiceSelect($Limit1, $Limit2,
				                                                          $ArrayInstanceInfraToolsTypeAssocUserService,
																		  $RowCount,
																		  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
			$return = $InfraToolsFacedePersistenceTypeAssocUserService->TypeAssocUserServiceSelectNoLimit(
																	 $ArrayInstanceInfraToolsTypeAssocUserService, 
																	 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService, 
															$UserEmail, &$RowCount, $Debug,
														    $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
			$return = $InfraToolsFacedePersistenceTypeAssocUserService->TypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2,
				                                                               $ArrayInstanceInfraToolsTypeAssocUserService, 
																			   $UserEmail, $RowCount,
																			   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
																   $UserEmail, $Debug,
																   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
			$return = $InfraToolsFacedePersistenceTypeAssocUserService->TypeAssocUserServiceSelectOnUserContextNoLimit(
															  $ArrayInstanceInfraToolsTypeAssocUserService, 
															  $UserEmail, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, 
			                          $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $InfraToolsFacedePersistenceTypeService->TypeServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsTypeService,
																				 $RowCount,
																				 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug, 
											 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $InfraToolsFacedePersistenceTypeService->TypeServiceSelectNoLimit($ArrayInstanceInfraToolsTypeService,
																						$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,&$ArrayInstanceInfraToolsTypeService, 
			                                       $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $InfraToolsFacedePersistenceTypeService->TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
																							  $ArrayInstanceInfraToolsTypeService,
																							  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, 
														  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $InfraToolsFacedePersistenceTypeService->TypeServiceSelectOnUserContextNoLimit($UserEmail,
																									 $ArrayInstanceInfraToolsTypeService,
																									 $Debug,
																									 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug,
										 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelect($Limit1, $Limit2, $ArrayInstanceUser, 
																			 $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceInfraToolsUser, 
													      &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName,
																							  $ArrayInstanceInfraToolsUser, $RowCount, 
																						  	  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, 
			                                                     &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug, 
																 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, 
																							 $DepartmentName, $ArrayInstanceInfraToolsUser,
																							 $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
													$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId,
																					   $ArrayInstanceInfraToolsUser, $RowCount, 
																					   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
			                                       $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId,
																					   $ArrayInstanceInfraToolsUser, $RowCount, 
																					   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceInfraToolsUser, 
																&$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, 
																						            $ArrayInstanceInfraToolsUser, $RowCount, 
																								    $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceUser, 
			                                                  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription,
																							      $ArrayInstanceUser, $RowCount, $Debug,
																							      $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByUserEmail($UserEmail, &$InstanceUser, 
												    $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByUserEmail($UserEmail, $InstanceUser, 
																					$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, 
													   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByUserUniqueId($UserUniqueId, $InstanceUser,
																						   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
}