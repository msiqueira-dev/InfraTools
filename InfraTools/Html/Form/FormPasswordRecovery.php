<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
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
<!-- FORM PASSWORD RECOVERY -->
<form name="<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY; ?>" 
	  id="<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY; ?>" method="post" >
	<!-- E-MAIL -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>"
						   class="<?php echo $this->ReturnUserEmailClass; ?>"
						   onkeyup="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											   '', true);
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											 '');"
						   onblur="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											 '');"
						   onclick="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL'); ?>" 
						   value="<?php echo $this->InputValueUserEmail; ?>" maxlength="60" />
	</div>
	<!-- CAPTCHA -->
	<div class="DivContentBodyContainerCaptcha">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('PASSWORD_RECOVERY_TEXT_CAPTCHA'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_CAPTCHA; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_CAPTCHA; ?>"
						   class="<?php echo $this->ReturnCaptchaClass; ?>"
						   title="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RECOVERY_TEXT_CAPTCHA'); ?>" 
						   onblur="ValidateHasCharacters(null, 
											 '<?php echo ConfigInfraTools::FIELD_CAPTCHA; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											 '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											 '');"
						   onkeyup="ValidateHasCharacters(null, 
											 '<?php echo ConfigInfraTools::FIELD_CAPTCHA; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											 '', false);
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											 '');"
						   onchange="ValidateHasCharacters(null, 
											 '<?php echo ConfigInfraTools::FIELD_CAPTCHA; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											 '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
											 '');"
						   value="<?php echo $this->InputValueCaptcha; ?>" maxlength="8" />
		<img src="<?php echo REL_PATH . "Captcha/" . ConfigInfraTools::FIELD_CAPTCHA ?>" 
			 id="PasswordRecoveryCapcha" alt="Captcha" 
			 class="DivContentBodyContainerCaptchaImage" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer"
		 onmouseover="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
								   '', true);
					  ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_PASSWORD_RECOVERY_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEND'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>