<?php
/************************************************************************
Class: PageServiceList.php
Creation: 19/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Class that list the all the services in the user's context.
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

class PageServiceList extends PageService
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
			//FORM_SERVICE_SELECT_SUBMIT
			if($this->CheckGetContainsKey(ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
											. $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_ID]);
			}
			//FORM_SERVICE_LIST
			else
			{
				$_GET = array(ConfigInfraTools::FORM_SERVICE_LIST => ConfigInfraTools::FORM_SERVICE_LIST) + $_GET;
				$this->ExecuteFunction($_GET, 'InfraToolsServiceSelectOnUserContext', 
				 					   array($this->User->GetEmail(),
											 &$this->ArrayInstanceInfraToolsService),
									   $this->InputValueHeaderDebug);
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>