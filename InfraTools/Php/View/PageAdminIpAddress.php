<?php
/************************************************************************
Class: PageAdminIpAddress.php
Creation: 2019/01/23
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for ip address management.
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
if (!class_exists("InfraToolsIpAddress"))
{
	if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsIpAddress.php"))
		include_once(SITE_PATH_PHP_MODEL . "InfraToolsIpAddress.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsIpAddress');
}


class PageAdminIpAddress extends PageAdmin
{
	public $ArrayInstanceIpAddress = NULL;
	public $InstanceIpAddress      = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SELECT;
		$this->InputValueIpAddressIpv4Radio = ConfigInfraTools::CHECKBOX_CHECKED;
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
		//FORM_IP_ADDRESS_LIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelect', 
									  array(&$this->ArrayInstanceIpAddress),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_LIST;
		}
		//FORM_IP_ADDRESS_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_REGISTER) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
		//FORM_IP_ADDRESS_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SELECT;
		//FORM_IP_ADDRESS_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressInsert', 
									  array(@$_POST[ConfigInfraTools::FORM_FIELD_IP_ADDRESS_DESCRIPTION],
											$_POST[ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV4],
										    $_POST[ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV6],
										    $_POST[ConfigInfraTools::FORM_FIELD_NETWORK_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
		}
		//FORM_IP_ADDRESS_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_SELECT) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SELECT;
		//FORM_IP_ADDRESS_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelectByIpAddressIpv4', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_IP_ADDRESS_ID],
											&$this->InstanceIpAddress),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW;
		}
		//FORM_IP_ADDRESS_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceIpAddress) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressDeleteByIpAddressIpv4', 
										  array($this->InstanceIpAddress),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SELECT;
			}
		}
		//FORM_IP_ADDRESS_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceIpAddress) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_UPDATE;
		}
		//FORM_IP_ADDRESS_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceIpAddress) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW;
		}
		//FORM_IP_ADDRESS_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_IP_ADDRESS_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, 
											   $this->InstanceIpAddress) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressUpdateByIpAddressIpv4', 
										  array($_POST[ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV4],
												@$_POST[ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV6],
												&$this->InstanceIpAddress),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_UPDATE;
			}
		}
		//FORM_TYPE_USER_SELECT
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