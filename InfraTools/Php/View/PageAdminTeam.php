<?php
/************************************************************************
Class: PageAdminTeam.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class for team management.
Functions: 
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

class PageAdminTeam extends PageAdmin
{
	protected $InstanceTeam     = NULL;
	public    $ArrayTeam        = NULL;
	public    $ArrayTeamMembers = NULL;
	
	/* __create */
	public static function __create($Page, $Language)
	{
		$class = __CLASS__;
		return new $class($Page, $Language);
	}
	
	/* Constructor */
	protected function __construct($Page, $Language) 
	{
		parent::__construct($Page, $Language);
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//TEAM LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_LIST))
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$this->TeamSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayTeam, $rowCount, $this->InputValueHeaderDebug);
		}
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_SELECT))
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		//TEAM LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_LIST_BACK))
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$this->TeamSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayTeam, $rowCount, $this->InputValueHeaderDebug);
		}
		//TEAM LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_LIST_FORWARD))
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			if($this->InputLimitOne > 250)
				$this->InputLimitOne = 250;
			if($this->InputLimitTwo > 275)
				$this->InputLimitTwo = 275;
			$this->TeamSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayTeam, $rowCount, $this->InputValueHeaderDebug);
			if($this->InputLimitOne > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
				$this->TeamSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayTeam, $rowCount, $this->InputValueHeaderDebug);
			}
			elseif($this->InputLimitTwo > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
			}
		}
		//TEAM LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT]) || 
			   isset($_POST[ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT_NAME]))
		{
			if($this->TeamSelectByTeamId($_POST[ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT],
										 $this->InstanceTeam, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_REGISTER))
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_REGISTER;
		//TEAM REGISTER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_REGISTER_CANCEL]))
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		//TEAM REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_REGISTER_SUBMIT]))
		{
			if($this->TeamInsert($_POST[ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION],
								 $_POST[ConfigInfraTools::FORM_FIELD_TEAM_NAME],
								 $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_REGISTER;
		}
		//TEAM SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT]))
		{
			if($this->TeamSelectByTeamId($_POST[ConfigInfraTools::FORM_FIELD_TEAM_ID],
										 $this->InstanceTeam, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->TeamDeleteByTeamId($this->InstanceTeam, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
				else
				{
					if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW MANAGE MEMBERS
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_VIEW_MANAGE_MEMBERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam)  == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->UserSelectByTeamId($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceTeam->GetTeamId(),
										     $this->ArrayTeamMembers, $rowCount, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_MANAGE_MEMBERS;
				else
				{
					if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW MANAGE MEMBERS SELECT USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_LIST]))
		{
			if($this->InfraToolsUserSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
												  $this->InstanceUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			if($this->PageBody != ConfigInfraTools::PAGE_ADMIN_USER_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, 
												   $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					if($this->InfraToolsUserSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
												              $this->InstanceUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_MANAGE_MEMBERS;
				}
			}
		}
		//FORM_CORPORATION_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											  $this->InstanceCorporation, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FORM_DEPARTMENT_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->DepartmentSelectByDepartmentNameAndCorporationName
			                                  ($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME], 
											   $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
											   $this->InstanceInfraToolsDepartment, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FORM_USER_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->InfraToolsUserSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL], 
												      $this->InstanceUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		//TEAM VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_VIEW_UPDATE_SUBMIT]))
		{
			if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_UPDATE;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_UPDATE_CANCEL]))
		{
			if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->TeamUpdateByTeamId($_POST[ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION],
											 $_POST[ConfigInfraTools::FORM_FIELD_TEAM_NAME],
									         $this->InstanceTeam, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
				else
				{
					if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_UPDATE;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>