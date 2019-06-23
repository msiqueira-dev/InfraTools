<?php
/************************************************************************
Class: PageInfraTools.php
Creation: 2016/03/03
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for user management.
Functions: 
			protected function BuildSmartyTags();
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

	protected function BuildSmartyTags()
	{
		if(parent::BuildSmartyTags() == ConfigInfraTools::RET_OK)
		{
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_TYPE_USER", array($this->ArrayInstanceInfraToolsTypeUser));
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_USER", array($this->ArrayInstanceInfraToolsUser));
			$this->Smarty->assign('FM_TYPE_USER', ConfigInfraTools::FM_TYPE_USER);
			$this->Smarty->assign('FM_TYPE_USER_LST', ConfigInfraTools::FM_TYPE_USER_LST);
			$this->Smarty->assign('FM_TYPE_USER_LST_BACK', ConfigInfraTools::FM_TYPE_USER_LST_BACK);
			$this->Smarty->assign('FM_TYPE_USER_LST_FORWARD', ConfigInfraTools::FM_TYPE_USER_LST_FORWARD);
			$this->Smarty->assign('FM_TYPE_USER_LST_FORM', ConfigInfraTools::FM_TYPE_USER_LST_FORM);
			$this->Smarty->assign('FM_TYPE_USER_SEL', ConfigInfraTools::FM_TYPE_USER_SEL);
			$this->Smarty->assign('FM_TYPE_USER_SEL_FORM', ConfigInfraTools::FM_TYPE_USER_SEL_FORM);
			$this->Smarty->assign('FM_TYPE_USER_REGISTER', ConfigInfraTools::FM_TYPE_USER_REGISTER);
			$this->Smarty->assign('FM_TYPE_USER_REGISTER_CANCEL', ConfigInfraTools::FM_TYPE_USER_REGISTER_CANCEL);
			$this->Smarty->assign('FM_TYPE_USER_REGISTER_FORM', ConfigInfraTools::FM_TYPE_USER_REGISTER_FORM);
			$this->Smarty->assign('FM_TYPE_USER_REGISTER_SB', ConfigInfraTools::FM_TYPE_USER_REGISTER_SB);
			$this->Smarty->assign('FM_TYPE_USER_UPDT_CANCEL', ConfigInfraTools::FM_TYPE_USER_UPDT_CANCEL);
			$this->Smarty->assign('FM_TYPE_USER_UPDT_FORM', ConfigInfraTools::FM_TYPE_USER_UPDT_FORM);
			$this->Smarty->assign('FM_TYPE_USER_UPDT_SB', ConfigInfraTools::FM_TYPE_USER_UPDT_SB);
			$this->Smarty->assign('FM_TYPE_USER_VIEW_DEL', ConfigInfraTools::FM_TYPE_USER_VIEW_DEL);
			$this->Smarty->assign('FM_TYPE_USER_VIEW_DEL_SB', ConfigInfraTools::FM_TYPE_USER_VIEW_DEL_SB);
			$this->Smarty->assign('FM_TYPE_USER_VIEW_UPDT', ConfigInfraTools::FM_TYPE_USER_VIEW_UPDT);
			$this->Smarty->assign('FM_TYPE_USER_VIEW_UPDT_SB', ConfigInfraTools::FM_TYPE_USER_VIEW_UPDT_SB);
			$this->Smarty->assign('FM_TYPE_USER_VIEW_LST_USERS', ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS);
			$this->Smarty->assign('FM_TYPE_USER_VIEW_LST_USERS_FORM', ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_FORM);
			$this->Smarty->assign('FM_TYPE_USER_VIEW_LST_USERS_SB', ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_SB);
			$this->Smarty->assign('FM_TYPE_USER_VIEW_LST_USERS_SB_BACK', ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_SB_BACK);
			$this->Smarty->assign('FM_TYPE_USER_VIEW_LST_USERS_SB_FORWARD', ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_SB_FORWARD);
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;
	}
	
	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->InputFocus = ConfigInfraTools::FIELD_USER_NAME;
		$this->ValidateCaptcha = FALSE;
		$this->EnableFieldSessionExpires = TRUE;
		$this->EnableFieldTwoStepVerification = TRUE;
		$this->EnableFieldUserActive = TRUE;
		$this->EnableFieldUserConfirmed = TRUE;
		$this->ShowTypeUserDescription = TRUE;
		$this->AdminGoBack($PageFormBack);
		
		//FM_CORPORATION_SEL_SB
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
											&$this->InstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FM_USER_CHANGE_ASSOC_USER_CORPORATION_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				if($this->AssocUserCorporationUpdateByUserEmailAndCorporationName(
					                                      @$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
														  @$_POST[ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY],
					                                      @$_POST[ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH],
					                                      @$_POST[ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR],
					                                      @$_POST[ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID],
					                                      $this->InstanceUserAdmin, 
														  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					if($this->InfraToolsUserSelectByUserEmail($this->InstanceUserAdmin->GetEmail(),
												           $this->InstanceUserAdmin, 
														   $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				}
				else 
				{
					$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
					$this->DepartmentSelectByCorporationNameNoLimit($this->InstanceUserAdmin->GetCorporationName(), 
					                                                $this->ArrayInstanceInfraToolsDepartment,
																    $this->InputValueHeaderDebug);
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION;
				}
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FM_USER_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_USER_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsUserSelect', 
									  array(&$this->ArrayInstanceInfraToolsUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_LST;
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
									        &$this->ArrayInstanceInfraToolsTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					
					if(count($this->ArrayInstanceInfraToolsTypeUser) == 1)
					{
						$this->InstanceInfraToolsTypeUser = array_pop($this->ArrayInstanceInfraToolsTypeUser);
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
														$this->InstanceInfraToolsTypeUser) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
					}
				}
		}
		//FM_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->InfraToolsUserSelectByUserEmail($_POST[ConfigInfraTools::FIELD_USER_EMAIL],
												      $this->InstanceUserAdmin, 
												      $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		}
		//FM_USER_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_USER_REGISTER) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_REGISTER;
		//FM_USER_REGISTER_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_REGISTER_SB]))
		{
			if($this->UserInsert(ConfigInfraTools::APPLICATION_INFRATOOLS,
								 FALSE,
				                 @$_POST[ConfigInfraTools::FIELD_USER_BIRTH_DATE_DAY], 
								 @$_POST[ConfigInfraTools::FIELD_USER_BIRTH_DATE_MONTH], 
								 @$_POST[ConfigInfraTools::FIELD_USER_BIRTH_DATE_YEAR],
								 NULL,
								 $_POST[ConfigInfraTools::FIELD_COUNTRY_NAME],
								 $_POST[ConfigInfraTools::FIELD_USER_EMAIL],
								 @$_POST[ConfigInfraTools::FIELD_USER_GENDER],
								 NULL,
								 $_POST[ConfigInfraTools::FIELD_USER_NAME],
								 $_POST[ConfigInfraTools::FIELD_PASSWORD_NEW],
								 $_POST[ConfigInfraTools::FIELD_PASSWORD_REPEAT],
								 $_POST[ConfigInfraTools::FIELD_USER_REGION],
					  			 @$_POST[ConfigInfraTools::FIELD_USER_SESSION_EXPIRES], 
								 @$_POST[ConfigInfraTools::FIELD_USER_TWO_STEP_VERIFICATION], 
								 @$_POST[ConfigInfraTools::FIELD_USER_ACTIVE], 
								 @$_POST[ConfigInfraTools::FIELD_USER_CONFIRMED],
   								 $_POST[ConfigInfraTools::FIELD_USER_PHONE_PRIMARY], 
								 $_POST[ConfigInfraTools::FIELD_USER_PHONE_PRIMARY_PREFIX], 
								 $_POST[ConfigInfraTools::FIELD_USER_PHONE_SECONDARY],
								 $_POST[ConfigInfraTools::FIELD_USER_PHONE_SECONDARY_PREFIX], 
								 ConfigInfraTools::TYPE_USER_DEFAULT, 
								 NULL,
								 $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_REGISTER;
		}
		//FM_USER_SEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_USER_SEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		//FM_USER_SEL_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_SEL_SB]))
		{
			if($this->InfraToolsUserSelectByUserEmail($_POST[ConfigInfraTools::FIELD_USER_EMAIL],
												      $this->InstanceUserAdmin, 
												      $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		//FM_USER_VIEW_ACTIVATE_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_ACTIVATE_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->UserUpdateActiveByUserEmail(true, $this->InstanceUserAdmin, $this->InputValueHeaderDebug);
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			}
		}
		//FM_USER_VIEW_DEACTIVATE_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_DEACTIVATE_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->UserUpdateActiveByUserEmail(false, $this->InstanceUserAdmin, $this->InputValueHeaderDebug);
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			}
		}
		//FM_USER_VIEW_DEL_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_DEL_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				if($this->UserDeleteByUserEmail($this->InstanceUserAdmin, 
												$this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
				elseif($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_USER, "InfraToolsUserLoadData", 
										          $this->InstanceUserAdmin) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		}
		//FM_USER_VIEW_RESET_PASSWORD_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_RESET_PASSWORD_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				if($this->UserUpdatePasswordRandomByUserEmail(ConfigInfraTools::APPLICATION_INFRATOOLS,
															  $this->InstanceUserAdmin, 
															  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		}
		//FM_USER_VIEW_CHANGE_CORPORATION_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_CHANGE_CORPORATION_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				$this->InfraToolsCorporationSelectActiveNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
				$this->SubmitEnabled = 'disabled="disabled"';
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_CORPORATION;
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FM_USER_CHANGE_CORPORATION_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_CHANGE_CORPORATION_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				if($this->UserUpdateCorporationByUserEmail($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
					                                   $this->InstanceUserAdmin, 
													   $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					if($this->InfraToolsUserSelectByUserEmail($this->InstanceUserAdmin->GetEmail(),
												              $this->InstanceUserAdmin, 
														      $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				}
				else 
				{
					$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
					$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_CORPORATION;
				}
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				$this->DepartmentSelectByCorporationNameNoLimit($this->InstanceUserAdmin->GetCorporationName(),
					                                            $this->ArrayInstanceInfraToolsDepartment,
																$this->InputValueHeaderDebug);
				$this->SubmitEnabled = '';
				$this->SubmitClass = 'SubmitEnabled';
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION;
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FM_USER_VIEW_CHANGE_USER_TYPE_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_CHANGE_USER_TYPE_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				$this->TypeUserSelectNoLimit($this->ArrayInstanceInfraToolsTypeUser,$this->InputValueHeaderDebug);
				$this->SubmitEnabled = 'disabled="disabled"';
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_USER_TYPE;
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FM_USER_CHANGE_USER_TYPE_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_CHANGE_USER_TYPE_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				if($this->UserUpdateUserTypeByUserEmail($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
											        $this->InstanceUserAdmin,
											        $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					if($this->InfraToolsUserSelectByUserEmail($this->InstanceUserAdmin->GetEmail(),
												          $this->InstanceUserAdmin, 
														  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				}
				else 
				{
					$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
					$this->TypeUserSelectNoLimit($this->ArrayInstanceInfraToolsTypeUser, $this->InputValueHeaderDebug);
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_USER_TYPE;
				}
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				$this->UserChangeTwoStepVerification($this->InstanceUserAdmin, TRUE, $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		}
		//FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				$this->UserChangeTwoStepVerification($this->InstanceUserAdmin, FALSE, $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		}
		//FM_USER_VIEW_UPDT_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_VIEW_UPDT_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_UPDT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		}
		//FM_USER_UPDT_CANCEL - FM_USER_CHANGE_CORPORATION_CANCEL
		elseif(isset($_POST[ConfigInfraTools::FM_USER_UPDT_CANCEL]) ||
			   isset($_POST[ConfigInfraTools::FM_USER_CHANGE_CORPORATION_CANCEL]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
			{
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		}
		//FM_USER_UPDT_SB
		elseif(isset($_POST[ConfigInfraTools::FM_USER_UPDT_SB]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceUserAdmin);
			if($this->InstanceUserAdmin != NULL)
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
												TRUE,
												$this->InstanceUserAdmin, 
												$this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				else
				{
					if($this->InputValueUserSessionExpires)
						$this->InputValueUserSessionExpires = Config::CHECKBOX_CHECKED;
					if($this->InputValueUserActive)
						$this->InputValueUserActive = Config::CHECKBOX_CHECKED;
					if($this->InputValueUserConfirmed)
						$this->InputValueUserConfirmed = Config::CHECKBOX_CHECKED;
					if($this->InputValueUserTwoStepVerification)
						$this->InputValueUserTwoStepVerification = Config::CHECKBOX_CHECKED;
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_UPDT;
				}
				$this->InfraToolsUserLoadData($this->InstanceUserAdmin);
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		}
		else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_SEL;
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>