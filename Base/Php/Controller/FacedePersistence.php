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
			public function AssocUserCorporationDelete($CorporationName, $Email, $Debug);
			public function AssocUserCorporationInsert($CorporationName, $RegistrationDate, $RegistrationId, $Email, $Debug);
			public function CorporationDelete($Name, $Debug);
			public function CorporationInsert($CorporationActive, $Name, $Debug);
			public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug);
			public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug);
			public function CorporationSelectByName($Name, &$CorporationInstance, $Debug);
			public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug);
			public function CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug);
			public function DepartmentDelete($CorporationName, $DepartmentName, $Debug);
			public function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug);
			public function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug);
			public function DepartmentSelectByCorporation($Limit1, $Limit2, $CorporationName, 
			                                              &$ArrayInstanceDepartment, &$RowCount, $Debug);
			public function DepartmentSelectByCorporationNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug);
			public function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug);
			public function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
			                                                                   &$DepartmentInstance, $Debug);
			public function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug);
			public function DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName,$DepartmentInitaisl,
			                                                                     $DepartmentNameNew, $DepartmentNameOld, $Debug);
			public function DepartmentUpdateCorporationByCorporationAndDepartment($DepartmentName, $CorporationNameNew,
																				  $CorporationNameOld, $Debug);
			public function CountrySelect($Limit1, $Limit2, &$ArrayCountry, &$RowCount, $Debug);
			public function TeamDeleteByTeamDescription($TeamDescription, $Debug)
			public function TeamDeleteByTeamId($TeamId, $Debug)
			public function TeamInsert($TeamDescription, $TeamName, $Debug);
			public function TeamSelect($Limit1, $Limit2, &A$rrayInstanceTeam, &$RowCount, $Debug);
			public function TeamSelectByTeamId($TeamId, &$TeamInstance, $Debug);
			public function TeamSelectByTeamName($TeamName, &$TeamInstance, $Debug);
			public function TeamUpdateByTeamId($TeamDescription, $TeamName, $TeamId, $Debug);
			public function TypeAssocUserTeamDelete($TypeAssocUserTeamTeamId, $Debug);
			public function TypeAssocUserTeamInsert($TypeAssocUserTeamTeamDescription, $Debug);
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
	
	public function AssocUserCorporationDelete($CorporationName, $Email, $Debug)
	{
		$FacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
		return $FacedePersistenceAssocUserCorporation->AssocUserCorporationDelete($CorporationName, $Email, $Debug);
	}
	
	public function AssocUserCorporationInsert($CorporationName, $RegistrationDate, $RegistrationId, $Email, $Debug)
	{
		$FacedePersistenceAssocUserCorporation = $this->Factory->CreateFacedePersistenceAssocUserCorporation();
		return $FacedePersistenceAssocUserCorporation->AssocUserCorporationInsert($CorporationName, $RegistrationDate, 
																		          $RegistrationId, $Email, $Debug);
	}
	
	public function AssocUserTeamDelete($TeamId, $UserEmail, $Debug)
	{
		$FacedePersistenceAssocUserTeam = $this->Factory->CreateFacedePersistenceAssocUserTeam();
		return $FacedePersistenceAssocUserTeam->AssocUserTeamDelete($TeamId, $UserEmail, $Debug);
	}
	
	public function AssocUserTeamInsert($TeamId, $TypeAssocUserTeam, $UserEmail, $Debug)
	{
		$FacedePersistenceAssocUserTeam = $this->Factory->CreateFacedePersistenceAssocUserTeam();
		return $FacedePersistenceAssocUserTeam->AssocUserTeamInsert($TeamId, $TypeAssocUserTeam, $UserEmail, $Debug);
	}
	
	public function CorporationDelete($Name, $Debug)
	{
		$FacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
		return $FacedePersistenceCorporation->CorporationDelete($Name, $Debug);
	}
	
	public function CorporationInsert($CorporationActive, $Name, $Debug)
	{
		$FacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
		return $FacedePersistenceCorporation->CorporationInsert($CorporationActive, $Name, $Debug);
	}
	
	public function CorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporation, &$RowCount, $Debug)
	{
		$FacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
		return $FacedePersistenceCorporation->CorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporation, $RowCount, $Debug);
	}
	
	public function CorporationSelectActiveNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$FacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
		return $FacedePersistenceCorporation->CorporationSelectActiveNoLimit($ArrayInstanceCorporation, $Debug);
	}
	
	public function CorporationSelectByName($Name, &$CorporationInstance, $Debug)
	{
		$FacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
		return $FacedePersistenceCorporation->CorporationSelectByName($Name, $CorporationInstance, $Debug);
	}
	
	public function CorporationSelectNoLimit(&$ArrayInstanceCorporation, $Debug)
	{
		$FacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
		return $FacedePersistenceCorporation->CorporationSelectNoLimit($ArrayInstanceCorporation, $Debug);
	}
	
	public function CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug)
	{
		$FacedePersistenceCorporation = $this->Factory->CreateFacedePersistenceCorporation();
		return $FacedePersistenceCorporation->CorporationUpdateByName($CorporationActive, $NameNew, $NameOld, $Debug);
	}
	
	public function DepartmentDelete($CorporationName, $DepartmentName, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentDelete($CorporationName, $DepartmentName, $Debug);
	}
	
	public function DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentInsert($CorporationName, $DepartmentInitials, $DepartmentName, $Debug);
	}
	public function DepartmentSelect($Limit1, $Limit2, &$ArrayInstanceDepartment, &$RowCount, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentSelect($Limit1, $Limit2, $ArrayInstanceDepartment, $RowCount, $Debug);
	}
	
	public function DepartmentSelectByCorporation($Limit1, $Limit2, $CorporationName, &$ArrayInstanceDepartment, &$RowCount, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentSelectByCorporation($Limit1, $Limit2, $CorporationName,
																		   $ArrayInstanceDepartment, $RowCount, $Debug);
	}
	
	public function DepartmentSelectByCorporationNoLimit($CorporationName, &$ArrayInstanceDepartment, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentSelectByCorporationNoLimit($CorporationName, $ArrayInstanceDepartment, $Debug);
	}
	
	public function DepartmentSelectByDepartmentName($DepartmentName, &$ArrayInstanceDepartment, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentSelectByDepartmentName($DepartmentName, $ArrayInstanceDepartment, $Debug);
	}
	
	public function DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName, 
																	   &$DepartmentInstance, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentSelectByDepartmentNameAndCorporationName($CorporationName, $DepartmentName,
																						        $DepartmentInstance, $Debug);
	}
	
	public function DepartmentSelectNoLimit(&$ArrayInstanceDepartment, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentSelectNoLimit($ArrayInstanceDepartment, $Debug);
	}
	
	public function DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName, $DepartmentInitials, $DepartmentNameNew, 
																		 $DepartmentNameOld, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentUpdateDepartmentByDepartmentAndCorporation($CorporationName,
																								  $DepartmentInitials,
																								  $DepartmentNameNew, $DepartmentNameOld, 
																		                          $Debug);
	}
	
	public function DepartmentUpdateCorporationByCorporationAndDepartment($DepartmentName, 
																		  $CorporationNameNew, $CorporationNameOld, $Debug)
	{
		$FacedePersistenceDepartment = $this->Factory->CreateFacedePersistenceDepartment();
		return $FacedePersistenceDepartment->DepartmentUpdateCorporationByCorporationAndDepartment($DepartmentName,                                                                                                        $CorporationNameNew,
																								   $CorporationNameOld,
																								   $Debug);
	}
	
	public function CountrySelect($Limit1, $Limit2, &$ArrayCountry, &$RowCount, $Debug)
	{
		$FacedePersistenceCountry = $this->Factory->CreateFacedePersistenceCountry();
		return $FacedePersistenceCountry->CountrySelect($Limit1, $Limit2, $ArrayCountry, $RowCount, $Debug);
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