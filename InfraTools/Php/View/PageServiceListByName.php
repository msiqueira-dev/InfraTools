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
			//FORM_SERVICE_LIST_BY_NAME_SELECT_BY_ID_SUBMIT
			if(isset($_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_SELECT_BY_ID_SUBMIT]))
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_SELECT_BY_ID_SUBMIT]);
			}
			//FORM_SERVICE_LIST_BY_NAME
			else
			{
				$_GET = array(ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME => ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME) + $_GET;
				$this->ExecuteFunction($_GET, 'InfraToolsServiceSelectByServiceNameOnUserContext', 
											   array($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_NAME],
													 $this->User->GetEmail(),
													 &$this->ArrayInstanceInfraToolsService),
											   $this->InputValueHeaderDebug);
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>