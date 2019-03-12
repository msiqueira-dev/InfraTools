<?php

/************************************************************************
Class: AssocUserNotification
Creation: 2019/02/08
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for association between User and Notification
Get / Set:
			public function GetAssocUserNotificationNotification();
			public function GetAssocUserNotificationRead();
			public function GetAssocUserNotificationUser();
			public function GetRegisterDate();
Methods:
			public function UpdateAssocUserNotification($RoleDescription, $RoleName);
**************************************************************************/

class AssocUserNotification
{
	/* Properties */
	protected $AssocUserNotificationNotification  = NULL;
	protected $AssocUserNotificationRead          = NULL;
	protected $AssocUserNotificationUser          = NULL;
	protected $RegisterDate                       = NULL;

	/* Constructor */
	public function __construct($AssocUserNotificationNotification, $AssocUserNotificationRead, $AssocUserNotificationUser, $RegisterDate) 
	{
		if(!is_null($AssocUserNotificationNotification))
			$this->AssocUserNotificationNotification = $AssocUserNotificationNotification;
		else throw new Exception(Config::EXCEPTION_ASSOC_USER_NOTIFICATION_NOTIFICATION);
		if(!is_null($AssocUserNotificationRead))
			$this->AssocUserNotificationRead = $AssocUserNotificationRead;
		else throw new Exception(Config::EXCEPTION_ASSOC_USER_NOTIFICATION_READ);
		if(!is_null($AssocUserNotificationUser))
			$this->AssocUserNotificationUser = $AssocUserNotificationUser;
		else throw new Exception(Config::EXCEPTION_ASSOC_USER_NOTIFICATION_USER);
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetAssocUserNotificationNotification()
	{
		return $this->AssocUserNotificationNotification;
	}
	
	public function GetAssocUserNotificationRead()
	{
		return $this->AssocUserNotificationRead;
	}
	
	public function GetAssocUserNotificationUser()
	{
		return $this->AssocUserNotificationUser;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	
	/* METHODS */
	public function UpdateAssocUserNotification($AssocUserNotificationNotification, $AssocUserNotificationRead, $AssocUserNotificationUser)	
	{
		if(!is_null($AssocUserNotificationNotification))
			$this->AssocUserNotificationNotification  = $AssocUserNotificationNotification;
		if(!is_null($AssocUserNotificationRead))
			$this->AssocUserNotificationRead = $AssocUserNotificationRead;
		if(!is_null($AssocUserNotificationUser))
			$this->AssocUserNotificationUser = $AssocUserNotificationUser;
	}
}
?>