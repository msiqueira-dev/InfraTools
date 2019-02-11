<?php
/************************************************************************
Class: PageGet.php
Creation: 2016/09/30
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
			if(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$mask = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_MASK];
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetCalculationNetMask($ipAddress, $mask, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionGetCalculationNetMaskMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetCalculationNetMaskMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP] = $ipAddress;
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_MASK] = $mask;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP;
			}
			//2 - OBTER REGISTRO DNS
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$dnsHostOption = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL];
				$hostName = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST];
				$hostName = str_replace(" ", "", $hostName);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetDnsRecords($hostName, $dnsHostOption,
																						$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionGetDnsRecordsMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetDnsRecordsMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST] = $hostName;
				$this->SelectedFunctionGetDnsRecords = $dnsHostOption;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST;
			}
			//3 - OBTER DOMÍNIO
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetHostName($ipAddress, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionGetHostnameMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetHostnameMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME] = $ipAddress;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME;
			}
			//4 - OBTER ENDEREÇOS DE IP
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                    ($this->InstanceLanguageText);
				$hostName = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES];
				$hostName = str_replace(" ", "", $hostName);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetIpAddresses($hostName, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionGetIpAddressesMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetIpAddressesMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES] = $hostName;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES;
			}
			//5 - OBTER LOCALIZAÇÃO
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetLocation($ipAddress, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionGetLocationMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetLocationMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION] = $ipAddress;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION;
			}
			//6 - OBTER PROTOCOLO
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$number = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL];
				$number = str_replace(" ", "", $number);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetProtocol($number, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionGetProtocolMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetProtocolMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL] = $number;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL;

			}
			//7 - OBTER ROTA
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$ipAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE];
				$ipAddress = str_replace(" ", "", $ipAddress);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetRoute($ipAddress, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionGetRouteMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetRouteMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE] = $ipAddress;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE;
			}
			//8 - OBTER SERVIÇO
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$port = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE];
				$protocol = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL];
				$port = str_replace(" ", "", $port);
				$protocol = str_replace(" ", "", $protocol);
				$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetService($port, 
																					$protocol, 
																					$this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionGetServiceMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetServiceMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE] = $port;
				$this->SelectedFunctionGetService = $protocol;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE;
			}
			//9 - OBTER WEBSITE
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$webSiteAddress = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE];
				$webSiteOption  = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL];
				$webSiteAddress = str_replace(" ", "", $webSiteAddress);
				if ($webSiteOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL_CONTENT)
					$this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetWebSiteContent($webSiteAddress, 
																						$this->ExecutedFunctionReturnMessage);
				else $this->ExecutedFunctionReturn = $this->InstanceInfraToolsFacedeBusiness->GetWebSiteHeaders($webSiteAddress, 
																						 $this->ExecutedFunctionReturnMessage);
				if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
				{
					$this->VisibilityFunctionGetWebSiteMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetWebSiteMessageBottom = "DivReturnMessageErrorBottom";
				}
				$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE] = $webSiteAddress;
				$this->SelectedFunctionGetWebSite = $webSiteOption;
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE;
			}
			//10 - OBTER WHOIS
			elseif(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO]))
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$hostName     = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST];
				$ipAddress    = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP];
				if(isset($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO]))
					$radioOption  = $_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO];
				if(!empty($radioOption))
				{
					if(!empty($hostName) && $radioOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO_HOST)
					{
						$hostName = str_replace(" ", "", $hostName);
						$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->GetWhoisHost($hostName, 
																							 $this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
						{
							$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
							$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST] = $hostName;
					}
					elseif(!empty($ipAddress) && $radioOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO_IP)
					{
						$ipAddress = str_replace(" ", "", $ipAddress);
						$this->ExecutedFunctionReturn =  $this->InstanceInfraToolsFacedeBusiness->GetWhoisIpAddress($ipAddress, 
																							 $this->ExecutedFunctionReturnMessage);
						if($this->ExecutedFunctionReturn != ConfigInfraTools::RET_OK)
						{
							$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
							$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
						}
						$GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP] = $ipAddress;
					}
					else
					{
						$this->ExecutedFunctionReturnMessage = LanguageInfraTools::FILL_REQUIRED_FIELDS;
						$this->ExecutedFunctionReturn = ConfigInfraTools::RET_ERROR;
						$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
						$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
					}
				}
				else 
				{
					$this->ExecutedFunctionReturnMessage = LanguageInfraTools::NULL_OPTION;
					$this->ExecutedFunctionReturn = ConfigInfraTools::RET_ERROR;
					$this->VisibilityFunctionGetWhoisMessage = "DivReturnMessageError";
					$this->VisibilityFunctionGetWhoisMessageBottom = "DivReturnMessageErrorBottom";
				}
				$this->ExecutedFunction = ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO;
			}
		}
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::FIELD_LOGIN;
		$this->CheckPostBack();
		Page::GetCurrentURL($pageUrl);
		if(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_CALCULATION_NETMASK) 
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP)
			$this->VisibilityFunctionGetCalculationNetMask = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_DNS_RECORDS)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST)
			$this->VisibilityFunctionGetDnsRecords = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_HOSTNAME)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME)
			$this->VisibilityFunctionGetHostname = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_IP_ADDRESSES)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES)
			$this->VisibilityFunctionGetIpAddresses = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_LOCATION)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION)
			$this->VisibilityFunctionGetLocation = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_PROTOCOL)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL)
			$this->VisibilityFunctionGetProtocol = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_ROUTE)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE)
			$this->VisibilityFunctionGetRoute = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_SERVICE)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE)
			$this->VisibilityFunctionGetService = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_WEBSITE)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE)
			$this->VisibilityFunctionGetWebSite = "NotHiddenTab";
		elseif(strstr($pageUrl, "?=" . ConfigInfraTools::PAGE_GET_WHOIS)
		   || $this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO)
		{
			$this->VisibilityFunctionGetWhois = "NotHiddenTab";
			if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST]))
			{
				$this->CheckedFunctionGetWhoisRadioHost = "checked";
				$this->VisibilityFunctionGetWhoisHost = "NotHidden";
				$this->VisibilityFunctionGetWhoisSubmit = "NotHidden";
			}
			if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP]))
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