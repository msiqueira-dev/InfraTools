<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))               echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnServiceIdText))           echo $this->ReturnServiceIdText; ?>
		<?php if(isset($this->ReturnUserEmailText))           echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnCorporationNameText))     echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnDepartmentNameText))      echo $this->ReturnDepartmentNameText; ?>
		<?php if(isset($this->ReturnUserEmailText))           echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnText))                    echo $this->ReturnText; ?>
	</label>
</div>
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
<!-- FORM_SERVICE_VIEW_LIST_USERS_FORM -->
<?php
if(is_array($this->ArrayInstanceInfraToolsUser))
{
	echo "<form  name='" . ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_FORM . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_SUBMIT_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_SUBMIT_BACK . "'
				  value='" . ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_SUBMIT_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_ID') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('EMAIL') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('TYPE') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FORM_FIELD_CORPORATION_NAME') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
	      <div  class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('FORM_FIELD_DEPARTMENT_NAME') . "</div>" .
		 "<div class='TableGenericInputRight'>
		          <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_SUBMIT_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_SUBMIT_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_SUBMIT_FORWARD . "'
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
	foreach($this->ArrayInstanceInfraToolsUser as $key=>$user)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT . "' 
							 id='"     . ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT . "'
							 value='"  . ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT . "' />
						<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "' 
										 id='"       . ConfigInfraTools::FORM_FIELD_SERVICE_ID . "' 
										 value='" . $this->InstanceInfraToolsService->GetServiceId() . "' 
										 title='" . $this->InstanceInfraToolsService->GetServiceId() . "' />
						</form>
				  </td>";
		echo "<td class='TableGenericTdLink'>
				<form  name='" . ConfigInfraTools::FORM_USER_SELECT_SUBMIT . "' method='post' />
					<input type='hidden'
						   name='"   . ConfigInfraTools::FORM_USER_SELECT_SUBMIT . "' 
						   id='"     . ConfigInfraTools::FORM_USER_SELECT_SUBMIT . "'
						   value='"  . ConfigInfraTools::FORM_USER_SELECT_SUBMIT . "' />
		      		<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_USER_EMAIL . "' 
		                                 id='"   . ConfigInfraTools::FORM_FIELD_USER_EMAIL . "' 
							             value='" . $user->GetEmail() . "' title='" . $user->GetEmail() . "' />
				</form>
		      </td>";
		echo "<td>"     . $user->GetName()             . "</td>";
		echo "<td class='TableGenericTdLink'>
				<form  name='" . ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT . "' method='post' />
					<input type='hidden'
						   name='"   . ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT . "' 
						   id='"     . ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT . "'
						   value='"  . ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT . "' />
		        	<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION . "' 
		                                 id='"   . ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION . "' 
							             value='" . $user->GetUserTypeDescription() . "' 
								         title='" . $user->GetUserTypeDescription() . "' />
					</form>
		      </td>";
		if($user->GetCorporationName() != NULL)
			echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT . "' method='post' />
						<input type='hidden'
						       name='"   . ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT . "' 
						       id='"     . ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT . "'
						       value='"  . ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT . "' />
						<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_CORPORATION_NAME . "' 
										     id='"   . ConfigInfraTools::FORM_FIELD_CORPORATION_NAME . "' 
										     value='" . $user->GetCorporationName() . "' 
										     title='" . $user->GetCorporationName() . "' />
					</form>
				  </td>";
		else echo "<td>" . "<img src='" . $user->GetCorporationActiveIcon() . "'/>" . "</td>";
		if($user->GetDepartmentName() != NULL)
			echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT . "' 
							 id='"     . ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT . "'
							 value='"  . ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT . "' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FORM_FIELD_CORPORATION_NAME . "' 
							 id='"     . ConfigInfraTools::FORM_FIELD_CORPORATION_NAME . "'
							 value='"  . $user->GetCorporationName() . "' />
						<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME . "' 
										     id='"   . ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME . "' 
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