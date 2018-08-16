<!-- FORM TYPE ASSOC USER TEAM LIST -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_BACK; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_BACK; ?>" method="post" >
<?php
if(is_array($this->ArrayTypeAssocUserTeam))
{
	echo "<input type='hidden' value='$this->InputLimitOne' 
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE . "'/>";
	echo "<input type='hidden' value='$this->InputLimitTwo'
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO . "'/>";
	echo "<table class='TableTypeAssocUserTeam'>";
	echo "<tr>";
	echo "<th class='TableTypeAssocUserTeamThId'>" .
		 "<input  type='image'
				  class='TableTypeAssocUserTeamInputRight'
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
						   . "Icons/IconInfraToolsArrowBack28.png'\" />" .
		 "<div class='TableTypeAssocUserTeamThRight'>" . 
					  $this->InstanceLanguageText->GetText('TYPE_ASSOC_USER_TEAM_TEAM_ID')."</div></th>";
	echo "<th  class='TableTypeAssocUserTeamThDescription'>" . 
		$this->InstanceLanguageText->GetText('TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION')."</th>";
	echo "<th  class= 'TableTypeAssocUserTeamThRegisterDate'>
	     <div  class='TableTypeAssocUserTeamThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<input  type='image'
				  class='TableTypeAssocUserTeamInputLeft'
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
						   . "Icons/IconInfraToolsArrowForward28.png'\" />";
	echo "</th>";
	echo "</tr>";
	foreach($this->ArrayTypeAssocUserTeam as $key=>$typeAssocUserTeam)
	{
		echo "<tr>";
		echo "<td class='TableTypeAssocUserTeamThId'>
		      <input type='submit' name='" . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_SELECT_SUBMIT . "' 
		                           id='"   . ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_SELECT_SUBMIT . "' 
							       value='" . $typeAssocUserTeam->GetTypeAssocUserTeamTeamId() . "' 
								   title='" . $typeAssocUserTeam->GetTypeAssocUserTeamTeamId() . "' />
		      </td>";
		echo "<td class='TableTypeAssocUserTeamThDescritpion'>"   . 
			$typeAssocUserTeam->GetTypeAssocUserTeamTeamDescription()  . "</td>";
		echo "<td class= 'TableTypeAssocUserTeamThRegisterDate'>" . $typeAssocUserTeam->GetRegisterDate() . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</form>