<?php
/************************************************************************
Class: PageAdminMonitoring.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for monitoring management.
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

class PageAdminMonitoring extends PageAdmin
{
	public $ArrayInstanceMonitoring = NULL;
	public $InstanceMonitoring      = NULL;
	
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
		$this->AdminGoBack($PageFormBack);
		
		//FM_MONITORINGLIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'MonitoringSelect', 
									  array(&$this->ArrayInstanceMonitoring),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_LST;
		}
		//FM_MONITORING_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_REGISTER) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_REGISTER;
		}
		//FM_MONITORING_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_SEL;
		//FM_MONITORING_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_SEL;
		}
		//FM_MONITORING_SEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_SEL) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_SEL;
		//FM_MONITORING_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] == NULL || 
			   $_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] == ConfigInfraTools::FIELD_SEL_NONE)
			{
			}
			else
			{
			}
		}
		//FM_MONITORING_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_MONITORING, "MonitoringLoadData", 
										  $this->InstanceMonitoring) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'MonitoringDelete', 
										  array($this->InstanceMonitoring->GetMonitoringId()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_SEL;
			}
		}
		//FM_MONITORING_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_MONITORING, "MonitoringLoadData", 
										  $this->InstanceMonitoring) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_UPDT;
		}
		//FM_MONITORING_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_MONITORING, "MonitoringLoadData", 
										  $this->InstanceMonitoring) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_VIEW;
		}
		//FM_MONITORING_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_MONITORING_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_MONITORING, 
														$this->InstanceMonitoring) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'MonitoringUpdateByMonitoringId', 
									  array( $_POST[ConfigInfraTools::FIELD_MONITORING_INITIALS],
					                         $_POST[ConfigInfraTools::FIELD_MONITORING_NAME],
					                         $this->InstanceMonitoring,),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_VIEW;	
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>