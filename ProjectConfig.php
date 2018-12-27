<?php
/************************************************************************
Class: ProjectConfig
Creation: 2018-08-15
Creator: Marcus Siqueira
Dependencies:
			
Description: Main Configuration System file
**************************************************************************/

class ProjectConfig
{	
	/***********************************************************************/
	/*
		ADDRESS_APPLICATION
		Description: The default URL or IP address of the application
		Can either be an ip address or a URL, with a different port boung to it or not.
		Examples:
			AddressApplication = "localhost";
			AddressApplication = "domain.com";
			AddressApplication = "139.82.1.2";
	*/
	public static $AddressApplication = "";
	/***********************************************************************/
	
	/***********************************************************************/
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
	/***********************************************************************/
	
	/***********************************************************************/
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
	/***********************************************************************/
	
	/***********************************************************************/
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
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		APPLICATION_NAME
		Description: The name of the application, used by logs and e-mail messages.
		Examples:
			$ApplicationName = "InfraTools";
	*/
	public static $ApplicationName = "";
	/***********************************************************************/
	
	/***********************************************************************/
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
	/***********************************************************************/
	
	
	/***********************************************************************/
	/*
		DISPLAY_ERRORS
		Description: Tells if the application should display warning and errors or not.
		Examples:
			$DisplayErrors = "1";
	*/
	public static $DisplayErrors = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		E-MAIL NO REPLY ACCOUNT
		Description: The no replye-mail account to send system e-mails. It is meant to be automated e-mails that the end 
		             user should not reply
		Examples:
			EmailNoReplyAccount = "account@domain.com";
	*/
	public static $EmailNoReplyAccount = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		E-MAIL NO REPLY ACCOUNT REPLY TO
		Description: The default account name for the e-mails sent by the system automatic messages
		Examples:
			EmailNoReplyAccount = "Support InfraTools";
	*/
	public static $EmailNoReplyAccountReplyTo = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		E-MAIL NO REPLY PASSWORD
		Description: The no reply e-mail account's password to send system e-mails.
		             If you are using gmail, for example, i would recommend you to claim an app password,
					 and for that you will need enable a 2 step verification before you can do that.
					 Check this URL from google: https://myaccount.google.com/security
		Examples:
			EmailNoReplyPassword = "e-mail password";
	*/
	public static $EmailNoReplyPassword = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		E-MAIL SUPPORT ACCOUNT
		Description: The support e-mail account used to notify the team responsible for this application.
		             This is usually a group that contain more than one e-mail account, the system will use the 
					 no reply e-mail account to send e-mails to that group.
		Examples:
			EmailSupportAccount = "account@domain.com";
	*/
	public static $EmailSupportAccount = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		ENALB_SSL
		Description: Use TRUE to enable SSL use on the Application. Note that if enabled, any redirection
		             by the application will use https://. If the value is FALSE, the redirection will use
					 http://.
		Examples:
			$EnableSSL = TRUE;
			$EnableSSL = FALSE;
	*/
	public static $EnableSSL = FALSE;
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		ENALB_UPLOAD
		Description: Use TRUE to enable the end user of the application to upload one or more
		             file into server, or FALSE to disable any kind of file upload by the user.
		Examples:
			$EnableUpload = "On";
			$EnableUpload = "Off";
	*/
	public static $EnableUpload = "";
	/***********************************************************************/
	
	/***********************************************************************/
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
			$GoogleMapsApiKey = "HASH_KEY";
	*/
	public static $GoogleMapsApiKey = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		HTACCESS_FILE
		Description: The full path of the .htaccess file, used by the user,
		             to have custom apache configurations. Note that the application will use
					 this configuration file to modify the .htaccess, so you wont need to edit 
					 the .htaccess but only fill this configuration file.
		Examples:
			$HtaccessFile = "C:/Web/Sites/InfraTools/.htaccess";
			$HtaccessFile = "C:/Web/Sites/Development/InfraTools/.htacess";
			$HtaccessFile = "C:/Web//Sites/Master/InfraTools/.htacess";
			$HtaccessFile = "/var/log/InfraTools/.htaccess";
			$HtaccessFile = "/var/log/Development/InfraTools/.htaccess";
			$HtaccessFile = "/var/log/Master/InfraTools/.htaccess";
	*/
	public static $HtaccessFile = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		LOG_FOLDER
		Description: The InfraTools log folder
		Examples:
			$LogFolder = "C:/Web/Logs/InfraTools";
			$LogFolder = "C:/Web/Sites/Development/Logs/InfraTools";
			$LogFolder = "C:/Web/Sites/Master/Logs/InfraTools";
			$LogFolder = "/var/log/Sites/InfraTools";
			$LogFolder = "/var/log/Sites/Development/InfraTools";
			$LogFolder = "/var/log/Sites/Master/InfraTools";
	*/
	public static $LogFolder = "";
	/***********************************************************************/
	
	/***********************************************************************/
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
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_PORT
		Description: The port of the MySql DataBase
		Examples:
			$MySqlDataBasePort = "3306";
	*/
	public static $MySqlDataBasePort = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_NAME
		Description: The database name of the system
		Examples:
			$MySqlDataBaseName = "INFRATOOLS";
	*/
	public static $MySqlDataBaseName = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_IMPORT_USER
		Description: The database user used to import data in page Install
		Examples:
			$MysqlDataBaseImportUser = "infratools_application_import";
	*/
	public static $MysqlDataBaseImportUser = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_IMPORT_USER_PASSWORD
		Description: The database import user's password
		Examples:
			$MysqlDataBaseImportUserPassword = "infratools_application_import_password";
	*/
	public static $MysqlDataBaseImportUserPassword = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_SUPER_USER
		Description: The database super user
		Examples:
			$MySqlDataBaseSuperUser = "infratools_root";
	*/
	public static $MySqlDataBaseSuperUser = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_SUPER_USER_PASSWORD
		Description: The database super user's password
		Examples:
			$MySqlDataBaseSuperUserPassword = "infratools_root_password";
	*/
	public static $MySqlDataBaseSuperUserPassword = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_USER
		Description: The database user, used in the whole application
		Examples:
			$MySqlDataBaseUser = "infratools_application";
	*/
	public static $MySqlDataBaseUser = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_USER_PASSWORD
		Description: The database user's password
		Examples:
			$MySqlDataBaseUserPassword = "infratools_application_password";
	*/
	public static $MySqlDataBaseUserPassword = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_OPTION_TIME_OUT
		Description: The maximum time, in seconds, that the application will 
		             wait for a database answer when performing an operation in the database.
		Examples:
			$MySqlOptionTimeOut = "30";
			$MySqlOptionTimeOut = "20";
	*/
	public static $MySqlOptionTimeOut = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		PEAR_FOLDER
		Description: The location of the pear installation that is usually inside the php folder
		Examples:
			$PearFolder = "C:/Softwares/Php_7.1.1/pear/";
			$PearFolder = "/etc/php/pear/";
	*/
	public static $PearFolder = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		SESSION_FOLDER
		Description: The default location of the session folder, you may define any. 
		             I don't recommend using a folder visiable to the web.
		Examples:
			$SessionFolder = "C:/Web/Session/";
			$SessionFolder = "C:/Web/Sites/Session/";
			$SessionFolder = "C:/Web/Development/Session/";
			$SessionFolder = "C:/Web/Master/Session/";
			$SessionFolder = "/var/www/Session/";
			$SessionFolder = "/var/www/Development/Session/";
			$SessionFolder = "/var/www/Master/Session/";
	*/
	public static $SessionFolder = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		TIMEZONE
		Description: The e-mail account to send system e-mails
		Examples:
			$TimeZone = "America/Sao_Paulo";
	*/
	public static $TimeZone = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		UPLOAD_DIRECTORY
		Description: The folder for files uploaded by the end user.
		Examples:
			UploadDirectory = "C:/Web/Upload";
			UploadDirectory = "C:/Web/Sites/Upload";
			UploadDirectory = "C:/Web/Sites/Development/Upload";
			UploadDirectory = "C:/Web/Sites/Master/Upload";
			UploadDirectory = "/var/www/Development/Upload";
			UploadDirectory = "/var/www/Development/Upload";
			UploadDirectory = "/var/www/Master/Upload";
	*/
	public static $UploadDirectory = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		UPLOAD_FILE_LIMIT
		Description: The maximum number of files that can be uploaded in a row.
		Examples:
			UploadDirectory = "10";
			UploadDirectory = "20";
	*/
	public static $UploadFileLimit = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		UPLOAD_FILE_MAX_SIZE
		Description: The maximum size of a single file upload in MB.
		Examples:
			UploadDirectory = "100M";
			UploadDirectory = "50M";
	*/
	public static $UploadFileMaxSize = "";
	/***********************************************************************/
	
}
?>