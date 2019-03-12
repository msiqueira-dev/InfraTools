<?php

/************************************************************************
Class: Ticket
Creation: 30/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
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
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($TicketDescription))
			$this->TicketDescription = $TicketDescription;
		else throw new Exception(Config::EXCEPTION_TICKET_DESCRIPTION);
		if(!is_null($TicketId))
			$this->TicketId = $TicketId;
		else throw new Exception(Config::EXCEPTION_TICKET_ID);
		if(!is_null($TicketStatus))
			$this->TicketStatus = $TicketStatus;
		else throw new Exception(Config::EXCEPTION_TICKET_STATUS);
		if(!is_null($TicketSuggestion))
			$this->TicketSuggestion = $TicketSuggestion;
		if(!is_null($TicketTitle))
			$this->TicketTitle = $TicketTitle;
		else throw new Exception(Config::EXCEPTION_TICKET_TITLE);
		if(!is_null($TicketType))
			$this->TicketType = $TicketType;
		else throw new Exception(Config::EXCEPTION_TICKET_TYPE);
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
		if(!is_null($TicketDescription))
			$this->TicketDescription = $TicketDescription;
	}
	
	public function SetTicketStatus($TicketStatus)
	{
		if(!is_null($TicketStatus))
			$this->TicketStatus = $TicketStatus;
	}
	
	public function SetTicketSuggestion($TicketSuggestion)
	{
		$this->TicketSuggestion = $TicketSuggestion;
	}
	
	public function SetTicketTitle($TicketTitle)
	{
		if(!is_null($TicketTitle))
		$this->TicketTitle = $TicketTitle;
	}
	
	public function SetTicketType($TicketType)
	{
		if(!is_null($TicketType))
			$this->TicketType = $TicketType;
	}
	
	public function SetTypeStatusTicketDescription($TypeStatusTicketDescription)
	{
		if(!is_null($TypeStatusTicketDescription))
			$this->TicketStatus->SetTypeStatusTicketDescription($TypeStatusTicketDescription); 
	}
	
	public function SetTypeTicketDescription($TypeTicketDescription)
	{
		if(!is_null($TypeTicketDescription))
			$this->TicketType->SetTypeTicketDescription($TypeStatusTicketDescription); 
	}
	
	/* METHODS */
	public function UpdateTicket($TicketDescription, $TicketStatus, $TicketSuggestion, $TicketTitle, $TicketType)
	{
		if(!is_null($TicketDescription))
			$this->TicketDescription = $TicketDescription;
		if(!is_null($TicketStatus))
			$this->TicketStatus = $TicketStatus;
		$this->TicketSuggestion = $TicketSuggestion;
		if(!is_null($TicketTitle))
			$this->TicketTitle = $TicketTitle;
		if(!is_null($TicketType))
			$this->TicketType = $TicketType;
	}
}
?>