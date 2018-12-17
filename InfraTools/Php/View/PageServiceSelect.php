<?php
/************************************************************************
Class: PageService.php
Creation: 19/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Classe que trata da página de seleção de serviços.
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

class PageServiceSelect extends PageInfraTools
{
	public $ArrayInfraToolsService    = NULL;
	public $InstanceInfraToolsService = NULL;
	
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
			if(isset($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_SUBMIT]) && 
				  isset($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID]))
			{
				$return = $this->ServiceDeleteById($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID], 
												   $this->User->GetEmail(), 
												   $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->InputValueServiceIdRadio = "checked";
					$this->ReturnServiceIdRadioClass = "NotHidden";
					$this->ReturnServiceNameRadioClass = "Hidden";
				}
				else
				{
					$retImage = $this->ReturnImage;
					$retClass = $this->ReturnClass;
					$retText  = $this->ReturnText;
					$this->InputValueServiceId = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_ID];
					$return = $this->ServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
																		   $this->User->GetEmail(),
																		   $this->InstanceInfraToolsService,
																		   $this->InputValueTypeAssocUserServiceId,
																		   $this->InputValueHeaderDebug);
					if($return == ConfigInfraTools::SUCCESS)
					{
						$this->PageBody = ConfigInfraTools::PAGE_SERVICE_VIEW;
						$this->ServiceLoadData($this->InstanceInfraToolsService);
						$this->ReturnImage = $retImage;
						$this->ReturnClass = $retClass;
						$this->ReturnText  = $retText;
					}
				}
			}
			elseif(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_ID]))
			{
				$this->InputValueServiceId = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_ID];
				$this->InputValueServiceIdRadio = "checked";
				$this->ReturnServiceIdRadioClass = "NotHidden";
				$this->ReturnServiceNameRadioClass = "Hidden";
				$return = $this->ServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
																	   $this->User->GetEmail(), 
																	   $this->InstanceInfraToolsService,
																	   $this->InputValueTypeAssocUserServiceId,
																	   $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->PageBody = ConfigInfraTools::PAGE_SERVICE_VIEW;
					$this->ServiceLoadData($this->InstanceInfraToolsService);
					$this->ReturnClass = "DivHidden";
					$this->ReturnImage = "DivDisplayNone";
					$this->ReturnText  = "";
				}
			}
			elseif(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_NAME]))
			{
				$this->InputValueServiceName = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_NAME];
				$this->InputValueServiceNameRadio = "checked";
				$this->ReturnServiceNameRadioClass = "NotHidden";
				$this->ReturnServiceIdRadioClass = "Hidden";
				if($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_BACK))
				{
					$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
					$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
					if($this->InputLimitOne < 0)
						$this->InputLimitOne = 0;
					if($this->InputLimitTwo <= 0)
						$this->InputLimitTwo = 25;
					$return = $this->ServiceSelectByServiceNameOnUserContext($this->InputValueServiceName,
																			 $this->User->GetEmail(),
																			 $this->InputLimitOne, 
																			 $this->InputLimitTwo, 
																			 $this->ArrayInfraToolsService,
																			 $rowCount,
																			 $this->InputValueHeaderDebug);
				}
				//SERVICE LIST BY NAME FORWARD SUBMIT
				elseif($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_FORWARD))
				{
					$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
					$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
					$return = $this->ServiceSelectByServiceNameOnUserContext($this->InputValueServiceName,
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
						$this->ServiceSelectByServiceNameOnUserContext($this->InputValueServiceName,
																	   $this->User->GetEmail(),
																	   $this->InputLimitOne, 
																	   $this->InputLimitTwo, 
																	   $this->ArrayInfraToolsService,
																	   $rowCount,
																	   $this->InputValueHeaderDebug);
					}
				}
				//SERVICE LIST SELECT SUBMIT
				elseif(isset($_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_SELECT_BY_ID_SUBMIT]))
				{

					Page::GetCurrentDomain($domain);
					$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
												. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
												. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
												. $_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME_SELECT_BY_ID_SUBMIT]);
				}
				//SERVICE LIST BY NAME
				else
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$return = $this->ServiceSelectByServiceNameOnUserContext($this->InputValueServiceName,
																		  $this->User->GetEmail(),
																		  $this->InputLimitOne, $this->InputLimitTwo, 
																		  $this->ArrayInfraToolsService,
																		  $rowCount,
																		  $this->InputValueHeaderDebug);
					$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME . "_x"] = "1";
					$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME . "_y"] = "1";
					$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME] = ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME;
				}
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->Page = str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_LIST_BY_NAME);
					$this->ReturnImage = "DivDisplayNone";
					$this->ReturnClass = "DivHidden";
					$this->ReturnText  = "";
				}
			}
			elseif(isset($_GET[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID]))
			{
				$this->InputValueServiceIdRadio = "checked";
				$this->ReturnServiceIdRadioClass = "NotHidden";
				$this->ReturnServiceNameRadioClass = "Hidden";
				$return = $this->ServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
																	   $this->User->GetEmail(), 
																	   $this->InstanceInfraToolsService,
																	   $this->InputValueTypeAssocUserServiceId,
																	   $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->PageBody = ConfigInfraTools::PAGE_SERVICE_VIEW;
					$this->ServiceLoadData($this->InstanceInfraToolsService);
					$this->ReturnClass = "DivHidden";
					$this->ReturnImage = "DivDisplayNone";
					$this->ReturnText  = "";
				}
				else $this->ShowDivReturnSuccess("SERVICE_DELETE_SUCCESS");
			}
			else
			{
				$this->InputValueServiceIdRadio = "checked";
				$this->ReturnServiceIdRadioClass = "NotHidden";
				$this->ReturnServiceNameRadioClass = "Hidden";
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>