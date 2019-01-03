<!-- FORM COUNTRY LIST -->
<form name="<?php echo ConfigInfraTools::FORM_COUNTRY_LIST; ?>"
      id="<?php echo ConfigInfraTools::FORM_COUNTRY_LIST; ?>" method="post" >
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
	if(is_array($this->ArrayInstanceCountry))
	{
		echo "<input type='hidden' value='$this->InputLimitOne' 
					 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE . "'
					 id='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE . "'/>";
		echo "<input type='hidden' value='$this->InputLimitTwo'
					 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO . "'
					 id='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO . "'/>";
		echo "<table class='TableCountry'>";
		echo "<tr>";
		echo "<th>" .
			 "<input  type='image'
					  class='TableCountryInputRight'
					  name='"  . ConfigInfraTools::FORM_COUNTRY_LIST_BACK . "' 
					  id='"    . ConfigInfraTools::FORM_COUNTRY_LIST_BACK . "'
					  value='" . ConfigInfraTools::FORM_COUNTRY_LIST_BACK . "'
					  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
					  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
					  src='"   . $this->Config->DefaultServerImage 
							   . "Icons/IconInfraToolsArrowBack28.png'
					  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowBackHover28.png'\"
					  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
							   . "Icons/IconInfraToolsArrowBack28.png'\" />" .
			 "<div class='TableCountryThRight'>" . $this->InstanceLanguageText->GetText('NAME') . "</div></th>";
		echo "<th>" . $this->InstanceLanguageText->GetText('COUNTRY_ABBREVIATION') . "</th>";
		echo "<th>" . $this->InstanceLanguageText->GetText('REGION_CODE') . "</th>";
		echo "<th><div class='TableCountryThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
			 "<input  type='image'
					  class='TableCountryInputLeft'
					  name='"  . ConfigInfraTools::FORM_COUNTRY_LIST_FORWARD . "' 
					  id='"    . ConfigInfraTools::FORM_COUNTRY_LIST_FORWARD . "'
					  value='" . ConfigInfraTools::FORM_COUNTRY_LIST_FORWARD . "'
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
		foreach($this->ArrayInstanceCountry as $key=>$country)
		{
			echo "<tr>";
			echo "<td>" . $country->GetCountryName()          . "</td>";
			echo "<td>" . $country->GetCountryAbbreviation()  . "</td>";
			echo "<td>" . $country->GetRegionCode()           . "</td>";
			echo "<td>" . $country->GetRegisterDate()         . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
</form>