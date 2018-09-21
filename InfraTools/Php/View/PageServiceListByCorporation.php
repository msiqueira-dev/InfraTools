<?php
/************************************************************************
Class: PageServiceListByCorporation.php
Creation: 21/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageService.php
Description: 
			Classe que trata da página de listagem de serviços.
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
if (!class_exists("PageService"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageService.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageService.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageService');
}

class PageServiceListByCorporation extends PageService
{
	public $ArrayInstanceInfraToolsCorporation = NULL;
	public $ArrayInfraToolsService = NULL;
	
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
			$return = $this->CorporationSelectOnUserServiceContextNoLimit($this->User->GetEmail(),
											 $this->ArrayInstanceInfraToolsCorporation, 
											 $this->InputValueHeaderDebug);
			if(isset($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT]))
			{
				if($_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT] != ConfigInfraTools::FORM_SELECT_NONE)
					$this->InputValueServiceCorporation = $_GET[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT];	
				else $this->InputValueServiceCorporation = NULL;
			}
			else $this->InputValueServiceCorporation = NULL;

			//SERVICE LIST BY CORPORATION BACK SUBMIT
			if($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_BACK))
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
				if($this->InputLimitOne < 0)
					$this->InputLimitOne = 0;
				if($this->InputLimitTwo <= 0)
					$this->InputLimitTwo = 25;
				$return = $this->ServiceSelectByServiceCorporationOnUserContext($this->InputValueServiceCorporation,
																	            $this->User->GetEmail(),
																	            $this->InputLimitOne, 
																	            $this->InputLimitTwo, 
																	            $this->ArrayInfraToolsService,
																	            $rowCount,
																	            $this->InputValueHeaderDebug);
			}
			//SERVICE LIST BY CORPORATION FORWARD SUBMIT
			elseif($this->CheckInputImage(ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_FORWARD))
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
				$return = $this->ServiceSelectByServiceCorporationOnUserContext($this->InputValueServiceCorporation,
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
					$this->ServiceSelectByServiceCorporationOnUserContext($this->InputValueServiceCorporation,
																		  $this->User->GetEmail(),
																		  $this->InputLimitOne, 
																		  $this->InputLimitTwo, 
																		  $this->ArrayInfraToolsService,
																		  $rowCount,
																		  $this->InputValueHeaderDebug);
				}
			}
			//SERVICE LIST BY CORPORATION SELECT SUBMIT
			elseif(isset($_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_BY_ID_SUBMIT]))
			{

				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
											. str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_VIEW)
											. "?" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "=" 
											. $_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_BY_ID_SUBMIT]);
			}
			//SERVICE LIST BY CORPORATION
			else
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				$return = $this->ServiceSelectByServiceCorporationOnUserContext($this->InputValueServiceCorporation,
																	            $this->User->GetEmail(),
																	            $this->InputLimitOne, $this->InputLimitTwo, 
																	            $this->ArrayInfraToolsService,
																	            $rowCount,
																	            $this->InputValueHeaderDebug);
				$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION . "_x"] = "1";
				$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION . "_y"] = "1";
				$_POST[ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION] = ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION;
			}
		}
		$this->LoadHtml();
	}
}
?>