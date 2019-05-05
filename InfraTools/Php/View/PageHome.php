<?php
/************************************************************************
Class: PageHome.php
Creation: 2016/09/30
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for displaying the home page. 
Functions: 
			public    function LoadPage();
			
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("InfraToolsFacedePersistence"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistence.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistence');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageHome extends PageInfraTools
{	
	protected $LinkPageInstallEnabled = FALSE;
	
	/* Singleton */
	protected static $Instance;

	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		if (!isset(self::$Instance)) 
		{
			$class = __CLASS__;
			self::$Instance = new $class($Config, $Language, $Page);
		}
		return self::$Instance;
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		$this->Page = $Page;
		$this->PageCheckLogin = FALSE;
		parent::__construct($Config, $Language, $Page);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	public function LoadPage()
	{
		$this->FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $this->FacedePersistenceInfraTools->InfraToolsDataBaseCheck($this->ArrayTables,
																			  $this->DataBaseReturnMessage,
																			  ConfigInfraTools::CHECKBOX_CHECKED);
		if($return != ConfigInfraTools::RET_OK)
			$this->LinkPageInstallEnabled = TRUE;
		$this->Smarty->assign('HREF_PAGE_CHECK', $this->InstanceLanguageText->GetText('HREF_PAGE_CHECK'));
		$this->Smarty->assign('ICON_INFRATOOLS_SEARCH', $this->Config->DefaultServerImage.'Icons/IconInfraToolsSearch48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_SEARCH_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsSearch48x48Hover.png');
		$this->Smarty->assign('HOME_CHECK_01', $this->InstanceLanguageText->GetText('HOME_CHECK_1'));
		$this->Smarty->assign('HOME_CHECK_02', $this->InstanceLanguageText->GetText('HOME_CHECK_2'));
		$this->Smarty->assign('HOME_CHECK_03', $this->InstanceLanguageText->GetText('HOME_CHECK_3'));
		$this->Smarty->assign('SUBMIT_GO', $this->InstanceLanguageText->GetText('SUBMIT_GO'));
		$this->Smarty->assign('HREF_PAGE_GET', $this->InstanceLanguageText->GetText('HREF_PAGE_GET'));
		$this->Smarty->assign('ICON_INFRATOOLS_REPORT', $this->Config->DefaultServerImage.'Icons/IconInfraToolsReport48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_REPORT_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsReport48x48Hover.png');
		$this->Smarty->assign('HOME_GET_01', $this->InstanceLanguageText->GetText('HOME_GET_1'));
		$this->Smarty->assign('HOME_GET_02', $this->InstanceLanguageText->GetText('HOME_GET_2'));
		$this->Smarty->assign('HOME_GET_03', $this->InstanceLanguageText->GetText('HOME_GET_3'));
		$this->Smarty->assign('HREF_PAGE_SERVICE', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE'));
		$this->Smarty->assign('ICON_INFRATOOLS_SERVICE', $this->Config->DefaultServerImage.'Icons/IconInfraToolsService48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_SERVICE_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsService48x48Hover.png');
		$this->Smarty->assign('HOME_CLOUD_01', $this->InstanceLanguageText->GetText('HOME_CLOUD_1'));
		$this->Smarty->assign('HOME_CLOUD_02', $this->InstanceLanguageText->GetText('HOME_CLOUD_2'));
		$this->Smarty->assign('HOME_CLOUD_03', $this->InstanceLanguageText->GetText('HOME_CLOUD_3'));
		$this->Smarty->assign('HREF_PAGE_INSTALL', $this->InstanceLanguageText->GetText('HREF_PAGE_INSTALL'));
		$this->Smarty->assign('ICON_INFRATOOLS_INSTALL', $this->Config->DefaultServerImage.'Icons/IconInfraToolsInstall48x48.png');
		$this->Smarty->assign('ICON_INFRATOOLS_INSTALL_HOVER', $this->Config->DefaultServerImage.'Icons/IconInfraToolsInstall48x48Hover.png');
		$this->Smarty->assign('HOME_INSTALL_01', $this->InstanceLanguageText->GetText('HOME_INSTALL_1'));
		$this->Smarty->assign('HOME_INSTALL_02', $this->InstanceLanguageText->GetText('HOME_INSTALL_2'));
		$this->Smarty->assign('HOME_INSTALL_03', $this->InstanceLanguageText->GetText('HOME_INSTALL_3'));
		$this->Smarty->assign('HOME_CERTIFICATION', $this->InstanceLanguageText->GetText('HOME_CERTIFICATION'));
		$this->Smarty->assign('ICON_W3C_HTML5', $this->Config->DefaultServerImage.'Icons/W3CHtml5.png');
		$this->Smarty->assign('ICON_W3C_HTML5_HOVER', $this->Config->DefaultServerImage.'Icons/W3CHtml5Hover.png');
		$this->Smarty->assign('ICON_W3C_CSS', $this->Config->DefaultServerImage.'Icons/W3CCssLevel3.png');
		$this->Smarty->assign('ICON_W3C_CSS_HOVER', $this->Config->DefaultServerImage.'Icons/W3CCssLevel3Hover.png');
		$this->Smarty->assign('ICON_ROBOTS', $this->Config->DefaultServerImage.'Icons/ValidRobots.png');
		$this->Smarty->assign('ICON_ROBOTS_HOVER', $this->Config->DefaultServerImage.'Icons/ValidRobotsHover.png');
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug, NULL, FALSE);
	}
}
?>