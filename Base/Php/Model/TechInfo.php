<?php

/************************************************************************
Class: TechInfo
Creation: 03/01/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe de informações técnicas
Functions: 
			
**************************************************************************/

abstract class TechInfo
{	
	/* Instância usadas nessa classe */
	protected $ArrayInstanceBaseFile  = array();
	protected $ArrayInstanceTotalFile = array();
	protected $Factory        = NULL;

	/* Properties */
	protected $ArrayBaseFileType      = array();
	protected $ArrayTotalFileType     = array();
	protected $BaseDirectoryCount     = 0;
	protected $BaseFileCount          = 0;
	protected $TotalDirectoryCount    = 0;
	protected $TotalFileCount         = 0;
	
	/* Singleton */
	private static $Instance;
	
	/* Get Instance */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
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
			$this->Factory = Factory::__create();
    }
	
	/* Clone */
	public function __clone()
    {
        exit(get_class($this) . ": Error! Clone Not Allowed!");
    }
	
	abstract protected function IncreaseArrayFileType(&$Array, &$fileInfo, &$fileObject);
	
	/* GET */
	public function GetArrayInstanceBaseFile()
	{
		return $this->ArrayInstanceBaseFile;
	}
	
	public function GetArrayInstanceTotalFile()
	{
		return $this->ArrayInstanceTotalFile;
	}
	
	public function GetArrayBaseFileType()
	{
		return $this->ArrayBaseFileType;
	}
	
	public function GetArrayTotalFileType()
	{
		return $this->ArrayTotalFileType;
	}
	
	public function GetBaseDirectoryCount()
	{
		return $this->BaseDirectoryCount;
	}
	
	public function GetBaseFileCount()
	{
		return $this->BaseFileCount;
	}
	
	public function GetTotalDirectoryCount()
	{
		return $this->TotalDirectoryCount;
	}
	
	public function GetTotalFileCount()
	{
		return $this->TotalFileCount;
	}
	
	protected function CreateFile($Directory, $Extension, $Name, $Type, &$File)
	{
		$File = $this->Factory->CreateFile();
		$File->SetDirectory($Directory);
		$File->SetExtension($Extension);
		$File->SetName($Name);
		$File->SetPath($Directory . "/" . $Name . "." . $Extension);
		$File->SetType($Type);
		return Config::SUCCESS;
	}
	
	protected function SearchArrayFileType($MultidimensionalArray, $Extension, $Type, &$Key=0)
	{
		if(is_array($MultidimensionalArray))
		{
			foreach($MultidimensionalArray as $Key=>$array)
			{
				if($array['Extension'] == $Extension && $array['Type'] == $Type)
					return $array;
			}
		}
		return NULL;
	}
}

?>