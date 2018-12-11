<?php
/************************************************************************
Class: PageAdminSystemConfiguration.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class for system configuration management.
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

class PageAdminSystemConfiguration extends PageAdmin
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
		//FORM_SYSTEM_CONFIGURATION_LIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'SystemConfigurationSelect', 
									  array(&$this->ArrayInstanceSystemConfiguration),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_LIST;
		}
		//FORM_SYSTEM_CONFIGURATION_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEMC_CONFIGURATION_REGISTER;
		//FORM_SYSTEM_CONFIGURATION_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT;
		//FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'SystemConfigurationInsert', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_ACTIVE],
										    $_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION],
										    $_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT;
		}
		//FORM_SYSTEM_CONFIGURATION_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_SELECT) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SELECT;
		//FORM_SYSYTEM_CONFIGURATION_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'SystemConfigurationSelectBySystemConfigurationOptionName', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME],
											&$this->InstanceArraySystemConfiguration),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if(count($this->ArrayInstanceSystemConfiguration) > 1)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_LIST;	
				else
				{
					$this->InstanceSystemConfiguration = array_pop($this->ArraySystemConfiguration);
				}
			}
		}
		//FORM_SYSTEM_CONFIGURATION_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "SystemConfigurationLoadData", 
										  $this->InstanceNotification) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'SystemConfigurationDeleteBySystemConfigurationOptionName', 
										  array($this->InstanceNotification->GetNotificationId()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SELECT;
			}
		}
		//FORM_NOTIFICATION_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, "SystemConfigurationLoadData", 
										  $this->InstanceSystemConfiguration) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEMC_CONFIGURATION_UPDATE;
		}
		//FORM_SYSTEM_CONFIGURATION_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, "SystemConfigurationLoadData", 
										  $this->InstanceSystemConfiguration) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;
		}
		//FORM_SYSTEM_CONFIGURATION_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, 
											   $this->InstanceSystemConfiguration) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'SystemConfigurationUpdateBySystemConfigurationOptionName', 
										  array($this->InstanceSystemConfiguration->GetSystemConfigurationOptionName()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;	
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>