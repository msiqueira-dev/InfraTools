<?php
/************************************************************************
Class: PageServiceListByDepartment.php
Creation: 2018/06/21
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Class that list the all the services in the user's context by department.
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

class PageServiceListByDepartment extends PageService
{
	public $ArrayInstanceInfraToolsCorporation = NULL;
	public $ArrayInstanceInfraToolsDepartment = NULL;
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

	public function LoadPage()
	{
		$this->InputValueFormMethod = "GET";
		if($this->CheckInstanceUser() == ConfigInfraTools::RET_OK)
		{
			$return = $this->InfraToolsCorporationSelectOnUserServiceContextNoLimit($this->User->GetEmail(),
											                                        $this->ArrayInstanceInfraToolsCorporation, 
											                                        $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::RET_OK)
			{
				if(isset($_GET[ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB]))
				{
					if($_GET[ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB] 
					   != ConfigInfraTools::FIELD_SEL_NONE)
						$this->InputValueServiceCorporation = $_GET[ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB];	
					else if($this->User->GetCorporationName() != NULL)
						$this->InputValueServiceCorporation = $this->User->GetCorporationName();
				}
				elseif($this->User->GetCorporationName() != NULL)
					$this->InputValueServiceCorporation = $this->User->GetCorporationName();

				$return = $this->InfraToolsDepartmentSelectOnUserServiceContextNoLimit($this->InputValueServiceCorporation,
										 $this->User->GetEmail(),
										 $this->ArrayInstanceInfraToolsDepartment, 
										 $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::RET_OK)
				{
					if(isset($_GET[ConfigInfraTools::FM_SERVICE_LST_BY_DEPARTMENT_SEL_DEPARTMENT_SB]))
					{
						if($_GET[ConfigInfraTools::FM_SERVICE_LST_BY_DEPARTMENT_SEL_DEPARTMENT_SB] != ConfigInfraTools::FIELD_SEL_NONE)
							$this->InputValueServiceDepartment = $_GET[ConfigInfraTools::FM_SERVICE_LST_BY_DEPARTMENT_SEL_DEPARTMENT_SB];	
					}
					
					
					//FM_SERVICE_LST_BY_DEPARTMENT_SEL_BY_ID_SB
					if(isset($_POST[ConfigInfraTools::FM_SERVICE_LST_BY_DEPARTMENT_SEL_BY_ID_SB]))
					{

						Page::GetCurrentDomain($domain);
						$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
													. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
													. "?" . ConfigInfraTools::FIELD_SERVICE_ID . "=" 
													. $_POST[ConfigInfraTools::FM_SERVICE_LST_BY_DEPARTMENT_SEL_BY_ID_SB]);
					}
					//FM_SERVICE_LST_BY_DEPARTMENT
					else
					{
						$_GET = array(ConfigInfraTools::FM_SERVICE_LST_BY_DEPARTMENT => ConfigInfraTools::FM_SERVICE_LST_BY_DEPARTMENT) 
							                                                               + $_GET;
						$this->ExecuteFunction($_GET, 'InfraToolsServiceSelectByServiceDepartmentOnUserContext', 
											   array($this->InputValueServiceCorporation, 
													 $this->InputValueServiceDepartment,
													 $this->User->GetEmail(),
													 &$this->ArrayInstanceInfraToolsService),
											   $this->InputValueHeaderDebug);
					}
				}
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>