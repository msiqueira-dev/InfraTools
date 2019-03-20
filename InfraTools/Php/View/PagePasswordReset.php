<?php
/************************************************************************
Class: PagePasswordRecovy.php
Creation: 2016/09/30
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for reseting a user password where a code was sent to his e-mail and will be prompt. 
Functions: 
			public    function LoadPage();
			
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PagePasswordReset extends PageInfraTools
{
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
		$this->PageCheckLogin = FALSE;
		parent::__construct($Config, $Language, $Page);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::FIELD_PASSWORD_RESET_CODE;
		$this->Session->GetSessionValue(ConfigInfraTools::SESS_PASSWORD_RECOVERY, $this->InputValueUserEmail);
		$this->Session->GetSessionValue(ConfigInfraTools::FIELD_PASSWORD_RESET_CODE, $code);
		if($this->InputValueUserEmail == NULL || $code == NULL)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_HOME));
			exit(ConfigInfraTools::RET_ERROR);
		}
		if (isset($_POST[ConfigInfraTools::FM_PASSWORD_RESET_SB]))
		{
			$this->UserUpdatePasswordByUserEmail($_POST[ConfigInfraTools::FIELD_PASSWORD_RESET_CODE], 
												 $_POST[ConfigInfraTools::FIELD_PASSWORD_NEW], 
												 $_POST[ConfigInfraTools::FIELD_PASSWORD_REPEAT], 
												 $this->InputValueUserEmail, 
												 $this->InputValueHeaderDebug);
		}
		$this->LoadHtml(FALSE);
	}
}
?>