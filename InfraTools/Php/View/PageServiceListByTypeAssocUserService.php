<?php
/************************************************************************
Class: PageServiceListByTypeAssocUserService.php
Creation: 2018/06/21
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Class that list the all the services in the user's context by type association of a user and a service.
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

class PageServiceListByTypeAssocUserService extends PageService
{
	public $ArrayInstanceInfraToolsService = NULL;
	public $ArrayInstanceInfraToolsTypeAssocUserService = NULL;
	
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

	public function LoadPage()
	{
		$this->InputValueFormMethod = "GET";
		if($this->CheckInstanceUser() == ConfigInfraTools::RET_OK)
		{
			$return = $this->InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit($this->ArrayInstanceInfraToolsTypeAssocUserService, 
														 $this->User->GetEmail(), 
														 $this->InputValueHeaderDebug);
			if(isset($_GET[ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_TYPE_ASSOC_SERVICE_SB]))
			{
				if($_GET[ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_TYPE_ASSOC_SERVICE_SB] 
				   != ConfigInfraTools::FIELD_SEL_NONE)
					$this->InputValueTypeAssocUserServiceDescription = 
					$_GET[ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_TYPE_ASSOC_SERVICE_SB];	
				else $this->InputValueTypeAssocUserServiceDescription = NULL;
			}
			else $this->InputValueTypeAssocUserServiceDescription = NULL;
			//FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_BY_ID_SB
			if(isset($_POST[ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_BY_ID_SB]))
			{

				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_BY_ID_SB]);
			}
			//FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE
			else
			{
				$_GET = array(ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE =>
							  ConfigInfraTools::FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE) + $_GET;
				$this->ExecuteFunction($_GET, 'InfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext', 
											   array($this->InputValueTypeAssocUserServiceDescription,
													 $this->User->GetEmail(),
													 &$this->ArrayInstanceInfraToolsService),
											   $this->InputValueHeaderDebug);
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>