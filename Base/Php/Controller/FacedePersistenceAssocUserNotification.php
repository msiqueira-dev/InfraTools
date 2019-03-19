<?php

/************************************************************************
Class: FacedePersistenceAssocUserNotification
Creation: 2017/10/23
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Factory.php
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of association between User and Notification
Functions: 
			public function AssocUserNotificationUpdateByUserEmailAndNotificationId($AssocUserNotificationReadNew,
																				    $NotificationIdNew, $UserEmailNew, 
																					$InstanceAssocUserNotification, 
				                                                                    $Debug, $MySqlConnection);
**************************************************************************/

if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

if (!class_exists("Persistence"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Persistence.php"))
		include_once(BASE_PATH_PHP_MODEL . "Persistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Persistence');
}

class FacedePersistenceAssocUserNotification
{	
	/* Instance */
	protected static $Instance;
	protected        $Config       = NULL;
	protected        $MySqlManager = NULL;
	protected        $Factory      = NULL;
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
		if ($this->Config == NULL)
			$this->Config = $this->Factory->CreateConfig();
		if ($this->MySqlManager == NULL)
		{
			$this->MySqlManager = $this->Factory->CreateMySqlManager($this->Config->DefaultMySqlAddress,
			                                                         $this->Config->DefaultMySqlPort,
																	 $this->Config->DefaultMySqlDataBase,
			                                                         $this->Config->DefaultMySqlUser, 
																	 $this->Config->DefaultMySqlUserPassword);
		}
    }
	
	/* Singleton */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	public function AssocUserNotificationUpdateByUserEmailAndNotificationId($AssocUserNotificationReadNew, $NotificationIdNew, $UserEmailNew, 
																		    $InstanceAssocUserNotification, $Debug, $MySqlConnection)
	{
		$errorCode = NULL; $errorStr = NULL; $mySqlError = NULL; $queryResult = NULL;		
		if($MySqlConnection != NULL)
		{
			$notificationId = $InstanceAssocUserNotification->GetAssocUserNotificationNotification()->GetNotificationId();
			$userEmail = $InstanceAssocUserNotification->GetAssocUserNotificationUser()->GetEmail();
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocUserNotificationUpdateByUserEmailAndNotificationId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlAssocUserNotificationUpdateByUserEmailAndNotificationId());
			if ($stmt)
			{
				$stmt->bind_param("isiis", $NotificationIdNew, $UserEmailNew, $AssocUserNotificationReadNew, $notificationId, $userEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_UPDT_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_UPDT_ASSOC_USER_CORPORATION_BY_USER_EMAIL;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::DB_ERROR_CONNECTION_EMPTY;
	}
}
?>