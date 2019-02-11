<?php

/************************************************************************
Class: InfraToolsFacedePersistenceDepartment
Creation: 2018/07/15
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/InfraToolsPersistence.php
			Base       - Php/Model/InfraToolsDepartment.php
	
Description: 
			Class with Singleton pattern for dabatabase methods of InfraTools Department
Functions: 
			public function InfraToolsDepartmentSelectOnUserServiceContext($Limit1, $Limit2, $UserCorporation, $UserEmail, 
	                                                                       &$ArrayInstanceInfraToolsDepartment, &$RowCount, 
																           $Debug, $MySqlConnection);
			public function InfraToolsDepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail,
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
																	 $this->Config->DefaultMySqlUserPassword);
		}
    }
	
	/* Create */
	public static function __create()
    {
        if (!isset(self::$Instance) || strcmp(get_class(self::$Instance), __CLASS__) != 0) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	public function InfraToolsDepartmentSelectOnUserServiceContext($Limit1, $Limit2, $UserCorporation, $UserEmail,
														           &$ArrayInstanceInfraToolsDepartment, &$RowCount, 
														           $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsDepartment = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlDepartmentSelectOnUserServiceContext');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlDepartmentSelectOnUserServiceContext());
			if($stmt != NULL)
			{ 
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $UserCorporation, $UserEmail, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsDepartment = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						$InstanceceInfraToolsDepartment = $this->InfraToolsFactory->CreateDepartment($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION],
																			$row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
						                                                    $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME],
																	        $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsDepartment, $InstanceceInfraToolsDepartment);
					}
					if(!empty($ArrayInstanceInfraToolsDepartment))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsDepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, &$ArrayInstanceInfraToolsDepartment, 
																          $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $mySqlError = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsDepartment = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlDepartmentSelectOnUserServiceContextNoLimit');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlDepartmentSelectOnUserServiceContextNoLimit());
			if($stmt != NULL)
			{ 
				$stmt->bind_param("ss", $UserCorporation, $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsDepartment = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$InstanceceInfraToolsDepartment = $this->InfraToolsFactory->CreateDepartment($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION],
																			$row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
						                                                    $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME],
																	        $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						array_push($ArrayInstanceInfraToolsDepartment, $InstanceceInfraToolsDepartment);
					}
					if(!empty($ArrayInstanceInfraToolsDepartment))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_TYPE_SERVICE_SEL;
				}
			}
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
	}
}