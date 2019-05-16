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
	public $ArrayInstanceInfraToolsAssocIpAddressService = NULL;
	public $ArrayInstanceInfraToolsService               = NULL;
	public $ArrayInstanceInfraToolsUser                  = NULL;
	public $InstanceInfraToolsService                    = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_SEL;
		$this->InputValueServiceIdRadio = ConfigInfraTools::CHECKBOX_CHECKED;
		$this->ReturnServiceIdRadioClass   = "NotHidden";
		$this->ReturnServiceNameRadioClass = "Hidden";
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
		//FM_SERVICE_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelect', 
									  array(&$this->ArrayInstanceInfraToolsService),
									  $this->InputValueHeaderDebug, TRUE) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_LST;
		}
		//FM_SERVICE_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_REGISTER) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_REGISTER;
		//FM_SERVICE_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_SEL;
		//FM_SERVICE_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
		}
		//FM_SERVICE_SEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_SEL) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_SEL;
		//FM_SERVICE_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FIELD_SERVICE_RADIO]))
			{
				if($_POST[ConfigInfraTools::FIELD_SERVICE_RADIO] == ConfigInfraTools::FIELD_SERVICE_ID_RADIO)
				{
					$this->ReturnServiceIdRadioClass   = "NotHidden";
					$this->ReturnServiceNameRadioClass = "Hidden";
					if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceId', 
											  array($_POST[ConfigInfraTools::FIELD_SERVICE_ID],
											        &$this->ArrayInstanceInfraToolsAssocIpAddressService,
													&$this->InstanceInfraToolsService),
											  $this->InputValueHeaderDebug, TRUE) == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
													  $this->InstanceInfraToolsService) == ConfigInfraTools::RET_OK)
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
					$_POST = array(ConfigInfraTools::FM_SERVICE_LST => ConfigInfraTools::FM_SERVICE_LST) + $_POST;
					if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceName', 
											  array($_POST[ConfigInfraTools::FIELD_SERVICE_NAME],
													&$this->ArrayInstanceInfraToolsService),
											  $this->InputValueHeaderDebug, TRUE) == ConfigInfraTools::RET_OK)
					{
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_LST;	
					}
					else $this->ShowDivReturnError("SERVICE_NOT_FOUND");
				}
			}
			else
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceId', 
											  array($_POST[ConfigInfraTools::FIELD_SERVICE_ID],
											        &$this->ArrayInstanceInfraToolsAssocIpAddressService,
													&$this->InstanceInfraToolsService),
											  $this->InputValueHeaderDebug, TRUE) == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
													  $this->InstanceInfraToolsService) == ConfigInfraTools::RET_OK)
						{
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_VIEW;
							$this->ShowDivReturnEmpty();
						}
					}
			}
		}
		//FM_SERVICE_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
										  $this->InstanceInfraToolsService) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'ServiceDeleteByServiceId', 
										  array($this->InstanceInfraToolsService->GetServiceId()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_SEL;
			}
		}
		//FM_SERVICE_VIEW_LST_USERS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_VIEW_LST_USERS_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, $this->InstanceInfraToolsService) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByServiceId', 
										  array($this->InstanceInfraToolsService->GetServiceId(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_VIEW_LST_USERS;
			}
		}
		//FM_SERVICE_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
										  $this->InstanceInfraToolsService) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_UPDT;
		}
		//FM_SERVICE_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SERVICE, "InfraToolsServiceLoadData", 
										  $this->InstanceInfraToolsService) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_VIEW;
		}
		//FM_SERVICE_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_SERVICE, 
											   $this->InstanceInfraToolsService) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SERVICE_VIEW;	
			}
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
									        &$this->InstanceInfraToolsTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
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