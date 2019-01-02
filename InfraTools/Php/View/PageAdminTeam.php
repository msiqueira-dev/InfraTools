<?php
/************************************************************************
Class: PageAdminTeam.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
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
	public    $ArrayInstanceTeam        = NULL;
	public    $ArrayInstanceTeamMembers = NULL;
	protected $InstanceTeam             = NULL;
	
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

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//FORM_CORPORATION_SELECT_SUBMIT
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											&$this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FORM_DEPARTMENT_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName',
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME], 
											$_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
										    &$this->InstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FORM_TEAM_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TEAM_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TeamSelect', 
									  array(&$this->ArrayInstanceTeam),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_LIST;
		}
		//FORM_TEAM_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TEAM_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_REGISTER;
		//FORM_TEAM_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TEAM_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		//FORM_TEAM_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TEAM_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TeamInsert', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION],
								            $_POST[ConfigInfraTools::FORM_FIELD_TEAM_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_REGISTER;
		}
		//FORM_TEAM_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_TEAM_RADIO]))
			{
				if($_POST[ConfigInfraTools::FORM_FIELD_TEAM_RADIO] == ConfigInfraTools::FORM_FIELD_TEAM_RADIO_NAME)
				{
					if($this->ExecuteFunction($_POST, 'TeamSelectByTeamName', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_TEAM_NAME],
													&$this->ArrayInstanceTeam),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					{

						if(count($this->ArrayInstanceTeam) > 1)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_LIST;	
						else
						{
							$this->InstanceTeam = array_pop($this->ArrayInstanceTeam);
							if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TEAM, "TeamLoadData", 
														  $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
								$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
						}
					}
				}
				else
				{
					if($this->ExecuteFunction($_POST, 'TeamSelectByTeamId', 
										  array($_POST[ConfigInfraTools::FORM_FIELD_TEAM_ID],
												&$this->InstanceTeam),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
				}
			}
			else
			{
				if($this->ExecuteFunction($_POST, 'TeamSelectByTeamId', 
										  array($_POST[ConfigInfraTools::FORM_FIELD_TEAM_ID],
												&$this->InstanceTeam),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
			}
		}
		//FORM_TEAM_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TEAM_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TEAM, "TeamLoadData", 
										  $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'TeamDeleteByTeamId', 
										  array($this->InstanceTeam),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			}
		}
		//FORM_TEAM_VIEW_LIST_USERS
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_VIEW_LIST_USERS]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam)  == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->UserSelectByTeamId($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceTeam->GetTeamId(),
										     $this->ArrayInstanceTeamMembers, $rowCount, $this->InputValueHeaderDebug) 
				                             == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW_LIST_USERS;
				else
				{
					if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//FORM_TEAM_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TEAM_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TEAM, "TeamLoadData", 
										  $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_UPDATE;
		}
		//FORM_TEAM_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TEAM_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TEAM, "TeamLoadData", 
										  $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
		}
		//FORM_TEAM_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, 
														$this->InstanceTeam) == ConfigInfraTools::SUCCESS)
			{
				$this->ExecuteFunction($_POST, 'TeamUpdateByTeamId', 
									   array($_POST[ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION],
					                         $_POST[ConfigInfraTools::FORM_FIELD_TEAM_NAME],
					                         &$this->InstanceTeam),
									   $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;	
			}
		}
		//FORM_TYPE_USER_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserId', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_ID],
									        &$this->InstanceTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FORM_USER_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByUserEmail', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
									        &$this->InstanceUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>