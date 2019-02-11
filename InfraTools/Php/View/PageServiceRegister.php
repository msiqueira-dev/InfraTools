<?php
/************************************************************************
Class: PageService.php
Creation: 2018/06/19
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class that register a new service.
Functions: 
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageServiceRegister extends PageInfraTools
{
	public $ArrayInstanceInfraToolsCorporation = NULL;
	public $ArrayInstanceInfraToolsDepartment  = NULL;
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
		$this->PageCheckLogin = TRUE;
		parent::__construct($Config, $Language, $Page);
	}

	public function LoadPage()
	{
		$this->ShowDivReturnEmpty();
		$returnClass = "DivHidden";
		$returnImage = "DivDisplayNone";
		$returnText  = "";
		if($this->CheckInstanceUser() == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FM_SERVICE_REGISTER_SB]) || 
			   isset($_POST[ConfigInfraTools::FIELD_SERVICE_NAME]))
			{
				if(isset($_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME]))
				{
					if($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] == ConfigInfraTools::FIELD_SEL_NONE)
						$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME] = NULL; 
				}
				$return = $this->InfraToolsServiceInsert(@$_POST[ConfigInfraTools::FIELD_SERVICE_ACTIVE], 
											             @$_POST[ConfigInfraTools::FIELD_CORPORATION_NAME], 
											             @$_POST[ConfigInfraTools::FIELD_SERVICE_CORPORATION_CAN_CHANGE],
		 							                     @$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
											             @$_POST[ConfigInfraTools::FIELD_SERVICE_DEPARTMENT_CAN_CHANGE],
									                     $_POST[ConfigInfraTools::FIELD_SERVICE_DESCRIPTION], 
											             $_POST[ConfigInfraTools::FIELD_SERVICE_NAME], 
											             $_POST[ConfigInfraTools::FIELD_SERVICE_TYPE],
											             $this->User->GetEmail(),
											             $this->InputValueHeaderDebug);
				$returnClass = $this->ReturnClass;
				$returnImage = $this->ReturnImage;
				$returnText  = $this->ReturnText;
				$return = $this->InfraToolsTypeServiceSelectNoLimit($this->ArrayInstanceInfraToolsTypeService, $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::RET_OK)
				{
					$return = $this->InfraToolsCorporationSelectOnUserServiceContextNoLimit(
						                     $this->User->GetEmail(),
											 $this->ArrayInstanceInfraToolsCorporation, 
											 $this->InputValueHeaderDebug);
					if($return == ConfigInfraTools::RET_OK)
					{
						$return = $this->InfraToolsDepartmentSelectOnUserServiceContextNoLimit(
							             $this->User->GetCorporationName(),
										 $this->User->GetEmail(),
										 $this->ArrayInstanceInfraToolsDepartment, 
										 $this->InputValueHeaderDebug);
					}
				}
				$this->ReturnClass = $returnClass;
				$this->ReturnImage = $returnImage;
				$this->ReturnText  = $returnText;
			}
			if(!isset($_GET[ConfigInfraTools::FM_SERVICE_REGISTER_SB]) || $return != ConfigInfraTools::RET_OK)
			{
				$return = $this->InfraToolsTypeServiceSelectNoLimit($this->ArrayInstanceInfraToolsTypeService, $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::RET_OK)
				{
					$return = $this->InfraToolsCorporationSelectOnUserServiceContextNoLimit(
						                     $this->User->GetEmail(),
											 $this->ArrayInstanceInfraToolsCorporation, 
											 $this->InputValueHeaderDebug);
					if($return == ConfigInfraTools::RET_OK)
					{
						$return = $this->InfraToolsDepartmentSelectOnUserServiceContextNoLimit(
							             $this->User->GetCorporationName(),
										 $this->User->GetEmail(),
										 $this->ArrayInstanceInfraToolsDepartment, 
										 $this->InputValueHeaderDebug);
					}
					$this->ReturnClass = $returnClass;
					$this->ReturnImage = $returnImage;
					$this->ReturnText  = $returnText;
				}
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>