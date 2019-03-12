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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SEL;
		$this->AdminGoBack($PageFormBack);
		
		//FM_CORPORATION_SEL_SB
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
											&$this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FM_DEPARTMENT_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName',
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME], 
											$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
										    &$this->InstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FM_TYPE_USER_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelect', 
									  array(&$this->ArrayInstanceTypeUser),
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
		//FM_TYPE_USER_SEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescriptionLike', 
											  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
													&$this->InstanceTypeUser),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{

				if(count($this->InstanceTypeUser) > 1)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LST;	
				else
				{
					$this->InstanceTypeUser = array_pop($this->InstanceTypeUser);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser);
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
												  $this->InstanceTypeUser) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				}
			}
		}
		//FM_TYPE_USER_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{				
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) == ConfigInfraTools::RET_OK)
			{
				if($this->TypeUserDeleteByTypeUserDescription($this->InstanceTypeUser, $this->InputValueHeaderDebug) 
				                                              == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SEL;
				elseif($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
												  $this->InstanceTypeUser) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			} 
		}
		//FM_TYPE_USER_VIEW_LST_USERS
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByTypeUserDescription', 
										  array($this->InstanceTypeUser->GetTypeUserDescription(), 
											    &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
			}
		}
		//FM_TYPE_USER_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
										  $this->InstanceTypeUser) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDT;
		}
		//FM_TYPE_USER_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
										  $this->InstanceTypeUser) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FM_TYPE_USER_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'TypeUserUpdateByTypeUserDescription', 
									      array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
										        &$this->InstanceTypeUser),
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
		$this->LoadHtml(FALSE);
	}
}
?>