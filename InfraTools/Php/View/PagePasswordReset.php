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

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
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
			echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::PASSWORD_RESET_FORM, $this->InputFocus);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::PASSWORD_RESET_CODE;
		$this->Session->GetSessionValue(ConfigInfraTools::PASSWORD_RECOVERY_EMAIL_SESSION, $this->SessionUserEmail);
		$this->Session->GetSessionValue(ConfigInfraTools::PASSWORD_RESET_CODE, $code);
		if($this->SessionUserEmail == NULL || $code == NULL)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_HOME));
			exit(ConfigInfraTools::ERROR);
		}
		if (isset($_POST[ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT]))
		{
			$this->InputValueCode              = $_POST[ConfigInfraTools::PASSWORD_RESET_CODE];
			$this->InputValueNewPassword       = $_POST[ConfigInfraTools::PASSWORD_RESET_NEW_PASSWORD];
			$this->InputValueRepeatPassword    = $_POST[ConfigInfraTools::PASSWORD_RESET_REPEAT_PASSWORD];
			$arrayConstants = array(); $arrayExtraField = array(); $arrayOptions = array(); $matrixConstants = array();
			
			//RESET_CODE
			$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_EMAIL;
			$arrayElementsClass[0]        = &$this->ReturnCodeClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_COMPARE_STRING;
			$arrayElementsInput[0]        = $this->InputValueCode; 
			$arrayElementsMinValue[0]     = 0; 
			$arrayElementsMaxValue[0]     = 0; 
			$arrayElementsNullable[0]     = FALSE;
			$arrayElementsText[0]         = &$this->ReturnCodeText;
			array_push($arrayConstants, 'PASSWORD_RESET_INVALID_CODE');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, $code);
			
			//PASSWORD
			$arrayElements[1]             = ConfigInfraTools::PASSWORD_RESET_NEW_PASSWORD;
			$arrayElementsClass[1]        = &$this->ReturnPasswordClass;
			$arrayElementsDefaultValue[1] = ""; 
			$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_PASSWORD;
			$arrayElementsInput[1]        = $this->InputValueNewPassword; 
			$arrayElementsMinValue[1]     = 8; 
			$arrayElementsMaxValue[1]     = 18; 
			$arrayElementsNullable[1]     = FALSE;
			$arrayElementsText[1]         = &$this->ReturnPasswordText;
			array_push($arrayConstants, 'PASSWORD_RESET_INVALID_PASSWORD');
			array_push($arrayConstants, 'PASSWORD_RESET_INVALID_PASSWORD_MATCH');
			array_push($arrayConstants, 'PASSWORD_RESET_INVALID_PASSWORD_SIZE');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			$arrayExtraField[1]          = &$this->InputValueRepeatPassword;
			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
												$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
												$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, 
												$arrayOptions, $arrayExtraField);
			//VALIDAÇÂO FORMULÁRIO DE ERRO
			if($return == ConfigInfraTools::SUCCESS)
			{
				$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
				$return = $FacedePersistenceInfraTools->UserUpdatePasswordByEmail($this->SessionUserEmail, 
																						  $this->InputValueNewPassword,
																						  $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->Session->RemoveSessionVariable(ConfigInfraTools::PASSWORD_RESET_CODE);
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																				 'PASSWORD_RESET_SUCCESS', 
																				 $this->Language);
				}
				elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
				{
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																				 'PASSWORD_RESET_WARNING', 
																				 $this->Language);
				}
				else
				{
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																				 'PASSWORD_RESET_ERROR', 
																				  $this->Language);
				}
			}
			else
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																				 'PASSWORD_RESET_ERROR', 
																				  $this->Language);
			}
		}
		$this->LoadHtml();
	}
}
?>