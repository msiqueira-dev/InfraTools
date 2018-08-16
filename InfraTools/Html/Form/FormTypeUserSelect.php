<!-- FORM TYPE_USER_SELECT -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT; ?>" method="post" >
	<!-- TYPE_USER_ID -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('TYPE_USER_ID'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_ID; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_ID; ?>"
						   class="<?php echo $this->ReturnTypeUserClass; ?>"
						   onkeyup="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											 '');"
						   onblur="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											 '');"
						   onchange="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('EMAIL'); ?>" 
						   value="<?php echo $this->InputValueTypeUserId; ?>" maxlength="45" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_USER_ID; ?>',
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
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))      echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeUserIdText)) echo $this->ReturnTypeUserIdText; ?>
		<?php if(isset($this->ReturnText))           echo $this->ReturnText; ?>
	</label>
</div>