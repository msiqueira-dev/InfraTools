<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))                       echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeStatusTicketDescriptionText)) echo $this->ReturnTypeStatusTicketDescriptionText; ?>
		<?php if(isset($this->ReturnText))                            echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_TYPE_STATUS_TICKET_UPDATE_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_FORM; ?>" method="post">
    <!-- FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION; ?>" 
                               class="<?php echo $this->ReturnTypeStatusTicketDescriptionClass; ?>"
                               onblur="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION'); ?>"
                               value="<?php echo $this->InputValueTypeStatusTicketDescription; ?>" maxlength="45" />
        </div>
    </div>
    <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTER_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegisterDate; ?></label>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDescription(null, 
							       '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>