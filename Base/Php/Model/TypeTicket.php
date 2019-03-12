<?php

/************************************************************************
Class: TypeTicket
Creation: 01/09/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for Type Ticket
Get / Set:
			public function GetRegisterDate();
			public function GetTypeTicketDescription();
			public function SetTypeTicketDescription($Description);
			public function SetTypeTicketDescription($TypeTicketDescription);
Methods:
			public function UpdateTypeTicket($RegisterDate, $TypeTicketDescription, $TypeTicketDescription);
**************************************************************************/

class TypeTicket
{
	/* Properties */
	protected $RegisterDate           = NULL;
	protected $TypeTicketDescription  = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TypeTicketDescription) 
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($TypeTicketDescription))
			$this->TypeTicketDescription  = $TypeTicketDescription;
		else throw new Exception(Config::EXCEPTION_TYPE_TICKET_DESCRIPTION);
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
	
	public function GetTypeTicketDescription()
	{
		return $this->TypeTicketDescription;
	}
	
	/* SET */
	public function SetTypeTicketDescription($TypeTicketDescription)
	{
		if(!is_null($TypeTicketDescription))
			$this->TypeTicketDescription = $TypeTicketDescription;
	}
	
	/* METHODS */
	public function UpdateTypeTicket($TypeTicketDescription)	
	{
		if(!is_null($TypeTicketDescription))
			$this->TypeTicketDescription = $TypeTicketDescription;
	}
}
?>