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
								                 $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, 
         								         $Gender, $HashCode, $UserName, $Region, $RegisterDate, $SessionExpires, 
								                 $TwoStepVerification, $UserActive, $UserConfirmed, 
								                 $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
  								                 $UserTypeInstance, $UserUniqueId);
			public function CreateLanguageDe();
			public function CreateLanguageEn();
			public function CreateLanguageEs();
			public function CreateLanguagePt();
			public function CreatePage($Page);
			private function CreatePageAbout($Language);
			private function CreatePageAccount($Language);
			private function CreatePageAdmin($Language);
			private function CreatePageAdminCorporation($Language);
			private function CreatePageAdminCountry($Language);
			private function CreatePageAdminDepartment($Language);
			private function CreatePageAdminNofication($Language);
			private function CreatePageAdminService($Language);
			private function CreatePageAdminTeam($Language);
			private function CreatePageAdminTechInfo($Language);
			private function CreatePageAdminTicket($Language);
			private function CreatePageAdminTypeAssocUserTeam($Language)
			private function CreatePageAdminTypeMonitoring($Language);
			private function CreatePageAdminTypeService($Language);
			private function CreatePageAdminTypeStatusMonitoring($Language);
			private function CreatePageAdminTypeStatusTicket($Language);
			private function CreatePageAdminTypeTicket($Language);
			private function CreatePageAdminTypeUser($Language);
			private function CreatePageAdminUser($Language);
			private function CreatePageCheck($Language);
			private function CreatePageContact($Language);
			private function CreatePageCorporation($Language);
			private function CreatePageDiagnosticTools($Language);
			private function CreatePageGet($Language);
			private function CreatePageHome($Language);
			private function CreatePageInstall($Language);
			private function CreatePageLogin($Language);
			private function CreatePageNotFound($Language);
			private function CreatePageNotification($Language);
			private function CreatePagePasswordRecovery($Language);
			private function CreatePagePasswordReset($Language);
			private function CreatePageRegister($Language);
			private function CreatePageRegisterConfirmation($Language);
			private function CreatePageResendConfirmationLink($Language);
			private function CreatePageService($Language);
			private function CreatePageServiceList($Language);
			private function CreatePageServiceListByCorporation($Language);
			private function CreatePageServiceListByDepartment($Language);
			private function CreatePageServiceListByTypeAssocUserService($Language);
			private function CreatePageServiceListByTypeService($Language);
			private function CreatePageServiceListByUser($Language);
			private function CreatePageServiceRegister($Language);
			private function CreatePageServiceSelect($Language);
			private function CreatePageServiceView($Language);
			private function CreatePageSupport($Language);
			private function CreatePageTeam($Language);
**************************************************************************/

/* SITE PATH CONSTANTS */
if (file_exists("Php"))
{
	include_once("../ProjectConfig.php");
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
	include_once("../../ProjectConfig.php");
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
	include_once("../../../ProjectConfig.php");
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
	
	/* Create */
	public static function __create()
    {
        if (!isset(self::$Instance) || strcmp(get_class(self::$Instance), __CLASS__) != 0) 
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
		if(!file_exists(BASE_PATH_PHP_MODEL . "Network.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class Network');
		else include_once(BASE_PATH_PHP_MODEL . "Network.php");
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
								         $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, 
								         $Gender, $HashCode, $UserName, $Region, $RegisterDate, $SessionExpires, 
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
								  $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, 
								  $Gender, $HashCode, $UserName, $Region, $RegisterDate, $SessionExpires, 
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
	
	public function CreatePage($Page, $Language)
	{
		if($Page == str_replace("_", "",ConfigInfraTools::PAGE_ABOUT))
			return $this->CreatePageAbout($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ACCOUNT))
			return $this->CreatePageAccount($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN))
			return $this->CreatePageAdmin($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_CORPORATION))
			return $this->CreatePageAdminCorporation($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_COUNTRY))
			return $this->CreatePageAdminCountry($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_DEPARTMENT))
			return $this->CreatePageAdminDepartment($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_NOTIFICATION))
			return $this->CreatePageAdminNotification($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_SERVICE))
			return $this->CreatePageAdminService($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TEAM))
			return $this->CreatePageAdminTeam($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TECH_INFO))
			return $this->CreatePageAdminTechInfo($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TICKET))
			return $this->CreatePageAdminTicket($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM))
			return $this->CreatePageAdminTypeAssocUserTeam($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING))
			return $this->CreatePageAdminTypeMonitoring($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE))
			return $this->CreatePageAdminTypeService($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_MONITORING))
			return $this->CreatePageAdminTypeStatusMonitoring($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET))
			return $this->CreatePageAdminTypeStatusTicket($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET))
			return $this->CreatePageAdminTypeTicket($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_TYPE_USER))
			return $this->CreatePageAdminTypeUser($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_ADMIN_USER))
			return $this->CreatePageAdminUser($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_CHECK))
			return $this->CreatePageCheck($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_CONTACT))
			return $this->CreatePageContact($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_CORPORATION))
			return $this->CreatePageCorporation($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_DIAGNOSTIC_TOOLS))
			return $this->CreatePageDiagnosticTools($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_GET))
			return $this->CreatePageGet($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_INSTALL))
			return $this->CreatePageInstall($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_HOME))
			return $this->CreatePageHome($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_LOGIN))
			return $this->CreatePageLogin($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_NOTIFICATION))
			return $this->CreatePageNotification($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_PASSWORD_RECOVERY))
			return $this->CreatePagePasswordRecovery($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_PASSWORD_RESET))
			return $this->CreatePagePasswordReset($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_REGISTER))
			return $this->CreatePageRegister($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_REGISTER_CONFIRMATION))
			return $this->CreatePageRegisterConfirmation($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_RESEND_CONFIRMATION_LINK))
			return $this->CreatePageResendConfirmationLink($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE))
			return $this->CreatePageService($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST))
			return $this->CreatePageServiceList($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_CORPORATION))
			return $this->CreatePageServiceListByCorporation($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_DEPARTMENT))
			return $this->CreatePageServiceListByDepartment($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE))
			return $this->CreatePageServiceListByTypeAssocUserService($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_TYPE_SERVICE))
			return $this->CreatePageServiceListByTypeService($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_LIST_BY_USER))
			return $this->CreatePageServiceListByUser($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_REGISTER))
			return $this->CreatePageServiceRegister($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_SELECT))
			return $this->CreatePageServiceSelect($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SERVICE_VIEW))
			return $this->CreatePageServiceView($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_SUPPORT))
			return $this->CreatePageSupport($Language);
		elseif($Page == str_replace("_", "",ConfigInfraTools::PAGE_TEAM))
			return $this->CreatePageTeam($Language);
		else return $this->CreatePageNotFound($Language);
	}
	
	private function CreatePageAbout($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(PageAbout::__create($Language));
	}
	
	private function CreatePageAccount($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAccount($Language));
	}
	
	private function CreatePageAdmin($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdmin($Language));
	}
	
	private function CreatePageAdminCorporation($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminCorporation($Language));
	}
	
	private function CreatePageAdminCountry($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminCountry($Language));
	}
	
	private function CreatePageAdminDepartment($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminDepartment($Language));
	}
	
	private function CreatePageAdminNotification($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminNotification($Language));
	}
	
	private function CreatePageAdminService($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminService($Language));
	}
	
	private function CreatePageAdminTeam($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTeam($Language));
	}
	
	private function CreatePageAdminTechInfo($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTechInfo($Language));
	}
	
	private function CreatePageAdminTicket($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTicket($Language));
	}
	
	private function CreatePageAdminTypeAssocUserTeam($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTypeAssocUserTeam($Language));
	}
	
	private function CreatePageAdminTypeMonitoring($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTypeMonitoring());
	}
	
	private function CreatePageAdminTypeService($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTypeService($Language));
	}
	
	private function CreatePageAdminTypeStatusMonitoring($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTypeStatusMonitoring($Language));
	}
	
	private function CreatePageAdminTypeStatusTicket($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTypeStatusTicket($Language));
	}
	
	private function CreatePageAdminTypeTicket($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTypeTicket($Language));
	}
	
	private function CreatePageAdminTypeUser($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminTypeUser($Language));
	}
	
	private function CreatePageAdminUser($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageAdminUser($Language));
	}
	
	private function CreatePageCheck($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageCheck($Language));
	}
	
	private function CreatePageContact($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageContact($Language));
	}
	
	private function CreatePageCorporation($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageCorporation($Language));
	}
	
	private function CreatePageDiagnosticTools($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageDiagnosticTools($Language));
	}
	
	private function CreatePageGet($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageGet($Language));
	}
	
	private function CreatePageInstall($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(PageInstall::__create($Language));
	}
	
	private function CreatePageHome($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(PageHome::__create($Language));
	}
	
	private function CreatePageLogin($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageLogin($Language));
	}
	
	private function CreatePageNotFound($Language)
	{
		if(!file_exists(SITE_PATH_PHP_VIEW . "PageNotFound.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class PageNotFound');
		else include_once(SITE_PATH_PHP_VIEW . "PageNotFound.php");	
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(PageNotFound::__create($Language));
	}
	
	private function CreatePageNotification($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageNotification($Language));
	}
	
	private function CreatePagePasswordRecovery($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PagePasswordRecovery($Language));
	}
	
	private function CreatePagePasswordReset($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PagePasswordReset($Language));
	}
	
	private function CreatePageRegister($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageRegister($Language));
	}
	
	private function CreatePageRegisterConfirmation($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageRegisterConfirmation($Language));
	}
	
	private function CreatePageResendConfirmationLink($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageResendConfirmationLink($Language));
	}
	
	private function CreatePageService($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageService($Language));
	}
	
	private function CreatePageServiceList($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageServiceList($Language));
	}
	
	private function CreatePageServiceListByCorporation($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageServiceListByCorporation($Language));
	}
	
	private function CreatePageServiceListByDepartment($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageServiceListByDepartment($Language));
	}
	
	private function CreatePageServiceListByTypeAssocUserService($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageServiceListByTypeAssocUserService($Language));
	}
	
	private function CreatePageServiceListByTypeService($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageServiceListByTypeService($Language));
	}
	
	private function CreatePageServiceListByUser($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageServiceListByUser($Language));
	}
	
	private function CreatePageServiceRegister($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageServiceRegister($Language));
	}
	
	private function CreatePageServiceSelect($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageServiceSelect($Language));
	}
	
	private function CreatePageServiceView($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageServiceView($Language));
	}
	
	private function CreatePageSupport($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageSupport($Language));
	}
	
	private function CreatePageTeam($Language)
	{
		if(!file_exists(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading API Class MobileDetect');
		else include_once(BASE_PATH_PHP . "API/MobileDetect/MobileDetect.php");	
		return $this->LoadPage(new PageTeam($Language));
	}
}
?>