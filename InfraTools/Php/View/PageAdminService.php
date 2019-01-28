<?php
/************************************************************************
Class: PageAdminService.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for service management.
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
if (!class_exists("InfraToolsService"))
{
	if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsService.php"))
		include_once(SITE_PATH_PHP_MODEL . "InfraToolsService.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Service');
}
if (!class_exists("InfraToolsTypeService"))
{
	if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTypeService.php"))
		include_once(SITE_PATH_PHP_MODEL . "InfraToolsTypeService.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Service');
}

class PageAdminService extends PageAdmin
{
	public $ArrayInstanceInfraToolsService = NULL;
	public $ArrayInstanceInfraToolsUser    = NULL;
	public $InstanceInfraToolsService      = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_SELECT;
		$this->InputValueServiceIdRadio = ConfigInfraTools::CHECKBOX_CHECKED;
		$this->ReturnServiceIdRadioClass   = "NotHidden";
		$this->ReturnServiceNameRadioClass = "Hidden";
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
		//FORM_SERVICE_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelect', 
									  array(&$this->ArrayInstanceInfraToolsService),
									  $this->InputValueHeaderDebug, TRUE) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_LIST;
		}
		//FORM_SERVICE_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_REGISTER) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_REGISTER;
		//FORM_SERVICE_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_SELECT;
		//FORM_SERVICE_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
		}
		//FORM_SERVICE_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_SELECT) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_SELECT;
		//FORM_SERVICE_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_RADIO]))
			{
				if($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_RADIO] == ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO)
				{
					$this->ReturnServiceIdRadioClass   = "NotHidden";
					$this->ReturnServiceNameRadioClass = "Hidden";
					if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceId', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_ID],
													&$this->InstanceInfraToolsService),
											  $this->InputValueHeaderDebug, TRUE) == ConfigInfraTools::SUCCESS)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
													  $this->InstanceInfraToolsService) == ConfigInfraTools::SUCCESS)
						{
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_VIEW;
							$this->ShowDivReturnEmpty();
						}
					}
				}
				else
				{
					$this->ReturnServiceIdRadioClass   = "Hidden";
					$this->ReturnServiceNameRadioClass = "NotHidden";
					$this->InputValueServiceNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
					$_POST = array(ConfigInfraTools::FORM_SERVICE_LIST => ConfigInfraTools::FORM_SERVICE_LIST) + $_POST;
					if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceName', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_NAME],
													&$this->ArrayInstanceInfraToolsService),
											  $this->InputValueHeaderDebug, TRUE) == ConfigInfraTools::SUCCESS)
					{
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_LIST;	
					}
					else $this->ShowDivReturnError("SERVICE_NOT_FOUND");
				}
			}
			else
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceId', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_ID],
													&$this->InstanceInfraToolsService),
											  $this->InputValueHeaderDebug, TRUE) == ConfigInfraTools::SUCCESS)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
													  $this->InstanceInfraToolsService) == ConfigInfraTools::SUCCESS)
						{
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_VIEW;
							$this->ShowDivReturnEmpty();
						}
					}
			}
		}
		//FORM_SERVICE_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
										  $this->InstanceInfraToolsService) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'ServiceDeleteByServiceId', 
										  array($this->InstanceInfraToolsService->GetServiceId()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_SELECT;
			}
		}
		//FORM_SERVICE_VIEW_LIST_USERS_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $this->InstanceInfraToolsService) 
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByServiceId', 
										  array($this->InstanceInfraToolsService->GetServiceId(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_VIEW_LIST_USERS;
			}
		}
		//FORM_SERVICE_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
										  $this->InstanceInfraToolsService) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_UPDATE;
		}
		//FORM_SERVICE_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
										  $this->InstanceInfraToolsService) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_VIEW;
		}
		//FORM_SERVICE_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, 
											   $this->InstanceInfraToolsService) == ConfigInfraTools::SUCCESS)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_VIEW;	
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