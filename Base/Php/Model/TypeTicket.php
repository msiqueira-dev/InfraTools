<?php

/************************************************************************
Class: TypeTicket
Creation: 01/09/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class for the ticket types.
Get / Set:
			public function GetRegisterDate();
			public function GetTypeTicketDescription();
			public function SetTypeTicketDescription($Description);
			public function GetTypeTicketId();
			public function SetTypeTicketDescription($TypeTicketDescription);
			public function SetTypeTicketId($Id);
Methods:
			public function UpdateTypeTicket($RegisterDate, $TypeTicketDescription, $TypeTicketDescription);
**************************************************************************/

class TypeTicket
{
	/* Properties */
	protected $RegisterDate           = NULL;
	protected $TypeTicketDescription  = NULL;
	protected $TypeTicketId           = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TypeTicketDescription, $TypeTicketId) 
	{
		$this->RegisterDate           = $RegisterDate;
		$this->TypeTicketDescription  = $TypeTicketDescription;
		$this->TypeTicketId           = $TypeTicketId;
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
	
	public function GetTypeTicketId()
	{
		return $this->TypeTicketId;
	}
	
	/* SET */
	public function SetTypeTicketDescription($TypeTicketDescription)
	{
		$this->TypeTicketDescription = $TypeTicketDescription;
	}
	
	public function SetTypeTicketId($TypeTicketId)
	{
		$this->TypeTicketId = $TypeTicketId;
	}
	
	/* METHODS */
	public function UpdateTypeTicket($TypeTicketDescription, $TypeTicketId)	
	{
		if($TypeTicketDescription != NULL)
			$this->TypeTicketDescription = $TypeTicketDescription;
		if($TypeTicketId != NULL)
			$this->TypeTicketId = $TypeTicketId;
	}
}
?>