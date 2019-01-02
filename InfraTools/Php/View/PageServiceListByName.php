<?php
/************************************************************************
Class: PageServiceListByName.php
Creation: 2019/01/02
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Class that list the all the services in the user's context by name.
Functions: 
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageService"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageService.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageService.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageService');
}

class PageServiceListByName extends PageService
{
	public $ArrayInstanceInfraToolsService = NULL;
	
	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Config, $Language, $Page);
	}

	public function LoadPage()
	{
		if($this->CheckInstanceUser() == ConfigInfraTools::SUCCESS)
		{
			//SERVICE LIST BY NAME BACK SUBMIT
			if($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_BACK))
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
				if($this->InputLimitOne < 0)
					$this->InputLimitOne = 0;
				if($this->InputLimitTwo <= 0)
					$this->InputLimitTwo = 25;
				$return = $this->ServiceSelectByServiceNameOnUserContext($this->InputLimitOne, 
																	     $this->InputLimitTwo, 
								                                         $this->InputValueServiceName,
																	     $this->User->GetEmail(),
																	     $this->ArrayInstanceInfraToolsService,
																	     $rowCount,
																	     $this->InputValueHeaderDebug);
			}
			//SERVICE LIST BY NAME FORWARD SUBMIT
			elseif($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_FORWARD))
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
				$return = $this->ServiceSelectByServiceNameOnUserContext($this->InputLimitOne, 
																	     $this->InputLimitTwo, 
					                                                     $this->InputValueServiceName,
																	     $this->User->GetEmail(),
																	     $this->ArrayInstanceInfraToolsService,
																	     $rowCount,
																	     $this->InputValueHeaderDebug);
				if($this->InputLimitTwo > $rowCount)
				{
					if(!is_numeric($rowCount))
					{
						$this->InputLimitOne = $this->InputLimitOne - 25;
						$this->InputLimitTwo = $this->InputLimitTwo - 25;
					}
					else
					{
						$this->InputLimitOne = $rowCount - 25;
						$this->InputLimitTwo = $rowCount;
					}
					$this->ServiceSelectByServiceNameOnUserContext($this->InputLimitOne, 
																   $this->InputLimitTwo, 
						                                           $this->InputValueServiceName,
																   $this->User->GetEmail(),
																   $this->ArrayInstanceInfraToolsService,
																   $rowCount,
																   $this->InputValueHeaderDebug);
				}
			}
			//SERVICE LIST BY NAME SELECT SUBMIT
			elseif(isset($_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_SELECT_BY_ID_SUBMIT]))
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_SELECT_BY_ID_SUBMIT]);
			}
			//SERVICE LIST BY NAME
			else
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				$return = $this->ServiceSelectByServiceNameOnUserContext($this->InputLimitOne, $this->InputLimitTwo,
					                                                     $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_NAME],
																	     $this->User->GetEmail(),
																	     $this->ArrayInstanceInfraToolsService,
																	     $rowCount,
																	     $this->InputValueHeaderDebug);
				$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME . "_x"] = "1";
				$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME . "_y"] = "1";
				$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME] = ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME;
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>