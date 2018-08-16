<?php

/************************************************************************
Class: Notification
Creation: 30/10/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class for dealing with system notifications to users
Get / Set:
			public function GetNotificationText();
			public function GetNotificationUser();
			public function GetRegisterDate();
			public function SetNotificationText($NotificationText);
			public function SetNotificationUser($User);
Methods:
			public function UpdateNotification($NotificationText, $NotificationUser, $RegisterDate);
**************************************************************************/

class Notification
{
	/* Properties */
	protected $NotificationText  = NULL;
	protected $NotificationUser  = NULL;
	protected $RegisterDate = NULL;

	/* Constructor */
	public function __construct($NotificationText, $NotificationUser, $RegisterDate) 
	{
		$this->NotificationText  = $NotificationText;
		$this->NotificationUser  = $NotificationUser;
		$this->RegisterDate = $RegisterDate;
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetNotificationText()
	{
		return $this->NotificationText;
	}
	
	public function GetNotificationUser()
	{
		return $this->GetNotificationUser;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetNotificationText($NotificationText)
	{
		$this->NotificationText = $NotificationText;
	}
	
	public function SetNotificationUser($User)
	{
		$this->SetNotificationUser = $User;
	}
	
	/* METHODS */
	public function UpdateNotification($NotificationText, $NotificationUser, $RegisterDate)
	{
		$this->NotificationText = $NotificationText;
		$this->NotificationUser  = $NotificationUser;
		$this->RegisterDate = $RegisterDate;
	}
}
?>