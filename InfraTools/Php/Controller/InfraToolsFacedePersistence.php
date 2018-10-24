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
			                                                          $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceId, $Debug,
			                                                                  $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceId, 
			                                                                          $AssocUserServiceEmail, 
																					  $Debug, 
																					  $MySqlConnection = NULL, 
																					  $CloseConnectaion = FALSE);
			public function AssocUserServiceInsert($AssocUserServiceId, $AssocUserServiceEmail, $AssocUserServiceTypeAssocUserService,
										           $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocUserServiceSelectByAssocUserServiceServiceId($AssocUserServiceId, $Limit1, $Limit2, 
			                                                                  &$ArrayInstanceInfraToolsAssocUserService, 
			                                                                  &$RowCount, $Debug, 
																			  $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
			                                                                         &$ArrayInstanceInfraToolsAssocUserService, 
			                                                                         $Debug,
																					 $MySqlConnection = NULL, 
																					 $CloseConnectaion = FALSE);
			public function CorporationInfraToolsSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, 
			                                            $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationInfraToolsSelectActiveNoLimit(&$ArrayInstanceCorporation, 
			                                                         $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationInfraToolsSelectByName($Name, &$CorporationInstance, 
			                                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationInfraToolsSelectNoLimit(&$ArrayInstanceCorporation, 
			                                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, 
			                                                      &$ArrayInstanceInfraToolsCorporation, 
																  &$RowCount, $Debug, $MySqlConnection = NULL, 
																  $CloseConnectaion = FALSE);
			public function CorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, 
			                                                             $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail, $Limit1, $Limit2, 
	                                                             &$ArrayInstanceInfraToolsDepartment, &$RowCount, $Debug,
																 $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, 
			                                                            &$ArrayInstanceInfraToolsDepartment, $Debug,
																		$MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function InfraToolsCheckDataBase($Debug);
			public function InfraToolsCreateDataBase($Debug);
			public function ServiceDeleteById($ServiceId, $UserEmail, $Debug);
			public function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug,);
			public function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                              $ServiceDepartment, $ServiceDepartmentCanChange,
										  $ServiceDescription, $ServiceName, $ServiceType, $Debug);
			public function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug, 
			                              $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                           &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                             &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolService, $Debug,
			                                                    $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2, 
			                                                          &$ArrayInstanceInfraToolService, &$RowCount, 
																	  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail, 
			                                                                 &$ArrayInstanceInfraToolService, 
																			 $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
															  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolService, 
			                                                         $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail, 
																			$Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
																			&$RowCount, $Debug,
																			$MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																				  &$ArrayInstanceInfraToolService, 
																				  $Debug, 
																				  $MySqlConnection = NULL, 
																				  $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2,
			                                                 &$ArrayInstanceInfraToolService, &$RowCount, $Debug,
															 $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
			                                                        &$ArrayInstanceInfraToolService, $Debug,
																	$MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																		  $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
																		  &$RowCount, $Debug, $MySqlConnection = NULL, 
																		  $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																				 &$ArrayInstanceInfraToolService, 
																				 $Debug, $MySqlConnection = NULL, 
																				 $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceId($ServiceId, $Limit1, $Debug, $MySqlConnection = NULL, 
			                                         $CloseConnectaion = FALSE);	
			public function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$Service, &$TypeAssocUserServiceId,
			                                                      $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);	
			public function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                           &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);	
			public function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolService, 
			                                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);	
			public function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
																	$Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
																	&$RowCount, $Debug,$MySqlConnection = NULL, 
																	$CloseConnectaion = FALSE);
			public function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																		   &$ArrayInstanceInfraToolService, 
																		   $Debug, $MySqlConnection = NULL, 
																		   $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                           &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolService, 
			                                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, $Limit1, $Limit2, 
																	&$ArrayInstanceInfraToolService, &$RowCount, 
																	$Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																		   &$ArrayInstanceInfraToolService, 
																		   $Debug, $MySqlConnection = NULL, 
																		   $CloseConnectaion = FALSE);
			public function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                                    &$ArrayInstanceInfraToolService, 
			                                                    &$RowCount, 
																$Debug, $MySqlConnection = NULL, 
																$CloseConnectaion = FALSE);
			public function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                           &$ArrayInstanceInfraToolService, 
																       $Debug, $MySqlConnection = NULL, 
																	   $CloseConnectaion = FALSE);
			public function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
			                                                                 $UserEmail, $Limit1, $Limit2, 
			                                                                 &$ArrayInstanceInfraToolService, 
																			 &$RowCount, $Debug,
																			 $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
			                                                                        $UserEmail,
			                                                                        &$ArrayInstanceInfraToolService, 
																		            $Debug,
																					$MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, &A$rrayInstanceInfraToolService, 
			                                    &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolService, 
			                                           $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceSelectNoLimit(&$ArrayInstanceInfraToolService, $Debug, 
			                                     $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
			                                         $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
									                 $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											         $Debug, MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function ServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew,
			                                                 $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											                 $Debug, MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function TypeAssocUserServiceSelect(&$ArrayInstanceInfraToolsTypeAssocUserService,
			                                           &$RowCount, $Limit1, $Limit2, 
													   $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function TypeAssocUserServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeAssocUserService, $UserEmail,
			                                                        &$RowCount, $Limit1, $Limit2, 
																	$Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
			                                                               $UserEmail, $Debug,
																		   $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function TypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, 
			                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
	        public function TypeServiceSelectNoLimit(&$ArrayInstanceInfraToolService, $Debug, 
			                                         $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function TypeServiceSelectOnUserContext(Limit1, $Limit2, $UserEmail,
			                                               &$ArrayInstanceInfraToolsTypeService, $Debug,
														   $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function TypeServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, 
			                                                      $UserEmail, $Debug,
																  $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function UserInfraToolsSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug,
			                                     $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function UserInfraToolsSelectByCorporation($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, 
			                                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function UserInfraToolsSelectByUserEmail($Email, &$InstanceUser, $Debug, 
			                                                $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function UserInfraToolsSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, 
			                                                   $MySqlConnection = NULL, $CloseConnectaion = FALSE);
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
																	 $ConfigInfraTools->DefaultMySqlPassword);
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
	
	public function AssocUserServiceCheckUserTypeAdministrator($AssocUserServiceServiceId, $AssocUserServiceUserEmail,
			                                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
		$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceCheckUserTypeAdministrator(
			                                                                                $AssocUserServiceServiceId,
																							$AssocUserServiceUserEmail,
			                                                                                $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
		
	}
	
	public function AssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceId, $Debug, 
																	  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
		$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceDeleteByAssocUserServiceServiceId(
			                                                                            $AssocUserServiceId, 
																						$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function AssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceId, 
																			  $AssocUserServiceEmail, 
																			  $Debug, 
																			  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
		$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail(
			                                                                            $AssocUserServiceId, 
																						$AssocUserServiceEmail, 
																						$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function AssocUserServiceInsert($AssocUserServiceId, $AssocUserServiceEmail, $AssocUserServiceTypeAssocUserService,
										   $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
		$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceInsert($AssocUserServiceId, 
																					   $AssocUserServiceEmail,
																					   $AssocUserServiceTypeAssocUserService,
																					   $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function AssocUserServiceSelectByAssocUserServiceServiceId($AssocUserServiceId, $Limit1, $Limit2, 
			                                                          &$ArrayInstanceInfraToolsAssocUserService, 
			                                                          &$RowCount, $Debug, 
																	  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
		$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceSelectByAssocUserServiceServiceId(
			                                                                            $AssocUserServiceId, 
																						$Limit1, $Limit2, 
																						$ArrayInstanceInfraToolsAssocUserService, 
																						$RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	public function AssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
																			 &$ArrayInstanceInfraToolsAssocUserService, 
			                                                                 $Debug, 
																			 $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
		$return = $InfraToolsFacedePersistenceAssocUserService->AssocUserServiceSelectByAssocUserServiceServiceIdNoLimit(
			                                                                            $AssocUserServiceId,
																				        $ArrayInstanceInfraToolsAssocUserService, 
			                                                                            $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function CorporationInfraToolsSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, 
												$Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
		$return = $InfraToolsFacedePersistenceCorporation->CorporationInfraToolsSelect($Limit1, $Limit2, 
																					$ArrayInstanceCorporation, $RowCount,
																					$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function CorporationInfraToolsSelectActiveNoLimit(&$ArrayInstanceCorporation, 
															 $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
		$return = $InfraToolsFacedePersistenceCorporation->CorporationInfraToolsSelectActiveNoLimit($ArrayInstanceCorporation,
																									$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function CorporationInfraToolsSelectByName($Name, &$CorporationInstance, 
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
		$return = $InfraToolsFacedePersistenceCorporation->CorporationInfraToolsSelectByName($Name, $CorporationInstance, 
																							 $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function CorporationInfraToolsSelectNoLimit(&$ArrayInstanceCorporation, $Debug, 
													   $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
		$return = $InfraToolsFacedePersistenceCorporation->CorporationInfraToolsSelectNoLimit($ArrayInstanceCorporation, 
																							  $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function CorporationSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, 
			                                              &$ArrayInstanceInfraToolsCorporation, 
														  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
		$return = $InfraToolsFacedePersistenceCorporation->CorporationSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, 
			                                                                                     $ArrayInstanceInfraToolsCorporation, 
																                                 $RowCount, $Debug,
																								 $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
																	  
	
	public function CorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, 
																 $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
		$return = $InfraToolsFacedePersistenceCorporation->CorporationSelectOnUserServiceContextNoLimit($UserEmail,
																								$ArrayInstanceInfraToolsCorporation, 
																								$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail, $Limit1, $Limit2, 
	                                                     &$ArrayInstanceInfraToolsDepartment, &$RowCount, 
														 $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceDepartment = $this->Factory->CreateInfraToolsFacedePersistenceDepartment();
		$return = $InfraToolsFacedePersistenceDepartment->DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail, 
																							   $Limit1, $Limit2, $ArrayInstanceInfraToolsDepartment, $RowCount, $Debug,
																							   $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, 
																&$ArrayInstanceInfraToolsDepartment, 
																$Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceDepartment = $this->Factory->CreateInfraToolsFacedePersistenceDepartment();
		$return = $InfraToolsFacedePersistenceDepartment->DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail,
																								  $ArrayInstanceInfraToolsDepartment,
																								  $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function InfraToolsCheckDataBase($Debug)
	{
		$mySqlConnection;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		
		$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();
		$return = $InfraToolsFacedePersistenceDataBase->InfraToolsCheckDataBase($Debug, $mySqlConnection);
		$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		return $return;
	}
	
	public function InfraToolsCreateDataBase($Debug)
	{
		$mySqlConnection;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		
		$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();

		$return = $InfraToolsFacedePersistenceDataBase->DropInfraToolsDataBase($Debug, $mySqlConnection);
		if($return == ConfigInfraTools::SUCCESS)
			echo ": " . ConfigInfraTools::SUCCESS . "<br>";
		else return $mySqlConnection->rollback();
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBase($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";	
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableCorporation($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";		
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableCountry($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeUser($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";	
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableUser($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";	
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableDepartment($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";	
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeTicket($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";	
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeService($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";	
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableService($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";	
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeStatusTicket($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";		
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTicket($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocTicketUserResponsible($Debug,
																										  $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableHistoryTicket($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeAssocUserService($Debug,
																											  $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserService($Debug,
																										  $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeTimeMonitoring($Debug,
																										    $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeMonitoring($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeStatusMonitoring($Debug,
																											  $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableStatusMonitoring($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableMonitoring($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableHistoryService($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableHistoryMonitoring($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeAssocUserRequesting($Debug,
																											$mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocTicketUserRequesting($Debug,
																											  $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableNotification($Debug,
																								 $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserCorporation($Debug,
																								         $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableSystemConfiguration($Debug,
																								        $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTeam($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeAssocUserTeam($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserTeam($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableInformationService($Debug,
																											$mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTablePreference($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableRole($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserRole($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserPreference($Debug,
																											 $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableIpAddress($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocIpAddressService($Debug,
																											   $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableUrlAddress($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUrlAddressService($Debug,
																												$mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerServiceAfterInsert($Debug,
																										      $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerServiceAfterUpdate($Debug,
																										      $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerUserGenderAfterInsert($Debug,
																												 $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerUserGenderAfterUpdate($Debug,
																												 $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertCountry($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertPreference($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertRole($Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertSystemConfiguration($Debug,
																											  $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeAssocUserTeam($Debug,
																											$mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeAssocUserService($Debug,
																											   $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeService($Debug,
																									  $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeStatusTicket($Debug,
																									  $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeTicket($Debug,
																									 $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeUser($Debug,
																								   $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
				echo ": " . ConfigInfraTools::SUCCESS . "<br>";
			else $mySqlConnection->rollback();
		}
		
		$mySqlConnection->commit();	
		$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceDeleteById($ServiceId, $UserEmail, $Debug)
	{
		$mySqlConnection = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
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
			    $return = $InfraToolsFacedePersistenceService->ServiceDeleteById($ServiceId, 
																				 $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$mySqlConnection->commit();
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
					return ConfigInfraTools::SUCCESS;
				}
				else $mySqlConnection->rollback();
			}
			else $mySqlConnection->rollback();
		}
		$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		return ConfigInfraTools::ERROR;
	}
	
	public function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug)
	{
		$mySqlConnection = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
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
					return ConfigInfraTools::SUCCESS;
				}
				else $mySqlConnection->rollback();
			}
			else $mySqlConnection->rollback();
		}
		$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		return ConfigInfraTools::ERROR;
	}
	public function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
								  $ServiceDepartment, $ServiceDepartmentCanChange,
								  $ServiceDescription, $ServiceName, $ServiceType, $UserEmail, $Debug)
	{
		$mySqlConnection;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceInsert($ServiceActive, $ServiceCorporation,
																	 $ServiceCorporationCanChange,
																     $ServiceDepartment, $ServiceDepartmentCanChange,
										                             $ServiceDescription, $ServiceName, $ServiceType, 
																	 $Debug, $mySqlConnection);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $this->AssocUserServiceInsert($mySqlConnection->insert_id, $UserEmail,
													1, $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$mySqlConnection->commit();
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return ConfigInfraTools::SUCCESS;
			}
			else $mySqlConnection->rollback();
		}
		$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		return $return;
	}
	public function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug, 
								  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolService, 
																     $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                   &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2,
																			     $ArrayInstanceInfraToolService, 
																                 $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
												 &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2,
																				    $ArrayInstanceInfraToolService,
																				    $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolService, 
														$Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceActiveNoLimit($ServiceActive,
																						$ArrayInstanceInfraToolService, 
																						$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2,
															  &$ArrayInstanceInfraToolService, 
															  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, 
																							  $Limit2, $ArrayInstanceInfraToolService, 
															                                  $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail, &$ArrayInstanceInfraToolService, 
																	 $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
																									 $ArrayInstanceInfraToolService, 
																	                                 $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
													  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2,
																					     $ArrayInstanceInfraToolService, 
																					     $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolService, 
															 $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceCorporationNoLimit($ServiceCorporation,
																							    $ArrayInstanceInfraToolService,
																							    $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail, $Limit1, $Limit2,
																   &$ArrayInstanceInfraToolService, 
																   &$RowCount, $Debug, 
																   $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, 
																									  $UserEmail,
																								      $Limit1, $Limit2,
																								      $ArrayInstanceInfraToolService, 
																									  $RowCount, $Debug,
																									  $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		  &$ArrayInstanceInfraToolService, 
																		  &$RowCount, $Debug,
																		  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation,
																									   $UserEmail,
																									   $ArrayInstanceInfraToolService,
																									   $RowCount,
																									   $Debug,
 																									   $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2,
													 &$ArrayInstanceInfraToolService, &$RowCount, 
													 $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, 
																					    $Limit1, $Limit2,
																					    $ArrayInstanceInfraToolService, $RowCount,
																						$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment, 
															&$ArrayInstanceInfraToolService, 
															$Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation,
																							$ServiceDepartment,
																							$ArrayInstanceInfraToolService,
																							$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																  $Limit1, $Limit2,
																  &$ArrayInstanceInfraToolService, 
																  &$RowCount, $Debug, $MySqlConnection = NULL, 
																  $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation,
																								  $ServiceDepartment, $UserEmail,
																								  $Limit1, $Limit2,
																								  $ArrayInstanceInfraToolService, 
																                                  $RowCount, $Debug,
																								  $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail,
																		 &$ArrayInstanceInfraToolService, 
																		 $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation,
			                                                                                        $ServiceDepartment,
																									$UserEmail,
																									$ArrayInstanceInfraToolService, 
																		                            $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceId($ServiceId, &$Service, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceId($ServiceId, $Service, $Debug);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$Service, 
														  &$TypeAssocUserServiceId, $Debug, 
														  $MySqlConnection = NULL, $CloseConnectaion = FALSE)	
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, 
																						     $Service, 
																							 $TypeAssocUserServiceId,
																							 $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	public function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
											   &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2,
																			      $ArrayInstanceInfraToolService,
																			      $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolService, 
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceNameNoLimit($ServiceName, 
																					     $ArrayInstanceInfraToolService, 
																						 $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, $Limit1, $Limit2,
															&$ArrayInstanceInfraToolService, &$RowCount, 
															$Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
																							   $Limit1, $Limit2,
																							   $ArrayInstanceInfraToolService,
																							   $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																   &$ArrayInstanceInfraToolService, 
																   $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail,
																								      $ArrayInstanceInfraToolService,
																								      $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceType($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
											   &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceType($ServiceName, $Limit1, $Limit2,
																			      $ArrayInstanceInfraToolService,
																			      $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolService, 
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceTypeNoLimit($ServiceType, $ArrayInstanceInfraToolService,
																					     $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, $Limit1, $Limit2, 
															&$ArrayInstanceInfraToolService, &$RowCount, 
															$Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, 
																							   $Limit1, $Limit2, $ArrayInstanceInfraToolService,
																							   $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																   &$ArrayInstanceInfraToolService, 
																   $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																								      $ArrayInstanceInfraToolService,
																								      $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                            &$ArrayInstanceInfraToolService, 
			                                            &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                                                               $ArrayInstanceInfraToolService, 
			                                                                               $RowCount, $Debug,
																						   $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
															   &$ArrayInstanceInfraToolService, 
															   $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByTypeAssocUserServiceNoLimit(
			                                                            $TypeAssocUserService, 
															            $ArrayInstanceInfraToolService, 
															            $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
																	 $UserEmail, $Limit1, $Limit2, 
																	 &$ArrayInstanceInfraToolService, 
																	 &$RowCount, $Debug, 
																	 $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByTypeAssocUserServiceOnUserContext(
			                                                                            $TypeAssocUserService,
			                                                                            $UserEmail,
			                                                                            $Limit1, $Limit2, 
			                                                                            $ArrayInstanceInfraToolService, 
			                                                                            $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
																			$UserEmail,
																			&$ArrayInstanceInfraToolService, 
																			$Debug, 
																			$MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit(
			                                                                            $TypeAssocUserService,
			                                                                            $UserEmail,
			                                                                            $ArrayInstanceInfraToolService, 
			                                                                            $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, 
										&$ArrayInstanceInfraToolService, 
										&$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByUser($UserEmail, $Limit1, $Limit2,
																		   $ArrayInstanceInfraToolService, 
																		   $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolService, 
											   $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectByUserNoLimit($UserEmail, $ArrayInstanceInfraToolService, 
																				  $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceSelectNoLimit(&$ArrayInstanceInfraToolService, $Debug,
										$MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceSelectNoLimit($ArrayInstanceInfraToolService, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
											 $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
									         $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											 $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
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
		return $return;
	}
	
	public function ServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, 
													 $ServiceId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
		$return = $InfraToolsFacedePersistenceService->ServiceUpdateRestrictByServiceId($ServiceActiveNew,
																						$ServiceDescriptionNew,
																						$ServiceNameNew,
																						$ServiceTypeNew, 
																						$ServiceId, 
																						$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function TypeAssocUserServiceSelect(&$ArrayInstanceInfraToolsTypeAssocUserService,&$RowCount,
			                                   $Limit1, $Limit2, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
		$return = $InfraToolsFacedePersistenceTypeAssocUserService->TypeAssocUserServiceSelect(
			                                                          $ArrayInstanceInfraToolsTypeAssocUserService,
																	  $RowCount,
			                                                          $Limit1, $Limit2, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
		$return = $InfraToolsFacedePersistenceTypeAssocUserService->TypeAssocUserServiceSelectNoLimit(
			                                                     $ArrayInstanceInfraToolsTypeAssocUserService, 
			                                                     $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function TypeAssocUserServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeAssocUserService, 
															$UserEmail, &$RowCount,
			                                                $Limit1, $Limit2, $Debug,
														    $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
		$return = $InfraToolsFacedePersistenceTypeAssocUserService->TypeAssocUserServiceSelectOnUserContext(
			                                                               $ArrayInstanceInfraToolsTypeAssocUserService, 
												                           $UserEmail, $RowCount,
			                                                               $Limit1, $Limit2, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	public function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
																   $UserEmail, $Debug,
																   $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
		$return = $InfraToolsFacedePersistenceTypeAssocUserService->TypeAssocUserServiceSelectOnUserContextNoLimit(
			                                              $ArrayInstanceInfraToolsTypeAssocUserService, 
			                                              $UserEmail, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function TypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, 
			                          $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
		$return = $InfraToolsFacedePersistenceTypeService->TypeServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsTypeService,
																			 $RowCount,
																			 $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function TypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug, 
											 $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
		$return = $InfraToolsFacedePersistenceTypeService->TypeServiceSelectNoLimit($ArrayInstanceInfraToolsTypeService,
																					$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,&$ArrayInstanceInfraToolsTypeService, 
			                                       $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
		$return = $InfraToolsFacedePersistenceTypeService->TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
			                                                                              $ArrayInstanceInfraToolsTypeService,
																						  $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function TypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, 
														  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
		$return = $InfraToolsFacedePersistenceTypeService->TypeServiceSelectOnUserContextNoLimit($UserEmail,
			                                                                                     $ArrayInstanceInfraToolsTypeService,
																							     $Debug,
																								 $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function UserInfraToolsSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug,
										 $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceuser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
		$return = $InfraToolsFacedePersistenceuser->UserInfraToolsSelect($Limit1, $Limit2, $ArrayInstanceUser, 
																		 $RowCount, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function UserInfraToolsSelectByCorporation($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, 
													  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceuser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
		$return = $InfraToolsFacedePersistenceuser->UserInfraToolsSelectByCorporation($CorporationName, $Limit1, $Limit2,
																				      $ArrayInstanceUser, $RowCount, 
																					  $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function UserInfraToolsSelectByUserEmail($Email, &$InstanceUser, 
												    $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceuser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
		$return = $InfraToolsFacedePersistenceuser->UserInfraToolsSelectByUserEmail($Email, $InstanceUser, 
																				$Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function UserInfraToolsSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, 
													   $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$InfraToolsFacedePersistenceuser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
		$return = $InfraToolsFacedePersistenceuser->UserInfraToolsSelectByUserUniqueId($UserUniqueId, $InstanceUser,
																					   $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
}