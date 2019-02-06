<?php
/************************************************************************
Class: PageAdminTypeUser.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Classe que trata da administração dos tipos de usuários.
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


class PageAdmin extends PageInfraTools
{	
	public $InputLimitOne                                                = NULL;
	public $InputLimitTwo                                                = NULL;
	public $ArrayInstanceInfraToolsCorporation                           = "";
	public $ArrayInstanceInfraToolsTypeUser                              = "";

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
		$this->PageCheckLogin = TRUE;
		parent::__construct($Config, $Language, $Page);
		if($this->User != NULL)
		{
			if(!$this->User->CheckSuperUser())
				$this->PageEnabled = FALSE;
		}
		else $this->PageEnabled = FALSE;
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_HOME));
		}
	}
	
	protected function AdminGoBack(&$PageFormBack)
	{
		//FORM SUBMIT BACK
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_SB_BACK) == ConfigInfraTools::RET_OK)
		{
			if($this->PageStackSessionLoad() == ConfigInfraTools::RET_ERROR)
			{
				Page::GetCurrentDomain($domain);
				$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								            . str_replace("_","",ConfigInfraTools::PAGE_ADMIN));
			}
			$PageFormBack = TRUE;
		}
	}
	
	public function LoadPage()
	{
		$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_PAGE_SACK);
		$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_PAGE_STACK_NUMBER);
		$this->LoadHtml(FALSE);
	} 
}
?>