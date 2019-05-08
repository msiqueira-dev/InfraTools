<?php
/************************************************************************
Class: PageAdminCountry.php
Creation: 2016/09/30
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for countries management.
Functions: 
			protected function BuildSmartyTags();
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}

class PageAdminCountry extends PageAdmin
{
	public $ArrayInstanceCountry = NULL;
	
	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		parent::__construct($Config, $Language, $Page);
	}

	protected function BuildSmartyTags()
	{
		if(parent::BuildSmartyTags() == ConfigInfraTools::RET_OK)
		{
			$this->Smarty->assign('FM_COUNTRY', ConfigInfraTools::FM_COUNTRY);
			$this->Smarty->assign('FM_COUNTRY_LST', ConfigInfraTools::FM_COUNTRY_LST);
			$this->Smarty->assign('FM_COUNTRY_LST_BACK', ConfigInfraTools::FM_COUNTRY_LST_BACK);
			$this->Smarty->assign('FM_COUNTRY_LST_FORWARD', ConfigInfraTools::FM_COUNTRY_LST_FORWARD);
			$this->Smarty->assign('FIELD_COUNTRY_NAME_TEXT', $this->InstanceLanguageText->GetText('FIELD_COUNTRY_NAME'));
			$this->Smarty->assign('FIELD_COUNTRY_ABBREVIATION_TEXT', $this->InstanceLanguageText->GetText('FIELD_COUNTRY_ABBREVIATION'));
			$this->Smarty->assign('FIELD_REGION_CODE_TEXT', $this->InstanceLanguageText->GetText('FIELD_REGION_CODE'));
			
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_COUNTRY", array($this->ArrayInstanceCountry));
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;
	}
	
	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_COUNTRY_LST;
		$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                                      str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_COUNTRY_LST)) . ".php";
		$this->AdminGoBack($PageFormBack);
		
		if(empty($_POST))
			$_POST = array(ConfigInfraTools::FM_COUNTRY_LST => ConfigInfraTools::FM_COUNTRY_LST) + $_POST;
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_COUNTRY_LST) != ConfigInfraTools::RET_OK &&
			   $this->CheckPostContainsKey(ConfigInfraTools::FM_COUNTRY_LST_BACK) != ConfigInfraTools::RET_OK &&
			   $this->CheckPostContainsKey(ConfigInfraTools::FM_COUNTRY_LST_FORWARD) != ConfigInfraTools::RET_OK)
			$_POST = array(ConfigInfraTools::FM_COUNTRY_LST => ConfigInfraTools::FM_COUNTRY_LST) + $_POST;
		$this->ExecuteFunction($_POST, 'CountrySelect', array(&$this->ArrayInstanceCountry), $this->InputValueHeaderDebug);
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>