<?php

/************************************************************************
Class: InfraToolsTicket
Creation: 30/10/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe para o tratamento de solicitações.
Get / Set:
			public function GetTicketService();
			public function GetTicketServiceActive();
			public function GetTicketServiceDescription();
			public function GetTicketServiceId();
			public function GetTicketServiceName();
			public function SetTicketService($TicketService);
			
Methods:
			public function UpdateTicket($TicketDescription, $TicketService, $TicketStatus, 
			                             $TicketSuggestion, $TicketTitle, $TicketType);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsTicket extends Ticket
{
	/* Properties */
	protected $TicketService = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TicketDescription, $TicketId, $TicketService,
								$TicketStatus, $TicketSuggestion, $TicketTitle, $TicketType)
	{
		$this->RegisterDate       = $RegisterDate;
		$this->TicketDescription  = $TicketDescription;
		$this->TicketId           = $TicketId;
		$this->TicketService      = $TicketService;
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
	public function GetTicketService()
	{
		return TicketService;
	}
	
	public function GetTicketServiceActive()
	{
		if($this->TicketService != NULL)
			return $this->TicketServiceActive();
	}
	
	public function GetTicketServiceDescription()
	{
		if($this->TicketService != NULL)
			return $this->TicketServiceDescription();
	}
	
	public function GetTicketServiceId()
	{
		if($this->TicketService != NULL)
			return $this->TicketServiceId();
	}
	
	public function GetTicketServiceName()
	{
		if($this->TicketService != NULL)
			return $this->TicketServiceName();
	}
	
	/* SET */
	public function SetTicketService($TicketService)
	{
		$this->TicketService = $TicketService;
	}
	
	/* METHODS */
	public function UpdateTicket($TicketDescription, $TicketService, $TicketStatus, $TicketSuggestion, $TicketTitle, $TicketType)
	{
		if($TicketDescription != NULL)
			$this->TicketDescription = $TicketDescription;
		if($TicketDescription != NULL)
			$this->TicketService = $TicketService;
		if($TicketDescription != NULL)
			$this->TicketStatus = $TicketStatus;
		if($TicketDescription != NULL)
			$this->TicketSuggestion = $TicketSuggestion;
		if($TicketDescription != NULL)
			$this->TicketTitle = $TicketTitle;
		if($TicketDescription != NULL)
			$this->TicketType = $TicketType;
	}
}
?>