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

class PageLogin extends PageInfraTools
{	
	/*  Variaveis de página para controle de exibição de elementos */
	public $DisableGenericHtml = TRUE;

	/* Constructor */
	public function __construct() 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct();
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
		$this->InputFocus = ConfigInfraTools::LOGIN_USER;
		$return = NULL;
		echo ConfigInfraTools::HTML_TAG_DOCTYPE;
		echo ConfigInfraTools::HTML_TAG_START;
		$return = $this->IncludeHeadAll(basename(__FILE__, '.php'));
		if ($return == ConfigInfraTools::SUCCESS)
		{
			echo ConfigInfraTools::HTML_TAG_BODY_START;
			echo "<div class='Wrapper'>";
			include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . ".php");
			include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . ConfigInfraTools::PATH_FOOTER);
			if($this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::SESS_LOGIN_TWO_STEP_VERIFICATION, $value) 
			                                               == ConfigInfraTools::SUCCESS)
			{
				$this->InputFocus = ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_CODE;
				echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_FORM, $this->InputFocus);
			}
			else echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::LOGIN_FORM, $this->InputFocus);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		$this->LoadHtml();
	}
}
?>