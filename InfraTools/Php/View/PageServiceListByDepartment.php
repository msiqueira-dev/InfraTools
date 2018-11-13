<?php
/************************************************************************
Class: PageServiceListByDepartment.php
Creation: 21/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Classe que trata da página de listagem de serviços.
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
	public $ArrayInfraToolsService = NULL;
	
	/* __create */
	public static function __create($Page, $Language)
	{
		$class = __CLASS__;
		return new $class($Page, $Language);
	}
	
	/* Constructor */
	protected function __construct($Page, $Language) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Page, $Language);
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
					   != ConfigInfraTools::FORM_SELECT_NONE)
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
						if($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_DEPARTMENT_SUBMIT] != ConfigInfraTools::FORM_SELECT_NONE)
							$this->InputValueServiceDepartment = $_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_DEPARTMENT_SUBMIT];	
					}
					
					//SERVICE LIST BY DEPARTMENT BACK SUBMIT
					if($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_BACK))
					{
						$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
						$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
						if($this->InputLimitOne < 0)
							$this->InputLimitOne = 0;
						if($this->InputLimitTwo <= 0)
							$this->InputLimitTwo = 25;
						$this->ServiceSelectByServiceDepartmentOnUserContext($this->InputValueServiceCorporation,
																			 $this->InputValueServiceDepartment,
																			 $this->User->GetEmail(),
																			 $this->InputLimitOne, 
																			 $this->InputLimitTwo, 
																			 $this->ArrayInfraToolsService,
																			 $rowCount,
																			 $this->InputValueHeaderDebug);
					}
					//SERVICE LIST BY DEPARTMENT FORWARD SUBMIT
					elseif($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_FORWARD))
					{
						$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
						$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
						$this->ServiceSelectByServiceDepartmentOnUserContext($this->InputValueServiceCorporation,
																			 $this->InputValueServiceDepartment,
																			 $this->User->GetEmail(),
																			 $this->InputLimitOne, 
																			 $this->InputLimitTwo, 
																			 $this->ArrayInfraToolsService,
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
							$this->ServiceSelectByServiceDepartmentOnUserContext($this->InputValueServiceCorporation,
																			     $this->InputValueServiceDepartment,
																				 $this->User->GetEmail(),
																				 $this->InputLimitOne, 
																				 $this->InputLimitTwo, 
																				 $this->ArrayInfraToolsService,
																				 $rowCount,
																				 $this->InputValueHeaderDebug);
						}
					}
					//SERVICE LIST BY DEPARTMENT SELECT SUBMIT
					elseif(isset($_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_BY_ID_SUBMIT]))
					{

						Page::GetCurrentDomain($domain);
						$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
													. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
													. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
													. $_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_BY_ID_SUBMIT]);
					}
					//SERVICE LIST BY DEPARTMENT
					else
					{
						$this->InputLimitOne = 0;
						$this->InputLimitTwo = 25;
						$return = $this->ServiceSelectByServiceDepartmentOnUserContext($this->InputValueServiceCorporation,
																			           $this->InputValueServiceDepartment,
																					   $this->User->GetEmail(),
																					   $this->InputLimitOne, $this->InputLimitTwo, 
																					   $this->ArrayInfraToolsService,
																					   $rowCount,
																					   $this->InputValueHeaderDebug);
						$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT . "_x"] = "1";
						$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT . "_y"] = "1";
						$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT] = ConfigInfraTools::FORM_SERVICE_LIST_BY_DEPARTMENT;
					}
				}
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>