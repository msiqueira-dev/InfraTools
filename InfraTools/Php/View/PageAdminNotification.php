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
	public $ArrayInstanceNotification               = NULL;
	public $InstanceNotification                    = NULL;
	public $InputValueNotificationForAll            = NULL;
	public $InputValueNotificationByCorporationName = NULL;
	public $InputValueNotificationByDepartmentName  = NULL;
	public $InputValueNotificationByRole            = NULL;
	public $InputValueNotificationByTeamName        = NULL;
	public $ReturnNotificationByCorporationClass    = NULL;
	public $ReturnNotificationByDepartmentNameClass = NULL;
	public $ReturnNotificationByRoleClass           = NULL;
	public $ReturnNotificationByTeamNameClass       = NULL;
	
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
		//FM_NOTIFICATION_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_LST) == ConfigInfraTools::RET_OK)
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
		//FM_NOTIFICATION_VIEW_ASSOCIATE_USERS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_NOTIFICATION_VIEW_ASSOCIATE_USERS_SB) == ConfigInfraTools::RET_OK)
		{
			$this->InputValueNotificationByCorporationName = NULL;
			$this->InputValueNotificationByDepartmentName  = NULL;
			$this->InputValueNotificationByRole            = NULL;
			$this->InputValueNotificationByTeamName        = NULL;
			if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceSelectNotificationByCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'DepartmentSelectNoLimit', 
									  array(&$this->ArrayInstanceSelectNotificationByDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					if($this->ExecuteFunction($_POST, 'TeamSelectNoLimit', 
									  array(&$this->ArrayInstanceSelectNotificationByTeam),
									  $this->InputValueHeaderDebug) != ConfigInfraTools::RET_OK)
					{
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
					}
				} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
			}
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
										  $this->InstanceNotification) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_ASSOCIATE_USERS;
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
										  array(@$_POST[ConfigInfraTools::FIELD_NOTICATION_ACTIVE],
												$_POST[ConfigInfraTools::FIELD_NOTIFICATION_TEXT],
					                            &$this->InstanceNotification),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_UPDT;
			}
		}
		//FM_TYPE_USER_SEL
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