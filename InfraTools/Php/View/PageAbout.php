<?php
/************************************************************************
Class: PageAbout.php
Creation: 2016/09/30
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class that deals with the information of the system shown to the user such as details and external links.
Functions: 
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

class PageAbout extends PageInfraTools
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
	protected function __construct($Config, $Page, $Language) 
	{
		parent::__construct($Config, $Page, $Language);
	}

	public function LoadPage()
	{	
		if(!$this->PageEnabled) return ConfigInfraTools::RET_ERROR;
		$this->Smarty->assign('INFRATOOLS_GITHUB', 'InfraTools - GitHub');
		$this->Smarty->assign('INFRATOOLS_BLOGGER', 'InfraTools - Blogger');
		$this->Smarty->assign('LOGO_INFRATOOLS', $this->Config->DefaultServerImage.'Logos/LogoInfraTools-765x95WhiteBackground.png');
		$this->Smarty->assign('LOGO_GITHUB', $this->Config->DefaultServerImage.'Logos/LogoGitHub48x48.png');
		$this->Smarty->assign('LOGO_GITHUB_HOVER', $this->Config->DefaultServerImage.'Logos/LogoGitHub48x48Hover.png');
		$this->Smarty->assign('LOGO_BLOGGER', $this->Config->DefaultServerImage.'Logos/LogoBlogger48x48.png');
		$this->Smarty->assign('LOGO_BLOGGER_HOVER', $this->Config->DefaultServerImage.'Logos/LogoBlogger48x48Hover.png');
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>