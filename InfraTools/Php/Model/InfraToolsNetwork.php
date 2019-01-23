<?php

/************************************************************************
Class: InfraToolsNetwork.php
Creation: 21/02/2014
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
Description: 
			Classe que serve para utilizar funcionalidades ligadas a análise
			e infraestrutura de redes.
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

class InfraToolsNetwork extends Network
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
	
	/**
	- Recebe um host e verifica se existe algum registro de DNS para o mesmo, caso exista, significa que este Host, já está
	registrado, retornando que o Domínio já é registrado, caso não retorna que o domínio está disponível.
	Retornos:
	    Success - Sucesso, Domínio está disponível.
		CHECK_AVAILABILITY_NOT_AVAILABLE - Domínio não está disponível.
	Data: 
	**/
	public function CheckAvailability($Host)
	{
		if ($this->CheckDnsRecord($Host, self::DnsTypeAny) == ConfigInfraTools::SUCCESS)
			return ConfigInfraTools::CHECK_AVAILABILITY_NOT_AVAILABLE;
		else return ConfigInfraTools::SUCCESS;
	}
	
	/**
	- Recebe um Host e tenta obter os endereços IP associado ao host,
	para então, de posse de um endereço de IP, validar se o domínio se encontra na lista negra de algum dos domínios
	validadores de endereços de IP em lista negra. Cada vez que for encontrar algum registro de lista de negra, este é adicionado
	ao vetor, que é retornado por referência.
	Retornos:
		Success - Sucesso, Host não se encontra em nenhuma lista negra!
		CHECK_HOST_BLACKLIST_NO_IP_FOR_HOST - Erro, não conseguiu obter nenhum endereço de IP para o dado host, impossível continuar.
		CHECK_HOST_BLACKLISTED - Erro, Host encontra-se em alguma lista negra.
	Data: 
	**/
	public function CheckBlackListHost($HostName, &$ArrayBlackList)
	{
		$ArrayBlackList = array();
		if ($this->GetIpAddresses($HostName, $arrayIpAddress) == ConfigInfraTools::SUCCESS)
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
			if (count($ArrayBlackList) == 0) return ConfigInfraTools::SUCCESS;
			else return ConfigInfraTools::CHECK_HOST_BLACKLISTED;
		}
		else return ConfigInfraTools::CHECK_HOST_BLACKLIST_NO_IP_FOR_HOST;
	}
	
	/**
	- Recebe um endereço de IP validar se o mesmo se encontra na lista negra de algum dos domínios
	validadores de endereços de IP em lista negra. Cada vez que for encontrar algum registro de lista de negra, este é adicionado
	ao vetor, que é retornado por referência.
	Retornos:
		Success - Sucesso, endereço de IP não se encontra em nenhuma lista negra!
		CHECK_HOST_BLACKLISTED - Erro, endereço de IP encontra-se em alguma lista negra.
	Data: 
	**/
	public function CheckBlackListIp($IpAddress, &$ArrayBlackList)
	{
		$ArrayBlackList = array();
		$reverse_ip=implode(".", array_reverse(explode(".", $IpAddress)));
		foreach($this->arrayDnsBlockLookUp as $host)
		{
			if(checkdnsrr($reverse_ip.".".$host.".", self::DnsTypeA))
				array_push($ArrayBlackList, $host);
		}
		if (count($ArrayBlackList) == 0) return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::CHECK_HOST_BLACKLISTED;
	}
	
	/**
	public function CheckDnsRecord($Host, $RecordType)
	
	- Recebe um host e um tipo de registro, caso o registro esteja dentro dos permitidos verifica, se determinado 
	host possui algum registro para tipo de registro.
	Retornos:
		Success - Sucesso, obteve informações do registro para o dado host e o dado tipo de registro!
		CHECK_HOST_DNS_RECORD_TYPE_FAILED - Não conseguiu obter registro de DNS para o dado host e o dado tipo.
		CHECK_HOST_DNS_RECORD_TYPE_NOT_ALLOWED - Tipo de registro não é válido.
	Data: 
	**/
	public function CheckDnsRecord($Host, $RecordType)
	{
		if ($RecordType == self::DnsTypeA || $RecordType == self::DnsTypeMx || $RecordType == self::DnsTypeNs ||
			$RecordType == self::DnsTypeSoa || $RecordType == self::DnsTypePtr || $RecordType == self::DnsTypeCName ||
			$RecordType == self::DnsTypeAAAA || $RecordType == self::DnsTypeA6 || $RecordType == self::DnsTypeSrv ||
			$RecordType == self::DnsTypeNaptr || $RecordType == self::DnsTypeTxt || $RecordType == self::DnsTypeAny)
		{
			if (checkdnsrr ($Host, $RecordType))
				return ConfigInfraTools::SUCCESS;
			else return ConfigInfraTools::CHECK_HOST_DNS_RECORD_TYPE_FAILED;
		}
		else return ConfigInfraTools::CHECK_HOST_DNS_RECORD_TYPE_NOT_ALLOWED;
	}
	
	/**
	public function CheckIpAddressIsInNetwork($IpAddress, $NetworkWithMask) 
	
	- Recebe um endereço de ip e uma rede com a mascara da rede, e então verifica
	se o endereço de ip está contido dentro da rede..
	Retornos:
		Success - Sucesso, obteve informações do registro para o dado host e o dado tipo de registro!
		CHECK_HOST_DNS_RECORD_TYPE_FAILED - Não conseguiu obter registro de DNS para o dado host e o dado tipo.
		CHECK_HOST_DNS_RECORD_TYPE_NOT_ALLOWED - Tipo de registro não é válido.
	Data: 
	**/
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
			return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::CHECK_IP_ADDRESS_IS_NOT_IN_NETWORK; 
	}
	
	/**
	- Recebe um host ou um ip e através desta informação tenta efetuar um ping,
	utilizando comando de linha em Linux/Unix/Windows. Se o status de retorno for 0
	significa houve sucesso ao executar o comando e o ping, onde, em caso de falha ou
	sucesso é retornado por referência as informações da execução do comando ping,
    armazenadas	em formato de Array na variável arrayOutput.
	Retornos:
		Success - Sucesso, ping executado com sucesso.
		CHECK_PING_SERVER_FAILED - Falha ao executar o comando.
	Data: 
	**/
	public function CheckPingServer($HostOrIp, &$ArrayOutput)
	{
		$ArrayOutput = NULL;
		exec("ping -n 1 " . $HostOrIp, $ArrayOutput, $status);
		if ($status == 0)
			return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::CHECK_PING_SERVER_FAILED;
	}
	
	/**
	- Recebe um host e uma porta, verifica se tal porta está aberta para o dado host,
	onde, em caso de sucesso, tal porta se encontra aberta, e respondendo, então o socket aberto
	com o host é terminado, indicando o fim da checagem.
	Retornos:
		Success - Sucesso, conseguiu verificar a porta.
		CHECK_HOST_PORT_FAILED_UNKNOWN - Erro, o host fornecido não existe.
		CHECK_HOST_PORT_FAILED_TIMEOUT - Erro, estorou o tempo limite.
		CHECK_HOST_PORT_FAILED_REFUSED - Erro, verificação recusada pelo host.
	Data: 
	**/
	public function CheckPortStatus($HostOrIp, $Port)
	{
		$fsock = NULL;
		$fsock = @fsockopen($HostOrIp, $Port, $errorCode, $errorDescription, $this->TIME_OUT_SECONDS);
		if(!is_null($fsock))
		{   
			fclose($fsock);
			return ConfigInfraTools::SUCCESS;
		} 
		else 
		{
			if ($errorCode == $this->PING_ERROR_HOST_UNKNOWN)
				return ConfigInfraTools::CHECK_HOST_PORT_FAILED_UNKNOWN;
			elseif($errorCode == $this->PING_ERROR_TIME_OUT)
				return ConfigInfraTools::CHECK_HOST_PORT_FAILED_TIMEOUT;
			elseif($errorCode == $this->PING_ERROR_CONNECTION_REFUSED)
				return ConfigInfraTools::CHECK_HOST_PORT_FAILED_REFUSED;
			elseif($errorCode == $this->PING_ERROR_CONNECTION_DISALLOWED)
				return ConfigInfraTools::CHECK_HOST_PORT_FAILED_DISALLOWED;
		}
	}
	
	
	/**
	- Recebe um endereço de ip conjunto a uma mascara e calcula todos os dados de rede a partir desta informação. 
	  Retorna por referência, o endereço de IP, o endereço da sub-rede, a mascara completa da rede, o endereço de Broadcast,
	  e o número de endereços de IPs na sub-rede em questão.
	Retornos:
	    Success - Sucesso, calculou todos os dados de uma sub-rede.
	Data: 
	**/
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

		return ConfigInfraTools::SUCCESS;
	}
	
	/**
	- Recebe um host e tenta então obter deste host todos os registros de DNS
	relacionados a E-mail, onde, em caso de sucesso retorna por referência as informações de
	registro de DNS relacionados a E-mail armazenadas em formato de Array na variável
	arrayDnsMxRecords.
	Retornos:
		Success - Sucesso, conseguiu obter os valores de DNS relacionados a E-mail.
		GET_DNS_MX_RECORDS_ERROR - Falha ao obter os valores de DNS relacionados a E-mail.
	Data: 
	**/
	public function GetDnsMxRecords($Host, &$ArrayDnsMxRecords)
	{
		$ArrayDnsMxRecords = NULL;
		if (getmxrr($Host, $ArrayDnsMxRecords) == TRUE)
			return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::GET_DNS_MX_RECORDS_ERROR;
	}
	
	/**
	- Recebe um host e através deste tenta obter todos os registros de DNS do mesmo,
	onde, em caso de sucesso retorna por referência estes registros armazenados em formato de 
	Array na variável arrayDnsRecords.
	Retornos:
		Success - Sucesso, conseguiu obter os valores de DNS.
		GET_DNS_RECORDS_ERROR - Falha ao obter os valores de DNS.
	Data:
	**/
	public function GetDnsRecords($Host, &$ArrayDnsRecords)
	{
		$ArrayDnsRecords = NULL;
		$ArrayDnsRecords = dns_get_record($Host);
		if (!is_null($ArrayDnsRecords))
			return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::GET_DNS_RECORDS_ERROR;
	}
	
		/**
	- Recebe um endereço de IP e através deste tenta obter o hostname associado a este
	endereço, onde, em caso de sucesso retorna por referência o nome do host na variável 
	hostName.
	Retornos:
		Success - Sucesso, conseguiu obter o hostname.
		GET_HOSTNAME_ERROR - Falha ao obter o hostname com o dado endereço de IP.
	Data:
	**/
	public function GetHostName($IpAddress, &$HostName)
	{
		$HostName = NULL;
		$HostName = gethostbyaddr($IpAddress);
		if(isset($HostName))
		{
			if (!is_null($HostName) && $HostName != $IpAddress)
			return ConfigInfraTools::SUCCESS;
			else return ConfigInfraTools::GET_HOSTNAME_ERROR;
		}
		else return ConfigInfraTools::GET_HOSTNAME_ERROR;
	}
	
	/**
	- Recebe um host e através deste tenta obter todos os endereços de IP associados ao mesmo, 
	onde, em caso de sucesso retorna por referência todos os endereços de IP armazenados em formato
    de Array na variável arrayIpAddress.
	Retornos:
		Success - Sucesso, conseguiu obter o hostname.
		GET_HOST_IP_ADDRESS_ERROR - Falha ao obter o hostname com o dado endereço de IP.
	Data:
	**/
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
			return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::GET_HOST_IP_ADDRESS_ERROR;
	}
		
	/**
	- Recebe um host e através deste tenta obter todos os endereços de IP associados ao mesmo, 
	onde, em caso de sucesso retorna por referência todos os endereços de IP armazenados em formato
    de Array na variável arrayIpAddress.
	Retornos:
		Success - Sucesso, conseguiu obter o hostname.
		GET_LOCATION_BY_IP_ADDRESS_FAILED - Falha ao obter o hostname com o dado endereço de IP.
	Data:
	**/
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
				return ConfigInfraTools::SUCCESS;
			}
			else return ConfigInfraTools::GET_LOCATION_BY_IP_ADDRESS_FAILED;
		}
		else return ConfigInfraTools::GET_LOCATION_BY_IP_ADDRESS_FAILED_GET_CONTENTS;
	}

	
	public function GetProtocol($Number, &$Protocol)
	{
		$Protocol = getprotobynumber($Number);
		if ($Protocol != FALSE)
			return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::GET_PROTOCOL_ERROR;
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
		return ConfigInfraTools::SUCCESS;
	}
	
	public function GetService($Port, $Protocol, &$Service)
	{
		$Service = NULL;
		$Service = getservbyport($Port ,$Protocol);
		if (!is_null($Service))
			return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::GET_SERVICE_ERROR;
	}
	
	public function GetWebSiteContent($WebSite, &$Content)
	{
		$Content = NULL;
		$Content = @file_get_contents($WebSite);
		if (!is_null($Content))
		{
			$Content = "<div>" . mb_convert_encoding($Content, 'HTML-ENTITIES', "UTF-8") . "</div>";
			$Content = "<div>" . htmlspecialchars($Content, ENT_SUBSTITUTE) . "</div>";
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::GET_WEBSITE_CONTENT_ERROR;
	}
	
	public function GetWebSiteHeaders($WebSite, &$ArrayHeaders)
	{
		$ArrayHeaders = NULL;
		$ArrayHeaders = @get_headers($WebSite, 1);
		if (!is_null($ArrayHeaders))
			return ConfigInfraTools::SUCCESS;
		else return ConfigInfraTools::GET_WEBSITE_HEADERS_FAILED;
	}
	
	/**
	- Recebe um endereço de IP e através deste tenta obter o hostname associado a este
	endereço, onde, em caso de sucesso retorna por referência o nome do host na variável 
	hostName.
	Retornos:
		Success - Sucesso, conseguiu obter o hostname.
		GET_HOSTNAME_ERROR - Falha ao obter o hostname com o dado endereço de IP.
	Data:
	**/
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
					return ConfigInfraTools::SUCCESS;
				}
				else return ConfigInfraTools::GET_WHOIS_ERROR;
			}
			else return ConfigInfraTools::GET_WHOIS_ERROR;
		}
		else return ConfigInfraTools::GET_WHOIS_PACKAGE_NET_WHOIS_NOT_FOUND;
	}
}

?>