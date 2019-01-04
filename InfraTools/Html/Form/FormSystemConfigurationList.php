<!-- FORM_SYSTEM_CONFIGURATION_LIST_FORM -->
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
<?php
if(is_array($this->ArrayInstanceSystemConfiguration))
{
	echo "<form  name='" . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST_FORM . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST_FORM_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST_FORM_BACK . "'
				  value='" . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST_FORM_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE') . "</th>";
	echo "<th  class='TableGenericThArrow'>
	     <div  class='TableGenericThLeft'>"  . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		  <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST_FORM_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST_FORM_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST_FORM_FORWARD . "'
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
	foreach($this->ArrayInstanceSystemConfiguration as $key=>$systemConfiguration)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
				<form  name='" . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "' method='post' />
					<input type='hidden'
							 name='"   . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "' 
							 id='"     . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "'
							 value='"  . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "' />
		      		<input type='hidden'
							 name='"   . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "' 
							 id='"     . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "'
							 value='"  . $systemConfiguration->GetSystemConfigurationOptionNumber() . "' />
					  <input type='submit' name='" . ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER . "' 
		                           id='"   . ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER . "' 
							       value='" . $systemConfiguration->GetSystemConfigurationOptionNumber() . "' 
								   title='" . $systemConfiguration->GetSystemConfigurationOptionNumber() . "' />
				</form>
		      </td>";
		echo "<td class='TableGenericTdLink'>
				<form  name='" . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "' method='post' />
					  <input type='hidden'
							 name='"   . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "' 
							 id='"     . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "'
							 value='"  . ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT . "' />
					  <input type='hidden'
							 name='"   . ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER . "' 
							 id='"     . ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER . "'
							 value='"  . $systemConfiguration->GetSystemConfigurationOptionNumber() . "' />
					  <input type='submit' name='" . ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME . "' 
		                           id='"   . ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME . "' 
							       value='" . $systemConfiguration->GetSystemConfigurationOptionName() . "' 
								   title='" . $systemConfiguration->GetSystemConfigurationOptionName() . "' />
				</form>
		      </td>";
		echo "<td class='TableGenericTdLink'>";
		if($systemConfiguration->GetSystemConfigurationOptionActive())
			echo "<img src='" . $this->Config->DefaultServerImage . "Icons/IconInfraToolsVerified.png'
			           'alt='SystemConfigurationOptionActive' width='20' height='20' />" . "</td>";
		else echo "<img src='" . $this->Config->DefaultServerImage . "Icons/IconInfraToolsNotVerified.png' 
			           'alt='SystemConfigurationOptionActive' width='20' height='20' />" . "</td>";
		if($systemConfiguration->GetSystemConfigurationOptionValue() != NULL)
			echo "<td class= 'TableGenericTdLink'>" . $systemConfiguration->GetSystemConfigurationOptionValue() . "</td>";
		else echo "<td class= 'TableGenericTdLink'>" .  $this->InstanceLanguageText->GetText('NULL_EMPTY') . "</td>";
		echo "<td class= 'TableGenericTdLink'>" . $systemConfiguration->GetRegisterDate() . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</form>