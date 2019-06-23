<?php
/************************************************************************
Class: PageAdminDepartment.php
Creation: 2018/02/28
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for department management.
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

class PageAdminDepartment extends PageAdmin
{
	public    $ArrayInstanceInfraToolsDepartment  = NULL;
	protected $ArrayInstanceInfraToolsUser        = NULL;
	protected $InputValueCorporationNameHidden    = "Hidden";
	protected $InputValueDepartmentInitialsHidden = "Hidden";
	protected $InputValueDepartmentNameHidden     = "NotHidden";
	
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
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_CORPORATION", array($this->ArrayInstanceInfraToolsCorporation));
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_DEPARTMENT", array($this->ArrayInstanceInfraToolsDepartment));
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_USER", array($this->ArrayInstanceInfraToolsUser));
			$this->Smarty->assign('DIV_RADIO_CORPORATION_NAME', ConfigInfraTools::DIV_RADIO_CORPORATION_NAME);
			$this->Smarty->assign('DIV_RADIO_DEPARTMENT_INITIALS', ConfigInfraTools::DIV_RADIO_DEPARTMENT_INITIALS);
			$this->Smarty->assign('DIV_RADIO_DEPARTMENT_NAME', ConfigInfraTools::DIV_RADIO_DEPARTMENT_NAME);
			$this->Smarty->assign('FIELD_DEPARTMENT_INITIALS', ConfigInfraTools::FIELD_DEPARTMENT_INITIALS);
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT', ConfigInfraTools::FIELD_RADIO_DEPARTMENT);
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_INITIALS', ConfigInfraTools::FIELD_RADIO_DEPARTMENT_INITIALS);
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_INITIALS_VALUE', $this->InputValueDepartmentInitialsRadio);
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_NAME', ConfigInfraTools::FIELD_RADIO_DEPARTMENT_NAME);
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_NAME_VALUE', $this->InputValueDepartmentNameRadio);
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME', ConfigInfraTools::FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME);
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME_TEXT', $this->InstanceLanguageText->GetText('FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME'));
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME_VALUE', $this->InputValueDepartmentInitialsAndCorporationNameRadio);
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME', ConfigInfraTools::FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME);
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME_TEXT', $this->InstanceLanguageText->GetText('FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME'));
			$this->Smarty->assign('FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME_VALUE', $this->InputValueDepartmentNameAndCorporationNameRadio);
			$this->Smarty->assign('FM_DEPARTMENT', ConfigInfraTools::FM_DEPARTMENT);
			$this->Smarty->assign('FM_DEPARTMENT_LST', ConfigInfraTools::FM_DEPARTMENT_LST);
			$this->Smarty->assign('FM_DEPARTMENT_LST_BACK', ConfigInfraTools::FM_DEPARTMENT_LST_BACK);
			$this->Smarty->assign('FM_DEPARTMENT_LST_FORWARD', ConfigInfraTools::FM_DEPARTMENT_LST_FORWARD);
			$this->Smarty->assign('FM_DEPARTMENT_LST_FORM', ConfigInfraTools::FM_DEPARTMENT_LST_FORM);
			$this->Smarty->assign('FM_DEPARTMENT_SEL', ConfigInfraTools::FM_DEPARTMENT_SEL);
			$this->Smarty->assign('FM_DEPARTMENT_SEL_FORM', ConfigInfraTools::FM_DEPARTMENT_SEL_FORM);
			$this->Smarty->assign('FM_DEPARTMENT_REGISTER', ConfigInfraTools::FM_DEPARTMENT_REGISTER);
			$this->Smarty->assign('FM_DEPARTMENT_REGISTER_CANCEL', ConfigInfraTools::FM_DEPARTMENT_REGISTER_CANCEL);
			$this->Smarty->assign('FM_DEPARTMENT_REGISTER_FORM', ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM);
			$this->Smarty->assign('FM_DEPARTMENT_REGISTER_SB', ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW', ConfigInfraTools::FM_DEPARTMENT_VIEW);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW_DEL', ConfigInfraTools::FM_DEPARTMENT_VIEW_DEL);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW_DEL_SB', ConfigInfraTools::FM_DEPARTMENT_VIEW_DEL_SB);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW_UPDT', ConfigInfraTools::FM_DEPARTMENT_VIEW_UPDT);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW_UPDT_SB', ConfigInfraTools::FM_DEPARTMENT_VIEW_UPDT_SB);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW_LST_USERS', ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW_LST_USERS_FORM', ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS_FORM);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW_LST_USERS_SB', ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS_SB);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW_LST_USERS_SB_BACK', ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS_SB_BACK);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW_LST_USERS_SB_FORWARD', ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS_SB_FORWARD);
			$this->Smarty->assign('FM_DEPARTMENT_UPDT_CANCEL', ConfigInfraTools::FM_DEPARTMENT_UPDT_CANCEL);
			$this->Smarty->assign('FM_DEPARTMENT_UPDT_FORM', ConfigInfraTools::FM_DEPARTMENT_UPDT_FORM);
			$this->Smarty->assign('FM_DEPARTMENT_UPDT_SB', ConfigInfraTools::FM_DEPARTMENT_UPDT_SB);
			$this->Smarty->assign('HIDE_CORPORATION_NAME_CLASS', $this->InputValueCorporationNameHidden);
			$this->Smarty->assign('HIDE_DEPARTMENT_INITIALS_CLASS', $this->InputValueDepartmentInitialsHidden);
			$this->Smarty->assign('HIDE_DEPARTMENT_NAME_CLASS', $this->InputValueDepartmentNameHidden);
			if($this->InputValueCorporationName != "" && $this->InputValueCorporationName != ConfigInfraTools::FIELD_SEL_NONE)
				$this->Smarty->assign('FIELD_SEL_NONE', FALSE);
			if(isset($this->ReturnDepartmentInitialsClass)) 
				$this->Smarty->assign('RETURN_DEPARTMENT_INITIALS_CLASS', $this->ReturnDepartmentInitialsClass);
			else $this->Smarty->assign('RETURN_DEPARTMENT_INITIALS_CLASS', NULL);
			if(isset($this->ReturnDepartmentInitialsText)) 
				$this->Smarty->assign('RETURN_DEPARTMENT_INITIALS_TEXT', $this->ReturnDepartmentInitialsText);
			else $this->Smarty->assign('RETURN_DEPARTMENT_INITIALS_TEXT', NULL);
			return ConfigInfraTools::RET_OK;
		} 
		return ConfigInfraTools::RET_ERROR;
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
		$this->InputValueDepartmentNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
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
		//FM_DEPARTMENT_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelect', 
									  array(&$this->ArrayInstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LST;
		}
		//FM_DEPARTMENT_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_REGISTER) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
		}
		//FM_DEPARTMENT_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
		//FM_DEPARTMENT_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentInsert', 
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
									        $_POST[ConfigInfraTools::FIELD_DEPARTMENT_INITIALS],
									        $_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
			else 
			{
				if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
			}
		}
		//FM_DEPARTMENT_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FIELD_RADIO_DEPARTMENT]))
			{
				if($_POST[ConfigInfraTools::FIELD_RADIO_DEPARTMENT] == ConfigInfraTools::FIELD_RADIO_DEPARTMENT_NAME)
				{
					if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentName', 
											  array($_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
											        &$this->ArrayInstanceInfraToolsDepartment),
											  $this->InputValueHeaderDebug) != ConfigInfraTools::RET_OK)
						$this->InputValueDepartmentNameHidden = "NotHidden";
				}
				elseif($_POST[ConfigInfraTools::FIELD_RADIO_DEPARTMENT] == ConfigInfraTools::FIELD_RADIO_DEPARTMENT_INITIALS)
				{
					$this->InputValueDepartmentInitialsRadio = ConfigInfraTools::CHECKBOX_CHECKED;
					if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentInitials', 
											  array($_POST[ConfigInfraTools::FIELD_DEPARTMENT_INITIALS],
											        &$this->ArrayInstanceInfraToolsDepartment),
											  $this->InputValueHeaderDebug) != ConfigInfraTools::RET_OK)
						$this->InputValueDepartmentInitialsHidden = "NotHidden";
				}
				elseif($_POST[ConfigInfraTools::FIELD_RADIO_DEPARTMENT] == ConfigInfraTools::FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME)
				{
					if($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] == ConfigInfraTools::FIELD_SEL_NONE)
						$_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] = "";
					$this->InputValueDepartmentInitialsAndCorporationNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
					if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentInitialsAndCorporationName', 
											  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
													$_POST[ConfigInfraTools::FIELD_DEPARTMENT_INITIALS],
													&$this->ArrayInstanceInfraToolsDepartment),
											  $this->InputValueHeaderDebug) != ConfigInfraTools::RET_OK)
						$this->InputValueCorporationNameHidden = "NotHidden";
				}
				elseif($_POST[ConfigInfraTools::FIELD_RADIO_DEPARTMENT] == ConfigInfraTools::FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME)
				{
					if($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] == ConfigInfraTools::FIELD_SEL_NONE)
						$_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] = "";
					$this->InputValueDepartmentNameAndCorporationNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
					if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName', 
											  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
													$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
													&$this->ArrayInstanceInfraToolsDepartment),
											  $this->InputValueHeaderDebug) != ConfigInfraTools::RET_OK)
						$this->InputValueCorporationNameHidden = "NotHidden";
				}
			}
			elseif($this->CheckPostContainsKey(ConfigInfraTools::FIELD_CORPORATION_NAME) == ConfigInfraTools::RET_OK
				   && $this->CheckPostContainsKey(ConfigInfraTools::FIELD_DEPARTMENT_NAME) == ConfigInfraTools::RET_OK)
			{
				$this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName', 
											  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
													$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
													&$this->ArrayInstanceInfraToolsDepartment),
											  $this->InputValueHeaderDebug);
			}
			if(!empty($this->ArrayInstanceInfraToolsDepartment))
			{
				if(count($this->ArrayInstanceInfraToolsDepartment) > 1)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LST;
				else
				{
					$this->InstanceInfraToolsDepartment = array_pop($this->ArrayInstanceInfraToolsDepartment);
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
													$this->InstanceInfraToolsDepartment) == ConfigInfraTools::RET_OK)
					{
						$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, $this->InstanceInfraToolsDepartment);
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					}
				}
			}
		}
		//FM_DEPARTMENT_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
										  $this->InstanceInfraToolsDepartment) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'DepartmentDelete', 
										  array($this->InstanceInfraToolsDepartment->GetDepartmentCorporationName(),
												$this->InstanceInfraToolsDepartment->GetDepartmentName()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
			}
		}
		//FM_DEPARTMENT_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
										  $this->InstanceInfraToolsDepartment) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDT;
		}
		//FM_DEPARTMENT_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
										  $this->InstanceInfraToolsDepartment) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FM_DEPARTMENT_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceInfraToolsDepartment) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'DepartmentUpdateDepartmentByDepartmentAndCorporation', 
									      array($_POST[ConfigInfraTools::FIELD_DEPARTMENT_INITIALS],
					                            $_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
					                            &$this->ArrayInstanceInfraToolsDepartment),
									      $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;	
			}
		}
		//FM_DEPARTMENT_VIEW_LST_USERS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
												$this->InstanceInfraToolsDepartment) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByDepartmentName', 
									  array($this->InstanceInfraToolsDepartment->GetDepartmentCorporationName(),
						                    $this->InstanceInfraToolsDepartment->GetDepartmentName(),
											&$this->ArrayInstanceInfraToolsUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
			}
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
			if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByUserEmail', 
									  array($_POST[ConfigInfraTools::FIELD_USER_EMAIL],
											&$this->InstanceUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		if($this->PageBody == ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL)
		{
			$_POST[ConfigInfraTools::FM_DEPARTMENT_SEL] = ConfigInfraTools::FM_DEPARTMENT_SEL;
			$this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug);
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>