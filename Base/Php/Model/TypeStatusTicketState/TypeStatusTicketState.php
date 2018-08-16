<?php

/************************************************************************
Interface: TypeStatusTicketState
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
interface TypeStatusTicketState
{
    public function TypeStatusTicketCanceled();
    public function TypeStatusTicketCompleted();
    public function TypeStatusTicketFinished();
    public function TypeStatusTicketInProgress();
	public function TypeStatusTicketInProgressWithWarning();
	public function TypeStatusTicketNew();
	public function TypeStatusTicketNullfied();
	public function TypeStatusTicketPaused();
	public function TypeStatusTicketRejected();
}
?>