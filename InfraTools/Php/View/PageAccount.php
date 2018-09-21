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



class PageAccount extends PageInfraTools
{
	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = TRUE;
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

	protected function CheckForm()
	{
		//PAGE_CORPORATION
		if (isset($_POST[ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION]))
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" .
										  str_replace("_", "", ConfigInfraTools::PAGE_CORPORATION));
		}
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_UPDATE_SUBMIT]))
		{
			$this->Page       = ConfigInfraTools::PAGE_ACCOUNT_UPDATE;
			$this->InputFocus = ConfigInfraTools::ACCOUNT_UPDATE_NAME;
		}
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_CHANGE_PASSWORD_SUBMIT]))
		{
			$this->Page = ConfigInfraTools::PAGE_ACCOUNT_CHANGE_PASSWORD;
			$this->InputFocus = ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD;
			$this->SubmitEnabled = 'disabled="disabled"';
		}
		//PAGE_ACCOUNT_UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_UPDATE_SUBMIT]))
		{
			 if($this->UserUpdate(FALSE, $this->User) == ConfigInfraTools::SUCCESS)
			 	$this->Page = ConfigInfraTools::PAGE_ACCOUNT;
			 else $this->Page = ConfigInfraTools::PAGE_ACCOUNT_UPDATE;
		}
		//PAGE_ACCOUNT_CHANGE_PASSWORD
		elseif(isset($_POST[ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT]))
		{
			$PageForm = $this->Factory->CreatePageForm();
			$this->Page = ConfigInfraTools::PAGE_ACCOUNT_CHANGE_PASSWORD;
			$this->InputValueNewPassword     = $_POST[ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD];
			$this->InputValueRepeatPassword  = $_POST[ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD];
			$arrayConstants = array(); $arrayExtraField = array(); $arrayOptions = array(); $matrixConstants = array();
			
			//PASSWORD
			$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_NEW_PASSWORD;
			$arrayElementsClass[0]        = &$this->ReturnPasswordClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_PASSWORD;
			$arrayElementsInput[0]        = $this->InputValueNewPassword; 
			$arrayElementsMinValue[0]     = 8; 
			$arrayElementsMaxValue[0]     = 18; 
			$arrayElementsNullable[0]     = FALSE;
			$arrayElementsText[0]         = &$this->ReturnPasswordText;
			$arrayExtraField[0]           = &$this->InputValueRepeatPassword;
			array_push($arrayConstants, 'ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD', 'ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD_MATCH');
			array_push($arrayConstants, 'ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			
			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
												$matrixConstants, $arrayOptions,
											    $arrayExtraField);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
				$return = $FacedePersistenceInfraTools->UserUpdatePasswordByEmail(
																			$this->User->GetEmail(),
																			$this->InputValueNewPassword,
																			$this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->Page          = ConfigInfraTools::PAGE_ACCOUNT;
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																					 'ACCOUNT_CHANGE_PASSWORD_SUCCESS', 
																					  $this->Language);
				}
				elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
				{
					$this->Page          = ConfigInfraTools::PAGE_ACCOUNT_CHANGE_PASSWORD;
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				}
				else
				{
					$this->Page               = ConfigInfraTools::PAGE_ACCOUNT_CHANGE_PASSWORD;
					$this->ReturnPasswordText = $this->InstanceLanguageText->
												   GetConstant('ACCOUNT_CHANGE_PASSWORD_ERROR', 
																						  $this->Language);
					$this->ReturnPasswordClass = ConfigInfraTools::FORM_FIELD_ERROR;
					$this->ReturnClass         = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
			}
			else
			{
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";			
			}
		}
		//PAGE_ACCOUNT_TWO_STEP_VERIFICATION_ACTIVATE
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE]))
		{
			$this->UserChangeTwoStepVerification(NULL, TRUE);
			$this->Page = ConfigInfraTools::PAGE_ACCOUNT;
		}
		//PAGE_ACCOUNT_TWO_STEP_VERIFICATION_DEACTIVATE
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE]))
		{
			$this->UserChangeTwoStepVerification(NULL, FALSE);
			$this->Page = ConfigInfraTools::PAGE_ACCOUNT;
		}
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
			$loginStatus = $this->CheckInstanceUser();
			if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
			   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
			{
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE 
							          . str_replace("_","",ConfigInfraTools::PAGE_NOT_LOGGED_IN) . ".php");
				$this->InputFocus = ConfigInfraTools::LOGIN_USER;
				echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::LOGIN_FORM, $this->InputFocus);
			}
			else include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . ConfigInfraTools::PATH_FOOTER);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		if(isset($this->User))
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$this->InputValueAssocUserCorporationRegistrationDate = 
				$this->User->GetAssocUserCorporationUserRegistrationDate();
			$this->InputValueAssocUserCorporationRegistrationId = 
				$this->User->GetAssocUserCorporationUserRegistrationId();
			$this->InputValueBirthDateDay = $this->User->GetBirthDateDay();
			$this->InputValueBirthDateMonth = $this->User->GetBirthDateMonth();
			$this->InputValueBirthDateYear = $this->User->GetBirthDateYear();
			$this->InputValueUserCorporationName = $this->User->GetCorporationName();
			if($this->User->GetDepartmentInitials() != NULL)
				$this->InputValueDepartmentName = $this->User->GetDepartmentInitials() 
				                                . " - " . $this->User->GetDepartmentName();
			else
				$this->InputValueDepartmentName       = $this->User->GetDepartmentName();
			$this->InputValueCountry = $this->User->GetCountry();
			$this->InputValueUserEmail = $this->User->GetEmail();
			$this->InputValueGender = $this->User->GetGender();
			$this->InputValueUserName = $this->User->GetName();
			$this->InputValueUserPhonePrimary = $this->User->GetUserPhonePrimary();
			$this->InputValueUserPhonePrimaryPrefix = $this->User->GetUserPhonePrimaryPrefix();
			$this->InputValueUserPhoneSecondary = $this->User->GetUserPhoneSecondary();
			$this->InputValueUserPhoneSecondaryPrefix = $this->User->GetUserPhoneSecondaryPrefix();
			$this->InputValueRegion = $this->User->GetRegion();
			$this->InputValueRegisterDate = $this->User->GetRegisterDate();
			if($this->User->GetArrayAssocUserTeam() != NULL)
			{
				foreach ($this->User->GetArrayAssocUserTeam() as $index=>$assocUserTeam)
				{
					if($index == 0)
						$this->InputValueUserTeam = $assocUserTeam->GetTeamName();
					else $this->InputValueUserTeam .= ", " . $assocUserTeam->GetTeamName();
				}
			}
			$this->InputValueTwoStepVerification = $this->User->GetTwoStepVerification();
			$this->InputValueUserUniqueId = $this->User->GetUserUniqueId();
			$this->EnableFieldTwoStepVerification = TRUE;
			if($this->User->CheckCorporationActive())
				$this->InputValueCorporationActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueCorporationActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($this->User->CheckAssocUserCorporationRegistrationDateActive())
				$this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($this->User->CheckAssocUserCorporationRegistrationIdActive())
				$this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($this->User->CheckDepartmentExists())
				$this->InputValueDepartmentActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueDepartmentActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsNotVerified.png';
			if($this->InputValueUserUniqueId != NULL)
				$this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage .
																'Icons/IconInfraToolsVerified.png';
			else $this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage .
				                                   'Icons/IconInfraToolsNotVerified.png';
			$this->CheckForm();
		}
		$this->LoadHtml();
	}
}
?>