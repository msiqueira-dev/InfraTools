<?php
/************************************************************************
Class: ProjectConfig
Creation: 2018-08-15
Creator: Marcus Siqueira
Dependencies:
			
Description: This file is used to set the Application configuration.
             ** TIPS **
			 1- THE WHOLE FILE SHOULD BE READ AND FILLED WITH THE RIGHT INFORMATION
			 2 - IF YOU HAVE DOUBT CONTACT ME BY GITHUB.
			 3 - SENSITIVE INFORMATION, SUCH AS PASSWORD, SHOULD BE KEPT SECURE.
			 4 - USE STRONG PASSWORDS. 
			 5 - MAKE SURE ONLY THE RIGHT PEOPLE HAVE ACCESS TO THIS FILE.
			 6 - THE UPLAOD FOLDER SHOULD NOT BE ACCESSIBLE BY THE WEB USING THE BROWSER.
			 7 - DATABASE USERS SHOULD HAVE DIFFERENT PRIVILEGES AND ROLES.
			 **      **
**************************************************************************/

class ProjectConfig
{	
	/***********************************************************************/
	/*
		ADDRESS_APPLICATION
		Description: The default URL or IP address of the application
		             Can either be an ip address or a URL, with a different port bound to it or not.
		Examples:
			$AddressApplication = "localhost";
			$AddressApplication = "domain.com";
			$AddressApplication = "domain.com:8080";
			$AddressApplication = "139.82.1.2";
			$AddressApplication = "139.82.1.2:8080";
	*/
	public static $AddressApplication = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		IMAGE_SERVER
		Description: The default URL or IP address for an image server. This address will be 
		             used to load all images by the application.
		             The image server must be configured in the WebServer (Apache Web Server for an example),
					 where the image folder is bound either to an address or address and port.
		Examples:
			$AddressImageServer = "http://localhost:8001/";
			$AddressImageServer = "http://domain.com:8001/";
			$AddressImageServer = "https://domain.com:8001/";
			$AddressImageServer = "http://img.domain.com/";
			$AddressImageServer = "https://img.domain.com/";
			$AddressImageServer = "139.82.1.2:8002";
	*/
	public static $AddressImageServer = "/";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		FILE_SERVER
		Description: The default URL or IP address for a file server. This address will be 
		             used to allow the user to download specific files stored by the application.
		             The file server must be configured in the WebServer (Apache Web Server for an example),
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
		Description: The default URL or IP address for a javascript server. This address will be 
		             used to load all javascript files by the application.
		             The JavaScript server must be configured in the WebServer (Apache Web Server for an example),
					 where the JavaScript folder is bound either to an address or address and port.
					 JavaScript files are used in the end user's browser, they are loaded using
					 this address.
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
		Description: The name of the application, used by logs, notifications  
		             and also on e-mails sent by the application. It helps to 
					 identify the application. In the example bellow, the chosen
					 name is the application's default name, InfraTools.
		Examples:
			$ApplicationName = "InfraTools";
	*/
	public static $ApplicationName = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		DEFAULT_LANGUAGE
		Description: The default language that the application should use.
		             The only available languages now are English, Espanish,
					 German and Portuguese. The default language tells the application
					 witch language to show to the end user when none was selected by the 
					 user.
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
		             Used for test porpuses, where 1 is YES and 0 is NO. Should be set to 0
					 if the application if on production.
		Examples:
			$DisplayErrors = "1";
			$DisplayErrors = "0";
	*/
	public static $DisplayErrors = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		E-MAIL NO REPLY ACCOUNT
		Description: The no replye-mail account to send application e-mails. It is meant to be automated e-mails that the end 
		             user should not reply. This is usually used for automatic message porpuses where the user do not need
					 to reply the e-mail back.
		Examples:
			$EmailNoReplyAccount = "account@domain.com";
			$EmailNoReplyAccount = "no-reply@domain.com";
	*/
	public static $EmailNoReplyAccount = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		E-MAIL NO REPLY ACCOUNT REPLY TO
		Description: The default account name for the e-mails sent by the application automatic messages.
		             This is the name that will along with the e-mail address to the end user.
		Examples:
			$EmailNoReplyAccount = "Support InfraTools";
			$EmailNoReplyAccount = "Automatic Messages";
			$EmailNoReplyAccount = "No-Reply InfraTools";
	*/
	public static $EmailNoReplyAccountReplyTo = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		E-MAIL NO REPLY PASSWORD
		Description: The no reply e-mail account's password to send application e-mails.
		             If you are using gmail, for example, I would recommend you to claim an app password,
					 and for that you will need enable a 2 step verification before you can do that.
					 Check this URL from google: https://myaccount.google.com/security
					 Beware that if you are using gmail, and put your password direcly here,
					 google can block your account if the number of e-mails is large or suspicious.
		Examples:
			$EmailNoReplyPassword = "e-mail password";
	*/
	public static $EmailNoReplyPassword = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		E-MAIL SUPPORT ACCOUNT
		Description: The support e-mail account used to notify the team responsible for this application.
		             This is usually a group that contain more than one e-mail account from a support team, 
					 that the application will sent e-mails from the no reply e-mail account.
					 This is most used when you need to notify a team that maintains the applicatio of something.
		Examples:
			$EmailSupportAccount = "account@domain.com";
			$EmailSupportAccount = "support@domain.com";
			$EmailSupportAccount = "developers@domain.com";
	*/
	public static $EmailSupportAccount = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		ENABLE_SSL
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
		ENABLE_UPLOAD
		Description: Use On to enable the end user of the application to upload one or more
		             files into server, or FALSE to disable any kind of file upload by the user.
					 If the upload is set to off, the application will have less functions for the user.
		Examples:
			$EnableUpload = "On";
			$EnableUpload = "Off";
	*/
	public static $EnableUpload = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		GOOGLE_MAPS_API_KEY
		Description: The google maps api key used to load the googlemaps. The googlemaps are used in pages such as
		             Register, Account and more.
		             To use the google maps is necessary to have a goolge account and claim an api key,
					 that will grant you usage. With a free key you will be able to only a limit amount of use of the map,
					 but if you need to constantly use the google maps in the InfraTools System, you will need a paid key.
					 Google maps is used in both registration and account update, where the user's defines it's country and
					 region.
					 Check this URL to get an API key: https://developers.google.com/maps/documentation/javascript/get-api-key
		Examples:
			$GoogleMapsApiKey = "API-KEY";
	*/
	public static $GoogleMapsApiKey = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		HTACCESS_FILE
		Description: The full path of the .htaccess file, used by the user,
		             to have custom Apache Web Server configurations. Note that the application will use
					 this configuration file to create the .htaccess according to the settings here, 
					 so you wont need to create an .htaccess but only fill this configuration file.
					 If you need additional configurations on the .htaccess, you may change it after it 
					 is created.
					 .htaccess is a file used to override Apache Web Server settings for a site, or have specific settings.
					 If the Apache Web Server settings does not allow an .htaccess file, this will be inrrelevant, but if 
					 any modifications are needed, such as for uploading files options, the Apache Web Server will need to be reconfigured.
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
		Description: The InfraTools log folder. Used by the application to write down information that 
		             may have value for developers and support team.
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
		             NOTE: This application will only work with MySql Databases.
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
		             NOTE: This application will only work with MySql Databases.
		Examples:
			$MySqlDataBasePort = "3306";
			$MySqlDataBasePort = "6005";
	*/
	public static $MySqlDataBasePort = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_NAME
		Description: The database name of the application. If a database for this application
		             have not yet been created, the application can create it by acessing the instalation page.
					 If a database was createad with this application name but does not have what the application need,
					 the application will also offer a reinstalation on the instalation page.
		             NOTE: This application will only work with MySql Databases.
		Examples:
			$MySqlDataBaseName = "INFRATOOLS";
	*/
	public static $MySqlDataBaseName = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_IMPORT_USER
		Description: The database user used to import data in page Install.
		             This user is created by the application by using the Install page.
					 If you want to create it manually, it is recommended that this user
					 only have INSERT privileges and nothing more. The name of the database user
					 must be different than the other ones.
					 NOTE: This application will only work with MySql Databases.
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
		Description: The database super user. This is the only user that the application
		             cannot create by using the Install page. It must be a user with admin
					 rights over MySql. It is only used to make the application instalation
					 by the install page, so if you wish, you make clean this field and the password
					 after you have done the application instalation, for security porpuses.
					 NOTE: This application will only work with MySql Databases.
		Examples:
			$MySqlDataBaseSuperUser = "infratools_root";
	*/
	public static $MySqlDataBaseSuperUser = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_SUPER_USER_PASSWORD
		Description: The database super user's password
		             NOTE: This application will only work with MySql Databases.
		Examples:
			$MySqlDataBaseSuperUserPassword = "infratools_root_password";
	*/
	public static $MySqlDataBaseSuperUserPassword = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_USER
		Description: The database user, used in the whole application.
		             If this user is created by the Install page, the user will only have 
					 privileges to INSERT, DELETE, UPDATE and SELECT. The name on that filed
					 need to be different than the other users. If you wish to create it manually
					 make sure to only give the right privileges to the user, for security porpuses.
					 NOTE: This application will only work with MySql Databases.
		Examples:
			$MySqlDataBaseUser = "infratools_application";
	*/
	public static $MySqlDataBaseUser = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		MYSQL_DATABASE_USER_PASSWORD
		Description: The database user's password
		             NOTE: This application will only work with MySql Databases.
		Examples:
			$MySqlDataBaseUserPassword = "infratools_application_password";
	*/
	public static $MySqlDataBaseUserPassword = "";
	/***********************************************************************/
	
	/************************************************************************/
	/*
		MYSQL_DUMP_COMPLETE_PATH
		Description: The complete path for the mysqldump executable. MySqlDump is a tool that is
		             installed with MySql Database instalation. It allows the System Administrator
					 from the IT team to backup databases. In this application, the MySqlDump is used
					 to export the data that was filled by the user, such as Corporations, Departments and so on.
					 MySqlDump is usually on the same folder of the MySql executable.
					 NOTE: This application will only work with MySql Databases.
		Examples:
			$MySqlDumpCompletePath = "C:/Program Files/MySQL/MySQL Server 5.7/bin/mysqldump.exe";
			$MySqlDumpCompletePath = "C:/Program Files/MySQL/MySQL Server 8/bin/mysqldump.exe";
			$MySqlDumpCompletePath = "/usr/bin/mysqldump";
	*/
	public static $MySqlDumpCompletePath = "";
	
	/***********************************************************************/
	/*
		MYSQL_OPTION_TIME_OUT
		Description: The maximum time, in seconds, that the application will 
		             wait for a database answer when performing an operation in the database.
					 This setting is to prevent the application to enter in a loop while waiting for the 
					 MySql Database, that may never answer.
					 NOTE: This application will only work with MySql Databases.
		Examples:
			$MySqlOptionTimeOut = "30";
			$MySqlOptionTimeOut = "20";
	*/
	public static $MySqlOptionTimeOut = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		PEAR_FOLDER
		Description: The location of the pear installation that is usually inside the php folder.
		             pear is an additional module for PHP, that enhances it. This application uses 
					 pear for specific porpuses, if pear is not present the application will work normaly but
					 one or more functionalities may not work. 
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
		             Session is used to store information and share it with cookies. It is
					 needed by the application to operate.
		             I don't recommend using a folder visiable to the web, due to possible security risks,
					 so set the folder in a location where it is not accessible by the browser.
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
		Description: Your current timezone setting. If you don't know, use one from
		             the examples bellow.
		Examples:
			$TimeZone = "America/Sao_Paulo";
			$TimeZone = "America/New_York";
			$TimeZone = "America/Chicago";
			$TimeZone = "Asia/Singapore";
			$TimeZone = "Europe/Helsinki";
	*/
	public static $TimeZone = "";
	/***********************************************************************/
	
	/***********************************************************************/
	/*
		UPLOAD_DIRECTORY
		Description: The folder for files uploaded by the end user.
		             I don't recommend setting this folder visiable to the web, due to possible security risks,
					 so set the folder in a location where it is not accessible by the browser.
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
		             If 5 files are uploaded, and the maximum upload size is set to
					 50MB, each file can have 50MB.
		Examples:
			UploadDirectory = "100M";
			UploadDirectory = "50M";
	*/
	public static $UploadFileMaxSize = "";
	/***********************************************************************/
	
}
?>