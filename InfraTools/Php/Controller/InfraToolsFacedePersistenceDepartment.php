<?php

/************************************************************************
Class: InfraToolsFacedePersistenceCorporation
Creation: 15/07/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/InfraToolsPersistence.php
			Base       - Php/Model/InfraToolsDepartment.php
	
Description: 
			Classe used to access and deal with information of the database about department.
Functions: 
			public function DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail, $Limit1, $Limit2, 
	                                                             &$ArrayInstanceInfraToolsDepartment, &$RowCount, 
																 $Debug, $MySqlConnection);
			public function DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail,
			                                                            &$ArrayInstanceInfraToolsDepartment, 
																		$Debug, $MySqlConnection);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsFacedePersistenceDepartment
{	
	/* Instance */
	protected static $Instance;
	protected        $Config            = NULL;
	protected        $MySqlManager      = NULL;
	protected        $InfraToolsFactory = NULL;
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->InfraToolsFactory == NULL)
			$this->InfraToolsFactory = InfraToolsFactory::__create();
		if ($this->Config == NULL)
			$this->Config = $this->InfraToolsFactory->CreateConfig();
		if ($this->MySqlManager == NULL)
		{
			$this->MySqlManager = $this->InfraToolsFactory->CreateMySqlManager($this->Config->DefaultMySqlAddress,
			                                                         $this->Config->DefaultMySqlPort,
																	 $this->Config->DefaultMySqlDataBase,
			                                                         $this->Config->DefaultMySqlUser, 
																	 $this->Config->DefaultMySqlPassword);
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
	
	public function DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail, $Limit1, $Limit2,
														 &$ArrayInstanceInfraToolsDepartment, &$RowCount, 
														 $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsDepartment = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "<b>Query (SqlDepartmentSelectOnUserServiceContext)</b>  : " . 
				             InfraToolsPersistence::SqlDepartmentSelectOnUserServiceContext() . "<br>";
		if($MySqlConnection != NULL)
		{
			$stmt = $mySqlConnection->prepare(InfraToolsPersistence::SqlDepartmentSelectOnUserServiceContext());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("ssii", $UserCorporation, $UserEmail, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsDepartment = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceceInfraToolsDepartment = $this->InfraToolsFactory->CreateDepartment($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION],
																			$row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
						                                                    $row[Config::TABLE_DEPARTMENT_FIELD_NAME],
																	        $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsDepartment, $InstanceceInfraToolsDepartment);
					}
					if(!empty($ArrayInstanceInfraToolsDepartment))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, 
																&$ArrayInstanceInfraToolsDepartment, 
																$Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsDepartment = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				echo "<b>Query (SqlDepartmentSelectOnUserServiceContextNoLimit)</b>  : " . 
				             InfraToolsPersistence::SqlDepartmentSelectOnUserServiceContextNoLimit() . "<br>";
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlDepartmentSelectOnUserServiceContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("ss", $UserCorporation, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$ArrayInstanceInfraToolsDepartment = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceceInfraToolsDepartment = $this->InfraToolsFactory->CreateDepartment($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION],
																			$row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
						                                                    $row[Config::TABLE_DEPARTMENT_FIELD_NAME],
																	        $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsDepartment, $InstanceceInfraToolsDepartment);
					}
					if(!empty($ArrayInstanceInfraToolsDepartment))
						return ConfigInfraTools::SUCCESS;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::MYSQL_TYPE_SERVICE_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
	}
}