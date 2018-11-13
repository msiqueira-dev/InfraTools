<?php
/************************************************************************
Class: PagePasswordRecovy.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
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
	public static function __create($Page, $Language)
	{
		$class = __CLASS__;
		return new $class($Page, $Language);
	}
	
	/* Constructor */
	protected function __construct($Page, $Language) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = FALSE;
		parent::__construct($Page, $Language);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE;
		$this->Session->GetSessionValue(ConfigInfraTools::SESS_PASSWORD_RECOVERY, $this->InputValueUserEmail);
		$this->Session->GetSessionValue(ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE, $code);
		if($this->InputValueUserEmail == NULL || $code == NULL)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_HOME));
			exit(ConfigInfraTools::ERROR);
		}
		if (isset($_POST[ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT]))
		{
			$this->UserUpdatePasswordByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE], 
												 $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_NEW], 
												 $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT], 
												 $this->InputValueUserEmail, 
												 $this->InputValueHeaderDebug);
		}
		$this->LoadHtml(FALSE);
	}
}
?>