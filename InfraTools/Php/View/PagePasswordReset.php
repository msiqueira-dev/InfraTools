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
			$this->InputValueNewPassword       = $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_NEW];
			$this->InputValueRepeatPassword    = $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT];
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
			$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_PASSWORD_NEW;
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
												$arrayOptions, $this->InputValueHeaderDebug, $arrayExtraField);
			//VALIDAÇÂO FORMULÁRIO DE ERRO
			if($return == ConfigInfraTools::SUCCESS)
			{
				$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
				$return = $FacedePersistenceInfraTools->UserUpdatePasswordByUserEmail($this->SessionUserEmail, 
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
		$this->LoadHtml(FALSE);
	}
}
?>