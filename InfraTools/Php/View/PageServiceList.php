<?php
/************************************************************************
Class: PageServiceList.php
Creation: 2018/06/19
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Class that list the all the services in the user's context.
Functions: 
			protected function BuildSmartyTags();
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
		$this->Page = $Page;
		parent::__construct($Config, $Language, $Page);
	}

	protected function BuildSmartyTags()
	{
		if(parent::BuildSmartyTags() == ConfigInfraTools::RET_OK)
		{
			if(!empty($this->ArrayInstanceInfraToolsService))
				$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_SERVICE", array($this->ArrayInstanceInfraToolsService));
			else $this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_SERVICE", FALSE);
			$this->Smarty->assign("FORM_METHOD", "GET");
		}
	}

	public function LoadPage()
	{
		$this->InputValueFormMethod = "GET";
		if($this->CheckInstanceUser() == ConfigInfraTools::RET_OK)
		{
			//FM_SERVICE_SEL_SB
			if($this->CheckGetContainsKey(ConfigInfraTools::FM_SERVICE_SEL_SB) == ConfigInfraTools::RET_OK)
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FIELD_SERVICE_ID . "=" 
											. $_GET[ConfigInfraTools::FIELD_SERVICE_ID]);
			}
			//FM_SERVICE_LST
			else
			{
				$_GET = array(ConfigInfraTools::FM_SERVICE_LST => ConfigInfraTools::FM_SERVICE_LST) + $_GET;
				$this->ExecuteFunction($_GET, 'InfraToolsServiceSelectOnUserContext', 
				 					   array($this->User->GetEmail(),
											 &$this->ArrayInstanceInfraToolsService),
									   $this->InputValueHeaderDebug);
			}
		}
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>