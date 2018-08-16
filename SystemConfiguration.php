<?php
/************************************************************************
Class: SystemConfiguration
Creation: 2018-08-15
Creator: Marcus Siqueira
Dependencies:
			
Description: Main Configuration System file
**************************************************************************/

class SystemConfiguration
{
	/*
		Description: The default URL or IP address of the application
		Can either be an ip address or a URL, with a different port boung to it or not.
		Examples:
			AddressApplication = "localhost";
			AddressApplication = "domain.com";
			AddressApplication = "139.82.1.2";
	*/
	public static $AddressApplication = "";
	/*
		IMAGE_SERVER
		Description: The default URL for an image server or IP address of the image server.
		             The image server must be configured in the WebServer (Apache for an example),
					 where the image folder is bound either to an address or address and port
		Examples:
			$AddressImageServer = "http://localhost:8001/";
			$AddressImageServer = "http://domain.com:8001/";
			$AddressImageServer = "https://domain.com:8001/";
			$AddressImageServer = "http://img.domain.com/";
			$AddressImageServer = "https://img.domain.com/";
			$AddressImageServer = "139.82.1.2:8002";
	*/
	public static $AddressImageServer = "";
	/*
		FILE_SERVER
		Description: The default URL for an file server or IP address of the file server.
		             The image server must be configured in the WebServer (Apache for an example),
					 where the file folder is bound either to an address or address and port.
					 Usually used for linking PDF and other kind of files with the application.
		Examples:
			$AddressFileServer = "http://localhost:8002/";
			$AddressFileServer = "http://domain.com:8002/";
			$AddressFileServer = "https://domain.com:8002/";
			$AddressFileServer = "http://file.domain.com/";
			$AddressFileServer = "https://file.domain.com/";
			$AddressFileServer = "139.82.1.2:8002";
	*/
	public static $AddressFileServer = "";
	/*
		JAVASCRIPT_SERVER
		Description: The default URL for an JavaScript server or IP address of the JavaScript server.
		             The JavaScript server must be configured in the WebServer (Apache for an example),
					 where the JavaScript folder is bound either to an address or address and port.
					 Used to include all JavaScript files.
		Examples:
			$AddressJavaScriptServer = "http://localhost:8003/";
			$AddressJavaScriptServer = "http://domain.com:8003/";
			$AddressJavaScriptServer = "https://domain.com:8003/";
			$AddressJavaScriptServer = "http://js.domain.com/";
			$AddressJavaScriptServer = "https://js.domain.com/";
			$AddressJavaScriptServer = "139.82.1.2:8003";
	*/
	public static $AddressJavaScriptServer = "";
	/*
		MYSQL_DATABASE_ADDRESS
		Description: The address of the MySql DataBase
		Examples:
			$MySqlDataBaseAddress = "http://localhost/";
			$MySqlDataBaseAddress = "http://domain.com/";
			$MySqlDataBaseAddress = "https://domain.com/";
			$MySqlDataBaseAddress = "139.82.1.2";
	*/
	public static $MySqlDataBaseAddress = "";
	/*
		MYSQL_DATABASE_PORT
		Description: The port of the MySql DataBase
		Examples:
			$MySqlDataBasePort = "3306";
	*/
	public static $MySqlDataBasePort = "";
	/*
		MYSQL_DATABASE_NAME
		Description: The database name of the system
		Examples:
			$MySqlDataBaseName = "INFRATOOLS";
	*/
	public static $MySqlDataBaseName = "";
	/*
		MYSQL_DATABASE_USER
		Description: The database user
		Examples:
			$MySqlDataBaseUser = "infratools_application";
	*/
	public static $MySqlDataBaseUser = "";
	/*
		MYSQL_DATABASE_PASSWORD
		Description: The database user's password
		Examples:
			$MySqlDataBasePassword = "infratools_application_password";
	*/
	public static $MySqlDataBasePassword = "";
	/*
		E-MAIL ACCOUNT
		Description: The e-mail account to send system e-mails
		Examples:
			$EmailAccount = "infratools_application_password";
	*/
	public static $EmailAccount = "";
	/*
		E-MAIL PASSWORD
		Description: The e-mail account's password to send system e-mails.
		             If you are using gmail, for example, i would recommend you to claim an app password,
					 and for that you will need enable a 2 step verification before you can do that.
					 Check this URL from google: https://myaccount.google.com/security
		Examples:
			$EmailPassword = "infratools_application_password";
	*/
	public static $EmailPassword = "";
	
	/*
		DEFAULT_LANGUAGE
		Description: The default language that the application should use.
		Examples:
			$DefaultLanguage = "Language/De";
			$DefaultLanguage = "Language/En";
			$DefaultLanguage = "Language/Es";
			$DefaultLanguage = "Language/Pt";
	*/
	public static $DefaultLanguage = "";
	/*
		GOOGLE_MAPS_API_KEY
		Description: The google maps api key used to load the googlemaps. 
		             To use the google maps is necessary to have a goolge account and claim an api key,
					 that will grant you usage. With a free key you will be able to only a limit amount of use of the map,
					 but if you need to constantly use the google maps in the InfraTools System, you will need a paid key.
					 Google maps is used in both registration and account update, where the user's defines it's country and
					 region.
					 Check this URL to get an API key: https://developers.google.com/maps/documentation/javascript/get-api-key
		Examples:
			$GoogleMapsApiKey = "C:/Web/Logs/InfraTools";
			$GoogleMapsApiKey = "/var/log/InfraTools";
	*/
	public static $GoogleMapsApiKey = "";
	/*
		LOG_FOLDER
		Description: The InfraTools log folder
		Examples:
			$LogApplication = "C:/Web/Logs/InfraTools";
			$LogApplication = "/var/log/InfraTools";
	*/
	public static $LogApplication = "";
	/*
		TIMEZONE
		Description: The e-mail account to send system e-mails
		Examples:
			$TimeZone = "America/Sao_Paulo";
	*/
	public static $TimeZone = "";
	/*
		DISPLAY_ERRORS
		Description: Tells if the application should display warning and errors or not.
		Examples:
			$DisplayErrors = "1";
	*/
	public static $DisplayErrors = "";
}
?>