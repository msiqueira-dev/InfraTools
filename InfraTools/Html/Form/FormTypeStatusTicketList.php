<!-- FORM TYPE STATUS TICKET LIST -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST; ?>" method="post" >
<?php
if(is_array($this->ArrayInstanceTypeStatusTicket))
{
	echo "<input type='hidden' value='$this->InputLimitOne' 
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE . "'/>";
	echo "<input type='hidden' value='$this->InputLimitTwo'
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO . "'/>";
	echo "<table class='TableTypeStatusTicket'>";
	echo "<tr>";
	echo "<th class='TableTypeStatusTicketThId'>" .
		 "<input  type='image'
				  class='TableTicketInputRight'
				  name='"  . ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_BACK . "'
				  value='" . ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" />" .
		 "<div class='TableTypeStatusTicketThRight'>" . $this->InstanceLanguageText->GetText('TYPE_STATUS_TICKET_ID') . "</div></th>";
	echo "<th  class='TableTypeStatusTicketThDescription'>" . 
		                                       $this->InstanceLanguageText->GetText('TYPE_STATUS_TICKET_DESCRIPTION') . "</th>";
	echo "<th  class='TableTypeStatusTicketThRegisterDate'>
	     <div  class='TableTypeStatusTicketThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<input  type='image'
				  class='TableTypeStatusTicketInputLeft'
				  name='"  . ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_FORWARD . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowForward28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowForwardHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowForward28.png'\" />";
	echo "</th>";
	echo "</tr>";
	foreach($this->ArrayInstanceTypeStatusTicket as $key=>$typeStatusTicket)
	{
		echo "<tr>";
		echo "<td class='TableTypeStatusTicketThId'>
		      <input type='submit' name='" . ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_SELECT_SUBMIT . "' 
		                           id='"   . ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_SELECT_SUBMIT . "' 
							       value='" . $typeStatusTicket->GetTypeStatusTicketId() . "' 
								   title='" . $typeStatusTicket->GetTypeStatusTicketId() . "' />
		      </td>";
		echo "<td class='TableTypeStatusTicketThDescritpion'>"   . $typeStatusTicket->GetTypeStatusTicketDescription()  . "</td>";
		echo "<td class= 'TableTypeStatusTicketThRegisterDate'>" . $typeStatusTicket->GetRegisterDate() . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</form>