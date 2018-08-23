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
			private function ExecuteLoginFirstPhaseVerification();
			private function ExecuteLoginSecondPhaseVerirication();
			private function ExecuteLogOut();
			private function SendTwoStepVerificationCode($Email, $Name);
			protected function CorporationSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, 
			                                                         &$ArrayInstanceInfraToolsCorporation, 
	                                                                 &$RowCount, $Debug)
			protected function CorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation,
			                                                                $Debug);
			protected function CorporationSelectUsers($Limit1, $Limit2, &$RowCount);
			protected function DepartmentLoadData();
			protected function DepartmentSelectByDepartmentName($DepartmentName);
			protected function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName);
			protected function DepartmentSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, 
			                                                         &$ArrayInstanceInfraToolsCorporation, 
	                                                                 &$RowCount, $Debug)
			protected function DepartmentSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, $Debug);
			protected function MessageSelectByUserEmail($Email);
			protected function PageFormLoad();
			protected function PageFormRemoveLast();
			protected function PageFormSave();
			protected function ServiceDeleteById($ServiceId, $UserEmail, $Debug);
			protected function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug);
			protected function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                                 $ServiceDepartment, $ServiceDepartmentCanChange, 
										     $ServiceDescription, $ServiceName, $ServiceType, $Debug);
			protected function ServiceLoadData();
			protected function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                              &$RowCount, $Debug);
			protected function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                                &$RowCount, $Debug);
			protected function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolService, 
			                                                       $Debug);
			protected function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2,
			                                                             &$ArrayInstanceInfraToolService, 
			                                                             &$RowCount, $Debug);
			protected function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                                    &$ArrayInstanceInfraToolService, 
			                                                                    $Debug);
			protected function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2,
			                                                     &$ArrayInstanceInfraToolService, 
															     &$RowCount, $Debug);
			protected function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolService, 
			                                                            $Debug);
			protected function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail, 
			                                                                  $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                                                  &$RowCount, $Debug);
			protected function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
			                                                                         &$ArrayInstanceInfraToolService, 
			                                                                         $Debug);
			protected function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2, 
			                                                    &$ArrayInstanceInfraToolService,
			                                                    &$RowCount, $Debug);
	        protected function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
			                                                           &$ArrayInstanceInfraToolService, $Debug);
			protected function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation $ServiceDepartment, $UserEmail, 
			                                                              $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                                              &$RowCount, $Debug);
			protected function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, 
			                                                                        $ServiceDepartment, $UserEmail, 
			                                                                        &$ArrayInstanceInfraToolService, 
			                                                                        $Debug);
			protected function ServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, &$RowCount, $Debug);	
			protected function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
			                                                         &$TypeAssocUserServiceId, $Debug);
			protected function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                              &$RowCount, $Debug);	
			protected function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolService, 
			                                                     $Debug);	
			protected function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
			                                                        $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                                        &$RowCount, $Debug);
			protected function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
			                                                                  &$ArrayInstanceInfraToolService, 
			                                                                  $Debug);
			protected function ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                              &$RowCount, $Debug);
			protected function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, $Limit1, $Limit2, 
			                                                        &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
			                                                                  &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                                       &$ArrayInstanceInfraToolService, 
			                                                       &$RowCount, $Debug);
			protected function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                              &$ArrayInstanceInfraToolService, 
																          $Debug);
			protected function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
			                                                                    $UserEmail, $Limit1, $Limit2, 
			                                                                    &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
			                                                                           $UserEmail,
			                                                                           &$ArrayInstanceInfraToolService, 
																		               $Debug);
			protected function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectNoLimit(&$ArrayInstanceInfraToolService, $Debug);
			protected function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
			                                            $ServiceDepartmentNew, ServiceDepartmentCanChangeNew,
											            $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, 
														$ServiceId, $Debug);
			protected function ServiceUpdateRestrictByServiceId($ServiceActiveNew,$ServiceNameNew, 
			                                                    $ServiceTypeNew, $ServiceId, 
											                    $Debug);
			protected function TeamLoadData();
			protected function TicketLoadData();
			protected function TypeAssocUserServiceSelect(&$ArrayInstanceInfraToolsTypeService, &$RowCount,
			                                              $Limit1, $Limit2, $Debug);
			protected function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug);
			protected function TypeAssocUserServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeService, 
			                                                           $UserEmail, &$RowCount,
			                                                           $Limit1, $Limit2, $Debug);
			protected function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, 
			                                                                  $UserEmail, $Debug);
			protected function TypeAssocUserTeamLoadData();
			protected function TypeServiceSelect($Limit1, $Limit2, &ArrayInstanceInfraToolsTypeService, 
			                                     &$RowCount, $Debug);
			protected function TypeServiceSelectNoLimit(&ArrayInstanceInfraToolsTypeService, $Debug);
			protected function TypeServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeService, $UserEmail, &$RowCount
			                                                  $Limit1, $Limit2, $Debug);
			protected function TypeServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, $UserEmail, $Debug);
			protected function TypeStatusTicketLoadData();
			protected function TypeTicketLoadData();
			protected function TypeTicketSelectById($TypeTicketId);
			protected function TypeUserLoadData();
			protected function TypeUserSelectByDescription($Description);
			protected function TypeUserSelectUsers($Limit1, $Limit2, &$RowCount);
			protected function UserChangeTwoStepVerification($InstanceUserInfraTools, $TwoStepVerification);
			protected function UserInfraToolsSelectByEmail($Email);
			protected function UserLoadData();
			protected function UserRegister($SendEmail, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed);
			protected function UserUpdate($OnAdmin, $SelectedUser);
			protected function UserUpdateCorporationInformation($SelectedUser);
			public function CheckInstanceUser();
			public function CheckLogin();
			public function CheckPageRequiresLogin();
			public function LoadPageInfraToolsDependencies();
			public function LoadPageInfraToolsDependenciesDebug();
			public function LoadPageInfraToolsDependenciesDevice();
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
	public    $ArrayInstanceDepartment          = NULL;
	protected $FacedeBusinessInfraTools         = NULL;
	protected $InstanceInfraToolsUser           = NULL;
	protected $InstanceLanguageText             = NULL;
	protected $InstanceMobileDetectInfraTools   = NULL;
	protected $Session                          = NULL;
	public    $InstanceInfraToolsUserAdmin      = NULL;
	
	/* Propiedades de página */
	public $EnableFieldSessionExpires                            = "";
	public $EnableFieldTwoStepVerification                       = "";                    
	public $EnableFieldUserActive                                = "";
	public $EnableFieldUserConfirmed                             = "";
	public $InputFocus                                           = "";
	public $InputValueAssocUserCorporationRegistrationDate       = "";
	public $InputValueAssocUserCorporationRegistrationDateActive = "";
	public $InputValueAssocUserCorporationRegistrationId         = "";
	public $InputValueAssocUserCorporationRegistrationIdActive   = "";
	public $InputValueBirthDateDay                               = "";
	public $InputValueBirthDateMonth                             = "";
	public $InputValueBirthDateYear                              = "";
	public $InputValueCaptcha                                    = "";
	public $InputValueCode                                       = "";
	public $InputValueCountry                                    = "";
	public $InputValueGender                                     = "";
	public $InputValueHeaderDebug                                = ConfigInfraTools::CHECKBOX_UNCHECKED;
	public $InputValueHeaderLayout                               = ConfigInfraTools::CHECKBOX_UNCHECKED;
	public $InputValueId                                         = "";
	public $InputValueLoginEmail                                 = "";
	public $InputValueLoginPassword                              = "";
	public $InputValueNewPassword                                = "";
	public $InputValueRegion                                     = "";
	public $InputValueRegisterDate                               = "";
	public $InputValueRegistrationDateDay                        = "";
	public $InputValueRegistrationDateMonth                      = "";
	public $InputValueRegistrationDateYear                       = "";
	public $InputValueRegistrationId                             = "";
	public $InputValueRepeatPassword                             = "";
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
	public $InputValueTeamDescription                            = "";
	public $InputValueTeamId                                     = "";
	public $InputValueTeamName                                   = "";
	public $InputValueTicketDescription                          = "";
	public $InputValueTicketTitle                                = "";
	public $InputValueTwoStepVerification                        = "";
	public $InputValueTypeAssocUserServiceDescription            = "";
	public $InputValueTypeAssocUserServiceId                     = "";
	public $InputValueTypeAssocUserTeamTeamDescription           = "";
	public $InputValueTypeAssocUserTeamTeamId                    = "";
	public $InputValueTypeServiceName                            = "";
	public $InputValueTypeStatusTicketDescription                = "";
	public $InputValueTypeStatusTicketId                         = "";
	public $InputValueTypeTicketDescription                      = "";
	public $InputValueTypeTicketId                               = "";
	public $InputValueTypeUserDescription                        = "";
	public $InputValueTypeUserId                                 = "";
	public $InputValueUserActive                                 = "";
	public $InputValueUserConfirmed                              = "";
	public $InputValueUserCorporationName                        = "";
	public $InputValueUserEmail                                  = "";
	public $InputValueUserName                                   = "";
	public $InputValueUserPhonePrimary                           = "";
	public $InputValueUserPhonePrimaryPrefix                     = "";
	public $InputValueUserPhoneSecondary                         = "";
	public $InputValueUserPhoneSecondaryPrefix                   = "";
	public $InputValueUserTeam                                   = ""; 
	public $InputValueUserUniqueId                               = "";
	public $InputValueUserUniqueIdActive                         = "";
	public $Language                                             = "";
	public $LinkTarget                                           = "target='_blank'";
	public $LoginStatus                                          = "";
	public $Page                                                 = "";
	public $ReturnBirthDateDayClass                              = "";
	public $ReturnBirthDateDayText                               = "";
	public $ReturnBirthDateMonthClass                            = "";
	public $ReturnBirthDateMonthText                             = "";
	public $ReturnBirthDateYearText                              = "";
	public $ReturnBirthDateYearClass                             = "";
	public $ReturnCaptchaClass                                   = "";
	public $ReturnCaptchaText                                    = "";
	public $ReturnCodeClass                                      = "";
	public $ReturnCodeText                                       = "";
	public $ReturnCountryClass                                   = "";
	public $ReturnCountryText                                    = "";
	public $ReturnEmailClass                                     = "";
	public $ReturnEmailText                                      = "";
	public $ReturnEmptyText                                      = "";
	public $ReturnGenderClass                                    = "";
	public $ReturnGenderText                                     = "";
	public $ReturnHeaderDebugClass                               = "SwitchToggleSlider";
	public $ReturnHeaderLayoutClass                              = "SwitchToggleSlider";
	public $ReturnIdClass                                        = "";
	public $ReturnIdText                                         = "";
	public $ReturnNameClass                                      = "";
	public $ReturnNameText                                       = "";
	public $ReturnPasswordClass                                  = "";
	public $ReturnPasswordText                                   = "";
	public $ReturnRegionClass                                    = "";
	public $ReturnRegionText                                     = "";
	public $ReturnRegistrationDateText                           = "";
	public $ReturnRegistrationDateDayText                        = "";
	public $ReturnRegistrationDateDayClass                       = "";
	public $ReturnRegistrationDateMonthText                      = "";
	public $ReturnRegistrationDateMonthClass                     = "";
	public $ReturnRegistrationDateYearText                       = "";
	public $ReturnRegistrationDateYearClass                      = "";
	public $ReturnRegistrationIdClass                            = "";
	public $ReturnRegistrationIdText                             = "";
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
	public $ReturnTeamDescriptionClass                           = "";
	public $ReturnTeamDescriptionText                            = "";
	public $ReturnTeamIdClass                                    = "";
	public $ReturnTeamIdText                                     = "";
	public $ReturnTeamNameClass                                  = "";
	public $ReturnTeamNameText                                   = "";
	public $ReturnTicketDescriptionClass                         = "";
	public $ReturnTicketDescriptionText                          = "";
	public $ReturnTicketTitleClass                               = "";
	public $ReturnTicketTitleText                                = "";
	public $ReturnText                                           = "";
	public $ReturnTypeAssocUserServiceDescriptionClass           = "";
	public $ReturnTypeAssocUserServiceDescriptionText            = "";
	public $ReturnTypeAssocUserServiceIdClass                    = "";
	public $ReturnTypeAssocUserServiceIdText                     = "";
	public $ReturnTypeAssocUserTeamDescriptionClass              = "";
	public $ReturnTypeAssocUserTeamDescriptionText               = "";
	public $ReturnTypeAssocUserTeamTeamDescriptionClass          = "";
	public $ReturnTypeAssocUserTeamTeamDescriptionText           = "";
	public $ReturnTypeAssocUserTeamTeamIdClass                   = "";
	public $ReturnTypeAssocUserTeamTeamIdText                    = "";
	public $ReturnTypeServiceNameClass                           = "";
	public $ReturnTypeServiceNameText                            = "";
	public $ReturnTypeStatusTicketDescriptionClass               = "";
	public $ReturnTypeStatusTicketDescriptionText                = "";
	public $ReturnTypeStatusTicketIdClass                        = "";
	public $ReturnTypeStatusTicketIdText                         = "";
	public $ReturnTypeTicketDescriptionClass                     = "";
	public $ReturnTypeTicketDescriptionText                      = "";
	public $ReturnTypeTicketIdClass                              = "";
	public $ReturnTypeTicketIdText                               = "";
	public $ReturnTypeUserDescritpionClass                       = "";
	public $ReturnTypeUserDescriptionText                        = "";
	public $ReturnTypeUserIdClass                                = "";
	public $ReturnTypeUserIdText                                 = "";
	public $ReturnUserCorporationClass                           = "";
	public $ReturnUserCorporationText                            = "";
	public $ReturnUserEmailClass                                 = "";
	public $ReturnUserEmailText                                  = "";
	public $ReturnUserNameClass                                  = "";
	public $ReturnUserNameText                                   = "";
	public $ReturnUserPhonePrimaryClass                          = "";
	public $ReturnUserPhonePrimaryText                           = "";
	public $ReturnUserPhonePrimaryPrefixClass                    = "";
	public $ReturnUserPhonePrimaryPrefixText                     = "";
	public $ReturnUserPhoneSecondaryClass                        = "";
	public $ReturnUserPhoneSecondaryText                         = "";
	public $ReturnUserPhoneSecondaryPrefixClass                  = "";
	public $ReturnUserPhoneSecondaryPrefixText                   = "";
	public $ReturnUserTeamClass                                  = "";
	public $ReturnUserTeamText                                   = "";
	public $ReturnUserUniqueIdClass                              = "";
	public $ReturnUserUniqueIdText                               = "";
	public $SessionUserEmail                                     = "";
	public $ShowTypeUserDescription                              = FALSE;
	public $SubmitClass                                          = "SubmitDisabled";
	public $SubmitEnabled                                        = 'disabled="disabled"';
	public $ValidateCaptcha                                      = TRUE;
	
	/* Singleton */
	protected static $Instance;
	
	/* Get Instance */
	public static function __create()
	{
		if (!isset(self::$Instance)) 
		{
			$class = __CLASS__;
			self::$Instance = new $class;
		}
		return self::$Instance;
	}

	/* Constructor */
	protected function __construct() 
	{
		$this->Factory = InfraToolsFactory::__create();
		$this->Session = $this->Factory->CreateSession();
		$this->Config  = $this->Factory->CreateConfigInfraTools();
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	private function ExecuteLoginFirstPhaseVerification()
	{
		$this->InstanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		if (strpos($this->InputValueLoginEmail, '@') !== false) 
		{
			$return = $this->InstanceInfraToolsFacedePersistence->UserCheckPasswordByEmail($this->InputValueLoginEmail, 
					                                                            $this->InputValueLoginPassword, 
																				$this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $this->InstanceInfraToolsFacedePersistence->UserInfraToolsSelectByEmail(
					                                                          $this->InputValueLoginEmail, 
																			  $userInfraTools, $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
					$return = $this->InstanceInfraToolsFacedePersistence->UserSelectTeamByUserEmail($userInfraTools,
																				 	  $this->InputValueHeaderDebug);
			}
		}
		else
		{
			$return = $this->InstanceInfraToolsFacedePersistence->UserCheckPasswordByUserUniqueId(
			                                                                    $this->InputValueLoginEmail, 
					                                                            $this->InputValueLoginPassword, 
																				$this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $this->InstanceInfraToolsFacedePersistence->UserInfraToolsSelectByUserUniqueId(
					                                                          $this->InputValueLoginEmail, 
																			  $userInfraTools, $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
					$return = $this->InstanceInfraToolsFacedePersistence->UserSelectTeamByUserEmail($userInfraTools,
																				 	  $this->InputValueHeaderDebug);
			}
		}
		if($return == ConfigInfraTools::SUCCESS || $return == ConfigInfraTools::MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_EMPTY)
		{
			$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness(
																						   $this->InstanceLanguageText);
			$this->InstanceInfraToolsFacedeBusiness->GetIpAddressClient(true, $ip);
			$this->InstanceInfraToolsFacedeBusiness->GetOperationalSystem(true, $operationalSystem);
			$this->InstanceInfraToolsFacedeBusiness->GetBrowserClient(true, $browser);
			$sessionId = $userInfraTools->GetHashCode() . "-" .		
						 $ip . "-" .
						 $operationalSystem . "-" .
						 $browser;
			$this->InstanceBaseSession->CreatePersonalized($this->Config->DefaultApplicationName,
														  $sessionId,
														  $this->Config->SessionTime);
			$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESSION_DEVICE_LAYOUT, 
														   $this->InputValueHeaderLayout);
			$this->InstanceBaseSession->RemoveSessionVariable(ConfigInfraTools::SESS_LOGIN_TWO_STEP_VERIFICATION);
			if($userInfraTools->GetUserActive())
			{
				if($userInfraTools->GetUserConfirmed())
				{	
					$this->InstanceInfraToolsUser = $userInfraTools;
					if($this->InstanceInfraToolsUser->GetSessionExpires() == FALSE)
						$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESSION_LAST_ACTIVITY,
																	ConfigInfraTools::SESSION_UNLIMITED);
					$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESSION_USER, 
																$this->InstanceInfraToolsUser);
					if($userInfraTools->GetTwoStepVerification()) 
					{
						if($this->SendTwoStepVerificationCode($userInfraTools->GetEmail(),
															  $userInfraTools->GetName()) 
															  == ConfigInfraTools::SUCCESS)
							return ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED;
						else
						{
							$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant(
																		  'LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_FAILED', 
																		  $this->Language);
							$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
							$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
							return ConfigInfraTools::ERROR;
						}
					}
					return ConfigInfraTools::SUCCESS;
				}
				else
				{	
					$this->InstanceInfraToolsUser = $userInfraTools;
					$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESSION_USER, 
															   $this->InstanceInfraToolsUser);
					$this->LoadNotConfirmedToolTip();
					return ConfigInfraTools::WARNING;
				}
			}
			else
			{
				$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant(
																		  'USER_INACTIVE', 
																		  $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		else
		{
			$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant(
																		  'LOGIN_INVALID_LOGIN', 
																		  $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}		
	}
	
	private function ExecuteLoginSecondPhaseVerirication()
	{
		if (isset($_POST[ConfigInfraTools::FORM_LOGIN_TWO_STEP_VERIFICATION_CODE_SUBMIT]))
		{
			$this->InputValueCode = $_POST[ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_CODE];
			$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESS_LOGIN_TWO_STEP_VERIFICATION, $value);
			if($this->InputValueCode == $value)
				return ConfigInfraTools::SUCCESS;
			else return ConfigInfraTools::ERROR;
		}
		else
		{
			$this->InstanceBaseSession->RemoveSessionVariable(ConfigInfraTools::SESSION_USER);
			$this->InstanceBaseSession->RemoveSessionVariable(ConfigInfraTools::SESSION_DEBUG);
		}
	}
	
	private function ExecuteLogOut()
	{
		$this->InstanceBaseSession->DestroyCustomSession();
		$this->InstanceInfraToolsUser = NULL;
	}
	
	private function SendTwoStepVerificationCode($Email, $Name)
	{
		$FacedeBusinessInfraTools = $this->Factory->CreateInfraToolsFacedeBusiness($this->InstanceLanguageText);
		$code = $FacedeBusinessInfraTools->GenerateRandomCode();
		$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESS_LOGIN_TWO_STEP_VERIFICATION,
													$code);
		if($FacedeBusinessInfraTools->SendEmailLoginTwoStepVerificationCode($Email,
																					$Name,
																					$code,
																					$this->InputValueHeaderDebug) 
		                                                                            == ConfigInfraTools::SUCCESS)
			return ConfigInfraTools::SUCCESS;
	}
	
	protected function CorporationSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsCorporation, 
	                                                         &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->CorporationSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, 
			                                                                          $ArrayInstanceInfraToolsCorporation, 
																                      $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function CorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->CorporationSelectOnUserServiceContextNoLimit($UserEmail,
																			                 $ArrayInstanceInfraToolsCorporation,
																			                 $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function DepartmentLoadData()
	{
		if($this->InstanceDepartment != NULL)
		{
			$this->InputValueCorporationName     = $this->InstanceDepartment->GetDepartmentCorporationName();
			$this->InputValueDepartmentInitials  = $this->InstanceDepartment->GetDepartmentInitials();
			$this->InputValueDepartmentName      = $this->InstanceDepartment->GetDepartmentName();
			$this->InputValueRegisterDate        = $this->InstanceDepartment->GetRegisterDate();
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::ERROR;
	}
	
	protected function DepartmentSelectByDepartmentName($DepartmentName)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueDepartmentName = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_DEPARTMENT_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[0]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $arrayOptions);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->DepartmentSelectByDepartmentName($this->InputValueDepartmentName, 
																		             $this->ArrayInstanceDepartment, 
																		             $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
				return $return;
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_NOT_FOUND', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueCorporationName = $CorporationName;
		$this->InputValueDepartmentName = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_CORPORATION_SELECT
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_SELECT;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = TRUE;
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
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
												$matrixConstants);
		
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->DepartmentSelectByDepartmentNameAndCorporationName(
				                                                                     $this->InputValueCorporationName, 
																				     $this->InputValueDepartmentName,
																		             $this->InstanceDepartment, 
																		             $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, $this->InstanceDepartment);
				return $return;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_NOT_FOUND', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail, $Limit1, $Limit2, 
			                                                &$ArrayInstanceInfraToolsCorporation, 
	                                                        &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $UserCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail, $Limit1, $Limit2,
																				   $ArrayInstanceInfraToolsCorporation,
																				   $RowCount, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
	}
	
	protected function DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, &$ArrayInstanceInfraToolsDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $UserCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail,
																				   $ArrayInstanceInfraToolsDepartment,
																				   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
	}
	
	protected function MessageSelectByUserEmail($Email)
	{
		if($Email != NULL)
		{
			$return = $this->InstanceInfraToolsFacedePersistence->MessageSelectByUserEmail($this->InputValueLoginEmail, 
																			               $userInfraTools, 
																						   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
					
			}
			else return ConfigInfraTools::ERROR;
		}
	}
	
	protected function PageFormLoad()
	{
		$arrayPageForm = array();
		if($this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber) 
		                                               == ConfigInfraTools::SUCCESS)
		{
			if($this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm) 
			                                               == ConfigInfraTools::SUCCESS)
			{
				if(isset($arrayPageForm[$pageFormNumber-1]))
				{
					$_POST = $arrayPageForm[$pageFormNumber-1];
					array_pop($arrayPageForm);
					$pageFormNumber--;
				}
				$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber);
				$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm);
			}
		}
	}
	
	protected function PageFormRemoveLast()
	{
		$arrayPageForm = array();
		if($this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber) 
		                                               == ConfigInfraTools::SUCCESS)
		{
			if($this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm) 
			                                               == ConfigInfraTools::SUCCESS)
			{
				if(isset($arrayPageForm[$pageFormNumber-1]))
				{
					array_pop($arrayPageForm);
					$pageFormNumber--;
				}
				$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber);
				$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm);
			}
		}
	}
	
	protected function PageFormSave()
	{
		$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber);
		if(isset($pageFormNumber)) 
			$pageFormNumber++;
		else $pageFormNumber = 0;
		$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm);
		if(isset($arrayPageForm)) 
			array_push($arrayPageForm, $_POST);
		else 
		{	
			$arrayPageForm = array();
			array_push($arrayPageForm, $_POST);
		}
 		$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm);
		$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber);
	}
	
	protected function ServiceDeleteById($ServiceId, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $ServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 3; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceDeleteById($ServiceId, $UserEmail, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $ServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 3; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR_FOREIGN_KEY', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
									 $ServiceDepartment, $ServiceDepartmentCanChange,
									 $ServiceDescription, $ServiceName, $ServiceType, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $ServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION
		$arrayConstants = array();
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[1]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceCorporation; 
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
		$arrayElementsInput[2]        = $ServiceCorporationCanChange; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnServiceCorporationCanChangeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_CORPORATION_CAN_CHANGE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT
		$arrayConstants = array();
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[3]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[3]        = $ServiceDepartment; 
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
		$arrayElementsInput[4]        = $ServiceDepartmentCanChange; 
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
		$arrayElementsInput[5]        = $ServiceDescription; 
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
		$arrayElementsInput[6]        = $ServiceName; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 45; 
		$arrayElementsNullable[6]     = FALSE;
		$arrayElementsText[6]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_TYPE
		$arrayConstants = array();
		$arrayElements[7]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[7]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[7]        = $ServiceType; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 45; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
																  $ServiceDepartment, $ServiceDepartmentCanChange,
									                              $ServiceDescription, $ServiceName, $ServiceType, 
																  $UserEmail,
																  $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_INSERT_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_INSERT_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceLoadData()
	{
		if($this->InstanceInfraToolsService != NULL)
		{
			$this->InputValueRegisterDate       = $this->InstanceInfraToolsService->GetRegisterDate();
			$this->InputValueServiceActive      = $this->InstanceInfraToolsService->GetServiceActive();
			$this->InputValueServiceCorporation = $this->InstanceInfraToolsService->GetServiceCorporation();
			$this->InputValueServiceDepartment  = $this->InstanceInfraToolsService->GetServiceDepartment();
			$this->InputValueServiceDescription = $this->InstanceInfraToolsService->GetServiceDescription();
			$this->InputValueServiceId          = $this->InstanceInfraToolsService->GetServiceId();
			$this->InputValueServiceName        = $this->InstanceInfraToolsService->GetServiceName();
			$this->InputValueServiceType        = $this->InstanceInfraToolsService->GetServiceTypeName();
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
		else return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		return $return = $FacedePersistenceInfraTools->ServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolService, 
																	 $RowCount, $Debug);
	}
	
	protected function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                      &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		return $return = $FacedePersistenceInfraTools->ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2,
																				  $ArrayInstanceInfraToolService, 
																	              $RowCount, $Debug);
	}
	
	protected function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                        &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $ServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2,
																				 $ArrayInstanceInfraToolService,
																				 $RowCount, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolService, 
			                                               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $ServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActiveNoLimit($ServiceActive,
																				        $ArrayInstanceInfraToolService,
																				        $RowCount, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	protected function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2,
															     &$ArrayInstanceInfraToolService, 
															     &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $ServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail,
																							  $Limit1, $Limit2,
																				              $ArrayInstanceInfraToolService,
																				              $RowCount, 
																							  $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	protected function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                            &$ArrayInstanceInfraToolService, 
			                                                            &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $ServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
																				                     $ArrayInstanceInfraToolService,
																				                     $RowCount, 
																									 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	protected function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2,
			                                             &$ArrayInstanceInfraToolService, 
														 &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActive($ServiceCorporation, $Limit1, $Limit2,
																				 $ArrayInstanceInfraToolService,
																				 $RowCount, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolService, 
															    &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceCorporationNoLimit($ServiceCorporation,
																				             $ArrayInstanceInfraToolService,
																				             $RowCount, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail, 
																	  $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
																	  &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail,
																							       $Limit1, $Limit2,
																				                   $ArrayInstanceInfraToolService,
																				                   $RowCount, 
																							       $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		   &$ArrayInstanceInfraToolService, 
																		   &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation,
																								   $UserEmail,
																				                   $ArrayInstanceInfraToolService,
																				                   $RowCount, 
																							       $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2,
														&$ArrayInstanceInfraToolService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceDepartment($ServiceCorporation, 
																					 $ServiceDepartment,  
																					 $Limit1, $Limit2,
																				     $ArrayInstanceInfraToolService,
																				     $RowCount, 
																					 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
															   &$ArrayInstanceInfraToolService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, 
																							$ServiceDepartment,
																				            $ArrayInstanceInfraToolService,
																					        $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																     $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
																     &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation,
																								  $ServiceDepartment, $UserEmail,
																							      $Limit1, $Limit2,
																				                  $ArrayInstanceInfraToolService,
																								  $RowCount,
																					              $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																		    &$ArrayInstanceInfraToolService, 
																		    $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation,
				                                                                                  $ServiceDepartment,
																								  $UserEmail,
																				                  $ArrayInstanceInfraToolService,
																					              $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $ServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceId($ServiceId, $InstanceInfraToolsService,
																			 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ID_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ID_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
															 &$TypeAssocUserServiceId, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $ServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail,
																						  $InstanceInfraToolsService,
																						  $TypeAssocUserServiceId,
																						  $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ID_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ID_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
												  &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $ServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceName($ServiceName,  
																			   $Limit1, $Limit2,
																			   $ArrayInstanceInfraToolService,
																			   $RowCount, 
																			   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $ServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceNameNoLimit($ServiceName,
																			   $ArrayInstanceInfraToolService,
																			   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
															   $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
															   &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $ServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
																							$Limit1, $Limit2,
																			                $ArrayInstanceInfraToolService,
																							$RowCount,
																			                $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																      &$ArrayInstanceInfraToolService, 
																      $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $ServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail,
																			                $ArrayInstanceInfraToolService,
																			                $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
												  &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $ServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2,
											     							   $ArrayInstanceInfraToolService, $RowCount,
																			   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $ServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceTypeNoLimit($ServiceType,
											     							          $ArrayInstanceInfraToolService,
																			          $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, $Limit1, $Limit2, 
															   &$ArrayInstanceInfraToolService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $ServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail,
																					        $Limit1, $Limit2,
											     							                $ArrayInstanceInfraToolService,
																					        $RowCount,
																			                $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																     &$ArrayInstanceInfraToolService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $ServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
											     							                $ArrayInstanceInfraToolService,
																			                $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                               &$ArrayInstanceInfraToolService, 
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
		$arrayElementsInput[0]        = $TypeAssocUserService; 
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                                                            $ArrayInstanceInfraToolService, 
			                                                                            $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                      &$ArrayInstanceInfraToolService, 
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
		$arrayElementsInput[0]        = $TypeAssocUserService; 
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByTypeAssocUserServiceNoLimit(
				                                                                        $TypeAssocUserService, 
			                                                                            $ArrayInstanceInfraToolService, 
			                                                                            $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
			                                                            $UserEmail, $Limit1, $Limit2, 
			                                                            &$ArrayInstanceInfraToolService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $TypeAssocUserService; 
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByTypeAssocUserServiceOnUserContext(
				                                                                        $TypeAssocUserService,
				                                                                        $UserEmail,
				                                                                        $Limit1, $Limit2, 
			                                                                            $ArrayInstanceInfraToolService, 
			                                                                            $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
			                                                                   $UserEmail,
			                                                                   &$ArrayInstanceInfraToolService, 
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
		$arrayElementsInput[0]        = $TypeAssocUserService; 
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByTypeAssocUserServiceNoLimit(
				                                                                        $TypeAssocUserService, 
			                                                                            $ArrayInstanceInfraToolService, 
			                                                                            $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $UserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByUser($UserEmail, $Limit1, $Limit2,
											     						$ArrayInstanceInfraToolService,
																		$RowCount,
																		$this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_USER_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_USER_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $UserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByUserNoLimit($UserEmail,
											     						       $ArrayInstanceInfraToolService,
																		       $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_USER_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_USER_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectNoLimit(&$ArrayInstanceInfraToolService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();

		$return = $FacedePersistenceInfraTools->ServiceSelectNoLimit($ArrayInstanceInfraToolService,
																	 $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
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
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
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
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
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
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
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
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
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
		
		//SERVICE_TYPE
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
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->ServiceUpdateByServiceId($ServiceActiveNew, 
																			 $ServiceCoporationNew,
																			 $ServiceCorporationCanChangeNew,
																			 $ServiceDepartmentNew,
																			 $ServiceDepartmentCanChangeNew,
	  										                                 $ServiceDescriptionNew, 
																			 $ServiceNameNew, 
																			 $ServiceTypeNew, 
																			 $ServiceId,
															                 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('SERVICE_UPDATE_BY_ID_SUCCESS', 
																				$this->Language);
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return ConfigInfraTools::WARNING;
			}
			else
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('SERVICE_UPDATE_BY_ID_ERROR', 
																				$this->Language);
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}	
	}
	
	protected function ServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, $ServiceNameNew, 
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
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = FALSE;
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
		
		//SERVICE_TYPE
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
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->ServiceUpdateRestrictByServiceId($ServiceActiveNew, 
	  										                                         $ServiceDescriptionNew, 
																			         $ServiceNameNew, 
																			         $ServiceTypeNew, 
																			         $ServiceId,
															                         $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('SERVICE_UPDATE_RESTRICT_BY_ID_SUCCESS', 
																				$this->Language);
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return ConfigInfraTools::WARNING;
			}
			else
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('SERVICE_UPDATE_RESTRICTBY_ID_ERROR', 
																				$this->Language);
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}	
	}
	
	protected function TeamLoadData()
	{
		if($this->InstanceTeam != NULL)
		{
			$this->InputValueTeamId           = $this->InstanceTeam->GetTeamId();
			$this->InputValueTeamDescription  = $this->InstanceTeam->GetTeamDescription();
			$this->InputValueTeamName         = $this->InstanceTeam->GetTeamName();
			$this->InputValueRegisterDate     = $this->InstanceTeam->GetRegisterDate();
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::ERROR;
	}
	
	protected function TicketLoadData()
	{
		if($this->Ticket != NULL)
		{
			$this->InputValueId                = $this->Ticket->GetTicketId();
			$this->InputValueRegisterDate      = $this->Ticket->GetRegisterDate();
			$this->InputValueServiceName       = $this->Ticket->GetTicketServiceName();
			$this->InputValueStatusName        = $this->Ticket->GetTicketStatusName();
			$this->InputValueSuggestion        = $this->Ticket->GetTicketSuggestion();
			$this->InputValueTicketDescription = $this->Ticket->GetTicketDescription();
			$this->InputValueTitle             = $this->Ticket->GetTicketTitle();
			$this->InputValueType              = $this->Ticket->GetTicketTypeName();
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::ERROR;
	}
	
	protected function TypeAssocUserServiceSelect(&$ArrayInstanceInfraToolsTypeService, &$RowCount,
			                                       $Limit1, $Limit2, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeAssocUserServiceSelect($ArrayInstanceInfraToolsTypeAssocUserService,
																			$Limit1, $Limit2, $RowCount,
																			$this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_SERVICE_SELECT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeAssocUserServiceSelectNoLimit($ArrayInstanceInfraToolsTypeAssocUserService,
																			      $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_SERVICE_SELECT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeAssocUserServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeAssocUserService, $UserEmail, &$RowCount,
			                                                   $Limit1, $Limit2, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeAssocUserServiceSelectOnUserContext($ArrayInstanceInfraToolsTypeAssocUserService, $UserEmail,
																			            $Limit1, $Limit2, $RowCount,
																			            $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant(
				                               'TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS', 
											   $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant(
				                               'TYPE_ASSOC_USER_SERVICE_SELECT_ERROR', 
											   $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, $UserEmail, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeAssocUserServiceSelectOnUserContextNoLimit(
			                                                                   $ArrayInstanceInfraToolsTypeAssocUserService, 
																			   $UserEmail,
																			   $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant(
				                               'TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS', 
											   $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant(
				                               'TYPE_ASSOC_USER_SERVICE_SELECT_ERROR', 
											   $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeAssocUserTeamLoadData()
	{
		if($this->TypeAssocUserTeam != NULL)
		{
			$this->InputValueTypeAssocUserTeamTeamDescription  = $this->TypeAssocUserTeam->GetTypeAssocUserTeamTeamDescription();
			$this->InputValueTypeAssocUserTeamTeamId           = $this->TypeAssocUserTeam->GetTypeAssocUserTeamTeamId();
			$this->InputValueRegisterDate                      = $this->TypeAssocUserTeam->GetRegisterDate();
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::ERROR;
	}
	
	protected function TypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, 
			                             &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelect($Limit1, $Limit2,
																  $ArrayInstanceInfraToolsTypeService,
																  $RowCount, $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelectNoLimit($ArrayInstanceInfraToolsTypeService,
																	     $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
													  &$ArrayInstanceInfraToolsTypeService, 
			                                          $RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
			                                                                   $ArrayInstanceInfraToolsTypeService,
																			   $RowCount,
																			   $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelectOnUserContextNoLimit($UserEmail,
			                                                                          $ArrayInstanceInfraToolsTypeService,
																					  $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeStatusTicketLoadData()
	{
		if($this->TypeStatusTicket != NULL)
		{
			$this->InputValueTypeStatusTicketDescription  = $this->TypeStatusTicket->GetTypeStatusTicketDescription();
			$this->InputValueTypeStatusTicketId           = $this->TypeStatusTicket->GetTypeStatusTicketId();
			$this->InputValueRegisterDate                 = $this->TypeStatusTicket->GetRegisterDate();
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::ERROR;
	}
	
	protected function TypeTicketLoadData()
	{
		if($this->TypeTicket != NULL)
		{
			$this->InputValueTypeTicketDescription  = $this->TypeTicket->GetTypeTicketDescription();
			$this->InputValueTypeTicketId           = $this->TypeTicket->GetTypeTicketId();
			$this->InputValueRegisterDate           = $this->TypeTicket->GetRegisterDate();
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::ERROR;
	}
	
	protected function TypeTicketSelectById($TypeTicketId)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeTicketId = $TypeTicketId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_TICKET_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_TICKET_ID;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeTicketId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 3; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeTicketIdText;
		array_push($arrayConstants, 'FORM_INVALID_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
												$matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->TypeTicketSelectById($this->InputValueTypeTicketId, 
																	     $this->InstanceInfraToolsTypeTicket,
																		 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket);
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnIdText = $this->InstanceLanguageText->GetConstant('TYPE_TICKET_NOT_FOUND', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::FORM_TYPE_USER_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function TypeUserLoadData()
	{
		if($this->InstanceInfraToolsTypeUser != NULL)
		{
			$this->InputValueTypeUserDescription  = $this->InstanceInfraToolsTypeUser->GetTypeUserDescription();
			$this->InputValueTypeUserId           = $this->InstanceInfraToolsTypeUser->GetTypeUserId();
			$this->InputValueRegisterDate         = $this->InstanceInfraToolsTypeUser->GetRegisterDate();
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::ERROR;
	}
	
	protected function TypeUserSelectByDescription($TypeUserDescription)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeUserDescription = $TypeUserDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_TYPE_USER_LIST_SELECT
		$arrayElements[0]             = ConfigInfraTools::FORM_TYPE_USER_LIST_SELECT;
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
												$matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->TypeUserSelectByDescription($this->InputValueTypeUserDescription, 
																			    $this->InstanceInfraToolsTypeUser,
																			    $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceInfraToolsTypeUser);
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnTypeUserDescriptionText = $this->InstanceLanguageText->GetConstant('TYPE_USER_NOT_FOUND', 
																								$this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::FORM_TYPE_USER_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function TypeUserSelectUsers($Limit1, $Limit2, &$RowCount)
	{
		if($this->InstanceInfraToolsTypeUser != NULL)
		{
			$this->ArrayInstanceInfraToolsTypeUserUsers = NULL;
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->UserInfraToolsSelectByTypeUser(
				$this->InstanceInfraToolsTypeUser->GetTypeUserId(),
				$Limit1, $Limit2,
				$this->ArrayInstanceInfraToolsTypeUserUsers, $RowCount, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
				return ConfigInfraTools::SUCCESS;
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_SELECT_USERS_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
	}
	
	protected function UserChangeTwoStepVerification($InstanceUserInfraTools, $TwoStepVerification)
	{
		if($InstanceUserInfraTools == NULL)
			$InstanceUserInfraTools = $this->InstanceInfraToolsUser;
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $FacedePersistenceInfraTools->UserUpdateTwoStepVerificationByEmail(
																				   $InstanceUserInfraTools->GetEmail(), 
																				   $TwoStepVerification, 
																				   $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InstanceUserInfraTools->SetTwoStepVerification($TwoStepVerification);
			$this->InputValueTwoStepVerification = $InstanceUserInfraTools->GetTwoStepVerification();
			$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																			 'USER_TWO_STEP_VERIFICATION_CHANGE_SUCCESS', 
																			  $this->Language);
		}
		elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
		{
			$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
		}
		else
		{
			$this->ReturnPasswordText = $this->InstanceLanguageText->
										   GetConstant('USER_TWO_STEP_VERIFICATION_CHANGE_ERROR', 
																				  $this->Language);
			$this->ReturnPasswordClass = ConfigInfraTools::FORM_FIELD_ERROR;
			$this->ReturnClass         = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}
	}
	
	protected function UserInfraToolsSelectByEmail($Email)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueUserEmail = $Email;
		if($Email != $this->InstanceInfraToolsUser->GetEmail())
		{
			$return = $FacedePersistenceInfraTools->UserInfraToolsSelectByEmail($this->InputValueUserEmail, 
																			    $this->InstanceInfraToolsUserAdmin, 
																			    $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $FacedePersistenceInfraTools->UserSelectTeamByUserEmail($this->InstanceInfraToolsUserAdmin,
																				 $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS || $return == ConfigInfraTools::MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_EMPTY)
				{
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
					return ConfigInfraTools::SUCCESS;	
				}
				else
				{
					$this->ReturnEmailText = $this->InstanceLanguageText->GetConstant('USER_TEAM_SELECT_ERROR', $this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
					return ConfigInfraTools::FORM_USER_RETURN_NOT_FOUND;
				}
			}
			else
			{
				$this->ReturnEmailText = $this->InstanceLanguageText->GetConstant('USER_NOT_FOUND', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::FORM_USER_RETURN_NOT_FOUND;
			}
		}
		else 
		{
			$this->ReturnEmailText = $this->InstanceLanguageText->GetConstant('USER_SAME_AS_ADMIN', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_USER_RETURN_NOT_FOUND;
		}
	}
	
	protected function UserLoadData()
	{
		if($this->InstanceInfraToolsUserAdmin != NULL)
		{
			$this->InputValueAssocUserCorporationRegistrationDate = 
				$this->InstanceInfraToolsUserAdmin->GetAssocUserCorporationUserRegistrationDate();
			$this->InputValueAssocUserCorporationRegistrationId = 
				$this->InstanceInfraToolsUserAdmin->GetAssocUserCorporationUserRegistrationId();
			$this->InputValueBirthDateDay             = $this->InstanceInfraToolsUserAdmin->GetBirthDateDay();
			$this->InputValueBirthDateMonth           = $this->InstanceInfraToolsUserAdmin->GetBirthDateMonth();
			$this->InputValueBirthDateYear            = $this->InstanceInfraToolsUserAdmin->GetBirthDateYear();
			$this->InputValueUserCorporationName      = $this->InstanceInfraToolsUserAdmin->GetCorporationName();
			$this->InputValueCountry                  = $this->InstanceInfraToolsUserAdmin->GetCountry();
			if($this->InstanceInfraToolsUserAdmin->GetDepartmentInitials() != NULL)
				$this->InputValueDepartmentName       = $this->InstanceInfraToolsUserAdmin->GetDepartmentInitials() 
				                                          . " - " . $this->InstanceInfraToolsUserAdmin->GetDepartmentName();
			elseif($this->InstanceInfraToolsUserAdmin->GetDepartmentName() != NULL)
				$this->InputValueDepartmentName       = $this->InstanceInfraToolsUserAdmin->GetDepartmentName();
			else $this->InputValueDepartmentName = NULL;
			$this->InputValueGender                   = $this->InstanceInfraToolsUserAdmin->GetGender();
			$this->InputValueUserName                 = $this->InstanceInfraToolsUserAdmin->GetName();
			$this->InputValueUserEmail                = $this->InstanceInfraToolsUserAdmin->GetEmail();
			$this->InputValueUserPhonePrimary         = $this->InstanceInfraToolsUserAdmin->GetUserPhonePrimary();
			$this->InputValueUserPhonePrimaryPrefix   = $this->InstanceInfraToolsUserAdmin->GetUserPhonePrimaryPrefix();
			$this->InputValueUserPhoneSecondary       = $this->InstanceInfraToolsUserAdmin->GetUserPhoneSecondary();
			$this->InputValueUserPhoneSecondaryPrefix = $this->InstanceInfraToolsUserAdmin->GetUserPhoneSecondaryPrefix();
			$this->InputValueRegion                   = $this->InstanceInfraToolsUserAdmin->GetRegion();
			$this->InputValueRegisterDate             = $this->InstanceInfraToolsUserAdmin->GetRegisterDate();
			$this->InputValueRegistrationDate         = 
				$this->InstanceInfraToolsUserAdmin->GetAssocUserCorporationUserRegistrationDate();
			$this->InputValueRegistrationDateDay      = 
				$this->InstanceInfraToolsUserAdmin->GetAssocUserCorporationUserRegistrationDateDay();
			$this->InputValueRegistrationDateMonth    = 
				$this->InstanceInfraToolsUserAdmin->GetAssocUserCorporationUserRegistrationDateMonth();
			$this->InputValueRegistrationDateYear     = 
				$this->InstanceInfraToolsUserAdmin->GetAssocUserCorporationUserRegistrationDateYear();
			$this->InputValueRegistrationId           = 
				$this->InstanceInfraToolsUserAdmin->GetAssocUserCorporationUserRegistrationId();
			if($this->InstanceInfraToolsUserAdmin->GetArrayAssocUserTeam() != NULL)
			{
				foreach ($this->InstanceInfraToolsUser->GetArrayAssocUserTeam() as $index=>$assocUserTeam)
				{
					if($index == 0)
						$this->InputValueUserTeam = $assocUserTeam->GetTeamName();
					else $this->InputValueUserTeam .= ", " . $assocUserTeam->GetTeamName();
				}
			}
			$this->InputValueUserUniqueId             = $this->InstanceInfraToolsUserAdmin->GetUserUniqueId();
			if($this->InstanceInfraToolsUserAdmin->GetSessionExpires())
				$this->InputValueSessionExpires = "checked";
			if($this->InstanceInfraToolsUserAdmin->GetTwoStepVerification())
				$this->InputValueTwoStepVerification = "checked";
			if($this->InstanceInfraToolsUserAdmin->GetUserActive())
				$this->InputValueUserActive = "checked";
			if($this->InstanceInfraToolsUserAdmin->GetUserConfirmed())
				$this->InputValueUserConfirmed = "checked";
			$this->InputValueTypeUserDescription = $this->InstanceInfraToolsUserAdmin->GetUserTypeDescription();
			$this->InputValueTypeUserId = $this->InstanceInfraToolsUserAdmin->GetUserTypeId();
			
			if($this->InstanceInfraToolsUserAdmin->CheckAssocUserCorporationRegistrationDateActive())
				$this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($this->InstanceInfraToolsUserAdmin->CheckAssocUserCorporationRegistrationIdActive())
				$this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($this->InstanceInfraToolsUserAdmin->CheckCorporationActive())
				$this->InputValueCorporationActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueCorporationActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($this->InstanceInfraToolsUserAdmin->CheckDepartmentExists())
				$this->InputValueDepartmentActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueDepartmentActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($this->InputValueUserUniqueId != NULL)
				$this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage .
				                                   'Icons/IconInfraToolsNotVerified.png';
		}
	}
	
	protected function UserRegister($SendEmail, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserName           = $_POST[ConfigInfraTools::FORM_FIELD_USER_NAME];
		$this->InputValueUserEmail          = $_POST[ConfigInfraTools::FORM_FIELD_EMAIL];
		if (isset($_POST[ConfigInfraTools::REGISTER_BIRTH_DATE_DAY]))
			$this->InputValueBirthDateDay = $_POST[ConfigInfraTools::REGISTER_BIRTH_DATE_DAY];
		if (isset($_POST[ConfigInfraTools::REGISTER_BIRTH_DATE_MONTH]))
			$this->InputValueBirthDateMonth = $_POST[ConfigInfraTools::REGISTER_BIRTH_DATE_MONTH];
		if (isset($_POST[ConfigInfraTools::REGISTER_BIRTH_DATE_YEAR]))
			$this->InputValueBirthDateYear = $_POST[ConfigInfraTools::REGISTER_BIRTH_DATE_YEAR];
		if (isset($_POST[ConfigInfraTools::FORM_FIELD_USER_GENDER]))
			$this->InputValueGender               = $_POST[ConfigInfraTools::FORM_FIELD_USER_GENDER];
		$this->InputValueUserPhonePrimary         = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY];
		$this->InputValueUserPhonePrimaryPrefix   = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX];
		$this->InputValueUserPhoneSecondary       = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY];
		$this->InputValueUserPhoneSecondaryPrefix = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX];
		$this->InputValueCountry                  = $_POST[ConfigInfraTools::FORM_GOOGLE_MAPS_COUNTRY_HIDDEN];
		$this->InputValueRegion                   = $_POST[ConfigInfraTools::FORM_GOOGLE_MAPS_REGION_HIDDEN];
		$this->InputValueNewPassword              = $_POST[ConfigInfraTools::FORM_FIELD_NEW_PASSWORD];
		$this->InputValueRepeatPassword           = $_POST[ConfigInfraTools::REGISTER_REPEAT_PASSWORD];
		if(isset($_POST[ConfigInfraTools::REGISTER_SESSION_EXPIRES]))
			$this->InputValueSessionExpires = TRUE;
		else $this->InputValueSessionExpires = FALSE;
		if(isset($_POST[ConfigInfraTools::REGISTER_TWO_STEP_VERIFICATION]))
			$this->InputValueTwoStepVerification = TRUE;
		else $this->InputValueTwoStepVerification = FALSE;
		if(isset($_POST[ConfigInfraTools::REGISTER_USER_ACTIVE]))
			$this->InputValueUserActive = TRUE;
		else $this->InputValueUserActive = FALSE;
		if(isset($_POST[ConfigInfraTools::REGISTER_USER_CONFIRMED]))
			$this->InputValueUserConfirmed = TRUE;
		else $this->InputValueUserConfirmed = FALSE;
		if ($SessionExpires == NULL)
			$SessionExpires = $this->InputValueSessionExpires;
		if($TwoStepVerification == NULL)
			$TwoStepVerification = $this->InputValueTwoStepVerification;
		if($UserActive == NULL)
			$UserActive = $this->InputValueUserActive;
		if($UserConfirmed == NULL)
			$UserConfirmed = $this->InputValueUserConfirmed;
		$this->InputValueUserUniqueId = explode("@", $this->InputValueUserEmail)[0];
		$FormValidator      = $this->Factory->CreateFormValidator();
		$arrayConstants = array(); $matrixConstants = array(); $arrayOptions = array();
		
		//FORM_FIELD_USER_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_USER_NAME;
		$arrayElementsClass[0]        = &$this->ReturnUserNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NAME;
		$arrayElementsInput[0]        = $this->InputValueUserName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserNameText;
		array_push($arrayConstants, 'FORM_INVALID_USER_NAME', 'FORM_INVALID_USER_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_EMAIL
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[1]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[1]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 60; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_UNIQUE_ID
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_USER_UNIQUE_ID;
		$arrayElementsClass[2]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
		$arrayElementsInput[2]        = $this->InputValueUserUniqueId; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 25; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnUserUniqueIdText;
		array_push($arrayConstants, 'FORM_INVALID_USER_UNIQUE_ID', 'FORM_INVALID_USER_UNIQUE_ID_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_PRIMARY_PREFIX
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX;
		$arrayElementsClass[3]        = &$this->ReturnUserPhonePrimaryPrefixClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[3]        = $this->InputValueUserPhonePrimaryPrefix; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 3; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnUserPhonePrimaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY', 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_PRIMARY
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY;
		$arrayElementsClass[4]        = &$this->ReturnUserPhonePrimaryClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[4]        = $this->InputValueUserPhonePrimary; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 9; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnUserPhonePrimaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PRIMARY', 'FORM_INVALID_USER_PHONE_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_SECONDARY_PREFIX
		$arrayElements[5]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX;
		$arrayElementsClass[5]        = &$this->ReturnUserPhoneSecondaryPrefixClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[5]        = $this->InputValueUserPhoneSecondaryPrefix; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 3; 
		$arrayElementsNullable[5]     = TRUE;
		$arrayElementsText[5]         = &$this->ReturnUserPhoneSecondaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY', 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_SECONDARY
		$arrayElements[6]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY;
		$arrayElementsClass[6]        = &$this->ReturnUserPhoneSecondaryClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[6]        = $this->InputValueUserPhoneSecondary; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 9; 
		$arrayElementsNullable[6]     = TRUE;
		$arrayElementsText[6]         = &$this->ReturnUserPhoneSecondaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_SECONDARY', 'FORM_INVALID_USER_PHONE_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_BIRTH_DATE_DAY
		$arrayElements[7]             = ConfigInfraTools::FORM_FIELD_BIRTH_DATE_DAY;
		$arrayElementsClass[7]        = &$this->ReturnBirthDateDayClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[7]        = $this->InputValueBirthDateDay; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 0; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnBirthDateDayText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_BIRTH_DATE_MONTH
		$arrayElements[8]             = ConfigInfraTools::FORM_FIELD_BIRTH_DATE_MONTH;
		$arrayElementsClass[8]        = &$this->ReturnBirthDateMonthClass;
		$arrayElementsDefaultValue[8] = ""; 
		$arrayElementsForm[8]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[8]        = $this->InputValueBirthDateMonth; 
		$arrayElementsMinValue[8]     = 0; 
		$arrayElementsMaxValue[8]     = 0; 
		$arrayElementsNullable[8]     = FALSE;
		$arrayElementsText[8]         = &$this->ReturnBirthDateMonthText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_BIRTH_DATE_YEAR
		$arrayElements[9]             = ConfigInfraTools::FORM_FIELD_BIRTH_DATE_YEAR;
		$arrayElementsClass[9]        = &$this->ReturnBirthDateYearClass;
		$arrayElementsDefaultValue[9] = ""; 
		$arrayElementsForm[9]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[9]        = $this->InputValueBirthDateYear; 
		$arrayElementsMinValue[9]     = 0; 
		$arrayElementsMaxValue[9]     = 0; 
		$arrayElementsNullable[9]     = FALSE;
		$arrayElementsText[9]         = &$this->ReturnBirthDateYearText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_GENDER
		$arrayElements[10]             = ConfigInfraTools::FORM_FIELD_USER_GENDER;
		$arrayElementsClass[10]        = &$this->ReturnGenderClass;
		$arrayElementsDefaultValue[10] = ""; 
		$arrayElementsForm[10]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_GENDER;
		$arrayElementsInput[10]        = $this->InputValueGender; 
		$arrayElementsMinValue[10]     = 0; 
		$arrayElementsMaxValue[10]     = 0; 
		$arrayElementsNullable[10]     = FALSE;
		$arrayElementsText[10]         = &$this->ReturnGenderText;
		array_push($arrayConstants, 'FORM_INVALID_USER_GENDER', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_GOOGLE_MAPS_COUNTRY
		$arrayElements[11]             = ConfigInfraTools::FORM_GOOGLE_MAPS_COUNTRY;
		$arrayElementsClass[11]        = &$this->ReturnCountryClass;
		$arrayElementsDefaultValue[11] = ""; 
		$arrayElementsForm[11]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE;
		$arrayElementsInput[11]        = $this->InputValueCountry; 
		$arrayElementsMinValue[11]     = 0; 
		$arrayElementsMaxValue[11]     = 45; 
		$arrayElementsNullable[11]     = FALSE;
		$arrayElementsText[11]         = &$this->ReturnCountryText;
		array_push($arrayConstants, 'FORM_INVALID_COUNTRY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_GOOGLE_MAPS_REGION
		$arrayElements[12]             = ConfigInfraTools::FORM_GOOGLE_MAPS_REGION;
		$arrayElementsClass[12]        = &$this->ReturnRegionClass;
		$arrayElementsDefaultValue[12] = ""; 
		$arrayElementsForm[12]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NOT_NUMBER;
		$arrayElementsInput[12]        = $this->InputValueRegion; 
		$arrayElementsMinValue[12]     = 0; 
		$arrayElementsMaxValue[12]     = 45; 
		$arrayElementsNullable[12]     = TRUE;
		$arrayElementsText[12]         = &$this->ReturnRegionText;
		array_push($arrayConstants, 'FORM_INVALID_USER_REGION', 'FORM_INVALID_USER_REGION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_NEW_PASSWORD
		$arrayElements[13]             = ConfigInfraTools::FORM_FIELD_NEW_PASSWORD;
		$arrayElementsClass[13]        = &$this->ReturnPasswordClass;
		$arrayElementsDefaultValue[13] = ""; 
		$arrayElementsForm[13]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_PASSWORD;
		$arrayElementsInput[13]        = $this->InputValueNewPassword; 
		$arrayElementsMinValue[13]     = 8; 
		$arrayElementsMaxValue[13]     = 18; 
		$arrayElementsNullable[13]     = TRUE;
		$arrayElementsText[13]         = &$this->ReturnPasswordText;
		$arrayExtraField[13]           = &$this->InputValueRepeatPassword;
		array_push($arrayConstants, 'FORM_INVALID_USER_PASSWORD', 'FORM_INVALID_USER_PASSWORD_MATCH',
				                    'FORM_INVALID_USER_PASSWORD_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		if($this->ValidateCaptcha)
		{
			//VALIDA CAPTCHA
			$this->InputValueCaptcha       = $_POST[ConfigInfraTools::FORM_CAPTCHA_REGISTER];
			$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::FORM_CAPTCHA_REGISTER, $captcha);
			//FORM_CAPTCHA_REGISTER
			$arrayElements[14]             = ConfigInfraTools::FORM_CAPTCHA_REGISTER;
			$arrayElementsClass[14]        = &$this->ReturnCaptchaClass;
			$arrayElementsDefaultValue[14] = ""; 
			$arrayElementsForm[14]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_COMPARE_STRING;
			$arrayElementsInput[14]        = $this->InputValueCaptcha; 
			$arrayElementsMinValue[14]     = 0; 
			$arrayElementsMaxValue[14]     = 0; 
			$arrayElementsNullable[14]     = TRUE;
			$arrayElementsText[14]         = &$this->ReturnCaptchaText;
			array_push($arrayConstants, 'FORM_INVALID_CAPTCHA', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, $captcha);
		}
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $arrayOptions, $arrayExtraField);
		if($return == ConfigInfraTools::SUCCESS)
		{
			//CHECA SE E-MAIL JÁ É CADASTRADO
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->UserCheckEmail($this->InputValueUserEmail, $this->InputValueHeaderDebug);
			if($return != ConfigInfraTools::SUCCESS)
			{
				$birthDate = $this->InputValueBirthDateYear . "-" . $this->InputValueBirthDateMonth
							 . "-" . $this->InputValueBirthDateDay;
				$hashCode  = hash("sha512", $this->InputValueUserName . $this->InputValueUserEmail . 
								   $this->InputValueGender . $birthDate);
				$this->InputValueUserName = ucwords($this->InputValueUserName);
				if($this->ReturnUserUniqueIdText != "")
					$this->InputValueUserUniqueId = NULL;
				//CADASTRA USUARIO NO BANCO
				$return = $FacedePersistenceInfraTools->UserInsert($birthDate,
																   NULL,
																   $this->InputValueCountry,
																   $this->InputValueUserEmail, 
																   $this->InputValueGender,
																   $hashCode,
																   $this->InputValueUserName,
																   $this->InputValueNewPassword,
																   $this->InputValueRegion,
																   $SessionExpires,
																   $TwoStepVerification,
																   $UserActive,
																   $UserConfirmed,
																   $this->InputValueUserPhonePrimary, 
																   $this->InputValueUserPhonePrimaryPrefix, 
																   $this->InputValueUserPhoneSecondary, 
																   $this->InputValueUserPhoneSecondaryPrefix,
																   ConfigInfraTools::TYPE_USER_DEFAULT_ID,
																   $this->InputValueUserUniqueId,
																   $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					if($SendEmail)
					{
						Page::GetCurrentDomain($domain);
						$link = $domain . str_replace('Language/', '', $this->Language) . "/" . 
								str_replace("_", "",ConfigInfraTools::PAGE_REGISTER_CONFIRMATION) . "?=" . $hashCode;
						$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
							                                                                        ($this->InstanceLanguageText);
						$return = FALSE;
						$return = $this->InstanceInfraToolsFacedeBusiness->SendEmailRegister($this->InputValueUserName,
														                                     $this->InputValueUserEmail,
														                                     $link, 
																							 $this->InputValueHeaderDebug);
					}
					if($return == ConfigInfraTools::SUCCESS)
					{
						if($SendEmail)
							$this->ReturnText  = $this->InstanceLanguageText->GetConstant('REGISTER_SUCCESS', 
																			$this->Language);
						else
							$this->ReturnText  = $this->InstanceLanguageText->GetConstant('REGISTER_SUCCESS_NO_LINK', 
																			$this->Language);
						$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
						$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					}
					else
					{
						$this->ReturnText  = $this->InstanceLanguageText->GetConstant('REGISTER_EMAIL_ERROR', 
																		$this->Language);
						$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
						$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
						$FacedePersistenceInfraTools->UserDelete($this->InputValueUserEmail, $this->InputValueHeaderDebug);
					}
				}
				else
				{
					$this->ReturnText  = $this->InstanceLanguageText->GetConstant('REGISTER_INSERT_ERROR', 
																		$this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
			}
			else
			{
				$return = ConfigInfraTools::ERROR;
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('REGISTER_EMAIL_ALREADY_REGISTERED', 
																		 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		else
		{
			$return = ConfigInfraTools::ERROR;
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}
		return $return;
	}
	
	protected function UserUpdate($OnAdmin, $SelectedUser)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueBirthDateDay             = $_POST[ConfigInfraTools::FORM_FIELD_BIRTH_DATE_DAY];
		$this->InputValueBirthDateMonth           = $_POST[ConfigInfraTools::FORM_FIELD_BIRTH_DATE_MONTH];
		$this->InputValueBirthDateYear            = $_POST[ConfigInfraTools::FORM_FIELD_BIRTH_DATE_YEAR];
		$this->InputValueGender                   = $_POST[ConfigInfraTools::FORM_FIELD_GENDER];
		$this->InputValueCountry                  = $_POST[ConfigInfraTools::FORM_GOOGLE_MAPS_COUNTRY_HIDDEN];
		$this->InputValueRegion                   = $_POST[ConfigInfraTools::FORM_GOOGLE_MAPS_REGION_HIDDEN];
		$this->InputValueUserName                 = $_POST[ConfigInfraTools::ACCOUNT_UPDATE_NAME];
		$this->InputValueUserPhonePrimary         = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY];
		$this->InputValueUserPhonePrimaryPrefix   = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX];
		$this->InputValueUserPhoneSecondary       = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY];
		$this->InputValueUserPhoneSecondaryPrefix = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX];
		$this->InputValueUserUniqueId             = $_POST[ConfigInfraTools::FORM_FIELD_USER_UNIQUE_ID];
		if($OnAdmin)
		{
			if(isset($_POST[ConfigInfraTools::ACCOUNT_UPDATE_SESSION_EXPIRES]))
				$this->InputValueSessionExpires = TRUE;
			else $this->InputValueSessionExpires = FALSE;
			if(isset($_POST[ConfigInfraTools::REGISTER_USER_ACTIVE]))
				$this->InputValueUserActive = TRUE;
			else $this->InputValueUserActive = FALSE;
			if(isset($_POST[ConfigInfraTools::REGISTER_USER_CONFIRMED]))
				$this->InputValueUserConfirmed = TRUE;
			else $this->InputValueUserConfirmed = FALSE;
		}
		else
		{
			$this->InputValueSessionExpires = $SelectedUser->GetSessionExpires();
			$this->InputValueUserActive = $SelectedUser->GetUserActive();
			$this->InputValueUserConfirmed = $SelectedUser->GetUserConfirmed();
		}
		if(isset($_POST[ConfigInfraTools::REGISTER_TWO_STEP_VERIFICATION]))
				$this->InputValueTwoStepVerification = TRUE;
			else $this->InputValueTwoStepVerification = FALSE;
		
		$this->InputFocus = ConfigInfraTools::ACCOUNT_UPDATE_NAME;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_USER_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_USER_NAME;
		$arrayElementsClass[0]        = &$this->ReturnUserNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NAME;
		$arrayElementsInput[0]        = $this->InputValueUserName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserNameText;
		array_push($arrayConstants, 'FORM_INVALID_USER_NAME', 'FORM_INVALID_USER_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_UNIQUE_ID
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_USER_UNIQUE_ID;
		$arrayElementsClass[1]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
		$arrayElementsInput[1]        = $this->InputValueUserUniqueId; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 25; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnUserUniqueIdText;
		array_push($arrayConstants, 'FORM_INVALID_USER_UNIQUE_ID', 'FORM_INVALID_USER_UNIQUE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_PRIMARY_PREFIX
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX;
		$arrayElementsClass[2]        = &$this->ReturnUserPhonePrimaryPrefixClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[2]        = $this->InputValueUserPhonePrimaryPrefix; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 3; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnUserPhonePrimaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY', 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_PRIMARY
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY;
		$arrayElementsClass[3]        = &$this->ReturnUserPhonePrimaryClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[3]        = $this->InputValueUserPhonePrimary; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 9; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnUserPhonePrimaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PRIMARY', 'FORM_INVALID_USER_PHONE_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_SECONDARY_PREFIX
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX;
		$arrayElementsClass[4]        = &$this->ReturnUserPhoneSecondaryPrefixClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[4]        = $this->InputValueUserPhoneSecondaryPrefix; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 3; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnUserPhoneSecondaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY', 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_SECONDARY
		$arrayElements[5]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY;
		$arrayElementsClass[5]        = &$this->ReturnUserPhoneSecondaryClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[5]        = $this->InputValueUserPhoneSecondary; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 9; 
		$arrayElementsNullable[5]     = TRUE;
		$arrayElementsText[5]         = &$this->ReturnUserPhoneSecondaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_SECONDARY', 'FORM_INVALID_USER_PHONE_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_BIRTH_DATE_DAY
		$arrayElements[6]             = ConfigInfraTools::FORM_FIELD_BIRTH_DATE_DAY;
		$arrayElementsClass[6]        = &$this->ReturnBirthDateDayClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[6]        = $this->InputValueBirthDateDay; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 0; 
		$arrayElementsNullable[6]     = FALSE;
		$arrayElementsText[6]         = &$this->ReturnBirthDateDayText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_BIRTH_DATE_MONTH
		$arrayElements[7]             = ConfigInfraTools::FORM_FIELD_BIRTH_DATE_MONTH;
		$arrayElementsClass[7]        = &$this->ReturnBirthDateMonthClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[7]        = $this->InputValueBirthDateMonth; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 0; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnBirthDateMonthText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_BIRTH_DATE_YEAR
		$arrayElements[8]             = ConfigInfraTools::FORM_FIELD_BIRTH_DATE_YEAR;
		$arrayElementsClass[8]        = &$this->ReturnBirthDateYearClass;
		$arrayElementsDefaultValue[8] = ""; 
		$arrayElementsForm[8]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[8]        = $this->InputValueBirthDateYear; 
		$arrayElementsMinValue[8]     = 0; 
		$arrayElementsMaxValue[8]     = 0; 
		$arrayElementsNullable[8]     = FALSE;
		$arrayElementsText[8]         = &$this->ReturnBirthDateYearText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_GENDER
		$arrayElements[9]             = ConfigInfraTools::FORM_FIELD_USER_GENDER;
		$arrayElementsClass[9]        = &$this->ReturnGenderClass;
		$arrayElementsDefaultValue[9] = ""; 
		$arrayElementsForm[9]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_GENDER;
		$arrayElementsInput[9]        = $this->InputValueGender; 
		$arrayElementsMinValue[9]     = 0; 
		$arrayElementsMaxValue[9]     = 0; 
		$arrayElementsNullable[9]     = FALSE;
		$arrayElementsText[9]         = &$this->ReturnGenderText;
		array_push($arrayConstants, 'FORM_INVALID_USER_GENDER', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
							 
		//FORM_GOOGLE_MAPS_COUNTRY
		$arrayElements[10]             = ConfigInfraTools::FORM_GOOGLE_MAPS_COUNTRY;
		$arrayElementsClass[10]        = &$this->ReturnCountryClass;
		$arrayElementsDefaultValue[10] = ""; 
		$arrayElementsForm[10]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE;
		$arrayElementsInput[10]        = $this->InputValueCountry; 
		$arrayElementsMinValue[10]     = 0; 
		$arrayElementsMaxValue[10]     = 45; 
		$arrayElementsNullable[10]     = FALSE;
		$arrayElementsText[10]         = &$this->ReturnCountryText;
		array_push($arrayConstants, 'FORM_INVALID_COUNTRY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_GOOGLE_MAPS_REGION
		$arrayElements[11]             = ConfigInfraTools::FORM_GOOGLE_MAPS_REGION;
		$arrayElementsClass[11]        = &$this->ReturnRegionClass;
		$arrayElementsDefaultValue[11] = ""; 
		$arrayElementsForm[11]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NOT_NUMBER;
		$arrayElementsInput[11]        = $this->InputValueRegion; 
		$arrayElementsMinValue[11]     = 0; 
		$arrayElementsMaxValue[11]     = 45; 
		$arrayElementsNullable[11]     = TRUE;
		$arrayElementsText[11]         = &$this->ReturnRegionText;
		array_push($arrayConstants, 'FORM_INVALID_USER_REGION', 'FORM_INVALID_USER_REGION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $arrayOptions, $arrayExtraField);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$birthDate = $this->InputValueBirthDateYear . "-" . $this->InputValueBirthDateMonth . "-" 
			 . $this->InputValueBirthDateDay;
			$this->InputValueUserName = ucwords($this->InputValueUserName);
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->UserUpdateByEmail($birthDate,
																	  $this->InputValueCountry,
																	  $SelectedUser->GetEmail(),
																	  $this->InputValueGender,
																	  $this->InputValueUserName,
																	  $this->InputValueRegion,
																	  $this->InputValueSessionExpires,
																	  $this->InputValueTwoStepVerification,
																	  $this->InputValueUserActive,
																	  $this->InputValueUserConfirmed,
																	  $this->InputValueUserPhonePrimary,
																	  $this->InputValueUserPhonePrimaryPrefix,
																	  $this->InputValueUserPhoneSecondary,
																	  $this->InputValueUserPhoneSecondaryPrefix,
																	  $this->InputValueUserUniqueId,
																	  $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$SelectedUser->UpdateUser(NULL, NULL, NULL, $birthDate, NULL, $this->InputValueCountry, NULL, NULL,
										  $this->InputValueGender, NULL, NULL, $this->InputValueUserName, $this->InputValueRegion, 
										  NULL, $this->InputValueSessionExpires, $this->InputValueTwoStepVerification, 
										  $this->InputValueUserActive, 
										  $this->InputValueUserConfirmed, $this->InputValueUserPhonePrimary,
										  $this->InputValueUserPhonePrimaryPrefix, $this->InputValueUserPhoneSecondary,
										  $this->InputValueUserPhoneSecondaryPrefix, NULL, $this->InputValueUserUniqueId);
				$this->Page          = ConfigInfraTools::PAGE_ACCOUNT;
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_SUCCESS', $this->Language);
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);															  
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_ERROR_USER_UNIQUE_ID', 
																				$this->Language);
			}
			else
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ACCOUNT_UPDATE_ERROR', 
																					  $this->Language);
			}
			return $return;
		}
		else
		{
			$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			$this->SubmitEnabled = 'disabled="disabled"';
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function UserUpdateCorporationInformation($SelectedUser)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$registrationDate = NULL;
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_DAY]))
			$this->InputValueRegistrationDateDay   = $_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_DAY];
		else $this->InputValueRegistrationDateDay = NULL;
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_MONTH]))
			$this->InputValueRegistrationDateMonth = $_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_MONTH];
		else $this->InputValueRegistrationDateMonth = NULL;
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_YEAR]))
			$this->InputValueRegistrationDateYear  = $_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_YEAR];
		else $this->InputValueRegistrationDateYear = NULL;
		$this->InputValueRegistrationId = $_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_ID];
		$this->InputValueDepartmentName = $_POST[ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_DEPARTMENT_SELECT];
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_REGISTRATION_DATE_SELECT_DAY
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_DAY;
		$arrayElementsClass[0]        = &$this->ReturnRegistrationDateDayClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[0]        = $this->InputValueRegistrationDateDay; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 0; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnRegistrationDateDayText;
		array_push($arrayConstants, 'FORM_INVALID_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//FORM_FIELD_REGISTRATION_DATE_SELECT_MONTH
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_MONTH;
		$arrayElementsClass[1]        = &$this->ReturnRegistrationDateMonthClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[1]        = $this->InputValueRegistrationDateMonth; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 0; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnRegistrationDateMonthText;
		array_push($arrayConstants, 'FORM_INVALID_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_REGISTRATION_DATE_SELECT_YEAR
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_YEAR;
		$arrayElementsClass[2]        = &$this->ReturnRegistrationDateYearClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[2]        = $this->InputValueRegistrationDateYear; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 0; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnRegistrationDateYearText;
		array_push($arrayConstants, 'FORM_INVALID_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_REGISTRATION_ID
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_REGISTRATION_ID;
		$arrayElementsClass[3]        = &$this->ReturnRegistrationIdClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_REGISTRATION_ID;
		$arrayElementsInput[3]        = $this->InputValueRegistrationId; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 12; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnRegistrationIdText;
		array_push($arrayConstants, 'FORM_INVALID_REGISTRATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_USER_CHANGE_ASSOC_USER_CORPORATION_DEPARTMENT_SELECT
		$arrayElements[4]             = ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_DEPARTMENT_SELECT;
		$arrayElementsClass[4]        = &$this->ReturnDepartmentNameText;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[4]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 80; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnDepartmentNameClass;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE',  'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $arrayOptions, $arrayExtraField);
		if($return == ConfigInfraTools::SUCCESS)
		{
			if($this->InputValueRegistrationDateYear != "" && $this->InputValueRegistrationDateMonth != "" 
			   && $this->InputValueRegistrationDateDay != "")
			{
				$registrationDate = $this->InputValueRegistrationDateYear . "-" . $this->InputValueRegistrationDateMonth . "-" 
				         	        . $this->InputValueRegistrationDateDay;
			}
			//ATUALIZA DATA DE INGRESSO E MATRÍCULA
			if($registrationDate != NULL && $this->InputValueRegistrationId != NULL)
			{
				$return = $FacedePersistenceInfraTools->UserUpdateAssocUserCorporationByEmailAndCorporation
															 ($SelectedUser->GetCorporationName(),
															  $registrationDate,
															  $this->InputValueRegistrationId,
															  $SelectedUser->GetEmail(),
															  $this->InputValueHeaderDebug);
			}
			//ATUALIZA SOMENTE DATA DE INGRESSO
			elseif($registrationDate != NULL && $this->InputValueRegistrationId == NULL)
			{
				$return = $FacedePersistenceInfraTools->UserUpdateAssocUserCorporationRegistrationDateByEmailAndCorporation
															 ($SelectedUser->GetCorporationName(),
															  $registrationDate,
															  $this->InputValueRegistrationId,
															  $SelectedUser->GetEmail(),
															  $this->InputValueHeaderDebug);
			}
			//ATUALIZA SOMENTE MATRICULA
			elseif($registrationDate == NULL && $this->InputValueRegistrationId != NULL)
			{
				$return = $FacedePersistenceInfraTools->UserUpdateAssocUserCorporationRegistrationIdByEmailAndCorporation
															 ($SelectedUser->GetCorporationName(),
															  $registrationDate,
															  $this->InputValueRegistrationId,
															  $SelectedUser->GetEmail(),
															  $this->InputValueHeaderDebug);
			}
			elseif($this->InputValueDepartmentName != NULL) 
				$return = ConfigInfraTools::SUCCESS;
			else $return = ConfigInfraTools::ERROR;
			//ATUALIZA DEPARTAMENTO	
			if($return == ConfigInfraTools::SUCCESS)
			{
				if($this->InputValueDepartmentName != NULL && $this->InputValueDepartmentName != $SelectedUser->GetDepartmentName())
				{
					if($this->InputValueDepartmentName == ConfigInfraTools::FORM_SELECT_NONE)
						$this->InputValueDepartmentName = NULL;	
					$return = $FacedePersistenceInfraTools->UserUpdateDepartmentByEmailAndCorporation
				                                             ($SelectedUser->GetCorporationName(),
															  $this->InputValueDepartmentName,
															  $SelectedUser->GetEmail(),
															  $this->InputValueHeaderDebug);
				}
			}
			
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('UPDATE_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return $return;
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('UPDATE_ERROR_ASSOC_USER_CORPORATION', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	public function CheckInstanceUser()
	{
		if($this->InstanceInfraToolsUser != NULL)
		{
			if($this->InstanceInfraToolsUser->GetUserConfirmed())
			{
				if($this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESS_LOGIN_TWO_STEP_VERIFICATION, 
															   $value) != ConfigInfraTools::SUCCESS)
					return ConfigInfraTools::SUCCESS;
				else return ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED;
			}
			else return ConfigInfraTools::USER_NOT_CONFIRMED;
		}
		else return ConfigInfraTools::USER_NOT_LOGGED_IN;
	}
	
	
	public function CheckLogin()
	{
		if (isset($_POST[ConfigInfraTools::LOGIN_FORM_SUBMIT]))
		{
			$this->InputValueLoginEmail     = $_POST[ConfigInfraTools::LOGIN_USER];
			$this->InputValueLoginPassword  = $_POST[ConfigInfraTools::LOGIN_PASSWORD];
			//VALIDA LOGIN
			if(!empty($this->InputValueLoginEmail) && !empty($this->InputValueLoginPassword))
			{
				if(strlen($this->InputValueLoginEmail) < 45 && strlen($this->InputValueLoginPassword) < 20)
					return $this->ExecuteLoginFirstPhaseVerification();
				else
				{
					$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant(
																				  'LOGIN_INVALID_LOGIN', 
																				  $this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
			}
			else
			{
				$this->ReturnEmptyText = $this->InstanceLanguageText->GetConstant('FILL_REQUIRED_FIELDS', 
																					  $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		elseif(isset($_POST[ConfigInfraTools::FORM_LOGIN_TWO_STEP_VERIFICATION_CODE_SUBMIT]))
		{
			if($this->ExecuteLoginSecondPhaseVerirication() == ConfigInfraTools::SUCCESS)
			{
				$this->InstanceBaseSession->RemoveSessionVariable(ConfigInfraTools::SESS_LOGIN_TWO_STEP_VERIFICATION);
				return ConfigInfraTools::SUCCESS;	
			}
			else 
			{
				$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant(
																			  'LOGIN_TWO_STEP_VERIFICATION_CODE_ERROR', 
																			  $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
				$this->InstanceBaseSession->RemoveSessionVariable(ConfigInfraTools::SESS_LOGIN_TWO_STEP_VERIFICATION);	
				return ConfigInfraTools::ERROR;
			}
		}
		elseif(isset($_POST[ConfigInfraTools::LOGIN_FORM_SUBMIT_FORGOT_PASSWORD]))
		{
			$this->InputValueLoginEmail     = $_POST[ConfigInfraTools::LOGIN_USER];
			Page::GetCurrentDomain($domain);
			if($this->InputValueLoginEmail != "")
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
				                              str_replace('_', '', ConfigInfraTools::PAGE_PASSWORD_RECOVERY) . '?=' . 
									                               $this->InputValueLoginEmail);
			else $this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
				                              str_replace('_', '', ConfigInfraTools::PAGE_PASSWORD_RECOVERY));
		}
	}
	
	public function CheckPageRequiresLogin()
	{
		if($this->Page == ConfigInfraTools::PAGE_ACCOUNT ||
		   $this->Page == ConfigInfraTools::PAGE_ADMIN ||
		   $this->Page == ConfigInfraTools::PAGE_ADMIN_CORPORATION || 
		   $this->Page == ConfigInfraTools::PAGE_ADMIN_COUNTRY ||
		   $this->Page == ConfigInfraTools::PAGE_ADMIN_DEPARTMENT ||
		   $this->Page == ConfigInfraTools::PAGE_ADMIN_USER ||
		   $this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_USER ||
	  	   $this->Page == ConfigInfraTools::PAGE_CORPORATION || 
		   $this->Page == ConfigInfraTools::PAGE_CHECK || 
		   $this->Page == ConfigInfraTools::PAGE_DIAGNOSTIC_TOOLS || 
		   $this->Page == ConfigInfraTools::PAGE_GET ||
		   $this->Page == ConfigInfraTools::PAGE_NOTIFICATION || 
		   $this->Page == ConfigInfraTools::PAGE_SERVICE ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_CORPORATION ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_DEPARTMENT ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_TYPE_SERVICE ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_USER ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_REGISTER ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_SELECT ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_UPDATE ||
		   $this->Page == ConfigInfraTools::PAGE_SERVICE_VIEW ||
		   $this->Page == ConfigInfraTools::PAGE_SUPPORT ||
		   $this->Page == ConfigInfraTools::PAGE_TEAM)
				return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::ERROR;
	}
	
	public function LoadPageInfraToolsDependencies()
	{
		$loadPage = TRUE;
		$redirectPage = str_replace("_","",ConfigInfraTools::PAGE_NOT_FOUND);
		$this->InstanceBaseSession = $this->Factory->CreateSession();
		$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_LANGUAGE, $this->Language);
		$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, $this->InstanceInfraToolsUser);
		$this->LoadPageDependencies($this->Language);
		if($this->CheckInstanceUser() != ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
			$this->InstanceBaseSession->RemoveSessionVariable(ConfigInfraTools::SESS_LOGIN_TWO_STEP_VERIFICATION);
		//LOG OUT
		if(isset($_POST[ConfigInfraTools::POST_BACK_FORM]))
		{
			if ($_POST[ConfigInfraTools::POST_BACK_FORM] == ConfigInfraTools::LOG_OUT && $this->InstanceInfraToolsUser != NULL)
				$this->ExecuteLogOut();
		}
		//PAGE ABOUT
		if($this->Page == ConfigInfraTools::PAGE_ABOUT)
		{
			if(!$this->Config->PageAboutEnabled)
				$loadPage = FALSE;
		}
		//PAGE ACCOUNT
		elseif($this->Page == ConfigInfraTools::PAGE_ACCOUNT)
		{
			if(!$this->Config->PageAccountEnabled)
				$loadPage = FALSE;
			else
			{
				$return = $this->CheckInstanceUser();
				if($return == ConfigInfraTools::USER_NOT_LOGGED_IN)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, 
																	   $this->InstanceInfraToolsUser);
				}
				
			}
		}
		//PAGE ADMIN
		elseif($this->Page == ConfigInfraTools::PAGE_ADMIN || $this->Page == ConfigInfraTools::PAGE_ADMIN_CORPORATION ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_COUNTRY ||  $this->Page == ConfigInfraTools::PAGE_ADMIN_DEPARTMENT ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_MONITORING || $this->Page == ConfigInfraTools::PAGE_ADMIN_NOTIFICATION ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_SERVICE || 
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_TEAM || $this->Page == ConfigInfraTools::PAGE_ADMIN_TECH_INFO ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_TICKET ||  
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_MONITORING ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET || 
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET ||
			   $this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_USER || $this->Page == ConfigInfraTools::PAGE_ADMIN_USER)
		{
			if(!$this->Config->PageAdminEnabled)
				$loadPage = FALSE;
			else
			{
				$loginStatus = $this->CheckInstanceUser();
				
				if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
				   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, 
																	   $this->InstanceInfraToolsUser);
				}
				if(!isset($this->InstanceInfraToolsUser))
					$loadPage = FALSE;
				elseif(!$this->InstanceInfraToolsUser->CheckSuperUser())
					$loadPage = FALSE;
			}
		}
		//PAGE CHECK
		elseif($this->Page == ConfigInfraTools::PAGE_CHECK)
		{
			if(!$this->Config->PageCheckEnabled)
				$loadPage = FALSE;
			else
			{
				$return = $this->CheckInstanceUser();
				if($return == ConfigInfraTools::USER_NOT_LOGGED_IN || $return == ConfigInfraTools::USER_NOT_CONFIRMED)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, $this->InstanceInfraToolsUser);
					if($return == ConfigInfraTools::USER_NOT_CONFIRMED)
						$this->LoadNotConfirmedToolTip();
				}
			}
		}
		//PAGE CONTACT
		elseif($this->Page == ConfigInfraTools::PAGE_CONTACT)
		{
			if(!$this->Config->PageContactEnabled)
				$loadPage = FALSE;
		}
		//PAGE COPORATION
		elseif($this->Page == ConfigInfraTools::PAGE_CORPORATION)
		{
			if(!$this->Config->PageCorporationEnabled)
				$loadPage = FALSE;
			else
			{
				$loginStatus = $this->CheckInstanceUser();
				if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
				   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, 
																	   $this->InstanceInfraToolsUser);
				}
			}
		}
		//PAGE DIAGNOSTIC TOOLS
		elseif($this->Page == ConfigInfraTools::PAGE_DIAGNOSTIC_TOOLS)
		{
			if(!$this->Config->PageDiagnosticToolsEnabled)
				$loadPage = FALSE;
			else
			{
				$loginStatus = $this->CheckInstanceUser();
				if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
				   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, 
																	   $this->InstanceInfraToolsUser);
				}
			}
		}
		//PAGE GET
		elseif($this->Page == ConfigInfraTools::PAGE_GET)
		{
			if(!$this->Config->PageGetEnabled)
				$loadPage = FALSE;
			else
			{
				$return = $this->CheckInstanceUser();
				if($return == ConfigInfraTools::USER_NOT_LOGGED_IN || $return == ConfigInfraTools::USER_NOT_CONFIRMED)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, 
																	   $this->InstanceInfraToolsUser);
					if($return == ConfigInfraTools::USER_NOT_CONFIRMED)
						$this->LoadNotConfirmedToolTip();
				}
			}
		}
		//PAGE HOME
		elseif($this->Page == ConfigInfraTools::PAGE_HOME)
		{
			if(!$this->Config->PageHomeEnabled)
				$loadPage = FALSE;
		}
		//PAGE INSTALL
		elseif($this->Page == ConfigInfraTools::PAGE_INSTALL)
		{
			if(!$this->Config->PageInstallEnabled)
				$loadPage = FALSE;
		}
		//PAGE LOGIN
		elseif($this->Page == ConfigInfraTools::PAGE_LOGIN)
		{
			if(!$this->Config->PageLoginEnabled)
				$loadPage = FALSE;
			else
			{	
				$return = $this->CheckInstanceUser();
				if($return == ConfigInfraTools::SUCCESS)
					$redirectPage = str_replace("_","",ConfigInfraTools::PAGE_HOME);
				elseif($return == ConfigInfraTools::USER_NOT_CONFIRMED) $this->LoadNotConfirmedToolTip();
			}
		}
		//PAGE NOT FOUND
		elseif($this->Page == ConfigInfraTools::PAGE_NOT_FOUND)
		{
			if(!$this->Config->PageNotFoundEnabled)
				$loadPage = FALSE;
		}
		//PAGE NOTIFICAION
		elseif($this->Page == ConfigInfraTools::PAGE_NOTIFICATION)
		{
			if(!$this->Config->PageNotificationEnabled)
				$loadPage = FALSE;
			else
			{
				$loginStatus = $this->CheckInstanceUser();
				if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
				   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, 
																	   $this->InstanceInfraToolsUser);
				}
			}
		}
		//PAGE PASSWORD RECOVERY
		elseif($this->Page == ConfigInfraTools::PAGE_PASSWORD_RECOVERY)
		{
			if(!$this->Config->PagePasswordRecoveryEnabled)
				$loadPage = FALSE;
			else
			{
				if($this->CheckInstanceUser() != ConfigInfraTools::USER_NOT_LOGGED_IN)
					$redirectPage = str_replace("_","",ConfigInfraTools::PAGE_HOME);
			}
		}
		//PAGE PASSWORD RESET
		elseif($this->Page == ConfigInfraTools::PAGE_PASSWORD_RESET)
		{
			if(!$this->Config->PagePasswordResetEnabled)
				$loadPage = FALSE;
			else
			{
				if($this->CheckInstanceUser() != ConfigInfraTools::USER_NOT_LOGGED_IN)
					$redirectPage = str_replace("_","",ConfigInfraTools::PAGE_HOME);
			}
		}
		//PAGE REGISTER
		elseif($this->Page == ConfigInfraTools::PAGE_REGISTER)
		{
			if(!$this->Config->PageRegisterEnabled)
				$loadPage = FALSE;
			else
			{
				$return = $this->CheckInstanceUser();
				if($return == ConfigInfraTools::SUCCESS)
					$redirectPage = str_replace("_","",ConfigInfraTools::PAGE_HOME);
				elseif($return == ConfigInfraTools::USER_NOT_CONFIRMED)
					$redirectPage = str_replace("_","",ConfigInfraTools::PAGE_LOGIN);
			}
		}
		//PAGE REGISTER CONFIRMATION
		elseif($this->Page == ConfigInfraTools::PAGE_REGISTER_CONFIRMATION)
		{
			if(!$this->Config->PageRegisterConfirmationEnabled)
				$loadPage = FALSE;
			else
			{
				if($this->CheckInstanceUser() == ConfigInfraTools::SUCCESS)
					$redirectPage = str_replace("_","",ConfigInfraTools::PAGE_HOME);
			}
		}
		//PAGE RESEND CONFIRMATION LINK
		elseif($this->Page == ConfigInfraTools::PAGE_RESEND_CONFIRMATION_LINK)
		{
			if(!$this->Config->PageResendConfirmationLinkEnabled)
				$loadPage = FALSE;
			else
			{
				if($this->CheckInstanceUser() == ConfigInfraTools::SUCCESS)
					$redirectPage = str_replace("_","",ConfigInfraTools::PAGE_HOME);
			}
		}
		//PAGE SERVICE
		elseif($this->Page == ConfigInfraTools::PAGE_SERVICE || $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST ||
			   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_CORPORATION ||
			   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_DEPARTMENT ||
			   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_TYPE_SERVICE ||
			   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE ||
			   $this->Page == ConfigInfraTools::PAGE_SERVICE_LIST_BY_USER ||
			   $this->Page == ConfigInfraTools::PAGE_SERVICE_REGISTER ||
			   $this->Page == ConfigInfraTools::PAGE_SERVICE_SELECT ||
			   $this->Page == ConfigInfraTools::PAGE_SERVICE_UPDATE ||
			   $this->Page == ConfigInfraTools::PAGE_SERVICE_VIEW)
		{
			if(!$this->Config->PageServiceEnabled)
				$loadPage = FALSE;
			else
			{
				$return = $this->CheckInstanceUser();
				if($return == ConfigInfraTools::USER_NOT_LOGGED_IN || $return == ConfigInfraTools::USER_NOT_CONFIRMED)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, $this->InstanceInfraToolsUser);
				}
			}
		}
		//PAGE SUPPORT
		elseif($this->Page == ConfigInfraTools::PAGE_SUPPORT)
		{
			if(!$this->Config->PageSupportEnabled)
				$loadPage = FALSE;
			else
			{
				$loginStatus = $this->CheckInstanceUser();
				if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
				   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, 
																	   $this->InstanceInfraToolsUser);
				}
			}
		}
		//PAGE TEAM
		elseif($this->Page == ConfigInfraTools::PAGE_TEAM)
		{
			if(!$this->Config->PageTeamEnabled)
				$loadPage = FALSE;
			else
			{
				$loginStatus = $this->CheckInstanceUser();
				if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
				   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
				{
					if($this->CheckLogin())
						$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_USER, 
																	   $this->InstanceInfraToolsUser);
				}
			}
		}
		if(!$loadPage)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" . $redirectPage);
			exit(ConfigInfraTools::ERROR);
		}
		else
		{
			$this->LoadPageInfraToolsDependenciesDevice();
			$this->LoadPageInfraToolsDependenciesDebug();
		}
	}
	
	public function LoadPageInfraToolsDependenciesDebug()
	{
		if(isset($this->InstanceInfraToolsUser))
		{
			if($this->InstanceInfraToolsUser->CheckSuperUser())
			{
				if(!isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_DEBUG]) && !isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_DEBUG_HIDDEN]))
					$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_DEBUG, $this->InputValueHeaderDebug);
				if(isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_DEBUG]))
				{
					$this->InputValueHeaderDebug = ConfigInfraTools::CHECKBOX_CHECKED;
					$this->ReturnHeaderDebugClass = "SwitchToggleSlider SwitchToggleSliderChange";
				}
				$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESSION_DEBUG, $this->InputValueHeaderDebug);
				if($this->InputValueHeaderDebug == ConfigInfraTools::CHECKBOX_CHECKED)
				{
					$this->ReturnHeaderDebugClass = "SwitchToggleSlider SwitchToggleSliderChange";
					echo "<b>GET</b>: "; print_r($_GET); echo "<br>";
					echo "<b>POST</b>: "; print_r($_POST); echo "<br>";
					echo "<div class='DivClearFloat'></div>";
				}
			}
		}
	}
	
	public function LoadPageInfraToolsDependenciesDevice()
	{
		$this->InstanceMobileDetectInfraTools = $this->Factory->CreateMobileDetect();
		if($this->InstanceMobileDetectInfraTools->isTablet()) 
			$this->Device = Page::DEVICE_TABLET;
		elseif ($this->InstanceMobileDetectInfraTools->isMobile())			
			$this->Device = Page::DEVICE_MOBILE;
		else $this->Device = Page::DEVICE_DESKTOP;
		
		if(!isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_LAYOUT]) && !isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_LAYOUT_HIDDEN]))
			$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESSION_DEVICE_LAYOUT, $this->InputValueHeaderLayout);
		if($this->Device == Page::DEVICE_DESKTOP)
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_LAYOUT]))
			{
				$this->Device = Page::DEVICE_MOBILE;
				$this->InputValueHeaderLayout = ConfigInfraTools::CHECKBOX_CHECKED;
				$this->ReturnHeaderLayoutClass = "SwitchToggleSlider SwitchToggleSliderChange";
				
			}
			elseif(isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_LAYOUT_HIDDEN])) 
				$this->InputValueHeaderLayout = ConfigInfraTools::CHECKBOX_UNCHECKED;
			else
			{
				if($this->InputValueHeaderLayout == ConfigInfraTools::CHECKBOX_CHECKED)
				{
					$this->Device = Page::DEVICE_MOBILE;
					$this->ReturnHeaderLayoutClass = "SwitchToggleSlider SwitchToggleSliderChange";
				}
				else $this->Device = Page::DEVICE_DESKTOP;
			}
		}
		elseif($this->Device == Page::DEVICE_MOBILE)
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_LAYOUT]))
			{
				$this->Device = Page::DEVICE_DESKTOP;
				$this->InputValueHeaderLayout = ConfigInfraTools::CHECKBOX_CHECKED;
				$this->ReturnHeaderLayoutClass = "SwitchToggleSlider SwitchToggleSliderChange";
			}
			elseif(isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_LAYOUT_HIDDEN])) 
				$this->InputValueHeaderLayout = ConfigInfraTools::CHECKBOX_UNCHECKED;
			else
			{
				if($this->InputValueHeaderLayout == ConfigInfraTools::CHECKBOX_CHECKED)
				{
					$this->Device = Page::DEVICE_DESKTOP;
					$this->ReturnHeaderLayoutClass = "SwitchToggleSlider SwitchToggleSliderChange";
				}
				else $this->Device = Page::DEVICE_MOBILE;
			}
		}
		else
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_LAYOUT]))
			{
				$this->Device = Page::DEVICE_DESKTOP;
				$this->InputValueHeaderLayout = ConfigInfraTools::CHECKBOX_CHECKED;
				$this->ReturnHeaderLayoutClass = "SwitchToggleSlider SwitchToggleSliderChange";
			}
			elseif(isset($_POST[ConfigInfraTools::FORM_FIELD_HEADER_LAYOUT_HIDDEN])) 
				$this->InputValueHeaderLayout = ConfigInfraTools::CHECKBOX_UNCHECKED;
			else
			{
				if($this->InputValueHeaderLayout == ConfigInfraTools::CHECKBOX_CHECKED)
				{
					$this->Device = Page::DEVICE_DESKTOP;
					$this->ReturnHeaderLayoutClass = "SwitchToggleSlider SwitchToggleSliderChange";
				}
				else $this->Device = Page::DEVICE_TABLET;
			}
		}
		$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::SESSION_DEVICE_LAYOUT, $this->InputValueHeaderLayout);
	}
}
?>