<?php

/************************************************************************
Class: TypeStatusTicket
Creation: 31/10/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class for the type of the ticket status.
Get / Set:
			public function GetRegisterDate();
			public function GetTypeStatusTicketDescription();
			public function GetTypeStatusTicketId();
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
	protected $TypeStatusTicketId          = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TypeStatusTicketDescription, $TypeStatusTicketId) 
	{
		$this->RegisterDate                = $RegisterDate;
		$this->TypeStatusTicketDescription = $TypeStatusTicketDescription;
		$this->TypeStatusTicketId          = $TypeStatusTicketId;
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
	
	public function GetTypeStatusTicketId()
	{
		return $this->TypeStatusTicketId;
	}
	
	/* SET */
	public function SetTypeStatusTicketDescription($TypeStatusTicketDescription)
	{
		$this->TypeStatusTicketDescription = $TypeStatusTicketDescription;
	}
	
	/* METHODS */
	private function SetState(TypeStatusTicketState $State)
	{
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
		if($this->TypeStatusTicketDescription != NULL)
			$this->TypeStatusTicketDescription = $TypeStatusTicketDescription;
	}
}
?>