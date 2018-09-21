<?php
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

class PageCorporation extends PageInfraTools
{	
	/* Constructor */
	public function __construct() 
	{
		$this->Page = $this->GetCurrentPage($Language);
		$this->PageCheckLogin = TRUE;
		parent::__construct($Language);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
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
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
				$this->InputFocus = ConfigInfraTools::LOGIN_USER;
				echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::LOGIN_FORM, $this->InputFocus);
			}
			else 
			{
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . str_replace("_", "", $this->Page) . ".php");
			}
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
		$this->InputFocus = ConfigInfraTools::LOGIN_USER;
		$this->LoadHtml();
	}
}
?>