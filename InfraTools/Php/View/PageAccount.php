<?php
/************************************************************************
Class: PageAccount.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class that deals about a user's account information.
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

class PageAccount extends PageInfraTools
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
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = TRUE;
		parent::__construct($Config, $Language, $Page);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	protected function CheckForm()
	{
		//PAGE_CORPORATION
		if (isset($_POST[ConfigInfraTools::ACCOUNT_FM_SB_VERIFIED_CORPORATION]))
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" .
										  str_replace("_", "", ConfigInfraTools::PAGE_CORPORATION));
		}
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_UPDT_SB]))
		{
			$this->PageBody   = ConfigInfraTools::PAGE_ACCOUNT_UPDT;
			$this->InputFocus = ConfigInfraTools::FIELD_USER_NAME;
		}
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_CHANGE_PASSWORD_SB]))
		{
			$this->PageBody = ConfigInfraTools::PAGE_ACCOUNT_CHANGE_PASSWORD;
			$this->InputFocus = ConfigInfraTools::FIELD_PASSWORD_NEW;
			$this->SubmitEnabled = 'disabled="disabled"';
		}
		//PAGE_ACCOUNT_UPDT
		elseif(isset($_POST[ConfigInfraTools::FM_USER_UPDT_SB]))
		{
			 if($this->UserUpdateByUserEmail(@$_POST[ConfigInfraTools::FIELD_USER_BIRTH_DATE_DAY], 
											 @$_POST[ConfigInfraTools::FIELD_USER_BIRTH_DATE_MONTH], 
											 @$_POST[ConfigInfraTools::FIELD_USER_BIRTH_DATE_YEAR],
											 $_POST[ConfigInfraTools::FIELD_COUNTRY_NAME],
											 @$_POST[ConfigInfraTools::FIELD_USER_GENDER],
											 $_POST[ConfigInfraTools::FIELD_USER_NAME],
											 $_POST[ConfigInfraTools::FIELD_USER_REGION],
					  						 @$_POST[ConfigInfraTools::FIELD_USER_SESSION_EXPIRES], 
											 @$_POST[ConfigInfraTools::FIELD_USER_TWO_STEP_VERIFICATION], 
											 @$_POST[ConfigInfraTools::FIELD_USER_ACTIVE], 
											 @$_POST[ConfigInfraTools::FIELD_USER_CONFIRMED],
   										     $_POST[ConfigInfraTools::FIELD_USER_PHONE_PRIMARY], 
											 $_POST[ConfigInfraTools::FIELD_USER_PHONE_PRIMARY_PREFIX], 
											 $_POST[ConfigInfraTools::FIELD_USER_PHONE_SECONDARY],
											 $_POST[ConfigInfraTools::FIELD_USER_PHONE_SECONDARY_PREFIX], 
										     $_POST[ConfigInfraTools::FIELD_USER_UNIQUE_ID], 
											 FALSE,
											 $this->User, 
											 $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			 	$this->PageBody = ConfigInfraTools::PAGE_ACCOUNT;
			 else
			 {
				 if($this->InputValueSessionExpires)
					$this->InputValueSessionExpires = Config::CHECKBOX_CHECKED;
				 if($this->InputValueUserActive)
					$this->InputValueUserActive = Config::CHECKBOX_CHECKED;
				 if($this->InputValueUserConfirmed)
					$this->InputValueUserConfirmed = Config::CHECKBOX_CHECKED;
				 if($this->InputValueTwoStepVerification)
					$this->InputValueTwoStepVerification = Config::CHECKBOX_CHECKED;
				 $this->PageBody = ConfigInfraTools::PAGE_ACCOUNT_UPDT;
			 }
		}
		//PAGE_ACCOUNT_CHANGE_PASSWORD
		elseif(isset($_POST[ConfigInfraTools::FM_ACCOUNT_CHANGE_PASSWORD_SB]))
		{
			if($this->UserUpdatePasswordByUserEmail(NULL, 
												    $_POST[ConfigInfraTools::FIELD_PASSWORD_NEW], 
												    $_POST[ConfigInfraTools::FIELD_PASSWORD_REPEAT],
													$this->User->GetEmail(),
												    $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ACCOUNT;
			else $this->PageBody = ConfigInfraTools::PAGE_ACCOUNT_CHANGE_PASSWORD;
		}
		//FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SB]))
		{
			$this->UserChangeTwoStepVerification(NULL, TRUE, $this->InputValueHeaderDebug);
			$this->PageBody = ConfigInfraTools::PAGE_ACCOUNT;
		}
		//FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SB]))
		{
			$this->UserChangeTwoStepVerification(NULL, FALSE, $this->InputValueHeaderDebug);
			$this->PageBody = ConfigInfraTools::PAGE_ACCOUNT;
		}
	}

	public function LoadPage()
	{
		if(isset($this->User))
		{
			$this->InputValueAssocUserCorporationRegistrationDate = $this->User->GetAssocUserCorporationUserRegistrationDate();
			$this->InputValueAssocUserCorporationRegistrationId = $this->User->GetAssocUserCorporationUserRegistrationId();
			$this->InputValueBirthDateDay = $this->User->GetBirthDateDay();
			$this->InputValueBirthDateMonth = $this->User->GetBirthDateMonth();
			$this->InputValueBirthDateYear = $this->User->GetBirthDateYear();
			$this->InputValueUserCorporationName = $this->User->GetCorporationName();
			if($this->User->GetDepartmentInitials() != NULL)
				$this->InputValueDepartmentName = $this->User->GetDepartmentInitials() . " - " . $this->User->GetDepartmentName();
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
		$this->LoadHtml(TRUE);
	}
}
?>