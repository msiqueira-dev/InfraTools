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
		abstract protected function GetCurrentPage();
		private       function        CheckPostLanguage();
		private       function        ExecuteLoginFirstPhaseVerification($Debug);
		private       function        ExecuteLoginSecondPhaseVerirication();
		private       function        LoadInstanceUser();
		private       function        SendTwoStepVerificationCode($Application, $Email, $Name, $Debug);
		protected     function        TagOnloadFocusField($Form, $Field);
		protected     function        CaptchaLoad(SessionCaptchaKey);
		protected     function        CorporationDelete($CorporationName, $Debug);
		protected     function        CorporationInsert($CorporationActive, $Name, $Debug);
		protected     function        CorporationLoadData(&$InstanceCorporation);
		protected     function        CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug);
		protected     function        CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, 
															  &$RowCount, $Debug)
		protected     function        CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
		protected     function        CorporationSelectByName($CorporationName, &$InstanceCorporation, $Debug);
		protected     function        CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug);
		protected     function        CorporationSelectUsers($Limit1, $Limit2, $InstanceCorporation, &$ArrayInstanceCorporationUsers,
		                                                     &$RowCount, $Debug, $HideReturnSuccessImage = TRUE);
		protected     function        CorporationUpdate($CorporationActive, $CorporationName, &$InstanceCorporation, $Debug);
		protected     function        CountrySelect($Limit1, $Limit2, &$ArrayInstanceCountry, &$RowCount, $Debug);
		protected     function        DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug);
		protected     function        DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug);
		protected     function        DepartmentLoadData();
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
		protected     function        LoadHtml($HasLoginForm);
		protected     function        TeamDeleteByTeamId($TeamId, $Debug);
		protected     function        TeamInsert($TeamDescription, $TeamName, $Debug);
		protected     function        TeamLoadData(&$InstanceTeam);
		protected     function        TeamSelect($Limit1, $Limit2, &$ArrayInstanceTeam, &$RowCount, $Debug);
		protected     function        TeamSelectByTeamId($TeamId, &$InstanceTeam, $Debug);
		protected     function        TeamSelectByTeamName($TeamName, &$ArrayInstanceTeam, $Debug);
		protected     function        TeamUpdateByTeamId($TeamDescriptionNew, $TeamNameNew, &$InstanceTeam, $Debug);
		protected     function        TicketDeleteByTicketId($InstanceTicket, $Debug);
		protected     function        TicketInsert($TicketDescription, $TicketStatus, $TicketSuggestion, $TicketTitle, $TicketType, $Debug);
		protected     function        TicketLoadData($InstanceTicket);
		protected     function        TicketSelectByTicketId($TicketId, &$InstanceTicket, $Debug);
		protected     function        TicketSelectByRequestingUserEmail($RequestingUserEmail, &$InstanceTicket, $Debug);
		protected     function        TicketSelectByResponsibleUserEmail($ResponsibleUserEmail, &$InstanceTicket, $Debug);
		protected     function        TicketUpdateByTicketId($TicketDescriptionNew, $TicketStatusNew, $TicketSuggestionNew, $TicketTitleNew, 
											                 $TicketTypeNew, &$InstanceTicket, $Debug);
		protected     function        TicketUpdateTicketStatusByTicketId($TicketStatusNew, &$InstanceTicket, $Debug);
		protected     function        TicketUpdateResponsibleUserByTicketId($ResponsibleUserEmailNew, &$InstanceTicket, $Debug);
		protected     function        TypeAssocUserTeamDeleteByTeamId($InstanceTypeAssocUserTeam, $Debug);
		protected     function        TypeAssocUserTeamInsert($InputValueTypeAssocUserTeamTeamDescription, $Debug);
		protected     function        TypeAssocUserTeamLoadData(&$InstanceTypeAssocUserTeam);
		protected     function        TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayInstanceTypeAssocUserTeam, &$RowCount, $Debug);
		protected     function        TypeAssocUserTeamSelectByTeamId($TypeAssocUserTeamTeamId, &$InstanceTypeAssocUserTeam, $Debug);
		protected     function        TypeAssocUserTeamUpdateByTeamId($TypeAssocUserTeamTeamDescription, &$TypeAssocUserTeam, $Debug);
		protected     function        TypeStatusTicketDeleteByTypeStatusTicketId(&$InstanceTypeStatusTicket, $Debug);
		protected     function        TypeStatusTicketInsert($TypeStatusTicketDescritpion, $Debug);
		protected     function        TypeStatusTicketLoadData($InstanceTypeStatusTicket);
		protected     function        TypeStatusTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeStatusTicket, &$RowCount, $Debug);
		protected     function        TypeStatusTicketSelectByTypeStatusTicketDescription($TypeStatusTicketDescription, 
		                                                                                  &$InstanceTypeStatusTicket, $Debug);
		protected     function        TypeStatusTicketSelectByTypeStatusTicketId($TypeStatusTicketId, &$InstanceTypeStatusTicket, $Debug);
		protected     function        TypeStatusTicketUpdateByTypeStatusTicketId($TypeStatusTicketDescriptionNew,
		                                                                        &$InstanceTypeStatusTicket, $Debug);
		protected     function        TypeTicketDeleteByTypeTicketId(&$InstanceTypeTicket, $Debug);
		protected     function        TypeTicketInsert($TypeTicketDescription, $Debug);
		protected     function        TypeTicketLoadData($InstanceTypeTicket);
		protected     function        TypeTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeTicket, &$RowCount, $Debug);
		protected     function        TypeTicketSelectByTypeTicketId($TypeTicketId, &$InstanceTypeTicket, $Debug);
		protected     function        TypeTicketUpdateByTypeTicketId($TypeTicketDescriptionNew, &$InstanceTypeTicket, $Debug);
		protected     function        TypeUserDeleteByTypeUserId($InstanceTypeUser, $Debug);
		protected     function        TypeUserInsert($TypeUserDescription, $Debug);
		protected     function        TypeUserLoadData(&$InstanceTypeUser);
		protected     function        TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug);
		protected     function        TypeUserSelectByTypeUserDescription($TypeUserDescription, &$InstanceTypeUser, $Debug);
		protected     function        TypeUserSelectByTypeUserId($TypeUserId, &$InstanceTypeUser, $Debug);
		protected     function        TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug);
		protected     function        TypeUserUpdateByTypeUserId($TypeUserDescription, $InstanceTypeUser, $Debug);
		protected     function        UserDeleteByUserEmail(&$InstanceUser, $Debug);
		protected     function        UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByDepartment($CorporationName, $DepartmentName, $Limit1, $Limit2, &$RowCount, Debug);
		protected     function        UserSelectByHashCode($HashCode, &$UserInstance, $Debug);
		protected     function        UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug)
		protected     function        UserSelectByTypeUserId($Limit1, $Limit2, $TypeUserId, &$ArrayInstanceUser, &$RowCount, $Debug);
		protected     function        UserSelectByUserEmail($UserEmail, &$UserInstance, $Debug);
		protected     function        UserSelectByUserUniqueId($UniqueId, &$UserInstance, $Debug);
		protected     function        UserSelectExistsByUserEmail($$Capcha, $UserEmail, $Debug);
		protected     function        UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug);
		protected     function        UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug);
		protected     function        UserUpdateActiveByUserEmail($UserActiveNew, &$InstanceUser, $Debug);
		protected     function        UserUpdateCorporationByUserEmail($CorporationNameNew, &$InstanceUser, $Debug);
		protected     function        UserUpdatePasswordByUserEmail($ResetCode, $UserPasswordNew, $UserPasswordNewRepeat, 
		                                                            $UserEmail, $Debug);
		protected     function        UserUpdatePasswordRandomByUserEmail($Application, &$InstanceUser, $Debug);
		protected     function        UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug);
		protected     function        UserUpdateUserTypeByUserEmail($TypeUserIdNew, &$InstanceUser, $Debug);
		public        function        CheckInputImage($Input);
		public        function        CheckInstanceUser();
		public        function        CheckPostContainsKey($Key);
		public        function        IncludeHeadAll($Page);
		public        function        IncludeHeadGeneric();
		public        function        IncludeHeadJavaScript();
		public        function        LoadPageDependencies();
		public        function        LoadPageDependenciesDebug();
		public        function        LoadPageDependenciesDevice();
		public        function        RedirectPage($Page);
		public        function        StartPageLoadTime();
		public        function        StopPageLoadTime();
		public static function        AlertMessage($Message);
		public static function        GetCurrentDomain(&$currentDomain);
		public static function        GetCurrentDomainWithPort(&$currentDomain);
		public static function        GetCurrentURL(&$pageUrl);
		public static function        GetPageFileDefaultLanguageByDir($PageDirName);
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

abstract class Page
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
	public    $InputValueCorporationActive                          = "";
	public    $InputValueCorporationName                            = "";
	public    $InputValueDepartmentActive                           = "";
	public    $InputValueDepartmentInitials                         = "";
	public    $InputValueDepartmentName                             = "";
	public    $InputValueDepartmentNameAndCorporationNameRadio      = "";
	public    $InputValueDepartmentNameRadio                        = "";
	public    $InputValueLoginEmail                                 = "";
	public    $InputValueLoginPassword                              = "";
	public    $InputValueLoginTwoStepVerificationCode               = "";
	public    $ReturnClass                                          = "DivHidden";
	public    $ReturnCorporationNameClass                           = "";
	public    $ReturnCorporationNameText                            = "";
	public    $ReturnDepartmentInitialsClass                        = "";
	public    $ReturnDepartmentInitialsText                         = "";
	public    $ReturnDepartmentNameClass                            = "";
	public    $ReturnDepartmentNameText                             = "";
	public    $ReturnImage                                          = "";
	public    $ReturnLoginClass                                     = "";
	public    $ReturnLoginText                                      = "";
	
	/* Singleton */
	private static $Instance;
	
	/* Get Instance */
	public static function __create($Language)
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class($Language);
        }
        return self::$Instance;
    }
	
	/* Constructor */
	protected function __construct($Language) 
    {
		$this->Factory = Factory::__create();
		$this->Session = $this->Factory->CreateSession();
		$this->Config = $this->Factory->CreateConfig();
		if(get_object_vars($this->Config)[get_class($this).Config::ENABLED])
		{
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
		}
		else $this->PageEnabled = FALSE;
		//LOG OUT
		if(isset($_POST[Config::POST_BACK_FORM]))
		{
			if ($_POST[Config::POST_BACK_FORM] == Config::FORM_FIELD_HEADER_LOG_OUT)
			{
				$this->Session->DestroyCustomSession();
				$this->User = NULL;
			}
		}
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
	abstract protected function GetCurrentPage();
	
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
									 . str_replace("_", "", $this->GetCurrentPage()));
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
							$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant(
																		  'LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_FAILED', 
																		  $this->Language);
							$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
							$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								                                  Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
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
			else
			{
				$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant('USER_INACTIVE', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						                              Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		else
		{
			$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant(
																		  'LOGIN_INVALID_LOGIN', 
																		  $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							                      Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}		
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
	
	private function SendTwoStepVerificationCode($Application, $Email, $Name, $Debug)
	{
		$FacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
		$code = $FacedeBusiness->GenerateRandomCode();
		$this->Session->SetSessionValue(Config::SESS_LOGIN_TWO_STEP_VERIFICATION,
													$code);
		if($FacedeBusiness->SendEmailLoginTwoStepVerificationCode($Application, 
																  $Email, $Name, $code, $Debug) == Config::SUCCESS)
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
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_CORPORATION_DELETE_SUCCESS', $this->Language); 
			$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return $return;
		}
		else
		{
			if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_CORPORATION_DELETE_ERROR_DEPENDENCY_DEPARTMENT', 
																			 $this->Language);	
			else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_CORPORATION_DELETE_ERROR', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
	}
	
	protected function CorporationInsert($CorporationActive, $CorporationName, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_CORPORATION_REGISTER_SUCCESS', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_CORPORATION_REGISTER_ERROR', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
			return $return;
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_NOT_FOUND', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
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
				if($return == Config::SUCCESS)
				{
					$this->Session->SetSessionValue(Config::SESS_ADMIN_CORPORATION, $InstanceCorporation);
					return Config::SUCCESS;
				}
				else
				{
					$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_NOT_FOUND', $this->Language);
					$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
					return Config::ERROR;
				}
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_NOT_FOUND', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							        Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
		$return = $instanceFacedePersistence->UserSelectByCorporation($InstanceCorporation->GetCorporationName(),
			                                                          $Limit1, $Limit2,
			                                                          $ArrayInstanceCorporationUsers, 
																	  $RowCount, $Debug);
		if($return == Config::SUCCESS)
		{
			if($HideReturnSuccessImage)
			{
				$this->ReturnText = NULL;
				$this->ReturnClass = NULL;
				$this->ReturnImage = NULL;
			}
			return Config::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_CORPORATION_SELECT_USERS_ERROR', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
	}
	
	protected function CorporationUpdate($CorporationActive, $CorporationName, &$InstanceCorporation, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_UPDATE_SUCCESS', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return $return;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_UPDATE_ERROR_UNIQUE_EXISTS', 
																			 $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_UPDATE_ERROR', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							                      Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
	}
	
	protected function CountrySelect($Limit1, $Limit2, &$ArrayInstanceCountry, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		return $instanceFacedePersistence->CountrySelect($Limit1, $Limit2, $ArrayInstanceCountry, 
													     $RowCount, $Debug);
	}
	
	protected function DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug);
		if($return == Config::SUCCESS)
		{
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_DELETE_SUCCESS', $this->Language); 
			$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return $return;
		}
		else
		{
			if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_DELETE_ERROR_DEPENDENCY_USERS', 
																			 $this->Language);	
			else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_DELETE_ERROR', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_REGISTER_SUCCESS', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_REGISTER_ERROR_DEPARTMENT_EXISTS',
																			$this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				return Config::WARNING;
			}
		}
		if($return != Config::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_REGISTER_ERROR', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
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
			return $return;
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_NOT_FOUND', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
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
																					$RowCount,
																		            $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $ArrayInstanceDepartment);
				return $return;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_NOT_FOUND', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_NOT_FOUND', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
																		   $ArrayInstanceDepartment, 
																		   $Debug);
			if($return == Config::SUCCESS)
				return $return;
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_NOT_FOUND', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
	}
	
	protected function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
																		  &$InstanceDepartment, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueCorporationName = $CorporationName;
		$this->InputValueDepartmentName = $DepartmentName;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_CORPORATION_SELECT
		$arrayElements[0]             = Config::FORM_FIELD_CORPORATION_SELECT;
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
																		             $InstanceDepartment, 
																		             $Debug);
			if($return == Config::SUCCESS)
			{
				$return = $this->DepartmentLoadData($InstanceDepartment);
				if($return == Config::SUCCESS)
				{
					$this->Session->SetSessionValue(Config::SESS_ADMIN_DEPARTMENT, $InstanceDepartment);
					return Config::SUCCESS;
				}
				else
				{
					$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_NOT_FOUND', $this->Language);
					$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
					return Config::ERROR;
				}
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_NOT_FOUND', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
	}
	
	protected function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug)
	{
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $FacedePersistence->DepartmentSelectNoLimit($ArrayInstanceDepartment, $Debug);
		if($return == Config::SUCCESS)
		{
			$this->ReturnText  = NULL;
			$this->ReturnClass = NULL;
			$this->ReturnImage = NULL;
			return Config::SUCCESS;
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_UPDATE_SUCCESS', 
																				$this->Language);
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return Config::WARNING;
			}
			else
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_UPDATE_ERROR', 
																				$this->Language);
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}	
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
						$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
						$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
											   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
						$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_UPDATE_SUCCESS', 
																						$this->Language);
						return Config::SUCCESS;
					}
					else
					{
						$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_NOT_FOUND', $this->Language);
						$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
						$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
						return Config::ERROR;
					}
				}
				else
				{
					$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_UPDATE_ERROR', 
																					$this->Language);
					return Config::ERROR;
				}
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return Config::WARNING;
			}
			else
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_UPDATE_ERROR', 
																				$this->Language);
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}	
	}
	
	protected function LoadHtml($HasLoginForm)
	{
		$page = str_replace("_", "", $this->GetCurrentPage());
		echo Config::HTML_TAG_DOCTYPE;
		echo Config::HTML_TAG_START;
		$return = $this->IncludeHeadAll($page);
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
				elseif($this->CheckInstanceUser() == Config::USER_NOT_CONFIRMED)
					include_once(REL_PATH . Config::PATH_BODY_PAGE . str_replace("_","",Config::PAGE_NOT_CONFIRMED) . ".php");
				else include_once(REL_PATH . Config::PATH_BODY_PAGE . $page . ".php");
			}
			else include_once(REL_PATH . Config::PATH_BODY_PAGE . $page . ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . Config::PATH_FOOTER);
			echo Config::HTML_TAG_BODY_END;
			echo Config::HTML_TAG_END;
			return Config::SUCCESS;
		}
		else return Config::ERROR;
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
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_DELETE_SUCCESS', 
																				$this->Language); 
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
		}
		if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_DELETE_ERROR_DEPENDENCY_TEAM', 
																		 $this->Language);
		else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_DELETE_ERROR', 
																		  $this->Language);
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_REGISTER_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_REGISTER_ERROR', 
																			 $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
		if($return != Config::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TEAM_NOT_FOUND', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
		else return Config::SUCCESS;
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
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('TEAM_NOT_FOUND', $this->Language);
				$this->ReturnClass      = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage      = "<img src='" . $this->Config->DefaultServerImage . 
								          Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::FORM_TEAM_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
			{
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('TEAM_NOT_FOUND', $this->Language);
				$this->ReturnClass      = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage      = "<img src='" . $this->Config->DefaultServerImage . 
								          Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::FORM_TEAM_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
				if($this->TeamLoadData($InstanceTeam) == Config::SUCCESS)
				{
					$InstanceTeam->SetTeamDescription($this->InputValueTeamDescription);
					$InstanceTeam->SetTeamName($this->InputValueTeamName);
					$this->Session->SetSessionValue(Config::SESS_ADMIN_TEAM, $InstanceTeam);
					$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_UPDATE_SUCCESS', 
																					$this->Language);
					return Config::SUCCESS;
				}
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return Config::WARNING;
			}
		}
		$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_UPDATE_ERROR', 
																		$this->Language);
		return Config::ERROR;
	}
	
	protected function TicketDeleteByTicketId($InstanceTicket, $Debug)
	{
	}
	
	protected function TicketInsert($TicketDescription, $TicketStatus, $TicketSuggestion, $TicketTitle, $TicketType, $Debug)
	{
	}
	
	protected function TicketLoadData($InstanceTicket)
	{
		if($InstanceTicket != NULL)
		{
			$this->InputValueId                = $InstanceTypeStatusTicket->GetTicketId();
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
	
	protected function TicketSelectByTicketId($TicketId, &$InstanceTicket, $Debug)
	{
	}
	
	protected function TicketSelectByRequestingUserEmail($RequestingUserEmail, &$InstanceTicket, $Debug)
	{
	}
	
	protected function TicketSelectByResponsibleUserEmail($ResponsibleUserEmail, &$InstanceTicket, $Debug)
	{
	}
	
	protected function TicketUpdateByTicketId($TicketDescriptionNew, $TicketStatusNew, $TicketSuggestionNew, $TicketTitleNew, 
											  $TicketTypeNew, &$InstanceTicket, $Debug)
	{
	}
	
	protected function TicketUpdateTicketStatusByTicketId($TicketStatusNew, &$InstanceTicket, $Debug)
	{
	}
	
	protected function TicketUpdateResponsibleUserByTicketId($ResponsibleUserEmailNew, &$InstanceTicket, $Debug)
	{
	}
	
	protected function TypeAssocUserTeamDeleteByTeamId($InstanceTypeAssocUserTeam, $Debug)
	{
		if($InstanceTypeAssocUserTeam != NULL)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->TypeAssocUserTeamDeleteByTeamId($this->TypeAssocUserTeam->GetTypeAssocUserTeamTeamId(), $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam);
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_SUCCESS', 
																				$this->Language); 
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							                          Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return $return;
			}
			else
			{
				if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
					$this->ReturnText = $this->InstanceLanguageText->GetConstant
					                           ('ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_ERROR_DEPENDENCY_TEAM', 
												$this->Language);
				else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_ERROR', 
																				  $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
	}
	
	protected function TypeAssocUserTeamInsert($InputValueTypeAssocUserTeamTeamDescription, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeAssocUserTeamTeamDescription = $InputValueTypeAssocUserTeamTeamDescription;
		$arrayConstants = array(); $matrixConstants = array();
		
		//TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamTeamDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_TEAM_TEAM_DESCRIPTION', 'FORM_INVALID_TYPE_ASSOC_TEAM_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TypeAssocUserTeamInsert($this->InputValueTypeAssocUserTeamTeamDescription, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								                      Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
		}
		$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_ERROR', $this->Language);
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		return Config::ERROR;
	}
	
	protected function TypeAssocUserTeamLoadData(&$InstanceTypeAssocUserTeam)
	{
		if($InstanceTypeAssocUserTeam == NULL)
			$this->Session->GetSessionValue(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
		if($InstanceTypeAssocUserTeam != NULL)
		{
			$this->InputValueTypeAssocUserTeamTeamDescription  = $InstanceTypeAssocUserTeam->GetTypeAssocUserTeamTeamDescription();
			$this->InputValueTypeAssocUserTeamTeamId           = $InstanceTypeAssocUserTeam->GetTypeAssocUserTeamTeamId();
			$this->InputValueRegisterDate                      = $InstanceTypeAssocUserTeam->GetRegisterDate();
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
		if($return != Config::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_TEAM_NOT_FOUND', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
		else return Config::SUCCESS;
	}
	
	protected function TypeAssocUserTeamSelectByTeamId($TypeAssocUserTeamTeamId, &$InstanceTypeAssocUserTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeAssocUserTeamTeamId = $TypeAssocUserTeamTeamId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamTeamIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamTeamId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamTeamIdText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_TEAM_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $FacedePersistence->TypeAssocUserTeamSelectByTeamId($this->InputValueTypeAssocUserTeamTeamId, 
																		  $InstanceTypeAssocUserTeam,
																		  $Debug);
			if($return == Config::SUCCESS)
			{
				if($this->TypeAssocUserTeamLoadData($InstanceTypeAssocUserTeam) == Config::SUCCESS)
				{
					$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $InstanceTypeAssocUserTeam);
					return Config::SUCCESS;
				}	
			}
		}
		$this->ReturnTypeAssocUserTeamTeamIdText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_TEAM_NOT_FOUND', $this->Language);
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		return Config::FORM_TYPE_ASSOC_USER_TEAM_RETURN_NOT_FOUND;
	}
	
	protected function TypeAssocUserTeamUpdateByTeamId($TypeAssocUserTeamTeamDescription, &$TypeAssocUserTeam, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeAssocUserTeamTeamDescription = $TypeAssocUserTeamTeamDescription;
		$this->InputFocus = Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION;
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamTeamDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_TEAM_TEAM_DESCRIPTION','FORM_INVALID_TYPE_ASSOC_TEAM_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $FacedePersistence->TypeAssocUserTeamUpdateByTeamId($this->InputValueTypeAssocUserTeamTeamDescription,
																		  $this->TypeAssocUserTeam->GetTypeAssocUserTeamTeamId(),
																		  $Debug);
			if($return == Config::SUCCESS)
			{
				$this->TypeAssocUserTeam->SetTypeAssocUserTeamDescription($this->InputValueTypeAssocUserTeamTeamDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam);
				if($this->TypeAssocUserTeamLoadData($this->TypeAssocUserTeam) == Config::SUCCESS)
				{
					$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS 
						                                . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_SUCCESS', 
																					$this->Language);
				}
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return Config::WARNING;
			}
		}
		$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_ERROR', 
																		$this->Language);
		return Config::ERROR;	
	}
	
	protected function TypeStatusTicketDeleteByTypeStatusTicketId(&$InstanceTypeStatusTicket, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeStatusTicketDeleteByTypeStatusTicketId($InstanceTypeStatusTicket->GetTypeStatusTicketId(), 
																                         $Debug);
		if($return == Config::SUCCESS)
		{
			$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_STATUS_TICKET_DELETE_SUCCESS', 
																			$this->Language); 
			$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return $return;
		}
		else
		{
			if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_STATUS_TICKET_DELETE_ERROR_DEPENDENCY_TICKET', 
																			 $this->Language);
			else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_STATUS_TICKET_DELETE_ERROR',
																			  $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
	}
	
	
	protected function TypeStatusTicketInsert($TypeStatusTicketDescritpion, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeStatusTicketDescription = $TypeStatusTicketDescritpion;
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_STATUS_TICKET_REGISTER_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_STATUS_TICKET_REGISTER_ERROR', 
																			 $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
	}
	
	protected function TypeStatusTicketLoadData($InstanceTypeStatusTicket)
	{
		if($InstanceTypeStatusTicket != NULL)
		{
			$this->InputValueTypeStatusTicketDescription  = $InstanceTypeStatusTicket->GetTypeStatusTicketDescription();
			$this->InputValueTypeStatusTicketId           = $InstanceTypeStatusTicket->GetTypeStatusTicketId();
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
		if($return != Config::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_STATUS_TICKET_NOT_FOUND', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
		else return Config::SUCCESS;
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
			else
			{
				$this->ReturnTypeStatusTicketDescriptionText = $this->InstanceLanguageText->GetConstant('TYPE_STATUS_TICKET_NOT_FOUND', 
																										$this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::FORM_TYPE_STATUS_TICKET_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
	}
	
	protected function TypeStatusTicketSelectByTypeStatusTicketId($TypeStatusTicketId, &$InstanceTypeStatusTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeStatusTicketId = $TypeStatusTicketId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_STATUS_TICKET_ID
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_STATUS_TICKET_ID;
		$arrayElementsClass[0]        = &$this->ReturnTypeStatusTicketIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeStatusTicketId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeStatusTicketIdText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_STATUS_TICKET_ID',
									'FORM_INVALID_TYPE_STATUS_TICKET_ID_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->TypeStatusTicketSelectByTypeStatusTicketId($this->InputValueTypeStatusTicketId, 
												  					                         $this->InstanceTypeStatusTicket,
																		                     $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
				$this->TypeStatusTicketLoadData($InstanceTypeStatusTicket);
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnTypeStatusTicketIdText = $this->InstanceLanguageText->GetConstant('TYPE_STATUS_TICKET_NOT_FOUND', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::FORM_TYPE_STATUS_TICKET_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
	}
	
	protected function TypeStatusTicketUpdateByTypeStatusTicketId($TypeStatusTicketDescriptionNew, &$InstanceTypeStatusTicket, $Debug)
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
			$return = $instanceFacedePersistence->TypeStatusTicketUpdateByTypeStatusTicketId(
				                                                               $this->InputValueTypeStatusTicketDescription,
																			   $InstanceTypeStatusTicket->GetTypeStatusTicketId(),
																			   $Debug);
			if($return == Config::SUCCESS)
			{
				$InstanceTypeStatusTicket->SetTypeStatusTicketDescription($this->InputValueTypeStatusTicketDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
				$this->TypeStatusTicketLoadData($InstanceTypeStatusTicket);
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_STATUS_TICKET_UPDATE_SUCCESS', 
																				$this->Language);
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return Config::WARNING;
			}
			else
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_STATUS_TICKET_UPDATE_ERROR', 
																				$this->Language);
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}	
	}
	
	protected function TypeTicketDeleteByTypeTicketId(&$InstanceTypeTicket, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeTicketDeleteByTypeTicketId($InstanceTypeTicket->GetTypeTicketId(), $Debug);
		if($return == Config::SUCCESS)
		{
			$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_TYPE_TICKET, $InstanceTypeTicket);
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_DELETE_SUCCESS', $this->Language); 
			$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return $return;
		}
		else
		{
			if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_DELETE_ERROR_DEPENDENCY_TICKET', 
																			 $this->Language);
			else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_DELETE_ERROR', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_REGISTER_SUCCESS', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_REGISTER_ERROR', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
	}
	
	protected function TypeTicketLoadData($InstanceTypeTicket)
	{
		if($InstanceTypeTicket != NULL)
		{
			$this->InputValueTypeTicketDescription  = $InstanceTypeTicket->GetTypeTicketDescription();
			$this->InputValueTypeTicketId           = $InstanceTypeTicket->GetTypeTicketId();
			$this->InputValueRegisterDate           = $InstanceTypeTicket->GetRegisterDate();
			return Config::SUCCESS;
		}
		else return Config::ERROR;
	}
	
	protected function TypeTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeTicket, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeTicketSelect($Limit1, $Limit2,
															   $ArrayInstanceTypeTicket,
															   $RowCount,
															   $Debug);
		if($return != Config::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_TICKET_NOT_FOUND', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
		else return Config::SUCCESS;
	}
	
	protected function TypeTicketSelectByTypeTicketId($TypeTicketId, &$InstanceTypeTicket, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$this->InputValueTypeTicketId = $TypeTicketId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_TYPE_TICKET_ID
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_TICKET_ID;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeTicketId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeTicketIdText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_TICKET_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->TypeTicketSelectByTypeTicketId($this->InputValueTypeTicketId, $InstanceTypeTicket, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_TICKET, $InstanceTypeTicket);
				$this->TypeTicketLoadData($InstanceTypeTicket);
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnTypeTicketIdText = $this->InstanceLanguageText->GetConstant('TYPE_TICKET_NOT_FOUND', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::FORM_TYPE_TICKET_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
	}
	
	protected function TypeTicketUpdateByTypeTicketId($TypeTicketDescriptionNew, &$InstanceTypeTicket, $Debug)
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
			$return = $instanceFacedePersistence->TypeTicketUpdateById($this->InputValueTypeTicketDescription,
																	   $InstanceTypeTicket->GetTypeTicketId(),
																	   $Debug);
			if($return == Config::SUCCESS)
			{
				$InstanceTypeTicket->SetTypeTicketDescription($this->InputValueTypeTicketDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_TICKET, $InstanceTypeTicket);
				$this->TypeTicketLoadData($InstanceTypeTicket);
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_UPDATE_SUCCESS', $this->Language);
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return Config::WARNING;
			}
			else
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_UPDATE_ERROR', $this->Language);
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}	
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
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_DELETE_SUCCESS', $this->Language); 
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							           Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return $return;
			}
		}
		if($return == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_DELETE_ERROR_DEPENDENCY_USER', 
																		 $this->Language);
		else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_DELETE_ERROR', $this->Language);
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_REGISTER_SUCCESS', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_REGISTER_ERROR', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
		if($return != Config::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_USER_NOT_FOUND', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
		else return Config::SUCCESS;
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
			else
			{
				$this->ReturnTypeUserDescriptionText = $this->InstanceLanguageText->GetConstant('TYPE_USER_NOT_FOUND', 
																								$this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::FORM_TYPE_USER_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
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
			else
			{
				$this->ReturnTypeUserIdText = $this->InstanceLanguageText->GetConstant('TYPE_USER_NOT_FOUND', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::FORM_TYPE_USER_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							       Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::FORM_FIELD_ERROR;
		}
	}
	
	protected function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->TypeUserSelectNoLimit($ArrayInstanceTypeUser, $Debug);
		if($return != Config::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_USER_NOT_FOUND', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
		else return Config::SUCCESS;
	}
	
	protected function TypeUserUpdateByTypeUserId($TypeUserDescription, $InstanceTypeUser, $Debug)
	{
		if($InstanceTypeUser != NULL)
		{
			$PageForm = $this->Factory->CreatePageForm();
			$this->InputValueTypeUserDescription  = $TypeUserDescription;
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
				$return = $FacedePersistence->TypeUserUpdateByTypeUserId($InstanceTypeUser->GetTypeUserId(),
																		 $this->InputValueTypeUserDescription,
																		 $Debug);
				if($return == Config::SUCCESS)
				{
					$InstanceTypeUser->SetTypeUserDescription($this->InputValueTypeUserDescription);
					$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_USER, $InstanceTypeUser);
					$this->TypeUserLoadData($InstanceTypeUser);
					$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_UPDATE_SUCCESS', 
																					$this->Language);
					return Config::SUCCESS;
				}
				elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
				{
					$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
					return Config::WARNING;
				}
				else
				{
					$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_UPDATE_ERROR', 
																					$this->Language);
					return Config::ERROR;
				}
			}
			else
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}	
		}
	}
	
	protected function UserDeleteByUserEmail(&$InstanceUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $InstanceUser->GetEmail();
		$arrayConstants = array(); $matrixConstants = array();
			
		//VALIDA E-MAIL
		$arrayElements[0]             = Config::FORM_FIELD_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnEmailText;
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
			$return = $instanceFacedePersistence->UserDeleteByUserEmail($this->InputValueUserEmail, $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_ADMIN_USER);
				unset($InstanceUser);
				$this->InputValueUserEmail = "";
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('ADMIN_USER_DELETE_SUCCESS', 
																$this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_USER_DELETE_FAILED_NOT_FOUND)
			{
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('USER_NOT_FOUND', 
																$this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::FORM_USER_RETURN_NOT_FOUND;
			}
			else
			{
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('ADMIN_USER_DELETE_ERROR', 
																$this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return $return;
		}
	}
	
	protected function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->UserSelect($Limit1, $Limit2, $ArrayInstanceUser, $RowCount, $Debug);
		if($return != Config::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('USER_NOT_FOUND', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
		else return Config::SUCCESS;
	}
	
	protected function UserSelectByDepartment($CorporationName, $DepartmentName, $Limit1, $Limit2, 
											 &$ArrayInstanceDepartmentUsers, &$RowCount, $Debug)
	{
		$ArrayInstanceDepartmentUsers = NULL;
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $FacedePersistence->UserSelectByDepartment($DepartmentName, $Limit1, $Limit2,
			                                                 $ArrayInstanceDepartmentUsers, $RowCount, 
															 $Debug);
		if($return == Config::SUCCESS)
		{
			$this->ReturnText  = NULL;
			$this->ReturnClass = NULL;
			$this->ReturnImage = NULL;
			return Config::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_SELECT_USERS_ERROR', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
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
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage 
													. Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_SELECT_BY_HASH_CODE_SUCCESS', $this->Language);
				return $return;
			}
		}
		$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_SELECT_BY_HASH_CODE_ERROR', $this->Language);	
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		return $return;
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
			$return = $FacedePersistence->UserSelectByTeamId($TeamId, $Limit1, $Limit2, $ArrayInstanceUser, $RowCount, $Debug);
			if($return == Config::SUCCESS)
				return Config::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_SELECT_USERS_ERROR', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							       Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
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
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_SELECT_USERS_ERROR', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return Config::ERROR;
		}
	}
	
	protected function UserSelectByUserEmail($UserEmail, &$UserInstance, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail = $UserEmail;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_USER_USER_EMAIL
		$arrayElements[0]             = Config::FORM_FIELD_USER_USER_EMAIL;
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
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage 
													. Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_SELECT_BY_USER_EMAIL_SUCCESS', $this->Language);
				return $return;
			}
		}
		$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_SELECT_BY_USER_EMAIL_ERROR', $this->Language);	
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		return $return;
	}
	
	protected function UserSelectByUserUniqueId($UniqueId, &$UserInstance, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail = $UserEmail;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_USER_USER_UNIQUE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_USER_USER_UNIQUE_ID;
		$arrayElementsClass[0]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
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
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage 
													. Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_SELECT_BY_USER_EMAIL_SUCCESS', $this->Language);
				return $return;
			}
		}
		$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_SELECT_BY_USER_EMAIL_ERROR', $this->Language);	
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		return $return;
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
			$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			if($UserActiveNew)
				$this->ReturnText =	str_replace('[0]',  
								strtolower($this->InstanceLanguageText->GetConstant('ACTIVATED', $this->Language)), 
								$this->InstanceLanguageText->GetConstant('ADMIN_USER_ACTIVATE_SUCCESS', $this->Language));
			else 
				$this->ReturnText = str_replace('[0]', 
								strtolower($this->InstanceLanguageText->GetConstant('DEACTIVATED', $this->Language)), 
								$this->InstanceLanguageText->GetConstant('ADMIN_USER_ACTIVATE_SUCCESS', $this->Language));

			$this->InputFocus = Config::DIV_RETURN;
			return Config::SUCCESS;
		}
		elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
		{
			$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_USER_ACTIVATE_ERROR', $this->Language);		
			return Config::ERROR;
		}
	}
	
	protected function  UserSelectExistsByUserEmail($Captcha, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueCaptcha    = $Captcha;
		$this->InputValueUserEmail  = $UserEmail;
		$this->Session->GetSessionValue(ConfigInfraTools::FORM_FIELD_CAPTCHA, $captcha);
		$arrayConstants = array(); $arrayOptions = array(); $matrixConstants = array();
			
		//VALIDA E-MAIL
		$arrayElements[0]             = Config::FORM_FIELD_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, NULL);
		
		//CAPTCHA
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_CAPTCHA;
		$arrayElementsClass[1]        = &$this->ReturnCaptchaClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_COMPARE_STRING;
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
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_SELECT_EXISTS_BY_USER_EMAIL_SUCCESS', $this->Language);
				return Config::SUCCESS;
			}
			else
			{
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_SELECT_EXISTS_BY_USER_EMAIL_ERROR', $this->Language);
			}
		}
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		return $return;
	}
	
	protected function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $UserEmail;
		$arrayConstants = array(); $matrixConstants = array();
			
		//VALIDA E-MAIL
		$arrayElements[0]             = Config::FORM_FIELD_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnEmailText;
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
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return Config::SUCCESS;
			}
		}
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		return $return;
	}
	
	protected function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug)
	{
		if(isset($HashCode))
		{
			$FacedePersistence = $this->Factory->CreateFacedePersistence();
			return $FacedePersistence->UserSelectUserActiveByHashCode($HashCode, $UserActive, $Debug);
		}
		$this->ReturnText = $this->InstanceLanguageText->GetConstant('REGISTER_CONFIRMATION_SELECT_ERROR', $this->Language);
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage .  Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
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
					$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS 
						                                . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_USER_CHANGE_CORPORATION_SUCCESS', $this->Language);
				}
			}
			if($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_WARNING 
													. "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
			}
			elseif($return != Config::SUCCESS)
			{
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR 
													. "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_USER_CHANGE_CORPORATION_ERROR', 
																				$this->Language);			
			}
			return $return;
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return $return;
		}
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
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							                          Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_UPDATE_USER_PASSWORD_SUCCESS', $this->Language);
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->Page          = Config::PAGE_ACCOUNT_CHANGE_PASSWORD;
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							                          Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_UPDATE_USER_PASSWORD_WARNING', $this->Language);
				return Config::ERROR;
			}
		}			                        Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";			
		$this->ReturnPasswordText = $this->InstanceLanguageText->GetConstant('USER_UPDATE_USER_PASSWORD_ERROR', $this->Language);
		$this->ReturnPasswordClass = Config::FORM_FIELD_ERROR;
		$this->ReturnClass         = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
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
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('PASSWORD_RESET_SUCCESS', $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			}
			else
			{
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('SEND_EMAIL_ERROR', 
																		                $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		else
		{
			$this->ReturnText  = $this->InstanceLanguageText->GetConstant('PASSWORD_RESET_SUCCESS', $this->Language);
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}
	}
	
	protected function UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserConfirmed = $UserConfirmedNew;	
		$arrayConstants = array(); $matrixConstants = array();
			
		//FORM_FIELD_USER_USER_CONFIRMED
		$arrayElements[0]             = Config::FORM_FIELD_USER_USER_CONFIRMED;
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
				$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage 
													. Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_UPDATE_USER_CONFIRMED_SUCCESS', $this->Language);
				return $return;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_WARNING 
												. "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
			}
		}
		$this->ReturnText    = $this->InstanceLanguageText->GetConstant('USER_UPDATE_USER_CONFIRMED_ERROR', $this->Language);	
		$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
		$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
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
					$this->ReturnClass   = Config::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage 
						                                . Config::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_USER_CHANGE_USER_TYPE_SUCCESS', $this->Language);
				}
			}
			if($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = Config::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_WARNING 
													. "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
			}
			elseif($return != Config::SUCCESS)
			{
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR 
													. "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_USER_CHANGE_CORPORATION_ERROR', 
																				$this->Language);			
			}
			return $return;
		}
		else
		{
			$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return $return;
		}
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
					$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant('LOGIN_INVALID_LOGIN', 
																				      $this->Language);
					$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
			}
			else
			{
				$this->ReturnEmptyText = $this->InstanceLanguageText->GetConstant('FILL_REQUIRED_FIELDS', 
																					  $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		elseif(isset($_POST[Config::FORM_LOGIN_TWO_STEP_VERIFICATION_CODE_SUBMIT]))
		{
			if($this->ExecuteLoginSecondPhaseVerirication() == Config::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(Config::SESS_LOGIN_TWO_STEP_VERIFICATION);
				return Config::SUCCESS;	
			}
			else 
			{
				$this->ReturnLoginText = $this->InstanceLanguageText->GetConstant(
																			  'LOGIN_TWO_STEP_VERIFICATION_CODE_ERROR', 
																			  $this->Language);
				$this->ReturnClass = Config::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   Config::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return Config::ERROR;
				$this->Session->RemoveSessionVariable(Config::SESS_LOGIN_TWO_STEP_VERIFICATION);	
				return Config::ERROR;
			}
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
	
	public function IncludeHeadAll($Page)
	{
		$return = NULL;
		if ($Page != NULL)
		{
			echo Config::HTML_TAG_HEAD_START;
			$return = $this->IncludeHeadGeneric();
			if ($return == Config::SUCCESS)
			{
				echo "<!-- HEAD " . $Page . " -->";
				if($this->Device == Page::DEVICE_MOBILE)
				{
					echo'<style>';
					if (strpos($Page, "PageAdmin") !== false)
					{
						if(file_exists(REL_PATH . "Style/Mobile/Generic/MobileAdmin.css"))
							include_once(REL_PATH . "Style/Mobile/Generic/MobileAdmin.css");
					}
					if(file_exists(REL_PATH . "Style/Mobile/Generic/MobileForm.css"))
						include_once(REL_PATH . "Style/Mobile/Generic/MobileForm.css");
					if(file_exists(REL_PATH . "Style/Mobile/Generic/MobileTabs.css"))
						include_once(REL_PATH . "Style/Mobile/Generic/MobileTabs.css");
					if(file_exists(REL_PATH . "Style/Mobile/Body/Mobile" . str_replace("Page", "", $Page) . ".css"))
						include_once(REL_PATH . "Style/Mobile/Body/Mobile" . str_replace("Page", "", $Page)  . ".css");
					echo '</style>';
				}
				else
				{
					echo'<style>';
					if (strpos($Page, "PageAdmin") !== false)
					{
						if(file_exists(REL_PATH . "Style/Desktop/Generic/Admin.css"))
							include_once(REL_PATH . "Style/Desktop/Generic/Admin.css");
					}
					if(file_exists(REL_PATH . "Style/Desktop/Generic/Form.css"))
						include_once(REL_PATH . "Style/Desktop/Generic/Form.css");
					if(file_exists(REL_PATH . "Style/Desktop/Generic/Tabs.css"))
						include_once(REL_PATH . "Style/Desktop/Generic/Tabs.css");
					if(file_exists(REL_PATH . "Style/Desktop/Body/" . str_replace("Page", "", $Page) . ".css"))
						include_once(REL_PATH . "Style/Desktop/Body/" . str_replace("Page", "", $Page) . ".css");
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
	
	public function LoadPageDependencies()
	{
		$return = NULL; $currentDomain = NULL; $language = NULL; $instanceLanguage = NULL;
		$this->CheckPostLanguage();
		$this->Session->GetSessionValue(Config::SESS_LANGUAGE, $this->Language);
		$this->InstanceLanguageText = LanguageInfraTools::__create($this->Language);
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
		$Config = $this->Factory->CreateConfig();
		$this->ReturnLoginText = Config::USER_NOT_CONFIRMED;
		$this->ReturnClass = Config::FORM_BACKGROUND_WARNING;
		$this->ReturnImage   = "<img src='" . $Config->DefaultServerImage . 
				   				Config::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
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
	
	public static function GetPageFileDefaultLanguageByDir($PageDirName)
	{
		if (strpos($PageDirName, str_replace('Language/', '', Config::LANGUAGE_GERMAN)) !== false) 
			return Config::LANGUAGE_GERMAN;
		elseif (strpos($PageDirName, str_replace('Language/', '', Config::LANGUAGE_ENGLISH)) !== false) 
			return Config::LANGUAGE_ENGLISH;
		elseif (strpos($PageDirName, str_replace('Language/', '', Config::LANGUAGE_SPANISH)) !== false) 
			return Config::LANGUAGE_SPANISH;
		elseif (strpos($PageDirName, str_replace('Language/', '', Config::LANGUAGE_PORTUGUESE)) !== false)
			return Config::LANGUAGE_PORTUGUESE;
		else return Config::ERROR;
	}
}
?>