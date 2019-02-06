<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
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
<!-- FORM PASSWORD RESET -->
<form name="<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>" 
	  id="<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>" method="post" >
	<!-- E-MAIL -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL').":"; ?> </label>
		</div>
		<label class="DivContentBodyContainerLabelValue"> <?php echo $this->InputValueUserEmail; ?> </label>
	</div>
	<!-- CODE -->
	<div class="DivClearFloat"></div>
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_CODE').":"; ?> </label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_PASSWORD_RESET_CODE; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_PASSWORD_RESET_CODE; ?>"
						   class="<?php echo $this->ReturnCodeClass; ?>"
						   title="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_CODE'); ?>" 
						   onblur="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FIELD_PASSWORD_RESET_CODE; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '');"
						   onkeyup="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FIELD_PASSWORD_RESET_CODE; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '', false);
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '');"
						   onchange="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FIELD_PASSWORD_RESET_CODE; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '', false);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
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
		<input type="password" name="<?php echo ConfigInfraTools::FIELD_PASSWORD_NEW; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_PASSWORD_NEW; ?>"
						   class="<?php echo $this->ReturnPasswordClass; ?>"
						   onblur="ValidatePassword(null, '<?php echo ConfigInfraTools::FIELD_PASSWORD_NEW; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
												   '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '');"
						   onchange="ValidatePassword(null, '<?php echo ConfigInfraTools::FIELD_PASSWORD_NEW; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
												   '', false);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
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
		<input type="password" name="<?php echo ConfigInfraTools::FIELD_PASSWORD_REPEAT; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_PASSWORD_REPEAT; ?>"
						   class="<?php echo $this->ReturnPasswordClass; ?>"
						   onblur="ValidatePassword(null, '<?php echo ConfigInfraTools::FIELD_PASSWORD_REPEAT; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
												   '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '');"
						   onchange="ValidatePassword(null, '<?php echo ConfigInfraTools::FIELD_PASSWORD_REPEAT; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
												   '', false);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_REPEAT_PASSWORD'); ?>" 
						   value="" maxlength="18" />
	</div>
	<div class="DivClearFloat"></div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer"
		 onmouseover="ValidatePassword(null, '<?php echo ConfigInfraTools::FIELD_PASSWORD_NEW; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
								   '', false);
					  ValidatePassword(null, '<?php echo ConfigInfraTools::FIELD_PASSWORD_REPEAT; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
								   '', false);       
					  ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_PASSWORD_RESET; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_PASSWORD_RESET_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('PASSWORD_RESET_TEXT_SEND'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>