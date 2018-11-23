<?php
/************************************************************************
Class: PageAdminMonitoring.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
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
	public $ArrayCountry = NULL;
	
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
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		
		//FORM_MONITORINGLIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'MonitoringSelect', 
									  array(&$this->ArrayInstanceMonitoring),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_LIST;
		}
		//FORM_MONITORING_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_REGISTER) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_REGISTER;
		}
		//FORM_MONITORING_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_SELECT;
		//FORM_MONITORING_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_SELECT;
		}
		//FORM_MONITORING_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_SELECT) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_SELECT;
		//FORM_MONITORING_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME] == NULL || 
			   $_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME] == ConfigInfraTools::FORM_SELECT_NONE)
			{
			}
			else
			{
			}
		}
		//FORM_MONITORING_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_MONITORING, "MonitoringLoadData", 
										  $this->InstanceMonitoring) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'MonitoringDelete', 
										  array($this->InstanceMonitoring->GetMonitoringId()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_SELECT;
			}
		}
		//FORM_MONITORING_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_MONITORING, "MonitoringLoadData", 
										  $this->InstanceMonitoring) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_UPDATE;
		}
		//FORM_MONITORING_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_MONITORING, "MonitoringLoadData", 
										  $this->InstanceMonitoring) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_VIEW;
		}
		//FORM_MONITORING_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_MONITORING_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_MONITORING, 
														$this->InstanceMonitoring) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'MonitoringUpdateByMonitoringId', 
									  array( $_POST[ConfigInfraTools::FORM_FIELD_MONITORING_INITIALS],
					                         $_POST[ConfigInfraTools::FORM_FIELD_MONITORING_NAME],
					                         $this->InstanceMonitoring,),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_MONITORING_VIEW;	
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>