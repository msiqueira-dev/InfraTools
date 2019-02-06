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
<!-- FM_NOTIFICATION_SEL_FORM -->
<form name="<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_FORM; ?>" method="post" >
	<!-- FIELD_NOTIFICATION_ID -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ID'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ID; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ID; ?>"
						   class="DivContentBodyContainerInputText <?php echo $this->ReturnCorporationNameClass; ?>"
						   onkeyup="ValidateNumberOnly('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>',
											 '');"
						   onblur="ValidateNumberOnly('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>',
											 '');"
						   onchange="ValidateNumberOnly('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ID'); ?>" 
						   value="<?php echo $this->InputValueNotificationId; ?>" maxlength="5" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateNumbersOnly('DivContentBodyContainerInputText', 
							       '<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ID; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>