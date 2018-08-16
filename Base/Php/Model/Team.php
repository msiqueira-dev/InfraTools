<?php

/************************************************************************
Class: Team
Creation: 22/02/2018
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe para armazenamento de dados das equipes.
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
	public function __construct($TeamDescription, $TeamId, $TeamName, $RegisterDate) 
	{
		$this->TeamDescription  = $TeamDescription;
		$this->TeamId           = $TeamId;
		$this->TeamName         = $TeamName;
		$this->RegisterDate     = $RegisterDate;
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
		if($TeamDescription != NULL)
			$this->TeamDescription  = $TeamDescription;
		if($TeamName != NULL)
			$this->TeamName = $TeamName;
	}
}
?>