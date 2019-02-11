<?php
/************************************************************************
Class: PageAdminSystemConfiguration.php
Creation: 2018/06/04
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL;
		$this->InputValueSystemConfigurationOptionNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
		$this->ReturnSystemConfigurationOptionNameRadioClass   = "NotHidden";
		$this->ReturnSystemConfigurationOptionNumberRadioClass = "Hidden";
		$this->AdminGoBack($PageFormBack);
		
		//FM_SYSTEM_CONFIGURATION_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'SystemConfigurationSelect', 
									  array(&$this->ArrayInstanceSystemConfiguration),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_LST;
		}
		//FM_SYSTEM_CONFIGURATION_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_REGISTER) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER;
		//FM_SYSTEM_CONFIGURATION_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL;
		//FM_SYSTEM_CONFIGURATION_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'SystemConfigurationInsert', 
									  array(@$_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE],
											$_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION],
											$_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME],
											$_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER;
		}
		//FM_SYSTEM_CONFIGURATION_SEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL;
		//FM_SYSTEM_CONFIGURATION_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FIELD_RADIO_SYSTEM_CONFIGURATION]))
			{
				if($_POST[ConfigInfraTools::FIELD_RADIO_SYSTEM_CONFIGURATION] ==
				          ConfigInfraTools::FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME)
				{
					$this->ReturnSystemConfigurationOptionNameRadioClass   = "NotHidden";
					$this->ReturnSystemConfigurationOptionNumberRadioClass = "Hidden";
					$_POST = array(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_LST => ConfigInfraTools::FM_SYSTEM_CONFIGURATION_LST) 
						     + $_POST;
					if($this->ExecuteFunction($_POST, 'SystemConfigurationSelectBySystemConfigurationOptionName', 
											  array($_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME],
													&$this->ArrayInstanceSystemConfiguration),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					{
						if(count($this->ArrayInstanceSystemConfiguration) > 1)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_LST;	
						else
						{
							$this->InstanceSystemConfiguration = array_pop($this->ArrayInstanceSystemConfiguration);
							if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, "SystemConfigurationLoadData", 
														  $this->InstanceSystemConfiguration) == ConfigInfraTools::RET_OK)
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
											  array($_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER],
													&$this->InstanceSystemConfiguration),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;
				}
			}
			else
			{
				$this->InputValueSystemConfigurationOptionNumberRadio = ConfigInfraTools::CHECKBOX_CHECKED;
				if($this->ExecuteFunction($_POST, 'SystemConfigurationSelectBySystemConfigurationOptionNumber', 
										  array($_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER],
												&$this->InstanceSystemConfiguration),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;
			}
		}
		//FM_SYSTEM_CONFIGURATION_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, "SystemConfigurationLoadData", 
										  $this->InstanceSystemConfiguration) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'SystemConfigurationDeleteBySystemConfigurationOptionNumber', 
										  array($this->InstanceSystemConfiguration),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL;
			}
		}
		//FM_SYSTEM_CONFIGURATION_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, "SystemConfigurationLoadData", 
										  $this->InstanceSystemConfiguration) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDT;
		}
		//FM_SYSTEM_CONFIGURATION_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, "SystemConfigurationLoadData", 
										  $this->InstanceSystemConfiguration) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;
		}
		//FM_SYSTEM_CONFIGURATION_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SYSTEM_CONFIGURATION_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_SYSTEM_CONFIGURATION, 
											   $this->InstanceSystemConfiguration) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'SystemConfigurationUpdateBySystemConfigurationOptionNumber', 
										  array(@$_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE],
												$_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION],
												$_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME],
												$_POST[ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE],
					                            &$this->InstanceSystemConfiguration),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDT;
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>