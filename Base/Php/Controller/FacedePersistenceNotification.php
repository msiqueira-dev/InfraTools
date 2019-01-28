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
			Classe used to access and deal with notification.
Functions: 
			public function NotificationDeleteByNotificationId($NotificationId, $Debug, MySqlConnection);
			public function NotificationInsert($NotificationActive, $NotificationText, $Debug, MySqlConnection);
			public function NotificationSelect($Limit1, $Limit2, &$ArrayInstanceNotification, &$RowCount, $Debug, MySqlConnection);
			public function NotificationSelectByNotificationId($NotificationId, &$InstanceNotification, $Debug, MySqlConnection);
			public function NotificationUpdateByNotificationId($NotificationActiveNew, $NotificationTextNew, $InstanceNotification, 
			                                                   $Debug, $MySqlConnection);
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
	
	public function NotificationDeleteByNotificationId($NotificationId, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlNotificationDeleteByNotificationId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlNotificationDeleteByNotificationId());
			if ($stmt)
			{
				$stmt->bind_param("i", $NotificationId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_NOTIFICATION_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_CODE_FOREIGN_KEY_DELETE_RESTRICT)
						return Config::MYSQL_ERROR_CODE_FOREIGN_KEY_DELETE_RESTRICT;
					else return Config::MYSQL_NOTIFICATION_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}

		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;
	}
	public function NotificationInsert($NotificationActive, $NotificationText, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlNotificationInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlNotificationInsert());
			if ($stmt)
			{
				$stmt->bind_param("is", $NotificationActive, $NotificationText);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_NOTIFICATION_INSERT_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function NotificationSelect($Limit1, $Limit2, &$ArrayInstanceNotification, &$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceNotification = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlNotificationSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlNotificationSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$ArrayInstanceNotification = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceNotification = $this->Factory->CreateNotification
							                            ($row[Config::TABLE_NOTIFICATION_FIELD_NOTIFICATION_ACTIVE],
														 $row[Config::TABLE_NOTIFICATION_FIELD_NOTIFICATION_ID],
														 $row[Config::TABLE_NOTIFICATION_FIELD_NOTIFICATION_TEXT],
														 $row[Config::TABLE_FIELD_REGISTER_DATE]);	
						array_push($ArrayInstanceNotification, $InstanceNotification);
					}
					if(!empty($ArrayInstanceNotification))
						return Config::SUCCESS;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_FAILED;
				}
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function NotificationSelectByNotificationId($NotificationId, &$InstanceNotification, $Debug, $MySqlConnection)
	{
		$InstanceNotification = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlNotificationSelectByNotificationId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlNotificationSelectByNotificationId());
			if($stmt != NULL)
			{
				$stmt->bind_param("i", $NotificationId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($notificationActive, $NotificationId, $notifcationText, $RegDate);					
					if ($stmt->fetch()) 
					{
						$InstanceNotification = $this->Factory->CreateNotification($notificationActive, $NotificationId, 
																				   $notifcationText, $RegDate);
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_NOTIFICATION_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_NOTIFICATION_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function NotificationUpdateByNotificationId($NotificationActiveNew, $NotificationTextNew, $NotificationId, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlNotificationUpdateByNotificationId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlNotificationUpdateByNotificationId());
			if ($stmt)
			{
				$stmt->bind_param("isi", $NotificationActiveNew, $NotificationTextNew, $NotificationId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_ERROR_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_NOTIFICATION_UPDATE_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
	}
}
?>