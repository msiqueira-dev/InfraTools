<?php
/************************************************************************
Class: PageAdminCorporation.php
Creation: 2016/30/09
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for corporation management.
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

class PageAdminCorporation extends PageAdmin
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
		parent::__construct($Config, $Language, $Page);
	}

	protected function BuildSmartyTags()
	{
		if(parent::BuildSmartyTags() == ConfigInfraTools::RET_OK)
		{
			$this->Smarty->assign('CURRENT_PAGE', ConfigInfraTools::PAGE_ADMIN_CORPORATION);
			$this->Smarty->assign('FM_CORPORATION', ConfigInfraTools::FM_CORPORATION);
			$this->Smarty->assign('FM_CORPORATION_LST', ConfigInfraTools::FM_CORPORATION_LST);
			$this->Smarty->assign('FM_CORPORATION_LST_BACK', ConfigInfraTools::FM_CORPORATION_LST_BACK);
			$this->Smarty->assign('FM_CORPORATION_LST_FORWARD', ConfigInfraTools::FM_CORPORATION_LST_FORWARD);
			$this->Smarty->assign('FM_CORPORATION_LST_FORM', ConfigInfraTools::FM_CORPORATION_LST_FORM);
			$this->Smarty->assign('FM_CORPORATION_SEL', ConfigInfraTools::FM_CORPORATION_SEL);
			$this->Smarty->assign('FM_CORPORATION_SEL_FORM', ConfigInfraTools::FM_CORPORATION_SEL_FORM);
			$this->Smarty->assign('FM_CORPORATION_REGISTER', ConfigInfraTools::FM_CORPORATION_REGISTER);
			$this->Smarty->assign('FM_CORPORATION_REGISTER_CANCEL', ConfigInfraTools::FM_CORPORATION_REGISTER_CANCEL);
			$this->Smarty->assign('FM_CORPORATION_REGISTER_FORM', ConfigInfraTools::FM_CORPORATION_REGISTER_FORM);
			$this->Smarty->assign('FM_CORPORATION_REGISTER_SB', ConfigInfraTools::FM_CORPORATION_REGISTER_SB);
			$this->Smarty->assign('FM_CORPORATION_UPDT_CANCEL', ConfigInfraTools::FM_CORPORATION_UPDT_CANCEL);
			$this->Smarty->assign('FM_CORPORATION_UPDT_FORM', ConfigInfraTools::FM_CORPORATION_UPDT_FORM);
			$this->Smarty->assign('FM_CORPORATION_UPDT_SB', ConfigInfraTools::FM_CORPORATION_UPDT_SB);
			$this->Smarty->assign('FM_CORPORATION_VIEW_DEL', ConfigInfraTools::FM_CORPORATION_VIEW_DEL);
			$this->Smarty->assign('FM_CORPORATION_VIEW_DEL_SB', ConfigInfraTools::FM_CORPORATION_VIEW_DEL_SB);
			$this->Smarty->assign('FM_CORPORATION_VIEW_UPDT', ConfigInfraTools::FM_CORPORATION_VIEW_UPDT);
			$this->Smarty->assign('FM_CORPORATION_VIEW_UPDT_SB', ConfigInfraTools::FM_CORPORATION_VIEW_UPDT_SB);
			$this->Smarty->assign('FM_CORPORATION_VIEW_LST_USERS', ConfigInfraTools::FM_CORPORATION_VIEW_LST_USERS);
			$this->Smarty->assign('FM_CORPORATION_VIEW_LST_USERS_FORM', ConfigInfraTools::FM_CORPORATION_VIEW_LST_USERS_FORM);
			$this->Smarty->assign('FM_CORPORATION_VIEW_LST_USERS_SB', ConfigInfraTools::FM_CORPORATION_VIEW_LST_USERS_SB);
			$this->Smarty->assign('FM_CORPORATION_VIEW_LST_USERS_SB_BACK', ConfigInfraTools::FM_CORPORATION_VIEW_LST_USERS_SB_BACK);
			$this->Smarty->assign('FM_CORPORATION_VIEW_LST_USERS_SB_FORWARD', ConfigInfraTools::FM_CORPORATION_VIEW_LST_USERS_SB_FORWARD);
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_CORPORATION", array($this->ArrayInstanceInfraToolsCorporation));
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_USER", array($this->ArrayInstanceInfraToolsUser));
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL;
		$this->AdminGoBack($PageFormBack);
		
		//FM_CORPORATION_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsCorporationSelect', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_LST;
		}
		//FM_CORPORATION_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_REGISTER) == ConfigInfraTools::RET_OK)
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
		}
		//FM_CORPORATION_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL;
		}
		//FM_CORPORATION_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationInsert', 
									  array(@$_POST[ConfigInfraTools::FIELD_CORPORATION_ACTIVE],
				                            $_POST[ConfigInfraTools::FIELD_CORPORATION_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
		}
		//FM_CORPORATION_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
											&$this->InstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FM_CORPORATION_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{				
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceInfraToolsCorporation)
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'CorporationDelete', 
									      array($this->InstanceInfraToolsCorporation->GetCorporationName()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL;
				elseif($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_CORPORATION, "CorporationLoadData", 
												  $this->InstanceInfraToolsCorporation) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					
			} 
		}
		//FM_CORPORATION_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_CORPORATION, "CorporationLoadData", 
										  $this->InstanceInfraToolsCorporation) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDT;
		}
		//FM_CORPORATION_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_CORPORATION, "CorporationLoadData", 
										  $this->InstanceInfraToolsCorporation) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FM_CORPORATION_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceInfraToolsCorporation) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'CorporationUpdateByName', 
										  array(@$_POST[ConfigInfraTools::FIELD_CORPORATION_ACTIVE],
					                            $_POST[ConfigInfraTools::FIELD_CORPORATION_NAME], 
										        &$this->InstanceInfraToolsCorporation),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDT;
			}
		}
		//FM_CORPORATION_VIEW_LST_USERS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_VIEW_LST_USERS_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceInfraToolsCorporation) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByCorporationName', 
										  array($this->InstanceInfraToolsCorporation->GetCorporationName(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
			}
		}
		//FM_DEPARTMENT_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName',
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME], 
											$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
										    &$this->ArrayInstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					if(count($this->ArrayInstanceInfraToolsDepartment) == 1)
					{
						$this->InstanceInfraToolsDepartment = array_pop($this->ArrayInstanceInfraToolsDepartment);
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
														$this->InstanceInfraToolsDepartment) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					}
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
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>