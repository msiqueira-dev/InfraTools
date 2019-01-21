<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))          echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnNotificationIdText)) echo $this->ReturnNotificationIdText; ?>
		<?php if(isset($this->ReturnText))               echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_NOTIFICATION_SELECT_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_FORM; ?>" method="post" >
	<!-- FORM_FIELD_NOTIFICATION_ID -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_NOTIFICATION_ID'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_ID; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_ID; ?>"
						   class="DivContentBodyContainerInputText <?php echo $this->ReturnCorporationNameClass; ?>"
						   onkeyup="ValidateNumberOnly('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>',
											 '');"
						   onblur="ValidateNumberOnly('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>',
											 '');"
						   onchange="ValidateNumberOnly('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_NOTIFICATION_ID'); ?>" 
						   value="<?php echo $this->InputValueNotificationId; ?>" maxlength="5" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateNumbersOnly('DivContentBodyContainerInputText', 
							       '<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_ID; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_SELECT_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>