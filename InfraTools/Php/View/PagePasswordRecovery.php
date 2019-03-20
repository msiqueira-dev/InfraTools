<?php
/************************************************************************
Class: PagePasswordRecovy.php
Creation: 2016/09/30
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/Controller/InfraToolsFacedeBusiness.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for recoverying the user password where it will send a code to the user's email. 
Functions: 
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("InfraToolsFacedeBusiness"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedeBusiness.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedeBusiness.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedeBusiness');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PagePasswordRecovery extends PageInfraTools
{
	/* Instances */
	protected $FacedeBusinessInfraTools = NULL;
	
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
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputFocus = ConfigInfraTools::FIELD_USER_EMAIL;
		Page::GetCurrentURL($pageUrl);
		if(strstr($pageUrl, "?="))
		{
			$email = substr($pageUrl, strrpos($pageUrl, "=")+1);
			if($PageForm->ValidateSpecificField(ConfigInfraTools::FM_VALIDATE_FUNCTION_EMAIL, $email, NULL, NULL) 
			                                    == ConfigInfraTools::RET_OK)
				$this->InputValueUserEmail = $email;
		}
		if (isset($_POST[ConfigInfraTools::FM_PASSWORD_RECOVERY_SB]))
		{
			$return = $this->UserSelectExistsByUserEmail($_POST[ConfigInfraTools::FIELD_CAPTCHA],
														 $_POST[ConfigInfraTools::FIELD_USER_EMAIL], 
														 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
																							($this->InstanceLanguageText);
				$code = $this->InstanceInfraToolsFacedeBusiness->GenerateRandomCode();
				$this->ReturnText = $this->InstanceInfraToolsFacedeBusiness->SendEmailPasswordRecovery(
					                                      ConfigInfraTools::APPLICATION_INFRATOOLS,
														  $this->InputValueUserEmail,
														  $code, $this->InputValueHeaderDebug);
				if ($this->ReturnText == ConfigInfraTools::RET_OK)
				{
					$this->Session->SetSessionValue(ConfigInfraTools::FIELD_PASSWORD_RESET_CODE, $code);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_PASSWORD_RECOVERY, 
															 $this->InputValueUserEmail);
					Page::GetCurrentDomain($domain);
					$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" .
												  str_replace("_", "", ConfigInfraTools::PAGE_PASSWORD_RESET));
				}
				elseif($this->ReturnText == ConfigInfraTools::SEND_EMAIL_ALREADY_SENT)
					$this->ShowDivReturnError("PASSWORD_RECOVERY_EMAIL_ALREADY_SENT");
				else $this->ShowDivReturnError("PASSWORD_RECOVERY_EMAIL_ERROR");
			}
			else $this->ShowDivReturnError("PASSWORD_RECOVERY_ERROR");
		}
		$this->CaptchaLoad(ConfigInfraTools::FIELD_CAPTCHA, $this->InputValueHeaderDebug);
		$this->LoadHtml(FALSE);
	}
}
?>