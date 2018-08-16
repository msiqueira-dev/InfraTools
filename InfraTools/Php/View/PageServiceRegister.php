<?php
/************************************************************************
Class: PageService.php
Creation: 19/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Classe que trata da página do cadastro de serviços.
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

class PageServiceRegister extends PageInfraTools
{
	protected static $Instance;
	public $ArrayInstanceInfraToolsCorporation = NULL;
	public $ArrayInstanceInfraToolsDepartment  = NULL;
	public $ArrayInstanceInfraToolsTypeService = NULL;

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	public function __construct() 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct();
	}
	
	/* Singleton */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
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
		$returnClass = "";
		$returnImage = "";
		$returnText  = "";
		if($this->CheckInstanceUser() == ConfigInfraTools::SUCCESS)
		{
			if(isset($_GET[ConfigInfraTools::FORM_SERVICE_REGISTER_SUBMIT]) || 
			   isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_NAME]))
			{
				if(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE]))
					$this->InputValueServiceActive = TRUE;
				else $this->InputValueServiceActive = FALSE;
				if(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION]))
				{
					if($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION] != ConfigInfraTools::FORM_SELECT_NONE)
						$this->InputValueServiceCorporation = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION];
					else $this->InputValueServiceCorporation = NULL; 
				}
				else $this->InputValueServiceCorporation = NULL; 
				if(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION_CAN_CHANGE]))
					$this->InputValueServiceCorporationCanChange = TRUE;
				else $this->InputValueServiceCorporationCanChange = FALSE;
				if(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT]))
				{
					if($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION] != ConfigInfraTools::FORM_SELECT_NONE)
						$this->InputValueServiceDepartment = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT];
					else $this->InputValueServiceDepartment = NULL; 
				}
				else $this->InputValueServiceDepartment = NULL; 
				if(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT_CAN_CHANGE]))
					$this->InputValueServiceDepartmentCanChange = TRUE;
				else $this->InputValueServiceDepartmentCanChange = FALSE;
				if(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION]))
					$this->InputValueServiceDescription = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION];
				if(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_NAME]))
					$this->InputValueServiceName = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_NAME];
				if(isset($_GET[ConfigInfraTools::FORM_FIELD_SERVICE_TYPE]))
					$this->InputValueServiceType = $_GET[ConfigInfraTools::FORM_FIELD_SERVICE_TYPE];
				$return = $this->ServiceInsert($this->InputValueServiceActive, 
											   $this->InputValueServiceCorporation, 
											   $this->InputValueServiceCorporationCanChange,
									           $this->InputValueServiceDepartment, 
											   $this->InputValueServiceDepartmentCanChange,
									           $this->InputValueServiceDescription, 
											   $this->InputValueServiceName, 
											   $this->InputValueServiceType,
											   $this->InstanceInfraToolsUser->GetEmail(),
											   $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					Page::GetCurrentDomain($domain);
					$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" . 
					   			                  str_replace("_", "", ConfigInfraTools::PAGE_SERVICE_SELECT));
				}
				
				$returnClass = $this->ReturnClass;
				$returnImage = $this->ReturnImage;
				$returnText  = $this->ReturnText;
			}
			if(!isset($_GET[ConfigInfraTools::FORM_SERVICE_REGISTER_SUBMIT]) || $return != ConfigInfraTools::SUCCESS)
			{
				$return = $this->TypeServiceSelectNoLimit($this->ArrayInstanceInfraToolsTypeService, 
														  $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$return = $this->CorporationSelectOnUserServiceContextNoLimit(
						                     $this->InstanceInfraToolsUser->GetEmail(),
											 $this->ArrayInstanceInfraToolsCorporation, 
											 $this->InputValueHeaderDebug);
					if($return == ConfigInfraTools::SUCCESS)
					{
						$return = $this->DepartmentSelectOnUserServiceContextNoLimit(
							             $this->InstanceInfraToolsUser->GetCorporationName(),
										 $this->InstanceInfraToolsUser->GetEmail(),
										 $this->ArrayInstanceInfraToolsDepartment, 
										 $this->InputValueHeaderDebug);
					}
					$this->ReturnClass = $returnClass;
					$this->ReturnImage = $returnImage;
					$this->ReturnText  = $returnText;
				}
			}
		}
		$this->LoadHtml();
	}
}
?>