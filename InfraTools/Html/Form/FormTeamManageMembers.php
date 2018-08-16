<!-- FORM MANAGE MEMBERS -->
<?php
if(is_array($this->ArrayTeamMembers))
{
	echo "<form  name='" . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS_BACK . "'
				  value='" . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('TEAM') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('EMAIL') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('TYPE') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('CORPORATION') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
	      <div  class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('DEPARTMENT') . "</div>" .
		 "<div class='TableGenericInputRight'>
		          <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS_FORWARD . "'
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
	foreach($this->ArrayTeamMembers as $key=>$user)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
				<form  name='" . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS . "' method='post' />
			  		<input type='hidden' name='" . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT . "' 
			  					   id='"   . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT . "' 
								   value='" . $this->InstanceTeam->GetTeamId() . "' />
		      		<input type='submit' name='" . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT_NAME . "' 
		                           id='"   . ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT_NAME . "' 
							       value='" . $this->InstanceTeam->GetTeamName() . "' 
								   title='" . $this->InstanceTeam->GetTeamName() . "' />
				</form>
		      </td>";
		echo "<td class='TableGenericTdLink'>
				<form  name='" . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS . "' method='post' />
		      		<input type='submit' name='" . ConfigInfraTools::FORM_USER_LIST_SELECT_SUBMIT . "' 
		                           id='"   . ConfigInfraTools::FORM_USER_LIST_SELECT_SUBMIT . "' 
							       value='" . $user->GetEmail() . "' title='" . $user->GetEmail() . "' />
				</form>
		      </td>";
		echo "<td>"     . $user->GetName()             . "</td>";
		echo "<td class='TableGenericTdLink'>
				<form  name='" . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS . "' method='post' />
		        	<input type='submit' name='" . ConfigInfraTools::FORM_TYPE_USER_LIST_SELECT . "' 
		                             id='"   . ConfigInfraTools::FORM_TYPE_USER_LIST_SELECT . "' 
							         value='" . $user->GetUserTypeDescription() . "' 
								     title='" . $user->GetUserTypeDescription() . "' />
					</form>
		      </td>";
		if($user->GetCorporationName() != NULL)
			echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS . "' method='post' />
						<input type='submit' name='" . ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_SELECT_CORPORATION . "' 
										 id='"   . ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_SELECT_CORPORATION . "' 
										 value='" . $user->GetCorporationName() . "' 
										 title='" . $user->GetCorporationName() . "' />
					</form>
				  </td>";
		else echo "<td>" . "<img src='" . $user->GetCorporationActiveIcon() . "'/>" . "</td>";
		if($user->GetDepartmentName() != NULL)
			echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FORM_TEAM_MANAGE_MEMBERS . "' method='post' />
						<input type='submit' name='" . ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS . "' 
										 id='"   . ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS . "' 
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
</form>
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))               echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTeamNameText))            echo $this->ReturnTeamNameText; ?>
		<?php if(isset($this->ReturnEmailText))               echo $this->ReturnEmailText; ?>
		<?php if(isset($this->ReturnTeamDescriptionText))     echo $this->ReturnTeamDescriptionText; ?>
		<?php if(isset($this->ReturnCorporationNameText))     echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnDepartmentNameText))      echo $this->ReturnDepartmentNameText; ?>
		<?php if(isset($this->ReturnEmailText))               echo $this->ReturnEmailText; ?>
		<?php if(isset($this->ReturnText))                    echo $this->ReturnText; ?>
	</label>
</div>