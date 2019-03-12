<?php

/************************************************************************
Class: AssocUserTeam
Creation: 26/02/2018
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for association between User and Team
Get / Set:		
			public function GetRegisterDate();
			public function GetTeam();
			public function GetTeamId();
			public function GetTeamName();
			public function GetTypeAssocUserTeam();
			public function GetTypeAssocUserTeamTeamDescription();
			public function GetUser();
			public function SetRegisterDate($RegisterDate);
	        public function SetTeam($Team);
	        public function SetUser($User);
Methods:
			public function UpdateAssocUserTeam($RegisterDate, $Team, $User);
**************************************************************************/

class AssocUserTeam
{
	/* Properties */
	protected $RegisterDate              = NULL;
	protected $Team                      = NULL;
	protected $TypeAssocUserTeam         = NULL;
	protected $User                      = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $Team, $TypeAssocUserTeam, $User) 
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($Team))
			$this->Team = $Team;
		else throw new Exception(Config::EXCEPTION_ASSOC_USER_TEAM_TEAM);
		if(!is_null($TypeAssocUserTeam))
			$this->TypeAssocUserTeam = $TypeAssocUserTeam;
		else throw new Exeception(Config::EXCEPTION_ASSOC_USER_TEAM_TYPE);
		if(!is_null($User))
			$this->User = $User;
		else throw new Exception(Config::EXCEPTION_ASSOC_USER_TEAM_USER);
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
	
	public function GetTeam()
	{
		return $this->Team;
	}
	
	public function GetTeamId()
	{
		if(!is_null($this->Team))
			return $this->Team->GetTeamId();
	}
	
	public function GetTeamName()
	{
		if(!is_null($this->Team))
			return $this->Team->GetTeamName();
	}
	
	public function GetTypeAssocUserTeam()
	{
		return $this->TypeAssocUserTeam;
	}
	
	public function GetTypeAssocUserTeamTeamDescription()
	{
		if(!is_null($this->TypeAssocUserTeam))
			return $this->TypeAssocUserTeam->GetTypeAssocUserTeamTeamDescription();
	}
	
	public function GetUser()
	{
		return $this->User;
	}
	
	public function GetTeamUserEmail()
	{
		if(!is_null($this->User))
			return $this->User->GetEmail();
	}
	
	/* SET */	
	public function SetRegisterDate($RegisterDate)
	{
		$this->RegisterDate = $RegisterDate;
	}
	
	public function SetTeam($Team)
	{
		$this->Team = $Team;
	}
	
	public function SetTypeAssocUserTeam($TypeAssocUserTeam)
	{
		$this->TypeAssocUserTeam = $TypeAssocUserTeam;
	}
	
	public function SetUser($User)
	{
		$this->User = $User;	
	}
	
	/* METHODS */
	public function UpdateAssocUserTeam($RegisterDate, $Team, $TypeAssocUserTeam, $User)
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		if(!is_null($Team))
			$this->Team = $Team;
		if(!is_null($TypeAssocUserTeam))
			$this->TypeAssocUserTeam = $TypeAssocUserTeam;
		if(!is_null($User))
			$this->User = $User;
	}
}
?>