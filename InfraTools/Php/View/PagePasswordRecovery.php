<?php
/************************************************************************
Class: PagePasswordRecovy.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			InfraTools - Php/Controller/InfraToolsFacedeBusiness.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for recoverying the user password where it will send a code to the user's email. 
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

class PagePasswordRecovery extends PageInfraTools
{
	/* Instances */
	protected $FacedeBusinessInfraTools = NULL;

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
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_USER_EMAIL;
		Page::GetCurrentURL($pageUrl);
		if(strstr($pageUrl, "?="))
		{
			$email = substr($pageUrl, strrpos($pageUrl, "=")+1);
			if($PageForm->ValidateSpecificField(ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL, $email, NULL, NULL) 
			                                    == ConfigInfraTools::SUCCESS)
				$this->InputValueUserEmail = $email;
		}
		if (isset($_POST[ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT]))
		{
			$return = $this->UserSelectExistsByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_CAPTCHA],
														 $_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL], 
														 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
																							($this->InstanceLanguageText);
				$code = $this->InstanceInfraToolsFacedeBusiness->GenerateRandomCode();
				$this->ReturnText = $this->InstanceInfraToolsFacedeBusiness->SendEmailPasswordRecovery(
					                                      ConfigInfraTools::APPLICATION_INFRATOOLS,
														  $this->InputValueUserEmail,
														  $code, $this->InputValueHeaderDebug);
				if ($this->ReturnText == ConfigInfraTools::SUCCESS)
				{
					$this->Session->SetSessionValue(ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE, $code);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_PASSWORD_RECOVERY, 
															 $this->InputValueUserEmail);
					Page::GetCurrentDomain($domain);
					$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" .
												  str_replace("_", "", ConfigInfraTools::PAGE_PASSWORD_RESET));
				}
				elseif($this->ReturnText == ConfigInfraTools::SEND_EMAIL_ALREADY_SENT)
				{
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																   'PASSWORD_RECOVERY_EMAIL_ALREADY_SENT', 
																	$this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
				else
				{
					$this->ReturnText = $this->InstanceLanguageText->GetConstant(
																   'PASSWORD_RECOVERY_EMAIL_ERROR', 
																	$this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('PASSWORD_RECOVERY_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		$this->CaptchaLoad(ConfigInfraTools::FORM_FIELD_CAPTCHA, $this->InputValueHeaderDebug);
		$this->LoadHtml(FALSE);
	}
}
?>