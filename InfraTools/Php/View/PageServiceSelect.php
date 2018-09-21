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

class PageServiceSelect extends PageInfraTools
{
	protected static $Instance;
	public $ArrayInfraToolsService     = NULL;
	public $InstanceInfraToolsService = NULL;
	
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
						$this->Page = ConfigInfraTools::PAGE_SERVICE_VIEW;
						$this->ServiceLoadData();
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
					$this->Page = ConfigInfraTools::PAGE_SERVICE_VIEW;
					$this->ServiceLoadData();
					$this->ReturnImage = "";
					$this->ReturnClass = "DivDisplayNone";
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
					$this->Page = ConfigInfraTools::PAGE_SERVICE_LIST_BY_NAME;
					$this->ReturnImage = "";
					$this->ReturnClass = "";
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
					$this->Page = ConfigInfraTools::PAGE_SERVICE_VIEW;
					$this->ServiceLoadData();
					$this->ReturnImage = "";
					$this->ReturnClass = "DivDisplayNone";
					$this->ReturnText  = "";
				}
				else
				{
					$this->ReturnText  = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_SUCCESS', $this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage = "<img src='" . $this->Config->DefaultServerImage . 
										 ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				}
			}
			else
			{
				$this->InputValueServiceIdRadio = "checked";
				$this->ReturnServiceIdRadioClass = "NotHidden";
				$this->ReturnServiceNameRadioClass = "Hidden";
			}
		}
		$this->LoadHtml();
	}
}
?>