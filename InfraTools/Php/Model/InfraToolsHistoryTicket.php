<?php

/************************************************************************
Class: InfraToolsHistoryTicket
Creation: 30/10/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe para o tratamento de solicitações.
Get / Set:
			public function GetHistoryService();
			public function SetHistoryService($HistoryService);
Methods:
			public function UpdateTicket($HistoryTicketDescription, $HistoryTicketService, $HistoryTicketStatus, 
								        $HistoryTicketSuggestion, $HistoryTicketTitle, $HistoryTicketType);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsHistoryTicket extends HistoryTicket
{
	/* Properties */
	protected $HistoryTicketService = NULL;

	/* Constructor */
	public function __construct($HistoryTicketDescription, $HistoryTicketId, $HistoryTicketIdTicket, $HistoryTicketService,
								$HistoryTicketStatus, $HistoryTicketSuggestion, $HistoryTicketTitle, $HistoryTicketType, 
								$RegisterDate)
	{
		$this->HistoryTicketDescription  = $HistoryTicketDescription;
		$this->HistoryTicketId           = $HistoryTicketId;
		$this->HistoryTicketIdTicket     = $HistoryTicketIdTicket;
		$this->HistoryTicketService      = $HistoryTicketService;
		$this->HistoryTicketStatus       = $HistoryTicketStatus;
		$this->HistoryTicketSuggestion   = $HistoryTicketSuggestion;
		$this->HistoryTicketTitle        = $HistoryTicketTitle;
		$this->HistoryTicketType         = $HistoryTicketType;
		$this->RegisterDate              = $RegisterDate;
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetHistoryService()
	{
		return $this->HistoryTicketService;
	}
	
	/* SET */
	public function SetHistoryTicketService($TicketService)
	{
		$this->HistoryTicketService = $HistoryTicketService;
	}
	
	/* METHODS */
	public function UpdateHistoryTicket($HistoryTicketDescription, $HistoryTicketService, $HistoryTicketStatus, 
								        $HistoryTicketSuggestion, $HistoryTicketTitle, $HistoryTicketType)
	{
		if($HistoryTicketDescription != NULL)
			$this->TicketDescription = $TicketDescription;
		if($HistoryTicketService != NULL)
			$this->HistoryTicketService = $HistoryTicketService;
		if($HistoryTicketStatus != NULL)
			$this->HistoryTicketStatus = $HistoryTicketStatus;
		if($HistoryTicketSuggestion != NULL)
			$this->HistoryTicketSuggestion = $HistoryTicketSuggestion;
		if($HistoryTicketTitle != NULL)
			$this->HistoryTicketTitle = $HistoryTicketTitle;
		if($HistoryTicketType != NULL)
			$this->HistoryTicketType = $HistoryTicketType;
	}
}
?>