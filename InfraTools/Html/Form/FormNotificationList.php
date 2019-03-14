<!-- FM_NOTIFICATION_LST_FORM -->
<div class="DivTableGenericHeader">
	<div class="DivTableGenericHeaderRowCount">
		<?php 
			 if(isset($this->InputValueLimit1) && isset($this->InputValueLimit2)) 
			 {
				 if($this->InputValueLimit1 != "" || $this->InputValueLimit2 != "") 
					  echo "<label class='InputValueLimitTitle'>" . 
							   $this->InstanceLanguageText->GetText('TB_PAGE_PREFIX') . 
						   "</label>" .
						   "<label class='InputValueLimitValue'>" . 
							   $this->InputValueLimit1 . " " . $this->InstanceLanguageText->GetText('TB_PAGE') 
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
if(isset($this->ArrayInstanceNotification))
{
	if(is_array($this->ArrayInstanceNotification))
	{
		echo "<form  name='" . ConfigInfraTools::FM_NOTIFICATION_LST_FORM . "' method='post' />";
		echo "<input type='hidden' value='$this->InputLimitOne' 
					 name='" . ConfigInfraTools::FM_LST_INPUT_LIMIT_ONE . "'/>";
		echo "<input type='hidden' value='$this->InputLimitTwo'
					 name='" . ConfigInfraTools::FM_LST_INPUT_LIMIT_TWO . "'/>";
		echo "<table class='TableGeneric'>";
		echo "<tr>";
		echo "<th class='TableGenericThArrow'>" .
			 "<div class='TableGenericInputLeft'>
			 <input  type='image'
					  class='TableGenericThArrowImage'
					  name='"  . ConfigInfraTools::FM_NOTIFICATION_LST_BACK . "' 
					  id='"    . ConfigInfraTools::FM_NOTIFICATION_LST_BACK . "'
					  value='" . ConfigInfraTools::FM_NOTIFICATION_LST_BACK . "'
					  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
					  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
					  src='"   . $this->Config->DefaultServerImage 
							   . "Icons/IconInfraToolsArrowBack28.png'
					  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowBackHover28.png'\"
					  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
			 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER') . "</div></th>";
		echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE') . "</th>";
		echo "<th  class='TableGenericThArrow'>
			 <div  class='TableGenericThLeft'>"  . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
			 "<div class='TableGenericInputRight'>
			  <input  type='image'
					  class='TableGenericThArrowImage'
					  name='"  . ConfigInfraTools::FM_NOTIFICATION_LST_FORWARD . "' 
					  id='"    . ConfigInfraTools::FM_NOTIFICATION_LST_FORWARD . "'
					  value='" . ConfigInfraTools::FM_NOTIFICATION_LST_FORWARD . "'
					  title='" . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
					  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
					  src='"   . $this->Config->DefaultServerImage 
							   . "Icons/IconInfraToolsArrowForward28.png'
					  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowForwardHover28.png'\"
					  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowForward28.png'\" /></div>";
		echo "</th>";
		echo "</tr>";
		echo "</form>";
		foreach($this->ArrayInstanceNotification as $key=>$notification)
		{
			echo "<tr>";
			echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "' method='post' />
						<input type='hidden'
								 name='"   . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "' 
								 id='"     . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "'
								 value='"  . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "' />
						  <input type='submit' name='" . ConfigInfraTools::FIELD_NOTIFICATION_ID . "' 
									   id='"   . ConfigInfraTools::FIELD_NOTIFICATION_ID . "' 
									   value='" . $notification->GetNotificationId() . "' 
									   title='" . $notification->GetNotificationId() . "' />
					</form>
				  </td>";
			echo "<td class='TableGenericTdLink'>";
			if($notification->GetNotificationActive())
				echo "<img src='" . $this->Config->DefaultServerImage . "Icons/IconInfraToolsVerified.png'
						   'alt='NotificationActive' width='20' height='20' />" . "</td>";
			else echo "<img src='" . $this->Config->DefaultServerImage . "Icons/IconInfraToolsNotVerified.png' 
						   'alt='NotificationActive' width='20' height='20' />" . "</td>";
			echo "<td class= 'TableGenericTdLink'>" . $notification->GetRegisterDate() . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
elseif(isset($this->ArrayInstanceAssocUserNotification))
{
	if(is_array($this->ArrayInstanceAssocUserNotification))
	{
		echo "<form  name='" . ConfigInfraTools::FM_NOTIFICATION_LST_FORM . "' method='post' />";
		echo "<input type='hidden' value='$this->InputLimitOne' 
					 name='" . ConfigInfraTools::FM_LST_INPUT_LIMIT_ONE . "'/>";
		echo "<input type='hidden' value='$this->InputLimitTwo'
					 name='" . ConfigInfraTools::FM_LST_INPUT_LIMIT_TWO . "'/>";
		echo "<table class='TableGeneric'>";
		echo "<tr>";
		echo "<th class='TableGenericThArrow'>" .
			 "<div class='TableGenericInputLeft'>
			 <input  type='image'
					  class='TableGenericThArrowImage'
					  name='"  . ConfigInfraTools::FM_NOTIFICATION_LST_BACK . "' 
					  id='"    . ConfigInfraTools::FM_NOTIFICATION_LST_BACK . "'
					  value='" . ConfigInfraTools::FM_NOTIFICATION_LST_BACK . "'
					  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
					  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
					  src='"   . $this->Config->DefaultServerImage 
							   . "Icons/IconInfraToolsArrowBack28.png'
					  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowBackHover28.png'\"
					  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
			 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ID') . "</div></th>";
		echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_NOTIFICATION_READ') . "</th>";
		echo "<th  class='TableGenericThArrow'>
			 <div  class='TableGenericThLeft'>"  . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
			 "<div class='TableGenericInputRight'>
			  <input  type='image'
					  class='TableGenericThArrowImage'
					  name='"  . ConfigInfraTools::FM_NOTIFICATION_LST_FORWARD . "' 
					  id='"    . ConfigInfraTools::FM_NOTIFICATION_LST_FORWARD . "'
					  value='" . ConfigInfraTools::FM_NOTIFICATION_LST_FORWARD . "'
					  title='" . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
					  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
					  src='"   . $this->Config->DefaultServerImage 
							   . "Icons/IconInfraToolsArrowForward28.png'
					  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowForwardHover28.png'\"
					  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowForward28.png'\" /></div>";
		echo "</th>";
		echo "</tr>";
		echo "</form>";
		foreach($this->ArrayInstanceAssocUserNotification as $key=>$assocUserNotification)
		{
			echo "<tr>";
			echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "' method='post' />
						<input type='hidden'
								 name='"   . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "' 
								 id='"     . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "'
								 value='"  . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "' />
						  <input type='submit' name='" . ConfigInfraTools::FIELD_NOTIFICATION_ID . "' 
									   id='"   . ConfigInfraTools::FIELD_NOTIFICATION_ID . "' 
									   value='" . $assocUserNotification->GetAssocUserNotificationNotification()->GetNotificationId() . "' 
									   title='" . $assocUserNotification->GetAssocUserNotificationNotification()->GetNotificationId() . "' />
					</form>
				  </td>";
			echo "<td class='TableGenericTdLink'>";
			if($assocUserNotification->GetAssocUserNotificationRead())
				echo "<img src='" . $this->Config->DefaultServerImage . "Icons/IconInfraToolsVerified.png'
						   'alt='NotificationActive' width='20' height='20' />" . "</td>";
			else echo "<img src='" . $this->Config->DefaultServerImage . "Icons/IconInfraToolsNotVerified.png' 
						   'alt='NotificationActive' width='20' height='20' />" . "</td>";
			echo "<td class= 'TableGenericTdLink'>" . $assocUserNotification->GetRegisterDate() . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
?>
</form>