<!-- FM_CORPORATION_LST_FORM -->
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
if(is_array($this->ArrayInstanceInfraToolsCorporation))
{
	echo "<form  name='" . ConfigInfraTools::FM_CORPORATION_LST_FORM . "' method='post' />";
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
				  name='"  . ConfigInfraTools::FM_CORPORATION_LST_BACK . "' 
				  id='"    . ConfigInfraTools::FM_CORPORATION_LST_BACK . "'
				  value='" . ConfigInfraTools::FM_CORPORATION_LST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FIELD_CORPORATION_ACTIVE') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME') . "</th>";
	echo "<th  class='TableGenericThArrow'>
	     <div  class='TableGenericThLeft'>"  . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		  <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FM_CORPORATION_LST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FM_CORPORATION_LST_FORWARD . "'
				  value='" . ConfigInfraTools::FM_CORPORATION_LST_FORWARD . "'
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
					<form  name='" . ConfigInfraTools::FM_CORPORATION_SEL_SB . "' method='post' />
						<input type='hidden'
							 name='"   . ConfigInfraTools::FM_CORPORATION_SEL_SB . "' 
							 id='"     . ConfigInfraTools::FM_CORPORATION_SEL_SB . "'
							 value='"  . ConfigInfraTools::FM_CORPORATION_SEL_SB . "' />
						<input type='submit' name='" . ConfigInfraTools::FIELD_CORPORATION_NAME . "' 
										     id='"   . ConfigInfraTools::FIELD_CORPORATION_NAME . "' 
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