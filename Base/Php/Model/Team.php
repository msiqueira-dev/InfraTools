<?php

/************************************************************************
Class: Team
Creation: 22/02/2018
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class that deals with teams.
Get / Set:
			public function GetTeamDescription();
			public function GetTeamId();
			public function GetTeamName();
			public function GetRegisterDate();
			public function SetTeamDescription($TeamId);
			public function SetTeamId($TeamDescription);
			public function SetTeamName($TeamName);
Methods:
			public function UpdateTeam($TeamDescription, $TeamName);
**************************************************************************/

class Team
{
	/* Properties */
	protected $TeamDescription  = NULL;
	protected $TeamId           = NULL;
	protected $TeamName         = NULL;
	protected $RegisterDate     = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TeamDescription, $TeamId, $TeamName) 
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($TeamDescription))
			$this->TeamDescription = $TeamDescription;
		else throw new Exception(Config::EXCEPTION_TEAM_DESCRIPTION);
		if(!is_null($TeamId))
			$this->TeamId = $TeamId;
		else throw new Exception(Config::EXCEPTION_TEAM_ID);
		if(!is_null($TeamName))
		$this->TeamName = $TeamName;
		else throw new Exception(Config::EXCEPTION_TEAM_NAME);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetTeamDescription()
	{
		return $this->TeamDescription;
	}
	
	public function GetTeamId()
	{
		return $this->TeamId;
	}
	
	public function GetTeamName()
	{
		return $this->TeamName;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetTeamDescription($TeamDescription)
	{
		$this->TeamDescription = $TeamDescription;
	}
	
	public function SetTeamId($TeamId)
	{
		$this->TeamId = $TeamId;
	}
	
	public function SetTeamName($TeamName)
	{
		$this->TeamName = $TeamName;	
	}
	
	/* METHODS */
	public function UpdateTeam($TeamDescription, $TeamName)	
	{
		if(!is_null($TeamDescription))
			$this->TeamDescription  = $TeamDescription;
		if(!is_null($TeamName))
			$this->TeamName = $TeamName;
	}
}
?>