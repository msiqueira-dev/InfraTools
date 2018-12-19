<!-- BODY TYPE TICKET LIST -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_LIST; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_LIST; ?>" method="post" >
<div class="DivTableGenericHeader">
	<div class="DivTableGenericHeaderRowCount">
		<?php 
			 if(isset($this->InputValueLimit1) && isset($this->InputValueLimit2)) 
			 {
				 if($this->InputValueLimit1 != "" || $this->InputValueLimit2 != "") 
					  echo "<label class='InputValueLimitTitle'>" . 
							   $this->InstanceLanguageText->GetText('TABLE_PAGE_PREFIX') . 
						   "</label>" .
						   "<label class='InputValueLimitValue'>" . 
							   $this->InputValueLimit1 . " " . $this->InstanceLanguageText->GetText('TABLE_PAGE') 
													   . " " . $this->InputValueLimit2 . 
						   "</label>";
			 }
		?>
	</div>
	<div class="DivTableGenericHeaderRowCount">
		<?php
			 if(isset($this->InputValueRowCount)) 
			  {
				  if($this->InputValueRowCount != "") 
					  echo "<label class='DivTableGenericRowCountLabelTitle'>" . 
							   $this->InstanceLanguageText->GetText('ROW_COUNT') . 
						   "</label>" .
						   "<label class='DivTableGenericRowCountLabelValue'>" . 
							   $this->InputValueRowCount . 
						   "</label>";
			  } 
		?>
	</div>
</div>
<?php
if(is_array($this->ArrayInstanceTypeTicket))
{
	echo "<input type='hidden' value='$this->InputLimitOne' 
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE . "'/>";
	echo "<input type='hidden' value='$this->InputLimitTwo'
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO . "'/>";
	echo "<table class='TableTypeTicket'>";
	echo "<tr>";
	echo "<th class='TableTypeTicketThId'>" .
		 "<input  type='image'
				  class='TableTicketInputRight'
				  name='"  . ConfigInfraTools::FORM_TYPE_TICKET_LIST_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_TYPE_TICKET_LIST_BACK . "'
				  value='" . ConfigInfraTools::FORM_TYPE_TICKET_LIST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" />" .
		 "<div class='TableTypeTicketThRight'>" . $this->InstanceLanguageText->GetText('DESCRIPTION') . "</div></th>";
	echo "<th  class= 'TableTypeTicketThRegisterDate'>
	     <div  class='TableTypeTicketThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<input  type='image'
				  class='TableTypeTicketInputLeft'
				  name='"  . ConfigInfraTools::FORM_TYPE_TICKET_LIST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_TYPE_TICKET_LIST_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_TYPE_TICKET_LIST_FORWARD . "'
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
	foreach($this->ArrayInstanceTypeTicket as $key=>$typeTicket)
	{
		echo "<tr>";
		echo "<td class='TableTypeTicketThId'>
		      <input type='submit' name='" . ConfigInfraTools::FORM_TYPE_TICKET_LIST_SELECT_SUBMIT . "' 
		                           id='"   . ConfigInfraTools::FORM_TYPE_TICKET_LIST_SELECT_SUBMIT . "' 
							       value='" . $typeTicket->GetTypeTicketDescription() . "' 
								   title='" . $typeTicket->GetTypeTicketDescription() . "' />
		      </td>";
		echo "<td class= 'TableTypeTicketThRegisterDate'>" . $typeTicket->GetRegisterDate() . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</form>