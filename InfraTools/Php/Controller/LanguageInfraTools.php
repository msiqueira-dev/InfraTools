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
	private $Language;
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
	public static function __create($Config, $Language)
    {
		$InfraToolsFactory = InfraToolsFactory::__create();
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
		if(empty($Language))
			$Language = $Config->DefaultLanguage;
		if(file_exists(SITE_PATH_PHP_CONTROLLER . $Language . ".php"))
		{
			include_once(SITE_PATH_PHP_CONTROLLER . $Language . ".php");
			if(self::$Instance->InstanceLanguageText == NULL && $Language == ConfigInfraTools::LANGUAGE_GERMAN)     
				self::$Instance->InstanceLanguageText = $InfraToolsFactory->CreateInfraToolsLanguageDe();
			elseif(self::$Instance->InstanceLanguageText == NULL && $Language == ConfigInfraTools::LANGUAGE_ENGLISH)
				self::$Instance->InstanceLanguageText = $InfraToolsFactory->CreateInfraToolsLanguageEn();
			elseif(self::$Instance->InstanceLanguageText == NULL && $Language == ConfigInfraTools::LANGUAGE_SPANISH) 
				self::$Instance->InstanceLanguageText = $InfraToolsFactory->CreateInfraToolsLanguageEs();
			elseif(self::$Instance->InstanceLanguageText == NULL && $Language == ConfigInfraTools::LANGUAGE_PORTUGUESE)
				self::$Instance->InstanceLanguageText = $InfraToolsFactory->CreateInfraToolsLanguagePt();
		}
		else exit(basename(__FILE__, '.php') . ': Error Loading Class Language');
		self::$Instance->Language = str_replace('Language/', '', $Language);
		return self::$Instance;
    }
	
	public function GetConstant($Constant, $Language)
	{
		return $this->GetText($Constant);
	}
	
	public function GetPageName($Page)
	{
		if($this->InstanceLanguageText != NULL)
		{
			return $this->GetText($Page . "");
		}
	}
	
	public function GetPageRobots($Page)
	{
		if($this->InstanceLanguageText != NULL)
		{
			return $this->GetText($Page . "Robots");
		}
	}
	
	public function GetPageTitle($Page)
	{
		if($this->InstanceLanguageText != NULL)
		{
			return $this->GetText($Page . "Title");
		}
	}
	
	public function GetText($Constant)
	{
		if($this->InstanceLanguageText != NULL)
		{
			$Language = get_class($this->InstanceLanguageText);
			if(!defined("$Language::$Constant"))
			{
				if(strpos(strtoupper($Constant), 'PAGE') !== FALSE && strpos($Constant, '_') == FALSE)
				{
					preg_match_all('/[A-Z]/', $Constant, $matches, PREG_OFFSET_CAPTURE);
					if(is_array($matches))
					{
						foreach($matches as $values)
							foreach($values as $key => $indexes)
							{
								if($indexes[1] != 0)
									$Constant = substr_replace($Constant, "_", $indexes[1]+$key-1, 0);
							}
					}
				}
				
				$Constant = strtoupper($Constant);
				if(!defined("$Language::$Constant"))
				{
					if(strpos($Constant, 'LIST') !== FALSE)
						$Constant = str_replace ("LIST", "LST" , $Constant);
					if(strpos($Constant, 'REGISTER') !== FALSE)
						$Constant = str_replace ("REGISTER", "REG" , $Constant);
					if(strpos($Constant, 'SELECT') !== FALSE)
						$Constant = str_replace ("SELECT", "SEL" , $Constant);
					if(strpos($Constant, 'UPDATE') !== FALSE)
						$Constant = str_replace ("UPDATE", "UPDT" , $Constant);
				}
			}
			if(defined("$Language::$Constant"))
			{
				$text = constant("$Language::$Constant");
				if(!empty($text)) return $text;
			}
			else echo "Constant: " . $Constant;
		}
	}
}

?>