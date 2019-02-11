<?php
/************************************************************************
Class: PageService.php
Creation: 2018/06/19
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
		if($this->CheckInstanceUser() == ConfigInfraTools::RET_OK)
		{
			$this->InputValueServiceIdRadio = ConfigInfraTools::CHECKBOX_CHECKED;
			$this->ReturnServiceIdRadioClass = "NotHidden";
			$this->ReturnServiceNameRadioClass = "Hidden";
			if($this->CheckGetOrPostContainsKey(ConfigInfraTools::FM_SERVICE_SEL_SB) == ConfigInfraTools::RET_OK ||
			   $this->CheckGetOrPostContainsKey(ConfigInfraTools::FM_SERVICE_LST_BY_NAME) == ConfigInfraTools::RET_OK)
			{
				if(isset($_POST[ConfigInfraTools::FIELD_SERVICE_RADIO]))
				{
					if($_POST[ConfigInfraTools::FIELD_SERVICE_RADIO] == ConfigInfraTools::FIELD_SERVICE_ID_RADIO)
					{
						if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceIdOnUserContext', 
												  array($_POST[ConfigInfraTools::FIELD_SERVICE_ID],
														$this->User->GetEmail(),
														&$this->InstanceInfraToolsService,
													    &$this->InputValueTypeAssocUserServiceId),
												  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						{
							Page::GetCurrentDomain($domain);
							$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FIELD_SERVICE_ID]);
						}
						else $this->ShowDivReturnError("SERVICE_NOT_FOUND");
					}
					else
					{
						$this->ReturnServiceIdRadioClass   = "Hidden";
						$this->ReturnServiceNameRadioClass = "NotHidden";
						$this->InputValueServiceNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
						$_POST = array(ConfigInfraTools::FM_SERVICE_LST => ConfigInfraTools::FM_SERVICE_LST) + $_POST;
						if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceNameOnUserContext', 
												  array($_POST[ConfigInfraTools::FIELD_SERVICE_NAME],
														$this->User->GetEmail(),
														&$this->ArrayInstanceInfraToolsService),
												  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						{
							Page::GetCurrentDomain($domain);
							$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_LST_BY_NAME)
											. "?" . ConfigInfraTools::FIELD_SERVICE_NAME . "=" 
											. $_POST[ConfigInfraTools::FIELD_SERVICE_NAME]);
						}
						else $this->ShowDivReturnError("SERVICE_NOT_FOUND");
					}
				}
				else
				{
					$this->ReturnServiceIdRadioClass   = "Hidden";
					$this->ReturnServiceNameRadioClass = "NotHidden";
					$this->InputValueServiceNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
					$_POST = array(ConfigInfraTools::FM_SERVICE_LST => ConfigInfraTools::FM_SERVICE_LST) + $_POST;
					if($this->ExecuteFunction($_POST, 'InfraToolsServiceSelectByServiceNameOnUserContext', 
											  array($_GET[ConfigInfraTools::FIELD_SERVICE_NAME],
													$this->User->GetEmail(),
													&$this->ArrayInstanceInfraToolsService),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					{
						$this->PageBody = ConfigInfraTools::PAGE_SERVICE_LST_BY_NAME;
						$this->ShowDivReturnEmpty();
					}
					else $this->ShowDivReturnError("SERVICE_NOT_FOUND");
				}	
			}
			elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_BY_ID_SB) 
				                               == ConfigInfraTools::RET_OK)
			{

				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FM_SERVICE_LST_BY_CORPORATION_SEL_BY_ID_SB]);
			}
			elseif($this->CheckGetContainsKey(ConfigInfraTools::FM_SERVICE_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
			{
				$return = $this->InfraToolsServiceDeleteByServiceId($_POST[ConfigInfraTools::FM_SERVICE_VIEW_DEL_HIDDEN_ID], 
												   $this->User->GetEmail(), 
												   $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::RET_OK)
				{
					$this->InputValueServiceIdRadio = "checked";
					
				}
				else
				{
					$retImage = $this->ReturnImage;
					$retClass = $this->ReturnClass;
					$retText  = $this->ReturnText;
					$this->InputValueServiceId = $_GET[ConfigInfraTools::FIELD_SERVICE_ID];
					$return = $this->InfraToolsServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
																		   $this->User->GetEmail(),
																		   $this->InstanceInfraToolsService,
																		   $this->InputValueTypeAssocUserServiceId,
																		   $this->InputValueHeaderDebug);
					if($return == ConfigInfraTools::RET_OK)
					{
						$this->PageBody = ConfigInfraTools::PAGE_SERVICE_VIEW;
						$this->InfraToolsServiceLoadData($this->InstanceInfraToolsService);
						$this->ReturnImage = $retImage;
						$this->ReturnClass = $retClass;
						$this->ReturnText  = $retText;
					}
				}
			}
			elseif(isset($_GET[ConfigInfraTools::FM_SERVICE_VIEW_DEL_HIDDEN_ID]))
			{
				$this->InputValueServiceIdRadio = "checked";
				$this->ReturnServiceIdRadioClass = "NotHidden";
				$this->ReturnServiceNameRadioClass = "Hidden";
				$return = $this->InfraToolsServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
																	   $this->User->GetEmail(), 
																	   $this->InstanceInfraToolsService,
																	   $this->InputValueTypeAssocUserServiceId,
																	   $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::RET_OK)
				{
					$this->PageBody = ConfigInfraTools::PAGE_SERVICE_VIEW;
					$this->InfraToolsServiceLoadData($this->InstanceInfraToolsService);
					$this->ShowDivReturnEmpty();
				}
				else $this->ShowDivReturnSuccess("SERVICE_DEL_SUCCESS");
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