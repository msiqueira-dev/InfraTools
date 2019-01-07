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
			public function GetAssocUserTeamTeamIdByIndex($Index);
			public function GetAssocUserTeamTeamNameByIndex($Index);
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
			public function PushArrayAssocUserTeam($AssocUserTeam);
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
		if(!is_null($ArrayAssocUserTeam))
		{
			if(is_array($ArrayAssocUserTeam))
				$this->ArrayAssocUserTeam = $ArrayAssocUserTeam;
		}
		if(!is_null($ArrayNotification))
			$this->ArrayNotification = $ArrayNotification;
		if(!is_null($AssocUserCorporation))
			$this->AssocUserCorporation = $AssocUserCorporation;
		if(!is_null($BirthDate))
			$this->BirthDate = $BirthDate;
		else throw new Exception(Config::EXCEPTION_USER_BIRTH_DATE);
		if(!is_null($CorporationInstance))
			$this->Corporation = $CorporationInstance;
		if(!is_null($Country))
			$this->Country = $Country;
		else throw new Exception(Config::EXCEPTION_USER_COUNTRY);
		if(!is_null($DepartmentInstance))
			$this->Department = $DepartmentInstance;
		if(!is_null($UserEmail))
			$this->UserEmail = $UserEmail;
		else throw new Exception(Config::EXCEPTION_USER_EMAIL);
		if(!is_null($Gender))
			$this->Gender = $Gender;
		else throw new Exception(Config::EXCEPTION_USER_GENDER);
		if(!is_null($HashCode))
			$this->HashCode = $HashCode;
		else throw new Exception(Config::EXCEPTION_USER_HASH_CODE);
		if(!is_null($UserName))
			$this->UserName = $UserName;
		else throw new Exception(Config::EXCEPTION_USER_NAME);
		if(!is_null($Region))
			$this->Region = $Region;
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($SessionExpires))
			$this->SessionExpires = $SessionExpires;
		else throw new Exception(Config::EXCEPTION_USER_SESSION_EXPIRES);
		if(!is_null($TwoStepVerification))
			$this->TwoStepVerification = $TwoStepVerification;
		else throw new Exception(Config::EXCEPTION_USER_TWO_STEP_VERIFICATION);
		if(!is_null($UserActive))
			$this->UserActive = $UserActive;
		else throw new Exception(Config::EXCEPTION_USER_ACTIVE);
		if(!is_null($UserConfirmed))
			$this->UserConfirmed = $UserConfirmed;
		else throw new Exception(Config::EXCEPTION_USER_CONFIRMED);
		if(!is_null($UserPhonePrimary))
			$this->UserPhonePrimary = $UserPhonePrimary;
		if(!is_null($UserPhonePrimaryPrefix))
			$this->UserPhonePrimaryPrefix = $UserPhonePrimaryPrefix;
		if(!is_null($UserPhoneSecondary))
			$this->UserPhoneSecondary = $UserPhoneSecondary;
		if(!is_null($UserPhoneSecondaryPrefix))
			$this->UserPhoneSecondaryPrefix = $UserPhoneSecondaryPrefix;
		if(!is_null($UserTypeInstance))
			$this->UserType = $UserTypeInstance;
		else throw new Exception(Config::EXCEPTION_USER_TYPE);
		if(!is_null($UserUniqueId))
			$this->UserUniqueId = $UserUniqueId;
		else throw new Exception(Config::EXCEPTION_USER_UNIQUE_ID);
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
	
	public function GetAssocUserTeamTeamIdByIndex($Index)
	{
		if(is_array($this->ArrayAssocUserTeam))
		{
			if(count($this->ArrayAssocUserTeam) > 0)
				return $this->ArrayAssocUserTeam[$Index]->GetTeamId();
		}
		return NULL;
	}
	
	public function GetAssocUserTeamTeamNameByIndex($Index)
	{
		if(is_array($this->ArrayAssocUserTeam))
		{
			if(count($this->ArrayAssocUserTeam) > 0)
				return $this->ArrayAssocUserTeam[$Index]->GetTeamName();
		}
		return NULL;
	}
	
	public function GetAssocUserCorporation()
	{
		return $this->AssocUserCorporation;
	}
	
	public function GetAssocUserCorporationUserRegistrationDate()
	{
		if(!is_null($this->AssocUserCorporation))
		{
			if(is_object($this->AssocUserCorporation))
				return $this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate();
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetAssocUserCorporationUserRegistrationDateDay()
	{
		if(!is_null($this->AssocUserCorporation))
		{
			if(is_object($this->AssocUserCorporation))
				return date('d',strtotime($this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate()));
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetAssocUserCorporationUserRegistrationDateMonth()
	{
		if(!is_null($this->AssocUserCorporation))
		{
			if(is_object($this->AssocUserCorporation))
				return date('m',strtotime($this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate()));
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetAssocUserCorporationUserRegistrationDateYear()
	{
		if(!is_null($this->AssocUserCorporation))
		{
			if(is_object($this->AssocUserCorporation))
				return date('Y',strtotime($this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate()));
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetAssocUserCorporationUserRegistrationId()
	{
		if(!is_null($this->AssocUserCorporation))
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
		if(!is_null($this->Corporation))
			return $this->Corporation->GetCorporationName();
		else return NULL;
	}
	
	public function GetCountry()
	{
		if(!is_null($this->Country))
			return $this->Country;
	}
	
	public function GetCountryAbbreviation()
	{
		if(!is_null($this->Country))
			return $this->Country->GetCountryAbbreviation();
	}
	
	public function GetCountryName()
	{
		if(!is_null($this->Country))
			return $this->Country->GetCountryName();
	}
	
	public function GetCountryRegionCode()
	{
		if(!is_null($this->Country))
			return $this->Country->GetCountryRegionCode();
	}
	
	public function GetDepartment()
	{
		if(!is_null($this->Department))
		{
			return $this->Department;
		}
	}
	
	public function GetDepartmentInitials()
	{
		if(!is_null($this->Department))
		{
			return $this->Department->GetDepartmentInitials();	
		}
	}
	
	public function GetDepartmentName()
	{
		if(!is_null($this->Department))
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
		if(!is_null($this->UserType))
			return $this->UserType->GetTypeUserDescription();
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
		if(!is_null($this->AssocUserCorporation))
			return $this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationDate();
		else return NULL;
	}
	
	public function CheckAssocUserCorporationRegistrationIdActive()
	{
		if(!is_null($this->AssocUserCorporation))
			return $this->AssocUserCorporation->GetAssocUserCorporationCorporationRegistrationId();
		else return NULL;
	}
	public function CheckCorporationActive()
	{
		if(!is_null($this->Corporation))
			return $this->Corporation->GetCorporationActive();
		else return NULL;
	}
	
	public function CheckDepartmentExists()
	{
		if(!is_null($this->Department))
			return TRUE;
		else return FALSE;
	}
	
	public function CheckSuperUser()
	{
		if(!is_null($this->UserType))
		{
			if($this->UserType->GetTypeUserDescription() == Config::TYPE_USER_SUPER)
				return TRUE;
			else return FALSE;
		}
		else return FALSE;
	}
	
	public function PushArrayAssocUserTeam($AssocUserTeam)
	{
		if(!is_null($AssocUserTeam))
		{
			if(is_object($AssocUserTeam))
			{
				if($this->ArrayAssocUserTeam == NULL)
					$this->ArrayAssocUserTeam = array();
				array_push($this->ArrayAssocUserTeam, $AssocUserTeam);
				return Config::SUCCESS;
			}
		}
		return Config::ERROR;
	}
	
	public function UpdateUser($ArrayAssocUserTeam, $ArrayNotification, $AssocUserCorporation, 
							   $BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, $Gender, 
							   $HashCode, $LoggedIn, $UserName, $Region, $RegisterDate, $SessionExpires, 
							   $TwoStepVerification, $UserActive, $UserConfirmed, 
							   $UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix,
							   $UserTypeInstance, $UserUniqueId)
	{
		$this->ArrayAssocUserTeam = $ArrayAssocUserTeam;
		$this->ArrayNotification = $ArrayNotification;
		$this->AssocUserCorporation = $AssocUserCorporation;
		if(!is_null($BirthDate))
			$this->BirthDate = $BirthDate;	
		$this->Corporation = $CorporationInstance;
		if(!is_null($Country))
			$this->Country = $Country;
		$this->Department = $DepartmentInstance;
		if(!is_null($UserEmail))
			$this->UserEmail = $UserEmail;
		if(!is_null($Gender))
			$this->Gender = $Gender;
		if(!is_null($HashCode))
			$this->HashCode = $HashCode;
		if(!is_null($LoggedIn))
			$this->LoggedIn = $LoggedIn;
		if(!is_null($UserName))
			$this->UserName = $UserName;
		$this->Region = $Region;
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		if(!is_null($SessionExpires))
		{
			if(is_bool($SessionExpires))
				$this->SessionExpires = $SessionExpires;
		}
		if(!is_null($TwoStepVerification))
		{
			if(is_bool($TwoStepVerification))
				$this->TwoStepVerification = $TwoStepVerification;
		}
		if(!is_null($UserActive))
		{
			if(is_bool($UserActive))
				$this->UserActive = $UserActive;
		}
		if(!is_null($UserConfirmed))
		{
			if(is_bool($UserConfirmed))
				$this->UserConfirmed = $UserConfirmed;
		}
		$this->UserPhonePrimary = $UserPhonePrimary;
		$this->UserPhonePrimaryPrefix = $UserPhonePrimaryPrefix;
		$this->UserPhoneSecondary = $UserPhoneSecondary;
		$this->UserPhoneSecondaryPrefix = $UserPhoneSecondaryPrefix;
		if(!is_null($UserTypeInstance))
			$this->UserType = $UserTypeInstance;
		if(!is_null($UserUniqueId))
			$this->UserUniqueId = $UserUniqueId;
	}
}

?>