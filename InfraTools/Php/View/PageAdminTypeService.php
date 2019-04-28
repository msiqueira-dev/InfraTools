<?php
/************************************************************************
Class: PageAdminTypeService.php
Creation: 2018/06/04
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for type service management.
Functions: 
			public    function LoadPage();	
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("TypeService"))
{
	if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTypeService.php"))
		include_once(SITE_PATH_PHP_MODEL . "InfraToolsTypeService.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsTypeService');
}
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}

class PageAdminTypeService extends PageAdmin
{
	public $ArrayInstanceTypeServiceServices = NULL;
	public $InstanceTypeService              = NULL;
	
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
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SEL;
		$this->AdminGoBack($PageFormBack);
		
		//FM_TYPE_SERVICE_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsTypeServiceSelect', 
									  array(&$this->ArrayInstanceTypeService),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_LST;
		}
		//FM_TYPE_SERVICE_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_REGISTER) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_REGISTER;
		//FM_TYPE_SERVICE_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SEL;
		//FM_TYPE_SERVICE_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsTypeServiceInsert', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_SERVICE_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_REGISTER;
		}
		//FM_TYPE_SERVICE_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeServiceSelectByTypeServiceName', 
											  array($_POST[ConfigInfraTools::FIELD_TYPE_SERVICE_NAME],
													&$this->InstanceTypeService),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "InfraToolsTypeServiceLoadData", 
												  $this->InstanceTypeService) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;
			}
		}
		//FM_TYPE_SERVICE_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "InfraToolsTypeServiceLoadData", 
										  $this->InstanceTypeService) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsTypeServiceDeleteByTypeTypeServiceName', 
										  array($this->InstanceTypeService),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SEL;
			}
		}
		//FM_TYPE_SERVICE_VIEW_LST_SERVICES
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_SERVICES]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, $this->InstanceTypeService)  
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceType', 
										  array($this->InstanceTypeTicket->GetTypeTicketDescription(),
												$this->InstanceTypeService->GetTypeServiceName(),
												&$this->ArrayInstanceTypeServiceServices), 
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW_LST_SERVICES;
				else
				{
					if($this->InfraToolsTypeServiceLoadData($this->ArrayInstanceTypeServiceServices) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;
				}
			}
		}
		//FM_TYPE_SERVICE_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "InfraToolsTypeServiceLoadData", 
										  $this->InstanceTypeService) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_UPDT;
		}
		//FM_TYPE_SERVICE_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "InfraToolsTypeServiceLoadData", 
										  $this->InstanceTypeService) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;
		}
		//FM_TYPE_SERVICE_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, 
														$this->InstanceTypeService) == ConfigInfraTools::RET_OK)
			{
				$this->ExecuteFunction($_POST, 'InfraToolsTypeServiceUpdateByTypeServiceName', 
									   array($_POST[ConfigInfraTools::FIELD_TYPE_SERVICE_NAME],
					                         &$this->InstanceTypeService),
									   $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;	
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>