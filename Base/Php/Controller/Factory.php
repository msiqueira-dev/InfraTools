<?php

/************************************************************************
Class: Factory
Creation: 01/09/2017
Creator: Marcus Siqueira
Dependencies:
			- Every function will need the file of the class being instaciated included
			by the whose called it.
	
Description: 
			Classe used to create instance of all elements in the Base Project.
Methods:
			public    function CreateAssocTicketUserRequesting($Ticket, $TypeAssocUserRequesting, $User, $RegisterDate);
			public    function CreateAssocUserCorporation($AssocUserCorporationRegistrationDate,      
			                                              $AssocUserCorporationRegistrationId, $CorporationInstance, $RegisterDate,
								   					      $UserInstance);
			public    function CreateAssocUserRole($AssocUserRoleRoleName, $AssocUserRoleUserEmail, $RegisterDate);
			public    function CreateAssocUserNotification($AssocUserNotificationNotification, $AssocUserNotificationUser,
			                                               $AssocUserNotificationRead, $RegisterDate);
			public    function CreateAssocUserTeam($RegisterDate, $TeamInstance, $TypeAssocUserTeamInstance, $UserInstance);
			public    function CreateCaptcha();
			public    function CreateConfig();
			public    function CreateCorporation($ArrayInstanceDepartment, $CorporationActive, $CoraporationName, $RegisterDate);
			public    function CreateCountry($CountryAbbreviation, $CountryName, $RegionCode, $RegisterDate);
			public    function CreateDepartment($DepartmentCorporation, $DepartmentInitials, $DepartmentName, $RegisterDate);
			public    function CreateDiagnosticTools();
			public    function CreateEmail();
			public    function CreateFacedeBusiness($LanguageText);
			public    function CreateFacedePersistence();
			public    function CreateFacedePersistenceAssocTicketUserRequesting();
			public    function CreateFacedePersistenceAssocTicketUserResponsible();
			public    function CreateFacedePersistenceAssocUserCorporation();
			public    function CreateFacedePersistenceAssocUserRole();
			public    function CreateFacedePersistenceAssocUserTeam();
			public    function CreateFacedePersistenceCorporation();
			public    function CreateFacedePersistenceCountry();
			public    function CreateFacedePersistenceDepartment();
			public    function CreateFacedePersistenceHistoryTicket();
			public    function CreateFacedePersistenceNotification();
			public    function CreateFacedePersistenceRole();
			public    function CreateFacedePersistenceStatusTicket();
			public    function CreateFacedePersistenceSystemConfiguration();
			public    function CreateFacedePersistenceTeam();
			public    function CreateFacedePersistenceTicket();
			public    function CreateFacedePersistenceTypeAssocUserTeam();
			public    function CreateFacedePersistenceTypeStatusTicket();
			public    function CreateFacedePersistenceTypeTicket();
			public    function CreateFacedePersistenceTypeUser();
			public    function CreateFacedePersistenceUser();
			public    function CreateFile();
			public    function CreateFormValidator();
			public    function CreateLog($LogPathDirectory);
			public    function CreateMySqlManager($MySqlAddress, $MySqlPort, $MySqlDataBase, $MySqlUser, $MySqlPassword);
			public    function CreateMobileDetect();
			public    function CreateNetWhois();
			public    function CreateNotificationCreateNotification($NotificationActive, $NotificationId, $NotificationText, $RegisterDate);
			public    function CreatePage($Page, $Language);
			public    function CreatePageForm();
			public    function CreatePersistence();
			public    function CreateRole($RegisterDate, $RoleDescription, $RoleName);
			public    function CreateSession();
			public    function CreateSessionHandlerCustom();
			public    function CreateSystemConfiguration($RegisterDate, $SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
							                             $SystemConfigurationOptionName, $SystemConfigurationOptionNumber,
											             $SystemConfigurationOptionValue);
			public    function CreateTeam($RegisterDate, $TeamDescription, $TeamId, $TeamName)
			public    function CreateTechInfo();
			public    function CreateTicket($RegisterDate, $TicketDescription, $TicketId, $TicketStatus, 
								            $TicketSuggestion, $TicketTitle, $TicketType);
			public    function CreateTypeAssocUserTeam($RegisterDate, $TypeAssocUserTeamDescription);
			public    function CreateTypeStatusTicket($RegisterDate, $TypeStatusTicketDescription);
			public    function CreateTypeTicket($RegisterDate, $TypeTicketDescription);
			public    function CreateTypeUser($TypeUserDescription, $RegisterDate);
			public    function CreateUser($ArrayAssocUserNotification, $ArrayAssocUserTeam, $AssocUserCorporation, 
			                              $BirthDate, $CorporationInstance, $Country, $Department, $UserEmail, 
							              $Gender, $HashCode, $UserName, $Region, $RegisterDate, $SessionExpires, $TwoStepVerification, 
							              $UserActive, $UserConfirmed, $UserTypeInstance, $UserUniqueId)
**************************************************************************/

/* BASE PATH CONSTANTS */
if(!defined('BASE_PATH'))
{
	if (file_exists("Php"))
	{
		include_once("../ProjectConfig.php");
		if(!defined('BASE_PATH'))                define("BASE_PATH", "../Base");
		if(!defined('BASE_PATH_IMAGE'))          define("BASE_PATH_IMAGE", "../Base/Images/");
		if(!defined('BASE_PATH_PAGE'))           define("BASE_PATH_PAGE", "../Base/Pages/");
		if(!defined('BASE_PATH_PHP'))            define("BASE_PATH_PHP", "../Base/Php/");
		if(!defined('BASE_PATH_PHP_MODEL'))      define("BASE_PATH_PHP_MODEL", "../Base/Php/Model/");
		if(!defined('BASE_PATH_PHP_VIEW'))       define("BASE_PATH_PHP_VIEW", "../Base/Php/View/");
		if(!defined('BASE_PATH_PHP_CONTROLLER')) define('BASE_PATH_PHP_CONTROLLER', "../Base/Php/Controller/"); 
		if(!defined('SESSION_PATH'))             define("SESSION_PATH", ProjectConfig::$SessionFolder);
		if(!defined('PEAR_PATH'))                define("PEAR_PATH", ProjectConfig::$PearFolder);
		if(!defined('REL_PATH')) define("REL_PATH" , "");
	}
	elseif (file_exists("../Php"))
	{
		include_once("../../ProjectConfig.php");
		if(!defined('BASE_PATH'))                define("BASE_PATH", "../../Base");
		if(!defined('BASE_PATH_IMAGE'))          define("BASE_PATH_IMAGE", "../../Base/Images/");
		if(!defined('BASE_PATH_PAGE'))           define("BASE_PATH_PAGE", "../../Base/Pages/");
		if(!defined('BASE_PATH_PHP'))            define("BASE_PATH_PHP", "../../Base/Php/");
		if(!defined('BASE_PATH_PHP_MODEL'))      define("BASE_PATH_PHP_MODEL", "../../Base/Php/Model/");
		if(!defined('BASE_PATH_PHP_VIEW'))       define("BASE_PATH_PHP_VIEW", "../../Base/Php/View/");
		if(!defined('BASE_PATH_PHP_CONTROLLER')) define('BASE_PATH_PHP_CONTROLLER', "../Base/Php/Controller/"); 
		if(!defined('SESSION_PATH'))             define("SESSION_PATH", ProjectConfig::$SessionFolder);
		if(!defined('PEAR_PATH'))                define("PEAR_PATH", ProjectConfig::$PearFolder);
		if(!defined('REL_PATH')) define("REL_PATH" , "../");
	}
	else
	{
		include_once("../../../ProjectConfig.php");
		if(!defined('BASE_PATH'))                define("BASE_PATH", "../../../Base");
		if(!defined('BASE_PATH_IMAGE'))          define("BASE_PATH_IMAGE", "../../../Base/Images/");
		if(!defined('BASE_PATH_PAGE'))           define("BASE_PATH_PAGE", "../../../Base/Pages/");
		if(!defined('BASE_PATH_PHP'))            define("BASE_PATH_PHP", "../../../Base/Php/");
		if(!defined('BASE_PATH_PHP_MODEL'))      define("BASE_PATH_PHP_MODEL", "../../../Base/Php/Model/");
		if(!defined('BASE_PATH_PHP_VIEW'))       define("BASE_PATH_PHP_VIEW", "../../../Base/Php/View/");
		if(!defined('BASE_PATH_PHP_CONTROLLER')) define('BASE_PATH_PHP_CONTROLLER', "../../Base/Php/Controller/"); 
		if(!defined('SESSION_PATH'))             define("SESSION_PATH", ProjectConfig::$SessionFolder);
		if(!defined('PEAR_PATH'))                define("PEAR_PATH", ProjectConfig::$PearFolder);
		if(!defined('REL_PATH')) define("REL_PATH" , "../../");
	}
}

class Factory
{
	/* Instance */
	protected static $Instance;
	protected $ClassSystemName = NULL;
	protected $Config;
		
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		$this->ClassSystemName = get_class($this);
	}
	
	/* Singleton */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	public function CreateAssocTicketUserRequesting($Ticket, $TypeAssocUserRequesting, $User, $RegisterDate)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "AssocTicketUserRequesting.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocTicketUserRequesting');
		else include_once(BASE_PATH_PHP_MODEL . "AssocTicketUserRequesting.php");
		return new AssocTicketUserRequesting($Ticket, $TypeAssocUserRequesting, $User, $RegisterDate);
	}
	
	public function CreateAssocUserCorporation($AssocUserCorporationRegistrationDate, $AssocUserCorporationRegistrationId,
								               $CorporationInstance, $RegisterDate, $UserInstance)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "AssocUserCorporation.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocUserCorporation');
		else include_once(BASE_PATH_PHP_MODEL . "AssocUserCorporation.php");
		return new AssocUserCorporation($AssocUserCorporationRegistrationDate, $AssocUserCorporationRegistrationId,
								        $CorporationInstance, $RegisterDate, $UserInstance);
	}
	
	public function CreateAssocUserRole($AssocUserRoleRoleName, $AssocUserRoleUserEmail, $RegisterDate)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "AssocUserRole.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocUserRole');
		else include_once(BASE_PATH_PHP_MODEL . "AssocUserRole.php");
		return new AssocUserRole($AssocUserRoleRoleName, $AssocUserRoleUserEmail, $RegisterDate);
	}
	
	public function CreateAssocUserNotification($AssocUserNotificationNotification, $AssocUserNotificationUser,
			                                    $AssocUserNotificationRead, $RegisterDate)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "AssocUserNotification.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocUserNotification');
		else include_once(BASE_PATH_PHP_MODEL . "AssocUserNotification.php");
		return new AssocUserNotification($AssocUserNotificationNotification, $AssocUserNotificationUser,
			                             $AssocUserNotificationRead, $RegisterDate);
	}
	
	public function CreateAssocUserTeam($RegisterDate, $TeamInstance, $TypeAssocUserTeamInstance, $UserInstance)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "AssocUserTeam.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocUserTeam');
		else include_once(BASE_PATH_PHP_MODEL . "AssocUserTeam.php");
		return new AssocUserTeam($RegisterDate, $TeamInstance, $TypeAssocUserTeamInstance, $UserInstance);
	}
	
	public function CreateCaptcha()
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Captcha.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Captcha');
		else include_once(BASE_PATH_PHP_MODEL . "Captcha.php");
		return new Captcha();
	}
	
	public function CreateConfig()
	{
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Config');
		elseif(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
			include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	    else include_once("../Php/Controller/Config.php");
		return Config::__create();
	}
	
	public function CreateCorporation($ArrayInstanceDepartment, $CorporationActive, $CoraporationName, $RegisterDate)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Corporation.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Corporation');
		else include_once(BASE_PATH_PHP_MODEL . "Corporation.php");
		return new Corporation($ArrayInstanceDepartment, $CorporationActive, $CoraporationName, $RegisterDate);
	}
	
	public function CreateCountry($CountryAbbreviation, $CountryName, $RegionCode, $RegisterDate) 
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Country.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Country');
		else include_once(BASE_PATH_PHP_MODEL . "Country.php");
		return new Country($CountryAbbreviation, $CountryName, $RegionCode, $RegisterDate);
	}
	
	public function CreateDepartment($DepartmentCorporation, $DepartmentInitials, $DepartmentName, $RegisterDate) 
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Department.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Department');
		else include_once(BASE_PATH_PHP_MODEL . "Department.php");
		return new Department($DepartmentCorporation, $DepartmentInitials, $DepartmentName, $RegisterDate);
	}
	
		public function CreateDiagnosticTools()
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "DiagnosticTools.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class DiagnosticTools');
		else include_once(BASE_PATH_PHP_MODEL . "DiagnosticTools.php");
		return DiagnosticTools::__create();	
	}
	
	public function CreateEmail() 
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Email.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Email');
		else include_once(BASE_PATH_PHP_MODEL . "Email.php");
		return new Email();
	}
	
	public function CreateFacedeBusiness($LanguageText)
	{
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedeBusiness.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedeBusiness');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedeBusiness.php");
		return FacedeBusiness::__create($LanguageText);
	}
	
	public function CreateFacedePersistence()
	{
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistence.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistence');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistence.php");
		return FacedePersistence::__create();
	}
	
	public function CreateFacedePersistenceAssocTicketUserRequesting()
	{
		if (!class_exists("AssocTicketUserRequesting"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "AssocTicketUserRequesting.php"))
				include_once(BASE_PATH_PHP_MODEL . "AssocTicketUserRequesting.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class AssocTicketUserRequesting');
		}
		
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocTicketUserRequesting.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceAssocTicketUserRequesting');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocTicketUserRequesting.php");
		return FacedePersistenceAssocTicketUserRequesting::__create();
	}
	
	public function CreateFacedePersistenceAssocTicketUserResponsible()
	{
		if (!class_exists("AssocTicketUserResponsible"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "AssocTicketUserResponsible.php"))
				include_once(BASE_PATH_PHP_MODEL . "AssocTicketUserResponsible.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class AssocTicketUserResponsible');
		}
		
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocTicketUserResponsible.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceAssocTicketUserResponsible');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocTicketUserResponsible.php");
		return FacedePersistenceAssocTicketUserResponsible::__create();
	}
	
	public function CreateFacedePersistenceAssocUserCorporation()
	{
		if (!class_exists("AssocUserCorporation"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "AssocUserCorporation.php"))
				include_once(BASE_PATH_PHP_MODEL . "AssocUserCorporation.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocUserCorporation');
		}
		
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocUserCorporation.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceAssocUserCorporation');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocUserCorporation.php");
		return FacedePersistenceAssocUserCorporation::__create();
	}
	
	public function CreateFacedePersistenceAssocUserRole()
	{
		if (!class_exists("AssocUserRole"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "AssocUserRole.php"))
				include_once(BASE_PATH_PHP_MODEL . "AssocUserRole.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocUserRole');
		}
		
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocUserRole.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceAssocUserRole');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocUserRole.php");
		return FacedePersistenceAssocUserRole::__create();
	}
	
	public function CreateFacedePersistenceAssocUserTeam()
	{
		if (!class_exists("AssocUserTeam"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "AssocUserTeam.php"))
				include_once(BASE_PATH_PHP_MODEL . "AssocUserTeam.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocUserTeam');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocUserTeam.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceAssocUserTeam');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceAssocUserTeam.php");
		return FacedePersistenceAssocUserTeam::__create();
	}
	
	public function CreateFacedePersistenceCorporation()
	{
		if (!class_exists("Corporation"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Corporation.php"))
				include_once(BASE_PATH_PHP_MODEL . "Corporation.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Corporation');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceCorporation.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceCorporation');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceCorporation.php");
		return FacedePersistenceCorporation::__create();
	}
	
	public function CreateFacedePersistenceCountry()
	{
		if (!class_exists("Country"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Country.php"))
				include_once(BASE_PATH_PHP_MODEL . "Country.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Country');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceCountry.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceCountry');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceCountry.php");
		return FacedePersistenceCountry::__create();
	}
	
	public function CreateFacedePersistenceDepartment()
	{
		if (!class_exists("Department"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Department.php"))
				include_once(BASE_PATH_PHP_MODEL . "Department.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Department');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceDepartment.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceDepartment');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceDepartment.php");
		return FacedePersistenceDepartment::__create();
	}
	
	public function CreateFacedePersistenceHistoryTicket()
	{
		if (!class_exists("HistoryTicket"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "HistoryTicket.php"))
				include_once(BASE_PATH_PHP_MODEL . "HistoryTicket.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class HistoryTicket');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceHistoryTicket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceHistoryTicket');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceHistoryTicket.php");
		return FacedePersistenceHistoryTicket::__create();
	}
	
	public function CreateFacedePersistenceNotification()
	{
		if (!class_exists("Notification"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Notification.php"))
				include_once(BASE_PATH_PHP_MODEL . "Notification.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Notification');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceNotification.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceNotification');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceNotification.php");
		return FacedePersistenceNotification::__create();
	}
	
	public function CreateFacedePersistenceRole()
	{
		if (!class_exists("Role"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Role.php"))
				include_once(BASE_PATH_PHP_MODEL . "Role.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Role');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceRole.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceRole');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceRole.php");
		return FacedePersistenceRole::__create();
	}
	
	public function CreateFacedePersistenceStatusTicket()
	{
		if (!class_exists("StatusTicket"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "StatusTicket.php"))
				include_once(BASE_PATH_PHP_MODEL . "StatusTicket.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class StatusTicket');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceStatusTicket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceStatusTicket');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceStatusTicket.php");
		return FacedePersistenceStatusTicket::__create();
	}
	
	public function CreateFacedePersistenceSystemConfiguration()
	{
		if (!class_exists("SystemConfiguration"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "SystemConfiguration.php"))
				include_once(BASE_PATH_PHP_MODEL . "SystemConfiguration.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class SystemConfiguration');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceSystemConfiguration.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceSystemConfiguration');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceSystemConfiguration.php");
		return FacedePersistenceSystemConfiguration::__create();
	}
	
	public function CreateFacedePersistenceTeam()
	{
		if (!class_exists("Team"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Team.php"))
				include_once(BASE_PATH_PHP_MODEL . "Team.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Team');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTeam.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceTeam');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTeam.php");
		return FacedePersistenceTeam::__create();
	}
	
	public function CreateFacedePersistenceTicket()
	{
		if (!class_exists("Ticket"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Ticket.php"))
				include_once(BASE_PATH_PHP_MODEL . "Ticket.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Ticket');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTicket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceTicket');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTicket.php");
		return FacedePersistenceTicket::__create();
	}
	
	public function CreateFacedePersistenceTypeAssocUserTeam()
	{
		if (!class_exists("TypeAssocUserTeam"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php"))
				include_once(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeAssocUserTeam');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeAssocUserTeam.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceTypeAssocUserTeam');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeAssocUserTeam.php");
		return FacedePersistenceTypeAssocUserTeam::__create();
	}
	
	public function CreateFacedePersistenceTypeStatusTicket()
	{
		if (!class_exists("TypeStatusTicket"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "TypeStatusTicket.php"))
				include_once(BASE_PATH_PHP_MODEL . "TypeStatusTicket.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeStatusTicket');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeStatusTicket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceTypeStatusTicket');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeStatusTicket.php");
		return FacedePersistenceTypeStatusTicket::__create();
	}
	
	public function CreateFacedePersistenceTypeTicket()
	{
		if (!class_exists("TypeTicket"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "TypeTicket.php"))
				include_once(BASE_PATH_PHP_MODEL . "TypeTicket.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeTicket');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeTicket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceTypeTicket');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeTicket.php");
		return FacedePersistenceTypeTicket::__create();
	}
	
	public function CreateFacedePersistenceTypeUser()
	{
		if (!class_exists("TypeUser"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "TypeUser.php"))
				include_once(BASE_PATH_PHP_MODEL . "TypeUser.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeUser');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeUser.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceTypeUser');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeUser.php");
		return FacedePersistenceTypeUser::__create();
	}
	
	public function CreateFacedePersistenceUser()
	{
		if (!class_exists("User"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "User.php"))
				include_once(BASE_PATH_PHP_MODEL . "User.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class User');
		}
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceUser.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistenceUser');
		else include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistenceUser.php");
		return FacedePersistenceUser::__create();
	}
	
	public function CreateFile()
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "File.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class File');
		else include_once(BASE_PATH_PHP_MODEL . "File.php");
		return new File();
	}
	
	public function CreateFormValidator()
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "FormValidator.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class FormValidator');
		else include_once(BASE_PATH_PHP_MODEL . "FormValidator.php");
		return FormValidator::__create();
	}
	
	public function CreateLog($LogPathDirectory)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Log.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Log');
		else include_once(BASE_PATH_PHP_MODEL . "Log.php");
		return new Log($LogPathDirectory);
	}
	
	public function CreateMySqlManager($MySqlAddress, $MySqlPort, $MySqlDataBase, $MySqlUser, $MySqlPassword)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "MySqlManager.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class MySqlManager');
		else include_once(BASE_PATH_PHP_MODEL . "MySqlManager.php");
		return MySqlManager::__create($MySqlAddress, $MySqlPort, $MySqlDataBase, $MySqlUser, $MySqlPassword);
	}
	
	public function CreateMobileDetect()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");
		return new MobileDetect;
	}
	
	public function CreateNetWhois()
	{
		if(!file_exists(PEAR_PATH . "Net/Whois.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading PEAR Class Net_Whois');
		else include_once(PEAR_PATH . "Net/Whois.php");
		return new Net_Whois;
	}
	
	public function CreateNotification($NotificationActive, $NotificationId, $NotificationText, $RegisterDate)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Notification.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Notification');
		else include_once(BASE_PATH_PHP_MODEL . "Notification.php");
		return new Notification($NotificationActive, $NotificationId, $NotificationText, $RegisterDate);
	}
	
	public function CreatePage($Page, $Language)
	{
		$Config = NULL;
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		if(file_exists(SITE_PATH_PHP_VIEW . $Page . ".php"))
			include_once(SITE_PATH_PHP_VIEW . $Page . ".php");
		elseif(file_exists(BASE_PATH_PHP_VIEW . $Page . ".php"))
		{
			include_once(BASE_PATH_PHP_VIEW . $Page . ".php");
			$Config = $this->CreateConfig();
		}
		elseif(file_exists(BASE_PATH_PHP_VIEW . "Page.php"))
		{
			include_once(BASE_PATH_PHP_VIEW . "Page.php");
			$Page = Config::PAGE;
			$Config = $this->CreateConfig();
		}
		else exit(basename(__FILE__, '.php') . ': Not a single View Class available for $Page. Check View Dictories.');
		$page = $Page::__create($Config, $Language, $Page);
		if($page != NULL)
		{
			$page->LoadPage();
			if($page->InputValueHeaderDebug == Config::CHECKBOX_CHECKED)
			{
				$page->StopPageLoadTime();
				echo "<div class='DivPageLoadTime'><b>Page Load Time: " . $page->GetPageLoadTime() . "</b></div>";
			}
			return Config::RET_OK;
		}
		else return Config::RET_ERROR;
	}
	
	public function CreatePageForm()
	{
		if(!file_exists(BASE_PATH_PHP_VIEW . "PageForm.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class PageForm');
		else include_once(BASE_PATH_PHP_VIEW . "PageForm.php");
		return PageForm::__create();
	}
	
	public function CreatePersistence()
	{
		return NULL;
	}
	
	public function CreateRole($RegisterDate, $RoleDescription, $RoleName)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Role.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Role');
		else include_once(BASE_PATH_PHP_MODEL . "Role.php");
		return new SessionHandler($RegisterDate, $RoleDescription, $RoleName);
	}
	
	public function CreateSession()
	{
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "Session.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Session');
		else include_once(BASE_PATH_PHP_CONTROLLER . "Session.php");
		return Session::__create();
	}
	
	public function CreateSessionHandlerCustom()
	{
		if(!file_exists(BASE_PATH_PHP_CONTROLLER . "SessionHandlerCustom.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class SessionHandlerCustom');
		else include_once(BASE_PATH_PHP_CONTROLLER . "SessionHandlerCustom.php");
		return new SessionHandler();
	}
	
	public function CreateSystemConfiguration($RegisterDate, $SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
							                  $SystemConfigurationOptionName, $SystemConfigurationOptionNumber,
											  $SystemConfigurationOptionValue)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "SystemConfiguration.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class SystemConfiguration');
		else include_once(BASE_PATH_PHP_MODEL . "SystemConfiguration.php");
		if(!isset($SystemConfigurationOptionActive))
			$SystemConfigurationOptionActive = FALSE;
		return  new SystemConfiguration($RegisterDate, $SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
										$SystemConfigurationOptionName, $SystemConfigurationOptionNumber,
										$SystemConfigurationOptionValue);
	}
	
	public function CreateTeam($RegisterDate, $TeamDescription, $TeamId, $TeamName)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Team.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Team');
		else include_once(BASE_PATH_PHP_MODEL . "Team.php");
		return new Team($RegisterDate, $TeamDescription, $TeamId, $TeamName);
	}
	
	public function CreateTechInfo()
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "TechInfo.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class TechInfo');
		else include_once(BASE_PATH_PHP_MODEL . "TechInfo.php");
		return TechInfo::__create();
	}
	
	public function CreateTicket($RegisterDate, $TicketDescription, $TicketId, $TicketStatus, 
			     	             $TicketSuggestion, $TicketTitle, $TicketType)
 	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "Ticket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class Ticket');
		else include_once(BASE_PATH_PHP_MODEL . "Ticket.php");
		return new Ticket($RegisterDate, $TicketDescription, $TicketId, $TicketStatus, 
			     	      $TicketSuggestion, $TicketTitle, $TicketType);
    }
	
	public function CreateTypeAssocUserTeam($RegisterDate, $TypeAssocUserTeamDescription)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeAssocUserTeam');
		else include_once(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php");
		return new TypeAssocUserTeam($RegisterDate, $TypeAssocUserTeamDescription);
	}
	
	public function CreateTypeStatusTicket($RegisterDate, $TypeStatusTicketDescription)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "TypeStatusTicket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeStatusTicket');
		else include_once(BASE_PATH_PHP_MODEL . "TypeStatusTicket.php");
		return new TypeStatusTicket($RegisterDate, $TypeStatusTicketDescription);
	}
	
	public function CreateTypeTicket($RegisterDate, $TypeTicketDescription)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "TypeTicket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeTicket');
		else include_once(BASE_PATH_PHP_MODEL . "TypeTicket.php");
		return new TypeTicket($RegisterDate, $TypeTicketDescription);
	}
	
	public function CreateTypeUser($TypeUserDescription, $RegisterDate)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "TypeUser.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeUser');
		else include_once(BASE_PATH_PHP_MODEL . "TypeUser.php");
		return new TypeUser($TypeUserDescription, $RegisterDate);
	}
	
	public function CreateUser($ArrayAssocUserNotification, $ArrayAssocUserTeam, $AssocUserCorporation, 
							   $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, 
							   $Gender, $HashCode, $UserName, $Region, $RegisterDate, $SessionExpires, 
							   $TwoStepVerification, $UserActive, $UserConfirmed, 
							   $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
							   $UserTypeInstance, $UserUniqueId)
	{
		if(!file_exists(BASE_PATH_PHP_MODEL . "User.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class User');
		else include_once(BASE_PATH_PHP_MODEL . "User.php");
		if(!file_exists(BASE_PATH_PHP_MODEL . "AssocUserTeam.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocUserTeam');
		else include_once(BASE_PATH_PHP_MODEL . "AssocUserTeam.php");
		if(!file_exists(BASE_PATH_PHP_MODEL . "AssocUserNotification.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Base Class AssocUserNotification');
		else include_once(BASE_PATH_PHP_MODEL . "AssocUserNotification.php");
		
		return new User($ArrayAssocUserNotification, $ArrayAssocUserTeam, $AssocUserCorporation, 
						$BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, 
						$Gender, $HashCode, $UserName, $Region, $RegisterDate, $SessionExpires, 
						$TwoStepVerification, $UserActive, $UserConfirmed, 
						$UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
						$UserTypeInstance, $UserUniqueId);
	}
}
?>