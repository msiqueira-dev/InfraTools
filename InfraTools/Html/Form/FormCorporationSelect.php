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
<!-- FORM CORPORATION SELECT -->
<form name="<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT; ?>" method="post" >
	<!-- CORPORATION NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('CORPORATION_NAME'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>"
						   class="<?php echo $this->ReturnCorporationNameClass; ?>"
						   onkeyup="ValidateCorporation(null, '<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>',
											 '');"
						   onblur="ValidateCorporation(null, '<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>',
											 '');"
						   onchange="ValidateCorporation(null, '<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('CORPORATION_NAME'); ?>" 
						   value="<?php echo $this->InputValueCorporationName; ?>" maxlength="45" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateCorporation(null, '<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>