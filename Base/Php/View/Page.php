<?php

/************************************************************************
Class: Page.php
Creation: 05/11/2013
Creator: Marcus Siqueira
Dependencies:
			Base/Web/Php/Config.php
			Base/Web/Php/Language.php
			Base/Web/Php/Head.php

Description: 
			Classe que lida com páginas, transição de páginas, URL, Domínios
            dentre outras funcionalidades ligadas a uma página Web.
			Padroes: Singleton.
Get / Set:		
			public function GetPageLoadTime();
Methods: 
		private       function        CheckPostLanguage();
		private       function        ExecuteLoginFirstPhaseVerification($Debug);
		private       function        ExecuteLoginSecondPhaseVerirication();
		private       function        LoadInstanceUser();
		private       function        SendTwoStepVerificationCode($Application, $UserEmail, $UserName, $Debug);
		protected     function        TagOnloadFocusField($Form, $Field);
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
		protected     function        CorporationSelectUsers($Limit1, $Limit2, $InstanceCorporation, &$ArrayInstanceCorporationUsers,
		                                                     &$RowCount, $Debug, $HideReturnSuccessImage = TRUE);
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
		protected     function        ExecuteFunction($PostForm, $Function, $ArrayParameter, $Debug);
		protected     function        LoadHtml($HasLoginForm, $EnableDivPush = TRUE);
		protected     function        LoadDataFromSession($SessionKey, $Function, &$Instance);
		protected     function        PageStackSessionLoad();
		protected     function        PageStackSessionRemoveAll();
		protected     function        PageStackSessionSave();
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
		protected     function        TypeUserDeleteByTypeUserId($InstanceTypeUser, $Debug);
		protected     function        TypeUserInsert($TypeUserDescription, $Debug);
		protected     function        TypeUserLoadData(&$InstanceTypeUser);
		protected     function        TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug);
		protected     function        TypeUserSelectByTypeUserDescription($TypeUserDescription, &$InstanceTypeUser, $Debug);
		protected     function        TypeUserSelectByTypeUserId($TypeUserId, &$InstanceTypeUser, $Debug);
		protected     function        TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug);
		protected     function        TypeUserUpdateByTypeUserId($TypeUserDescriptionNew, $InstanceTypeUser, $Debug);
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
		protected     function        UserSelectByDepartment($Limit1, $Limit2, $CorporationName, $DepartmentName, 
		                                                     &$ArrayInstanceDepartmentUsers, &$RowCount, Debug);
		protected     function        UserSelectByHashCode($HashCode, &$UserInstance, $Debug);
		protected     function        UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription,
		                                                                       &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByTypeUserId($Limit1, $Limit2, $TypeUserId, &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByUserEmail($UserEmail, &$UserInstance, $Debug);
		protected     function        UserSelectByUserUniqueId($UniqueId, &$UserInstance, $Debug);
		protected     function        UserSelectExistsByUserEmail($$Capcha, $UserEmail, $Debug);
		protected     function        UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug);
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
		protected     function        UserUpdateUserTypeByUserEmail($TypeUserIdNew, &$InstanceUser, $Debug);
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
		public        function        ShowDivReturnError($Constant);
		public        function        ShowDivReturnEmpty();
		public        function        ShowDivReturnSuccess($Constant);
		public        function        ShowDivReturnWarning($Constant);
		public        function        StartPageLoadTime();
		public        function        StopPageLoadTime();
		public static function        AlertMessage($Message);
		public static function        GetCurrentDomain(&$currentDomain);
		public static function        GetCurrentDomainWithPort(&$currentDomain);
		public static function        GetCurrentURL(&$pageUrl);
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
	public    $InputValueGender                                     = "";
	public    $InputValueHeaderDebug                                = Config::CHECKBOX_UNCHECKED;
	public    $InputValueHeaderLayout                               = Config::CHECKBOX_UNCHECKED;
	public    $InputValueLimit1                                     = "";
	public    $InputValueLimit2                                     = "";
	public    $InputValueLoginEmail                                 = "";
	public    $InputValueLoginPassword                              = "";
	public    $InputValueLoginTwoStepVerificationCode               = "";
	public    $InputValueNewPassword                                = "";
	public    $InputValueRegion                                     = "";
	public    $InputValueRegisterDate                               = "";
	public    $InputValueRegistrationDateDay                        = "";
	public    $InputValueRegistrationDateMonth                      = "";
	public    $InputValueRegistrationDateYear                       = "";
	public    $InputValueRegistrationId                             = "";
	public    $InputValueRepeatPassword                             = "";
	public    $InputValueRowCount                                   = "";
	public    $InputValueTeamDescription                            = "";
	public    $InputValueTeamId                                     = "";
	public    $InputValueTeamIdRadio                                = "";
	public    $InputValueTeamName                                   = "";
	public    $InputValueTeamNameRadio                              = "";
	public    $InputValueTicketDescription                          = "";
	public    $InputValueTicketTitle                                = "";
	public    $InputValueTicketType                                 = "";
	public    $InputValueTwoStepVerification                        = "";
	public    $InputValueTypeAssocUserServiceDescription            = "";
	public    $InputValueTypeAssocUserServiceId                     = "";
	public    $InputValueTypeAssocUserTeamDescription               = "";
	public    $InputValueTypeServiceName                            = "";
	public    $InputValueTypeStatusTicketDescription                = "";
	public    $InputValueTypeTicketDescription                      = "";
	public    $InputValueTypeUserDescription                        = "";
	public    $InputValueTypeUserId                                 = "";
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
	public    $ReturnTypeUserIdClass                                = "";
	public    $ReturnTypeUserIdText                                 = "";
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
		//FORM_FIELD_HEADER_LOG_OUT
		if(isset($_POST[Config::POST_BACK_FORM]))
		{
			if ($_POST[Config::POST_BACK_FORM] == Config::FORM_FIELD_HEADER_LOG_OUT)
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
				return Config::ERROR;
			}
		}
		$this->PageEnabled = TRUE;
		$this->Session->SetSessionValue(Config::SESS_LANGUAGE, $Language);
		if($this->LoadPageDependencies() == Config::SUCCESS)
		{
			if($this->PageCheckLogin == TRUE)
			{
				if($this->CheckInstanceUser() == Config::USER_NOT_LOGGED_IN)
					$this->CheckLogin($this->InputValueHeaderDebug);
			}
		}
		return Config::SUCCESS;
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
		if(isset($_POST[Config::POST_BACK_FORM]))
		{
			if ($_POST[Config::POST_BACK_FORM] == Config::LANGUAGE_ENGLISH ||
			    $_POST[Config::POST_BACK_FORM] == Config::LANGUAGE_GERMAN ||
				$_POST[Config::POST_BACK_FORM] == Config::LANGUAGE_PORTUGUESE ||
				$_POST[Config::POST_BACK_FORM] == Config::LANGUAGE_SPANISH)
			{
				header("Location: "  . ProjectConfig::$AddressApplication . "/" . str_replace('Language/', '', 
									   $_POST[Config::POST_BACK_FORM]) . "/"
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
					                                                                 $this->InputValueLoginPassword, 
																				     $Debug);
			if($return == Config::SUCCESS)
			{
				$return = $this->InstanceFacedePersistence->UserSelectByUserEmail($this->InputValueLoginEmail, 
																			  $user, $Debug);
				if($return == Config::SUCCESS)
					$return = $this->InstanceFacedePersistence->UserSelectTeamByUserEmail($user, $Debug);
			}
		}
		else
		{
			$return = $this->InstanceFacedePersistence->UserCheckPasswordByUserUniqueId($this->InputValueLoginEmail, 
					                                                                    $this->InputValueLoginPassword, 
																				        $Debug);
			if($return == Config::SUCCESS)
			{
				$return = $this->InstanceFacedePersistence->UserSelectByUserUniqueId($this->InputValueLoginEmail, 
																			         $user, $Debug);
				if($return == Config::SUCCESS)
					$return = $this->InstanceFacedePersistence->UserSelectTeamByUserEmail($user,
																				 	      $Debug);
			}
		}
		if($return == Config::SUCCESS || $return == Config::MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_EMPTY)
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
															  $user->GetEmail(),$user->GetName(), $Debug) == Config::SUCCESS)
							return Config::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED;
						else
						{
							$this->ShowDivReturnError("LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_FAILED");
							return Config::ERROR;
						}
					}
					return Config::SUCCESS;
				}
				else
				{	
					$this->User = $user;
					$this->Session->SetSessionValue(Config::SESS_USER, $this->User);
					$this->LoadNotConfirmedToolTip();
					return Config::WARNING;
				}
			}
			else $this->ShowDivReturnError("USER_INACTIVE");
		}
		else $this->ShowDivReturnError("LOGIN_INVALID_LOGIN");	
	}
	
	private function ExecuteLoginSecondPhaseVerirication()
	{
		if (isset($_POST[Config::FORM_LOGIN_TWO_STEP_VERIFICATION_CODE_SUBMIT]))
		{
			$this->InputValueLoginTwoStepVerificationCode = $_POST[Config::LOGIN_TWO_STEP_VERIFICATION_CODE];
			$this->Session->GetSessionValue(Config::SESS_LOGIN_TWO_STEP_VERIFICATION, $value);
			if($this->InputValueLoginTwoStepVerificationCode == $value)
				return Config::SUCCESS;
			else return Config::ERROR;
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
			if($this->Session->GetSessionValue(Config::SESS_USER, $this->User) == Config::SUCCESS)
				return Config::SUCCESS;
			else return Config::ERROR;
		}
		else return Config::SUCCESS;
	}
	
	private function SendTwoStepVerificationCode($Application, $UserEmail, $UserName, $Debug)
	{
		$FacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
		$code = $FacedeBusiness->GenerateRandomCode();
		$this->Session->SetSessionValue(Config::SESS_LOGIN_TWO_STEP_VERIFICATION,
													$code);
		if($FacedeBusiness->SendEmailLoginTwoStepVerificationCode($Application, 
																  $UserEmail, $UserName, $code, $Debug) == Config::SUCCESS)
			return Config::SUCCESS;
		else return Config::ERROR;
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
		if($return == Config::SUCCESS)
		{
			$this->ShowDivReturnSuccess('CORPORATION_DELETE_SUCCESS');
			return $return;
		}
		if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			$constant = "CORPORATION_DELETE_ERROR_DEPENDENCY_DEPARTMENT";
		else $constant = "CORPORATION_DELETE_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::ERROR;
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

		//CORPORATION_NAME
		$arrayElements[0]             = Config::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->CorporationInsert($CorporationActive, 
																	$CorporationName, 
																    $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess('CORPORATION_INSERT_SUCCESS');
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("CORPORATION_INSERT_ERROR");
		return Config::ERROR;
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
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->CorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporation, 
															    $RowCount, $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("CORPORATION_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		return $instanceFacedePersistence->CorporationSelectActive($Limit1, $Limit2, $ArrayInstanceCorporation, 
															         $RowCount, $Debug);
	}
	
	protected function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		return $instanceFacedePersistence->CorporationSelectActiveNoLimit($ArrayInstanceCorporation, 
															                $Debug);
	}
	
	protected function CorporationSelectByName($CorporationName, &$InstanceCorporation, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
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
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->CorporationSelectByName($CorporationName,
																		  $InstanceCorporation, 
																		  $Debug);
			if($return == Config::SUCCESS)
			{
				$return = $this->CorporationLoadData($InstanceCorporation);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_CORPORATION, $InstanceCorporation);
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("CORPORATION_NOT_FOUND");
		return Config::FORM_FIELD_ERROR;
	}
	
	protected function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		return $instanceFacedePersistence->CorporationSelectNoLimit($ArrayInstanceCorporation, 
															          $Debug);
	}
	
	protected function CorporationSelectUsers($Limit1, $Limit2, $InstanceCorporation, &$ArrayInstanceCorporationUsers, 
											  &$RowCount, $Debug, $HideReturnSuccessImage = TRUE)
	{
		$ArrayInstanceCorporationUsers = NULL;
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->UserSelectByCorporationName($InstanceCorporation->GetCorporationName(),
			                                                              $Limit1, $Limit2,
			                                                              $ArrayInstanceCorporationUsers, 
																	      $RowCount, $Debug);
		if($return == Config::SUCCESS)
		{
			if($HideReturnSuccessImage)
				$this->ShowDivReturnEmpty();
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("CORPORATION_SELECT_USERS_ERROR");
		return Config::ERROR;
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
		$arrayElements[0]             = Config::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
												$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
												$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
												$matrixConstants, $Debug, $arrayOptions);

		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->CorporationUpdateByName($CorporationActive,
																          $CorporationName,
																          $InstanceCorporation->GetCorporationName(),
																          $Debug);
			if($return == Config::SUCCESS)
			{
				$InstanceCorporation->SetCorporationActive($CorporationActive);
				$InstanceCorporation->SetCorporationName($CorporationName);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_CORPORATION, $InstanceCorporation);
				$this->CorporationLoadData($InstanceCorporation);
				$this->ShowDivReturnSuccess('CORPORATION_UPDATE_SUCCESS');
				return $return;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;	
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnError("CORPORATION_UPDATE_ERROR_UNIQUE_EXISTS");
				return Config::ERROR;
			}
		}
		$this->ShowDivReturnError("CORPORATION_UPDATE_ERROR");
		return Config::ERROR;
	}
	
	protected function CountrySelect($Limit1, $Limit2, &$ArrayInstanceCountry, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->CountrySelect($Limit1, $Limit2, $ArrayInstanceCountry, 
													        $RowCount, $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("COUNTRY_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug);
		if($return == Config::SUCCESS)
		{
			$this->ShowDivReturnSuccess('DEPARTMENT_DELETE_SUCCESS');
			return Config::SUCCESS;
		}
		if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			$constant = "DEPARTMENT_DELETE_ERROR_DEPENDENCY_USERS";	
		else $constant = "DEPARTMENT_DELETE_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::ERROR;
	}
	
	protected function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug)
	{
		$this->InputValueDepartmentName = $DepartmentName;
		$this->InputValueDepartmentInitials = $DepartmentInitials;
		$this->InputValueCorporationName = $CorporationName;
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayElements = array(); $arrayElementsClass = array(); $arrayElementsDefaultValue = array(); $arrayElementsForm = array();
		$arrayElementsInput = array(); $arrayElementsMinValue = array(); $arrayElementsMaxValue = array();
		$arrayElementsNullable = array(); $arrayElementsText = array(); $arrayConstants = array(); $matrixConstants = array();
		
		//VALIDATE DEPARTMENT_INITIALS
		$arrayElements[0]             = Config::FORM_FIELD_DEPARTMENT_INITIALS;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentInitialsClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_INITIALS;
		$arrayElementsInput[0]        = $this->InputValueDepartmentInitials; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnDepartmentInitialsText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_INITIALS', 'FORM_INVALID_DEPARTMENT_INITIALS_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//VALIDATE DEPARTMENT_NAME
		$arrayElements[1]             = Config::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[1] = "";
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME; 
		$arrayElementsInput[1]        = $this->InputValueDepartmentName;
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = FALSE; 
		$arrayElementsText[1]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
        //VALIDATE CORPORATION_NAME
		$arrayElements[2]             = Config::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[2]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[2]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->DepartmentInsert($this->InputValueCorporationName,
														   $this->InputValueDepartmentInitials,
														   $this->InputValueDepartmentName, 
														   $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess('DEPARTMENT_INSERT_SUCCESS');
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::WARNING;
			}
			elseif($return == Config::MYSQL_ERROR_FOREIGN_KEY_INSERT_RESTRICT)
			{
				$this->ShowDivReturnError("DEPARTMENT_INSERT_ERROR_NO_CORPORATION");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_INSERT_ERROR");
		return Config::ERROR;
	}
	
	protected function DepartmentLoadData($InstanceDepartment)
	{
		if(isset($InstanceDepartment) && $InstanceDepartment != NULL)
		{
			$this->InputValueCorporationName     = $InstanceDepartment->GetDepartmentCorporationName();
			$this->InputValueDepartmentInitials  = $InstanceDepartment->GetDepartmentInitials();
			$this->InputValueDepartmentName      = $InstanceDepartment->GetDepartmentName();
			$this->InputValueRegisterDate        = $InstanceDepartment->GetRegisterDate();
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->DepartmentSelect($Limit1, $Limit2,
															   $ArrayInstanceDepartment,
															   $RowCount,
															   $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, &$ArrayInstanceDepartment, 
													     &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
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
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->DepartmentSelectByCorporationName($CorporationName,
																					$Limit1, $Limit2,
																		            $ArrayInstanceDepartment,
																					$RowCount, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $ArrayInstanceDepartment);
				return $return;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $CorporationName; 
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
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->DepartmentSelectByCorporationNameNoLimit($CorporationName,
																		                   $ArrayInstanceDepartment, 
																		                   $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $ArrayInstanceDepartment);
				return $return;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueDepartmentName = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_DEPARTMENT_NAME
		$arrayElements[0]             = Config::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
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
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->DepartmentSelectByDepartmentName($this->InputValueDepartmentName, 
																		   $ArrayInstanceDepartment, $Debug);
			if($return == Config::SUCCESS)
				return $return;
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
																		  &$InstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueCorporationName = $CorporationName;
		$this->InputValueDepartmentName = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_CORPORATION_NAME
		$arrayElements[0]             = Config::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_DEPARTMENT_NAME
		$arrayElements[1]             = Config::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
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
											$matrixConstants, $Debug);
		
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->DepartmentSelectByDepartmentNameAndCorporationName(
				                                                                     $this->InputValueCorporationName, 
																				     $this->InputValueDepartmentName,
																		             $InstanceDepartment, $Debug);
			if($return == Config::SUCCESS)
			{
				$return = $this->DepartmentLoadData($InstanceDepartment);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $InstanceDepartment);
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug)
	{
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $FacedePersistence->DepartmentSelectNoLimit($ArrayInstanceDepartment, $Debug);
		if($return == Config::SUCCESS)
		{
			$this->ShowDivReturnEmpty();
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function DepartmentUpdateDepartmentByDepartmentAndCorporation($DepartmentInitialsNew, $DepartmentNameNew, 
																			&$InstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueDepartmentInitials = $DepartmentInitialsNew;
		$this->InputValueDepartmentName  = $DepartmentNameNew;
		$this->InputFocus = Config::FORM_FIELD_DEPARTMENT_NAME;
		$arrayConstants = array(); $matrixConstants = array();

		//DEPARTMENT_INITIALS
		$arrayElements[0]             = Config::FORM_FIELD_DEPARTMENT_INITIALS;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentInitialsClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_INITIALS;
		$arrayElementsInput[0]        = $this->InputValueDepartmentInitials; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnDepartmentInitialsText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_INITIALS', 'FORM_INVALID_DEPARTMENT_INITIALS_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//DEPARTMENT_NAME
		$arrayElements[1]             = Config::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[1]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[1]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->DepartmentUpdateDepartmentByDepartmentAndCorporation(
															   $InstanceDepartment->GetDepartmentCorporationName(),
															   $this->InputValueDepartmentInitials,
															   $this->InputValueDepartmentName,
															   $InstanceDepartment->GetDepartmentName(), 
															   $Debug);
			if($return == Config::SUCCESS)
			{
				$InstanceDepartment->SetDepartmentInitials($this->InputValueDepartmentInitials);
				$InstanceDepartment->SetDepartmentName($this->InputValueDepartmentName);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $InstanceDepartment);
				$this->DepartmentLoadData($InstanceDepartment);
				$this->ShowDivReturnSuccess("DEPARTMENT_UPDATE_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_UPDATE_ERROR");
		return Config::ERROR;
	}
	
	protected function DepartmentUpdateCorporationByCorporationAndDepartment($CorporationNameNew, &$InstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationNameNew;
		$this->InputValueDepartmentName  = $InstanceDepartment->GetDepartmentName();
		$this->InputFocus = Config::FORM_FIELD_DEPARTMENT_NAME;
		$arrayConstants = array(); $matrixConstants = array();
		
		//DEPARTMENT_NAME
		$arrayElements[0]             = Config::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[0]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[0]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'DEPARTMENT_INVALID_NAME', 'DEPARTMENT_INVALID_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//CORPORATION_NAME
		$arrayElements[1]             = Config::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[1]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->DepartmentUpdateCorporationByCorporationAndDepartment($this->InputValueCorporationName,
															                            $InstanceDepartment->GetDepartmentCorporationName(),
															                            $InstanceDepartment->GetDepartmentName(),
															                            $Debug);
			if($return == Config::SUCCESS)
			{
				$return = $this->CorporationSelectByName($this->InputValueCorporationName, $InstanceCorporation, $Debug);
				if($return == Config::SUCCESS)
				{
					$return = $this->DepartmentLoadData($InstanceDepartment);
					if($return == Config::SUCCESS)
					{
						$InstanceDepartment->SetDepartmentCorporation($InstanceCorporation);
						$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $InstanceDepartment);
						$this->DepartmentLoadData($InstanceDepartment);
						$this->ShowDivReturnSuccess("DEPARTMENT_UPDATE_SUCCESS");
						return Config::SUCCESS;
					}
					else
					{
						$this->ShowDivReturnError("DEPARTMENT_NOT_FOUND");
						return Config::ERROR;
					}
				}
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("DEPARTMENT_UPDATE_ERROR");
		return Config::ERROR;
	}
	
	protected function ExecuteFunction($PostForm, $Function, $ArrayParameter, $Debug)
	{
		foreach($PostForm as $postElementKey=>$postElementValue)
		{
			$postElementKey = strtoupper($postElementKey);
			if((strpos($postElementKey, 'LIST') !== FALSE) && strpos($postElementKey, 'LIMIT') == FALSE)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if(strpos($postElementKey, 'BACK') !== FALSE)
				{
					$this->InputLimitOne = $_POST[Config::FORM_LIST_INPUT_LIMIT_ONE] - 25;
					$this->InputLimitTwo = $_POST[Config::FORM_LIST_INPUT_LIMIT_TWO] - 25;
					if($this->InputLimitOne < 0)
						$this->InputLimitOne = 0;
					if($this->InputLimitTwo <= 0)
						$this->InputLimitTwo = 25;
				}
				elseif (strpos($postElementKey, 'FORWARD') !== FALSE) 
				{
					$this->InputLimitOne = $_POST[Config::FORM_LIST_INPUT_LIMIT_ONE] + 25;
					$this->InputLimitTwo = $_POST[Config::FORM_LIST_INPUT_LIMIT_TWO] + 25;
					$ArrayParameterTemp = $ArrayParameter;
					array_unshift($ArrayParameterTemp, $this->InputLimitOne, $this->InputLimitTwo);
				    $ArrayParameter[count($ArrayParameterTemp)] = &$rowCount;
				    $ArrayParameterTemp[count($ArrayParameterTemp)] = &$rowCount;
					array_push($ArrayParameterTemp, $Debug);
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
					if($return == Config::SUCCESS)
						return Config::SUCCESS;
					else 
					{
						array_unshift($ArrayParameter, $this->InputLimitOne, $this->InputLimitTwo);
						$ArrayParameter[count($ArrayParameter)] = &$rowCount;
						array_push($ArrayParameter, $Debug);
						return call_user_func_array(array($this, $Function), $ArrayParameter);
					}
				}
				array_unshift($ArrayParameter, $this->InputLimitOne, $this->InputLimitTwo);
				$ArrayParameter[count($ArrayParameter)] = &$rowCount;
				array_push($ArrayParameter, $Debug);
				return call_user_func_array(array($this, $Function), $ArrayParameter);
			}
			elseif(strpos($postElementKey, 'LIST') == FALSE)
			{
				array_push($ArrayParameter, $Debug);
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
		if ($return == Config::SUCCESS)
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
					$this->InputFocus = Config::LOGIN_USER;
					echo $this->TagOnloadFocusField(Config::LOGIN_FORM, $this->InputFocus);
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
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function LoadDataFromSession($SessionKey, $Function, &$Instance)
	{
		if(isset($Function) && isset($SessionKey))
		{
			if(!isset($Instance))
			{
				if($this->Session->GetSessionValue($SessionKey, $Instance) != Config::SUCCESS)
				{	
					return Config::ERROR;
				}
			}
			return $this->$Function($Instance);
		}
		else return Config::ERROR;
	}
	
	protected function PageStackSessionLoad()
	{
		$arrayPageForm = array();
		if($this->Session->GetSessionValue(Config::SESS_PAGE_STACK_NUMBER, $pageFormNumber) == Config::SUCCESS)
		{
			if($this->Session->GetSessionValue(Config::SESS_PAGE_SACK, $arrayPageForm) == Config::SUCCESS)
			{
				if(isset($arrayPageForm[$pageFormNumber-1]))
				{
					$_POST = $arrayPageForm[$pageFormNumber-1];
					array_pop($arrayPageForm);
					$pageFormNumber--;
				}
				$this->Session->SetSessionValue(Config::SESS_PAGE_STACK_NUMBER, $pageFormNumber);
				$this->Session->SetSessionValue(Config::SESS_PAGE_SACK, $arrayPageForm);
			}
		}
	}
	
	protected function PageStackSessionRemoveAll()
	{
		$arrayPageForm = array();
		if($this->Session->GetSessionValue(Config::SESS_PAGE_STACK_NUMBER, $pageFormNumber) == Config::SUCCESS)
		{
			if($this->Session->GetSessionValue(Config::SESS_PAGE_SACK, $arrayPageForm) == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_PAGE_STACK_NUMBER);
				$this->Session->RemoveSessionVariable(Config::SESS_PAGE_SACK);
				return Config::SUCCESS;
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
	
	protected function TeamDeleteByTeamId($InstanceTeam, $Debug)
	{
		if($InstanceTeam != NULL)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->TeamDeleteByTeamId($InstanceTeam->GetTeamId(), $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TEAM, $InstanceTeam);
				$this->ShowDivReturnSuccess("TEAM_DELETE_SUCCESS");
				return Config::SUCCESS;
			}
		}
		if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			$constant = "TEAM_DELETE_ERROR_DEPENDENCY_TEAM";
		else $constant = "TEAM_DELETE_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::ERROR;
	}
	
	protected function TeamInsert($TeamDescription, $TeamName, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTeamDescription = $TeamDescription;
		$this->InputValueTeamName = $TeamName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 120; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TEAM_DESCRIPTION', 'FORM_INVALID_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//TEAM_NAME
		$arrayElements[1]             = Config::FORM_FIELD_TEAM_NAME;
		$arrayElementsClass[1]        = &$this->ReturnTeamNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_TEAM_NAME;
		$arrayElementsInput[1]        = $this->InputValueTeamName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnTeamNameText;
		array_push($arrayConstants, 'FORM_INVALID_TEAM_NAME', 'FORM_INVALID_TEAM_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TeamInsert($this->InputValueTeamDescription,
												     $this->InputValueTeamName, 
													 $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("TEAM_INSERT_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TEAM_INSERT_ERROR");
		return Config::ERROR;
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
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function TeamSelect($Limit1, $Limit2, &$ArrayInstanceTeam, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TeamSelect($Limit1, $Limit2,
															 $ArrayInstanceTeam,
															 $RowCount,
															 $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("TEAM_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TeamSelectByTeamId($TeamId, &$InstanceTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTeamId = $TeamId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//TEAM_ID
		$arrayElements[0]             = Config::FORM_FIELD_TEAM_ID;
		$arrayElementsClass[0]        = &$this->ReturnTeamIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTeamId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 2; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamIdText;
		array_push($arrayConstants, 'FORM_INVALID_TEAM_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TeamSelectByTeamId($this->InputValueTeamId, $InstanceTeam, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TEAM, $InstanceTeam);
				$this->TeamLoadData($InstanceTeam);
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("TEAM_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TeamSelectByTeamName($TeamName, &$ArrayInstanceTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTeamName = $TeamName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TEAM_NAME
		$arrayElements[0]             = Config::FORM_FIELD_TEAM_NAME;
		$arrayElementsClass[0]        = &$this->ReturnTeamNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_TEAM_NAME;
		$arrayElementsInput[0]        = $this->InputValueTeamName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 2; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamNameText;
		array_push($arrayConstants, 'FORM_INVALID_TEAM_NAME', 'FORM_INVALID_TEAM_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		$return = Config::SUCCESS;
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TeamSelectByTeamName($this->InputValueTeamName, $ArrayInstanceTeam, $Debug);
			if($return == Config::SUCCESS)
				return Config::SUCCESS;
		}
		$this->ShowDivReturnError("TEAM_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TeamUpdateByTeamId($TeamDescriptionNew, $TeamNameNew, &$InstanceTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTeamDescription  = $TeamDescriptionNew;
		$this->InputValueTeamName = $TeamNameNew;
		$this->InputFocus = Config::FORM_FIELD_TEAM_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 120; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTeamDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TEAM_DESCRIPTION', 'FORM_INVALID_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//TEAM_NAME
		$arrayElements[1]             = Config::FORM_FIELD_TEAM_NAME;
		$arrayElementsClass[1]        = &$this->ReturnTeamNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_TEAM_NAME;
		$arrayElementsInput[1]        = $this->InputValueTeamName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnTeamNameText;
		array_push($arrayConstants, 'FORM_INVALID_TEAM_NAME', 'FORM_INVALID_TEAM_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->TeamUpdateByTeamId($this->InputValueTeamDescription,
															 $InstanceTeam->GetTeamId(),
															 $this->InputValueTeamName,
															 $Debug);
			if($return == Config::SUCCESS)
			{
				$InstanceTeam->SetTeamDescription($this->InputValueTeamDescription);
				$InstanceTeam->SetTeamName($this->InputValueTeamName);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TEAM, $InstanceTeam);
				$this->TeamLoadData($InstanceTeam);
				$this->ShowDivReturnSuccess("TEAM_UPDATE_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TEAM_UPDATE_ERROR");
		return Config::ERROR;
	}
	
	protected function TicketDeleteByTicketId($InstanceTicket, $Debug)
	{
		if($InstanceTicket != NULL)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->TicketDeleteByTicketId($InstanceTicket->GetTicketId(), $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->ShowDivReturnSuccess("TICKET_DELETE_SUCCESS");
				return $return;
			}
			if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
				$constant = "TICKET_ERROR_DEPENDENCY";
			else $constant = "TICKET_DELETE_ERROR";
			$this->ShowDivReturnError($constant);
			return Config::ERROR;
		}
	}
	
	protected function TicketInsert($TicketDescription, $TicketSuggestion, $TicketTitle, $TypeStatusTicketDescription, 
									$TypeTicketDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTeamDescription             = $TicketDescription;
		$this->InputValueTicketSuggestion            = $TicketSuggestion;
		$this->InputValueTicketTitle                 = $TicketTitle;
		$this->InputValueTypeStatusTicketDescription = $TypeStatusTicketDescription;
		$this->InputValueTypeTicketDescription       = $TypeTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 500; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TICKET_DESCRIPTION', 'FORM_INVALID_TICKET_DESCRIPTION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TICKET_SUGGESTION
		$arrayElements[1]             = Config::FORM_FIELD_TICKET_SUGGESTION;
		$arrayElementsClass[1]        = &$this->ReturnTicketSuggestionClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueTicketSuggestion; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnTicketSuggestionText;
		array_push($arrayConstants, 'FORM_INVALID_TICKET_SUGGESTION', 'FORM_INVALID_TICKET_SUGGESTION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TICKET_TITLE
		$arrayElements[2]             = Config::FORM_FIELD_TICKET_TITLE;
		$arrayElementsClass[2]        = &$this->ReturnTicketTitleClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FORM_VALIDATE_FUNCTION_TITLE;
		$arrayElementsInput[2]        = $this->InputValueTicketTitle; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 90; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnTicketTitleText;
		array_push($arrayConstants, 'FORM_INVALID_TICKET_TITLE', 'FORM_INVALID_TICKET_TITLE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[3]             = Config::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[3]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[3]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 45; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION', 'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TicketInsert($this->InputValueTicketDescription,
												       $this->InputValueTeamName, 
												       $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("TICKET_INSERT_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TICKET_INSERT_ERROR");
		return Config::ERROR;
	}
	
	protected function TicketLoadData($InstanceTicket)
	{
		if($InstanceTicket != NULL)
		{
			$this->InputValueTicketId          = $InstanceTypeStatusTicket->GetTicketId();
			$this->InputValueRegisterDate      = $InstanceTypeStatusTicket->GetRegisterDate();
			$this->InputValueServiceName       = $InstanceTypeStatusTicket->GetTicketServiceName();
			$this->InputValueStatusName        = $InstanceTypeStatusTicket->GetTicketStatusName();
			$this->InputValueSuggestion        = $InstanceTypeStatusTicket->GetTicketSuggestion();
			$this->InputValueTicketDescription = $InstanceTypeStatusTicket->GetTicketDescription();
			$this->InputValueTitle             = $InstanceTypeStatusTicket->GetTicketTitle();
			$this->InputValueType              = $InstanceTypeStatusTicket->GetTicketTypeName();
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function TicketSelect($Limit1, $Limit2, &$ArrayInstanceTicket, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TicketSelect($Limit1, $Limit2,
														   $ArrayInstanceTicket,
														   $RowCount,
														   $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TicketSelectByTicketId($TicketId, &$InstanceTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTicketId = $TicketId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TICKET_ID
		$arrayElements[0]             = Config::FORM_FIELD_TICKET_ID;
		$arrayElementsClass[0]        = &$this->ReturnTicketIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTicketId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 2; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTicketIdText;
		array_push($arrayConstants, 'FORM_INVALID_TICKET_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TicketSelectByTicketId($this->InputValueTicketId, $InstanceTicket, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->TicketLoadData($InstanceTicket);
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TicketSelectByRequestingUserEmail($RequestingUserEmail, &$InstanceTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueUserEmail = $RequestingUserEmail;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
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
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TicketSelectByRequestingUserEmail($this->InputValueUserEmail, $InstanceTicket, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->TicketLoadData($InstanceTicket);
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TicketSelectByResponsibleUserEmail($ResponsibleUserEmail, &$InstanceTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueUserEmail = $ResponsibleUserEmail;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
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
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TicketSelectByResponsibleUserEmail($this->InputValueUserEmail, $InstanceTicket, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->TicketLoadData($InstanceTicket);
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TicketUpdateByTicketId($TicketDescriptionNew, $TicketSuggestionNew, $TicketTitleNew,
											  $TypeStatusTicketDescriptionNew, $TypeTicketDescriptionNew, &$InstanceTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTicketDescription           = $TicketDescriptionNew;
		$this->InputValueTicketSuggestion            = $TicketSuggestionNew;
		$this->InputValueTicketTitle                 = $TicketTitleNew;
		$this->InputValueTypeStatusTicketDescription = $TypeStatusTicketDescriptionNew;
		$this->InputValueTypeTicketDescription       = $TypeTicketDescriptionNew;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->TicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 500; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TICKET_DESCRIPTION', 'FORM_INVALID_TICKET_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TICKET_SUGGESTION
		$arrayElements[1]             = Config::FORM_FIELD_TICKET_SUGGESTION;
		$arrayElementsClass[1]        = &$this->ReturnTicketSuggestionClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->TicketSuggestion; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnTicketSuggestionText;
		array_push($arrayConstants, 'FORM_INVALID_TICKET_SUGGESTION', 'FORM_INVALID_TICKET_SUGGESTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TICKET_TITLE
		$arrayElements[2]             = Config::FORM_FIELD_TICKET_SUGGESTION;
		$arrayElementsClass[2]        = &$this->ReturnTicketSuggestionClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FORM_VALIDATE_FUNCTION_TITLE;
		$arrayElementsInput[2]        = $this->InputValueTicketTitle; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 90; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnTicketTitleText;
		array_push($arrayConstants, 'FORM_INVALID_TICKET_SUGGESTION', 'FORM_INVALID_TICKET_SUGGESTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[3]             = Config::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[3]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[3]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 45; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION', 'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[4]             = Config::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[4]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[4]        = $this->InputValueTypeTicketDescription; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnTypeTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_TICKET_DESCRIPTION', 'FORM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TicketUpdateByTicketId($this->InputValueTicketDescription, $this->InputValueTicketSuggestion,
																 $this->InputValueTicketTitle, $this->InputValueTypeStatusTicketDescription,
																 $this->InputValueTypeTicketDescription, $InstanceTicket, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TICKET, $InstanceTicket);
				$this->TicketLoadData($InstanceTicket);
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;	
			}
		}
		$this->ShowDivReturnError("TICKET_NOT_FOUND");
		return Config::ERROR;
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
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription(
				                                                       $InstanceTypeAssocUserTeam->GetTypeAssocUserTeamDescription(),
																	   $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
				$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_TEAM_DELETE_SUCCESS");
				return $return;
			}
			if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
				$constant = "TYPE_ASSOC_USER_TEAM_DELETE_ERROR_DEPENDENCY_TEAM";
			else $constant = "TYPE_ASSOC_USER_TEAM_DELETE_ERROR";
			$this->ShowDivReturnError($constant);
			return Config::ERROR;
		}
	}
	
	protected function TypeAssocUserTeamInsert($TypeAssocUserTeamDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_TEAM_DESCRIPTION', 'FORM_INVALID_TYPE_ASSOC_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TypeAssocUserTeamInsert($this->InputValueTypeAssocUserTeamDescription, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_TEAM_INSERT_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_TEAM_INSERT_ERROR");
		return Config::ERROR;
	}
	
	protected function TypeAssocUserTeamLoadData(&$InstanceTypeAssocUserTeam)
	{
		if($InstanceTypeAssocUserTeam == NULL)
			$this->Session->GetSessionValue(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
		if($InstanceTypeAssocUserTeam != NULL)
		{
			$this->InputValueRegisterDate                  = $InstanceTypeAssocUserTeam->GetRegisterDate();
			$this->InputValueTypeAssocUserTeamDescription  = $InstanceTypeAssocUserTeam->GetTypeAssocUserTeamDescription();
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayInstanceTypeAssocUserTeam, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeAssocUserTeamSelect($Limit1, $Limit2,
															          $ArrayInstanceTypeAssocUserTeam,
															          $RowCount,
															          $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_TEAM_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeAssocUserTeamSelectByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, &$InstanceTypeAssocUserTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
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
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TypeAssocUserTeamSelectByTypeAssocUserTeamDescription($this->InputValueTypeAssocUserTeamDescription, 
																		                        $InstanceTypeAssocUserTeam,
																		                        $Debug);
			if($return == Config::SUCCESS)
			{
				$this->TypeAssocUserTeamLoadData($InstanceTypeAssocUserTeam);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
				return Config::SUCCESS;	
			}
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_TEAM_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, &$InstanceTypeAssocUserTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;
		$this->InputFocus = Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_TEAM_DESCRIPTION','FORM_INVALID_TYPE_ASSOC_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription(
				                                                             $this->InputValueTypeAssocUserTeamDescription,
																		     $InstanceTypeAssocUserTeam->GetTypeAssocUserTeamDescription(),
																		     $Debug);
			if($return == Config::SUCCESS)
			{
				$InstanceTypeAssocUserTeam->SetTypeAssocUserTeamDescription($this->InputValueTypeAssocUserTeamDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
				if($this->TypeAssocUserTeamLoadData($InstanceTypeAssocUserTeam) == Config::SUCCESS)
				{
					$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_TEAM_UPDATE_SUCCESS");
					return Config::SUCCESS;
				}
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_TEAM_UPDATE_ERROR");
		return Config::ERROR;	
	}
	
	protected function TypeStatusTicketDeleteByTypeStatusTicketDescription(&$InstanceTypeStatusTicket, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeStatusTicketDeleteByTypeStatusTicketDescription(
			                                                                $InstanceTypeStatusTicket->GetTypeStatusTicketDescription(), 
																            $Debug);
		if($return == Config::SUCCESS)
		{
			$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
			$this->ShowDivReturnSuccess("TYPE_STATUS_TICKET_DELETE_SUCCESS");
			return $return;
		}
		if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			$constant = "TYPE_STATUS_TICKET_DELETE_ERROR_DEPENDENCY_TICKET";
		else $constant = "TYPE_STATUS_TICKET_DELETE_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::ERROR;
	}
	
	
	protected function TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeStatusTicketDescription = $TypeStatusTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION',
									'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->TypeStatusTicketInsert($this->InputValueTypeStatusTicketDescription, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("TYPE_STATUS_TICKET_INSERT_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_INSERT_ERROR");
		return Config::ERROR;
	}
	
	protected function TypeStatusTicketLoadData($InstanceTypeStatusTicket)
	{
		if($InstanceTypeStatusTicket != NULL)
		{
			$this->InputValueTypeStatusTicketDescription  = $InstanceTypeStatusTicket->GetTypeStatusTicketDescription();
			$this->InputValueRegisterDate                 = $InstanceTypeStatusTicket->GetRegisterDate();
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function TypeStatusTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeStatusTicket, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeStatusTicketSelect($Limit1, $Limit2,
															         $ArrayInstanceTypeStatusTicket,
															         $RowCount,
															         $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeStatusTicketSelectByTypeStatusTicketDescription($TypeStatusTicketDescription, 
		                                                                   &$InstanceTypeStatusTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeStatusTicketDescription = $TypeStatusTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION',
									'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->TypeStatusTicketSelectByTypeStatusTicketDescription(
				                                                                      $this->InputValueTypeStatusTicketDescription, 
																		              $InstanceTypeStatusTicket,
																		              $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
				$this->TypeStatusTicketLoadData($InstanceTypeStatusTicket);
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeStatusTicketUpdateByTypeStatusTicketDescription($TypeStatusTicketDescriptionNew, &$InstanceTypeStatusTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeStatusTicketDescription  = $TypeStatusTicketDescriptionNew;
		$this->InputFocus = Config::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeStatusTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeStatusTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeStatusTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION',
									'FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);

		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TypeStatusTicketUpdateByTypeStatusTicketDescription(
				                                                               $this->InputValueTypeStatusTicketDescription,
																			   $InstanceTypeStatusTicket->GetTypeStatusTicketDescription(),
																			   $Debug);
			if($return == Config::SUCCESS)
			{
				$InstanceTypeStatusTicket->SetTypeStatusTicketDescription($this->InputValueTypeStatusTicketDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
				$this->TypeStatusTicketLoadData($InstanceTypeStatusTicket);
				$this->ShowDivReturnSuccess("TYPE_STATUS_TICKET_UPDATE_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_UPDATE_ERROR");
		return Config::ERROR;
	}
	
	protected function TypeTicketDeleteByTypeTicketDescription($InstanceTypeTicket, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeTicketDeleteByTypeTicketDescription($InstanceTypeTicket->GetTypeTicketDescription(), $Debug);
		if($return == Config::SUCCESS)
		{
			$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_TICKET, $InstanceTypeTicket);
			$this->ShowDivReturnSuccess("TYPE_TICKET_DELETE_SUCCESS");
			return Config::SUCCESS;
		}
		if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			$constant = "TYPE_TICKET_DELETE_ERROR_DEPENDENCY_TICKET";
		else $constant = "TYPE_TICKET_DELETE_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::ERROR;
	}
	
	protected function TypeTicketInsert($TypeTicketDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeTicketDescription = $TypeTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return = Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->TypeTicketInsert($this->InputValueTypeTicketDescription, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("TYPE_TICKET_INSERT_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_TICKET_INSERT_ERROR");
		return Config::ERROR;
	}
	
	protected function TypeTicketLoadData($InstanceTypeTicket)
	{
		if($InstanceTypeTicket != NULL)
		{
			$this->InputValueTypeTicketDescription  = $InstanceTypeTicket->GetTypeTicketDescription();
			$this->InputValueRegisterDate           = $InstanceTypeTicket->GetRegisterDate();
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function TypeTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeTicket, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeTicketSelect($Limit1, $Limit2,
															   $ArrayInstanceTypeTicket, $RowCount, $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_TICKET_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeTicketSelectByTypeTicketDescription($TypeTicketDescription, &$InstanceTypeTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeTicketDescription = $TypeTicketDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->TypeTicketSelectByTypeTicketDescription($this->InputValueTypeTicketDescription,
																						  $InstanceTypeTicket, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_TICKET, $InstanceTypeTicket);
				$this->TypeTicketLoadData($InstanceTypeTicket);
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("TYPE_TICKET_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeTicketUpdateByTypeTicketDescription($TypeTicketDescriptionNew, &$InstanceTypeTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeTicketDescription  = $TypeTicketDescriptionNew;
		$this->InputFocus = Config::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_TICKET_DESCRIPTION', 'FORM_INVALID_TYPE_TICKET_DESCRIPTION',
									'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TypeTicketUpdateByTypeTicketDescription($this->InputValueTypeTicketDescription, 
																						  $InstanceTypeTicket->GetTypeTicketDescription(),
																						  $Debug);
			if($return == Config::SUCCESS)
			{
				$InstanceTypeTicket->SetTypeTicketDescription($this->InputValueTypeTicketDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_TICKET, $InstanceTypeTicket);
				$this->TypeTicketLoadData($InstanceTypeTicket);
				$this->ShowDivReturnSuccess("TYPE_TICKET_UPDATE_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_TICKET_UPDATE_ERROR");
		return Config::ERROR;	
	}
	
	protected function TypeUserDeleteByTypeUserId($InstanceTypeUser, $Debug)
	{
		if($InstanceTypeUser != NULL)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->TypeUserDelete($InstanceTypeUser->GetTypeUserId(), 
														 $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_USER, $InstanceTypeUser);
				$this->ShowDivReturnSuccess("TYPE_USER_DELETE_SUCCESS");
				return $return;
			}
		}
		if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			$constant = "TYPE_USER_DELETE_ERROR_DEPENDENCY_USER";
		else $constant = "TYPE_USER_DELETE_ERROR";
		$this->ShowDivReturnError($constant);
		return Config::ERROR;
	}
	
	protected function TypeUserInsert($TypeUserDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeUserDescription = $TypeUserDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//TYPE_USER_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeUserDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_USER_ID', 'FORM_INVALID_TYPE_USER_ID_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TypeUserInsert($this->InputValueTypeUserDescription, 
														 $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("TYPE_USER_INSERT_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_USER_INSERT_ERROR");
		return Config::ERROR;
	}
	
	protected function TypeUserLoadData(&$InstanceTypeUser)
	{
		if($InstanceTypeUser != NULL)
		{
			$this->InputValueTypeUserDescription  = $InstanceTypeUser->GetTypeUserDescription();
			$this->InputValueTypeUserId           = $InstanceTypeUser->GetTypeUserId();
			$this->InputValueRegisterDate         = $InstanceTypeUser->GetRegisterDate();
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeUserSelect($Limit1, $Limit2,
															 $ArrayInstanceTypeUser,
															 $RowCount,
															 $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_USER_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeUserSelectByTypeUserDescription($TypeUserDescription, &$InstanceTypeUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeUserDescription = $TypeUserDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_USER_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
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
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TypeUserSelectByTypeUserDescription($this->InputValueTypeUserDescription, 
																			            $InstanceTypeUser,
																			            $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_USER, $InstanceTypeUser);
				$this->TypeUserLoadData($InstanceTypeUser); 
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("TYPE_USER_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeUserSelectByTypeUserId($TypeUserId, &$InstanceTypeUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeUserId = $TypeUserId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//TYPE_USER_ID
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_USER_ID;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeUserId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserIdText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_USER_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TypeUserSelectByTypeUserId($this->InputValueTypeUserId, 
																	 $InstanceTypeUser,
																	 $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_USER, $InstanceTypeUser);
				$this->TypeUserLoadData($InstanceTypeUser);
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("TYPE_USER_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeUserSelectNoLimit($ArrayInstanceTypeUser, $Debug);
		if($return == Config::SUCCESS)
			return Config::SUCCESS;
		$this->ShowDivReturnError("TYPE_USER_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function TypeUserUpdateByTypeUserId($TypeUserDescriptionNew, $InstanceTypeUser, $Debug)
	{
		if($InstanceTypeUser != NULL)
		{
			$PageForm = $this->Factory->CreatePageForm();
			$this->InputValueTypeUserDescription  = $TypeUserDescriptionNew;
			$this->InputFocus = Config::FORM_FIELD_TYPE_USER_DESCRIPTION;
			$arrayConstants = array(); $matrixConstants = array();
			
			//TYPE_USER_DESCRIPTION
			$arrayElements[0]             = Config::FORM_FIELD_TYPE_USER_DESCRIPTION;
			$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
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
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
			if($return == Config::SUCCESS)
			{
				$FacedePersistence = $this->Factory->CreateFacedePersistence();
				$return = $FacedePersistence->TypeUserUpdateByTypeUserId($this->InputValueTypeUserDescription,
					                                                     $InstanceTypeUser->GetTypeUserId(),
																		 $Debug);
				if($return == Config::SUCCESS)
				{
					$InstanceTypeUser->SetTypeUserDescription($this->InputValueTypeUserDescription);
					$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_USER, $InstanceTypeUser);
					$this->TypeUserLoadData($InstanceTypeUser);
					$this->ShowDivReturnSuccess("TYPE_USER_UPDATE_SUCCESS");
					return Config::SUCCESS;
				}
				elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
				{
					$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
					return Config::WARNING;
				}
			}
			$this->ShowDivReturnError("TYPE_USER_UPDATE_ERROR");
			return Config::ERROR;
		}
	}
	
	protected function UserDeleteByUserEmail(&$InstanceUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $InstanceUser->GetEmail();
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->AssocUserCorporationDelete(
					                                     $InstanceUser->GetCorporationName(),
			                                             $this->InputValueUserEmail,
														 $Debug, NULL, TRUE);
			if($return == Config::SUCCESS)
				$return = $instanceFacedePersistence->UserDeleteByUserEmail($this->InputValueUserEmail, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_USER);
				unset($InstanceUser);
				$this->InputValueUserEmail = "";
				$this->ShowDivReturnSuccess("USER_DELETE_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_USER_DELETE_FAILED_NOT_FOUND)
			{
				$this->ShowDivReturnError("USER_NOT_FOUND");
				return Config::ERROR;
			}
		}
		$this->ShowDivReturnError("USER_DELETE_ERROR");
		return Config::ERROR;
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
		if(isset($_POST[Config::FORM_FIELD_USER_SESSION_EXPIRES]))
			$this->InputValueSessionExpires = TRUE;
		else $this->InputValueSessionExpires = FALSE;
		if(isset($_POST[Config::FORM_FIELD_USER_TWO_STEP_VERIFICATION]))
			$this->InputValueTwoStepVerification = TRUE;
		else $this->InputValueTwoStepVerification = FALSE;
		if(isset($_POST[Config::FORM_FIELD_USER_ACTIVE]))
			$this->InputValueUserActive = TRUE;
		else $this->InputValueUserActive = FALSE;
		if(isset($_POST[Config::FORM_FIELD_USER_CONFIRMED]))
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
		$arrayConstants = array();
		$arrayElements[0]             = Config::FORM_FIELD_USER_NAME;
		$arrayElementsClass[0]        = &$this->ReturnUserNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NAME;
		$arrayElementsInput[0]        = $this->InputValueUserName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserNameText;
		array_push($arrayConstants, 'FORM_INVALID_USER_NAME', 'FORM_INVALID_USER_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_EMAIL
		$arrayConstants = array();
		$arrayElements[1]             = Config::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[1]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[1]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 60; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_UNIQUE_ID
		$arrayConstants = array();
		$arrayElements[2]             = Config::FORM_FIELD_USER_UNIQUE_ID;
		$arrayElementsClass[2]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FORM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
		$arrayElementsInput[2]        = $this->InputValueUserUniqueId; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 25; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnUserUniqueIdText;
		array_push($arrayConstants, 'FORM_INVALID_USER_UNIQUE_ID', 'FORM_INVALID_USER_UNIQUE_ID_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_PHONE_PRIMARY_PREFIX
		$arrayConstants = array();
		$arrayElements[3]             = Config::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX;
		$arrayElementsClass[3]        = &$this->ReturnUserPhonePrimaryPrefixClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[3]        = $this->InputValueUserPhonePrimaryPrefix; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 3; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnUserPhonePrimaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY', 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_PHONE_PRIMARY
		$arrayConstants = array();
		$arrayElements[4]             = Config::FORM_FIELD_USER_PHONE_PRIMARY;
		$arrayElementsClass[4]        = &$this->ReturnUserPhonePrimaryClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[4]        = $this->InputValueUserPhonePrimary; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 9; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnUserPhonePrimaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PRIMARY', 'FORM_INVALID_USER_PHONE_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_PHONE_SECONDARY_PREFIX
		$arrayConstants = array();
		$arrayElements[5]             = Config::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX;
		$arrayElementsClass[5]        = &$this->ReturnUserPhoneSecondaryPrefixClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[5]        = $this->InputValueUserPhoneSecondaryPrefix; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 3; 
		$arrayElementsNullable[5]     = TRUE;
		$arrayElementsText[5]         = &$this->ReturnUserPhoneSecondaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY', 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_PHONE_SECONDARY
		$arrayConstants = array();
		$arrayElements[6]             = Config::FORM_FIELD_USER_PHONE_SECONDARY;
		$arrayElementsClass[6]        = &$this->ReturnUserPhoneSecondaryClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[6]        = $this->InputValueUserPhoneSecondary; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 9; 
		$arrayElementsNullable[6]     = TRUE;
		$arrayElementsText[6]         = &$this->ReturnUserPhoneSecondaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_SECONDARY', 'FORM_INVALID_USER_PHONE_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_BIRTH_DATE_DAY
		$arrayConstants = array();
		$arrayElements[7]             = Config::FORM_FIELD_USER_BIRTH_DATE_DAY;
		$arrayElementsClass[7]        = &$this->ReturnBirthDateDayClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = Config::FORM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[7]        = $this->InputValueBirthDateDay; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 0; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnBirthDateDayText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_BIRTH_DATE_MONTH
		$arrayConstants = array();
		$arrayElements[8]             = Config::FORM_FIELD_USER_BIRTH_DATE_MONTH;
		$arrayElementsClass[8]        = &$this->ReturnBirthDateMonthClass;
		$arrayElementsDefaultValue[8] = ""; 
		$arrayElementsForm[8]         = Config::FORM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[8]        = $this->InputValueBirthDateMonth; 
		$arrayElementsMinValue[8]     = 0; 
		$arrayElementsMaxValue[8]     = 0; 
		$arrayElementsNullable[8]     = FALSE;
		$arrayElementsText[8]         = &$this->ReturnBirthDateMonthText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_BIRTH_DATE_YEAR
		$arrayConstants = array();
		$arrayElements[9]             = Config::FORM_FIELD_USER_BIRTH_DATE_YEAR;
		$arrayElementsClass[9]        = &$this->ReturnBirthDateYearClass;
		$arrayElementsDefaultValue[9] = ""; 
		$arrayElementsForm[9]         = Config::FORM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[9]        = $this->InputValueBirthDateYear; 
		$arrayElementsMinValue[9]     = 0; 
		$arrayElementsMaxValue[9]     = 0; 
		$arrayElementsNullable[9]     = FALSE;
		$arrayElementsText[9]         = &$this->ReturnBirthDateYearText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_GENDER
		$arrayConstants = array();
		$arrayElements[10]             = Config::FORM_FIELD_USER_GENDER;
		$arrayElementsClass[10]        = &$this->ReturnGenderClass;
		$arrayElementsDefaultValue[10] = ""; 
		$arrayElementsForm[10]         = Config::FORM_VALIDATE_FUNCTION_GENDER;
		$arrayElementsInput[10]        = $this->InputValueGender; 
		$arrayElementsMinValue[10]     = 0; 
		$arrayElementsMaxValue[10]     = 0; 
		$arrayElementsNullable[10]     = FALSE;
		$arrayElementsText[10]         = &$this->ReturnGenderText;
		array_push($arrayConstants, 'FORM_INVALID_USER_GENDER', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_COUNTRY
		$arrayConstants = array();
		$arrayElements[11]             = Config::FORM_FIELD_USER_COUNTRY;
		$arrayElementsClass[11]        = &$this->ReturnCountryClass;
		$arrayElementsDefaultValue[11] = ""; 
		$arrayElementsForm[11]         = Config::FORM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE;
		$arrayElementsInput[11]        = $this->InputValueCountry; 
		$arrayElementsMinValue[11]     = 0; 
		$arrayElementsMaxValue[11]     = 3; 
		$arrayElementsNullable[11]     = FALSE;
		$arrayElementsText[11]         = &$this->ReturnCountryText;
		array_push($arrayConstants, 'FORM_INVALID_COUNTRY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_REGION
		$arrayConstants = array();
		$arrayElements[12]             = Config::FORM_FIELD_USER_REGION;
		$arrayElementsClass[12]        = &$this->ReturnRegionClass;
		$arrayElementsDefaultValue[12] = ""; 
		$arrayElementsForm[12]         = Config::FORM_VALIDATE_FUNCTION_NOT_NUMBER;
		$arrayElementsInput[12]        = $this->InputValueRegion; 
		$arrayElementsMinValue[12]     = 0; 
		$arrayElementsMaxValue[12]     = 45; 
		$arrayElementsNullable[12]     = TRUE;
		$arrayElementsText[12]         = &$this->ReturnRegionText;
		array_push($arrayConstants, 'FORM_INVALID_USER_REGION', 'FORM_INVALID_USER_REGION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_PASSWORD_NEW
		$arrayConstants = array();
		$arrayElements[13]             = Config::FORM_FIELD_PASSWORD_NEW;
		$arrayElementsClass[13]        = &$this->ReturnPasswordClass;
		$arrayElementsDefaultValue[13] = ""; 
		$arrayElementsForm[13]         = Config::FORM_VALIDATE_FUNCTION_PASSWORD;
		$arrayElementsInput[13]        = $this->InputValueNewPassword; 
		$arrayElementsMinValue[13]     = 8; 
		$arrayElementsMaxValue[13]     = 18; 
		$arrayElementsNullable[13]     = TRUE;
		$arrayElementsText[13]         = &$this->ReturnPasswordText;
		$arrayExtraField[13]           = &$this->InputValueRepeatPassword;
		array_push($arrayConstants, 'FORM_INVALID_USER_PASSWORD', 'FORM_INVALID_USER_PASSWORD_MATCH',
				                    'FORM_INVALID_USER_PASSWORD_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		if($this->ValidateCaptcha)
		{
			//VALIDA CAPTCHA
			$this->InputValueCaptcha       = $_POST[Config::FORM_CAPTCHA_REGISTER];
			$this->Session->GetSessionValue(Config::FORM_CAPTCHA_REGISTER, $captcha);
			//FORM_CAPTCHA_REGISTER
			$arrayElements[14]             = Config::FORM_CAPTCHA_REGISTER;
			$arrayElementsClass[14]        = &$this->ReturnCaptchaClass;
			$arrayElementsDefaultValue[14] = ""; 
			$arrayElementsForm[14]         = Config::FORM_VALIDATE_FUNCTION_COMPARE_STRING;
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
											$matrixConstants, $Debug, $arrayOptions, $arrayExtraField);
		if($return == Config::SUCCESS)
		{
			//CHECA SE E-MAIL JÁ É CADASTRADO
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectExistsByUserEmail($this->InputValueUserEmail, $Debug);
			if($return != Config::SUCCESS)
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
																 $UserActive,
																 $UserConfirmed,
																 $this->InputValueUserPhonePrimary, 
																 $this->InputValueUserPhonePrimaryPrefix, 
																 $this->InputValueUserPhoneSecondary, 
																 $this->InputValueUserPhoneSecondaryPrefix,
																 $UserType,
																 $this->InputValueUserUniqueId,
																 $Debug);
				if($return == Config::SUCCESS)
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
					if($return == Config::SUCCESS)
					{
						if($SendEmail) $constant = 'REGISTER_SUCCESS';
						else $constant = 'REGISTER_SUCCESS_NO_LINK';
						$this->ShowDivReturnSuccess($constant);
					}
					else
					{
						$instanceFacedePersistence->UserDeleteByUserEmail($this->InputValueUserEmail, $Debug);
						$this->ShowDivReturnError("REGISTER_EMAIL_ERROR");
						return Config::ERROR;
					}
				}
				elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
				{
					$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
					return Config::WARNING;
				}
				else
				{
					$this->ShowDivReturnError("REGISTER_INSERT_ERROR");
					return Config::ERROR;
				}
			}
			else
			{
				$this->ShowDivReturnError("REGISTER_EMAIL_ALREADY_REGISTERED");
				return Config::ERROR;
			}
		}
		$this->ShowDivReturnError("REGISTER_INSERT_ERROR");
		return Config::ERROR;
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
		$this->InputValueTypeUserId = $InstanceUser->GetUserTypeId();

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
		if($return == Config::SUCCESS)
		{
			$instanceFacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
			Page::GetCurrentDomain($domain);
			$link = $domain . str_replace('Language/', '', $this->Language) . "/" .
							  str_replace("_", "",Config::PAGE_REGISTER_CONFIRMATION) . "?=" . $UniqueHash;
			$return = $instanceFacedeBusiness->SendEmailResendConfirmationLink($Application,
																			   $this->User->GetName(),
																			   $this->User->GetEmail(),
																			   $link, $this->InputValueHeaderDebug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("RESEND_CONFIRMATION_LINK_SUCCESS");
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("RESEND_CONFIRMATION_LINK_ERROR");
		return Config::ERROR;
	}
	
	protected function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->UserSelect($Limit1, $Limit2, $ArrayInstanceUser, $RowCount, $Debug);
		if($return == Config::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("USER_NOT_FOUND");
		return Config::ERROR;
	}
	
	protected function UserSelectByDepartment($Limit1, $Limit2, $CorporationName, $DepartmentName, 
											  &$ArrayInstanceDepartmentUsers, &$RowCount, $Debug)
	{
		$ArrayInstanceDepartmentUsers = NULL;
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $FacedePersistence->UserSelectByDepartment($Limit1, $Limit2, $CorporationName, $DepartmentName,
			                                                 $ArrayInstanceDepartmentUsers, $RowCount, 
															 $Debug);
		if($return == Config::SUCCESS)
		{
			$this->ShowDivReturnEmpty();
			return Config::SUCCESS;
		}
		$this->ShowDivReturnError("DEPARTMENT_SELECT_USERS_ERROR");
		return Config::ERROR;
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
																	   $InstanceUser, 
																	   $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("USER_SELECT_BY_HASH_CODE_SUCCESS");
				return $return;
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_HASH_CODE_ERROR");
		return Config::ERROR;
	}
	
	protected function UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTeamId = $TeamId;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_TEAM_ID
		$arrayElements[0]             = Config::FORM_FIELD_TEAM_ID;
		$arrayElementsClass[0]        = &$this->ReturnTeamIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
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
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByTeamId($Limit1, $Limit2, $TeamId, $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::SUCCESS)
				return Config::SUCCESS;
			else
			{
				$this->ShowDivReturnWarning("TEAM_SELECT_USERS_WARNING");
				return Config::WARNING;	
			}
		}
		$this->ShowDivReturnError("TEAM_SELECT_USERS_ERROR");
		return Config::ERROR;
	}
	
	protected function UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, &$ArrayInstanceUser,
																&$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
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
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription,
																						   $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::SUCCESS)
				return Config::SUCCESS;
		}
		$this->ShowDivReturnError("USER_SELECT_BY_TYPE_ASSOC_USER_TEAM_FAILED");
		return Config::ERROR;
	}
	
	protected function UserSelectByTypeUserId($Limit1, $Limit2, $TypeUserId, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$ArrayInstanceUser = NULL;
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $FacedePersistence->UserSelectByTypeUserId($TypeUserId,
															 $Limit1, $Limit2,
															 $ArrayInstanceUser, $RowCount, $Debug);
		if($return == Config::SUCCESS)
			return Config::SUCCESS;
		$this->ShowDivReturnError("TYPE_USER_SELECT_USERS_ERROR");
		return Config::ERROR;
	}
	
	protected function UserSelectByUserEmail($UserEmail, &$UserInstance, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail = $UserEmail;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByUserEmail($this->InputValueUserEmail, 
																		$InstanceUser, 
																		$Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("USER_SELECT_BY_USER_EMAIL_SUCCESS");
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_USER_EMAIL_ERROR");
		return Config::ERROR;
	}
	
	protected function UserSelectByUserUniqueId($UniqueId, &$UserInstance, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail = $UserEmail;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_USER_UNIQUE_ID
		$arrayElements[0]             = Config::FORM_FIELD_USER_UNIQUE_ID;
		$arrayElementsClass[0]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
		$arrayElementsInput[0]        = $this->InputValueUserUniqueId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 25; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserUniqueIdText;
		array_push($arrayConstants, 'FORM_INVALID_USER_UNIQUE_ID', 'FORM_INVALID_USER_UNIQUE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectByUserUniqueId($this->InputValueUserEmail, $InstanceUser, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("USER_SELECT_BY_USER_UNIQUE_ID_SUCCESS");
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("USER_SELECT_BY_USER_UNIQUE_ID_ERROR");
		return Config::ERROR;
	}
	
	protected function  UserSelectExistsByUserEmail($Captcha, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCaptcha    = $Captcha;
		$this->InputValueUserEmail  = $UserEmail;
		$this->Session->GetSessionValue(Config::FORM_FIELD_CAPTCHA, $captcha);
		$arrayConstants = array(); $arrayOptions = array(); $matrixConstants = array();
			
		//FORM_FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, NULL);
		
		//CAPTCHA
		$arrayElements[1]             = Config::FORM_FIELD_CAPTCHA;
		$arrayElementsClass[1]        = &$this->ReturnCaptchaClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_COMPARE_STRING;
		$arrayElementsInput[1]        = $this->InputValueCaptcha; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 0; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnCaptchaText;
		array_push($arrayConstants, 'PASSWORD_RECOVERY_INVALID_CAPTCHA', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, $captcha);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectExistsByUserEmail($this->InputValueUserEmail, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("USER_SELECT_EXISTS_BY_USER_EMAIL_SUCCESS");
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("USER_SELECT_EXISTS_BY_USER_EMAIL_ERROR");
		return Config::ERROR;
	}
	
	protected function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $UserEmail;
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_USER_EMAIL
		$arrayElements[0]             = Config::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserSelectHashCodeByUserEmail($this->InputValueUserEmail, $HashCode, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("USER_SELECT_HASH_CODE_BY_USER_EMAIL_SUCCESS");
				return Config::SUCCESS;
			}
		}
		$this->ShowDivReturnError("USER_SELECT_HASH_CODE_BY_USER_EMAIL_ERROR");
		return Config::ERROR;
	}
	
	protected function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug)
	{
		if(isset($HashCode))
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			return $FacedePersistence->UserSelectUserActiveByHashCode($HashCode, $UserActive, $Debug);
		}
		$this->ShowDivReturnError("REGISTER_CONFIRMATION_SELECT_ERROR");
		return Config::ERROR;
	}
	
	protected function UserUpdateActiveByUserEmail($UserActiveNew, &$InstanceUser, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->UserUpdateActiveByUserEmail($InstanceUser->GetEmail(),
																	      $UserActiveNew,
																		  $Debug);
		if($return == Config::SUCCESS)
		{
			$InstanceUser->SetUserActive($UserActiveNew);
			$this->Session->SetSessionValue(Config::SESS_ADMIN_USER, $InstanceUser);
			if($UserActiveNew)
				$constant =	str_replace('[0]',  
								strtolower($this->InstanceLanguageText->GetConstant('ACTIVATED', $this->Language)), 
								$this->InstanceLanguageText->GetConstant('USER_ACTIVATE_SUCCESS', $this->Language));
			else 
				$constant = str_replace('[0]', 
								strtolower($this->InstanceLanguageText->GetConstant('DEACTIVATED', $this->Language)), 
								$this->InstanceLanguageText->GetConstant('USER_ACTIVATE_SUCCESS', $this->Language));
			$this->ShowDivReturnSuccess($constant);
			$this->InputFocus = Config::DIV_RETURN;
			return Config::SUCCESS;
		}
		elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
		{
			$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
			return Config::WARNING;
		}
		$this->ShowDivReturnError("USER_UPDATE_ACTIVE_BY_USER_EMAIL_ERROR");
		return Config::ERROR;
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
		
		//FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY
		$arrayElements[0]             = Config::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY;
		$arrayElementsClass[0]        = &$this->ReturnRegistrationDateDayClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[0]        = $this->InputValueRegistrationDateDay; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 0; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnRegistrationDateDayText;
		array_push($arrayConstants, 'FORM_INVALID_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH
		$arrayElements[1]             = Config::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH;
		$arrayElementsClass[1]        = &$this->ReturnRegistrationDateMonthClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[1]        = $this->InputValueRegistrationDateMonth; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 0; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnRegistrationDateMonthText;
		array_push($arrayConstants, 'FORM_INVALID_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR
		$arrayElements[2]             = Config::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR;
		$arrayElementsClass[2]        = &$this->ReturnRegistrationDateYearClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FORM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[2]        = $this->InputValueRegistrationDateYear; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 0; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnRegistrationDateYearText;
		array_push($arrayConstants, 'FORM_INVALID_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID
		$arrayElements[3]             = Config::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID;
		$arrayElementsClass[3]        = &$this->ReturnRegistrationIdClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FORM_VALIDATE_FUNCTION_REGISTRATION_ID;
		$arrayElementsInput[3]        = $this->InputValueRegistrationId; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 12; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnRegistrationIdText;
		array_push($arrayConstants, 'FORM_INVALID_REGISTRATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_DEPARTMENT_NAME
		$arrayElements[4]             = Config::FORM_FIELD_DEPARTMENT_NAME;
		$arrayElementsClass[4]        = &$this->ReturnDepartmentNameText;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[4]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 80; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnDepartmentNameClass;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE',  'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions, $arrayExtraField);
		if($return == Config::SUCCESS)
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
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("ASSOC_USER_CORPORATION_UPDATE_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("ASSOC_USER_CORPORATION_UPDATE_ERROR");
		return Config::ERROR;
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
		
		$this->InputFocus = Config::FORM_FIELD_USER_NAME;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_USER_NAME
		$arrayElements[0]             = Config::FORM_FIELD_USER_NAME;
		$arrayElementsClass[0]        = &$this->ReturnUserNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NAME;
		$arrayElementsInput[0]        = $this->InputValueUserName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserNameText;
		array_push($arrayConstants, 'FORM_INVALID_USER_NAME', 'FORM_INVALID_USER_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_UNIQUE_ID
		$arrayElements[1]             = Config::FORM_FIELD_USER_UNIQUE_ID;
		$arrayElementsClass[1]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
		$arrayElementsInput[1]        = $this->InputValueUserUniqueId; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 25; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnUserUniqueIdText;
		array_push($arrayConstants, 'FORM_INVALID_USER_UNIQUE_ID', 'FORM_INVALID_USER_UNIQUE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_PRIMARY_PREFIX
		$arrayElements[2]             = Config::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX;
		$arrayElementsClass[2]        = &$this->ReturnUserPhonePrimaryPrefixClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[2]        = $this->InputValueUserPhonePrimaryPrefix; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 3; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnUserPhonePrimaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY', 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_PRIMARY
		$arrayElements[3]             = Config::FORM_FIELD_USER_PHONE_PRIMARY;
		$arrayElementsClass[3]        = &$this->ReturnUserPhonePrimaryClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[3]        = $this->InputValueUserPhonePrimary; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 9; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnUserPhonePrimaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PRIMARY', 'FORM_INVALID_USER_PHONE_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_SECONDARY_PREFIX
		$arrayElements[4]             = Config::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX;
		$arrayElementsClass[4]        = &$this->ReturnUserPhoneSecondaryPrefixClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[4]        = $this->InputValueUserPhoneSecondaryPrefix; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 3; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnUserPhoneSecondaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY', 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_PHONE_SECONDARY
		$arrayElements[5]             = Config::FORM_FIELD_USER_PHONE_SECONDARY;
		$arrayElementsClass[5]        = &$this->ReturnUserPhoneSecondaryClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[5]        = $this->InputValueUserPhoneSecondary; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 9; 
		$arrayElementsNullable[5]     = TRUE;
		$arrayElementsText[5]         = &$this->ReturnUserPhoneSecondaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_SECONDARY', 'FORM_INVALID_USER_PHONE_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_BIRTH_DATE_DAY
		$arrayElements[6]             = Config::FORM_FIELD_USER_BIRTH_DATE_DAY;
		$arrayElementsClass[6]        = &$this->ReturnBirthDateDayClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = Config::FORM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[6]        = $this->InputValueBirthDateDay; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 0; 
		$arrayElementsNullable[6]     = FALSE;
		$arrayElementsText[6]         = &$this->ReturnBirthDateDayText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_BIRTH_DATE_MONTH
		$arrayElements[7]             = Config::FORM_FIELD_USER_BIRTH_DATE_MONTH;
		$arrayElementsClass[7]        = &$this->ReturnBirthDateMonthClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = Config::FORM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[7]        = $this->InputValueBirthDateMonth; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 0; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnBirthDateMonthText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_BIRTH_DATE_YEAR
		$arrayElements[8]             = Config::FORM_FIELD_USER_BIRTH_DATE_YEAR;
		$arrayElementsClass[8]        = &$this->ReturnBirthDateYearClass;
		$arrayElementsDefaultValue[8] = ""; 
		$arrayElementsForm[8]         = Config::FORM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[8]        = $this->InputValueBirthDateYear; 
		$arrayElementsMinValue[8]     = 0; 
		$arrayElementsMaxValue[8]     = 0; 
		$arrayElementsNullable[8]     = FALSE;
		$arrayElementsText[8]         = &$this->ReturnBirthDateYearText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_GENDER
		$arrayElements[9]             = Config::FORM_FIELD_USER_GENDER;
		$arrayElementsClass[9]        = &$this->ReturnGenderClass;
		$arrayElementsDefaultValue[9] = ""; 
		$arrayElementsForm[9]         = Config::FORM_VALIDATE_FUNCTION_GENDER;
		$arrayElementsInput[9]        = $this->InputValueGender; 
		$arrayElementsMinValue[9]     = 0; 
		$arrayElementsMaxValue[9]     = 0; 
		$arrayElementsNullable[9]     = FALSE;
		$arrayElementsText[9]         = &$this->ReturnGenderText;
		array_push($arrayConstants, 'FORM_INVALID_USER_GENDER', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
							 
		//FORM_FIELD_USER_COUNTRY
		$arrayElements[10]             = Config::FORM_FIELD_USER_COUNTRY;
		$arrayElementsClass[10]        = &$this->ReturnCountryClass;
		$arrayElementsDefaultValue[10] = ""; 
		$arrayElementsForm[10]         = Config::FORM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE;
		$arrayElementsInput[10]        = $this->InputValueCountry; 
		$arrayElementsMinValue[10]     = 0; 
		$arrayElementsMaxValue[10]     = 45; 
		$arrayElementsNullable[10]     = FALSE;
		$arrayElementsText[10]         = &$this->ReturnCountryText;
		array_push($arrayConstants, 'FORM_INVALID_COUNTRY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_USER_REGION
		$arrayElements[11]             = Config::FORM_FIELD_USER_REGION;
		$arrayElementsClass[11]        = &$this->ReturnRegionClass;
		$arrayElementsDefaultValue[11] = ""; 
		$arrayElementsForm[11]         = Config::FORM_VALIDATE_FUNCTION_NOT_NUMBER;
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
											$matrixConstants, $Debug, $arrayOptions, $arrayExtraField);
		if($return == Config::SUCCESS)
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
			if($return == Config::SUCCESS)
			{
				$InstanceUser->UpdateUser(NULL, NULL, NULL, $birthDate, NULL, $this->InputValueCountry, NULL, NULL,
										  $this->InputValueGender, NULL, NULL, $this->InputValueUserName, $this->InputValueRegion, 
										  NULL, $this->InputValueSessionExpires, $this->InputValueTwoStepVerification, 
										  $this->InputValueUserActive, 
										  $this->InputValueUserConfirmed, $this->InputValueUserPhonePrimary,
										  $this->InputValueUserPhonePrimaryPrefix, $this->InputValueUserPhoneSecondary,
										  $this->InputValueUserPhoneSecondaryPrefix, NULL, $this->InputValueUserUniqueId);
				$this->ShowDivReturnSuccess("ACCOUNT_UPDATE_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnError("UPDATE_ERROR_USER_UNIQUE_ID");
				return Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE;
			}
		}
		$this->ShowDivReturnError("ACCOUNT_UPDATE_ERROR");
		return Config::ERROR;
	}
	
	protected function UserUpdateCorporationByUserEmail($CorporationNameNew, &$InstanceUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCorporationName = $CorporationNameNew;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_USER_CORPORATION_SELECT
		$arrayElements[0]             = Config::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnUserCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME',
				                    'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			if($this->InputValueCorporationName == Config::FORM_SELECT_NONE)
				$this->InputValueCorporationName = NULL;
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserUpdateCorporationByUserEmail($this->InputValueCorporationName,
			                                                                     $InstanceUser->GetEmail(),
																				 $Debug);
			if($return == Config::SUCCESS && $InstanceUser->GetCorporationName() != NULL)
			{
				$return = $instanceFacedePersistence->AssocUserCorporationDelete(
					                                     $InstanceUser->GetCorporationName(),
			                                             $InstanceUser->GetEmail(),
														 $Debug, NULL, TRUE);
				if($return == Config::SUCCESS && $this->InputValueCorporationName != NULL)
					$instanceFacedePersistence->AssocUserCorporationInsert(
					                                     $this->InputValueCorporationName,
														 NULL, NULL,
			                                             $InstanceUser->GetEmail(),
														 $Debug, NULL, TRUE);
			}	
			else if($return == Config::SUCCESS && $InstanceUser->GetCorporationName() == NULL)
				$return = $instanceFacedePersistence->AssocUserCorporationInsert(
					                                     $this->InputValueCorporationName,
														 NULL, NULL,
			                                             $InstanceUser->GetEmail(),
														 $Debug, NULL, TRUE);
			if($return == Config::SUCCESS)
			{
				$return = $instanceFacedePersistence->UserUpdateDepartmentByUserEmailAndCorporation(
					                                                         $this->InputValueCorporationName, 
																			 NULL, 
																			 $InstanceUser->GetEmail(), 
																			 $Debug);
				if($return == Config::MYSQL_UPDATE_SAME_VALUE)
					$return = Config::SUCCESS;
			}
			if($return == Config::SUCCESS && $InstanceUser->GetCorporationName() != NULL)
			{
				$instanceFacedePersistence->CorporationSelectByName($this->InputValueCorporationName, $instanceCorporation, $Debug);
				if($return == Config::SUCCESS)
				{
					$InstanceUser->SetCorporation($instanceCorporation);
					$this->Session->SetSessionValue(Config::SESS_ADMIN_USER, $InstanceUser);
					$this->UserLoadData($InstanceUser);
					$this->ShowDivReturnSuccess("USER_CHANGE_CORPORATION_SUCCESS");
				}
			}
			if($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("USER_CHANGE_CORPORATION_ERROR");
		return Config::ERROR;
	}
	
	protected function UserUpdatePasswordByUserEmail($ResetCode, $UserPasswordNew, $UserPasswordNewRepeat, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueNewPassword     = $UserPasswordNew;
		$this->InputValueRepeatPassword  = $UserPasswordNewRepeat;
		$arrayConstants = array(); $arrayExtraField = array(); $arrayOptions = array(); $matrixConstants = array();

		//FORM_FIELD_PASSWORD_NEW
		$arrayElements[0]             = Config::FORM_FIELD_PASSWORD_NEW;
		$arrayElementsClass[0]        = &$this->ReturnPasswordClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_PASSWORD;
		$arrayElementsInput[0]        = $this->InputValueNewPassword; 
		$arrayElementsMinValue[0]     = 8; 
		$arrayElementsMaxValue[0]     = 18; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnPasswordText;
		$arrayExtraField[0]           = &$this->InputValueRepeatPassword;
		array_push($arrayConstants, 'PASSWORD_RESET_INVALID_PASSWORD', 'PASSWORD_RESET_INVALID_PASSWORD_MATCH');
		array_push($arrayConstants, 'PASSWORD_RESET_INVALID_PASSWORD_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//RESET_CODE
		$this->Session->GetSessionValue(Config::FORM_FIELD_PASSWORD_RESET_CODE, $code);
		$arrayElements[1]             = Config::FORM_FIELD_PASSWORD_RESET_CODE;
		$arrayElementsClass[1]        = &$this->ReturnCodeClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = Config::FORM_VALIDATE_FUNCTION_COMPARE_STRING;
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
		if($return == Config::SUCCESS)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->UserUpdatePasswordByUserEmail($UserEmail, $this->InputValueNewPassword, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("USER_UPDATE_USER_PASSWORD_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("USER_UPDATE_USER_PASSWORD_WARNING");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("USER_UPDATE_USER_PASSWORD_ERROR");
		return Config::ERROR;
	}
	
	protected function UserUpdatePasswordRandomByUserEmail($Application, &$InstanceUser, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$instanceFacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
		$newRandomPassword = $instanceFacedeBusiness->GenerateRandomPassword();
		$return = $instanceFacedePersistence->UserUpdatePasswordByUserEmail($InstanceUser->GetEmail(), 
		                                                                    $newRandomPassword,
																		    $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedeBusiness->SendEmailPasswordReset($Application, 
																	  $InstanceUser->GetName(),
										                              $InstanceUser->GetEmail(),
										                              $newRandomPassword, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("PASSWORD_RESET_SUCCESS");
				return Config::SUCCESS;
			}
			$this->ShowDivReturnError("SEND_EMAIL_ERROR");
			return Config::ERROR;
		}
		elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
		{
			$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
			return Config::WARNING;	
		}
		$this->ShowDivReturnError("PASSWORD_RESET_ERROR");
		return Config::ERROR;
	}
	
	protected function UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserConfirmed = $UserConfirmedNew;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_USER_CONFIRMED
		$arrayElements[0]             = Config::FORM_FIELD_USER_CONFIRMED;
		$arrayElementsClass[0]        = &$this->ReturnUserConfirmedClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueUserConfirmed; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserConfirmedText;
		array_push($arrayConstants, 'FORM_INVALID_USER_CONFIRMED', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $this->InputValueHeaderDebug);
			if($return == Config::SUCCESS)
			{
				$this->ShowDivReturnSuccess("USER_UPDATE_USER_CONFIRMED_SUCCESS");
				return $return;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}	
		$this->ShowDivReturnError("USER_UPDATE_USER_CONFIRMED_ERROR");
		return $return;
	}
	
	protected function UserUpdateUserTypeByUserEmail($UserTypeNew, &$InstanceUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeUserId = $UserTypeNew;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_TYPE_USER_ID
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_USER_ID;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeUserId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserIdText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_USER_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			if($this->InputValueTypeUserId == Config::FORM_SELECT_NONE)
				$this->InputValueTypeUserId = NULL;
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->UserUpdateUserTypeByUserEmail($InstanceUser->GetEmail(),
																			    $this->InputValueTypeUserId,
																			    $Debug);
			if($return == Config::SUCCESS)
			{
				$instanceFacedePersistence->TypeUserSelectByTypeUserId($this->InputValueTypeUserId, $instanceTypeUser, $Debug);
				if($return == Config::SUCCESS)
				{
					$InstanceUser->SetUserType($instanceTypeUser);
					$this->Session->SetSessionValue(Config::SESS_ADMIN_USER, $InstanceUser);
					$this->ShowDivReturnSuccess("USER_CHANGE_USER_TYPE_SUCCESS");
					return Config::SUCCESS;
				}
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("USER_CHANGE_CORPORATION_ERROR");
		return Config::ERROR;
	}
	
	public function CheckInputImage($Input)
	{
		if(isset($_POST[$Input . "_x"]) && isset($_POST[$Input . "_y"]))
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
															   $value) != Config::SUCCESS)
					return Config::SUCCESS;
				else return Config::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED;
			}
			else return Config::USER_NOT_CONFIRMED;
		}
		else return Config::USER_NOT_LOGGED_IN;
	}
	
	public function CheckLogin($Debug)
	{
		if (isset($_POST[Config::LOGIN_FORM_SUBMIT]))
		{
			$this->InputValueLoginEmail     = $_POST[Config::LOGIN_USER];
			$this->InputValueLoginPassword  = $_POST[Config::LOGIN_PASSWORD];
			//VALIDA LOGIN
			if(!empty($this->InputValueLoginEmail) && !empty($this->InputValueLoginPassword))
			{
				if(strlen($this->InputValueLoginEmail) < 45 && strlen($this->InputValueLoginPassword) < 20)
					return $this->ExecuteLoginFirstPhaseVerification($Debug);
				else
				{
					$this->ShowDivReturnError("LOGIN_INVALID_LOGIN");
					return Config::ERROR;
				}
			}
			else
			{
				$this->ReturnEmptyText = $this->InstanceLanguageText->GetConstant('FILL_REQUIRED_FIELDS', $this->Language);
				$this->ShowDivReturnError("");
			}
		}
		elseif(isset($_POST[Config::FORM_LOGIN_TWO_STEP_VERIFICATION_CODE_SUBMIT]))
		{
			if($this->ExecuteLoginSecondPhaseVerirication() == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_LOGIN_TWO_STEP_VERIFICATION);
				return Config::SUCCESS;	
			}
			$this->Session->RemoveSessionVariable(Config::SESS_LOGIN_TWO_STEP_VERIFICATION);	
			$this->ShowDivReturnError("LOGIN_TWO_STEP_VERIFICATION_CODE_ERROR");
			return Config::ERROR;
		}
		elseif(isset($_POST[Config::LOGIN_FORM_SUBMIT_FORGOT_PASSWORD]))
		{
			$this->InputValueLoginEmail     = $_POST[Config::LOGIN_USER];
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
					return Config::SUCCESS;
				elseif($getElementKey == $Key."_x")
					return Config::SUCCESS;
				elseif($getElementKey == $Key."Back_x")
					return Config::SUCCESS;
				elseif($getElementKey == $Key."Forward_x")
					return Config::SUCCESS;
			}
		}
		return Config::ERROR;
	}
	
	public function CheckGetOrPostContainsKey($Key)
	{
		if($this->CheckGetContainsKey($Key) == Config::SUCCESS)
			return Config::SUCCESS;
		elseif($this->CheckPostContainsKey($Key) == Config::SUCCESS)
			return Config::SUCCESS;
		else return Config::ERROR;
	}
	
	public function CheckPostContainsKey($Key)
	{
		foreach($_POST as $postElementKey=>$postElementValue)
		{
			if(strpos($postElementKey, $Key) !== false)
			{
				if($postElementKey == $Key) 
					return Config::SUCCESS;
				elseif($postElementKey == $Key."_x")
					return Config::SUCCESS;
				elseif($postElementKey == $Key."Back_x")
					return Config::SUCCESS;
				elseif($postElementKey == $Key."Forward_x")
					return Config::SUCCESS;
			}
		}
		return Config::ERROR;
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
			if ($return == Config::SUCCESS)
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
		else return Config::PARAMETERS_NULL;
	}
	
	public function IncludeHeadGeneric()
	{
		if (file_exists (REL_PATH . Config::PATH_HEAD . Config::HEAD_GENERIC))
		{
			include_once(REL_PATH . Config::PATH_HEAD . Config::HEAD_GENERIC);
			return Config::SUCCESS;
		}
		else return self::ERROR_HEAD_GENERIC_NOT_EXISTS;
	}
	
	public function IncludeHeadJavaScript()
	{
		if (file_exists (REL_PATH . Config::PATH_HEAD . Config::HEAD_JAVASCRIPT))
		{
			include_once(REL_PATH . Config::PATH_HEAD . Config::HEAD_JAVASCRIPT);
			return Config::SUCCESS;
		}
		else return self::ERROR_HEAD_JAVASCRIPT_NOT_EXISTS;
	}
	
	public function LoadPage()
	{	
		if(!$this->PageEnabled) return Config::ERROR;
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
			return Config::SUCCESS;
		}
		else return self::ERROR_LANGUAGE_INSTANCE_NOT_CREATED;
	}
	
	public function LoadPageDependenciesDebug()
	{
		if(isset($this->User))
		{
			if($this->User->CheckSuperUser())
			{
				if(!isset($_POST[Config::FORM_FIELD_HEADER_DEBUG]) && !isset($_POST[Config::FORM_FIELD_HEADER_DEBUG_HIDDEN]))
					$this->Session->GetSessionValue(Config::SESS_DEBUG, $this->InputValueHeaderDebug);
				if($this->InputValueHeaderDebug == Config::CHECKBOX_CHECKED || isset($_POST[Config::FORM_FIELD_HEADER_DEBUG]))
				{
					$this->StartPageLoadTime();
					$this->InputValueHeaderDebug = Config::CHECKBOX_CHECKED;
					$this->ReturnHeaderDebugClass = "SwitchToggleSlider SwitchToggleSliderChange";
					echo "<div class='DivPageDebug'>";
					echo "<div class='DivPageDebugContent'><b>GET</b>: "; print_r($_GET);  echo "</div>";
					echo "<div class='DivPageDebugContent'><b>POST</b>: "; print_r($_POST); echo "</div></div>";
					echo "<div class='DivPageDebugContent'><b>FILES</b>: "; print_r($_FILES); echo "</div></div>";
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
		
		if(!isset($_POST[Config::FORM_FIELD_HEADER_LAYOUT]) && !isset($_POST[Config::FORM_FIELD_HEADER_LAYOUT_HIDDEN]))
			$this->Session->GetSessionValue(Config::SESS_DEVICE_LAYOUT, $this->InputValueHeaderLayout);
		
		if(isset($_POST[Config::FORM_FIELD_HEADER_LAYOUT]))
		{
			$this->Device = Page::DEVICE_MOBILE;
			$this->InputValueHeaderLayout = Config::CHECKBOX_CHECKED;
			$this->ReturnHeaderLayoutClass = "SwitchToggleSlider SwitchToggleSliderChange";

		}
		elseif(isset($_POST[Config::FORM_FIELD_HEADER_LAYOUT_HIDDEN])) 
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
		return Config::WARNING;
	}
	
	public function RedirectPage($Page)
	{
		$return = NULL;
		if ($Page == NULL)
		{
			$return = Page::GetCurrentDomain($Page);
			if ($return == Config::SUCCESS)
			{
				header("Location: $Page");
			}
			else return Config::EMPTY_AMBIENT_VARIABLE;
		}
		else header("Location: $Page");
	}
	
	public function ShowDivReturnError($Constant)
	{
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		if(isset($Constant))
		{
			if(($Constant) != NULL)
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant($Constant, $this->Language);	
		}
	}
	
	public function ShowDivReturnEmpty()
	{
		$this->ReturnClass = "DivHidden";
		$this->ReturnImage = "DivDisplayNone";
		$this->ReturnText  = "";
	}
	
	public function ShowDivReturnSuccess($Constant)
	{
		$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
		$this->ReturnImage = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
		if(isset($Constant))
		{
			if(($Constant) != NULL)
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant($Constant, $this->Language);	
		}
	}
	
	public function ShowDivReturnWarning($Constant)
	{
		$this->ReturnClass = Config::FORM_BACKGROUND_WARNING;
		$this->ReturnImage = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
		if(isset($Constant))
		{
			if(($Constant) != NULL)
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant($Constant, $this->Language);	
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
			return Config::SUCCESS;
		}
		else return Config::EMPTY_AMBIENT_VARIABLE;
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
			return Config::SUCCESS;
		}
		else return Config::EMPTY_AMBIENT_VARIABLE;
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
			return Config::SUCCESS;
		}
		else return Config::EMPTY_AMBIENT_VARIABLE;
	}
}
?>