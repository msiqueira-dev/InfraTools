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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SELECT;
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
		//FORM_TYPE_MONITORING_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_MONITORING_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeMonitoringSelect', 
									  array(&$this->ArrayInstanceTypeMonitoring),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_LIST;
		}
		//FORM_TYPE_MONITORING_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_MONITORING_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_REGISTER;
		//FORM_TYPE_MONITORING_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_MONITORING_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SELECT;
		//FORM_TYPE_MONITORING_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_MONITORING_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeMonitoringInsert', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_MONITORING_NAME],
										    $_POST[ConfigInfraTools::FORM_FIELD_TYPE_MONITORING_DESCRIPTION]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_REGISTER;
		}
		//FORM_TYPE_MONITORING_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_MONITORING_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeMonitoringSelectByTypeMonitoringName', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_MONITORING_NAME],
											&$this->InstanceTypeMonitoring),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW;
		}
		//FORM_TYPE_MONITORING_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_MONITORING_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeMonitoringSelectByTypeMonitoringName', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_MONITORING_NAME],
													&$this->InstanceTypeMonitoring),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING_TEAM, "TypeMonitoringLoadData", 
												  $this->InstanceTypeMonitoring) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW;
			}
		}
		//FORM_TYPE_MONITORING_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_MONITORING_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING, "TypeMonitoringLoadData", 
										  $this->InstanceTypeMonitoring) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'TypeMonitoringDeleteByTypeMonitoringName', 
										  array($this->InstanceTypeMonitoring),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SELECT;
			}
		}
		//FORM_TYPE_MONITORING_VIEW_LIST_USERS_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_MONITORING_VIEW_LIST_USERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING, $this->InstanceTypeMonitoring)  
			                                   == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->UserSelectByTypeMonitoringName($this->InputLimitOne, $this->InputLimitTwo, 
														           $this->InstanceTypeMonitoring->GetTypeMonitoringName(),
										                           $this->ArrayInstanceUser, $rowCount, $this->InputValueHeaderDebug) 
				                                                   == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW_LIST_USERS;
				else
				{
					if($this->TypeMonitoringLoadData($this->InstanceTypeMonitoring) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SELECT;
		}
		//FORM_TYPE_MONITORING_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_MONITORING_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_TYPE_MONITORING, "TypeMonitoringLoadData", 
										  $this->InstanceTypeMonitoring) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_UPDATE;
		}
		//FORM_TYPE_TYPE_MONITORING_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_TYPE_MONITORING_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING, "TypeMonitoringLoadData", 
										  $this->InstanceTypeMonitoring) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW;
		}
		//FORM_TYPE_TYPE_MONITORING_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_MONITORING_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_MONITORING, 
														$this->InstanceTypeMonitoring) == ConfigInfraTools::SUCCESS)
			{
				$this->ExecuteFunction($_POST, 'TypeMonitoringUpdateByTypeMonitoringName', 
									   array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_MONITORING_NAME],
					                         &$this->InstanceTypeMonitoring),
									   $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW;	
			}
		}
		//FORM_TYPE_USER_SELECT_SUBMIT
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