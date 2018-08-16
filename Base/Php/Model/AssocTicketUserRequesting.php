<?php

/************************************************************************
Class: AssocTicketUserRequesting
Creation: 05/06/2018
Creator: Marcus Siqueira
Dependencies:
Description: 
			Association between user and ticket.
Get / Set:		
			public function GetAssocTicketUserRequestingTicket();
			public function GetAssocTicketUserRequestingTicketId();
			public function GetAssocTicketUserRequestingTicketTypeAssocUserRequesting();
			public function GetAssocTicketUserRequestingTicketTypeAssocUserRequestingBond();
			public function GetAssocTicketUserRequestingUser();
			public function GetAssocTicketUserRequestingUserEmail();
			public function GetRegisterDate();
			public function SetAssocTicketUserRequestingTicket($Ticket);
			public function GetAssocTicketUserRequestingTicketTypeAssocUserRequesting($TypeAssocUserRequesting);
			public function SetAssocTicketUserRequestingUser($User);
			public function SetRegisterDate($RegisterDate);
Methods:
			public function UpdateAssocTicketUserRequesting($Ticket, $TypeAssocUserRequesting, $User, $RegisterDate);
**************************************************************************/

class AssocTicketUserRequesting
{
	/* Properties */
	protected $Ticket                  = NULL;
	protected $TypeAssocUserRequesting = NULL;
	protected $User                    = NULL;
	protected $RegisterDate            = NULL;

	/* Constructor */
	public function __construct($Ticket, $TypeAssocUserRequesting, $User, $RegisterDate) 
	{
		if($Ticket != NULL)
			$this->Ticket = $Ticket;
		else throw new Exception(Config::EXCEPTION_ASSOC_TICKET_USER_REQUESTING_TICKET);
		if($TypeAssocUserRequesting != NULL)
			$this->TypeAssocUserRequesting = $TypeAssocUserRequesting;
		else throw new Exception(Config::EXCEPTION_ASSOC_TICKET_USER_REQUESTING_TYPE);
		if($User != NULL)
			$this->User = $User;
		else throw new Exception(Config::EXCEPTION_ASSOC_TICKET_USER_REQUESTING_USER);
		if($RegisterDate != NULL)
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_USER);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetAssocTicketUserRequestingTicket()
	{
		return $this->Ticket;	
	}
	
	public function GetAssocTicketUserRequestingTicketId()
	{
		if($this->Ticket != NULL)
			return $this->Ticket->GetTicketId();
	}
	
	public function GetAssocTicketUserRequestingTicketTypeAssocUserRequesting()
	{
		return $this->TypeAssocUserRequesting;
	}
	
	public function GetAssocTicketUserRequestingTicketTypeAssocUserRequestingBond()
	{
		if($this->TypeAssocUserRequesting != NULL)
			return $this->TypeAssocUserRequesting->GetTypeAssocUserRequestingBond();
	}
	
	public function GetAssocTicketUserRequestingUser()
	{
		return $this->User;
	}
	
	public function GetAssocTicketUserRequestingUserEmail()
	{
		if($this->User != NULL)
			return $this->User->GetEmail();
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */	
	public function SetAssocTicketUserRequestingTicket($Ticket)
	{
		$this->Ticket = $Ticket;
	}
	
	public function GetAssocTicketUserRequestingTicketTypeAssocUserRequesting($TypeAssocUserRequesting)
	{
		$this->TypeAssocUserRequesting = $TypeAssocUserRequesting;
	}
	
	public function SetAssocTicketUserRequestingUser($User)
	{
		$this->User = $User;
	}
	
	public function SetRegisterDate($RegisterDate)
	{
		$this->RegisterDate = $RegisterDate;	
	}
	
	/* METHODS */
	public function UpdateAssocTicketUserRequesting($Ticket, $TypeAssocUserRequesting, $User, $RegisterDate) 
	{
		if($Ticket != NULL)
			$this->Ticket  = $Ticket;
		if($TypeAssocUserRequesting != NULL)
			$this->TypeAssocUserRequesting = $TypeAssocUserRequesting;
		if($User != NULL)
			$this->User = $User;
		if($RegisterDate != NULL)
			$this->RegisterDate = $RegisterDate;
	}
}
?>