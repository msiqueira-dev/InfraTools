<!-- FORM TYPE_SERVICE_REGISTER -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER; ?>" method="post">
    <!-- TYPE_SERVICE_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('TYPE_SERVICE_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_DESCRIPTION; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_DESCRIPTION; ?>" 
                               class="<?php echo $this->ReturnTypeServiceNameClass; ?>"
                               onblur="ValidateDescription(null, 
                                                   '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_DESCRIPTION; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDescription(null, 
                                                   '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_DESCRIPTION; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('TYPE_SERVICE_NAME'); ?>"
                               value="<?php echo $this->InputValueTypeServiceName; ?>" maxlength="45" />
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_DESCRIPTION; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeServiceNameText)) echo $this->ReturnTypeServiceNameText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>