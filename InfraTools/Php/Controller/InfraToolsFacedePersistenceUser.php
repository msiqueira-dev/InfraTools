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
			public function InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsUser,
			                                                       &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceInfraToolsUser,
			                                                        &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceInfraToolsUser,
			                                               &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount,
			                                                $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                               $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                               $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByTypeMonitoringDescription($Limit1, $Limit2, $TypeMonitoringDescription,
			                                                                &$ArrayInstanceInfraToolsUser,
			                                                                &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription,
			                                                                   &$ArrayInstanceInfraToolsUser,
																               &$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceInfraToolsUser,
																        &$RowCount, $Debug, $MySqlConnection);
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
		$ArrayInstanceInfraToolsUser = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelect');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelect());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ii", $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL   &&
						   $row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                       (NULL, $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE], 
							                                            $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
												                        $row["Corporation".ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row["TypeUser".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, 
												 NULL,
		   										 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
												 $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
												 $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
												 $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceInfraToolsUser, 
													      &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; 
		$InstaceTypeUser = NULL; $InstanceInfraToolsUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByCorporationName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByCorporationName());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $CorporationName, $CorporationName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		$row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                    $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, 
												 NULL,
												 NULL,
												 $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceInfraToolsUser, 
													      &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; 
		$InstaceTypeUser = NULL; $InstanceInfraToolsUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByDepartmentName');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByDepartmentName());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $CorporationName, $DepartmentName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		$row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                    $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, 
												 NULL,
												 NULL,
												 $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByIpAddressIpv4($Limit1, $Limit2, $IpAddressIpv4, &$ArrayInstanceInfraToolsUser,
			                                           &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsUserSelectByIpAddressIpv4');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsUserSelectByIpAddressIpv4());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $IpAddressIpv4, $IpAddressIpv4, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceInfraToolsUser,
													     &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByNotificationId');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByNotificationId());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("iiii", $NotificationId, $NotificationId, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceInfraToolsUser,
												   &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByRoleName');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByRoleName());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $RoleName, $RoleName, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByServiceId($Limit1, $Limit2, $ServiceId, &$ArrayInstanceInfraToolsUser, &$RowCount,
			                                        $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsUserSelectByServiceId');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsUserSelectByServiceId());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("iiii", $ServiceId, $ServiceId, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                     $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByTeamId');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByTeamId());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("iiii", $TeamId, $TeamId, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$ArrayInstanceInfraToolsUser = array();
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceInfraToolsUser, &$RowCount, 
			                                       $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByTicketId');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByTicketId());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("iiii", $TicketId, $TicketId, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$ArrayInstanceInfraToolsUser = array();
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByTypeMonitoringDescription($Limit1, $Limit2, $TypeMonitoringDescription, &$ArrayInstanceInfraToolsUser,
			                                                        &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlInfraToolsUserSelectByTypeMonitoringDescription');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlInfraToolsUserSelectByTypeMonitoringDescription());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $TypeMonitoringDescription, $TypeMonitoringDescription, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription,
			                                                           &$ArrayInstanceInfraToolsUser,
																       &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByTypeAssocUserTeamDescription');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByTypeAssocUserTeamDescription());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $TypeAssocUserTeamDescription, $TypeAssocUserTeamDescription, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceInfraToolsUser,
																&$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceAssocUserCorporation = NULL; $InstaceBaseTypeUser = NULL; 
		$InstanceCorporation = NULL; $InstanceDepartment = NULL; $InstanceInfraToolsUser = NULL;
		$mySqlError= NULL; $queryResult = NULL; $errorStr = NULL; $errorCode = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
				InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByTypeTicketDescription');
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByTypeTicketDescription());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $TypeTicketDescription, $TypeTicketDescription, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$ArrayInstanceInfraToolsUser = array();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, 
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		 $row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                     $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceBaseTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser(NULL,
												 NULL,
												 NULL,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceBaseTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
	
	public function InfraToolsUserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceInfraToolsUser, 
												              &$RowCount, $Debug, $MySqlConnection)
	{
		$InstanceArrayAssocUserTeam = NULL; 
		$InstanceAssocUserCorporation = NULL; $InstanceCorporation = NULL; $InstanceDepartment = NULL; 
		$InstaceTypeUser = NULL; $InstanceInfraToolsUser = NULL;
		$dateNow = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayInstanceInfraToolsUser = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			InfraToolsPersistence::ShowQueryInfraTools('SqlUserSelectByTypeUserDescription');
		if($MySqlConnection != NULL)
		{
			$stmt = $MySqlConnection->prepare(InfraToolsPersistence::SqlUserSelectByTypeUserDescription());
			if($stmt != NULL)
			{
				$limitResult = $Limit2 - $Limit1;
				$stmt->bind_param("ssii", $TypeUserDescription, $TypeUserDescription, $Limit1, $limitResult);
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if($return == ConfigInfraTools::RET_OK)
				{
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) 
					{
						$ArrayInstanceInfraToolsUser = array();
						$RowCount = $row['COUNT'];
						if($row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE] != NULL &&
						   $row[ConfigInfraTools::TB_CORPORATION_FD_NAME] != NULL 
						   && $row['Corporation' . ConfigInfraTools::TB_FD_REGISTER_DATE] != NULL)
						{
							$InstanceCorporation = $this->Factory->CreateInfraToolsCorporation
								                                        (NULL, $row[ConfigInfraTools::TB_CORPORATION_FD_ACTIVE],
																		$row[ConfigInfraTools::TB_CORPORATION_FD_NAME],
									                                    $row['Corporation'.ConfigInfraTools::TB_FD_REGISTER_DATE]);
							if($row[ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION] != NULL)
								$InstanceDepartment = $this->Factory->CreateDepartment(
									          $InstanceCorporation, 
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS],
									          $row[ConfigInfraTools::TB_DEPARTMENT_FD_NAME], 
									          $row["Department".ConfigInfraTools::TB_FD_REGISTER_DATE]);
						}
						else $InstanceCorporation = NULL;
						$InstaceTypeUser = $this->Factory->CreateTypeUser
							                               ($row[ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION],
															$row['TypeUser' . ConfigInfraTools::TB_FD_REGISTER_DATE]);
						$InstanceInfraToolsUser = $this->Factory->CreateInfraToolsUser($InstanceArrayAssocUserTeam, 
												 NULL,
												 NULL,
												 $row[ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE],
							                     $InstanceCorporation,
						                         $row[ConfigInfraTools::TB_USER_FD_USER_COUNTRY],
												 $InstanceDepartment,
							                     $row[ConfigInfraTools::TB_USER_FD_USER_EMAIL], 
						                         $row[ConfigInfraTools::TB_USER_FD_USER_GENDER], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_HASH_CODE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_NAME], 
												 $row[ConfigInfraTools::TB_USER_FD_USER_REGION],
												 $row["User".ConfigInfraTools::TB_FD_REGISTER_DATE],
												 $row[ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES],
												 $row[ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_ACTIVE],
						                         $row[ConfigInfraTools::TB_USER_FD_USER_CONFIRMED],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY],
												 $row[ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX],
												 $InstaceTypeUser,
												 $row[ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID]);
						if($InstanceCorporation != NULL && $InstanceInfraToolsUser != NULL 
						       && isset($row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE]))
								$InstanceAssocUserCorporation = $this->Factory->CreateAssocUserCorporation(
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE],
							                  $row[ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID],
											  $InstanceCorporation,															   
											  $row["AssocUserCorporation".ConfigInfraTools::TB_FD_REGISTER_DATE],
							                  $InstanceInfraToolsUser);
						$InstanceInfraToolsUser->SetAssocUserCorporation($InstanceAssocUserCorporation);
						array_push($ArrayInstanceInfraToolsUser, $InstanceInfraToolsUser);
					}
					if(!empty($ArrayInstanceInfraToolsUser))
						return ConfigInfraTools::RET_OK;
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL;
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
				if($return == ConfigInfraTools::RET_OK)
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
						return ConfigInfraTools::RET_OK;
					}
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_BY_USER_EMAIL_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL_BY_USER_EMAIL;
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
				if($return == ConfigInfraTools::RET_OK)
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
						return ConfigInfraTools::RET_OK;
					}
					else
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
						return ConfigInfraTools::DB_ERROR_USER_SEL_BY_USER_UNIQUE_ID_FETCH;
					}
				}
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					return ConfigInfraTools::DB_ERROR_USER_SEL_BY_USER_UNIQUE_ID;
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
}