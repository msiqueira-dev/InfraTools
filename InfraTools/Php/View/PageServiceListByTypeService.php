<?php
/************************************************************************
Class: PageServiceListByTypeService.php
Creation: 2018/07/10
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Class that list the all the services in the user's context by type user.
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

class PageServiceListByTypeService extends PageInfraTools
{
	public $ArrayInstanceInfraToolsService = NULL;
	public $ArrayInstanceInfraToolsTypeService = NULL;
	
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
		$this->InputValueFormMethod = "GET";
		if($this->CheckInstanceUser() == ConfigInfraTools::RET_OK)
		{
			$return = $this->InfraToolsTypeServiceSelectOnUserContextNoLimit($this->User->GetEmail(),
				                                                   $this->ArrayInstanceInfraToolsTypeService, 
														           $this->InputValueHeaderDebug);
			if(isset($_GET[ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_TYPE_SERVICE_SB]))
				$this->InputValueServiceType = $_GET[ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_TYPE_SERVICE_SB];
			else $this->InputValueServiceType = NULL;
			//FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_BY_ID_SB
			if(isset($_POST[ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_BY_ID_SB]))
			{

				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_BY_ID_SB]);
			}
			//FM_SERVICE_LST_BY_TYPE_SERVICE
			else
			{
				$_GET = array(ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_SERVICE =>
							  ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_SERVICE) + $_GET;
				$this->ExecuteFunction($_GET, 'InfraToolsServiceSelectByServiceTypeOnUserContext', 
											   array($this->InputValueServiceType,
													 $this->User->GetEmail(),
													 &$this->ArrayInstanceInfraToolsService),
											   $this->InputValueHeaderDebug);
			}
		}
		$this->LoadHtml(FALSE);
	}
}
?>