<!-- FORM TYPE ASSOC USER TEAM LIST -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_BACK; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_BACK; ?>" method="post" >
<?php
if(is_array($this->ArrayInstanceTypeAssocUserTeam))
{
	echo "<form  name='" . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST . "' method='post' />";
	echo "<input type='hidden' value='$this->InputLimitOne' 
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE . "'/>";
	echo "<input type='hidden' value='$this->InputLimitTwo'
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO . "'/>";
	echo "<table class='TableGeneric'>";
	echo "<tr>";
	echo "<th class='TableGenericThArrow'>" .
		 "<div class='TableGenericInputLeft'>
		  <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_BACK . "'
				  value='" . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('TYPE_ASSOC_USER_TEAM_DESCRIPTION') . "</div></th>";
	echo "<th  class= 'TableGenericThArrow'> 
	     <div  class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		 <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_FORWARD . "'
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
	foreach($this->ArrayInstanceTypeAssocUserTeam as $key=>$typeAssocUserTeam)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT . "' 
							 id='"     . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT . "'
							 value='"  . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT . "' />
						<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION . "' 
										     id='"   . ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION . "' 
										     value='" . $typeAssocUserTeam->GetTypeAssocUserTeamDescription() . "' 
										     title='" . $typeAssocUserTeam->GetTypeAssocUserTeamDescription() . "' />
					</form>
				  </td>";
		echo "<td class='TableGenericTdLink'><label>" . $typeAssocUserTeam->GetRegisterDate() . "</label></td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</form>