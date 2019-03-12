<?php
/************************************************************************
Class: PageServiceListByCorporation.php
Creation: 21/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Class that list the all the services in the user's context by corporation.
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

class PageServiceListByCorporation extends PageService
{
	public $ArrayInstanceInfraToolsCorporation = NULL;
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
		$this->InputValueFormMethod = "GET";
		if($this->CheckInstanceUser() == ConfigInfraTools::RET_OK)
		{
			$return = $this->InfraToolsCorporationSelectOnUserServiceContextNoLimit($this->User->GetEmail(),
											                                        $this->ArrayInstanceInfraToolsCorporation, 
											                                        $this->InputValueHeaderDebug);
			//FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB
			if(isset($_GET[ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB]))
			{
				if($_GET[ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB] 
				   != ConfigInfraTools::FIELD_SEL_NONE)
					$this->InputValueServiceCorporation = $_GET[ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB];	
				else $this->InputValueServiceCorporation = NULL;
			}
			else $this->InputValueServiceCorporation = NULL;
			
			//FM_SERVICE_LST_BY_CORPORATION_SEL_BY_ID_SB
			if(isset($_POST[ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_BY_ID_SB]))
			{

				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_BY_ID_SB]);
			}
			//FM_SERVICE_LST_BY_CORPORATION
			else
			{
				$_GET = array(ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION => ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION) + $_GET;
				$this->ExecuteFunction($_GET, 'ServiceSelectByServiceCorporationOnUserContext', 
				 					   array($this->InputValueServiceCorporation,
					                         $this->User->GetEmail(),
											 &$this->ArrayInstanceInfraToolsService),
									   $this->InputValueHeaderDebug);
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>