<?php
/************************************************************************
Class: PageAdminCountry.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for countries management.
Functions: 
			public    function GetCurrentPage();
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

class PageAdminCountry extends PageAdmin
{
	public $ArrayCountry = NULL;
	
	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Language);
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}
	
	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->Page = ConfigInfraTools::PAGE_ADMIN_COUNTRY_LIST;
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//COUNTRY LIST BACK SUBMIT
		if($this->CheckInputImage(ConfigInfraTools::FORM_COUNTRY_LIST_BACK))
		{
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$this->CountrySelect($this->InputLimitOne, $this->InputLimitTwo, 
																$this->ArrayCountry,
																$rowCount,
															    $this->InputValueHeaderDebug);
		}
		//COUNTRY LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_COUNTRY_LIST_FORWARD))
		{
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			$this->CountrySelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayCountry, 
								 $rowCount, $this->InputValueHeaderDebug);
			if($this->InputLimitOne > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
				$this->CountrySelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayCountry,
									 $rowCount, $this->InputValueHeaderDebug);
			}
			elseif($this->InputLimitTwo > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
			}
		}
		//COUNTRY LIST
		else
		{
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$this->CountrySelect($this->InputLimitOne, $this->InputLimitTwo, 
																$this->ArrayCountry,
																$rowCount,
															    $this->InputValueHeaderDebug);
			$_POST[ConfigInfraTools::FORM_COUNTRY_LIST . "_x"] = "1";
			$_POST[ConfigInfraTools::FORM_COUNTRY_LIST . "_y"] = "1";
			$_POST[ConfigInfraTools::FORM_COUNTRY_LIST] = ConfigInfraTools::FORM_COUNTRY_LIST;
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>