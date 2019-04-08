<?php

/************************************************************************
Class: InfraToolsFacedeBusiness
Creation: 2014/08/18
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/Model/Email.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/Model/InfraToolsDiagnosticTools.php
Description: 
			Class with the Pattern Facede for dealing wuth non database classes
Functions: 
			public function ArrayToPipe($array, $delimeter = '|', $parents = array(), $recursive = FALSE);
			public function CheckAvailability($HostName, &$ReturnMessage);
			public function CheckBlackListHost($HostName, &$ReturnMessage);
			public function CheckBlackListIpAddress($IpAddress, &$ReturnMessage);
			public function CheckDnsRecord($HostName, $RecordType, &$ReturnMessage);
			public function CheckEmailExists($EmailAddress, &$ReturnMessage);
			public function CheckPingServerHost($HostName, &$ReturnMessage);
			public function CheckPingServerIpAddress($IpAddress, &$ReturnMessage);
			public function CheckPortStatusHost($HostName, $Port, &$ReturnMessage);
			public function CheckPortStatusIpAddress($IpAddress, $Port, &$ReturnMessage);
			public function CheckWebSiteExists($WebSite, &$ReturnMessage);
			public function GetCalculationNetMaskGetCalculationNetMask($IpAddress, $Mask, &$ReturnMessage);
			public function GetDnsRecords($HostName, $DnsOption, &$ReturnMessage)
			public function GetHostName($IpAddress, &$HostName);
			public function GetWhois($HostName, &$Info);
			public function GetIpAddresses($HostName, &$ArrayIpAddress);
			public function GetLocation($IpAddress, &$ArrayLocationInformation);
			public function GetProtocol($Number, &$Protocol);
			public function GetRoute($IpAddress, &$ArrayRoute);
			public function GetService($Port, $Protocol, &$Service);
			public function GetWebSiteGetContent($WebSiteAddress, &$Content);
			public function GetWebSiteGetHeaders($WebSiteAddress, &$ArrayHeaders);
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

if (!class_exists("FacedeBusiness"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "FacedeBusiness.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "FacedeBusiness.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedeBusiness');
}

class InfraToolsFacedeBusiness extends FacedeBusiness
{		
	/* Instances */
	private static $Instance;
	private $InstanceBaseEmail                = NULL;
	
	/**                               **/
	/************* METODOS *************/
	/**                               **/
	
	protected static function SortArrayByType($a, $b)
	{
		return ord($a['type']) - ord($b['type']);
	}
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct($InstanceInfraToolsLanguage) 
    {
		if($this->Factory == NULL)
			$this->Factory = InfraToolsFactory::__create();
		if ($this->Language == NULL)
			$this->Language = $InstanceInfraToolsLanguage;
    }
	
	/* Create */
	public static function __create($InstanceInfraToolsLanguage)
    {
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "LanguageInfraTools.php"))
			exit('FacedeBusinessInfraTools: No language loaded!');
        if (!isset(self::$Instance) || self::$Instance != __CLASS__) 
		{
            $class = __CLASS__;
            self::$Instance = new $class($InstanceInfraToolsLanguage);
        }
        return self::$Instance;
    }
	
	public function CheckAvailability($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsDiagnosticTools->CheckAvailability($HostName);
				if($return == ConfigInfraTools::RET_OK)
					$ReturnMessage = $this->Language->GetText('CHECK_AVAILABILITY_FREE');
				else $ReturnMessage = $this->Language->GetText('CHECK_AVAILABILITY_TAKEN');
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::FM_INVALID_HOSTNAME;
			}
		}
		else
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			$return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckBlackListHost($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsDiagnosticTools->CheckBlackListHost($HostName, $ArrayBlackList);
				if($return == ConfigInfraTools::RET_OK)
					$ReturnMessage = str_replace('[0]', $HostName, 
												 $this->Language->GetText('CHECK_BLACKLIST_HOST_NOT_LSTED'));
				elseif($return == ConfigInfraTools::RETURN_CHECK_HOST_BLACKLIST_NO_IP_FOR_HOST)
					$ReturnMessage = str_replace('[0]', $HostName, 
												 $this->Language->GetText('CHECK_BLACKLIST_HOST_FAILED_TO_GET_IP'));
				else
				{
					$ReturnMessage = str_replace('[0]', $HostName, 
												 $this->Language->GetText('CHECK_BLACKLIST_HOST_LSTED'));
					foreach($ArrayBlackList as $blackListHost)
						$ReturnMessage .= str_replace('[0]', $blackListHost, 
												$this->Language->GetText('CHECK_BLACKLIST_ON_LST'));
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::FM_INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckBlackListIpAddress($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddressIpv4($IpAddress);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
			{
				$return = $instanceInfraToolsDiagnosticTools->CheckBlackListIp($IpAddress, $ArrayBlackList);
				if ($return == ConfigInfraTools::RET_OK)
					$ReturnMessage = str_replace('[0]', $IpAddress,
												 $this->Language->GetText('CHECK_BLACKLIST_IP_ADDRESS_NOT_LSTED'));
				else
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('CHECK_BLACKLIST_IP_ADDRESS_LSTED'));
					foreach($ArrayBlackList as $blackListIp)
						$ReturnMessage .= str_replace('[0]', $blackListIp, 
										$this->Language->GetText('CHECK_BLACKLIST_ON_LST'));
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS_IPV4;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckDnsRecord($HostName, $RecordType, &$ReturnMessage)
	{ 
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsDiagnosticTools->CheckDnsRecord($HostName, $RecordType);
				if ($return != ConfigInfraTools::RETURN_HOST_DNS_RECORD_TYPE_NOT_ALLOWED)
				{
					if($return == ConfigInfraTools::RET_OK)
					{
						$ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('CHECK_DNS_HAS_RECORD_TYPE'));
						$ReturnMessage = str_replace('[1]', $RecordType, $ReturnMessage);
					}
					else
					{ 
						$ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('CHECK_DNS_HAS_NO_RECORD_TYPE'));
						$ReturnMessage = str_replace('[1]', $RecordType, $ReturnMessage);
					}
					return $return;
				}
				else 
				{
					$ReturnMessage = $this->Language->GetText('INVALID_OPTION');
					return $return = ConfigInfraTools::FM_INVALID_DNS_RECORD;
				}
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::FM_INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckEmailExists($EmailAddress, &$ReturnMessage)
	{
		$configInfraTools = $this->Factory->CreateConfigInfraTools();
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateEmail($EmailAddress, "email@email.com");
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if($return != ConfigInfraTools::INVALID_DEFAULT_VALUE)
			{
				if ($this->InstanceBaseEmail == NULL)
					$this->InstanceBaseEmail = $this->Factory->CreateEmail();
				$return = $this->InstanceBaseEmail->ValidateEmail($EmailAddress, 
																  $configInfraTools->DefaultEmailNoReplyFormAddress, 
																  FALSE);
				if ($return != Email::ReturnDomainDoesNotHaveEmailRecordsOrNotExist)
				{
					if ($return != Email::ReturnDomainNoHostAvailableToConnect)
					{
						if ($return != Email::ReturnEmailDoesNotExist)
						{
							$ReturnMessage = str_replace('[0]', $EmailAddress, 
												$this->Language->GetText('CHECK_EMAIL_EXISTS_SUCCESS'));
						}
						else $ReturnMessage = str_replace('[0]', $EmailAddress, 
												$this->Language->GetText('CHECK_EMAIL_EXISTS_FAILED'));
					}
					else $ReturnMessage = str_replace('[0]', $EmailAddress, 
												$this->Language->GetText('CHECK_EMAIL_EXISTS_DOMAIN_NOT_AVAILABLE'));
				}
				else $ReturnMessage = str_replace('[0]', $EmailAddress, 
												$this->Language->GetText('CHECK_EMAIL_EXISTS_DOMAIN_NOT_EXISTS'));
			}
			else
			{
				$ReturnMessage = $this->Language->GetText('DEFAULT_VALUE');
				return $return = ConfigInfraTools::INVALID_NULL;
			}
		}
		else
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
		return $return;
	}
	
	public function CheckIpAddressIsInNetwork($IpAddress, $NetworkWithAddress, $NetworkMask, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddressIpv4($IpAddress);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
			{
				$return = $FormValidator->ValidateIpAddressIpv4($NetworkWithAddress);
				if ($return != ConfigInfraTools::INVALID_NULL)
				{
					if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
					{
						$return = $FormValidator->ValidateNetmask($NetworkMask);
						if ($return != ConfigInfraTools::INVALID_NULL)
						{
							if ($return != ConfigInfraTools::INVALID_NETMASK)
							{
								$networkWithMask = $NetworkWithAddress . "/" . $NetworkMask;
								$return = $instanceInfraToolsDiagnosticTools->CheckIpAddressIsInNetwork($IpAddress, $networkWithMask);
								if($return == ConfigInfraTools::RET_OK)
								{
									$ReturnMessage = str_replace('[0]', $IpAddress, 
									  $this->Language->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_SUCCESS'));
									$ReturnMessage = str_replace('[1]', $networkWithMask, $ReturnMessage);
								}
								else
								{
									$ReturnMessage = str_replace('[0]', $IpAddress, 
									  $this->Language->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_FAILED'));
									$ReturnMessage = str_replace('[1]', $networkWithMask, $ReturnMessage);
								}
								return $return;
							}
							else 
							{
								$ReturnMessage = $this->Language->GetText('FM_INVALID_NETWORK_NETMASK');
								return $return = ConfigInfraTools::INVALID_NETMASK;
							}
						}
						else 
						{
							$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
							return $return = ConfigInfraTools::INVALID_NULL;
						}
					}
					else 
					{
						$ReturnMessage = $this->Language->GetText('INVALID_NETWORK_ADDRESS');
						return $return = ConfigInfraTools::INVALID_IP_ADDRESS_IPV4;
					}
				}
				else 
				{
					$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
					return $return = ConfigInfraTools::INVALID_NULL;
				}
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS_IPV4;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckPingServerHost($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsDiagnosticTools->CheckPingServer($HostName, $ArrayOutput);
				if($return == ConfigInfraTools::RET_OK)
				{
					foreach($ArrayOutput as $outputLine)
						$ReturnMessage .= $outputLine . "<br>";
				}
				else $ReturnMessage = str_replace('[0]', $HostName, 
										$this->Language->GetText('CHECK_PING_SERVER_HOST_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::FM_INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckPingServerIpAddress($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddressIpv4($IpAddress);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
			{
				$return = $instanceInfraToolsDiagnosticTools->CheckPingServer($IpAddress, $ArrayOutput);
				if($return == ConfigInfraTools::RET_OK)
				{
					foreach($ArrayOutput as $outputLine)
						$ReturnMessage .= $outputLine . "<br>";
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('CHECK_PING_SERVER_IP_ADDRESS_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS_IPV4;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckPortStatusHost($HostName, $Port, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsDiagnosticTools->CheckPortStatus($HostName, $Port);
				if($return == ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_UNKNOWN)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->Language->GetText('CHECK_PORT_STATUS_HOST_FAILED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_TIMEOUT)
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->Language->GetText('CHECK_PORT_STATUS_TIMEOUT'));
				elseif($return == ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_REFUSED)
				{
					$ReturnMessage = str_replace('[0]', $Port,
										$this->Language->GetText('CHECK_PORT_STATUS_HOST_BLOCKED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_DISALLOWED)
				{
					$ReturnMessage = str_replace('[0]', $Port,
										$this->Language->GetText('CHECK_PORT_STATUS_HOST_DISALLOWED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				else
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->Language->GetText('CHECK_PORT_STATUS_HOST_OPENED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::FM_INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckPortStatusIpAddress($IpAddress, $Port, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddressIpv4($IpAddress);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
			{
				$return = $instanceInfraToolsDiagnosticTools->CheckPortStatus($IpAddress, $Port);
				if($return == ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_UNKNOWN)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
							$this->Language->GetText('CHECK_PORT_STATUS_IP_ADDRESS_FAILED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_TIMEOUT)
					$ReturnMessage = str_replace('[0]', $Port,
							$this->Language->GetText('CHECK_PORT_STATUS_TIMEOUT'));
				elseif($return == ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_REFUSED)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
							$this->Language->GetText('CHECK_PORT_STATUS_IP_ADDRESS_BLOCKED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::RETURN_CHECK_HOST_PORT_FAILED_DISALLOWED)
				{
					$ReturnMessage = str_replace('[0]', $Port,
										$this->Language->GetText('CHECK_PORT_STATUS_HOST_DISALLOWED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				else
				{
					$ReturnMessage = str_replace('[0]', $Port,
							$this->Language->GetText('CHECK_PORT_STATUS_IP_ADDRESS_OPENED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS_IPV4;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckWebSiteExists($WebSite, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateURL($WebSiteAddress, "example.com");
		if($return != ConfigInfraTools::INVALID_NULL)
		{
			if($return != ConfigInfraTools::INVALID_URL)
			{
				$return = $instanceInfraToolsDiagnosticTools->GetWebSiteHeaders($WebSiteAddress, $ArrayHeaders);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->Language->GetText('CHECK_WEBSITE_EXISTS_SUCCESS'));
					return $return;
				}
				else 
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->Language->GetText('CHECK_WEBSITE_EXISTS_FAILED'));
					return $return = ConfigInfraTools::FM_INVALID_WEBSITE;
				}
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_WEBSITE');
				return $return = ConfigInfraTools::FM_INVALID_WEBSITE;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetCalculationNetMask($IpAddress, $Mask, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$subNetworkIp = NULL; $netMask = NULL; $broadCastAddress = NULL; $availableNetworkIps = NULL;
		$return = $FormValidator->ValidateIpAddressIpv4($IpAddress);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
			{
				$return = $FormValidator->ValidateNetmask($Mask);
				if ($return != ConfigInfraTools::INVALID_NULL)
				{
					if ($return != ConfigInfraTools::INVALID_NETMASK)
					{
						$return = $instanceInfraToolsDiagnosticTools->GetCalculationNetMask($IpAddress, $Mask, $subNetworkIp, 
																		  $netMask, $broadCastAddress, $availableNetworkIps);
						if($return == ConfigInfraTools::RET_OK)
						{
							$ReturnMessage = str_replace('[0]', $IpAddress,         
									$this->Language->GetText('GET_CALCULATION_NETMASK_IP_ADDRESS'));
							$ReturnMessage .= str_replace('[0]', $Mask,             
									$this->Language->GetText('GET_CALCULATION_NETMASK_MASK'));
							$ReturnMessage .= str_replace('[0]', $subNetworkIp,     
									$this->Language->GetText('GET_CALCULATION_NETMASK_SUB_NETWORK'));
							$ReturnMessage .= str_replace('[0]', $broadCastAddress, 
									$this->Language->GetText('GET_CALCULATION_NETMASK_BROADCAST'));
							$ReturnMessage .= str_replace('[0]', $netMask,          
									$this->Language->GetText('GET_CALCULATION_NETMASK_SUB_MASK'));
							$ReturnMessage .= str_replace('[0]', $availableNetworkIps,
									$this->Language->GetText('GET_CALCULATION_NETMASK_AVAILABLE_IP_ADDRESSES'));
						}
						else $ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
						return $return;
					}
					else
					{
						$ReturnMessage = $this->Language->GetText('FM_INVALID_NETWORK_NETMASK');
						return $return = ConfigInfraTools::INVALID_NETMASK;
					}
				}
				else
				{
					$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
					return $return = ConfigInfraTools::INVALID_NULL;
				}
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS_IPV4;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetDnsRecords($HostName, $DnsOption, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_HOST_NAME)
			{
				if($DnsOption == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL_MX)
				{
					$return = $instanceInfraToolsDiagnosticTools->GetDnsMxRecords($HostName, $ArrayDnsMxRecords);
					if($return == ConfigInfraTools::RET_OK)
					{
						foreach($ArrayDnsMxRecords as $dnsMxRecords)
							$ReturnMessage .= $dnsMxRecords . "<br>";
					}
					else $ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('GET_DNS_MX_RECORDS_ERROR')); 
					return $return;
				}
				else
				{
					$return = $instanceInfraToolsDiagnosticTools->GetDnsRecords($HostName, $ArrayDnsRecords);
					if($return == ConfigInfraTools::RET_OK)
					{
						usort($ArrayDnsRecords,'FacedeBusinessInfraTools::SortArrayByType');
						$ReturnMessage = "<table class='GetDnsRecordsTable'>";
						foreach($ArrayDnsRecords as $dnsRecords)
						{
							$ReturnMessage .= "<tr>";
							$ReturnMessage .= "<td class='GetDnsRecordsTableTdType'>";
							if(isset($dnsRecords['type']))
								$ReturnMessage .= "<b>Type:</b> "     . $dnsRecords['type'];
							else $ReturnMessage .= "<b>Type:</b>";
							$ReturnMessage .= "</td>";
							$ReturnMessage .= "<td class='GetDnsRecordsTableTdPriority'>";
							if(isset($dnsRecords['pri']))
								$ReturnMessage .= "<b>Priority:</b> " . $dnsRecords['pri'];
							else $ReturnMessage .= "<b>Priority:</b>";
							$ReturnMessage .= "</td>";
							$ReturnMessage .= "<td class='GetDnsRecordsTableTdTarget'>";
							if(isset($dnsRecords['target']))
								$ReturnMessage .= "<b>Target:</b> "   . $dnsRecords['target'];
							else $ReturnMessage .= "<b>Target:</b>";
							$ReturnMessage .= "</td>";
							$ReturnMessage .= "<td class='GetDnsRecordsTableTdIp'>";
							if(isset($dnsRecords['ip']))
								$ReturnMessage .= "<b>Ip:</b> "       . $dnsRecords['ip'];
							else $ReturnMessage .= "<b>Ip:</b>";
							$ReturnMessage .= "</td>";
							$ReturnMessage .= "<td class='GetDnsRecordsTableTdTtl'>";
							if(isset($dnsRecords['ttl']))
								$ReturnMessage .= "<b>TTL:</b> "      . $dnsRecords['ttl'];    
							else $ReturnMessage .= "<b>TTL:</b>";
							$ReturnMessage .= "<td>";
							$ReturnMessage .= "</tr>";
						}
						$ReturnMessage .= "</table>";
					}
					else $ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('GET_DNS_RECORDS_ERROR', $language));
					return $return;
				}
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_HOSTNAME', $language);
				return $return = ConfigInfraTools::FM_INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS', $language);
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetHostName($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddressIpv4($IpAddress);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
			{
				$return = $instanceInfraToolsDiagnosticTools->GetHostName($IpAddress, $HostName);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('GET_HOSTNAME_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('GET_HOSTNAME_ERROR'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS_IPV4;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetIpAddresses($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsDiagnosticTools->GetIpAddresses($HostName, $ArrayIpAddress);
				if ($return == ConfigInfraTools::RET_OK)
				{
					foreach($ArrayIpAddress as $ipAddress)
						$ReturnMessage .= str_replace('[0]', $ipAddress, 
											$this->Language->GetText('GET_IP_ADDRESSES_SUCCESS'));
				}
				else $ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('GET_IP_ADDRESSES_ERROR'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::FM_INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetLocation($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddressIpv4($IpAddress);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
			{
				$return = $instanceInfraToolsDiagnosticTools->GetLocation($IpAddress, $ArrayLocationInformation);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage .= array_shift($ArrayLocationInformation) . "<br>";
					$ReturnMessage .= array_shift($ArrayLocationInformation) . "<br>";
					$ReturnMessage .= array_shift($ArrayLocationInformation) . "<br>";
				}
				else if($return == ConfigInfraTools::RETURN_GET_LOCATION_BY_IP_ADDRESS_FAILED_GET_CONTENTS)
					$ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->Language->GetText('GET_LOCATION_ERROR_GET_CONTENTS'));
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->Language->GetText('GET_LOCATION_ERROR'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS_IPV4;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetProtocol($Number, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateNumericValue($Number, "");
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return == ConfigInfraTools::RET_OK)
			{
				$return = $instanceInfraToolsDiagnosticTools->GetProtocol($Number, $Protocol);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage = str_replace('[0]', $Number, 
											$this->Language->GetText('GET_PROTOCOL_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $Protocol, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $Number, 
											$this->Language->GetText('GET_PROTOCOL_ERROR'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_PROTOCOL_NUMBER');
				return $return = ConfigInfraTools::FM_INVALID_PROTOCOL_NUMBER;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetRoute($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$timeToLive = 30;
		$return = $FormValidator->ValidateIpAddressIpv4($IpAddress);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
			{
				$return = $instanceInfraToolsDiagnosticTools->GetRoute($IpAddress, $timeToLive, $ArrayRoute);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('GET_ROUTE_SUCCESS'));
					foreach($ArrayRoute as $route)
						$ReturnMessage .= $route . "<br>";
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('GET_ROUTE_ERROR'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS_IPV4;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetService($Port, $Protocol, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateNumericValue($Port, 0);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return == ConfigInfraTools::RET_OK)
			{
				if ($Protocol == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL_TCP)
					$Protocol = InfraToolsDiagnosticTools::PROTOCOL_TCP;
				elseif ($Protocol == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL_UDP)
					$Protocol = InfraToolsDiagnosticTools::PROTOCOL_UDP;
				else 
				{
					$ReturnMessage = $this->Language->GetText('FM_INVALID_PROTOCOL');
					return $return = ConfigInfraTools::FM_INVALID_PROTOCOL;
				}
				$return = $instanceInfraToolsDiagnosticTools->GetService($Port, $Protocol, $Service);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage  = str_replace('[0]', $Port, 
													$this->Language->GetText('GET_SERVICE_SUCCESS'));
					$ReturnMessage  = str_replace('[1]', $Protocol, $ReturnMessage);
					$ReturnMessage  = str_replace('[2]', $Service, $ReturnMessage);
				}
				else
				{ 
					$ReturnMessage  = str_replace('[0]', $Port, 
													$this->Language->GetText('GET_SERVICE_ERROR'));
					$ReturnMessage  = str_replace('[1]', $Protocol, $ReturnMessage);
				}
				return $return;
			}
			else
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_PORT');
				return $return = ConfigInfraTools::FM_INVALID_PORT;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetWebSiteContent($WebSiteAddress, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateURL($WebSiteAddress, "example.com");
		if($return != ConfigInfraTools::INVALID_NULL)
		{
			if($return != ConfigInfraTools::INVALID_URL)
			{
				if(strstr($WebSiteAddress, "http://") == FALSE && strstr($WebSiteAddress, "https://") == FALSE)
					$WebSiteAddress = "http://" . $WebSiteAddress;
				$return = $instanceInfraToolsDiagnosticTools->GetWebSiteContent($WebSiteAddress, $Content);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage  = str_replace('[0]', $WebSiteAddress, 
											$this->Language->GetText('GET_WEBSITE_CONTENT_SUCCESS'));
					$ReturnMessage .= $Content;
				}
				else $ReturnMessage = str_replace('[0]', $WebSiteAddress, 
											$this->Language->GetText('GET_WEBSITE_CONTENT_ERROR'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_WEBSITE');
				return $return = ConfigInfraTools::FM_INVALID_WEBSITE;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetWebSiteHeaders($WebSiteAddress, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateURL($WebSiteAddress, "example.com");
		if($return != ConfigInfraTools::INVALID_NULL)
		{
			if($return != ConfigInfraTools::INVALID_URL)
			{
				if(strstr($WebSiteAddress, "http://") == FALSE && strstr($WebSiteAddress, "https://") == FALSE)
					$WebSiteAddress = "http://" . $WebSiteAddress;
				$return = $instanceInfraToolsDiagnosticTools->GetWebSiteHeaders($WebSiteAddress, $ArrayHeaders);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage = str_replace('[0]', $WebSiteAddress, 
										$this->Language->GetText('GET_WEBSITE_HEADER_SUCCESS'));
					foreach($ArrayHeaders as $header)
					{
						if(!is_array($header))
							$ReturnMessage .= $header . "<br>";
						else
						{
							foreach($header as $headerLine)
								$ReturnMessage .= $headerLine . "<br>";
						}
					}
				}
				else $ReturnMessage = str_replace('[0]', $WebSiteAddress, 
										$this->Language->GetText('GET_WEBSITE_HEADER_ERROR'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_WEBSITE');
				return $return = ConfigInfraTools::FM_INVALID_WEBSITE;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetWhoisHost($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsDiagnosticTools->GetWhois($HostName, $Info);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('GET_WHOIS_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $Info, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('GET_WHOIS_ERROR'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::FM_INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetWhoisIpAddress($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsDiagnosticTools = $this->Factory->CreateInfraToolsDiagnosticTools();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddressIpv4($IpAddress);
		if ($return != ConfigInfraTools::INVALID_NULL)
		{
			if ($return != ConfigInfraTools::INVALID_IP_ADDRESS_IPV4)
			{
				$return = $instanceInfraToolsDiagnosticTools->GetWhois($IpAddress, $Info);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->Language->GetText('GET_WHOIS_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $Info, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->Language->GetText('GET_WHOIS_ERROR'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FM_INVALID_IP_ADDRESS_IPV4');
				return $return = ConfigInfraTools::FM_INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->Language->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
}
?>