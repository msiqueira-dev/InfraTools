<?php
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageDiagnosticTools extends PageInfraTools
{	
	/* Propriedades de Classe */
	private $CheckedFunctionCheckBlackListRadioHost                      = "";
	private $CheckedFunctionCheckBlackListRadioIp                        = "";
	private $CheckedFunctionCheckPingServerRadioHost                     = "";
	private $CheckedFunctionCheckPingServerRadioIp                       = "";
	private $CheckedFunctionCheckPortStatusRadioHost                     = "";
	private $CheckedFunctionCheckPortStatusRadioIp                       = "";
	private $CheckedFunctionGetWhoisRadioHost                            = "";
	private $CheckedFunctionGetWhoisRadioIp                              = "";
	private $ExecutedFunction                                            = NULL;
	private $ExecutedFunctionReturn                                      = NULL;
	private $ExecutedFunctionReturnMessage                               = NULL;
	private $SelectedFunctionGetDnsRecords                               = "";
	private $SelectedFunctionGetService                                  = "";
	private $SelectedFunctionGetWebSite                                  = "";
	private $VisibilityFunctionCheckAvailability                         = "HiddenTab";
	private $VisibilityFunctionCheckAvailabilityMessage                  = "DivReturnMessageSuccess";
	private $VisibilityFunctionCheckAvailabilityMessageBottom            = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionCheckBlackList                            = "HiddenTab";
	private $VisibilityFunctionCheckBlackListHost                        = "Hidden";
	private $VisibilityFunctionCheckBlackListIp                          = "Hidden";
	private $VisibilityFunctionCheckBlackListMessage                     = "DivReturnMessageSuccess";
	private $VisibilityFunctionCheckBlackListMessageBottom               = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionCheckBlackListSubmit                      = "HiddenTab";
	private $VisibilityFunctionCheckDnsRecord                            = "HiddenTab";
	private $VisibilityFunctionCheckDnsRecordMessage                     = "DivReturnMessageSuccess";
	private $VisibilityFunctionCheckDnsRecordMessageBottom               = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionCheckEmailExists                          = "HiddenTab";
	private $VisibilityFunctionCheckEmailExistsMessage                   = "DivReturnMessageSuccess";
	private $VisibilityFunctionCheckEmailExistsMessageBottom             = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionCheckIpAddressIsInNetwork                 = "HiddenTab";
	private $VisibilityFunctionCheckIpAddressIsInNetworkMessage          = "DivReturnMessageSuccess";
	private $VisibilityFunctionCheckIpAddressIsInNetworkMessageBottom    = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionCheckPingServer                           = "HiddenTab";
	private $VisibilityFunctionCheckPingServerHost                       = "Hidden";
	private $VisibilityFunctionCheckPingServerIp                         = "Hidden";
	private $VisibilityFunctionCheckPingServerMessage                    = "DivReturnMessageSuccess";
	private $VisibilityFunctionCheckPingServerMessageBottom              = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionCheckPingServerSubmit                     = "HiddenTab";
	private $VisibilityFunctionCheckPortStatus                           = "HiddenTab";
	private $VisibilityFunctionCheckPortStatusHost                       = "Hidden";
	private $VisibilityFunctionCheckPortStatusIp                         = "Hidden";
	private $VisibilityFunctionCheckPortStatusMessage                    = "DivReturnMessageSuccess";
	private $VisibilityFunctionCheckPortStatusMessageBottom              = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionCheckPortStatusSubmit                     = "HiddenTab";
	private $VisibilityFunctionGetCalculationNetMask                     = "HiddenTab";
	private $VisibilityFunctionGetCalculationNetMaskMessage              = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetCalculationNetMaskMessageBottom        = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetDnsRecords                             = "HiddenTab";
	private $VisibilityFunctionGetDnsRecordsMessage                      = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetDnsRecordsMessageBottom                = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetHostname                               = "HiddenTab";
	private $VisibilityFunctionGetHostnameMessage                        = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetHostnameMessageBottom                  = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetIpAddresses                            = "HiddenTab";
	private $VisibilityFunctionGetIpAddressesMessage                     = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetIpAddressesMessageBottom               = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetLocation                               = "HiddenTab";
	private $VisibilityFunctionGetLocationMessage                        = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetLocationMessageBottom                  = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetProtocol                               = "HiddenTab";
	private $VisibilityFunctionGetProtocolMessage                        = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetProtocolMessageBottom                  = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetRoute                                  = "HiddenTab";
	private $VisibilityFunctionGetRouteMessage                           = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetRouteMessageBottom                     = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetService                                = "HiddenTab";
	private $VisibilityFunctionGetServiceMessage                         = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetServiceMessageBottom                   = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetWebSite                                = "HiddenTab";
	private $VisibilityFunctionGetWebSiteMessage                         = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetWebSiteMessageBottom                   = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetWhois                                  = "HiddenTab";
	private $VisibilityFunctionGetWhoisMessage                           = "DivReturnMessageSuccess";
	private $VisibilityFunctionGetWhoisMessageBottom                     = "DivReturnMessageSuccessBottom";
	private $VisibilityFunctionGetWhoisHost                              = "Hidden";
	private $VisibilityFunctionGetWhoisIp                                = "Hidden";
	private $VisibilityFunctionGetWhoisSubmit                            = "HiddenTab";
	
	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = TRUE;
		parent::__construct($Language);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}
	
	private function CheckPostBack()
	{
		if ($_POST != NULL)
		{
			//1 - CHECK HOST AVAILABILITY
			if(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName = $_POST[ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_INPUT];
				$hostName = str_replace(" ", "", $hostName);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckAvailability($hostName,
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionCheckAvailabilityMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckAvailabilityMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_HIDDEN;
				$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_INPUT] = $hostName;
			}
			//2 - CHECK BLACKLIST (HOSTNAME / IP)
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                       ($this->InstanceLanguageText);
				$hostName     = $_POST[ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_INPUT_HOST];
				$ipAddress    = $_POST[ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_INPUT_IP];
				if(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_RADIO]))
					$radioOption  = $_POST[ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_RADIO];
				if(!empty($radioOption))
				{
					if(!empty($hostName) && $radioOption == ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_RADIO_HOST)
					{
						$hostName = str_replace(" ", "", $hostName);
						$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->CheckBlackListHost($hostName, 
																							 $this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
						{
							$this->VisibilityFunctionCheckBlackListMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckBlackListMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_INPUT_HOST] = $hostName;
					}
					elseif(!empty($ipAddress) && $radioOption == ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_RADIO_IP)
					{
						$ipAddress = str_replace(" ", "", $ipAddress);
						$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->CheckBlackListIpAddress($ipAddress, 
																							 $this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
						{
							$this->VisibilityFunctionCheckBlackListMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckBlackListMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_INPUT_IP] = $ipAddress;
					}
					else
					{
						$this->ExecutedFunctionReturnMessage = LanguageInfraTools::FILL_REQUIRED_FIELDS;
						$this->ExecutedFunctionReturn = ConfigInfraTools::ERROR;
						$this->VisibilityFunctionCheckBlackListMessage = "DivReturnMessageError";
						$this->VisibilityFunctionCheckBlackListMessageBottom = "DivReturnMessageErrorBottom";
					}
				}
				else 
				{
					$this->ExecutedFunctionReturnMessage = LanguageInfraTools::NULL_OPTION;
					$this->ExecutedFunctionReturn = ConfigInfraTools::ERROR;
					$this->VisibilityFunctionCheckBlackListMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckBlackListMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_HIDDEN;
			}
			//3 - CHECK DNS RECORD
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName = $_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_INPUT];
				$recordType = $_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT];
				$hostName = str_replace(" ", "", $hostName);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckDnsRecord($hostName, $recordType, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionCheckDnsRecordMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckDnsRecordMessageBottom = "DivReturnMessageErrorBottom";
				}	
				$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_INPUT] = $hostName;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_HIDDEN;
			}
			//4 - CHECK E-MAIL EXISTS
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$email = $_POST[ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_INPUT];
				$email = str_replace(" ", "", $email);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckEmailExists($email, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionCheckEmailExistsMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckEmailExistsMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_INPUT] = $email;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_HIDDEN;

			}
			//5 - CHECK IP ADDRESS IS IN NETWORK
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP];
				$networkAddress = $_POST[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK];
				$maskAddress = $_POST[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$networkAddress = str_replace(" ", "", $networkAddress);
				$maskAddress = str_replace(" ", "", $maskAddress);
				$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->CheckIpAddressIsInNetwork($ipAddress, 
																					  $networkAddress, 
																					  $maskAddress, 
																					  $this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionCheckIpAddressIsInNetworkMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckIpAddressIsInNetworkMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP] = $ipAddress;
				$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK] = $networkAddress;
				$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK] = $maskAddress;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_HIDDEN;
			}
			//6 - CHECK PING SERVER
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName  = $_POST[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST];
				$ipAddress = $_POST[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP];
				if(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO]))
					$radioOption  = $_POST[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO];
				if(!empty($radioOption))
				{
					if(!empty($hostName) && $radioOption == ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO_HOST)
					{
						$hostName = str_replace(" ", "", $hostName);
						$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckPingServerHost($hostName, 
																							$this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
						{
							$this->VisibilityFunctionCheckPingServerMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckPingServerMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST] = $hostName;
					}
					elseif(!empty($ipAddress) && $radioOption == ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO_IP)
					{
						$ipAddress = str_replace(" ", "", $ipAddress);
						$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckPingServerIpAddress($ipAddress, 
																							$this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
						{
							$this->VisibilityFunctionCheckPingServerMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckPingServerMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP] = $ipAddress;
					}
					else 
					{
						$this->ExecutedFunctionReturnMessage = LanguageInfraTools::FILL_REQUIRED_FIELDS;
						$this->ExecutedFunctionReturn = ConfigInfraTools::ERROR;
						$this->VisibilityFunctionCheckPingServerMessage = "DivReturnMessageError";
						$this->VisibilityFunctionCheckPingServerMessageBottom = "DivReturnMessageErrorBottom";
					}
				}
				else 
				{
					$this->ExecutedFunctionReturnMessage = LanguageInfraTools::NULL_OPTION;
					$this->ExecutedFunctionReturn = ConfigInfraTools::ERROR;
					$this->VisibilityFunctionCheckPingServerMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckPingServerMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_HIDDEN;
			}
			//7 - CHECK PORT STATUS
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName  = $_POST[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_HOST];
				$hostNamePortNumber = $_POST[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_HOST_PORT];
				$ipAddress = $_POST[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_IP];
				$ipAddressPortNumber = $_POST[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_IP_PORT];
				if(isset($_POST[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_RADIO]))
					$radioOption  = $_POST[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_RADIO];
				if(!empty($radioOption))
				{
					if(!empty($hostName) && !empty($hostNamePortNumber) 
					   && $radioOption == ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_RADIO_HOST)
					{
						$hostName = str_replace(" ", "", $hostName);
						$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckPortStatusHost($hostName, 
																							$hostNamePortNumber, 
																							$this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
						{
							$this->VisibilityFunctionCheckPortStatusMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckPortStatusMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_HOST] = $hostName;
						$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_HOST_PORT] = $hostNamePortNumber;
					}
					elseif(!empty($ipAddress) && !empty($ipAddressPortNumber)
						   && $radioOption == ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_RADIO_IP)
					{
						$ipAddress = str_replace(" ", "", $ipAddress);
						$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->CheckPortStatusIpAddress($ipAddress, 
																							$ipAddressPortNumber, 
																							$this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
						{
							$this->VisibilityFunctionCheckPortStatusMessage = "DivReturnMessageError";
							$this->VisibilityFunctionCheckPortStatusMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_IP] = $ipAddress;
						$GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_IP_PORT] = $ipAddressPortNumber;
					}
					else 
					{
						$this->ExecutedFunctionReturnMessage = LanguageInfraTools::FILL_REQUIRED_FIELDS;
						$this->ExecutedFunctionReturn = ConfigInfraTools::ERROR;
						$this->VisibilityFunctionCheckPortStatusMessage = "DivReturnMessageError";
						$this->VisibilityFunctionCheckPortStatusMessageBottom = "DivReturnMessageErrorBottom";
					}
				}
				else 
				{
					$this->ExecutedFunctionReturnMessage = LanguageInfraTools::NULL_OPTION;
					$this->ExecutedFunctionReturn = ConfigInfraTools::ERROR;
					$this->VisibilityFunctionCheckPortStatusMessage = "DivReturnMessageError";
					$this->VisibilityFunctionCheckPortStatusMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_HIDDEN;
			}
			//8 - GET CALCULATION NETMASK
			if(isset($_POST[ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_IP];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$mask = $_POST[ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_MASK];
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetCalculationNetMask($ipAddress, $mask, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionGetCalculationNetMaskMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetCalculationNetMaskMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_IP] = $ipAddress;
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_MASK] = $mask;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_HIDDEN;
			}
			//9 - OBTER REGISTRO DNS
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$dnsHostOption = $_POST[ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_SELECT];
				$hostName = $_POST[ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_INPUT];
				$hostName = str_replace(" ", "", $hostName);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetDnsRecords($hostName, $dnsHostOption,
																						$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionGetDnsRecordsMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetDnsRecordsMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_INPUT] = $hostName;
				$this->SelectedFunctionGetDnsRecords = $dnsHostOption;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_HIDDEN;
			}
			//10 - OBTER DOMÍNIO
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_GET_HOSTNAME_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FUNCTION_GET_HOSTNAME_INPUT];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetHostName($ipAddress, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionGetHostnameMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetHostnameMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_HOSTNAME_INPUT] = $ipAddress;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_HOSTNAME_HIDDEN;
			}
			//11 - OBTER ENDEREÇOS DE IP
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                    ($this->InstanceLanguageText);
				$hostName = $_POST[ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_INPUT];
				$hostName = str_replace(" ", "", $hostName);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetIpAddresses($hostName, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionGetIpAddressesMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetIpAddressesMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_INPUT] = $hostName;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_HIDDEN;
			}
			//12 - OBTER LOCALIZAÇÃO
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_GET_LOCATION_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FUNCTION_GET_LOCATION_INPUT];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetLocation($ipAddress, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionGetLocationMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetLocationMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_LOCATION_INPUT] = $ipAddress;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_LOCATION_HIDDEN;
			}
			//13 - OBTER PROTOCOLO
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_GET_PROTOCOL_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$number = $_POST[ConfigInfraTools::FUNCTION_GET_PROTOCOL_INPUT];
				$number = str_replace(" ", "", $number);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetProtocol($number, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionGetProtocolMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetProtocolMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_PROTOCOL_INPUT] = $number;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_PROTOCOL_HIDDEN;

			}
			//14 - OBTER ROTA
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_GET_ROUTE_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FUNCTION_GET_ROUTE_INPUT];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetRoute($ipAddress, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionGetRouteMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetRouteMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_ROUTE_INPUT] = $ipAddress;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_ROUTE_HIDDEN;
			}
			//15 - OBTER SERVIÇO
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_GET_SERVICE_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$port = $_POST[ConfigInfraTools::FUNCTION_GET_SERVICE_INPUT];
				$protocol = $_POST[ConfigInfraTools::FUNCTION_GET_SERVICE_SELECT];
				$port = str_replace(" ", "", $port);
				$protocol = str_replace(" ", "", $protocol);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetService($port, 
																					$protocol, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionGetServiceMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetServiceMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_SERVICE_INPUT] = $port;
				$this->SelectedFunctionGetService = $protocol;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_SERVICE_HIDDEN;
			}
			//16 - OBTER WEBSITE
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_GET_WEBSITE_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$webSiteAddress = $_POST[ConfigInfraTools::FUNCTION_GET_WEBSITE_INPUT];
				$webSiteOption  = $_POST[ConfigInfraTools::FUNCTION_GET_WEBSITE_SELECT];
				$webSiteAddress = str_replace(" ", "", $webSiteAddress);
				if ($webSiteOption == ConfigInfraTools::FUNCTION_GET_WEBSITE_SELECT_CONTENT)
					$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetWebSiteContent($webSiteAddress, 
																						$this->ExecutedFunctionReturnMessage);
				else $this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetWebSiteHeaders($webSiteAddress, 
																						 $this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
				{
					$this->VisibilityFunctionGetWebSiteMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetWebSiteMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FUNCTION_GET_WEBSITE_INPUT] = $webSiteAddress;
				$this->SelectedFunctionGetWebSite = $webSiteOption;
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_WEBSITE_HIDDEN;
			}
			//17 - OBTER WHOIS
			elseif(isset($_POST[ConfigInfraTools::FUNCTION_GET_WHOIS_HIDDEN]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName     = $_POST[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST];
				$ipAddress    = $_POST[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP];
				if(isset($_POST[ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO]))
					$radioOption  = $_POST[ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO];
				if(!empty($radioOption))
				{
					if(!empty($hostName) && $radioOption == ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO_HOST)
					{
						$hostName = str_replace(" ", "", $hostName);
						$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->GetWhoisHost($hostName, 
																							 $this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
						{
							$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
							$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST] = $hostName;
					}
					elseif(!empty($ipAddress) && $radioOption == ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO_IP)
					{
						$ipAddress = str_replace(" ", "", $ipAddress);
						$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->GetWhoisIpAddress($ipAddress, 
																							 $this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::SUCCESS)
						{
							$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
							$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP] = $ipAddress;
					}
					else
					{
						$this->ExecutedFunctionReturnMessage = LanguageInfraTools::FILL_REQUIRED_FIELDS;
						$this->ExecutedFunctionReturn = ConfigInfraTools::ERROR;
						$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
						$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
					}
				}
				else 
				{
					$this->ExecutedFunctionReturnMessage = LanguageInfraTools::NULL_OPTION;
					$this->ExecutedFunctionReturn = ConfigInfraTools::ERROR;
					$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_WHOIS_HIDDEN;
			}
		}
	}

	protected function LoadHtml()
	{
		$return = NULL;
		echo ConfigInfraTools::HTML_TAG_DOCTYPE;
		echo ConfigInfraTools::HTML_TAG_START;
		$return = $this->IncludeHeadAll(basename(__FILE__, '.php'));
		if ($return == ConfigInfraTools::SUCCESS)
		{
			echo ConfigInfraTools::HTML_TAG_BODY_START;
			echo "<div class='Wrapper'>";
			include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . ".php");
			$loginStatus = $this->CheckInstanceUser();
			if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
			   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
			{
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE 
							          . str_replace("_","",ConfigInfraTools::PAGE_NOT_LOGGED_IN) . ".php");
				$this->InputFocus = ConfigInfraTools::LOGIN_USER;
				echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::LOGIN_FORM, $this->InputFocus);
			}
			elseif($this->CheckInstanceUser() == ConfigInfraTools::USER_NOT_CONFIRMED)
			{
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE 
							          . str_replace("_","",ConfigInfraTools::PAGE_NOT_CONFIRMED) . ".php");
			}
			else include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . ConfigInfraTools::PATH_FOOTER);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::LOGIN_USER;
		$this->CheckPostBack();
		Page::GetCurrentURL($pageUrl);
		if(strstr($pageUrl, "?=" . ConfigInfraTools::CHECK_AVAILABILITY) 
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_HIDDEN)
			$this->VisibilityFunctionCheckAvailability = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::CHECK_BLACKLIST)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_HIDDEN)
		{
			$this->VisibilityFunctionCheckBlackList = "NotHiddenTab";
			if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_INPUT_HOST]))
			{
				$this->CheckedFunctionCheckBlackListRadioHost = "checked";
				$this->VisibilityFunctionCheckBlackListHost = "NotHidden";
				$this->VisibilityFunctionCheckBlackListSubmit = "NotHidden";
			}
			if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_BLACKLIST_INPUT_IP]))
			{
				$this->CheckedFunctionCheckBlackListRadioIp = "checked";
				$this->VisibilityFunctionCheckBlackListIp = "NotHidden";
				$this->VisibilityFunctionCheckBlackListSubmit = "NotHidden";
			}
		}
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::CHECK_DNS_RECORD)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_HIDDEN)
			$this->VisibilityFunctionCheckDnsRecord = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::CHECK_EMAIL_EXISTS)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_HIDDEN)
			$this->VisibilityFunctionCheckEmailExists = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::CHECK_IP_ADDRESS_IS_IN_NETWORK)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_HIDDEN)
			$this->VisibilityFunctionCheckIpAddressIsInNetwork = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::CHECK_PING_SERVER)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_HIDDEN)
		{
			$this->VisibilityFunctionCheckPingServer = "NotHiddenTab";
			if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST]))
			{
				$this->CheckedFunctionCheckPingServerRadioHost = "checked";
				$this->VisibilityFunctionCheckPingServerHost = "NotHidden";
				$this->VisibilityFunctionCheckPingServerSubmit = "NotHidden";
			}
			if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP]))
			{
				$this->CheckedFunctionCheckPingServerRadioIp = "checked";
				$this->VisibilityFunctionCheckPingServerIp = "NotHidden";
				$this->VisibilityFunctionCheckPingServerSubmit = "NotHidden";
			}
		}
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::CHECK_PORT_STATUS)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_HIDDEN)
		{
			$this->VisibilityFunctionCheckPortStatus  = "NotHiddenTab";
			if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_HOST]))
			{
				$this->CheckedFunctionCheckPortStatusRadioHost = "checked";
				$this->VisibilityFunctionCheckPortStatusHost = "NotHidden";
				$this->VisibilityFunctionCheckPortStatusSubmit = "NotHidden";
			}
			if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PORT_STATUS_INPUT_IP]))
			{
				$this->CheckedFunctionCheckPortStatusRadioIp = "checked";
				$this->VisibilityFunctionCheckPortStatusIp = "NotHidden";
				$this->VisibilityFunctionCheckPortStatusSubmit = "NotHidden";
			}
		}
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_CALCULATION_NETMASK) 
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_HIDDEN)
			$this->VisibilityFunctionGetCalculationNetMask = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_DNS_RECORDS)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_HIDDEN)
			$this->VisibilityFunctionGetDnsRecords = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_HOSTNAME)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_HOSTNAME_HIDDEN)
			$this->VisibilityFunctionGetHostname = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_IP_ADDRESSES)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_HIDDEN)
			$this->VisibilityFunctionGetIpAddresses = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_LOCATION)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_LOCATION_HIDDEN)
			$this->VisibilityFunctionGetLocation = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_PROTOCOL)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_PROTOCOL_HIDDEN)
			$this->VisibilityFunctionGetProtocol = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_ROUTE)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_ROUTE_HIDDEN)
			$this->VisibilityFunctionGetRoute = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_SERVICE)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_SERVICE_HIDDEN)
			$this->VisibilityFunctionGetService = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_WEBSITE)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_WEBSITE_HIDDEN)
			$this->VisibilityFunctionGetWebSite = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::GET_WHOIS)
		   || $this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_WHOIS_HIDDEN)
		{
			$this->VisibilityFunctionGetWhois = "NotHiddenTab";
			if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST]))
			{
				$this->CheckedFunctionGetWhoisRadioHost = "checked";
				$this->VisibilityFunctionGetWhoisHost = "NotHidden";
				$this->VisibilityFunctionGetWhoisSubmit = "NotHidden";
			}
			if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP]))
			{
				$this->CheckedFunctionGetWhoisRadioIp = "checked";
				$this->VisibilityFunctionGetWhoisIp = "NotHidden";
				$this->VisibilityFunctionGetWhoisSubmit = "NotHidden";
			}
		}
		if(!isset($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT]))
			$_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] = NULL;
		$this->LoadHtml();
	}
}
?>