<?php
/************************************************************************
Class: PageService.php
Creation: 2018/06/04
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class that treats the main page of service module.
Functions: 
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

class PageService extends PageInfraTools
{	
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
		$this->PageCheckLogin = TRUE;
		parent::__construct($Config, $Language, $Page);
		$this->InputValueFormMethod = "GET";
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	protected function BuildSmartyTags()
	{
		if(parent::BuildSmartyTags() == ConfigInfraTools::RET_OK)
		{
			$this->Smarty->assign('ICON_INFRATOOLS_SERVICE', $this->Config->DefaultServerImage. 'Icons/IconInfraToolsService136x96.png');
			$this->Smarty->assign('HREF_PAGE_SERVICE_ASSOCIATE_IP_ADDRESS', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_ASSOCIATE_IP_ADDRESS'));
			$this->Smarty->assign('HREF_PAGE_SERVICE_LST', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST'));
			$this->Smarty->assign('HREF_PAGE_SERVICE_LST_BY_CORPORATION', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_CORPORATION'));
			$this->Smarty->assign('HREF_PAGE_SERVICE_LST_BY_DEPARTMENT', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_DEPARTMENT'));
			$this->Smarty->assign('HREF_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE'));
			$this->Smarty->assign('HREF_PAGE_SERVICE_LST_BY_TYPE_SERVICE', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_TYPE_SERVICE'));
			$this->Smarty->assign('HREF_PAGE_SERVICE_REGISTER', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_REGISTER'));
			$this->Smarty->assign('HREF_PAGE_SERVICE_SEL', $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_SEL'));
			$this->Smarty->assign('PAGE_SERVICE_ASSOCIATE_IP_ADDRESS', $this->InstanceLanguageText->GetText('PAGE_SERVICE_ASSOCIATE_IP_ADDRESS'));
			$this->Smarty->assign('PAGE_SERVICE_LST', $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST'));
			$this->Smarty->assign('PAGE_SERVICE_LST_BY_CORPORATION', $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST_BY_CORPORATION'));
			$this->Smarty->assign('PAGE_SERVICE_LST_BY_DEPARTMENT', $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST_BY_DEPARTMENT'));
			$this->Smarty->assign('PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE', $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE'));
			$this->Smarty->assign('PAGE_SERVICE_LST_BY_TYPE_SERVICE', $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST_BY_TYPE_SERVICE'));
			$this->Smarty->assign('PAGE_SERVICE_REGISTER', $this->InstanceLanguageText->GetText('PAGE_SERVICE_REGISTER'));
			$this->Smarty->assign('PAGE_SERVICE_SEL', $this->InstanceLanguageText->GetText('PAGE_SERVICE_SEL'));
		}
	}

	public function LoadPage()
	{
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>