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
			public function UpdateAssocTicketUserRequesting($Ticket, $TypeAssocUserRequesting, $User);
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
		if(!is_null($Ticket))
			$this->Ticket = $Ticket;
		else throw new Exception(Config::EXCEPTION_ASSOC_TICKET_USER_REQUESTING_TICKET);
		if(!is_null($TypeAssocUserRequesting))
			$this->TypeAssocUserRequesting = $TypeAssocUserRequesting;
		else throw new Exception(Config::EXCEPTION_ASSOC_TICKET_USER_REQUESTING_TYPE);
		if(!is_null($User))
			$this->User = $User;
		else throw new Exception(Config::EXCEPTION_ASSOC_TICKET_USER_REQUESTING_USER);
		if(!is_null($RegisterDate))
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
		if(!is_null($this->Ticket))
		{
			if(is_object($this->Ticket))
			{
				return $this->Ticket->GetTicketId();	
			}
			else return $this->Ticket;
		}
		else return NULL;
	}
	
	public function GetAssocTicketUserRequestingTicketTypeAssocUserRequesting()
	{
		return $this->TypeAssocUserRequesting;
	}
	
	public function GetAssocTicketUserRequestingTicketTypeAssocUserRequestingBond()
	{
		if(!is_null($this->TypeAssocUserRequesting))
		{
			if(is_object($this->TypeAssocUserRequesting))
			{
				return $this->TypeAssocUserRequesting->GetTypeAssocUserRequestingBond();	
			}
			else return $this->TypeAssocUserRequesting;
		}
		else return NULL;
	}
	
	public function GetAssocTicketUserRequestingUser()
	{
		return $this->User;
	}
	
	public function GetAssocTicketUserRequestingUserEmail()
	{
		if(!is_null($this->User))
		{
			if(is_object($this->TypeAssocUserRequesting))
			{
				return $this->User->GetEmail();	
			}
			else return $this->User;
		}
		else return NULL;
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
	public function UpdateAssocTicketUserRequesting($Ticket, $TypeAssocUserRequesting, $User) 
	{
		if(!is_null($Ticket))
			$this->Ticket  = $Ticket;
		if(!is_null($TypeAssocUserRequesting))
			$this->TypeAssocUserRequesting = $TypeAssocUserRequesting;
		if(!is_null($User))
			$this->User = $User;
	}
}
?>