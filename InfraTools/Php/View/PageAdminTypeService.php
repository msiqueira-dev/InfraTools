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
			protected function BuildSmartyTags();
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
	public $ArrayInstanceInfraToolsService     = NULL;
	public $ArrayInstanceInfraToolsTypeService = NULL;
	public $InstanceInfraToolsTypeService      = NULL;
	
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
			$this->Smarty->assign('FM_TYPE_SERVICE', ConfigInfraTools::FM_TYPE_SERVICE);
			$this->Smarty->assign('FM_TYPE_SERVICE_LST', ConfigInfraTools::FM_TYPE_SERVICE_LST);
			$this->Smarty->assign('FM_TYPE_SERVICE_LST_BACK', ConfigInfraTools::FM_TYPE_SERVICE_LST_BACK);
			$this->Smarty->assign('FM_TYPE_SERVICE_LST_FORWARD', ConfigInfraTools::FM_TYPE_SERVICE_LST_FORWARD);
			$this->Smarty->assign('FM_TYPE_SERVICE_LST_FORM', ConfigInfraTools::FM_TYPE_SERVICE_LST_FORM);
			$this->Smarty->assign('FM_TYPE_SERVICE_SEL', ConfigInfraTools::FM_TYPE_SERVICE_SEL);
			$this->Smarty->assign('FM_TYPE_SERVICE_SEL_SB', ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB);
			$this->Smarty->assign('FM_TYPE_SERVICE_SEL_FORM', ConfigInfraTools::FM_TYPE_SERVICE_SEL_FORM);
			$this->Smarty->assign('FM_TYPE_SERVICE_REGISTER', ConfigInfraTools::FM_TYPE_SERVICE_REGISTER);
			$this->Smarty->assign('FM_TYPE_SERVICE_REGISTER_CANCEL', ConfigInfraTools::FM_TYPE_SERVICE_REGISTER_CANCEL);
			$this->Smarty->assign('FM_TYPE_SERVICE_REGISTER_FORM', ConfigInfraTools::FM_TYPE_SERVICE_REGISTER_FORM);
			$this->Smarty->assign('FM_TYPE_SERVICE_REGISTER_SB', ConfigInfraTools::FM_TYPE_SERVICE_REGISTER_SB);
			$this->Smarty->assign('FM_TYPE_SERVICE_UPDT_CANCEL', ConfigInfraTools::FM_TYPE_SERVICE_UPDT_CANCEL);
			$this->Smarty->assign('FM_TYPE_SERVICE_UPDT_FORM', ConfigInfraTools::FM_TYPE_SERVICE_UPDT_FORM);
			$this->Smarty->assign('FM_TYPE_SERVICE_UPDT_SB', ConfigInfraTools::FM_TYPE_SERVICE_UPDT_SB);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_DEL', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_DEL);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_DEL_SB', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_DEL_SB);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_LST_SERVICES', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_SERVICES);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_LST_SERVICES_BACK', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_SERVICES_BACK);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_LST_SERVICES_FORWARD', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_SERVICES_FORWARD);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_LST_USERS', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_USERS);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_LST_USERS_FORM', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_USERS_FORM);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_LST_USERS_SB', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_USERS_SB);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_LST_USERS_SB_BACK', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_USERS_SB_BACK);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_LST_USERS_SB_FORWARD', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_USERS_SB_FORWARD);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_UPDT', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_UPDT);
			$this->Smarty->assign('FM_TYPE_SERVICE_VIEW_UPDT_SB', ConfigInfraTools::FM_TYPE_SERVICE_VIEW_UPDT_SB);
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_TYPE_SERVICE", array($this->ArrayInstanceInfraToolsTypeService));
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_SERVICE", array($this->ArrayInstanceInfraToolsService));
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_USER", array($this->ArrayInstanceInfraToolsUser));
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;
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
									  array(&$this->ArrayInstanceInfraToolsTypeService),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_LST;
				$this->ShowDivReturnEmpty();
			}	
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
													&$this->InstanceInfraToolsTypeService),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "InfraToolsTypeServiceLoadData", 
												  $this->InstanceInfraToolsTypeService) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;
			}
		}
		//FM_TYPE_SERVICE_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "InfraToolsTypeServiceLoadData", 
										  $this->InstanceInfraToolsTypeService) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsTypeServiceDeleteByTypeTypeServiceName', 
										  array($this->InstanceInfraToolsTypeService),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SEL;
			}
		}
		//FM_TYPE_SERVICE_VIEW_LST_SERVICES
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_SERVICE_VIEW_LST_SERVICES]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, $this->InstanceInfraToolsTypeService)  
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceType', 
										  array($this->InstanceTypeTicket->GetTypeTicketDescription(),
												$this->InstanceInfraToolsTypeService->GetTypeServiceName(),
												&$this->ArrayInstanceInfraToolsService), 
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW_LST_SERVICES;
				else
				{
					if($this->InfraToolsTypeServiceLoadData($this->ArrayInstanceInfraToolsService) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;
				}
			}
		}
		//FM_TYPE_SERVICE_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "InfraToolsTypeServiceLoadData", 
										  $this->InstanceInfraToolsTypeService) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_UPDT;
		}
		//FM_TYPE_SERVICE_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "InfraToolsTypeServiceLoadData", 
										  $this->InstanceInfraToolsTypeService) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;
		}
		//FM_TYPE_SERVICE_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_SERVICE_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, 
														$this->InstanceInfraToolsTypeService) == ConfigInfraTools::RET_OK)
			{
				$this->ExecuteFunction($_POST, 'InfraToolsTypeServiceUpdateByTypeServiceName', 
									   array($_POST[ConfigInfraTools::FIELD_TYPE_SERVICE_NAME],
					                         &$this->InstanceInfraToolsTypeService),
									   $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;	
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>