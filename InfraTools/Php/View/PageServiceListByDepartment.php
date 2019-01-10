<?php
/************************************************************************
Class: PageServiceListByDepartment.php
Creation: 21/06/2018
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
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Config, $Language, $Page);
	}

	public function LoadPage()
	{
		if($this->CheckInstanceUser() == ConfigInfraTools::SUCCESS)
		{
			$return = $this->CorporationSelectOnUserServiceContextNoLimit($this->User->GetEmail(),
											 $this->ArrayInstanceInfraToolsCorporation, 
											 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				if(isset($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT]))
				{
					if($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT] 
					   != ConfigInfraTools::FORM_FIELD_SELECT_NONE)
						$this->InputValueServiceCorporation = $_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT];	
					else if($this->User->GetCorporationName() != NULL)
						$this->InputValueServiceCorporation = $this->User->GetCorporationName();
				}
				elseif($this->User->GetCorporationName() != NULL)
					$this->InputValueServiceCorporation = $this->User->GetCorporationName();

				$return = $this->DepartmentSelectOnUserServiceContextNoLimit($this->InputValueServiceCorporation,
										 $this->User->GetEmail(),
										 $this->ArrayInstanceInfraToolsDepartment, 
										 $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					if(isset($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_DEPARTMENT_SUBMIT]))
					{
						if($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_DEPARTMENT_SUBMIT] != ConfigInfraTools::FORM_FIELD_SELECT_NONE)
							$this->InputValueServiceDepartment = $_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_DEPARTMENT_SUBMIT];	
					}
					
					
					//FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_BY_ID_SUBMIT
					if(isset($_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_BY_ID_SUBMIT]))
					{

						Page::GetCurrentDomain($domain);
						$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
													. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
													. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
													. $_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_BY_ID_SUBMIT]);
					}
					//FORM_SERVICE_LIST_BY_DEPARTMENT
					else
					{
						$_GET = array(ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT => ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT) 
							                                                               + $_GET;
						$this->ExecuteFunction($_GET, 'ServiceSelectByServiceDepartmentOnUserContext', 
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