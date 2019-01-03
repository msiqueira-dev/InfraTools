<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
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
<!-- FORM_SYSTEM_CONFIGURATION_REGISTER -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_REGISTER; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_REGISTER; ?>" method="post">
    <!-- FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('SYSTEM_CONFIGURATION_OPTION_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>" 
                               class="<?php echo $this->ReturnSystemConfigurationOptionDescriptionClass; ?>"
                               onblur="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('SYSTEM_CONFIGURATION_OPTION_DESCRIPTION'); ?>"
                               value="<?php echo $this->InputValueSystemConfigurationOptionDescription; ?>" maxlength="100" />
        </div>
    </div>
    <!-- FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACITVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('ACTIVE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="checkbox" 
			           name="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACITVE; ?>" 
				       value="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACITVE; ?>"
				        <?php echo $this->InputValueCorporationActive; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>',
									   '');"
				        />
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDescription(null, 
							       '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>