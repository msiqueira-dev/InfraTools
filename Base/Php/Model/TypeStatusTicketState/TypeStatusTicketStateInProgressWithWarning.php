<?php

/************************************************************************
Class: TypeStatusTicketStateInProgressWithWarning
Creation: 11/07/2018
Creator: Marcus Siqueira
Dependencies:

Description: 
			Interface for the type of a status from a ticket.
Get / Set:

Methods:
			public function TypeStatusTicketCanceled();
			public function TypeStatusTicketCompleted();
			public function TypeStatusTicketFinished();
			public function TypeStatusTicketInProgress();
			public function TypeStatusTicketInProgressWithWarning();
			public function TypeStatusTicketNew();
			public function TypeStatusTicketNullfied();
			public function TypeStatusTicketPaused();
			public function TypeStatusTicketRejected();
**************************************************************************/

class TypeStatusTicketStateInProgress extends TypeStatusTicketStateAbstract
{
    public function TypeStatusTicketCanceled()
	{
		throw new TypeStatusTicketCanceled();
	}
	
    public function TypeStatusTicketCompleted()
	{
		throw new TypeStatusTicketCompleted();
	}
	
    public function TypeStatusTicketFinished()
	{
		throw new TypeStatusTicketStateFinished();
	}
	
    public function TypeStatusTicketInProgress()
	{
		throw new IllegalStateTransitionException;
	}
	
	 public function TypeStatusTicketInProgressWithWarning()
	{
		throw new TypeStatusTicketInProgressWithWarning();
	}
	
	public function TypeStatusTicketNew()
	{
		throw new IllegalStateTransitionException;
	}
	
	public function TypeStatusTicketNullfied()
	{
		throw new TypeStatusTicketNullfied();
	}
	
	public function TypeStatusTicketPaused()
	{
		throw new TypeStatusTicketPaused();
	}
	
	public function TypeStatusTicketRejected()
	{
		throw new IllegalStateTransitionException;
	}
}
?>