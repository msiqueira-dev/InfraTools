<?php
/************************************************************************
Class: PageAdminTechInfo.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class for technical details of the system.
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

class PageAdminTechInfo extends PageAdmin
{
	public $ArrayBaseFileType                 = array();
	public $ArrayInfraToolsFileType           = array();
	public $ArrayTotalFileType                = array();
	public $BaseDirectoryCount                = 0;
	public $BaseFileCount                     = 0;
	public $InfraToolsArrayLanguageConstants  = 0;
	public $InfraToolsArrayLanguageValueCount = 0;
	public $InfraToolsDirectoryCount          = 0;
	public $InfraToolsFileCount               = 0;
	public $InfraToolsLanguageFileCount       = 0;
	public $MatrixLanguageConstant            = 0;
	public $TotalDirectoryCount               = 0;
	public $TotalFileCount                    = 0;
	
	/* __create */
	public static function __create($Page, $Language)
	{
		$class = __CLASS__;
		return new $class($Page, $Language);
	}
	
	/* Constructor */
	protected function __construct($Page, $Language) 
	{
		parent::__construct($Page, $Language);
	}

	public function LoadPage()
	{
		$InstanceInfraToolsTechInfo = $this->Factory->CreateInfraToolsTechInfo();
		$InstanceInfraToolsTechInfo->ProcessTechBase();
		$InstanceInfraToolsTechInfo->ProcessTechInfoInfraTools();
		$InstanceInfraToolsTechInfo->ProccessTechLanguage();
		$PageFormBack = FALSE;
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		$this->ArrayBaseFileType                 = $InstanceInfraToolsTechInfo->GetArrayBaseFileType();
		$this->ArrayInfraToolsFileType           = $InstanceInfraToolsTechInfo->GetArrayInfraToolsFileType();
		$this->ArrayTotalFileType                = $InstanceInfraToolsTechInfo->GetArrayTotalFileType();
		$this->BaseDirectoryCount                = $InstanceInfraToolsTechInfo->GetBaseDirectoryCount();
		$this->BaseFileCount                     = $InstanceInfraToolsTechInfo->GetBaseFileCount();
		$this->InfraToolsDirectoryCount          = $InstanceInfraToolsTechInfo->GetInfraToolsDirectoryCount();
		$this->InfraToolsFileCount               = $InstanceInfraToolsTechInfo->GetInfraToolsFileCount();
		$this->TotalDirectoryCount               = $InstanceInfraToolsTechInfo->GetTotalDirectoryCount();
		$this->TotalFileCount                    = $InstanceInfraToolsTechInfo->GetTotalFileCount();
		$this->InfraToolsArrayLanguageConstants  = $InstanceInfraToolsTechInfo->GetInfraToolsArrayLanguageConstantCount();
		$this->InfraToolsArrayLanguageValueCount = $InstanceInfraToolsTechInfo->GetInfraToolsArrayLanguageValueCount();
		$this->InfraToolsLanguageFileCount       = $InstanceInfraToolsTechInfo->GetInfraToolsLanguageFileCount();
		$this->MatrixLanguageConstant            = $InstanceInfraToolsTechInfo->GetInfraToolsMatrixLanguageProblemConstant();
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>