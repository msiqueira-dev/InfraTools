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
		$this->Smarty->assign('IconInfraToolsSearch', $this->Config->DefaultServerImage.'Icons/IconInfraToolsSearch48x48.png');
		$this->Smarty->assign('IconInfraToolsSearchHover', $this->Config->DefaultServerImage.'Icons/IconInfraToolsSearch48x48Hover.png');
		$this->Smarty->assign('HomeCheck1', $this->InstanceLanguageText->GetText('HOME_CHECK_1'));
		$this->Smarty->assign('HomeCheck2', $this->InstanceLanguageText->GetText('HOME_CHECK_2'));
		$this->Smarty->assign('HomeCheck3', $this->InstanceLanguageText->GetText('HOME_CHECK_3'));
		$this->Smarty->assign('SubmitGo', $this->InstanceLanguageText->GetText('SUBMIT_GO'));
		$this->Smarty->assign('HREF_PAGE_GET', $this->InstanceLanguageText->GetText('HREF_PAGE_GET'));
		$this->Smarty->assign('IconInfraToolsReport', $this->Config->DefaultServerImage.'Icons/IconInfraToolsReport48x48.png');
		$this->Smarty->assign('IconInfraToolsReportHover', $this->Config->DefaultServerImage.'Icons/IconInfraToolsReport48x48Hover.png');
		$this->Smarty->assign('HomeGet1', $this->InstanceLanguageText->GetText('HOME_GET_1'));
		$this->Smarty->assign('HomeGet2', $this->InstanceLanguageText->GetText('HOME_GET_2'));
		$this->Smarty->assign('HomeGet3', $this->InstanceLanguageText->GetText('HOME_GET_3'));
		$this->Smarty->assign('HREF_PAGE_SERVICE', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE'));
		$this->Smarty->assign('IconInfraToolsService', $this->Config->DefaultServerImage.'Icons/IconInfraToolsService48x48.png');
		$this->Smarty->assign('IconInfraToolsServiceHover', $this->Config->DefaultServerImage.'Icons/IconInfraToolsService48x48Hover.png');
		$this->Smarty->assign('HomeCloud1', $this->InstanceLanguageText->GetText('HOME_CLOUD_1'));
		$this->Smarty->assign('HomeCloud2', $this->InstanceLanguageText->GetText('HOME_CLOUD_2'));
		$this->Smarty->assign('HomeCloud3', $this->InstanceLanguageText->GetText('HOME_CLOUD_3'));
		$this->Smarty->assign('HREF_PAGE_INSTALL', $this->InstanceLanguageText->GetText('HREF_PAGE_INSTALL'));
		$this->Smarty->assign('IconInfraToolsInstall', $this->Config->DefaultServerImage.'Icons/IconInfraToolsInstall48x48.png');
		$this->Smarty->assign('IconInfraToolsInstallHover', $this->Config->DefaultServerImage.'Icons/IconInfraToolsInstall48x48Hover.png');
		$this->Smarty->assign('HomeInstall1', $this->InstanceLanguageText->GetText('HOME_INSTALL_1'));
		$this->Smarty->assign('HomeInstall2', $this->InstanceLanguageText->GetText('HOME_INSTALL_2'));
		$this->Smarty->assign('HomeInstall3', $this->InstanceLanguageText->GetText('HOME_INSTALL_3'));
		$this->Smarty->assign('HOME_CERTIFICATION', $this->InstanceLanguageText->GetText('HOME_CERTIFICATION'));
		$this->Smarty->assign('IconW3CHtml5', $this->Config->DefaultServerImage.'Icons/W3CHtml5.png');
		$this->Smarty->assign('IconW3CHtml5Hover', $this->Config->DefaultServerImage.'Icons/W3CHtml5Hover.png');
		$this->Smarty->assign('IconW3CCss', $this->Config->DefaultServerImage.'Icons/W3CCssLevel3.png');
		$this->Smarty->assign('IconW3CCssHover', $this->Config->DefaultServerImage.'Icons/W3CCssLevel3Hover.png');
		$this->Smarty->assign('IconRobots', $this->Config->DefaultServerImage.'Icons/ValidRobots.png');
		$this->Smarty->assign('IconRobotsHover', $this->Config->DefaultServerImage.'Icons/ValidRobotsHover.png');
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>