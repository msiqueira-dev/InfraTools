<?php

/************************************************************************
Class: AssocUserRole
Creation: 2019/01/21
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class that deals with association of user and roles.
Get / Set:
			public function GetAssocUserRoleRole();
			public function GetAssocUserRoleUser();
			public function GetRegisterDate();
Methods:
			public function UpdateAssocUserRole($RoleDescription, $RoleName);
**************************************************************************/

class AssocUserRole
{
	/* Properties */
	protected $AssocUserRoleRole = NULL;
	protected $AssocUserRoleUser = NULL;
	protected $RegisterDate      = NULL;

	/* Constructor */
	public function __construct($AssocUserRoleRole, $AssocUserRoleUser, $RegisterDate) 
	{
		if(!is_null($AssocUserRoleRole))
			$this->AssocUserRoleRole = $AssocUserRoleRole;
		else throw new Exception(Config::EXCEPTION_ASSOC_USER_ROLE_ROLE);
		if(!is_null($AssocUserRoleUser))
			$this->AssocUserRoleUser = $AssocUserRoleUser;
		else throw new Exception(Config::EXCEPTION_ASSOC_USER_ROLE_USER);
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
	public function GetAssocUserRoleRole()
	{
		return $this->AssocUserRoleRole;
	}
	
	public function GetAssocUserRoleUser()
	{
		return $this->AssocUserRoleUser;	
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	
	/* METHODS */
	public function UpdateAssocUserRole($AssocUserRoleRole, $AssocUserRoleUser)	
	{
		if(!is_null($AssocUserRoleRole))
			$this->AssocUserRoleRole  = $AssocUserRoleRole;
		if(!is_null($AssocUserRoleUser))
			$this->AssocUserRoleUser = $AssocUserRoleUser;
	}
}
?>