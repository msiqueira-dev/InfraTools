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
			public function UserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceUser, 
			                                           &$RowCount, $Debug, $MySqlConnection);
			public function UserSelectByHashCode($HashCode, &$InstanceUser, $Debug, $MySqlConnection);
			public function UserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceUser,
			                                            &$RowCount, $Debug, $MySqlConnection);
			public function UserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceUser,
			                                     &$RowCount, $Debug, $MySqlConnection);
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
			public function UserSelectNotificationByNotificationId(&$InstanceUser, $Debug, $MySqlConnection);
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
			public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeUserDescription, $Debug, $MySqlConnection);
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
					return Config::RET_OK;
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_USER_CHECK_PASSWORD_BY_USER_EMAIL;
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
					return Config::RET_OK;
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_USER_CHECK_PASSWORD_BY_USER_UNIQUE_ID;
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
					return Config::RET_OK;
				elseif($errorStr == NULL && $stmt->affected_rows == 0)
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_DEL_BY_USER_EMAIL;
				}
				else
				{
					if($errorCode == Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT)
						return Config::DB_CODE_ERROR_FOREIGN_KEY_DEL_RESTRICT;
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_DEL_BY_USER_EMAIL;
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
				if($Gender == Config::FIELD_USER_GENDER_FEMALE)
					$Gender = Config::FIELD_USER_GENDER_FEMALE_VALUE;
				elseif($Gender ==Config::FIELD_USER_GENDER_MALE)
					$Gender = Config::FIELD_USER_GENDER_MALE_VALUE;
				else $Gender = FIELD_USER_GENDER_OTHER_VALUE;
				$stmt->bind_param("sssssssssiiiissssss", $BirthDate, $Corporation, $Country, $UserEmail, $Gender, 
								                         $HashCode, $UserName, $Password, $Region, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserType,
								                         $UserUniqueId);
				$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
				if($errorStr == NULL && $stmt->affected_rows > 0)
					return Config::RET_OK;
				else
				{
					if($errorCode == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
					{
						$UserUniqueId = NULL;
						$stmt->bind_param("sssssssssiiiissssss", $BirthDate, $Corporation, $Country, $UserEmail, $Gender, 
										                         $HashCode, $UserName, $Password, $Region, 
										                         $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserType,
								                                 $UserUniqueId);
						$this->MySqlManager->ExecuteInsertOrUpdate($MySqlConnection, $stmt, $errorCode, $errorStr, $queryResult);
						if($errorStr == NULL && $stmt->affected_rows > 0)
							return Config::RET_OK;
						else
						{
							if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
						}
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: [" . $errorCode . "] - " . $errorStr . "<br>";
					}
					return Config::DB_ERROR_USER_INSERT;
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
	
	public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; $InstanceDepartment = NULL;
		$InstanceCorporation = NULL; $InstanceUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelect');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL && $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row["Corporation".Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                       (NULL, 
																		$row[Config::TB_CORPORATION_FD_ACTIVE],
							                                            $row[Config::TB_CORPORATION_FD_NAME],
												                        $row["Corporation".Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row["TypeUser".Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification,
												 $InstanceArrayAssocUserTeam,
		   										 NULL,
							                     $row[Config::TB_USER_FD_USER_BIRTH_DATE],
												 $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
												 $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row["User".Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
	
	public function UserSelectByCorporationName($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByCorporationName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByCorporationName());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $CorporationName, $CorporationName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TB_CORPORATION_FD_ACTIVE],
																		 $row[Config::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row['Department'.Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser'.Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification,
												 $InstanceArrayAssocUserTeam,
												 NULL,
							                     $row[Config::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row['User'.Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
	
	public function UserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceUser, 
										       &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByDepartmentName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByDepartmentName());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $CorporationName, $DepartmentName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TB_CORPORATION_FD_ACTIVE],
																		 $row[Config::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row['Department'.Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification,
												 $InstanceArrayAssocUserTeam,
												 NULL,
							                     $row[Config::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row['User'.Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
				if($return == Config::RET_OK)
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
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification, $InstanceArrayAssocUserTeam,
																   NULL,
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
						return Config::RET_OK;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_BY_HASH_CODE_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL_BY_HASH_CODE;
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
	
	public function UserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceUser,
			                                   &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; $InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceTeam = NULL; $InstanceUser = NULL;
		$InstaceBaseTeam = NULL; $InstaceBaseTypeAssocUserTeam = NULL; $InstaceBaseAssocUserTeam = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByNotiticationId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByNotiticationId());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("iiii", $NotificationId, $NotificationId, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TB_CORPORATION_FD_ACTIVE],
																		 $row[Config::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification,
												 $InstanceArrayAssocUserTeam,
												 NULL,
							                     $row[Config::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row["User".Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
	
	public function UserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceUser,
										 &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceTeam = NULL; $InstanceUser = NULL;
		$InstaceBaseTeam = NULL; $InstaceBaseTypeAssocUserTeam = NULL; $InstaceBaseAssocUserTeam = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByRoleName');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByRoleName());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $RoleName, $RoleName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TB_CORPORATION_FD_ACTIVE],
																		 $row[Config::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification,
												 $InstanceArrayAssocUserTeam,
												 NULL,
							                     $row[Config::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row["User".Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
	
	public function UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceTeam = NULL; $InstanceUser = NULL;
		$InstaceBaseTeam = NULL; $InstaceBaseTypeAssocUserTeam = NULL; $InstaceBaseAssocUserTeam = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTeamId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTeamId());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("iiii", $TeamId, $TeamId, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc())
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TB_CORPORATION_FD_ACTIVE],
																		 $row[Config::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification,
												 $InstanceArrayAssocUserTeam,
												 NULL,
							                     $row[Config::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row["User".Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						$InstaceBaseTeam = $this->Factory->CreateTeam
							                               ($row['Team' . Config::TB_FD_REGISTER_DATE],
															$row[Config::TB_TEAM_FD_TEAM_DESCRIPTION],
						                                    $row[Config::TB_TEAM_FD_TEAM_ID],
															$row[Config::TB_TEAM_FD_TEAM_NAME]);
						$InstaceBaseTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam
							                               ($row['TypeAssocUserTeam' . Config::TB_FD_REGISTER_DATE],
														    $row[Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION]);
						$InstaceBaseAssocUserTeam = $this->Factory->CreateAssocUserTeam
							                               ($row['AssocUserTeam' . Config::TB_FD_REGISTER_DATE],
														    $InstaceBaseTeam,
						                                    $InstaceBaseTypeAssocUserTeam,
														    $InstanceUser);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
	
	public function UserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL;
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTicketId');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTicketId());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("iiii", $TicketId, $TicketId, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TB_CORPORATION_FD_ACTIVE],
																		 $row[Config::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification,
												 $InstanceArrayAssocUserTeam,
												 NULL,
							                     $row[Config::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row["User".Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
	
	public function UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, &$ArrayInstanceUser,
														     &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL;
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceTeam = NULL; $InstanceUser = NULL;
		$InstaceBaseTeam = NULL; $InstaceBaseTypeAssocUserTeam = NULL; $InstaceBaseAssocUserTeam = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTypeAssocUserTeamDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTypeAssocUserTeamDescription());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $TypeAssocUserTeamDescription, $TypeAssocUserTeamDescription, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TB_CORPORATION_FD_ACTIVE],
																		 $row[Config::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification,
												 $InstanceArrayAssocUserTeam,
												 NULL,
							                     $row[Config::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row["User".Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						$InstaceBaseTeam = $this->Factory->CreateTeam
							                               ($row['Team' . Config::TB_FD_REGISTER_DATE],
															$row[Config::TB_TEAM_FD_TEAM_DESCRIPTION],
						                                    $row[Config::TB_TEAM_FD_TEAM_ID],
															$row[Config::TB_TEAM_FD_TEAM_NAME]);
						$InstaceBaseTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam
							                               ($row['TypeAssocUserTeam' . Config::TB_FD_REGISTER_DATE],
														    $row[Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION]);
						$InstaceBaseAssocUserTeam = $this->Factory->CreateAssocUserTeam
							                               ($row['AssocUserTeam' . Config::TB_FD_REGISTER_DATE],
														    $InstaceBaseTeam,
						                                    $InstaceBaseTypeAssocUserTeam,
														    $InstanceUser);
						$InstanceUser->PushArrayAssocUserTeam($InstaceBaseAssocUserTeam);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
	
	public function UserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceUser, &$RowCount, 
													  $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL;
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = array();
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTypeTicketDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTypeTicketDescription());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $TypeTicketDescription, $TypeTicketDescription, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, 
																		 $row[Config::TB_CORPORATION_FD_ACTIVE],
																		 $row[Config::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification,
												 $InstanceArrayAssocUserTeam,
												 NULL,
							                     $row[Config::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row["User".Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
	
	public function UserSelectByTypeUserDescription($TypeUserDescription, $Limit1, $Limit2, &$ArrayInstanceUser, 
										            &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL;
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL;
		$InstaceTypeUser = NULL; $InstanceUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectByTypeUserDescription');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectByTypeUserDescription());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $TypeUserDescription, $TypeUserDescription, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[Config::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[Config::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . Config::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateCorporation
								                                        (NULL, $row[Config::TB_CORPORATION_FD_ACTIVE],
																		$row[Config::TB_CORPORATION_FD_NAME],
									                                    $row['Corporation'.Config::TB_FD_REGISTER_DATE]);
							if($row[Config::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[Config::TB_DEPARTMENT_FD_INITIALS],
									          $row[Config::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".Config::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($row[Config::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . Config::TB_FD_REGISTER_DATE]);
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification, 
												 $InstanceArrayAssocUserTeam,
												 NULL,
												 $row[Config::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[Config::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[Config::TB_USER_FD_USER_EMAIL], 
						                         $row[Config::TB_USER_FD_USER_GENDER], 
												 $row[Config::TB_USER_FD_USER_HASH_CODE],
												 $row[Config::TB_USER_FD_USER_NAME], 
												 $row[Config::TB_USER_FD_USER_REGION],
												 $row["User".Config::TB_FD_REGISTER_DATE],
												 $row[Config::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[Config::TB_USER_FD_USER_ACTIVE],
						                         $row[Config::TB_USER_FD_USER_CONFIRMED],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceTypeUser,
												 $row[Config::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceUser != NULL 
						       && isset($row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".Config::TB_FD_REGISTER_DATE],
							                  $InstanceUser);
						$InstanceUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceUser, $InstanceUser);
					}
					if(!empty($ArrayInstanceUser))
						return Config::RET_OK;
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL;
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
	
	public function UserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL;$InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
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
				if($return == Config::RET_OK)
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
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification, $InstanceArrayAssocUserTeam,
																   NULL,
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
						return Config::RET_OK;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_BY_USER_EMAIL_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL_BY_USER_EMAIL;
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
	
	public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserNotification = NULL; $InstanceArrayAssocUserTeam = NULL;
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
				if($return == Config::RET_OK)
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
						$InstanceUser = $this->Factory->CreateUser($InstanceArrayAssocUserNotification, $InstanceArrayAssocUserTeam, 
																   NULL,
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
						return Config::RET_OK;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_BY_USER_UNIQUE_ID_FETCH;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL_BY_USER_UNIQUE_ID;
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
					return Config::RET_OK;
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_USER_SEL_EXISTS_BY_USER_EMAIL;
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
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($UserActive);
					if ($stmt->fetch())
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_USER_SEL_BY_HASH_CODE;
					}
				}
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_USER_SEL_BY_HASH_CODE;
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
				if($return == Config::RET_OK)
				{
					$stmt->bind_result($HashCode);
					if ($stmt->fetch())
						return Config::RET_OK;
					else 
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						$return = Config::DB_ERROR_USER_SEL_HASH_BY_USER_EMAIL;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::DB_ERROR_USER_SEL_HASH_BY_USER_EMAIL;				
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
	
	public function UserSelectNotificationByUserEmail(&$InstanceUser, $Debug, $MySqlConnection)
	{
		$ArrayInstanceAssocUserNotification = NULL; $InstanceNotification = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserSelectNotificationByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserSelectNotificationByUserEmail());
			if($stmt != NULL)
			{ 
				$userEmail = $InstanceUser->GetEmail();
				$stmt->bind_param("s", $userEmail);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == Config::RET_OK)
				{
					$ArrayInstanceAssocUserNotification = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						if($row[Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID]    != NULL &&
						   $row[Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL] != NULL)
						{
							$InstanceNotification = $this->Factory->CreateNotification($row[Config::TB_NOTIFICATION_FD_NOTIFICATION_ACTIVE], 
																			   $row[Config::TB_NOTIFICATION_FD_NOTIFICATION_ID],
																			   $row[Config::TB_NOTIFICATION_FD_NOTIFICATION_TEXT],
																			   $row['AssocUserNotification'.Config::TB_FD_REGISTER_DATE]);
							$InstanceAssocUserNotification = $this->Factory->CreateAssocUserNotification
								                                        ($InstanceNotification,
																		 $row[Config::TB_ASSOC_USER_NOTIFICATION_FD_READ],
																		 $InstanceUser,
																		 $row['AssocUserNotification'.Config::TB_FD_REGISTER_DATE]);
							array_push($ArrayInstanceAssocUserNotification, $InstanceAssocUserNotification);
						}
						else $ArrayInstanceAssocUserNotification = NULL;
					}
					if(!empty($ArrayInstanceAssocUserNotification))
					{
						$InstanceUser->SetArrayAssocUserNotification($ArrayInstanceAssocUserNotification);
						return Config::RET_OK;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_NOTIFICATION_BY_USER_EMAIL_EMPTY;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL_NOTIFICATION_BY_USER_EMAIL;
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
	
	public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug, $MySqlConnection)
	{
		$InstanceTeam = NULL; $InstanceTypeAssocUserTeam = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceAssocUserTeam = NULL;
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
				if($return == Config::RET_OK)
				{
					$ArrayInstanceAssocUserTeam = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						if($row[Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID]    != NULL &&
						   $row[Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL] != NULL)
						{
							$InstanceTeam = $this->Factory->CreateTeam($row['Team'.Config::TB_FD_REGISTER_DATE],
								                                       $row[Config::TB_TEAM_FD_TEAM_DESCRIPTION],
																	   $row[Config::TB_TEAM_FD_TEAM_ID],
																	   $row[Config::TB_TEAM_FD_TEAM_NAME]);
							$InstanceTypeAssocUserTeam = $this->Factory->CreateTypeAssocUserTeam
							                                            ($row['TypeAssocUserTeam' . Config::TB_FD_REGISTER_DATE],
														                 $row[Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION]);
							$InstanceAssocUserTeam = $this->Factory->CreateAssocUserTeam
								                                        ($row['AssocUserTeam'.Config::TB_FD_REGISTER_DATE],
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
						return Config::RET_OK;
					}
					else
					{
						if($Debug == Config::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return Config::DB_ERROR_USER_SEL_TEAM_BY_USER_EMAIL_EMPTY;
					}
				}
				else
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return Config::DB_ERROR_USER_SEL_TEAM_BY_USER_EMAIL;
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
					return Config::DB_ERROR_USER_UPDT_BY_USER_EMAIL;
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
				if($Gender == Config::FIELD_USER_GENDER_FEMALE)
					$Gender = Config::FIELD_USER_GENDER_FEMALE_VALUE;
				elseif($Gender ==Config::FIELD_USER_GENDER_MALE)
					$Gender = Config::FIELD_USER_GENDER_MALE_VALUE;
				else $Gender = FIELD_USER_GENDER_OTHER_VALUE;
				$stmt->bind_param("sssssiiiissssss", $BirthDate, $Country, $Gender, $UserName, $Region, $SessionExpires, 
								                 $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix,
								                 $UserUniqueId, $UserEmail);
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
					if($errorCode == Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE)
						return Config::DB_CODE_ERROR_UNIQUE_KEY_DUPLICATE;
					else return Config::DB_ERROR_USER_UPDT_BY_USER_EMAIL;
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
					return Config::DB_ERROR_USER_UPDT_CONFIRMED_BY_HASH_CODE;
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
					return Config::DB_ERROR_USER_UPDT_BY_USER_EMAIL;
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
					return Config::DB_ERROR_USER_UPDT_DEPARTMENT_BY_USER_EMAIL_AND_CORPORATION;
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
					return Config::DB_ERROR_USER_UPDT_PASSWORD_BY_USER_EMAIL;
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
					return Config::DB_ERROR_USER_UPDT_TWO_STEP_VERIFICATION_BY_USER_EMAIL;
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
	
	public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeUserDescription, $Debug, $MySqlConnection)
	{
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				Persistence::ShowQuery('SqlUserUpdateUserTypeByUserEmail');
			$stmt = $MySqlConnection->prepare(Persistence::SqlUserUpdateUserTypeByUserEmail());
			if ($stmt)
			{
				$stmt->bind_param("ss", $TypeUserDescription, $UserEmail);
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
					return Config::DB_ERROR_USER_UPDT_USER_TYPE_BY_USER_EMAIL;
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
					return Config::DB_ERROR_USER_UPDT_UNIQUE_ID_BY_USER_EMAIL;
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