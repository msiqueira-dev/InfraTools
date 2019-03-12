<?php

/************************************************************************
Class: Notification
Creation: 2019/01/07
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class for Notification
Get / Set:
			public function GetNotificationActive();
			public function GetNotificationId();
			public function GetNotificationText();
			public function GetRegisterDate();
			public function SetNotificationActive($NotificationActive);
			public function SetNotificatioNText($NotificationText);
Methods:
			public function UpdateNotification($NotificationActive, $NotificationText, $RegisterDate);
**************************************************************************/

class Notification
{
	/* Properties */
	protected $NotificationActive = NULL;
	protected $NotificationId     = NULL;
	protected $NotificationText   = NULL;
	protected $RegisterDate       = NULL;

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	public function __construct($NotificationActive, $NotificationId, $NotificationText, $RegisterDate) 
	{
		if(!is_null($NotificationActive))
			$this->NotificationActive = $NotificationActive;
		else throw new Exception(Config::EXCEPTION_NOTIFICATION_ACTIVE);
		if(!is_null($NotificationId))
			$this->NotificationId = $NotificationId;
		else throw new Exception(Config::EXCEPTION_NOTIFICATION_ID);
		if(!is_null($NotificationText))
			$this->NotificationText = $NotificationText;
		else throw new Exception(Config::EXCEPTION_NOTIFICATION_TEXT);
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
	}
	
	/* GET */
	public function GetNotificationActive()
	{
		return $this->NotificationActive;
	}
	
	public function GetNotificationId()
	{
		return $this->NotificationId;
	}
	
	public function GetNotificationText()
	{
		return $this->NotificationText;
	}

	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetNotificationActive($NotificationActive)
	{
		if(!is_null($NotificationActive))
			$this->NotificationActive = $NotificationActive;
	}
	
	public function SetNotificatioNText($NotificationText)
	{
		if(!is_null($NotificationText))
			$this->NotificationText = $NotificationText;
	}
	
	/* METHODS */
	public function UpdateNotification($NotificationActive, $NotificationText, $RegisterDate)	
	{
		if(!is_null($NotificationActive))
			$this->NotificationActive = $NotificationActive;
		if(!is_null($NotificationText))
			$this->NotificationText = $NotificationText;
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
	}
}
?>