<?php

/************************************************************************
Class: Language
Creation: 17/03/2015
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe que contem métodos de páginas padrões que devem ser implementados
Functions: 
			abstract protected function GetLanguageInstance($Language);
			abstract public function GetPageName($Page);
			abstract public function GetPageRobots($Page);
			abstract public function GetPageTitle($Page);
			abstract public function GetText($Constant);
Updates:
	
**************************************************************************/
if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

abstract class Language
{
	/* Instances */
	protected static $Instance             = NULL;
	protected        $Factory              = NULL;
	protected        $InstanceLanguageText = NULL;
	
	
	/**                               **/
	/************* METODOS *************/
	/**                               **/
	
	abstract protected function GetLanguageInstance($Language);
	abstract public    function GetPageName($Page);
	abstract public    function GetPageRobots($Page);
	abstract public    function GetPageTitle($Page);
	abstract public    function GetText($Constant);
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
	}
	
	/* Singleton */
	public static function __create($Config, $Language)
    {
        if (!isset(self::$Instance)) 
		{
            echo "Language: Error! Not allowed to create a Base Language. Must create LanguageText from the site";  
			exit();
        }
		else return self::$Instance;
	}
}
?>