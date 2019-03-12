<?php

/************************************************************************
Class: AssocUserCorporation
Creation: 2018/02/16
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for association between User and Corporation
Get / Set:		
			public function GetAssocUserCorporationCorporation();
			public function GetAssocUserCorporationCorporationName();
			public function GetAssocUserCorporationCorporationRegistrationDate();
			public function GetAssocUserCorporationCorporationRegistrationId();
			public function GetAssocUserCorporationUser();
			public function GetAssocUserCorporationUserEmail();
			public function GetRegisterDate();
			public function SetAssocUserCorporationCorporation($Corporation);
			public function SetAssocUserCorporationRegistrationDate($AssocUserCorporationRegistrationDate);
			public function SetAssocUserCorporationRegistrationId($AssocUserCorporationRegistrationId);
			public function SetAssocUserCorporationUser($User);
			public function SetRegisterDate($UserCorporationRegistrationDate);
Methods:
			public function UpdateAssocUserCorporation($UserCorporationCorporationName,              
			                                           $UserCorporationRegistrationDate, 
								                       $UserCorporationRegistrationId, $UserCorporationUserEmail) 
**************************************************************************/

class AssocUserCorporation
{
	/* Properties */
	protected $AssocUserCorporationRegistrationDate = NULL;
	protected $AssocUserCorporationRegistrationId   = NULL;
	protected $Corporation                          = NULL;
	protected $RegisterDate                         = NULL;
	protected $User                                 = NULL;

	/* Constructor */
	public function __construct($AssocUserCorporationRegistrationDate, $AssocUserCorporationRegistrationId,
								$Corporation, $RegisterDate, $User) 
	{
		if(!is_null($AssocUserCorporationRegistrationDate))
			$this->AssocUserCorporationRegistrationDate = $AssocUserCorporationRegistrationDate;
		if(!is_null($AssocUserCorporationRegistrationId))
			$this->AssocUserCorporationRegistrationId = $AssocUserCorporationRegistrationId;
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($Corporation))
			$this->Corporation = $Corporation;
		else throw new Exception(Config::EXCEPTION_CORPORATION);
		if(!is_null($User))
			$this->User = $User;
		else throw new Exception(Config::EXCEPTION_USER);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetAssocUserCorporationCorporation()
	{
		return $this->Corporation;	
	}
	
	public function GetAssocUserCorporationCorporationName()
	{
		if(!is_null($this->Corporation))
			return $this->Corporation->GetCorporationName();
	}
	
	public function GetAssocUserCorporationCorporationRegistrationDate()
	{
		return $this->AssocUserCorporationRegistrationDate;
	}
	
	public function GetAssocUserCorporationCorporationRegistrationId()
	{
		return $this->AssocUserCorporationRegistrationId;
	}
	
	public function GetAssocUserCorporationUser()
	{
		return $this->User;
	}
	
	public function GetAssocUserCorporationUserEmail()
	{
		if(!is_null($this->User))
			return $this->User->GetEmail();
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */	
	public function SetAssocUserCorporationCorporation($Corporation)
	{
		$this->Corporation = $Corporation;
	}
	
	public function SetAssocUserCorporationRegistrationDate($AssocUserCorporationRegistrationDate)
	{
		$this->AssocUserCorporationRegistrationDate = $AssocUserCorporationRegistrationDate;
	}
	
	public function SetAssocUserCorporationRegistrationId($AssocUserCorporationRegistrationId)
	{
		$this->AssocUserCorporationRegistrationId = $AssocUserCorporationRegistrationId;
	}
	
	public function SetAssocUserCorporationUser($User)
	{
		$this->User = $User;	
	}
	
	public function SetRegisterDate($RegisterDate)
	{
		$this->RegisterDate = $RegisterDate;	
	}
	
	/* METHODS */
	public function UpdateAssocUserCorporation($AssocUserCorporationRegistrationDate, $AssocUserCorporationRegistrationId,
								               $Corporation, $RegisterDate, $User) 
	{
		if(!is_null($AssocUserCorporationRegistrationDate))
			$this->AssocUserCorporationRegistrationDate = $AssocUserCorporationRegistrationDate;
		if(!is_null($AssocUserCorporationRegistrationId))
			$this->AssocUserCorporationRegistrationId = $AssocUserCorporationRegistrationId;
		if(!is_null($Corporation))
			$this->Corporation = $Corporation;
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		if(!is_null($User))
			$this->User = $User;
	}
}
?>