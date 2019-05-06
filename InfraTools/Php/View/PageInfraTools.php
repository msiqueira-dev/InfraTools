<?php
/************************************************************************
Class: PageInfraTools.php
Creation: 2014/08/18
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
			private   function InfraToolsLoadInstanceUser();
			protected function BuildSmartyTags();
			protected function InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsAssocIpAddressService, 
			                                                         &$RowCount, $Debug);
			protected function InfraToolsAssocIpAddressServiceSelectByServiceIdAndIpAddressIpv4($AssocIpAddressServiceServiceId,
			                                                                                   $AssocIpAddressServiceServiceIp, $Debug);
			protected function InfraToolsAssocIpAddressServiceSelectByServiceId($AssocIpAddressServiceServiceId,
			                                                                    $Debug);
			protected function InfraToolsAssocIpAddressServiceSelectByServiceIp($AssocIpAddressServiceServiceIp,
			                                                                    $Debug);
			protected function InfraToolsAssocIpAddressServiceSelectNoLimit(&$ArrayInstanceInfraToolsAssocIpAddressService, $Debug);
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
			protected function InfraToolsIpAddressDeleteByIpAddressIpv4($InfraToolsInstanceIpAddress, $Debug);
			protected function InfraToolsIpAddressInsert($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6,  
			                                             $InstanceInfraToolsNetwork, $Debug);
			protected function InfraToolsIpAddressLoadData($InstanceInfraToolsIpAddress);
			protected function InfraToolsIpAddressSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsIpAddress, &$RowCount, $Debug);
			protected function InfraToolsIpAddressSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsIpAddress, 
															            &$RowCount, $Debug);
			protected function InfraToolsIpAddressSelectNoLimit(&$ArrayInstanceInfraToolsIpAddress, $Debug);
			protected function InfraToolsIpAddressUpdateByIpAddressIpv4($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
																        $IpAddressNetworkNew, $IpAddressIpv4, $Debug);
			protected function InfraToolsIpAddressUpdateByIpAddressIpv6($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
																        $IpAddressNetworkNew, $IpAddressIpv6, $Debug);
			protected function InfraToolsNetworkDeleteByNetworkName($InfraToolsInstanceNetwork, $Debug);
			protected function InfraToolsNetworkInsert($NetworkIp, $NetworkName, $NetworkNetmask, $Debug);
			protected function InfraToolsNetworkLoadData($InstanceInfraToolsNetwork);
			protected function InfraToolsNetworkSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsNetwork, &$RowCount, $Debug);
			protected function InfraToolsNetworkSelectByNetworkIp($Limit1, $Limit2, $NetworkIp, &$ArrayInstanceInfraToolsNetwork);
			protected function InfraToolsNetworkSelectByNetworkName($Limit1, $Limit1, $NetworkName, &$ArrayInstanceInfraToolsNetwork,
			                                                        &$RowCount, $Debug);
			protected function InfraToolsNetworkSelectByNetworkNameNoLimit($NetworkName, &$ArrayInstanceInfraToolsNetwork, $Debug);
			protected function InfraToolsNetworkSelectByNetworkNetmask($Limit1, $Limit2, $NetworkNetmask, &$ArrayInstanceInfraToolsNetwork, 
															       &$RowCount, $Debug);
			protected function InfraToolsNetworkSelectNoLimit(&$ArrayInstanceInfraToolsNetwork, $Debug);
			protected function InfraToolsNetworkUpdateByNetworkName($NetworkIpNew, $NetworkNameNew, $NetworkNetmaskNew, $NetworkName, $Debug);
			protected function InfraToolsServiceDeleteByServiceId($ServiceId, $UserEmail, $Debug);
			protected function InfraToolsServiceDeleteByServiceIdOnUserContext($ServiceId, $UserEmail, $Debug);
			protected function InfraToolsServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                                           $ServiceDepartment, $ServiceDepartmentCanChange, 
										               $ServiceDescription, $ServiceName, $ServiceType, $Debug);
			protected function InfraToolsServiceLoadData($InstanceInfraToolsService);
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
	public $InputValueIpAddressDescription                       = "";
	public $InputValueIpAddressIpv4                              = "";
	public $InputValueIpAddressIpv4Radio                         = "";
	public $InputValueIpAddressIpv6                              = "";
	public $InputValueIpAddressIpv6Radio                         = "";
	public $InputValueNetworkIp                                  = "";
	public $InputValueNetworkName                                = "";
	public $InputValueNetworkNetmask                             = "";
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
	public $ReturnIpAddressDescriptionClass                      = "";
	public $ReturnIpAddressDescriptionText                       = "";
	public $ReturnIpAddressIpv4Class                             = "";
	public $ReturnIpAddressIpv4Text                              = "";
	public $ReturnIpAddressIpv6Class                             = "";
	public $ReturnIpAddressIpv6Text                              = "";
	public $ReturnIpAddressNetworkClass                          = "";
	public $ReturnIpAddressNetworkText                           = "";
	public $ReturnNetworkIpClass                                 = "";
	public $ReturnNetworkIpText                                  = "";
	public $ReturnNetworkNameClass                               = "";
	public $ReturnNetworkNameText                                = "";
	public $ReturnNetworkNetmaskClass                            = "";
	public $ReturnNetworkNetmaskText                             = "";
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
		$this->InfraToolsLoadInstanceUser();
		parent::__construct($Config, $Language, $Page);
	}
	
	private function InfraToolsLoadInstanceUser()
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
			return ConfigInfraTools::RET_OK;
		}
	}

	protected function BuildSmartyTags()
	{
		if(parent::BuildSmartyTags() == ConfigInfraTools::RET_OK)
		{
			$this->Smarty->assign('DIV_RETURN', ConfigInfraTools::DIV_RETURN);
			$this->Smarty->assign('FM_LST_INPUT_LIMIT_ONE', ConfigInfraTools::FM_LST_INPUT_LIMIT_ONE);
			$this->Smarty->assign('FM_LST_INPUT_LIMIT_TWO', ConfigInfraTools::FM_LST_INPUT_LIMIT_TWO);
			$this->Smarty->assign('FIELD_CORPORATION_NAME', ConfigInfraTools::FIELD_CORPORATION_NAME);
			$this->Smarty->assign('FIELD_CORPORATION_NAME_TEXT', $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME'));
			$this->Smarty->assign('FIELD_DEPARTMENT_NAME', ConfigInfraTools::FIELD_DEPARTMENT_NAME);
			$this->Smarty->assign('FIELD_DEPARTMENT_NAME_TEXT', $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME'));
			$this->Smarty->assign('FIELD_TYPE_USER_DESCRIPTION', ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION);
			$this->Smarty->assign('FIELD_USER_EMAIL', ConfigInfraTools::FIELD_USER_EMAIL);
			$this->Smarty->assign('FIELD_USER_EMAIL_TEXT', $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL'));
			$this->Smarty->assign('FIELD_USER_NAME_TEXT', $this->InstanceLanguageText->GetText('FIELD_USER_NAME'));
			$this->Smarty->assign('FIELD_USER_TYPE_TEXT', $this->InstanceLanguageText->GetText('FIELD_USER_TYPE'));
			$this->Smarty->assign('FM_CORPORATION_SEL_SB', ConfigInfraTools::FM_CORPORATION_SEL_SB);
			$this->Smarty->assign('FM_DEPARTMENT_SEL_SB', ConfigInfraTools::FM_DEPARTMENT_SEL_SB);
			$this->Smarty->assign('FM_TYPE_USER_SEL_SB', ConfigInfraTools::FM_TYPE_USER_SEL_SB);
			$this->Smarty->assign('FM_USER_SEL_SB', ConfigInfraTools::FM_USER_SEL_SB);
			$this->Smarty->assign('ICON_INFRATOOLS_SEL', $this->Config->DefaultServerImage.'Icons/IconInfraToolsFind.png');
			$this->Smarty->assign('ICON_INFRATOOLS_SEL_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsFindHover.png');
			$this->Smarty->assign('ICON_INFRATOOLS_REGISTER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsAdd.png');
			$this->Smarty->assign('ICON_INFRATOOLS_REGISTER_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsAddHover.png');
			$this->Smarty->assign('ICON_INFRATOOLS_LST', $this->Config->DefaultServerImage.'Icons/IconInfraToolsList.png');
			$this->Smarty->assign('ICON_INFRATOOLS_LST_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsListHover.png');
			$this->Smarty->assign('SUBMIT_BACK', $this->InstanceLanguageText->GetText('SUBMIT_BACK'));
			$this->Smarty->assign('SUBMIT_BACK_ICON', $this->Config->DefaultServerImage. "Icons/IconInfraToolsArrowBack28.png");
			$this->Smarty->assign('SUBMIT_BACK_ICON_HOVER', $this->Config->DefaultServerImage. "Icons/IconInfraToolsArrowBack28Hover.png");
			$this->Smarty->assign('SUBMIT_FORWARD', $this->InstanceLanguageText->GetText('SUBMIT_FORWARD'));
			$this->Smarty->assign('SUBMIT_FORWARD_ICON', $this->Config->DefaultServerImage. "Icons/IconInfraToolsArrowForward28.png");
			$this->Smarty->assign('SUBMIT_FORWARD_ICON_HOVER', $this->Config->DefaultServerImage. "Icons/IconInfraToolsArrowForward28Hover.png");
			if(isset($this->InputValueLimit1) && isset($this->InputValueLimit2)) 
			{
				if($this->InputValueLimit1 != "" || $this->InputValueLimit2 != "") 
				{
					$this->Smarty->assign('TB_PAGE_PREFIX', $this->InstanceLanguageText->GetText('TB_PAGE_PREFIX'));
					$this->Smarty->assign('TB_PAGE_INPUT_VALUE_LIMIT_ONE', $this->InputValueLimit1);
					$this->Smarty->assign('TB_PAGE', $this->InstanceLanguageText->GetText('TB_PAGE'));
					$this->Smarty->assign('TB_PAGE_INPUT_VALUE_LIMIT_TWO', $this->InputValueLimit2);
				}
				else
				{
					$this->Smarty->assign('TB_PAGE_PREFIX', NULL);
					$this->Smarty->assign('TB_PAGE_INPUT_VALUE_LIMIT_ONE', NULL);
					$this->Smarty->assign('TB_PAGE', NULL);
					$this->Smarty->assign('TB_PAGE_INPUT_VALUE_LIMIT_TWO', NULL);
				}
			}
			else
			{
				$this->Smarty->assign('TB_PAGE_PREFIX', NULL);
				$this->Smarty->assign('TB_PAGE_INPUT_VALUE_LIMIT_ONE', NULL);
				$this->Smarty->assign('TB_PAGE', NULL);
				$this->Smarty->assign('TB_PAGE_INPUT_VALUE_LIMIT_TWO', NULL);
			}
			if(isset($this->InputValueRowCount)) 
			{
				if($this->InputValueRowCount != "") 
				{
					$this->Smarty->assign('ROW_COUNT', $this->InstanceLanguageText->GetText('ROW_COUNT'));
					$this->Smarty->assign('INPUT_VALUE_ROW_COUNT', $this->InputValueRowCount);
				}
				else
				{
					$this->Smarty->assign('ROW_COUNT', NULL);
					$this->Smarty->assign('INPUT_VALUE_ROW_COUNT', NULL);
				}
			}
			else
			{
				$this->Smarty->assign('ROW_COUNT', NULL);
				$this->Smarty->assign('INPUT_VALUE_ROW_COUNT', NULL);
			}
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;

	}
	
	protected function InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsAssocIpAddressService, 
															 &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsAssocIpAddressServiceSelect($Limit1, $Limit2,
																							  $ArrayInstanceInfraToolsAssocIpAddressService, 
															                                  $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
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
		return ConfigInfraTools::RET_ERROR;
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
	
	protected function InfraToolsAssocIpAddressServiceSelectNoLimit(&$ArrayInstanceInfraToolsAssocIpAddressService, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsAssocIpAddressServiceSelectNoLimit(
																							  $ArrayInstanceInfraToolsAssocIpAddressService, 
															                                  $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ReturnText  = "";
			$this->ReturnClass = "DivHidden";
			$this->ReturnImage = "DivDisplayNone";
			return $return;
		}
		$this->ShowDivReturnError("ASSOC_IP_ADDRESS_SERVICE_NOT_FOUND");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsCorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporationInfraTools, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsCorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporationInfraTools, 
															                        $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
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
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsCorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		return $instanceInfraToolsFacedePersistence->CorporationSelectActiveNoLimit($ArrayInstanceCorporation, $Debug);
	}
	
	protected function InfraToolsCorporationSelectOnUserServiceContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsCorporation, 
	                                                                   &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsCorporationSelectOnUserServiceContext(
			                                                                                    $Limit1, $Limit2, $UserEmail, 
			                                                                                    $ArrayInstanceInfraToolsCorporation, 
																                                $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ShowDivReturnSuccess("CORPORATION_SEL_ON_USER_SERVICE_CONTEXT_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("CORPORATION_SEL_ON_USER_SERVICE_CONTEXT_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsCorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsCorporationSelectOnUserServiceContextNoLimit(
			                                                                                            $UserEmail,
																			                            $ArrayInstanceInfraToolsCorporation,
																			                            $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ShowDivReturnSuccess("CORPORATION_SEL_ON_USER_SERVICE_CONTEXT_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("CORPORATION_SEL_ON_USER_SERVICE_CONTEXT_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsDepartmentSelectOnUserServiceContext($Limit1, $Limit2, $UserCorporation, $UserEmail, 
			                                                          &$ArrayInstanceInfraToolsCorporation, 
	                                                        &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $UserCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsDepartmentSelectOnUserServiceContext(
				                                                                         $Limit1, $Limit2, 
																						 $this->InputValueServiceCorporation, $UserEmail,
																				         $ArrayInstanceInfraToolsCorporation, $RowCount,
																						 $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("DEPARTMENT_SEL_ON_USER_SERVICE_CONTEXT_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
			$this->ShowDivReturnError("DEPARTMENT_SEL_ON_USER_SERVICE_CONTEXT_ERROR");
			return ConfigInfraTools::RET_ERROR;
		}
	}
	
	protected function InfraToolsDepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, &$ArrayInstanceInfraToolsDepartment,
																             $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $UserCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsDepartmentSelectOnUserServiceContextNoLimit(
				                                                                                $this->InputValueServiceCorporation,
																								$UserEmail,$ArrayInstanceInfraToolsDepartment,
																				                $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("DEPARTMENT_SEL_ON_USER_SERVICE_CONTEXT_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
			$this->ShowDivReturnError("DEPARTMENT_SEL_ON_USER_SERVICE_CONTEXT_ERROR");
			return ConfigInfraTools::RET_ERROR;
		}
	}
	
	protected function InfraToolsIpAddressDeleteByIpAddressIpv4($InfraToolsInstanceIpAddress, $Debug)
	{
		if($InfraToolsInstanceIpAddress != NULL)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsIpAddressDeleteByIpAddressIpv4(
				                                                 $InfraToolsInstanceIpAddress->GetIpAddressIpv4(),$Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, $InfraToolsInstanceIpAddress);
				$this->ShowDivReturnSuccess("IP_ADDRESS_DEL_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("IP_ADDRESS_DEL_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsIpAddressInsert($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, 
												 $InstanceInfraToolsNetwork, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueIpAddressDescription = $IpAddressDescription;
		$this->InputValueIpAddressIpv4 = $IpAddressIpv4;
		$this->InputValueIpAddressIpv6 = $IpAddressIpv6;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_IP_ADDRESS_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnIpAddressDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueIpAddressDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnIpAddressDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_IP_ADDRESS_DESCRIPTION', 'FM_INVALID_IP_ADDRESS_DESCRIPTION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_IP_ADDRESS_IPV4
		$arrayElements[1]             = ConfigInfraTools::FIELD_IP_ADDRESS_IPV4;
		$arrayElementsClass[1]        = &$this->ReturnIpAddressIpv4Class;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_IP_ADDRESS_IPV4;
		$arrayElementsInput[1]        = $this->InputValueIpAddressIpv4; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 15; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnIpAddressIpv4Text;
		array_push($arrayConstants, 'FM_INVALID_IP_ADDRESS_IPV4', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_IP_ADDRESS_IPV6
		$arrayElements[2]             = ConfigInfraTools::FIELD_IP_ADDRESS_IPV6;
		$arrayElementsClass[2]        = &$this->ReturnIpAddressIpv6Class;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_IP_ADDRESS_IPV6;
		$arrayElementsInput[2]        = $this->InputValueIpAddressIpv6; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 38; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnIpAddressIpv6Text;
		array_push($arrayConstants, 'FM_INVALID_IP_ADDRESS_IPV6', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness($this->InstanceLanguageText);
			if(is_a($InstanceInfraToolsNetwork, "InfraToolsNetwork"))
			{
				$return = $instanceInfraToolsFacedeBusiness->CheckIpAddressIsInNetwork($IpAddressIpv4, 
																					$InstanceInfraToolsNetwork->GetNetworkIp(), 
																					$InstanceInfraToolsNetwork->GetNetworkNetmask(), 
																					$message);
				if($return != ConfigInfraTools::RET_OK)
				{
					$this->ShowDivReturnError($message, TRUE);
					return ConfigInfraTools::RET_ERROR;
				}
			}
			else $return = ConfigInfraTools::RET_ERROR;
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $instanceInfraToolsFacedePersistence->InfraToolsIpAddressInsert($this->InputValueIpAddressDescription, 
																						  $this->InputValueIpAddressIpv4, 
																						  $this->InputValueIpAddressIpv6, 
																						  $InstanceInfraToolsNetwork, $Debug);
				if($return == ConfigInfraTools::RET_OK)
				{
					$this->ShowDivReturnSuccess("IP_ADDRESS_INSERT_SUCCESS");
					return ConfigInfraTools::RET_OK;
				}
				elseif($return == ConfigInfraTools::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE || 
					   $return == ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_INSERT_RESTRICT)
				{
					$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
					return ConfigInfraTools::RET_WARNING;
				}
			}
		}
		$this->ShowDivReturnError("IP_ADDRESS_INSERT_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsIpAddressLoadData($InstanceInfraToolsIpAddress)
	{
		if(is_object($InstanceInfraToolsIpAddress))
		{
			$this->InputValueIpAddressDescription = $InstanceInfraToolsIpAddress->GetIpAddressDescription();
			$this->InputValueNetworkIp            = $InstanceInfraToolsIpAddress->GetIpAddressInstanceInfraToolsNetworkNetworkIp();
			$this->InputValueNetworkName          = $InstanceInfraToolsIpAddress->GetIpAddressInstanceInfraToolsNetworkNetworkName();
			$this->InputValueNetworkNetmask       = $InstanceInfraToolsIpAddress->GetIpAddressInstanceInfraToolsNetworkNetworkNetmask();
			$this->InputValueIpAddressIpv4        = $InstanceInfraToolsIpAddress->GetIpAddressIpv4();
			$this->InputValueIpAddressIpv6        = $InstanceInfraToolsIpAddress->GetIpAddressIpv6();
			$this->InputValueRegisterDate         = $InstanceInfraToolsIpAddress->GetRegisterDate();
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsIpAddressSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsIpAddress, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsIpAddressSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsIpAddress, 
															                      $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
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
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsIpAddressSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsIpAddress, 
																&$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueIpAddressIpv4 = $IpAddressIpv4;
		$arrayConstants = array(); $matrixConstants = array();
		//FIELD_IP_ADDRESS_IPV4
		$arrayElements[0]             = ConfigInfraTools::FIELD_IP_ADDRESS_IPV4;
		$arrayElementsClass[0]        = &$this->ReturnIpAddressIpv4Class;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_IP_ADDRESS_IPV4;
		$arrayElementsInput[0]        = $this->InputValueIpAddressIpv4; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 15; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnIpAddressIpv4Text;
		array_push($arrayConstants, 'FM_INVALID_IP_ADDRESS_IPV4', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsIpAddressSelectByIpAddressIpv4(
				                                                                             $Limit1, $Limit2, $this->InputValueIpAddressIpv4,
																							 $ArrayInstanceInfraToolsIpAddress, $RowCount,
																							 $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsIpAddressSelectByIpAddressIpv6($Limit1, $Limit2, $IpAddressIpv6, &$ArrayInstanceInfraToolsIpAddress, 
																&$RowCount, $Debug)
	{
		
	}
	
	protected function InfraToolsIpAddressSelectNoLimit(&$ArrayInstanceInfraToolsIpAddress, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsIpAddressSelectNoLimit($ArrayInstanceInfraToolsIpAddress, $Debug);
		if($return == ConfigInfraTools::RET_OK)
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
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsIpAddressUpdateByIpAddressIpv4($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
																$IpAddressNetworkNew, $IpAddressIpv4, $Debug)
	{
		
	}
	
	protected function InfraToolsIpAddressUpdateByIpAddressIpv6($IpAddressDescriptionNew, $IpAddressIpv4New, $IpAddressIpv6New,
																$IpAddressNetworkNew, $IpAddressIpv6, $Debug)
	{
		
	}
	
	public function InfraToolsNetworkDeleteByNetworkName($InfraToolsInstanceNetwork, $Debug)
	{
		
	}
	
	public function InfraToolsNetworkInsert($NetworkIp, $NetworkName, $NetworkNetmask, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueNetworkIp = $NetworkIp;
		$this->InputValueNetworkName = $NetworkName;
		$this->InputValueNetworkNetmask = $NetworkNetmask;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_NETWORK_IP
		$arrayElements[0]             = ConfigInfraTools::FIELD_NETWORK_IP;
		$arrayElementsClass[0]        = &$this->ReturnNetworkNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueNetworkIp; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 15; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnNetworkIpText;
		array_push($arrayConstants, 'FM_INVALID_NETWORK_IP', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_NETWORK_NAME
		$arrayElements[1]             = ConfigInfraTools::FIELD_NETWORK_NAME;
		$arrayElementsClass[1]        = &$this->ReturnNetworkNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueNetworkName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 60; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnNetworkNameText;
		array_push($arrayConstants, 'FM_INVALID_NETWORK_NAME', 'FM_INVALID_NETWORK_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_NETWORK_NETMASK
		$arrayElements[2]             = ConfigInfraTools::FIELD_NETWORK_NETMASK;
		$arrayElementsClass[2]        = &$this->ReturnNetworkNetmaskClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NETMASK;
		$arrayElementsInput[2]        = $this->InputValueNetworkNetmask; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 2; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnNetworkNetmaskText;
		array_push($arrayConstants, 'FM_INVALID_NETWORK_NETMASK', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsNetworkInsert($this->InputValueNetworkIp, 
										    								        $this->InputValueNetworkName, 
																		            $this->InputValueNetworkNetmask, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("NETWORK_INSERT_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
			elseif($return == ConfigInfraTools::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return ConfigInfraTools::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("NETWORK_INSERT_ERROR");
		return ConfigInfraTools::RET_ERROR;	
	}
	
	protected function InfraToolsNetworkLoadData($InstanceInfraToolsNetwork)
	{
		if(is_object($InstanceInfraToolsNetwork))
		{
			$this->InputValueNetworkIp      = $InstanceInfraToolsNetwork->GetNetworkIp();
			$this->InputValueNetworkName    = $InstanceInfraToolsNetwork->GetNetworkName();
			$this->InputValueNetworkNetmask = $InstanceInfraToolsNetwork->GetNetworkNetmask();
			$this->InputValueRegisterDate   = $InstanceInfraToolsNetwork->GetRegisterDate();
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;
	}
	
	public function InfraToolsNetworkSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsNetwork, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsNetworkSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsNetwork, 
															                    $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ReturnText  = "";
			$this->ReturnClass = "DivHidden";
			$this->ReturnImage = "DivDisplayNone";
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return $return;
		}
		$this->ShowDivReturnError("NETWORK_NOT_FOUND");
		return ConfigInfraTools::RET_ERROR;
	}
	
	public function InfraToolsNetworkSelectByNetworkIp($Limit1, $Limit2, $NetworkIp, &$ArrayInstanceInfraToolsNetwork)
	{
		
	}
	
	public function InfraToolsNetworkSelectByNetworkName($Limit1, $Limit2, $NetworkName, &$ArrayInstanceInfraToolsNetwork, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValuenetworkName = $NetworkName;
		$arrayConstants = array(); $matrixConstants = array();
		//FIELD_NETWORK_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_NETWORK_NAME;
		$arrayElementsClass[0]        = &$this->ReturnNetworkNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValuenetworkName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnNetworkNameText;
		array_push($arrayConstants, 'FM_INVALID_NETWORK_NAME', 'FM_INVALID_NETWORK_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsNetworkSelectByNetworkName($Limit1, $Limit2, $this->InputValuenetworkName,
																				                 $ArrayInstanceInfraToolsNetwork, $RowCount,
																				                 $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("NETWORK_SEL_BY_NETWORK_NAME_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("NETWORK_SEL_BY_NETWORK_NAME_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	public function InfraToolsNetworkSelectByNetworkNameNoLimit($NetworkName, &$ArrayInstanceInfraToolsNetwork, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValuenetworkName = $NetworkName;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_NETWORK_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_NETWORK_NAME;
		$arrayElementsClass[0]        = &$this->ReturnNetworkNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValuenetworkName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnNetworkNameText;
		array_push($arrayConstants, 'FM_INVALID_NETWORK_NAME', 'FM_INVALID_NETWORK_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsNetworkSelectByNetworkNameNoLimit($this->InputValuenetworkName,
																				                        $ArrayInstanceInfraToolsNetwork,
																				                        $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("NETWORK_SEL_BY_NETWORK_NAME_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("NETWORK_SEL_BY_NETWORK_NAME_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	public function InfraToolsNetworkSelectByNetworkNetmask($Limit1, $Limit2, $NetworkNetmask, &$ArrayInstanceInfraToolsNetwork, 
															&$RowCount, $Debug)
	{
		
	}
	
	public function InfraToolsNetworkSelectNoLimit(&$ArrayInstanceInfraToolsNetwork, $Debug, $StoreSession = FALSE)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();

		$return = $instanceInfraToolsFacedePersistence->InfraToolsNetworkSelectNoLimit($ArrayInstanceInfraToolsNetwork, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_NETWORK, $ArrayInstanceInfraToolsNetwork);
			$this->ShowDivReturnSuccess("NETWORK_SEL_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("NETWORK_SEL_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	public function InfraToolsNetworkUpdateByNetworkName($NetworkIpNew, $NetworkNameNew, $NetworkNetmaskNew, $NetworkName, $Debug)
	{

	}
	
	protected function InfraToolsServiceDeleteByServiceId($ServiceId, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId;; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceDeleteByServiceId($this->InputValueServiceId, 
																						       $UserEmail, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_DEL_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_DEL_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceDeleteByServiceIdOnUserContext($ServiceId, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId;; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 3; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceDeleteByServiceIdOnUserContext(
				                                                                           $this->InputValueServiceId, 
				                                                                           $UserEmail, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_DEL_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
			elseif($return == ConfigInfraTools::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
			{
				$this->ShowDivReturnError("SERVICE_DEL_ERROR_FOREIGN_KEY");
				return ConfigInfraTools::RET_ERROR;
			}
		}
		$this->ShowDivReturnError("SERVICE_DEL_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
									           $ServiceDepartment, $ServiceDepartmentCanChange,
									           $ServiceDescription, $ServiceName, $ServiceType, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		if($ServiceCorporation == ConfigInfraTools::FIELD_SEL_NONE)
			$ServiceCorporation = NULL;
		if($ServiceDepartment == ConfigInfraTools::FIELD_SEL_NONE)
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
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION
		$arrayConstants = array();
		$arrayElements[1]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION_CAN_CHANGE
		$arrayConstants = array();
		$arrayElements[2]             = ConfigInfraTools::FIELD_SERVICE_CORPORATION_CAN_CHANGE;
		$arrayElementsClass[2]        = &$this->ReturnServiceCanChangeClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[2]        = $this->InputValueServiceCorporationCanChange; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnServiceCorporationCanChangeText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_CORPORATION_CAN_CHANGE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT
		$arrayConstants = array();
		$arrayElements[3]             = ConfigInfraTools::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[3]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[3]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 80; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT_CAN_CHANGE
		$arrayConstants = array();
		$arrayElements[4]             = ConfigInfraTools::FIELD_SERVICE_DEPARTMENT_CAN_CHANGE;
		$arrayElementsClass[4]        = &$this->ReturnServiceDepartmentCanChangeClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[4]        = $this->InputValueServiceDepartmentCanChange; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnServiceDepartmentCanChangeText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_DEPARTMENT_CAN_CHANGE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DESCRIPTION
		$arrayConstants = array();
		$arrayElements[5]             = ConfigInfraTools::FIELD_SERVICE_DESCRIPTION;
		$arrayElementsClass[5]        = &$this->ReturnServiceDescriptionClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[5]        = $this->InputValueServiceDescription; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 200; 
		$arrayElementsNullable[5]     = FALSE;
		$arrayElementsText[5]         = &$this->ReturnServiceDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_DESCRIPTION', 'FM_INVALID_SERVICE_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_NAME
		$arrayConstants = array();
		$arrayElements[6]             = ConfigInfraTools::FIELD_SERVICE_NAME;
		$arrayElementsClass[6]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[6]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 45; 
		$arrayElementsNullable[6]     = FALSE;
		$arrayElementsText[6]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_NAME', 'FM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_SERVICE_TYPE
		$arrayConstants = array();
		$arrayElements[7]             = ConfigInfraTools::FIELD_SERVICE_TYPE;
		$arrayElementsClass[7]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[7]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 45; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_TYPE', 'FM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceInsert($this->InputValueServiceActive, 
																				    $this->InputValueServiceCorporation,
																                    $this->InputValueServiceCorporationCanChange, 
																                    $this->InputValueServiceDepartment, 
																                    $this->InputValueServiceDepartmentCanChange,
									                                                $this->InputValueServiceDescription, 
																                    $this->InputValueServiceName, 
																                    $this->InputValueServiceType, 
																                    $this->InputValueUserEmail, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_INSERT_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
			elseif($return == ConfigInfraTools::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return ConfigInfraTools::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("SERVICE_INSERT_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceLoadData($InstanceInfraToolsService)
	{
		if(is_object($InstanceInfraToolsService))
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
			$this->InputValueServiceActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueServiceActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			if($this->InputValueServiceCorporation != NULL)
				$this->InputValueServiceCorporationActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueServiceCorporationActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			if($this->InputValueServiceDepartment != NULL)
				$this->InputValueServiceDepartmentActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueServiceDepartmentActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug, $StoreSession = FALSE)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsService, 
															                    $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("SERVICE_NOT_FOUND");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, 
			                                      &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
																		                               $ArrayInstanceInfraToolsService, 
																	                                   $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("SERVICE_NOT_FOUND");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceActive($Limit1, $Limit2, $ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                        &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceActive = $ServiceActive;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceActive(
				                                                                           $Limit1, $Limit2, $this->InputValueServiceActive,
																				           $ArrayInstanceInfraToolsService,
																				           $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceActive = $ServiceActive;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceActiveNoLimit(
				                                                                                  $this->InputValueServiceActive,
																				                  $ArrayInstanceInfraToolsService,
																				                  $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	protected function InfraToolsServiceSelectByServiceActiveOnUserContext($Limit1, $Limit2, $ServiceActive, $UserEmail,
															               &$ArrayInstanceInfraToolsService, 
															               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceActive = $ServiceActive;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceActiveOnUserContext(
				                                                                              $Limit1, $Limit2,
																							  $this->InputValueServiceActive, $UserEmail,
																							  $ArrayInstanceInfraToolsService,
																				              $RowCount, 
																							  $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	protected function InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                            &$ArrayInstanceInfraToolsService, 
			                                                            &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceActive = $ServiceActive;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceActiveOnUserContextNoLimit(
				                                                                                               $this->InputValueServiceActive,
																									           $UserEmail,
																				                               $ArrayInstanceInfraToolsService,
																				                               $RowCount, 
																									           $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	protected function InfraToolsServiceSelectByServiceCorporation($Limit1, $Limit2, $ServiceCorporation,
			                                                       &$ArrayInstanceInfraToolsService, 
														           &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceActive(
				                                                                           $Limit1, $Limit2, 
																						   $this->InputValueServiceCorporation,
																				           $ArrayInstanceInfraToolsService,
																				           $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
															    &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->ServiceSelectByServiceCorporationNoLimit(
				                                                                             $this->InputValueServiceCorporation,
																				             $ArrayInstanceInfraToolsService,
																				             $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function ServiceSelectByServiceCorporationOnUserContext($Limit1, $Limit2,
																	  $ServiceCorporation, $UserEmail, 
																	  &$ArrayInstanceInfraToolsService, 
																	  &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->ServiceSelectByServiceCorporationOnUserContext(
				                                                                                   $Limit1, $Limit2,
																								   $this->InputValueServiceCorporation,
																								   $UserEmail,
																				                   $ArrayInstanceInfraToolsService,
																				                   $RowCount, 
																							       $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		               &$ArrayInstanceInfraToolsService, 
																		               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit(
				                                                                                          $this->InputValueServiceCorporation,
																								          $UserEmail,
																				                          $ArrayInstanceInfraToolsService,
																				                          $RowCount, 
																							              $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceDepartment($Limit1, $Limit2, $ServiceCorporation, $ServiceDepartment,
														          &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$this->InputValueServiceDepartment  = $ServiceDepartment;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceDepartment(
				                                                                               $Limit1, $Limit2,
																					           $this->InputValueServiceCorporation, 
																					           $this->InputValueServiceDepartment,
																				               $ArrayInstanceInfraToolsService,
																				               $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
															             &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$this->InputValueServiceDepartment  = $ServiceDepartment;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceDepartmentNoLimit(
				                                                                                      $this->InputValueServiceCorporation, 
																							          $this->InputValueServiceDepartment,
																				                      $ArrayInstanceInfraToolsService,
																					                  $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceDepartmentOnUserContext($Limit1, $Limit2, $ServiceCorporation, 
																			   $ServiceDepartment, $UserEmail, 
																               &$ArrayInstanceInfraToolsService, 
																               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$this->InputValueServiceDepartment  = $ServiceDepartment;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceDepartmentOnUserContext(
				                                                                                            $Limit1, $Limit2,
																								            $this->InputValueServiceCorporation,
																								            $this->InputValueServiceDepartment,
																								            $UserEmail,
																				                            $ArrayInstanceInfraToolsService,
																								            $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																		             &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceCorporation = $ServiceCorporation;
		$this->InputValueServiceDepartment  = $ServiceDepartment;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit(
				                                                                                         $this->InputValueServiceCorporation,
				                                                                                         $this->InputValueServiceDepartment,
																								         $UserEmail,
																				                         $ArrayInstanceInfraToolsService,
																					                     $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceId($this->InputValueServiceId, 
				                                                                                         $InstanceInfraToolsService, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $InstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_ID_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_ID_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
															           &$TypeAssocUserServiceId, $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceIdOnUserContext(
				                                                                          $this->InputValueServiceId, 
																						  $UserEmail,
																						  $InstanceInfraToolsService,
																						  $TypeAssocUserServiceId,
																						  $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $InstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_ID_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_ID_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceName($Limit1, $Limit2, $ServiceName, &$ArrayInstanceInfraToolsService, 
												            &$RowCount, $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceName = $ServiceName;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_NAME', 'FM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceName(
				                                                                         $Limit1, $Limit2,
																			             $this->InputValueServiceName,  
																			             $ArrayInstanceInfraToolsService,
																			             $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, $Debug, 
																   $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceName = $ServiceName;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_NAME', 'FM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceNameNoLimit(
				                                                                                $this->InputValueServiceName,
																			                    $ArrayInstanceInfraToolsService,
																			                    $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceNameOnUserContext($Limit1, $Limit2, $ServiceName, $UserEmail, 
															             &$ArrayInstanceInfraToolsService, &$RowCount, 
																		 $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceName = $ServiceName;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_NAME', 'FM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceNameOnUserContext(
				                                                                            $Limit1, $Limit2,
																							$this->InputValueServiceName, $UserEmail, 
																							$ArrayInstanceInfraToolsService,
																							$RowCount,
																			                $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, &$ArrayInstanceInfraToolsService, 
																                $Debug, $StoreSession = FALSE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceName = $ServiceName;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_NAME', 'FM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceNameOnUserContextNoLimit(
				                                                                                             $this->InputValueServiceName, 
																								             $UserEmail,
																			                                 $ArrayInstanceInfraToolsService,
																			                                 $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceType($Limit1, $Limit2, $ServiceType, &$ArrayInstanceInfraToolsService, 
												            &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceType = $ServiceType;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_TYPE', 'FM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceType(
				                                                                         $Limit1, $Limit2,
																			             $this->InputValueServiceType, 
																			             $ArrayInstanceInfraToolsService, $RowCount,
																			             $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceType = $ServiceType;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_TYPE', 'FM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceTypeNoLimit(
				                                                                                           $this->InputValueServiceType,
											     							                               $ArrayInstanceInfraToolsService,
																			                               $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceTypeOnUserContext($Limit1, $Limit2, $ServiceType, $UserEmail, 
															             &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceType = $ServiceType;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_TYPE', 'FM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceTypeOnUserContext(
				                                                                                      $Limit1, $Limit2,
																							          $this->InputValueServiceType, 
																							          $UserEmail,
											     							                          $ArrayInstanceInfraToolsService,
																					                  $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																                &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueServiceType = $ServiceType;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_TYPE', 'FM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByServiceTypeOnUserContextNoLimit(
				                                                                                             $this->InputValueServiceType, 
																								             $UserEmail,
											     							                                 $ArrayInstanceInfraToolsService,
																			                                 $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByTypeAssocUserServiceDescription($Limit1, $Limit2, $TypeAssocUserServiceDescription, 
			                                                                    &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeAssocUserServiceDescription = $TypeAssocUserServiceDescription;
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserServiceDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByTypeAssocUserServiceDescription(
				                                                                             $Limit1, $Limit2,
																							 $this->InputValueTypeAssocUserServiceDescription,  
			                                                                                 $ArrayInstanceInfraToolsService, 
			                                                                                 $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit($TypeAssocUserServiceDescription, 
			                                                                           &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeAssocUserServiceDescription = $TypeAssocUserServiceDescription;
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserServiceDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit(
				                                                                        $this->InputValueTypeAssocUserServiceDescription, 
			                                                                            $ArrayInstanceInfraToolsService, 
			                                                                            $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext($Limit1, $Limit2, 
																				             $TypeAssocUserServiceDescription, 
																							 $UserEmail, &$ArrayInstanceInfraToolsService,
																							 &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeAssocUserServiceDescription = $TypeAssocUserServiceDescription;
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserServiceDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext(
				                                                                        $Limit1, $Limit2, 
				                                                                        $this->InputValueTypeAssocUserServiceDescription,
				                                                                        $UserEmail,
			                                                                            $ArrayInstanceInfraToolsService, 
			                                                                            $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit($TypeAssocUserServiceDescription, 
			                                                                                        $UserEmail,
																									&$ArrayInstanceInfraToolsService, 
										  							                                $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeAssocUserServiceDescription = $TypeAssocUserServiceDescription;
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserServiceDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit(
				                                                                         $this->InputValueTypeAssocUserServiceDescription, 
			                                                                             $ArrayInstanceInfraToolsService, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByUser($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueUserEmail = $UserEmail;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByUser(
				                                                               $Limit1, $Limit2, $this->InputValueUserEmail,
											     				 		       $ArrayInstanceInfraToolsService,
																		          $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_USER_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_USER_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueUserEmail = $UserEmail;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectByUserNoLimit($this->InputValueUserEmail,
											     						                         $ArrayInstanceInfraToolsService, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_USER_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_USER_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug, $StoreSession = FALSE)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();

		$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceSelectNoLimit($ArrayInstanceInfraToolsService, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			if($StoreSession) $this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $ArrayInstanceInfraToolsService);
			$this->ShowDivReturnSuccess("SERVICE_SEL_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("SERVICE_SEL_ERROR");
		return ConfigInfraTools::RET_ERROR;
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
		$this->InputFocus = ConfigInfraTools::FIELD_SERVICE_NAME;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_CORPORATION
		$arrayElements[1]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[1]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION_CAN_CHANGE
		$arrayElements[2]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[2]        = &$this->ReturnCorporationCanChangeClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[2]        = $this->InputValueCorporationCanChange; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnCorporationCanChangeText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_CAN_CHANGE', 'FM_INVALID_CORPORATION_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT
		$arrayElements[3]             = ConfigInfraTools::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[3]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[3]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 80; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT_CAN_CHANGE
		$arrayElements[4]             = ConfigInfraTools::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[4]        = &$this->ReturnDepartmentCanChangeClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[4]        = $this->InputValueDepartmentCanChange; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnDepartmentCanChangeText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_CAN_CHANGE', 'FM_INVALID_DEPARTMENT_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DESCRIPTION
		$arrayElements[3]             = ConfigInfraTools::FIELD_SERVICE_DESCRIPTION;
		$arrayElementsClass[3]        = &$this->ReturnServiceDescriptionClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[3]        = $this->InputValueServiceDescription; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 200; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnServiceDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_DESCRIPTION', 'FM_INVALID_SERVICE_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_NAME
		$arrayElements[4]             = ConfigInfraTools::FIELD_SERVICE_NAME;
		$arrayElementsClass[4]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[4]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_NAME', 'FM_INVALID_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_SERVICE_TYPE
		$arrayElements[5]             = ConfigInfraTools::FIELD_SERVICE_TYPE;
		$arrayElementsClass[5]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[5]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 45; 
		$arrayElementsNullable[5]     = FALSE;
		$arrayElementsText[5]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_TYPE', 'FM_INVALID_SERVICE_TYPE_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceUpdateByServiceId($ServiceActiveNew, 
															   				                   $ServiceCoporationNew,
																			                   $ServiceCorporationCanChangeNew,
																			                   $ServiceDepartmentNew,
																			                   $ServiceDepartmentCanChangeNew,
	  										                                                   $ServiceDescriptionNew, 
																			                   $ServiceNameNew, 
																			                   $ServiceTypeNew, 
																			                   $ServiceId,
															                                   $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_UPDT_BY_ID_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
			elseif($return == ConfigInfraTools::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("SERVICE_UPDT_BY_ID_ERROR");
		return ConfigInfraTools::RET_ERROR;
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
		$this->InputFocus = ConfigInfraTools::FIELD_SERVICE_NAME;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 0; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DESCRIPTION
		$arrayElements[1]             = ConfigInfraTools::FIELD_SERVICE_DESCRIPTION;
		$arrayElementsClass[1]        = &$this->ReturnServiceDescriptionClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueServiceDescription; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 200; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnServiceDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_DESCRIPTION', 'FM_INVALID_SERVICE_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_NAME
		$arrayElements[2]             = ConfigInfraTools::FIELD_SERVICE_NAME;
		$arrayElementsClass[2]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[2]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_NAME', 'FM_INVALID_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_SERVICE_TYPE
		$arrayElements[3]             = ConfigInfraTools::FIELD_SERVICE_TYPE;
		$arrayElementsClass[3]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[3]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 45; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_TYPE', 'FM_INVALID_SERVICE_TYPE_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsServiceUpdateRestrictByServiceId($ServiceActiveNew, 
	  										                                                          $ServiceDescriptionNew, 
 																			                          $ServiceNameNew, 
																			                          $ServiceTypeNew, 
																			                          $ServiceId,
															                                          $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnSuccess("SERVICE_UPDT_RESTRICT_BY_ID_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
			elseif($return == ConfigInfraTools::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return ConfigInfraTools::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("SERVICE_UPDT_RESTRICTBY_ID_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsTicketUpdateTicketServiceByTicketId($TicketServiceNew, &$InstanceTicket, $Debug)
	{
	}
	
	protected function InfraToolsTypeAssocUserServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsTypeAssocUserServiceSelect($Limit1, $Limit2,
																					 $ArrayInstanceInfraToolsTypeAssocUserService,
																		             $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SEL_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SEL_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsTypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsTypeAssocUserServiceSelectNoLimit(
			                                                                          $ArrayInstanceInfraToolsTypeAssocUserService,
																			          $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SEL_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SEL_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeAssocUserService, 
															             $UserEmail, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsTypeAssocUserServiceSelectOnUserContext($Limit1, $Limit2,
																						          $ArrayInstanceInfraToolsTypeAssocUserService, 
																						          $UserEmail, $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SEL_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SEL_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, 
																				$UserEmail, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit(
			                                                                   $ArrayInstanceInfraToolsTypeAssocUserService, 
																			   $UserEmail,
																			   $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SEL_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SEL_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsTypeServiceDeleteByTypeTypeServiceName($TypeServiceName, $Debug)
	{
		
	}
	
	protected function InfraToolsTypeServiceInsert($TypeServiceName, $TypeServiceSLA, $Debug)
	{
		
	}
	
	protected function InfraToolsTypeServiceLoadData($InstanceInfraToolsTypeService)
	{
		if(is_object($InstanceInfraToolsTypeService))
		{
			$this->InputValueRegisterDate    = $InstanceInfraToolsTypeService->GetRegisterDate();
			$this->InputValueTypeServiceName = $InstanceInfraToolsTypeService->GetTypeServiceName();
			$this->InputValueTypeServiceSLA  = $InstanceInfraToolsTypeService->GetTypeServiceSLA();
		}
	}
	
	protected function InfraToolsTypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsTypeServiceSelect($Limit1, $Limit2,
																                              $ArrayInstanceInfraToolsTypeService,
																                              $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsTypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsTypeServiceSelectNoLimit($ArrayInstanceInfraToolsTypeService, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsTypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail, &$ArrayInstanceInfraToolsTypeService, 
			                                                    $RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsTypeServiceSelectOnUserContext(
			                                                                             $Limit1, $Limit2, $UserEmail,
			                                                                             $ArrayInstanceInfraToolsTypeService,
																			             $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsTypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $instanceInfraToolsFacedePersistence->InfraToolsTypeServiceSelectOnUserContextNoLimit(
			                                                                                            $UserEmail,
																										$ArrayInstanceInfraToolsTypeService,
																					                    $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ShowDivReturnSuccess("SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::RET_OK;
		}
		$this->ShowDivReturnError("SERVICE_SEL_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsTypeServiceUpdateByTypeServiceName($TypeServiceNameNew, $TypeServiceSLANew, 
																	&$InstanceInfraToolsTypeService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeServiceName = $TypeServiceNameNew;
		$this->InputValueTypeServiceSLA  = $TypeServiceSLANew;
		$this->InputFocus = ConfigInfraTools::FIELD_TYPE_SERVICE_NAME;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_TYPE_SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_TYPE_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnTypeServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeServiceNameText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_SERVICE_NAME',
									'FM_INVALID_TYPE_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TYPE_SERVICE_SLA
		$arrayElements[0]             = ConfigInfraTools::FIELD_TYPE_SERVICE_SLA;
		$arrayElementsClass[0]        = &$this->ReturnTypeServiceSLAClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeServiceSLAText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_SERVICE_NAME',
									'FM_INVALID_TYPE_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);

		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsTypeServiceUpdateByTypeServiceName(
				                                                               $this->InputValueTypeStatusTicketDescription,
																			   $InstanceTypeStatusTicket->GetTypeStatusTicketDescription(),
																			   $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$InstanceTypeStatusTicket->SetTypeStatusTicketDescription($this->InputValueTypeStatusTicketDescription);
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
				$this->TypeStatusTicketLoadData($InstanceTypeStatusTicket);
				$this->ShowDivReturnSuccess("TYPE_STATUS_TICKET_UPDT_SUCCESS");
				return ConfigInfraTools::RET_OK;
			}
			elseif($return == ConfigInfraTools::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return ConfigInfraTools::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_UPDT_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsUser, $RowCount, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return ConfigInfraTools::RET_OK;
		}
		elseif(empty($ArrayInstanceInfraToolsUser))
		{
			$this->ShowDivReturnWarning("USER_NOT_FOUND");
			return ConfigInfraTools::RET_WARNING;	
		}
		$this->ShowDivReturnError("USER_NOT_FOUND");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceInfraToolsUser, 
															 &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationName;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByCorporationName($Limit1, $Limit2, 
																								  $this->InputValueCorporationName, 
																				                  $ArrayInstanceInfraToolsUser, $RowCount, 
																							      $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_CORPORATION_NAME_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_CORPORATION_NAME_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, 
															&$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationName;
		$this->InputValueDepartmentName = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_DEPARTMENT_NAME
		$arrayElements[1]             = ConfigInfraTools::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, 
																								 $this->InputValueCorporationName,
																								 $this->InputValueDepartmentName, 
																				                 $ArrayInstanceInfraToolsUser, $RowCount, 
																							     $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_DEPARTMENT_NAME_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_DEPARTMENT_NAME_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsUser,&$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueIpAddressIpv4 = $IpAddressIpv4;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_IP_ADDRESS_IPV4
		$arrayElements[0]             = ConfigInfraTools::FIELD_IP_ADDRESS_IPV4;
		$arrayElementsClass[0]        = &$this->ReturnIpAddressIpv4Class;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_IP_ADDRESS_IPV4;
		$arrayElementsInput[0]        = $this->InputValueIpAddressIpv4; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnIpAddressIpv4Text;
		array_push($arrayConstants, 'FM_INVALID_IP_ADDRESS_IPV4', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, 
																							    $this->InputValueIpAddressIpv4, 
																				                $ArrayInstanceInfraToolsUser, $RowCount, 
																							    $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_IP_ADDRESS_IPV4_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_IP_ADDRESS_IPV4_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceInfraToolsUser, 
															&$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueNotificationId = $NotificationId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_NOTIFICATION_ID
		$arrayElements[0]             = ConfigInfraTools::FIELD_NOTIFICATION_ID;
		$arrayElementsClass[0]        = &$this->ReturnNotificationIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueNotificationId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnNotificationIdText;
		array_push($arrayConstants, 'FM_INVALID_NOTIFICATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByNotificationId($Limit1, $Limit2, 
																							     $this->InputValueNotificationId, 
																				                 $ArrayInstanceInfraToolsUser, $RowCount, 
																							     $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_NOTIFICATION_ID_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_NOTIFICATION_ID_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueRoleName = $RoleName;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_ROLE_NAME
		$arrayElements[0]             = ConfigInfraTools::FIELD_ROLE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnRoleNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueRoleName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnRoleNameText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByRoleName($Limit1, $Limit2, 
																						   $this->InputValueRoleName, 
																				           $ArrayInstanceInfraToolsUser, $RowCount, 
																						   $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_ROLE_NAME_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_ROLE_NAME_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueServiceId = $ServiceId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByServiceId($Limit1, $Limit2, 
																							$this->InputValueServiceId, 
																				            $ArrayInstanceInfraToolsUser, $RowCount, 
																							$Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_SERVICE_ID_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_SERVICE_ID_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTeamId = $TeamId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TEAM_ID
		$arrayElements[0]             = ConfigInfraTools::FIELD_TEAM_ID;
		$arrayElementsClass[0]        = &$this->ReturnTeamIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTeamId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamIdText;
		array_push($arrayConstants, 'FM_INVALID_TEAM_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTeamId($Limit1, $Limit2, $this->InputValueTeamId,
																	  		             $ArrayInstanceInfraToolsUser, $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_TEAM_ID_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_TEAM_ID_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTicketId = $TicketId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TICKET_ID
		$arrayElements[0]             = ConfigInfraTools::FIELD_TICKET_ID;
		$arrayElementsClass[0]        = &$this->ReturnTicketIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTicketId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTicketIdText;
		array_push($arrayConstants, 'FM_INVALID_TICKET_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTicketId($Limit1, $Limit2, $this->InputValueTicketId, 
																	                       $ArrayInstanceInfraToolsUser, $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_TICKET_ID_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_TICKET_ID_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, 
		                                                              &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION', 'FM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2,
																									 $TypeAssocUserTeamDescription,
																						             $ArrayInstanceInfraToolsUser,
																									 $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, 
		                                                           &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeTicketDescription = $TypeTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_TICKET_DESCRIPTION', 'FM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, 
																							            $this->InputValueTypeTicketDescription,
																	                                    $ArrayInstanceInfraToolsUser, 
																										$RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_TYPE_TICKET_DESCRIPTION_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_TYPE_TICKET_DESCRIPTION_ERROR");
		return ConfigInfraTools::RET_ERROR;	
	}
	
	protected function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceInfraToolsUser, 
		                                                         &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeUserDescription = $TypeUserDescription;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TYPE_USER_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeUserDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_USER_DESCRIPTION', 'FM_INVALID_TYPE_USER_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == ConfigInfraTools::RET_OK)
		{
			$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByTypeUserDescription( $Limit1, $Limit2,
																									  $this->InputValueTypeUserDescription,
															                                          $ArrayInstanceInfraToolsUser, 
																									  $RowCount, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return ConfigInfraTools::RET_OK;
			}
			elseif(empty($ArrayInstanceInfraToolsUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_TYPE_USER_DESCRIPTION_WARNING");
				return ConfigInfraTools::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_TYPE_USER_DESCRIPTION_ERROR");
		return ConfigInfraTools::RET_ERROR;
	}
	
	protected function InfraToolsUserSelectByUserEmail($UserEmail, &$InstanceInfraToolsUser, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueUserEmail = $UserEmail;
		if(!empty($UserEmail))
		{
			$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelectByUserEmail($this->InputValueUserEmail, 
																				  	        $InstanceInfraToolsUser, $Debug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$return = $instanceInfraToolsFacedePersistence->UserSelectTeamByUserEmail($InstanceInfraToolsUser, $Debug);
				if($return == ConfigInfraTools::RET_OK || $return == ConfigInfraTools::DB_ERROR_USER_SEL_TEAM_BY_USER_EMAIL_EMPTY)
				{
					$this->InfraToolsUserLoadData($InstanceInfraToolsUser);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $InstanceInfraToolsUser);
					return ConfigInfraTools::RET_OK;	
				}
				else
				{
					$this->ShowDivReturnError("USER_SEL_TEAM_BY_USER_EMAIL_ERROR");
					return ConfigInfraTools::RET_ERROR;
				}
			}
			else
			{
				$this->ShowDivReturnError("USER_NOT_FOUND");
				return ConfigInfraTools::RET_ERROR;
			}
		}
		$this->ShowDivReturnError("USER_NOT_FOUND");
		return ConfigInfraTools::RET_ERROR;
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
				$this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			if($InstanceInfraToolsUser->CheckAssocUserCorporationRegistrationIdActive())
				$this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			if($InstanceInfraToolsUser->CheckCorporationActive())
				$this->InputValueCorporationActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueCorporationActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			if($InstanceInfraToolsUser->CheckDepartmentExists())
				$this->InputValueDepartmentActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueDepartmentActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			if($this->InputValueUserUniqueId != NULL)
				$this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::RET_ERROR;
	}
	
	public function GetCurrentPage()
	{
		$pageConstant = ConfigInfraTools::GetPageConstant($this->Page);
		if(!empty($pageConstant))
			return $pageConstant;
		else return $this->Page;
	}
}
?>