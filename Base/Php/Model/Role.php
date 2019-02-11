<?php

/************************************************************************
Class: Role
Creation: 2019/01/21
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for Roles
Get / Set:
			public function GetRegisterDate();
			public function GetRoleDescription();
			public function GetRoleName();
			public function SetRoleDescription($RoleDescription);
			public function SetRoleName($RoleName);
Methods:
			public function UpdateRole($RoleDescription, $RoleName);
**************************************************************************/

class Role
{
	/* Properties */
	protected $RegisterDate    = NULL;
	protected $RoleDescription = NULL;
	protected $RoleName        = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $RoleDescription, $RoleName) 
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($RoleDescription))
			$this->RoleDescription = $RoleDescription;
		else throw new Exception(Config::EXCEPTION_ROLE_DESCRIPTION);
		if(!is_null($RoleName))
			$this->RoleName = $RoleName;
		else throw new Exception(Config::EXCEPTION_ROLE_NAME);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	public function GetRoleDescription()
	{
		return $this->RoleDescription;
	}
	
	public function GetRoleName()
	{
		return $this->RoleName;	
	}
	
	/* SET */
	public function SetRoleDescription($RoleDescription)
	{
		$this->RoleDescription = $RoleDescription;
	}
	
	public function SetRoleName($RoleName)
	{
		$this->RoleName = $RoleName;	
	}
	
	/* METHODS */
	public function UpdateRole($RoleDescription, $RoleName)	
	{
		if(!is_null($RoleDescription))
			$this->RoleDescription  = $RoleDescription;
		if(!is_null($RoleName))
			$this->RoleName = $RoleName;
	}
}
?>