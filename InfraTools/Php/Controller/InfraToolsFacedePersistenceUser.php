<?php

/************************************************************************
Class: InfraToolsFacedePersistenceUser
Creation: 25/06/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/InfraToolsPersistence.php
			Base       - Php/Model/InfraToolsUser.php
	
Description: 
			Classe used to access and deal with information of the database about group user.
Functions: 
			public function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                     $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceInfraToolsUser, 
			                                                      &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName,
			                                                     &$ArrayInstanceInfraToolsUser, 
			                                                     &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount,
			                                                $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                               $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceInfraToolsUser,
																        &$RowCount, $Debug, $MySqlConnection)
			public function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceInfraToolsUser, 
			                                                          &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByUserEmail($UserEmail, &$InstanceInfraToolsUser, $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByUserUniqueId($UserUniqueId, &$InstanceInfraToolsUser, $Debug, $MySqlConnection);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsFacedePersistenceUser
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
	
	public function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL;
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL;
		$InstaceTypeUser = NULL; $InstanceInfraToolsUser = NULL; 
		$dateNow = NULL; $mySqlError = NULL; $queryResult = NULL; $errorStr = NULL;
		
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelect');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelect());
			if($stmt != NULL)
			{
				$stmt->bind_param("ii", $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TABLE_CORPORATION_FIELD_ACTIVE] != NULL && $row[Config::TABLE_CORPORATION_FIELD_NAME] != NULL 
						   && $row["Corporation".Config::TABLE_FIELD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                       (NULL, $row[Config::TABLE_CORPORATION_FIELD_ACTIVE], 
							                                            $row[Config::TABLE_CORPORATION_FIELD_NAME],
												                        $row["Corporation".Config::TABLE_FIELD_REGISTER_DATE]);
							if($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									          $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									          $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
															$row["TypeUser".Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, 
												 NULL,
		   										 NULL,
							                     $row[Config::TABLE_USER_FIELD_BIRTH_DATE],
												 $InstanceCorporation,
						                         $row[Config::TABLE_USER_FIELD_COUNTRY],
												 $InstanceDepartment,
												 $row[Config::TABLE_USER_FIELD_EMAIL], 
						                         $row[Config::TABLE_USER_FIELD_GENDER], 
												 $row[Config::TABLE_USER_FIELD_HASH_CODE],
												 $row[Config::TABLE_USER_FIELD_NAME], 
												 $row[Config::TABLE_USER_FIELD_REGION],
												 $row["User".Config::TABLE_FIELD_REGISTER_DATE],
												 $row[Config::TABLE_USER_FIELD_SESSION_EXPIRES],
												 $row[Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION],
												 $row[Config::TABLE_USER_FIELD_USER_ACTIVE],
												 $row[Config::TABLE_USER_FIELD_USER_CONFIRMED],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceTypeUser,
												 $row[Config::TABLE_USER_FIELD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return Config::SUCCESS;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_FAILED;
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
	
	public function InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceInfraToolsUser, 
													      &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; 
		$InstaceTypeUser = NULL; $InstanceInfraToolsUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByCorporationName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByCorporationName());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $CorporationName, $CorporationName, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TABLE_CORPORATION_FIELD_ACTIVE] != NULL &&
						   $row[Config::TABLE_CORPORATION_FIELD_NAME] != NULL 
						   && $row['Corporation' . Config::TABLE_FIELD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
																		$row[Config::TABLE_CORPORATION_FIELD_NAME],
									                                    $row['Corporation'.Config::TABLE_FIELD_REGISTER_DATE]);
							if($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									          $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									          $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, 
												 NULL,
												 NULL,
												 $row[Config::TABLE_USER_FIELD_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TABLE_USER_FIELD_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TABLE_USER_FIELD_EMAIL], 
						                         $row[Config::TABLE_USER_FIELD_GENDER], 
												 $row[Config::TABLE_USER_FIELD_HASH_CODE],
												 $row[Config::TABLE_USER_FIELD_NAME], 
												 $row[Config::TABLE_USER_FIELD_REGION],
												 $row["User".Config::TABLE_FIELD_REGISTER_DATE],
												 $row[Config::TABLE_USER_FIELD_SESSION_EXPIRES],
												 $row[Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION],
						                         $row[Config::TABLE_USER_FIELD_USER_ACTIVE],
						                         $row[Config::TABLE_USER_FIELD_USER_CONFIRMED],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceTypeUser,
												 $row[Config::TABLE_USER_FIELD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return Config::SUCCESS;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_FAILED;
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
	
	public function InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceInfraToolsUser, 
													      &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; 
		$InstaceTypeUser = NULL; $InstanceInfraToolsUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByDepartmentName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByDepartmentName());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $CorporationName, $DepartmentName, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TABLE_CORPORATION_FIELD_ACTIVE] != NULL &&
						   $row[Config::TABLE_CORPORATION_FIELD_NAME] != NULL 
						   && $row['Corporation' . Config::TABLE_FIELD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
																		$row[Config::TABLE_CORPORATION_FIELD_NAME],
									                                    $row['Corporation'.Config::TABLE_FIELD_REGISTER_DATE]);
							if($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									          $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									          $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, 
												 NULL,
												 NULL,
												 $row[Config::TABLE_USER_FIELD_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TABLE_USER_FIELD_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TABLE_USER_FIELD_EMAIL], 
						                         $row[Config::TABLE_USER_FIELD_GENDER], 
												 $row[Config::TABLE_USER_FIELD_HASH_CODE],
												 $row[Config::TABLE_USER_FIELD_NAME], 
												 $row[Config::TABLE_USER_FIELD_REGION],
												 $row["User".Config::TABLE_FIELD_REGISTER_DATE],
												 $row[Config::TABLE_USER_FIELD_SESSION_EXPIRES],
												 $row[Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION],
						                         $row[Config::TABLE_USER_FIELD_USER_ACTIVE],
						                         $row[Config::TABLE_USER_FIELD_USER_CONFIRMED],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceTypeUser,
												 $row[Config::TABLE_USER_FIELD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return Config::SUCCESS;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_FAILED;
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
	
	public function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount,
			                                        $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsUserSelectByServiceId');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsUserSelectByServiceId());
			if($stmt != NULL)
			{
				$stmt->bind_param("iiii", $ServiceId, $ServiceId, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TABLE_CORPORATION_FIELD_ACTIVE] != NULL &&
						   $row[Config::TABLE_CORPORATION_FIELD_NAME] != NULL 
						   && $row['Corporation' . Config::TABLE_FIELD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
																		 $row[Config::TABLE_CORPORATION_FIELD_NAME],
									                                     $row['Corporation'.Config::TABLE_FIELD_REGISTER_DATE]);
							if($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									          $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									          $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[Config::TABLE_USER_FIELD_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TABLE_USER_FIELD_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TABLE_USER_FIELD_EMAIL], 
						                         $row[Config::TABLE_USER_FIELD_GENDER], 
												 $row[Config::TABLE_USER_FIELD_HASH_CODE],
												 $row[Config::TABLE_USER_FIELD_NAME], 
												 $row[Config::TABLE_USER_FIELD_REGION],
												 $row["User".Config::TABLE_FIELD_REGISTER_DATE],
												 $row[Config::TABLE_USER_FIELD_SESSION_EXPIRES],
												 $row[Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION],
						                         $row[Config::TABLE_USER_FIELD_USER_ACTIVE],
						                         $row[Config::TABLE_USER_FIELD_USER_CONFIRMED],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TABLE_USER_FIELD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return Config::SUCCESS;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_FAILED;
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
	
	public function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                       $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByTicketId');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByTicketId());
			if($stmt != NULL)
			{
				$stmt->bind_param("iiii", $TicketId, $TicketId, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$ArrayInstanceInfraToolsUser = array();
						$RowCount = $row['COUNT'];
						if($row[Config::TABLE_CORPORATION_FIELD_ACTIVE] != NULL &&
						   $row[Config::TABLE_CORPORATION_FIELD_NAME] != NULL 
						   && $row['Corporation' . Config::TABLE_FIELD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
																		 $row[Config::TABLE_CORPORATION_FIELD_NAME],
									                                     $row['Corporation'.Config::TABLE_FIELD_REGISTER_DATE]);
							if($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									          $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									          $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[Config::TABLE_USER_FIELD_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TABLE_USER_FIELD_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TABLE_USER_FIELD_EMAIL], 
						                         $row[Config::TABLE_USER_FIELD_GENDER], 
												 $row[Config::TABLE_USER_FIELD_HASH_CODE],
												 $row[Config::TABLE_USER_FIELD_NAME], 
												 $row[Config::TABLE_USER_FIELD_REGION],
												 $row["User".Config::TABLE_FIELD_REGISTER_DATE],
												 $row[Config::TABLE_USER_FIELD_SESSION_EXPIRES],
												 $row[Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION],
						                         $row[Config::TABLE_USER_FIELD_USER_ACTIVE],
						                         $row[Config::TABLE_USER_FIELD_USER_CONFIRMED],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TABLE_USER_FIELD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return Config::SUCCESS;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_FAILED;
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
	
	public function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceInfraToolsUser,
																&$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$ArrayInstanceInfraToolsUser = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByTypeTicketDescription');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByTypeTicketDescription());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $TypeTicketDescription, $TypeTicketDescription, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TABLE_CORPORATION_FIELD_ACTIVE] != NULL &&
						   $row[Config::TABLE_CORPORATION_FIELD_NAME] != NULL 
						   && $row['Corporation' . Config::TABLE_FIELD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
																		 $row[Config::TABLE_CORPORATION_FIELD_NAME],
									                                     $row['Corporation'.Config::TABLE_FIELD_REGISTER_DATE]);
							if($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									          $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									          $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[Config::TABLE_USER_FIELD_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TABLE_USER_FIELD_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TABLE_USER_FIELD_EMAIL], 
						                         $row[Config::TABLE_USER_FIELD_GENDER], 
												 $row[Config::TABLE_USER_FIELD_HASH_CODE],
												 $row[Config::TABLE_USER_FIELD_NAME], 
												 $row[Config::TABLE_USER_FIELD_REGION],
												 $row["User".Config::TABLE_FIELD_REGISTER_DATE],
												 $row[Config::TABLE_USER_FIELD_SESSION_EXPIRES],
												 $row[Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION],
						                         $row[Config::TABLE_USER_FIELD_USER_ACTIVE],
						                         $row[Config::TABLE_USER_FIELD_USER_CONFIRMED],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TABLE_USER_FIELD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return Config::SUCCESS;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_FAILED;
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
	
	public function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceInfraToolsUser, 
												              &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; 
		$InstaceTypeUser = NULL; $InstanceInfraToolsUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsUser = array();
		
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByTypeUserDescription');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByTypeUserDescription());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $TypeUserDescription, $TypeUserDescription, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TABLE_CORPORATION_FIELD_ACTIVE] != NULL &&
						   $row[Config::TABLE_CORPORATION_FIELD_NAME] != NULL 
						   && $row['Corporation' . Config::TABLE_FIELD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
																		$row[Config::TABLE_CORPORATION_FIELD_NAME],
									                                    $row['Corporation'.Config::TABLE_FIELD_REGISTER_DATE]);
							if($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									          $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									          $row["Department".Config::TABLE_FIELD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, 
												 NULL,
												 NULL,
												 $row[Config::TABLE_USER_FIELD_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TABLE_USER_FIELD_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TABLE_USER_FIELD_EMAIL], 
						                         $row[Config::TABLE_USER_FIELD_GENDER], 
												 $row[Config::TABLE_USER_FIELD_HASH_CODE],
												 $row[Config::TABLE_USER_FIELD_NAME], 
												 $row[Config::TABLE_USER_FIELD_REGION],
												 $row["User".Config::TABLE_FIELD_REGISTER_DATE],
												 $row[Config::TABLE_USER_FIELD_SESSION_EXPIRES],
												 $row[Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION],
						                         $row[Config::TABLE_USER_FIELD_USER_ACTIVE],
						                         $row[Config::TABLE_USER_FIELD_USER_CONFIRMED],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY],
												 $row[Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceTypeUser,
												 $row[Config::TABLE_USER_FIELD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return Config::SUCCESS;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_FAILED;
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
	
	public function InfraToolsUserSelectByUserEmail($UserEmail, &$InstanceInfraToolsUser, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL;
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstaceTypeUser = NULL;
		$dateNow = NULL; $mySqlError = NULL; $queryResult = NULL; $errorStr = NULL;
		
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByUserEmail');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($usrBirthDate, $usrCountry, $usrEmail, 
									   $usrGender, $usrHashCode, $usrName,
									   $usrRegion, $usrRegDate, $sessionExpires, $twoStepVerification, $usrActive, $usrConfirmed, $usrPhonePrimary, 
									   $usrPhonePrimaryPrefix, $usrPhoneSecondary,
									   $usrPhoneSecondaryPrefix, $usrUniqueId,
									   $usrTypeDescription, $usrTypeRegDate,
									   $corpActive, $corpName, $corpRegDate,
									   $assocUsrCorpCorpName, $assocUsrCorpDepName, $assocUsrCorpRegistrationDate,
									   $assocUsrCorpRegistrationId, $assocUsrCorpUsrEmail, $assocUsrCorpRegDate,
									   $depCorp, $depIni, $depName, $depRegDate);	
					if ($stmt->fetch()) 
					{
						if($corpName != NULL && $corpActive != NULL && $corpRegDate != NULL)
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation(NULL, $corpActive, 
																							   $corpName, $corpRegDate);
						if($depCorp != NULL && $depName != NULL && $depRegDate != NULL)
							$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, $depIni, $depName,
																				   $depRegDate);
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($usrTypeDescription,
														    $usrTypeRegDate);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, NULL, NULL,
																   $usrBirthDate, $InstanceCorporation, $usrCountry, 
																   $InstanceDepartment, $usrEmail, $usrGender, $usrHashCode,
																   $usrName, $usrRegion, $usrRegDate, $sessionExpires,
																   $twoStepVerification, $usrActive, $usrConfirmed,
																   $usrPhonePrimary, $usrPhonePrimaryPrefix, $usrPhoneSecondary, $usrPhoneSecondaryPrefix,
																   $InstaceTypeUser, $usrUniqueId);
						if($assocUsrCorpRegistrationDate != NULL  && $assocUsrCorpRegistrationId != NULL &&
						   $InstanceCorporation != NULL && $assocUsrCorpRegDate != NULL && $InstanceInfraToolsUser != NULL)
							$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $assocUsrCorpRegistrationDate, $assocUsrCorpRegistrationId, $InstanceCorporation, $assocUsrCorpRegDate, $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_BY_USER_EMAIL_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_BY_USER_EMAIL_FAILED;
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
	
	public function InfraToolsUserSelectByUserUniqueId($UserUniqueId, &$InstanceInfraToolsUser, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL;
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstaceTypeUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByUserUniqueId');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByUserUniqueId());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $UserUniqueId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($usrBirthDate, $usrCountry, $usrEmail, 
									   $usrGender, $usrHashCode, $usrName,
									   $usrRegion, $usrRegDate, $sessionExpires, $twoStepVerification, $usrActive, $usrConfirmed, $usrPhonePrimary, $usrPhonePrimaryPrefix, $usrPhoneSecondary, $usrPhoneSecondaryPrefix, $usrUniqueId,
									   $usrTypeDescription, $usrTypeRegDate,
									   $corpActive, $corpName, $corpRegDate, 
									   $assocUsrCorpCorpName, $assocUsrCorpDepName, $assocUsrCorpRegistrationDate,
									   $assocUsrCorpRegistrationId, $assocUsrCorpUsrEmail, $assocUsrCorpRegDate,
									   $depCorp, $depIni, $depName, $depRegDate);	
					if ($stmt->fetch()) 
					{
						if($corpName != NULL && $corpActive != NULL && $corpRegDate != NULL)
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation(NULL, $corpActive, 
																							   $corpName, $corpRegDate);
						if($depCorp != NULL && $depName != NULL && $depRegDate != NULL)
							$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, $depIni, $depName,
																				   $depRegDate);
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($usrTypeDescription,
														    $usrTypeRegDate);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, NULL, NULL,
																   $usrBirthDate, $InstanceCorporation, $usrCountry, 
																   $InstanceDepartment, $usrEmail, $usrGender, $usrHashCode,
																   $usrName, $usrRegion, $usrRegDate, $sessionExpires,
																   $twoStepVerification, $usrActive, $usrConfirmed,
																   $usrPhonePrimary, $usrPhonePrimaryPrefix, $usrPhoneSecondary, $usrPhoneSecondaryPrefix,
																   $InstaceTypeUser, $usrUniqueId);
						if($assocUsrCorpRegistrationDate != NULL  && $assocUsrCorpRegistrationId != NULL &&
						   $InstanceCorporation != NULL && $assocUsrCorpRegDate != NULL && $InstanceInfraToolsUser != NULL)
							$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $assocUsrCorpRegistrationDate, $assocUsrCorpRegistrationId, $InstanceCorporation, $assocUsrCorpRegDate, $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_BY_USER_UNIQUE_ID_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_BY_USER_UNIQUE_ID_FAILED;
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
}