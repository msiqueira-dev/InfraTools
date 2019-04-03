<?php

/************************************************************************
Class: FacedePersistenceRole
Creation: 2019/03/26
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Factory.php
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/Role.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of County
Functions: 
			public function RoleSelect($Limit1, $Limit2, &$ArrayInstanceRole, &$RowCount, $Debug, $MySqlConnection);
			public function RoleSelectNoLimit(&$ArrayInstanceRole, $Debug, $MySqlConnection);
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

if (!class_exists("MySqlManager"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "MySqlManager.php"))
		include_once(BASE_PATH_PHP_MODEL . "MySqlManager.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class MySqlManager');
}

if (!class_exists("Persistence"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Persistence.php"))
		include_once(BASE_PATH_PHP_MODEL . "Persistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Persistence');
}

if (!class_exists("Role"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Role.php"))
		include_once(BASE_PATH_PHP_MODEL . "Role.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Role');
}

class FacedePersistenceRole
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
	
	public function RoleSelect($Limit1, $Limit2, &$ArrayInstanceRole, &$RowCount, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $mySqlError = NULL;
		$ArrayInstanceRole = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlRoleSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlRoleSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceRole = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceRole = $this->Factory->CreateRole
							                              ($row[Config::TB_FD_REGISTER_DATE],
							                               $row[Config::TB_ROLE_FD_DESCRIPTION], 
												      	   $row[Config::TB_ROLE_FD_NAME]);
						array_push($ArrayInstanceRole, $InstanceRole);
					}
					if(!empty($ArrayInstanceRole))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_ROLE_SEL_FETCH;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_ROLE_SEL;
				}
				return $return;
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
	
	public function RoleSelectNoLimit(&$ArrayInstanceRole, $Debug, $MySqlConnection)
	{
		$errorStr = NULL; $mySqlError = NULL;
		$ArrayInstanceRole = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlRoleSelectNoLimit');
			$stmt = $MySqlConnection->prepare(Persistence::SqlRoleSelectNoLimit());
			if($stmt != NULL)
			{
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceRole = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceRole = $this->Factory->CreateRole
							                              ($row[Config::TB_FD_REGISTER_DATE],
							                               $row[Config::TB_ROLE_FD_DESCRIPTION], 
												      	   $row[Config::TB_ROLE_FD_NAME]);
						array_push($ArrayInstanceRole, $InstanceRole);
					}
					if(!empty($ArrayInstanceRole))
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_ROLE_SEL_FETCH;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_ROLE_SEL;
				}
				return $return;
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