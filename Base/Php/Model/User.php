<?php

/************************************************************************
Class: User.php
Creation: 26/11/2013
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
Description: 
			Classe de controle para cada usuário do site.
Get / Set: 
			public function GetArrayAssocUserTeam();
			public function GetArrayNotification();
			public function GetAssocUserCorporation();
			public function GetAssocUserCorporationUserRegistrationDate();
			public function GetAssocUserCorporationUserRegistrationDateDay();
			public function GetAssocUserCorporationUserRegistrationDateMonth();
			public function GetAssocUserCorporationUserRegistrationDateYear();
			public function GetAssocUserCorporationUserRegistrationId();
			public function GetBirthDate();
			public function GetBirthDateDay();
			public function GetBirthDateMonth();
			public function GetBirthDateYear();
			public function GetCorporation();
			public function GetCorporationName();
			public function GetCountry();
			public function GetCountryAbbreviation();
			public function GetCountryName();
			public function GetCountryRegionCode();
			public function GetDepartment();
			public function GetDepartmentInitials();
			public function GetDepartmentName();
			public function GetEmail();
			public function GetGender();
			public function GetHashCode();
			public function GetLoggedIn();
			public function GetName();
			public function GetRegion();
			public function GetRegisterDate();
			public function GetSessionExpires();
			public function GetTwoStepVerification();
			public function GetUserActive();
			public function GetUserConfirmed();
			public function GetUserPhonePrimary();
			public function GetUserPhonePrimaryPrefix();
			public function GetUserPhoneSecondary();
			public function GetUserPhoneSecondaryPrefix();
			public function GetUserTypeDescription();
			public function GetUserTypeId();
			public function GetUserUniqueId();
			public function SetArrayAssocUserTeam($ArrayAssocUserTeam);
			public function SetArrayNotification($ArrayNotification);
			public function SetAssocUserCorporation($AssocUserCorporation);
			public function SetBirthDate($BirthDate);
			public function SetCorporation($CorporationInstance);
			public function SetCountry($Country);
			public function SetDepartment($DepartmentInstance);
			public function SetEmail($UserEmail);
			public function SetGender($Gender);
			public function SetHashCode($HashCode);
			public function SetLoggedIn($LoggedIn);
			public function SetName($UserName);
			public function SetRegion($Region);
			public function SetRegisterDate($RegisterDate);
			public function SetSessionExpires($SessionExpires);
			public function SetTwoStepVerification($TwoStepVerification);
			public function SetUserActive($UserActive);
			public function SetUserConfirmed($UserConfirmed);
			public function SetUserPhonePrimary($UserPhonePrimary)
			public function SetUserPhonePrimaryPrefix($UserPhonePrimaryPrefix)
			public function SetUserPhoneSecondary($UserPhoneSecondary)
			public function SetUserPhoneSecondaryPrefix($UserPhoneSecondaryPrefix);
			public function SetUserType($UserTypeInstance);
			public function SetUniqueId($UniqueId);
Methods:
			public function CheckAssocUserCorporationRegistrationDateActive();
			public function CheckAssocUserCorporationRegistrationIdActive();
			public function CheckCorporationActive();
			public function CheckDepartmentExists();
			public function CheckSuperUser();
			public function UpdateUser($ArrayAssocUserTeam, $ArrayNotification, $AssocUserCorporation, 
									   $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, $Gender, 
									   $HashCode, $LoggedIn, $UserName, $Region, $RegisterDate, $SessionExpires, 
									   $TwoStepVerification, $UserActive, $UserConfirmed, 
									   $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix,
									   $UserTypeInstance, $UserUniqueId);
**************************************************************************/

class User
{		
	/* Properties */
	protected $ArrayAssocUserTeam          = NULL;
	protected $ArrayNotification           = NULL;
	protected $AssocUserCorporation        = NULL;
	protected $BirthDate                   = NULL;
	protected $Corporation                 = NULL;
	protected $Country                     = NULL;
	protected $Department                  = NULL;
	protected $UserEmail                   = NULL;
	protected $Gender                      = NULL;
	protected $HashCode                    = NULL;
	protected $LoggedIn                    = NULL;
	protected $UserName                    = NULL;
	protected $Region                      = NULL;
	protected $RegisterDate                = NULL;
	protected $SessionExpires              = NULL;
	protected $TwoStepVerification         = NULL;
	protected $UserActive                  = NULL;
	protected $UserConfirmed               = NULL;
	protected $UserPhonePrimary            = NULL;
	protected $UserPhonePrimaryPrefix      = NULL;
	protected $UserPhoneSecondary          = NULL;
	protected $UserPhoneSecondaryPrefix    = NULL;
	protected $UserType                    = NULL;
	protected $UserUniqueId                = NULL;
	
	/* Constructor */
	public function __construct($ArrayAssocUserTeam, $ArrayNotification, $AssocUserCorporation,
								$BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, 
								$Gender, $HashCode, $UserName, $Region, $RegisterDate, $SessionExpires, 
								$TwoStepVerification, $UserActive, $UserConfirmed, 
								$UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
								$UserTypeInstance, $UserUniqueId) 
    {
		$this->ArrayAssocUserTeam       = $ArrayAssocUserTeam;
		$this->ArrayNotification        = $ArrayNotification;
		$this->AssocUserCorporation     = $AssocUserCorporation;
		$this->BirthDate                = $BirthDate;
		$this->Corporation              = $CorporationInstance;
		$this->Country                  = $Country;
		$this->Department               = $DepartmentInstance;
		$this->UserEmail                = $UserEmail;
		$this->Gender                   = $Gender;
		$this->HashCode                 = $HashCode;
		$this->UserName                 = $UserName;
		$this->Region                   = $Region;
		$this->RegisterDate             = $RegisterDate;
		$this->SessionExpires           = $SessionExpires;
		$this->TwoStepVerification      = $TwoStepVerification;
		$this->UserActive               = $UserActive;
		$this->UserConfirmed            = $UserConfirmed;
		$this->UserPhonePrimary         = $UserPhonePrimary;
		$this->UserPhonePrimaryPrefix   = $UserPhonePrimaryPrefix;
		$this->UserPhoneSecondary       = $UserPhoneSecondary;
		$this->UserPhoneSecondaryPrefix = $UserPhoneSecondaryPrefix;
		$this->UserType                 = $UserTypeInstance;
		$this->UserUniqueId             = $UserUniqueId;   
    }
	
	/* GET */
	public function GetArrayAssocUserTeam()
	{
		return $this->ArrayAssocUserTeam;
	}
			
	public function GetArrayNotification()
	{
		return $this->ArrayNotification;
	}
	
	public function GetAssocUserCorporation()
	{
		return $this->AssocUserCorporation;
	}
	
	public function GetAssocUserCorporationUserRegistrationDate()
	{
		if($this->AssocUserCorporation != NULL)
		{
			if(is_object($this->AssocUserCorporation))
				return $this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate();
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetAssocUserCorporationUserRegistrationDateDay()
	{
		if($this->AssocUserCorporation != NULL)
		{
			if(is_object($this->AssocUserCorporation))
				return date('d',strtotime($this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate()));
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetAssocUserCorporationUserRegistrationDateMonth()
	{
		if($this->AssocUserCorporation != NULL)
		{
			if(is_object($this->AssocUserCorporation))
				return date('m',strtotime($this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate()));
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetAssocUserCorporationUserRegistrationDateYear()
	{
		if($this->AssocUserCorporation != NULL)
		{
			if(is_object($this->AssocUserCorporation))
				return date('Y',strtotime($this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate()));
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetAssocUserCorporationUserRegistrationId()
	{
		if($this->AssocUserCorporation != NULL)
			return $this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationId();
		else return NULL;
	}
	
	public function GetBirthDate()
	{
		return $this->BirthDate;
	}
	
	public function GetBirthDateDay()
	{
		$date = DateTime::createFromFormat("Y-m-d", $this->BirthDate);
		return $date->format("d");
	}
	
	public function GetBirthDateMonth()
	{
		$date = DateTime::createFromFormat("Y-m-d", $this->BirthDate);
		return $date->format("m");
	}
	
	public function GetBirthDateYear()
	{
		$date = DateTime::createFromFormat("Y-m-d", $this->BirthDate);
		return $date->format("Y");
	}
	
	public function GetCorporation()
	{
		return $this->Corporation;
	}
	
	public function GetCorporationName()
	{
		if($this->Corporation != NULL)
			return $this->Corporation->GetCorporationName();
		else return NULL;
	}
	
	public function GetCountry()
	{
		if($this->Country != NULL)
			return $this->Country;
	}
	
	public function GetCountryAbbreviation()
	{
		if($this->Country != NULL)
			return $this->Country->GetCountryAbbreviation();
	}
	
	public function GetCountryName()
	{
		if($this->Country != NULL)
			return $this->Country->GetCountryName();
	}
	
	public function GetCountryRegionCode()
	{
		if($this->Country != NULL)
			return $this->Country->GetCountryRegionCode();
	}
	
	public function GetDepartment()
	{
		if($this->Department != NULL)
		{
			return $this->Department;
		}
	}
	
	public function GetDepartmentInitials()
	{
		if($this->Department != NULL)
		{
			return $this->Department->GetDepartmentInitials();	
		}
	}
	
	public function GetDepartmentName()
	{
		if($this->Department != NULL)
			return $this->Department->GetDepartmentName();
		else return NULL;
	}
	
	public function GetEmail()
	{
		return $this->UserEmail;
	}
	
	public function GetGender()
	{
		return $this->Gender;
	}
	
	public function GetHashCode()
	{
		return $this->HashCode;
	}
	
	public function GetLoggedIn()
	{
		return $this->LoggedIn;
	}
	
	public function GetName()
	{
		return $this->UserName;
	}
	
	public function GetRegion()
	{
		if($this->Region == NULL)
			return "-";
		else return $this->Region;
	}

	public function GetRegisterDate()
	{
		$date = DateTime::createFromFormat("Y-m-d H:i:s", $this->RegisterDate);
		return $date->format("Y-m-d / H:i");
	}
	
	public function GetSessionExpires()
	{
		return $this->SessionExpires;
	}
	
	public function GetTwoStepVerification()
	{
		return $this->TwoStepVerification;
	}
	
	public function GetUserActive()
	{
		return $this->UserActive;
	}
	
	public function GetUserConfirmed()
	{
		return $this->UserConfirmed;
	}
	
	public function GetUserPhonePrimary()
	{
		return $this->UserPhonePrimary;
	}
	
	public function GetUserPhonePrimaryPrefix()
	{
		return $this->UserPhonePrimaryPrefix;
	}
	
	public function GetUserPhoneSecondary()
	{
		return $this->UserPhoneSecondary;
	}
	
	public function GetUserPhoneSecondaryPrefix()
	{
		return $this->UserPhoneSecondaryPrefix;
	}
	
	public function GetUserTypeDescription()
	{
		if($this->UserType != NULL)
			return $this->UserType->GetTypeUserDescription();
		else return NULL;
	}
	
	public function GetUserTypeId()
	{
		if($this->UserType != NULL)
			return $this->UserType->GetTypeUserId();
		else return NULL;
	}
	
	public function GetUserUniqueId()
	{
		return $this->UserUniqueId;
	}
	
	/* SET */
	public function SetArrayAssocUserTeam($ArrayAssocUserTeam)
	{
		$this->ArrayAssocUserTeam = $ArrayAssocUserTeam;
	}
	
	public function SetArrayNotification($ArrayNotification)
	{
		$this->ArrayNotification = $ArrayNotification;
	}
	public function SetAssocUserCorporation($AssocUserCorporation)
	{
		$this->AssocUserCorporation = $AssocUserCorporation;
	}
	
	public function SetBirthDate($BirthDate)
	{
		$this->BirthDate = $BirthDate;
	}
	
	public function SetCorporation($UserCorporation)
	{
		$this->Corporation = $UserCorporation;
	}
	
	public function SetCountry($Country)
	{
		$this->Country = $Country;
	}
	
	public function SetDepartment($UserDepartment)
	{
		$this->UserDepartment = $UserDepartment;
	}
	
	public function SetEmail($UserEmail)
	{
		$this->UserEmail = $UserEmail;
	}
	
	public function SetGender($Gender)
	{
		$this->Gender = $Gender;
	}
	
	public function SetHashCode($HashCode)
	{
		$this->HashCode = $HashCode;
	}
	
	public function SetLoggedIn($LoggedIn)
	{
		$this->LoggedIn = $LoggedIn;
	}
	
	public function SetName($UserName)
	{
		$this->UserName = $UserName;
	}
	
	public function SetRegion($Region)
	{
		$this->Region = $Region;
	}
	
	public function SetRegisterDate($RegisterDate)
	{
		$this->RegisterDate = $RegisterDate;
	}
	
	public function SetSessionExpires($SessionExpires)
	{
		$this->SessionExpires = $SessionExpires;
	}
	
	public function SetTwoStepVerification($TwoStepVerification)
	{
		$this->TwoStepVerification = $TwoStepVerification;
	}
	
	public function SetUserActive($UserActive)
	{
		$this->UserActive = $UserActive;
	}
	
	public function SetUserConfirmed($UserConfirmed)
	{
		$this->UserConfirmed = $UserConfirmed;
	}
	
	public function SetUserPhonePrimary($UserPhonePrimary)
	{
		$this->UserPhonePrimary = $UserPhonePrimary;
	}
	
	public function SetUserPhonePrimaryPrefix($UserPhonePrimaryPrefix)
	{
		$this->UserPhonePrimaryPrefix = $UserPhonePrimaryPrefix;
	}
	
	public function SetUserPhoneSecondary($UserPhoneSecondary)
	{
		$this->UserPhoneSecondary = $UserPhoneSecondary;
	}
	
	public function SetUserPhoneSecondaryPrefix($UserPhoneSecondaryPrefix)
	{
		$this->UserPhoneSecondaryPrefix = $UserPhoneSecondaryPrefix;
	}
	
	public function SetUserType($UserTypeInstance)
	{
		$this->UserType = $UserTypeInstance;
	}
	
	public function SetUniqueId($UniqueId)
	{
		$this->UserUniqueId = $UniqueId;
	}
	
	/* METHODS */
	public function CheckAssocUserCorporationRegistrationDateActive()
	{
		if($this->AssocUserCorporation != NULL)
			return $this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate();
		else return NULL;
	}
	
	public function CheckAssocUserCorporationRegistrationIdActive()
	{
		if($this->AssocUserCorporation != NULL)
			return $this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationId();
		else return NULL;
	}
	public function CheckCorporationActive()
	{
		if($this->Corporation != NULL)
			return $this->Corporation->GetCorporationActive();
		else return NULL;
	}
	
	public function CheckDepartmentExists()
	{
		if($this->Department != NULL)
			return TRUE;
		else return FALSE;
	}
	
	public function CheckSuperUser()
	{
		if($this->UserType != NULL)
		{
			if($this->UserType->GetTypeUserDescription() == Config::TYPE_USER_SUPER)
				return TRUE;
			else return FALSE;
		}
		else return FALSE;
	}
	
	public function UpdateUser($ArrayAssocUserTeam, $ArrayNotification, $AssocUserCorporation, 
							   $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, $Gender, 
							   $HashCode, $LoggedIn, $UserName, $Region, $RegisterDate, $SessionExpires, 
							   $TwoStepVerification, $UserActive, $UserConfirmed, 
							   $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix,
							   $UserTypeInstance, $UserUniqueId)
	{
		$this->ArrayAssocUserTeam          = $ArrayAssocUserTeam;
		$this->ArrayNotification           = $ArrayNotification;
		$this->AssocUserCorporation            = $AssocUserCorporation;
		if($BirthDate != NULL)
			$this->BirthDate                   = $BirthDate;	
		$this->Corporation                     = $CorporationInstance;
		if($Country != NULL)
			$this->Country                     = $Country;
		$this->Department                  = $DepartmentInstance;
		if($UserEmail != NULL)
			$this->UserEmail                   = $UserEmail;
		if($Gender != NULL)
			$this->Gender                      = $Gender;
		if($HashCode != NULL)
			$this->HashCode                    = $HashCode;
		if($LoggedIn != NULL)
			$this->LoggedIn                    = $LoggedIn;
		if($UserName != NULL)
			$this->UserName                    = $UserName;
		$this->Region                          = $Region;
		if($RegisterDate != NULL)
			$this->RegisterDate                = $RegisterDate;
		if(is_bool($SessionExpires))
			$this->SessionExpires              = $SessionExpires;
		if(is_bool($TwoStepVerification))
			$this->TwoStepVerification         = $TwoStepVerification;
		if(is_bool($UserActive))
			$this->UserActive                  = $UserActive;
		if(is_bool($UserConfirmed))
			$this->UserConfirmed               = $UserConfirmed;
		$this->UserPhonePrimary                = $UserPhonePrimary;
		$this->UserPhonePrimaryPrefix          = $UserPhonePrimaryPrefix;
		$this->UserPhoneSecondary              = $UserPhoneSecondary;
		$this->UserPhoneSecondaryPrefix        = $UserPhoneSecondaryPrefix;
		if($UserTypeInstance != NULL)
			$this->UserType                    = $UserTypeInstance;
		if($UserUniqueId != NULL)
			$this->UserUniqueId                = $UserUniqueId;
	}
}

?>