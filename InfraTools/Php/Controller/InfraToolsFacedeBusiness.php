<?php

/************************************************************************
Class: InfraToolsFacedeBusiness
Creation: 18/08/2014
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/Model/Email.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/Model/InfraToolsNetwork.php
Description: 
			Classe existente para tratamento do negócio utilizado pelas telas.
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
	
	/* Get Instance */
	public static function __create($InstanceInfraToolsLanguage)
    {
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "LanguageInfraTools.php"))
			exit('FacedeBusinessInfraTools: No language loaded!');
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class($InstanceInfraToolsLanguage);
        }
        return self::$Instance;
    }
	
	public function CheckAvailability($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->CheckAvailability($HostName);
				if($return == ConfigInfraTools::SUCCESS)
					$ReturnMessage = $this->Language->GetText('CHECK_AVAILABILITY_FREE');
				else $ReturnMessage = $this->Language->GetText('CHECK_AVAILABILITY_TAKEN');
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->CheckBlackListHost($HostName, $ArrayBlackList);
				if($return == ConfigInfraTools::SUCCESS)
					$ReturnMessage = str_replace('[0]', $HostName, 
												 $this->Language->GetText('CHECK_BLACKLIST_HOST_NOT_LISTED'));
				elseif($return == ConfigInfraTools::CHECK_HOST_BLACKLIST_NO_IP_FOR_HOST)
					$ReturnMessage = str_replace('[0]', $HostName, 
												 $this->Language->GetText('CHECK_BLACKLIST_HOST_FAILED_TO_GET_IP'));
				else
				{
					$ReturnMessage = str_replace('[0]', $HostName, 
												 $this->Language->GetText('CHECK_BLACKLIST_HOST_LISTED'));
					foreach($ArrayBlackList as $blackListHost)
						$ReturnMessage .= str_replace('[0]', $blackListHost, 
												$this->Language->GetText('CHECK_BLACKLIST_ON_LIST'));
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->CheckBlackListIp($IpAddress, $ArrayBlackList);
				if ($return == ConfigInfraTools::SUCCESS)
					$ReturnMessage = str_replace('[0]', $IpAddress,
												 $this->Language->GetText('CHECK_BLACKLIST_IP_ADDRESS_NOT_LISTED'));
				else
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('CHECK_BLACKLIST_IP_ADDRESS_LISTED'));
					foreach($ArrayBlackList as $blackListIp)
						$ReturnMessage .= str_replace('[0]', $blackListIp, 
										$this->Language->GetText('CHECK_BLACKLIST_ON_LIST'));
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->CheckDnsRecord($HostName, $RecordType);
				if ($return != ConfigInfraTools::CHECK_HOST_DNS_RECORD_TYPE_NOT_ALLOWED)
				{
					if($return == ConfigInfraTools::SUCCESS)
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
					return $return = ConfigInfraTools::INVALID_DNS_RECORD;
				}
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateEmail($EmailAddress, "email@email.com");
		if ($return != FormValidator::INVALID_NULL)
		{
			if($return != FormValidator::INVALID_DEFAULT_VALUE)
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $FormValidator->ValidateIpAddress($NetworkWithAddress);
				if ($return != FormValidator::INVALID_NULL)
				{
					if ($return != FormValidator::INVALID_IP_ADDRESS)
					{
						$return = $FormValidator->ValidateIpMask($NetworkMask);
						if ($return != FormValidator::INVALID_NULL)
						{
							if ($return != FormValidator::INVALID_IP_MASK)
							{
								$networkWithMask = $NetworkWithAddress . "/" . $NetworkMask;
								$return = $instanceInfraToolsNetwork->CheckIpAddressIsInNetwork($IpAddress, $networkWithMask);
								if($return == ConfigInfraTools::SUCCESS)
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
								$ReturnMessage = $this->Language->GetText('INVALID_MASK');
								return $return = ConfigInfraTools::INVALID_IP_MASK;
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
						return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
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
				$ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->CheckPingServer($HostName, $ArrayOutput);
				if($return == ConfigInfraTools::SUCCESS)
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
				$ReturnMessage = $this->Language->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->CheckPingServer($IpAddress, $ArrayOutput);
				if($return == ConfigInfraTools::SUCCESS)
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
				$ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->CheckPortStatus($HostName, $Port);
				if($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_UNKNOWN)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->Language->GetText('CHECK_PORT_STATUS_HOST_FAILED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_TIMEOUT)
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->Language->GetText('CHECK_PORT_STATUS_TIMEOUT'));
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_REFUSED)
				{
					$ReturnMessage = str_replace('[0]', $Port,
										$this->Language->GetText('CHECK_PORT_STATUS_HOST_BLOCKED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_DISALLOWED)
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
				$ReturnMessage = $this->Language->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->CheckPortStatus($IpAddress, $Port);
				if($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_UNKNOWN)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
							$this->Language->GetText('CHECK_PORT_STATUS_IP_ADDRESS_FAILED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_TIMEOUT)
					$ReturnMessage = str_replace('[0]', $Port,
							$this->Language->GetText('CHECK_PORT_STATUS_TIMEOUT'));
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_REFUSED)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
							$this->Language->GetText('CHECK_PORT_STATUS_IP_ADDRESS_BLOCKED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_DISALLOWED)
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
				$ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateURL($WebSiteAddress, "example.com");
		if($return != FormValidator::INVALID_NULL)
		{
			if($return != FormValidator::INVALID_URL)
			{
				$return = $instanceInfraToolsNetwork->GetWebSiteHeaders($WebSiteAddress, $ArrayHeaders);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->Language->GetText('CHECK_WEBSITE_EXISTS_SUCCESS'));
					return $return;
				}
				else 
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->Language->GetText('CHECK_WEBSITE_EXISTS_FAILED'));
					return $return = ConfigInfraTools::INVALID_WEBSITE;
				}
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('INVALID_WEBSITE');
				return $return = ConfigInfraTools::INVALID_WEBSITE;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$subNetworkIp = NULL; $netMask = NULL; $broadCastAddress = NULL; $availableNetworkIps = NULL;
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $FormValidator->ValidateIpMask($Mask);
				if ($return != FormValidator::INVALID_NULL)
				{
					if ($return != FormValidator::INVALID_IP_MASK)
					{
						$return = $instanceInfraToolsNetwork->GetCalculationNetMask($IpAddress, $Mask, $subNetworkIp, 
																		  $netMask, $broadCastAddress, $availableNetworkIps);
						if($return == ConfigInfraTools::SUCCESS)
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
						else $ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
						return $return;
					}
					else
					{
						$ReturnMessage = $this->Language->GetText('INVALID_MASK');
						return $return = ConfigInfraTools::INVALID_IP_MASK;
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
				$ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				if($DnsOption == ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_SELECT_MX)
				{
					$return = $instanceInfraToolsNetwork->GetDnsMxRecords($HostName, $ArrayDnsMxRecords);
					if($return == ConfigInfraTools::SUCCESS)
					{
						foreach($ArrayDnsMxRecords as $dnsMxRecords)
							$ReturnMessage .= $dnsMxRecords . "<br>";
					}
					else $ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('GET_DNS_MX_RECORDS_FAILED')); 
					return $return;
				}
				else
				{
					$return = $instanceInfraToolsNetwork->GetDnsRecords($HostName, $ArrayDnsRecords);
					if($return == ConfigInfraTools::SUCCESS)
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
											$this->Language->GetText('GET_DNS_RECORDS_FAILED', $language));
					return $return;
				}
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FORM_INVALID_HOSTNAME', $language);
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->GetHostName($IpAddress, $HostName);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('GET_HOSTNAME_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('GET_HOSTNAME_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->GetIpAddresses($HostName, $ArrayIpAddress);
				if ($return == ConfigInfraTools::SUCCESS)
				{
					foreach($ArrayIpAddress as $ipAddress)
						$ReturnMessage .= str_replace('[0]', $ipAddress, 
											$this->Language->GetText('GET_IP_ADDRESSES_SUCCESS'));
				}
				else $ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('GET_IP_ADDRESSES_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->GetLocation($IpAddress, $ArrayLocationInformation);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage .= array_shift($ArrayLocationInformation) . "<br>";
					$ReturnMessage .= array_shift($ArrayLocationInformation) . "<br>";
					$ReturnMessage .= array_shift($ArrayLocationInformation) . "<br>";
				}
				else if($return == ConfigInfraTools::GET_LOCATION_BY_IP_ADDRESS_FAILED_GET_CONTENTS)
					$ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->Language->GetText('GET_LOCATION_FAILED_GET_CONTENTS'));
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->Language->GetText('GET_LOCATION_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateNumericValue($Number, "");
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return == ConfigInfraTools::SUCCESS)
			{
				$return = $instanceInfraToolsNetwork->GetProtocol($Number, $Protocol);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $Number, 
											$this->Language->GetText('GET_PROTOCOL_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $Protocol, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $Number, 
											$this->Language->GetText('GET_PROTOCOL_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('INVALID_PROTOCOL_NUMBER');
				return $return = ConfigInfraTools::INVALID_PROTOCOL_NUMBER;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$timeToLive = 30;
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->GetRoute($IpAddress, $timeToLive, $ArrayRoute);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('GET_ROUTE_SUCCESS'));
					foreach($ArrayRoute as $route)
						$ReturnMessage .= $route . "<br>";
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->Language->GetText('GET_ROUTE_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateNumericValue($Port, 0);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return == ConfigInfraTools::SUCCESS)
			{
				if ($Protocol == ConfigInfraTools::FUNCTION_GET_SERVICE_SELECT_TCP)
					$Protocol = InfraToolsNetwork::PROTOCOL_TCP;
				elseif ($Protocol == ConfigInfraTools::FUNCTION_GET_SERVICE_SELECT_UDP)
					$Protocol = InfraToolsNetwork::PROTOCOL_UDP;
				else 
				{
					$ReturnMessage = $this->Language->GetText('INVALID_PROTOCOL');
					return $return = ConfigInfraTools::INVALID_PROTOCOL;
				}
				$return = $instanceInfraToolsNetwork->GetService($Port, $Protocol, $Service);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage  = str_replace('[0]', $Port, 
													$this->Language->GetText('GET_SERVICE_SUCCESS'));
					$ReturnMessage  = str_replace('[1]', $Protocol, $ReturnMessage);
					$ReturnMessage  = str_replace('[2]', $Service, $ReturnMessage);
				}
				else
				{ 
					$ReturnMessage  = str_replace('[0]', $Port, 
													$this->Language->GetText('GET_SERVICE_FAILED'));
					$ReturnMessage  = str_replace('[1]', $Protocol, $ReturnMessage);
				}
				return $return;
			}
			else
			{
				$ReturnMessage = $this->Language->GetText('INVALID_PORT');
				return $return = ConfigInfraTools::INVALID_PORT;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateURL($WebSiteAddress, "example.com");
		if($return != FormValidator::INVALID_NULL)
		{
			if($return != FormValidator::INVALID_URL)
			{
				if(strstr($WebSiteAddress, "http://") == FALSE && strstr($WebSiteAddress, "https://") == FALSE)
					$WebSiteAddress = "http://" . $WebSiteAddress;
				$return = $instanceInfraToolsNetwork->GetWebSiteContent($WebSiteAddress, $Content);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage  = str_replace('[0]', $WebSiteAddress, 
											$this->Language->GetText('GET_WEBSITE_CONTENT_SUCCESS'));
					$ReturnMessage .= $Content;
				}
				else $ReturnMessage = str_replace('[0]', $WebSiteAddress, 
											$this->Language->GetText('GET_WEBSITE_CONTENT_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('INVALID_WEBSITE');
				return $return = ConfigInfraTools::INVALID_WEBSITE;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateURL($WebSiteAddress, "example.com");
		if($return != FormValidator::INVALID_NULL)
		{
			if($return != FormValidator::INVALID_URL)
			{
				if(strstr($WebSiteAddress, "http://") == FALSE && strstr($WebSiteAddress, "https://") == FALSE)
					$WebSiteAddress = "http://" . $WebSiteAddress;
				$return = $instanceInfraToolsNetwork->GetWebSiteHeaders($WebSiteAddress, $ArrayHeaders);
				if($return == ConfigInfraTools::SUCCESS)
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
										$this->Language->GetText('GET_WEBSITE_HEADER_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('INVALID_WEBSITE');
				return $return = ConfigInfraTools::INVALID_WEBSITE;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->GetWhois($HostName, $Info);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('GET_WHOIS_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $Info, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $HostName, 
											$this->Language->GetText('GET_WHOIS_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
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
		$instanceInfraToolsNetwork = $this->Factory->CreateInfraToolsNetwork();
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->GetWhois($IpAddress, $Info);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->Language->GetText('GET_WHOIS_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $Info, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->Language->GetText('GET_WHOIS_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->Language->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
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