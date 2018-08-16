<?php

/************************************************************************
Class: TypeStatusTicketStateCanceled
Creation: 11/10/2017
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

class TypeStatusTicketStateCanceled extends TypeStatusTicketStateAbstract
{
    public function TypeStatusTicketCanceled()
	{
		throw new IllegalStateTransitionException;
	}
	
    public function TypeStatusTicketCompleted()
	{
		throw new IllegalStateTransitionException;
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
		throw new IllegalStateTransitionException;
	}
	
	public function TypeStatusTicketNew()
	{
		throw new IllegalStateTransitionException;
	}
	
	public function TypeStatusTicketNullfied()
	{
		throw new IllegalStateTransitionException;
	}
	
	public function TypeStatusTicketPaused()
	{
		throw new IllegalStateTransitionException;
	}
	
	public function TypeStatusTicketRejected()
	{
		throw new IllegalStateTransitionException;
	}
}
?>