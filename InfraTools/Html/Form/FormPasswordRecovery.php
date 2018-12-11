<!-- FORM PASSWORD RECOVERY -->
<form name="<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM; ?>" method="post" >
	<!-- E-MAIL -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('EMAIL'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>"
						   class="<?php echo $this->ReturnUserEmailClass; ?>"
						   onkeyup="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											   '', true);
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											 '');"
						   onblur="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											 '');"
						   onclick="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('EMAIL'); ?>" 
						   value="<?php echo $this->InputValueUserEmail; ?>" maxlength="60" />
	</div>
	<!-- CAPTCHA -->
	<div class="DivContentBodyContainerCaptcha">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('PASSWORD_RECOVERY_TEXT_CAPTCHA'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_CAPTCHA; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_CAPTCHA; ?>"
						   class="<?php echo $this->ReturnCaptchaClass; ?>"
						   title="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RECOVERY_TEXT_CAPTCHA'); ?>" 
						   onblur="ValidateHasCharacters(null, 
											 '<?php echo ConfigInfraTools::FORM_FIELD_CAPTCHA; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											 '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateHasCharacters(null, 
											 '<?php echo ConfigInfraTools::FORM_FIELD_CAPTCHA; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											 '', false);
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											 '');"
						   onchange="ValidateHasCharacters(null, 
											 '<?php echo ConfigInfraTools::FORM_FIELD_CAPTCHA; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											 '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
											 '');"
						   value="<?php echo $this->InputValueCaptcha; ?>" maxlength="8" />
		<img src="<?php echo REL_PATH . "Captcha/" . ConfigInfraTools::FORM_FIELD_CAPTCHA ?>" 
			 id="PasswordRecoveryCapcha" alt="Captcha" 
			 class="DivContentBodyContainerCaptchaImage" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer"
		 onmouseover="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
								   '', true);
					  ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::PASSWORD_RECOVERY_FORM_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RECOVERY_TEXT_SEND'); ?>"
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
		<?php if(isset($this->ReturnEmptyText))     echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnUserEmailText)) echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnCaptchaText)) echo $this->ReturnCaptchaText; ?>
		<?php if(isset($this->ReturnText))        echo $this->ReturnText; ?>
	</label>
</div>