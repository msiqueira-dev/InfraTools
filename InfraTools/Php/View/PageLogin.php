<?php
/************************************************************************
Class: PageLogin.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for login. 
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

class PageLogin extends PageInfraTools
{	
	/*  Variaveis de página para controle de exibição de elementos */
	public $DisableGenericHtml = TRUE;
	
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
		$this->PageCheckLogin = FALSE;
		parent::__construct($Config, $Language, $Page);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_HOME));
		}
		else
		{
			if (strpos($_SERVER['REQUEST_URI'],'Login') == TRUE)
			{
				$this->DisableGenericHtml = FALSE;
				if($this->CheckInstanceUser() != ConfigInfraTools::SUCCESS)
				{
					if($this->CheckLogin($this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					{
						Page::GetCurrentDomain($domain);
						$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" .
												      str_replace("_","",ConfigInfraTools::PAGE_HOME));
					}
				}
				else
				{
					Page::GetCurrentDomain($domain);
					$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" .
												  str_replace("_","",ConfigInfraTools::PAGE_HOME));
				}
			}
		}
	}

	public function LoadPage()
	{
		$this->LoadHtml(TRUE);
	}
}
?>