<?php

/************************************************************************
Class: FacedePersistenceUser
Creation: 23/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/User.php
	
Description: 
			Classe used to access and deal with information of the database about user.
Functions: 
			public function UserCheckPasswordByUserEmail($UserEmail, $Password, $Debug);
			public function UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug);
			public function UserDeleteByUserEmail($UserEmail, $Debug);
			public function UserInsert($BirthDate, $Corporation, $Country, $UserEmail, $Gender, $HashCode, 
			                           $UserName, $Password, $Region, $SessionExpires, $TwoStepVerification, 
									   $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary,
									   $UserPhoneSecondaryPrefix, $UserType, $UserUniqueId, $Debug);
			public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
			public function UserSelectByCorporation($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
			public function UserSelectByDepartment($DepartmentName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
			public function UserSelectByHashCode($HashCode, &$InstanceUser, $Debug);
			public function UserSelectByTeamId($TeamId, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
			public function UserSelectByTypeUserId($TypeUserId, $Limit1, $Limit2, &$ArrayInstanceUser, 
			                                       &$RowCount, $Debug, $MySqlConnection);
			public function UserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug);
			public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug);
			public function UserSelectExistsByUserEmail($UserEmail, $Debug);
			public function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug);
			public function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug);
			public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug);
			public function UserUpdateActiveByUserEmail($UserEmail, $UserActive, $Debug);
			public function AssocUserCorporationUpdateByUserEmailAndCorporationName($AssocUserCorporationDepartmentNameNew,
			                                                                        $AssocUserCorporationRegistrationDateNew, 
			                                                                        $AssocUserCorporationRegistrationIdNew, 
																					$CorporationName, $UserEmail, $Debug);
			public function UserUpdateByUserEmail($BirthDate, $Country, $UserEmail, $Gender, $UserName, $Region, $SessionExpires, 
									              $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix,
												  $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug)
			public function UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug);
			public function UserUpdateCorporationByUserEmail($Corporation, $UserEmail, $Debug);
			public function UserUpdateDepartmentByUserEmailAndCorporation($Corporation, $Department, $UserEmail, $Debug);
			public function UserUpdatePasswordByUserEmail($UserEmail, $Password, $Debug);
			public function UserUpdateTwoStepVerificationByUserEmail($UserEmail, $TwoStepVerification, $Debug);
			public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeId, $Debug);
			public function UserUpdateUniqueIdByUserEmail($UserEmail, $UniqueId, $Debug);
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

class FacedePersistenceUser
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
	
	public function UserCheckPasswordByUserEmail($UserEmail, $Password, $Debug)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserCheckPasswordByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserCheckPasswordByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("ss", $UserEmail, $Password);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if ($stmt->fetch())
					return Config::SUCCESS;
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_USER_CHECK_PASSWORD_BY_EMAIL_FAILED;
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserCheckPasswordByUserUniqueId');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserCheckPasswordByUserUniqueId());
			if($stmt != NULL)
			{
				$stmt->bind_param("ss", $UserUniqueId, $Password);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if ($stmt->fetch())
					return Config::SUCCESS;
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_USER_CHECK_PASSWORD_BY_USER_UNIQUE_ID_FAILED;
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserDeleteByUserEmail($UserEmail, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserDeleteByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserDeleteByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("s", $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode,  $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_DELETE_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_DELETE_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserInsert($BirthDate, $Corporation, $Country, $UserEmail, $Gender, $HashCode, $UserName, $Password, 
							   $Region, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, 
							   $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary,
							   $UserPhoneSecondaryPrefix, $UserType, $UserUniqueId, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserInsert');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserInsert());
			if ($stmt)
			{
				$stmt->bind_param("sssssssssiiiissssis", $BirthDate, $Corporation, $Country, $UserEmail, $Gender, 
								                         $HashCode, $UserName, $Password, $Region, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserType,
								                         $UserUniqueId);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				else
				{
					if($errorCode == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
					{
						$UserUniqueId = NULL;
						$stmt->bind_param("sssssssssiiiissssis", $BirthDate, $Corporation, $Country, $UserEmail, $Gender, 
										                         $HashCode, $UserName, $Password, $Region, 
										                         $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserType,
								                                 $UserUniqueId);
						$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
						if($errorStr == NULL && $stmt->affected_rows > 0)
						{
							$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
							return Config::SUCCESS;
						}
						else
						{
							if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
						}
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_INSERT_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; 
		$InstaceBaseTypeUser = NULL; $InstanceDepartment = NULL;
		$InstanceCorporation = NULL; $InstanceUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayInstanceUser = array();
		
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelect');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelect());
			if($stmt != NULL)
			{
				$stmt->bind_param("ii", $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TABLE_CORPORATION_FIELD_ACTIVE] != NULL && $row[Config::TABLE_CORPORATION_FIELD_NAME] != NULL 
						   && $row["Corporation".Config::TABLE_FIELD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                       (NULL, 
																		$row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
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
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
						                                    $row[Config::TABLE_TYPE_USER_FIELD_ID],
															$row["TypeUser".Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserTeam,
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
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceUser))
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
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectByCorporation($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayInstanceUser = array();
		
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByCorporation');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectByCorporation());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $CorporationName, $CorporationName, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
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
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
																		 $row[Config::TABLE_CORPORATION_FIELD_NAME],
									                                     $row['Corporation'.Config::TABLE_FIELD_REGISTER_DATE]);
							if($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									          $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									          $row['Department'.Config::TABLE_FIELD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
						                                    $row[Config::TABLE_TYPE_USER_FIELD_ID],
															$row['TypeUser'.Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserTeam,
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
												 $row['User'.Config::TABLE_FIELD_REGISTER_DATE],
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
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceUser))
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
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectByDepartment($DepartmentName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayInstanceUser = array();
		
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByDepartment');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectByDepartment());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $DepartmentName, $DepartmentName, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
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
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TABLE_CORPORATION_FIELD_ACTIVE],
																		 $row[Config::TABLE_CORPORATION_FIELD_NAME],
									                                     $row['Corporation'.Config::TABLE_FIELD_REGISTER_DATE]);
							if($row[Config::TABLE_DEPARTMENT_FIELD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TABLE_DEPARTMENT_FIELD_INITIALS],
									          $row[Config::TABLE_DEPARTMENT_FIELD_NAME], 
									          $row['Department'.Config::TABLE_FIELD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TABLE_TYPE_USER_FIELD_DESCRIPTION],
						                                    $row[Config::TABLE_TYPE_USER_FIELD_ID],
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserTeam,
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
												 $row['User'.Config::TABLE_FIELD_REGISTER_DATE],
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
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceUser))
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
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectByHashCode($HashCode, &$InstanceUser, $Debug)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceDepartment = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByHashCode');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectByHashCode());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $HashCode);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($usrBirthDate, $usrCountry, $usrEmail, 
									   $usrGender, $usrHashCode, $usrName,
									   $usrRegion, $usrRegDate, $sessionExpires, $twoStepVerification, $usrActive, $usrConfirmed, $usrPhonePrimary, $usrPhonePrimaryPrefix, $usrPhoneSecondary, $usrPhoneSecondaryPrefix, $usrUniqueId,
									   $usrTypeDescription, $usrTypeId, $usrTypeRegDate,
									   $corpActive, $corpName, $corpRegDate,
									   $assocUsrCorpCorpName, $assocUsrCorpDepName, $assocUsrCorpRegistrationDate,
									   $assocUsrCorpRegistrationId, $assocUsrCorpUsrEmail, $assocUsrCorpRegDate,
									   $depCorp, $depIni, $depName, $depRegDate);					
					if ($stmt->fetch()) 
					{
						if($corpName != NULL && $corpActive != NULL && $corpRegDate != NULL)
							$InstanceCorporation = $this->Factory->CreateCorporation(NULL, $corpActive, $corpName, $corpRegDate);
						if($depCorp != NULL && $depName != NULL && $depRegDate != NULL)
							$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, $depIni, $depName,
																				   $depRegDate);
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($usrTypeDescription,
						                                    $usrTypeId,
														    $usrTypeRegDate);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserTeam, NULL, NULL,
																   $usrBirthDate, $InstanceCorporation, $usrCountry, 
																   $InstanceDepartment, $usrEmail, $usrGender, $usrHashCode,
																   $usrName, $usrRegion, $usrRegDate, $sessionExpires,
																   $twoStepVerification, $usrActive, $usrConfirmed,
																   $usrPhonePrimary, $usrPhonePrimaryPrefix, $usrPhoneSecondary, $usrPhoneSecondaryPrefix,
																   $InstaceTypeUser, $usrUniqueId);
						if($assocUsrCorpRegistrationDate != NULL  && $assocUsrCorpRegistrationId != NULL &&
						   $InstanceCorporation != NULL && $assocUsrCorpRegDate != NULL && $InstanceUser != NULL)
							$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $assocUsrCorpRegistrationDate, $assocUsrCorpRegistrationId, $InstanceCorporation, $assocUsrCorpRegDate, $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
						return Config::MYSQL_USER_SELECT_BY_HASH_CODE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_SELECT_BY_HASH_CODE_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectByTeamId($TeamId, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceTeam = NULL; $InstanceUser = NULL;
		$InstaceBaseTeam = NULL; $InstaceBaseTypeAssocUserTeam = NULL; $InstaceBaseAssocUserTeam = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayInstanceUser = array();
		
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTeamId');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectByTeamId());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $TeamId, $TeamId, $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
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
							$InstanceCorporation = $this->Factory->CreateCorporation
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
						                                    $row[Config::TABLE_TYPE_USER_FIELD_ID],
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserTeam,
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
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						$InstaceBaseTeam = $this->Factory->CreateTeam
							                               ($row[Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION],
						                                    $row[Config::TABLE_TEAM_FIELD_TEAM_ID],
															$row[Config::TABLE_TEAM_FIELD_TEAM_NAME],
															$row['Team' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstaceBaseTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam
							                               ($row['TypeAssocUserTeam' . Config::TABLE_FIELD_REGISTER_DATE],
														    $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION],
						                                    $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID]);
						$InstaceBaseAssocUserTeam = $this->Factory->CreateAssocUserTeam
							                               ($row['AssocUserTeam' . Config::TABLE_FIELD_REGISTER_DATE],
														    $InstaceBaseTeam,
						                                    $InstaceBaseTypeAssocUserTeam,
														    $InstanceUser);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceUser))
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
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_SELECT_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectByTypeUserId($TypeUserId, $Limit1, $Limit2, &$ArrayInstanceUser, 
										   &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; 
		$InstaceTypeUser = NULL; $InstanceUser = NULL;
		$dateNow = NULL; $mySqlError = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayInstanceUser = array();
		
		if($Debug == Config::CHECKBOX_CHECKED)
			Persistence::ShowQuery('SqlUserSelectByTypeUser');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTypeUser());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $TypeUserId, $TypeUserId, $Limit1, $Limit2);
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
							$InstanceCorporation = $this->Factory->CreateCorporation
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
						                                    $row[Config::TABLE_TYPE_USER_FIELD_ID],
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserTeam, 
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
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE],
							                  $row[Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TABLE_FIELD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
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
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceDepartment = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($usrBirthDate, $usrCountry, $usrEmail, 
									   $usrGender, $usrHashCode, $usrName,
									   $usrRegion, $usrRegDate, $sessionExpires, $twoStepVerification, $usrActive, $usrConfirmed, $usrPhonePrimary, $usrPhonePrimaryPrefix, $usrPhoneSecondary, $usrPhoneSecondaryPrefix, $usrUniqueId,
									   $usrTypeDescription, $usrTypeId, $usrTypeRegDate,
									   $corpActive, $corpName, $corpRegDate,
									   $assocUsrCorpCorpName, $assocUsrCorpDepName, $assocUsrCorpRegistrationDate,
									   $assocUsrCorpRegistrationId, $assocUsrCorpUsrEmail, $assocUsrCorpRegDate,
									   $depCorp, $depIni, $depName, $depRegDate);					
					if ($stmt->fetch()) 
					{
						if($corpName != NULL && $corpActive != NULL && $corpRegDate != NULL)
							$InstanceCorporation = $this->Factory->CreateCorporation(NULL, $corpActive, $corpName, $corpRegDate);
						if($depCorp != NULL && $depName != NULL && $depRegDate != NULL)
							$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, $depIni, $depName,
																				   $depRegDate);
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($usrTypeDescription,
						                                    $usrTypeId,
														    $usrTypeRegDate);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserTeam, NULL, NULL,
																   $usrBirthDate, $InstanceCorporation, $usrCountry, 
																   $InstanceDepartment, $usrEmail, $usrGender, $usrHashCode,
																   $usrName, $usrRegion, $usrRegDate, $sessionExpires,
																   $twoStepVerification, $usrActive, $usrConfirmed,
																   $usrPhonePrimary, $usrPhonePrimaryPrefix, $usrPhoneSecondary, $usrPhoneSecondaryPrefix,
																   $InstaceTypeUser, $usrUniqueId);
						if($assocUsrCorpRegistrationDate != NULL  && $assocUsrCorpRegistrationId != NULL &&
						   $InstanceCorporation != NULL && $assocUsrCorpRegDate != NULL && $InstanceUser != NULL)
							$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $assocUsrCorpRegistrationDate, $assocUsrCorpRegistrationId, $InstanceCorporation, $assocUsrCorpRegDate, $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
						return Config::MYSQL_USER_SELECT_BY_USER_EMAIL_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_SELECT_BY_USER_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug)
	{
		$InstanceArrayAssocUserTeam = NULL;
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstaceTypeUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByUserUniqueId');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectByUserUniqueId());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $UserUniqueId);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($usrBirthDate, $usrCountry, $usrEmail, 
									   $usrGender, $usrHashCode, $usrName,
									   $usrRegion, $usrRegDate, $sessionExpires, $twoStepVerification, $usrActive, $usrConfirmed, $usrPhonePrimary, $usrPhonePrimaryPrefix, $usrPhoneSecondary, $usrPhoneSecondaryPrefix, $usrUniqueId,
									   $usrTypeDescription, $usrTypeId, $usrTypeRegDate,
									   $corpActive, $corpName, $corpRegDate, 
									   $assocUsrCorpCorpName, $assocUsrCorpDepName, $assocUsrCorpRegistrationDate,
									   $assocUsrCorpRegistrationId, $assocUsrCorpUsrEmail, $assocUsrCorpRegDate,
									   $depCorp, $depIni, $depName, $depRegDate);	
					if ($stmt->fetch()) 
					{
						if($corpName != NULL && $corpActive != NULL && $corpRegDate != NULL)
							$InstanceCorporation = $this->Factory->CreateCorporation(NULL, $corpActive, 
																					$corpName, $corpRegDate);
						if($depCorp != NULL && $depName != NULL && $depRegDate != NULL)
							$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, $depIni, $depName,
																				   $depRegDate);
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($usrTypeDescription,
						                                    $usrTypeId,
														    $usrTypeRegDate);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserTeam, NULL, NULL,
																   $usrBirthDate, $InstanceCorporation, $usrCountry, 
																   $InstanceDepartment, $usrEmail, $usrGender, $usrHashCode,
																   $usrName, $usrRegion, $usrRegDate, $sessionExpires,
																   $twoStepVerification, $usrActive, $usrConfirmed,
																   $usrPhonePrimary, $usrPhonePrimaryPrefix, $usrPhoneSecondary, $usrPhoneSecondaryPrefix,
																   $InstaceTypeUser, $usrUniqueId);
						if($assocUsrCorpRegistrationDate != NULL  && $assocUsrCorpRegistrationId != NULL &&
						   $InstanceCorporation != NULL && $assocUsrCorpRegDate != NULL && $InstanceUser != NULL)
							$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $assocUsrCorpRegistrationDate, $assocUsrCorpRegistrationId, $InstanceCorporation, $assocUsrCorpRegDate, $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
						return Config::MYSQL_USER_SELECT_BY_USER_UNIQUE_ID_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_SELECT_BY_USER_UNIQUE_ID_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectExistsByUserEmail($UserEmail, $Debug)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectExistsByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectExistsByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if ($stmt->fetch())
					return Config::SUCCESS;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_USER_SELECT_EXISTS_BY_USER_EMAIL_FAILED;
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectUserActiveByHashCode');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectUserActiveByHashCode());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $HashCode);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($UserActive);
					if ($stmt->fetch())
						return Config::SUCCESS;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::MYSQL_USER_CHECK_HASH_ACTIVE_ACCOUNT_FAILED;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_USER_CHECK_HASH_ACTIVE_ACCOUNT_FAILED;
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectHashCodeByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectHashCodeByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$stmt->bind_result($HashCode);
					if ($stmt->fetch())
						return Config::SUCCESS;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::MYSQL_USER_SELECT_HASH_BY_EMAIL_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_USER_SELECT_HASH_BY_EMAIL_FAILED;				
				}
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug)
	{
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		$InstanceTeam = NULL; $InstanceTypeAssocUserTeam = NULL;
		$ArrayInstanceAssocUserTeam = array();
		
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectTeamByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserSelectTeamByUserEmail());
			if($stmt != NULL)
			{ 
				$userEmail = $InstanceUser->GetEmail();
				$stmt->bind_param("s", $userEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $mySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						if($row[Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID]    != NULL &&
						   $row[Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL] != NULL)
						{
							$InstanceTeam = $this->Factory->CreateTeam($row[Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION],
																	   $row[Config::TABLE_TEAM_FIELD_TEAM_ID],
																	   $row[Config::TABLE_TEAM_FIELD_TEAM_NAME],
																	   $row['Team'.Config::TABLE_FIELD_REGISTER_DATE]);
							$InstanceTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam(
								                                       $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION],
																	   $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID],
																	   $row['AssocUserTeam'.Config::TABLE_FIELD_REGISTER_DATE]);
							$InstanceAssocUserTeam = $this->Factory->CreateAssocUserTeam
								                                        ($row['AssocUserTeam'.Config::TABLE_FIELD_REGISTER_DATE],
																		$InstanceTeam,
																		$InstanceTypeAssocUserTeam,
									                                    $InstanceUser);
							array_push($ArrayInstanceAssocUserTeam, $InstanceAssocUserTeam);
						}
						else $ArrayInstanceAssocUserTeam = NULL;
					}
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if(!empty($ArrayInstanceAssocUserTeam))
					{
						$InstanceUser->SetArrayAssocUserTeam($ArrayInstanceAssocUserTeam);
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_EMPTY;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserUpdateActiveByUserEmail($UserEmail, $UserActive, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateActiveByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserUpdateActiveByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("is", $UserActive, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_UPDATE_BY_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function AssocUserCorporationUpdateByUserEmailAndCorporationName($AssocUserCorporationDepartmentNameNew,
		                                                                    $AssocUserCorporationRegistrationDateNew, 
																			$AssocUserCorporationRegistrationIdNew, 
																			$CorporationName, $UserEmail, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlAssocUserCorporationUpdateByUserEmailAndCorporationName');
			$stmt = $mySqlConnection->prepare(Persistence::SqlAssocUserCorporationUpdateByUserEmailAndCorporationName());
			if ($stmt)
			{
				$stmt->bind_param("sssss", $AssocUserCorporationDepartmentNameNew, $AssocUserCorporationRegistrationDateNew, 
								           $AssocUserCorporationRegistrationIdNew, $CorporationName, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_UPDATE_ASSOC_USER_CORPORATION_BY_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserUpdateByUserEmail($BirthDate, $Country, $UserEmail, $Gender, $UserName, $Region, $SessionExpires, 
									      $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix,
										  $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserUpdateByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("sssssiiiissssss", $BirthDate, $Country, $Gender, $UserName, $Region, $SessionExpires, 
								                 $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix,
								                 $UserUniqueId, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					if($errorCode == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE;
					else return Config::MYSQL_USER_UPDATE_BY_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateConfirmedByHashCode');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserUpdateConfirmedByHashCode());
			if ($stmt)
			{
				$stmt->bind_param("is", $UserConfirmedNew, $HashCode);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_UPDATE_CONFIRMED_BY_HASH_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserUpdateCorporationByUserEmail($Corporation, $UserEmail, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateCorporationByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserUpdateCorporationByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("ss", $Corporation, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_UPDATE_CORPORATION_BY_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserUpdateDepartmentByUserEmailAndCorporation($Corporation, $Department, $UserEmail, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateDepartmentByUserEmailAndCorporation');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserUpdateDepartmentByUserEmailAndCorporation());
			if ($stmt)
			{
				$stmt->bind_param("sss", $Department, $UserEmail, $Corporation);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_UPDATE_DEPARTMENT_BY_CORPORATION_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserUpdatePasswordByUserEmail($UserEmail, $Password, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdatePasswordByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserUpdatePasswordByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("ss", $Password, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_UPDATE_PASSWORD_BY_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserUpdateTwoStepVerificationByUserEmail($UserEmail, $TwoStepVerification, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateTwoStepVerificationByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserUpdateTwoStepVerificationByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("is", $TwoStepVerification, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_UPDATE_TWO_STEP_VERIFICATION_BY_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeId, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateUserTypeByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserUpdateUserTypeByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("is", $TypeId, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_UPDATE_USER_TYPE_BY_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserUpdateUniqueIdByUserEmail($UserEmail, $UniqueId, $Debug)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$return = $this->MySqlManager->OpenDataBaseConnection($mySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateUniqueIdByUserEmail');
			$stmt = $mySqlConnection->prepare(Persistence::SqlUserUpdateUniqueIdByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("ss", $UniqueId, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($mySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
				{
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::SUCCESS;
				}
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, $stmt);
					return Config::MYSQL_USER_UPDATE_UNIQUE_ID_BY_EMAIL_FAILED;
				}
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $mySqlConnection->error;
				$this->MySqlManager->CloseDataBaseConnection($mySqlConnection, NULL);
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
}
?>