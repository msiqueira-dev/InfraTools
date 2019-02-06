<?php
/************************************************************************
Class: PageAbout.php
Creation: 30/09/2016
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
		$this->LoadHtml(FALSE);
	}
}
?>