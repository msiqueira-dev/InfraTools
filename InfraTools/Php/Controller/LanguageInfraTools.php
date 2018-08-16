<?php

/************************************************************************
Class: LanguageInfraTools
Creation: 17/03/2015
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe que contem as funcionalidades de inclusão de linguas nas páginas
Functions: 
			public function GetConstant($Constant, $Language);
			public function GetPageName($Page);
			public function GetPageRobots($Page);
			public function GetPageRobots($Page);
			public function GetPageTitle($Page);
			public function GetText($Constant);
			protected function GetLanguageInstance($Language);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("Language"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Language.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Language.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Language');
}

class LanguageInfraTools extends Language 
{	
	/**                               **/
	/************* METODOS *************/
	/**                               **/
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->Factory == NULL)
			$this->Factory = InfraToolsFactory::__create();
	}
	
	protected function GetLanguageInstance($Language)
	{
		if($Language == ConfigInfraTools::LANGUAGE_GERMAN && $this->InstanceLanguageText != NULL) 
			return $this->InstanceLanguageText;
		elseif($Language == ConfigInfraTools::LANGUAGE_ENGLISH && $this->InstanceLanguageText != NULL)
			return $this->InstanceLanguageText;
		elseif($Language == ConfigInfraTools::LANGUAGE_SPANISH && $this->InstanceLanguageText != NULL) 
			return $this->InstanceLanguageText;
		elseif($Language == ConfigInfraTools::LANGUAGE_PORTUGUESE && $this->InstanceLanguageText != NULL) 
			return $this->InstanceLanguageText;
		else exit('LanguageInfraTools: Error! No LanguageInstanceLoaded!');
	}
	
	/* Create */
	public static function __create($Language)
    {
		$InfraToolsFactory = InfraToolsFactory::__create();
		$ConfigInfraTools = $InfraToolsFactory->CreateConfigInfraTools();
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
		if(empty($Language))
			$Language = $ConfigInfraTools->DefaultLanguage;
		if(file_exists(SITE_PATH_PHP_CONTROLLER . $Language . ".php"))
		{
			include_once(SITE_PATH_PHP_CONTROLLER . $Language . ".php");
			if(self::$Instance->InstanceLanguageText == NULL && $Language == ConfigInfraTools::LANGUAGE_GERMAN)     
				self::$Instance->InstanceLanguageText = $InfraToolsFactory->CreateLanguageDe();
			elseif(self::$Instance->InstanceLanguageText == NULL && $Language == ConfigInfraTools::LANGUAGE_ENGLISH)
				self::$Instance->InstanceLanguageText = $InfraToolsFactory->CreateLanguageEn();
			elseif(self::$Instance->InstanceLanguageText == NULL && $Language == ConfigInfraTools::LANGUAGE_SPANISH) 
				self::$Instance->InstanceLanguageText = $InfraToolsFactory->CreateLanguageEs();
			elseif(self::$Instance->InstanceLanguageText == NULL && $Language == ConfigInfraTools::LANGUAGE_PORTUGUESE)
				self::$Instance->InstanceLanguageText = $InfraToolsFactory->CreateLanguagePt();
		}
		else exit(basename(__FILE__, '.php') . ': Error Loading Class Language');
		return self::$Instance;
    }
	
	public function GetConstant($Constant, $Language)
	{
		$obj = $this->GetLanguageInstance($Language);
		return $obj->GetText($Constant);
	}
	
	public function GetPageName($Page)
	{
		if($this->InstanceLanguageText != NULL)
		{
			return $this->InstanceLanguageText->GetText(strtoupper($Page) . "");
		}
	}
	
	public function GetPageRobots($Page)
	{
		if($this->InstanceLanguageText != NULL)
		{
			return $this->InstanceLanguageText->GetText(strtoupper($Page) . "_ROBOTS");
		}
	}
	
	public function GetPageTitle($Page)
	{
		if($this->InstanceLanguageText != NULL)
		{
			return $this->InstanceLanguageText->GetText(strtoupper($Page) . "_TITLE");
		}
	}
	
	public function GetText($Constant)
	{
		if($this->InstanceLanguageText != NULL)
		{
			return $this->InstanceLanguageText->GetText($Constant);
		}
	}
}

?>