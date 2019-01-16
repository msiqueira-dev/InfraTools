<?php
/************************************************************************
Class: PageGet.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/Controller/InfraToolsFacedeBusiness.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for viewing and use the diagnostic functions of getting data to be analysed be the user. 
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

class PageGet extends PageInfraTools
{		
	public $CheckedFunctionGetWhoisRadioHost                            = "";
	public $CheckedFunctionGetWhoisRadioIp                              = "";
	public $ExecutedFunction                                            = NULL;
	public $ExecutedFunctionReturn                                      = NULL;
	public $ExecutedFunctionReturnMessage                               = NULL;
	public $SelectedFunctionGetDnsRecords                               = "";
	public $SelectedFunctionGetService                                  = "";
	public $SelectedFunctionGetWebSite                                  = "";
	public $VisibilityFunctionGetCalculationNetMask                     = "HiddenTab";
	public $VisibilityFunctionGetCalculationNetMaskMessage              = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetCalculationNetMaskMessageBottom        = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetDnsRecords                             = "HiddenTab";
	public $VisibilityFunctionGetDnsRecordsMessage                      = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetDnsRecordsMessageBottom                = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetHostname                               = "HiddenTab";
	public $VisibilityFunctionGetHostnameMessage                        = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetHostnameMessageBottom                  = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetIpAddresses                            = "HiddenTab";
	public $VisibilityFunctionGetIpAddressesMessage                     = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetIpAddressesMessageBottom               = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetLocation                               = "HiddenTab";
	public $VisibilityFunctionGetLocationMessage                        = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetLocationMessageBottom                  = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetProtocol                               = "HiddenTab";
	public $VisibilityFunctionGetProtocolMessage                        = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetProtocolMessageBottom                  = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetRoute                                  = "HiddenTab";
	public $VisibilityFunctionGetRouteMessage                           = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetRouteMessageBottom                     = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetService                                = "HiddenTab";
	public $VisibilityFunctionGetServiceMessage                         = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetServiceMessageBottom                   = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetWebSite                                = "HiddenTab";
	public $VisibilityFunctionGetWebSiteMessage                         = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetWebSiteMessageBottom                   = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetWhois                                  = "HiddenTab";
	public $VisibilityFunctionGetWhoisMessage                           = "DivReturnMessageSuccess";
	public $VisibilityFunctionGetWhoisMessageBottom                     = "DivReturnMessageSuccessBottom";
	public $VisibilityFunctionGetWhoisHost                              = "Hidden";
	public $VisibilityFunctionGetWhoisIp                                = "Hidden";
	public $VisibilityFunctionGetWhoisSubmit                            = "HiddenTab";
	
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
	
	private function CheckPostBack()
	{
		if ($_POST != NULL)
		{
			//1 - GET CALCULATION NETMASK
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
			//2 - OBTER REGISTRO DNS
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
			//3 - OBTER DOMÍNIO
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
			//4 - OBTER ENDEREÇOS DE IP
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
			//5 - OBTER LOCALIZAÇÃO
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
			//6 - OBTER PROTOCOLO
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
			//7 - OBTER ROTA
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
			//8 - OBTER SERVIÇO
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
			//9 - OBTER WEBSITE
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
			//10 - OBTER WHOIS
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
						$this->ExecutedFunctionReturn = ConfigInfraTools::RETURN_ERROR;
						$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
						$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
					}
				}
				else 
				{
					$this->ExecutedFunctionReturnMessage = LanguageInfraTools::NULL_OPTION;
					$this->ExecutedFunctionReturn = ConfigInfraTools::RETURN_ERROR;
					$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FUNCTION_GET_WHOIS_HIDDEN;
			}
		}
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_LOGIN;
		$this->CheckPostBack();
		Page::GetCurrentURL($pageUrl);
		if(strstr($pageUrl, "?=" . ConfigInfraTools::GET_CALCULATION_NETMASK) 
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
		$this->LoadHtml(TRUE);
	}
}
?>