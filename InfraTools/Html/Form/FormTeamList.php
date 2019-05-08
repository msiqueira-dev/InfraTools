<!-- FM_TEAM_LST_FORM -->
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
if(is_array($this->ArrayInstanceTeam))
{
	echo "<form  name='" . ConfigInfraTools::FM_TEAM_LST_FORM . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FM_TEAM_LST_BACK . "' 
				  id='"    . ConfigInfraTools::FM_TEAM_LST_BACK . "'
				  value='" . ConfigInfraTools::FM_TEAM_LST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrow28x28Back.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28x28Hover.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrow28x28Back.png'\" /></div>" .
		 "<div class='TableGenericThLeft'>"   . $this->InstanceLanguageText->GetText('FIELD_TEAM_ID') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"    . $this->InstanceLanguageText->GetText('FIELD_TEAM_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>"    . $this->InstanceLanguageText->GetText('FIELD_TEAM_DESCRIPTION') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
	      <div  class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		          <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FM_TEAM_LST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FM_TEAM_LST_FORWARD . "'
				  value='" . ConfigInfraTools::FM_TEAM_LST_FORWARD . "'
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
	foreach($this->ArrayInstanceTeam as $key=>$team)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FM_TEAM_SEL_SB . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FM_TEAM_SEL_SB . "' 
							 id='"     . ConfigInfraTools::FM_TEAM_SEL_SB . "'
							 value='"  . ConfigInfraTools::FM_TEAM_SEL_SB . "' />
						<input type='submit' name='" . ConfigInfraTools::FIELD_TEAM_ID . "' 
										     id='"   . ConfigInfraTools::FIELD_TEAM_ID . "' 
										     value='" . $team->GetTeamId() . "' 
										     title='" . $team->GetTeamId() . "' />
					</form>
				  </td>";
		echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FM_TEAM_SEL_SB . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FM_TEAM_SEL_SB . "' 
							 id='"     . ConfigInfraTools::FM_TEAM_SEL_SB . "'
							 value='"  . ConfigInfraTools::FM_TEAM_SEL_SB . "' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FIELD_TEAM_ID . "' 
							 id='"     . ConfigInfraTools::FIELD_TEAM_ID . "'
							 value='"  . $team->GetTeamId() . "' />
						<input type='submit' name='" . ConfigInfraTools::FIELD_TEAM_NAME . "' 
										 id='"       . ConfigInfraTools::FIELD_TEAM_NAME . "' 
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