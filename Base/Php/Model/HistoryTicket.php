<?php

/************************************************************************
Class: HistoryTicket
Creation: 30/10/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe para o tratamento de solicitações.
Get / Set:
			public function GetHistoryTicketRegisterDate();
			public function GetHistoryTicketDescription();
			public function GetHistoryTicketId();
			public function GetHistoryTicketIdTicket();
			public function GetHistoryTicketStatus();
			public function GetHistoryTicketSuggestion();
			public function GetHistoryTicketType();
			public function GetHistoryTicketTitle();
			public function SetHistoryTicketDescription($TicketHistoryDescription);
			public function SetHistoryTicketStatus($TypeTicketHistoryStatus);
			public function SetHistoryTicketSuggestion($TicketHistorySuggestion);
			public function SetHistoryTicketTitle($TicketHistoryTitle);
			public function SetHistoryTicketType($TicketHistoryType);
Methods:
			public function UpdateHistoryTicket($TicketHistoryDescription, $TicketHistoryStatus, 
			                                    $TicketHistorySuggestion, $TicketHistoryTitle, 
												$TicketHistoryType);
**************************************************************************/

class HistoryTicket
{
	/* Properties */
	protected $HistoryTicketDescription  = NULL;
	protected $HistoryTicketId           = NULL;
	protected $HistoryTicketIdTicket     = NULL;
	protected $HistoryTicketStatus       = NULL;
	protected $HistoryTicketSuggestion   = NULL;
	protected $HistoryTicketTitle        = NULL;
	protected $HistoryTicketType         = NULL;
	protected $RegisterDate              = NULL;

	/* Constructor */
	public function __construct($HistoryTicketDescription, $HistoryTicketId, $HistoryTicketIdTicket, $HistoryTicketStatus,
								$HistoryTicketSuggestion, $HistoryTicketTitle, $HistoryTicketType, $RegisterDate)
	{
		if(!is_null($HistoryTicketDescription))
			$this->HistoryTicketDescription = $HistoryTicketDescription;
		else throw new Exception(Config::EXCEPTION_HISTORY_TICKET_DESCRIPTION);
		if(!is_null($HistoryTicketId))
			$this->HistoryTicketId = $HistoryTicketId;
		else throw new Exception(Config::EXCEPTION_HISTORY_TICKET_DESCRIPTION);
		if(!is_null($HistoryTicketIdTicket))
			$this->HistoryTicketIdTicket = $HistoryTicketIdTicket;
		else throw new Exception(Config::EXCEPTION_HISTORY_TICKET_DESCRIPTION);
		if(!is_null($HistoryTicketStatus))
			$this->HistoryTicketStatus = $HistoryTicketStatus;
		else throw new Exception(Config::EXCEPTION_HISTORY_TICKET_STATUS);
		if(!is_null($HistoryTicketSuggestion))
			$this->HistoryTicketSuggestion = $HistoryTicketSuggestion;
		if(!is_null($HistoryTicketTitle))
			$this->HistoryTicketTitle = $HistoryTicketTitle;
		else throw new Exception(Config::EXCEPTION_HISTORY_TICKET_TITLE);
		if(!is_null($RegisterDate))
			$this->HistoryTicketType = $HistoryTicketType;
		else throw new Exception(Config::EXCEPTION_HISTORY_TICKET_TYPE);
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
	public function GetHistoryTicketRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	public function GetHistoryTicketDescription()
	{
		return $this->HistoryTicketDescription;
	}
	
	public function GetHistoryTicketId()
	{
		return $this->HistoryTicketId;
	}
	
	public function GetHistoryTicketIdTicket()
	{
		return $this->HistoryTicketIdTicket;
	}
	
	public function GetHistoryTicketStatus()
	{
		return $this->HistoryTicketStatus;
	}
	
	public function GetHistoryTicketSuggestion()
	{
		return $this->HistoryTicketSuggestion;
	}
	
	public function GetHistoryTicketTitle()
	{
		return $this->HistoryTicketTitle;
	}
	
	public function GetHistoryTicketType()
	{
		return $this->HistoryTicketType;
	}
	
	/* SET */
	public function SetHistoryTicketDescription($HistoryTicketDescription)
	{
		$this->HistoryTicketDescription = $HistoryTicketDescription;
	}
	
	public function SetHistoryTicketStatus($HistoryTicketStatus)
	{
		$this->HistoryTicketStatus = $HistoryTicketStatus;
	}
	
	public function SetHistoryTicketSuggestion($HistoryTicketSuggestion)
	{
		$this->HistoryTicketSuggestion = $HistoryTicketSuggestion;
	}
	
	public function SetHistoryTicketTitle($HistoryTicketTitle)
	{
		$this->HistoryTicketTitle = $HistoryTicketTitle;
	}
	
	public function SetHistoryTicketType($HistoryTicketType)
	{
		$this->HistoryTicketType = $HistoryTicketType;
	}
	
	/* METHODS */
	public function UpdateHistoryTicket($HistoryTicketDescription, $HistoryTicketStatus, $HistoryTicketSuggestion, 
										$HistoryTicketTitle, $HistoryTicketType)
	{
		if($this->HistoryTicketDescription != NULL)
			$this->HistoryTicketDescription = $HistoryTicketDescription;
		if($this->HistoryTicketStatus != NULL)
			$this->HistoryTicketStatus = $HistoryTicketStatus;
		if($this->HistoryTicketSuggestion != NULL)
			$this->HistoryTicketSuggestion = $HistoryTicketSuggestion;
		if($this->HistoryTicketTitle != NULL)
			$this->HistoryTicketTitle= $HistoryTicketTitle;
		if($this->HistoryTicketDescription != NULL)
			$this->HistoryTicketType = $HistoryTicketType;
	}
}
?>