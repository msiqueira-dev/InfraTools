<?php
/************************************************************************
Class: PageAdminRole.php
Creation: 2019/01/23
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for role management.
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
if (!class_exists("Role"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Role.php"))
		include_once(BASE_PATH_PHP_MODEL . "Role.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Role');
}


class PageAdminRole extends PageAdmin
{
	public $ArrayInstanceRole = NULL;
	public $InstanceRole      = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_SELECT;
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
		//FORM_DEPARTMENT_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName',
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME], 
											$_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
										    &$this->InstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FORM_ROLE_LIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'RoleSelect', 
									  array(&$this->ArrayInstanceRole),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_LIST;
		}
		//FORM_ROLE_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_REGISTER) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_REGISTER;
		//FORM_ROLE_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_SELECT;
		//FORM_ROLE_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'RoleInsert', 
									  array(@$_POST[ConfigInfraTools::FORM_FIELD_ROLE_DESCRIPTION],
											$_POST[ConfigInfraTools::FORM_FIELD_ROLE_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_REGISTER;
		}
		//FORM_ROLE_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_SELECT) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_SELECT;
		//FORM_ROLE_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'RoleSelectByRoleName', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_ROLE_NAME],
											&$this->InstanceRole),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_VIEW;
		}
		//FORM_ROLE_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_ROLE, "RoleLoadData", 
										  $this->InstanceRole) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'RoleDeleteByRoleName', 
										  array($this->InstanceRole),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_SELECT;
			}
		}
		//FORM_ROLE_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_ROLE, "RoleLoadData", 
										  $this->InstanceRole) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_UPDATE;
		}
		//FORM_ROLE_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_ROLE, "RoleLoadData", 
										  $this->InstanceRole) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_VIEW;
		}
		//FORM_ROLE_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_ROLE_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_ROLE, 
											   $this->InstanceRole) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'RoleUpdateByRoleName', 
										  array($_POST[ConfigInfraTools::FORM_FIELD_ROLE_DESCRIPTION],
												@$_POST[ConfigInfraTools::FORM_FIELD_ROLE_NAME],
												&$this->InstanceRole),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_VIEW;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_ROLE_UPDATE;
			}
		}
		//FORM_TYPE_USER_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION],
									        &$this->InstanceTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FORM_USER_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByUserEmail', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
									        &$this->InstanceUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>