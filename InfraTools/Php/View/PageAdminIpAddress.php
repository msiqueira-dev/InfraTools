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
			protected function BuildSmartyTags();
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
	protected $InputValueIpAddressIpv4Hidden           = "NotHidden";
	protected $InputValueIpAddressIpv6Hidden           = "Hidden";
	protected $NetworkInserted                         = FALSE;
	public    $ArrayInstanceInfraToolsIpAddress        = NULL;
	public    $ArrayInstanceInfraToolsIpAddressNetwork = NULL;
	public    $ArrayInstanceInfraToolsNetwork          = NULL;
	public    $InstanceInfraToolsIpAddress             = NULL;
	public    $InstanceInfraToolsNetwork               = NULL;
	
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
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_IP_ADDRESS", array($this->ArrayInstanceInfraToolsIpAddress));
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_NETWORK", array($this->ArrayInstanceInfraToolsNetwork));
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_NETWORK_IP", array($this->ArrayInstanceInfraToolsIpAddressNetwork));
			if(!is_array($this->ArrayInstanceInfraToolsIpAddress))
				$this->ArrayInstanceInfraToolsIpAddress = array();
			if(!is_array($this->ArrayInstanceInfraToolsNetwork))
				$this->ArrayInstanceInfraToolsNetwork = array();
			if(!is_array($this->ArrayInstanceInfraToolsIpAddressNetwork))
				$this->ArrayInstanceInfraToolsIpAddressNetwork = array();
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_USER", array($this->ArrayInstanceInfraToolsUser));
			$this->Smarty->assign('DIV_RADIO_IP_ADDRESS_IPV4', ConfigInfraTools::DIV_RADIO_IP_ADDRESS_IPV4);
			$this->Smarty->assign('DIV_RADIO_IP_ADDRESS_IPV6', ConfigInfraTools::DIV_RADIO_IP_ADDRESS_IPV6);
			$this->Smarty->assign('FIELD_RADIO_IP_ADDRESS', ConfigInfraTools::FIELD_RADIO_IP_ADDRESS);
			$this->Smarty->assign('FIELD_RADIO_IP_ADDRESS_IPV4', ConfigInfraTools::FIELD_RADIO_IP_ADDRESS_IPV4);
			$this->Smarty->assign('FIELD_RADIO_IP_ADDRESS_IPV4_VALUE', $this->InputValueIpAddressIpv4Radio);
			$this->Smarty->assign('FIELD_RADIO_IP_ADDRESS_IPV6', ConfigInfraTools::FIELD_RADIO_IP_ADDRESS_IPV6);
			$this->Smarty->assign('FIELD_RADIO_IP_ADDRESS_IPV6_VALUE', $this->InputValueIpAddressIpv6Radio);
			$this->Smarty->assign('FM_IP_ADDRESS', ConfigInfraTools::FM_IP_ADDRESS);
			$this->Smarty->assign('FM_IP_ADDRESS_LST', ConfigInfraTools::FM_IP_ADDRESS_LST);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_BY_IP_ADDRESS', ConfigInfraTools::FM_IP_ADDRESS_LST_BY_IP_ADDRESS);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_BY_IP_ADDRESS_BACK', ConfigInfraTools::FM_IP_ADDRESS_LST_BY_IP_ADDRESS_BACK);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_BY_IP_ADDRESS_FORM', ConfigInfraTools::FM_IP_ADDRESS_LST_BY_IP_ADDRESS_FORM);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_BY_IP_ADDRESS_FORWARD', ConfigInfraTools::FM_IP_ADDRESS_LST_BY_IP_ADDRESS_FORWARD);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_BY_NETWORK', ConfigInfraTools::FM_IP_ADDRESS_LST_BY_NETWORK);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_BY_NETWORK_BACK', ConfigInfraTools::FM_IP_ADDRESS_LST_BY_NETWORK_BACK);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_BY_NETWORK_FORM', ConfigInfraTools::FM_IP_ADDRESS_LST_BY_NETWORK_FORM);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_BY_NETWORK_FORWARD', ConfigInfraTools::FM_IP_ADDRESS_LST_BY_NETWORK_FORWARD);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_BACK', ConfigInfraTools::FM_IP_ADDRESS_LST_BACK);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_FORWARD', ConfigInfraTools::FM_IP_ADDRESS_LST_FORWARD);
			$this->Smarty->assign('FM_IP_ADDRESS_LST_FORM', ConfigInfraTools::FM_IP_ADDRESS_LST_FORM);
			$this->Smarty->assign('FM_IP_ADDRESS_SEL', ConfigInfraTools::FM_IP_ADDRESS_SEL);
			$this->Smarty->assign('FM_IP_ADDRESS_SEL_FORM', ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM);
			$this->Smarty->assign('FM_IP_ADDRESS_SEL_SB', ConfigInfraTools::FM_IP_ADDRESS_SEL_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_REGISTER', ConfigInfraTools::FM_IP_ADDRESS_REGISTER);
			$this->Smarty->assign('FM_IP_ADDRESS_REGISTER_CANCEL', ConfigInfraTools::FM_IP_ADDRESS_REGISTER_CANCEL);
			$this->Smarty->assign('FM_IP_ADDRESS_REGISTER_FORM', ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM);
			$this->Smarty->assign('FM_IP_ADDRESS_REGISTER_FORM_NETWORK', ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM_NETWORK);
			$this->Smarty->assign('FM_IP_ADDRESS_REGISTER_SB', ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_UPDT_IP_ADDRESS_CANCEL', ConfigInfraTools::FM_IP_ADDRESS_UPDT_IP_ADDRESS_CANCEL);
			$this->Smarty->assign('FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM', ConfigInfraTools::FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM);
			$this->Smarty->assign('FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB', ConfigInfraTools::FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_UPDT_NETWORK_CANCEL', ConfigInfraTools::FM_IP_ADDRESS_UPDT_NETWORK_CANCEL);
			$this->Smarty->assign('FM_IP_ADDRESS_UPDT_NETWORK_FORM', ConfigInfraTools::FM_IP_ADDRESS_UPDT_NETWORK_FORM);
			$this->Smarty->assign('FM_IP_ADDRESS_UPDT_NETWORK_SB', ConfigInfraTools::FM_IP_ADDRESS_UPDT_NETWORK_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_DEL', ConfigInfraTools::FM_IP_ADDRESS_VIEW_DEL);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_DEL_SB', ConfigInfraTools::FM_IP_ADDRESS_VIEW_DEL_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS_DEL', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_DEL);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS_DEL_SB', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_DEL_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_FORM', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_FORM);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_SB', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_SB_BACK', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_SB_BACK);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_SB_FORWARD', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_SB_FORWARD);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT_SB', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK', ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK_DEL', ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_DEL);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK_DEL_SB', ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_DEL_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS', ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_FORM', ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_FORM);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_SB', ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_SB);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_SB_BACK', ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_SB_BACK);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_SB_FORWARD', ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_SB_FORWARD);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK_UPDT', ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_UPDT);
			$this->Smarty->assign('FM_IP_ADDRESS_VIEW_NETWORK_UPDT_SB', ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_UPDT_SB);
			$this->Smarty->assign('HIDE_IP_ADDRESS_IPV4_CLASS', $this->InputValueIpAddressIpv4Hidden);
			$this->Smarty->assign('HIDE_IP_ADDRESS_IPV6_CLASS', $this->InputValueIpAddressIpv6Hidden);
			$this->Smarty->assign('IP_ADDRESS_TEXT', $this->InstanceLanguageText->GetText('IP_ADDRESS'));
			$this->Smarty->assign('NETWORK_TEXT', $this->InstanceLanguageText->GetText('NETWORK'));
			$this->Smarty->assign('SUBMIT_LST_USERS_IP_ADDRESS', $this->InstanceLanguageText->GetText('SUBMIT_LST_USERS_IP_ADDRESS'));
			$this->Smarty->assign('SUBMIT_LST_USERS_NETWORK', $this->InstanceLanguageText->GetText('SUBMIT_LST_USERS_NETWORK'));
			$this->Smarty->assign('SUBMIT_UPDT_IP_ADDRESS', $this->InstanceLanguageText->GetText('SUBMIT_UPDT_IP_ADDRESS'));
			$this->Smarty->assign('SUBMIT_UPDT_NETWORK', $this->InstanceLanguageText->GetText('SUBMIT_UPDT_NETWORK'));
			if(isset($this->ReturnNetworkIpClass)) 
				$this->Smarty->assign('RETURN_NETWORK_IP_CLASS', $this->ReturnNetworkIpClass);
			else $this->Smarty->assign('RETURN_NETWORK_IP_CLASS', NULL);
			if(isset($this->ReturnNetworkIpText)) 
				$this->Smarty->assign('RETURN_NETWORK_IP_TEXT', $this->ReturnNetworkIpText);
			else $this->Smarty->assign('RETURN_NETWORK_IP_TEXT', NULL); 
			if(isset($this->ReturnNetworkNetmaskClass)) 
				$this->Smarty->assign('RETURN_NETWORK_NETMASK_CLASS', $this->ReturnNetworkNetmaskClass);
			else $this->Smarty->assign('RETURN_NETWORK_NETMASK_CLASS', NULL);
			if(isset($this->ReturnNetworkNetmaskText)) 
				$this->Smarty->assign('RETURN_NETWORK_NETMASK_TEXT', $this->ReturnNetworkNetmaskText);
			else $this->Smarty->assign('RETURN_NETWORK_NETMASK_TEXT', NULL); 
			if($this->InputValueNetworkName != ConfigInfraTools::FIELD_SEL_NONE)
				$this->Smarty->assign('FIELD_SEL_NONE', FALSE);
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;
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
											&$this->InstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FM_DEPARTMENT_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName',
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME], 
											$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
										    &$this->ArrayInstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					if(count($this->ArrayInstanceInfraToolsDepartment) == 1)
					{
						$this->InstanceInfraToolsDepartment = array_pop($this->ArrayInstanceInfraToolsDepartment);
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
														$this->InstanceInfraToolsDepartment) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					}
				}
		}
		//FM_IP_ADDRESS_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_LST) == ConfigInfraTools::RET_OK)
		{
			$return1 = NULL; $return2 = NULL; $found = false;
			$return1 = $this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelect', 
									  array(&$this->ArrayInstanceInfraToolsIpAddress),
									  $this->InputValueHeaderDebug);
			$return2 = $this->ExecuteFunction($_POST, 'InfraToolsNetworkSelect', 
									  array(&$this->ArrayInstanceInfraToolsNetwork),
									  $this->InputValueHeaderDebug);
			if($return1 == ConfigInfraTools::RET_OK || $return2 == ConfigInfraTools::RET_OK)
			{
				$this->ArrayInstanceInfraToolsIpAddressNetwork = array();
				if(count($this->ArrayInstanceInfraToolsIpAddress) > 0)
				{
					$this->ArrayInstanceInfraToolsIpAddressNetwork = $this->ArrayInstanceInfraToolsIpAddress;
					if(count($this->ArrayInstanceInfraToolsNetwork) > 0)
					{
						foreach($this->ArrayInstanceInfraToolsNetwork as $network)
						{
							foreach($this->ArrayInstanceInfraToolsIpAddress as $ipAddressNetwork)
							{
								if($ipAddressNetwork->GetIpAddressInstanceInfraToolsNetworkNetworkName() == $network->GetNetworkName())
									$found = true;
							}
							if(!$found) array_push($this->ArrayInstanceInfraToolsIpAddressNetwork, $network);
							$found = false;
						}	
					}
				}
				elseif(count($this->ArrayInstanceInfraToolsNetwork) > 0)
					$this->ArrayInstanceInfraToolsIpAddressNetwork = $this->ArrayInstanceInfraToolsNetwork;
				else{$this->ArrayInstanceInfraToolsIpAddressNetwork = NULL;}
				$this->InputValueRowCount = count($this->ArrayInstanceInfraToolsIpAddressNetwork);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_LST;
			}
			else { $this->ShowDivReturnWarning('TABLE_EMPTY'); }
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_LST;
		}
		//FM_IP_ADDRESS_LST_BY_IP_ADDRESS
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_LST_BY_IP_ADDRESS) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelect', 
									        array(&$this->ArrayInstanceInfraToolsIpAddress),
												  $this->InputValueHeaderDebug) != ConfigInfraTools::RET_OK)
				$this->ShowDivReturnWarning('TABLE_EMPTY');
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_LST_BY_IP_ADDRESS;
		}
		//FM_IP_ADDRESS_LST_BY_NETWORK
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_LST_BY_NETWORK) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsNetworkSelect', 
								            array(&$this->ArrayInstanceInfraToolsNetwork),
												  $this->InputValueHeaderDebug) != ConfigInfraTools::RET_OK)
				$this->ShowDivReturnWarning('TABLE_EMPTY');
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_LST_BY_NETWORK;
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
			if($this->ExecuteFunction($_POST, 'InfraToolsNetworkSelectByNetworkName', 
								   array($_POST[ConfigInfraTools::FIELD_NETWORK_NAME],
										 &$this->ArrayInstanceInfraToolsNetwork),
								   $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				$this->InstanceInfraToolsNetwork = array_pop($this->ArrayInstanceInfraToolsNetwork);
				$this->ArrayInstanceInfraToolsNetwork = NULL;
				$this->InfraToolsNetworkLoadData($this->InstanceInfraToolsNetwork);
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_NETWORK, $this->InstanceInfraToolsNetwork);
			}
			$this->ExecuteFunction($_POST, 'InfraToolsNetworkSelectNoLimit', 
			                       array(&$this->ArrayInstanceInfraToolsNetwork), $this->InputValueHeaderDebug);
			$this->ShowDivReturnEmpty();
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
		}
		//FM_IP_ADDRESS_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FIELD_NETWORK_IP]) && isset($_POST[ConfigInfraTools::FIELD_NETWORK_NAME]) && 
			   isset($_POST[ConfigInfraTools::FIELD_NETWORK_NETMASK]))
			{
				if($_POST[ConfigInfraTools::FIELD_NETWORK_IP] != "" && $_POST[ConfigInfraTools::FIELD_NETWORK_NAME] != "" &&
				   $_POST[ConfigInfraTools::FIELD_NETWORK_NETMASK] != "")
				{
					if($this->ExecuteFunction($_POST, 'InfraToolsNetworkInsert', 
										array($_POST[ConfigInfraTools::FIELD_NETWORK_IP],
											  $_POST[ConfigInfraTools::FIELD_NETWORK_NAME],
											  $_POST[ConfigInfraTools::FIELD_NETWORK_NETMASK]),
										$this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					{
						$this->NetworkInserted = true;
						$this->InstanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork(
							                                    $_POST[ConfigInfraTools::FIELD_NETWORK_IP], 
																$_POST[ConfigInfraTools::FIELD_NETWORK_NAME], 
																$_POST[ConfigInfraTools::FIELD_NETWORK_NETMASK], 
																date("Y-m-d H:i:s"));
						$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_NETWORK, $this->InstanceInfraToolsNetwork);
						$this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NETWORK, "InfraToolsNetworkLoadData", 
												   $this->InstanceInfraToolsNetwork);
					}
				}
			} 
			else $this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NETWORK, "InfraToolsNetworkLoadData", 
											$this->InstanceInfraToolsNetwork);
			if(is_object($this->InstanceInfraToolsNetwork))
			{
				if(!empty($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4]) || !empty($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV6]))
				{
					$this->ReturnEmptyText = "";
					$this->ReturnText = "";
					$this->ReturnNetworkIpText = "";
					$this->ReturnNetworkNameText = "";
					$this->ReturnNetworkNetMaskText = "";
					if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressInsert', 
											  array(@$_POST[ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION],
													@$_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4],
													@$_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV6],
													$this->InstanceInfraToolsNetwork,
												    TRUE),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
				}
				else
				{
					if($this->NetworkInserted == FALSE)
					{
						$this->ExecuteFunction($_POST, 'InfraToolsNetworkSelectNoLimit', 
										array(&$this->ArrayInstanceInfraToolsNetwork),
										$this->InputValueHeaderDebug);
						$this->ShowDivReturnError('FM_INVALID_IP_ADDRESS_EMPTY');
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
					}
				}
			}
			else 
			{
				$this->ExecuteFunction($_POST, 'InfraToolsNetworkSelectNoLimit', 
									array(&$this->ArrayInstanceInfraToolsNetwork),
									$this->InputValueHeaderDebug);
				$this->ShowDivReturnError('FM_INVALID_NETWOR_EMPTY');
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_REGISTER;
			}
		}
		//FM_IP_ADDRESS_SEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_SEL) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
		//FM_IP_ADDRESS_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FIELD_RADIO_IP_ADDRESS]))
			{
				if($_POST[ConfigInfraTools::FIELD_RADIO_IP_ADDRESS] == ConfigInfraTools::FIELD_RADIO_IP_ADDRESS_IPV4)
				{
					$this->InputValueIpAddressIpv4Radio = ConfigInfraTools::CHECKBOX_CHECKED;
					$this->InputValueIpAddressIpv6Radio = "";
					$this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelectByIpAddressIpv4', 
										   array($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4],
											     &$this->ArrayInstanceInfraToolsIpAddress),
										   $this->InputValueHeaderDebug);
					$this->InputValueIpAddressIpv4Hidden = "NotHidden";
					$this->InputValueIpAddressIpv6Hidden = "Hidden";
				}
				elseif($_POST[ConfigInfraTools::FIELD_RADIO_IP_ADDRESS] == ConfigInfraTools::FIELD_RADIO_IP_ADDRESS_IPV6)
				{
					$this->InputValueIpAddressIpv4Radio = "";
					$this->InputValueIpAddressIpv6Radio = ConfigInfraTools::CHECKBOX_CHECKED;
					$this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelectByIpAddressIpv6', 
										   array($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV6],
											     &$this->ArrayInstanceInfraToolsIpAddress),
										   $this->InputValueHeaderDebug);
					$this->InputValueIpAddressIpv4Hidden = "Hidden";
					$this->InputValueIpAddressIpv6Hidden = "NotHidden";
				}
			}
			elseif($this->CheckPostContainsKey(ConfigInfraTools::FIELD_IP_ADDRESS_IPV4) == ConfigInfraTools::RET_OK)
			{
				$this->ExecuteFunction($_POST, 'InfraToolsIpAddressSelectByIpAddressIpv4', 
									   array($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4],
													&$this->ArrayInstanceInfraToolsIpAddress),
									   $this->InputValueHeaderDebug);
				
			}
			if(!empty($this->ArrayInstanceInfraToolsIpAddress))
			{
				if(count($this->ArrayInstanceInfraToolsIpAddress) > 1)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_LST;
				else
				{
					$this->InstanceInfraToolsIpAddress = array_pop($this->ArrayInstanceInfraToolsIpAddress);
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
													$this->InstanceInfraToolsIpAddress) == ConfigInfraTools::RET_OK)
					{
						$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, $this->InstanceInfraToolsIpAddress);
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW_IP_ADDRESS;
						$this->ShowDivReturnEmpty();
					}
				}
			}
		}
		//FM_IP_ADDRESS_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceInfraToolsIpAddress) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressDeleteByIpAddressIpv4', 
										  array($this->InstanceInfraToolsIpAddress),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
			}
		}
		//FM_IP_ADDRESS_VIEW_IP_ADDRESS_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceInfraToolsIpAddress) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressDeleteByIpAddressIpv4', 
										  array($this->InstanceInfraToolsIpAddress),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
			}
		}
		//FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsNetworkLoadData", 
										  $this->InstanceInfraToolsIpAddress) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByIpAddressIpv4', 
										  array($this->InstanceInfraToolsIpAddress->GetIpAddressIpv4(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW_USERS_IP_ADDRESS;
			}
		}
		//FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceInfraToolsIpAddress) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_UPDT_IP_ADDRESS;
		}
		//FM_IP_ADDRESS_VIEW_NETWORK_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NETWORK, "InfraToolsNetworkLoadData", 
										  $this->InstanceInfraToolsNetwork) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsNetworkDeleteByNetworkName', 
										  array($this->InstanceInfraToolsNetwork),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_SEL;
			}
		}
		//FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NETWORK, "InfraToolsNetworkLoadData", 
											   $this->InstanceInfraToolsNetwork) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByNetworkName', 
										  array($this->InstanceInfraToolsNetwork->GetNetworkName(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW_USERS_NETWORK;
			}
		}
		//FM_IP_ADDRESS_VIEW_NETWORK_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NETWORK, "InfraToolsNetworkLoadData", 
										  $this->InstanceInfraToolsNetwork) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_UPDT_NETWORK;
		}
		//FM_IP_ADDRESS_UPDT_IP_ADDRESS_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_UPDT_IP_ADDRESS_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceInfraToolsIpAddress) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW_IP_ADDRESS;
		}
		//FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsNetworkLoadData", 
											   $this->InstanceInfraToolsIpAddress) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsIpAddressUpdateByIpAddressIpv4', 
										  array($_POST[ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION],
												$_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV4],
												$_POST[ConfigInfraTools::FIELD_IP_ADDRESS_IPV6],
												@$_POST[ConfigInfraTools::FIELD_NETWORK_NAME],
												&$this->InstanceInfraToolsIpAddress),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW_IP_ADDRESS;	
				else 
				{
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_IP_ADDRESS, "InfraToolsIpAddressLoadData", 
										  $this->InstanceInfraToolsIpAddress) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_UPDT_IP_ADDRESS;
				}
			}
		}
		//FM_IP_ADDRESS_UPDT_NETWORK_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_UPDT_NETWORK_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NETWORK, "InfraToolsNetworkLoadData", 
										  $this->InstanceInfraToolsNetwork) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW_NETWORK;
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_NETWORK, $this->InstanceInfraToolsNetwork);
			}
		}
		//FM_IP_ADDRESS_UPDT_NETWORK_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_IP_ADDRESS_UPDT_NETWORK_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NETWORK, "InfraToolsNetworkLoadData", 
												  $this->InstanceInfraToolsNetwork) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsNetworkUpdateByNetworkName', 
										  array($_POST[ConfigInfraTools::FIELD_NETWORK_IP],
												$_POST[ConfigInfraTools::FIELD_NETWORK_NAME],
												$_POST[ConfigInfraTools::FIELD_NETWORK_NETMASK],
												$this->InstanceInfraToolsNetwork->GetNetworkName(),
												&$this->InstanceInfraToolsNetwork, TRUE),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW_NETWORK;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_UPDT_NETWORK;
			}
		}
		//FIELD_NETWORK_NAME
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FIELD_NETWORK_NAME) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsNetworkSelectByNetworkName', 
									  array($_POST[ConfigInfraTools::FIELD_NETWORK_NAME],
									        &$this->ArrayInstanceInfraToolsNetwork),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				$this->ShowDivReturnEmpty();
				if(count($this->ArrayInstanceInfraToolsNetwork) > 1)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_LST_BY_NETWORK;
				else
				{
					$this->ArrayInstanceInfraToolsNetwork = array_pop($this->ArrayInstanceInfraToolsNetwork);
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NETWORK, "InfraToolsNetworkLoadData", 
												  $this->ArrayInstanceInfraToolsNetwork) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS_VIEW_NETWORK;
				}
			}
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
									        &$this->ArrayInstanceInfraToolsTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					
					if(count($this->ArrayInstanceInfraToolsTypeUser) == 1)
					{
						$this->InstanceInfraToolsTypeUser = array_pop($this->ArrayInstanceInfraToolsTypeUser);
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
														$this->InstanceInfraToolsTypeUser) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
					}
				}
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
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>