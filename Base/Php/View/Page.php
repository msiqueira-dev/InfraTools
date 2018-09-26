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
		abstract protected function LoadHtml();
		private       function        CheckPostLanguage();
		private       function        ExecuteLoginFirstPhaseVerification();
		private       function        ExecuteLoginSecondPhaseVerirication();
		private       function        LoadInstanceUser();
		private       function        SendTwoStepVerificationCode($Email, $Name);
		protected     function        CorporationDelete($CorporationName, $Debug);
		protected     function        CorporationInsert($CorporationActive, $Name, $Debug);
		protected     function        CorporationLoadData(&$InstanceCorporation);
		protected     function        CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug);
		protected     function        CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, 
															  &$RowCount, $Debug)
		protected     function        CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
		protected     function        CorporationSelectByName($CorporationName, &$InstanceCorporation, $Debug);
		protected     function        CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug);
		protected     function        CorporationSelectUsers($Limit1, $Limit2, $InstanceCorporation,
											                 &$ArrayInstanceCorporationUsers, &$RowCount, $Debug);
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
		protected     function        TeamLoadData(&$InstanceTeam);
		protected     function        UserSelectByDepartment($CorporationName, $DepartmentName, $Limit1, $Limit2, &$RowCount, Debug);
		public        function        CheckInputImage($Input);
		public        function        CheckInstanceUser();
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
						$this->CheckLogin();
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
	abstract protected function LoadHtml();
	
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
	
	private function ExecuteLoginFirstPhaseVerification()
	{
		$this->InstanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		if (strpos($this->InputValueLoginEmail, '@') !== false) 
		{
			$return = $this->InstanceFacedePersistence->UserCheckPasswordByEmail($this->InputValueLoginEmail, 
					                                                             $this->InputValueLoginPassword, 
																				 $this->InputValueHeaderDebug);
			if($return == Config::SUCCESS)
			{
				$return = $this->InstanceFacedePersistence->UserSelectByEmail($this->InputValueLoginEmail, 
																			  $user, $this->InputValueHeaderDebug);
				if($return == Config::SUCCESS)
					$return = $this->InstanceFacedePersistence->UserSelectTeamByUserEmail($user, $this->InputValueHeaderDebug);
			}
		}
		else
		{
			$return = $this->InstanceFacedePersistence->UserCheckPasswordByUserUniqueId($this->InputValueLoginEmail, 
					                                                                    $this->InputValueLoginPassword, 
																				        $this->InputValueHeaderDebug);
			if($return == Config::SUCCESS)
			{
				$return = $this->InstanceFacedePersistence->UserSelectByUserUniqueId($this->InputValueLoginEmail, 
																			         $user, $this->InputValueHeaderDebug);
				if($return == Config::SUCCESS)
					$return = $this->InstanceFacedePersistence->UserSelectTeamByUserEmail($user,
																				 	  $this->InputValueHeaderDebug);
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
						if($this->SendTwoStepVerificationCode($user->GetEmail(),$user->GetName()) == Config::SUCCESS)
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
	
	private function SendTwoStepVerificationCode($Email, $Name)
	{
		$FacedeBusiness = $this->Factory->CreateFacedeBusiness($this->InstanceLanguageText);
		$code = $FacedeBusiness->GenerateRandomCode();
		$this->Session->SetSessionValue(Config::SESS_LOGIN_TWO_STEP_VERIFICATION,
													$code);
		if($FacedeBusiness->SendEmailLoginTwoStepVerificationCode($Email, $Name, $code, $this->InputValueHeaderDebug) 
		                                                          == Config::SUCCESS)
			return Config::SUCCESS;
		else return Config::ERROR;
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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
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
		if($InstanceCorporation != NULL)
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
		return $instanceFacedePersistence->CorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporation, 
															   $RowCount, $Debug);
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
											$matrixConstants, $arrayOptions);
		if($return == Config::SUCCESS)
		{
			$return = $instanceFacedePersistence->CorporationSelectByName($CorporationName,
																		  $InstanceCorporation, 
																		  $Debug);
			if($return == Config::SUCCESS)
			{
				$this->Session->SetSessionValue(Config::SESS_ADMIN_CORPORATION, $InstanceCorporation);
				return $return;
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
	
	protected function CorporationSelectUsers($Limit1, $Limit2, $InstanceCorporation,
											  &$ArrayInstanceCorporationUsers, &$RowCount, $Debug)
	{
		$ArrayInstanceCorporationUsers = NULL;
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $instanceFacedePersistence->UserSelectByCorporation($InstanceCorporation->GetCorporationName(),
			                                                          $Limit1, $Limit2,
			                                                          $ArrayInstanceCorporationUsers, 
																	  $RowCount, $Debug);
		if($return == Config::SUCCESS)
		{
			$this->ReturnText = NULL;
			$this->ReturnClass = NULL;
			$this->ReturnImage = NULL;
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
												$matrixConstants, $arrayOptions);

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
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
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
		if($InstanceDepartment != NULL)
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
											$matrixConstants, $arrayOptions);
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
											$matrixConstants, $arrayOptions);
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
											$matrixConstants, $arrayOptions);
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
																		             $InstanceDepartment, 
																		             $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, $InstanceDepartment);
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
	
	protected function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug)
	{
		$FacedePersistence = $this->Factory->CreateFacedePersistence();
		$return = $FacedePersistence->DepartmentSelectNoLimit($ArrayInstanceDepartment, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText  = NULL;
			$this->ReturnClass = NULL;
			$this->ReturnImage = NULL;
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
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
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
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
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
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
	
	protected function TeamLoadData(&$InstanceTeam)
	{
		if($InstanceTeam != NULL)
		{
			$this->InputValueTeamId           = $InstanceTeam->GetTeamId();
			$this->InputValueTeamDescription  = $InstanceTeam->GetTeamDescription();
			$this->InputValueTeamName         = $InstanceTeam->GetTeamName();
			$this->InputValueRegisterDate     = $InstanceTeam->GetRegisterDate();
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::ERROR;
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
	
	public function CheckLogin()
	{
		if (isset($_POST[Config::LOGIN_FORM_SUBMIT]))
		{
			$this->InputValueLoginEmail     = $_POST[Config::LOGIN_USER];
			$this->InputValueLoginPassword  = $_POST[Config::LOGIN_PASSWORD];
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