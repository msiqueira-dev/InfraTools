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
			protected function ExecuteFunction($PostForm, $Function, $ArrayParameter, $Debug);
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
	
	protected function ExecuteFunction($PostForm, $Function, $ArrayParameter, $Debug)
	{
		foreach($PostForm as $postElementKey=>$postElementValue)
		{
			$postElementKey = strtoupper($postElementKey);
			if((strpos($postElementKey, 'LIST') !== FALSE) && strpos($postElementKey, 'LIMIT') == FALSE)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if(strpos($postElementKey, 'BACK') !== FALSE)
				{
					$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
					$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
					if($this->InputLimitOne < 0)
						$this->InputLimitOne = 0;
					if($this->InputLimitTwo <= 0)
						$this->InputLimitTwo = 25;
				}
				elseif (strpos($postElementKey, 'FORWARD') !== FALSE) 
				{
					$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
					$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
					$ArrayParameterTemp = $ArrayParameter;
					array_unshift($ArrayParameterTemp, $this->InputLimitOne, $this->InputLimitTwo);
				    $ArrayParameter[count($ArrayParameterTemp)] = &$rowCount;
				    $ArrayParameterTemp[count($ArrayParameterTemp)] = &$rowCount;
					array_push($ArrayParameterTemp, $Debug);
					$return = call_user_func_array(array($this, $Function), $ArrayParameterTemp);
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
					if($return == ConfigInfraTools::SUCCESS)
						return Config::SUCCESS;
					else 
					{
						array_unshift($ArrayParameter, $this->InputLimitOne, $this->InputLimitTwo);
						$ArrayParameter[count($ArrayParameter)] = &$rowCount;
						array_push($ArrayParameter, $Debug);
						return call_user_func_array(array($this, $Function), $ArrayParameter);
					}
				}
				array_unshift($ArrayParameter, $this->InputLimitOne, $this->InputLimitTwo);
				$ArrayParameter[count($ArrayParameter)] = &$rowCount;
				array_push($ArrayParameter, $Debug);
				return call_user_func_array(array($this, $Function), $ArrayParameter);
			}
			elseif(strpos($postElementKey, 'LIST') == FALSE)
			{
				array_push($ArrayParameter, $Debug);
				if($Debug)
				{
					echo "<b>ArrayParameter</b>:<br>";
					foreach ($ArrayParameter as $key => $value)
					{
						if(is_object($value))
							{echo "<b>" . $key . "</b>: "; print_r($value); echo "<br>";}
						else
							echo "<b>" . $key . "</b>: " . $value . "<br>";	
					}
				}
				return call_user_func_array(array($this, $Function), $ArrayParameter); 
			}
		}
	}
	
	protected function LoadDataFromSession($SessionKey, $Function, &$Instance)
	{
		if(isset($Function) && isset($SessionKey))
		{
			if(!isset($Instance))
			{
				if($this->Session->GetSessionValue($SessionKey, $Instance) != ConfigInfraTools::SUCCESS)
				{	
					return ConfigInfraTools::ERROR;
				}
			}
			return $this->$Function($Instance);
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