<?php
/************************************************************************
Class: PageAdminTypeMonitoring.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for type monitoring management.
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

class PageAdminTypeMonitoring extends PageAdmin
{
	public $ArrayInstanceTypeMonitoring = NULL;
	public $InstanceTypeMonitoring      = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SEL;
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
		//FM_TYPE_MONITORING_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_MONITORING_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeMonitoringSelect', 
									  array(&$this->ArrayInstanceTypeMonitoring),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_LST;
		}
		//FM_TYPE_MONITORING_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_MONITORING_REGISTER) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_REGISTER;
		//FM_TYPE_MONITORING_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_MONITORING_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SEL;
		//FM_TYPE_MONITORING_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_MONITORING_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeMonitoringInsert', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_MONITORING_NAME],
										    $_POST[ConfigInfraTools::FIELD_TYPE_MONITORING_DESCRIPTION]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_REGISTER;
		}
		//FM_TYPE_MONITORING_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_MONITORING_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeMonitoringSelectByTypeMonitoringDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_MONITORING_NAME],
											&$this->InstanceTypeMonitoring),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW;
		}
		//FM_TYPE_MONITORING_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_MONITORING_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeMonitoringSelectByTypeMonitoringDescription', 
											  array($_POST[ConfigInfraTools::FIELD_TYPE_MONITORING_NAME],
													&$this->InstanceTypeMonitoring),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING_TEAM, "TypeMonitoringLoadData", 
												  $this->InstanceTypeMonitoring) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW;
			}
		}
		//FM_TYPE_MONITORING_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_MONITORING_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING, "TypeMonitoringLoadData", 
										  $this->InstanceTypeMonitoring) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'TypeMonitoringDeleteByTypeMonitoringDescription', 
										  array($this->InstanceTypeMonitoring),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SEL;
			}
		}
		//FM_TYPE_MONITORING_VIEW_LST_USERS_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_MONITORING_VIEW_LST_USERS_SB]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING, $this->InstanceTypeMonitoring) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByTypeMonitoringDescription', 
										  array($this->InstanceTypeMonitoring->GetTypeMonitoringDescription(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_LST_USERS;
			}
		}
		//FM_TYPE_MONITORING_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_MONITORING_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_TYPE_MONITORING, "TypeMonitoringLoadData", 
										  $this->InstanceTypeMonitoring) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_UPDT;
		}
		//FM_TYPE_TYPE_MONITORING_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_TYPE_MONITORING_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING, "TypeMonitoringLoadData", 
										  $this->InstanceTypeMonitoring) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW;
		}
		//FM_TYPE_TYPE_MONITORING_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_MONITORING_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING, 
														$this->InstanceTypeMonitoring) == ConfigInfraTools::RET_OK)
			{
				$this->ExecuteFunction($_POST, 'TypeMonitoringUpdateByTypeMonitoringDescription', 
									   array($_POST[ConfigInfraTools::FIELD_TYPE_MONITORING_NAME],
					                         &$this->InstanceTypeMonitoring),
									   $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW;	
			}
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
									        &$this->InstanceTypeUser),
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