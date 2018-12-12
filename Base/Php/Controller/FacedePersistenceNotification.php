<?php

/************************************************************************
Class: FacedePersistenceNotification
Creation: 23/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/Notification.php
	
Description: 
			Classe used to access and deal with system notification.
Functions: 
			public function NotificationDeleteByText($Text, $Debug, $MySqlConnection);
			public function NotificationDeleteByTextAndUserEmail($Text, $UserEmail, $Debug, $MySqlConnection);
			public function NotificationDeleteByUserEmail($UserEmail, $Debug, $MySqlConnection);
			public function NotificationInsert($Text, $UserEmail, $Debug, $MySqlConnection);
			public function NotificationSelectByText($Text, &$InstanceArrayNotification, $Debug, $MySqlConnection);
			public function NotificationSelectByTextAndUserEmail($Text, $UserEmail, &$InstanceArrayNotification, $Debug, $MySqlConnection);
			public function NotificationSelectByUserEmail($UserEmail, &$InstanceArrayNotification, $MySqlConnection);
			public function NotificationUpdateTextByUserEmail($UserEmail, $Debug, $MySqlConnection);
**************************************************************************/

if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Config');
}

if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

class FacedePersistenceNotification
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
	
	public function NotificationDeleteByText($Text, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlNotificationDeleteByText');
			$stmt = $MySqlConnection->prepare(Persistence::SqlNotificationDeleteByText());
			if ($stmt)
			{
				$stmt->bind_param("s", $Text);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_TYPE_USER_DELETE_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_TYPE_USER_DELETE_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function NotificationDeleteByTextAndUserEmail($Text, $UserEmail, $Debug, $MySqlConnection)
	{
	}
	
	public function NotificationDeleteByUserEmail($UserEmail, $Debug, $MySqlConnection)
	{
	}
	
	public function NotificationInsert($Text, $UserEmail, $Debug, $MySqlConnection)
	{
	}
	
	public function NotificationSelectByText($Text, &$InstanceArrayNotification, $Debug, $MySqlConnection)
	{
	}
	
	public function NotificationSelectByTextAndUserEmail($Text, $UserEmail, &$InstanceArrayNotification, $Debug, $MySqlConnection)
	{
	}
	
	public function NotificationSelectByUserEmail($UserEmail, &$InstanceArrayNotification, $Debug, $MySqlConnection)
	{
	}
	public function NotificationUpdateTextByUserEmail($UserEmail, $Debug, $MySqlConnection)
	{
	}
}
?>