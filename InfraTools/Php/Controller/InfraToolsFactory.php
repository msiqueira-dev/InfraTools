<?php

/************************************************************************
Class: InfraToolsFactory
Creation: 01/09/2017
Creator: Marcus Siqueira
Dependencies:
			- Every function will need the file of the class being instaciated included
			by the whose called it.
	
Description: 
			Classe used to create instance of all elements in the Base Project.
Methods:
			public static function CreateConfigInfraTools();
			public function CreateFacedePersistenceTypeService();
			public function CreateInfraToolsAssocUserService($InfraToolsServiceInstance, $InfraToolsTypeAssocUserServiceInstance, 
								                             $InfraToolsUserInstance, $RegisterDate);
			public function CreateInfraToolsFacedeBusiness($LanguageText);
			public function CreateInfraToolsCorporation($ArrayInstanceDepartment, $CorporationActive, $CorporationName, 
			                                            $RegisterDate);
			public function CreateInfraToolsFacedePersistence();
			public function CreateInfraToolsFacedePersistenceAssocUserService();
			public function CreateInfraToolsFacedePersistenceCorporation();
			public function CreateInfraToolsFacedePersistenceDataBase();
			public function CreateInfraToolsFacedePersistenceDepartment();
			public function CreateInfraToolsFacedePersistenceInformationService();
			public function CreateInfraToolsFacedePersistenceService();
			public function CreateInfraToolsFacedePersistenceTypeAssocUserService();
			public function CreateInfraToolsFacedePersistenceTypeService();
			public function CreateInfraToolsFacedePersistenceTypeStatusMonitoring();
			public function CreateInfraToolsFacedePersistenceUser();
			public function CreateInfraToolsHistoryTicket();
			public function CreateInfraToolsInformationService($RegisterDate, $InformationServiceDescription, $InformationServiceId, 
								                               $InformationServiceValue, $Service);
			public function CreateInfraToolsMonitoring();
			public function CreateInfraToolsNetwork();
			public function CreateInfraToolsService($RegisterDate, $ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange, 
			                                        $ServiceDepartment, $ServiceDepartmentCanChange,
								                    $ServiceDescription, $ServiceId, $ServiceName, $InfraToolsTypeServiceInstance);
			public function CreateInfraToolsTechInfo();
			public function CreateInfraToolsTicket();
			public function CreateInfraToolsTypeAssocUserService();
			public function CreateInfraToolsTypeService($RegisterDate, $TypeServiceName, $TypeServiceSLA);
			public function CreateInfraToolsTypeTimeMonitoring();
			public function CreateInfraToolsUser($ArrayAssocUserTeam, $ArrayNotification, $AssocUserCorporation, 
								                 $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $Email, 
         								         $Gender, $HashCode, $Name, $Region, $RegisterDate, $SessionExpires, 
								                 $TwoStepVerification, $UserActive, $UserConfirmed, 
								                 $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
  								                 $UserTypeInstance, $UserUniqueId);
			public function CreateLanguageDe();
			public function CreateLanguageEn();
			public function CreateLanguageEs();
			public function CreateLanguagePt();
			public function CreatePage($Page);
			private function CreatePageAbout();
			private function CreatePageAccount();
			private function CreatePageAdmin();
			private function CreatePageAdminCorporation();
			private function CreatePageAdminCountry();
			private function CreatePageAdminDepartment();
			private function CreatePageAdminNofication();
			private function CreatePageAdminService();
			private function CreatePageAdminTeam();
			private function CreatePageAdminTechInfo();
			private function CreatePageAdminTicket();
			private function CreatePageAdminTypeAssocUserTeam()
			private function CreatePageAdminTypeMonitoring();
			private function CreatePageAdminTypeService();
			private function CreatePageAdminTypeStatusMonitoring();
			private function CreatePageAdminTypeStatusTicket();
			private function CreatePageAdminTypeTicket();
			private function CreatePageAdminTypeUser();
			private function CreatePageAdminUser();
			private function CreatePageCheck();
			private function CreatePageContact();
			private function CreatePageCorporation();
			private function CreatePageDiagnosticTools();
			private function CreatePageGet();
			private function CreatePageHome();
			private function CreatePageInstall();
			private function CreatePageLogin();
			private function CreatePageNotFound();
			private function CreatePageNotification();
			private function CreatePagePasswordRecovery();
			private function CreatePagePasswordReset();
			private function CreatePageRegister();
			private function CreatePageRegisterConfirmation();
			private function CreatePageResendConfirmationLink();
			private function CreatePageService();
			private function CreatePageServiceList();
			private function CreatePageServiceListByCorporation();
			private function CreatePageServiceListByDepartment();
			private function CreatePageServiceListByTypeAssocUserService();
			private function CreatePageServiceListByTypeService();
			private function CreatePageServiceListByUser();
			private function CreatePageServiceRegister();
			private function CreatePageServiceSelect();
			private function CreatePageServiceView();
			private function CreatePageSupport();
			private function CreatePageTeam();
**************************************************************************/

/* SITE PATH CONSTANTS */
if (file_exists("Php"))
{
	if(!defined('BASE_PATH_PHP_CONTROLLER')) define("BASE_PATH_PHP_CONTROLLER", "../Base/Php/Controller/");
	if(!defined('SITE_PATH_CAPTCHA'))	     define("SITE_PATH_CAPTCHA", "Captcha");
	if(!defined('SITE_PATH_DE'))             define("SITE_PATH_DE", "De");
	if(!defined('SITE_PATH_EN'))             define("SITE_PATH_EN", "En");
	if(!defined('SITE_PATH_ES'))             define("SITE_PATH_ES", "Es");
	if(!defined('SITE_PATH_HTML'))           define("SITE_PATH_HTML", "Html");
	if(!defined('SITE_PATH_PHP'))            define("SITE_PATH_PHP", "Php/");
	if(!defined('SITE_PATH_PHP_MODEL'))      define("SITE_PATH_PHP_MODEL", "Php/Model/");
	if(!defined('SITE_PATH_PHP_VIEW'))       define("SITE_PATH_PHP_VIEW", "Php/View/");
	if(!defined('SITE_PATH_PHP_CONTROLLER')) define("SITE_PATH_PHP_CONTROLLER", "Php/Controller/");
	if(!defined('SITE_PATH_PT'))             define("SITE_PATH_PT", "Pt");
	if(!defined('SITE_PATH_STYLE_DESKTOP'))  define("SITE_PATH_STYLE_DESKTOP", "Style/Desktop");
	if(!defined('SITE_PATH_STYLE_MOBILE'))   define("SITE_PATH_STYLE_MOBILE", "Style/Mobile");
}
elseif(file_exists("../Php"))
{
	if(!defined('BASE_PATH_PHP_CONTROLLER')) define("BASE_PATH_PHP_CONTROLLER", "../../Base/Php/Controller/");
	if(!defined('SITE_PATH_CAPTCHA'))        define("SITE_PATH_CAPTCHA", "../Captcha");
	if(!defined('SITE_PATH_DE'))             define("SITE_PATH_DE", "../De");
	if(!defined('SITE_PATH_EN'))             define("SITE_PATH_EN", "../En");
	if(!defined('SITE_PATH_ES'))             define("SITE_PATH_ES", "../Es");
	if(!defined('SITE_PATH_HTML'))           define("SITE_PATH_HTML", "../Html");
	if(!defined('SITE_PATH_PHP'))            define("SITE_PATH_PHP", "../Php/");
	if(!defined('SITE_PATH_PHP_MODEL'))      define("SITE_PATH_PHP_MODEL", "../Php/Model/");
	if(!defined('SITE_PATH_PHP_VIEW'))       define("SITE_PATH_PHP_VIEW", "../Php/View/");
	if(!defined('SITE_PATH_PHP_CONTROLLER')) define("SITE_PATH_PHP_CONTROLLER", "../Php/Controller/");
	if(!defined('SITE_PATH_PT'))             define("SITE_PATH_PT", "../Pt");
	if(!defined('SITE_PATH_STYLE_MOBILE'))   define("SITE_PATH_STYLE_MOBILE", "../Style/Mobile");
	if(!defined('SITE_PATH_STYLE_DESKTOP'))  define("SITE_PATH_STYLE_DESKTOP", "../Style/Desktop");
}
else
{
	if(!defined('BASE_PATH_PHP_CONTROLLER')) define("BASE_PATH_PHP_CONTROLLER", "../../../Base/Php/Controller/");
	if(!defined('SITE_PATH_CAPTCHA'))        define("SITE_PATH_CAPTCHA", "../../Captcha");
	if(!defined('SITE_PATH_DE'))             define("SITE_PATH_DE", "../../De");
	if(!defined('SITE_PATH_EN'))             define("SITE_PATH_EN", "../../En");
	if(!defined('SITE_PATH_ES'))             define("SITE_PATH_ES", "../../Es");
	if(!defined('SITE_PATH_HTML'))           define("SITE_PATH_HTML", "../../Html");
	if(!defined('SITE_PATH_PHP'))            define("SITE_PATH_PHP", "../../../Php/");
	if(!defined('SITE_PATH_PHP_MODEL'))      define("SITE_PATH_PHP_MODEL", "../../../Php/Model/");
	if(!defined('SITE_PATH_PHP_VIEW'))       define("SITE_PATH_PHP_VIEW", "../../Php/View/");
	if(!defined('SITE_PATH_PHP_CONTROLLER')) define("SITE_PATH_PHP_CONTROLLER", "../../Php/Controller/");
	if(!defined('SITE_PATH_PT'))             define("SITE_PATH_PT", "../../Pt");
	if(!defined('SITE_PATH_STYLE_DESKTOP'))  define("SITE_PATH_STYLE_DESKTOP", "../../Style/Desktop");
	if(!defined('SITE_PATH_STYLE_MOBILE'))   define("SITE_PATH_STYLE_MOBILE", "../../Style/Mobile");
}

if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

if (!class_exists("LanguageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "LanguageInfraTools.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "LanguageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class LanguageInfraTools');
}



class InfraToolsFactory extends Factory
{
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		parent::__construct();
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
	
	public static function CreateConfigInfraTools()
	{
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class ConfigInfraTools');
		elseif(file_exists(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php"))
			include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	    else include_once("../Php/Controller/ConfigInfraTools.php");
		return ConfigInfraTools::__create();
	}
	
	public function CreateFacedePersistenceTypeService()
	{
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class FacedePersistenceTypeService');
		else include_once(SITE_PATH_PHP_CONTROLLER . "FacedePersistenceTypeService.php");
		return FacedePersistenceInfraTools::__create();	
	}
	
	public function CreateInfraToolsCorporation($ArrayInstanceDepartment, $CorporationActive, $CorporationName, $RegisterDate)
	{
		if (!class_exists("Corporation"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Corporation.php"))
				include_once(BASE_PATH_PHP_MODEL . "Corporation.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Corporation');
		}
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsCorporation.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsCorporation');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsCorporation.php");
		return new InfraToolsCorporation($ArrayInstanceDepartment, $CorporationActive, $CorporationName, $RegisterDate);
	}
	
	public function CreateInfraToolsAssocUserService($InfraToolsServiceInstance, $InfraToolsTypeAssocUserServiceInstance, 
								                     $InfraToolsUserInstance, $RegisterDate) 
	{
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsAssocUserService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsAssocUserService');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsAssocUserService.php");
		return new InfraToolsAssocUserService($InfraToolsServiceInstance, $InfraToolsTypeAssocUserServiceInstance, 
								              $InfraToolsUserInstance, $RegisterDate);
	}
	
	public function CreateInfraToolsFacedeBusiness($LanguageText)
	{
		if (!class_exists("FacedeBusiness"))
		{
			if(file_exists(BASE_PATH_PHP_CONTROLLER . "FacedeBusiness.php"))
				include_once(BASE_PATH_PHP_CONTROLLER . "FacedeBusiness.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedeBusiness');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedeBusiness.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedeBusiness');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedeBusiness.php");
		return InfraToolsFacedeBusiness::__create($LanguageText);
	}
	
	public function CreateInfraToolsFacedePersistence()
	{
		if (!class_exists("FacedePersistence"))
		{
			if(file_exists(BASE_PATH_PHP_CONTROLLER . "FacedePersistence.php"))
				include_once(BASE_PATH_PHP_CONTROLLER . "FacedePersistence.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class FacedePersistence');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistence.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistence');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistence.php");
		return InfraToolsFacedePersistence::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceAssocUserService()
	{
		if (!class_exists("InfraToolsPersistence"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsPersistence');
		}
		if (!class_exists("InfraToolsAssocUserService"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsAssocUserService.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsAssocUserService.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsAssocUserService');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceAssocUserService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceAssocUserService');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceAssocUserService.php");
		return InfraToolsFacedePersistenceAssocUserService::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceCorporation()
	{
		if (!class_exists("InfraToolsPersistence"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsPersistence');
		}
		if (!class_exists("InfraToolsCorporation"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsCorporation.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsCorporation.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsCorporation');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceCorporation.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceCorporation');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceCorporation.php");
		return InfraToolsFacedePersistenceCorporation::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceDataBase()
	{
		if (!class_exists("InfraToolsPersistenceDataBase"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsPersistenceDataBase.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsPersistenceDataBase.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsPersistenceDataBase');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceDataBase.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceDataBase');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceDataBase.php");
		return InfraToolsFacedePersistenceDataBase::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceDepartment()
	{
		if (!class_exists("Department"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Department.php"))
				include_once(BASE_PATH_PHP_MODEL . "Department.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Department');
		}
		if (!class_exists("InfraToolsPersistence"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsPersistence');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceDepartment.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceDepartment');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceDepartment.php");
		return InfraToolsFacedePersistenceDepartment::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceInformationService()
	{
		if (!class_exists("InfraToolsPersistence"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsPersistence');
		}
		if (!class_exists("InfraToolsInformationService"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsInformationService.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsInformationService.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsInformationService');
		}
		if (!class_exists("InfraToolsService"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsService.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsService.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsService');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceInformationService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceInformationService');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceInformationService.php");
		return InfraToolsFacedePersistenceInformationService::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceService()
	{
		if (!class_exists("InfraToolsPersistence"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsPersistence');
		}
		if (!class_exists("InfraToolsService"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsService.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsService.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsService');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceService');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceService.php");
		return InfraToolsFacedePersistenceService::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceTypeAssocUserService()
	{
		if (!class_exists("InfraToolsPersistence"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsPersistence');
		}
		if (!class_exists("InfraToolsTypeAssocUserService"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTypeAssocUserService.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsTypeAssocUserService.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsTypeAssocUserService');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceTypeAssocUserService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceTypeAssocUserService');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceTypeAssocUserService.php");
		return InfraToolsFacedePersistenceTypeAssocUserService::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceTypeService()
	{
		if (!class_exists("InfraToolsPersistence"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsPersistence');
		}
		if (!class_exists("InfraToolsTypeService"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTypeService.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsTypeService.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsTypeService');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceTypeService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceTypeService');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceTypeService.php");
		return InfraToolsFacedePersistenceTypeService::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceTypeStatusMonitoring()
	{
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceTypeStatusMonitoring.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceTypeStatusMonitoring');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceTypeStatusMonitoring.php");
		return InfraToolsFacedePersistenceTypeStatusMonitoring::__create();
	}
	
	public function CreateInfraToolsFacedePersistenceUser()
	{
		if (!class_exists("InfraToolsPersistence"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsPersistence.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsPersistence');
		}
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceUser.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistenceUser');
		else include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistenceUser.php");
		return InfraToolsFacedePersistenceUser::__create();
	}
	
	public function CreateInfraToolsHistoryTicket()
	{
		if (!class_exists("HistoryTicket"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "HistoryTicket.php"))
				include_once(BASE_PATH_PHP_MODEL . "HistoryTicket.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class HistoryTicket');
		}
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsHistoryTicket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsHistoryTicket');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsHistoryTicket.php");
		return new InfraToolsHistoryTicket();
	}
	
	public function CreateInfraToolsInformationService($RegisterDate, $InformationServiceDescription, $InformationServiceId, 
								                       $InformationServiceValue, $Service)
	{
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsInformationService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsInformationService');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsInformationService.php");
		return new InfraToolsInformationService($RegisterDate, $InformationServiceDescription, $InformationServiceId, 
								                $InformationServiceValue, $Service);
	}
	
	public function CreateInfraToolsMonitoring()
	{
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsMonitoring.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsMonitoring');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsMonitoring.php");
		return new InfraToolsMonitoring();
	}
	
	public function CreateInfraToolsNetwork()
	{
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsNetwork.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsNetwork');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsNetwork.php");
		return new InfraToolsNetwork();
	}
	
	public function CreateInfraToolsService($RegisterDate, $ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
											$ServiceDepartment, $ServiceDepartmentCanChange,
								            $ServiceDescription, $ServiceId, $ServiceName, $InfraToolsTypeServiceInstance)
	{
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsService');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsService.php");
		return new InfraToolsService($RegisterDate, $ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
									 $ServiceDepartment, $ServiceDepartmentCanChange,
								     $ServiceDescription, $ServiceId, $ServiceName, $InfraToolsTypeServiceInstance);
	}
	
	public function CreateInfraToolsTechInfo()
	{
		if (!class_exists("TechInfo"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "TechInfo.php"))
				include_once(BASE_PATH_PHP_MODEL . "TechInfo.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class TechInfo');
		}
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTechInfo.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsTechInfo');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsTechInfo.php");
		return InfraToolsTechInfo::__create();
	}
	
	public function CreateInfraToolsTicket()
	{
		if (!class_exists("Ticket"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "Ticket.php"))
				include_once(BASE_PATH_PHP_MODEL . "Ticket.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class Ticket');
		}
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTicket.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsTicket');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsTicket.php");
		return new InfraToolsTicket();
	}
	
	public function CreateInfraToolsTypeAssocUserService($RegisterDate, $TypeAssocUserServiceDescription, $TypeAssocUserServiceId)
	{
		if (!class_exists("InfraToolsTypeAssocUserService"))
		{
			if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTypeAssocUserService.php"))
				include_once(SITE_PATH_PHP_MODEL . "InfraToolsTypeAssocUserService.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsTypeAssocUserService');
		}
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTypeAssocUserService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsTypeAssocUserService');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsTypeAssocUserService.php");
		return new InfraToolsTypeAssocUserService($RegisterDate, $TypeAssocUserServiceDescription, $TypeAssocUserServiceId);
	}
	
	public function CreateInfraToolsTypeService($RegisterDate, $TypeServiceName, $TypeServiceSLA)
	{
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTypeService.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsTypeService');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsTypeService.php");
		return new InfraToolsTypeService($RegisterDate, $TypeServiceName, $TypeServiceSLA);
	}
	
	public function CreateInfraToolsTypeTimeMonitoring()
	{
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsTypeTimeMonitoring.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsTypeTimeMonitoring');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsTypeTimeMonitoring.php");
		return new InfraToolsTypeTimeMonitoring();
	}
	
	public function CreateInfraToolsUser($ArrayAssocUserTeam, $ArrayNotification, $AssocUserCorporation, 
								         $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $Email, 
								         $Gender, $HashCode, $Name, $Region, $RegisterDate, $SessionExpires, 
								         $TwoStepVerification, $UserActive, $UserConfirmed, 
								         $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
								         $UserTypeInstance, $UserUniqueId) 
	{
		if (!class_exists("User"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "User.php"))
				include_once(BASE_PATH_PHP_MODEL . "User.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class User');
		}
		if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsUser.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsUser');
		else include_once(SITE_PATH_PHP_MODEL . "InfraToolsUser.php");
		return new InfraToolsUser($ArrayAssocUserTeam, $ArrayNotification, $AssocUserCorporation, 
								  $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $Email, 
								  $Gender, $HashCode, $Name, $Region, $RegisterDate, $SessionExpires, 
								  $TwoStepVerification, $UserActive, $UserConfirmed, 
								  $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
								  $UserTypeInstance, $UserUniqueId); 
	}
	
	public function CreateLanguageDe()
	{
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "Language/De.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class De');
		else include_once(SITE_PATH_PHP_CONTROLLER . "Language/De.php");
		return De::__create();
	}
	
	public function CreateLanguageEn()
	{
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "Language/En.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class En');
		else include_once(SITE_PATH_PHP_CONTROLLER . "Language/En.php");
		return En::__create();
	}
	
	public function CreateLanguageEs()
	{
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "Language/Es.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class Es');
		else include_once(SITE_PATH_PHP_CONTROLLER . "Language/Es.php");
		return Es::__create();
	}
	
	public function CreateLanguagePt()
	{
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "Language/Pt.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class Pt');
		else include_once(SITE_PATH_PHP_CONTROLLER . "Language/Pt.php");
		return Pt::__create();
	}
	
	public function CreatePage($Page)
	{
		if($Page == str_replace("_", "",ConfigInfraTools::PAGE_ABOUT))
			return $this->CreatePageAbout();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ACCOUNT))
			return $this->CreatePageAccount();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN))
			return $this->CreatePageAdmin();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_CORPORATION))
			return $this->CreatePageAdminCorporation();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_COUNTRY))
			return $this->CreatePageAdminCountry();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_DEPARTMENT))
			return $this->CreatePageAdminDepartment();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_NOTIFICATION))
			return $this->CreatePageAdminNotification();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_SERVICE))
			return $this->CreatePageAdminService();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TEAM))
			return $this->CreatePageAdminTeam();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TECH_INFO))
			return $this->CreatePageAdminTechInfo();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TICKET))
			return $this->CreatePageAdminTicket();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM))
			return $this->CreatePageAdminTypeAssocUserTeam();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING))
			return $this->CreatePageAdminTypeMonitoring();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE))
			return $this->CreatePageAdminTypeService();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_MONITORING))
			return $this->CreatePageAdminTypeStatusMonitoring();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET))
			return $this->CreatePageAdminTypeStatusTicket();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET))
			return $this->CreatePageAdminTypeTicket();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_USER))
			return $this->CreatePageAdminTypeUser();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_USER))
			return $this->CreatePageAdminUser();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_CHECK))
			return $this->CreatePageCheck();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_CONTACT))
			return $this->CreatePageContact();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_CORPORATION))
			return $this->CreatePageCorporation();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_DIAGNOSTIC_TOOLS))
			return $this->CreatePageDiagnosticTools();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_GET))
			return $this->CreatePageGet();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_INSTALL))
			return $this->CreatePageInstall();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_HOME))
			return $this->CreatePageHome();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_LOGIN))
			return $this->CreatePageLogin();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_NOTIFICATION))
			return $this->CreatePageNotification();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_PASSWORD_RECOVERY))
			return $this->CreatePagePasswordRecovery();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_PASSWORD_RESET))
			return $this->CreatePagePasswordReset();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_REGISTER))
			return $this->CreatePageRegister();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_REGISTER_CONFIRMATION))
			return $this->CreatePageRegisterConfirmation();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_RESEND_CONFIRMATION_LINK))
			return $this->CreatePageResendConfirmationLink();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE))
			return $this->CreatePageService();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST))
			return $this->CreatePageServiceList();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_CORPORATION))
			return $this->CreatePageServiceListByCorporation();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_DEPARTMENT))
			return $this->CreatePageServiceListByDepartment();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE))
			return $this->CreatePageServiceListByTypeAssocUserService();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_TYPE_SERVICE))
			return $this->CreatePageServiceListByTypeService();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_USER))
			return $this->CreatePageServiceListByUser();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_REGISTER))
			return $this->CreatePageServiceRegister();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_SELECT))
			return $this->CreatePageServiceSelect();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_VIEW))
			return $this->CreatePageServiceView();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SUPPORT))
			return $this->CreatePageSupport();
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_TEAM))
			return $this->CreatePageTeam();
		else return $this->CreatePageNotFound();
	}
	
	private function CreatePageAbout()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAbout();
	}
	
	private function CreatePageAccount()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAccount();
	}
	
	private function CreatePageAdmin()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdmin();
	}
	
	private function CreatePageAdminCorporation()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminCorporation();
	}
	
	private function CreatePageAdminCountry()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return PageAdminCountry::__create();
	}
	
	private function CreatePageAdminDepartment()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminDepartment();
	}
	
	private function CreatePageAdminNotification()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminNotification();
	}
	
	private function CreatePageAdminService()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminService();
	}
	
	private function CreatePageAdminTeam()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTeam();
	}
	
	private function CreatePageAdminTechInfo()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTechInfo();
	}
	
	private function CreatePageAdminTicket()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTicket();
	}
	
	private function CreatePageAdminTypeAssocUserTeam()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTypeAssocUserTeam();	
	}
	
	private function CreatePageAdminTypeMonitoring()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTypeMonitoring();
	}
	
	private function CreatePageAdminTypeService()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTypeService();
	}
	
	private function CreatePageAdminTypeStatusMonitoring()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTypeStatusMonitoring();
	}
	
	private function CreatePageAdminTypeStatusTicket()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTypeStatusTicket();
	}
	
	private function CreatePageAdminTypeTicket()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTypeTicket();
	}
	
	private function CreatePageAdminTypeUser()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminTypeUser();
	}
	
	private function CreatePageAdminUser()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageAdminUser();
	}
	
	private function CreatePageCheck()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageCheck();
	}
	
	private function CreatePageContact()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageContact();
	}
	
	private function CreatePageCorporation()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageCorporation();
	}
	
	private function CreatePageDiagnosticTools()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageDiagnosticTools();
	}
	
	private function CreatePageGet()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageGet();
	}
	
	private function CreatePageInstall()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return PageInstall::__create();
	}
	
	private function CreatePageHome()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return PageHome::__create();
	}
	
	private function CreatePageLogin()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageLogin();
	}
	
	private function CreatePageNotFound()
	{
		if(!file_exists(SITE_PATH_PHP_VIEW . "PageNotFound.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class PageNotFound');
		else include_once(SITE_PATH_PHP_VIEW . "PageNotFound.php");	
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return PageNotFound::__create();
	}
	
	private function CreatePageNotification()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageNotification();
	}
	
	private function CreatePagePasswordRecovery()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PagePasswordRecovery();
	}
	
	private function CreatePagePasswordReset()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PagePasswordReset();
	}
	
	private function CreatePageRegister()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageRegister();
	}
	
	private function CreatePageRegisterConfirmation()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageRegisterConfirmation();
	}
	
	private function CreatePageResendConfirmationLink()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageResendConfirmationLink();
	}
	
	private function CreatePageService()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageService();
	}
	
	private function CreatePageServiceList()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageServiceList();
	}
	
	private function CreatePageServiceListByCorporation()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageServiceListByCorporation();
	}
	
	private function CreatePageServiceListByDepartment()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageServiceListByDepartment();
	}
	
	private function CreatePageServiceListByTypeAssocUserService()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageServiceListByTypeAssocUserService();
	}
	
	private function CreatePageServiceListByTypeService()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageServiceListByTypeService();
	}
	
	private function CreatePageServiceListByUser()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageServiceListByUser();
	}
	
	private function CreatePageServiceRegister()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageServiceRegister();
	}
	
	private function CreatePageServiceSelect()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageServiceSelect();
	}
	
	private function CreatePageServiceView()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageServiceView();
	}
	
	private function CreatePageSupport()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageSupport();
	}
	
	private function CreatePageTeam()
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return new PageTeam();
	}
}
?>