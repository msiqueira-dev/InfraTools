<?php
/************************************************************************
Class: PageNotificationView.php
Creation: 2018/06/04
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class for notifications and alett for all system users.
Functions: 
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}
if (!class_exists("Notification"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Notification.php"))
		include_once(BASE_PATH_PHP_MODEL . "Notification.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Notification');
}
if (!class_exists("AssocUserNotification"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "AssocUserNotification.php"))
		include_once(BASE_PATH_PHP_MODEL . "AssocUserNotification.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class AssocUserNotification');
}

class PageNotificationView extends PageInfraTools
{
	public $InstanceAssocUserNotification               = NULL;
	public $InstanceNotification                        = NULL;
	
	/* Singleton */
	protected static $Instance;
	
	/* __create */
	public static function __create($Config, $Language, $Page)
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class($Config, $Language, $Page);
        }
        return self::$Instance;
    }
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = TRUE;
		parent::__construct($Config, $Language, $Page);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	public function LoadPage()
	{
		if(isset($this->User))
		{
			//FM_NOTIFICATION_SEL_SB
			if($this->CheckGetContainsKey(ConfigInfraTools::FM_NOTIFICATION_SEL_SB) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_GET, 'UserSelectNotificationByUserEmailAndNotificationId', 
										  array($this->User, $_GET[ConfigInfraTools::FIELD_NOTIFICATION_ID],
												&$this->InstanceAssocUserNotification),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_NOTIFICATION_VIEW;
					$this->InstanceNotification = $this->InstanceAssocUserNotification->GetAssocUserNotificationNotification();
					if(!$this->InstanceAssocUserNotification->GetAssocUserNotificationRead())
					{
						if($this->ExecuteFunction($_GET, 'AssocUserNotificationUpdateByUserEmailAndNotificationId', 
										  array(TRUE, $this->InstanceNotification->GetNotificationId(), $this->User->GetEmail(),
												&$this->InstanceAssocUserNotification),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						{
							if($this->ExecuteFunction($_GET, 'UserSelectNotificationByUserEmailCountUnRead', 
										  array($this->User, &$count),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
								$this->User->SetAssocUserNotificationCountUnRead($count);
						}
					}
					$this->NotificationLoadData($this->InstanceNotification);
					$this->AssocUserNotificationLoadData($this->InstanceAssocUserNotification);
					$this->ShowDivReturnEmpty();
				}
			}
		}
		$this->LoadHtml(TRUE);
	}
}
?>