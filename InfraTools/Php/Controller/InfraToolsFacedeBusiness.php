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
			public function CheckEmailExists($Email, &$ReturnMessage);
			public function CheckPingServerHost($HostName, &$ReturnMessage);
			public function CheckPingServerIpAddress($IpAddress, &$ReturnMessage);
			public function CheckPortStatusHost($HostName, $Port, &$ReturnMessage);
			public function CheckPortStatusIpAddress($IpAddress, $Port, &$ReturnMessage);
			public function CheckWebSiteExists($WebSite, &$ReturnMessage);
			public function GenerateRandomCode();
			public function GenerateRandomPassword($length = 8);
			public function GetBrowserClient($TrueValue, &$ReturnMessage);
			public function GetCalculationNetMaskGetCalculationNetMask($IpAddress, $Mask, &$ReturnMessage);
			public function GetDnsRecords($HostName, $DnsOption, &$ReturnMessage)
			public function GetHostName($IpAddress, &$HostName);
			public function GetWhois($HostName, &$Info);
			public function GetIpAddresses($HostName, &$ArrayIpAddress);
			public function GetIpAddressClient($TrueValue, &$ReturnMessage);
			public function GetLocation($IpAddress, &$ArrayLocationInformation);
			public function GetOperationalSystem($TrueValue &$ReturnMessage);
			public function GetProtocol($Number, &$Protocol);
			public function GetRoute($IpAddress, &$ArrayRoute);
			public function GetService($Port, $Protocol, &$Service);
			public function GetWebSiteGetContent($WebSiteAddress, &$Content);
			public function GetWebSiteGetHeaders($WebSiteAddress, &$ArrayHeaders);
			public function SendEmailLoginTwoStepVerificationCode($Email, $Name, $TwoStepVerificationCode, $Debug);
			public function SendEmailPasswordReset($Name, $Email, $Password, $Debug);
			public function SendEmailContact($Email, $Message, $Name, $Subject, $Title, $Debug);
			public function SendEmailPasswordRecovery($Email, $ResetCode, $Debug);
			public function SendEmailRegister($Name, $Email, $Link, $Debug);
			public function SendEmailResendConfirmationLink($Name, $Email, $Link, $Debug);
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
	private $InfraToolsFactory        = NULL;
	private $InstanceBaseEmail                = NULL;
	private $InstanceInfraToolsLanguage       = NULL;
	
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
		if($this->InfraToolsFactory == NULL)
			$this->InfraToolsFactory = InfraToolsFactory::__create();
		if ($this->InstanceInfraToolsLanguage == NULL)
			$this->InstanceInfraToolsLanguage = $InstanceInfraToolsLanguage;
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
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->CheckAvailability($HostName);
				if($return == ConfigInfraTools::SUCCESS)
					$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('CHECK_AVAILABILITY_FREE');
				else $ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('CHECK_AVAILABILITY_TAKEN');
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
			}
		}
		else
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			$return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckBlackListHost($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->CheckBlackListHost($HostName, $ArrayBlackList);
				if($return == ConfigInfraTools::SUCCESS)
					$ReturnMessage = str_replace('[0]', $HostName, 
												 $this->InstanceInfraToolsLanguage->GetText('CHECK_BLACKLIST_HOST_NOT_LISTED'));
				elseif($return == ConfigInfraTools::CHECK_HOST_BLACKLIST_NO_IP_FOR_HOST)
					$ReturnMessage = str_replace('[0]', $HostName, 
												 $this->InstanceInfraToolsLanguage->GetText('CHECK_BLACKLIST_HOST_FAILED_TO_GET_IP'));
				else
				{
					$ReturnMessage = str_replace('[0]', $HostName, 
												 $this->InstanceInfraToolsLanguage->GetText('CHECK_BLACKLIST_HOST_LISTED'));
					foreach($ArrayBlackList as $blackListHost)
						$ReturnMessage .= str_replace('[0]', $blackListHost, 
												$this->InstanceInfraToolsLanguage->GetText('CHECK_BLACKLIST_ON_LIST'));
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckBlackListIpAddress($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->CheckBlackListIp($IpAddress, $ArrayBlackList);
				if ($return == ConfigInfraTools::SUCCESS)
					$ReturnMessage = str_replace('[0]', $IpAddress,
												 $this->InstanceInfraToolsLanguage->GetText('CHECK_BLACKLIST_IP_ADDRESS_NOT_LISTED'));
				else
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->InstanceInfraToolsLanguage->GetText('CHECK_BLACKLIST_IP_ADDRESS_LISTED'));
					foreach($ArrayBlackList as $blackListIp)
						$ReturnMessage .= str_replace('[0]', $blackListIp, 
										$this->InstanceInfraToolsLanguage->GetText('CHECK_BLACKLIST_ON_LIST'));
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckDnsRecord($HostName, $RecordType, &$ReturnMessage)
	{ 
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
											$this->InstanceInfraToolsLanguage->GetText('CHECK_DNS_HAS_RECORD_TYPE'));
						$ReturnMessage = str_replace('[1]', $RecordType, $ReturnMessage);
					}
					else
					{ 
						$ReturnMessage = str_replace('[0]', $HostName, 
											$this->InstanceInfraToolsLanguage->GetText('CHECK_DNS_HAS_NO_RECORD_TYPE'));
						$ReturnMessage = str_replace('[1]', $RecordType, $ReturnMessage);
					}
					return $return;
				}
				else 
				{
					$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_OPTION');
					return $return = ConfigInfraTools::INVALID_DNS_RECORD;
				}
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckEmailExists($Email, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateEmail($Email, "email@email.com");
		if ($return != FormValidator::INVALID_NULL)
		{
			if($return != FormValidator::INVALID_DEFAULT_VALUE)
			{
				if ($this->InstanceBaseEmail == NULL)
					$this->InstanceBaseEmail = $this->InfraToolsFactory->CreateEmail();
				$return = $this->InstanceBaseEmail->ValidateEmail($Email, ConfigInfraTools::EMAIL_INFRATOOLS_BOT_ADDRESS, FALSE);
				if ($return != Email::ReturnDomainDoesNotHaveEmailRecordsOrNotExist)
				{
					if ($return != Email::ReturnDomainNoHostAvailableToConnect)
					{
						if ($return != Email::ReturnEmailDoesNotExist)
						{
							$ReturnMessage = str_replace('[0]', $Email, 
												$this->InstanceInfraToolsLanguage->GetText('CHECK_EMAIL_EXISTS_SUCCESS'));
						}
						else $ReturnMessage = str_replace('[0]', $Email, 
												$this->InstanceInfraToolsLanguage->GetText('CHECK_EMAIL_EXISTS_FAILED'));
					}
					else $ReturnMessage = str_replace('[0]', $Email, 
												$this->InstanceInfraToolsLanguage->GetText('CHECK_EMAIL_EXISTS_DOMAIN_NOT_AVAILABLE'));
				}
				else $ReturnMessage = str_replace('[0]', $Email, 
												$this->InstanceInfraToolsLanguage->GetText('CHECK_EMAIL_EXISTS_DOMAIN_NOT_EXISTS'));
			}
			else
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('DEFAULT_VALUE');
				return $return = ConfigInfraTools::INVALID_NULL;
			}
		}
		else
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
		return $return;
	}
	
	public function CheckIpAddressIsInNetwork($IpAddress, $NetworkWithAddress, $NetworkMask, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
									  $this->InstanceInfraToolsLanguage->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_SUCCESS'));
									$ReturnMessage = str_replace('[1]', $networkWithMask, $ReturnMessage);
								}
								else
								{
									$ReturnMessage = str_replace('[0]', $IpAddress, 
									  $this->InstanceInfraToolsLanguage->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_FAILED'));
									$ReturnMessage = str_replace('[1]', $networkWithMask, $ReturnMessage);
								}
								return $return;
							}
							else 
							{
								$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_MASK');
								return $return = ConfigInfraTools::INVALID_IP_MASK;
							}
						}
						else 
						{
							$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
							return $return = ConfigInfraTools::INVALID_NULL;
						}
					}
					else 
					{
						$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_NETWORK_ADDRESS');
						return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
					}
				}
				else 
				{
					$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
					return $return = ConfigInfraTools::INVALID_NULL;
				}
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckPingServerHost($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
										$this->InstanceInfraToolsLanguage->GetText('CHECK_PING_SERVER_HOST_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckPingServerIpAddress($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
										$this->InstanceInfraToolsLanguage->GetText('CHECK_PING_SERVER_IP_ADDRESS_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckPortStatusHost($HostName, $Port, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->CheckPortStatus($HostName, $Port);
				if($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_UNKNOWN)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_HOST_FAILED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_TIMEOUT)
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_TIMEOUT'));
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_REFUSED)
				{
					$ReturnMessage = str_replace('[0]', $Port,
										$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_HOST_BLOCKED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_DISALLOWED)
				{
					$ReturnMessage = str_replace('[0]', $Port,
										$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_HOST_DISALLOWED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				else
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_HOST_OPENED'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckPortStatusIpAddress($IpAddress, $Port, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->CheckPortStatus($IpAddress, $Port);
				if($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_UNKNOWN)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
							$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_IP_ADDRESS_FAILED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_TIMEOUT)
					$ReturnMessage = str_replace('[0]', $Port,
							$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_TIMEOUT'));
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_REFUSED)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
							$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_IP_ADDRESS_BLOCKED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				elseif($return == ConfigInfraTools::CHECK_HOST_PORT_FAILED_DISALLOWED)
				{
					$ReturnMessage = str_replace('[0]', $Port,
										$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_HOST_DISALLOWED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				else
				{
					$ReturnMessage = str_replace('[0]', $Port,
							$this->InstanceInfraToolsLanguage->GetText('CHECK_PORT_STATUS_IP_ADDRESS_OPENED'));
					$ReturnMessage = str_replace('[1]', $IpAddress, $ReturnMessage);
				}
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function CheckWebSiteExists($WebSite, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateURL($WebSiteAddress, "example.com");
		if($return != FormValidator::INVALID_NULL)
		{
			if($return != FormValidator::INVALID_URL)
			{
				$return = $instanceInfraToolsNetwork->GetWebSiteHeaders($WebSiteAddress, $ArrayHeaders);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->InstanceInfraToolsLanguage->GetText('CHECK_WEBSITE_EXISTS_SUCCESS'));
					return $return;
				}
				else 
				{
					$ReturnMessage = str_replace('[0]', $Port, 
										$this->InstanceInfraToolsLanguage->GetText('CHECK_WEBSITE_EXISTS_FAILED'));
					return $return = ConfigInfraTools::INVALID_WEBSITE;
				}
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_WEBSITE');
				return $return = ConfigInfraTools::INVALID_WEBSITE;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GenerateRandomCode()
	{
		$codeArray = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!?@';
		$code = array();
		$codeLenght = strlen($codeArray) - 1;
		for ($i = 0; $i < 16; $i++) 
		{
			$n = rand(0, $codeLenght);
			$code[] = $codeArray[$n];
		}
		return implode($code);
	}
	
	public function GenerateRandomPassword($length = 8) 
	{
		$upperCaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$lowCaseChars = 'abcdefghijklmnopqrstuvwzyz';
		$numberChars = '0123456789';
		for ($i = 0, $result = ''; $i < $length; $i++) 
		{
			if($i % 3 == 0)      
			{
				$count = mb_strlen($upperCaseChars);
				$index = rand(0, $count - 1);
				$result .= mb_substr($upperCaseChars, $index, 1);
			}
			else if($i % 3 == 1) 
			{
				$count = mb_strlen($lowCaseChars);
				$index = rand(0, $count - 1);
				$result .= mb_substr($lowCaseChars, $index, 1);
			}
			else
			{
				$count = mb_strlen($numberChars);
				$index = rand(0, $count - 1);
				$result .= mb_substr($numberChars, $index, 1);
			}
		}
		return $result;
	}
	
	public function GetBrowserClient($TrueValue, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$return = $instanceInfraToolsNetwork->GetBrowserClient($browser);
		if ($return == ConfigInfraTools::SUCCESS)
		{
			if(!$TrueValue)
				$ReturnMessage .= str_replace('[0]', $browser, 
							$this->InstanceInfraToolsLanguage->GetText('GET_BROWSER_CLIENT_SUCCESS'));
			else $ReturnMessage = $browser;
		}
		else $ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('GET_BROWSER_CLIENT_FAILED');
		return $return;
	}
	
	public function GetCalculationNetMask($IpAddress, $Mask, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
									$this->InstanceInfraToolsLanguage->GetText('GET_CALCULATION_NETMASK_IP_ADDRESS'));
							$ReturnMessage .= str_replace('[0]', $Mask,             
									$this->InstanceInfraToolsLanguage->GetText('GET_CALCULATION_NETMASK_MASK'));
							$ReturnMessage .= str_replace('[0]', $subNetworkIp,     
									$this->InstanceInfraToolsLanguage->GetText('GET_CALCULATION_NETMASK_SUB_NETWORK'));
							$ReturnMessage .= str_replace('[0]', $broadCastAddress, 
									$this->InstanceInfraToolsLanguage->GetText('GET_CALCULATION_NETMASK_BROADCAST'));
							$ReturnMessage .= str_replace('[0]', $netMask,          
									$this->InstanceInfraToolsLanguage->GetText('GET_CALCULATION_NETMASK_SUB_MASK'));
							$ReturnMessage .= str_replace('[0]', $availableNetworkIps,
									$this->InstanceInfraToolsLanguage->GetText('GET_CALCULATION_NETMASK_AVAILABLE_IP_ADDRESSES'));
						}
						else $ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
						return $return;
					}
					else
					{
						$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_MASK');
						return $return = ConfigInfraTools::INVALID_IP_MASK;
					}
				}
				else
				{
					$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
					return $return = ConfigInfraTools::INVALID_NULL;
				}
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetDnsRecords($HostName, $DnsOption, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
											$this->InstanceInfraToolsLanguage->GetText('GET_DNS_MX_RECORDS_FAILED')); 
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
											$this->InstanceInfraToolsLanguage->GetText('GET_DNS_RECORDS_FAILED', $language));
					return $return;
				}
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FORM_INVALID_HOSTNAME', $language);
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS', $language);
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetHostName($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->GetHostName($IpAddress, $HostName);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->InstanceInfraToolsLanguage->GetText('GET_HOSTNAME_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $HostName, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->InstanceInfraToolsLanguage->GetText('GET_HOSTNAME_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetIpAddressClient($TrueValue, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$return = $instanceInfraToolsNetwork->GetIpAddressClient($ipAddress);
		if ($return == ConfigInfraTools::SUCCESS)
		{
			if(!$TrueValue)
				$ReturnMessage .= str_replace('[0]', $ipAddress, 
								$this->InstanceInfraToolsLanguage->GetText('GET_IP_ADDRESS_CLIENT_SUCCESS'));
			else $ReturnMessage = $ipAddress;
		}
		else $ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('GET_IP_ADDRESS_CLIENT_FAILED');
		return $return;
	}
	
	public function GetIpAddresses($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
											$this->InstanceInfraToolsLanguage->GetText('GET_IP_ADDRESSES_SUCCESS'));
				}
				else $ReturnMessage = str_replace('[0]', $HostName, 
											$this->InstanceInfraToolsLanguage->GetText('GET_IP_ADDRESSES_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetLocation($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
											$this->InstanceInfraToolsLanguage->GetText('GET_LOCATION_FAILED_GET_CONTENTS'));
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->InstanceInfraToolsLanguage->GetText('GET_LOCATION_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetOperationalSystem($TrueValue, &$ReturnMessage) 
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$return = $instanceInfraToolsNetwork->GetOperationalSystem($osPlatform);
		if ($return == ConfigInfraTools::SUCCESS)
		{
			if(!$TrueValue)
				$ReturnMessage .= str_replace('[0]', $osPlatform, 
								$this->InstanceInfraToolsLanguage->GetText('GET_OPERATIONAL_SYSTEM_SUCCESS'));
			else $ReturnMessage = $osPlatform;
		}
		else $ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('GET_OPERATIONAL_SYSTEM_FAILED');
		return $return;
	}
	
	public function GetProtocol($Number, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateNumericValue($Number, "");
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return == ConfigInfraTools::SUCCESS)
			{
				$return = $instanceInfraToolsNetwork->GetProtocol($Number, $Protocol);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $Number, 
											$this->InstanceInfraToolsLanguage->GetText('GET_PROTOCOL_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $Protocol, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $Number, 
											$this->InstanceInfraToolsLanguage->GetText('GET_PROTOCOL_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_PROTOCOL_NUMBER');
				return $return = ConfigInfraTools::INVALID_PROTOCOL_NUMBER;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetRoute($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
										$this->InstanceInfraToolsLanguage->GetText('GET_ROUTE_SUCCESS'));
					foreach($ArrayRoute as $route)
						$ReturnMessage .= $route . "<br>";
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
										$this->InstanceInfraToolsLanguage->GetText('GET_ROUTE_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_IP_ADDRESS;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetService($Port, $Protocol, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
					$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_PROTOCOL');
					return $return = ConfigInfraTools::INVALID_PROTOCOL;
				}
				$return = $instanceInfraToolsNetwork->GetService($Port, $Protocol, $Service);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage  = str_replace('[0]', $Port, 
													$this->InstanceInfraToolsLanguage->GetText('GET_SERVICE_SUCCESS'));
					$ReturnMessage  = str_replace('[1]', $Protocol, $ReturnMessage);
					$ReturnMessage  = str_replace('[2]', $Service, $ReturnMessage);
				}
				else
				{ 
					$ReturnMessage  = str_replace('[0]', $Port, 
													$this->InstanceInfraToolsLanguage->GetText('GET_SERVICE_FAILED'));
					$ReturnMessage  = str_replace('[1]', $Protocol, $ReturnMessage);
				}
				return $return;
			}
			else
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_PORT');
				return $return = ConfigInfraTools::INVALID_PORT;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetWebSiteContent($WebSiteAddress, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
											$this->InstanceInfraToolsLanguage->GetText('GET_WEBSITE_CONTENT_SUCCESS'));
					$ReturnMessage .= $Content;
				}
				else $ReturnMessage = str_replace('[0]', $WebSiteAddress, 
											$this->InstanceInfraToolsLanguage->GetText('GET_WEBSITE_CONTENT_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_WEBSITE');
				return $return = ConfigInfraTools::INVALID_WEBSITE;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetWebSiteHeaders($WebSiteAddress, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
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
										$this->InstanceInfraToolsLanguage->GetText('GET_WEBSITE_HEADER_SUCCESS'));
					foreach($ArrayHeaders as $header)
					{
						if(!is_array($header))
							$ReturnMessage .= $header . "<br>";
						else
						{
							foreach($header as $headerLine)
							{
								$ReturnMessage .= $headerLine . "<br>";
							}
						}
					}
				}
				else $ReturnMessage = str_replace('[0]', $WebSiteAddress, 
										$this->InstanceInfraToolsLanguage->GetText('GET_WEBSITE_HEADER_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_WEBSITE');
				return $return = ConfigInfraTools::INVALID_WEBSITE;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetWhoisHost($HostName, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateHost($HostName);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_HOST_NAME)
			{
				$return = $instanceInfraToolsNetwork->GetWhois($HostName, $Info);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $HostName, 
											$this->InstanceInfraToolsLanguage->GetText('GET_WHOIS_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $Info, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $HostName, 
											$this->InstanceInfraToolsLanguage->GetText('GET_WHOIS_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FORM_INVALID_HOSTNAME');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function GetWhoisIpAddress($IpAddress, &$ReturnMessage)
	{
		$instanceInfraToolsNetwork = $this->InfraToolsFactory->CreateInfraToolsNetwork();
		$FormValidator = $this->InfraToolsFactory->CreateFormValidator();
		$return = $FormValidator->ValidateIpAddress($IpAddress);
		if ($return != FormValidator::INVALID_NULL)
		{
			if ($return != FormValidator::INVALID_IP_ADDRESS)
			{
				$return = $instanceInfraToolsNetwork->GetWhois($IpAddress, $Info);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->InstanceInfraToolsLanguage->GetText('GET_WHOIS_SUCCESS'));
					$ReturnMessage = str_replace('[1]', $Info, $ReturnMessage);
				}
				else $ReturnMessage = str_replace('[0]', $IpAddress, 
											$this->InstanceInfraToolsLanguage->GetText('GET_WHOIS_FAILED'));
				return $return;
			}
			else 
			{
				$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('INVALID_IP_ADDRESS');
				return $return = ConfigInfraTools::INVALID_HOSTNAME;
			}
		}
		else 
		{
			$ReturnMessage = $this->InstanceInfraToolsLanguage->GetText('FILL_REQUIRED_FIELDS');
			return $return = ConfigInfraTools::INVALID_NULL;
		}
	}
	
	public function SendEmailLoginTwoStepVerificationCode($EmailAddress, $Name, $TwoStepVerificationCode, $Debug)
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		$Email = $this->InfraToolsFactory->CreateEmail();  		
		$subject = $this->InstanceInfraToolsLanguage->GetText('LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TAG');
		$body    = $Name . ",</br></br>" 
			             . $this->InstanceInfraToolsLanguage->GetText('LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TEXT')
		                 . "</br><b> " 
			             . $TwoStepVerificationCode . "</b>";
		$return = $Email->SendFormEmail(ConfigInfraTools::APPLICATION_INFRATOOLS,
						 ConfigInfraTools::EMAIL_INFRATOOLS_BOT_ADDRESS, 
						 $ConfigInfraTools->DefaultEmailNoReplyFormPassword, 
	                     $EmailAddress, $subject, $body);
		if($return == ConfigInfraTools::SUCCESS)
			return ConfigInfraTools::SUCCESS;
		else
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "Email Error: " . $return;
			return ConfigInfraTools::ERROR;
		}
	}
	
	public function SendEmailPasswordReset($Name, $EmailAddress, $Password, $Debug)
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		$Email = $this->InfraToolsFactory->CreateEmail();  		
		$subject = $this->InstanceInfraToolsLanguage->GetText('FORM_SUBMIT_RESET_PASSWORD_EMAIL_TAG');
		$body    = $Name . ",</br></br>" 
			             . $this->InstanceInfraToolsLanguage->GetText('FORM_SUBMIT_RESET_PASSWORD_EMAIL_TEXT')	 
		                 . "</br><b> " 
			             . $Password . "</b>";
		$return = $Email->SendFormEmail(ConfigInfraTools::APPLICATION_INFRATOOLS,
						 ConfigInfraTools::EMAIL_INFRATOOLS_BOT_ADDRESS, 
						 $ConfigInfraTools->DefaultEmailNoReplyFormPassword, 
	                     $EmailAddress, $subject, $body);
		if($return == ConfigInfraTools::SUCCESS)
			return ConfigInfraTools::SUCCESS;
		else
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "Email Error: " . $return;
			return ConfigInfraTools::ERROR;
		}
	}
	
	public function SendEmailContact($EmailAddress, $Message, $Name, $Subject, $Title, $Debug)
	{
		$Session = $this->InfraToolsFactory->CreateSession();
		$Session->GetSessionValue(ConfigInfraTools::CONTACT_EMAIL_SESSION, $emailSession);
		$today = date("Ymd"); $hour = date("H"); $minute = date("i");
		$emailHourMinute = $today . "_" . $hour . "_" . $minute;
		if ($emailSession != NULL)
		{
			$emailSession = explode("_", $emailSession);
			if ($emailSession[0] < $today)
				$hour = $hour + 24;
			if($emailSession[1] < $hour)
				$minute = $minute + 60;
			if($emailSession[2] + 15 < $minute)
				$sendEmail = TRUE;
			else $sendEmail = FALSE;
		}
		else $sendEmail = TRUE;
		if ($sendEmail)
		{
			$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
			$Email = $this->InfraToolsFactory->CreateEmail();  		
			$subject = "[" . ConfigInfraTools::APPLICATION_INFRATOOLS . "] " . 
				             ConfigInfraTools::PAGE_CONTACT . " " . 
				       $Subject . " - " . 
				       $Title;
			$body    = "<b>Name</b>: " . $Name . "<br><b>Email:</b> " . 
				       $EmailAddress . "<br><br><br><b>Content</b>:<br>" . 
				       $Message;
			$return = $Email->SendFormEmail(ConfigInfraTools::APPLICATION_INFRATOOLS,
							 ConfigInfraTools::EMAIL_INFRATOOLS_BOT_ADDRESS, 
							 $ConfigInfraTools->DefaultEmailNoReplyFormPassword, 
							 ConfigInfraTools::EMAIL_INFRATOOLS_BOT_ADDRESS, $subject, $body);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$Session->SetSessionValue(ConfigInfraTools::CONTACT_EMAIL_SESSION, $emailHourMinute);
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
					echo "Email Error: " . $return;
				return ConfigInfraTools::ERROR;
			}
		}
		else return ConfigInfraTools::SEND_EMAIL_ALREADY_SENT;
	}
	
	public function SendEmailPasswordRecovery($EmailAddress, $ResetCode, $Debug)
	{
		$Session = $this->InfraToolsFactory->CreateSession();
		$Session->GetSessionValue(ConfigInfraTools::PASSWORD_RECOVERY_EMAIL_SESSION, $emailSession);
		$today = date("Ymd"); $hour = date("H"); $minute = date("i");
		$emailHourMinute = $today . "_" . $hour . "_" . $minute;
		if ($emailSession != NULL)
		{
			$emailSession = explode("_", $emailSession);
			if ($emailSession[0] < $today)
				$hour = $hour + 24;
			if($emailSession[1] < $hour)
				$minute = $minute + 60;
			if($emailSession[2] + 15 < $minute)
				$sendEmail = TRUE;
			else $sendEmail = FALSE;
		}
		else $sendEmail = TRUE;
		if ($sendEmail)
		{
			$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
			$InstanceBaseEmail = $this->InfraToolsFactory->CreateEmail();  		
			$subject = $this->InstanceInfraToolsLanguage->GetText('PASSWORD_RECOVERY_EMAIL_TAG');
			$body    = $this->InstanceInfraToolsLanguage->GetText('PASSWORD_RECOVERY_EMAIL_TEXT') . "</br><b> " . 
				       $ResetCode . "</b>";
			$return = $InstanceBaseEmail->SendFormEmail(ConfigInfraTools::APPLICATION_INFRATOOLS,
							 ConfigInfraTools::EMAIL_INFRATOOLS_BOT_ADDRESS, 
							 $ConfigInfraTools->DefaultEmailNoReplyFormPassword, 
							 $EmailAddress, $subject, $body);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$Session->SetSessionValue(ConfigInfraTools::PASSWORD_RECOVERY_EMAIL_SESSION, $emailHourMinute);
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
					echo "Email Error: " . $return;
				return ConfigInfraTools::ERROR;
			}
		}
		else return ConfigInfraTools::SEND_EMAIL_ALREADY_SENT;
	}
	
	public function SendEmailRegister($Name, $EmailAddress, $Link, $Debug)
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		$Email = $this->InfraToolsFactory->CreateEmail(); 		
		$subject = $this->InstanceInfraToolsLanguage->GetText('REGISTER_EMAIL_TAG');
		$body    = $Name . ",</br></br>" .
			       $this->InstanceInfraToolsLanguage->GetText('REGISTER_EMAIL_TEXT') . "</br><b> " .
			       $Link . "</b>";
		$return = $Email->SendFormEmail(ConfigInfraTools::APPLICATION_INFRATOOLS,
						 ConfigInfraTools::EMAIL_INFRATOOLS_BOT_ADDRESS, 
						 $ConfigInfraTools->DefaultEmailNoReplyFormPassword, 
	                     $EmailAddress, $subject, $body);
		if($return == ConfigInfraTools::SUCCESS)
			return ConfigInfraTools::SUCCESS;
		else
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "Email Error: " . $return;
			return ConfigInfraTools::ERROR;
		}
	}
	
	public function SendEmailResendConfirmationLink($Name, $EmailAddress, $Link, $Debug)
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		$Email = $this->InfraToolsFactory->CreateEmail();  		
		$subject = $this->InstanceInfraToolsLanguage->GetText('RESEND_CONFIRMATION_EMAIL_TAG');
		$body    = $Name . ",</br></br>" .
			       $this->InstanceInfraToolsLanguage->GetText('RESEND_CONFIRMATION_EMAIL_TEXT') . "</br><b> " .
			       $Link . "</b>";
		$return = $Email->SendFormEmail(ConfigInfraTools::APPLICATION_INFRATOOLS,
						 ConfigInfraTools::EMAIL_INFRATOOLS_BOT_ADDRESS, 
						 $ConfigInfraTools->DefaultEmailNoReplyFormPassword, 
	                     $EmailAddress, $subject, $body);
		if($return == ConfigInfraTools::SUCCESS)
			return ConfigInfraTools::SUCCESS;
		else
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "Email Error: " . $return;
			return ConfigInfraTools::ERROR;
		}
	}
}
?>