<!-- FORM CORPORATION VIEW USERS -->
<form name="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_USERS; ?>"
      id="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_USERS; ?>" method="post" >
<?php
if(is_array($this->ArrayInstanceInfraToolsCorporationUsers))
{
	echo "<input type='hidden' value='$this->InputLimitOne' 
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE . "'/>";
	echo "<input type='hidden' value='$this->InputLimitTwo'
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO . "'/>";
	echo "<table class='TableCorporationUser'>";
	echo "<tr>";
	echo "<th>" .
		 "<input  type='image'
				  class='TableCorporationInputRight'
				  name='"  . ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_BACK . "'
				  value='" . ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" />" .
		 "<div class='TableCorporationThRight'>" . $this->InstanceLanguageText->GetText('EMAIL') . "</div></th>";
	echo "<th>"                                  . $this->InstanceLanguageText->GetText('CORPORATION') . "</th>";
	echo "<th>"                                  . $this->InstanceLanguageText->GetText('NAME') . "</th>";
	echo "<th>"                                  . $this->InstanceLanguageText->GetText('TYPE_USER_DESCRIPTION') . "</th>";
	echo "<th>"                                  .
	     "<div  class='TableCorporationThLeft'>" . $this->InstanceLanguageText->GetText('ACTIVE') . "</div>" .
		 "<input  type='image'
				  class='TableCorporationInputLeft'
				  name='"  . ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_FORWARD . "'
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
	foreach($this->ArrayInstanceInfraToolsCorporationUsers as $key=>$user)
	{
		echo "<tr>";
		echo "<td class='TdLink'>
				<form  name='" . ConfigInfraTools::FORM_USER_LIST . "' method='post' />
					<input type='hidden'
								 name='"   . ConfigInfraTools::FORM_USER_LIST . "' 
								 id='"     . ConfigInfraTools::FORM_USER_LIST . "'
								 value='"  . ConfigInfraTools::FORM_USER_LIST . "' />
					<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_USER_USER_EMAIL . "' 
										 id='"   . ConfigInfraTools::FORM_FIELD_USER_USER_EMAIL . "' 
										 value='" . $user->GetEmail() . "' 
										 title='" . $user->GetEmail() . "' />
				</form>
		      </td>";
		echo "<td class='TdLink'>
				<form  name='" . ConfigInfraTools::FORM_CORPORATION_LIST . "' method='post' />
					<input type='hidden'
								 name='"   . ConfigInfraTools::FORM_CORPORATION_LIST . "' 
								 id='"     . ConfigInfraTools::FORM_CORPORATION_LIST . "'
								 value='"  . ConfigInfraTools::FORM_CORPORATION_LIST . "' />
					<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_CORPORATION_NAME . "' 
										 id='"   . ConfigInfraTools::FORM_FIELD_CORPORATION_NAME . "' 
										 value='" . $this->InstanceCorporation->GetCorporationName() . "' 
										 title='" . $this->InstanceCorporation->GetCorporationName() . "' />
				</form>
		      </td>";
		echo "<td>" . $user->GetName()      . "</td>";
		echo "<td class='TdLink'>
				<form  name='" . ConfigInfraTools::FORM_TYPE_USER_LIST . "' method='post' />
					<input type='hidden'
								 name='"   . ConfigInfraTools::FORM_TYPE_USER_LIST . "' 
								 id='"     . ConfigInfraTools::FORM_TYPE_USER_LIST . "'
								 value='"  . ConfigInfraTools::FORM_TYPE_USER_LIST . "' />
					<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION . "' 
										 id='"   . ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION . "' 
										 value='" . $user->GetUserTypeDescription() . "' 
										 title='" . $user->GetUserTypeDescription() . "' />
				</form>
		      </td>";
		if($user->GetUserActive())
			echo "<td> 
					<img   src='".$this->Config->DefaultServerImage.'Icons/IconInfraToolsVerified.png' 
			                     . "' alt='CorporationVerification' width='20' height='20' />
				 </td>";
		else
			echo "<td> 
					<img   src='".$this->Config->DefaultServerImage.'Icons/IconInfraToolsNotVerified.png' 
			                     . "' alt='CorporationVerification' width='20' height='20' />
				 </td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</form>
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))               echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCorporationNameText))     echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnTypeUserDescriptionText)) echo $this->ReturnTypeUserDescriptionText; ?>
		<?php if(isset($this->ReturnEmailText))               echo $this->ReturnEmailText; ?>
		<?php if(isset($this->ReturnText))                    echo $this->ReturnText; ?>
	</label>
</div>