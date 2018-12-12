<!-- FORM TYPE TICKET SELECT -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT; ?>" method="post" >
	<!-- FORM_FIELD_TYPE_TICKET_DESCRIPTION -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('TYPE_TICKET_DESCRIPTION'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION; ?>"
						   class="<?php echo $this->ReturnTypeTicketDescriptionClass; ?>"
						   onkeyup="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>',
											 '');"
						   onblur="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>',
											 '');"
						   onchange="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('TYPE_TICKET_DESCRIPTION'); ?>" 
						   value="<?php echo $this->InputValueTypeTicketDescription; ?>" maxlength="45" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT; ?>"
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
		<?php if(isset($this->ReturnEmptyText))                 echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeTicketDescriptionText)) echo $this->ReturnTypeTicketDescriptionText; ?>
		<?php if(isset($this->ReturnText))                      echo $this->ReturnText; ?>
	</label>
</div>