<?php
/************************************************************************
Class: PageAdminCorporation.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for corporation management.
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

class PageAdminCorporation extends PageAdmin
{
	protected $ArrayInstanceInfraToolsCorporationUsers = NULL;
	protected $InstanceCorporation                     = NULL;
	protected $InstanceTypeUser                        = NULL;

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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		//FORM SUBMIT BACK
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_SUBMIT_BACK) == ConfigInfraTools::SUCCESS)
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//FORM_CORPORATION_LIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsCorporationSelect', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_LIST;
		}
		//FORM_CORPORATION_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
		//CORPORATION REGISTER CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		//FORM_CORPORATION_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationInsert', 
									  array(@$_POST[Config::FORM_FIELD_CORPORATION_ACTIVE],
				                            $_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
		}
		//FORM_CORPORATION_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											&$this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FORM_CORPORATION_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{				
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceCorporation)
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'CorporationDelete', 
									      array($this->InstanceCorporation->GetCorporationName()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				elseif($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_CORPORATION, "CorporationLoadData", 
												  $this->InstanceCorporation) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
			} 
		}
		//FORM_CORPORATION_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_CORPORATION, "CorporationLoadData", 
										  $this->InstanceCorporation) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDATE;
		}
		//FORM_CORPORATION_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_CORPORATION, "CorporationLoadData", 
										  $this->InstanceCorporation) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FORM_CORPORATION_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceCorporation) 
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'CorporationUpdateByName', 
										  array(@$_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_ACTIVE],
					                            $_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME], 
										        &$this->InstanceCorporation),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDATE;
			}
		}
		//FORM_CORPORATION_VIEW_LIST_USERS_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_VIEW_LIST_USERS_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceCorporation) 
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'UserSelectByCorporationName', 
										  array($this->InstanceCorporation->GetCorporationName(), 
										        &$this->ArrayInstanceInfraToolsCorporationUsers),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
			}
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