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
	public $ArrayInstanceNotification = NULL;
	public $InstanceNotification      = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SELECT;
		$this->InputValueNotificationOptionNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
		$this->ReturnNotificationOptionNameRadioClass   = "NotHidden";
		$this->ReturnNotificationOptionNumberRadioClass = "Hidden";
		//FORM SUBMIT BACK
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_SUBMIT_BACK) == ConfigInfraTools::SUCCESS)
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
		//FORM_NOTIFICATION_LIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'NotificationSelect', 
									  array(&$this->ArrayInstanceNotification),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_LIST;
		}
		//FORM_NOTIFICATION_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_REGISTER) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_REGISTER;
		//FORM_NOTIFICATION_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SELECT;
		//FORM_NOTIFICATION_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'NotificationInsert', 
									  array(@$_POST[ConfigInfraTools::FORM_FIELD_NOTIFICATION_ACTIVE],
											$_POST[ConfigInfraTools::FORM_FIELD_NOTIFICATION_TEXT]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_REGISTER;
		}
		//FORM_NOTIFICATION_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_SELECT) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SELECT;
		//FORM_NOTIFICATION_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'NotificationSelectByNotificationId', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_NOTIFICATION_ID],
											&$this->InstanceNotification),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
		}
		//FORM_NOTIFICATION_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
										  $this->InstanceNotification) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'NotificationDeleteByNotificationId', 
										  array($this->InstanceNotification),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SELECT;
			}
		}
		//FORM_NOTIFICATION_VIEW_LIST_USERS_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_VIEW_LIST_USERS_SUBMIT) == ConfigInfraTools::SUCCESS)
		{	
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, $this->InstanceNotification) 
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByNotificationId', 
										  array($this->InstanceNotification->GetNotificationId(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW_USERS;
			}
		}
		//FORM_NOTIFICATION_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
										  $this->InstanceNotification) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_UPDATE;
		}
		//FORM_NOTIFICATION_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, "NotificationLoadData", 
										  $this->InstanceNotification) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
		}
		//FORM_NOTIFICATION_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_NOTIFICATION, 
											   $this->InstanceNotification) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'NotificationUpdateByNotificationId', 
										  array(@$_POST[ConfigInfraTools::FORM_FIELD_NOTICATION_ACTIVE],
												$_POST[ConfigInfraTools::FORM_FIELD_NOTIFICATION_TEXT],
					                            &$this->InstanceNotification),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;	
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_UPDATE;
			}
		}
		//FORM_TYPE_USER_SELECT
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