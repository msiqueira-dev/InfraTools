<?php

/************************************************************************
Class: Page.php
Creation: 2013/11/05
Creator: Marcus Siqueira
Dependencies:
			Base/Web/Php/Config.php
			Base/Web/Php/Language.php
			Base/Web/Php/Head.php

Description: 
			Class with Singleton pattern for Pages
Get / Set:		
			public function GetPageLoadTime();
Methods: 
		private       function        CheckPostLanguage();
		private       function        ExecuteLoginFirstPhaseVerification($Debug);
		private       function        ExecuteLoginSecondPhaseVerirication();
		private       function        LoadInstanceUser();
		private       function        SendTwoStepVerificationCode($Application, $UserEmail, $UserName, $Debug);
		protected     function        AssocUserNotificationLoadData($InstanceAssocUserNotification);
		protected     function        AssocUserNotificationUpdateByUserEmailAndNotificationId($AssocUserNotificationReadNew, 
		                                                                                      $NotificationIdNew, $UserEmailNew, 
		                                                                                      &$InstanceAssocUserNotification, $Debug);
		protected     function        CaptchaLoad(SessionCaptchaKey);
		protected     function        CorporationDelete($CorporationName, $Debug);
		protected     function        CorporationInsert($CorporationActive, $CorporationName, $Debug);
		protected     function        CorporationLoadData(&$InstanceCorporation);
		protected     function        CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug);
		protected     function        CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, 
															  &$RowCount, $Debug)
		protected     function        CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
		protected     function        CorporationSelectByName($CorporationName, &$InstanceCorporation, $Debug);
		protected     function        CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug);
		protected     function        CorporationUpdateByName($CorporationActive, $CorporationName, &$InstanceCorporation, $Debug);
		protected     function        CountrySelect($Limit1, $Limit2, &$ArrayInstanceCountry, &$RowCount, $Debug);
		protected     function        DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug);
		protected     function        DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug);
		protected     function        DepartmentLoadData($InstanceDepartment);
		protected     function        DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug);
		protected     function        DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, 
													                    &$ArrayInstanceDepartment, &$RowCount, $Debug);
		protected     function        DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug);
		protected     function        DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug);
		protected     function        DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
																		                 &$InstanceDepartment, $Debug);
		protected     function        DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug);
		protected     function        DepartmentUpdateDepartmentByDepartmentAndCorporation($DepartmentInitialsNew,$DepartmentNameNew, 
		         															               &$InstanceDepartment, $Debug)
		protected     function        DepartmentUpdateCorporationByCorporationAndDepartment($CorporationNameNew, &$InstanceDepartment, $Debug);
		protected     function        ExecuteFunction($PostForm, $Function, $ArrayParameter, $Debug, $StoreSession = FALSENULL);
		protected     function        LoadHtml($HasLoginForm, $EnableDivPush = TRUE);
		protected     function        LoadDataFromSession($SessionKey, $Function, &$Instance);
		protected     function        NotificationDeleteByNotificationId($InstanceNotification, $Debug);
		protected     function        NotificationInsert($NotificationActive, $NotificationText, $Debug);
		protected     function        NotificationLoadData($InstanceNotification);
		protected     function        NotificationSelect($Limit1, $Limit2, &$ArrayInstanceNotification, &$RowCount, $Debug);
		protected     function        NotificationSelectByNotificationId($NotificationId, &$InstanceNotification, $Debug);
		protected     function        NotificationUpdateByNotificationId($NotificationActiveNew, $NotificationTextNew,
		                                                                 &$InstanceNotification, $Debug);
		protected     function        PageStackSessionLoad();
		protected     function        PageStackSessionRemoveAll();
		protected     function        PageStackSessionSave();
		protected     function        SystemConfigurationDeleteBySystemConfigurationOptionNumber($InstanceSystemConfiguration, $Debug);
		protected     function        SystemConfigurationInsert($SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
		                                                        $SystemConfigurationOptionName, $SystemConfigurationOptionValue, $Debug);
		protected     function        SystemConfigurationLoadData($InstanceSystemConfiguration);
		protected     function        SystemConfigurationSelect($Limit1, $Limit2, &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug);
		protected     function        SystemConfigurationSelectBySystemConfigurationOptionName($Limit1, $Limit2, 
		                                                                                       $SystemConfigurationOptionName, &$RowCount,
		                                                                                       &$ArrayInstanceSystemConfiguration, $Debug);
		protected     function        SystemConfigurationSelectBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, 
		                                                                                         &$InstanceSystemConfiguration, $Debug);
		protected     function        SystemConfigurationUpdateBySystemConfigurationOptionNumber($SystemConfigurationOptionActiveNew,
		                                                                                         $SystemConfigurationOptionDescriptionNew,
		                                                                                         $SystemConfigurationOptionNameNew,
																								 $SystemConfigurationOptionValueNew,
		                                                                                         &$InstanceSystemConfiguration, $Debug);
		protected     function        TeamDeleteByTeamId($TeamId, $Debug);
		protected     function        TeamInsert($TeamDescription, $TeamName, $Debug);
		protected     function        TeamLoadData(&$InstanceTeam);
		protected     function        TeamSelect($Limit1, $Limit2, &$ArrayInstanceTeam, &$RowCount, $Debug);
		protected     function        TeamSelectByTeamId($TeamId, &$InstanceTeam, $Debug);
		protected     function        TeamSelectByTeamName($TeamName, &$ArrayInstanceTeam, $Debug);
		protected     function        TeamUpdateByTeamId($TeamDescriptionNew, $TeamNameNew, &$InstanceTeam, $Debug);
		protected     function        TicketDeleteByTicketId($InstanceTicket, $Debug);
		protected     function        TicketInsert($TicketDescription, $TicketSuggestion, $TicketTitle, $TypeStatusTicketDescription, 
		                                           $TypeTicketDescription, $Debug);
		protected     function        TicketLoadData($InstanceTicket);
		protected     function        TicketSelect($Limit1, $Limit2, &$ArrayInstanceTicket, &$RowCount, $Debug);
		protected     function        TicketSelectByTicketId($TicketId, &$InstanceTicket, $Debug);
		protected     function        TicketSelectByRequestingUserEmail($RequestingUserEmail, &$InstanceTicket, $Debug);
		protected     function        TicketSelectByResponsibleUserEmail($ResponsibleUserEmail, &$InstanceTicket, $Debug);
		protected     function        TicketUpdateByTicketId($TicketDescriptionNew, $TicketSuggestionNew, $TicketTitleNew, 
											                 $TypeStatusTicketDescriptionNew, $TypeTicketDescriptionNew, 
															 &$InstanceTicket, $Debug);
		protected     function        TicketUpdateTicketStatusByTicketId($TicketStatusNew, &$InstanceTicket, $Debug);
		protected     function        TicketUpdateResponsibleUserByTicketId($ResponsibleUserEmailNew, &$InstanceTicket, $Debug);
		protected     function        TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription($InstanceTypeAssocUserTeam, $Debug);
		protected     function        TypeAssocUserTeamInsert($InputValueTypeAssocUserTeamDescription, $Debug);
		protected     function        TypeAssocUserTeamLoadData(&$InstanceTypeAssocUserTeam);
		protected     function        TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayInstanceTypeAssocUserTeam, &$RowCount, $Debug);
		protected     function        TypeAssocUserTeamSelectByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription,
		                                                                                    &$InstanceTypeAssocUserTeam, $Debug);
		protected     function        TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription,
		                                                                                    &$InstanceTypeAssocUserTeam, $Debug);
		protected     function        TypeStatusTicketDeleteByTypeStatusTicketDescription($InstanceTypeStatusTicket, $Debug);
		protected     function        TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug);
		protected     function        TypeStatusTicketLoadData($InstanceTypeStatusTicket);
		protected     function        TypeStatusTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeStatusTicket, &$RowCount, $Debug);
		protected     function        TypeStatusTicketSelectByTypeStatusTicketDescription($TypeStatusTicketDescription, 
		                                                                                  &$InstanceTypeStatusTicket, $Debug);
		protected     function        TypeStatusTicketUpdateByTypeStatusTicketDescription($TypeStatusTicketDescriptionNew,
		                                                                                  &$InstanceTypeStatusTicket, $Debug);
		protected     function        TypeTicketDeleteByTypeTicketDescription($InstanceTypeTicket, $Debug);
		protected     function        TypeTicketInsert($TypeTicketDescription, $Debug);
		protected     function        TypeTicketLoadData($InstanceTypeTicket);
		protected     function        TypeTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeTicket, &$RowCount, $Debug);
		protected     function        TypeTicketSelectByTypeTicketDescription($TypeTicketDescription, &$InstanceTypeTicket, $Debug);
		protected     function        TypeTicketUpdateByTypeTicketDescription($TypeTicketDescriptionNew, &$InstanceTypeTicket, $Debug);
		protected     function        TypeUserDeleteByTypeUserDescription($InstanceTypeUser, $Debug);
		protected     function        TypeUserInsert($TypeUserDescription, $Debug);
		protected     function        TypeUserLoadData(&$InstanceTypeUser);
		protected     function        TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug);
		protected     function        TypeUserSelectByTypeUserDescription($TypeUserDescription, &$InstanceTypeUser, $Debug);
		protected     function        TypeUserSelectByTypeUserDescriptionLike($TypeUserDescription, &$ArrayInstanceTypeUser, $Debug);
		protected     function        TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug);
		protected     function        TypeUserUpdateByTypeUserDescription($TypeUserDescriptionNew, &$InstanceTypeUser, $Debug);
		protected     function        UserChangeTwoStepVerification($InstanceUser, $TwoStepVerification, $Debug);
		protected     function        UserDeleteByUserEmail(&$InstanceUser, $Debug);
		protected     function        UserInsert($Application, $SendEmail, 
		                                         $BirthDateDay, $BirthDateMonth, $BirthDateYear, $Corporation, $Country, 
		                                         $UserEmail, $Gender, $HashCode, $UserName, $PasswordNew, $PasswordRepeat, 
												 $Region, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, 
												 $UserPhonePrimary, UserPhonePrimaryprefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix,
												 $UserType, $UserUniqueId, $Debug);
		protected     function        UserLoadData($InstanceUser);
		protected     function        UserResendConfirmationLink($Application, $UserEmail, $Debug);
		protected     function        UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceUser,
		                                                          &$RowCount, $Debug, $HideReturnSuccessImage = TRUE);
		protected     function        UserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, 
		                                                         &$ArrayInstanceUser, &$RowCount, Debug, $HideReturnSuccessImage = TRUE);
		protected     function        UserSelectByHashCode($HashCode, &$UserInstance, $Debug);
		protected     function        UserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription,
		                                                                       &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, 
		                                                                &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceUser, 
		                                                              &$RowCount, $Debug);
		protected     function        UserSelectByUserEmail($UserEmail, &$UserInstance, $Debug);
		protected     function        UserSelectByUserUniqueId($UniqueId, &$UserInstance, $Debug);
		protected     function        UserSelectExistsByUserEmail($Capcha, $UserEmail, $Debug);
		protected     function        UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug);
		protected     function        UserSelectNotificationByUserEmail($Limit1, $Limit2, $InstanceUser, &$ArrayInstanceAssocUserNotification, 
		                                                                &$RowCount, $Debug);
		protected     function        UserSelectNotificationByUserEmailAndNotificationId($InstanceUser, $NotificationId,
		                                                                                 &$InstanceAssocUserNotification, $Debug);
		protected     function        UserSelectNotificationByUserEmailCount($InstanceUser, &$Count, $Debug);
		protected     function        UserSelectNotificationByUserEmailCountUnRead($InstanceUser, &$Count, $Debug);
		protected     function        UserSelectNotificationByUserEmailNoLimit($InstanceUser, &$ArrayInstanceAssocUserNotification, $Debug);
		protected     function        UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug);
		protected     function        UserUpdateActiveByUserEmail($UserActiveNew, &$InstanceUser, $Debug);
		protected     function        AssocUserCorporationUpdateByUserEmailAndCorporationName($AssocUserCorporationDepartmentName,
		                                                                                      $AssocUserCorporationRegistrationDateDay, 
		                                                                                      $AssocUserCorporationRegistrationDateMonth, 
		                                                                                      $AssocUserCorporationRegistrationDateYear,
																							  $AssocUserCorporationRegistrationId,
																							  &$InstanceUser, $Debug);
		protected     function        UserUpdateByUserEmail($BirthDateDayNew, $BirthDateMonthNew, $BirthDateYearNew, $CountryNew, 
		                                                    $GenderNew, $OnAdmin, $UserNameNew, $RegionNew,
					  						                $SessionExpiresNew, $TwoStepVerificationNew, $UserActiveNew, $UserConfirmedNew,
   										                    $UserPhonePrimaryNew, $UserPhonePrimaryPrefixNew, $UserPhoneSecondaryNew,
											                $UserPhoneSecondaryPrefixNew, $ValueUserUniqueIdNew, &$InstanceUser, $Debug);
		protected     function        UserUpdateCorporationByUserEmail($CorporationNameNew, &$InstanceUser, $Debug);
		protected     function        UserUpdatePasswordByUserEmail($ResetCode, $UserPasswordNew, $UserPasswordNewRepeat, 
		                                                            $UserEmail, $Debug);
		protected     function        UserUpdatePasswordRandomByUserEmail($Application, &$InstanceUser, $Debug);
		protected     function        UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug);
		protected     function        UserUpdateUserTypeByUserEmail($TypeUserDescriptionNew, &$InstanceUser, $Debug);
		public        function        CheckInputImage($Input);
		public        function        CheckInstanceUser();
		public        function        CheckGetContainsKey($Key);
		public        function        CheckGetOrPostContainsKey($Key);
		public        function        CheckPostContainsKey($Key);
		public        function        GetCurrentPage();
		public        function        IncludeHeadAll($HasLoginForm);
		public        function        IncludeHeadGeneric();
		public        function        IncludeHeadJavaScript();
		public        function        LoadPage();
		public        function        LoadPageDependencies();
		public        function        LoadPageDependenciesDebug();
		public        function        LoadPageDependenciesDevice();
		public        function        RedirectPage($Page);
		public        function        ShowDivReturnError($Constant, $ConstanteIsText = FALSE);
		public        function        ShowDivReturnEmpty();
		public        function        ShowDivReturnSuccess($Constant, $ConstanteIsText = FALSE);
		public        function        ShowDivReturnWarning($Constant, $ConstanteIsText = FALSE);
		public        function        StartPageLoadTime();
		public        function        StopPageLoadTime();
		public static function        AlertMessage($Message);
		public static function        GetCurrentDomain(&$currentDomain);
		public static function        GetCurrentDomainWithPort(&$currentDomain);
		public static function        GetCurrentURL(&$pageUrl);
		public static function        TagOnloadFocusField($Form, $Field);
**************************************************************************/

if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Config');
}
if (!class_exists("Session"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Session.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Session.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Session');
}
if (!class_exists("Language"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Language.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Language.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Language');
}

class Page
{
	/* Constantes de Retorno */
	const ERROR_HEAD_GENERIC_NOT_EXISTS       = "ReturnErrorHeadGenericNotExists";
	const ERROR_HEAD_JAVASCRIPT_NOT_EXISTS    = "ReturnErrorHeadJavaScriptNotExists";
	const ERROR_HEAD_PAGE_NOT_EXISTS          = "ReturnHeadPageDoesNotExists";
	const ERROR_HEAD_THEME_NOT_EXISTS         = "ReturnHeadThemeDoesNotExists";
	const ERROR_LANGUAGE_INSTANCE_NOT_CREATED = "ReturnErrorLanguageInstanceNotCreated";
	
	/* Constantes Web */
	const DEVICE_DESKTOP       = "Desktop";
	const DEVICE_MOBILE        = "Mobile";
	const DEVICE_TABLET        = "Tablet";
	
	/* Constantes de Protocolo HTTP */
	const HTTP        = "http"; 
	const HTTP_PORT   = 80;
	const HTTPS       = "https";
	const SERVER_PORT = "SERVER_PORT"; 
	const SERVER_NAME = "SERVER_NAME";
	const REQUEST_URI = "REQUEST_URI";
	
	/* Instância usadas nessa classe */
	protected $InstanceLanguageText                   = NULL;
	protected $Session                                = NULL;
	protected $Factory                                = NULL;
	protected $Config                                 = NULL;
	protected $User                                   = NULL;
	
	/* Properties */
	protected $Language                                             = NULL;
	protected $PageEnabled                                          = NULL;
	protected $PageCheckLogin                                       = NULL;
	protected $PageLoadTime                                         = NULL;
	public    $EnableFieldSessionExpires                            = "";
	public    $EnableFieldTwoStepVerification                       = "";                    
	public    $EnableFieldUserActive                                = "";
	public    $EnableFieldUserConfirmed                             = "";
	public    $InputFocus                                           = "";
	public    $InputValueAssocUserCorporationRegistrationDate       = "";
	public    $InputValueAssocUserCorporationRegistrationDateActive = "";
	public    $InputValueAssocUserCorporationRegistrationId         = "";
	public    $InputValueAssocUserCorporationRegistrationIdActive   = "";
	public    $InputValueAssocUserNotificationNotificationId        = "";
	public    $InputValueAssocUserNotificationRead                  = "";
	public    $InputValueAssocUserNotificationUserEmail             = "";
	public    $InputValueAssocUserRoleRoleName                      = "";
	public    $InputValueAssocUserRoleUserEmail                     = "";
	public    $InputValueBirthDateDay                               = "";
	public    $InputValueBirthDateMonth                             = "";
	public    $InputValueBirthDateYear                              = "";
	public    $InputValueCaptcha                                    = "";
	public    $InputValueCode                                       = "";
	public    $InputValueCorporationActive                          = "";
	public    $InputValueCorporationName                            = "";
	public    $InputValueCountry                                    = "";
	public    $InputValueDepartmentActive                           = "";
	public    $InputValueDepartmentInitials                         = "";
	public    $InputValueDepartmentName                             = "";
	public    $InputValueDepartmentNameAndCorporationNameRadio      = "";
	public    $InputValueDepartmentNameRadio                        = "";
	public    $InputValueFormMethod                                 = "POST";
	public    $InputValueGender                                     = "";
	public    $InputValueHeaderDebug                                = Config::CHECKBOX_UNCHECKED;
	public    $InputValueHeaderLayout                               = Config::CHECKBOX_UNCHECKED;
	public    $InputValueLimit1                                     = "";
	public    $InputValueLimit2                                     = "";
	public    $InputValueLoginEmail                                 = "";
	public    $InputValueLoginPassword                              = "";
	public    $InputValueLoginTwoStepVerificationCode               = "";
	public    $InputValueNewPassword                                = "";
	public    $InputValueNotificationActive                         = "";
	public    $InputValueNotificationId                             = "";
	public    $InputValueNotificationText                           = "";
	public    $InputValueRegion                                     = "";
	public    $InputValueRegisterDate                               = "";
	public    $InputValueRegistrationDateDay                        = "";
	public    $InputValueRegistrationDateMonth                      = "";
	public    $InputValueRegistrationDateYear                       = "";
	public    $InputValueRegistrationId                             = "";
	public    $InputValueRepeatPassword                             = "";
	public    $InputValueRoleDescription                            = "";
	public    $InputValueRoleName                                   = "";
	public    $InputValueRowCount                                   = "";
	public    $InputValueSystemConfigurationOptionActive            = "";
	public    $InputValueSystemConfigurationOptionDescription       = "";
	public    $InputValueSystemConfigurationOptionName              = "";
	public    $InputValueSystemConfigurationOptionNameRadio         = "";
	public    $InputValueSystemConfigurationOptionNumber            = "";
	public    $InputValueSystemConfigurationOptionNumberRadio       = "";
	public    $InputValueSystemConfigurationOptionValue             = "";
	public    $InputValueTeamDescription                            = "";
	public    $InputValueTeamId                                     = "";
	public    $InputValueTeamIdRadio                                = "";
	public    $InputValueTeamName                                   = "";
	public    $InputValueTeamNameRadio                              = "";
	public    $InputValueTicketDescription                          = "";
	public    $InputValueTicketId                                   = "";
	public    $InputValueTicketIdRadio                              = "";
	public    $InputValueTicketSuggestion                           = "";
	public    $InputValueTicketStatus                               = "";
	public    $InputValueTicketTitle                                = "";
	public    $InputValueTicketTitleRadio                           = "";
	public    $InputValueTicketType                                 = "";
	public    $InputValueTwoStepVerification                        = "";
	public    $InputValueTypeAssocUserServiceDescription            = "";
	public    $InputValueTypeAssocUserServiceId                     = "";
	public    $InputValueTypeAssocUserTeamDescription               = "";
	public    $InputValueTypeServiceName                            = "";
	public    $InputValueTypeStatusTicketDescription                = "";
	public    $InputValueTypeTicketDescription                      = "";
	public    $InputValueTypeUserDescription                        = "";
	public    $InputValueUserActive                                 = "";
	public    $InputValueUserConfirmed                              = "";
	public    $InputValueUserCorporationName                        = "";
	public    $InputValueUserEmail                                  = "";
	public    $InputValueUserName                                   = "";
	public    $InputValueUserPhonePrimary                           = "";
	public    $InputValueUserPhonePrimaryPrefix                     = "";
	public    $InputValueUserPhoneSecondary                         = "";
	public    $InputValueUserPhoneSecondaryPrefix                   = "";
	public    $InputValueUserTeam                                   = ""; 
	public    $InputValueUserUniqueId                               = "";
	public    $InputValueUserUniqueIdActive                         = "";
	public    $Page                                                 = "";
	public    $PageBody                                             = "";
	public    $ReturnAssocUserNotificationNotificationIdClass       = "";
	public    $ReturnAssocUserNotificationNotificationIdText        = "";
	public    $ReturnAssocUserNotificationReadClass                 = "";
	public    $ReturnAssocUserNotificationReadText                  = "";
	public    $ReturnAssocUserNotificationUserEmailClass            = "";
	public    $ReturnAssocUserNotificationUserEmailText             = "";
	public    $ReturnAssocUserRoleRoleNameClass                     = "";
	public    $ReturnAssocUserRoleRoleNameText                      = "";
	public    $ReturnAssocUserRoleUserEmailClass                    = "";
    public    $ReturnAssocUserRoleUserEmailText                     = "";
	public    $ReturnBirthDateDayClass                              = "";
	public    $ReturnBirthDateDayText                               = "";
	public    $ReturnBirthDateMonthClass                            = "";
	public    $ReturnBirthDateMonthText                             = "";
	public    $ReturnBirthDateYearText                              = "";
	public    $ReturnBirthDateYearClass                             = "";
	public    $ReturnCaptchaClass                                   = "";
	public    $ReturnCaptchaText                                    = "";
	public    $ReturnClass                                          = "DivHidden";
	public    $ReturnCodeClass                                      = "";
	public    $ReturnCodeText                                       = "";
	public    $ReturnCorporationNameClass                           = "";
	public    $ReturnCorporationNameText                            = "";
	public    $ReturnCountryClass                                   = "";
	public    $ReturnCountryText                                    = "";
	public    $ReturnDepartmentInitialsClass                        = "";
	public    $ReturnDepartmentInitialsText                         = "";
	public    $ReturnDepartmentNameClass                            = "";
	public    $ReturnDepartmentNameText                             = "";
	public    $ReturnEmptyText                                      = "";
	public    $ReturnGenderClass                                    = "";
	public    $ReturnGenderText                                     = "";
	public    $ReturnHeaderDebugClass                               = "SwitchToggleSlider";
	public    $ReturnHeaderLayoutClass                              = "SwitchToggleSlider";
	public    $ReturnIdClass                                        = "";
	public    $ReturnImage                                          = "DivDisplayNone";
	public    $ReturnLoginClass                                     = "";
	public    $ReturnLoginText                                      = "";
	public    $ReturnNameClass                                      = "";
	public    $ReturnNameText                                       = "";
	public    $ReturnNotificationActiveClass                        = "";
	public    $ReturnNotificationActiveText                         = "";
	public    $ReturnNotificationIdClass                            = "";
	public    $ReturnNotificationIdText                             = "";
	public    $ReturnNotificationTextClass                          = "";
	public    $ReturnNotificationTextText                           = "";
	public    $ReturnPasswordClass                                  = "";
	public    $ReturnPasswordText                                   = "";
	public    $ReturnRegionClass                                    = "";
	public    $ReturnRegionText                                     = "";
	public    $ReturnRegistrationDateText                           = "";
	public    $ReturnRegistrationDateDayText                        = "";
	public    $ReturnRegistrationDateDayClass                       = "";
	public    $ReturnRegistrationDateMonthText                      = "";
	public    $ReturnRegistrationDateMonthClass                     = "";
	public    $ReturnRegistrationDateYearText                       = "";
	public    $ReturnRegistrationDateYearClass                      = "";
	public    $ReturnRegistrationIdClass                            = "";
	public    $ReturnRegistrationIdText                             = "";
	public    $ReturnValueRoleDescriptionClass                      = "";
	public    $ReturnValueRoleDescriptionText                       = "";
	public    $ReturnValueRoleNameClass                             = "";
	public    $ReturnValueRoleNameText                              = "";
	public    $ReturnSystemConfigurationOptionActiveClass           = "";
	public    $ReturnSystemConfigurationOptionActiveText            = "";
	public    $ReturnSystemConfigurationOptionDescriptionClass      = "";
	public    $ReturnSystemConfigurationOptionDescriptionText       = "";
	public    $ReturnSystemConfigurationOptionNameClass             = "";
	public    $ReturnSystemConfigurationOptionNameRadioClass        = "";
	public    $ReturnSystemConfigurationOptionNameText              = "";
	public    $ReturnSystemConfigurationOptionNumberClass           = "";
	public    $ReturnSystemConfigurationOptionNumberRadioClass      = "";
	public    $ReturnSystemConfigurationOptionNumberText            = "";
	public    $ReturnSystemConfigurationOptionValueClass            = "";
	public    $ReturnSystemConfigurationOptionValueText             = "";
	public    $ReturnTeamDescriptionClass                           = "";
	public    $ReturnTeamDescriptionText                            = "";
	public    $ReturnTeamIdClass                                    = "";
	public    $ReturnTeamIdText                                     = "";
	public    $ReturnTeamNameClass                                  = "";
	public    $ReturnTeamNameText                                   = "";
	public    $ReturnText                                           = "";
	public    $ReturnTicketDescriptionClass                         = "";
	public    $ReturnTicketDescriptionText                          = "";
	public    $ReturnTicketTitleClass                               = "";
	public    $ReturnTicketTitleText                                = "";
	public    $ReturnTicketTypeClass                                = "";
	public    $ReturnTicketTypeText                                 = "";
	public    $ReturnTypeAssocUserTeamDescriptionClass              = "";
	public    $ReturnTypeAssocUserTeamDescriptionText               = "";
	public    $ReturnTypeStatusTicketDescriptionClass               = "";
	public    $ReturnTypeStatusTicketDescriptionText                = "";
	public    $ReturnTypeTicketDescriptionClass                     = "";
	public    $ReturnTypeTicketDescriptionText                      = "";
	public    $ReturnTypeUserDescriptionClass                       = "";
	public    $ReturnTypeUserDescriptionText                        = "";
	public    $ReturnUserCorporationClass                           = "";
	public    $ReturnUserCorporationText                            = "";
	public    $ReturnUserEmailClass                                 = "";
	public    $ReturnUserEmailText                                  = "";
	public    $ReturnUserNameClass                                  = "";
	public    $ReturnUserNameText                                   = "";
	public    $ReturnUserPhonePrimaryClass                          = "";
	public    $ReturnUserPhonePrimaryText                           = "";
	public    $ReturnUserPhonePrimaryPrefixClass                    = "";
	public    $ReturnUserPhonePrimaryPrefixText                     = "";
	public    $ReturnUserPhoneSecondaryClass                        = "";
	public    $ReturnUserPhoneSecondaryText                         = "";
	public    $ReturnUserPhoneSecondaryPrefixClass                  = "";
	public    $ReturnUserPhoneSecondaryPrefixText                   = "";
	public    $ReturnUserTeamClass                                  = "";
	public    $ReturnUserTeamText                                   = "";
	public    $ReturnUserUniqueIdClass                              = "";
	public    $ReturnUserUniqueIdText                               = "";
	public    $ShowTypeUserDescription                              = FALSE;
	public    $SubmitClass                                          = "SubmitDisabled";
	public    $SubmitEnabled                                        = 'disabled="disabled"';
	public    $ValidateCaptcha                                      = TRUE;
	
	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
    {
		$this->Page = $Page;
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
		if($this->Session == NULL)
			$this->Session = $this->Factory->CreateSession();
		if($this->Config == NULL && $Config == NULL)
			$this->Config = $this->Factory->CreateConfig();
		else $this->Config = $Config;
		//FIELD_HEADER_LOG_OUT
		if(isset($_POST[Config::FIELD_HEADER_LOG_OUT]))
		{
			if ($_POST[Config::FIELD_HEADER_LOG_OUT] == Config::FIELD_HEADER_LOG_OUT)
			{
				$this->Session->DestroyCustomSession();
				$this->User = NULL;
			}
		}
		if(isset(get_object_vars($this->Config)[get_class($this).Config::ENABLED]))
		{
			if(!get_object_vars($this->Config)[get_class($this).Config::ENABLED])
			{
				$this->PageEnabled = FALSE;
				return Config::RET_ERROR;
			}
		}
		$this->PageEnabled = TRUE;
		$this->Session->SetSessionValue(Config::SESS_LANGUAGE, $Language);
		if($this->LoadPageDependencies() == Config::RET_OK)
		{
			if($this->PageCheckLogin == TRUE)
			{
				if($this->CheckInstanceUser() == Config::USER_NOT_LOGGED_IN)
					$this->CheckLogin($this->InputValueHeaderDebug);
			}
		}
		return Config::RET_OK;
    }
	
	/* Clone */
	public function __clone()
    {
        exit(get_class($this) . ": Error! Clone Not Allowed!");
    }
		
	/* Variaveis de classe */
	protected $ArrayHeadText   = NULL;
	protected $Device          = NULL;
	
	/* GET */
	public function GetPageLoadTime()
	{
		return $this->PageLoadTime;
	}
	
	/* Métodos */
	private function CheckPostLanguage()
	{
		if(isset($_POST[Config::FM_LANGUAGE]))
		{
			if ($_POST[Config::FM_LANGUAGE] == Config::LANGUAGE_ENGLISH ||
			    $_POST[Config::FM_LANGUAGE] == Config::LANGUAGE_GERMAN ||
				$_POST[Config::FM_LANGUAGE] == Config::LANGUAGE_PORTUGUESE ||
				$_POST[Config::FM_LANGUAGE] == Config::LANGUAGE_SPANISH)
			{
				header("Location: "  . ProjectConfig::$AddressApplication . "/" . str_replace('Language/', '', 
									   $_POST[Config::FM_LANGUAGE]) . "/"
									 . $this->Page);
			}
		}
	}
	
	private function ExecuteLoginFirstPhaseVerification($Debug)
	{
		$this->InstanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		if (strpos($this->InputValueLoginEmail, '@') !== false) 
		{
			$return = $this->InstanceFacedePersistence->UserCheckPasswordByUserEmail($this->InputValueLoginEmail, 
																					 $this->InputValueLoginPassword, $Debug);
			if($return == Config::RET_OK)
			{
				$return = $this->InstanceFacedePersistence->UserSelectByUserEmail($this->InputValueLoginEmail, $user, $Debug);
				if($return == Config::RET_OK)
				{
					$return = $this->InstanceFacedePersistence->UserSelectNotificationByUserEmailCountUnRead($user, $count, $Debug);
					if($return == Config::RET_OK)
						$user->SetAssocUserNotificationCount($count);
					$return = $this->InstanceFacedePersistence->UserSelectTeamByUserEmail($user, $Debug);
				}
			}
		}
		else
		{
			$return = $this->InstanceFacedePersistence->UserCheckPasswordByUserUniqueId($this->InputValueLoginEmail, 
					                                                                    $this->InputValueLoginPassword, $Debug);
			if($return == Config::RET_OK)
			{
				$return = $this->InstanceFacedePersistence->UserSelectByUserUniqueId($this->InputValueLoginEmail, $user, $Debug);
				if($return == Config::RET_OK)
				{
					$return = $this->InstanceFacedePersistence->UserSelectNotificationByUserEmailCountUnRead($user, $count, $Debug);
					if($return == Config::RET_OK)
						$user->SetAssocUserNotificationCount($count);
					$return = $this->InstanceFacedePersistence->UserSelectTeamByUserEmail($user,$Debug);
				}
			}
		}
		if($return == Config::RET_OK || $return == Config::DB_ERROR_USER_SEL_TEAM_BY_USER_EMAIL_EMPTY)
		{
			$this->InstanceFacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
			$this->InstanceFacedeBusiness->GetIpAddressClient(true, $ip);
			$this->InstanceFacedeBusiness->GetOperationalSystem(true, $operationalSystem);
			$this->InstanceFacedeBusiness->GetBrowserClient(true, $browser);
			$sessionId = $user->GetHashCode() . "-" .		
						 $ip . "-" .
						 $operationalSystem . "-" .
						 $browser;
			$this->Session->CreatePersonalized($this->Config->DefaultApplicationName,
											   $sessionId,
											   $this->Config->SessionTime);
			$this->Session->SetSessionValue(Config::SESS_DEVICE_LAYOUT, 
														   $this->InputValueHeaderLayout);
			$this->Session->RemoveSessionVariable(Config::SESS_LOGIN_TWO_STEP_VERIFICATION);
			if($user->GetUserActive())
			{
				if($user->GetUserConfirmed())
				{	
					$this->User = $user;
					if($this->User->GetSessionExpires() == FALSE)
						$this->Session->SetSessionValue(Config::SESS_LAST_ACTIVITY,
																	Config::SESS_UNLIMITED);
					$this->Session->SetSessionValue(Config::SESS_USER, 
																$this->User);
					if($user->GetTwoStepVerification()) 
					{
						if($this->SendTwoStepVerificationCode($this->Config->DefaultApplicationName, 
															  $user->GetEmail(),$user->GetName(), $Debug) == Config::RET_OK)
							return Config::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED;
						else
						{
							$this->ShowDivReturnError("LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_FAILED");
							return Config::RET_ERROR;
						}
					}
					return Config::RET_OK;
				}
				else
				{	
					$this->User = $user;
					$this->Session->SetSessionValue(Config::SESS_USER, $this->User);
					$this->LoadNotConfirmedToolTip();
					return Config::RET_WARNING;
				}
			}
			else $this->ShowDivReturnError("USER_INACTIVE");
		}
		else $this->ShowDivReturnError("LOGIN_INVALID_LOGIN");	
	}
	
	private function ExecuteLoginSecondPhaseVerirication()
	{
		if (isset($_POST[Config::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB]))
		{
			$this->InputValueLoginTwoStepVerificationCode = $_POST[Config::LOGIN_TWO_STEP_VERIFICATION_CODE];
			$this->Session->GetSessionValue(Config::SESS_LOGIN_TWO_STEP_VERIFICATION, $value);
			if($this->InputValueLoginTwoStepVerificationCode == $value)
				return Config::RET_OK;
			else return Config::RET_ERROR;
		}
		else
		{
			$this->Session->RemoveSessionVariable(Config::SESS_USER);
			$this->Session->RemoveSessionVariable(Config::SESS_DEBUG);
		}
	}
	
	private function LoadInstanceUser()
	{
		if($this->User==NULL) 
		{
			if (!class_exists("User"))
			{
				if(file_exists(BASE_PATH_PHP_MODEL . "User.php"))
					include_once(BASE_PATH_PHP_MODEL . "User.php");
				else exit(basename(__FILE__, '.php') . ': Error Loading Base Class User');
			}
			if($this->Session->GetSessionValue(Config::SESS_USER, $this->User) == Config::RET_OK)
				return Config::RET_OK;
			else return Config::RET_ERROR;
		}
		else return Config::RET_OK;
	}
	
	private function SendTwoStepVerificationCode($Application, $UserEmail, $UserName, $Debug)
	{
		$FacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
		$code = $FacedeBusiness->GenerateRandomCode();
		$this->Session->SetSessionValue(Config::SESS_LOGIN_TWO_STEP_VERIFICATION,
													$code);
		if($FacedeBusiness->SendEmailLoginTwoStepVerificationCode($Application, 
																  $UserEmail, $UserName, $code, $Debug) == Config::RET_OK)
			return Config::RET_OK;
		else return Config::RET_ERROR;
	}
	
	protected function AssocUserNotificationLoadData($InstanceAssocUserNotification)
	{
		if($InstanceAssocUserNotification == NULL)
			$this->Session->GetSessionValue(Config::SESS_ADMIN_ASSOC_USER_NOTIFICATION, $InstanceAssocUserNotification);
		if($InstanceAssocUserNotification != NULL)
		{
			if($InstanceAssocUserNotification->GetAssocUserNotificationRead())
				$this->InputValueAssocUserNotificationRead = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueAssocUserNotificationRead = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			$this->InputValueRegisterDate = $InstanceAssocUserNotification->GetRegisterDate();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;	
	}
	
	protected function AssocUserNotificationUpdateByUserEmailAndNotificationId($AssocUserNotificationReadNew, 
		                                                                       $NotificationIdNew, $UserEmailNew, 
		                                                                       &$InstanceAssocUserNotification, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		if($AssocUserNotificationReadNew == NULL)
			$AssocUserNotificationReadNew = FALSE;
		elseif($AssocUserNotificationReadNew != FALSE)
			$AssocUserNotificationReadNew = TRUE;
		$this->InputValueAssocUserNotificationRead = $AssocUserNotificationReadNew;
		$this->InputValueNotificationId            = $NotificationIdNew;
		$this->InputValueUserEmail                 = $UserEmailNew;
		$this->InputFocus = Config::FIELD_NOTIFICATION_TEXT;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_ASSOC_USER_NOTIFICATION_READ
		$arrayElements[0]             = Config::FIELD_ASSOC_USER_NOTIFICATION_READ;
		$arrayElementsClass[0]        = &$this->ReturnAssocUserNotificationReadClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueAssocUserNotificationRead; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnAssocUserNotificationReadText;
		array_push($arrayConstants, 'FM_INVALID_ASSOC_USER_NOTIFICATION_READ', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_NOTIFICATION_ID
		$arrayElements[1]             = Config::FIELD_NOTIFICATION_TEXT;
		$arrayElementsClass[1]        = &$this->ReturnNotificationIdClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[1]        = $this->InputValueNotificationId; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 5; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnNotificationIdText;
		array_push($arrayConstants, 'FM_INVALID_NOTIFICATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_EMAIL
		$arrayElements[2]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[2]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[2]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 60; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnValueUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->AssocUserNotificationUpdateByUserEmailAndNotificationId(
				                                                                      $this->InputValueAssocUserNotificationRead, 
																					  $this->InputValueNotificationId,
																					  $this->InputValueUserEmail, 
		                                                                              $InstanceAssocUserNotification, 
																					  $Debug);
			if($return == Config::RET_OK)
			{
				$InstanceAssocUserNotification->UpdateAssocUserNotification(NULL, $this->InputValueAssocUserNotificationRead, NULL);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_ASSOC_USER_NOTIFICATION, $InstanceAssocUserNotification);
				$this->AssocUserNotificationLoadData($InstanceAssocUserNotification);
				$this->ShowDivReturnSuccess("ASSOC_USER_NOTIFICATION_UPDT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("ASSOC_USER_NOTIFICATION_UPDT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function CaptchaLoad($SessionCaptchaKey, $Debug)
	{
		$InstanceBaseCaptcha = $this->Factory->CreateCaptcha();
		$stringCaptcha = $InstanceBaseCaptcha->GenerateRandomString();
		$this->Session->SetSessionValue($SessionCaptchaKey, $stringCaptcha);
		if($Debug == Config::CHECKBOX_CHECKED)
			echo "Catpcha: " . $SessionCaptchaKey . " - " . $stringCaptcha . "<br>";
	}
	
	protected function CorporationDelete($CorporationName, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->CorporationDelete($CorporationName, $Debug, NULL, TRUE);
		if($return == Config::RET_OK)
		{
			$this->ShowDivReturnSuccess('CORPORATION_DEL_SUCCESS');
			return $return;
		}
		if($return == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
			$constant = "CORPORATION_DEL_ERROR_DEPENDENCY_DEPARTMENT";
		else $constant = "CORPORATION_DEL_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::RET_ERROR;
	}
	
	protected function CorporationInsert($CorporationActive, $CorporationName, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
		if($CorporationActive == NULL)
			$CorporationActive = FALSE;
		elseif($CorporationActive != FALSE)
			$CorporationActive = TRUE;

		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->CorporationInsert($CorporationActive, $CorporationName, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess('CORPORATION_INSERT_SUCCESS');
				return Config::RET_OK;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("CORPORATION_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function CorporationLoadData(&$InstanceCorporation)
	{
		if(isset($InstanceCorporation) && $InstanceCorporation != NULL)
		{
			if($InstanceCorporation->GetCorporationActive())
				$this->InputValueCorporationActive     = "checked"; 
			else 
				$this->InputValueCorporationActive = "";
			$this->InputValueCorporationName       = $InstanceCorporation->GetCorporationName();
			$this->InputValueRegisterDate          = $InstanceCorporation->GetRegisterDate();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	protected function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->CorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporation, 
															    $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("CORPORATION_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		return $instanceFacedePersistence->CorporationSelectActive($Limit1, $Limit2, $ArrayInstanceCorporation, $RowCount, $Debug);
	}
	
	protected function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		return $instanceFacedePersistence->CorporationSelectActiveNoLimit($ArrayInstanceCorporation, $Debug);
	}
	
	protected function CorporationSelectByName($CorporationName, &$InstanceCorporation, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
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
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->CorporationSelectByName($CorporationName, $InstanceCorporation, $Debug);
			if($return == Config::RET_OK)
			{
				$return = $this->CorporationLoadData($InstanceCorporation);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_CORPORATION, $InstanceCorporation);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("CORPORATION_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		return $instanceFacedePersistence->CorporationSelectNoLimit($ArrayInstanceCorporation, $Debug);
	}
	
	protected function CorporationUpdateByName($CorporationActive, $CorporationName, &$InstanceCorporation, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
		if($CorporationActive == NULL)
			$CorporationActive = FALSE;
		elseif($CorporationActive != FALSE)
			$CorporationActive = TRUE;

		//VALIDA NOME DE CORPORAÇÃO
		$arrayElements[0]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
												$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
												$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
												$matrixConstants, $Debug, $arrayOptions);

		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->CorporationUpdateByName($CorporationActive, $CorporationName,
																          $InstanceCorporation->GetCorporationName(), $Debug);
			if($return == Config::RET_OK)
			{
				$InstanceCorporation->SetCorporationActive($CorporationActive);
				$InstanceCorporation->SetCorporationName($CorporationName);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_CORPORATION, $InstanceCorporation);
				$this->CorporationLoadData($InstanceCorporation);
				$this->ShowDivReturnSuccess('CORPORATION_UPDT_SUCCESS');
				return $return;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;	
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnError("CORPORATION_UPDT_ERROR_UNIQUE_EXISTS");
				return Config::RET_ERROR;
			}
		}
		$this->ShowDivReturnError("CORPORATION_UPDT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function CountrySelect($Limit1, $Limit2, &$ArrayInstanceCountry, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->CountrySelect($Limit1, $Limit2, $ArrayInstanceCountry, $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("COUNTRY_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug);
		if($return == Config::RET_OK)
		{
			$this->ShowDivReturnSuccess('DEPARTMENT_DEL_SUCCESS');
			return Config::RET_OK;
		}
		if($return == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
			$constant = "DEPARTMENT_DEL_ERROR_DEPENDENCY_USERS";	
		else $constant = "DEPARTMENT_DEL_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::RET_ERROR;
	}
	
	protected function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug)
	{
		$this->InputValueDepartmentName = $DepartmentName;
		$this->InputValueDepartmentInitials = $DepartmentInitials;
		$this->InputValueCorporationName = $CorporationName;
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayElements = array(); $arrayElementsClass = array(); $arrayElementsDefaultValue = array(); $arrayElementsForm = array();
		$arrayElementsInput = array(); $arrayElementsMinValue = array(); $arrayElementsMaxValue = array();
		$arrayElementsNullable = array(); $arrayElementsText = array(); $arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_DEPARTMENT_INITIALS
		$arrayElements[0]             = Config::FIELD_DEPARTMENT_INITIALS;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentInitialsClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DEPARTMENT_INITIALS;
		$arrayElementsInput[0]        = $this->InputValueDepartmentInitials; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnDepartmentInitialsText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_INITIALS', 'FM_INVALID_DEPARTMENT_INITIALS_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_DEPARTMENT_NAME
		$arrayElements[1]             = Config::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[1] = "";
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME; 
		$arrayElementsInput[1]        = $this->InputValueDepartmentName;
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = FALSE; 
		$arrayElementsText[1]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
        //FIELD_CORPORATION_NAME
		$arrayElements[2]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[2]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[2]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->DepartmentInsert($this->InputValueCorporationName,
														           $this->InputValueDepartmentInitials,
														           $this->InputValueDepartmentName, 
														           $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess('DEPARTMENT_INSERT_SUCCESS');
				return Config::RET_OK;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::RET_WARNING;
			}
			elseif($return == Config::DB_CODE_ERROR_FOREIGN_KEY_INSERT_RESTRICT)
			{
				$this->ShowDivReturnError("DEPARTMENT_INSERT_ERROR_NO_CORPORATION");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function DepartmentLoadData($InstanceDepartment)
	{
		if(isset($InstanceDepartment) && $InstanceDepartment != NULL)
		{
			$this->InputValueCorporationName     = $InstanceDepartment->GetDepartmentCorporationName();
			$this->InputValueDepartmentInitials  = $InstanceDepartment->GetDepartmentInitials();
			$this->InputValueDepartmentName      = $InstanceDepartment->GetDepartmentName();
			$this->InputValueRegisterDate        = $InstanceDepartment->GetRegisterDate();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	protected function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->DepartmentSelect($Limit1, $Limit2,
															   $ArrayInstanceDepartment,
															   $RowCount,
															   $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, &$ArrayInstanceDepartment, 
													     &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
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
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->DepartmentSelectByCorporationName($CorporationName,
																					$Limit1, $Limit2,
																		            $ArrayInstanceDepartment,
																					$RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $ArrayInstanceDepartment);
				return $return;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
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
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->DepartmentSelectByCorporationNameNoLimit($CorporationName,
																		                   $ArrayInstanceDepartment, 
																		                   $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $ArrayInstanceDepartment);
				return $return;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueDepartmentName = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_DEPARTMENT_NAME
		$arrayElements[0]             = Config::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[0]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->DepartmentSelectByDepartmentName($this->InputValueDepartmentName, 
																		   $ArrayInstanceDepartment, $Debug);
			if($return == Config::RET_OK)
				return $return;
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
																		  &$InstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueCorporationName = $CorporationName;
		$this->InputValueDepartmentName = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_DEPARTMENT_NAME
		$arrayElements[1]             = Config::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->DepartmentSelectByDepartmentNameAndCorporationName(
				                                                                     $this->InputValueCorporationName, 
																				     $this->InputValueDepartmentName,
																		             $InstanceDepartment, $Debug);
			if($return == Config::RET_OK)
			{
				$return = $this->DepartmentLoadData($InstanceDepartment);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $InstanceDepartment);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->DepartmentSelectNoLimit($ArrayInstanceDepartment, $Debug);
		if($return == Config::RET_OK)
		{
			$this->ShowDivReturnEmpty();
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function DepartmentUpdateDepartmentByDepartmentAndCorporation($DepartmentInitialsNew, $DepartmentNameNew, 
																			&$InstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueDepartmentInitials = $DepartmentInitialsNew;
		$this->InputValueDepartmentName  = $DepartmentNameNew;
		$this->InputFocus = Config::FIELD_DEPARTMENT_NAME;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_DEPARTMENT_INITIALS
		$arrayElements[0]             = Config::FIELD_DEPARTMENT_INITIALS;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentInitialsClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DEPARTMENT_INITIALS;
		$arrayElementsInput[0]        = $this->InputValueDepartmentInitials; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnDepartmentInitialsText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_INITIALS', 'FM_INVALID_DEPARTMENT_INITIALS_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//FIELD_DEPARTMENT_NAME
		$arrayElements[1]             = Config::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->DepartmentUpdateDepartmentByDepartmentAndCorporation(
															   $InstanceDepartment->GetDepartmentCorporationName(),
															   $this->InputValueDepartmentInitials,
															   $this->InputValueDepartmentName,
															   $InstanceDepartment->GetDepartmentName(), 
															   $Debug);
			if($return == Config::RET_OK)
			{
				$InstanceDepartment->SetDepartmentInitials($this->InputValueDepartmentInitials);
				$InstanceDepartment->SetDepartmentName($this->InputValueDepartmentName);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $InstanceDepartment);
				$this->DepartmentLoadData($InstanceDepartment);
				$this->ShowDivReturnSuccess("DEPARTMENT_UPDT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_UPDT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function DepartmentUpdateCorporationByCorporationAndDepartment($CorporationNameNew, &$InstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationNameNew;
		$this->InputValueDepartmentName  = $InstanceDepartment->GetDepartmentName();
		$this->InputFocus = Config::FIELD_DEPARTMENT_NAME;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_DEPARTMENT_NAME
		$arrayElements[0]             = Config::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[0]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'DEPARTMENT_INVALID_NAME', 'DEPARTMENT_INVALID_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//FIELD_CORPORATION_NAME
		$arrayElements[1]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[1]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->DepartmentUpdateCorporationByCorporationAndDepartment(
				                                                                        $this->InputValueCorporationName,
															                            $InstanceDepartment->GetDepartmentCorporationName(),
															                            $InstanceDepartment->GetDepartmentName(),
															                            $Debug);
			if($return == Config::RET_OK)
			{
				$return = $this->CorporationSelectByName($this->InputValueCorporationName, $InstanceCorporation, $Debug);
				if($return == Config::RET_OK)
				{
					$return = $this->DepartmentLoadData($InstanceDepartment);
					if($return == Config::RET_OK)
					{
						$InstanceDepartment->SetDepartmentCorporation($InstanceCorporation);
						$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $InstanceDepartment);
						$this->DepartmentLoadData($InstanceDepartment);
						$this->ShowDivReturnSuccess("DEPARTMENT_UPDT_SUCCESS");
						return Config::RET_OK;
					}
					else
					{
						$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
						return Config::RET_ERROR;
					}
				}
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_UPDT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function ExecuteFunction($PostForm, $Function, $ArrayParameter, $Debug, $StoreSession = NULL)
	{
		if($Debug == Config::CHECKBOX_CHECKED)
		{
			echo "<b>Execute Function</b>:<br>";
		}
		foreach($PostForm as $postElementKey=>$postElementValue)
		{
			$postElementKey = strtoupper($postElementKey);
			if((strpos($postElementKey, 'LIST') !== FALSE) && strpos($postElementKey, 'LIMIT') == FALSE)
			{
				if($Debug == Config::CHECKBOX_CHECKED)
				{
					echo "&emsp;<b>Post Element Key</b>: " . $postElementKey . "<br>";
				}
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if(strpos($postElementKey, 'BACK') !== FALSE)
				{
					$this->InputLimitOne = $_POST[Config::FM_LST_INPUT_LIMIT_ONE] - 25;
					$this->InputLimitTwo = $_POST[Config::FM_LST_INPUT_LIMIT_TWO] - 25;
					if($this->InputLimitOne < 0)
						$this->InputLimitOne = 0;
					if($this->InputLimitTwo <= 0)
						$this->InputLimitTwo = 25;
				}
				elseif (strpos($postElementKey, 'FORWARD') !== FALSE) 
				{
					$this->InputLimitOne = $_POST[Config::FM_LST_INPUT_LIMIT_ONE] + 25;
					$this->InputLimitTwo = $_POST[Config::FM_LST_INPUT_LIMIT_TWO] + 25;
					$ArrayParameterTemp = $ArrayParameter;
					array_unshift($ArrayParameterTemp, $this->InputLimitOne, $this->InputLimitTwo);
				    $ArrayParameter[count($ArrayParameterTemp)] = &$rowCount;
				    $ArrayParameterTemp[count($ArrayParameterTemp)] = &$rowCount;
					array_push($ArrayParameterTemp, $Debug);
					array_push($ArrayParameterTemp, $StoreSession);
					if($Debug == Config::CHECKBOX_CHECKED)
					{
						echo "&emsp;<b>Array Parameter List Forward</b>: ";
						print_r($ArrayParameterTemp); echo "<br>";
					}
					$return = call_user_func_array(array($this, $Function), $ArrayParameterTemp);
					if($this->InputLimitOne > $rowCount)
					{
						$this->InputLimitOne = $this->InputLimitOne - 25;
						$this->InputLimitTwo = $this->InputLimitTwo - 25;
					}
					elseif($this->InputLimitTwo > $rowCount)
					{
						$this->InputLimitOne = $this->InputLimitOne - 25;
						$this->InputLimitTwo = $this->InputLimitTwo - 25;
					}
					if($return == Config::RET_OK)
						return Config::RET_OK;
					else 
					{
						array_unshift($ArrayParameter, $this->InputLimitOne, $this->InputLimitTwo);
						$ArrayParameter[count($ArrayParameter)] = &$rowCount;
						array_push($ArrayParameter, $Debug);
						array_push($ArrayParameter, $StoreSession);
						if($Debug == Config::CHECKBOX_CHECKED)
						{
							echo "&emsp;<b>Array Parameter List Forward (2)</b>: ";
							print_r($ArrayParameter); echo "<br>";
						}
						$return = call_user_func_array(array($this, $Function), $ArrayParameter);
						if($return == Config::RET_OK)
							$this->ShowDivReturnEmpty();
						return $return;
					}
				}
				array_unshift($ArrayParameter, $this->InputLimitOne, $this->InputLimitTwo);
				$ArrayParameter[count($ArrayParameter)] = &$rowCount;
				array_push($ArrayParameter, $Debug);
				array_push($ArrayParameter, $StoreSession);
				if($Debug == Config::CHECKBOX_CHECKED)
				{
					echo "&emsp;<b>Array Parameter List</b>:";
					print_r($ArrayParameter); echo "<br>";
				}
				return call_user_func_array(array($this, $Function), $ArrayParameter);
			}
			elseif(strpos($postElementKey, 'LIST') == FALSE)
			{
				array_push($ArrayParameter, $Debug);
				array_push($ArrayParameter, $StoreSession);
				if($Debug)
				{
					echo "<b>ArrayParameter</b>:<br>";
					foreach ($ArrayParameter as $key => $value)
					{
						if(is_object($value))
							{echo "<b>" . $key . "</b>: "; print_r($value); echo "<br>";}
						else
							echo "<b>" . $key . "</b>: " . $value . "<br>";
					}
				}
				return call_user_func_array(array($this, $Function), $ArrayParameter); 
			}
		}
	}
	
	protected function LoadHtml($HasLoginForm, $EnableDivPush = TRUE)
	{
		$page = str_replace("_", "", $this->GetCurrentPage());
		echo Config::HTML_TAG_DOCTYPE;
		echo Config::HTML_TAG_START;
		$return = $this->IncludeHeadAll($HasLoginForm);
		if ($return == Config::RET_OK)
		{
			echo Config::HTML_TAG_BODY_START;
			echo "<div class='Wrapper'>";
			include_once(REL_PATH . Config::PATH_HEADER . ".php");
			if($HasLoginForm)
			{
				$loginStatus = $this->CheckInstanceUser();
				if($loginStatus == Config::USER_NOT_LOGGED_IN || $loginStatus == Config::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
				{
					include_once(REL_PATH . Config::PATH_BODY_PAGE . str_replace("_","",Config::PAGE_NOT_LOGGED_IN) . ".php");
					$this->InputFocus = Config::FIELD_LOGIN;
					echo $this->TagOnloadFocusField(Config::FM_LOGIN, $this->InputFocus);
				}
				elseif($loginStatus == Config::USER_NOT_CONFIRMED)
				{
					include_once(REL_PATH . Config::PATH_BODY_PAGE . str_replace("_","",Config::PAGE_NOT_CONFIRMED) . ".php");
				}
				else include_once(REL_PATH . Config::PATH_BODY_PAGE . $page . ".php");
			}
			else include_once(REL_PATH . Config::PATH_BODY_PAGE . $page . ".php");
			if($EnableDivPush)
			{
				echo "<div class='DivPush'></div>";
				echo "</div>";
			}
			include_once(REL_PATH . Config::PATH_FOOTER);
			echo Config::HTML_TAG_BODY_END;
			echo Config::HTML_TAG_END;
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	protected function LoadDataFromSession($SessionKey, $Function, &$Instance)
	{
		if(isset($Function) && isset($SessionKey))
		{
			if(!isset($Instance))
			{
				if($this->Session->GetSessionValue($SessionKey, $Instance) != Config::RET_OK)
				{	
					return Config::RET_ERROR;
				}
			}
			return $this->$Function($Instance);
		}
		else return Config::RET_ERROR;
	}
	
	protected function NotificationDeleteByNotificationId($InstanceNotification, $Debug)
	{
		if($InstanceNotification != NULL)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->NotificationDeleteByNotificationId($InstanceNotification->GetNotificationId(), $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_NOTIFICATION, $InstanceNotification);
				$this->ShowDivReturnSuccess("NOTIFICATION_DEL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("NOTIFICATION_DEL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function NotificationInsert($NotificationActive, $NotificationText, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		if($NotificationActive == NULL)
			$NotificationActive = FALSE;
		elseif($NotificationActive != FALSE)
			$NotificationActive = TRUE;
		$this->InputValueNotificationActive = $NotificationActive;
		$this->InputValueNotificationText   = $NotificationText;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_NOTIFICATION_ACTIVE
		$arrayElements[0]             = Config::FIELD_NOTIFICATION_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnNotificationActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueNotificationActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnNotificationActiveText;
		array_push($arrayConstants, 'FM_INVALID_NOTIFICATION_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_NOTIFICATION_TEXT
		$arrayElements[1]             = Config::FIELD_NOTIFICATION_TEXT;
		$arrayElementsClass[1]        = &$this->ReturnNotificationTextClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueNotificationText; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 500; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnNotificationTextText;
		array_push($arrayConstants, 'FM_INVALID_NOTIFICATION_TEXT', 
				                    'FM_INVALID_NOTIFICATION_TEXT_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->NotificationInsert($this->InputValueNotificationActive, $this->InputValueNotificationText, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("NOTIFICATION_INSERT_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("NOTIFICATION_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function NotificationLoadData($InstanceNotification)
	{
		if($InstanceNotification == NULL)
			$this->Session->GetSessionValue(Config::SESS_ADMIN_NOTIFICATION, $InstanceNotification);
		if($InstanceNotification != NULL)
		{
			if($InstanceNotification->GetNotificationActive())
				$this->InputValueNotificationActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
			else $this->InputValueNotificationActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
			$this->InputValueNotificationId   = $InstanceNotification->GetNotificationId();
			$this->InputValueNotificationText = $InstanceNotification->GetNotificationText();
			$this->InputValueRegisterDate     = $InstanceNotification->GetRegisterDate();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;	
	}
	
	protected function NotificationSelect($Limit1, $Limit2, &$ArrayInstanceNotification, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->NotificationSelect($Limit1, $Limit2, $ArrayInstanceNotification, $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("NOTIFICATION_NOT_FOUND");
		return Config::RET_ERROR;	
	}
	
	protected function NotificationSelectByNotificationId($NotificationId, &$InstanceNotification, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueNotificationId = $NotificationId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_NOTIFICATION_ID
		$arrayElements[0]             = Config::FIELD_NOTIFICATION_ID;
		$arrayElementsClass[0]        = &$this->ReturnNotificationIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueNotificationId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnNotificationIdText;
		array_push($arrayConstants, 'FM_INVALID_NOTIFICATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->NotificationSelectByNotificationId($this->InputValueNotificationId, $InstanceNotification, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_NOTIFICATION, $InstanceNotification);
				$this->NotificationLoadData($InstanceNotification);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("NOTIFICATION_NOT_FOUND");
		return Config::RET_ERROR;	
	}
	
	protected function NotificationUpdateByNotificationId($NotificationActiveNew, $NotificationTextNew, &$InstanceNotification, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		if($NotificationActiveNew == NULL)
			$NotificationActiveNew = FALSE;
		elseif($NotificationActiveNew != FALSE)
			$NotificationActiveNew = TRUE;
		$this->InputValueNotificationActive = $NotificationActiveNew;
		$this->InputValueNotificationText   = $NotificationTextNew;
		$this->InputFocus = Config::FIELD_NOTIFICATION_TEXT;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_NOTIFICATION_ACTIVE
		$arrayElements[0]             = Config::FIELD_NOTIFICATION_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnNotificationActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueNotificationActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnNotificationActiveText;
		array_push($arrayConstants, 'FM_INVALID_NOTIFICATION_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_NOTIFICATION_TEXT
		$arrayElements[1]             = Config::FIELD_NOTIFICATION_TEXT;
		$arrayElementsClass[1]        = &$this->ReturnNotificationTextClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueNotificationText; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 500; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnNotificationTextText;
		array_push($arrayConstants, 'FM_INVALID_NOTIFICATION_TEXT', 'FM_INVALID_NOTIFICATION_TEXT_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->NotificationUpdateByNotificationId($this->InputValueNotificationActive, 
																			         $this->InputValueNotificationText,
		                                                                             $InstanceNotification->GetNotificationId(), $Debug);
			if($return == Config::RET_OK)
			{
				$InstanceNotification->UpdateNotification($this->InputValueNotificationActive, $this->InputValueNotificationText, NULL);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_NOTIFICATION, $InstanceNotification);
				$this->SystemConfigurationLoadData($InstanceNotification);
				$this->ShowDivReturnSuccess("NOTIFICATION_UPDT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("NOTIFICATION_UPDT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function PageStackSessionLoad()
	{
	    $arrayPageForm = array();
		if($this->Session->GetSessionValue(Config::SESS_PAGE_STACK_NUMBER, $pageFormNumber) == Config::RET_OK)
		{
			if($pageFormNumber==0)
				return Config::RET_ERROR;
			if($this->Session->GetSessionValue(Config::SESS_PAGE_SACK, $arrayPageForm) == Config::RET_OK)
			{
				if(isset($arrayPageForm[$pageFormNumber-1]))
				{
					$_POST = $arrayPageForm[$pageFormNumber-1];
					array_pop($arrayPageForm);
					$pageFormNumber--;
				}
				$this->Session->SetSessionValue(Config::SESS_PAGE_STACK_NUMBER, $pageFormNumber);
				$this->Session->SetSessionValue(Config::SESS_PAGE_SACK, $arrayPageForm);
				return Config::RET_OK;
			}
		}
		return Config::RET_ERROR;
	}
	
	protected function PageStackSessionRemoveAll()
	{
		$arrayPageForm = array();
		if($this->Session->GetSessionValue(Config::SESS_PAGE_STACK_NUMBER, $pageFormNumber) == Config::RET_OK)
		{
			if($this->Session->GetSessionValue(Config::SESS_PAGE_SACK, $arrayPageForm) == Config::RET_OK)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_PAGE_STACK_NUMBER);
				$this->Session->RemoveSessionVariable(Config::SESS_PAGE_SACK);
				return Config::RET_OK;
			}
		}
	}
	
	protected function PageStackSessionSave()
	{
		$this->Session->GetSessionValue(Config::SESS_PAGE_STACK_NUMBER, $pageFormNumber);
		if(isset($pageFormNumber)) 
			$pageFormNumber++;
		else $pageFormNumber = 0;
		$this->Session->GetSessionValue(Config::SESS_PAGE_SACK, $arrayPageForm);
		if(isset($arrayPageForm)) 
			array_push($arrayPageForm, $_POST);
		else 
		{	
			$arrayPageForm = array();
			array_push($arrayPageForm, $_POST);
		}
 		$this->Session->SetSessionValue(Config::SESS_PAGE_SACK, $arrayPageForm);
		$this->Session->SetSessionValue(Config::SESS_PAGE_STACK_NUMBER, $pageFormNumber);
	}
	
	protected function SystemConfigurationDeleteBySystemConfigurationOptionNumber($InstanceSystemConfiguration, $Debug)
	{
		if($InstanceSystemConfiguration != NULL)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->SystemConfigurationDeleteBySystemConfigurationOptionNumber(
				                                        $InstanceSystemConfiguration->GetSystemConfigurationOptionNumber(), $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_SYSTEM_CONFIGURATION, $InstanceSystemConfiguration);
				$this->ShowDivReturnSuccess("SYSTEM_CONFIGURATION_DEL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("SYSTEM_CONFIGURATION_DEL_ERROR");
		return Config::RET_ERROR;	
	}
	
	protected function SystemConfigurationInsert($SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
	                                             $SystemConfigurationOptionName, $SystemConfigurationOptionValue, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		if($SystemConfigurationOptionActive == NULL)
			$SystemConfigurationOptionActive = FALSE;
		elseif($SystemConfigurationOptionActive != FALSE)
			$SystemConfigurationOptionActive = TRUE;
		$this->InputValueSystemConfigurationOptionActive      = $SystemConfigurationOptionActive;
		$this->InputValueSystemConfigurationOptionDescription = $SystemConfigurationOptionDescription;
		$this->InputValueSystemConfigurationOptionName        = $SystemConfigurationOptionName;
		$this->InputValueSystemConfigurationOptionValue       = $SystemConfigurationOptionValue;
		$arrayConstants = array(); $matrixConstants = array();
		//FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE
		$arrayElements[0]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnSystemConfigurationOptionActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueSystemConfigurationOptionActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnSystemConfigurationOptionActiveText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION
		$arrayElements[1]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION;
		$arrayElementsClass[1]        = &$this->ReturnSystemConfigurationOptionDescriptionClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueSystemConfigurationOptionDescription; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 100; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnSystemConfigurationOptionDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION', 
				                    'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_SYSTEM_CONFIGURATION_OPTION_NAME
		$arrayElements[2]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME;
		$arrayElementsClass[2]        = &$this->ReturnSystemConfigurationOptionClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[2]        = $this->InputValueSystemConfigurationOptionName; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnSystemConfigurationOptionNameText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME', 
				                    'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE
		$arrayElements[3]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE;
		$arrayElementsClass[3]        = &$this->ReturnSystemConfigurationOptionValueClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[3]        = $this->InputValueSystemConfigurationOptionValue; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 45; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnSystemConfigurationOptionValueText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE',
				                    'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->SystemConfigurationInsert($this->InputValueSystemConfigurationOptionActive,
																	        $this->InputValueSystemConfigurationOptionDescription,
	                                                                        $this->InputValueSystemConfigurationOptionName, 
																	        $this->InputValueSystemConfigurationOptionValue, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("SYSTEM_CONFIGURATION_INSERT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("SYSTEM_CONFIGURATION_INSERT_EXISTS");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("SYSTEM_CONFIGURATION_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
    protected function SystemConfigurationLoadData($InstanceSystemConfiguration)
	{
		if($this->InstanceSystemConfiguration == NULL)
			$this->Session->GetSessionValue(Config::SESS_ADMIN_SYSTEM_CONFIGURATION, $InstanceSystemConfiguration);
		if($InstanceSystemConfiguration != NULL)
		{
			$this->InputValueRegisterDate                         = $InstanceSystemConfiguration->GetRegisterDate();
			if($InstanceSystemConfiguration->GetSystemConfigurationOptionActive())
				$this->InputValueSystemConfigurationOptionActive = "checked";
			$this->InputValueSystemConfigurationOptionDescription = $InstanceSystemConfiguration->GetSystemConfigurationOptionDescription();
			$this->InputValueSystemConfigurationOptionName        = $InstanceSystemConfiguration->GetSystemConfigurationOptionName();
			$this->InputValueSystemConfigurationOptionNumber      = $InstanceSystemConfiguration->GetSystemConfigurationOptionNumber();
			$this->InputValueSystemConfigurationOptionValue       = $InstanceSystemConfiguration->GetSystemConfigurationOptionValue();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;	
	}
	
	protected function SystemConfigurationSelect($Limit1, $Limit2, &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->SystemConfigurationSelect($Limit1, $Limit2, $ArrayInstanceSystemConfiguration, $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("SYSTEM_CONFIGURATION_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function SystemConfigurationSelectBySystemConfigurationOptionName($Limit1, $Limit2, $SystemConfigurationOptionName, 
	                                                                            &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueSystemConfigurationOptionName = $SystemConfigurationOptionName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_SYSTEM_CONFIGURATION_OPTION_NAME
		$arrayElements[0]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnSystemConfigurationOptionNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueSystemConfigurationOptionName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnSystemConfigurationOptionNameText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME', 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->SystemConfigurationSelectBySystemConfigurationOptionName($Limit1, $Limit2,
				                                                                              $this->InputValueSystemConfigurationOptionName, 
																						      $ArrayInstanceSystemConfiguration, $RowCount,
																						      $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_SYSTEM_CONFIGURATION, $ArrayInstanceSystemConfiguration);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("SYSTEM_CONFIGURATION_NOT_FOUND");
		return Config::RET_ERROR;	
	}
	
	protected function SystemConfigurationSelectBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, 
	                                                                              &$InstanceSystemConfiguration, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueSystemConfigurationOptionNumber = $SystemConfigurationOptionNumber;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER
		$arrayElements[0]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER;
		$arrayElementsClass[0]        = &$this->ReturnSystemConfigurationOptionNumberClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueSystemConfigurationOptionNumber; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnSystemConfigurationOptionNumberText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NUMBER', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->SystemConfigurationSelectBySystemConfigurationOptionNumber(
				                                                          $this->InputValueSystemConfigurationOptionNumber, 
				                                                          $InstanceSystemConfiguration, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_SYSTEM_CONFIGURATION, $InstanceSystemConfiguration);
				$this->SystemConfigurationLoadData($InstanceSystemConfiguration);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("SYSTEM_CONFIGURATION_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function SystemConfigurationUpdateBySystemConfigurationOptionNumber($SystemConfigurationOptionActiveNew,
		                                                                          $SystemConfigurationOptionDescriptionNew,
		                                                                          $SystemConfigurationOptionNameNew,
				   		 												          $SystemConfigurationOptionValueNew,
		                                                                          &$InstanceSystemConfiguration, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		if($SystemConfigurationOptionActiveNew == NULL)
			$SystemConfigurationOptionActiveNew = FALSE;
		elseif($SystemConfigurationOptionActiveNew != FALSE)
			$SystemConfigurationOptionActiveNew = TRUE;
		$this->InputValueSystemConfigurationOptionActive      = $SystemConfigurationOptionActiveNew;
		$this->InputValueSystemConfigurationOptionDescription = $SystemConfigurationOptionDescriptionNew;
		$this->InputValueSystemConfigurationOptionName        = $SystemConfigurationOptionNameNew;
		$this->InputValueSystemConfigurationOptionValue       = $SystemConfigurationOptionValueNew;
		$this->InputFocus = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE
		$arrayElements[0]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnSystemConfigurationOptionActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueSystemConfigurationOptionActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 4; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnSystemConfigurationOptionActiveText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION
		$arrayElements[1]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION;
		$arrayElementsClass[1]        = &$this->ReturnSystemConfigurationOptionDescriptionClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueSystemConfigurationOptionDescription; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 100; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnSystemConfigurationOptionDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION', 
				                    'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_SYSTEM_CONFIGURATION_OPTION_NAME
		$arrayElements[2]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME;
		$arrayElementsClass[2]        = &$this->ReturnSystemConfigurationOptionClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[2]        = $this->InputValueSystemConfigurationOptionName; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnSystemConfigurationOptionNameText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME', 
				                    'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE
		$arrayElements[3]             = Config::FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE;
		$arrayElementsClass[3]        = &$this->ReturnSystemConfigurationOptionValueClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[3]        = $this->InputValueSystemConfigurationOptionValue; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 45; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnSystemConfigurationOptionValueText;
		array_push($arrayConstants, 'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE',
				                    'FM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->SystemConfigurationUpdateBySystemConfigurationOptionNumber(
				                                                 $this->InputValueSystemConfigurationOptionActive,
		                                                         $this->InputValueSystemConfigurationOptionDescription,
		                                                         $this->InputValueSystemConfigurationOptionName,
				   		 										 $this->InputValueSystemConfigurationOptionValue,
		                                                         $InstanceSystemConfiguration->GetSystemConfigurationOptionNumber(), 
				                                                 $Debug);
			if($return == Config::RET_OK)
			{
				$InstanceSystemConfiguration->UpdateSystemConfiguration(NULL, $this->InputValueSystemConfigurationOptionActive,
																	    $this->InputValueSystemConfigurationOptionDescription,
																	    $this->InputValueSystemConfigurationOptionName,
																	    $this->InputValueSystemConfigurationOptionValue);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_SYSTEM_CONFIGURATION, $InstanceSystemConfiguration);
				$this->SystemConfigurationLoadData($InstanceSystemConfiguration);
				$this->ShowDivReturnSuccess("SYSTEM_CONFIGURATION_UPDT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("SYSTEM_CONFIGURATION_UPDT_ERROR");
		return Config::RET_ERROR;	
	}
	
	protected function TeamDeleteByTeamId($InstanceTeam, $Debug)
	{
		if($InstanceTeam != NULL)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TeamDeleteByTeamId($InstanceTeam->GetTeamId(), $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TEAM, $InstanceTeam);
				$this->ShowDivReturnSuccess("TEAM_DEL_SUCCESS");
				return Config::RET_OK;
			}
		}
		if($return == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
			$constant = "TEAM_DEL_ERROR_DEPENDENCY_TEAM";
		else $constant = "TEAM_DEL_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::RET_ERROR;
	}
	
	protected function TeamInsert($TeamDescription, $TeamName, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTeamDescription = $TeamDescription;
		$this->InputValueTeamName = $TeamName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 120; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TEAM_DESCRIPTION', 'FM_INVALID_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TEAM_NAME
		$arrayElements[1]             = Config::FIELD_TEAM_NAME;
		$arrayElementsClass[1]        = &$this->ReturnTeamNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_TEAM_NAME;
		$arrayElementsInput[1]        = $this->InputValueTeamName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnTeamNameText;
		array_push($arrayConstants, 'FM_INVALID_TEAM_NAME', 'FM_INVALID_TEAM_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TeamInsert($this->InputValueTeamDescription, $this->InputValueTeamName, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("TEAM_INSERT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TEAM_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function TeamLoadData(&$InstanceTeam)
	{
		if($this->InstanceTeam == NULL)
			$this->Session->GetSessionValue(Config::SESS_ADMIN_TEAM, $InstanceTeam);
		if($InstanceTeam != NULL)
		{
			$this->InputValueTeamId           = $InstanceTeam->GetTeamId();
			$this->InputValueTeamDescription  = $InstanceTeam->GetTeamDescription();
			$this->InputValueTeamName         = $InstanceTeam->GetTeamName();
			$this->InputValueRegisterDate     = $InstanceTeam->GetRegisterDate();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	protected function TeamSelect($Limit1, $Limit2, &$ArrayInstanceTeam, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TeamSelect($Limit1, $Limit2, $ArrayInstanceTeam, $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("TEAM_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TeamSelectByTeamId($TeamId, &$InstanceTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTeamId = $TeamId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TEAM_ID
		$arrayElements[0]             = Config::FIELD_TEAM_ID;
		$arrayElementsClass[0]        = &$this->ReturnTeamIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTeamId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 2; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamIdText;
		array_push($arrayConstants, 'FM_INVALID_TEAM_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TeamSelectByTeamId($this->InputValueTeamId, $InstanceTeam, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TEAM, $InstanceTeam);
				$this->TeamLoadData($InstanceTeam);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("TEAM_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TeamSelectByTeamName($TeamName, &$ArrayInstanceTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTeamName = $TeamName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TEAM_NAME
		$arrayElements[0]             = Config::FIELD_TEAM_NAME;
		$arrayElementsClass[0]        = &$this->ReturnTeamNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_TEAM_NAME;
		$arrayElementsInput[0]        = $this->InputValueTeamName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 2; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamNameText;
		array_push($arrayConstants, 'FM_INVALID_TEAM_NAME', 'FM_INVALID_TEAM_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		$return = Config::RET_OK;
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TeamSelectByTeamName($this->InputValueTeamName, $ArrayInstanceTeam, $Debug);
			if($return == Config::RET_OK)
				return Config::RET_OK;
		}
		$this->ShowDivReturnError("TEAM_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TeamUpdateByTeamId($TeamDescriptionNew, $TeamNameNew, &$InstanceTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTeamDescription  = $TeamDescriptionNew;
		$this->InputValueTeamName = $TeamNameNew;
		$this->InputFocus = Config::FIELD_TEAM_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 120; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TEAM_DESCRIPTION', 'FM_INVALID_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//FIELD_TEAM_NAME
		$arrayElements[1]             = Config::FIELD_TEAM_NAME;
		$arrayElementsClass[1]        = &$this->ReturnTeamNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_TEAM_NAME;
		$arrayElementsInput[1]        = $this->InputValueTeamName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnTeamNameText;
		array_push($arrayConstants, 'FM_INVALID_TEAM_NAME', 'FM_INVALID_TEAM_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TeamUpdateByTeamId($this->InputValueTeamDescription, $InstanceTeam->GetTeamId(),
																	 $this->InputValueTeamName, $Debug);
			if($return == Config::RET_OK)
			{
				$InstanceTeam->SetTeamDescription($this->InputValueTeamDescription);
				$InstanceTeam->SetTeamName($this->InputValueTeamName);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TEAM, $InstanceTeam);
				$this->TeamLoadData($InstanceTeam);
				$this->ShowDivReturnSuccess("TEAM_UPDT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TEAM_UPDT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function TicketDeleteByTicketId($InstanceTicket, $Debug)
	{
		if($InstanceTicket != NULL)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TicketDeleteByTicketId($InstanceTicket->GetTicketId(), $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->ShowDivReturnSuccess("TICKET_DEL_SUCCESS");
				return $return;
			}
			if($return == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
				$constant = "TICKET_ERROR_DEPENDENCY";
			else $constant = "TICKET_DEL_ERROR";
			$this->ShowDivReturnError($constant);
			return Config::RET_ERROR;
		}
	}
	
	protected function TicketInsert($TicketDescription, $TicketSuggestion, $TicketTitle, $TypeStatusTicketDescription, 
									$TypeTicketDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTeamDescription             = $TicketDescription;
		$this->InputValueTicketSuggestion            = $TicketSuggestion;
		$this->InputValueTicketTitle                 = $TicketTitle;
		$this->InputValueTypeStatusTicketDescription = $TypeStatusTicketDescription;
		$this->InputValueTypeTicketDescription       = $TypeTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 500; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TICKET_DESCRIPTION', 'FM_INVALID_TICKET_DESCRIPTION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TICKET_SUGGESTION
		$arrayElements[1]             = Config::FIELD_TICKET_SUGGESTION;
		$arrayElementsClass[1]        = &$this->ReturnTicketSuggestionClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueTicketSuggestion; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnTicketSuggestionText;
		array_push($arrayConstants, 'FM_INVALID_TICKET_SUGGESTION', 'FM_INVALID_TICKET_SUGGESTION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TICKET_TITLE
		$arrayElements[2]             = Config::FIELD_TICKET_TITLE;
		$arrayElementsClass[2]        = &$this->ReturnTicketTitleClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FM_VALIDATE_FUNCTION_TITLE;
		$arrayElementsInput[2]        = $this->InputValueTicketTitle; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 90; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnTicketTitleText;
		array_push($arrayConstants, 'FM_INVALID_TICKET_TITLE', 'FM_INVALID_TICKET_TITLE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[3]             = Config::FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[3]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[3]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 45; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION', 'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TicketInsert($this->InputValueTicketDescription, $this->InputValueTeamName, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("TICKET_INSERT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TICKET_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function TicketLoadData($InstanceTicket)
	{
		if($InstanceTicket != NULL)
		{
			$this->InputValueTicketId          = $InstanceTicket->GetTicketId();
			$this->InputValueRegisterDate      = $InstanceTicket->GetRegisterDate();
			$this->InputValueServiceName       = $InstanceTicket->GetTicketServiceName();
			$this->InputValueStatusName        = $InstanceTicket->GetTicketStatusName();
			$this->InputValueSuggestion        = $InstanceTicket->GetTicketSuggestion();
			$this->InputValueTicketDescription = $InstanceTicket->GetTicketDescription();
			$this->InputValueTitle             = $InstanceTicket->GetTicketTitle();
			$this->InputValueType              = $InstanceTicket->GetTicketTypeName();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	protected function TicketSelect($Limit1, $Limit2, &$ArrayInstanceTicket, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TicketSelect($Limit1, $Limit2, $ArrayInstanceTicket, $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TicketSelectByTicketId($TicketId, &$InstanceTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTicketId = $TicketId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TICKET_ID
		$arrayElements[0]             = Config::FIELD_TICKET_ID;
		$arrayElementsClass[0]        = &$this->ReturnTicketIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTicketId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 2; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTicketIdText;
		array_push($arrayConstants, 'FM_INVALID_TICKET_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TicketSelectByTicketId($this->InputValueTicketId, $InstanceTicket, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->TicketLoadData($InstanceTicket);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TicketSelectByRequestingUserEmail($RequestingUserEmail, &$InstanceTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueUserEmail = $RequestingUserEmail;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TicketSelectByRequestingUserEmail($this->InputValueUserEmail, $InstanceTicket, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->TicketLoadData($InstanceTicket);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TicketSelectByResponsibleUserEmail($ResponsibleUserEmail, &$InstanceTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueUserEmail = $ResponsibleUserEmail;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TicketSelectByResponsibleUserEmail($this->InputValueUserEmail, $InstanceTicket, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->TicketLoadData($InstanceTicket);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TicketUpdateByTicketId($TicketDescriptionNew, $TicketSuggestionNew, $TicketTitleNew,
											  $TypeStatusTicketDescriptionNew, $TypeTicketDescriptionNew, &$InstanceTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTicketDescription           = $TicketDescriptionNew;
		$this->InputValueTicketSuggestion            = $TicketSuggestionNew;
		$this->InputValueTicketTitle                 = $TicketTitleNew;
		$this->InputValueTypeStatusTicketDescription = $TypeStatusTicketDescriptionNew;
		$this->InputValueTypeTicketDescription       = $TypeTicketDescriptionNew;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->TicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 500; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TICKET_DESCRIPTION', 'FM_INVALID_TICKET_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TICKET_SUGGESTION
		$arrayElements[1]             = Config::FIELD_TICKET_SUGGESTION;
		$arrayElementsClass[1]        = &$this->ReturnTicketSuggestionClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->TicketSuggestion; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnTicketSuggestionText;
		array_push($arrayConstants, 'FM_INVALID_TICKET_SUGGESTION', 'FM_INVALID_TICKET_SUGGESTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TICKET_TITLE
		$arrayElements[2]             = Config::FIELD_TICKET_SUGGESTION;
		$arrayElementsClass[2]        = &$this->ReturnTicketSuggestionClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FM_VALIDATE_FUNCTION_TITLE;
		$arrayElementsInput[2]        = $this->InputValueTicketTitle; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 90; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnTicketTitleText;
		array_push($arrayConstants, 'FM_INVALID_TICKET_SUGGESTION', 'FM_INVALID_TICKET_SUGGESTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[3]             = Config::FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[3]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[3]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 45; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION', 'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[4]             = Config::FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[4]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[4]        = $this->InputValueTypeTicketDescription; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnTypeTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_TICKET_DESCRIPTION', 'FM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TicketUpdateByTicketId($this->InputValueTicketDescription, $this->InputValueTicketSuggestion,
																         $this->InputValueTicketTitle, 
																		 $this->InputValueTypeStatusTicketDescription,
																         $this->InputValueTypeTicketDescription, $InstanceTicket, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->TicketLoadData($InstanceTicket);
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TicketUpdateTicketStatusByTicketId($TicketStatusNew, &$InstanceTicket, $Debug)
	{
	}
	
	protected function TicketUpdateResponsibleUserByTicketId($ResponsibleUserEmailNew, &$InstanceTicket, $Debug)
	{
	}
	
	protected function TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription($InstanceTypeAssocUserTeam, $Debug)
	{
		if($InstanceTypeAssocUserTeam != NULL)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription(
				                                                       $InstanceTypeAssocUserTeam->GetTypeAssocUserTeamDescription(),
																	   $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
				$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_TEAM_DEL_SUCCESS");
				return $return;
			}
			if($return == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
				$constant = "TYPE_ASSOC_USER_TEAM_DEL_ERROR_DEPENDENCY_TEAM";
			else $constant = "TYPE_ASSOC_USER_TEAM_DEL_ERROR";
			$this->ShowDivReturnError($constant);
			return Config::RET_ERROR;
		}
	}
	
	protected function TypeAssocUserTeamInsert($TypeAssocUserTeamDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_ASSOC_TEAM_DESCRIPTION', 'FM_INVALID_TYPE_ASSOC_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TypeAssocUserTeamInsert($this->InputValueTypeAssocUserTeamDescription, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_TEAM_INSERT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_TEAM_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function TypeAssocUserTeamLoadData(&$InstanceTypeAssocUserTeam)
	{
		if($InstanceTypeAssocUserTeam == NULL)
			$this->Session->GetSessionValue(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
		if($InstanceTypeAssocUserTeam != NULL)
		{
			$this->InputValueRegisterDate                  = $InstanceTypeAssocUserTeam->GetRegisterDate();
			$this->InputValueTypeAssocUserTeamDescription  = $InstanceTypeAssocUserTeam->GetTypeAssocUserTeamDescription();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	protected function TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayInstanceTypeAssocUserTeam, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeAssocUserTeamSelect($Limit1, $Limit2, $ArrayInstanceTypeAssocUserTeam, $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_TEAM_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeAssocUserTeamSelectByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, &$InstanceTypeAssocUserTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TypeAssocUserTeamSelectByTypeAssocUserTeamDescription(
				                                                                                $this->InputValueTypeAssocUserTeamDescription, 
																		                        $InstanceTypeAssocUserTeam,
																		                        $Debug);
			if($return == Config::RET_OK)
			{
				$this->TypeAssocUserTeamLoadData($InstanceTypeAssocUserTeam);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
				return Config::RET_OK;	
			}
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_TEAM_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, &$InstanceTypeAssocUserTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;
		$this->InputFocus = Config::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_ASSOC_TEAM_DESCRIPTION','FM_INVALID_TYPE_ASSOC_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription(
				                                                             $this->InputValueTypeAssocUserTeamDescription,
																		     $InstanceTypeAssocUserTeam->GetTypeAssocUserTeamDescription(),
																		     $Debug);
			if($return == Config::RET_OK)
			{
				$InstanceTypeAssocUserTeam->SetTypeAssocUserTeamDescription($this->InputValueTypeAssocUserTeamDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
				if($this->TypeAssocUserTeamLoadData($InstanceTypeAssocUserTeam) == Config::RET_OK)
				{
					$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_TEAM_UPDT_SUCCESS");
					return Config::RET_OK;
				}
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_TEAM_UPDT_ERROR");
		return Config::RET_ERROR;	
	}
	
	protected function TypeStatusTicketDeleteByTypeStatusTicketDescription(&$InstanceTypeStatusTicket, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeStatusTicketDeleteByTypeStatusTicketDescription(
			                                                                $InstanceTypeStatusTicket->GetTypeStatusTicketDescription(), 
																            $Debug);
		if($return == Config::RET_OK)
		{
			$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
			$this->ShowDivReturnSuccess("TYPE_STATUS_TICKET_DEL_SUCCESS");
			return $return;
		}
		if($return == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
			$constant = "TYPE_STATUS_TICKET_DEL_ERROR_DEPENDENCY_TICKET";
		else $constant = "TYPE_STATUS_TICKET_DEL_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::RET_ERROR;
	}
	
	
	protected function TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeStatusTicketDescription = $TypeStatusTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION',
									'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TypeStatusTicketInsert($this->InputValueTypeStatusTicketDescription, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("TYPE_STATUS_TICKET_INSERT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function TypeStatusTicketLoadData($InstanceTypeStatusTicket)
	{
		if($InstanceTypeStatusTicket != NULL)
		{
			$this->InputValueTypeStatusTicketDescription  = $InstanceTypeStatusTicket->GetTypeStatusTicketDescription();
			$this->InputValueRegisterDate                 = $InstanceTypeStatusTicket->GetRegisterDate();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	protected function TypeStatusTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeStatusTicket, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeStatusTicketSelect($Limit1, $Limit2, $ArrayInstanceTypeStatusTicket, $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeStatusTicketSelectByTypeStatusTicketDescription($TypeStatusTicketDescription, 
		                                                                   &$InstanceTypeStatusTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeStatusTicketDescription = $TypeStatusTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION',
									'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TypeStatusTicketSelectByTypeStatusTicketDescription(
				                                                                      $this->InputValueTypeStatusTicketDescription, 
																		              $InstanceTypeStatusTicket,
																		              $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
				$this->TypeStatusTicketLoadData($InstanceTypeStatusTicket);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeStatusTicketUpdateByTypeStatusTicketDescription($TypeStatusTicketDescriptionNew,
																		   &$InstanceTypeStatusTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeStatusTicketDescription  = $TypeStatusTicketDescriptionNew;
		$this->InputFocus = Config::FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION',
									'FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);

		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TypeStatusTicketUpdateByTypeStatusTicketDescription(
				                                                               $this->InputValueTypeStatusTicketDescription,
																			   $InstanceTypeStatusTicket->GetTypeStatusTicketDescription(),
																			   $Debug);
			if($return == Config::RET_OK)
			{
				$InstanceTypeStatusTicket->SetTypeStatusTicketDescription($this->InputValueTypeStatusTicketDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
				$this->TypeStatusTicketLoadData($InstanceTypeStatusTicket);
				$this->ShowDivReturnSuccess("TYPE_STATUS_TICKET_UPDT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_UPDT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function TypeTicketDeleteByTypeTicketDescription($InstanceTypeTicket, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeTicketDeleteByTypeTicketDescription($InstanceTypeTicket->GetTypeTicketDescription(), $Debug);
		if($return == Config::RET_OK)
		{
			$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_TICKET, $InstanceTypeTicket);
			$this->ShowDivReturnSuccess("TYPE_TICKET_DEL_SUCCESS");
			return Config::RET_OK;
		}
		if($return == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
			$constant = "TYPE_TICKET_DEL_ERROR_DEPENDENCY_TICKET";
		else $constant = "TYPE_TICKET_DEL_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::RET_ERROR;
	}
	
	protected function TypeTicketInsert($TypeTicketDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeTicketDescription = $TypeTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return = Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TypeTicketInsert($this->InputValueTypeTicketDescription, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("TYPE_TICKET_INSERT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_TICKET_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function TypeTicketLoadData($InstanceTypeTicket)
	{
		if($InstanceTypeTicket != NULL)
		{
			$this->InputValueTypeTicketDescription  = $InstanceTypeTicket->GetTypeTicketDescription();
			$this->InputValueRegisterDate           = $InstanceTypeTicket->GetRegisterDate();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	protected function TypeTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeTicket, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeTicketSelect($Limit1, $Limit2, $ArrayInstanceTypeTicket, $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("TYPE_TICKET_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeTicketSelectByTypeTicketDescription($TypeTicketDescription, &$InstanceTypeTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeTicketDescription = $TypeTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TypeTicketSelectByTypeTicketDescription($this->InputValueTypeTicketDescription,
																						  $InstanceTypeTicket, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_TICKET, $InstanceTypeTicket);
				$this->TypeTicketLoadData($InstanceTypeTicket);
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("TYPE_TICKET_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeTicketUpdateByTypeTicketDescription($TypeTicketDescriptionNew, &$InstanceTypeTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeTicketDescription  = $TypeTicketDescriptionNew;
		$this->InputFocus = Config::FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeTicketDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_TICKET_DESCRIPTION', 'FM_INVALID_TYPE_TICKET_DESCRIPTION',
									'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TypeTicketUpdateByTypeTicketDescription($this->InputValueTypeTicketDescription, 
																						  $InstanceTypeTicket->GetTypeTicketDescription(),
																						  $Debug);
			if($return == Config::RET_OK)
			{
				$InstanceTypeTicket->SetTypeTicketDescription($this->InputValueTypeTicketDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_TICKET, $InstanceTypeTicket);
				$this->TypeTicketLoadData($InstanceTypeTicket);
				$this->ShowDivReturnSuccess("TYPE_TICKET_UPDT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_TICKET_UPDT_ERROR");
		return Config::RET_ERROR;	
	}
	
	protected function TypeUserDeleteByTypeUserDescription($InstanceTypeUser, $Debug)
	{
		if($InstanceTypeUser != NULL)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TypeUserDeleteByTypeUserDescription($InstanceTypeUser->GetTypeUserDescription(), $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_USER, $InstanceTypeUser);
				$this->ShowDivReturnSuccess("TYPE_USER_DEL_SUCCESS");
				return $return;
			}
		}
		if($return == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
			$constant = "TYPE_USER_DEL_ERROR_DEPENDENCY_USER";
		else $constant = "TYPE_USER_DEL_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::RET_ERROR;
	}
	
	protected function TypeUserInsert($TypeUserDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeUserDescription = $TypeUserDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TYPE_USER_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeUserDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_USER_ID', 'FM_INVALID_TYPE_USER_ID_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TypeUserInsert($this->InputValueTypeUserDescription, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("TYPE_USER_INSERT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_USER_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function TypeUserLoadData(&$InstanceTypeUser)
	{
		if($InstanceTypeUser != NULL)
		{
			$this->InputValueTypeUserDescription  = $InstanceTypeUser->GetTypeUserDescription();
			$this->InputValueRegisterDate         = $InstanceTypeUser->GetRegisterDate();
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	protected function TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeUserSelect($Limit1, $Limit2, $ArrayInstanceTypeUser,
															 $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("TYPE_USER_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeUserSelectByTypeUserDescription($TypeUserDescription, &$InstanceTypeUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeUserDescription = $TypeUserDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TYPE_USER_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TypeUserSelectByTypeUserDescription($this->InputValueTypeUserDescription, 
																			          $InstanceTypeUser, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_USER, $InstanceTypeUser);
				$this->TypeUserLoadData($InstanceTypeUser); 
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("TYPE_USER_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeUserSelectByTypeUserDescriptionLike($TypeUserDescription, &$ArrayInstanceTypeUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeUserDescription = $TypeUserDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_TYPE_USER_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedePersistence->TypeUserSelectByTypeUserDescriptionLike($this->InputValueTypeUserDescription, 
																			               $ArrayInstanceTypeUser, $Debug);
			if($return == Config::RET_OK)
				return Config::RET_OK;
		}
		$this->ShowDivReturnError("TYPE_USER_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeUserSelectNoLimit($ArrayInstanceTypeUser, $Debug);
		if($return == Config::RET_OK)
			return Config::RET_OK;
		$this->ShowDivReturnError("TYPE_USER_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function TypeUserUpdateByTypeUserDescription($TypeUserDescriptionNew, &$InstanceTypeUser, $Debug)
	{
		if($InstanceTypeUser != NULL)
		{
			$PageForm = $this->Factory->CreatePageForm();
			$this->InputValueTypeUserDescription  = $TypeUserDescriptionNew;
			$this->InputFocus = Config::FIELD_TYPE_USER_DESCRIPTION;
			$arrayConstants = array(); $matrixConstants = array();
			
			//FIELD_TYPE_USER_DESCRIPTION
			$arrayElements[0]             = Config::FIELD_TYPE_USER_DESCRIPTION;
			$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
			if($return == Config::RET_OK)
			{
				$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
				$return = $instanceFacedePersistence->TypeUserUpdateByTypeUserDescription($this->InputValueTypeUserDescription,
					                                                                      $InstanceTypeUser->GetTypeUserDescription(), $Debug);
				if($return == Config::RET_OK)
				{
					$InstanceTypeUser->SetTypeUserDescription($this->InputValueTypeUserDescription);
					$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_USER, $InstanceTypeUser);
					$this->TypeUserLoadData($InstanceTypeUser);
					$this->ShowDivReturnSuccess("TYPE_USER_UPDT_SUCCESS");
					return Config::RET_OK;
				}
				elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
				{
					$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
					return Config::RET_WARNING;
				}
			}
			$this->ShowDivReturnError("TYPE_USER_UPDT_ERROR");
			return Config::RET_ERROR;
		}
	}
	
	protected function UserChangeTwoStepVerification($InstanceUser, $TwoStepVerification, $Debug)
	{
		if($InstanceUser == NULL)
			$InstanceUser = $this->User;
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->UserUpdateTwoStepVerificationByUserEmail($InstanceUser->GetEmail(), 
																				       $TwoStepVerification, $Debug);
		if($return == Config::RET_OK)
		{
			$InstanceUser->SetTwoStepVerification($TwoStepVerification);
			$this->InputValueTwoStepVerification = $InstanceUser->GetTwoStepVerification();
			$this->ShowDivReturnSuccess("USER_TWO_STEP_VERIFICATION_CHANGE_SUCCESS");
			return Config::RET_OK;
		}
		elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
		{
			$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
			return Config::RET_WARNING;
		}
		$this->ShowDivReturnError("USER_TWO_STEP_VERIFICATION_CHANGE_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserDeleteByUserEmail(&$InstanceUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $InstanceUser->GetEmail();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			if(!empty($InstanceUser->GetCorporationName()))
				$return = $instanceFacedePersistence->AssocUserCorporationDelete($InstanceUser->GetCorporationName(),
			                                                                     $this->InputValueUserEmail,
														                         $Debug, NULL, TRUE);
			if($return == Config::RET_OK)
				$return = $instanceFacedePersistence->UserDeleteByUserEmail($this->InputValueUserEmail, $Debug);
			if($return == Config::RET_OK)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_USER);
				unset($InstanceUser);
				$this->InputValueUserEmail = "";
				$this->ShowDivReturnSuccess("USER_DEL_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_USER_DEL_BY_USER_EMAIL)
			{
				$this->ShowDivReturnError("USER_NOT_FOUND");
				return Config::RET_ERROR;
			}
			elseif($return == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
			{
				$this->ShowDivReturnWarning("USER_DEL_ERROR_DEPENDENCY");
				return Config::RET_ERROR;
			}
		}
		$this->ShowDivReturnError("USER_DEL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserInsert($Application, $SendEmail, 
								  $BirthDateDay, $BirthDateMonth, $BirthDateYear, $Corporation, $Country, $UserEmail, $Gender, 
								  $HashCode, $UserName, $PasswordNew, $PasswordRepeat, $Region, $SessionExpires, $TwoStepVerification, 
								  $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary,
								  $UserPhoneSecondaryPrefix, $UserType, $UserUniqueId, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserName                 = $UserName;
		$this->InputValueUserEmail                = $UserEmail;
		$this->InputValueBirthDateDay             = $BirthDateDay;
		$this->InputValueBirthDateMonth           = $BirthDateMonth;
		$this->InputValueBirthDateYear            = $BirthDateYear;
		$this->InputValueGender                   = $Gender;
		$this->InputValueUserPhonePrimary         = $UserPhonePrimary;
		$this->InputValueUserPhonePrimaryPrefix   = $UserPhonePrimaryprefix;
		$this->InputValueUserPhoneSecondary       = $UserPhoneSecondary;
		$this->InputValueUserPhoneSecondaryPrefix = $UserPhoneSecondaryPrefix;
		$this->InputValueCountry                  = $Country;
		$this->InputValueRegion                   = $Region;
		$this->InputValueNewPassword              = $PasswordNew;
		$this->InputValueRepeatPassword           = $PasswordRepeat;
		if(isset($_POST[Config::FIELD_USER_SESSION_EXPIRES]))
			$this->InputValueSessionExpires = TRUE;
		else $this->InputValueSessionExpires = FALSE;
		if(isset($_POST[Config::FIELD_USER_TWO_STEP_VERIFICATION]))
			$this->InputValueTwoStepVerification = TRUE;
		else $this->InputValueTwoStepVerification = FALSE;
		if(is_null($UserActive))
		{
			if(isset($_POST[Config::FIELD_USER_ACTIVE]))
				$this->InputValueUserActive = TRUE;
			else $this->InputValueUserActive = FALSE;
		}
		else $this->InputValueUserActive = $UserActive;
		if(isset($_POST[Config::FIELD_USER_CONFIRMED]))
			$this->InputValueUserConfirmed = TRUE;
		else $this->InputValueUserConfirmed = FALSE;
		if ($SessionExpires == NULL)
			$SessionExpires = $this->InputValueSessionExpires;
		if($TwoStepVerification == NULL)
			$TwoStepVerification = $this->InputValueTwoStepVerification;
		if($UserConfirmed == NULL)
			$UserConfirmed = $this->InputValueUserConfirmed;
		$this->InputValueUserUniqueId = explode("@", $this->InputValueUserEmail)[0];
		$FormValidator      = $this->Factory->CreateFormValidator();
		$arrayConstants = array(); $matrixConstants = array(); $arrayOptions = array();
		
		//FIELD_USER_NAME
		$arrayConstants = array();
		$arrayElements[0]             = Config::FIELD_USER_NAME;
		$arrayElementsClass[0]        = &$this->ReturnUserNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_NAME;
		$arrayElementsInput[0]        = $this->InputValueUserName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserNameText;
		array_push($arrayConstants, 'FM_INVALID_USER_NAME', 'FM_INVALID_USER_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_EMAIL
		$arrayConstants = array();
		$arrayElements[1]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[1]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[1]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 60; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_UNIQUE_ID
		$arrayConstants = array();
		$arrayElements[2]             = Config::FIELD_USER_UNIQUE_ID;
		$arrayElementsClass[2]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
		$arrayElementsInput[2]        = $this->InputValueUserUniqueId; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 25; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnUserUniqueIdText;
		array_push($arrayConstants, 'FM_INVALID_USER_UNIQUE_ID', 'FM_INVALID_USER_UNIQUE_ID_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_PHONE_PRIMARY_PREFIX
		$arrayConstants = array();
		$arrayElements[3]             = Config::FIELD_USER_PHONE_PRIMARY_PREFIX;
		$arrayElementsClass[3]        = &$this->ReturnUserPhonePrimaryPrefixClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[3]        = $this->InputValueUserPhonePrimaryPrefix; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 3; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnUserPhonePrimaryPrefixText;
		array_push($arrayConstants, 'FM_INVALID_USER_PHONE_PREFIX_PRIMARY', 'FM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_PHONE_PRIMARY
		$arrayConstants = array();
		$arrayElements[4]             = Config::FIELD_USER_PHONE_PRIMARY;
		$arrayElementsClass[4]        = &$this->ReturnUserPhonePrimaryClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[4]        = $this->InputValueUserPhonePrimary; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 9; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnUserPhonePrimaryText;
		array_push($arrayConstants, 'FM_INVALID_USER_PHONE_PRIMARY', 'FM_INVALID_USER_PHONE_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_PHONE_SECONDARY_PREFIX
		$arrayConstants = array();
		$arrayElements[5]             = Config::FIELD_USER_PHONE_SECONDARY_PREFIX;
		$arrayElementsClass[5]        = &$this->ReturnUserPhoneSecondaryPrefixClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[5]        = $this->InputValueUserPhoneSecondaryPrefix; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 3; 
		$arrayElementsNullable[5]     = TRUE;
		$arrayElementsText[5]         = &$this->ReturnUserPhoneSecondaryPrefixText;
		array_push($arrayConstants, 'FM_INVALID_USER_PHONE_PREFIX_SECONDARY', 'FM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_PHONE_SECONDARY
		$arrayConstants = array();
		$arrayElements[6]             = Config::FIELD_USER_PHONE_SECONDARY;
		$arrayElementsClass[6]        = &$this->ReturnUserPhoneSecondaryClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[6]        = $this->InputValueUserPhoneSecondary; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 9; 
		$arrayElementsNullable[6]     = TRUE;
		$arrayElementsText[6]         = &$this->ReturnUserPhoneSecondaryText;
		array_push($arrayConstants, 'FM_INVALID_USER_PHONE_SECONDARY', 'FM_INVALID_USER_PHONE_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_BIRTH_DATE_DAY
		$arrayConstants = array();
		$arrayElements[7]             = Config::FIELD_USER_BIRTH_DATE_DAY;
		$arrayElementsClass[7]        = &$this->ReturnBirthDateDayClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = Config::FM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[7]        = $this->InputValueBirthDateDay; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 0; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnBirthDateDayText;
		array_push($arrayConstants, 'FM_INVALID_USER_BIRTH_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_BIRTH_DATE_MONTH
		$arrayConstants = array();
		$arrayElements[8]             = Config::FIELD_USER_BIRTH_DATE_MONTH;
		$arrayElementsClass[8]        = &$this->ReturnBirthDateMonthClass;
		$arrayElementsDefaultValue[8] = ""; 
		$arrayElementsForm[8]         = Config::FM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[8]        = $this->InputValueBirthDateMonth; 
		$arrayElementsMinValue[8]     = 0; 
		$arrayElementsMaxValue[8]     = 0; 
		$arrayElementsNullable[8]     = FALSE;
		$arrayElementsText[8]         = &$this->ReturnBirthDateMonthText;
		array_push($arrayConstants, 'FM_INVALID_USER_BIRTH_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_BIRTH_DATE_YEAR
		$arrayConstants = array();
		$arrayElements[9]             = Config::FIELD_USER_BIRTH_DATE_YEAR;
		$arrayElementsClass[9]        = &$this->ReturnBirthDateYearClass;
		$arrayElementsDefaultValue[9] = ""; 
		$arrayElementsForm[9]         = Config::FM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[9]        = $this->InputValueBirthDateYear; 
		$arrayElementsMinValue[9]     = 0; 
		$arrayElementsMaxValue[9]     = 0; 
		$arrayElementsNullable[9]     = FALSE;
		$arrayElementsText[9]         = &$this->ReturnBirthDateYearText;
		array_push($arrayConstants, 'FM_INVALID_USER_BIRTH_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_GENDER
		$arrayConstants = array();
		$arrayElements[10]             = Config::FIELD_USER_GENDER;
		$arrayElementsClass[10]        = &$this->ReturnGenderClass;
		$arrayElementsDefaultValue[10] = ""; 
		$arrayElementsForm[10]         = Config::FM_VALIDATE_FUNCTION_GENDER;
		$arrayElementsInput[10]        = $this->InputValueGender; 
		$arrayElementsMinValue[10]     = 0; 
		$arrayElementsMaxValue[10]     = 0; 
		$arrayElementsNullable[10]     = FALSE;
		$arrayElementsText[10]         = &$this->ReturnGenderText;
		array_push($arrayConstants, 'FM_INVALID_USER_GENDER', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_COUNTRY_NAME
		$arrayConstants = array();
		$arrayElements[11]             = Config::FIELD_COUNTRY_NAME;
		$arrayElementsClass[11]        = &$this->ReturnCountryClass;
		$arrayElementsDefaultValue[11] = ""; 
		$arrayElementsForm[11]         = Config::FM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE;
		$arrayElementsInput[11]        = $this->InputValueCountry; 
		$arrayElementsMinValue[11]     = 0; 
		$arrayElementsMaxValue[11]     = 3; 
		$arrayElementsNullable[11]     = FALSE;
		$arrayElementsText[11]         = &$this->ReturnCountryText;
		array_push($arrayConstants, 'FM_INVALID_COUNTRY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_USER_REGION
		$arrayConstants = array();
		$arrayElements[12]             = Config::FIELD_USER_REGION;
		$arrayElementsClass[12]        = &$this->ReturnRegionClass;
		$arrayElementsDefaultValue[12] = ""; 
		$arrayElementsForm[12]         = Config::FM_VALIDATE_FUNCTION_NOT_NUMBER;
		$arrayElementsInput[12]        = $this->InputValueRegion; 
		$arrayElementsMinValue[12]     = 0; 
		$arrayElementsMaxValue[12]     = 45; 
		$arrayElementsNullable[12]     = TRUE;
		$arrayElementsText[12]         = &$this->ReturnRegionText;
		array_push($arrayConstants, 'FM_INVALID_USER_REGION', 'FM_INVALID_USER_REGION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FIELD_PASSWORD_NEW
		$arrayConstants = array();
		$arrayElements[13]             = Config::FIELD_PASSWORD_NEW;
		$arrayElementsClass[13]        = &$this->ReturnPasswordClass;
		$arrayElementsDefaultValue[13] = ""; 
		$arrayElementsForm[13]         = Config::FM_VALIDATE_FUNCTION_PASSWORD;
		$arrayElementsInput[13]        = $this->InputValueNewPassword; 
		$arrayElementsMinValue[13]     = 8; 
		$arrayElementsMaxValue[13]     = 18; 
		$arrayElementsNullable[13]     = TRUE;
		$arrayElementsText[13]         = &$this->ReturnPasswordText;
		$arrayExtraField[13]           = &$this->InputValueRepeatPassword;
		array_push($arrayConstants, 'FM_INVALID_USER_PASSWORD', 'FM_INVALID_USER_PASSWORD_MATCH',
				                    'FM_INVALID_USER_PASSWORD_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		if($this->ValidateCaptcha)
		{
			//VALIDA CAPTCHA
			$this->InputValueCaptcha       = $_POST[Config::FIELD_USER_CAPTCHA_REGISTER];
			$this->Session->GetSessionValue(Config::FIELD_USER_CAPTCHA_REGISTER, $captcha);
			//FIELD_USER_CAPTCHA_REGISTER
			$arrayElements[14]             = Config::FIELD_USER_CAPTCHA_REGISTER;
			$arrayElementsClass[14]        = &$this->ReturnCaptchaClass;
			$arrayElementsDefaultValue[14] = ""; 
			$arrayElementsForm[14]         = Config::FM_VALIDATE_FUNCTION_COMPARE_STRING;
			$arrayElementsInput[14]        = $this->InputValueCaptcha; 
			$arrayElementsMinValue[14]     = 0; 
			$arrayElementsMaxValue[14]     = 0; 
			$arrayElementsNullable[14]     = TRUE;
			$arrayElementsText[14]         = &$this->ReturnCaptchaText;
			array_push($arrayConstants, 'FM_INVALID_CAPTCHA', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, $captcha);
		}
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions, $arrayExtraField);
		if($return == Config::RET_OK)
		{
			//CHECA SE E-MAIL JÁ É CADASTRADO
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectExistsByUserEmail($this->InputValueUserEmail, $Debug);
			if($return != Config::RET_OK)
			{
				$birthDate = $this->InputValueBirthDateYear . "-" . $this->InputValueBirthDateMonth
							 . "-" . $this->InputValueBirthDateDay;
				$hashCode  = hash("sha512", $this->InputValueUserName . $this->InputValueUserEmail . 
								   $this->InputValueGender . $birthDate);
				$this->InputValueUserName = ucwords($this->InputValueUserName);
				if($this->ReturnUserUniqueIdText != "")
					$this->InputValueUserUniqueId = NULL;
				//CADASTRA USUARIO NO BANCO
				$return = $instanceFacedePersistence->UserInsert($birthDate,
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
																 $this->InputValueUserActive,
																 $UserConfirmed,
																 $this->InputValueUserPhonePrimary, 
																 $this->InputValueUserPhonePrimaryPrefix, 
																 $this->InputValueUserPhoneSecondary, 
																 $this->InputValueUserPhoneSecondaryPrefix,
																 $UserType,
																 $this->InputValueUserUniqueId,
																 $Debug);
				if($return == Config::RET_OK)
				{
					if($SendEmail)
					{
						Page::GetCurrentDomain($domain);
						$link = $domain . str_replace('Language/', '', $this->Language) . "/" . 
								str_replace("_", "",Config::PAGE_REGISTER_CONFIRMATION) . "?=" . $hashCode;
						$instanceFacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
						$return = $instanceFacedeBusiness->SendEmailRegister($Application,
																			 $this->InputValueUserName,
														                     $this->InputValueUserEmail,
														                     $link, 
																			 $Debug);
					}
					if($return == Config::RET_OK)
					{
						if($SendEmail) $constant = 'REGISTER_SUCCESS';
						else $constant = 'REGISTER_SUCCESS_NO_LINK';
						$this->ShowDivReturnSuccess($constant);
						return Config::RET_OK;
					}
					else
					{
						$instanceFacedePersistence->UserDeleteByUserEmail($this->InputValueUserEmail, $Debug);
						$this->ShowDivReturnError("REGISTER_EMAIL_ERROR");
						return Config::RET_ERROR;
					}
				}
				elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
				{
					$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
					return Config::RET_WARNING;
				}
				else
				{
					$this->ShowDivReturnError("REGISTER_INSERT_ERROR");
					return Config::RET_ERROR;
				}
			}
			else
			{
				$this->ShowDivReturnWarning("REGISTER_EMAIL_ALREADY_REGISTERED");
				return Config::RET_ERROR;
			}
		}
		$this->ShowDivReturnError("REGISTER_INSERT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserLoadData($InstanceUser)
	{
		$this->InputValueAssocUserCorporationRegistrationDate = 
			$InstanceUser->GetAssocUserCorporationUserRegistrationDate();
		$this->InputValueAssocUserCorporationRegistrationId = 
			$InstanceUser->GetAssocUserCorporationUserRegistrationId();
		$this->InputValueBirthDateDay             = $InstanceUser->GetBirthDateDay();
		$this->InputValueBirthDateMonth           = $InstanceUser->GetBirthDateMonth();
		$this->InputValueBirthDateYear            = $InstanceUser->GetBirthDateYear();
		$this->InputValueUserCorporationName      = $InstanceUser->GetCorporationName();
		$this->InputValueCountry                  = $InstanceUser->GetCountry();
		if($InstanceUser->GetDepartmentInitials() != NULL)
			$this->InputValueDepartmentName       = $InstanceUser->GetDepartmentInitials() 
													  . " - " . $InstanceUser->GetDepartmentName();
		elseif($InstanceUser->GetDepartmentName() != NULL)
			$this->InputValueDepartmentName       = $InstanceUser->GetDepartmentName();
		else $this->InputValueDepartmentName = NULL;
		$this->InputValueGender                   = $InstanceUser->GetGender();
		$this->InputValueUserName                 = $InstanceUser->GetName();
		$this->InputValueUserEmail                = $InstanceUser->GetEmail();
		$this->InputValueUserPhonePrimary         = $InstanceUser->GetUserPhonePrimary();
		$this->InputValueUserPhonePrimaryPrefix   = $InstanceUser->GetUserPhonePrimaryPrefix();
		$this->InputValueUserPhoneSecondary       = $InstanceUser->GetUserPhoneSecondary();
		$this->InputValueUserPhoneSecondaryPrefix = $InstanceUser->GetUserPhoneSecondaryPrefix();
		$this->InputValueRegion                   = $InstanceUser->GetRegion();
		$this->InputValueRegisterDate             = $InstanceUser->GetRegisterDate();
		$this->InputValueRegistrationDate         = 
			$InstanceUser->GetAssocUserCorporationUserRegistrationDate();
		$this->InputValueRegistrationDateDay      = 
			$InstanceUser->GetAssocUserCorporationUserRegistrationDateDay();
		$this->InputValueRegistrationDateMonth    = 
			$InstanceUser->GetAssocUserCorporationUserRegistrationDateMonth();
		$this->InputValueRegistrationDateYear     = 
			$InstanceUser->GetAssocUserCorporationUserRegistrationDateYear();
		$this->InputValueRegistrationId           = 
			$InstanceUser->GetAssocUserCorporationUserRegistrationId();
		if($InstanceUser->GetArrayAssocUserTeam() != NULL)
		{
			foreach ($InstanceUser->GetArrayAssocUserTeam() as $index=>$assocUserTeam)
			{
				if($index == 0)
					$this->InputValueUserTeam = $assocUserTeam->GetTeamName();
				else $this->InputValueUserTeam .= ", " . $assocUserTeam->GetTeamName();
			}
		}
		$this->InputValueUserUniqueId             = $InstanceUser->GetUserUniqueId();
		if($InstanceUser->GetSessionExpires())
			$this->InputValueSessionExpires = "checked";
		if($InstanceUser->GetTwoStepVerification())
			$this->InputValueTwoStepVerification = "checked";
		if($InstanceUser->GetUserActive())
			$this->InputValueUserActive = "checked";
		if($InstanceUser->GetUserConfirmed())
			$this->InputValueUserConfirmed = "checked";
		$this->InputValueTypeUserDescription = $InstanceUser->GetUserTypeDescription();
		if($InstanceUser->CheckAssocUserCorporationRegistrationDateActive())
			$this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
		else $this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
		if($InstanceUser->CheckAssocUserCorporationRegistrationIdActive())
			$this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
		else $this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage .'Icons/IconNotVerified.png';
		if($InstanceUser->CheckCorporationActive())
			$this->InputValueCorporationActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
		else $this->InputValueCorporationActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
		if($InstanceUser->CheckDepartmentExists())
			$this->InputValueDepartmentActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
		else $this->InputValueDepartmentActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
		if($this->InputValueUserUniqueId != NULL)
			$this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage . 'Icons/IconVerified.png';
		else $this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage . 'Icons/IconNotVerified.png';
	}
	
	protected function UserResendConfirmationLink($Application, $UserEmail, $Debug)
	{
		$UniqueHash = NULL;
		$return = $this->UserSelectHashCodeByUserEmail($UserEmail, $UniqueHash, $this->InputValueHeaderDebug);
		if($return == Config::RET_OK)
		{
			$instanceFacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
			Page::GetCurrentDomain($domain);
			$link = $domain . str_replace('Language/', '', $this->Language) . "/" .
							  str_replace("_", "",Config::PAGE_REGISTER_CONFIRMATION) . "?=" . $UniqueHash;
			$return = $instanceFacedeBusiness->SendEmailResendConfirmationLink($Application,
																			   $this->User->GetName(),
																			   $this->User->GetEmail(),
																			   $link, $this->InputValueHeaderDebug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("RESEND_CONFIRMATION_LINK_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("RESEND_CONFIRMATION_LINK_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->UserSelect($Limit1, $Limit2, $ArrayInstanceUser, $RowCount, $Debug);
		if($return == Config::RET_OK)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::RET_OK;
		}
		$this->ShowDivReturnError("USER_NOT_FOUND");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceUser, 
											       &$RowCount, $Debug, $HideReturnSuccessImage = TRUE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationName;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
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
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByCorporationName($this->InputValueCorporationName, $Limit1, $Limit2,
																			  $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				if($return == Config::RET_OK)
				{
					if($HideReturnSuccessImage)
						$this->ShowDivReturnEmpty();
					return Config::RET_OK;
				}
				elseif(empty($ArrayInstanceUser))
				{
					$this->ShowDivReturnWarning("USER_SEL_BY_CORPORATION_NAME_WARNING");
					return Config::RET_WARNING;	
				}
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_CORPORATION_NAME_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceUser, &$RowCount, 
												  $Debug, $HideReturnSuccessImage = TRUE)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationName;
		$this->InputValueDepartmentName  = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME', 'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_DEPARTMENT_NAME
		$arrayElements[0]             = Config::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[0]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByDepartmentName($Limit1, $Limit2, $this->InputValueCorporationName, 
																	         $this->InputValueDepartmentName, $ArrayInstanceUser, 
																	         $RowCount,  $Debug);
			if($return == Config::RET_OK)
			{
				if($return == Config::RET_OK)
				{
					if($HideReturnSuccessImage)
						$this->ShowDivReturnEmpty();
					return Config::RET_OK;
				}
				elseif(empty($ArrayInstanceUser))
				{
					$this->ShowDivReturnWarning("USER_SEL_BY_DEPARTMENT_NAME_WARNING");
					return Config::RET_WARNING;	
				}
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_DEPARTMENT_NAME_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByHashCode($HashCode, &$UserInstance, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserHashCode = $HashCode;	
		$arrayConstants = array(); $matrixConstants = array();
			
		if(isset($HashCode))
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByHashCode($this->InputValueUserHashCode, 
																	   $InstanceUser, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_BY_HASH_CODE_SUCCESS");
				return $return;
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_HASH_CODE_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueNotificationId = $NotificationId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_NOTIFICATION_ID
		$arrayElements[0]             = Config::FIELD_NOTIFICATION_ID;
		$arrayElementsClass[0]        = &$this->ReturnNotificationIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueNotificationId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnNotificationIdText;
		array_push($arrayConstants, 'FM_INVALID_NOTIFICATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByNotificationId($Limit1, $Limit2, $this->InputValueNotificationId, 
																			 $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return Config::RET_OK;
			}
			elseif(empty($ArrayInstanceUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_NOTIFICATION_ID_WARNING");
				return Config::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_NOTIFICATION_ID_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueRoleName = $RoleName;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_ROLE_NAME
		$arrayElements[0]             = Config::FIELD_ROLE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnRoleNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByRoleName($Limit1, $Limit2, $this->InputValueRoleName, 
																	   $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return Config::RET_OK;
			}
			elseif(empty($ArrayInstanceUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_ROLE_NAME_WARNING");
				return Config::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_ROLE_NAME_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTeamId = $TeamId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TEAM_ID
		$arrayElements[0]             = Config::FIELD_TEAM_ID;
		$arrayElementsClass[0]        = &$this->ReturnTeamIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
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
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByTeamId($Limit1, $Limit2, $this->InputValueTeamId, $ArrayInstanceUser, 
																	 $RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return Config::RET_OK;
			}
			elseif(empty($ArrayInstanceUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_TEAM_ID_WARNING");
				return Config::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_TEAM_ID_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTicketId = $TicketId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TICKET_ID
		$arrayElements[0]             = Config::FIELD_TICKET_ID;
		$arrayElementsClass[0]        = &$this->ReturnTicketIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
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
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByTicketId($Limit1, $Limit2, $this->InputValueTicketId, 
																	   $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return Config::RET_OK;
			}
			elseif(empty($ArrayInstanceUser))
			{
				$this->ShowDivReturnWarning("TICKET_SEL_BY_TICKET_ID_WARNING");
				return Config::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("TICKET_SEL_BY_TICKET_ID_ERROR");
		return Config::RET_ERROR;	
	}
	
	protected function UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, &$ArrayInstanceUser,
																&$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription,
																						   $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return Config::RET_OK;
			}
			elseif(empty($ArrayInstanceUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_WARNING");
				return Config::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, 
		                                                 &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeTicketDescription = $TypeTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByTypeTicketDescription($Limit1, $Limit2, $this->InputValueTypeTicketDescription,
																	                $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return Config::RET_OK;
			}
			elseif(empty($ArrayInstanceUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_TYPE_TICKET_DESCRIPTION_WARNING");
				return Config::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_TYPE_TICKET_DESCRIPTION_ERROR");
		return Config::RET_ERROR;	
	}
	
	protected function UserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeUserDescription = $TypeUserDescription;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TYPE_USER_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
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
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription,
															                      $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				return Config::RET_OK;
			}
			elseif(empty($ArrayInstanceUser))
			{
				$this->ShowDivReturnWarning("USER_SEL_BY_TYPE_USER_DESCRIPTION_WARNING");
				return Config::RET_WARNING;	
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_TYPE_USER_DESCRIPTION_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByUserEmail($UserEmail, &$UserInstance, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail = $UserEmail;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByUserEmail($this->InputValueUserEmail, 
																		$InstanceUser, 
																		$Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_BY_USER_EMAIL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_USER_EMAIL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectByUserUniqueId($UniqueId, &$UserInstance, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail = $UserEmail;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_UNIQUE_ID
		$arrayElements[0]             = Config::FIELD_USER_UNIQUE_ID;
		$arrayElementsClass[0]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
		$arrayElementsInput[0]        = $this->InputValueUserUniqueId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 25; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserUniqueIdText;
		array_push($arrayConstants, 'FM_INVALID_USER_UNIQUE_ID', 'FM_INVALID_USER_UNIQUE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByUserUniqueId($this->InputValueUserEmail, $InstanceUser, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_BY_USER_UNIQUE_ID_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("USER_SEL_BY_USER_UNIQUE_ID_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function  UserSelectExistsByUserEmail($Captcha, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCaptcha    = $Captcha;
		$this->InputValueUserEmail  = $UserEmail;
		$this->Session->GetSessionValue(Config::FIELD_CAPTCHA, $captcha);
		$arrayConstants = array(); $arrayOptions = array(); $matrixConstants = array();
			
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, NULL);
		
		//CAPTCHA
		$arrayElements[1]             = Config::FIELD_CAPTCHA;
		$arrayElementsClass[1]        = &$this->ReturnCaptchaClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_COMPARE_STRING;
		$arrayElementsInput[1]        = $this->InputValueCaptcha; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 0; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnCaptchaText;
		array_push($arrayConstants, 'FM_INVALID_CAPTCHA', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, $captcha);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectExistsByUserEmail($this->InputValueUserEmail, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_EXISTS_BY_USER_EMAIL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("USER_SEL_EXISTS_BY_USER_EMAIL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $UserEmail;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectHashCodeByUserEmail($InstanceUser, $HashCode, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_HASH_CODE_BY_USER_EMAIL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("USER_SEL_HASH_CODE_BY_USER_EMAIL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectNotificationByUserEmail($Limit1, $Limit2, $InstanceUser, &$ArrayInstanceAssocUserNotification, 
														 &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $InstanceUser->GetEmail();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectNotificationByUserEmail($Limit1, $Limit2, $InstanceUser, 
																					$ArrayInstanceAssocUserNotification, $RowCount, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_NOTIFICATION_BY_USER_EMAIL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("USER_SEL_NOTIFICATION_BY_USER_EMAIL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectNotificationByUserEmailAndNotificationId($InstanceUser, $NotificationId, &$InstanceAssocUserNotification,
																		  $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $InstanceUser->GetEmail();
		$this->InputValueNotificationId = $NotificationId;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_NOTIFICATION_ID
		$arrayElements[1]             = Config::FIELD_NOTIFICATION_ID;
		$arrayElementsClass[1]        = &$this->ReturnNotificationIdClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[1]        = $this->InputValueNotificationId; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 5; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnNotificationIdText;
		array_push($arrayConstants, 'FM_INVALID_NOTIFICATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectNotificationByUserEmailAndNotificationId($InstanceUser, 
																									 $this->InputValueNotificationId,
																					                 $InstanceAssocUserNotification, 
																									 $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_NOTIFICATION_BY_USER_EMAIL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("USER_SEL_NOTIFICATION_BY_USER_EMAIL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectNotificationByUserEmailCount($InstanceUser, &$Count, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $InstanceUser->GetEmail();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectNotificationByUserEmailCount($InstanceUser, $Count, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_NOTIFICATION_BY_USER_EMAIL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("USER_SEL_NOTIFICATION_BY_USER_EMAIL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectNotificationByUserEmailCountUnRead($InstanceUser, &$Count, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $InstanceUser->GetEmail();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectNotificationByUserEmailCountUnRead($InstanceUser, $Count, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_NOTIFICATION_BY_USER_EMAIL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("USER_SEL_NOTIFICATION_BY_USER_EMAIL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectNotificationByUserEmailNoLimit($InstanceUser, &$ArrayInstanceAssocUserNotification, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $$InstanceUser->GetEmail();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectNotificationByUserEmail($InstanceUser, 
																					$ArrayInstanceAssocUserNotification, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_SEL_NOTIFICATION_BY_USER_EMAIL_SUCCESS");
				return Config::RET_OK;
			}
		}
		$this->ShowDivReturnError("USER_SEL_NOTIFICATION_BY_USER_EMAIL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug)
	{
		if(isset($HashCode))
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			return $instanceFacedePersistence->UserSelectUserActiveByHashCode($HashCode, $UserActive, $Debug);
		}
		$this->ShowDivReturnError("REGISTER_CONFIRMATION_SEL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserUpdateActiveByUserEmail($UserActiveNew, &$InstanceUser, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->UserUpdateActiveByUserEmail($InstanceUser->GetEmail(),
																	      $UserActiveNew,
																		  $Debug);
		if($return == Config::RET_OK)
		{
			$InstanceUser->SetUserActive($UserActiveNew);
			$this->Session->SetSessionValue(Config::SESS_ADMIN_USER, $InstanceUser);
			if($UserActiveNew)
			{
				$constant = str_replace('[0]', 
								strtolower($this->InstanceLanguageText->GetConstant('ACTIVATED', $this->Language)), 
								$this->InstanceLanguageText->GetConstant('USER_ACTIVATE_SUCCESS', $this->Language));
			}
			else
			{
				$constant = str_replace('[0]', 
								strtolower($this->InstanceLanguageText->GetConstant('DEACTIVATED', $this->Language)), 
								$this->InstanceLanguageText->GetConstant('USER_ACTIVATE_SUCCESS', $this->Language));
			}
			$this->ShowDivReturnSuccess($constant, TRUE);
			$this->InputFocus = Config::DIV_RETURN;
			return Config::RET_OK;
		}
		elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
		{
			$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
			return Config::RET_WARNING;
		}
		$this->ShowDivReturnError("USER_UPDT_ACTIVE_BY_USER_EMAIL_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function AssocUserCorporationUpdateByUserEmailAndCorporationName($AssocUserCorporationDepartmentNameNew,
		                                                                       $AssocUserCorporationRegistrationDateDayNew, 
		                                                                       $AssocUserCorporationRegistrationDateMonthNew, 
		                                                                       $AssocUserCorporationRegistrationDateYearNew,
																			   $AssocUserCorporationRegistrationIdNew,
																			   &$InstanceUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence             = $this->Factory->CreateFacedePersistence();
		$this->InputValueDepartmentName        = $AssocUserCorporationDepartmentNameNew;
		$this->InputValueRegistrationDateDay   = $AssocUserCorporationRegistrationDateDayNew;
		$this->InputValueRegistrationDateMonth = $AssocUserCorporationRegistrationDateMonthNew;
		$this->InputValueRegistrationDateYear  = $AssocUserCorporationRegistrationDateYearNew;
		$this->InputValueRegistrationId        = $AssocUserCorporationRegistrationIdNew;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY
		$arrayElements[0]             = Config::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY;
		$arrayElementsClass[0]        = &$this->ReturnRegistrationDateDayClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[0]        = $this->InputValueRegistrationDateDay; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 0; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnRegistrationDateDayText;
		array_push($arrayConstants, 'FM_INVALID_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH
		$arrayElements[1]             = Config::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH;
		$arrayElementsClass[1]        = &$this->ReturnRegistrationDateMonthClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[1]        = $this->InputValueRegistrationDateMonth; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 0; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnRegistrationDateMonthText;
		array_push($arrayConstants, 'FM_INVALID_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR
		$arrayElements[2]             = Config::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR;
		$arrayElementsClass[2]        = &$this->ReturnRegistrationDateYearClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[2]        = $this->InputValueRegistrationDateYear; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 0; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnRegistrationDateYearText;
		array_push($arrayConstants, 'FM_INVALID_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID
		$arrayElements[3]             = Config::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID;
		$arrayElementsClass[3]        = &$this->ReturnRegistrationIdClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FM_VALIDATE_FUNCTION_REGISTRATION_ID;
		$arrayElementsInput[3]        = $this->InputValueRegistrationId; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 12; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnRegistrationIdText;
		array_push($arrayConstants, 'FM_INVALID_REGISTRATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_DEPARTMENT_NAME
		$arrayElements[4]             = Config::FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[4]        = &$this->ReturnDepartmentNameText;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = Config::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[4]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 80; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnDepartmentNameClass;
		array_push($arrayConstants, 'FM_INVALID_DEPARTMENT_NAME', 'FM_INVALID_DEPARTMENT_NAME_SIZE',  'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions, $arrayExtraField);
		if($return == Config::RET_OK)
		{
			if($this->InputValueDepartmentName == "")
				$this->InputValueDepartmentName = NULL;
			if($this->InputValueRegistrationDateYear != "" && $this->InputValueRegistrationDateMonth != "" 
			   && $this->InputValueRegistrationDateDay != "")
			{
				$registrationDate = $this->InputValueRegistrationDateYear . "-" . $this->InputValueRegistrationDateMonth . "-" 
				         	        . $this->InputValueRegistrationDateDay;
			}
			else $registrationDate = NULL;
			if($this->InputValueRegistrationId == "")
				$this->InputValueRegistrationId = NULL;
			$return = $instanceFacedePersistence->AssocUserCorporationUpdateByUserEmailAndCorporationName($this->InputValueDepartmentName,
				                                                                                          $registrationDate,
															                                              $this->InputValueRegistrationId,
															                                              $InstanceUser->GetCorporationName(),
															                                              $InstanceUser->GetEmail(),
															                                              $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("ASSOC_USER_CORPORATION_UPDT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("ASSOC_USER_CORPORATION_UPDT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserUpdateByUserEmail($BirthDateDayNew, $BirthDateMonthNew, $BirthDateYearNew, 
											 $CountryNew, $GenderNew, $UserNameNew, $RegionNew,
					  						 $SessionExpiresNew, $TwoStepVerificationNew, $UserActiveNew, $UserConfirmedNew,
											 $UserPhonePrimaryNew, $UserPhonePrimaryPrefixNew, $UserPhoneSecondaryNew,
											 $UserPhoneSecondaryPrefixNew, $ValueUserUniqueIdNew, $OnAdmin, &$InstanceUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueBirthDateDay             = $BirthDateDayNew;
		$this->InputValueBirthDateMonth           = $BirthDateMonthNew;
		$this->InputValueBirthDateYear            = $BirthDateYearNew;
		$this->InputValueCountry                  = $CountryNew;
		$this->InputValueGender                   = $GenderNew;
		$this->InputValueRegion                   = $RegionNew;
		$this->InputValueUserName                 = $UserNameNew;
		$this->InputValueUserPhonePrimary         = $UserPhonePrimaryNew;
		$this->InputValueUserPhonePrimaryPrefix   = $UserPhonePrimaryPrefixNew;
		$this->InputValueUserPhoneSecondary       = $UserPhoneSecondaryNew;
		$this->InputValueUserPhoneSecondaryPrefix = $UserPhoneSecondaryPrefixNew;
		$this->InputValueUserUniqueId             = $ValueUserUniqueIdNew;
		if($OnAdmin)
		{
			if(isset($SessionExpiresNew))
				$this->InputValueSessionExpires = TRUE;
			else $this->InputValueSessionExpires = FALSE;
			if(isset($UserActiveNew))
				$this->InputValueUserActive = TRUE;
			else $this->InputValueUserActive = FALSE;
			if(isset($UserConfirmedNew))
				$this->InputValueUserConfirmed = TRUE;
			else $this->InputValueUserConfirmed = FALSE;
		}
		else
		{
			$this->InputValueSessionExpires = $InstanceUser->GetSessionExpires();
			$this->InputValueUserActive = $InstanceUser->GetUserActive();
			$this->InputValueUserConfirmed = $InstanceUser->GetUserConfirmed();
		}
		if(isset($TwoStepVerificationNew))
				$this->InputValueTwoStepVerification = TRUE;
			else $this->InputValueTwoStepVerification = FALSE;
		
		$this->InputFocus = Config::FIELD_USER_NAME;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_USER_NAME
		$arrayElements[0]             = Config::FIELD_USER_NAME;
		$arrayElementsClass[0]        = &$this->ReturnUserNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_NAME;
		$arrayElementsInput[0]        = $this->InputValueUserName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnUserNameText;
		array_push($arrayConstants, 'FM_INVALID_USER_NAME', 'FM_INVALID_USER_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_UNIQUE_ID
		$arrayElements[1]             = Config::FIELD_USER_UNIQUE_ID;
		$arrayElementsClass[1]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
		$arrayElementsInput[1]        = $this->InputValueUserUniqueId; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 25; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnUserUniqueIdText;
		array_push($arrayConstants, 'FM_INVALID_USER_UNIQUE_ID', 'FM_INVALID_USER_UNIQUE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_PHONE_PRIMARY_PREFIX
		$arrayElements[2]             = Config::FIELD_USER_PHONE_PRIMARY_PREFIX;
		$arrayElementsClass[2]        = &$this->ReturnUserPhonePrimaryPrefixClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[2]        = $this->InputValueUserPhonePrimaryPrefix; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 3; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnUserPhonePrimaryPrefixText;
		array_push($arrayConstants, 'FM_INVALID_USER_PHONE_PREFIX_PRIMARY', 'FM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_PHONE_PRIMARY
		$arrayElements[3]             = Config::FIELD_USER_PHONE_PRIMARY;
		$arrayElementsClass[3]        = &$this->ReturnUserPhonePrimaryClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[3]        = $this->InputValueUserPhonePrimary; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 9; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnUserPhonePrimaryText;
		array_push($arrayConstants, 'FM_INVALID_USER_PHONE_PRIMARY', 'FM_INVALID_USER_PHONE_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_PHONE_SECONDARY_PREFIX
		$arrayElements[4]             = Config::FIELD_USER_PHONE_SECONDARY_PREFIX;
		$arrayElementsClass[4]        = &$this->ReturnUserPhoneSecondaryPrefixClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[4]        = $this->InputValueUserPhoneSecondaryPrefix; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 3; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnUserPhoneSecondaryPrefixText;
		array_push($arrayConstants, 'FM_INVALID_USER_PHONE_PREFIX_SECONDARY', 'FM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_PHONE_SECONDARY
		$arrayElements[5]             = Config::FIELD_USER_PHONE_SECONDARY;
		$arrayElementsClass[5]        = &$this->ReturnUserPhoneSecondaryClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = Config::FM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[5]        = $this->InputValueUserPhoneSecondary; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 9; 
		$arrayElementsNullable[5]     = TRUE;
		$arrayElementsText[5]         = &$this->ReturnUserPhoneSecondaryText;
		array_push($arrayConstants, 'FM_INVALID_USER_PHONE_SECONDARY', 'FM_INVALID_USER_PHONE_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_BIRTH_DATE_DAY
		$arrayElements[6]             = Config::FIELD_USER_BIRTH_DATE_DAY;
		$arrayElementsClass[6]        = &$this->ReturnBirthDateDayClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = Config::FM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[6]        = $this->InputValueBirthDateDay; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 0; 
		$arrayElementsNullable[6]     = FALSE;
		$arrayElementsText[6]         = &$this->ReturnBirthDateDayText;
		array_push($arrayConstants, 'FM_INVALID_USER_BIRTH_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_BIRTH_DATE_MONTH
		$arrayElements[7]             = Config::FIELD_USER_BIRTH_DATE_MONTH;
		$arrayElementsClass[7]        = &$this->ReturnBirthDateMonthClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = Config::FM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[7]        = $this->InputValueBirthDateMonth; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 0; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnBirthDateMonthText;
		array_push($arrayConstants, 'FM_INVALID_USER_BIRTH_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_BIRTH_DATE_YEAR
		$arrayElements[8]             = Config::FIELD_USER_BIRTH_DATE_YEAR;
		$arrayElementsClass[8]        = &$this->ReturnBirthDateYearClass;
		$arrayElementsDefaultValue[8] = ""; 
		$arrayElementsForm[8]         = Config::FM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[8]        = $this->InputValueBirthDateYear; 
		$arrayElementsMinValue[8]     = 0; 
		$arrayElementsMaxValue[8]     = 0; 
		$arrayElementsNullable[8]     = FALSE;
		$arrayElementsText[8]         = &$this->ReturnBirthDateYearText;
		array_push($arrayConstants, 'FM_INVALID_USER_BIRTH_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_GENDER
		$arrayElements[9]             = Config::FIELD_USER_GENDER;
		$arrayElementsClass[9]        = &$this->ReturnGenderClass;
		$arrayElementsDefaultValue[9] = ""; 
		$arrayElementsForm[9]         = Config::FM_VALIDATE_FUNCTION_GENDER;
		$arrayElementsInput[9]        = $this->InputValueGender; 
		$arrayElementsMinValue[9]     = 0; 
		$arrayElementsMaxValue[9]     = 0; 
		$arrayElementsNullable[9]     = FALSE;
		$arrayElementsText[9]         = &$this->ReturnGenderText;
		array_push($arrayConstants, 'FM_INVALID_USER_GENDER', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
							 
		//FIELD_COUNTRY_NAME
		$arrayElements[10]             = Config::FIELD_COUNTRY_NAME;
		$arrayElementsClass[10]        = &$this->ReturnCountryClass;
		$arrayElementsDefaultValue[10] = ""; 
		$arrayElementsForm[10]         = Config::FM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE;
		$arrayElementsInput[10]        = $this->InputValueCountry; 
		$arrayElementsMinValue[10]     = 0; 
		$arrayElementsMaxValue[10]     = 45; 
		$arrayElementsNullable[10]     = FALSE;
		$arrayElementsText[10]         = &$this->ReturnCountryText;
		array_push($arrayConstants, 'FM_INVALID_COUNTRY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FIELD_USER_REGION
		$arrayElements[11]             = Config::FIELD_USER_REGION;
		$arrayElementsClass[11]        = &$this->ReturnRegionClass;
		$arrayElementsDefaultValue[11] = ""; 
		$arrayElementsForm[11]         = Config::FM_VALIDATE_FUNCTION_NOT_NUMBER;
		$arrayElementsInput[11]        = $this->InputValueRegion; 
		$arrayElementsMinValue[11]     = 0; 
		$arrayElementsMaxValue[11]     = 45; 
		$arrayElementsNullable[11]     = TRUE;
		$arrayElementsText[11]         = &$this->ReturnRegionText;
		array_push($arrayConstants, 'FM_INVALID_USER_REGION', 'FM_INVALID_USER_REGION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions, $arrayExtraField);
		if($return == Config::RET_OK)
		{
			$birthDate = $this->InputValueBirthDateYear . "-" . $this->InputValueBirthDateMonth . "-" 
			 . $this->InputValueBirthDateDay;
			$this->InputValueUserName = ucwords($this->InputValueUserName);
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserUpdateByUserEmail($birthDate,
																	    $this->InputValueCountry,
																	    $InstanceUser->GetEmail(),
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
																	    $Debug);
			
			if($return == Config::RET_OK)
			{
				$InstanceUser->UpdateUser(NULL, NULL, NULL, $birthDate, NULL, $this->InputValueCountry, NULL, NULL,
										  $this->InputValueGender, NULL, NULL, $this->InputValueUserName, $this->InputValueRegion, 
										  NULL, $this->InputValueSessionExpires, $this->InputValueTwoStepVerification, 
										  $this->InputValueUserActive, 
										  $this->InputValueUserConfirmed, $this->InputValueUserPhonePrimary,
										  $this->InputValueUserPhonePrimaryPrefix, $this->InputValueUserPhoneSecondary,
										  $this->InputValueUserPhoneSecondaryPrefix, NULL, $this->InputValueUserUniqueId);
				$this->ShowDivReturnSuccess("ACCOUNT_UPDT_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
			elseif($return == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnError("UPDATE_ERROR_USER_UNIQUE_ID");
				return Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE;
			}
		}
		$this->ShowDivReturnError("ACCOUNT_UPDT_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserUpdateCorporationByUserEmail($CorporationNameNew, &$InstanceUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationNameNew;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FIELD_USER_CORPORATION_SEL
		$arrayElements[0]             = Config::FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnUserCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserCorporationText;
		array_push($arrayConstants, 'FM_INVALID_CORPORATION_NAME',
				                    'FM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			if($this->InputValueCorporationName == Config::FIELD_SEL_NONE)
				$this->InputValueCorporationName = NULL;
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserUpdateCorporationByUserEmail($this->InputValueCorporationName,
			                                                                     $InstanceUser->GetEmail(),
																				 $Debug);
			if($return == Config::RET_OK && $InstanceUser->GetCorporationName() != NULL)
			{
				$return = $instanceFacedePersistence->AssocUserCorporationDelete(
					                                     $InstanceUser->GetCorporationName(),
			                                             $InstanceUser->GetEmail(),
														 $Debug, NULL, TRUE);
				if($return == Config::RET_OK && $this->InputValueCorporationName != NULL)
					$instanceFacedePersistence->AssocUserCorporationInsert(
					                                     $this->InputValueCorporationName,
														 NULL, NULL,
			                                             $InstanceUser->GetEmail(),
														 $Debug, NULL, TRUE);
			}	
			else if($return == Config::RET_OK && $InstanceUser->GetCorporationName() == NULL)
				$return = $instanceFacedePersistence->AssocUserCorporationInsert(
					                                     $this->InputValueCorporationName,
														 NULL, NULL,
			                                             $InstanceUser->GetEmail(),
														 $Debug, NULL, TRUE);
			if($return == Config::RET_OK)
			{
				$return = $instanceFacedePersistence->UserUpdateDepartmentByUserEmailAndCorporation(
					                                                         $this->InputValueCorporationName, 
																			 NULL, 
																			 $InstanceUser->GetEmail(), 
																			 $Debug);
				if($return == Config::DB_ERROR_UPDT_SAME_VALUE)
					$return = Config::RET_OK;
			}
			if($return == Config::RET_OK && $this->InputValueCorporationName != NULL)
			{
				$instanceFacedePersistence->CorporationSelectByName($this->InputValueCorporationName, $instanceCorporation, $Debug);
				if($return == Config::RET_OK)
				{
					$InstanceUser->SetCorporation($instanceCorporation);
					$this->Session->SetSessionValue(Config::SESS_ADMIN_USER, $InstanceUser);
					$this->UserLoadData($InstanceUser);
					$this->ShowDivReturnSuccess("USER_CHANGE_CORPORATION_SUCCESS");
					return Config::RET_OK;
				}
			}
			if($return == Config::RET_OK && $this->InputValueCorporationName == NULL)
			{
				$InstanceUser->SetCorporation(NULL);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_USER, $InstanceUser);
				$this->UserLoadData($InstanceUser);
				$this->ShowDivReturnSuccess("USER_CHANGE_CORPORATION_SUCCESS");
				return Config::RET_OK;	
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("USER_CHANGE_CORPORATION_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserUpdatePasswordByUserEmail($ResetCode, $UserPasswordNew, $UserPasswordNewRepeat, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueNewPassword     = $UserPasswordNew;
		$this->InputValueRepeatPassword  = $UserPasswordNewRepeat;
		$arrayConstants = array(); $arrayExtraField = array(); $arrayOptions = array(); $matrixConstants = array();

		//FIELD_PASSWORD_NEW
		$arrayElements[0]             = Config::FIELD_PASSWORD_NEW;
		$arrayElementsClass[0]        = &$this->ReturnPasswordClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_PASSWORD;
		$arrayElementsInput[0]        = $this->InputValueNewPassword; 
		$arrayElementsMinValue[0]     = 8; 
		$arrayElementsMaxValue[0]     = 18; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnPasswordText;
		$arrayExtraField[0]           = &$this->InputValueRepeatPassword;
		array_push($arrayConstants, 'FM_INVALID_USER_PASSWORD', 'FM_INVALID_USER_PASSWORD_MATCH');
		array_push($arrayConstants, 'FM_INVALID_USER_PASSWORD_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//RESET_CODE
		$this->Session->GetSessionValue(Config::FIELD_PASSWORD_RESET_CODE, $code);
		$arrayElements[1]             = Config::FIELD_PASSWORD_RESET_CODE;
		$arrayElementsClass[1]        = &$this->ReturnCodeClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FM_VALIDATE_FUNCTION_COMPARE_STRING;
		$arrayElementsInput[1]        = $this->InputValueCode; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 0; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnCodeText;
		array_push($arrayConstants, 'PASSWORD_RESET_INVALID_CODE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, $code);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions,
											$arrayExtraField);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserUpdatePasswordByUserEmail($UserEmail, $this->InputValueNewPassword, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_UPDT_USER_PASSWORD_SUCCESS");
				return Config::RET_OK;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("USER_UPDT_USER_PASSWORD_WARNING");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("USER_UPDT_USER_PASSWORD_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserUpdatePasswordRandomByUserEmail($Application, &$InstanceUser, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$instanceFacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
		$newRandomPassword = $instanceFacedeBusiness->GenerateRandomPassword();
		$return = $instanceFacedePersistence->UserUpdatePasswordByUserEmail($InstanceUser->GetEmail(), 
		                                                                    $newRandomPassword,
																		    $Debug);
		if($return == Config::RET_OK)
		{
			$return = $instanceFacedeBusiness->SendEmailPasswordReset($Application, 
																	  $InstanceUser->GetName(),
										                              $InstanceUser->GetEmail(),
										                              $newRandomPassword, $Debug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("PASSWORD_RESET_SUCCESS");
				return Config::RET_OK;
			}
			$this->ShowDivReturnError("SEND_EMAIL_ERROR");
			return Config::RET_ERROR;
		}
		elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
		{
			$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
			return Config::RET_WARNING;	
		}
		$this->ShowDivReturnError("PASSWORD_RESET_ERROR");
		return Config::RET_ERROR;
	}
	
	protected function UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserConfirmed = $UserConfirmedNew;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_USER_CONFIRMED
		$arrayElements[0]             = Config::FIELD_USER_CONFIRMED;
		$arrayElementsClass[0]        = &$this->ReturnUserConfirmedClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueUserConfirmed; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserConfirmedText;
		array_push($arrayConstants, 'FM_INVALID_USER_CONFIRMED', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $this->InputValueHeaderDebug);
			if($return == Config::RET_OK)
			{
				$this->ShowDivReturnSuccess("USER_UPDT_USER_CONFIRMED_SUCCESS");
				return $return;
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}	
		$this->ShowDivReturnError("USER_UPDT_USER_CONFIRMED_ERROR");
		return $return;
	}
	
	protected function UserUpdateUserTypeByUserEmail($TypeUserDescriptionNew, &$InstanceUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeUserDescription = $TypeUserDescriptionNew;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FIELD_TYPE_USER_DESCRIPTION
		$arrayElements[0]             = Config::FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeUserDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserDescriptionText;
		array_push($arrayConstants, 'FM_INVALID_TYPE_USER_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::RET_OK)
		{
			if($this->InputValueTypeUserDescription == Config::FIELD_SEL_NONE)
				$this->InputValueTypeUserDescription = NULL;
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserUpdateUserTypeByUserEmail($InstanceUser->GetEmail(),
																			    $this->InputValueTypeUserDescription,
																			    $Debug);
			if($return == Config::RET_OK)
			{
				$instanceFacedePersistence->TypeUserSelectByTypeUserDescription($this->InputValueTypeUserDescription, 
																				$instanceTypeUser, $Debug);
				if($return == Config::RET_OK)
				{
					$InstanceUser->SetUserType($instanceTypeUser);
					$this->Session->SetSessionValue(Config::SESS_ADMIN_USER, $InstanceUser);
					$this->ShowDivReturnSuccess("USER_CHANGE_USER_TYPE_SUCCESS");
					return Config::RET_OK;
				}
			}
			elseif($return == Config::DB_ERROR_UPDT_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::RET_WARNING;
			}
		}
		$this->ShowDivReturnError("USER_CHANGE_CORPORATION_ERROR");
		return Config::RET_ERROR;
	}
	
	public function CheckInputImage($Input)
	{
		if(isset($_POST[$Input . "_x"]) && isset($_POST[$Input . "_y"]))
			return TRUE;
		elseif(isset($_GET[$Input . "_x"]) && isset($_GET[$Input . "_y"]))
			return TRUE;
		else FALSE;
	}
	
	public function CheckInstanceUser()
	{
		if($this->User != NULL)
		{
			if($this->User->GetUserConfirmed())
			{
				if($this->Session->GetSessionValue(Config::SESS_LOGIN_TWO_STEP_VERIFICATION, 
															   $value) != Config::RET_OK)
					return Config::RET_OK;
				else return Config::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED;
			}
			else return Config::USER_NOT_CONFIRMED;
		}
		else return Config::USER_NOT_LOGGED_IN;
	}
	
	public function CheckLogin($Debug)
	{
		if (isset($_POST[Config::LOGIN_FM_SB]))
		{
			$this->InputValueLoginEmail     = $_POST[Config::FIELD_LOGIN];
			$this->InputValueLoginPassword  = $_POST[Config::LOGIN_PASSWORD];
			//VALIDA LOGIN
			if(!empty($this->InputValueLoginEmail) && !empty($this->InputValueLoginPassword))
			{
				if(strlen($this->InputValueLoginEmail) < 45 && strlen($this->InputValueLoginPassword) < 20)
					return $this->ExecuteLoginFirstPhaseVerification($Debug);
				else
				{
					$this->ShowDivReturnError("LOGIN_INVALID_LOGIN");
					return Config::RET_ERROR;
				}
			}
			else
			{
				$this->ReturnEmptyText = $this->InstanceLanguageText->GetConstant('FILL_REQUIRED_FIELDS', $this->Language);
				$this->ShowDivReturnError("");
			}
		}
		elseif(isset($_POST[Config::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB]))
		{
			if($this->ExecuteLoginSecondPhaseVerirication() == Config::RET_OK)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_LOGIN_TWO_STEP_VERIFICATION);
				return Config::RET_OK;	
			}
			$this->Session->RemoveSessionVariable(Config::SESS_LOGIN_TWO_STEP_VERIFICATION);	
			$this->ShowDivReturnError("LOGIN_TWO_STEP_VERIFICATION_CODE_ERROR");
			return Config::RET_ERROR;
		}
		elseif(isset($_POST[Config::LOGIN_FM_SB_FORGOT_PASSWORD]))
		{
			$this->InputValueLoginEmail     = $_POST[Config::FIELD_LOGIN];
			Page::GetCurrentDomain($domain);
			if($this->InputValueLoginEmail != "")
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
				                              str_replace('_', '', Config::PAGE_PASSWORD_RECOVERY) . '?=' . 
									                               $this->InputValueLoginEmail);
			else $this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
				                              str_replace('_', '', Config::PAGE_PASSWORD_RECOVERY));
		}
	}
	
	public function CheckGetContainsKey($Key)
	{
		foreach($_GET as $getElementKey=>$getElementValue)
		{
			if(strpos($getElementKey, $Key) !== false)
			{
				if($getElementKey == $Key) 
					return Config::RET_OK;
				elseif($getElementKey == $Key."_x")
					return Config::RET_OK;
				elseif($getElementKey == $Key."Back_x")
					return Config::RET_OK;
				elseif($getElementKey == $Key."Forward_x")
					return Config::RET_OK;
			}
		}
		return Config::RET_ERROR;
	}
	
	public function CheckGetOrPostContainsKey($Key)
	{
		if($this->CheckGetContainsKey($Key) == Config::RET_OK)
		{
			$_POST = $_GET;
			return Config::RET_OK;
		}
		elseif($this->CheckPostContainsKey($Key) == Config::RET_OK)
		{
			$_GET = $_POST;
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	public function CheckPostContainsKey($Key)
	{
		foreach($_POST as $postElementKey=>$postElementValue)
		{
			if(strpos($postElementKey, $Key) !== false)
			{
				if($postElementKey == $Key) 
					return Config::RET_OK;
				elseif($postElementKey == $Key."_x")
					return Config::RET_OK;
				elseif($postElementKey == $Key."Back_x")
					return Config::RET_OK;
				elseif($postElementKey == $Key."Forward_x")
					return Config::RET_OK;
			}
		}
		return Config::RET_ERROR;
	}
	
	public function GetCurrentPage()
	{
		$pageConstant = Config::GetPageConstant($this->Page);
		if($pageConstant == NULL)
			return get_class($this);
		else return $pageConstant;
	}
	
	public function IncludeHeadAll($HasLoginForm)
	{
		$return = NULL;
		if ($this->Page != NULL)
		{
			echo Config::HTML_TAG_HEAD_START;
			$return = $this->IncludeHeadGeneric();
			if ($return == Config::RET_OK)
			{
				if($this->Device == Page::DEVICE_MOBILE)
					$prefix = "Mobile";
				else $prefix = NULL;
				echo "<!-- HEAD " . $this->Page . " -->";
				if(file_exists(REL_PATH . "Style/Generic/" . $prefix . "Generic.css"))
				{
					echo "<style name='" . $prefix . "Generic.css'>";
					include_once(REL_PATH . "Style/Generic/" . $prefix . "Generic.css"); 
					echo '</style>';
				}
				if(file_exists(REL_PATH . "Style/Header/" . $prefix . "Header.css"))
				{
					echo "<style name='" . $prefix . "Header.css'>";
					include_once(REL_PATH . "Style/Header/" . $prefix . "Header.css"); 
					echo '</style>';
				}
				if(file_exists(REL_PATH . "Style/Generic/" . $prefix . "Form.css"))
				{
					echo "<style name='" . $prefix . "Form.css'>";
					include_once(REL_PATH . "Style/Generic/" . $prefix . "Form.css");
					echo '</style>';
				}
				if(file_exists(REL_PATH . "Style/Generic/" . $prefix . "Tabs.css"))
				{
					echo "<style name='" . $prefix . "Tabs.css'>";
					include_once(REL_PATH . "Style/Generic/" . $prefix . "Tabs.css");
					echo '</style>';
				}
				if(file_exists(REL_PATH . "Style/Body/" . $prefix . str_replace("Page", "", $this->Page) . ".css"))
				{
					echo "<style name='" . $prefix . $this->Page . ".css'>";
					include_once(REL_PATH . "Style/Body/" . $prefix . str_replace("Page", "", $this->Page) . ".css");
					echo '</style>';
				}
				if($HasLoginForm)
				{
					echo "<style name='" . $prefix . "Login.css'>";
					include_once(REL_PATH . "Style/Body/" . $prefix . "Login.css");
					echo '</style>';
				}
				elseif(file_exists(REL_PATH . "Style/Body/" . $prefix . 
								   str_replace("_", "", str_replace("Page_Admin_", "", $this->PageBody)) . ".css"))
				{
					echo'<style name="' . $prefix . $this->PageBody . '.css">';
					include_once(REL_PATH . "Style/Body/" . $prefix . 
								 str_replace("_", "", str_replace("Page_Admin_", "", $this->PageBody)) . ".css");
					echo '</style>';
				}
				if(strpos($this->Page, "PageAdmin") !== false)
				{
					if(file_exists(REL_PATH . "Style/Generic/" . $prefix . "Admin.css"))
					{
						echo'<style name="' . $prefix .'Admin.css">';
						include_once(REL_PATH . "Style/Generic/" . $prefix . "Admin.css");
						echo '</style>';
					}
				}
				if(file_exists(REL_PATH . "Style/Footer/" . $prefix . "Footer.css"))
				{
					echo '<style name="' . $prefix . 'Footer.css">';
					include_once(REL_PATH . "Style/Footer/" . $prefix . "Footer.css"); 
					echo '</style>';
				}
				$return = $this->IncludeHeadJavaScript();
			}
			echo Config::HTML_TAG_HEAD_END;
			return $return;
		}
		else return Config::RET_ERROR;
	}
	
	public function IncludeHeadGeneric()
	{
		if (file_exists (REL_PATH . Config::PATH_HEAD . Config::HEAD_GENERIC))
		{
			include_once(REL_PATH . Config::PATH_HEAD . Config::HEAD_GENERIC);
			return Config::RET_OK;
		}
		else return self::ERROR_HEAD_GENERIC_NOT_EXISTS;
	}
	
	public function IncludeHeadJavaScript()
	{
		if($_SERVER['HTTP_HOST'] != Config::LOCAL_IP)
		{
			if (file_exists (REL_PATH . Config::PATH_HEAD . Config::HEAD_JAVASCRIPT))
			{
				include_once(REL_PATH . Config::PATH_HEAD . Config::HEAD_JAVASCRIPT);
				return Config::RET_OK;
			}
			else return self::ERROR_HEAD_JAVASCRIPT_NOT_EXISTS;
		}
		else return Config::RET_OK;
	}
	
	public function LoadPage()
	{	
		if(!$this->PageEnabled) return Config::RET_ERROR;
		$this->LoadHtml(FALSE);
	}
	
	public function LoadPageDependencies()
	{
		$return = NULL; $currentDomain = NULL; $language = NULL; $instanceLanguage = NULL;
		$this->CheckPostLanguage();
		$this->Session->GetSessionValue(Config::SESS_LANGUAGE, $this->Language);
		$this->InstanceLanguageText = LanguageInfraTools::__create($this->Config, $this->Language);
		if($this->InstanceLanguageText != NULL)
		{
			$this->LoadInstanceUser();
			$this->LoadPageDependenciesDevice();
			$this->LoadPageDependenciesDebug();
			return Config::RET_OK;
		}
		else return self::ERROR_LANGUAGE_INSTANCE_NOT_CREATED;
	}
	
	public function LoadPageDependenciesDebug()
	{
		if(isset($this->User))
		{
			if($this->User->CheckSuperUser())
			{
				if(!isset($_POST[Config::FIELD_HEADER_DEBUG]) && !isset($_POST[Config::FIELD_HEADER_DEBUG_HIDDEN]))
					$this->Session->GetSessionValue(Config::SESS_DEBUG, $this->InputValueHeaderDebug);
				if($this->InputValueHeaderDebug == Config::CHECKBOX_CHECKED || isset($_POST[Config::FIELD_HEADER_DEBUG]))
				{
					$this->StartPageLoadTime();
					$this->InputValueHeaderDebug = Config::CHECKBOX_CHECKED;
					$this->ReturnHeaderDebugClass = "SwitchToggleSlider SwitchToggleSliderChange";
					echo "<div class='DivPageDebug'>";
					echo "<div class='DivPageDebugContent'><b>Form</b>: </div>";
					echo "<div class='DivPageDebugContent'>&emsp;<b>GET</b>: "; print_r($_GET);  echo "</div>";
					echo "<div class='DivPageDebugContent'>&emsp;<b>POST</b>: "; print_r($_POST); echo "</div></div>";
					echo "<div class='DivPageDebugContent'>&emsp;<b>FILES</b>: "; print_r($_FILES); echo "</div></div>";
					echo "<div class='DivClearFloat'></div>";
				}
				$this->Session->SetSessionValue(Config::SESS_DEBUG, $this->InputValueHeaderDebug);
			}
		}
	}
	
	public function LoadPageDependenciesDevice()
	{
		$this->InstanceMobileDetect = $this->Factory->CreateMobileDetect();
		if($this->InstanceMobileDetect->isTablet()) 
			$this->Device = Page::DEVICE_TABLET;
		elseif ($this->InstanceMobileDetect->isMobile())			
			$this->Device = Page::DEVICE_MOBILE;
		else $this->Device = Page::DEVICE_DESKTOP;
		
		if(!isset($_POST[Config::FIELD_HEADER_LAYOUT]) && !isset($_POST[Config::FIELD_HEADER_LAYOUT_HIDDEN]))
			$this->Session->GetSessionValue(Config::SESS_DEVICE_LAYOUT, $this->InputValueHeaderLayout);
		
		if(isset($_POST[Config::FIELD_HEADER_LAYOUT]))
		{
			$this->Device = Page::DEVICE_MOBILE;
			$this->InputValueHeaderLayout = Config::CHECKBOX_CHECKED;
			$this->ReturnHeaderLayoutClass = "SwitchToggleSlider SwitchToggleSliderChange";

		}
		elseif(isset($_POST[Config::FIELD_HEADER_LAYOUT_HIDDEN])) 
			$this->InputValueHeaderLayout = Config::CHECKBOX_UNCHECKED;
		else
		{
			if($this->InputValueHeaderLayout == Config::CHECKBOX_CHECKED)
			{
				$this->Device = Page::DEVICE_MOBILE;
				$this->ReturnHeaderLayoutClass = "SwitchToggleSlider SwitchToggleSliderChange";
			}
			else $this->Device = Page::DEVICE_DESKTOP;
		}
		$this->Session->SetSessionValue(Config::SESS_DEVICE_LAYOUT, $this->InputValueHeaderLayout);
	}
	
	public function LoadNotConfirmedToolTip()
	{
		$this->ShowDivReturnWarning(Config::USER_NOT_CONFIRMED);
		return Config::RET_WARNING;
	}
	
	public function RedirectPage($Page)
	{
		$return = NULL;
		if ($Page == NULL)
		{
			$return = Page::GetCurrentDomain($Page);
			if ($return == Config::RET_OK)
			{
				header("Location: $Page");
			}
			else return Config::RET_ERROR;
		}
		else header("Location: $Page");
	}
	
	public function ShowDivReturnError($Constant, $ConstanteIsText = FALSE)
	{
		$this->ReturnClass = Config::FM_BACKGROUND_ERROR;
		$this->ReturnImage = "<img src='" . $this->Config->DefaultServerImage . Config::FM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		if(isset($Constant))
		{
			if(($Constant) != NULL)
			{
				if($ConstanteIsText)
					$this->ReturnText = $Constant;
				else $this->ReturnText  = $this->InstanceLanguageText->GetConstant($Constant, $this->Language);	
			}
		}
	}
	
	public function ShowDivReturnEmpty()
	{
		$this->ReturnClass = "DivHidden";
		$this->ReturnImage = "DivDisplayNone";
		$this->ReturnText  = "";
	}
	
	public function ShowDivReturnSuccess($Constant, $ConstanteIsText = FALSE)
	{
		$this->ReturnClass = Config::FM_BACKGROUND_SUCCESS;
		$this->ReturnImage = "<img src='" . $this->Config->DefaultServerImage . Config::FM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
		if(isset($Constant))
		{
			if(($Constant) != NULL)
			{
				if($ConstanteIsText)
					$this->ReturnText = $Constant;
				else $this->ReturnText  = $this->InstanceLanguageText->GetConstant($Constant, $this->Language);	
			}
		}
	}
	
	public function ShowDivReturnWarning($Constant, $ConstanteIsText = FALSE)
	{
		$this->ReturnClass = Config::FM_BACKGROUND_WARNING;
		$this->ReturnImage = "<img src='" . $this->Config->DefaultServerImage . Config::FM_IMAGE_WARNING . "' alt='ReturnImage'/>";
		if(isset($Constant))
		{
			if(($Constant) != NULL)
			{
				if($ConstanteIsText)
					$this->ReturnText = $Constant;
				else $this->ReturnText  = $this->InstanceLanguageText->GetConstant($Constant, $this->Language);
			}
		}
	}
	
	public function StartPageLoadTime()
	{
		$time = microtime();
		$time = explode(' ', $time);
		$this->PageLoadTime = $time[1] + $time[0];
	}
	
	public function StopPageLoadTime()
	{
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$this->PageLoadTime = round(($time - $this->PageLoadTime), 4);
	}
	
	public static function AlertMessage($Message)
	{
		echo '<script type="text/javascript">alert("' . $Message . '")</script>';
	}
	
	public static function GetCurrentDomain(&$currentDomain)
	{
		$currentDomain = NULL;
		if ($_SERVER != NULL)
		{
			$currentDomain = self::HTTP;
			if (!empty($_SERVER['HTTPS'])) 
			{
				if($_SERVER['HTTPS'] == 'on')
				{
					$currentDomain .= "s";
				}
			}
			$currentDomain .= "://";
			$currentDomain .= $_SERVER[self::SERVER_NAME];
			$currentDomain .= "/";
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	public static function GetCurrentDomainWithPort(&$currentDomain)
	{
		$currentDomain = NULL;
		if ($_SERVER != NULL)
		{
			$currentDomain = self::HTTP;
			if (!empty($_SERVER[self::HTTPS])) 
			{
				if($_SERVER[self::HTTPS] == 'on')
				{
					$currentDomain .= "s";
				}
			}
			$currentDomain .= "://";
			$currentDomain .= $_SERVER[self::SERVER_NAME] . ":" . $_SERVER[self::SERVER_PORT];
			$currentDomain .= "/";
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	public static function GetCurrentURL(&$pageUrl) 
	{
		$pageUrl = NULL;
		if ($_SERVER != NULL)
		{
			$pageUrl = self::HTTP;
			if (!empty($_SERVER[self::HTTPS])) 
			{
				if($_SERVER[self::HTTPS] == 'on')
				{
					$pageUrl .= "s";
				}
			}
			$pageUrl .= "://";
			if ($_SERVER[self::SERVER_PORT] != self::HTTP_PORT) 
			{
				$pageUrl .= $_SERVER[self::SERVER_NAME].":".$_SERVER[self::SERVER_PORT].$_SERVER[self::REQUEST_URI];
			} 
			else 
			{
				$pageUrl .= $_SERVER[self::SERVER_NAME].$_SERVER[self::REQUEST_URI];
			}
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	public static function TagOnloadFocusField($Form, $Field)
	{
		if(isset($Form) && isset($Field))
		{
			if($Form != NULL && $Field != NULL)
				return "<script>document.forms['" .$Form . "'].elements['". $Field ."'].focus();</script>";
		}
		return NULL;
	}
}
?>