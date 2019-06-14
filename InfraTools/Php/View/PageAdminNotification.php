<?php
/************************************************************************
Class: PageAdminNotification.php
Creation: 2018/04/06
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for notification management.
Functions: 
			protected function BuildSmartyTags();
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
if (!class_exists("Notification"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Notification.php"))
		include_once(BASE_PATH_PHP_MODEL . "Notification.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Notification');
}


class PageAdminNotification extends PageAdmin
{
	public $ArrayInstanceNotification                    = NULL;
	public $ArrayInstanceInfraToolsUser                  = NULL;
	public $ArrayInstanceSelectNotificationByCorporation = NULL;
	public $ArrayInstanceSelectNotificationByDepartment  = NULL;
	public $ArrayInstanceSelectNotificationByRole        = NULL;
	public $ArrayInstanceSelectNotificationByTeam        = NULL;
	public $InstanceNotification                         = NULL;
	public $InputValueNotificationForAll                 = NULL;
	public $InputValueNotificationByCorporationName      = NULL;
	public $InputValueNotificationByDepartmentName       = NULL;
	public $InputValueNotificationByRole                 = NULL;
	public $InputValueNotificationByTeamName             = NULL;
	public $ReturnNotificationByCorporationClass         = NULL;
	public $ReturnNotificationByDepartmentNameClass      = NULL;
	public $ReturnNotificationByRoleClass                = NULL;
	public $ReturnNotificationByTeamNameClass            = NULL;
	
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
	
	protected function LoadAssociationsSelect()
	{
		$this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceSelectNotificationByCorporation),
									  $this->InputValueHeaderDebug);
		$this->ExecuteFunction($_POST, 'DepartmentSelectNoLimit', 
								  array(&$this->ArrayInstanceSelectNotificationByDepartment),
								  $this->InputValueHeaderDebug);
		$this->ExecuteFunction($_POST, 'RoleSelectNoLimit', 
								  array(&$this->ArrayInstanceSelectNotificationByRole),
								  $this->InputValueHeaderDebug);
		$this->ExecuteFunction($_POST, 'TeamSelectNoLimit', 
								  array(&$this->ArrayInstanceSelectNotificationByTeam),
								  $this->InputValueHeaderDebug);
		if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
		{
			$_POST = NULL;
			$_POST[ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB] = ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB;
			$this->ExecuteFunction($_POST, 'InfraToolsUserSelectByNotificationId', 
								   array($this->InstanceNotification->GetNotificationId(), 
										 &$this->ArrayInstanceInfraToolsUser),
								   $this->InputValueHeaderDebug);
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::RET_ERROR;
	}

	protected function BuildSmartyTags()
	{
		if(parent::BuildSmartyTags() == ConfigInfraTools::RET_OK)
		{
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_NOTIFICATION", array($this->ArrayInstanceNotification));
			$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_USER", array($this->ArrayInstanceInfraToolsUser));
			$this->Smarty->assign('FM_NOTIFICATION', ConfigInfraTools::FM_NOTIFICATION);
			$this->Smarty->assign('FM_NOTIFICATION_REGISTER', ConfigInfraTools::FM_NOTIFICATION_REGISTER);
			$this->Smarty->assign('FM_NOTIFICATION_REGISTER_CANCEL', ConfigInfraTools::FM_NOTIFICATION_REGISTER_CANCEL);
			$this->Smarty->assign('FM_NOTIFICATION_REGISTER_FORM', ConfigInfraTools::FM_NOTIFICATION_REGISTER_FORM);
			$this->Smarty->assign('FM_NOTIFICATION_REGISTER_SB', ConfigInfraTools::FM_NOTIFICATION_REGISTER_SB);
			$this->Smarty->assign('FM_NOTIFICATION_UPDT_CANCEL', ConfigInfraTools::FM_NOTIFICATION_UPDT_CANCEL);
			$this->Smarty->assign('FM_NOTIFICATION_UPDT_FORM', ConfigInfraTools::FM_NOTIFICATION_UPDT_FORM);
			$this->Smarty->assign('FM_NOTIFICATION_UPDT_SB', ConfigInfraTools::FM_NOTIFICATION_UPDT_SB);
			$this->Smarty->assign('FM_NOTIFICATION_VIEW_DEL', ConfigInfraTools::FM_NOTIFICATION_VIEW_DEL);
			$this->Smarty->assign('FM_NOTIFICATION_VIEW_DEL_SB', ConfigInfraTools::FM_NOTIFICATION_VIEW_DEL_SB);
			$this->Smarty->assign('FM_NOTIFICATION_VIEW_UPDT', ConfigInfraTools::FM_NOTIFICATION_VIEW_UPDT);
			$this->Smarty->assign('FM_NOTIFICATION_VIEW_UPDT_SB', ConfigInfraTools::FM_NOTIFICATION_VIEW_UPDT_SB);
			$this->Smarty->assign('FM_NOTIFICATION_VIEW_LST_USERS', ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS);
			$this->Smarty->assign('FM_NOTIFICATION_VIEW_LST_USERS_FORM', ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_FORM);
			$this->Smarty->assign('FM_NOTIFICATION_VIEW_LST_USERS_SB', ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB);
			$this->Smarty->assign('FM_NOTIFICATION_VIEW_LST_USERS_SB_BACK', ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB_BACK);
			$this->Smarty->assign('FM_NOTIFICATION_VIEW_LST_USERS_SB_FORWARD', ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB_FORWARD);
			return ConfigInfraTools::RET_OK;
		}
		return ConfigInfraTools::RET_ERROR;
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SEL;
		$this->InputValueNotificationOptionNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
		$this->ReturnNotificationOptionNameRadioClass   = "NotHidden";
		$this->ReturnNotificationOptionNumberRadioClass = "Hidden";
		$this->AdminGoBack($PageFormBack);
		
		//FM_CORPORATION_SEL_SB
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
											&$this->InstanceInfraToolsCorporation),
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
		//FM_NOTIFICATION_ASSOCIATE_USER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
										  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
		}
		//FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_ASSOCIATE) == ConfigInfraTools::RET_OK)
		{
			$ret = NULL;
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL) == ConfigInfraTools::RET_OK)
			{
				if($_POST[ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL] != Config::FIELD_SEL_NONE)
				{
					$ret = $this->ExecuteFunction($_POST, 'UserSelectNoLimit',
										  array(&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationInsert',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_CORPORATION_NAME) == ConfigInfraTools::RET_OK 
			   && $ret != ConfigInfraTools::RET_OK)
			{
				if($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] != Config::FIELD_SEL_NONE)
				{
					$ret = $this->ExecuteFunction($_POST, 'UserSelectByCorporationNameNoLimit',
										  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
												&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationInsert',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_DEPARTMENT_NAME) == ConfigInfraTools::RET_OK
				  && ($ret != ConfigInfraTools::RET_OK || $ret != ConfigInfraTools::RET_WARNING))
			{
				if($_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME] != Config::FIELD_SEL_NONE)
				{
					$array = explode(" - ", $_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME]);
					$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME] = $array[0];
					$_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] = $array[1];
					$ret = $this->ExecuteFunction($_POST, 'UserSelectByDepartmentNameNoLimit',
										  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
												$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
												&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationInsert',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_ROLE_NAME) == ConfigInfraTools::RET_OK
				  && ($ret != ConfigInfraTools::RET_OK || $ret != ConfigInfraTools::RET_WARNING))
			{
				if($_POST[ConfigInfraTools::FIELD_ROLE_NAME] != Config::FIELD_SEL_NONE)
				{
					$ret = $this->ExecuteFunction($_POST, 'UserSelectByRoleNameNoLimit',
										  array($_POST[ConfigInfraTools::FIELD_ROLE_NAME],
												&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationInsert',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_TEAM_NAME) == ConfigInfraTools::RET_OK
				  && ($ret != ConfigInfraTools::RET_OK || $ret != ConfigInfraTools::RET_WARNING))
			{
				if($_POST[ConfigInfraTools::FIELD_TEAM_NAME] != Config::FIELD_SEL_NONE)
				{
					$array = explode(" - ", $_POST[ConfigInfraTools::FIELD_TEAM_NAME]);
					$_POST[ConfigInfraTools::FIELD_TEAM_NAME] = $array[0];
					$_POST[ConfigInfraTools::FIELD_TEAM_ID] = $array[1];
					$ret = $this->ExecuteFunction($_POST, 'UserSelectByTeamIdNoLimit',
										  array($_POST[ConfigInfraTools::FIELD_TEAM_ID],
												&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationInsert',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if ($ret == ConfigInfraTools::RET_OK || $ret == ConfigInfraTools::RET_WARNING)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
			else 
			{
				if($this->LoadAssociationsSelect() == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_ASSOCIATE_USER;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
			}
			
		}
		//FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_ASSOCIATE_USER_SB_DISASSOCIATE) == ConfigInfraTools::RET_OK)
		{
			$ret = NULL;
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL) == ConfigInfraTools::RET_OK)
			{
				if($_POST[ConfigInfraTools::FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL] != Config::FIELD_SEL_NONE)
				{
					$ret = $this->ExecuteFunction($_POST, 'UserSelectNoLimit',
										  array(&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationDelete',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_CORPORATION_NAME) == ConfigInfraTools::RET_OK 
			   && $ret != ConfigInfraTools::RET_OK)
			{
				if($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] != Config::FIELD_SEL_NONE)
				{
					$ret = $this->ExecuteFunction($_POST, 'UserSelectByCorporationNameNoLimit',
										  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
												&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationDelete',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_DEPARTMENT_NAME) == ConfigInfraTools::RET_OK
				  && ($ret != ConfigInfraTools::RET_OK || $ret != ConfigInfraTools::RET_WARNING))
			{
				if($_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME] != Config::FIELD_SEL_NONE)
				{
					$array = explode(" - ", $_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME]);
					$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME] = $array[0];
					$_POST[ConfigInfraTools::FIELD_CORPORATION_NAME] = $array[1];
					$ret = $this->ExecuteFunction($_POST, 'UserSelectByDepartmentNameNoLimit',
										  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
												$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
												&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationDelete',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_ROLE_NAME) == ConfigInfraTools::RET_OK
				  && ($ret != ConfigInfraTools::RET_OK || $ret != ConfigInfraTools::RET_WARNING))
			{
				if($_POST[ConfigInfraTools::FIELD_ROLE_NAME] != Config::FIELD_SEL_NONE)
				{
					$ret = $this->ExecuteFunction($_POST, 'UserSelectByRoleNameNoLimit',
										  array($_POST[ConfigInfraTools::FIELD_ROLE_NAME],
												&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationDelete',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if($this->CheckPostContainsKey(ConfigInfraTools::FIELD_TEAM_NAME) == ConfigInfraTools::RET_OK
				  && ($ret != ConfigInfraTools::RET_OK || $ret != ConfigInfraTools::RET_WARNING))
			{
				if($_POST[ConfigInfraTools::FIELD_TEAM_NAME] != Config::FIELD_SEL_NONE)
				{
					$array = explode(" - ", $_POST[ConfigInfraTools::FIELD_TEAM_NAME]);
					$_POST[ConfigInfraTools::FIELD_TEAM_NAME] = $array[0];
					$_POST[ConfigInfraTools::FIELD_TEAM_ID] = $array[1];
					$ret = $this->ExecuteFunction($_POST, 'UserSelectByTeamIdNoLimit',
										  array($_POST[ConfigInfraTools::FIELD_TEAM_ID],
												&$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug);
					if($ret == ConfigInfraTools::RET_OK)
					{
						if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
								  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
						{
							$ret = $this->ExecuteFunction($_POST, 'AssocUserNotificationDelete',
														  array(array($this->InstanceNotification),
																$this->ArrayInstanceInfraToolsUser),
														  $this->InputValueHeaderDebug);
						}
					}
				}
			}
			if ($ret == ConfigInfraTools::RET_OK || $ret == ConfigInfraTools::RET_WARNING)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
			else 
			{
				if($this->LoadAssociationsSelect() == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_ASSOCIATE_USER;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
			}
			
		}
		//FM_NOTIFICATION_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'NotificationSelect', 
									  array(&$this->ArrayInstanceNotification),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_LST;
		}
		//FM_NOTIFICATION_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_REGISTER) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_REGISTER;
		//FM_NOTIFICATION_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SEL;
		//FM_NOTIFICATION_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'NotificationInsert', 
									  array(@$_POST[ConfigInfraTools::FIELD_NOTIFICATION_ACTIVE],
											$_POST[ConfigInfraTools::FIELD_NOTIFICATION_TEXT]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_REGISTER;
		}
		//FM_NOTIFICATION_SEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_SEL) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SEL;
		//FM_NOTIFICATION_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'NotificationSelectByNotificationId', 
									  array($_POST[ConfigInfraTools::FIELD_NOTIFICATION_ID],
											&$this->InstanceNotification),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
		}
		//FM_NOTIFICATION_VIEW_ASSOCIATE_USER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_VIEW_ASSOCIATE_USER_SB) == ConfigInfraTools::RET_OK)
		{
			$this->InputValueNotificationByCorporationName = NULL;
			$this->InputValueNotificationByDepartmentName  = NULL;
			$this->InputValueNotificationByRole            = NULL;
			$this->InputValueNotificationByTeamName        = NULL;
			if($this->LoadAssociationsSelect() == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_ASSOCIATE_USER;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
		}
		//FM_NOTIFICATION_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
										  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'NotificationDeleteByNotificationId', 
										  array($this->InstanceNotification),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SEL;
			}
		}
		//FM_NOTIFICATION_VIEW_LST_USERS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB) == ConfigInfraTools::RET_OK)
		{	
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, $this->InstanceNotification) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByNotificationId', 
										  array($this->InstanceNotification->GetNotificationId(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW_USERS;
			}
		}
		//FM_NOTIFICATION_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
										  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_UPDT;
		}
		//FM_NOTIFICATION_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
										  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
		}
		//FM_NOTIFICATION_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, 
											   $this->InstanceNotification) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'NotificationUpdateByNotificationId', 
										  array(@$_POST[ConfigInfraTools::FIELD_NOTIFICATION_ACTIVE],
												$_POST[ConfigInfraTools::FIELD_NOTIFICATION_TEXT],
					                            &$this->InstanceNotification),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_UPDT;
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
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug);
	}
}
?>