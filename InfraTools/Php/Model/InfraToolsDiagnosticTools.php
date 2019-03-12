<?php

/************************************************************************
Class: InfraToolsDiagnosticTools.php
Creation: 2014/02/21
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
Description: 
			Class that executes network functions for diagnostic porpuses.
Functions: 
			public function CheckAvailability(Host);
			public function CheckBlackListHost($HostName, &$ArrayBlackList);
			public function CheckBlackListIp($IpAddress, &$ArrayBlackList);
			public function CheckDnsRecord($Host, $RecordType);
			public function CheckPingServer($HostOrIp);
			public function CheckPortStatus($HostOrIp, $Port);
			public function GetCalculationNetMask($IpAddress, $Mask, $SubNetworkIp, $NetMask, 
			                                      $BroadCastAddress, $AvaliableNetworkIps);
			public function GetDnsMxRecords($Host, &$ArrayDnsMxRecords);
			public function GetDnsRecords($Host, &$ArrayDnsRecords);
			public function GetIpAddresses($Host, &$ArrayIpAddress);
			public function GetLocation($IpAddress, &$ArrayLocationInformation); 
			public function GetProtocol($Number, &$Protocol);
			public function GetRoute($IpAddress, $TimeOut, &$ArrayRoute);
			public function GetService($Port, $Protocol, &$Service);
			public function GetWebSiteContent($WebSite, &$Content);
			public function GetWebSiteHeaders($WebSite, &$ArrayHeaders);
			public function GetWhois($HostName, &$Info);
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsDiagnosticTools extends DiagnosticTools
{	
	/* Constantes de Tipos de registros de DNS */
	const DnsTypeA     = "A";
	const DnsTypeMx    = "MX";
	const DnsTypeNs    = "NS";
	const DnsTypeSoa   = "SOA";
	const DnsTypePtr   = "PTR";
	const DnsTypeCName = "CNAME";
	const DnsTypeAAAA  = "AAAA";
	const DnsTypeA6    = "A6";
	const DnsTypeSrv   = "SRV";
	const DnsTypeNaptr = "NAPTR";
	const DnsTypeTxt   = "TXT";
	const DnsTypeAny   = "ANY";
	
	/* Constantes de Tpos de protocólos */
	const PROTOCOL_TCP = "tcp";
	const PROTOCOL_UDP = "udp";
	
	/* Constantes Privadas de Controle Interno */
	private $OPERATIONAL_SYSTEM_LINUX = "Linux";
	private $OPERATIONAL_SYSTEM_WINDOWS = "WIN";
	private $PING_ERROR_CONNECTION_DISALLOWED = 10057;
	private $PING_ERROR_CONNECTION_REFUSED = 10061;
	private $PING_ERROR_HOST_UNKNOWN = 0;
	private $PING_ERROR_TIME_OUT = 10060;
	private $TIME_OUT_SECONDS = 2;
	
	/* Constantes Privadas referentes ao geoplugin */
	private $COUNTRY_CODE = "CountryCode";
	private $COUNTRY_NAME = "CountryName";
	private $COUNTRY_CITY = "CountryCity";
	
	/* Array de Servidores de Checagem de BlackList */
	private $arrayDnsBlockLookUp = array("dnsbl-1.uceprotect.net", "dnsbl-2.uceprotect.net","dnsbl-3.uceprotect.net",
	                                     "dnsbl.dronebl.org", "dnsbl.sorbs.net", "zen.spamhaus.org", "duinv.aupads.org",
										 "b.barracudacentral.org", "ubl.unsubscore.com", "proxy.bl.gweep.ca", "cbl.abuseat.org");
	
	/* Instância do ConfigInfraTools */
	private $ConfigInfraTools;
	private $InfraToolsFactory = NULL;
	
	/* Constructor */
	public function __construct() 
    {
		if($this->InfraToolsFactory == NULL)
			$this->InfraToolsFactory = InfraToolsFactory::__create();
    }
	
	public function CheckAvailability($Host)
	{
		if ($this->CheckDnsRecord($Host, self::DnsTypeAny) == ConfigInfraTools::RET_OK)
			return ConfigInfraTools::RETURN_CHECK_AVAILABILITY_NOT_AVAILABLE;
		else return ConfigInfraTools::RET_OK;
	}

	public function CheckBlackListHost($HostName, &$ArrayBlackList)
	{
		$ArrayBlackList = array();
		if ($this->GetIpAddresses($HostName, $arrayIpAddress) == ConfigInfraTools::RET_OK)
		{
			for($n=0;$n<count($arrayIpAddress);$n++)
			{
				$ip = $arrayIpAddress[$n];
				$reverse_ip=implode(".", array_reverse(explode(".", $ip)));
				foreach($this->arrayDnsBlockLookUp as $host)
				{
					if(checkdnsrr($reverse_ip.".".$host.".", self::DnsTypeA))
						array_push($ArrayBlackList, $host);
				}
			}
			if (count($ArrayBlackList) == 0) return ConfigInfraTools::RET_OK;
			else return ConfigInfraTools::RETURN_CHECK_HOST_BLACKLISTED;
		}
		else return ConfigInfraTools::RETURN_CHECK_HOST_BLACKLIST_NO_IP_FOR_HOST;
	}

	public function CheckBlackListIp($IpAddress, &$ArrayBlackList)
	{
		$ArrayBlackList = array();
		$reverse_ip=implode(".", array_reverse(explode(".", $IpAddress)));
		foreach($this->arrayDnsBlockLookUp as $host)
		{
			if(checkdnsrr($reverse_ip.".".$host.".", self::DnsTypeA))
				array_push($ArrayBlackList, $host);
		}
		if (count($ArrayBlackList) == 0) return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RETURN_CHECK_HOST_BLACKLISTED;
	}

	public function CheckDnsRecord($Host, $RecordType)
	{
		if ($RecordType == self::DnsTypeA || $RecordType == self::DnsTypeMx || $RecordType == self::DnsTypeNs ||
			$RecordType == self::DnsTypeSoa || $RecordType == self::DnsTypePtr || $RecordType == self::DnsTypeCName ||
			$RecordType == self::DnsTypeAAAA || $RecordType == self::DnsTypeA6 || $RecordType == self::DnsTypeSrv ||
			$RecordType == self::DnsTypeNaptr || $RecordType == self::DnsTypeTxt || $RecordType == self::DnsTypeAny)
		{
			if (checkdnsrr ($Host, $RecordType))
				return ConfigInfraTools::RET_OK;
			else return ConfigInfraTools::RETURN_CHECK_HOST_DNS_RECORD_TYPE_FAILED;
		}
		else return ConfigInfraTools::RETURN_HOST_DNS_RECORD_TYPE_NOT_ALLOWED;
	}

	public function CheckIpAddressIsInNetwork($IpAddress, $NetworkWithMask) 
	{
		if ( strpos($NetworkWithMask, '/') == FALSE ) 
			$NetworkWithMask .= '/32';
		list($NetworkWithMask, $netmask) = explode('/', $NetworkWithMask,2);
		$range_decimal = ip2long( $NetworkWithMask );
		$ip_decimal = ip2long( $IpAddress );
		$wildcard_decimal = pow(2,( 32 - $netmask ))-1;
		$netmask_decimal = ~ $wildcard_decimal;
		if (($ip_decimal & $netmask_decimal) == ($range_decimal & $netmask_decimal))
			return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RETURN_CHECK_IP_ADDRESS_IS_NOT_IN_NETWORK; 
	}
	
	public function CheckPingServer($HostOrIp, &$ArrayOutput)
	{
		$ArrayOutput = NULL;
		exec("ping -n 1 " . $HostOrIp, $ArrayOutput, $status);
		if ($status == 0)
			return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RETURN_CHECK_PING_SERVER_FAILED;
	}
	
	public function CheckPortStatus($HostOrIp, $Port)
	{
		$fsock = NULL;
		$fsock = @fsockopen($HostOrIp, $Port, $errorCode, $errorDescription, $this->TIME_OUT_SECONDS);
		if(!is_null($fsock))
		{   
			fclose($fsock);
			return ConfigInfraTools::RET_OK;
		} 
		else 
		{
			if ($errorCode == $this->PING_ERROR_HOST_UNKNOWN)
				return ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_UNKNOWN;
			elseif($errorCode == $this->PING_ERROR_TIME_OUT)
				return ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_TIMEOUT;
			elseif($errorCode == $this->PING_ERROR_CONNECTION_REFUSED)
				return ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_REFUSED;
			elseif($errorCode == $this->PING_ERROR_CONNECTION_DISALLOWED)
				return ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_DISALLOWED;
		}
	}
	
	public function GetCalculationNetMask($IpAddress, $Mask, &$SubNetworkIp, &$NetMask, &$BroadCastAddress, &$AvaliableNetworkIps)
	{
		$mask_nr = (pow(2, $Mask) - 1) << (32 - $Mask);
		$NetMask = long2ip($mask_nr);
		$SubNetworkIp =  long2ip(ip2long($IpAddress) & $mask_nr);
		$AvaliableNetworkIps = ($mask_nr *(-1))-3;
		$BroadCastAddressTemp = explode('.', $NetMask);
		$SubNetworkIpTemp = explode('.', $SubNetworkIp);
		$IpAddressTemp = explode('.', $IpAddress);
		for($x=0; $x<4; $x++)
		{
			if ($BroadCastAddressTemp[$x] < 255)
			{
				$NetworkIntervalTemp = 256 - $BroadCastAddressTemp[$x];
				$BroadCastAddressTemp[$x] = ($SubNetworkIpTemp[$x] + $NetworkIntervalTemp)-1;
			}
			else $BroadCastAddressTemp[$x] = $IpAddressTemp[$x];
			if ($x!=3)
				$BroadCastAddress .= $BroadCastAddressTemp[$x] . ".";
			else $BroadCastAddress .= $BroadCastAddressTemp[$x];
		}
		$AvaliableNetworkIps = (ip2long($BroadCastAddress) - ip2long($SubNetworkIp)) -2;

		return ConfigInfraTools::RET_OK;
	}
	
	public function GetDnsMxRecords($Host, &$ArrayDnsMxRecords)
	{
		$ArrayDnsMxRecords = NULL;
		if (getmxrr($Host, $ArrayDnsMxRecords) == TRUE)
			return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RETURN_GET_DNS_MX_RECORDS_ERROR;
	}
	
	public function GetDnsRecords($Host, &$ArrayDnsRecords)
	{
		$ArrayDnsRecords = NULL;
		$ArrayDnsRecords = dns_get_record($Host);
		if (!is_null($ArrayDnsRecords))
			return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RETURN_GET_DNS_RECORDS_ERROR;
	}
	
	public function GetHostName($IpAddress, &$HostName)
	{
		$HostName = NULL;
		$HostName = gethostbyaddr($IpAddress);
		if(isset($HostName))
		{
			if (!is_null($HostName) && $HostName != $IpAddress)
			return ConfigInfraTools::RET_OK;
			else return ConfigInfraTools::RETURN_GET_HOSTNAME_ERROR;
		}
		else return ConfigInfraTools::RETURN_GET_HOSTNAME_ERROR;
	}
	
	public function GetIpAddresses($HostName, &$ArrayIpAddress)
	{
		$ArrayIpAddress = NULL;
		if(strstr($HostName, "http://") == TRUE)
			$HostName = str_replace("http://", "", $HostName);
		elseif(strstr($HostName, "https://") == TRUE)
			$HostName = str_replace("https://", "", $HostName);
		if($HostName[strlen($HostName)-1] == "/")
			$HostName[strlen($HostName)-1] = "";
		$ArrayIpAddress = gethostbynamel($HostName);
		if (!is_null($ArrayIpAddress))
			return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RETURN_GET_HOST_IP_ADDRESS_ERROR;
	}
		
	public function GetLocation($IpAddress, &$ArrayLocationInformation)
	{
		$ArrayLocationInformation = array(); $content = NULL;
		$content = @file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $IpAddress);
		if(isset($content) && !is_null($content))
		{
			$ip_data = @json_decode($content);   
			if($ip_data && $ip_data->geoplugin_countryName != null)
			{
				if (!is_null($ip_data->geoplugin_countryCode))
					array_push($ArrayLocationInformation, $ip_data->geoplugin_countryCode);
				if (!is_null($ip_data->geoplugin_countryName))
					array_push($ArrayLocationInformation, $ip_data->geoplugin_countryName);
				if (!is_null($ip_data->geoplugin_city))
					array_push($ArrayLocationInformation, $ip_data->geoplugin_city);
				return ConfigInfraTools::RET_OK;
			}
			else return ConfigInfraTools::RETURN_GET_LOCATION_BY_IP_ADDRESS_FAILED;
		}
		else return ConfigInfraTools::RETURN_GET_LOCATION_BY_IP_ADDRESS_FAILED_GET_CONTENTS;
	}

	
	public function GetProtocol($Number, &$Protocol)
	{
		$Protocol = getprotobynumber($Number);
		if ($Protocol != FALSE)
			return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RETURN_GET_PROTOCOL_ERROR;
	}
	
	public function GetRoute($IpAddress, $TimeOut, &$ArrayRoute)
	{
		$ArrayRoute = array(); $auxArray = array(); $count = 1;
		set_time_limit($TimeOut);
		if (strstr (PHP_OS, $this->OPERATIONAL_SYSTEM_WINDOWS) != FALSE)
		{
			exec('tracert.exe ' . $IpAddress . ' 2>&1', $auxArray);
			foreach ($auxArray as $element)
			{
				if(strpos($element, (' ' . $count)) != FALSE)
				{
					$ArrayRoute[$count-1] = $element;
					$count++;
				}
			}
		}
		elseif(strstr (PHP_OS, $this->OPERATIONAL_SYSTEM_LINUX) != FALSE)
			exec('traceroute ' . $IpAddress . ' 2>&1', $ArrayRoute);
		else
			return ConfigInfraTools::GET_ERROR_INVALID_OS;
		return ConfigInfraTools::RET_OK;
	}
	
	public function GetService($Port, $Protocol, &$Service)
	{
		$Service = NULL;
		$Service = getservbyport($Port ,$Protocol);
		if (!is_null($Service))
			return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RETURN_GET_SERVICE_ERROR;
	}
	
	public function GetWebSiteContent($WebSite, &$Content)
	{
		$Content = NULL;
		$Content = @file_get_contents($WebSite);
		if (!is_null($Content))
		{
			$Content = "<div>" . mb_convert_encoding($Content, 'HTML-ENTITIES', "UTF-8") . "</div>";
			$Content = "<div>" . htmlspecialchars($Content, ENT_SUBSTITUTE) . "</div>";
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::RETURN_GET_WEBSITE_CONTENT_ERROR;
	}
	
	public function GetWebSiteHeaders($WebSite, &$ArrayHeaders)
	{
		$ArrayHeaders = NULL;
		$ArrayHeaders = @get_headers($WebSite, 1);
		if (!is_null($ArrayHeaders))
			return ConfigInfraTools::RET_OK;
		else return ConfigInfraTools::RETURN_GET_WEBSITE_HEADERS_FAILED;
	}
	
	public function GetWhois($HostName, &$Info)
	{
		$InstancePearWhois = $this->InfraToolsFactory->CreateNetWhois();
		if(!is_null($InstancePearWhois))
		{
			$Info = $InstancePearWhois->query($HostName);
			if(isset($Info) && !empty($Info))
			{
				if(!strstr($Info, "Specified server is null or empty"))
				{
					$Info = utf8_encode($Info);
					$Info = str_replace("\n", "<br>", $Info);
					return ConfigInfraTools::RET_OK;
				}
				else return ConfigInfraTools::RETURN_GET_WHOIS_ERROR;
			}
			else return ConfigInfraTools::RETURN_GET_WHOIS_ERROR;
		}
		else return ConfigInfraTools::RETURN_GET_WHOIS_PACKAGE_NET_WHOIS_NOT_FOUND;
	}
}

?>