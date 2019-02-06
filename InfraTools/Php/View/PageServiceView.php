<?php
/************************************************************************
Class: PageServiceView.php
Creation: 19/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class that view a service.
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

class PageServiceView extends PageInfraTools
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
		parent::__construct($Config, $Language, $Page);
	}

	public function LoadPage()
	{
		if(isset($_GET[ConfigInfraTools::FIELD_SERVICE_ID]) &&
		   !isset($_POST[ConfigInfraTools::FM_SERVICE_VIEW_DEL_SB]) &&
		   !isset($_POST[ConfigInfraTools::FM_SERVICE_VIEW_UPDT_SB]) &&
		   !isset($_POST[ConfigInfraTools::FM_SERVICE_UPDT_CANCEL]) &&
		   !isset($_POST[ConfigInfraTools::FM_SERVICE_UPDT_SB]))
		{
			$this->InputValueServiceId = $_GET[ConfigInfraTools::FIELD_SERVICE_ID];
			$return = $this->InfraToolsServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
														           $this->User->GetEmail(), 
														           $this->InstanceInfraToolsService,
																   $this->InputValueTypeAssocUserServiceId,
			                                                       $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->Page = str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW);
				$this->InfraToolsServiceLoadData($this->InstanceInfraToolsService);
				$this->ReturnImage = "DivDisplayNone";
				$this->ReturnClass = "DivHidden";
				$this->ReturnText  = "";
			}
		}
		elseif(isset($_POST[ConfigInfraTools::FM_SERVICE_VIEW_DEL_SB]) && 
			  isset($_POST[ConfigInfraTools::FM_SERVICE_VIEW_DEL_HIDDEN_ID]))
		{
			$return = $this->InfraToolsServiceDeleteByServiceId($_POST[ConfigInfraTools::FM_SERVICE_VIEW_DEL_HIDDEN_ID], 
											   $this->User->GetEmail(), 
											   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::RET_OK)
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
									        . str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SEL)
								            . "?" . ConfigInfraTools::FM_SERVICE_VIEW_DEL_HIDDEN_ID . "=" 
											. $_POST[ConfigInfraTools::FM_SERVICE_VIEW_DEL_HIDDEN_ID]);
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
					$this->Page = str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW);
					$this->InfraToolsServiceLoadData($this->InstanceInfraToolsService);
					$this->ReturnImage = $retImage;
					$this->ReturnClass = $retClass;
					$this->ReturnText  = $retText;
				}
			}
		}
		elseif(isset($_POST[ConfigInfraTools::FM_SERVICE_VIEW_UPDT_SB]))
		{
			$this->Page = str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_UPDT);
			$this->InputValueServiceId = $_POST[ConfigInfraTools::FM_SERVICE_VIEW_UPDT_HIDDEN_ID];
			$return = $this->InfraToolsServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
														           $this->User->GetEmail(), 
														           $this->InstanceInfraToolsService, 
																   $this->InputValueTypeAssocUserServiceId,
			                                                       $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::RET_OK && $this->InputValueTypeAssocUserServiceId <= 2)
			{
				$return = $this->InfraToolsTypeServiceSelectNoLimit($this->ArrayInstanceInfraToolsTypeService, $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::RET_OK)
				{
					$this->InfraToolsServiceLoadData($this->InstanceInfraToolsService);
					if($this->InstanceInfraToolsService->GetServiceActive())
						$this->InputValueServiceActive = "checked";
					else $this->InputValueServiceActive = "";
					$this->ReturnClass = "DivHidden";
					$this->ReturnImage = "DivDisplayNone";
					$this->ReturnText  = "";
				}
				else
				{
					Page::GetCurrentDomain($domain);
					$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SEL));
				}
			}
			else
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SEL));
			}
		}
		elseif(isset($_POST[ConfigInfraTools::FM_SERVICE_UPDT_CANCEL]))
		{
			$this->InputValueServiceId = $_GET[ConfigInfraTools::FIELD_SERVICE_ID];
			$return = $this->InfraToolsServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
														                     $this->User->GetEmail(), 
														                     $this->InstanceInfraToolsService,
																             $this->InputValueTypeAssocUserServiceId,
			                                                                 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->Page = str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW);
				$this->InfraToolsServiceLoadData($this->InstanceInfraToolsService);
				$this->ReturnImage = "DivDisplayNone";
				$this->ReturnClass = "DivHidden";
				$this->ReturnText  = "";
			}
			else
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SEL));
			}
		}
		elseif(isset($_POST[ConfigInfraTools::FM_SERVICE_UPDT_SB]))
		{
			if(isset($_POST[ConfigInfraTools::FIELD_SERVICE_ACTIVE]))
				$this->InputValueServiceActive = TRUE;
			else $this->InputValueServiceActive = FALSE;
			$this->InputValueServiceDescription = $_POST[ConfigInfraTools::FIELD_SERVICE_DESCRIPTION];
			$this->InputValueServiceName        = $_POST[ConfigInfraTools::FIELD_SERVICE_NAME];
			$this->InputValueServiceType        = $_POST[ConfigInfraTools::FIELD_SERVICE_TYPE];
			$this->InputValueServiceId          = $_GET[ConfigInfraTools::FIELD_SERVICE_ID];
			$return = $this->InfraToolsServiceUpdateRestrictByServiceId($this->InputValueServiceActive, 
															            $this->InputValueServiceDescription, 
															            $this->InputValueServiceName, 
														                $this->InputValueServiceType, 
															            $this->InputValueServiceId, 
															            $this->InputValueHeaderDebug);
			$returnImage = $this->ReturnImage;
			$returnClass = $this->ReturnClass;
			$returnText  = $this->ReturnText;
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->Page = str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW);
				$this->ReturnImage = "DivDisplayNone";
				$this->ReturnClass = "DivHidden";
				$this->ReturnText  = "";
			}
			$return = $this->InfraToolsServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
															                 $this->User->GetEmail(), 
														   		             $this->InstanceInfraToolsService,
														                     $this->InputValueTypeAssocUserServiceId,
														                     $this->InputValueHeaderDebug);
			if($return != ConfigInfraTools::RET_OK)
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
									  str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SEL));
			}
			else
			{
				$this->InfraToolsServiceLoadData($this->InstanceInfraToolsService);
				$this->ReturnImage = $returnImage;
				$this->ReturnClass = $returnClass;
				$this->ReturnText  = $returnText;
			}
			
		}
		elseif($this->InstanceInfraToolsService != NULL)
		{
			$this->Page = str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW);
			$this->InfraToolsServiceLoadData($this->InstanceInfraToolsService);
		}
		else
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SEL));
		}
		$this->LoadHtml(TRUE);
	}
}
?>