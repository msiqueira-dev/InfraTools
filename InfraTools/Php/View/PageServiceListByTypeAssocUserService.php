<?php
/************************************************************************
Class: PageServiceListByTypeAssocUserService.php
Creation: 21/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Classe que trata da página de listagem de serviços.
Functions: 
			public    function GetCurrentPage();
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
	public $ArrayInstanceInfraToolService = NULL;
	public $ArrayInstanceInfraToolsTypeAssocUserService = NULL;
	
	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Language);
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}

	public function LoadPage()
	{
		if($this->CheckInstanceUser() == ConfigInfraTools::SUCCESS)
		{
			$return = $this->TypeAssocUserServiceSelectOnUserContextNoLimit($this->ArrayInstanceInfraToolsTypeAssocUserService, 
														 $this->User->GetEmail(), 
														 $this->InputValueHeaderDebug);
			if(isset($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE_SUBMIT]))
			{
				if($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE_SUBMIT] 
				   != ConfigInfraTools::FORM_SELECT_NONE)
					$this->InputValueTypeAssocUserServiceDescription = 
					$_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE_SUBMIT];	
				else $this->InputValueTypeAssocUserServiceDescription = NULL;
			}
			else $this->InputValueTypeAssocUserServiceDescription = NULL;

			//SERVICE LIST BY TYPE ASSOC USER SERVICE BACK SUBMIT
			if($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_BACK))
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
				if($this->InputLimitOne < 0)
					$this->InputLimitOne = 0;
				if($this->InputLimitTwo <= 0)
					$this->InputLimitTwo = 25;
				$this->ServiceSelectByTypeAssocUserServiceOnUserContext(
															   $this->InputValueTypeAssocUserServiceDescription,
															   $this->User->GetEmail(),
															   $this->InputLimitOne, 
															   $this->InputLimitTwo, 
															   $this->ArrayInfraToolsService,
															   $rowCount,
															   $this->InputValueHeaderDebug);
			}
			//SERVICE LIST BY TYPE ASSOC USER SERVICE FORWARD SUBMIT
			elseif($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_FORWARD))
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
				$this->ServiceSelectByTypeAssocUserServiceOnUserContext(
															   $this->InputValueTypeAssocUserServiceDescription,
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
					$this->ServiceSelectByTypeAssocUserServiceOnUserContext(
																   $this->InputValueTypeAssocUserServiceDescription,
																   $this->User->GetEmail(),
																   $this->InputLimitOne, 
																   $this->InputLimitTwo, 
																   $this->ArrayInfraToolsService,
																   $rowCount,
																   $this->InputValueHeaderDebug);
				}
			}
			//SERVICE LIST BY TYPE ASSOC USER SERVICE SELECT SUBMIT
			elseif(isset($_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT]))
			{

				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT]);
			}
			//SERVICE LIST BY TYPE
			else
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				$return = $this->ServiceSelectByTypeAssocUserServiceOnUserContext(
															   $this->InputValueTypeAssocUserServiceDescription,
															   $this->User->GetEmail(),
															   $this->InputLimitOne, 
															   $this->InputLimitTwo, 
															   $this->ArrayInfraToolsService,
															   $rowCount,
															   $this->InputValueHeaderDebug);
				$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE . "_x"] = "1";
				$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE . "_y"] = "1";
				$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE] = ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE;
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>