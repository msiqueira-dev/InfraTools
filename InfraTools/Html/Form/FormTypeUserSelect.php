<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))               echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeUserDescriptionText)) echo $this->ReturnTypeUserDescriptionText; ?>
		<?php if(isset($this->ReturnText))                    echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_TYPE_USER_SELECT_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_FORM; ?>" method="post" >
	<!-- TYPE_USER_ID -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TYPE_USER_DESCRIPTION'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION; ?>"
						   class="<?php echo $this->ReturnTypeUserDescriptionClass; ?>"
						   onkeyup="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											 '');"
						   onblur="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											 '');"
						   onchange="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TYPE_USER_DESCRIPTION'); ?>" 
						   value="<?php echo $this->InputValueTypeUserDescription; ?>" maxlength="45" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>