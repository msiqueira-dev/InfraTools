<?php
/************************************************************************
Class: PageContact.php
Creation: 16/08/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			InfraTools - Php/Controller/InfraToolsFacedeBusiness.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for creating the database structure. 
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

class PageInstall extends PageInfraTools
{	
	protected $Install = NULL;
	
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
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = FALSE;
		parent::__construct($Config, $Language, $Page);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_HOME));
		}
	}

	public function LoadPage()
	{
		$this->FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $this->FacedePersistenceInfraTools->InfraToolsCheckDataBase($this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS || $return == Config::MYSQL_ERROR_DATABASE_NOT_FOUND || 
		   $return == Config::MYSQL_ERROR_TABLE_SYSTEM_CONFIGURATION_NOT_FOUND)
			$this->Install = TRUE;
		else $this->Install = FALSE;
		$this->LoadHtml(FALSE);
	}
}
?>