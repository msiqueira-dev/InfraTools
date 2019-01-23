<?php

/************************************************************************
Class: AssocUserRole
Creation: 2019/01/21
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class that deals with association of user and roles.
Get / Set:
			public function GetAssocUserRoleRoleName();
			public function GetAssocUserRoleUserEmail();
			public function GetRegisterDate();
			public function SetAssocUserRoleRoleName($AssocUserRoleRoleName);
			public function SetAssocUserRoleUserEmail($AssocUserRoleUserEmail);
Methods:
			public function UpdateAssocUserRoleRole($RoleDescription, $RoleName);
**************************************************************************/

class AssocUserRole
{
	/* Properties */
	protected $AssocUserRoleRoleName  = NULL;
	protected $AssocUserRoleUserEmail = NULL;
	protected $RegisterDate           = NULL;

	/* Constructor */
	public function __construct($AssocUserRoleRoleName, $AssocUserRoleUserEmail, $RegisterDate) 
	{
		if(!is_null($AssocUserRoleRoleName))
			$this->AssocUserRoleRoleName = $AssocUserRoleRoleName;
		else throw new Exception(Config::EXCEPTION_ASSOC_USER_ROLE_ROLE_NAME);
		if(!is_null($AssocUserRoleUserEmail))
			$this->AssocUserRoleUserEmail = $AssocUserRoleUserEmail;
		else throw new Exception(Config::EXCEPTION_ASSOC_USER_ROLE_USER_EMAIL);
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetAssocUserRoleRoleName()
	{
		return $this->AssocUserRoleRoleName;
	}
	
	public function GetAssocUserRoleUserEmail()
	{
		return $this->AssocUserRoleUserEmail;	
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetAssocUserRoleRoleName($AssocUserRoleRoleName)
	{
		$this->AssocUserRoleRoleName = $AssocUserRoleRoleName;
	}
	
	public function SetAssocUserRoleUserEmail($AssocUserRoleUserEmail)
	{
		$this->AssocUserRoleUserEmail = $AssocUserRoleUserEmail;
	}
	
	/* METHODS */
	public function UpdateAssocUserRole($AssocUserRoleRoleName, $AssocUserRoleUserEmail)	
	{
		if(!is_null($AssocUserRoleRoleName))
			$this->AssocUserRoleRoleName  = $AssocUserRoleRoleName;
		if(!is_null($AssocUserRoleUserEmail))
			$this->AssocUserRoleUserEmail = $AssocUserRoleUserEmail;
	}
}
?>