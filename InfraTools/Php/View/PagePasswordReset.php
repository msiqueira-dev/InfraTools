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
			public    function GetCurrentPage();
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
	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = FALSE;
		parent::__construct($Language);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE;
		$this->Session->GetSessionValue(ConfigInfraTools::PASSWORD_RECOVERY_EMAIL_SESSION, $this->SessionUserEmail);
		$this->Session->GetSessionValue(ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE, $code);
		if($this->SessionUserEmail == NULL || $code == NULL)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_HOME));
			exit(ConfigInfraTools::ERROR);
		}
		if (isset($_POST[ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT]))
		{
			$this->UserUpdatePasswordByUserEmail($ResetCode, $UserPasswordNew, $UserPasswordNewRepeat, $InstanceUser, 
												$this->InputValueHeaderDebug);
		}
		$this->LoadHtml(FALSE);
	}
}
?>