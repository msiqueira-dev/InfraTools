<?php
/************************************************************************
Class: PageAdminTypeAssocUserTeam.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Classe que trata da administração dos tipos de vínculos com equipes.
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

if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}

if (!class_exists("TypeAssocUserTeam"))
{
	if(!file_exists(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php"))
		exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeAssocUserTeam');
	else include_once(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php");
}

class PageAdminTypeAssocUserTeam extends PageAdmin
{
	protected $TypeAssocUserTeam      = NULL;
	public    $ArrayTypeAssocUserTeam = NULL;
	
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
			include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
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
		$PageFormBack = FALSE;
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
		$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageFormLoad();
			$PageFormBack = TRUE;
		}
		//TYPE ASSOC USER TEAM LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$this->TypeAssocUserTeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
										   $this->ArrayTypeAssocUserTeam, $rowCount,
										   $this->InputValueHeaderDebug);
		}
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		//TYPE ASSOC USER TEAM LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$this->TypeAssocUserTeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
										   $this->ArrayTypeAssocUserTeam, $rowCount,
										   $this->InputValueHeaderDebug);
		}
		//TYPE ASSOC USER TEAM LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			if($this->InputLimitOne > 250)
				$this->InputLimitOne = 250;
			if($this->InputLimitTwo > 275)
				$this->InputLimitTwo = 275;
			$this->TypeAssocUserTeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
										   $this->ArrayTypeAssocUserTeam, $rowCount,
										   $this->InputValueHeaderDebug);
			if($this->InputLimitOne > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
				$this->TypeAssocUserTeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
											   $this->ArrayTypeAssocUserTeam, $rowCount,
											   $this->InputValueHeaderDebug);
			}
			elseif($this->InputLimitTwo > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
			}
		}
		//TYPE ASSOC USER TEAM LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_SELECT_SUBMIT]))
		{
			if($this->TypeAssocUserTeamSelectByTeamId($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_SELECT_SUBMIT],
													  $this->TypeAssocUserTeam, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
		}
		//TYPE ASSOC USER TEAM REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER;
		//TYPE ASSOC USER TEAM REGISTER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER_CANCEL]))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		//TYPE ASSOC USER TEAM REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER_SUBMIT]))
		{
			if($this->TypeAssocUserTeamInsert($_POST[Config::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION], 
													 $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER;
		}
		//TYPE ASSOC USER TEAM SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT]))
		{
			if($this->TypeAssocUserTeamSelectByTeamId($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_SELECT_SUBMIT],
													  $this->TypeAssocUserTeam, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
		}
		//TYPE ASSOC USER TEAM VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam) 
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeAssocUserTeamDeleteByTeamId($this->TypeAssocUserTeam, 
														  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
				else
				{
					if($this->TypeAssocUserTeamLoadData($this->TypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		}
		//TYPE ASSOC USER TEAM VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_UPDATE_SUBMIT]))
		{
			if($this->TypeAssocUserTeamLoadData($this->TypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		}
		//TYPE ASSOC USER TEAM VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_UPDATE_CANCEL]))
		{
			if($this->TypeAssocUserTeamLoadData($this->TypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		}
		//TYPE ASSOC USER TEAM VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeAssocUserTeamUpdateByTeamId($_POST[ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION],
														  $this->TypeAssocUserTeam, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TYPE_ASSOC_USER_TEAM_SELECT;
		} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>