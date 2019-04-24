<?php
/************************************************************************
Class: PageAdminTeam.php
Creation: 2018/06/04
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
	public    $ArrayInstanceTeam           = NULL;
	public    $ArrayInstanceInfraToolsUser = NULL;
	protected $InstanceTeam                = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SEL;
		$this->InputValueTeamNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
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
										    &$this->InstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FM_TEAM_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TeamSelect', 
									  array(&$this->ArrayInstanceTeam),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_LST;
		}
		//FM_TEAM_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_REGISTER) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_REGISTER;
		//FM_TEAM_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SEL;
		//FM_TEAM_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TeamInsert', 
									  array($_POST[ConfigInfraTools::FIELD_TEAM_DESCRIPTION],
								            $_POST[ConfigInfraTools::FIELD_TEAM_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_REGISTER;
		}
		//FM_TEAM_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FIELD_TEAM_RADIO]))
			{
				if($_POST[ConfigInfraTools::FIELD_TEAM_RADIO] == ConfigInfraTools::FIELD_TEAM_RADIO_NAME)
				{
					if($this->ExecuteFunction($_POST, 'TeamSelectByTeamName', 
											  array($_POST[ConfigInfraTools::FIELD_TEAM_NAME],
													&$this->ArrayInstanceTeam),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					{

						if(count($this->ArrayInstanceTeam) > 1)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_LST;	
						else
						{
							$this->InstanceTeam = array_pop($this->ArrayInstanceTeam);
							if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TEAM, "TeamLoadData", 
														  $this->InstanceTeam) == ConfigInfraTools::RET_OK)
								$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
						}
					}
				}
				else
				{
					if($this->ExecuteFunction($_POST, 'TeamSelectByTeamId', 
										  array($_POST[ConfigInfraTools::FIELD_TEAM_ID],
												&$this->InstanceTeam),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
				}
			}
			else
			{
				if($this->ExecuteFunction($_POST, 'TeamSelectByTeamId', 
										  array($_POST[ConfigInfraTools::FIELD_TEAM_ID],
												&$this->InstanceTeam),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
			}
		}
		//FM_TEAM_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TEAM, "TeamLoadData", 
										  $this->InstanceTeam) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'TeamDeleteByTeamId', 
										  array($this->InstanceTeam),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_SEL;
			}
		}
		//FM_TEAM_VIEW_LST_USERS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_VIEW_LST_USERS_SB) == ConfigInfraTools::RET_OK)
		{	
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByTeamId', 
										  array($this->InstanceTeam->GetTeamId(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW_LST_USERS;
			}
		}
		//FM_TEAM_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TEAM, "TeamLoadData", 
										  $this->InstanceTeam) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_UPDT;
		}
		//FM_TEAM_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TEAM, "TeamLoadData", 
										  $this->InstanceTeam) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
		}
		//FM_TEAM_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TEAM_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, 
														$this->InstanceTeam) == ConfigInfraTools::RET_OK)
			{
				$this->ExecuteFunction($_POST, 'TeamUpdateByTeamId', 
									   array($_POST[ConfigInfraTools::FIELD_TEAM_DESCRIPTION],
					                         $_POST[ConfigInfraTools::FIELD_TEAM_NAME],
					                         &$this->InstanceTeam),
									   $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;	
			}
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
									        &$this->InstanceTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
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