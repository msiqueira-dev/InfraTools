<!-- BODY TEAM LIST -->
<?php
if(is_array($this->ArrayTeam))
{
	echo "<form  name='" . ConfigInfraTools::FORM_TEAM_LIST . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FORM_TEAM_LIST_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_TEAM_LIST_BACK . "'
				  value='" . ConfigInfraTools::FORM_TEAM_LIST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('ID') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>" . $this->InstanceLanguageText->GetText('TEAM_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>" . $this->InstanceLanguageText->GetText('TEAM_DESCRIPTION') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
	      <div  class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		          <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_TEAM_LIST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_TEAM_LIST_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_TEAM_LIST_FORWARD . "'
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
	foreach($this->ArrayTeam as $key=>$team)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
			  	<form  name='" . ConfigInfraTools::FORM_TEAM_LIST_BACK . "' method='post' />
					<input type='submit' name='" . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT . "' 
									   id='"   . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT . "' 
									   value='" . $team->GetTeamId() . "' 
									   title='" . $team->GetTeamId() . "' />
			  	</form>
		      </td>";
		echo "<td class='TableGenericTdLink'>
			  	<form  name='" . ConfigInfraTools::FORM_TEAM_LIST_BACK . "' method='post' />
			    	<input type='hidden' name='" . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT . "' 
			  					   id='"   . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT . "' 
								   value='" . $team->GetTeamId() . "' />
								   
		      		<input type='submit' name='" . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT_NAME . "' 
		                           id='"   . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT_NAME . "' 
							       value='" . $team->GetTeamName() . "' 
								   title='" . $team->GetTeamName() . "' />
				</form>
		      </td>";
		echo "<td class='TableGenericTdLink'>"   . 
			$team->GetTeamDescription()  . "</td>";
		echo "<td class='TableGenericTdLink'>" . $team->GetRegisterDate() . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>