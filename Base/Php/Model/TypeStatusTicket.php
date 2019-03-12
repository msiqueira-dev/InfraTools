<?php

/************************************************************************
Class: TypeStatusTicket
Creation: 31/10/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for the type of the ticket status.
Get / Set:
			public function GetRegisterDate();
			public function GetTypeStatusTicketDescription();
			public function SetTypeStatusTicketDescription($TypeStatusTicketDescription);
Methods:
			private function SetState(TypeStatusTicketState $State);
			public function TypeStatusTicketCanceled();
			public function TypeStatusTicketCompleted();
			public function TypeStatusTicketFinished();
			public function TypeStatusTicketInProgress();
			public function TypeStatusTicketNew();
			public function TypeStatusTicketNullfied();
			public function TypeStatusTicketPaused();
			public function TypeStatusTicketRejected();
			public function TypeStatusTicketWarning();
			public function UpdateTypeStatusTicket($RegisterDate, $TypeStatusTicketDescription);
**************************************************************************/

class TypeStatusTicket
{
	/* Instances */
	private $State = NULL;
	
	/* Properties */
	protected $RegisterDate                = NULL;
	protected $TypeStatusTicketDescription = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TypeStatusTicketDescription) 
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($TypeStatusTicketDescription))
			$this->TypeStatusTicketDescription = $TypeStatusTicketDescription;
		else throw new Exception(Config::EXCEPTION_TYPE_STATUS_TICKET_DESCRIPTION);
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
	
	public function GetTypeStatusTicketDescription()
	{
		return $this->TypeStatusTicketDescription;
	}
	
	/* SET */
	public function SetTypeStatusTicketDescription($TypeStatusTicketDescription)
	{
		if(!is_null($TypeStatusTicketDescription))
			$this->TypeStatusTicketDescription = $TypeStatusTicketDescription;
	}
	
	/* METHODS */
	private function SetState(TypeStatusTicketState $State)
	{
		if(!is_null($State))
			$this->State = $State;
	}
	
	public function TypeStatusTicketCanceled()
	{
		$this->SetState($this->State->TypeStatusTicketCanceled());
	}
    public function TypeStatusTicketCompleted()
	{
		$this->SetState($this->State->TypeStatusTicketCompleted());
	}
    public function TypeStatusTicketFinished()
	{
		$this->SetState($this->State->TypeStatusTicketFinished());
	}
    public function TypeStatusTicketInProgress()
	{
		$this->SetState($this->State->TypeStatusTicketInProgress());
	}
	public function TypeStatusTicketNew()
	{
		$this->SetState($this->State->TypeStatusTicketNew());
	}
	public function TypeStatusTicketNullfied()
	{
		$this->SetState($this->State->TypeStatusTicketNullfied());
	}
	public function TypeStatusTicketPaused()
	{
		$this->SetState($this->State->TypeStatusTicketPaused());
	}
	public function TypeStatusTicketRejected()
	{
		$this->SetState($this->State->TypeStatusTicketRejected());
	}
	public function TypeStatusTicketWarning()
	{
		$this->SetState($this->State->TypeStatusTicketWarning());
	}
	
	public function UpdateTypeStatusTicket($TypeStatusTicketDescription)	
	{
		if(!is_null($this->TypeStatusTicketDescription))
			$this->TypeStatusTicketDescription = $TypeStatusTicketDescription;
	}
}
?>