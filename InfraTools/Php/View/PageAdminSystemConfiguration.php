<?php
/************************************************************************
Class: PageAdminSystemConfiguration.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
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
if (!class_exists("SystemConfiguration"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "SystemConfiguration.php"))
		include_once(BASE_PATH_PHP_MODEL . "SystemConfiguration.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class SystemConfiguration');
}


class PageAdminSystemConfiguration extends PageAdmin
{
	public $ArrayInstanceSystemConfiguration          = NULL;
	public $InstanceSystemConfiguration               = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT;
		$this->InputValueSystemConfigurationOptionNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
		$this->ReturnSystemConfigurationOptionNameRadioClass   = "NotHidden";
		$this->ReturnSystemConfigurationOptionNumberRadioClass = "Hidden";
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
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER;
		//FORM_SYSTEM_CONFIGURATION_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT;
		//FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'SystemConfigurationInsert', 
									  array(@$_POST[Config::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE],
											$_POST[Config::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION],
											$_POST[Config::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME],
											$_POST[Config::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER;
		}
		//FORM_SYSTEM_CONFIGURATION_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT;
		//FORM_SYSTEM_CONFIGURATION_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_RADIO_SYSTEM_CONFIGURATION]))
			{
				if($_POST[ConfigInfraTools::FORM_FIELD_RADIO_SYSTEM_CONFIGURATION] ==
				          ConfigInfraTools::FORM_FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME)
				{
					$this->ReturnSystemConfigurationOptionNameRadioClass   = "NotHidden";
					$this->ReturnSystemConfigurationOptionNumberRadioClass = "Hidden";
					$_POST = array(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST => ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST) 
						     + $_POST;
					if($this->ExecuteFunction($_POST, 'SystemConfigurationSelectBySystemConfigurationOptionName', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME],
													&$this->ArrayInstanceSystemConfiguration),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					{
						if(count($this->ArrayInstanceSystemConfiguration) > 1)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_LIST;	
						else
						{
							$this->InstanceSystemConfiguration = array_pop($this->ArrayInstanceSystemConfiguration);
							if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, "SystemConfigurationLoadData", 
														  $this->InstanceSystemConfiguration) == ConfigInfraTools::SUCCESS)
								$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;
						}
					}
				}
				else
				{
					$this->ReturnSystemConfigurationOptionNameRadioClass   = "Hidden";
					$this->ReturnSystemConfigurationOptionNumberRadioClass = "NotHidden";
					$this->InputValueSystemConfigurationOptionNumberRadio = ConfigInfraTools::CHECKBOX_CHECKED;
					if($this->ExecuteFunction($_POST, 'SystemConfigurationSelectBySystemConfigurationOptionNumber', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER],
													&$this->InstanceSystemConfiguration),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;
				}
			}
			else
			{
				$this->InputValueSystemConfigurationOptionNumberRadio = ConfigInfraTools::CHECKBOX_CHECKED;
				if($this->ExecuteFunction($_POST, 'SystemConfigurationSelectBySystemConfigurationOptionNumber', 
										  array($_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER],
												&$this->InstanceSystemConfiguration),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;
			}
		}
		//FORM_SYSTEM_CONFIGURATION_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, "SystemConfigurationLoadData", 
										  $this->InstanceSystemConfiguration) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'SystemConfigurationDeleteBySystemConfigurationOptionNumber', 
										  array($this->InstanceSystemConfiguration),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT;
			}
		}
		//FORM_SYSTEM_CONFIGURATION_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, "SystemConfigurationLoadData", 
										  $this->InstanceSystemConfiguration) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDATE;
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
				if($this->ExecuteFunction($_POST, 'SystemConfigurationUpdateBySystemConfigurationOptionNumber', 
										  array(@$_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE],
												$_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION],
												$_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME],
												$_POST[ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE],
					                            &$this->InstanceSystemConfiguration),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDATE;
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>