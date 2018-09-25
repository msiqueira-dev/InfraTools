<?php

/************************************************************************
Class: Network.php
Creation: 2018/09/20
Creator: Marcus Siqueira
Dependencies:
			Factory - Php/Controller/Factory.php
Description: 
			Classe que serve para utilizar funcionalidades ligadas a análise
			e infraestrutura de redes.
Functions: 
			public function GetBrowserClient(&$Browser);
			public function GetIpAddressClient(&$IpAddress);
			public function GetOperationalSystem(&$OsPlatform);
**************************************************************************/
if (!class_exists("Factory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Factory');
}

class Network
{
	/* Instances */
	private static $Instance;
	private $Factory          = NULL;
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
    }
	
	/* Get Instance */
	public static function __create()
    {
        if (!isset(self::$Instance))
		{
            $class = __CLASS__;
            self::$Instance = new $class();
        }
        return self::$Instance;
    }
	
	public function GetBrowserClient(&$Browser) 
	{
		$Browser   = "";
		if(empty($_SERVER['HTTP_USER_AGENT'])) 
		{
			$Browser = 'unrecognized';
			return Config::GET_BROWSER_CLIENT_INVALID_BROWSER;
		}

		$userAgent = $_SERVER['HTTP_USER_AGENT'];
        $browserArray  =   array(
                            '/msie/i'       	      =>  'IE',
							'/7.0; rv:11.0/i'         =>  'IE 11',
                            '/firefox/i'              =>  'Firefox',
                            '/safari/i'               =>  'Safari',
                            '/chrome/i'               =>  'Chrome',
                            '/opera/i'                =>  'Opera',
							'/OPR/i'                  =>  'Opera',
                            '/netscape/i'             =>  'Netscape',
                            '/maxthon/i'              =>  'Maxthon',
                            '/konqueror/i'            =>  'Konqueror',
                            '/mobile/i'               =>  'Handheld Browser');
		foreach ($browserArray as $regex => $value) 
		{ 
			if (preg_match($regex, $userAgent)) 
				$Browser = $value;
		}
		if($Browser != "")
			return Config::SUCCESS;
		else return Config::GET_BROWSER_CLIENT_INVALID_BROWSER;
	}
	
	public function GetIpAddressClient(&$IpAddress) 
	{
		$IpAddress = "";
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$IpAddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$IpAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$IpAddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$IpAddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$IpAddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$IpAddress = $_SERVER['REMOTE_ADDR'];
		if($IpAddress != "")
		{
			if($IpAddress == "::1")
				$IpAddress = "127.0.0.1";
			return Config::SUCCESS;
		}
		else return Config::GET_IP_ADDRESS_CLIENT_FAILED;
	}
	
	public function GetOperationalSystem(&$OsPlatform) 
	{ 
		$OsPlatform     =   "";
		if(empty($_SERVER['HTTP_USER_AGENT'])) 
		{
			$OsPlatform = 'unrecognized';
			return Config::GET_OPERATIONAL_SYSTEM_INVALID_OS;
		}
	    $userAgent      = $_SERVER['HTTP_USER_AGENT'];
    	$osArray        =   array(
                            '/windows nt 10/i'      =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
							'/Windows Phone 8.0/i'  =>  'Windows Phone 8.0',
                            '/Windows Phone 8.1/i'  =>  'Windows Phone 8.1',
							'/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile');
	    foreach ($osArray as $regex => $value) 
		{ 
	        if (preg_match($regex, $userAgent))
			{
            	$OsPlatform =  $value;
				break;
			}
	    }
   	 	if($OsPlatform != "")
			return Config::SUCCESS;
		else return Config::GET_OPERATIONAL_SYSTEM_INVALID_OS;
	}
}