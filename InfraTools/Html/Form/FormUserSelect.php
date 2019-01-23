<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->EmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnUserEmailText)) echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnText))          echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM USER SELECT -->
<form name="<?php echo ConfigInfraTools::FORM_USER_SELECT_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_USER_SELECT_FORM; ?>" method="post" >
	<!-- SELECT_EMAIL -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_EMAIL'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>"
						   class="<?php echo $this->ReturnUserEmailClass; ?>"
						   onkeyup="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_SELECT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>',
											 '');"
						   onblur="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_SELECT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>',
											 '');"
						   onchange="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_SELECT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_EMAIL'); ?>" 
						   value="<?php echo $this->InputValueUserEmail; ?>" maxlength="60" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_USER_SELECT_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_USER_SELECT_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>