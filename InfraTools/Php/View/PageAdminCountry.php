<?php
/************************************************************************
Class: PageAdminCountry.php
Creation: 2016/09/30
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for countries management.
Functions: 
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}

class PageAdminCountry extends PageAdmin
{
	public $ArrayInstanceCountry = NULL;
	
	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		parent::__construct($Config, $Language, $Page);
	}
	
	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_COUNTRY_LST;
		$this->AdminGoBack($PageFormBack);
		
		if(empty($_POST))
			$_POST = array(ConfigInfraTools::FM_COUNTRY_LST => ConfigInfraTools::FM_COUNTRY_LST) + $_POST;
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_COUNTRY_LST) != ConfigInfraTools::RET_OK &&
			   $this->CheckPostContainsKey(ConfigInfraTools::FM_COUNTRY_LST_BACK) != ConfigInfraTools::RET_OK &&
			   $this->CheckPostContainsKey(ConfigInfraTools::FM_COUNTRY_LST_FORWARD) != ConfigInfraTools::RET_OK)
			$_POST = array(ConfigInfraTools::FM_COUNTRY_LST => ConfigInfraTools::FM_COUNTRY_LST) + $_POST;
		$this->ExecuteFunction($_POST, 'CountrySelect', array(&$this->ArrayInstanceCountry), $this->InputValueHeaderDebug);
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>