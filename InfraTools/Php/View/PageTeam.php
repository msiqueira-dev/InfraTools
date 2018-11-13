<?php
/************************************************************************
Class: PageTeam.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Classe que trata da administração dos equipes.
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

class PageTeam extends PageInfraTools
{
	/* Singleton */
	protected static $Instance;
	
	/* __create */
	public static function __create($Page, $Language)
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class($Page, $Language);
        }
        return self::$Instance;
    }

	/* Constructor */
	protected function __construct($Page, $Language) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Page, $Language);
	}

	public function LoadPage()
	{
		$this->LoadHtml(TRUE);
	}
}
?>