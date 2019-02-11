<?php

/************************************************************************
Class: TypeAssocUserTeam
Creation: 2018/05/24
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			The type of a user in a team, working for its role in a team and permission.
Get / Set:		
			public function GetRegisterDate();
			public function GetTypeAssocUserTeamDescription();
			public function SetRegisterDate($RegisterDate);
	        public function SetTypeAssocUserTeamDescription($TypeAssocUserTeamDescription);
Methods:
			public function UpdateTypeAssocUserTeam($RegisterDate, $TypeAssocUserTeamDescription);
**************************************************************************/

class TypeAssocUserTeam
{
	/* Properties */
	protected $RegisterDate                     = NULL;
	protected $TypeAssocUserTeamDescription     = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TypeAssocUserTeamDescription) 
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($TypeAssocUserTeamDescription))
			$this->TypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;
		else throw new Exception(Config::EXCEPTION_TYPE_ASSOC_USER_TEAM_DESCRIPTION);
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
	
	public function GetTypeAssocUserTeamDescription()
	{
		return $this->TypeAssocUserTeamDescription;
	}
	
	/* SET */	
	public function SetRegisterDate($RegisterDate)
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
	}
	
	public function SetTypeAssocUserTeamDescription($TypeAssocUserTeamDescription)
	{
		if(!is_null($TypeAssocUserTeamDescription))
			$this->TypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;
	}
	
	/* METHODS */
	public function UpdateTypeAssocUserTeam($RegisterDate, $TypeAssocUserTeamDescription)
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		if(!is_null($TypeAssocUserTeamDescription))
			$this->TypeAssocUserTeamDescription = $TypeAssocUserTeamDescription;
	}
}
?>