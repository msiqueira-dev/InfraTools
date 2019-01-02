<?php
/************************************************************************
Class: PageAdminTypeAssocUserTeam.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for type association of user and a team management.
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

if (!class_exists("TypeAssocUserTeam"))
{
	if(!file_exists(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php"))
		exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeAssocUserTeam');
	else include_once(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php");
}

class PageAdminTypeAssocUserTeam extends PageAdmin
{
	protected $InstanceTypeAssocUserTeam             = NULL;
	public    $ArrayInstanceTypeAssocUserTeam        = NULL;
	public    $ArrayInstanceTypeAssocUserTeamMembers = NULL;
	
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
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		//FORM SUBMIT BACK
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
		//FORM_TYPE_ASSOC_USER_TEAM_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeAssocUserTeamSelect', 
									  array(&$this->ArrayInstanceTypeAssocUserTeam),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST;
		}
		//FORM_TYPE_ASSOC_USER_TEAM_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER;
		//FORM_TYPE_ASSOC_USER_TEAM_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		//FORM_TYPE_ASSOC_USER_TEAM_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeAssocUserTeamInsert', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER;
		}
		//FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeAssocUserTeamSelectByTypeAssocUserTeamDescription', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION],
													&$this->InstanceTypeAssocUserTeam),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, "TypeAssocUserTeamLoadData", 
												  $this->InstanceTypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
			}
		}
		//FORM_TYPE_ASSOC_USER_TEAM_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, "TypeAssocUserTeamLoadData", 
										  $this->InstanceTypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription', 
										  array($this->InstanceTypeAssocUserTeam),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
			}
		}
		//FORM_TYPE_ASSOC_USER_TEAM_VIEW_LIST_USERS
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_LIST_USERS]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->InstanceTypeAssocUserTeam)  
			                                   == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->UserSelectByTypeAssocUserTeamDescription($this->InputLimitOne, $this->InputLimitTwo, 
														           $this->InstanceTypeAssocUserTeam->GetTypeAssocUserTeamDescription(),
										                           $this->ArrayInstanceTypeAssocUserTeamMembers, $rowCount, 
																   $this->InputValueHeaderDebug) 
				                                        == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_LIST_USERS;
				else
				{
					if($this->TypeAssocUserTeamLoadData($this->InstanceTypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		}
		//FORM_TYPE_ASSOC_USER_TEAM_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, "TypeAssocUserTeamLoadData", 
										  $this->InstanceTypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE;
		}
		//FORM_TYPE_ASSOC_USER_TEAM_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, "TypeAssocUserTeamLoadData", 
										  $this->InstanceTypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
		}
		//FORM_TYPE_ASSOC_USER_TEAM_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, 
														$this->InstanceTypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
			{
				$this->ExecuteFunction($_POST, 'TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription', 
									   array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION],
					                         &$this->InstanceTypeAssocUserTeam),
									   $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;	
			}
		}
		//FORM_TYPE_USER_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION],
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