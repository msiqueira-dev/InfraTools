<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
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
<!-- FM_DEPARTMENT_LST_FORM -->
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
if(is_array($this->ArrayInstanceDepartment))
{
	echo "<form  name='" . ConfigInfraTools::FM_DEPARTMENT_LST_FORM . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FM_DEPARTMENT_LST_BACK . "' 
				  id='"    . ConfigInfraTools::FM_DEPARTMENT_LST_BACK . "'
				  value='" . ConfigInfraTools::FM_DEPARTMENT_LST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28x28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28x28Hover.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28x28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_INITIALS') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
	     <div  class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		 <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FM_DEPARTMENT_LST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FM_DEPARTMENT_LST_FORWARD . "'
				  value='" . ConfigInfraTools::FM_DEPARTMENT_LST_FORWARD . "'
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
	foreach($this->ArrayInstanceDepartment as $key=>$department)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FM_CORPORATION_SEL_SB . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FM_CORPORATION_SEL_SB . "' 
							 id='"     . ConfigInfraTools::FM_CORPORATION_SEL_SB . "'
							 value='"  . ConfigInfraTools::FM_CORPORATION_SEL_SB . "' />
						<input type='submit' name='" . ConfigInfraTools::FIELD_CORPORATION_NAME . "' 
										     id='"   . ConfigInfraTools::FIELD_CORPORATION_NAME . "' 
										     value='" . $department->GetDepartmentCorporationName() . "' 
										     title='" . $department->GetDepartmentCorporationName() . "' />
					</form>
				  </td>";
		echo "<td class='TableGenericTdLink'>
				  <label>" . $department->GetDepartmentInitials() . "</label> 
		      </td>";
		echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FM_DEPARTMENT_SEL_SB . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FM_DEPARTMENT_SEL_SB . "' 
							 id='"     . ConfigInfraTools::FM_DEPARTMENT_SEL_SB . "'
							 value='"  . ConfigInfraTools::FM_DEPARTMENT_SEL_SB . "' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FIELD_CORPORATION_NAME . "' 
							 id='"     . ConfigInfraTools::FIELD_CORPORATION_NAME . "'
							 value='"  . $department->GetDepartmentCorporationName() . "' />
						<input type='submit' name='" . ConfigInfraTools::FIELD_DEPARTMENT_NAME . "' 
										 id='"       . ConfigInfraTools::FIELD_DEPARTMENT_NAME . "' 
										 value='" . $department->GetDepartmentName() . "' 
										 title='" . $department->GetDepartmentName() . "' />
						</form>
				  </td>";
		echo "<td class='TableGenericTdLink'><label>" . $department->GetRegisterDate() . "</label></td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>