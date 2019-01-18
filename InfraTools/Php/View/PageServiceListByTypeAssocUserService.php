<?php
/************************************************************************
Class: PageServiceListByTypeAssocUserService.php
Creation: 21/06/2018
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
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Config, $Language, $Page);
	}

	public function LoadPage()
	{
		if($this->CheckInstanceUser() == ConfigInfraTools::SUCCESS)
		{
			$return = $this->InfraToolsTypeAssocUserServiceSelectOnUserContextNoLimit($this->ArrayInstanceInfraToolsTypeAssocUserService, 
														 $this->User->GetEmail(), 
														 $this->InputValueHeaderDebug);
			if(isset($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE_SUBMIT]))
			{
				if($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE_SUBMIT] 
				   != ConfigInfraTools::FORM_FIELD_SELECT_NONE)
					$this->InputValueTypeAssocUserServiceDescription = 
					$_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE_SUBMIT];	
				else $this->InputValueTypeAssocUserServiceDescription = NULL;
			}
			else $this->InputValueTypeAssocUserServiceDescription = NULL;
			//FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT
			if(isset($_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT]))
			{

				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT]);
			}
			//FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE
			else
			{
				$_GET = array(ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE =>
							  ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE) + $_GET;
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