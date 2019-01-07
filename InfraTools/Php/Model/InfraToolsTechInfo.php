<?php

/************************************************************************
Class: InfraToolsTechInfo
Creation: 03/01/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe de informações técnicas
Get / Set: 
			public function GetArrayInstanceInfraToolsFile();
			public function GetArrayInfraToolsFileType();
			public function GetInfraToolsDirectoryCount();
			public function GetInfraToolsFileCount();
			public function GetInfraToolsLanguageFileCount();
			public function GetInfraToolsMatrixLanguageConstant();
			
Functions: 
			protected function IncreaseArrayFileType(&$Array, &$fileInfo, &$fileObject);
			public function ProcessTechBase();
			public function ProcessTechInfoInfraTools();
			public function ProccessTechLanguage();
			
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsTechInfo extends TechInfo
{	
	/* Instância usadas nessa classe */
	private $ConfigInfraTools;
	private $ArrayInstanceInfraToolsFile = array();

	/* Properties */
	private $ArrayInfraToolsFileType                 = array();
	private $InfraToolsArrayLanguageConstantCount    = array();
	private $InfraToolsArrayLanguageValueCount       = array();
	private $InfraToolsDirectoryCount                = 0;
	private $InfraToolsFileCount                     = 0;
	private $InfraToolsLanguageFileCount             = 0;
	private $InfraToolsMatrixLanguageConstant        = array();
	private $InfraToolsMatrixLanguageProblemConstant = array();
	
	/* Singleton */
	private static $Instance;
	
	/* Create */
	public static function __create()
    {
        if (!isset(self::$Instance) || strcmp(get_class(self::$Instance), __CLASS__) != 0) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	/* Constructor */
	private function __construct() 
    {
		if($this->Factory == NULL)
			$this->Factory = InfraToolsFactory::__create();
    }
	
	/* Clone */
	public function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
    }
	
	/* GET */
	public function GetArrayInstanceInfraToolsFile()
	{
		return $this->ArrayInstanceInfraToolsFile;
	}
	
	public function GetArrayInfraToolsFileType()
	{
		return $this->ArrayInfraToolsFileType;
	}
	
	public function GetInfraToolsArrayLanguageConstantCount()
	{
		return $this->InfraToolsArrayLanguageConstantCount;
	}
	
	public function GetInfraToolsArrayLanguageValueCount()
	{
		return $this->InfraToolsArrayLanguageValueCount;
	}
	
	public function GetInfraToolsDirectoryCount()
	{
		return $this->InfraToolsDirectoryCount;
	}
	
	public function GetInfraToolsFileCount()
	{
		return $this->InfraToolsFileCount;
	}
	
	public function GetInfraToolsLanguageFileCount()
	{
		return $this->InfraToolsLanguageFileCount;
	}
	
	public function GetInfraToolsMatrixLanguageConstant()
	{
		return $this->InfraToolsMatrixLanguageConstant;
	}
	
	public function GetInfraToolsMatrixLanguageProblemConstant()
	{
		return $this->InfraToolsMatrixLanguageProblemConstant;
	}
	
	/* METHODS */
	protected function IncreaseArrayFileType(&$Array, &$fileInfo, &$fileObject)
	{
		$array = $this->SearchArrayFileType($Array, $fileInfo['extension'], $fileInfo['type'], $keyArray);
		if($array == NULL)
		{
			$array = array("Count" => 1, "Extension" => $fileInfo['extension'], "Type" => $fileInfo['type']);
			array_push($Array, $array);
		}
		else $Array[$keyArray]['Count']++;
		$this->CreateFile($fileInfo['dirname'], $fileInfo['extension'], $fileInfo['filename'], $fileInfo['type'], $fileObject);
	}
	
	public function ProcessTechBase()
	{
		$arrayBaseDir = array();
		array_push($arrayBaseDir, BASE_PATH       . "/DataBase");
		array_push($arrayBaseDir, BASE_PATH       . "/Documentation");
		array_push($arrayBaseDir, BASE_PATH       . "/Files");
		array_push($arrayBaseDir, BASE_PATH       . "/Illustrator");
		array_push($arrayBaseDir, BASE_PATH       . "/JavaScript");
		array_push($arrayBaseDir, BASE_PATH       . "/JavaScript/Form");
		array_push($arrayBaseDir, BASE_PATH       . "/JavaScript/Google");
		array_push($arrayBaseDir, BASE_PATH       . "/JavaScript/InternetExplorer");
		array_push($arrayBaseDir, BASE_PATH       . "/JavaScript/Tabs");
		array_push($arrayBaseDir, BASE_PATH       . "/Photoshop");
		array_push($arrayBaseDir, BASE_PATH       . "/Photoshop/Icons");
		array_push($arrayBaseDir, BASE_PATH       . "/Photoshop/Logos");
		array_push($arrayBaseDir, BASE_PATH_IMAGE . "/Backgrounds");
		array_push($arrayBaseDir, BASE_PATH_IMAGE . "/Icons");
		array_push($arrayBaseDir, BASE_PATH_IMAGE . "/Logos");
		array_push($arrayBaseDir, BASE_PATH_IMAGE . "/Photos");
		array_push($arrayBaseDir, BASE_PATH_IMAGE . "/Prototypes");
		array_push($arrayBaseDir, BASE_PATH_PHP   . "/API");
		array_push($arrayBaseDir, BASE_PATH_PHP   . "/API/Captcha");
		array_push($arrayBaseDir, BASE_PATH_PHP   . "/API/GTmetrix");
		array_push($arrayBaseDir, BASE_PATH_PHP   . "/API/MobileDetect");
		array_push($arrayBaseDir, BASE_PATH_PHP   . "/API/PHPMailer");
		array_push($arrayBaseDir, BASE_PATH_PHP   . "/API/XMLParser");
		array_push($arrayBaseDir, BASE_PATH_PHP   . "/Controller");
		array_push($arrayBaseDir, BASE_PATH_PHP   . "/Model");
		array_push($arrayBaseDir, BASE_PATH_PHP   . "/View");
		
		foreach($arrayBaseDir as $key=>$dir)
		{
			$arrayFile = scandir($dir);
			foreach($arrayFile as $key2=>$file)
			{
				$fileInfo = pathinfo($file);
				if(!is_dir($file) && isset($fileInfo['extension']))
				{
					$this->BaseFileCount++;
					$this->TotalFileCount++;
					if((strpos($file, '.png') !== FALSE) || strpos($file, '.jpg') !== FALSE)
						$fileInfo['type'] = "Images";
					else if(strpos($dir, 'API') !== FALSE)
						$fileInfo['type'] = 'API';
					else if(strpos($dir, BASE_PATH_PHP) !== FALSE)
						$fileInfo['type'] = 'Back-End';
					else if(strpos($file, '.mwb.bak') !== FALSE)
						$fileInfo['type'] = "MySql WorkBench Backup";
					else if(strpos($file, '.mwb') !== FALSE)
						$fileInfo['type'] = "MySql WorkBench Model";
					else if(strpos($file, '.csv') !== FALSE)
						$fileInfo['type'] = "MySql Table Inserts";
					else if(strpos($file, '.js') !== FALSE)
						$fileInfo['type'] = "JavaScript";
					else if(strpos($file, '.ico') !== FALSE)
						$fileInfo['type'] = "Browser Icon";
					else if(strpos($file, '.ncp') !== FALSE)
						$fileInfo['type'] = "Class Model";
					else if((strpos($dir . "/" . $file, 'De/Page') !== FALSE) ||
							(strpos($dir . "/" . $file, 'En/Page') !== FALSE) ||
							(strpos($dir . "/" . $file, 'Es/Page') !== FALSE) ||
							(strpos($dir . "/" . $file, 'Pt/Page') !== FALSE) ||
							(strpos(REL_PATH . $file, 'Captcha.php')  !== FALSE) ||
							(strpos(REL_PATH . $file, 'Info.php')     !== FALSE) ||
							(strpos(REL_PATH . $file, 'NotFound.php') !== FALSE))
						$fileInfo['type'] = "Page";
					else $fileInfo['type'] = $fileInfo['extension'];
					$this->IncreaseArrayFileType($this->ArrayBaseFileType, $fileInfo, $fileObject);
					$this->IncreaseArrayFileType($this->ArrayTotalFileType, $fileInfo, $fileObject);
					array_push($this->ArrayInstanceBaseFile, $fileObject);
					array_push($this->ArrayInstanceTotalFile, $fileObject);
				}
			}
			$this->BaseDirectoryCount++;
			$this->TotalDirectoryCount++;
		}
	}
	
	public function ProcessTechInfoInfraTools()
	{
		$arraySiteDir = array();
		array_push($arraySiteDir, REL_PATH);
		array_push($arraySiteDir, SITE_PATH_CAPTCHA);
		array_push($arraySiteDir, SITE_PATH_DE);
		array_push($arraySiteDir, SITE_PATH_EN);
		array_push($arraySiteDir, SITE_PATH_ES);
		array_push($arraySiteDir, SITE_PATH_HTML);
		array_push($arraySiteDir, SITE_PATH_HTML . "/BodyPage");
		array_push($arraySiteDir, SITE_PATH_HTML . "/Footer");
		array_push($arraySiteDir, SITE_PATH_HTML . "/Form");
		array_push($arraySiteDir, SITE_PATH_HTML . "/Head");
		array_push($arraySiteDir, SITE_PATH_HTML . "/Header");
		array_push($arraySiteDir, SITE_PATH_PHP_VIEW);
		array_push($arraySiteDir, SITE_PATH_PHP_CONTROLLER);
		array_push($arraySiteDir, SITE_PATH_PHP_CONTROLLER . "/Language");
		array_push($arraySiteDir, SITE_PATH_PHP_MODEL);
		array_push($arraySiteDir, SITE_PATH_PT);
		array_push($arraySiteDir, SITE_PATH_STYLE);
		array_push($arraySiteDir, SITE_PATH_STYLE . "/Body");
		array_push($arraySiteDir, SITE_PATH_STYLE . "/Footer");
		array_push($arraySiteDir, SITE_PATH_STYLE . "/Generic");
		array_push($arraySiteDir, SITE_PATH_STYLE . "/Header");
		foreach($arraySiteDir as $key=>$dir)
		{
			$arrayFile = scandir($dir);
			foreach($arrayFile as $key2=>$file)
			{
				$fileInfo = pathinfo($file);
				if(!is_dir($file) && isset($fileInfo['extension']))
				{
					$this->InfraToolsFileCount++;
					$this->TotalFileCount++;
					if((strpos($dir, SITE_PATH_HTML) !== FALSE) &&
					   ($file != "index.php"))
						$fileInfo['type'] = 'Front-End';
					else if(strpos($dir, SITE_PATH_PHP) !== FALSE)
						$fileInfo['type'] = 'Back-End';
					else if($file == "index.php")
						$fileInfo['type'] = $file;
					else if(strpos($dir, "Captcha") !== FALSE)
						$fileInfo['type'] = "Captcha";
					else if((strpos($dir . "/" . $file, 'De/Page') !== FALSE) ||
							(strpos($dir . "/" . $file, 'En/Page') !== FALSE) ||
							(strpos($dir . "/" . $file, 'Es/Page') !== FALSE) ||
							(strpos($dir . "/" . $file, 'Pt/Page') !== FALSE) ||
							(strpos(REL_PATH . $file, 'Captcha.php')  !== FALSE) ||
							(strpos(REL_PATH . $file, 'Info.php')     !== FALSE) ||
							(strpos(REL_PATH . $file, 'NotFound.php') !== FALSE))
						$fileInfo['type'] = "Page";
					else $fileInfo['type'] = $fileInfo['extension'];
					$this->IncreaseArrayFileType($this->ArrayInfraToolsFileType, $fileInfo, $fileObject);
					$this->IncreaseArrayFileType($this->ArrayTotalFileType, $fileInfo, $fileObject);
					array_push($this->ArrayInstanceInfraToolsFile, $fileObject);
					array_push($this->ArrayInstanceTotalFile, $fileObject);
				}
			}
			$this->InfraToolsDirectoryCount++;
			$this->TotalDirectoryCount++;
		}
	}
	
	public function ProccessTechLanguage()
	{
		$arrayAux = NULL; $arrayFile = NULL;
		$this->InfraToolsLanguageFileCount = 0;
		if(!file_exists(SITE_PATH_PHP_CONTROLLER . "Language/De.php"))
			exit(basename(__FILE__, '.php') . ': Error Loading Class Language/De');
		elseif(file_exists(SITE_PATH_PHP_CONTROLLER . "Language/De.php"))
			include_once(SITE_PATH_PHP_CONTROLLER . "Language/De.php");
		$arrayFile = scandir(SITE_PATH_PHP_CONTROLLER . "Language");
		foreach($arrayFile as $key=>$file)
		{
			$fileInfo = pathinfo($file);
			if(!is_dir($file) && isset($fileInfo['extension']))
			{
				if(!file_exists(SITE_PATH_PHP_CONTROLLER . "Language/" . $file))
					exit(basename(__FILE__, '.php') . ': Error Loading Class Language/' . $file);
				elseif(file_exists(SITE_PATH_PHP_CONTROLLER . "Language/" .  $file))
					include_once(SITE_PATH_PHP_CONTROLLER . "Language/" . $file);				
				$languageClassReflection = new ReflectionClass($fileInfo['filename']);
        		$arrayConstants = $languageClassReflection->getConstants();
				array_unshift($arrayConstants, $fileInfo['filename']);
				array_push($this->InfraToolsMatrixLanguageConstant, $arrayConstants);
				$this->InfraToolsLanguageFileCount++;
			}
		}
		foreach($this->InfraToolsMatrixLanguageConstant as $keyMatrix => $array)
		{
			$arrayConstantProblems = array(); $countValue = 0;
			foreach($array as $keyArray => $row)
			{
				if(!is_null($row)) $countValue++;
				if(count($arrayAux) > 0)
				{
					if(array_key_exists($keyArray, $arrayAux) == FALSE)
						array_push($arrayConstantProblems, $keyArray);
				}
			}
			if(count($arrayAux) > 0)
			{
				foreach($arrayAux as $keyArray => $row)
				{
					if(array_key_exists($keyArray, $array) == FALSE)
						array_push($arrayConstantProblems, $keyArray);
				}
			}
			array_push($this->InfraToolsArrayLanguageConstantCount, count($array));
			array_push($this->InfraToolsArrayLanguageValueCount, $countValue);
			$arrayConstantProblems['Language']  = $array[0];
			array_push($this->InfraToolsMatrixLanguageProblemConstant, $arrayConstantProblems);
			$arrayAux = $array;
		}
	}
}

?>