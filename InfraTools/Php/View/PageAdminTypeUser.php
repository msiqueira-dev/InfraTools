<?php
/************************************************************************
Class: PageAdminTypeUser.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for type user management.
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

class PageAdminTypeUser extends PageAdmin
{
	protected $ArrayInstanceInfraToolsUser = NULL;
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
	
		//FORM_SUBMIT_BACK
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
		//FORM_TYPE_USER_LIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelect', 
									  array(&$this->ArrayInstanceTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LIST;
		}
		//FORM_TYPE_USER_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		//FORM_TYPE_USER_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		//FORM_TYPE_USER_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserInsert', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		}
		//FORM_TYPE_USER_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescriptionLike', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION],
													&$this->InstanceTypeUser),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{

				if(count($this->InstanceTypeUser) > 1)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LIST;	
				else
				{
					$this->InstanceTypeUser = array_pop($this->InstanceTypeUser);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser);
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
												  $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				}
			}
		}
		//FORM_TYPE_USER_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{				
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserDeleteByTypeUserDescription($this->InstanceTypeUser, $this->InputValueHeaderDebug) 
				                                              == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
				elseif($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
												  $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			} 
		}
		//FORM_TYPE_USER_VIEW_LIST_USERS
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_VIEW_LIST_USERS) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByTypeUserDescription', 
										  array($this->InstanceTypeUser->GetTypeUserDescription(), 
											    &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
			}
		}
		//FORM_TYPE_USER_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
										  $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDATE;
		}
		//FORM_TYPE_USER_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
										  $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FORM_TYPE_USER_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) 
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'TypeUserUpdateByTypeUserDescription', 
									      array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION],
										        &$this->InstanceTypeUser),
									      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDATE;
			}
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