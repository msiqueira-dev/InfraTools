<?php

/************************************************************************
Class: Email.php
Creation: 29/01/2015
Creator: Marcus Siqueira
Dependencies:
			Php/ConfigInfraTools.php
Description: 
			Classe que serve para utilizar funcionalidades ligadas a
			corrêio eletrônico
Functions:
			public function SendFormEmail($Application, $ApplicationEmailUser, $ApplicationEmailPassword, 
	                                      $UserName, $UserEmail, $Subject, $Title, $Body)
			public function ValidateEmail($RecipientEmail, $SenderEmail, $debug);
			private function _SendMessage($message, $debug = FALSE, &$returnCode = NULL);
**************************************************************************/

if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Config');
}
if (!class_exists("PHPMailer"))
{
	if(file_exists(BASE_PATH_PHP . "API/PHPMailer/class.phpmailer.php"))
		include_once(BASE_PATH_PHP . "API/PHPMailer/class.phpmailer.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PHPMailer: PHPMailer');
}
if (!class_exists("SMTP"))
{
	if(file_exists(BASE_PATH_PHP . "API/PHPMailer/class.smtp.php"))
		include_once(BASE_PATH_PHP . "API/PHPMailer/class.smtp.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PHPMailer: SMTP');
}
if (!class_exists("POP3"))
{
	if(file_exists(BASE_PATH_PHP . "API/PHPMailer/class.pop3.php"))
		include_once(BASE_PATH_PHP . "API/PHPMailer/class.pop3.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PHPMailer: POP3');
}

class Email 
{
	/* Constantes de Retorno */
	const ReturnDomainDoesNotHaveEmailRecordsOrNotExist = "Domain does not have a email record in DNS or does not exist";
	const ReturnDomainNoHostAvailableToConnect          = "Domain does not have a host available to connect";
	const ReturnEmailDoesNotExist                       = "Email does not exist";
	const ReturnFailedToSendMessage                     = "Failed to send a message";
	const ReturnInvalidNull                             = "ReturnInvalidNull";
	
	/* Constantes de E-mail */
	const CONECTION_TIMEOUT = 30;
	const LENGHT_BYTES = 2082;
	const MAX_READ_TIME = 5;
	const SMTP = 25;
	
	/* Properties */
	private $sock;
	
	public function SendFormEmail($Application, $ApplicationEmailUser, $ApplicationEmailPassword, $UserEmail, $Subject, $Body)
	{
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->CharSet = "UTF-8";
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $ApplicationEmailUser;
		$mail->Password = $ApplicationEmailPassword;
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;                            		
		$mail->From = $ApplicationEmailUser;
		$mail->FromName = $Application;
		$mail->addAddress($UserEmail, $UserEmail);
		$mail->addReplyTo($ApplicationEmailUser, 'Support InfraTools');
		$mail->isHTML(true);
		$mail->Subject = $Subject;
		$mail->Body    = $Body;
		$mail->SMTPDebug = 0;
		$mail->SMTPOptions = array
		(
			'ssl' => array
			(
				'verify_peer' => FALSE,
				'verify_peer_name' => FALSE,
				'allow_self_signed' => TRUE
			)
		);
		if($mail->send())
			return Config::SUCCESS;
		return $mail->ErrorInfo;
	}
 
	public function ValidateEmail($RecipientEmail, $SenderEmail, $debug) 
	{	
		$array = NULL; $results = array(); $hosts = array(); $mxweights = array(); $mxs = array();
		$SenderUser = NULL; $SenderDomain = NULL; $code = NULL;
		$RecipientUser = NULL; $RecipientDomain = NULL;
		if(!isset($RecipientEmail))
		{
			return self::ReturnInvalidNull;
		}
		$array = explode('@', $RecipientEmail);
		$RecipientUser= $array[0];
		$RecipientDomain = $array[1];
		$array = explode('@', $SenderEmail);
		$SenderUser = $array[0];
		$SenderDomain = $array[1];

		getmxrr($RecipientDomain, $hosts, $mxweights);
		if(!empty($hosts))
		{
			for($n=0; $n < count($hosts); $n++)
			{
				$mxs[$hosts[$n]] = $mxweights[$n];
			}
			asort($mxs);
			$mxs[$RecipientDomain] = 0;
			if ($debug) 
				echo '<pre>'.htmlentities(print_r($mxs, 1)).'</pre>';
			while(list($host) = each($mxs)) 
			{
				if ($debug) 
					echo '<pre>'.htmlentities("try $host:" . self::SMTP ."\n").'</pre>';
				if ($this->sock = fsockopen($host, self::SMTP, $errno, $errstr, (float) self::CONECTION_TIMEOUT)) 
				{
					stream_set_timeout($this->sock, self::MAX_READ_TIME);
					break;
				}
			}
			if ($this->sock) 
			{
				$reply = fread($this->sock, self::LENGHT_BYTES);
				if($debug)
					echo '<pre>'.htmlentities("<<<\n" . $reply).'</pre>';
				preg_match('/^([0-9]{3}) /ims', $reply, $matches);
				$this->_SendMessage("HELO " . $SenderDomain, $debug, $code);
				$this->_SendMessage("MAIL FROM: <".$SenderUser.'@'. $SenderDomain .">", $debug, $code);
				
				$this->_SendMessage("RCPT TO: <".$RecipientUser.'@'.$RecipientDomain.">", $debug, $code);
				$this->_SendMessage("RSET", $debug); 
				$this->_SendMessage("quit", $debug);
				fclose($this->sock);
				if ($code == '250')
					return Config::SUCCESS;
				elseif ($code == '451' || $code == '452') 
					return Config::SUCCESS;
				else 
					return self::ReturnEmailDoesNotExist;  
			} 
			else return self::ReturnDomainNoHostAvailableToConnect;
		}
		else return self::ReturnDomainDoesNotHaveEmailRecordsOrNotExist;
 	}


	private function _SendMessage($message, $debug = FALSE, &$returnCode = NULL) 
	{
		$returnCode = NULL;
		if (isset($message))
		{
			fwrite($this->sock, $message."\r\n");
			$reply = fread($this->sock, 2082);
			if($debug)
			{
				echo '<pre>' . htmlentities(">>>\n" . $message . "\n") . '</pre>';
				echo '<pre>' . htmlentities("<<<\n" . $reply)      . '</pre>';
			}
			if($reply != FALSE)
			{
				for ($count = 0; is_numeric($reply[$count]); $count++)
				{
					$returnCode .= $reply[$count];
				}
				return Config::SUCCESS;
			}
			else return self::ReturnFailedToSendMessage;
		}
		else return Config::PARAMETERS_NULL;
	}
}
?>