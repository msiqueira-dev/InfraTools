<?php
/************************************************************************
Class: PageAdminTypeAssocUserTeam.php
Creation: 2018/06/04
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
	public $InstanceTypeAssocUserTeam      = NULL;
	public $ArrayInstanceTypeAssocUserTeam = NULL;
	public $ArrayInstanceInfraToolsUser    = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL;
		$this->AdminGoBack($PageFormBack);
		
		//FM_CORPORATION_SEL_SB
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
											&$this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FM_DEPARTMENT_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName',
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME], 
											$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
										    &$this->ArrayInstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					if(count($this->ArrayInstanceInfraToolsDepartment) == 1)
					{
						$this->InstanceInfraToolsDepartment = array_pop($this->ArrayInstanceInfraToolsDepartment);
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
														$this->InstanceInfraToolsDepartment) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					}
				}
		}
		//FM_TEAM_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TeamSelectByTeamId', 
								  array($_POST[ConfigInfraTools::FIELD_TEAM_ID],
										&$this->InstanceTeam),
								  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;	
		}
		//FM_TYPE_ASSOC_USER_TEAM_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeAssocUserTeamSelect', 
									  array(&$this->ArrayInstanceTypeAssocUserTeam),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LST;
		}
		//FM_TYPE_ASSOC_USER_TEAM_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_REGISTER) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER;
		//FM_TYPE_ASSOC_USER_TEAM_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL;
		//FM_TYPE_ASSOC_USER_TEAM_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeAssocUserTeamInsert', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER;
		}
		//FM_TYPE_ASSOC_USER_TEAM_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeAssocUserTeamSelectByTypeAssocUserTeamDescription', 
											  array($_POST[ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION],
													&$this->InstanceTypeAssocUserTeam),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, "TypeAssocUserTeamLoadData", 
												  $this->InstanceTypeAssocUserTeam) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
			}
		}
		//FM_TYPE_ASSOC_USER_TEAM_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, "TypeAssocUserTeamLoadData", 
										  $this->InstanceTypeAssocUserTeam) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription', 
										  array($this->InstanceTypeAssocUserTeam),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL;
			}
		}
		//FM_TYPE_ASSOC_USER_TEAM_VIEW_LST_USERS_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_VIEW_LST_USERS_SB]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->InstanceTypeAssocUserTeam) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByTypeAssocUserTeamDescription', 
										  array($this->InstanceTypeAssocUserTeam->GetTypeAssocUserTeamDescription(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_LST_USERS;
			}
		}
		//FM_TYPE_ASSOC_USER_TEAM_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, "TypeAssocUserTeamLoadData", 
										  $this->InstanceTypeAssocUserTeam) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDT;
		}
		//FM_TYPE_ASSOC_USER_TEAM_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, "TypeAssocUserTeamLoadData", 
										  $this->InstanceTypeAssocUserTeam) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
		}
		//FM_TYPE_ASSOC_USER_TEAM_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, 
														$this->InstanceTypeAssocUserTeam) == ConfigInfraTools::RET_OK)
			{
				$this->ExecuteFunction($_POST, 'TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription', 
									   array($_POST[ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION],
					                         &$this->InstanceTypeAssocUserTeam),
									   $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;	
			}
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
									        &$this->ArrayInstanceInfraToolsTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					
					if(count($this->ArrayInstanceInfraToolsTypeUser) == 1)
					{
						$this->InstanceInfraToolsTypeUser = array_pop($this->ArrayInstanceInfraToolsTypeUser);
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
														$this->InstanceInfraToolsTypeUser) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
					}
				}
		}
		//FM_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByUserEmail', 
									  array($_POST[ConfigInfraTools::FIELD_USER_EMAIL],
									        &$this->InstanceUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>