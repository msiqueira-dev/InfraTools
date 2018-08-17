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
	protected $Language                                = NULL;
	public    $ReturnClass                             = "DivHidden";
	public    $ReturnImage                             = "";
	public    $ReturnLoginClass                        = "";
	public    $ReturnLoginText                         = "";
	
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
						if(file_exists(REL_PATH . "Style/Mobile/Generic/MobileInfraToolsAdmin.css"))
							include_once(REL_PATH . "Style/Mobile/Generic/MobileInfraToolsAdmin.css");
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
						if(file_exists(REL_PATH . "Style/Desktop/Generic/InfraToolsAdmin.css"))
							include_once(REL_PATH . "Style/Desktop/Generic/InfraToolsAdmin.css");
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