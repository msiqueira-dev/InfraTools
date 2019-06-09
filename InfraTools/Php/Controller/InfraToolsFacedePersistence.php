<?php

/************************************************************************
Class: InfraToolsFacedePersistence
Creation: 2015/02/12
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Country.php
			Base       - Php/Model/TypeUser.php
			InfraTools - Php/Model/CorporationInfraTools.php
	
Description: 
			Class with the Pattern Facede for dealing wuth database classes
Methods: 
			public function InfraToolsAssocIpAddressServiceDeleteByServiceId($AssocIpAddressServiceServiceId,
			                                                                 $Debug, $MySqlConnection = NULL, 
																			 $CloseConnectaion = TRUE);
			public function InfraToolsAssocIpAddressServiceDeleteByServiceIdAndIpAddressIpv4($AssocIpAddressServiceServiceId,
			                                                                                 $AssocIpAddressServiceServiceIp,
			                                                                                 $Debug, $MySqlConnection = NULL, 
																							 $CloseConnectaion = TRUE);
			public function InfraToolsAssocIpAddressServiceInsert($AssocIpAddressServiceServiceId, $AssocIpAddressServiceServiceIp,
			                                                      $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsAssocIpAddressService, 
			                                                      &$RowCount, $Debug, 
								                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsAssocIpAddressServiceSelectByServiceIdAndIpAddressIpv4($AssocIpAddressServiceServiceId,
			                                                                                 $AssocIpAddressServiceServiceIp,
			                                                                                 $Debug, $MySqlConnection = NULL, 
																							 $CloseConnectaion = TRUE);
			public function InfraToolsAssocIpAddressServiceSelectByServiceId($Limit1, $Limit2, $AssocIpAddressServiceServiceId,
																			 &$ArrayInstanceInfraToolsAssocIpAddressService, &$RowCount,
																			 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit($AssocIpAddressServiceServiceId,
			                                                                        &$ArrayInstanceInfraToolsAssocIpAddressService,
			                                                                        $Debug, $MySqlConnection = NULL, 
																			        $CloseConnectaion = TRUE);
			public function InfraToolsAssocIpAddressServiceSelectByServiceIp($AssocIpAddressServiceServiceIp,
			                                                                 $Debug, $MySqlConnection = NULL, 
																			 $CloseConnectaion = TRUE);
			public function InfraToolsAssocUserServiceCheckUserTypeAdministrator($AssocUserServiceServiceId, $AssocUserServiceUserEmail,
			                                                                     $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceId, $Debug,
			                                                                            $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceId, 
			                                                                                    $AssocUserServiceEmail, $Debug, 
																					            $MySqlConnection = NULL, 
																					            $CloseConnectaion = TRUE);
			public function InfraToolsAssocUserServiceInsert($AssocUserServiceId, $AssocUserServiceEmail, $AssocUserServiceTypeAssocUserService,
										                     $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsAssocUserServiceSelectByAssocUserServiceServiceId($Limit1, $Limit2, $AssocUserServiceId, 
			                                                                            &$ArrayInstanceInfraToolsAssocUserService, 
			                                                                            &$RowCount, $Debug, 
																			            $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
			                                                                                   &$ArrayInstanceInfraToolsAssocUserService, 
			                                                                                   $Debug, $MySqlConnection = NULL, 
																					           $CloseConnectaion = TRUE);
			public function InfraToolsCorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, 
			                                            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsCorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, 
			                                                         $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsCorporationSelectByName($CorporationName, &$CorporationInstance, 
			                                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsCorporationSelectNoLimit(&$ArrayInstanceCorporation, 
			                                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsCorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail 
			                                                                &$ArrayInstanceInfraToolsCorporation, 
																            &$RowCount, $Debug, $MySqlConnection = NULL, 
																            $CloseConnectaion = TRUE);
			public function InfraToolsCorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, 
			                                                                       $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsDepartmentSelectOnUserServiceContext($Limit1, $Limit2, $UserCorporation, $UserEmail, 
	                                                                       &$ArrayInstanceInfraToolsDepartment, &$RowCount, $Debug,
																           $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsDepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, 
			                                                                      &$ArrayInstanceInfraToolsDepartment, $Debug,
																		          $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsDataBackup(&$FileName, &$FileNamePath, $Debug)
			public function InfraToolsDataBaseCheck(&$ArrayTables, &$StringMessage, $Debug);
			public function InfraToolsDataBaseCreate(&$StringMessage, $Debug);
			public function InfraToolsDataBaseGetRowCount(&$RowCount, $Debug);
			public function InfraToolsDataBaseImport($InsertQueries, &$ErrorQueires, &$StringMessage, $Debug);
			public function InfraToolsIpAddressDeleteByIpAddressIpv4($IpAddressIpv4, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsIpAddressInsert($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6,
			                                          $InstanceInfraToolsNetwork, $InsertNetwork, $Debug, 
			                                          $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsIpAddressSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsIpAddress, &$RowCount, $Debug, 
								                      $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsIpAddressSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsIpAddress, 
															         &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsIpAddressSelectByIpAddressIpv6($Limit1, $Limit2, $IpAddressIpv6, &$ArrayInstanceInfraToolsIpAddress, 
															         &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsIpAddressSelectNoLimit(&$ArrayInstanceInfraToolsIpAddress, $Debug, $MySqlConnection = NULL,
													         $CloseConnectaion = TRUE);
			public function InfraToolsIpAddressSelect(&$ArrayInstanceInfraToolsIpAddress, $Debug, 
								                      $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsIpAddressUpdateByIpAddressIpv4($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
															         $IpAddressNetworkNew, $IpAddressIpv4, $Debug, 
															         $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsIpAddressUpdateByIpAddressIpv6($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New, 
															         $IpAddressNetworkNew, $IpAddressIpv6, $Debug, 
			                                                         $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsNetworkDeleteByNetworkName($NetworkName, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsNetworkInsert($NetworkIp, $NetworkName, $NetworkNetmask, $Debug,
			                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsNetworkSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsNetwork, &$RowCount, $Debug,
			                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsNetworkSelectByNetworkIp($Limit1, $Limit2, $NetworkIp, &$ArrayInstanceInfraToolsNetwork,
															   &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsNetworkSelectByNetworkName($Limit1, $Limit2, $NetworkName, &$ArrayInstanceInfraToolsNetwork, 
													             &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsNetworkSelectByNetworkNameNoLimit($NetworkName, &$ArrayInstanceInfraToolsNetwork, 
														                $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsNetworkSelectByNetworkNetmask($Limit1, $Limit2, $NetworkNetmask, &$ArrayInstanceInfraToolsNetwork, 
															        &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsNetworkSelectNoLimit(&$ArrayInstanceInfraToolsNetwork, $Debug, $MySqlConnection = NULL, 
			                                               $CloseConnectaion = TRUE);
			public function InfraToolsNetworkUpdateByNetworkName($NetworkIpNew, $NetworkNameNew, $NetworkNetmaskNew, $NetworkName,
			                                                     $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceDeleteByServiceId($ArrayIpAddressIpv4, $ServiceId, $Debug);
			public function InfraToolsServiceDeleteByServiceIdOnUserContext($ServiceId, $UserEmail, $Debug);
			public function InfraToolsServiceInsert($IpAddressIpv4, $ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                                        $ServiceDepartment, $ServiceDepartmentCanChange,
										            $ServiceDescription, $ServiceName, $ServiceType, $Debug);
			public function InfraToolsServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, 
			                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                                     &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                                       &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, $Debug,
			                                                              $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, $UserEmail, 
			                                                                    &$ArrayInstanceInfraToolsService, &$RowCount, 
																	            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail, 
			                                                                           &$ArrayInstanceInfraToolsService, 
												    							       $Debug, $MySqlConnection = NULL, 
																					   $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation, &$ArrayInstanceInfraToolsService, 
															            &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
			                                                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2,$ServiceCorporation, $UserEmail, 
																		             &$ArrayInstanceInfraToolsService, 
																		             &$RowCount, $Debug,
																		             $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																				            &$ArrayInstanceInfraToolsService, $Debug, 
																				            $MySqlConnection = NULL, 
																				            $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceDepartment($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment,
			                                                           &$ArrayInstanceInfraToolsService, &$RowCount, $Debug,
															           $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
			                                                                  &$ArrayInstanceInfraToolsService, $Debug,
												     					      $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, $ServiceCorporation, 
			                                                                        $ServiceDepartment, $UserEmail, 
																		            &$ArrayInstanceInfraToolsService, 
																		            &$RowCount, $Debug, $MySqlConnection = NULL, 
																		            $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																				 &$ArrayInstanceInfraToolsService, 
																				 $Debug, $MySqlConnection = NULL, 
																				 $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceId($ServiceId, &$ArrayInstanceInfraToolsAssocIpAddressService, &$Service,
	                                                           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)	
			public function InfraToolsServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, 
																	        &$ArrayInstanceInfraToolsAssocIpAddressService, 
																	        &$Service, &$TypeAssocUserServiceId, $Debug, 
														                    $MySqlConnection = NULL, $CloseConnectaion = TRUE)
			public function InfraToolsServiceSelectByServiceName($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
			                                                     &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);	
			public function InfraToolsServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
			                                                            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);	
			public function InfraToolsServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail, 
																	          &$ArrayInstanceInfraToolsService, 
																	          &$RowCount, $Debug,$MySqlConnection = NULL, 
																	          $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																		             &$ArrayInstanceInfraToolsService, 
																		             $Debug, $MySqlConnection = NULL, 
																		             $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceType($Limit1, $Limit2, $ServiceType, &$ArrayInstanceInfraToolsService, 
			                                                     &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, 
			                                                            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail, 
																	          &$ArrayInstanceInfraToolsService, &$RowCount, 
																	          $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																		             &$ArrayInstanceInfraToolsService, 
																		             $Debug, $MySqlConnection = NULL, 
																		             $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByTypeAssocUserServiceDescription(TypeAssocUserServiceDescription, $Limit1, $Limit2, 
			                                                                         &$ArrayInstanceInfraToolsService, &$RowCount, 
																                     $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription,
			                                                                                &$ArrayInstanceInfraToolsService, 
																                            $Debug, $MySqlConnection = NULL, 
																							$CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2,
			                                                                                      $TypeAssocUserServiceDescription, $UserEmail, 
			                                                                                      &$ArrayInstanceInfraToolsService, 
																			                      &$RowCount, $Debug,
																			                      $MySqlConnection = NULL, 
																								  $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit($TypeAssocUserServiceDescription, 
			                                                                                             $UserEmail,
																										 &$ArrayInstanceInfraToolsService, 
																		                                 $Debug,
																					                     $MySqlConnection = NULL, 
																							             $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByUser($Limit1, $Limit2, $UserEmail, &A$rrayInstanceInfraToolService, 
			                                              &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, 
			                                                     $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug,  $MySqlConnection = NULL, 
			                                               $CloseConnectaion = TRUE);
			public function InfraToolsServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
			                                                   $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
									                           $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											                   $Debug, MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew,
			                                                           $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											                           $Debug, MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsTypeAssocUserServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService, &$RowCount,
													             $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2, 
			                                                                  &$ArrayInstanceInfraToolsTypeAssocUserService, $UserEmail,
																			  &$RowCount, $Debug, $MySqlConnection = NULL, 
																			  $CloseConnectaion = TRUE);
			public function InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
			                                                                         $UserEmail, $Debug,
																		             $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsTypeServiceDeleteByTypeTypeServiceName($TypeServiceName, $Debug, $MySqlConnection = NULL, 
			                                                                 $CloseConnectaion = TRUE);
			public function InfraToolsTypeServiceInsert($TypeServiceName, $TypeServiceSLA, $Debug, $MySqlConnection = NULL, 
			                                            $CloseConnectaion = TRUE);
			public function InfraToolsTypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, 
			                                            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
	        public function InfraToolsTypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, 
			                                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsTypeServiceSelectOnUserContext(Limit1, $Limit2, $UserEmail,
			                                                         &$ArrayInstanceInfraToolsTypeService, $Debug,
														             $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsTypeServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, $UserEmail, $Debug,
																            $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
			                                     $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                                      $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByTypeMonitoringDescription($Limit1, $Limit2, $TypeMonitoringDescription,
			                                                                &$ArrayInstanceInfraToolsUser,
			                                                                &$RowCount, $Debug, $MySqlConnection = NULL, 
																			$CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, 
			                                                     &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug, 
																 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsUser, &$RowCount,
			                                                    $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceInfraToolsUser, &$RowCount,
			                                                     $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                               $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
			                                                MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
			                                             $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
			                                              $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription,
			                                                                   &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
																			   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketescription, &$ArrayInstanceInfraToolsUser, 
			                                                            &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceInfraToolsUser, 
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
	
	public function InfraToolsAssocIpAddressServiceDeleteByServiceId($AssocIpAddressServiceServiceId, $Debug, 
	                                                                 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocIpAddressService = $this->Factory->CreateInfraToolsFacedePersistenceAssocIpAddressService();
			$return = $InfraToolsFacedePersistenceAssocIpAddressService->InfraToolsAssocIpAddressServiceDeleteByServiceId(
																							 $AssocIpAddressServiceServiceId,
				                                                                             $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsAssocIpAddressServiceDeleteByServiceIdAndIpAddressIpv4($AssocIpAddressServiceServiceId,
																					 $AssocIpAddressServiceServiceIp,
																					 $Debug, $MySqlConnection = NULL, 
																					 $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocIpAddressService = $this->Factory->CreateInfraToolsFacedePersistenceAssocIpAddressService();
			$return = $InfraToolsFacedePersistenceAssocIpAddressService->InfraToolsAssocIpAddressServiceDeleteByServiceIdAndIpAddressIpv4(
																							 $AssocIpAddressServiceServiceId,
				                                                                             $AssocIpAddressServiceServiceIp, $Debug,
				                                                                             $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsAssocIpAddressServiceInsert($AssocIpAddressServiceServiceId, $AssocIpAddressServiceServiceIp,
														  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocIpAddressService = $this->Factory->CreateInfraToolsFacedePersistenceAssocIpAddressService();
			$return = $InfraToolsFacedePersistenceAssocIpAddressService->InfraToolsAssocIpAddressServiceInsert(
																							 $AssocIpAddressServiceServiceId,
				                                                                             $AssocIpAddressServiceServiceIp, $Debug,
				                                                                             $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsAssocIpAddressService, 
			                                              &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocIpAddressService = $this->Factory->CreateInfraToolsFacedePersistenceAssocIpAddressService();
			$return = $InfraToolsFacedePersistenceAssocIpAddressService->InfraToolsAssocIpAddressServiceSelect(
																							 $Limit1, $Limit2,
				                                                                             $ArrayInstanceInfraToolsAssocIpAddressService, 
				                                                                             $RowCount, $Debug,
				                                                                             $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsAssocIpAddressServiceSelectByServiceIdAndIpAddressIpv4($AssocIpAddressServiceServiceId,
																					 $AssocIpAddressServiceServiceIp,
																					 $Debug, $MySqlConnection = NULL, 
																					 $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocIpAddressService = $this->Factory->CreateInfraToolsFacedePersistenceAssocIpAddressService();
			$return = $InfraToolsFacedePersistenceAssocIpAddressService->InfraToolsAssocIpAddressServiceSelectByServiceIdAndIpAddressIpv4(
																							 $AssocIpAddressServiceServiceId,
				                                                                             $AssocIpAddressServiceServiceIp, $Debug,
				                                                                             $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsAssocIpAddressServiceSelectByServiceId($Limit1, $Limit2, $AssocIpAddressServiceServiceId,
																	 &$ArrayInstanceInfraToolsAssocIpAddressService, &$RowCount,
																	 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocIpAddressService = $this->Factory->CreateInfraToolsFacedePersistenceAssocIpAddressService();
			$return = $InfraToolsFacedePersistenceAssocIpAddressService->InfraToolsAssocIpAddressServiceSelectByServiceId($Limit1, $Limit2,
																							 $AssocIpAddressServiceServiceId,
																							 $ArrayInstanceInfraToolsAssocIpAddressService,
				                                                                             $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}

	
	public function InfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit($AssocIpAddressServiceServiceId,
			                                                                &$ArrayInstanceInfraToolsAssocIpAddressService,
			                                                                $Debug, $MySqlConnection = NULL, 
																			$CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocIpAddressService = $this->Factory->CreateInfraToolsFacedePersistenceAssocIpAddressService();
			$return = $InfraToolsFacedePersistenceAssocIpAddressService->InfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit(
																							 $AssocIpAddressServiceServiceId,
																							 $ArrayInstanceInfraToolsAssocIpAddressService,
																							 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}

	public function InfraToolsAssocIpAddressServiceSelectByServiceIp($AssocIpAddressServiceServiceIp,
																	 $Debug, $MySqlConnection = NULL, 
																	 $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocIpAddressService = $this->Factory->CreateInfraToolsFacedePersistenceAssocIpAddressService();
			$return = $InfraToolsFacedePersistenceAssocIpAddressService->InfraToolsAssocIpAddressServiceSelectByServiceIp(
																							 $AssocIpAddressServiceServiceIp,
				                                                                             $Debug,
				                                                                             $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsAssocUserServiceCheckUserTypeAdministrator($AssocUserServiceServiceId, $AssocUserServiceUserEmail,
			                                                             $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->InfraToolsAssocUserServiceCheckUserTypeAdministrator(
																								$AssocUserServiceServiceId,
																								$AssocUserServiceUserEmail,
																								$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
		
	}
	
	public function InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceId($AssocUserServiceId, $Debug, 
																	            $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceId(
																							 $AssocUserServiceId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail($AssocUserServiceId, $AssocUserServiceEmail, 
																			            $Debug, $MySqlConnection = NULL, 
																						$CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail(
																							$AssocUserServiceId, 
																							$AssocUserServiceEmail, 
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsAssocUserServiceInsert($AssocUserServiceId, $AssocUserServiceEmail, $AssocUserServiceTypeAssocUserService,
										             $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->InfraToolsAssocUserServiceInsert($AssocUserServiceId, 
																						             $AssocUserServiceEmail,
																						             $AssocUserServiceTypeAssocUserService,
																						             $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsAssocUserServiceSelectByAssocUserServiceServiceId($Limit1, $Limit2, $AssocUserServiceId, 
			                                                                   &$ArrayInstanceInfraToolsAssocUserService, 
			                                                                   &$RowCount, $Debug, 
																	           $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->InfraToolsAssocUserServiceSelectByAssocUserServiceServiceId(
				                                                                            $Limit1, $Limit2,
																							$AssocUserServiceId,  
																							$ArrayInstanceInfraToolsAssocUserService, 
																							$RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function InfraToolsAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit($AssocUserServiceId, 
																			           &$ArrayInstanceInfraToolsAssocUserService, $Debug, 
																			           $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceAssocUserService();
			$return = $InfraToolsFacedePersistenceAssocUserService->InfraToolsAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit(
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
		if($return == ConfigInfraTools::RET_OK)
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
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->InfraToolsCorporationSelectActiveNoLimit($ArrayInstanceCorporation,
																										$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsCorporationSelectByName($CorporationName, &$CorporationInstance, 
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->InfraToolsCorporationSelectByName($CorporationName, $CorporationInstance, 
																								 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraTools(&$ArrayInstanceCorporation, $Debug, 
													   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->InfraTools($ArrayInstanceCorporation, 
																								  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsCorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail, 
			                                                        &$ArrayInstanceInfraToolsCorporation, 
														            &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->InfraToolsCorporationSelectOnUserServiceContext($Limit1, $Limit2,$UserEmail,
																									    $ArrayInstanceInfraToolsCorporation, 
																									    $RowCount, $Debug,
																									    $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
																	  
	
	public function InfraToolsCorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, 
																           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceCorporation = $this->Factory->CreateInfraToolsFacedePersistenceCorporation();
			$return = $InfraToolsFacedePersistenceCorporation->InfraToolsCorporationSelectOnUserServiceContextNoLimit($UserEmail,
																									$ArrayInstanceInfraToolsCorporation, 
																									$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsDepartmentSelectOnUserServiceContext($Limit1, $Limit2, $UserCorporation, $UserEmail, 
	                                                               &$ArrayInstanceInfraToolsDepartment, &$RowCount, 
														           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceDepartment = $this->Factory->CreateInfraToolsFacedePersistenceDepartment();
			$return = $InfraToolsFacedePersistenceDepartment->InfraToolsDepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail,
																								   $ArrayInstanceInfraToolsDepartment, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsDepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, 
															     	      &$ArrayInstanceInfraToolsDepartment, 
																          $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceDepartment = $this->Factory->CreateInfraToolsFacedePersistenceDepartment();
			$return = $InfraToolsFacedePersistenceDepartment->InfraToolsDepartmentSelectOnUserServiceContextNoLimit($UserCorporation,
																									  $UserEmail,
																									  $ArrayInstanceInfraToolsDepartment,
																									  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsDataBackup(&$FileName, &$FileNamePath, $Debug)
	{
		$FileName = $this->Config->DefaultApplicationName . "-Dump-".date("Y-m-d-H-i") . ".sql";
		$FileNamePath = $this->Config->DefaultUploadDirectory . "/" . $FileName;
		$Command = "    "     .      $this->Config->DefaultMySqlDumpPath          . " --extended-insert=FALSE  " .
			       " -u "     .      $this->Config->DefaultMySqlSuperUser         .
			       "  -p"     .      $this->Config->DefaultMySqlSuperUserPassword .
			       " --port=" .      $this->Config->DefaultMySqlPort              .
			       " -h "     .      $this->Config->DefaultMySqlAddress           . " --no-create-info --skip-triggers --complete-insert" .
					                                                                  " --order-by-primary " .
									  $this->Config->DefaultMySqlDataBase          .  " > " . $FileNamePath;
		exec($Command);
		if(file_exists($FileNamePath) && filesize($FileNamePath) > 0)
			return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RET_ERROR;
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
		if($return == ConfigInfraTools::DB_ERROR_DATABASE_NOT_FOUND)
			return ConfigInfraTools::DB_ERROR_DATABASE_NOT_FOUND;
		elseif($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();
			$return = $InfraToolsFacedePersistenceDataBase->InfraToolsDataBaseCheck($ArrayTables, $StringMessage, $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::RET_OK)
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
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();
			$return = $InfraToolsFacedePersistenceDataBase->DropInfraToolsDataBase($StringMessage, $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::RET_OK)
				$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
			else return $mySqlConnection->rollback();
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBase($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableCorporation($StringMessage,
																										 $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";		
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableCountry($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeUser($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableUser($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableDepartment($StringMessage, 
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeTicket($StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeService($StringMessage,
																										 $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableService($StringMessage, 
																									 $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";	
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeStatusTicket($StringMessage,
																											  $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";		
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTicket($StringMessage,
																									$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocTicketUserResponsible($StringMessage,
																														$Debug,
																											            $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableHistoryTicket($StringMessage,
																										   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeAssocUserService($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserService($StringMessage,
																											  $Debug,
																											  $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeTimeMonitoring($StringMessage,
																												$Debug,
																												$mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeMonitoring($StringMessage,
																											$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeStatusMonitoring($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableMonitoring($StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableHistoryService($StringMessage,
																											$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableHistoryMonitoring($StringMessage,
																											   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeAssocUserRequesting($StringMessage,
																													 $Debug,
																												     $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocTicketUserRequesting($StringMessage,
																													   $Debug,
																												       $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableNotification($StringMessage,
																										  $Debug,
																									      $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserNotification($StringMessage,
																												  $Debug,
																											      $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserCorporation($StringMessage,
																												  $Debug,
																											      $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableSystemConfiguration($StringMessage,
																												 $Debug,
																											     $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTeam($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableTypeAssocUserTeam($StringMessage, 
																											   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserTeam($StringMessage, 
																										   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableInformationService($StringMessage,
																												$Debug,
																												$mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTablePreference($StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableRole($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserRole($StringMessage,
																										   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUserPreference($StringMessage,
																												 $Debug,
																												 $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableNetwork($StringMessage,
																									   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableIpAddress($StringMessage,
																									   $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocIpAddressService($StringMessage,
																												   $Debug,
																												   $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableUrlAddress($StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTableAssocUrlAddressService($StringMessage,
																													$Debug,
																													$mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerServiceAfterInsert($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerServiceAfterUpdate($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerUserGenderAfterInsert($StringMessage,
																													 $Debug,
																													 $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseTriggerUserGenderAfterUpdate($StringMessage,
																													 $Debug,
																													 $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertCountry($StringMessage,
																									  $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertPreference($StringMessage,
																										 $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertRole($StringMessage, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertSystemConfiguration($StringMessage,
																												  $Debug,
																												  $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeAssocUserTeam($StringMessage,
																												$Debug,
																												$mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeAssocUserService($StringMessage,
																												   $Debug,
																												   $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeMonitoring($StringMessage,
																										     $Debug,
																										     $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeStatusMonitoring($StringMessage,
																										           $Debug,
																										           $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeTimeMonitoring($StringMessage,
																										           $Debug,
																										           $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeService($StringMessage,
																										  $Debug,
																										  $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeStatusTicket($StringMessage,
																											   $Debug,
																										       $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeTicket($StringMessage,
																										 $Debug,
																										 $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}

			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseInsertTypeUser($StringMessage,
																									   $Debug,
																									   $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseUserApplication($this->Config->DefaultMySqlUser,
																							            $this->Config->DefaultMySqlUserPassword,
																										$StringMessage,
																										$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK || ConfigInfraTools::DB_ERROR_USER_EXISTS)
				{
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br>";	
					$return = ConfigInfraTools::RET_OK;
				}
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $InfraToolsFacedePersistenceDataBase->CreateInfraToolsDataBaseUserApplicationImport(
					                                                                            $this->Config->DefaultMySqlImportUser,
																							    $this->Config->DefaultMySqlImportUserPassword,
																								$StringMessage,
																								$Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK || ConfigInfraTools::DB_ERROR_USER_EXISTS)
				{
					$StringMessage .= ": " . ConfigInfraTools::RET_OK . "<br><br>";	
					$return = ConfigInfraTools::RET_OK;
				}
				else $mySqlConnection->rollback();
			}
			
			if($return == ConfigInfraTools::RET_OK)
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
		if($return == ConfigInfraTools::DB_ERROR_DATABASE_NOT_FOUND)
			return ConfigInfraTools::DB_ERROR_DATABASE_NOT_FOUND;
		elseif($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();
			$return = $InfraToolsFacedePersistenceDataBase->InfraToolsDataBaseGetRowCount($RowCount, $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::RET_OK)
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
		if($return == ConfigInfraTools::DB_ERROR_DATABASE_NOT_FOUND)
			$return = ConfigInfraTools::DB_ERROR_DATABASE_NOT_FOUND;
		elseif($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceDataBase = $this->Factory->CreateInfraToolsFacedePersistenceDataBase();
			$return = $InfraToolsFacedePersistenceDataBase->InfraToolsDataBaseImport($InsertQueries, $ErrorQueires, $StringMessage, 
																					 $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::RET_OK)
				$mySqlConnection->commit();
			else $mySqlConnection->rollback();
			$StringMessage .= "<br><br>";
		}
		return $return;
	}
	
	public function InfraToolsIpAddressDeleteByIpAddressIpv4($IpAddressIpv4, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceIpAddress = $this->Factory->CreateInfraToolsFacedePersistenceIpAddress();
			$return = $InfraToolsFacedePersistenceIpAddress->InfraToolsIpAddressDeleteByIpAddressIpv4($IpAddressIpv4, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsIpAddressInsert($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $InstanceInfraToolsNetwork, 
	                                          $InsertNetwork, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$networkName = NULL;
			if(is_object($InstanceInfraToolsNetwork))
			{
				if (is_a($InstanceInfraToolsNetwork, "InfraToolsNetwork"))
				{
					if($InsertNetwork == TRUE)
					{
						$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
						$InfraToolsFacedePersistenceNetwork->InfraToolsNetworkInsert($InstanceInfraToolsNetwork->GetNetworkIp(), 
																					$InstanceInfraToolsNetwork->GetNetworkName(), 
																					$InstanceInfraToolsNetwork->GetNetworkNetmask(), 
																					$Debug, $MySqlConnection);
					}
					$networkName = $InstanceInfraToolsNetwork->GetNetworkName();
				}
			}
			elseif($InstanceInfraToolsNetwork != NULL) $networkName = $InstanceInfraToolsNetwork;
			$InfraToolsFacedePersistenceIpAddress = $this->Factory->CreateInfraToolsFacedePersistenceIpAddress();
			$return = $InfraToolsFacedePersistenceIpAddress->InfraToolsIpAddressInsert($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, 
																					   $networkName, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsIpAddressSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsIpAddress, &$RowCount, $Debug, 
								              $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceIpAddress = $this->Factory->CreateInfraToolsFacedePersistenceIpAddress();
			$return = $InfraToolsFacedePersistenceIpAddress->InfraToolsIpAddressSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsIpAddress,
																					   $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsIpAddressSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsIpAddress, 
															 &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceIpAddress = $this->Factory->CreateInfraToolsFacedePersistenceIpAddress();
			$return = $InfraToolsFacedePersistenceIpAddress->InfraToolsIpAddressSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4,
																									  $ArrayInstanceInfraToolsIpAddress, 
																									  $RowCount, $Debug,
																									  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsIpAddressSelectByIpAddressIpv6($Limit1, $Limit2, $IpAddressIpv6, &$ArrayInstanceInfraToolsIpAddress, 
															 &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceIpAddress = $this->Factory->CreateInfraToolsFacedePersistenceIpAddress();
			$return = $InfraToolsFacedePersistenceIpAddress->InfraToolsIpAddressSelectByIpAddressIpv6($Limit1, $Limit2, $IpAddressIpv6,
																									  $ArrayInstanceInfraToolsIpAddress, 
																									  $RowCount, $Debug,
																									  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsIpAddressSelectNoLimit(&$ArrayInstanceInfraToolsIpAddress, $Debug, $MySqlConnection = NULL,
													 $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceIpAddress = $this->Factory->CreateInfraToolsFacedePersistenceIpAddress();
			$return = $InfraToolsFacedePersistenceIpAddress->InfraToolsIpAddressSelectNoLimit($ArrayInstanceInfraToolsIpAddress, 
																					          $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsIpAddressUpdateByIpAddressIpv4($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
															 $IpAddressNetworkNew, $IpAddressIpv4, $Debug, 
															 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceIpAddress = $this->Factory->CreateInfraToolsFacedePersistenceIpAddress();
			$return = $InfraToolsFacedePersistenceIpAddress->InfraToolsIpAddressUpdateByIpAddressIpv4($IpAddressDescriptionNew,
																									  $IpAddressIpv4New, $IpAddressIpv6New,
																									  $IpAddressNetworkNew, 
																									  $IpAddressIpv4, $Debug,
																									  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsIpAddressUpdateByIpAddressIpv6($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New, 
															 $IpAddressNetworkNew, $IpAddressIpv6, $Debug, 
			                                                 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceIpAddress = $this->Factory->CreateInfraToolsFacedePersistenceIpAddress();
			$return = $InfraToolsFacedePersistenceIpAddress->InfraToolsIpAddressUpdateByIpAddressIpv6($IpAddressDescriptionNew,
																									  $IpAddressIpv4New, $IpAddressIpv6New,
																									  $IpAddressNetworkNew, 
																									  $IpAddressIpv6, $Debug,
																									  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsNetworkDeleteByNetworkName($NetworkName, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
			$return = $InfraToolsFacedePersistenceNetwork->InfraToolsNetworkDeleteByNetworkName($NetworkName, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsNetworkInsert($NetworkIp, $NetworkName, $NetworkNetmask, $Debug,
											$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
			$return = $InfraToolsFacedePersistenceNetwork->InfraToolsNetworkInsert($NetworkIp, $NetworkName, $NetworkNetmask,
																				   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsNetworkSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsNetwork, &$RowCount, $Debug,
											$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
			$return = $InfraToolsFacedePersistenceNetwork->InfraToolsNetworkSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsNetwork,
																				   $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function InfraToolsNetworkSelectByNetworkIp($Limit1, $Limit2, $NetworkIp, &$ArrayInstanceInfraToolsNetwork,
													   &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
			$return = $InfraToolsFacedePersistenceNetwork->InfraToolsNetworkSelectByNetworkIp($Limit1, $Limit2, $NetworkIp,
																				              $ArrayInstanceInfraToolsNetwork,
																				              $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function InfraToolsNetworkSelectByNetworkName($Limit1, $Limit2, $NetworkName, &$ArrayInstanceInfraToolsNetwork, 
														 &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
			$return = $InfraToolsFacedePersistenceNetwork->InfraToolsNetworkSelectByNetworkName($Limit1, $Limit2, $NetworkName,
																				                $ArrayInstanceInfraToolsNetwork,
																				                $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsNetworkSelectByNetworkNameNoLimit($NetworkName, &$ArrayInstanceInfraToolsNetwork, 
														        $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
			$return = $InfraToolsFacedePersistenceNetwork->InfraToolsNetworkSelectByNetworkNameNoLimit($NetworkName,
																				                       $ArrayInstanceInfraToolsNetwork,
																				                       $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsNetworkSelectByNetworkNetmask($Limit1, $Limit2, $NetworkNetmask, &$ArrayInstanceInfraToolsNetwork, 
															&$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
			$return = $InfraToolsFacedePersistenceNetwork->InfraToolsNetworkSelectByNetworkNetmask($Limit1, $Limit2, $NetworkNetmask,
																				                   $ArrayInstanceInfraToolsNetwork,
																				                   $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function InfraToolsNetworkSelectNoLimit(&$ArrayInstanceInfraToolsNetwork, $Debug, $MySqlConnection = NULL, 
												   $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
			$return = $InfraToolsFacedePersistenceNetwork->InfraToolsNetworkSelectNoLimit($ArrayInstanceInfraToolsNetwork,
																				          $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function InfraToolsNetworkUpdateByNetworkName($NetworkIpNew, $NetworkNameNew, $NetworkNetmaskNew, $NetworkName,
														 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceNetwork = $this->Factory->CreateInfraToolsFacedePersistenceNetwork();
			$return = $InfraToolsFacedePersistenceNetwork->InfraToolsNetworkUpdateByNetworkName($NetworkIpNew, $NetworkNameNew,
																								$NetworkNetmaskNew, $NetworkName,
																								$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function InfraToolsServiceDeleteByServiceId($ServiceId, $Debug)
	{
		$mySqlConnection = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$mySqlConnection->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);	
			$return = $this->InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceId($ServiceId, $Debug, $mySqlConnection, FALSE);
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $this->InfraToolsAssocIpAddressServiceDeleteByServiceId($ServiceId, $Debug, $mySqlConnection, FALSE);
				$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
				$return = $InfraToolsFacedePersistenceService->InfraToolsServiceDeleteByServiceId($ServiceId, $Debug, $mySqlConnection);
				if($return == ConfigInfraTools::RET_OK)
					$mySqlConnection->commit();
				else $mySqlConnection->rollback();
			}
			else $mySqlConnection->rollback();
			$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
			return $return;
		}
		return $return;
	}
	
	public function InfraToolsServiceDeleteByServiceIdOnUserContext($ServiceId, $UserEmail, $Debug)
	{
		$mySqlConnection = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $this->InfraToolsAssocUserServiceCheckUserTypeAdministrator($ServiceId, $UserEmail, $Debug, $mySqlConnection, FALSE);
			if($return == ConfigInfraTools::RET_OK)
			{
				$mySqlConnection->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
				$return = $this->InfraToolsAssocUserServiceDeleteByAssocUserServiceServiceId($ServiceId, $Debug, $mySqlConnection, FALSE);
				if($return == ConfigInfraTools::RET_OK)
				{
					$return = $this->InfraToolsAssocIpAddressServiceDeleteByServiceId($ServiceId, $Debug, $mySqlConnection, FALSE);
					$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
					$return = $InfraToolsFacedePersistenceService->InfraToolsServiceDeleteByServiceId($ServiceId, 
																									  $Debug, $mySqlConnection);
					if($return == ConfigInfraTools::RET_OK)
					{
						$mySqlConnection->commit();
						$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
						$return = ConfigInfraTools::RET_OK;
					}
					else $mySqlConnection->rollback();
				}
				else $mySqlConnection->rollback();
			}
			$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		}
		return $return;
	}
	public function InfraToolsServiceInsert($IpAddressIpv4, $ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
							     	        $ServiceDepartment, $ServiceDepartmentCanChange,
								            $ServiceDescription, $ServiceName, $ServiceType, $UserEmail, $Debug)
	{
		$mySqlConnection;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceInsert($ServiceActive, $ServiceCorporation,
																	  	           $ServiceCorporationCanChange,
																		           $ServiceDepartment, $ServiceDepartmentCanChange,
																				   $ServiceDescription, $ServiceName, $ServiceType, 
																		           $Debug, $mySqlConnection);
			if($return == ConfigInfraTools::RET_OK)
			{
				$serviceId = $mySqlConnection->insert_id;
				if(!empty($IpAddressIpv4))
				{
					$return = $this->InfraToolsAssocIpAddressServiceInsert($serviceId, 
					                                                       $IpAddressIpv4,
																		   $Debug, $mySqlConnection, FALSE);
				}
				if($return == ConfigInfraTools::RET_OK)
				{
					$return = $this->InfraToolsAssocUserServiceInsert($serviceId, $UserEmail,
																      1, $Debug, $mySqlConnection, FALSE);
					if($return == ConfigInfraTools::RET_OK)
						$mySqlConnection->commit();
					else $mySqlConnection->rollback();
				}
			}
			$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
		}
		return $return;
	}
	public function InfraToolsServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, 
								            $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsService, 
																		           $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                             &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
																					  $ArrayInstanceInfraToolsService, 
																					  $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive, &$ArrayInstanceInfraToolsService, 
												           &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive,
																						$ArrayInstanceInfraToolsService,
																						$RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, 
														          $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceActiveNoLimit($ServiceActive,
																							$ArrayInstanceInfraToolsService, 
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, $UserEmail,
															            &$ArrayInstanceInfraToolsService, 
															            &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, 
																									           $UserEmail,
																									           $ArrayInstanceInfraToolsService, 
																								               $RowCount, $Debug,
																											   $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail, &$ArrayInstanceInfraToolsService, 
																	 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
																										 $ArrayInstanceInfraToolsService, 
																										 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation, &$ArrayInstanceInfraToolsService, 
													  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation,
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
		if($return == ConfigInfraTools::RET_OK)
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
		if($return == ConfigInfraTools::RET_OK)
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
	
	public function InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		            &$ArrayInstanceInfraToolsService, 
																		            &$RowCount, $Debug,
																		            $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation,
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
	
	public function InfraToolsServiceSelectByServiceDepartment($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment,
													           &$ArrayInstanceInfraToolsService, &$RowCount, 
													           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceDepartment($Limit1, $Limit2, 
																							$ServiceCorporation, $ServiceDepartment,
																							$ArrayInstanceInfraToolsService, $RowCount,
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment, 
															&$ArrayInstanceInfraToolsService, 
															$Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceDepartmentNoLimit($ServiceCorporation,
																								$ServiceDepartment,
																								$ArrayInstanceInfraToolsService,
																								$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment, $UserEmail, 
																  &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $MySqlConnection = NULL, 
																  $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2,
																												$ServiceCorporation,
																									            $ServiceDepartment, 
																												$UserEmail,
																									            $ArrayInstanceInfraToolsService, 
																									            $RowCount, $Debug, 
																												$MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail,
																		           &$ArrayInstanceInfraToolsService, 
																		           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation,
																										      $ServiceDepartment,
																										      $UserEmail,
																										      $ArrayInstanceInfraToolsService, 
																										      $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceId($ServiceId, &$ArrayInstanceInfraToolsAssocIpAddressService, &$Service,
	                                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceId($ServiceId, $Service, $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit($ServiceId,
																			   $ArrayInstanceInfraToolsAssocIpAddressService,
																			   $Debug, $MySqlConnection, FALSE);
			}
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, 
																	&$ArrayInstanceInfraToolsAssocIpAddressService, 
																	&$Service, &$TypeAssocUserServiceId, $Debug, 
														            $MySqlConnection = NULL, $CloseConnectaion = TRUE)	
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, 
																								 $Service, 
																								 $TypeAssocUserServiceId,
																								 $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit($ServiceId,
																			   $ArrayInstanceInfraToolsAssocIpAddressService,
																			   $Debug, $MySqlConnection, FALSE);
			}
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function InfraToolsServiceSelectByServiceName($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
											             &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceName($Limit1, $Limit2, $ServiceName,
																	  				            $ArrayInstanceInfraToolsService,
																					            $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
							 						            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceNameNoLimit($ServiceName, 
																							           $ArrayInstanceInfraToolsService, 
																							           $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail,
															          &$ArrayInstanceInfraToolsService, &$RowCount, 
															          $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName,
																											 $UserEmail, 
																								             $ArrayInstanceInfraToolsService,
																								             $RowCount, $Debug,
																											 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																             &$ArrayInstanceInfraToolsService, 
																             $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail,
																										     $ArrayInstanceInfraToolsService,
																										     $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceType($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
											             &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceType($Limit1, $Limit2, $ServiceName,
																					            $ArrayInstanceInfraToolsService,
																					            $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, 
													            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceTypeNoLimit($ServiceType,
																									   $ArrayInstanceInfraToolsService,
																							           $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail,
															         &$ArrayInstanceInfraToolsService, &$RowCount, 
															         $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType,
																											 $UserEmail, 
																								             $ArrayInstanceInfraToolsService,
																								             $RowCount, $Debug,
																											 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																   &$ArrayInstanceInfraToolsService, 
																   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																										  $ArrayInstanceInfraToolsService,
																										  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2, $TypeAssocUserServiceDescription, 
			                                                                 &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, 
																   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2,
																										  $TypeAssocUserServiceDescription,
																										  $ArrayInstanceInfraToolsService, 
																							              $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription,
																					&$ArrayInstanceInfraToolsService, 
															                        $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit(
																			$TypeAssocUserServiceDescription, 
																			$ArrayInstanceInfraToolsService, 
																			$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2, $TypeAssocUserServiceDescription,
																						  $UserEmail, &$ArrayInstanceInfraToolsService,
																						  &$RowCount, $Debug, $MySqlConnection = NULL,
																						  $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1,
																							$Limit2,
																							$TypeAssocUserServiceDescription,
																							$UserEmail,
																							$ArrayInstanceInfraToolsService, 
																							$RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit($TypeAssocUserServiceDescription, $UserEmail,
																			                     &$ArrayInstanceInfraToolsService, $Debug, 
																			           $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit(
																							$TypeAssocUserServiceDescription,
																							$UserEmail,
																							$ArrayInstanceInfraToolsService, 
																							$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByUser($Limit1, $Limit2, $UserEmail,
										          &$ArrayInstanceInfraToolsService, 
										          &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByUser($Limit1, $Limit2, $UserEmail,
																			             $ArrayInstanceInfraToolsService, 
																			             $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, 
											             $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectByUserNoLimit($UserEmail, $ArrayInstanceInfraToolsService, 
																					            $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceSelectNoLimit($ArrayInstanceInfraToolsService, $Debug,
																						  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
											           $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
									                   $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, 
											           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew,
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
	
	public function InfraToolsServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, 
													           $ServiceId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceService = $this->Factory->CreateInfraToolsFacedePersistenceService();
			$return = $InfraToolsFacedePersistenceService->InfraToolsServiceUpdateRestrictByServiceId($ServiceActiveNew,
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
	
	public function InfraToolsTypeAssocUserServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService,&$RowCount,
			                                             $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
			$return = $InfraToolsFacedePersistenceTypeAssocUserService->InfraToolsTypeAssocUserServiceSelect(
				                                                          $Limit1, $Limit2,
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
		if($return == ConfigInfraTools::RET_OK)
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
	
	public function InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService, 
															          $UserEmail, &$RowCount, $Debug,
														              $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
			$return = $InfraToolsFacedePersistenceTypeAssocUserService->InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2,
				                                                               $ArrayInstanceInfraToolsTypeAssocUserService, 
																			   $UserEmail, $RowCount,
																			   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
																   $UserEmail, $Debug,
																   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceTypeAssocUserService = $this->Factory->CreateInfraToolsFacedePersistenceTypeAssocUserService();
			$return = $InfraToolsFacedePersistenceTypeAssocUserService->InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(
															  $ArrayInstanceInfraToolsTypeAssocUserService, 
															  $UserEmail, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsTypeServiceDeleteByTypeTypeServiceName($TypeServiceName, $Debug, $MySqlConnection = NULL, 
																	 $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $instanceInfraToolsFacedePersistenceTypeService->InfraToolsTypeServiceDeleteByTypeTypeServiceName($TypeServiceName,
																														$Debug);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsTypeServiceInsert($TypServiceName, $TypeServiceSLA, $Debug,
									             $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $instanceInfraToolsFacedePersistenceTypeService->InfraToolsTypeServiceInsert($TypServiceName, $TypeServiceSLA, 
																						           $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsTypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, 
			                                    $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $InfraToolsFacedePersistenceTypeService->InfraToolsTypeServiceSelect($Limit1, $Limit2,
																						   $ArrayInstanceInfraToolsTypeService,
																				           $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsTypeServiceSelectByTypeServiceName($TypeServiceName, &$TypeService, $Debug, $MySqlConnection = NULL, 
 													             $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $instanceInfraToolsFacedePersistenceTypeService->InfraToolsTypeServiceSelectByTypeServiceName($TypeServiceName,
																													$TypeService,
																										            $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsTypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug, 
											           $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $InfraToolsFacedePersistenceTypeService->InfraToolsTypeServiceSelectNoLimit($ArrayInstanceInfraToolsTypeService,
																						          $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsTypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,&$ArrayInstanceInfraToolsTypeService, 
			                                                 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $InfraToolsFacedePersistenceTypeService->InfraToolsTypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
																							            $ArrayInstanceInfraToolsTypeService,
																							            $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsTypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, 
														            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceTypeService = $this->Factory->CreateInfraToolsFacedePersistenceTypeService();
			$return = $InfraToolsFacedePersistenceTypeService->InfraToolsTypeServiceSelectOnUserContextNoLimit($UserEmail,
																									 $ArrayInstanceInfraToolsTypeService,
																									 $Debug,
																									 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
										 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsUser, 
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
		if($return == ConfigInfraTools::RET_OK)
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
		if($return == ConfigInfraTools::RET_OK)
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
	
	public function InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsUser, &$RowCount,
			                                            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4,
																					         $ArrayInstanceInfraToolsUser, $RowCount, 
																					         $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceInfraToolsUser, &$RowCount,
														 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByNotificationId($Limit1, $Limit2, $NotificationId,
																					         $ArrayInstanceInfraToolsUser, $RowCount, 
																					         $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function InfraToolsUserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceInfraToolsUser, &$RowCount, 
												   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByRoleName($Limit1, $Limit2, $RoleName,
																					   $ArrayInstanceInfraToolsUser, $RowCount, 
																					   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
													$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
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
	
	public function InfraToolsUserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
			                                     $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByTeamId($Limit1, $Limit2, $TeamId,
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
		if($return == ConfigInfraTools::RET_OK)
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
	
	public function InfraToolsUserSelectByTypeMonitoringDescription($Limit1, $Limit2, $TypeMonitoringDescription, &$ArrayInstanceInfraToolsUser,
			                                                        &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByTypeMonitoringDescription($Limit1, $Limit2,
																										$TypeMonitoringDescription, 
   																							            $ArrayInstanceInfraToolsUser,
																							            $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription,
			                                                           &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug,
																	   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2,
																										   $TypeAssocUserTeamDescription, 
																						                   $ArrayInstanceInfraToolsUser,
																										   $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceInfraToolsUser, 
																&$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == ConfigInfraTools::RET_OK)
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
	
	public function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceInfraToolsUser, 
			                                                  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == ConfigInfraTools::RET_OK)
		{
			$InfraToolsFacedePersistenceUser = $this->Factory->CreateInfraToolsFacedePersistenceUser();
			$return = $InfraToolsFacedePersistenceUser->InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription,
																							      $ArrayInstanceInfraToolsUser, 
																								  $RowCount, $Debug,
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
		if($return == ConfigInfraTools::RET_OK)
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
		if($return == ConfigInfraTools::RET_OK)
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