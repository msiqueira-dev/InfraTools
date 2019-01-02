<?php
/************************************************************************
Class: PageAdminNotification.php
Creation: 04/06/2018
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

class PageAdminNotification extends PageAdmin
{
	public $ArrayNotification = NULL;
	
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
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//FORM_NOTIFICATION_LIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'NotificationSelect', 
									  array(&$this->ArrayInstanceNotification),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_LIST;
		}
		//FORM_NOTICAITION_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_REGISTER) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_REGISTER;
		//FORM_NOTIFICATION_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SELECT;
		//FORM_NOTIFICATION_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
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
										  array($this->InstanceNotification->GetNotificationId()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_SELECT;
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
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;	
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>