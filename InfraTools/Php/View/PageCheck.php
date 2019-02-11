<?php
/************************************************************************
Class: PageCheck.php
Creation: 2016/09/30
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/Controller/InfraToolsFacedeBusiness.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for viewing and use the diagnostic functions of checking networking and such. 
Functions: 
			public    function LoadPage();	
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("InfraToolsFacedeBusiness"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedeBusiness.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedeBusiness.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedeBusiness');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageCheck extends PageInfraTools
{
	/* Propriedades de Classe */
	public $CheckedFunctionCheckBlackListRadioHost                      = "";
	public $CheckedFunctionCheckBlackListRadioIp                        = "";
	public $CheckedFunctionCheckPingServerRadioHost                     = "";
	public $CheckedFunctionCheckPingServerRadioIp                       = "";
	public $CheckedFunctionCheckPortStatusRadioHost                     = "";
	public $CheckedFunctionCheckPortStatusRadioIp                       = "";
	public $ExecutedFunction                                            = NULL;
	public $ExecutedFunctionReturn                                      = NULL;
	public $ExecutedFunctionReturnMessage                               = NULL;
	public $VisibilityFunctionCheckAvailability                         = "HiddenTab";
	public $VisibilityFunctionCheckAvailabilityMessage                  = "DivReturnMessageSuccess";
	public $VisibilityFunctionCheckAvailabilityMessageBottom            = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionCheckBlackList                            = "HiddenTab";
	public $VisibilityFunctionCheckBlackListHost                        = "Hidden";
	public $VisibilityFunctionCheckBlackListIp                          = "Hidden";
	public $VisibilityFunctionCheckBlackListMessage                     = "DivReturnMessageSuccess";
	public $VisibilityFunctionCheckBlackListMessageBottom               = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionCheckBlackListSubmit                      = "HiddenTab";
	public $VisibilityFunctionCheckDnsRecord                            = "HiddenTab";
	public $VisibilityFunctionCheckDnsRecordMessage                     = "DivReturnMessageSuccess";
	public $VisibilityFunctionCheckDnsRecordMessageBottom               = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionCheckEmailExists                          = "HiddenTab";
	public $VisibilityFunctionCheckEmailExistsMessage                   = "DivReturnMessageSuccess";
	public $VisibilityFunctionCheckEmailExistsMessageBottom             = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionCheckIpAddressIsInNetwork                 = "HiddenTab";
	public $VisibilityFunctionCheckIpAddressIsInNetworkMessage          = "DivReturnMessageSuccess";
	public $VisibilityFunctionCheckIpAddressIsInNetworkMessageBottom    = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionCheckPingServer                           = "HiddenTab";
	public $VisibilityFunctionCheckPingServerHost                       = "Hidden";
	public $VisibilityFunctionCheckPingServerIp                         = "Hidden";
	public $VisibilityFunctionCheckPingServerMessage                    = "DivReturnMessageSuccess";
	public $VisibilityFunctionCheckPingServerMessageBottom              = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionCheckPingServerSubmit                     = "HiddenTab";
	public $VisibilityFunctionCheckPortStatus                           = "HiddenTab";
	public $VisibilityFunctionCheckPortStatusHost                       = "Hidden";
	public $VisibilityFunctionCheckPortStatusIp                         = "Hidden";
	public $VisibilityFunctionCheckPortStatusMessage                    = "DivReturnMessageSuccess";
	public $VisibilityFunctionCheckPortStatusMessageBottom              = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionCheckPortStatusSubmit                     = "HiddenTab";
	
	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = TRUE;
		parent::__construct($Config, $Language, $Page);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	/**                               **/
	/************* METODOS *************/
	/**                               **/
	
	private function CheckPostBack()
	{
		if ($_POST != NULL)
		{
			//1 - CHECK HOST AVAILABILITY
			if(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY];
				$hostName = str_replace(" ", "", $hostName);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckAvailability($hostName,
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionCheckAvailabilityMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckAvailabilityMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY;
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY] = $hostName;
			}
			//2 - CHECK BLACKLIST (HOSTNAME / IP)
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                       ($this->InstanceLanguageText);
				$hostName     = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST];
				$ipAddress    = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP];
				if(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO]))
					$radioOption  = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO];
				if(!empty($radioOption))
				{
					if(!empty($hostName) && $radioOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO_HOST)
					{
						$hostName = str_replace(" ", "", $hostName);
						$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->CheckBlackListHost($hostName, 
																							 $this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
						{
							$this->VisibilityFunctionCheckBlackListMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckBlackListMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST] = $hostName;
					}
					elseif(!empty($ipAddress) && $radioOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO_IP)
					{
						$ipAddress = str_replace(" ", "", $ipAddress);
						$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->CheckBlackListIpAddress($ipAddress, 
																							 $this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
						{
							$this->VisibilityFunctionCheckBlackListMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckBlackListMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP] = $ipAddress;
					}
					else
					{
						$this->ExecutedFunctionReturnMessage = LanguageInfraTools::FILL_REQUIRED_FIELDS;
						$this->ExecutedFunctionReturn = ConfigInfraTools::RET_ERROR;
						$this->VisibilityFunctionCheckBlackListMessage = "DivReturnMessageError";
						$this->VisibilityFunctionCheckBlackListMessageBottom = "DivReturnMessageErrorBottom";
					}
				}
				else 
				{
					$this->ExecutedFunctionReturnMessage = LanguageInfraTools::NULL_OPTION;
					$this->ExecutedFunctionReturn = ConfigInfraTools::RET_ERROR;
					$this->VisibilityFunctionCheckBlackListMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckBlackListMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO;
			}
			//3 - CHECK DNS RECORD
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD];
				$recordType = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL];
				$hostName = str_replace(" ", "", $hostName);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckDnsRecord($hostName, $recordType, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionCheckDnsRecordMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckDnsRecordMessageBottom = "DivReturnMessageErrorBottom";
				}	
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD] = $hostName;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD;
			}
			//4 - CHECK E-MAIL EXISTS
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$email = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS];
				$email = str_replace(" ", "", $email);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckEmailExists($email, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionCheckEmailExistsMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckEmailExistsMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS] = $email;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS;

			}
			//5 - CHECK IP ADDRESS IS IN NETWORK
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP];
				$networkAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_NETWORK];
				$maskAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_MASK];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$networkAddress = str_replace(" ", "", $networkAddress);
				$maskAddress = str_replace(" ", "", $maskAddress);
				$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->CheckIpAddressIsInNetwork($ipAddress, 
																					  $networkAddress, 
																					  $maskAddress, 
																					  $this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionCheckIpAddressIsInNetworkMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckIpAddressIsInNetworkMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP] = $ipAddress;
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_NETWORK] = $networkAddress;
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_MASK] = $maskAddress;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP;
			}
			//6 - CHECK PING SERVER
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName  = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST];
				$ipAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP];
				if(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO]))
					$radioOption  = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO];
				if(!empty($radioOption))
				{
					if(!empty($hostName) && $radioOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO_HOST)
					{
						$hostName = str_replace(" ", "", $hostName);
						$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckPingServerHost($hostName, 
																							$this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
						{
							$this->VisibilityFunctionCheckPingServerMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckPingServerMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST] = $hostName;
					}
					elseif(!empty($ipAddress) && $radioOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO_IP)
					{
						$ipAddress = str_replace(" ", "", $ipAddress);
						$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckPingServerIpAddress($ipAddress, 
																							$this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
						{
							$this->VisibilityFunctionCheckPingServerMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckPingServerMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP] = $ipAddress;
					}
					else 
					{
						$this->ExecutedFunctionReturnMessage = LanguageInfraTools::FILL_REQUIRED_FIELDS;
						$this->ExecutedFunctionReturn = ConfigInfraTools::RET_ERROR;
						$this->VisibilityFunctionCheckPingServerMessage = "DivReturnMessageError";
						$this->VisibilityFunctionCheckPingServerMessageBottom = "DivReturnMessageErrorBottom";
					}
				}
				else 
				{
					$this->ExecutedFunctionReturnMessage = LanguageInfraTools::NULL_OPTION;
					$this->ExecutedFunctionReturn = ConfigInfraTools::RET_ERROR;
					$this->VisibilityFunctionCheckPingServerMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckPingServerMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO;
			}
			//7 - CHECK PORT STATUS
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName  = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST];
				$hostNamePortNumber = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT];
				$ipAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP];
				$ipAddressPortNumber = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT];
				if(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO]))
					$radioOption  = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO];
				if(!empty($radioOption))
				{
					if(!empty($hostName) && !empty($hostNamePortNumber) 
					   && $radioOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO_HOST)
					{
						$hostName = str_replace(" ", "", $hostName);
						$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckPortStatusHost($hostName, 
																							$hostNamePortNumber, 
																							$this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
						{
							$this->VisibilityFunctionCheckPortStatusMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckPortStatusMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST] = $hostName;
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT] = $hostNamePortNumber;
					}
					elseif(!empty($ipAddress) && !empty($ipAddressPortNumber)
						   && $radioOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO_IP)
					{
						$ipAddress = str_replace(" ", "", $ipAddress);
						$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckPortStatusIpAddress($ipAddress, 
																							$ipAddressPortNumber, 
																							$this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
						{
							$this->VisibilityFunctionCheckPortStatusMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckPortStatusMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP] = $ipAddress;
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT] = $ipAddressPortNumber;
					}
					else 
					{
						$this->ExecutedFunctionReturnMessage = LanguageInfraTools::FILL_REQUIRED_FIELDS;
						$this->ExecutedFunctionReturn = ConfigInfraTools::RET_ERROR;
						$this->VisibilityFunctionCheckPortStatusMessage = "DivReturnMessageError";
						$this->VisibilityFunctionCheckPortStatusMessageBottom = "DivReturnMessageErrorBottom";
					}
				}
				else 
				{
					$this->ExecutedFunctionReturnMessage = LanguageInfraTools::NULL_OPTION;
					$this->ExecutedFunctionReturn = ConfigInfraTools::RET_ERROR;
					$this->VisibilityFunctionCheckPortStatusMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckPortStatusMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO;
			}
		}
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::FIELD_LOGIN;
		$this->CheckPostBack();
		Page::GetCurrentURL($pageUrl);
		if(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_CHECK_AVAILABILITY) 
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY)
			$this->VisibilityFunctionCheckAvailability = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_CHECK_BLACKLIST)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO)
		{
			$this->VisibilityFunctionCheckBlackList = "NotHiddenTab";
			if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST]))
			{
				$this->CheckedFunctionCheckBlackListRadioHost = "checked";
				$this->VisibilityFunctionCheckBlackListHost = "NotHidden";
				$this->VisibilityFunctionCheckBlackListSubmit = "NotHidden";
			}
			if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP]))
			{
				$this->CheckedFunctionCheckBlackListRadioIp = "checked";
				$this->VisibilityFunctionCheckBlackListIp = "NotHidden";
				$this->VisibilityFunctionCheckBlackListSubmit = "NotHidden";
			}
		}
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_CHECK_DNS_RECORD)
		   || $this->ExecutedFunction == ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD)
			$this->VisibilityFunctionCheckDnsRecord = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_CHECK_EMAIL_EXISTS)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS)
			$this->VisibilityFunctionCheckEmailExists = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_CHECK_IP_ADDRESS_IS_IN_NETWORK)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP)
			$this->VisibilityFunctionCheckIpAddressIsInNetwork = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_CHECK_PING_SERVER)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO)
		{
			$this->VisibilityFunctionCheckPingServer = "NotHiddenTab";
			if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST]))
			{
				$this->CheckedFunctionCheckPingServerRadioHost = "checked";
				$this->VisibilityFunctionCheckPingServerHost = "NotHidden";
				$this->VisibilityFunctionCheckPingServerSubmit = "NotHidden";
			}
			if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP]))
			{
				$this->CheckedFunctionCheckPingServerRadioIp = "checked";
				$this->VisibilityFunctionCheckPingServerIp = "NotHidden";
				$this->VisibilityFunctionCheckPingServerSubmit = "NotHidden";
			}
		}
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_CHECK_PORT_STATUS)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO)
		{
			$this->VisibilityFunctionCheckPortStatus  = "NotHiddenTab";
			if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST]))
			{
				$this->CheckedFunctionCheckPortStatusRadioHost = "checked";
				$this->VisibilityFunctionCheckPortStatusHost = "NotHidden";
				$this->VisibilityFunctionCheckPortStatusSubmit = "NotHidden";
			}
			if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP]))
			{
				$this->CheckedFunctionCheckPortStatusRadioIp = "checked";
				$this->VisibilityFunctionCheckPortStatusIp = "NotHidden";
				$this->VisibilityFunctionCheckPortStatusSubmit = "NotHidden";
			}
		}
		if(!isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL]))
			$_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] = NULL;
		$this->LoadHtml(TRUE);
	}
}	
?>