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
		parent::__construct($RegisterDate, $TicketDescription, $TicketId, $TicketService,
							$TicketStatus, $TicketSuggestion, $TicketTitle, $TicketType);
		if(isset($TicketService))
			$this->TicketService = $TicketService;
		else throw new Exception(ConfigInfraTools::EXCEPTION_TICKET_SERVICE);
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
		if(!is_null($this->TicketService))
		{
			if(is_object($this->TicketServiceActive))
				return $this->TicketServiceActive();
		}
	}
	
	public function GetTicketServiceDescription()
	{
		if(!is_null($this->TicketService))
		{
			return $this->TicketServiceDescription();
		}
	}
	
	public function GetTicketServiceId()
	{
		if(!is_null($this->TicketService))
		{
			return $this->TicketServiceId();
		}
	}
	
	public function GetTicketServiceName()
	{
		if(!is_null($this->TicketService))
		{
			return $this->TicketServiceName();
		}
	}
	
	/* SET */
	public function SetTicketService($TicketService)
	{
		$this->TicketService = $TicketService;
	}
	
	/* METHODS */
	public function UpdateTicket($TicketDescription, $TicketService, $TicketStatus, $TicketSuggestion, $TicketTitle, $TicketType)
	{
		if(!is_null($TicketDescription))
			$this->TicketDescription = $TicketDescription;
		if(!is_null($TicketService))
		{
			if(is_object($TicketService))
				$this->TicketService = $TicketService;
		}
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