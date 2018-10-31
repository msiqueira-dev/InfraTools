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
			public function GenerateRandomPassword($length = 8);
			public function GetBrowserClient($TrueValue, &$ReturnMessage);
			public function GetIpAddressClient($TrueValue, &$ReturnMessage);
			public function GetOperationalSystem($TrueValue &$ReturnMessage);
			public function SendEmailContact($Application, $Email, $Message, $Name, $Subject, $Title, $Debug);
			public function SendEmailLoginTwoStepVerificationCode($Application, $Email, $Name, $TwoStepVerificationCode, $Debug);
			public function SendEmailPasswordReset($Application, $Name, $Email, $Password, $Debug);
			public function SendEmailPasswordRecovery($Application, $Email, $ResetCode, $Debug);
			public function SendEmailRegister($Application, $Name, $Email, $Link, $Debug);
			public function SendEmailResendConfirmationLink($Application, $Name, $Email, $Link, $Debug);
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
	
	public function SendEmailContact($Application, $EmailAddress, $Message, $Name, $Subject, $Title, $Debug)
	{
		$Session = $this->Factory->CreateSession();
		$Session->GetSessionValue(Config::CONTACT_EMAIL_SESSION, $emailSession);
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
			$config = $this->Factory->CreateConfig();
			$Email = $this->Factory->CreateEmail();  		
			$subject = "[" . $Application . "] " . 
				             Config::PAGE_CONTACT . " " . 
				       $Subject . " - " . 
				       $Title;
			$body    = "<b>Name</b>: " . $Name . "<br><b>Email:</b> " . 
				       $EmailAddress . "<br><br><br><b>Content</b>:<br>" . 
				       $Message;
			$return = $Email->SendFormEmail($Application,
							                $config->DefaultEmailNoReplyFormAddress,
											$config->DefaultEmailNoReplyFormAddressReplyTo,
							                $config->DefaultEmailNoReplyFormPassword, 
							                $EmailAddress, $subject, $body);
			if($return == Config::SUCCESS)
			{
				$Session->SetSessionValue(Config::CONTACT_EMAIL_SESSION, $emailHourMinute);
				return Config::SUCCESS;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED)
					echo "Email Error: " . $return;
				return Config::ERROR;
			}
		}
		else return Config::SEND_EMAIL_ALREADY_SENT;
	}
	
	public function SendEmailLoginTwoStepVerificationCode($Application, $EmailAddress, $Name, $TwoStepVerificationCode, $Debug)
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
						 $config->DefaultEmailNoReplyFormAddressReplyTo,
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
	
	public function SendEmailPasswordReset($Application, $Name, $EmailAddress, $Password, $Debug)
	{
		$config = $this->Factory->CreateConfig();
		$Email = $this->Factory->CreateEmail();  		
		$subject = $this->Language->GetText('FORM_SUBMIT_RESET_PASSWORD_EMAIL_TAG');
		$body    = $Name . ",</br></br>" 
			             . $this->Language->GetText('FORM_SUBMIT_RESET_PASSWORD_EMAIL_TEXT')	 
		                 . "</br><b> " 
			             . $Password . "</b>";
		$return = $Email->SendFormEmail($Application,
						                $config->DefaultEmailNoReplyFormAddress,
										$config->DefaultEmailNoReplyFormAddressReplyTo,
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
	
	public function SendEmailPasswordRecovery($Application, $EmailAddress, $ResetCode, $Debug)
	{
		$Session = $this->Factory->CreateSession();
		$Session->GetSessionValue(Config::PASSWORD_RECOVERY_EMAIL_SESSION, $emailSession);
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
			$config = $this->Factory->CreateConfig();
			$InstanceBaseEmail = $this->Factory->CreateEmail();  		
			$subject = $this->Language->GetText('PASSWORD_RECOVERY_EMAIL_TAG');
			$body    = $this->Language->GetText('PASSWORD_RECOVERY_EMAIL_TEXT') . "</br><b> " . 
				       $ResetCode . "</b>";
			$return = $InstanceBaseEmail->SendFormEmail($Application,
							 $config->DefaultEmailNoReplyFormAddress,
							 $config->DefaultEmailNoReplyFormAddressReplyTo,
							 $config->DefaultEmailNoReplyFormPassword, 
							 $EmailAddress, $subject, $body);
			if($return == Config::SUCCESS)
			{
				$Session->SetSessionValue(Config::PASSWORD_RECOVERY_EMAIL_SESSION, $emailHourMinute);
				return Config::SUCCESS;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED)
					echo "Email Error: " . $return;
				return Config::ERROR;
			}
		}
		else return Config::SEND_EMAIL_ALREADY_SENT;
	}
	
	public function SendEmailRegister($Application, $Name, $EmailAddress, $Link, $Debug)
	{
		$config = $this->Factory->CreateConfig();
		$Email = $this->Factory->CreateEmail(); 		
		$subject = $this->Language->GetText('REGISTER_EMAIL_TAG');
		$body    = $Name . ",</br></br>" .
			       $this->Language->GetText('REGISTER_EMAIL_TEXT') . "</br><b> " .
			       $Link . "</b>";
		$return = $Email->SendFormEmail($Application,
						 $config->DefaultEmailNoReplyFormAddress,
						 $config->DefaultEmailNoReplyFormAddressReplyTo,
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
	
	public function SendEmailResendConfirmationLink($Application, $Name, $EmailAddress, $Link, $Debug)
	{
		$config = $this->Factory->CreateConfig();
		$Email = $this->Factory->CreateEmail();  		
		$subject = $this->Language->GetText('RESEND_CONFIRMATION_EMAIL_TAG');
		$body    = $Name . ",</br></br>" .
			       $this->Language->GetText('RESEND_CONFIRMATION_EMAIL_TEXT') . "</br><b> " .
			       $Link . "</b>";
		$return = $Email->SendFormEmail($Application,
						 $config->DefaultEmailNoReplyFormAddress,
						 $config->DefaultEmailNoReplyFormAddressReplyTo,
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