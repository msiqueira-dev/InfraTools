<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_CORPORATION_NAME_TEXT}
		{$RETURN_DEPARTMENT_NAME_TEXT}
		{$RETURN_TYPE_USER_DESCRIPTION_TEXT}
		{$RETURN_USER_EMAIL_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_NOTIFICATION_VIEW_LST_USERS_FORM -->
<?php
if(is_array($this->ArrayInstanceInfraToolsUser) && !empty($this->ArrayInstanceInfraToolsUser))
{
	echo "<div class='DivTableGenericHeader'>";
		 echo "<div class='DivTableGenericHeaderRowCount'>";
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
		echo "</div>";
		echo "<div class='DivTableGenericHeaderRowCount'>";
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
		echo "</div>";
	echo "</div>";
	echo "<form  name='" . ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_FORM . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB_BACK . "' 
				  id='"    . ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB_BACK . "'
				  value='" . ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28x28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28x28Hover.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28x28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ID') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_USER_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_USER_TYPE') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
		  <div class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME') . "</div>" .
		 "<div class='TableGenericInputRight'>
				  <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB_FORWARD . "' 
				  id='"    . ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB_FORWARD . "'
				  value='" . ConfigInfraTools::FM_NOTIFICATION_VIEW_LST_USERS_SB_FORWARD . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowForward28x28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowForward28x28Hover.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowForward28x28.png'\" /></div>";
	echo "</th>";
	echo "</tr>";
	echo "</form>";
	foreach($this->ArrayInstanceInfraToolsUser as $key=>$user)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FM_NOTIFICATION_SEL . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "' 
							 id='"     . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "'
							 value='"  . ConfigInfraTools::FM_NOTIFICATION_SEL_SB . "' />
						<input type='submit' name='" . ConfigInfraTools::FIELD_NOTIFICATION_ID . "' 
										 id='"       . ConfigInfraTools::FIELD_NOTIFICATION_ID . "' 
										 value='" . $this->InstanceNotification->GetNotificationId() . "' 
										 title='" . $this->InstanceNotification->GetNotificationId() . "' />
						</form>
				  </td>";
		echo "<td class='TableGenericTdLink'>
				<form  name='" . ConfigInfraTools::FM_USER_SEL_SB . "' method='post' />
					<input type='hidden'
						   name='"   . ConfigInfraTools::FM_USER_SEL_SB . "' 
						   id='"     . ConfigInfraTools::FM_USER_SEL_SB . "'
						   value='"  . ConfigInfraTools::FM_USER_SEL_SB . "' />
		      		<input type='submit' name='" . ConfigInfraTools::FIELD_USER_EMAIL . "' 
		                                 id='"   . ConfigInfraTools::FIELD_USER_EMAIL . "' 
							             value='" . $user->GetEmail() . "' title='" . $user->GetEmail() . "' />
				</form>
		      </td>";
		echo "<td>"     . $user->GetName()             . "</td>";
		echo "<td class='TableGenericTdLink'>
				<form  name='" . ConfigInfraTools::FM_TYPE_USER_SEL_SB . "' method='post' />
					<input type='hidden'
						   name='"   . ConfigInfraTools::FM_TYPE_USER_SEL_SB . "' 
						   id='"     . ConfigInfraTools::FM_TYPE_USER_SEL_SB . "'
						   value='"  . ConfigInfraTools::FM_TYPE_USER_SEL_SB . "' />
		        	<input type='submit' name='" . ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION . "' 
		                                 id='"   . ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION . "' 
							             value='" . $user->GetUserTypeDescription() . "' 
								         title='" . $user->GetUserTypeDescription() . "' />
					</form>
		      </td>";
		if($user->GetCorporationName() != NULL)
			echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FM_CORPORATION_SEL_SB . "' method='post' />
						<input type='hidden'
						       name='"   . ConfigInfraTools::FM_CORPORATION_SEL_SB . "' 
						       id='"     . ConfigInfraTools::FM_CORPORATION_SEL_SB . "'
						       value='"  . ConfigInfraTools::FM_CORPORATION_SEL_SB . "' />
						<input type='submit' name='" . ConfigInfraTools::FIELD_CORPORATION_NAME . "' 
										     id='"   . ConfigInfraTools::FIELD_CORPORATION_NAME . "' 
										     value='" . $user->GetCorporationName() . "' 
										     title='" . $user->GetCorporationName() . "' />
					</form>
				  </td>";
		else echo "<td>" . "<img src='" . $user->GetCorporationActiveIcon() . "'/>" . "</td>";
		if($user->GetDepartmentName() != NULL)
			echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FM_DEPARTMENT_SEL_SB . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FM_DEPARTMENT_SEL_SB . "' 
							 id='"     . ConfigInfraTools::FM_DEPARTMENT_SEL_SB . "'
							 value='"  . ConfigInfraTools::FM_DEPARTMENT_SEL_SB . "' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FIELD_CORPORATION_NAME . "' 
							 id='"     . ConfigInfraTools::FIELD_CORPORATION_NAME . "'
							 value='"  . $user->GetCorporationName() . "' />
						<input type='submit' name='" . ConfigInfraTools::FIELD_DEPARTMENT_NAME . "' 
										     id='"   . ConfigInfraTools::FIELD_DEPARTMENT_NAME . "' 
										     value='" . $user->GetDepartmentName() . "' 
										     title='" . $user->GetDepartmentName() . "' />
						</form>
				  </td>";
		else echo "<td>" . "<img src='" . $user->GetDepartmentActiveIcon() . "'/>" . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>