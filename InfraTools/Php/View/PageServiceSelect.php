<?php
/************************************************************************
Class: PageService.php
Creation: 19/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class that select a service.
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
	public $ArrayInstanceInfraToolsService    = NULL;
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
			$this->InputValueServiceIdRadio = ConfigInfraTools::CHECKBOX_CHECKED;
			$this->ReturnServiceIdRadioClass = "NotHidden";
			$this->ReturnServiceNameRadioClass = "Hidden";
			if($this->CheckGetOrPostContainsKey(ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS ||
			   $this->CheckGetOrPostContainsKey(ConfigInfraTools::FORM_SERVICE_LIST_BY_NAME) == ConfigInfraTools::SUCCESS)
			{
				if(isset($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_RADIO]))
				{
					if($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_RADIO] == ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO)
					{
						if($this->ExecuteFunction($_POST, 'ServiceSelectByServiceIdOnUserContext', 
												  array($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_ID],
														$this->User->GetEmail(),
														&$this->InstanceInfraToolsService,
													    &$this->InputValueTypeAssocUserServiceId),
												  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						{
							Page::GetCurrentDomain($domain);
							$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FORM_FIELD_SERVICE_ID]);
						}
						else $this->ShowDivReturnError("SERVICE_NOT_FOUND");
					}
					else
					{
						$this->ReturnServiceIdRadioClass   = "Hidden";
						$this->ReturnServiceNameRadioClass = "NotHidden";
						$this->InputValueServiceNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
						$_POST = array(ConfigInfraTools::FORM_SERVICE_LIST => ConfigInfraTools::FORM_SERVICE_LIST) + $_POST;
						if($this->ExecuteFunction($_POST, 'ServiceSelectByServiceNameOnUserContext', 
												  array($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_NAME],
														$this->User->GetEmail(),
														&$this->ArrayInstanceInfraToolsService),
												  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						{
							Page::GetCurrentDomain($domain);
							$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_LIST_BY_NAME)
											. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_NAME . "=" 
											. $_POST[ConfigInfraTools::FORM_FIELD_SERVICE_NAME]);
						}
						else $this->ShowDivReturnError("SERVICE_NOT_FOUND");
					}
				}
				else
				{
					$this->ReturnServiceIdRadioClass   = "Hidden";
					$this->ReturnServiceNameRadioClass = "NotHidden";
					$this->InputValueServiceNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
					$_POST = array(ConfigInfraTools::FORM_SERVICE_LIST => ConfigInfraTools::FORM_SERVICE_LIST) + $_POST;
					if($this->ExecuteFunction($_POST, 'ServiceSelectByServiceNameOnUserContext', 
											  array($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_NAME],
													$this->User->GetEmail(),
													&$this->ArrayInstanceInfraToolsService),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					{
						$this->PageBody = ConfigInfraTools::PAGE_SERVICE_LIST_BY_NAME;
						$this->ShowDivReturnEmpty();
					}
					else $this->ShowDivReturnError("SERVICE_NOT_FOUND");
				}	
			}
			elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_BY_ID_SUBMIT) 
				                               == ConfigInfraTools::SUCCESS)
			{

				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_BY_ID_SUBMIT]);
			}
			elseif($this->CheckGetContainsKey(ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
			{
				$return = $this->ServiceDeleteById($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID], 
												   $this->User->GetEmail(), 
												   $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->InputValueServiceIdRadio = "checked";
					
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
					$this->ShowDivReturnEmpty();
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