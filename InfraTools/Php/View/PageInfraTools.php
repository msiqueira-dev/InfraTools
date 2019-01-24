<?php
/************************************************************************
Class: PageInfraTools.php
Creation: 18/08/2014
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/View/Page.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/Controller/FacedeBusinessInfraTools.php
			InfraTools - Php/Controller/FacedePersistenceInfraTools.php
Description: 
			Classe existente para tratamento do negócio utilizado pelas telas.
Methods: 
			private   function LoadInstanceInfraToolsUser();
			protected function InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsAssocIpAddressService, 
			                                                         &$RowCount, $Debug);
			protected function InfraToolsAssocIpAddressServiceSelectByServiceIdAndIpAddressIpv4($AssocIpAddressServiceServiceId,
			                                                                                   $AssocIpAddressServiceServiceIp, $Debug);
			protected function InfraToolsAssocIpAddressServiceSelectByServiceId($AssocIpAddressServiceServiceId,
			                                                                    $Debug);
			protected function InfraToolsAssocIpAddressServiceSelectByServiceIp($AssocIpAddressServiceServiceIp,
			                                                                    $Debug);
			protected function InfraToolsCorporationSelect($Limit1, $Limit2,, &$ArrayInstanceCorporationInfraTools, &$RowCount, $Debug);
			protected function InfraToolsCorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug);
			protected function InfraToolsCorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail, 
			                                                                   &$ArrayInstanceInfraToolsCorporation, 
	                                                                           &$RowCount, $Debug)
			protected function InfraToolsCorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation,
			                                                                          $Debug);
			protected function InfraToolsDepartmentSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail, 
			                                                                  &$ArrayInstanceInfraToolsCorporation, 
	                                                                          &$RowCount, $Debug)
			protected function InfraToolsDepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail,
			                                                                         &$ArrayInstanceInfraToolsCorporation, $Debug);
			protected function InfraToolsIpAddressDeleteByIpAddressIpv4($IpAddressIpv4, $Debug);
			protected function InfraToolsIpAddressInsert($IpAddressIpv4, $IpAddressIpv6, $Debug);
			protected function InfraToolsIpAddressSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsIpAddress, &$RowCount, $Debug);
			protected function InfraToolsIpAddressSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsIpAddress, 
															            &$RowCount, $Debug)
			protected function InfraToolsIpAddressUpdateByIpAddressIpv4($IpAddressIpv4New, $IpAddressIpv6New, $IpAddressIpv4, $Debug);
			protected function InfraToolsServiceDeleteById($ServiceId, $UserEmail, $Debug);
			protected function InfraToolsServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug);
			protected function InfraToolsServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                                           $ServiceDepartment, $ServiceDepartmentCanChange, 
										               $ServiceDescription, $ServiceName, $ServiceType, $Debug);
			protected function ServiceLoadData($InstanceInfraToolsService);
			protected function InfraToolsServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, 
			                                           $StoreSession = FALSE);
			protected function InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                              &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive, 
			                                                          &$ArrayInstanceInfraToolsService, 
			                                                          &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                                       $Debug);
			protected function InfraToolsServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, $UserEmail,
			                                                                       &$ArrayInstanceInfraToolsService, 
			                                                                       &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                                              &$ArrayInstanceInfraToolsService, 
			                                                                              $Debug);
			protected function InfraToolsServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation,
			                                                               &$ArrayInstanceInfraToolsService, 
															               &$RowCount, $Debug);
			protected function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
			                                                            $Debug);
			protected function ServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2, $ServiceCorporation, $UserEmail,
			                                                                  &$ArrayInstanceInfraToolsService, 
			                                                                  &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
			                                                                                   &$ArrayInstanceInfraToolsService, 
			                                                                                   $Debug);
			protected function InfraToolsServiceSelectByServiceDepartment($Limit1, $Limit2,$ServiceCorporation, $ServiceDepartment,
			                                                              &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
	        protected function InfraToolsServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
			                                                                     &$ArrayInstanceInfraToolsService, $Debug);
			protected function InfraToolsServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, 
			                                                                           $ServiceCorporation $ServiceDepartment, $UserEmail, 
			                                                                           &$ArrayInstanceInfraToolsService, 
			                                                                           &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, 
			                                                                                  $ServiceDepartment, $UserEmail, 
			                                                                                  &$ArrayInstanceInfraToolsService, 
			                                                                                  $Debug);
			protected function InfraToolsServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, $Debug, StoreSession = FALSE);	
			protected function InfraToolsServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
			                                                                   &$TypeAssocUserServiceId, $Debug, StoreSession = FALSE);
			protected function InfraToolsServiceSelectByServiceName($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
			                                                        &$RowCount, $Debug, StoreSession = FALSE);	
			protected function InfraToolsServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
			                                                               $Debug, StoreSession = FALSE);	
			protected function InfraToolsServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail,
			                                                                     &$ArrayInstanceInfraToolsService, 
																	             &$RowCount, $Debug, StoreSession = FALSE);
			protected function InfraToolsServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
			                                                                            &$ArrayInstanceInfraToolsService, 
			                                                                            $Debug, StoreSession = FALSE);
			protected function InfraToolsServiceSelectByServiceType($Limit1, $Limit2, $ServiceType, &$ArrayInstanceInfraToolsService, 
			                                                        &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail, 
			                                                                     &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
			                                                                            &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2, $TypeAssocUserServiceDescription, 
			                                                                            &$ArrayInstanceInfraToolsService, 
			                                                                            &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription,
			                                                                                   &$ArrayInstanceInfraToolsService, 
																                               $Debug);
			protected function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2,
			                                                                                        $TypeAssocUserServiceDescription, 
			                                                                                        $UserEmail,
																									&$ArrayInstanceInfraToolsService, 
																						            &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit($TypeAssocUserServiceDescription, 
			                                                                                                $UserEmail,
			                                                                                                &$ArrayInstanceInfraToolsService, 
																		                                    $Debug);
			protected function InfraToolsServiceSelectByUser($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                                 &$RowCount, $Debug);
			protected function InfraToolsServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function InfraToolsServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, $StoreSession = FALSE);
			protected function InfraToolsServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
			                                                      $ServiceDepartmentNew, ServiceDepartmentCanChangeNew,
											                      $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, 
														          $ServiceId, $Debug);
			protected function InfraToolsServiceUpdateRestrictByServiceId($ServiceActiveNew,$ServiceNameNew, 
			                                                              $ServiceTypeNew, $ServiceId, $Debug);
			protected function InfraToolsTicketUpdateTicketServiceByTicketId($TicketServiceNew, &$InstanceTicket, $Debug);
			protected function InfraToolsTypeAssocUserServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, $Debug);
			protected function InfraToolsTypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug);
			protected function InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, 
			                                                                     $UserEmail, &$RowCount, $Debug);
			protected function InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, 
			                                                                            $UserEmail, $Debug);
			protected function InfraToolsTypeServiceDeleteByTypeTypeServiceName($TypeServiceName, $Debug);
			protected function InfraToolsTypeServiceInsert($TypeServiceName, $TypeServiceSLA, $Debug);
			protected function InfraToolsTypeServiceLoadData(InstanceInfraToolsTypeService);
			protected function InfraToolsTypeServiceSelect($Limit1, $Limit2, &ArrayInstanceInfraToolsTypeService, 
			                                               &$RowCount, $Debug);
			protected function InfraToolsTypeServiceSelectNoLimit(&ArrayInstanceInfraToolsTypeService, $Debug);
			protected function InfraToolsTypeServiceSelectOnUserContext($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, 
			                                                            $UserEmail, &$RowCount, $Debug);
			protected function InfraToolsTypeServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, $UserEmail, $Debug);
			protected function InfraToolsTypeServiceUpdateByTypeServiceName($TypeServiceNameNew, $TypeServiceSLANew,
			                                                                &$InstanceInfraToolsTypeService, $Debug);
			protected function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug);
			protected function InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceInfraToolsUser,
		                                                             &$RowCount, $Debug);
			protected function InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName,
			                                                        &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug);
			protected function InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsUser,
			                                                       &$RowCount, $Debug);
			protected function InfraToolsUserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceInfraToolsUser,
			                                                        &$RowCount, $Debug);
			protected function InfraToolsUserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceInfraToolsUser,
			                                                  &$RowCount, $Debug);
			protected function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug);
			protected function InfraToolsUserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug);
			protected function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug);
			protected function InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, 
		                                                                          &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug);
			protected function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, 
		                                                                   &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug);
			protected function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceInfraToolsUser, 
		                                                                 &$RowCount, $Debug);
			protected function InfraToolsUserSelectByUserEmail($UserEmail, &InstanceInfraToolsUser, $Debug);
			protected function InfraToolsUserLoadData($InstanceInfraToolsUser);
			public    function GetCurrentPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("Page"))
{
	if(file_exists(BASE_PATH_PHP_VIEW . "Page.php"))
		include_once(BASE_PATH_PHP_VIEW . "Page.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Page');
}

abstract class PageInfraTools extends Page
{
	/* Instância usadas nessa classe */
	protected $FacedeBusinessInfraTools         = NULL;
	protected $InstanceMobileDetectInfraTools   = NULL;
	protected $Session                          = NULL;
	
	/* Propiedades de página */
	public $InputValueAssocIpAddressServiceServiceId             = "";
	public $InputValueAssocIpAddressServiceServiceIp             = "";
	public $InputValueIpAddressIpv4                              = "";
	public $InputValueIpAddressIpv4Radio                         = "";
	public $InputValueIpAddressIpv6                              = "";
	public $InputValueIpAddressIpv6Radio                         = "";
	public $InputValueServiceActive                              = "";
	public $InputValueServiceCorporation                         = "";
	public $InputValueServiceCorporationActive                   = "";
	public $InputValueServiceCorporationCanChange                = "";
	public $InputValueServiceDepartment                          = "";
	public $InputValueServiceDepartmentActive                    = "";
	public $InputValueServiceDepartmentCanChange                 = "";
	public $InputValueServiceDescription                         = "";
	public $InputValueServiceId                                  = "";
	public $InputValueServiceIdRadio                             = "";
	public $InputValueServiceName                                = "";
	public $InputValueServiceNameRadio                           = "";
	public $InputValueServiceType                                = "";
	public $InputValueSessionExpires                             = "";
	public $InputValueTypeServiceName                            = "";
	public $InputValueTypeServiceSLA                             = "";
	public $Language                                             = "";
	public $ReturnAssocIpAddressServiceServiceIdClass            = "";
	public $ReturnAssocIpAddressServiceServiceIdText             = "";
	public $ReturnAssocIpAddressServiceServiceIpClass            = "";
	public $ReturnAssocIpAddressServiceServiceIpText             = "";
	public $ReturnIpAddressIpv4Class                             = "";
	public $ReturnIpAddressIpv4Text                              = "";
	public $ReturnIpAddressIpv6Class                             = "";
	public $ReturnIpAddressIpv6Text                              = "";
	public $ReturnServiceActiveClass                             = "";
	public $ReturnServiceActiveText                              = "";
	public $ReturnServiceCorporationClass                        = "";
	public $ReturnServiceCorporationText                         = "";
	public $ReturnServiceCorporationCanChangeClass               = "";
	public $ReturnServiceCorporationCanChangeText                = "";
	public $ReturnServiceDepartmentClass                         = "";
	public $ReturnServiceDepartmentText                          = "";
    public $ReturnServiceDepartmentCanChangeClass                = "";
	public $ReturnServiceDepartmentCanChangeText                 = "";
	public $ReturnServiceDescriptionClass                        = "";
	public $ReturnServiceDescriptionText                         = "";
	public $ReturnServiceIdClass                                 = "";
	public $ReturnServiceIdRadioClass                            = "";
	public $ReturnServiceIdText                                  = "";
	public $ReturnServiceNameClass                               = "";
	public $ReturnServiceNameRadioClass                          = "";
	public $ReturnServiceNameText                                = "";
	public $ReturnServiceTypeClass                               = "";
	public $ReturnServiceTypeText                                = "";
	public $ReturnTypeAssocUserServiceDescriptionClass           = "";
	public $ReturnTypeAssocUserServiceDescriptionText            = "";
	public $ReturnTypeAssocUserServiceIdClass                    = "";
	public $ReturnTypeAssocUserServiceIdText                     = "";
	public $ReturnTypeServiceNameClass                           = "";
	public $ReturnTypeServiceNameText                            = "";
	public $ReturnTypeServiceSLAClass                            = "";
	public $ReturnTypeServiceSLAText                             = "";

	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		if($this->Factory == NULL)
			$this->Factory = InfraToolsFactory::__create();
		if($this->Config == NULL)
			$Config = $this->Factory->CreateConfigInfraTools();
		$this->LoadInstanceInfraToolsUser();
		parent::__construct($Config, $Language, $Page);
	}
	
	private function LoadInstanceInfraToolsUser()
	{
		if (!class_exists("User"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "User.php"))
				include_once(BASE_PATH_PHP_MODEL . "User.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class User');
		}
		if(!class_exists("InfraToolsUser"))
		{
			if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsUser.php"))
				exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsUser');
			else include_once(SITE_PATH_PHP_MODEL . "InfraToolsUser.php");
		}
		if($this->User==NULL) 
		{
			$this->Session = $this->Factory->CreateSession();
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_USER, $this->User);
			return ConfigInfraTools::SUCCESS;
		}
	}
	
	protected function InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsAssocIpAddressService, 
															 &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2,
																							  $ArrayInstanceInfraToolsAssocIpAddressService, 
															                                  $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText  = "";
			$this->ReturnClass = "DivHidden";
			$this->ReturnImage = "DivDisplayNone";
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return $return;
		}
		$this->ShowDivReturnError("ASSOC_IP_ADDRESS_SERVICE_NOT_FOUND");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsAssocIpAddressServiceSelectByServiceIdAndIpAddressIpv4($AssocIpAddressServiceServiceId,
																					   $AssocIpAddressServiceServiceIp, $Debug)
	{
		
	}
	
	protected function InfraToolsAssocIpAddressServiceSelectByServiceId($AssocIpAddressServiceServiceId, $Debug)
	{
		
	}
	
	protected function InfraToolsAssocIpAddressServiceSelectByServiceIp($AssocIpAddressServiceServiceIp, $Debug)
	{
		
	}
	
	protected function InfraToolsCorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporationInfraTools, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsCorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporationInfraTools, 
															                        $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText  = "";
			$this->ReturnClass = "DivHidden";
			$this->ReturnImage = "DivDisplayNone";
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return $return;
		}
		$this->ShowDivReturnError("CORPORATION_NOT_FOUND");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsCorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		return $instanceInfraToolsFacedePersistence->CorporationSelectActiveNoLimit($ArrayInstanceCorporation, $Debug);
	}
	
	protected function InfraToolsCorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsCorporation, 
	                                                                   &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsCorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail, 
			                                                                                    $ArrayInstanceInfraToolsCorporation, 
																                                $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsCorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsCorporationSelectOnUserServiceContextNoLimit($UserEmail,
																			                           $ArrayInstanceInfraToolsCorporation,
																			                           $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsDepartmentSelectOnUserServiceContext($Limit1, $Limit2, $UserCorporation, $UserEmail, 
			                                                          &$ArrayInstanceInfraToolsCorporation, 
	                                                        &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $UserCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_CORPORATION_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsDepartmentSelectOnUserServiceContext($Limit1, $Limit2, 
																						 $this->InputValueServiceCorporation, $UserEmail,
																				         $ArrayInstanceInfraToolsCorporation, $RowCount,
																						 $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			$this->ShowDivReturnError("DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR");
			return ConfigInfraTools::RETURN_ERROR;
		}
	}
	
	protected function InfraToolsDepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, &$ArrayInstanceInfraToolsDepartment,
																             $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $UserCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_CORPORATION_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsDepartmentSelectOnUserServiceContextNoLimit($this->InputValueServiceCorporation,
																								$UserEmail,$ArrayInstanceInfraToolsDepartment,
																				                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			$this->ShowDivReturnError("DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR");
			return ConfigInfraTools::RETURN_ERROR;
		}
	}
	
	protected function InfraToolsIpAddressDeleteByIpAddressIpv4($IpAddressIpv4, $Debug)
	{
		
	}
	
	protected function InfraToolsIpAddressInsert($IpAddressIpv4, $IpAddressIpv6, $Debug)
	{
		
	}
	
	protected function InfraToolsIpAddressSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsIpAddress, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsIpAddressSelect($Limit1, $Limit2,$ArrayInstanceInfraToolsIpAddress, 
															                      $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText  = "";
			$this->ReturnClass = "DivHidden";
			$this->ReturnImage = "DivDisplayNone";
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return $return;
		}
		$this->ShowDivReturnError("IP_ADDRESS_NOT_FOUND");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsIpAddressSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsIpAddress, 
																&$RowCount, $Debug)
	{
		
	}
	
	protected function InfraToolsIpAddressUpdateByIpAddressIpv4($IpAddressIpv4New, $IpAddressIpv6New, $IpAddressIpv4, $Debug)
	{
		
	}
	
	protected function InfraToolsServiceDeleteById($ServiceId, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId;; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceDeleteById($this->InputValueServiceId, $UserEmail, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_DELETE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_DELETE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId;; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 3; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceDeleteByIdOnUserContext($this->InputValueServiceId, $UserEmail, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_DELETE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_CODE_FOREIGN_KEY_DELETE_RESTRICT)
			{
				$this->ShowDivReturnError("SERVICE_DELETE_ERROR_FOREIGN_KEY");
				return ConfigInfraTools::RETURN_ERROR;
			}
		}
		$this->ShowDivReturnError("SERVICE_DELETE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
									           $ServiceDepartment, $ServiceDepartmentCanChange,
									           $ServiceDescription, $ServiceName, $ServiceType, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		if($ServiceCorporation == ConfigInfraTools::FORM_FIELD_SELECT_NONE)
			$ServiceCorporation = NULL;
		if($ServiceDepartment == ConfigInfraTools::FORM_FIELD_SELECT_NONE)
			$ServiceDepartment = NULL;
		if(isset($ServiceActive))
			$this->InputValueServiceActive = TRUE;
		else $this->InputValueServiceActive = FALSE;
		if(isset($ServiceCorporationCanChange))
			$this->InputValueServiceCorporationCanChange = TRUE;
		else $this->InputValueServiceCorporationCanChange = FALSE;
		if(isset($ServiceDepartmentCanChange))
			$this->InputValueServiceDepartmentCanChange = TRUE;
		else $this->InputValueServiceDepartmentCanChange = FALSE;
		
		$this->InputValueServiceCorporation          = $ServiceCorporation;
		$this->InputValueServiceDepartment           = $ServiceDepartment;
		$this->InputValueServiceDescription          = $ServiceDescription;
		$this->InputValueServiceName                 = $ServiceName;
		$this->InputValueServiceType                 = $ServiceType;
		$this->InputValueUserEmail                   = $UserEmail;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION
		$arrayConstants = array();
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION_CAN_CHANGE
		$arrayConstants = array();
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION_CAN_CHANGE;
		$arrayElementsClass[2]        = &$this->ReturnServiceCanChangeClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[2]        = $this->InputValueServiceCorporationCanChange; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnServiceCorporationCanChangeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_CORPORATION_CAN_CHANGE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT
		$arrayConstants = array();
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[3]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[3]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 80; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT_CAN_CHANGE
		$arrayConstants = array();
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT_CAN_CHANGE;
		$arrayElementsClass[4]        = &$this->ReturnServiceDepartmentCanChangeClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[4]        = $this->InputValueServiceDepartmentCanChange; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnServiceDepartmentCanChangeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_DEPARTMENT_CAN_CHANGE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DESCRIPTION
		$arrayConstants = array();
		$arrayElements[5]             = ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION;
		$arrayElementsClass[5]        = &$this->ReturnServiceDescriptionClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[5]        = $this->InputValueServiceDescription; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 200; 
		$arrayElementsNullable[5]     = FALSE;
		$arrayElementsText[5]         = &$this->ReturnServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_DESCRIPTION', 'FORM_INVALID_SERVICE_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_NAME
		$arrayConstants = array();
		$arrayElements[6]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[6]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[6]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 45; 
		$arrayElementsNullable[6]     = FALSE;
		$arrayElementsText[6]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_SERVICE_TYPE
		$arrayConstants = array();
		$arrayElements[7]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[7]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[7]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 45; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceInsert($this->InputValueServiceActive, $this->InputValueServiceCorporation,
																            $this->InputValueServiceCorporationCanChange, 
																            $this->InputValueServiceDepartment, 
																            $this->InputValueServiceDepartmentCanChange,
									                              $this->InputValueServiceDescription, 
																  $this->InputValueServiceName, 
																  $this->InputValueServiceType, 
																  $this->InputValueUserEmail,
																  $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_INSERT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_CODE_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return ConfigInfraTools::RETURN_WARNING;
			}
		}
		$this->ShowDivReturnError("SERVICE_INSERT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function ServiceLoadData($InstanceInfraToolsService)
	{
		if($InstanceInfraToolsService != NULL)
		{
			$this->InputValueRegisterDate       = $InstanceInfraToolsService->GetRegisterDate();
			$this->InputValueServiceActive      = $InstanceInfraToolsService->GetServiceActive();
			$this->InputValueServiceCorporation = $InstanceInfraToolsService->GetServiceCorporation();
			$this->InputValueServiceDepartment  = $InstanceInfraToolsService->GetServiceDepartment();
			$this->InputValueServiceDescription = $InstanceInfraToolsService->GetServiceDescription();
			$this->InputValueServiceId          = $InstanceInfraToolsService->GetServiceId();
			$this->InputValueServiceName        = $InstanceInfraToolsService->GetServiceName();
			$this->InputValueServiceType        = $InstanceInfraToolsService->GetServiceTypeName();
			if($this->InputValueServiceActive)
			$this->InputValueServiceActive = $this->Config->DefaultServerImage .
																  'Icons/IconInfraToolsVerified.png';
			else $this->InputValueServiceActive = $this->Config->DefaultServerImage .
				                                                  'Icons/IconInfraToolsNotVerified.png';
			if($this->InputValueServiceCorporation != NULL)
				$this->InputValueServiceCorporationActive = $this->Config->DefaultServerImage .
																  'Icons/IconInfraToolsVerified.png';
			else $this->InputValueServiceCorporationActive = $this->Config->DefaultServerImage .
				                                                  'Icons/IconInfraToolsNotVerified.png';
			if($this->InputValueServiceDepartment != NULL)
				$this->InputValueServiceDepartmentActive = $this->Config->DefaultServerImage .
																  'Icons/IconInfraToolsVerified.png';
			else $this->InputValueServiceDepartmentActive = $this->Config->DefaultServerImage .
				                                                  'Icons/IconInfraToolsNotVerified.png';
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $StoreSession = FALSE)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $FacedePersistenceInfraTools->InfraToolsServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsService, 
															  $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_NOT_FOUND");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                      &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
																		   $ArrayInstanceInfraToolsService, 
																	       $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_NOT_FOUND");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                        &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceActive = $ServiceActive;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, $this->InputValueServiceActive,
																				           $ArrayInstanceInfraToolsService,
																				           $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceActive = $ServiceActive;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceActiveNoLimit($this->InputValueServiceActive,
																				                  $ArrayInstanceInfraToolsService,
																				                  $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	protected function InfraToolsServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, $UserEmail,
															               &$ArrayInstanceInfraToolsService, 
															               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceActive = $ServiceActive;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2,
																							  $this->InputValueServiceActive, $UserEmail,
																							  $ArrayInstanceInfraToolsService,
																				              $RowCount, 
																							  $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	protected function InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                            &$ArrayInstanceInfraToolsService, 
			                                                            &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceActive = $ServiceActive;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit($this->InputValueServiceActive,
																									           $UserEmail,
																				                               $ArrayInstanceInfraToolsService,
																				                               $RowCount, 
																									           $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	protected function InfraToolsServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation,
			                                                       &$ArrayInstanceInfraToolsService, 
														           &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, 
																						   $this->InputValueServiceCorporation,
																				           $ArrayInstanceInfraToolsService,
																				           $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
															    &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceCorporationNoLimit($this->InputValueServiceCorporation,
																				             $ArrayInstanceInfraToolsService,
																				             $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function ServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2,
																	  $ServiceCorporation, $UserEmail, 
																	  &$ArrayInstanceInfraToolsService, 
																	  &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2,
																								   $this->InputValueServiceCorporation,
																								   $UserEmail,
																				                   $ArrayInstanceInfraToolsService,
																				                   $RowCount, 
																							       $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		               &$ArrayInstanceInfraToolsService, 
																		               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit(
				                                                                                          $this->InputValueServiceCorporation,
																								          $UserEmail,
																				                          $ArrayInstanceInfraToolsService,
																				                          $RowCount, 
																							              $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceDepartment($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment,
														          &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$this->InputValueServiceDepartment  = $ServiceDepartment;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceDepartment($Limit1, $Limit2,
																					           $this->InputValueServiceCorporation, 
																					           $this->InputValueServiceDepartment,
																				               $ArrayInstanceInfraToolsService,
																				               $RowCount, 
																					 $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
															             &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$this->InputValueServiceDepartment  = $ServiceDepartment;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceDepartmentNoLimit($this->InputValueServiceCorporation, 
																							          $this->InputValueServiceDepartment,
																				                      $ArrayInstanceInfraToolsService,
																					                  $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, $ServiceCorporation, 
																			   $ServiceDepartment, $UserEmail, 
																               &$ArrayInstanceInfraToolsService, 
																               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$this->InputValueServiceDepartment  = $ServiceDepartment;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2,
																								            $this->InputValueServiceCorporation,
																								            $this->InputValueServiceDepartment,
																								            $UserEmail,
																				                            $ArrayInstanceInfraToolsService,
																								            $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																		             &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$this->InputValueServiceDepartment  = $ServiceDepartment;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit(
				                                                                                         $this->InputValueServiceCorporation,
				                                                                                         $this->InputValueServiceDepartment,
																								         $UserEmail,
																				                         $ArrayInstanceInfraToolsService,
																					                     $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceId($this->InputValueServiceId, $InstanceInfraToolsService, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $InstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ID_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ID_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
															           &$TypeAssocUserServiceId, $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
																						  $UserEmail,
																						  $InstanceInfraToolsService,
																						  $TypeAssocUserServiceId,
																						  $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $InstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ID_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ID_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceName($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
												            &$RowCount, $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceName = $ServiceName;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceName($Limit1, $Limit2,
																			             $this->InputValueServiceName,  
																			             $ArrayInstanceInfraToolsService,
																			             $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, $Debug, 
																   $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceName = $ServiceName;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceNameNoLimit($this->InputValueServiceName,
																			                    $ArrayInstanceInfraToolsService,
																			                    $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail, 
															             &$ArrayInstanceInfraToolsService, &$RowCount, 
																		 $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceName = $ServiceName;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceNameOnUserContext($Limit1, $Limit2,
																							$this->InputValueServiceName, $UserEmail, 
																							$ArrayInstanceInfraToolsService,
																							$RowCount,
																			                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, &$ArrayInstanceInfraToolsService, 
																                $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceName = $ServiceName;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceNameOnUserContextNoLimit($this->InputValueServiceName, 
																								             $UserEmail,
																			                                 $ArrayInstanceInfraToolsService,
																			                                 $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceType($Limit1, $Limit2, $ServiceType, &$ArrayInstanceInfraToolsService, 
												            &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceType = $ServiceType;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceType($Limit1, $Limit2,
																			             $this->InputValueServiceType, 
																			             $ArrayInstanceInfraToolsService, $RowCount,
																			             $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceType = $ServiceType;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceTypeNoLimit($this->InputValueServiceType,
											     							                    $ArrayInstanceInfraToolsService,
																			                    $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail, 
															             &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceType = $ServiceType;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2,
																							          $this->InputValueServiceType, 
																							          $UserEmail,
											     							                          $ArrayInstanceInfraToolsService,
																					                  $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																                &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceType = $ServiceType;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit($this->InputValueServiceType, 
																								             $UserEmail,
											     							                                 $ArrayInstanceInfraToolsService,
																			                                 $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2, $TypeAssocUserServiceDescription, 
			                                                                    &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $TypeAssocUserServiceDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2,
																								   $TypeAssocUserServiceDescription,  
			                                                                                       $ArrayInstanceInfraToolsService, 
			                                                                                       $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription, 
			                                                                 &$ArrayInstanceInfraToolsService, 
																             $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $TypeAssocUserServiceDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit(
				                                                                        $TypeAssocUserServiceDescription, 
			                                                                            $ArrayInstanceInfraToolsService, 
			                                                                            $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2, 
																				             $TypeAssocUserServiceDescription, 
																							 $UserEmail, &$ArrayInstanceInfraToolsService,
																							 &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $TypeAssocUserServiceDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext(
				                                                                        $Limit1, $Limit2, 
				                                                                        $TypeAssocUserServiceDescription,
				                                                                        $UserEmail,
			                                                                            $ArrayInstanceInfraToolsService, 
			                                                                            $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit($TypeAssocUserServiceDescription, 
			                                                                                        $UserEmail,
																									&$ArrayInstanceInfraToolsService, 
										  							                                $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $TypeAssocUserServiceDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription, 
			                                                                                              $ArrayInstanceInfraToolsService, 
			                                                                                              $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByUser($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueUserEmail = $UserEmail;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByUser($Limit1, $Limit2, $this->InputValueUserEmail,
											     				 		          $ArrayInstanceInfraToolsService,
																		          $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_USER_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_USER_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueUserEmail = $UserEmail;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectByUserNoLimit($this->InputValueUserEmail,
											     						                 $ArrayInstanceInfraToolsService, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_USER_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_USER_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, $StoreSession = FALSE)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();

		$return = $FacedePersistenceInfraTools->InfraToolsServiceSelectNoLimit($ArrayInstanceInfraToolsService, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
			$this->ShowDivReturnSuccess("SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
												          $ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
	  										              $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueServiceActive = $ServiceActiveNew;
		$this->InputValueServiceCorporation  = $ServiceCoporationNew;
		$this->InputValueServiceCorporationCanChange  = $ServiceCorporationCanChangeNew;
		$this->InputValueServiceDepartment = $ServiceDepartmentNew;
		$this->InputValueServiceDepartmentCanChange  = $ServiceDepartmentCanChangeNew;
		$this->InputValueServiceDescription = $ServiceDescriptionNew;
		$this->InputValueServiceName = $ServiceNameNew;
		$this->InputValueServiceType = $ServiceTypeNew;
		$this->InputValueServiceId = $ServiceId;
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_CORPORATION
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[1]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION_CAN_CHANGE
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[2]        = &$this->ReturnCorporationCanChangeClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[2]        = $this->InputValueCorporationCanChange; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnCorporationCanChangeText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_CAN_CHANGE', 'FORM_INVALID_CORPORATION_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[3]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[3]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 80; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT_CAN_CHANGE
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[4]        = &$this->ReturnDepartmentCanChangeClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[4]        = $this->InputValueDepartmentCanChange; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnDepartmentCanChangeText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_CAN_CHANGE', 'FORM_INVALID_DEPARTMENT_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DESCRIPTION
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION;
		$arrayElementsClass[3]        = &$this->ReturnServiceDescriptionClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[3]        = $this->InputValueServiceDescription; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 200; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_DESCRIPTION', 'FORM_INVALID_SERVICE_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_NAME
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[4]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[4]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_SERVICE_TYPE
		$arrayElements[5]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[5]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[5]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 45; 
		$arrayElementsNullable[5]     = FALSE;
		$arrayElementsText[5]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->InfraToolsServiceUpdateByServiceId($ServiceActiveNew, 
																			           $ServiceCoporationNew,
																			           $ServiceCorporationCanChangeNew,
																			           $ServiceDepartmentNew,
																			           $ServiceDepartmentCanChangeNew,
	  										                                           $ServiceDescriptionNew, 
																			           $ServiceNameNew, 
																			           $ServiceTypeNew, 
																			           $ServiceId,
															                           $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_UPDATE_BY_ID_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("SERVICE_UPDATE_BY_ID_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, $ServiceNameNew, 
														          $ServiceTypeNew, $ServiceId, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueServiceActive = $ServiceActiveNew;
		$this->InputValueServiceDescription = $ServiceDescriptionNew;
		$this->InputValueServiceName = $ServiceNameNew;
		$this->InputValueServiceType = $ServiceTypeNew;
		$this->InputValueServiceId = $ServiceId;
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 0; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DESCRIPTION
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION;
		$arrayElementsClass[1]        = &$this->ReturnServiceDescriptionClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueServiceDescription; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 200; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_DESCRIPTION', 'FORM_INVALID_SERVICE_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_NAME
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[2]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[2]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_SERVICE_TYPE
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[3]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[3]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 45; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->InfraToolsServiceUpdateRestrictByServiceId($ServiceActiveNew, 
	  										                                                   $ServiceDescriptionNew, 
 																			                   $ServiceNameNew, 
																			                   $ServiceTypeNew, 
																			                   $ServiceId,
															                                   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_UPDATE_RESTRICT_BY_ID_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return ConfigInfraTools::RETURN_WARNING;
			}
		}
		$this->ShowDivReturnError("SERVICE_UPDATE_RESTRICTBY_ID_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsTicketUpdateTicketServiceByTicketId($TicketServiceNew, &$InstanceTicket, $Debug)
	{
	}
	
	protected function InfraToolsTypeAssocUserServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsTypeAssocUserServiceSelect($Limit1, $Limit2,
																					 $ArrayInstanceInfraToolsTypeAssocUserService,
																		             $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SELECT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsTypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsTypeAssocUserServiceSelectNoLimit($ArrayInstanceInfraToolsTypeAssocUserService,
																			                $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SELECT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService, 
															             $UserEmail, &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2,
																						          $ArrayInstanceInfraToolsTypeAssocUserService, 
																						          $UserEmail, $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SELECT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
																				$UserEmail, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(
			                                                                   $ArrayInstanceInfraToolsTypeAssocUserService, 
																			   $UserEmail,
																			   $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SELECT_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsTypeServiceDeleteByTypeTypeServiceName($TypeServiceName, $Debug)
	{
		
	}
	
	protected function InfraToolsTypeServiceInsert($TypeServiceName, $TypeServiceSLA, $Debug)
	{
		
	}
	
	protected function InfraToolsTypeServiceLoadData($InstanceInfraToolsTypeService)
	{
		if($InstanceInfraToolsTypeService != NULL)
		{
			$this->InputValueRegisterDate    = $InstanceInfraToolsTypeService->GetRegisterDate();
			$this->InputValueTypeServiceName = $InstanceInfraToolsTypeService->GetTypeServiceName();
			$this->InputValueTypeServiceSLA  = $InstanceInfraToolsTypeService->GetTypeServiceSLA();
		}
	}
	
	protected function InfraToolsTypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsTypeServiceSelect($Limit1, $Limit2,
																            $ArrayInstanceInfraToolsTypeService,
																            $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsTypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsTypeServiceSelectNoLimit($ArrayInstanceInfraToolsTypeService, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsTypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsTypeService, 
			                                                    $RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsTypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
			                                                                             $ArrayInstanceInfraToolsTypeService,
																			             $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsTypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->InfraToolsTypeServiceSelectOnUserContextNoLimit($UserEmail, $ArrayInstanceInfraToolsTypeService,
																					            $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsTypeServiceUpdateByTypeServiceName($TypeServiceNameNew, $TypeServiceSLANew, 
																	&$InstanceInfraToolsTypeService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeServiceName = $TypeServiceNameNew;
		$this->InputValueTypeServiceSLA  = $TypeServiceSLANew;
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_NAME;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_TYPE_SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnTypeServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_SERVICE_NAME',
									'FORM_INVALID_TYPE_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TYPE_SERVICE_SLA
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_SLA;
		$arrayElementsClass[0]        = &$this->ReturnTypeServiceSLAClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeServiceSLAText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_SERVICE_NAME',
									'FORM_INVALID_TYPE_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);

		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsTypeServiceUpdateByTypeServiceName(
				                                                               $this->InputValueTypeStatusTicketDescription,
																			   $InstanceTypeStatusTicket->GetTypeStatusTicketDescription(),
																			   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$InstanceTypeStatusTicket->SetTypeStatusTicketDescription($this->InputValueTypeStatusTicketDescription);
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
				$this->TypeStatusTicketLoadData($InstanceTypeStatusTicket);
				$this->ShowDivReturnSuccess("TYPE_STATUS_TICKET_UPDATE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return ConfigInfraTools::RETURN_WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_UPDATE_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsUser, $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return ConfigInfraTools::SUCCESS;
		}
		elseif(empty($ArrayInstanceInfraToolsUser))
		{
			$this->ShowDivReturnWarning("USER_NOT_FOUND");
			return ConfigInfraTools::RETURN_WARNING;	
		}
		$this->ShowDivReturnError("USER_NOT_FOUND");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceInfraToolsUser, 
															 &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationName;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_CORPORATION_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByCorporationName($Limit1, $Limit2, 
																								  $this->InputValueCorporationName, 
																				                  $ArrayInstanceInfraToolsUser, $RowCount, 
																							      $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_CORPORATION_NAME_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_CORPORATION_NAME_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, 
															&$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationName;
		$this->InputValueDepartmentName = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_CORPORATION_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_DEPARTMENT_NAME
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, 
																								 $this->InputValueCorporationName,
																								 $this->InputValueDepartmentName, 
																				                 $ArrayInstanceInfraToolsUser, $RowCount, 
																							     $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_DEPARTMENT_NAME_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_DEPARTMENT_NAME_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsUser,&$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueIpAddressIpv4 = $IpAddressIpv4;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_IP_ADDRESS_IPV4
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV4;
		$arrayElementsClass[0]        = &$this->ReturnIpAddressIpv4Class;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_IP_ADDRESS_IPV4;
		$arrayElementsInput[0]        = $this->InputValueIpAddressIpv4; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnIpAddressIpv4Text;
		array_push($arrayConstants, 'FORM_INVALID_IP_ADDRESS_IPV4', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, 
																							    $this->InputValueIpAddressIpv4, 
																				                $ArrayInstanceInfraToolsUser, $RowCount, 
																							    $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_IP_ADDRESS_IPV4_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_IP_ADDRESS_IPV4_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceInfraToolsUser, 
															&$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueNotificationId = $NotificationId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_NOTIFICATION_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_NOTIFICATION_ID;
		$arrayElementsClass[0]        = &$this->ReturnNotificationIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueNotificationId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnNotificationIdText;
		array_push($arrayConstants, 'FORM_INVALID_NOTIFICATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByNotificationId($Limit1, $Limit2, 
																							     $this->InputValueNotificationId, 
																				                 $ArrayInstanceInfraToolsUser, $RowCount, 
																							     $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_NOTIFICATION_ID_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_NOTIFICATION_ID_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueRoleName = $RoleName;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_ROLE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_ROLE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnRoleNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueRoleName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnRoleNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByRoleName($Limit1, $Limit2, 
																						   $this->InputValueRoleName, 
																				           $ArrayInstanceInfraToolsUser, $RowCount, 
																						   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_ROLE_NAME_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_ROLE_NAME_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByServiceId($Limit1, $Limit2, 
																							$this->InputValueServiceId, 
																				            $ArrayInstanceInfraToolsUser, $RowCount, 
																							$Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_SERVICE_ID_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_SERVICE_ID_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTeamId = $TeamId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_TEAM_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TEAM_ID;
		$arrayElementsClass[0]        = &$this->ReturnTeamIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTeamId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamIdText;
		array_push($arrayConstants, 'FORM_INVALID_TEAM_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTeamId($Limit1, $Limit2, $this->InputValueTeamId,
																	  		             $ArrayInstanceInfraToolsUser, $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_TEAM_ID_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_TEAM_ID_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTicketId = $TicketId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_TICKET_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TICKET_ID;
		$arrayElementsClass[0]        = &$this->ReturnTicketIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTicketId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTicketIdText;
		array_push($arrayConstants, 'FORM_INVALID_TICKET_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTicketId($Limit1, $Limit2, $this->InputValueTicketId, 
																	                       $ArrayInstanceInfraToolsUser, $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_TICKET_ID_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_TICKET_ID_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, 
		                                                              &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION', 'FORM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2,
																									 $TypeAssocUserTeamDescription,
																						             $ArrayInstanceInfraToolsUser,
																									 $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, 
		                                                           &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeTicketDescription = $TypeTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_TICKET_DESCRIPTION', 'FORM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, 
																							            $this->InputValueTypeTicketDescription,
																	                                    $ArrayInstanceInfraToolsUser, 
																										$RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_TYPE_TICKET_DESCRIPTION_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_TYPE_TICKET_DESCRIPTION_ERROR");
		return ConfigInfraTools::RETURN_ERROR;	
	}
	
	protected function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceInfraToolsUser, 
		                                                         &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeUserDescription = $TypeUserDescription;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_TYPE_USER_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeUserDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_USER_DESCRIPTION', 'FORM_INVALID_TYPE_USER_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTypeUserDescription( $Limit1, $Limit2,
																									  $this->InputValueTypeUserDescription,
															                                          $ArrayInstanceInfraToolsUser, 
																									  $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::SUCCESS;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SELECT_BY_TYPE_USER_DESCRIPTION_WARNING");
				return ConfigInfraTools::RETURN_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_TYPE_USER_DESCRIPTION_ERROR");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserSelectByUserEmail($UserEmail, &$InstanceInfraToolsUser, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueUserEmail = $UserEmail;
		if(!empty($UserEmail))
		{
			$return = $FacedePersistenceInfraTools->InfraToolsUserSelectByUserEmail($this->InputValueUserEmail, 
																					$InstanceInfraToolsUser, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $FacedePersistenceInfraTools->UserSelectTeamByUserEmail($InstanceInfraToolsUser, $Debug);
				if($return == ConfigInfraTools::SUCCESS || $return == ConfigInfraTools::MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_EMPTY)
				{
					$this->InfraToolsUserLoadData($InstanceInfraToolsUser);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $InstanceInfraToolsUser);
					return ConfigInfraTools::SUCCESS;	
				}
				else
				{
					$this->ShowDivReturnError("USER_SELECT_TEAM_BY_USER_EMAIL_ERROR");
					return ConfigInfraTools::RETURN_ERROR;
				}
			}
			else
			{
				$this->ShowDivReturnError("USER_NOT_FOUND");
				return ConfigInfraTools::RETURN_ERROR;
			}
		}
		$this->ShowDivReturnError("USER_NOT_FOUND");
		return ConfigInfraTools::RETURN_ERROR;
	}
	
	protected function InfraToolsUserLoadData($InstanceInfraToolsUser)
	{
		if(is_a($InstanceInfraToolsUser, "InfraToolsUser"))
		{
			$this->InputValueAssocUserCorporationRegistrationDate = 
				$InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDate();
			$this->InputValueAssocUserCorporationRegistrationId = 
				$InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationId();
			$this->InputValueBirthDateDay             = $InstanceInfraToolsUser->GetBirthDateDay();
			$this->InputValueBirthDateMonth           = $InstanceInfraToolsUser->GetBirthDateMonth();
			$this->InputValueBirthDateYear            = $InstanceInfraToolsUser->GetBirthDateYear();
			$this->InputValueUserCorporationName      = $InstanceInfraToolsUser->GetCorporationName();
			$this->InputValueCountry                  = $InstanceInfraToolsUser->GetCountry();
			if($InstanceInfraToolsUser->GetDepartmentInitials() != NULL)
				$this->InputValueDepartmentName       = $InstanceInfraToolsUser->GetDepartmentInitials() 
														  . " - " . $InstanceInfraToolsUser->GetDepartmentName();
			elseif($InstanceInfraToolsUser->GetDepartmentName() != NULL)
				$this->InputValueDepartmentName       = $InstanceInfraToolsUser->GetDepartmentName();
			else $this->InputValueDepartmentName = NULL;
			$this->InputValueGender                   = $InstanceInfraToolsUser->GetGender();
			$this->InputValueUserName                 = $InstanceInfraToolsUser->GetName();
			$this->InputValueUserEmail                = $InstanceInfraToolsUser->GetEmail();
			$this->InputValueUserPhonePrimary         = $InstanceInfraToolsUser->GetUserPhonePrimary();
			$this->InputValueUserPhonePrimaryPrefix   = $InstanceInfraToolsUser->GetUserPhonePrimaryPrefix();
			$this->InputValueUserPhoneSecondary       = $InstanceInfraToolsUser->GetUserPhoneSecondary();
			$this->InputValueUserPhoneSecondaryPrefix = $InstanceInfraToolsUser->GetUserPhoneSecondaryPrefix();
			$this->InputValueRegion                   = $InstanceInfraToolsUser->GetRegion();
			$this->InputValueRegisterDate             = $InstanceInfraToolsUser->GetRegisterDate();
			$this->InputValueRegistrationDate         = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDate();
			$this->InputValueRegistrationDateDay      = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDateDay();
			$this->InputValueRegistrationDateMonth    = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDateMonth();
			$this->InputValueRegistrationDateYear     = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDateYear();
			$this->InputValueRegistrationId           = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationId();
			if($InstanceInfraToolsUser->GetArrayAssocUserTeam() != NULL)
			{
				foreach ($InstanceInfraToolsUser->GetArrayAssocUserTeam() as $index=>$assocUserTeam)
				{
					if($index == 0)
						$this->InputValueUserTeam = $assocUserTeam->GetTeamName();
					else $this->InputValueUserTeam .= ", " . $assocUserTeam->GetTeamName();
				}
			}
			$this->InputValueUserUniqueId             = $InstanceInfraToolsUser->GetUserUniqueId();
			if($InstanceInfraToolsUser->GetSessionExpires())
				$this->InputValueSessionExpires = "checked";
			if($InstanceInfraToolsUser->GetTwoStepVerification())
				$this->InputValueTwoStepVerification = "checked";
			if($InstanceInfraToolsUser->GetUserActive())
				$this->InputValueUserActive = "checked";
			if($InstanceInfraToolsUser->GetUserConfirmed())
				$this->InputValueUserConfirmed = "checked";
			$this->InputValueTypeUserDescription = $InstanceInfraToolsUser->GetUserTypeDescription();
			if($InstanceInfraToolsUser->CheckAssocUserCorporationRegistrationDateActive())
				$this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($InstanceInfraToolsUser->CheckAssocUserCorporationRegistrationIdActive())
				$this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($InstanceInfraToolsUser->CheckCorporationActive())
				$this->InputValueCorporationActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueCorporationActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($InstanceInfraToolsUser->CheckDepartmentExists())
				$this->InputValueDepartmentActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueDepartmentActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($this->InputValueUserUniqueId != NULL)
				$this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage .
												   'Icons/IconInfraToolsNotVerified.png';
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::RETURN_ERROR;
	}
	
	public function GetCurrentPage()
	{
		$pageConstant = ConfigInfraTools::GetPageConstant($this->Page);
		if($pageConstant)
			return $pageConstant;
		else return $this->Page;
	}
}
?>