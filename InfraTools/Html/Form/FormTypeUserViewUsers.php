<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass))  echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage))  echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))               echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTeamNameText))            echo $this->ReturnTeamNameText; ?>
		<?php if(isset($this->ReturnUserEmailText))           echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnTypeUserDescriptionText)) echo $this->ReturnTypeUserDescriptionText; ?>
		<?php if(isset($this->ReturnCorporationNameText))     echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnDepartmentNameText))      echo $this->ReturnDepartmentNameText; ?>
		<?php if(isset($this->ReturnUserEmailText))           echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnText))                    echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM TYPE_USER_VIEW_USERS -->
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
if(is_array($this->ArrayInstanceInfraToolsUser))
{
	echo "<form  name='" . ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_BACK . "' 
				  id='"    . ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_BACK . "'
				  value='" . ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28x28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28x28Hover.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrow28x28Back.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_USER_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_USER_TYPE') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
	      <div  class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME') . "</div>" .
		 "<div class='TableGenericInputRight'>
		          <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_FORWARD . "' 
				  id='"    . ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_FORWARD . "'
				  value='" . ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS_FORWARD . "'
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
</form>