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
if (!class_exists("InfraToolsNetwork"))
{
	if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsNetwork.php"))
		include_once(SITE_PATH_PHP_MODEL . "InfraToolsNetwork.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsNetwork');
}


class PageAdminIpAddress extends PageAdmin
{
	public $ArrayInstanceInfraToolsIpAddress = NULL;
	public $ArrayInstanceInfraToolsNetwork   = NULL;
	public $InstanceIpAddress                = NULL;
	public $InstanceInfraToolsNetwork        = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
		$this->InputValueIpAddressIpv4Radio = ConfigInfraTools::CHECKBOX_CHECKED;
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
		//FM_IP_ADDRESS_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelect', 
									  array(&$this->ArrayInstanceInfraToolsIpAddress),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_LST;
		}
		//FM_IP_ADDRESS_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_REGISTER) == ConfigInfraTools::RET_OK)
		{
				$this->ExecuteFunction($_POST, 'InfraToolsNetworkSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsNetwork),
									  $this->InputValueHeaderDebug);
				$this->ShowDivReturnEmpty();
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
		}
		//FM_IP_ADDRESS_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
		//FM_IP_ADDRESS_REGISTER_FORM_NETWORK
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM_NETWORK) == ConfigInfraTools::RET_OK)
		{
			$this->ExecuteFunction($_POST, 'InfraToolsNetworkSelectByNetworkName', 
								   array($_POST[ConfigInfraTools::FIELD_NETWORK_NAME],
										 &$this->ArrayInstanceInfraToolsNetwork),
								   $this->InputValueHeaderDebug);
			$this->InstanceInfraToolsNetwork = array_pop($this->ArrayInstanceInfraToolsNetwork);
			$this->ArrayInstanceInfraToolsNetwork = NULL;
			$this->InfraToolsNetworkLoadData($this->InstanceInfraToolsNetwork);
			$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_NETWORK, $this->InstanceInfraToolsNetwork);
			$this->ExecuteFunction($_POST, 'InfraToolsNetworkSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsNetwork),
									  $this->InputValueHeaderDebug);
			$this->ShowDivReturnEmpty();
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
		}
		//FM_IP_ADDRESS_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			$return = NULL;
			if(isset($_POST[ConfigInfraTools::FIELD_NETWORK_IP]))
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsNetworkInsert', 
									  array($_POST[ConfigInfraTools::FIELD_NETWORK_IP],
											$_POST[ConfigInfraTools::FIELD_NETWORK_NAME],
										    $_POST[ConfigInfraTools::FIELD_NETWORK_NETMASK]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					$this->InstanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork($_POST[ConfigInfraTools::FIELD_NETWORK_IP],
											                                              $_POST[ConfigInfraTools::FIELD_NETWORK_NAME],
										                                                  $_POST[ConfigInfraTools::FIELD_NETWORK_NETMASK],
																						  date("Y-m-d H:i:s"));
					$return = ConfigInfraTools::RET_OK;
				}
				else $return = ConfigInfraTools::RET_ERROR;
			}
			else
			{
				$this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NETWORK, "InfraToolsNetworkLoadData", $this->InstanceInfraToolsNetwork);
				$return = ConfigInfraTools::RET_OK;
			}
			if($return == ConfigInfraTools::RET_OK)
			{
				if(!empty($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4]) && 
				   (!empty($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV6]) || !empty($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION])))
				{
					print_r($_POST);
					if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressInsert', 
											  array(@$_POST[ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION],
													$_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4],
													$_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV6],
													$this->InstanceInfraToolsNetwork),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
				}
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
			}
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
		}
		//FM_IP_ADDRESS_SEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_SEL) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
		//FM_IP_ADDRESS_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_RADIO]))
			{
				if($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_RADIO] == ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_IPV4)
				{
					if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelectByIpAddressIpv4', 
							  array($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4],
									&$this->ArrayInstanceInfraToolsIpAddress),
							  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->ShowDivReturnEmpty();
					
				}
				elseif($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_RADIO] == ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_IPV6)
				{
					if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelectByIpAddressIpv6', 
							  array($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV6],
									&$this->ArrayInstanceInfraToolsIpAddress),
							  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->ShowDivReturnEmpty();
				}
			}
			elseif(isset($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4]))
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelectByIpAddressIpv4', 
							  array($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4],
									&$this->ArrayInstanceInfraToolsIpAddress),
							  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->ShowDivReturnEmpty();
			}
			if(!empty($this->ArrayInstanceInfraToolsIpAddress))
			{
				if(count($this->ArrayInstanceInfraToolsIpAddress) > 1)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_LST;
				else
				{
					$this->InstanceIpAddress = array_pop($this->ArrayInstanceInfraToolsIpAddress);
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
												  $this->InstanceIpAddress) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW;
				}
			}
		}
		//FM_IP_ADDRESS_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceIpAddress) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressDeleteByIpAddressIpv4', 
										  array($this->InstanceIpAddress),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
			}
		}
		//FM_IP_ADDRESS_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceIpAddress) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_UPDT;
		}
		//FM_IP_ADDRESS_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceIpAddress) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW;
		}
		//FM_IP_ADDRESS_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, 
											   $this->InstanceIpAddress) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressUpdateByIpAddressIpv4', 
										  array($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4],
												@$_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV6],
												&$this->InstanceIpAddress),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_UPDT;
			}
		}
		//FM_TYPE_USER_SEL
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