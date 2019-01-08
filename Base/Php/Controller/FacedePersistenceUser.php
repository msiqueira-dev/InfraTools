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
			public function UserCheckPasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection);
			public function UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug, $MySqlConnection);
			public function UserDeleteByUserEmail($UserEmail, $Debug, $MySqlConnection);
			public function UserInsert($BirthDate, $Corporation, $Country, $UserEmail, $Gender, $HashCode, 
			                           $UserName, $Password, $Region, $SessionExpires, $TwoStepVerification, 
									   $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary,
									   $UserPhoneSecondaryPrefix, $UserType, $UserUniqueId, $Debug, $MySqlConnection);
			public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection);
			public function UserSelectByCorporationName($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, 
			                                            $Debug, $MySqlConnection);
			public function UserSelectByDepartment($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceUser, 
			                                       &$RowCount, $Debug, $MySqlConnection);
			public function UserSelectByHashCode($HashCode, &$InstanceUser, $Debug, $MySqlConnection);
			public function UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection);
			public function UserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection);
			public function UserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceUser, &$RowCount, 
			                                                  $Debug, $MySqlConnection);
			public function UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, &$ArrayInstanceUser,
														             &$RowCount, $Debug, $MySqlConnection);
			public function UserSelectByTypeUserDescription($TypeUserDescription, $Limit1, $Limit2, &$ArrayInstanceUser, 
			                                                &$RowCount, $Debug, $MySqlConnection);
			public function UserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug, $MySqlConnection);
			public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, $MySqlConnection);
			public function UserSelectExistsByUserEmail($UserEmail, $Debug, $MySqlConnection);
			public function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug, $MySqlConnection);
			public function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug, $MySqlConnection);
			public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug, $MySqlConnection);
			public function UserUpdateActiveByUserEmail($UserEmail, $UserActive, $Debug, $MySqlConnection);
			public function UserUpdateByUserEmail($BirthDate, $Country, $UserEmail, $Gender, $UserName, $Region, $SessionExpires, 
									              $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix,
												  $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug, $MySqlConnection)
			public function UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug, $MySqlConnection);
			public function UserUpdateCorporationByUserEmail($Corporation, $UserEmail, $Debug);
			public function UserUpdateDepartmentByUserEmailAndCorporation($Corporation, $Department, $UserEmail, $Debug);
			public function UserUpdatePasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection);
			public function UserUpdateTwoStepVerificationByUserEmail($UserEmail, $TwoStepVerification, $Debug, $MySqlConnection);
			public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeId, $Debug, $MySqlConnection);
			public function UserUpdateUniqueIdByUserEmail($UserEmail, $UniqueId, $Debug, $MySqlConnection);
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
	
	public function UserCheckPasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserCheckPasswordByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserCheckPasswordByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("ss", $UserEmail, $Password);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if ($stmt->fetch())
					return Config::SUCCESS;
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_USER_CHECK_PASSWORD_BY_EMAIL_FAILED;
				}
				return $return;
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
	
	public function UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserCheckPasswordByUserUniqueId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserCheckPasswordByUserUniqueId());
			if($stmt != NULL)
			{
				$stmt->bind_param("ss", $UserUniqueId, $Password);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if ($stmt->fetch())
					return Config::SUCCESS;
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_USER_CHECK_PASSWORD_BY_USER_UNIQUE_ID_FAILED;
				}
				return $return;
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
	
	public function UserDeleteByUserEmail($UserEmail, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserDeleteByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserDeleteByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("s", $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode,  $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_DELETE_FAILED_NOT_FOUND;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_DELETE_FAILED;
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
	
	public function UserInsert($BirthDate, $Corporation, $Country, $UserEmail, $Gender, $HashCode, $UserName, $Password, 
							   $Region, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, 
							   $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary,
							   $UserPhoneSecondaryPrefix, $UserType, $UserUniqueId, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserInsert');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserInsert());
			if ($stmt)
			{
				$stmt->bind_param("sssssssssiiiissssis", $BirthDate, $Corporation, $Country, $UserEmail, $Gender, 
								                         $HashCode, $UserName, $Password, $Region, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserType,
								                         $UserUniqueId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				else
				{
					if($errorCode == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
					{
						$UserUniqueId = NULL;
						$stmt->bind_param("sssssssssiiiissssis", $BirthDate, $Corporation, $Country, $UserEmail, $Gender, 
										                         $HashCode, $UserName, $Password, $Region, 
										                         $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserType,
								                                 $UserUniqueId);
						$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
						if($errorStr == NULL && $stmt->affected_rows > 0)
							return Config::SUCCESS;
						else
						{
							if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
						}
					}
					return Config::MYSQL_USER_INSERT_FAILED;
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
	
	public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$ArrayInstanceUser = array();
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; 
		$InstaceBaseTypeUser = NULL; $InstanceDepartment = NULL;
		$InstanceCorporation = NULL; $InstanceUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelect());
			if($stmt != NULL)
			{
				$stmt->bind_param("ii", $Limit1, $Limit2);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
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
	
	public function UserSelectByCorporationName($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$ArrayInstanceUser = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByCorporationName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByCorporationName());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $CorporationName, $CorporationName, $Limit1, $Limit2);
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
	
	public function UserSelectByDepartment($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceUser, 
										   &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$ArrayInstanceUser = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByDepartment');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByDepartment());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $CorporationName, $DepartmentName, $Limit1, $Limit2);
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
	
	public function UserSelectByHashCode($HashCode, &$InstanceUser, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceDepartment = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByHashCode');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByHashCode());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $HashCode);
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
							$InstanceCorporation = $this->Factory->CreateCorporation(NULL, $corpActive, $corpName, $corpRegDate);
						if($depCorp != NULL && $depName != NULL && $depRegDate != NULL)
							$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, $depIni, $depName,
																				   $depRegDate);
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($usrTypeDescription,
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
						return Config::SUCCESS;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::MYSQL_USER_SELECT_BY_HASH_CODE_FETCH_FAILED;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::MYSQL_USER_SELECT_BY_HASH_CODE_FAILED;
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
	
	public function UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceTeam = NULL; $InstanceUser = NULL;
		$InstaceBaseTeam = NULL; $InstaceBaseTypeAssocUserTeam = NULL; $InstaceBaseAssocUserTeam = NULL;
		$ArrayInstanceUser = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTeamId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTeamId());
			if($stmt != NULL)
			{
				$stmt->bind_param("iiii", $TeamId, $TeamId, $Limit1, $Limit2);
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
							                               ($row['Team' . Config::TABLE_FIELD_REGISTER_DATE],
															$row[Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION],
						                                    $row[Config::TABLE_TEAM_FIELD_TEAM_ID],
															$row[Config::TABLE_TEAM_FIELD_TEAM_NAME]);
						$InstaceBaseTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam
							                               ($row['TypeAssocUserTeam' . Config::TABLE_FIELD_REGISTER_DATE],
														    $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION]);
						$InstaceBaseAssocUserTeam = $this->Factory->CreateAssocUserTeam
							                               ($row['AssocUserTeam' . Config::TABLE_FIELD_REGISTER_DATE],
														    $InstaceBaseTeam,
						                                    $InstaceBaseTypeAssocUserTeam,
														    $InstanceUser);
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
	
	public function UserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$ArrayInstanceUser = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTicketId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTicketId());
			if($stmt != NULL)
			{
				$stmt->bind_param("iiii", $TicketId, $TicketId, $Limit1, $Limit2);
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
						$InstanceUser = $this->Factory->CreateUser(NULL,
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
	
	public function UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, &$ArrayInstanceUser,
														     &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceTeam = NULL; $InstanceUser = NULL;
		$InstaceBaseTeam = NULL; $InstaceBaseTypeAssocUserTeam = NULL; $InstaceBaseAssocUserTeam = NULL;
		$ArrayInstanceUser = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTypeAssocUserTeamDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTypeAssocUserTeamDescription());
			if($stmt != NULL)
			{
				$stmt->bind_param("ssii", $TypeAssocUserTeamDescription, $TypeAssocUserTeamDescription, $Limit1, $Limit2);
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
							                               ($row['Team' . Config::TABLE_FIELD_REGISTER_DATE],
															$row[Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION],
						                                    $row[Config::TABLE_TEAM_FIELD_TEAM_ID],
															$row[Config::TABLE_TEAM_FIELD_TEAM_NAME]);
						$InstaceBaseTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam
							                               ($row['TypeAssocUserTeam' . Config::TABLE_FIELD_REGISTER_DATE],
														    $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION]);
						$InstaceBaseAssocUserTeam = $this->Factory->CreateAssocUserTeam
							                               ($row['AssocUserTeam' . Config::TABLE_FIELD_REGISTER_DATE],
														    $InstaceBaseTeam,
						                                    $InstaceBaseTypeAssocUserTeam,
														    $InstanceUser);
						$InstanceUser->PushArrayAssocUserTeam($InstaceBaseAssocUserTeam);
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
	
	public function UserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceUser, &$RowCount, 
													  $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$ArrayInstanceUser = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTypeTicketDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTypeTicketDescription());
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
															$row['TypeUser' . Config::TABLE_FIELD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser(NULL,
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
	
	public function UserSelectByTypeUserDescription($TypeUserDescription, $Limit1, $Limit2, &$ArrayInstanceUser, 
										            &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; 
		$InstaceTypeUser = NULL; $InstanceUser = NULL;
		$ArrayInstanceUser = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTypeUserDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTypeUserDescription());
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
	
	public function UserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceDepartment = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $UserEmail);
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
							$InstanceCorporation = $this->Factory->CreateCorporation(NULL, $corpActive, $corpName, $corpRegDate);
						if($depCorp != NULL && $depName != NULL && $depRegDate != NULL)
							$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, $depIni, $depName,
																				   $depRegDate);
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($usrTypeDescription,
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
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL;
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstaceTypeUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByUserUniqueId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByUserUniqueId());
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
							$InstanceCorporation = $this->Factory->CreateCorporation(NULL, $corpActive, 
																					$corpName, $corpRegDate);
						if($depCorp != NULL && $depName != NULL && $depRegDate != NULL)
							$InstanceDepartment = $this->Factory->CreateDepartment($InstanceCorporation, $depIni, $depName,
																				   $depRegDate);
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($usrTypeDescription,
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
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
	
	public function UserSelectExistsByUserEmail($UserEmail, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectExistsByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectExistsByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if ($stmt->fetch())
					return Config::SUCCESS;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::MYSQL_USER_SELECT_EXISTS_BY_USER_EMAIL_FAILED;
				}
				return $return;
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
	
	public function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $errorStr = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectUserActiveByHashCode');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectUserActiveByHashCode());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $HashCode);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
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
				return $return;
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
	
	public function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectHashCodeByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectHashCodeByUserEmail());
			if($stmt != NULL)
			{
				$stmt->bind_param("s", $UserEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
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
				return $return;
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
	
	public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug, $MySqlConnection)
	{
		$InstanceTeam = NULL; $InstanceTypeAssocUserTeam = NULL;
		$ArrayInstanceAssocUserTeam = array();
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectTeamByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectTeamByUserEmail());
			if($stmt != NULL)
			{ 
				$userEmail = $InstanceUser->GetEmail();
				$stmt->bind_param("s", $userEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::SUCCESS)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						if($row[Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID]    != NULL &&
						   $row[Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL] != NULL)
						{
							$InstanceTeam = $this->Factory->CreateTeam($row['Team'.Config::TABLE_FIELD_REGISTER_DATE],
								                                       $row[Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION],
																	   $row[Config::TABLE_TEAM_FIELD_TEAM_ID],
																	   $row[Config::TABLE_TEAM_FIELD_TEAM_NAME]);
							$InstanceTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam
							                                            ($row['TypeAssocUserTeam' . Config::TABLE_FIELD_REGISTER_DATE],
														                 $row[Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION]);
							$InstanceAssocUserTeam = $this->Factory->CreateAssocUserTeam
								                                        ($row['AssocUserTeam'.Config::TABLE_FIELD_REGISTER_DATE],
																		$InstanceTeam,
																		$InstanceTypeAssocUserTeam,
									                                    $InstanceUser);
							array_push($ArrayInstanceAssocUserTeam, $InstanceAssocUserTeam);
						}
						else $ArrayInstanceAssocUserTeam = NULL;
					}
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
					return Config::MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_FAILED;
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
	
	public function UserUpdateActiveByUserEmail($UserEmail, $UserActive, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateActiveByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdateActiveByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("is", $UserActive, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_UPDATE_BY_EMAIL_FAILED;
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
	
	public function UserUpdateByUserEmail($BirthDate, $Country, $UserEmail, $Gender, $UserName, $Region, $SessionExpires, 
									      $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix,
										  $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdateByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("sssssiiiissssss", $BirthDate, $Country, $Gender, $UserName, $Region, $SessionExpires, 
								                 $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix,
								                 $UserUniqueId, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					if($errorCode == Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE;
					else return Config::MYSQL_USER_UPDATE_BY_EMAIL_FAILED;
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
	
	public function UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug, $MySqlConnection)
	{
		$queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateConfirmedByHashCode');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdateConfirmedByHashCode());
			if ($stmt)
			{
				$stmt->bind_param("is", $UserConfirmedNew, $HashCode);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_UPDATE_CONFIRMED_BY_HASH_FAILED;
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
	
	public function UserUpdateCorporationByUserEmail($Corporation, $UserEmail, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateCorporationByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdateCorporationByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("ss", $Corporation, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_UPDATE_CORPORATION_BY_EMAIL_FAILED;
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
	
	public function UserUpdateDepartmentByUserEmailAndCorporation($Corporation, $Department, $UserEmail, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateDepartmentByUserEmailAndCorporation');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdateDepartmentByUserEmailAndCorporation());
			if ($stmt)
			{
				$stmt->bind_param("sss", $Department, $UserEmail, $Corporation);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_UPDATE_DEPARTMENT_BY_CORPORATION_EMAIL_FAILED;
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
	
	public function UserUpdatePasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdatePasswordByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdatePasswordByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("ss", $Password, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_UPDATE_PASSWORD_BY_EMAIL_FAILED;
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
	
	public function UserUpdateTwoStepVerificationByUserEmail($UserEmail, $TwoStepVerification, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateTwoStepVerificationByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdateTwoStepVerificationByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("is", $TwoStepVerification, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_UPDATE_TWO_STEP_VERIFICATION_BY_EMAIL_FAILED;
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
	
	public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeId, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateUserTypeByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdateUserTypeByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("is", $TypeId, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_UPDATE_USER_TYPE_BY_EMAIL_FAILED;
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
	
	public function UserUpdateUniqueIdByUserEmail($UserEmail, $UniqueId, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateUniqueIdByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdateUniqueIdByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("ss", $UniqueId, $UserEmail);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::SUCCESS;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_UPDATE_SAME_VALUE;
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::MYSQL_USER_UPDATE_UNIQUE_ID_BY_EMAIL_FAILED;
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
}
?>