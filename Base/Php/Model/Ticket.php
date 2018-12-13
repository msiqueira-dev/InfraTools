<?php

/************************************************************************
Class: Ticket
Creation: 30/10/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe para o tratamento de solicitações.
Get / Set:
			public function GetRegisterDate();
			public function GetTicketDescription();
			public function GetTicketId();
			public function GetTicketStatus();
			public function GetTicketSuggestion();
			public function GetTicketType();
			public function GetTicketTitle();
			public function GetTypeStatusTicketDescription();
			public function GetTypeTicketDescription();
			public function SetTicketDescription($TicketDescription);
			public function SetTicketStatus($TicketStatus);
			public function SetTicketSuggestion($TicketSuggestion);
			public function SetTicketTitle($TicketTitle);
			public function SetTicketType($TicketType);
			public function SetTypeStatusTicketDescription($TypeStatusTicketDescription);
			public function SetTypeTicketDescription($TypeTicketDescription);
Methods:
			public function UpdateTicket($TicketDescription, $TicketStatus, $TicketSuggestion, $TicketTitle, $TicketType);
**************************************************************************/

class Ticket
{
	/* Properties */
	protected $RegisterDate       = NULL;
	protected $TicketDescription  = NULL;
	protected $TicketId           = NULL;
	protected $TicketStatus       = NULL;
	protected $TicketSuggestion   = NULL;
	protected $TicketTitle        = NULL;
	protected $TicketType         = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TicketDescription, $TicketId, $TicketStatus, 
								$TicketSuggestion, $TicketTitle, $TicketType)
	{
		$this->RegisterDate       = $RegisterDate;
		$this->TicketDescription  = $TicketDescription;
		$this->TicketId           = $TicketId;
		$this->TicketStatus       = $TicketStatus;
		$this->TicketSuggestion   = $TicketSuggestion;
		$this->TicketTitle        = $TicketTitle;
		$this->TicketType         = $TicketType;
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
	
	public function GetTicketDescription()
	{
		return $this->TicketDescription;
	}
	
	public function GetTicketId()
	{
		return $this->TicketId;
	}
	
	public function GetTicketStatus()
	{
		return $this->TicketStatus;
	}
	
	public function GetTicketSuggestion()
	{
		return $this->TicketSuggestion;
	}
	
	public function GetTicketTitle()
	{
		return $this->TicketTitle;
	}
	
	public function GetTicketType()
	{
		return $this->TicketType;
	}
	
	/* SET */
	public function SetTicketDescription($TicketDescription)
	{
		$this->TicketDescription = $TicketDescription;
	}
	
	public function SetTicketStatus($TicketStatus)
	{
		$this->TicketStatus = $TicketStatus;
	}
	
	public function SetTicketSuggestion($TicketSuggestion)
	{
		$this->TicketSuggestion = $TicketSuggestion;
	}
	
	public function SetTicketTitle($TicketTitle)
	{
		$this->TicketTitle = $TicketTitle;
	}
	
	public function SetTicketType($TicketType)
	{
		$this->TicketType = $TicketType;
	}
	
	public function SetTypeStatusTicketDescription($TypeStatusTicketDescription)
	{
		$this->TicketStatus->SetTypeStatusTicketDescription($TypeStatusTicketDescription); 
	}
	
	public function SetTypeTicketDescription($TypeTicketDescription)
	{
		$this->TicketType->SetTypeTicketDescription($TypeStatusTicketDescription); 
	}
	
	/* METHODS */
	public function UpdateTicket($TicketDescription, $TicketStatus, $TicketSuggestion, $TicketTitle, $TicketType)
	{
		if($TicketDescription != NULL)
			$this->TicketDescription  = $TicketDescription;
		if($TicketStatus != NULL)
			$this->TicketStatus       = $TicketStatus;
		if($TicketSuggestion != NULL)
			$this->TicketSuggestion   = $TicketSuggestion;
		if($TicketTitle != NULL)
			$this->TicketTitle        = $TicketTitle;
		if($TicketType != NULL)
			$this->TicketType         = $TicketType;
	}
}
?>