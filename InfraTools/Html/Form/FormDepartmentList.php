<!-- FORM DEPARTMENT LIST -->
<?php
if(is_array($this->ArrayInstanceDepartment))
{
	echo "<form  name='" . ConfigInfraTools::FORM_DEPARTMENT_LIST . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FORM_DEPARTMENT_LIST_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_DEPARTMENT_LIST_BACK . "'
				  value='" . ConfigInfraTools::FORM_DEPARTMENT_LIST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('CORPORATION') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('DEPARTMENT_INITIALS') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('DEPARTMENT_NAME') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
	     <div  class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		 <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_DEPARTMENT_LIST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_DEPARTMENT_LIST_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_DEPARTMENT_LIST_FORWARD . "'
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
	foreach($this->ArrayInstanceDepartment as $key=>$department)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
				  <form  name='" . ConfigInfraTools::FORM_DEPARTMENT_LIST . "' method='post' />
					  <input type='submit'       
									   name='"  . ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION . "' 
									   id='"    . ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION . "' 
									   value='" . $department->GetDepartmentCorporationName() . "' 
									   title='" . $department->GetDepartmentCorporationName() . "'/>
				  </form>
		      </td>";
		echo "<td class='TableGenericTdLink'>
				  <label>" . $department->GetDepartmentInitials() . "</label> 
		      </td>";
		echo "<td class='TableGenericTdLink'>
				  <form  name='" . ConfigInfraTools::FORM_DEPARTMENT_LIST . "' method='post' />
					  <input type='hidden'
							 name='"   . ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION . "' 
							 id='"     . ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION . "'
							 value='"  . $department->GetDepartmentCorporationName()               . "' />
					  <input type='submit'       
									   name='"  . ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT . "'
									   id='"    . ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT . "'
									   value='" . $department->GetDepartmentName() . "' 
									   title='" . $department->GetDepartmentName() . "'/>
				  </form>
		      </td>";
		echo "<td class='TableGenericTdLink'><label>" . $department->GetRegisterDate() . "</label></td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))          echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnDepartmentNameText)) echo $this->ReturnDepartmentNameText; ?>
		<?php if(isset($this->ReturnText))               echo $this->ReturnText; ?>
	</label>
</div>