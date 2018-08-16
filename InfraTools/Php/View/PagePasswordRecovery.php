<?php
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
	public function __construct() 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct();
	}

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}
	
	protected function LoadCaptcha()
	{
		$InstanceBaseCaptcha = $this->Factory->CreateCaptcha();
		$stringCaptcha = $InstanceBaseCaptcha->GenerateRandomString();
		$this->Session->SetSessionValue(ConfigInfraTools::FORM_CAPTCHA_PASSWORD_RECOVERY, $stringCaptcha);
	}

	protected function LoadHtml()
	{
		$return = NULL;
		echo ConfigInfraTools::HTML_TAG_DOCTYPE;
		echo ConfigInfraTools::HTML_TAG_START;
		$return = $this->IncludeHeadAll(basename(__FILE__, '.php'));
		if ($return == ConfigInfraTools::SUCCESS)
		{
			echo ConfigInfraTools::HTML_TAG_BODY_START;
			echo "<div class='Wrapper'>";
			include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . ".php");
			include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . ConfigInfraTools::PATH_FOOTER);
			echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::PASSWORD_RECOVERY_FORM, $this->InputFocus);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_EMAIL;
		Page::GetCurrentURL($pageUrl);
		if(strstr($pageUrl, "?="))
		{
			$PageForm = $this->Factory->CreatePageForm();
			$email = substr($pageUrl, strrpos($pageUrl, "=")+1);
			if($PageForm->ValidateSpecificField(ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL, $email, NULL, NULL) 
			                                    == ConfigInfraTools::SUCCESS)
				$this->InputValueUserEmail = $email;
		}
		if (isset($_POST[ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT]))
		{
			$this->InputValueUserEmail     = $_POST[ConfigInfraTools::FORM_FIELD_EMAIL];
			$this->InputValueCaptcha   = $_POST[ConfigInfraTools::FORM_CAPTCHA_PASSWORD_RECOVERY];
			$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::FORM_CAPTCHA_PASSWORD_RECOVERY, $captcha);
			$arrayConstants = array(); $arrayOptions = array(); $matrixConstants = array();
			
			//EMAIL
			$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_EMAIL;
			$arrayElementsClass[0]        = &$this->ReturnEmailClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
			$arrayElementsInput[0]        = $this->InputValueUserEmail; 
			$arrayElementsMinValue[0]     = 0; 
			$arrayElementsMaxValue[0]     = 45; 
			$arrayElementsNullable[0]     = FALSE;
			$arrayElementsText[0]         = &$this->ReturnEmailText;
			array_push($arrayConstants, 'PASSWORD_RECOVERY_INVALID_EMAIL',
										'PASSWORD_RECOVERY_INVALID_EMAIL_SIZE');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			
			//CAPTCHA
			$arrayElements[1]             = ConfigInfraTools::FORM_CAPTCHA_PASSWORD_RECOVERY;
			$arrayElementsClass[1]        = &$this->ReturnCaptchaClass;
			$arrayElementsDefaultValue[1] = ""; 
			$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_COMPARE_STRING;
			$arrayElementsInput[1]        = $this->InputValueCaptcha; 
			$arrayElementsMinValue[1]     = 0; 
			$arrayElementsMaxValue[1]     = 0; 
			$arrayElementsNullable[1]     = FALSE;
			$arrayElementsText[1]         = &$this->ReturnCaptchaText;
			array_push($arrayConstants, 'PASSWORD_RECOVERY_INVALID_CAPTCHA');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, $captcha);
			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
												$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
												$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
												$matrixConstants, $arrayOptions);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
				$return = $FacedePersistenceInfraTools->UserCheckEmail($this->InputValueUserEmail, $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
						                                                                        ($this->InstanceLanguageText);
					$code = $this->InstanceInfraToolsFacedeBusiness->GenerateRandomCode();
					$this->ReturnText = $this->InstanceInfraToolsFacedeBusiness->SendEmailPasswordRecovery(
															  $this->InputValueUserEmail,
															  $code, $this->InputValueHeaderDebug);
					if ($this->ReturnText == ConfigInfraTools::SUCCESS)
					{
						$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::PASSWORD_RESET_CODE, $code);
						$this->InstanceBaseSession->SetSessionValue(ConfigInfraTools::PASSWORD_RECOVERY_EMAIL_SESSION, 
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
					$this->ReturnText = $this->InstanceLanguageText->GetConstant(
																			'PASSWORD_RECOVERY_EMAIL_NOT_FOUND', 
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
		$this->LoadCaptcha();
		$this->LoadHtml();
	}
}
?>