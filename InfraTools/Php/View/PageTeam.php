<?php
/************************************************************************
Class: PageTeam.php
Creation: 2018/06/04
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class that manages teams.
Functions: 
			protected function BuildSmartyTags()
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

class PageTeam extends PageInfraTools
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
		parent::__construct($Config, $Language, $Page);
	}

	protected function BuildSmartyTags()
	{
		if(parent::BuildSmartyTags() == ConfigInfraTools::RET_OK)
		{
			$this->Smarty->assign('HREF_PAGE_TEAM_LST', $this->InstanceLanguageText->GetText('HREF_PAGE_TEAM_LST'));
			$this->Smarty->assign('HREF_PAGE_TEAM_REGISTER', $this->InstanceLanguageText->GetText('HREF_PAGE_TEAM_REGISTER'));
			$this->Smarty->assign('HREF_PAGE_TEAM_SEL', $this->InstanceLanguageText->GetText('HREF_PAGE_TEAM_SEL'));
			$this->Smarty->assign('ICON_INFRATOOLS_TEAM', $this->Config->DefaultServerImage. 'Icons/IconInfraToolsTeam136x90.png');
			$this->Smarty->assign('OPERATION_LST', $this->InstanceLanguageText->GetText('OPERATION_LST'));
			$this->Smarty->assign('OPERATION_REGISTER', $this->InstanceLanguageText->GetText('OPERATION_REGISTER'));
			$this->Smarty->assign('OPERATION_SEARCH', $this->InstanceLanguageText->GetText('OPERATION_SEARCH'));
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;
	}

	public function LoadPage()
	{
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>