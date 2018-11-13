<?php
/************************************************************************
Class: PageAdminTypeUser.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/Model/FormValidator.php
Description: 
			Classe que trata da administração dos tipos de usuários.
Functions: 
			protected function ExecuteFunction($PostForm, $Function, $Parameter, &$ObjectToFill, $Debug);
			protected function LoadDataFromSession($SessionKey, $Function, &$Instance);
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
	public static function __create($Page, $Language)
	{
		$class = __CLASS__;
		return new $class($Page, $Language);
	}
	
	/* Constructor */
	protected function __construct($Page, $Language) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = TRUE;
		parent::__construct($Page, $Language);
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
	
	protected function ExecuteFunction($PostForm, $Function, $Parameter, &$ObjectToFill, $Debug)
	{
		foreach($PostForm as $postElementKey=>$postElementValue)
		{
			$postElementKey = strtoupper($postElementKey);
			if(strpos($postElementKey, 'LIST') !== false)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if(strpos($postElementKey, 'BACK') !== false)
				{
					$this->InputLimitOne = $this->InputLimitOne - 25;
					$this->InputLimitTwo = $this->InputLimitTwo - 25;
					if($this->InputLimitOne < 0)
						$this->InputLimitOne = 0;
					if($this->InputLimitTwo <= 0)
						$this->InputLimitTwo = 25;
				}
				elseif (strpos($postElementKey, 'FORWARD') !== false) 
				{
					$this->InputLimitOne = $this->InputLimitOne + 25;
					$this->InputLimitTwo = $this->InputLimitTwo + 25;	
					$Function($this->InputLimitOne, $this->InputLimitTwo, $ObjectToFill, 
							  $rowCount, $Debug);
					if($this->InputLimitOne > $rowCount)
					{
						$this->InputLimitOne = $this->InputLimitOne - 25;
						$this->InputLimitTwo = $this->InputLimitTwo - 25;
					}
					elseif($this->InputLimitTwo > $rowCount)
					{
						$this->InputLimitOne = $this->InputLimitOne - 25;
						$this->InputLimitTwo = $this->InputLimitTwo - 25;
					}
				}
				if($Parameter != NULL)
					return $this->$Function($this->InputLimitOne, $this->InputLimitTwo, $Parameter, $ObjectToFill, 
											$rowCount, $this->InputValueHeaderDebug);
				else return $this->$Function($this->InputLimitOne, $this->InputLimitTwo, $ObjectToFill, 
											 $rowCount, $this->InputValueHeaderDebug);
			}
			elseif(strpos($postElementKey, 'SELECT') !== false)
			{
				return $this->$Function($Parameter, $ObjectToFill, $this->InputValueHeaderDebug);
			}
		}
	}
	
	protected function LoadDataFromSession($SessionKey, $Function, &$Instance)
	{
		if(isset($Function) && isset($SessionKey))
		{
			if($this->Session->GetSessionValue($SessionKey, $Instance) == ConfigInfraTools::SUCCESS)
			{	
				return $this->$Function($Instance);
			}
		}
		else return ConfigInfraTools::ERROR;
	}
	
	public function LoadPage()
	{
		$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_PAGE_SACK);
		$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_PAGE_STACK_NUMBER);
		$this->LoadHtml(FALSE);
	} 
}
?>