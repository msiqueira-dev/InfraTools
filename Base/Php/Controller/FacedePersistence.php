<?php

/************************************************************************
Class: FacedePersistence
Creation: 01/09/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Model/Corporation.php
			Base       - Php/Model/Country.php
			Base       - Php/Model/MySqlManager.php
			Base       - Php/Model/Persistence.php
			Base       - Php/Model/TypeTicket.php
			Base       - Php/Model/TypeUser.php
			Base       - Php/Model/User.php
	
Description: 
			Classe used to access and deal with information of the database.
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
																					$MySqlConnection = NULL, $CloseConnectaion = TRUE));
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
			public function CountrySelect($Limit1, $Limit2, &$ArrayCountry, &$RowCount, $Debug,
			                              $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamDeleteByTeamDescription($TeamDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamDeleteByTeamId($TeamId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamInsert($TeamDescription, $TeamName, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE,
			                           $Commit = TRUE);
			public function TeamSelect($Limit1, $Limit2, &A$rrayInstanceTeam, &$RowCount, $Debug,
			                           $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamSelectByTeamId($TeamId, &$TeamInstance, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TeamSelectByTeamName($TeamName, &$ArrayInstanceTeam, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
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
			public function TypeServiceDelete($TypeServiceName, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeServiceInsert($TypServiceName, $TypeServiceSLA, $Debug, $MySqlConnection = NULL, 
			                                  $CloseConnectaion = TRUE, $Commit = TRUE);
			public function TypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceTypeService, &$RowCount, $Debug,
			                                  $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeServiceSelectNoLimit(&$ArrayInstanceTypeService, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeServiceSelectByName($TypeServiceName, &$TypeService, $Debug, 
			                                        $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeServiceSelectBySLA($TypeServiceSLA, &$TypeService, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeServiceUpdateByName($TypeServiceName, $TypeServiceSLA, $Debug,
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
			public function TypeUserDelete($Id, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserInsert($Description, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE);
			public function TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug,
			                               $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserSelectByTypeUserDescription($TypeUserDescription, &$TypeUser, $Debug,
			                                                    $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserSelectByTypeUserId($Id, &$TypeUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function TypeUserUpdateByTypeUserId($TypeUserDescriptionNew, TypeUserId, $Debug, $MySqlConnection = NULL, 
			                                           $CloseConnectaion = TRUE);
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
			public function UserSelectByCorporationName($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug,
			                                            $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByDepartment($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceUser, &$RowCount, 
			                                       $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByHashCode($HashCode, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByTeamId($Limit1, $Limit2, $$TeamId, &$ArrayInstanceUser, &$RowCount, $Debug,
			                                   $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, &$ArrayInstanceUser,
																     &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByTypeUserId($TypeUserId, $Limit1, $Limit2, &$ArrayInstanceUser, 
			                                       &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectExistsByUserEmail($UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectUserActiveByHashCode($HashCode, &$UserActive, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
			public function UserSelectHashCodeByUserEmail($UserEmail, &$HashCode, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
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
			public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE);
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$FacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $FacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingDeleteByTicketId(
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $instanceFacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingInsert(
																								$AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail,
																								$AssocUserRequestingTicketId, 
																								$Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$FacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $FacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingSelectByUserEmail(
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$FacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $FacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingSelectByTicketId(
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$FacedePersistenceAssocTicketUserRequesting = 
								 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
			$return = $FacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingUpdateByTicketId(
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$FacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
			$return = $FacedePersistenceAssocUserCorporation->AssocUserCorporationDelete($CorporationName, $UserEmail, 
																					  $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function AssocUserCorporationInsert($CorporationName, $RegistrationDate, $RegistrationId, $UserEmail, $Debug,
											   $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$FacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
			$return = $FacedePersistenceAssocUserCorporation->AssocUserCorporationInsert($CorporationName, $RegistrationDate, 
																						 $RegistrationId, $UserEmail, $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
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
																			$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$FacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
			$return = $FacedePersistenceAssocUserCorporation->AssocUserCorporationUpdateByUserEmailAndCorporationName(
			                                                                            $AssocUserCorporationDepartmentNameNew,
																						$AssocUserCorporationRegistrationDateNew,
																						$AssocUserCorporationRegistrationIdNew, 
																						$CorporationName, $UserEmail, $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function AssocUserTeamDelete($TeamId, $UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$FacedePersistenceAssocUserTeam = $this->Factory->CreateFacedePersistenceAssocUserTeam();
			$return = $FacedePersistenceAssocUserTeam->AssocUserTeamDelete($TeamId, $UserEmail, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
			return $return;	
		}
	}
	
	public function AssocUserTeamInsert($TeamId, $TypeAssocUserTeamDescription, $UserEmail, $Debug, 
										$MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$FacedePersistenceAssocUserTeam = $this->Factory->CreateFacedePersistenceAssocUserTeam();
			$return = $FacedePersistenceAssocUserTeam->AssocUserTeamInsert($TeamId, $TypeAssocUserTeamDescription, $UserEmail, 
																		   $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationDelete($CorporationName, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationInsert($CorporationActive, $CorporationName, $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
	
	public function DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug, 
									 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, 
															                 $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
	
	public function CountrySelect($Limit1, $Limit2, &$ArrayCountry, &$RowCount, $Debug, 
								  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceCountry = $this->Factory->CreateFacedePersistenceCountry();
			$return = $instanceFacedePersistenceCountry->CountrySelect($Limit1, $Limit2, $ArrayCountry, $RowCount, 
																	   $Debug, $MySqlConnection);
		
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function TeamDeleteByTeamDescription($TeamDescription, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamInsert($TeamDescription, $TeamName, $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TeamSelect($Limit1, $Limit2, &$ArrayInstanceTeam, &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
			$return = $instanceFacedePersistenceTeam->TeamSelectByTeamName($TeamName, $ArrayInstanceTeam, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TeamUpdateByTeamId($TeamDescription, $TeamName, $TeamId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTicket = $this->Factory->CreateFacedePersistenceTicket();
			$return = $instanceFacedePersistenceTicket->TicketInsert($TicketDescription, $TicketSuggestion, $TicketTitle,
																     $TypeStatusTicketDescription, $TypeTicketDescription, 
																	 $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
			$return = $instanceFacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamInsert($TypeAssocUserTeamDescription, $Debug,
																						   $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
	
	public function TypeServiceDelete($TypeServiceName, $Debug,
									 $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
			$return = $instanceFacedePersistenceTypeService->TypeServiceDelete($TypeServiceName, $Debug);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	public function TypeServiceInsert($TypServiceName, $TypeServiceSLA, $Debug,
									 $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
			$return = $instanceFacedePersistenceTypeService->TypeServiceInsert($TypServiceName, $TypeServiceSLA, $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeServiceSelectNoLimit(&$ArrayInstanceTypeService, $Debug,
											$MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
			$return = $instanceFacedePersistenceTypeService->TypeServiceSelectNoLimit($ArrayInstanceTypeService, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeServiceSelectByName($TypeServiceName, &$TypeService, $Debug,
										   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
			$return = $instanceFacedePersistenceTypeService->TypeServiceSelectByName($TypeServiceName, $TypeService, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeServiceSelectBySLA($TypeServiceSLA, &$TypeService, $Debug,
										  $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
			$return = $instanceFacedePersistenceTypeService->TypeServiceSelectBySLA($TypeServiceSLA, $TypeService, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeServiceUpdateByName($TypeServiceName, $TypeServiceSLA, $Debug,
										   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
			$return = $instanceFacedePersistenceTypeService->TypeServiceUpdateByName($TypeServiceName, $TypeServiceSLA, $Debug, 
																					 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeStatusTicketDeleteByTypeStatusTicketDescription($TypeStatusTicketDescription, $Debug,
															            $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
			$return = $instanceFacedePersistenceTypeStatusTicket->TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug, 
																						 $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
			$return = $FacedePersistenceTypeStatusTicket->TypeStatusTicketSelectByTypeStatusTicketDescription($TypeStatusTicketDescription,
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
			$return = $instanceFacedePersistenceTypeTicket->TypeTicketInsert($TypeTicketDescription, $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
	
	public function TypeUserDelete($Id, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			return $instanceFacedePersistenceTypeUser->TypeUserDelete($Id, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserInsert($Description, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE, $Commit = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserInsert($Description, $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserSelectNoLimit($ArrayInstanceTypeUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserSelectByTypeUserDescription($Description, &$TypeUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserSelectByTypeUserDescription($Description, $TypeUser, $Debug, 
																							  $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserSelectByTypeUserId($Id, &$TypeUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserSelectByTypeUserId($Id, $TypeUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function TypeUserUpdateByTypeUserId($TypeUserDescriptionNew, $TypeUserId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceTypeUser = $this->Factory->CreateFacedePersistenceTypeUser();
			$return = $instanceFacedePersistenceTypeUser->TypeUserUpdateByTypeUserId($TypeUserDescriptionNew, $TypeUserId, 
																					 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserCheckPasswordByUserEmail($UserEmail, $Password, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserInsert($BirthDate, $Corporation, $Country, 
												                 $UserEmail, $Gender, $HashCode, $UserName, $Password, 
							                                     $Region, $SessionExpires, $TwoStepVerification, $UserActive, 
												                 $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix,
																 $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
																 $UserType, $UserUniqueId, $Debug, $MySqlConnection);
			if($return == ConfigInfraTools::SUCCESS && $Commit)
				$MySqlConnection->commit();
			else $MySqlConnection->rollback();
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelect($Limit1, $Limit2, $ArrayInstanceUser, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByCorporationName($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug,
										    $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByCorporationName($CorporationName, $Limit1, $Limit2, 
															                      $ArrayInstanceUser, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByHashCode($HashCode, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByHashCode($HashCode, $InstanceUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByDepartment($Limit1, $Limit2, $CorporationName, $DepartmentName, &$ArrayInstanceUser, &$RowCount, $Debug,
										   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByDepartment($Limit1, $Limit2, $CorporationName, $DepartmentName, 
																			 $ArrayInstanceUser, $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByUserEmail($UserEmail, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByUserEmail($UserEmail, $InstanceUser, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByTeamId($Limit1, $Limit2, $TeamId, &$ArrayInstanceUser, &$RowCount, $Debug,
									   $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByTeamId($Limit1, $Limit2, $TeamId, $ArrayInstanceUser, $RowCount, $Debug,
														                 $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByTypeAssocUserTeamDescription($Limit1, $Limit2, $TypeAssocUserTeamDescription, &$ArrayInstanceUser,
														     &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
	
	public function UserSelectByTypeUserId($TypeUserId, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, 
										   $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectByTypeUserId($TypeUserId, $Limit1, $Limit2, $ArrayInstanceUser,
																			 $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserSelectHashCodeByUserEmail($UserEmail, $HashCode, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
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
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateTwoStepVerificationByUserEmail($UserEmail, $TwoStepVerification, 
																							   $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateUserTypeByUserEmail($UserEmail, $TypeId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateUserTypeByUserEmail($UserEmail, $TypeId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
	
	public function UserUpdateUniqueIdByUserEmail($UserEmail, $UniqueId, $Debug, $MySqlConnection = NULL, $CloseConnectaion = TRUE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
	 	if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
			$return = $instanceFacedePersistenceUser->UserUpdateUserTypeByUserEmail($UserEmail, $UniqueId, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;
	}
}