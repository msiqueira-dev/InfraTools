<?php
/************************************************************************
Class: PageService.php
Creation: 19/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Classe que trata da página de vizualização de serviços.
Functions: 
			protected function LoadHtml();
			public    function GetCurrentPage();
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
	protected static $Instance;
	public $ArrayInstanceInfraToolsCorporation = NULL;
	public $ArrayInstanceInfraToolsDepartment  = NULL;
	public $ArrayInstanceInfraToolsTypeService = NULL;
	
	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Language);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}

	protected function LoadHtml()
	{
		$return = NULL;
		echo ConfigInfraTools::HTML_TAG_DOCTYPE;
		echo ConfigInfraTools::HTML_TAG_START;
		$return = $this->IncludeHeadAll(basename(__FILE__, '.php'));
		if ($return == ConfigInfraTools::SUCCESS)
		{
			echo ConfigInfraTools::HTML_TAG_BODY_START;
			echo "<div class='Wrapper'>";
			include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . ".php");
			$loginStatus = $this->CheckInstanceUser();
			if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
			   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
			{
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE 
							          . str_replace("_","",ConfigInfraTools::PAGE_NOT_LOGGED_IN) . ".php");
				$this->InputFocus = ConfigInfraTools::LOGIN_USER;
				echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::LOGIN_FORM, $this->InputFocus);
			}
			elseif($this->CheckInstanceUser() == ConfigInfraTools::USER_NOT_CONFIRMED)
			{
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE 
							          . str_replace("_","",ConfigInfraTools::PAGE_NOT_CONFIRMED) . ".php");
			}
			else include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . ConfigInfraTools::PATH_FOOTER);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		if(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_ID]) &&
		   !isset($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_SUBMIT]) &&
		   !isset($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE_SUBMIT]) &&
		   !isset($_POST[ConfigInfraTools::FORM_SERVICE_UPDATE_CANCEL]) &&
		   !isset($_POST[ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT]))
		{
			$this->InputValueServiceId = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_ID];
			$return = $this->ServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
														           $this->User->GetEmail(), 
														           $this->InstanceInfraToolsService,
																   $this->InputValueTypeAssocUserServiceId,
			                                                       $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Page = ConfigInfraTools::PAGE_SERVICE_VIEW;
				$this->ServiceLoadData();
				$this->ReturnImage = "";
				$this->ReturnClass = "DivDisplayNone";
				$this->ReturnText  = "";
			}
		}
		elseif(isset($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_SUBMIT]) && 
			  isset($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID]))
		{
			$return = $this->ServiceDeleteById($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID], 
											   $this->User->GetEmail(), 
											   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
									        . str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SELECT)
								            . "?" . ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID . "=" 
											. $_POST[ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID]);
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
					$this->Page = ConfigInfraTools::PAGE_SERVICE_VIEW;
					$this->ServiceLoadData();
					$this->ReturnImage = $retImage;
					$this->ReturnClass = $retClass;
					$this->ReturnText  = $retText;
				}
			}
		}
		elseif(isset($_POST[ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE_SUBMIT]))
		{
			$this->Page = ConfigInfraTools::PAGE_SERVICE_UPDATE;
			$this->InputValueServiceId = $_POST[ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE_HIDDEN_ID];
			$return = $this->ServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
														           $this->User->GetEmail(), 
														           $this->InstanceInfraToolsService, 
																   $this->InputValueTypeAssocUserServiceId,
			                                                       $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS && $this->InputValueTypeAssocUserServiceId <= 2)
			{
				$return = $this->TypeServiceSelectNoLimit($this->ArrayInstanceInfraToolsTypeService,
											              $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->ServiceLoadData();
					if($this->InstanceInfraToolsService->GetServiceActive())
						$this->InputValueServiceActive = "checked";
					else $this->InputValueServiceActive = "";
					$this->ReturnImage = "";
					$this->ReturnClass = "DivDisplayNone";
					$this->ReturnText  = "";
				}
				else
				{
					Page::GetCurrentDomain($domain);
					$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SELECT));
				}
			}
			else
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SELECT));
			}
		}
		elseif(isset($_POST[ConfigInfraTools::FORM_SERVICE_UPDATE_CANCEL]))
		{
			$this->InputValueServiceId = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_ID];
			$return = $this->ServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
														           $this->User->GetEmail(), 
														           $this->InstanceInfraToolsService,
																   $this->InputValueTypeAssocUserServiceId,
			                                                       $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Page = ConfigInfraTools::PAGE_SERVICE_VIEW;
				$this->ServiceLoadData();
				$this->ReturnImage = "DivDisplayNone";
				$this->ReturnClass = "";
				$this->ReturnText  = "";
			}
			else
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SELECT));
			}
		}
		elseif(isset($_POST[ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT]))
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE]))
				$this->InputValueServiceActive = TRUE;
			else $this->InputValueServiceActive = FALSE;
			$this->InputValueServiceDescription = $_POST[ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION];
			$this->InputValueServiceName        = $_POST[ConfigInfraTools::FORM_FIELD_SERVICE_NAME];
			$this->InputValueServiceType        = $_POST[ConfigInfraTools::FORM_FIELD_SERVICE_TYPE];
			$this->InputValueServiceId          = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_ID];
			$return = $this->ServiceUpdateRestrictByServiceId($this->InputValueServiceActive, 
															  $this->InputValueServiceDescription, 
															  $this->InputValueServiceName, 
														      $this->InputValueServiceType, 
															  $this->InputValueServiceId, 
															  $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $this->ServiceSelectByServiceIdOnUserContext($this->InputValueServiceId, 
														               $this->User->GetEmail(), 
														           $this->InstanceInfraToolsService,
																   $this->InputValueTypeAssocUserServiceId,
			                                                       $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_SERVICE_VIEW;
					$this->ServiceLoadData();
					$this->ReturnImage = "DivDisplayNone";
					$this->ReturnClass = "";
					$this->ReturnText  = "";
				}
				else
				{
					Page::GetCurrentDomain($domain);
					$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SELECT));
				}
			}
		}
		elseif($this->InstanceInfraToolsService != NULL)
		{
			$this->Page = ConfigInfraTools::PAGE_SERVICE_VIEW;
			$this->ServiceLoadData();
		}
		else
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
								          str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SELECT));
		}
		$this->LoadHtml();
	}
}
?>