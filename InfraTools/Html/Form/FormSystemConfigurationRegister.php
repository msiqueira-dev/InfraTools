<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))                                echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnSystemConfigurationOptionActiveText))      echo $this->ReturnSystemConfigurationOptionActiveText; ?>
		<?php if(isset($this->ReturnSystemConfigurationOptionDescriptionText)) echo $this->ReturnSystemConfigurationOptionDescriptionText; ?>
		<?php if(isset($this->ReturnSystemConfigurationOptionNameText))        echo $this->ReturnSystemConfigurationOptionNameText; ?>
		<?php if(isset($this->ReturnSystemConfigurationOptionValueText))       echo $this->ReturnSystemConfigurationOptionValueText; ?>
		<?php if(isset($this->ReturnText))                                     echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_SYSTEM_CONFIGURATION_REGISTER_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>" method="post">
    <!-- FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?></label>
            <label class="RequiredField">&nbsp;*</label>
			<label>:</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>" 
                               class="<?php echo $this->ReturnSystemConfigurationOptionNameClass; ?>"
                               onblur="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?>"
                               value="<?php echo $this->InputValueSystemConfigurationOptionName; ?>" maxlength="45" />
        </div>
    </div>
    <!-- FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION'); ?></label>
            <label class="RequiredField">&nbsp;*</label>
			<label>:</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>" 
                               class="<?php echo $this->ReturnSystemConfigurationOptionDescriptionClass; ?>"
                               onblur="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION'); ?>"
                               value="<?php echo $this->InputValueSystemConfigurationOptionDescription; ?>" maxlength="100" />
        </div>
    </div>
    <!-- FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE')." :"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE; ?>" 
                               class="<?php echo ConfigInfraTools::FORM_FIELD_NOT_OBLIGATORY . ' ' .  
	                                             $this->ReturnSystemConfigurationOptionValueClass; ?>"
                               onblur="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE'); ?>"
                               value="<?php echo $this->InputValueSystemConfigurationOptionValue; ?>" maxlength="45" />
        </div>
    </div>
    <!-- FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE'); ?></label>
            <label class="RequiredField">&nbsp;*</label>
			<label>:</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="checkbox" 
			           name="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE; ?>" 
				       value="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE; ?>"
				        <?php echo $this->InputValueCorporationActive; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
									   '');"
				        />
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDescription(null, 
							       '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER_FORM_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>