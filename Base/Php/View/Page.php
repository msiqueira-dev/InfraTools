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
Methods: 
				abstract protected function GetCurrentPage();
				abstract protected function LoadHtml();
				private       function        CheckPostLanguage();
				protected     function        CorporationDelete($CorporationName, $Debug);
				protected     function        CorporationInsert($CorporationActive, $Name, $Debug);
				protected     function        CorporationLoadData(&$InstanceCorporation);
				protected     function        CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug);
				protected     function        CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, 
				                                                      &$RowCount, $Debug)
				protected     function        CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
				protected     function        CorporationSelectByName($CorporationName, &$InstanceCorporation, $Debug);
				protected     function        CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug);
				protected     function        CorporationUpdate($CorporationActive, $CorporationName, &$InstanceCorporation, $Debug);
				public        function        CheckInputImage($Input);
				public        function        GetPageFileDefaultLanguageByDir($DirPath);
				public        function        IncludeHeadAll($Page);
				public        function        IncludeHeadGeneric();
				public        function        IncludeHeadJavaScript();
				public        function        LoadPageDependencies(&$InstanceLanguage, &$Language)
				public        function        RedirectPage($Page);
				public static function        AlertMessage($Message);
				public static function        GetCurrentDomain(&$currentDomain);
				public static function        GetCurrentDomainWithPort(&$currentDomain);
				public static function        GetCurrentURL(&$pageUrl);
				public static function        TagOnloadFocusField($Form, $Field)
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
	protected $InstanceLanguageText = NULL;
	protected $Session              = NULL;
	protected $Factory              = NULL;
	protected $Config               = NULL;
	
	/* Properties */
	protected $Language                                             = NULL;
	public    $InputValueCorporationActive                          = "";
	public    $InputValueCorporationName                            = "";
	public    $InputValueDepartmentActive                           = "";
	public    $InputValueDepartmentInitials                         = "";
	public    $InputValueDepartmentName                             = "";
	public    $InputValueDepartmentNameAndCorporationNameRadio      = "";
	public    $InputValueDepartmentNameRadio                        = "";
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
	
	/* Constructor */
	protected function __construct() 
    {
		$this->Factory = Factory::__create();
		$this->Session = $this->Factory->CreateSession();
		$this->Config = $this->Factory->CreateConfig();
    }
	
	/* Clone */
	public function __clone()
    {
        exit(get_class($this) . ": Error! Clone Not Allowed!");
    }
		
	/* Variaveis de classe */
	protected $ArrayHeadText   = NULL;
	protected $Device          = NULL;
	
	/* Singleton */
	private static $Instance;
	
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
				if(ProjectConfig::$EnableSSL)
				{
					header("Location: https://" . $_SERVER['HTTP_HOST'] . "/" . str_replace('Language/', '', 
												  $_POST[Config::POST_BACK_FORM]) . "/" 
						                        . str_replace("_", "",  $this->GetCurrentPage())); 
				}
				else
				{
					$this->Session->SetSessionValue(Config::SESSION_LANGUAGE, $_POST[Config::POST_BACK_FORM]);
					header("Location: http://$_SERVER[HTTP_HOST]" . "/" . str_replace('Language/', '', 
											 $_POST[Config::POST_BACK_FORM]) . "/" . 
						                     str_replace("_", "", $this->GetCurrentPage()));
				}
			}
		}
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
		return $FacedePersistence->CorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporation, 
															   $RowCount, $Debug);
	}
	
	protected function CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		return $FacedePersistence->CorporationSelectActive($Limit1, $Limit2, $ArrayInstanceCorporation, 
															         $RowCount, $Debug);
	}
	
	protected function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
		return $FacedePersistence->CorporationSelectActiveNoLimit($ArrayInstanceCorporation, 
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
		return $FacedePersistence->CorporationSelectNoLimit($ArrayInstanceCorporation, 
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
			return Config::SUCCESS;
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
	
	public function CheckInputImage($Input)
	{
		if(isset($_POST[$Input . "_x"]) && isset($_POST[$Input . "_y"]))
			return TRUE;
		else FALSE;
	}
	
	public function GetPageFileDefaultLanguageByDir($PageDirName)
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
	
	public function LoadPageDependencies(&$Language)
	{
		$return = NULL; $currentDomain = NULL; $language = NULL; $instanceLanguage = NULL;
		$this->CheckPostLanguage();
		$this->Session->GetSessionValue(Config::SESSION_LANGUAGE, $Language);
		$this->InstanceLanguageText = LanguageInfraTools::__create($Language);
		if($this->InstanceLanguageText != NULL)
			return Config::SUCCESS;
		else return self::ERROR_LANGUAGE_INSTANCE_NOT_CREATED;
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
	
	public static function AlertMessage($Message)
	{
		echo '<script type="text/javascript">alert("' . $Message . '")</script>';
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