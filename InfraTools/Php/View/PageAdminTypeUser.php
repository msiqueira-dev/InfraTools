<?php
/************************************************************************
Class: PageAdminTypeUser.php
Creation: 2016/09/30
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for type user management.
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

class PageAdminTypeUser extends PageAdmin
{
	protected $ArrayInstanceInfraToolsUser     = NULL;
	
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
			$this->Smarty->assign('CURRENT_PAGE', ConfigInfraTools::PAGE_ADMIN_TYPE_USER);
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SEL;
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
		//FM_TYPE_USER_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelect', 
									  array(&$this->ArrayInstanceInfraToolsTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LST;
		}
		//FM_TYPE_USER_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_REGISTER) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		//FM_TYPE_USER_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SEL;
		//FM_TYPE_USER_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserInsert', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescriptionLike', 
											  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
													&$this->InstanceInfraToolsTypeUser),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{

				if(count($this->InstanceInfraToolsTypeUser) > 1)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LST;	
				else
				{
					$this->InstanceInfraToolsTypeUser = array_pop($this->InstanceInfraToolsTypeUser);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceInfraToolsTypeUser);
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
												  $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				}
			}
		}
		//FM_TYPE_USER_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{				
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::RET_OK)
			{
				if($this->TypeUserDeleteByTypeUserDescription($this->InstanceInfraToolsTypeUser, $this->InputValueHeaderDebug) 
				                                              == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SEL;
				elseif($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
												  $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			} 
		}
		//FM_TYPE_USER_VIEW_LST_USERS
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByTypeUserDescription', 
										  array($this->InstanceInfraToolsTypeUser->GetTypeUserDescription(), 
											    &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
			}
		}
		//FM_TYPE_USER_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
										  $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDT;
		}
		//FM_TYPE_USER_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
										  $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FM_TYPE_USER_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceInfraToolsTypeUser) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'TypeUserUpdateByTypeUserDescription', 
									      array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
										        &$this->InstanceInfraToolsTypeUser),
									      $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDT;
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