<?php
/************************************************************************
Class: PageAdmin.php
Creation: 2016/06/30
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class that opens the main admin page, also serving for methods used on admin pages.
Functions: 
			protected function AdminGoBack(&$PageFormBack);
			protected function BuildSmartyTags();
			public    function LoadPage();
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}


class PageAdmin extends PageInfraTools
{	
	public $InputLimitOne                                                = NULL;
	public $InputLimitTwo                                                = NULL;
	public $ArrayInstanceInfraToolsCorporation                           = "";
	public $ArrayInstanceInfraToolsTypeUser                              = "";
	public $InstanceInfraToolsTypeUser                                   = "";

	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		$this->Page = $Page;
		$this->PageCheckLogin = TRUE;
		parent::__construct($Config, $Language, $Page);
		if($this->User != NULL)
		{
			if(!$this->User->CheckSuperUser())
				$this->PageEnabled = FALSE;
		}
		else $this->PageEnabled = FALSE;
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_HOME));
		}
	}
	
	protected function AdminGoBack(&$PageFormBack)
	{
		//FORM SUBMIT BACK
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_SB_BACK) == ConfigInfraTools::RET_OK)
		{
			if($this->PageStackSessionLoad() == ConfigInfraTools::RET_ERROR)
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								            . str_replace("_","",ConfigInfraTools::PAGE_ADMIN));
			}
			$PageFormBack = TRUE;
		}
	}
	
	protected function BuildSmartyTags()
	{
		if(parent::BuildSmartyTags() == ConfigInfraTools::RET_OK)
		{
			$this->Smarty->assign('CURRENT_PAGE', ConfigInfraTools::PAGE_ADMIN);
			$this->Smarty->assign('FM_CORPORATION_VIEW', ConfigInfraTools::FM_CORPORATION_VIEW);
			$this->Smarty->assign('FM_DEPARTMENT_VIEW', ConfigInfraTools::FM_DEPARTMENT_VIEW);
			$this->Smarty->assign('FM_TEAM_VIEW', ConfigInfraTools::FM_TEAM_VIEW);
			$this->Smarty->assign('FM_TYPE_USER_VIEW', ConfigInfraTools::FM_TYPE_USER_VIEW);
			$this->Smarty->assign('FM_USER_VIEW', ConfigInfraTools::FM_USER_VIEW);
			$this->Smarty->assign('FM_SB_BACK', ConfigInfraTools::FM_SB_BACK);
			$this->Smarty->assign('HREF_PAGE_ADMIN', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN'));
			$this->Smarty->assign('ICON_INFRATOOLS_ADMIN_48x48', $this->Config->DefaultServerImage.'Icons/IconInfraToolsAdmin48x48.png');
			$this->Smarty->assign('ICON_INFRATOOLS_ADMIN_48x48_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsAdmin48x48Hover.png');
			$this->Smarty->assign('ICON_INFRATOOLS_ARROW_BACK', $this->Config->DefaultServerImage.'Icons/IconInfraToolsArrowBack.png');
			$this->Smarty->assign('ICON_INFRATOOLS_ARROW_BACK_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsArrowBackHover.png');
			$this->Smarty->assign('PAGE_ADMIN', $this->InstanceLanguageText->GetText('PAGE_ADMIN'));
			$this->Smarty->assign('SUBMIT_BACK', $this->InstanceLanguageText->GetText('SUBMIT_BACK'));
			$this->Smarty->assign('SUBMIT_LST', $this->InstanceLanguageText->GetText('SUBMIT_LST'));
			$this->Smarty->assign('SUBMIT_INSERT', $this->InstanceLanguageText->GetText('SUBMIT_INSERT'));
			$this->Smarty->assign('SUBMIT_SEL', $this->InstanceLanguageText->GetText('SUBMIT_SEL'));
			if(isset($this->ReturnCorporationNameClass)) 
				$this->Smarty->assign('RETURN_CORPORATION_NAME_CLASS', $this->ReturnCorporationNameClass);
			else $this->Smarty->assign('RETURN_CORPORATION_NAME_CLASS', NULL);
			if(isset($this->ReturnCorporationNameText)) 
				$this->Smarty->assign('RETURN_CORPORATION_NAME_TEXT', $this->ReturnCorporationNameText);
			else $this->Smarty->assign('RETURN_CORPORATION_NAME_TEXT', NULL);
			if(isset($this->ReturnDepartmentNameClass)) 
				$this->Smarty->assign('RETURN_DEPARTMENT_NAME_CLASS', $this->ReturnDepartmentNameClass);
			else $this->Smarty->assign('RETURN_DEPARTMENT_NAME_CLASS', NULL);
			if(isset($this->ReturnDepartmentNameText)) 
				$this->Smarty->assign('RETURN_DEPARTMENT_NAME_TEXT', $this->ReturnDepartmentNameText);
			else $this->Smarty->assign('RETURN_DEPARTMENT_NAME_TEXT', NULL);
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;
	}

	public function LoadPage()
	{
		$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_PAGE_SACK);
		$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_PAGE_STACK_NUMBER);
		$this->Smarty->assign('ADMIN_TEXT_COUNTRY', $this->InstanceLanguageText->GetText('ADMIN_TEXT_COUNTRY'));
		$this->Smarty->assign('ADMIN_TEXT_CORPORATION', $this->InstanceLanguageText->GetText('ADMIN_TEXT_CORPORATION'));	
		$this->Smarty->assign('ADMIN_TEXT_DEPARTMENT', $this->InstanceLanguageText->GetText('ADMIN_TEXT_DEPARTMENT'));	
		$this->Smarty->assign('ADMIN_TEXT_TYPE_USER', $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_USER'));	
		$this->Smarty->assign('ADMIN_TEXT_USER', $this->InstanceLanguageText->GetText('ADMIN_TEXT_USER'));
		$this->Smarty->assign('ADMIN_TEXT_TYPE_ASSOC_USER_TEAM', $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_ASSOC_USER_TEAM'));	
		$this->Smarty->assign('ADMIN_TEXT_TEAM', $this->InstanceLanguageText->GetText('ADMIN_TEXT_TEAM'));	
		$this->Smarty->assign('ADMIN_TEXT_TYPE_TICKET', $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_TICKET'));	
		$this->Smarty->assign('ADMIN_TEXT_TYPE_STATUS_TICKET', $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_STATUS_TICKET'));	
		$this->Smarty->assign('ADMIN_TEXT_TICKET', $this->InstanceLanguageText->GetText('ADMIN_TEXT_TICKET'));	
		$this->Smarty->assign('ADMIN_TEXT_TYPE_SERVICE', $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_SERVICE'));
		$this->Smarty->assign('ADMIN_TEXT_SERVICE', $this->InstanceLanguageText->GetText('ADMIN_TEXT_SERVICE'));
		$this->Smarty->assign('ADMIN_TEXT_IP_ADDRESS', $this->InstanceLanguageText->GetText('ADMIN_TEXT_IP_ADDRESS'));
		$this->Smarty->assign('ADMIN_TEXT_NOTIFICATION', $this->InstanceLanguageText->GetText('ADMIN_TEXT_NOTIFICATION'));
		$this->Smarty->assign('ADMIN_TEXT_SYSTEM_CONFIGURATION', $this->InstanceLanguageText->GetText('ADMIN_TEXT_SYSTEM_CONFIGURATION'));
		$this->Smarty->assign('ADMIN_TEXT_TECH_INFO', $this->InstanceLanguageText->GetText('ADMIN_TEXT_TECH_INFO'));
		$this->Smarty->assign('ADMIN_TEXT_INSTALL', $this->InstanceLanguageText->GetText('ADMIN_TEXT_INSTALL'));
		$this->Smarty->assign('HREF_PAGE_ADMIN_COUNTRY', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_COUNTRY'));
		$this->Smarty->assign('HREF_PAGE_ADMIN_CORPORATION', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_CORPORATION'));	
		$this->Smarty->assign('HREF_PAGE_ADMIN_DEPARTMENT', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_DEPARTMENT'));	
		$this->Smarty->assign('HREF_PAGE_ADMIN_TYPE_USER', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_USER'));	
		$this->Smarty->assign('HREF_PAGE_ADMIN_USER', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_USER'));
		$this->Smarty->assign('HREF_PAGE_ADMIN_TYPE_ASSOC_USER_TEAM', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_ASSOC_USER_TEAM'));	
		$this->Smarty->assign('HREF_PAGE_ADMIN_TEAM', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TEAM'));	
		$this->Smarty->assign('HREF_PAGE_ADMIN_TYPE_TICKET', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_TICKET'));	
		$this->Smarty->assign('HREF_PAGE_ADMIN_TYPE_STATUS_TICKET', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_STATUS_TICKET'));	
		$this->Smarty->assign('HREF_PAGE_ADMIN_TICKET', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TICKET'));	
		$this->Smarty->assign('HREF_PAGE_ADMIN_TYPE_SERVICE', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_SERVICE'));
		$this->Smarty->assign('HREF_PAGE_ADMIN_SERVICE', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_SERVICE'));
		$this->Smarty->assign('HREF_PAGE_ADMIN_IP_ADDRESS', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_IP_ADDRESS'));
		$this->Smarty->assign('HREF_PAGE_ADMIN_NOTIFICATION', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_NOTIFICATION'));
		$this->Smarty->assign('HREF_PAGE_ADMIN_SYSTEM_CONFIGURATION', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_SYSTEM_CONFIGURATION'));
		$this->Smarty->assign('HREF_PAGE_ADMIN_TECH_INFO', $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TECH_INFO'));
		$this->Smarty->assign('HREF_PAGE_INSTALL', $this->InstanceLanguageText->GetText('HREF_PAGE_INSTALL'));
		$this->Smarty->assign('ICON_INFRATOOLS_ADMIN', $this->Config->DefaultServerImage.'Icons/IconInfraToolsAdmin100x100.png');	
		$this->Smarty->assign('ICON_INFRATOOLS_COUNTRY', $this->Config->DefaultServerImage.'Icons/IconInfraToolsWorld48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_COUNTRY_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsWorld48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_CORPORATION', $this->Config->DefaultServerImage.'Icons/IconInfraToolsCorporation48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_CORPORATION_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsCorporation48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_DEPARTMENT', $this->Config->DefaultServerImage.'Icons/IconInfraToolsDepartment48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_DEPARTMENT_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsDepartment48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_USER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeUser48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_USER_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeUser48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_USER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsUser48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_USER_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsUser48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_ASSOC_USER_TEAM', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeAssocUserTeam48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_ASSOC_USER_TEAM_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeAssocUserTeam48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TEAM', $this->Config->DefaultServerImage.'Icons/IconInfraToolsUsers48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TEAM_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsUsers48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_TICKET', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeTicket48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_TICKET_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeTicket48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_STATUS_TICKET', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeStatusTicket48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_STATUS_TICKET_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeStatusTicket48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TICKET', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTicket48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TICKET_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTicket48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_SERVICE', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeService48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TYPE_SERIVCE_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeService48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_SERVICE', $this->Config->DefaultServerImage.'Icons/IconInfraToolsService48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_SERVICE_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsService48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_IP_ADDRESS', $this->Config->DefaultServerImage.'Icons/IconInfraToolsIpAddress48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_IP_ADDRESS_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsIpAddress48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_NOTIFICATION', $this->Config->DefaultServerImage.'Icons/IconInfraToolsNotification48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_NOTIFICATION_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsNotification48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_SYSTEM_CONFIGURATION', $this->Config->DefaultServerImage.'Icons/IconInfraToolsSystemPreferences48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_SYSTEM_CONFIGURATION_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsSystemPreferences48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TECH_INFO', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTechInfo48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_TECH_INFO_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsTechInfo48x48Hover.png');
		$this->Smarty->assign('ICON_INFRATOOLS_INSTALL', $this->Config->DefaultServerImage.'Icons/IconInfraToolsInstall48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_INSTALL_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsInstall48x48Hover.png');
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	} 
}
?>