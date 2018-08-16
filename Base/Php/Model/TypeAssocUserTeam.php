<?php

/************************************************************************
Class: TypeAssocUserTeam
Creation: 24/05/2018
Creator: Marcus Siqueira
Dependencies:
Description: 
			The type of a user in a team, working for its role in a team and permission.
Get / Set:		
			public function GetRegisterDate();
			public function GetTypeAssocUserTeamTeamDescription();
			public function GetTypeAssocUserTeamTeamId();
			public function SetRegisterDate($RegisterDate);
	        public function SetTypeAssocUserTeamDescription($TypeAssocUserTeamTeamDescription);
	        public function SetTypeAssocUserTeamId($TypeAssocUserTeamTeamId);
Methods:
			public function UpdateTypeAssocUserTeam($RegisterDate, $TypeAssocUserTeamTeamDescription, $TypeAssocUserTeamTeamId);
**************************************************************************/

class TypeAssocUserTeam
{
	/* Properties */
	protected $RegisterDate                     = NULL;
	protected $TypeAssocUserTeamTeamDescription = NULL;
	protected $TypeAssocUserTeamTeamId          = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TypeAssocUserTeamTeamDescription, $TypeAssocUserTeamTeamId) 
	{
		if($RegisterDate != NULL)
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if($TypeAssocUserTeamTeamDescription != NULL)
			$this->TypeAssocUserTeamTeamDescription = $TypeAssocUserTeamTeamDescription;
		else throw new Exception(Config::EXCEPTION_TYPE_ASSOC_USER_TEAM_DESCRIPTION);
		if($TypeAssocUserTeamTeamId != NULL)
			$this->TypeAssocUserTeamTeamId = $TypeAssocUserTeamTeamId;
		else throw new Exception(Config::EXCEPTION_TYPE_ASSOC_USER_TEAM_ID);
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
	
	public function GetTypeAssocUserTeamTeamDescription()
	{
		return $this->TypeAssocUserTeamTeamDescription;
	}
	
	public function GetTypeAssocUserTeamTeamId()
	{
		return $this->TypeAssocUserTeamTeamId;
	}
	
	/* SET */	
	public function SetRegisterDate($RegisterDate)
	{
		$this->RegisterDate = $RegisterDate;
	}
	
	public function SetTypeAssocUserTeamDescription($TypeAssocUserTeamTeamDescription)
	{
		$this->TypeAssocUserTeamTeamDescription = $TypeAssocUserTeamTeamDescription;
	}
	
	public function SetTypeAssocUserTeamId($TypeAssocUserTeamTeamId)
	{
		$this->TypeAssocUserTeamTeamId = $TypeAssocUserTeamTeamId;	
	}
	
	/* METHODS */
	public function UpdateTypeAssocUserTeam($RegisterDate, $TypeAssocUserTeamTeamDescription, $TypeAssocUserTeamTeamId)
	{
		if($RegisterDate != NULL)
			$this->RegisterDate = $RegisterDate;
		if($TypeAssocUserTeamTeamDescription != NULL)
			$this->TypeAssocUserTeamTeamDescription = $TypeAssocUserTeamTeamDescription;
		if($TypeAssocUserTeamTeamId != NULL)
			$this->TypeAssocUserTeamTeamId = $TypeAssocUserTeamTeamId;
	}
}
?>