<?php
/************************************************************************
Class: PageInfraTools.php
Creation: 03/03/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for user management.
Functions: 
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}

class PageAdminUser extends PageAdmin
{
	/* Instance */
	public    $ArrayInstanceInfraToolsUser = NULL;
	protected $InstanceTypeUser            = NULL;
	
	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		parent::__construct($Config, $Language, $Page);
	}
	
	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_USER_NAME;
		$this->ValidateCaptcha = FALSE;
		$this->EnableFieldSessionExpires = TRUE;
		$this->EnableFieldTwoStepVerification = TRUE;
		$this->EnableFieldUserActive = TRUE;
		$this->EnableFieldUserConfirmed = TRUE;
		$this->ShowTypeUserDescription = TRUE;
		//FORM SUBMIT BACK
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_SUBMIT_BACK) == ConfigInfraTools::SUCCESS)
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//FORM_CORPORATION_SELECT_SUBMIT
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											&$this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->AssocUserCorporationUpdateByUserEmailAndCorporationName(
					                                      @$_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
														  @$_POST[ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY],
					                                      @$_POST[ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH],
					                                      @$_POST[ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR],
					                                      @$_POST[ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID],
					                                      $this->InstanceInfraToolsUserAdmin, 
														  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->InfraToolsUserSelectByUserEmail($this->InstanceInfraToolsUserAdmin->GetEmail(),
												           $this->InstanceInfraToolsUserAdmin, 
														   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				}
				else 
				{
					$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
					$this->DepartmentSelectByCorporationNameNoLimit($this->InstanceInfraToolsUserAdmin->GetCorporationName(), 
					                                                $this->ArrayInstanceDepartment,
																    $this->InputValueHeaderDebug);
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION;
				}
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FORM_USER_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsUserSelect', 
									  array(&$this->ArrayInstanceInfraToolsUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_LIST;
		}
		//USER LIST SELECT TYPE USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT]))
		{
			if($this->TypeUserSelectByTypeUserDescription($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION], 
														  $this->InstanceTypeUser,
														  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FORM_USER_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->InfraToolsUserSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
												      $this->InstanceInfraToolsUserAdmin, 
												      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//FORM_USER_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_REGISTER;
		//FORM_USER_REGISTER_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_REGISTER_SUBMIT]))
		{
			if($this->UserInsert(ConfigInfraTools::APPLICATION_INFRATOOLS,
								 FALSE,
				                 @$_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY], 
								 @$_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH], 
								 @$_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_YEAR],
								 NULL,
								 $_POST[ConfigInfraTools::FORM_FIELD_USER_COUNTRY],
								 $_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
								 @$_POST[ConfigInfraTools::FORM_FIELD_USER_GENDER],
								 NULL,
								 $_POST[ConfigInfraTools::FORM_FIELD_USER_NAME],
								 $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_NEW],
								 $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT],
								 $_POST[ConfigInfraTools::FORM_FIELD_USER_REGION],
					  			 @$_POST[ConfigInfraTools::FORM_FIELD_USER_SESSION_EXPIRES], 
								 @$_POST[ConfigInfraTools::FORM_FIELD_USER_TWO_STEP_VERIFICATION], 
								 @$_POST[ConfigInfraTools::FORM_FIELD_USER_ACTIVE], 
								 @$_POST[ConfigInfraTools::FORM_FIELD_USER_CONFIRMED],
   								 $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY], 
								 $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX], 
								 $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY],
								 $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX], 
								 ConfigInfraTools::TYPE_USER_DEFAULT, 
								 NULL,
								 $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_REGISTER;
		}
		//FORM_USER_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_SELECT) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		//USER SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_SELECT_SUBMIT]))
		{
			if($this->InfraToolsUserSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
												      $this->InstanceInfraToolsUserAdmin, 
												      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		//USER VIEW ACTIVATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_ACTIVATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserUpdateActiveByUserEmail(true, $this->InstanceInfraToolsUserAdmin, $this->InputValueHeaderDebug);
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			}
		}
		//USER VIEW DEACTIVATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_DEACTIVATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserUpdateActiveByUserEmail(false, $this->InstanceInfraToolsUserAdmin, $this->InputValueHeaderDebug);
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			}
		}
		//USER VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_DELETE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->UserDeleteByUserEmail($this->InstanceInfraToolsUserAdmin, 
												$this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
				elseif($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_USER, "InfraToolsUserLoadData", 
										          $this->InstanceInfraToolsUserAdmin) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//FORM_USER_VIEW_RESET_PASSWORD_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_RESET_PASSWORD_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				if($this->UserUpdatePasswordRandomByUserEmail(ConfigInfraTools::APPLICATION_INFRATOOLS,
															  $this->InstanceInfraToolsUserAdmin, 
															  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//FORM_USER_VIEW_CHANGE_CORPORATION_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_CHANGE_CORPORATION_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->InfraToolsCorporationSelectActiveNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
				$this->SubmitEnabled = 'disabled="disabled"';
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_CORPORATION;
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FORM_USER_CHANGE_CORPORATION_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->UserUpdateCorporationByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
					                                   $this->InstanceInfraToolsUserAdmin, 
													   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->InfraToolsUserSelectByUserEmail($this->InstanceInfraToolsUserAdmin->GetEmail(),
												              $this->InstanceInfraToolsUserAdmin, 
														      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				}
				else 
				{
					$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
					$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_CORPORATION;
				}
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FORM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->DepartmentSelectByCorporationNameNoLimit($this->InstanceInfraToolsUserAdmin->GetCorporationName(),
					                                            $this->ArrayInstanceDepartment,
																$this->InputValueHeaderDebug);
				$this->SubmitEnabled = '';
				$this->SubmitClass = 'SubmitEnabled';
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION;
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FORM_USER_VIEW_CHANGE_USER_TYPE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_CHANGE_USER_TYPE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->TypeUserSelectNoLimit($this->ArrayInstanceInfraToolsTypeUser,$this->InputValueHeaderDebug);
				$this->SubmitEnabled = 'disabled="disabled"';
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_USER_TYPE;
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FORM_USER_CHANGE_USER_TYPE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_CHANGE_USER_TYPE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->UserUpdateUserTypeByUserEmail($_POST[Config::FORM_FIELD_TYPE_USER_DESCRIPTION],
											        $this->InstanceInfraToolsUserAdmin,
											        $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->InfraToolsUserSelectByUserEmail($this->InstanceInfraToolsUserAdmin->GetEmail(),
												          $this->InstanceInfraToolsUserAdmin, 
														  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				}
				else 
				{
					$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
					$this->TypeUserSelectNoLimit($this->ArrayInstanceInfraToolsTypeUser, $this->InputValueHeaderDebug);
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_USER_TYPE;
				}
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FORM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->UserChangeTwoStepVerification($this->InstanceInfraToolsUserAdmin, TRUE, $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//FORM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->UserChangeTwoStepVerification($this->InstanceInfraToolsUserAdmin, FALSE, $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//FORM_USER_VIEW_UPDATE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_UPDATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_UPDATE;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//USER VIEW UPDATE CANCEL - USER VIEW CORPORATION CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_UPDATE_CANCEL]) ||
			   isset($_POST[ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_CANCEL]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//FORM_USER_UPDATE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_UPDATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->UserUpdateByUserEmail(@$_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY], 
												@$_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH], 
												@$_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_YEAR],
												$_POST[ConfigInfraTools::FORM_FIELD_USER_COUNTRY],
												@$_POST[ConfigInfraTools::FORM_FIELD_USER_GENDER],
												$_POST[ConfigInfraTools::FORM_FIELD_USER_NAME],
												$_POST[ConfigInfraTools::FORM_FIELD_USER_REGION],
					  						    @$_POST[ConfigInfraTools::FORM_FIELD_USER_SESSION_EXPIRES], 
												@$_POST[ConfigInfraTools::FORM_FIELD_USER_TWO_STEP_VERIFICATION], 
												@$_POST[ConfigInfraTools::FORM_FIELD_USER_ACTIVE], 
												@$_POST[ConfigInfraTools::FORM_FIELD_USER_CONFIRMED],
   										        $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY], 
												$_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX], 
												$_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY],
											    $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX], 
												$_POST[ConfigInfraTools::FORM_FIELD_USER_UNIQUE_ID], 
												TRUE,
												$this->InstanceInfraToolsUserAdmin, 
												$this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_UPDATE;
				$this->InfraToolsUserLoadData($this->InstanceInfraToolsUserAdmin);
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>