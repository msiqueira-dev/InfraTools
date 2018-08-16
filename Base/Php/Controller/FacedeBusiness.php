<?php

/************************************************************************
Class: FacedeBusiness
Creation: 05/06/2018
Creator: Marcus Siqueira
Dependencies:
			Base - Php/Controller/Factory.php
			
Description: 
			Classe existente para tratamento do negócio utilizado pelas telas.
Methods: 
**************************************************************************/
if (!class_exists("Factory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Factory');
}

class FacedeBusiness
{		
	/* Instances */
	private static $Instance;
	private $Factory                    = NULL;
	private $InstanceLanguage = NULL;
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct($InstanceLanguage) 
    {
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
		if ($this->InstanceLanguage == NULL)
			$this->InstanceLanguage = $InstanceLanguage;
    }
	
	/* Get Instance */
	public static function __create($InstanceLanguage)
    {
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "Language.php"))
			exit('FacedeBusiness: No language loaded!');
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class($InstanceLanguage);
        }
        return self::$Instance;
    }
}