<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCorporationNameText)) echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM CORPORATION LIST -->
<form name="<?php echo ConfigInfraTools::FORM_CORPORATION_LIST; ?>"
      id="<?php echo ConfigInfraTools::FORM_CORPORATION_LIST; ?>" method="post" >
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
if(is_array($this->ArrayInstanceInfraToolsCorporation))
{
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
				  name='"  . ConfigInfraTools::FORM_CORPORATION_LIST_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_CORPORATION_LIST_BACK . "'
				  value='" . ConfigInfraTools::FORM_CORPORATION_LIST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('ACTIVE') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('NAME') . "</th>";
	echo "<th  class='TableGenericThArrow'>
	     <div  class='TableGenericThLeft'>"  . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		  <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_CORPORATION_LIST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_CORPORATION_LIST_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_CORPORATION_LIST_FORWARD . "'
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
	foreach($this->ArrayInstanceInfraToolsCorporation as $key=>$corporation)
	{
		echo "<tr>";
		echo "<td> 
				<img   src='"   . $corporation->GetCorporationActiveImage() . "' 
                       alt='CorporationVerification' width='20' height='20' />
			 </td>";
		echo "<td class='TableGenericTdLink'>
					<form  name='" . ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT . "' 
							 id='"     . ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT . "'
							 value='"  . ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT . "' />
						<input type='submit' name='" . ConfigInfraTools::FORM_FIELD_CORPORATION_NAME . "' 
										     id='"   . ConfigInfraTools::FORM_FIELD_CORPORATION_NAME . "' 
										     value='" . $corporation->GetCorporationName() . "' 
										     title='" . $corporation->GetCorporationName() . "' />
					</form>
				  </td>";
		echo "<td>" . $corporation->GetRegisterDate() . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</form>