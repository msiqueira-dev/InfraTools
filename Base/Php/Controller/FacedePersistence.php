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
			                                                          $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocTicketUserRequestingInsert($AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail,
			                                                $AssocUserRequestingTicketId, $Debug, 
															$MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocTicketUserRequestingSelect($Limit1, $Limit2, &$ArrayAssocTicketUserRequesting, 
			                                                &$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocTicketUserRequestingSelectByUserEmail($Limit1, $Limit2, $AssocTicketUserRequestingUserEmail,
			                                                          &$ArrayAssocTicketUserRequesting, &$RowCount,
			                                                          $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocTicketUserRequestingSelectByTicketId($AssocTicketUserRequestingTicketId,
			                                                          &$AssocTicketUserRequesting, 
			                                                          $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocTicketUserRequestingUpdateByTicketId($AssocTicketUserRequestingUserBond,
			                                                          $AssocTicketUserRequestingUserEmail, 
			                                                          $AssocUserRequestingTicketId, $Debug, 
																	  $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocUserCorporationDelete($CorporationName, $Email, $Debug,
			                                           $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocUserCorporationInsert($CorporationName, $RegistrationDate, $RegistrationId, $Email, $Debug,
			                                           $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocUserTeamDelete($TeamId, $UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function AssocUserTeamInsert($TeamId, $TypeAssocUserTeam, $UserEmail, $Debug, 
										        $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationDelete($Name, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationInsert($CorporationActive, $Name, $Debug, 
			                                  $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug,
			                                  $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug,
			                                               $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationSelectByName($CorporationName, &$CorporationInstance, $Debug,
			                                        $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug,
			                                         $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug,
			                                        $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug,
			                                 $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug,
			                                 $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug,
			                                 $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, 
			                                                  &$ArrayInstanceDepartment, &$RowCount, $Debug,
														      $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug,
			                                                         $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug,
			                                                 $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
			                                                                   &$DepartmentInstance, $Debug,
																			   $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug,
			                                        $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName, $DepartmentInitialsNew,
			                                                                     $DepartmentNameNew, $DepartmentNameOld, $Debug,
																				 $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function DepartmentUpdateCorporationByCorporationAndDepartment($CorporationNameNew, $CorporationNameOld,
																				  $DepartmentName, $Debug,
																				  $MySqlConnection = NULL, 
																				  $CloseConnectaion = FALSE);
			public function CountrySelect($Limit1, $Limit2, &$ArrayCountry, &$RowCount, $Debug);
			public function TeamDeleteByTeamDescription($TeamDescription, $Debug)
			public function TeamDeleteByTeamId($TeamId, $Debug)
			public function TeamInsert($TeamDescription, $TeamName, $Debug);
			public function TeamSelect($Limit1, $Limit2, &A$rrayInstanceTeam, &$RowCount, $Debug);
			public function TeamSelectByTeamId($TeamId, &$TeamInstance, $Debug);
			public function TeamSelectByTeamName($TeamName, &$TeamInstance, $Debug);
			public function TeamUpdateByTeamId($TeamDescription, $TeamName, $TeamId, $Debug);
			public function TypeAssocUserTeamDelete($TypeAssocUserTeamTeamId, $Debug,
			                                       $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function TypeAssocUserTeamInsert($TypeAssocUserTeamTeamDescription, $Debug, 
			                                        $MySqlConnection = NULL, $CloseConnectaion = FALSE);
			public function TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayTypeAssocUserTeam, &$RowCount, $Debug);
			public function TypeAssocUserTeamSelectByTeamDescription($TypeAssocUserTeam, &$TypeAssocUserTeam, $Debug);
			public function TypeAssocUserTeamSelectByTeamId($TypeAssocUserTeamTeamId, &$TypeAssocUserTeam, $Debug);
			public function TypeAssocUserTeamUpdateByTeamId($TypeAssocUserTeamTeamDescription, $TypeAssocUserTeamTeamId, $Debug);
			public function TypeServiceDelete($TypeServiceName, $Debug);
			public function TypeServiceInsert($TypServiceName, $TypeServiceSLA, $Debug);
			public function TypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceTypeService, &$RowCount, $Debug);
			public function TypeServiceSelectNoLimit(&$ArrayInstanceTypeService, $Debug);
			public function TypeServiceSelectByName($TypeServiceName, &$TypeService, $Debug);
			public function TypeServiceSelectBySLA($TypeServiceSLA, &$TypeService, $Debug);
			public function TypeServiceUpdateByName($TypeServiceName, $TypeServiceSLA, $Debug);
			public function TypeStatusTicketDelete($TypeStatusTicketId, $Debug);
			public function TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug);
			public function TypeStatusTicketSelect($Limit1, $Limit2, &$ArrayTypeStatusTicket, &$RowCount, $Debug);
			public function TypeStatusTicketSelectByDescription($TypeStatusTicketDescription, &$TypeStatusTicket, $Debug);
			public function TypeStatusTicketSelectById($TypeStatusTicketId, &$TypeStatusTicket, $Debug);
			public function TypeStatusTicketUpdateById($TypeStatusTicketDescription, $TypeStatusTicketId, $Debug);
			public function TypeTicketDelete($TypeTicketId, $Debug);
			public function TypeTicketInsert($TypeTicketDescription, $Debug);
			public function TypeTicketSelect($Limit1, $Limit2, &$ArrayTypeTicket, &$RowCount, $Debug);
			public function TypeTicketSelectByDescription($TypeTicketDescription, &$TypeTicket, $Debug);
			public function TypeTicketSelectById($TypeTicketId, &$TypeTicket, $Debug);
			public function TypeTicketUpdateById($TypeTicketDescription, $TypeTicketId, $Debug);
			public function TypeUserDelete($Id, $Debug);
			public function TypeUserInsert($Description, $Debug);
			public function TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug);
			public function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug);
			public function TypeUserSelectByDescription($Description, &$TypeUser, $Debug);
			public function TypeUserSelectById($Id, &$TypeUser, $Debug);
			public function TypeUserUpdateById($Id, $Description, $Debug);
			public function UserCheckEmail($Email, $Debug);
			public function UserCheckPasswordByEmail($Email, $Password, $Debug);
			public function UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug);
			public function UserDelete($Email, $Debug);
			public function UserInsert($BirthDate, $Corporation, $Country, $Department, $Email, $Gender, $HashCode, 
			                           $Name, $Password, $Region, $SessionExpires, $TwoStepVerification, 
									   $UserActive, $UserConfirmed, $UserType, $UserUniqueId $Debug);
			public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
			public function UserSelectByCorporation($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
			public function UserSelectByDepartment($DepartmentName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
			public function UserSelectByEmail($Email, &$InstanceUser, $Debug);
			public function UserSelectByTeamId($TeamId, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug);
			public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug);
			public function UserSelectConfirmedByHashCode(&$UserActive, $HashCode, $Debug);
			public function UserSelectHashCodeByEmail($Email, &$HashCode, $Debug);
			public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug);
			public function UserUpdateActiveByEmail($Email, $UserActive, $Debug);
			public function UserUpdateAssocUserCorporationByEmailAndCorporation($Corporation, $RegistrationDate, $RegistrationId, 
																		        $Email, $Debug);
			public function UserUpdateAssocUserCorporationRegistrationDateByEmailAndCorporation($Corporation, $RegistrationDate, 
																		                        $Email, $Debug);
			public function UserUpdateAssocUserCorporationRegistrationDateByEmailAndCorporation($Corporation, $RegistrationId, 
																		                        $Email, $Debug);
			public function UserUpdateByEmail($BirthDate, $Country, $Email, $Gender, $Name, $Region, $SessionExpires, 
									          $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug)
			public function UserUpdateConfirmedByHash($HashCode, $Debug);
			public function UserUpdateCorporationByEmail($Corporation, $Email, $Debug);
			public function UserUpdateDepartmentByEmailAndCorporation($Corporation, $Department, $Email, $Debug);
			public function UserUpdatePasswordByEmail($Email, $Password, $Debug);
			public function UserUpdateTwoStepVerificationByEmail($Email, $TwoStepVerification, $Debug);
			public function UserUpdateUserTypeByEmail($Email, $TypeId, $Debug);
			public function UserUpdateUniqueIdByEmail($Email, $UniqueId, $Debug);
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
	
	public function AssocTicketUserRequestingDeleteByTicketId($AssocTicketUserRequestingTicketId, $Debug, 
			                                                  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$FacedePersistenceAssocTicketUserRequesting = 
			                 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
		$return = $FacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingDeleteByTicketId(
			                                                                                $AssocUserServiceServiceId,
																							$AssocUserServiceUserEmail,
			                                                                                $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function AssocTicketUserRequestingInsert($AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail,
													$AssocUserRequestingTicketId, $Debug, 
													$MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$IFacedePersistenceAssocTicketUserRequesting = 
			                 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
		$return = $IFacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingInsert(
			                                                                                $AssocTicketUserRequestingUserBond, $AssocTicketUserRequestingUserEmail,
													                                        $AssocUserRequestingTicketId, 
			                                                                                $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function AssocTicketUserRequestingSelect($Limit1, $Limit2, &$ArrayAssocTicketUserRequesting, 
													&$RowCount, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$IFacedePersistenceAssocTicketUserRequesting = 
			                 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
		$return = $IFacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingSelect(
			                                                                                $Limit1, $Limit2, $ArrayAssocTicketUserRequesting, 
			                                                                                $RowCount, $Debug, 
			                                                                                $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;
	}
	
	public function AssocTicketUserRequestingSelectByUserEmail($Limit1, $Limit2, $AssocTicketUserRequestingUserEmail,
															  &$ArrayAssocTicketUserRequesting, &$RowCount,
															  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$FacedePersistenceAssocTicketUserRequesting = 
			                 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
		$return = $FacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingSelectByUserEmail(
			                                                                                $Limit1, $Limit2,
			                                                                                $AssocTicketUserRequestingUserEmail,
			                                                                                $ArrayAssocTicketUserRequesting, 
			                                                                                $RowCount, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function AssocTicketUserRequestingSelectByTicketId($AssocTicketUserRequestingTicketId,
															  &$AssocTicketUserRequesting, $Debug, 
															  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$FacedePersistenceAssocTicketUserRequesting = 
			                 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
		$return = $FacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingSelectByTicketId(
			                                                                                $AssocTicketUserRequestingTicketId,
			                                                                                $AssocTicketUserRequesting, 
			                                                                                $RowCount, $Debug, 
			                                                                                $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function AssocTicketUserRequestingUpdateByTicketId($AssocTicketUserRequestingUserBond,
															  $AssocTicketUserRequestingUserEmail, 
															  $AssocUserRequestingTicketId, $Debug, 
															  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$FacedePersistenceAssocTicketUserRequesting = 
			                 $this->Factory->CreateFacedePersistenceAssocTicketUserRequesting();
		$return = $FacedePersistenceAssocTicketUserRequesting->AssocTicketUserRequestingUpdateByTicketId(
			                                                                                $AssocTicketUserRequestingUserBond,
			                                                                                $AssocTicketUserRequestingUserEmail, 
			                                                                                $AssocUserRequestingTicketId, 
			                                                                                $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function AssocUserCorporationDelete($CorporationName, $Email, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$FacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
		$return = $FacedePersistenceAssocUserCorporation->AssocUserCorporationDelete($CorporationName, $Email, 
																				  $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function AssocUserCorporationInsert($CorporationName, $RegistrationDate, $RegistrationId, $Email, $Debug,
											   $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$FacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
		$return = $FacedePersistenceAssocUserCorporation->AssocUserCorporationInsert($CorporationName, $RegistrationDate, 
																		          $RegistrationId, $Email, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function AssocUserTeamDelete($TeamId, $UserEmail, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$FacedePersistenceAssocUserTeam = $this->Factory->CreateFacedePersistenceAssocUserTeam();
		$return = $FacedePersistenceAssocUserTeam->AssocUserTeamDelete($TeamId, $UserEmail, $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function AssocUserTeamInsert($TeamId, $TypeAssocUserTeam, $UserEmail, $Debug, 
										$MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		$FacedePersistenceAssocUserTeam = $this->Factory->CreateFacedePersistenceAssocUserTeam();
		$return = $FacedePersistenceAssocUserTeam->AssocUserTeamInsert($TeamId, $TypeAssocUserTeam, $UserEmail, 
		     														   $Debug, $MySqlConnection);
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function CorporationDelete($Name, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationDelete($Name, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationInsert($CorporationActive, $Name, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationInsert($CorporationActive, $Name, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug,
									  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporation,
																			   $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelectActive($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug,
											$MySqlConnection = NULL, $CloseConnectaion = FALSE)
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
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug,
												   $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationSelectActiveNoLimit($ArrayInstanceCorporation, $Debug,
																			                $MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelectByName($CorporationName, &$CorporationInstance, $Debug, 
											$MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationSelectByName($CorporationName, $CorporationInstance, 
																		             $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
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
											$MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
			$return = $instanceFacedePersistenceCorporation->CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, 
			  															     $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		if($CloseConnectaion)
			$this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		return $return;	
	}
	
	public function DepartmentDelete($DepartmentCorporationName, $DepartmentName, $Debug, 
									 $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentDelete($DepartmentCorporationName, $DepartmentName, 
																             $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug,
									 $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, 
															                 $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	public function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug,
									 $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentSelect($Limit1, $Limit2, $ArrayInstanceDepartment, 
																			 $RowCount, $Debug, $MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectByCorporationName($CorporationName, $Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount,
													  $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
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
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectByCorporationNameNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug,
														     $MySqlConnection = NULL, $CloseConnectaion = FALSE)
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
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug,
													 $MySqlConnection = NULL, $CloseConnectaion = FALSE)
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
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, &$DepartmentInstance,
																	   $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
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
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
			$return = $instanceFacedePersistenceDepartment->DepartmentSelectNoLimit($ArrayInstanceDepartment, $Debug,
																					$MySqlConnection);
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName, $DepartmentInitialsNew,
																		 $DepartmentNameNew, $DepartmentNameOld, $Debug, $MySqlConnection = NULL, $CloseConnectaion = FALSE)
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
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function DepartmentUpdateCorporationByCorporationAndDepartment($CorporationNameNew, $CorporationNameOld, 
																		  $DepartmentName, $Debug,
																		  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
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
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function CountrySelect($Limit1, $Limit2, &$ArrayCountry, &$RowCount, $Debug, 
								  $MySqlConnection = NULL, $CloseConnectaion = FALSE)
	{
		if($MySqlConnection == NULL)
			$return = $this->MySqlManager->OpenDataBaseConnection($MySqlConnection, $mySqlError);
		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistenceCountry = $this->Factory->CreateFacedePersistenceCountry();
			$return = $instanceFacedePersistenceCountry->CountrySelect($Limit1, $Limit2, $ArrayCountry, $RowCount, 
																	   $Debug, $MySqlConnection);
		
			if($CloseConnectaion)
				$return = $this->MySqlManager->CloseDataBaseConnection($MySqlConnection, NULL);
		}
		return $return;	
	}
	
	public function TeamDeleteByTeamDescription($TeamDescription, $Debug)
	{
		$FacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
		return $FacedePersistenceTeam->TeamDeleteByTeamDescription($TeamDescription, $Debug);
	}
	
	public function TeamDeleteByTeamId($TeamId, $Debug)
	{
		$FacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
		return $FacedePersistenceTeam->TeamDeleteByTeamId($TeamId, $Debug);
	}
	
	public function TeamInsert($TeamName, $TeamDescription, $Debug)
	{
		$FacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
		return $FacedePersistenceTeam->TeamInsert($TeamName, $TeamDescription, $Debug);
	}
	
	public function TeamSelect($Limit1, $Limit2, &$ArrayInstanceTeam, &$RowCount, $Debug)
	{
		$FacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
		return $FacedePersistenceTeam->TeamSelect($Limit1, $Limit2, $ArrayInstanceTeam, $RowCount, $Debug);
	}
	
	public function TeamSelectByTeamId($TeamId, &$TeamInstance, $Debug)
	{	
		$FacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
		return $FacedePersistenceTeam->TeamSelectByTeamId($TeamId, $TeamInstance, $Debug);
	}
	
	public function TeamSelectByTeamName($TeamName, &$TeamInstance, $Debug)
	{
		$FacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
		return $FacedePersistenceTeam->TeamSelectByTeamName($TeamName, $TeamInstance, $Debug);
	}
	
	public function TeamUpdateByTeamId($TeamDescription, $TeamName, $TeamId, $Debug)
	{
		$FacedePersistenceTeam = $this->Factory->CreateFacedePersistenceTeam();
		return $FacedePersistenceTeam->TeamUpdateByTeamId($TeamDescription, $TeamName, $TeamId, $Debug);
	}
	
	public function TypeAssocUserTeamDelete($TypeAssocUserTeamTeamId, $Debug)
	{
		$FacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
		return $FacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamDelete($TypeAssocUserTeamTeamId, $Debug);
	}
	
	public function TypeAssocUserTeamInsert($TypeAssocUserTeamTeamDescription, $Debug)
	{
		$FacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
		return $FacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamInsert($TypeAssocUserTeamTeamDescription, $Debug);
	}
	
	public function TypeAssocUserTeamSelect($Limit1, $Limit2, &$ArrayTypeAssocUserTeam, &$RowCount, $Debug)
	{
		$FacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
		return $FacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamSelect($Limit1, $Limit2, $ArrayTypeAssocUserTeam, 
																		    $RowCount, $Debug);	
	}
	
	public function TypeAssocUserTeamSelectByTeamDescription($TypeAssocUserTeamDescritpion, &$TypeAssocUserTeam, $Debug)
	{
		$FacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
		return $FacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamSelectByTeamDescription($TypeAssocUserTeamTeamDescription,
																					     $TypeAssocUserTeam, $Debug);
	}
	
	public function TypeAssocUserTeamSelectByTeamId($TypeAssocUserTeamTeamId, &$TypeAssocUserTeam, $Debug)
	{
		$FacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
		return $FacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamSelectByTeamId($TypeAssocUserTeamTeamId, $TypeAssocUserTeam,
																					$Debug);
	}
	
	public function TypeAssocUserTeamUpdateByTeamId($TypeAssocUserTeamTeamDescription, $TypeAssocUserTeamTeamId, $Debug)
	{
		$FacedePersistenceTypeAssocUserTeam = $this->Factory->CreateFacedePersistenceTypeAssocUserTeam();
		return $FacedePersistenceTypeAssocUserTeam->TypeAssocUserTeamUpdateByTeamId($TypeAssocUserTeamTeamDescription, 
																			        $TypeAssocUserTeamTeamId, $Debug);
	}
	
	public function TypeServiceDelete($TypeServiceName, $Debug)
	{
		$FacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
		return $FacedePersistenceTypeService->TypeServiceDelete($TypeServiceName, $Debug);
	}
	public function TypeServiceInsert($TypServiceName, $TypeServiceSLA, $Debug)
	{
		$FacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
		return $FacedePersistenceTypeService->TypeServiceInsert($TypServiceName, $TypeServiceSLA, $Debug);
	}
	
	public function TypeServiceSelectNoLimit(&$ArrayInstanceTypeService, $Debug)
	{
		$FacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
		return $FacedePersistenceTypeService->TypeServiceSelectNoLimit($ArrayInstanceTypeService, $Debug);
	}
	
	public function TypeServiceSelectByName($TypeServiceName, &$TypeService, $Debug)
	{
		$FacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
		return $FacedePersistenceTypeService->TypeServiceSelectByName($TypeServiceName, $TypeService, $Debug);
	}
	
	public function TypeServiceSelectBySLA($TypeServiceSLA, &$TypeService, $Debug)
	{
		$FacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
		return $FacedePersistenceTypeService->TypeServiceSelectBySLA($TypeServiceSLA, $TypeService, $Debug);
	}
	
	public function TypeServiceUpdateByName($TypeServiceName, $TypeServiceSLA, $Debug)
	{
		$FacedePersistenceTypeService = $this->Factory->CreateFacedePersistenceTypeService();
		return $FacedePersistenceTypeService->TypeServiceUpdateByName($TypeServiceName, $TypeServiceSLA, $Debug);
	}
	
	public function TypeStatusTicketDelete($TypeStatusTicketId, $Debug)
	{
		$FacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
		return $FacedePersistenceTypeStatusTicket->TypeStatusTicketDelete($TypeStatusTicketId, $Debug);
	}
	
	public function TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug)
	{
		$FacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
		return $FacedePersistenceTypeStatusTicket->TypeStatusTicketInsert($TypeStatusTicketDescription, $Debug);
	}
	public function TypeStatusTicketSelect($Limit1, $Limit2, &$ArrayTypeStatusTicket, &$RowCount, $Debug)
	{
		$FacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
		return $FacedePersistenceTypeStatusTicket->TypeStatusTicketSelect($Limit1, $Limit2, $ArrayTypeStatusTicket, 
																		  $RowCount, $Debug);
	}
	
	public function TypeStatusTicketSelectByDescription($TypeStatusTicketDescription, &$TypeStatusTicket, $Debug)
	{
		$FacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
		return $FacedePersistenceTypeStatusTicket->TypeStatusTicketSelectByDescription($TypeStatusTicketDescription,
																					   $TypeStatusTicket, $Debug);
	}
	
	public function TypeStatusTicketSelectById($TypeStatusTicketId, &$TypeStatusTicket, $Debug)
	{	
		$FacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
		return $FacedePersistenceTypeStatusTicket->TypeStatusTicketSelectById($TypeStatusTicketId, $TypeStatusTicket, $Debug);
	}
	
	public function TypeStatusTicketUpdateById($TypeStatusTicketDescription, $TypeStatusTicketId, $Debug)
	{
		$FacedePersistenceTypeStatusTicket = $this->Factory->CreateFacedePersistenceTypeStatusTicket();
		return $FacedePersistenceTypeStatusTicket->TypeStatusTicketUpdateById($TypeStatusTicketDescription, 
																			  $TypeStatusTicketId, $Debug);
	}

	public function TypeTicketDelete($TypeTicketId, $Debug)
	{
		$FacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
		return $FacedePersistenceTypeTicket->TypeTicketDelete($TypeTicketId, $Debug);
	}
	
	public function TypeTicketInsert($TypeTicketDescription, $Debug)
	{
		$FacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
		return $FacedePersistenceTypeTicket->TypeTicketInsert($TypeTicketDescription, $Debug);
	}
	
	public function TypeTicketSelect($Limit1, $Limit2, &$ArrayTypeTicket, &$RowCount, $Debug)
	{
		$FacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
		return $FacedePersistenceTypeTicket->TypeTicketSelect($Limit1, $Limit2, $ArrayTypeTicket, $RowCount, $Debug);
	}
	public function TypeTicketSelectByDescription($TypeTicketDescription, &$TypeTicket, $Debug)
	{
		$FacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
		return $FacedePersistenceTypeTicket->TypeTicketSelectByDescription($TypeTicketDescription, $TypeTicket, $Debug);
	}
	public function TypeTicketSelectById($TypeTicketId, &$TypeTicket, $Debug)
	{
		$FacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
		return $FacedePersistenceTypeTicket->TypeTicketSelectById($TypeTicketId, $TypeTicket, $Debug);
	}
	
	public function TypeTicketUpdateById($TypeTicketDescription, $TypeTicketId, $Debug)
	{
		$FacedePersistenceTypeTicket = $this->Factory->CreateFacedePersistenceTypeTicket();
		return $FacedePersistenceTypeTicket->TypeTicketUpdateById($TypeTicketDescription, $TypeTicketId, $Debug);
	}
	
	public function TypeUserDelete($Id, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceTypeUser();
		return $FacedePersistenceUser->TypeUserDelete($Id, $Debug);
	}
	
	public function TypeUserInsert($Description, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceTypeUser();
		return $FacedePersistenceUser->TypeUserInsert($Description, $Debug);
	}
	
	public function TypeUserSelect($Limit1, $Limit2, &$ArrayInstanceTypeUser, &$RowCount, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceTypeUser();
		return $FacedePersistenceUser->TypeUserSelect($Limit1, $Limit2, $ArrayInstanceTypeUser, $RowCount, $Debug);
	}
	
	public function TypeUserSelectNoLimit(&$ArrayInstanceTypeUser, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceTypeUser();
		return $FacedePersistenceUser->TypeUserSelectNoLimit($ArrayInstanceTypeUser, $Debug);
	}
	
	public function TypeUserSelectByDescription($Description, &$TypeUser, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceTypeUser();
		return $FacedePersistenceUser->TypeUserSelectByDescription($Description, $TypeUser, $Debug);
	}
	
	public function TypeUserSelectById($Id, &$TypeUser, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceTypeUser();
		return $FacedePersistenceUser->TypeUserSelectById($Id, $TypeUser, $Debug);
	}
	
	public function TypeUserUpdateById($Id, $Description, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceTypeUser();
		return $FacedePersistenceUser->TypeUserUpdateById($Id, $Description, $Debug);
	}
	
	public function UserCheckEmail($Email, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserCheckEmail($Email, $Debug);
		
	}
	
	public function UserCheckPasswordByEmail($Email, $Password, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserCheckPasswordByEmail($Email, $Password, $Debug);
	}
	
	public function UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserCheckPasswordByUserUniqueId($UserUniqueId, $Password, $Debug);
	}
	
	public function UserDelete($Email, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserDelete($Email, $Debug);
	}
	
	public function UserInsert($BirthDate, $Corporation, $Country, $Email, $Gender, $HashCode, $Name, $Password, 
							   $Region, $SessionExpires, $TwoStepVerification, $UserActive, 
							   $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary,
							   $UserPhoneSecondaryPrefix, $UserType, $UserUniqueId, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserInsert($BirthDate, $Corporation, $Country, 
												  $Email, $Gender, $HashCode, $Name, $Password, 
							                      $Region, $SessionExpires, $TwoStepVerification, $UserActive, 
												  $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryprefix, $UserPhoneSecondary,
												  $UserPhoneSecondaryPrefix, $UserType, $UserUniqueId, $Debug);
	}
	
	public function UserSelect($Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserSelect($Limit1, $Limit2, $ArrayInstanceUser, $RowCount, $Debug);
	}
			
	public function UserSelectByCorporation($CorporationName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
	 	$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserSelectByCorporation($CorporationName, $Limit1, $Limit2, 
															   $ArrayInstanceUser, $RowCount, $Debug);
	}
	
	public function UserSelectByDepartment($DepartmentName, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserSelectByDepartment($DepartmentName, $Limit1, $Limit2, $ArrayInstanceUser, 
															  $RowCount, $Debug);
	}
	
	public function UserSelectByEmail($Email, &$InstanceUser, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserSelectByEmail($Email, $InstanceUser, $Debug);
	}
	
	public function UserSelectByTeamId($TeamId, $Limit1, $Limit2, &$ArrayInstanceUser, &$RowCount, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserSelectByTeamId($TeamId, $Limit1, $Limit2, $ArrayInstanceUser, $RowCount, $Debug);
	}
	
	public function UserSelectByUserUniqueId($UserUniqueId, &$InstanceUser, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserSelectByUserUniqueId($UserUniqueId, $InstanceUser, $Debug);
	}
		
	public function UserSelectConfirmedByHashCode(&$UserActive, $HashCode, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserSelectConfirmedByHashCode($UserActive, $HashCode, $Debug);
	}
	
	public function UserSelectHashCodeByEmail($Email, &$HashCode, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserSelectHashCodeByEmail($Email, $HashCode, $Debug);
	}
	
	public function UserSelectTeamByUserEmail(&$InstanceUser, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserSelectTeamByUserEmail($InstanceUser, $Debug);
	}
	
	public function UserUpdateActiveByEmail($Email, $UserActive, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateActiveByEmail($Email, $UserActive, $Debug);
	}
	
	public function UserUpdateAssocUserCorporationByEmailAndCorporation($Corporation, $RegistrationDate, $RegistrationId, 
																		$Email, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateAssocUserCorporationByEmailAndCorporation($Corporation, $RegistrationDate, 
																						   $RegistrationId, $Email, $Debug);
	}
	
	public function UserUpdateAssocUserCorporationRegistrationDateByEmailAndCorporation($Corporation, $RegistrationDate, $RegistrationId, 
																		$Email, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateAssocUserCorporationRegistrationDateByEmailAndCorporation($Corporation, 
																										   $RegistrationDate, $Email, $Debug);
	}
	
	public function UserUpdateAssocUserCorporationRegistrationIdByEmailAndCorporation($Corporation, $RegistrationId, 
																					  $Email, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateAssocUserCorporationRegistrationIdByEmailAndCorporation($Corporation,
																						                 $RegistrationId, $Email, $Debug);
	}
	
	public function UserUpdateByEmail($BirthDate, $Country, $Email, $Gender, $Name, $Region, $SessionExpires, 
									  $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateByEmail($BirthDate, $Country, $Email, $Gender, $Name, $Region, $SessionExpires, 
									                     $TwoStepVerification, $UserActive, $UserConfirmed, $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, $UserUniqueId, $Debug);
	}
	
	public function UserUpdateConfirmedByHash($HashCode, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateConfirmedByHash($HashCode, $Debug);
	}
	
	public function UserUpdateCorporationByEmail($Corporation, $Email, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateCorporationByEmail($Corporation, $Email, $Debug);
	}
	
	public function UserUpdateDepartmentByEmailAndCorporation($Corporation, $Department, $Email, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateDepartmentByEmailAndCorporation($Corporation, $Department, $Email, $Debug);
	}
	
	public function UserUpdatePasswordByEmail($Email, $Password, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdatePasswordByEmail($Email, $Password, $Debug);
	}
	
	public function UserUpdateTwoStepVerificationByEmail($Email, $TwoStepVerification, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateTwoStepVerificationByEmail($Email, $TwoStepVerification, $Debug);
	}
	
	public function UserUpdateUserTypeByEmail($Email, $TypeId, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateUserTypeByEmail($Email, $TypeId, $Debug);
	}
	
	public function UserUpdateUniqueIdByEmail($Email, $UniqueId, $Debug)
	{
		$FacedePersistenceUser = $this->Factory->CreateFacedePersistenceUser();
		return $FacedePersistenceUser->UserUpdateUserTypeByEmail($Email, $UniqueId, $Debug);
	}
}