<!-- FORM PASSWORD RESET -->
<form name="<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>" method="post" >
	<!-- E-MAIL -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('EMAIL').":"; ?> </label>
		</div>
		<label class="DivContentBodyContainerLabelValue"> <?php echo $this->InputValueUserEmail; ?> </label>
	</div>
	<!-- CODE -->
	<div class="DivClearFloat"></div>
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_CODE').":"; ?> </label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE; ?>"
						   class="<?php echo $this->ReturnCodeClass; ?>"
						   title="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_CODE'); ?>" 
						   onblur="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '', false);
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '');"
						   onchange="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_RESET_CODE; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '', false);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '');"
						   value="<?php echo $this->InputValueCode; ?>" maxlength="16" />
	</div>
	<div class="DivClearFloat"></div>
	<!-- NEW PASSWORD -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label> <?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_NEW_PASSWORD'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_NEW_PASSWORD_TIP'); ?>
				</label>
			</div>
		</div>
		<input type="password" name="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>"
						   class="<?php echo $this->ReturnPasswordClass; ?>"
						   onblur="ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
												   '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '');"
						   onchange="ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
												   '', false);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_NEW_PASSWORD'); ?>" 
						   value="" maxlength="18" />
	</div>
	<div class="DivClearFloat"></div>
	<!-- REPEAT PASSWORD -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label> <?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_REPEAT_PASSWORD'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_REPEAT_PASSWORD_TIP'); ?>
				</label>
			</div>
		</div>
		<input type="password" name="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>"
						   class="<?php echo $this->ReturnPasswordClass; ?>"
						   onblur="ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
												   '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '');"
						   onchange="ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
												   '', false);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_REPEAT_PASSWORD'); ?>" 
						   value="" maxlength="18" />
	</div>
	<div class="DivClearFloat"></div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer"
		 onmouseover="ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
								   '', false);
					  ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
								   '', false);       
					  ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::PASSWORD_RESET_FORM_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_SEND'); ?>"
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
		<?php if(isset($this->ReturnEmptyText))    echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCodeText))     echo $this->ReturnCodeText; ?>
		<?php if(isset($this->ReturnPasswordText)) echo $this->ReturnPasswordText; ?>
		<?php if(isset($this->ReturnText))         echo $this->ReturnText; ?>
	</label>
</div>