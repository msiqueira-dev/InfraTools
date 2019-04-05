<?php

/************************************************************************
Class: FacedePersistence
Creation: 2017/09/01
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Factory.php
			Base       - Php/Controller/Config.php
			Base       - Php/Model/Corporation.php
			Base       - Php/Model/Country.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/TypeTicket.php
			Base       - Php/Model/TypeUser.php
			Base       - Php/Model/User.php
	
Description: 
			Class with Singleton pattern for FacedePersistence
Functions: 
			public function AssocTicketUserRequestingDeleteByTicketId($AssocTicketUserRequestingTicketId, $Debug, 
			                                                          $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocTicketUserRequestingInsert($AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail,
			                                                $AssocUserRequestingTicketId, $Debug, 
															$MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function AssocTicketUserRequestingSelect($Limit1, $Limit2, &$ArrayAssocTicketUserRequesting, 
			                                                &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocTicketUserRequestingSelectByUserEmail($Limit1, $Limit2, $AssocTicketUserRequestingUserEmail,
			                                                          &$ArrayAssocTicketUserRequesting, &$RowCount,
			                                                          $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocTicketUserRequestingSelectByTicketId($AssocTicketUserRequestingTicketId,
			                                                          &$AssocTicketUserRequesting, 
			                                                          $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocTicketUserRequestingUpdateByTicketId($AssocTicketUserRequestingUserBond,
			                                                          $AssocTicketUserRequestingUserEmail, 
			                                                          $AssocUserRequestingTicketId, $Debug, 
																	  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocUserCorporationDelete($CorporationName, $UserEmail, $Debug,
			                                           $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocUserCorporationInsert($CorporationName, $RegistrationDate, $RegistrationId, $UserEmail, $Debug,
			                                           $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function AssocUserCorporationUpdateByUserEmailAndCorporationName($AssocUserCorporationDepartmentNameNew,
			                                                                        $AssocUserCorporationRegistrationDateNew, 
			                                                                        $AssocUserCorporationRegistrationIdNew, 
																					$CorporationName, $UserEmail, $Debug
																					$MySqlConnection = NULL, $CloseConnectaion = TRUE,
																					$Commit = TRUE);
			public function AssocUserNotificationDelete($ArrayInstanceNotification, $ArrayInstanceUser, $Debug,
														$MySqlConnection = NULL, $CloseConnectaion = TRUE, $InstanceUser = NULL);
			public function AssocUserNotificationInsert($ArrayInstanceNotification, $ArrayInstanceUser, $Debug,
														$MySqlConnection = NULL, $CloseConnectaion = TRUE, $InstanceUser = NULL);
			public function AssocUserNotificationUpdateByUserEmailAndNotificationId($AssocUserNotificationReadNew, 
		                                                                            $NotificationIdNew, $UserEmailNew, 
		                                                                            &$InstanceAssocUserNotification, $Debug,
																					$MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocUserTeamDelete($TeamId, $UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function AssocUserTeamInsert($TeamId, $TypeAssocUserTeamDescription, $UserEmail, $Debug, 
										        $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function CorporationDelete($CorporationName, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function CorporationInsert($CorporationActive, $CorporationName, $Debug, 
			                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug,
			                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug,
			                                               $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function CorporationSelectByName($CorporationName, &$CorporationInstance, $Debug,
			                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug,
			                                         $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug,
			                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function CountrySelect($Limit1, $Limit2, &$ArrayInstanceCountry, &$RowCount, $Debug,
			                              $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug,
			                                 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug,
			                                 $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug,
			                                 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, 
			                                                  &$ArrayInstanceDepartment, &$RowCount, $Debug,
														      $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug,
			                                                         $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug,
			                                                 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
			                                                                   &$DepartmentInstance, $Debug,
																			   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug,
			                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName, $DepartmentInitialsNew,
			                                                                     $DepartmentNameNew, $DepartmentNameOld, $Debug,
																				 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function DepartmentUpdateCorporationByCorporationAndDepartment($CorporationNameNew, $CorporationNameOld,
																				  $DepartmentName, $Debug,
																				  $MySqlConnection = NULL, 
																				  $CloseConnectaion = TRUE);
			public function NotificationDeleteByNotificationId($NotificationId, $Debug,$MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function NotificationInsert($NotificationActive, $NotificationText, $Debug, 
			                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function NotificationSelect($Limit1, $Limit2, &$ArrayInstanceNotification, &$RowCount, $Debug,
			                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function NotificationSelectByNotificationId($NotificationId, &$InstanceNotification, $Debug,
			                                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function NotificationUpdateByNotificationId($NotificationActiveNew, $NotificationTextNew, &$NotificationId, $Debug,
			                                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function RoleSelectNoLimit(&$ArrayInstanceRole, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function SystemConfigurationDeleteBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, $Debug,
			                                                                           $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function SystemConfigurationInsert($SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
													  $SystemConfigurationOptionName, $SystemConfigurationOptionValue, $Debug,
													  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function SystemConfigurationSelect($Limit1, $Limit2, &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug,
			                                          $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function SystemConfigurationSelectBySystemConfigurationOptionName($Limit1, $Limit2, $SystemConfigurationOptionName, 
																					 &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug,
																					 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function SystemConfigurationSelectBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, 
																					   &$InstanceSystemConfiguration, $Debug,
																					   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function SystemConfigurationSelectNoLimit(&$ArrayInstanceSystemConfiguration, $Debug, 
			                                                 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function SystemConfigurationUpdateBySystemConfigurationOptionNumber($SystemConfigurationOptionActiveNew,
																					   $SystemConfigurationOptionDescriptionNew,
																					   $SystemConfigurationOptionNameNew,
																					   $SystemConfigurationOptionValueNew,
																					   $SystemConfigurationOptionNumber, $Debug,
																					   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamDeleteByTeamDescription($TeamDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamDeleteByTeamId($TeamId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamInsert($TeamDescription, $TeamName, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE,
			                           $Commit = TRUE);
			public function TeamSelect($Limit1, $Limit2, &A$rrayInstanceTeam, &$RowCount, $Debug,
			                           $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamSelectByTeamId($TeamId, &$TeamInstance, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamSelectByTeamName($TeamName, &$ArrayInstanceTeam, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamSelectNoLimit(&$ArrayInstanceTeam, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamUpdateByTeamId($TeamDescription, $TeamName, $TeamId, $Debug, 
			                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TicketDeleteByTicketId($TicketId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
		    public function TicketInsert($TicketDescription, $TicketSuggestion, $TicketTitle, $TypeStatusTicketDescription, 
		                                 $TypeTicketDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function TicketSelect($Limit1, $Limit2, &$ArrayInstanceTicket, &$RowCount, $Debug, 
			                             $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TicketSelectByTicketId($TicketId, &$InstanceTicket, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
		    public function TicketSelectByRequestingUserEmail($RequestingUserEmail, &$InstanceTicket, $Debug,
			                                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TicketSelectByResponsibleUserEmail($ResponsibleUserEmail, &$InstanceTicket, $Debug,
			                                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TicketUpdateByTicketId($TicketDescriptionNew, $TicketSuggestionNew, $TicketTitleNew,
										           $TypeStatusTicketDescriptionNew, $TypeTicketDescriptionNew, &$InstanceTicket, 
										           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
		    public function TicketUpdateTicketStatusByTicketId($TicketStatusNew, &$InstanceTicket, $Debug,
			                                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
		    public function TicketUpdateResponsibleUserByTicketId($ResponsibleUserEmailNew, &$InstanceTicket, $Debug,
			                                                      $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, $Debug,
			                                                                      $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeAssocUserTeamInsert($TypeAssocUserTeamDescription, $Debug, 
			                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayInstanceTypeAssocUserTeam, &$RowCount, $Debug,
			                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeAssocUserTeamSelectByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, &$InstanceTypeAssocUserTeam,
			                                                                      $Debug,
			                                                                      $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription($TypeAssocUserTeamDescriptionNew,
			                                                                      $TypeAssocUserTeamDescription, $Debug,
			                                                                      $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeStatusTicketDeleteByTypeStatusTicketDescription($TypeStatusTicketDescription, $Debug, 
			                                                                    $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug, $MySqlConnection = NULL, 
			                                       $CloseConnectaion = TRUE, $Commit = TRUE);
			public function TypeStatusTicketSelect($Limit1, $Limit2, &ArrayInstanceTypeStatusTicket, &$RowCount, $Debug,
			                                       $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeStatusTicketSelectByTypeStatusTicketDescription($TypeStatusTicketDescription, &$TypeStatusTicket, $Debug,
			                                                                    $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeStatusTicketUpdateByTypeStatusTicketDescription($TypeStatusTicketDescriptionNew, $TypeStatusTicketDescription,
			                                                                    $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeTicketDeleteByTypeTicketDescription($TypeTicketDescription, $Debug,
			                                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeTicketInsert($TypeTicketDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE,
			                                 $Commit = TRUE);
			public function TypeTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeTicket, &$RowCount, $Debug,
			                                 $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeTicketSelectByDescription($TypeTicketDescription, &$TypeTicket, $Debug,
			                                              $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeTicketUpdateByTypeTicketDescription($TypeTicketDescriptionNew, $TypeTicketDescription, $Debug,
			                                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserDeleteByTypeUserDescription($TypeUserDescription, $Debug, $MySqlConnection = NULL, 
			                                                    $CloseConnectaion = TRUE);
			public function TypeUserInsert($Description, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug,
			                               $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserSelectByTypeUserDescription($TypeUserDescription, &$InstanceTypeUser, $Debug,
			                                                    $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserSelectByTypeUserDescriptionLike($TypeUserDescription, &$ArrayInstanceTypeUser, $Debug,
			                                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserUpdateByTypeUserDescription($TypeUserDescriptionNew, $TypeUserDescriptionNew, $Debug, 
			                                                    $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserCheckPasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug, 
			                                                $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserDeleteByUserEmail($UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserInsert($BirthDate, $Corporation, $Country, $Department, $UserEmail, $Gender, $HashCode, 
			                           $UserName, $Password, $Region, $SessionExpires, $TwoStepVerification, 
									   $UserActive, $UserConfirmed, $UserType, $UserUniqueId, $Debug,
									   $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug, 
			                           $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceUser, &$RowCount, $Debug,
			                                            $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceUser, $Debug,
			                                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceUser, &$RowCount, 
			                                           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByDepartmentNameNoLimit($CorporationName, $DepartmentName, &$ArrayInstanceUser,
			                                                  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByHashCode($HashCode, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceUser, &$RowCount,
			                                           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceUser, &$RowCount, 
			                                     $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
		    public function UserSelectByRoleNameNoLimit($RoleName, &$ArrayInstanceUser, $Debug, 
			                                            $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug,
			                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByTeamIdNoLimit($TeamId, &$ArrayInstanceUser, $Debug,
			                                          $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceUser, &$RowCount, $Debug,
			                                     $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, &$ArrayInstanceUser,
																     &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceUser, &$RowCount, $Debug,
			                                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceUser, 
			                                                &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectExistsByUserEmail($UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectNoLimit(&$ArrayInstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectNotificationByUserEmail($Limit1, $Limit2, $InstanceUser, &ArrayInstanceAssocUserNotification, 
			                                                  &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectNotificationByUserEmailAndNotificationId($InstanceUser, $NotificationId,
			                                                                   &$InstanceAssocUserNotification, 
			                                                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectNotificationByUserEmailCount($InstanceUser, &$Count, $Debug, $MySqlConnection = NULL, 
			                                                       $CloseConnectaion = TRUE);
			public function UserSelectNotificationByUserEmailCountUnRead($InstanceUser, &$Count, $Debug, $MySqlConnection = NULL, 
			                                                             $CloseConnectaion = TRUE);
			public function UserSelectNotificationByUserEmailNoLimit($InstanceUser, &ArrayInstanceAssocUserNotification, $Debug, 
			                                                         $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserUpdateActiveByUserEmail($UserEmail, $UserActive, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserUpdateByUserEmail($BirthDate, $Country, $UserEmail, $Gender, $UserName, $Region, $SessionExpires, 
									              $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix,
												  $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug,
												  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug, 
			                                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserUpdateCorporationByUserEmail($Corporation, $UserEmail, $Debug);
			public function UserUpdateDepartmentByUserEmailAndCorporation($Corporation, $Department, $UserEmail, $Debug,
			                                                              $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserUpdatePasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserUpdateTwoStepVerificationByUserEmail($UserEmail, $TwoStepVerification, $Debug,
			                                                         $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeUserDescription, $Debug, $MySqlConnection = NULL, 
			                                              $CloseConnectaion = TRUE);
			public function UserUpdateUniqueIdByUserEmail($UserEmail, $UniqueId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
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

if (!class_exists("Persistence"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Persistence.php"))
		include_once(BASE_PATH_PHP_MODEL . "Persistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Persistence');
}

class FacedePersistence
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
	
	public function AssocTicketUserRequestingDeleteByTicketId($AssocTicketUserRequestingTicketId, $Debug, 
			                                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $instanceFacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingDeleteByTicketId(
																								$AssocUserServiceServiceId,
																								$AssocUserServiceUserEmail,
																								$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocTicketUserRequestingInsert($AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail,
													$AssocUserRequestingTicketId, $Debug, 
													$MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $instanceFacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingInsert(
																								$AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail,
																								$AssocUserRequestingTicketId, 
																								$Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocTicketUserRequestingSelect($Limit1, $Limit2, &$ArrayAssocTicketUserRequesting, 
													&$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $instanceFacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingSelect(
																								$Limit1, $Limit2, $ArrayAssocTicketUserRequesting, 
																								$RowCount, $Debug, 
																								$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocTicketUserRequestingSelectByUserEmail($Limit1, $Limit2, $AssocTicketUserRequestingUserEmail,
															  &$ArrayAssocTicketUserRequesting, &$RowCount,
															  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $instanceFacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingSelectByUserEmail(
																								$Limit1, $Limit2,
																								$AssocTicketUserRequestingUserEmail,
																								$ArrayAssocTicketUserRequesting, 
																								$RowCount, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function AssocTicketUserRequestingSelectByTicketId($AssocTicketUserRequestingTicketId,
															  &$AssocTicketUserRequesting, $Debug, 
															  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $instanceFacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingSelectByTicketId(
																								$AssocTicketUserRequestingTicketId,
																								$AssocTicketUserRequesting, 
																								$RowCount, $Debug, 
																								$MySqlConnection);
		}
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function AssocTicketUserRequestingUpdateByTicketId($AssocTicketUserRequestingUserBond,
															  $AssocTicketUserRequestingUserEmail, 
															  $AssocUserRequestingTicketId, $Debug, 
															  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $instanceFacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingUpdateByTicketId(
																								$AssocTicketUserRequestingUserBond,
																								$AssocTicketUserRequestingUserEmail, 
																								$AssocUserRequestingTicketId, 
																								$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function AssocUserCorporationDelete($CorporationName, $UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
			$return = $instanceFacedePersistenceAssocUserCorporation->AssocUserCorporationDelete($CorporationName, $UserEmail, 
																					             $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function AssocUserCorporationInsert($CorporationName, $RegistrationDate, $RegistrationId, $UserEmail, $Debug,
											   $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
			$return = $instanceFacedePersistenceAssocUserCorporation->AssocUserCorporationInsert($CorporationName, $RegistrationDate, 
																						 $RegistrationId, $UserEmail, $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function AssocUserCorporationUpdateByUserEmailAndCorporationName($AssocUserCorporationDepartmentNameNew,
																			$AssocUserCorporationRegistrationDateNew,
																			$AssocUserCorporationRegistrationIdNew, 
																			$CorporationName, $UserEmail, $Debug,
																			$MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
			$return = $instanceFacedePersistenceAssocUserCorporation->AssocUserCorporationUpdateByUserEmailAndCorporationName(
			                                                                            $AssocUserCorporationDepartmentNameNew,
																						$AssocUserCorporationRegistrationDateNew,
																						$AssocUserCorporationRegistrationIdNew, 
																						$CorporationName, $UserEmail, $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocUserNotificationUpdateByUserEmailAndNotificationId($AssocUserNotificationReadNew, 
		                                                                    $NotificationIdNew, $UserEmailNew, 
		                                                                    &$InstanceAssocUserNotification, $Debug,
																		    $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocUserNotification = $this->Factory->CreateFacedePersistenceAssocUserNotification();
			$return = $instanceFacedePersistenceAssocUserNotification->AssocUserNotificationUpdateByUserEmailAndNotificationId(
			                                                                            $AssocUserNotificationReadNew,
																						$NotificationIdNew,
																						$UserEmailNew, 
																						$InstanceAssocUserNotification, 
				                                                                        $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocUserNotificationDelete($ArrayInstanceNotification, $ArrayInstanceUser, $Debug,
											    $MySqlConnection = NULL, $CloseConnectaion = TRUE, $InstanceUser = NULL)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocUserNotification = $this->Factory->CreateFacedePersistenceAssocUserNotification();
			foreach($ArrayInstanceNotification as $instanceNotification)
			{
				$notificationId = $instanceNotification->GetNotificationId();
				foreach($ArrayInstanceUser as $instanceUser)
				{
					$userEmail = $instanceUser->GetEmail();
					$return = $instanceFacedePersistenceAssocUserNotification->AssocUserNotificationDelete(
			                                                                            $notificationId,
																						$userEmail,
				                                                                        $Debug, $MySqlConnection);
					if($return == Config::RET_OK)
					{
						$instanceSession = $this->Factory->CreateSession();
						$return = $instanceSession->SessionGetValueBySessionId($user, ProjectConfig::$ApplicationName, 
																	           $instanceUser->GetHashCode(), Config::SESS_USER);
						if($return == Config::RET_OK)
						{
							$instanceUser->SetAssocUserNotificationCountUnRead($user->GetAssocUserNotificationCountUnRead()-1);
							$return = $instanceSession->SessionUpdateValueBySessionId($instanceUser, 
																					  ProjectConfig::$ApplicationName,
																					  $instanceUser->GetHashCode(), 
																					  Config::SESS_USER);
							if($return == Config::RET_OK)
							{
								if($InstanceUser->GetHashCode() == $instanceUser->GetHashCode())
								{
									$InstanceUser->SetAssocUserNotificationCountUnRead($user->GetAssocUserNotificationCountUnRead()-1);
								}
							}
						}
					}
				}
			}
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocUserNotificationInsert($ArrayInstanceNotification, $ArrayInstanceUser, $Debug,
											    $MySqlConnection = NULL, $CloseConnectaion = TRUE, $InstanceUser = NULL)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocUserNotification = $this->Factory->CreateFacedePersistenceAssocUserNotification();
			foreach($ArrayInstanceNotification as $instanceNotification)
			{
				$notificationId = $instanceNotification->GetNotificationId();
				foreach($ArrayInstanceUser as $instanceUser)
				{
					$userEmail = $instanceUser->GetEmail();
					$return = $instanceFacedePersistenceAssocUserNotification->AssocUserNotificationInsert(
			                                                                            $notificationId,
																						$userEmail,
				                                                                        $Debug, $MySqlConnection);
					if($return == Config::RET_OK)
					{
						$instanceSession = $this->Factory->CreateSession();
						$return = $instanceSession->SessionGetValueBySessionId($user, ProjectConfig::$ApplicationName, 
																	           $instanceUser->GetHashCode(), Config::SESS_USER);
						if($return == Config::RET_OK)
						{
							$instanceUser->SetAssocUserNotificationCountUnRead($user->GetAssocUserNotificationCountUnRead()+1);
							$return = $instanceSession->SessionUpdateValueBySessionId($instanceUser, 
																					  ProjectConfig::$ApplicationName,
																					  $instanceUser->GetHashCode(), 
																					  Config::SESS_USER);
							if($return == Config::RET_OK)
							{
								if($InstanceUser->GetHashCode() == $instanceUser->GetHashCode())
								{
									$InstanceUser->SetAssocUserNotificationCountUnRead($user->GetAssocUserNotificationCountUnRead()+1);
								}
							}
						}
					}
				}
			}
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function AssocUserTeamDelete($TeamId, $UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocUserTeam = $this->Factory->CreateFacedePersistenceAssocUserTeam();
			$return = $instanceFacedePersistenceAssocUserTeam->AssocUserTeamDelete($TeamId, $UserEmail, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
			return $return;	
		}
	}
	
	public function AssocUserTeamInsert($TeamId, $TypeAssocUserTeamDescription, $UserEmail, $Debug, 
										$MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceAssocUserTeam = $this->Factory->CreateFacedePersistenceAssocUserTeam();
			$return = $instanceFacedePersistenceAssocUserTeam->AssocUserTeamInsert($TeamId, $TypeAssocUserTeamDescription, $UserEmail, 
																		           $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationDelete($CorporationName, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationDelete($CorporationName, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationInsert($CorporationActive, $CorporationName, $Debug, $MySqlConnection = NULL, 
									  $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationInsert($CorporationActive, $CorporationName, $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug,
									  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporation,
																			   $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug,
											$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationSelectActive($Limit1, $Limit2, 
																		             $ArrayInstanceCorporation, $RowCount,
																		             $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug,
												   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationSelectActiveNoLimit($ArrayInstanceCorporation, $Debug,
																			                $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelectByName($CorporationName, &$CorporationInstance, $Debug, 
											$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationSelectByName($CorporationName, $CorporationInstance, 
																		             $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationSelectNoLimit($ArrayInstanceCorporation, $Debug,
																					  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug,
											$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, 
			  															     $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function CountrySelect($Limit1, $Limit2, &$ArrayInstanceCountry, &$RowCount, $Debug, 
								  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceCountry = $this->Factory->CreateFacedePersistenceCountry();
			$return = $instanceFacedePersistenceCountry->CountrySelect($Limit1, $Limit2, $ArrayInstanceCountry, $RowCount, 
																	   $Debug, $MySqlConnection);
		
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug, 
									 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentDelete($DepartmentCorporationName, $DepartmentName, 
																             $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug,
									 $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, 
															                 $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	public function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug,
									 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentSelect($Limit1, $Limit2, $ArrayInstanceDepartment, 
																			 $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount,
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2,
		    																                  $ArrayInstanceDepartment, $RowCount, 
																				              $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug,
														     $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentSelectByCorporationNameNoLimit($CorporationName, 
			   																		                 $ArrayInstanceDepartment, 
																					                 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug,
													 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentSelectByDepartmentName($DepartmentName, 
																					         $ArrayInstanceDepartment, 
																					         $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, &$DepartmentInstance,
																	   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentSelectByDepartmentNameAndCorporationName($CorporationName,
																									           $DepartmentName,
																						                       $DepartmentInstance, 
																									           $Debug,
																											   $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentSelectNoLimit($ArrayInstanceDepartment, $Debug,
																					$MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName, $DepartmentInitialsNew,
																		 $DepartmentNameNew, $DepartmentNameOld, $Debug, 
																		 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName,
																								         $DepartmentInitialsNew,
																								         $DepartmentNameNew, 
																										 $DepartmentNameOld, 
																		                                 $Debug,
																								         $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentUpdateCorporationByCorporationAndDepartment($CorporationNameNew, $CorporationNameOld, 
																		  $DepartmentName, $Debug,
																		  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentUpdateCorporationByCorporationAndDepartment(
																											$CorporationNameNew,
																								            $CorporationNameOld,
				                                                                                            $DepartmentName,
																								            $Debug,
																										    $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function NotificationDeleteByNotificationId($NotificationId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceNotification = $this->Factory->CreateFacedePersistenceNotification();
			$return = $instanceFacedePersistenceNotification->NotificationDeleteByNotificationId($NotificationId,$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function NotificationInsert($NotificationActive, $NotificationText, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceNotification = $this->Factory->CreateFacedePersistenceNotification();
			$return = $instanceFacedePersistenceNotification->NotificationInsert($NotificationActive, $NotificationText,
																				 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;		
	}
	
	public function NotificationSelect($Limit1, $Limit2, &$ArrayInstanceNotification, &$RowCount, $Debug, 
									   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceNotification = $this->Factory->CreateFacedePersistenceNotification();
			$return = $instanceFacedePersistenceNotification->NotificationSelect($Limit1, $Limit2, $ArrayInstanceNotification, $RowCount,
																				 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function NotificationSelectByNotificationId($NotificationId, &$InstanceNotification, $Debug, 
													   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceNotification = $this->Factory->CreateFacedePersistenceNotification();
			$return = $instanceFacedePersistenceNotification->NotificationSelectByNotificationId($NotificationId,
																								 $InstanceNotification,
																				                 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function NotificationUpdateByNotificationId($NotificationActiveNew, $NotificationTextNew,
													   &$NotificationId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceNotification = $this->Factory->CreateFacedePersistenceNotification();
			$return = $instanceFacedePersistenceNotification->NotificationUpdateByNotificationId($NotificationActiveNew,
																								 $NotificationTextNew,
																								 $NotificationId,
																				                 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function RoleSelectNoLimit(&$ArrayInstanceRole, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceRole = $this->Factory->CreateFacedePersistenceRole();
			$return = $instanceFacedePersistenceRole->RoleSelectNoLimit($ArrayInstanceRole, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function SystemConfigurationDeleteBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, $Debug,
			                                                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceSystemConfiguration = $this->Factory->CreateFacedePersistenceSystemConfiguration();
			$return = $instanceFacedePersistenceSystemConfiguration->SystemConfigurationDeleteBySystemConfigurationOptionNumber(
				                                                                            $SystemConfigurationOptionNumber, 
				                                                                            $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function SystemConfigurationInsert($SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
											  $SystemConfigurationOptionName, $SystemConfigurationOptionValue, $Debug,
											  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceSystemConfiguration = $this->Factory->CreateFacedePersistenceSystemConfiguration();
			$return = $instanceFacedePersistenceSystemConfiguration->SystemConfigurationInsert(
				                                                                            $SystemConfigurationOptionActive,
				                                                                            $SystemConfigurationOptionDescription,
				                                                                            $SystemConfigurationOptionName, 
				                                                                            $SystemConfigurationOptionValue, 
				                                                                            $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function SystemConfigurationSelect($Limit1, $Limit2, &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug,
											  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceSystemConfiguration = $this->Factory->CreateFacedePersistenceSystemConfiguration();
			$return = $instanceFacedePersistenceSystemConfiguration->SystemConfigurationSelect($Limit1, $Limit2,
				                                                                               $ArrayInstanceSystemConfiguration,
				                                                                               $RowCount, 
				                                                                               $Debug, 
				                                                                               $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function SystemConfigurationSelectBySystemConfigurationOptionName($Limit1, $Limit2, $SystemConfigurationOptionName, 
																			 &$ArrayInstanceSystemConfiguration, &$RowCount, $Debug,
																			 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceSystemConfiguration = $this->Factory->CreateFacedePersistenceSystemConfiguration();
			$return = $instanceFacedePersistenceSystemConfiguration->SystemConfigurationSelectBySystemConfigurationOptionName($Limit1, $Limit2,
				                                                                               $SystemConfigurationOptionName,
				                                                                               $ArrayInstanceSystemConfiguration,
				                                                                               $RowCount, 
				                                                                               $Debug, 
				                                                                               $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function SystemConfigurationSelectBySystemConfigurationOptionNumber($SystemConfigurationOptionNumber, 
																			   &$InstanceSystemConfiguration, $Debug,
																			   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceSystemConfiguration = $this->Factory->CreateFacedePersistenceSystemConfiguration();
			$return = $instanceFacedePersistenceSystemConfiguration->SystemConfigurationSelectBySystemConfigurationOptionNumber(
				                                                                               $SystemConfigurationOptionNumber,
				                                                                               $InstanceSystemConfiguration,
				                                                                               $Debug, 
				                                                                               $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function SystemConfigurationSelectNoLimit(&$ArrayInstanceSystemConfiguration, $Debug, 
													 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceSystemConfiguration = $this->Factory->CreateFacedePersistenceSystemConfiguration();
			$return = $instanceFacedePersistenceSystemConfiguration->SystemConfigurationSelectNoLimit($ArrayInstanceSystemConfiguration,
				                                                                                      $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function SystemConfigurationUpdateBySystemConfigurationOptionNumber($SystemConfigurationOptionActiveNew,
																			   $SystemConfigurationOptionDescriptionNew,
																			   $SystemConfigurationOptionNameNew,
																			   $SystemConfigurationOptionValueNew,
																			   $SystemConfigurationOptionNumber, $Debug,
																			   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceSystemConfiguration = $this->Factory->CreateFacedePersistenceSystemConfiguration();
			$return = $instanceFacedePersistenceSystemConfiguration->SystemConfigurationUpdateBySystemConfigurationOptionNumber(
				                                                                               $SystemConfigurationOptionActiveNew,
																			                   $SystemConfigurationOptionDescriptionNew,
																			                   $SystemConfigurationOptionNameNew,
 																			                   $SystemConfigurationOptionValueNew,
				                                                                               $SystemConfigurationOptionNumber,
				                                                                               $Debug, 
				                                                                               $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TeamDeleteByTeamDescription($TeamDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamDeleteByTeamDescription($TeamDescription, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function TeamDeleteByTeamId($TeamId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamDeleteByTeamId($TeamId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TeamInsert($TeamDescription, $TeamName, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamInsert($TeamDescription, $TeamName, $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TeamSelect($Limit1, $Limit2, &$ArrayInstanceTeam, &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamSelect($Limit1, $Limit2, $ArrayInstanceTeam, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TeamSelectByTeamId($TeamId, &$TeamInstance, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamSelectByTeamId($TeamId, $TeamInstance, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TeamSelectByTeamName($TeamName, &$ArrayInstanceTeam, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamSelectByTeamName($TeamName, $ArrayInstanceTeam, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TeamSelectNoLimit(&$ArrayInstanceTeam, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamSelectNoLimit($ArrayInstanceTeam, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TeamUpdateByTeamId($TeamDescription, $TeamName, $TeamId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamUpdateByTeamId($TeamDescription, $TeamName, $TeamId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TicketDeleteByTicketId($TicketId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketDeleteByTicketId($TicketId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function TicketInsert($TicketDescription, $TicketSuggestion, $TicketTitle, $TypeStatusTicketDescription, 
		                         $TypeTicketDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketInsert($TicketDescription, $TicketSuggestion, $TicketTitle,
																     $TypeStatusTicketDescription, $TypeTicketDescription, 
																	 $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function TicketSelect($Limit1, $Limit2, &$ArrayInstanceTicket, &$RowCount, $Debug, 
			                     $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketSelect($Limit1, $Limit2, $ArrayInstanceTicket, $RowCount, 
																	 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TicketSelectByTicketId($TicketId, &$InstanceTicket, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketSelectByTicketId($TicketId, $InstanceTicket, 
																			   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function TicketSelectByRequestingUserEmail($RequestingUserEmail, &$InstanceTicket, $Debug,
			                                          $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketSelectByRequestingUserEmail($RequestingUserEmail, $InstanceTicket, 
																			              $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function TicketSelectByResponsibleUserEmail($ResponsibleUserEmail, &$InstanceTicket, $Debug,
			                                           $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketSelectByResponsibleUserEmail($ResponsibleUserEmail, $InstanceTicket, 
																			               $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TicketUpdateByTicketId($TicketDescriptionNew, $TicketSuggestionNew, $TicketTitleNew,
										   $TypeStatusTicketDescriptionNew, $TypeTicketDescriptionNew, &$InstanceTicket, 
										   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketUpdateByTicketId($TicketDescriptionNew, $TicketStatusNew, 
																			   $TicketSuggestionNew, $TicketTitleNew, 
																			   $TicketTypeNew, $InstanceTicket,
																			   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TicketUpdateTicketStatusByTicketId($TicketStatusNew, &$InstanceTicket, $Debug,
			                                           $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketUpdateTicketStatusByTicketId($TicketStatusNew, $InstanceTicket,
																			               $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TicketUpdateResponsibleUserByTicketId($ResponsibleUserEmailNew, &$InstanceTicket, $Debug)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketUpdateResponsibleUserByTicketId($ResponsibleUserEmailNew, $InstanceTicket,
																			                  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, $Debug, 
																		  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
			$return = $instanceFacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamDeleteByTypeAssocUserTeamDescription(
				                                                                             $TypeAssocUserTeamDescription, $Debug, 
																							 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeAssocUserTeamInsert($TypeAssocUserTeamDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
			$return = $instanceFacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamInsert($TypeAssocUserTeamDescription, $Debug,
																						   $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayInstanceTypeAssocUserTeam, &$RowCount, $Debug, 
											$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
			$return = $instanceFacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamSelect($Limit1, $Limit2, $ArrayInstanceTypeAssocUserTeam, 
																		                   $RowCount, $Debug, $MySqlConnection);	
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeAssocUserTeamSelectByTypeAssocUserTeamDescription($TypeAssocUserTeamDescription, &$InstanceTypeAssocUserTeam, $Debug,
															              $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
			$return = $instanceFacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamSelectByTypeAssocUserTeamDescription(
				                                                                                          $TypeAssocUserTeamDescription,
																					                      $InstanceTypeAssocUserTeam, $Debug,
																										  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription($TypeAssocUserTeamDescriptionNew,
																		  $TypeAssocUserTeamDescription, $Debug,
												                          $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
			$return = $instanceFacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamUpdateByTypeAssocUserTeamDescription(
				                                                                                   $TypeAssocUserTeamDescriptionNew, 
																			                       $TypeAssocUserTeamDescription, $Debug,
																								   $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeStatusTicketDeleteByTypeStatusTicketDescription($TypeStatusTicketDescription, $Debug,
															            $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
			$return = $instanceFacedePersistenceTypeStatusTicket->TypeStatusTicketDeleteByTypeStatusTicketDescription(
				                                                                                        $TypeStatusTicketDescription, 
				                                                                                        $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug,
										  $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
			$return = $instanceFacedePersistenceTypeStatusTicket->TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug, 
																						 $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function TypeStatusTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeStatusTicket, &$RowCount, $Debug,
										   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
			$return = $instanceFacedePersistenceTypeStatusTicket->TypeStatusTicketSelect($Limit1, $Limit2, $ArrayInstanceTypeStatusTicket, 
																		                 $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeStatusTicketSelectByTypeStatusTicketDescription($TypeStatusTicketDescription, &$TypeStatusTicket, $Debug,
																	    $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
			$return = $instanceFacedePersistenceTypeStatusTicket->TypeStatusTicketSelectByTypeStatusTicketDescription(
				                                                                                              $TypeStatusTicketDescription,
																					                          $TypeStatusTicket, $Debug,
																											  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeStatusTicketUpdateByTypeStatusTicketDescription($TypeStatusTicketDescriptionNew, $TypeStatusTicketDescription, $Debug,
															            $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
			$return = $instanceFacedePersistenceTypeStatusTicket->TypeStatusTicketUpdateByTypeStatusTicketDescription(
				                                                                                             $TypeStatusTicketDescriptionNew,
				                                                                                             $TypeStatusTicketDescription, 
																			                                 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}

	public function TypeTicketDeleteByTypeTicketDescription($TypeTicketDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
			$return = $instanceFacedePersistenceTypeTicket->TypeTicketDeleteByTypeTicketDescription($TypeTicketDescription, 
																									$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeTicketInsert($TypeTicketDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
			$return = $instanceFacedePersistenceTypeTicket->TypeTicketInsert($TypeTicketDescription, $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeTicketSelect($Limit1, $Limit2, &$ArrayInstanceTypeTicket, &$RowCount, $Debug, 
									 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
			$return = $instanceFacedePersistenceTypeTicket->TypeTicketSelect($Limit1, $Limit2, $ArrayInstanceTypeTicket, $RowCount, 
																			 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeTicketSelectByTypeTicketDescription($TypeTicketDescription, &$TypeTicket, $Debug, 
												            $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
			$return = $instanceFacedePersistenceTypeTicket->TypeTicketSelectByTypeTicketDescription($TypeTicketDescription, $TypeTicket, 
																						            $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeTicketUpdateByTypeTicketDescription($TypeTicketDescriptionNew, $TypeTicketDescription, $Debug, 
															$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
			$return = $instanceFacedePersistenceTypeTicket->TypeTicketUpdateByTypeTicketDescription($TypeTicketDescriptionNew,	
																									$TypeTicketDescription,
																									$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserDeleteByTypeUserDescription($TypeUserDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			return $instanceFacedePersistenceTypeUser->TypeUserDeleteByTypeUserDescription($TypeUserDescription, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserInsert($Description, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserInsert($Description, $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug, 
								   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserSelect($Limit1, $Limit2, $ArrayInstanceTypeUser, $RowCount, $Debug, 
																		 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserSelectNoLimit($ArrayInstanceTypeUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserSelectByTypeUserDescription($Description, &$InstanceTypeUser, $Debug, $MySqlConnection = NULL, 
														$CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserSelectByTypeUserDescription($Description, $InstanceTypeUser, $Debug, 
																							  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserSelectByTypeUserDescriptionLike($Description, &$ArrayInstanceTypeUser, $Debug, 
															$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserSelectByTypeUserDescriptionLike($Description, $ArrayInstanceTypeUser, $Debug, 
																							      $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserUpdateByTypeUserDescription($TypeUserDescriptionNew, $TypeUserDescription, $Debug, 
														$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserUpdateByTypeUserDescription($TypeUserDescriptionNew, $TypeUserDescription, 
																					          $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserCheckPasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserCheckPasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserDeleteByUserEmail($UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserDeleteByUserEmail($UserEmail, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserInsert($BirthDate, $Corporation, $Country, $UserEmail, $Gender, $HashCode, $UserName, $Password, 
							   $Region, $SessionExpires, $TwoStepVerification, $UserActive, 
							   $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary,
							   $UserPhoneSecondaryPrefix, $UserType, $UserUniqueId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE,
							   $Commit = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserInsert($BirthDate, $Corporation, $Country, 
												                 $UserEmail, $Gender, $HashCode, $UserName, $Password, 
							                                     $Region, $SessionExpires, $TwoStepVerification, $UserActive, 
												                 $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix,
																 $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
																 $UserType, $UserUniqueId, $Debug, $MySqlConnection);
			if($return == Config::RET_OK && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelect($Limit1, $Limit2, $ArrayInstanceUser, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByCorporationName($Limit1, $Limit2, $CorporationName, &$ArrayInstanceUser, &$RowCount, $Debug,
										        $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByCorporationName($Limit1, $Limit2, $CorporationName,
															                      $ArrayInstanceUser, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceUser, $Debug,
			                                           $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByCorporationNameNoLimit($CorporationName, $ArrayInstanceUser, 
																						 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceUser, &$RowCount, $Debug,
										   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByDepartmentName($Limit1, $Limit2, $CorporationName, $DepartmentName, 
																			 $ArrayInstanceUser, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByDepartmentNameNoLimit($CorporationName, $DepartmentName, &$ArrayInstanceUser,
			                                          $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByDepartmentNameNoLimit($CorporationName, $DepartmentName, 
																			            $ArrayInstanceUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByHashCode($HashCode, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByHashCode($HashCode, $InstanceUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByNotificationId($Limit1, $Limit2, $NotificationId, &$ArrayInstanceUser, &$RowCount,
			                                   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByNotificationId($Limit1, $Limit2, $NotificationId, 
																			     $ArrayInstanceUser, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByRoleName($Limit1, $Limit2, $RoleName, &$ArrayInstanceUser, &$RowCount, 
										 $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByRoleName($Limit1, $Limit2, $RoleName, 
																		   $ArrayInstanceUser, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByRoleNameNoLimit($RoleName, &$ArrayInstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByRoleNameNoLimit($RoleName, $ArrayInstanceUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug,
									   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByTeamId($Limit1, $Limit2, $TeamId, $ArrayInstanceUser, $RowCount, $Debug,
														                 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByTeamIdNoLimit($TeamId, &$ArrayInstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByTeamIdNoLimit($TeamId, $ArrayInstanceUser, $Debug,
														                        $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByTicketId($Limit1, $Limit2, $TicketId, &$ArrayInstanceUser, &$RowCount, $Debug,
			                                     $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByTicketId($Limit1, $Limit2, $TicketId, $ArrayInstanceUser, $RowCount, 
																		   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, &$ArrayInstanceUser,
														     &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, 
																							   $ArrayInstanceUser, $RowCount, $Debug,
																							   $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, &$ArrayInstanceUser, &$RowCount, $Debug,
													  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByTypeTicketDescription($Limit1, $Limit2, $TypeTicketDescription, 
																						$ArrayInstanceUser, $RowCount, $Debug,
														                 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription, &$ArrayInstanceUser, &$RowCount, 
										            $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByTypeUserDescription($Limit1, $Limit2, $TypeUserDescription,
																			          $ArrayInstanceUser, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByUserEmail($UserEmail, $InstanceUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByUserUniqueId($UserUniqueId, $InstanceUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectExistsByUserEmail($UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectExistsByUserEmail($UserEmail, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
		
	}
		
	public function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectUserActiveByHashCode($HashCode, $UserActive, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectHashCodeByUserEmail($UserEmail, $HashCode, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectNoLimit(&$ArrayInstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectNoLimit($ArrayInstanceUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectNotificationByUserEmail($Limit1, $Limit2, $InstanceUser, &$ArrayInstanceAssocUserNotification, &$RowCount, $Debug, 
			                                          $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectNotificationByUserEmail($Limit1, $Limit2, $InstanceUser,
																						$ArrayInstanceAssocUserNotification, $RowCount,
																						$Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectNotificationByUserEmailAndNotificationId($InstanceUser, $NotificationId, &$InstanceAssocUserNotification, 
			                                                           $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectNotificationByUserEmailAndNotificationId($InstanceUser, $NotificationId,
																						                 $InstanceAssocUserNotification,
																						                 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectNotificationByUserEmailCount($InstanceUser, &$Count, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectNotificationByUserEmailCount($InstanceUser, $Count, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectNotificationByUserEmailCountUnRead($InstanceUser, &$Count, $Debug, $MySqlConnection = NULL, 
																 $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectNotificationByUserEmailCountUnRead($InstanceUser, $Count, 
																								   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectNotificationByUserEmailNoLimit($InstanceUser, &$ArrayInstanceAssocUserNotification, $Debug, 
															 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectNotificationByUserEmailNoLimit($InstanceUser,
																							   $ArrayInstanceAssocUserNotification,
																							   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectTeamByUserEmail($InstanceUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateActiveByUserEmail($UserEmail, $UserActive, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateActiveByUserEmail($UserEmail, $UserActive, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateByUserEmail($BirthDate, $Country, $UserEmail, $Gender, $UserName, $Region, $SessionExpires,
									      $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix,
										  $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug,
										  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateByUserEmail($BirthDate, $Country, $UserEmail, $Gender, $UserName, $Region,
																	        $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed,
																	        $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary,
																	        $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateUserConfirmedByHashCode($UserConfirmedNew, $HashCode, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateCorporationByUserEmail($Corporation, $UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateCorporationByUserEmail($Corporation, $UserEmail, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateDepartmentByUserEmailAndCorporation($Corporation, $Department, $UserEmail, $Debug, 
																  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateDepartmentByUserEmailAndCorporation($Corporation, $Department, 
																									$UserEmail, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdatePasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdatePasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateTwoStepVerificationByUserEmail($UserEmail, $TwoStepVerification, $Debug, 
															 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateTwoStepVerificationByUserEmail($UserEmail, $TwoStepVerification, 
																							   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeUserDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateUserTypeByUserEmail($UserEmail, $TypeUserDescription, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateUniqueIdByUserEmail($UserEmail, $UniqueId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::RET_OK)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateUniqueIdByUserEmail($UserEmail, $UniqueId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
}