<?php

/************************************************************************
Class: FacedeBusiness
Creation: 05/06/2018
Creator: Marcus Siqueira
Dependencies:
			Base - Php/Controller/Factory.php
			
Description: 
			Classe existente para tratamento do negócio utilizado pelas telas.
Methods: 
			public function GenerateRandomCode();
			public function GetBrowserClient($TrueValue, &$ReturnMessage);
			public function GetIpAddressClient($TrueValue, &$ReturnMessage);
			public function GetOperationalSystem($TrueValue &$ReturnMessage);
			public function SendEmailLoginTwoStepVerificationCode($Email, $Name, $TwoStepVerificationCode, $Debug);
**************************************************************************/
if (!class_exists("Factory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Factory');
}

class FacedeBusiness
{		
	/* Instances */
	private static $Instance;
	protected $Factory        = NULL;
	protected $Language       = NULL;
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct($InstanceLanguage) 
    {
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
		if ($this->Language == NULL)
			$this->Language = $InstanceLanguage;
    }
	
	/* Get Instance */
	public static function __create($InstanceLanguage)
    {
		if($InstanceLanguage == NULL)
			exit('FacedeBusiness: No language loaded!');
        if (!isset(self::$Instance))
		{
            $class = __CLASS__;
            self::$Instance = new $class($InstanceLanguage);
        }
        return self::$Instance;
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
	
	public function GetBrowserClient($TrueValue, &$ReturnMessage)
	{
		$instanceNetwork = $this->Factory->CreateNetwork();
		$return = $instanceNetwork->GetBrowserClient($browser);
		if ($return == Config::SUCCESS)
		{
			if(!$TrueValue)
				$ReturnMessage .= str_replace('[0]', $browser, $this->Language->GetText('GET_BROWSER_CLIENT_SUCCESS'));
			else $ReturnMessage = $browser;
		}
		else $ReturnMessage = $this->Language->GetText('GET_BROWSER_CLIENT_FAILED');
		return $return;
	}
	
	public function GetIpAddressClient($TrueValue, &$ReturnMessage)
	{
		$instanceNetwork = $this->Factory->CreateNetwork();
		$return = $instanceNetwork->GetIpAddressClient($ipAddress);
		if ($return == Config::SUCCESS)
		{
			if(!$TrueValue)
				$ReturnMessage .= str_replace('[0]', $ipAddress, 
								$this->Language->GetText('GET_IP_ADDRESS_CLIENT_SUCCESS'));
			else $ReturnMessage = $ipAddress;
		}
		else $ReturnMessage = $this->Language->GetText('GET_IP_ADDRESS_CLIENT_FAILED');
		return $return;
	}
	
	public function GetOperationalSystem($TrueValue, &$ReturnMessage) 
	{
		$instanceNetwork = $this->Factory->CreateNetwork();
		$return = $instanceNetwork->GetOperationalSystem($osPlatform);
		if ($return == Config::SUCCESS)
		{
			if(!$TrueValue)
				$ReturnMessage .= str_replace('[0]', $osPlatform, 
								                     $this->Language->GetText('GET_OPERATIONAL_SYSTEM_SUCCESS'));
			else $ReturnMessage = $osPlatform;
		}
		else $ReturnMessage = $this->Language->GetText('GET_OPERATIONAL_SYSTEM_FAILED');
		return $return;
	}
	
	public function SendEmailLoginTwoStepVerificationCode($EmailAddress, $Name, $TwoStepVerificationCode, $Debug)
	{
		$config = $this->Factory->CreateConfig();
		$Email = $this->Factory->CreateEmail();  		
		$subject = $this->Language->GetText('LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TAG');
		$body    = $Name . ",</br></br>" 
			             . $this->Language->GetText('LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TEXT')
		                 . "</br><b> " 
			             . $TwoStepVerificationCode . "</b>";
		$return = $Email->SendFormEmail($config->DefaultApplicationName,
						 $config->DefaultEmailNoReplyFormAddress, 
						 $config->DefaultEmailNoReplyFormPassword, 
	                     $EmailAddress, $subject, $body);
		if($return == Config::SUCCESS)
			return Config::SUCCESS;
		else
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "Email Error: " . $return;
			return Config::ERROR;
		}
	}
}