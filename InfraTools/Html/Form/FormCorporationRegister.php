<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCorporationActiveText)) echo $this->ReturnCorporationActiveText; ?>
		<?php if(isset($this->ReturnCorporationNameText)) echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_CORPORATION_REGISTER_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_FORM; ?>" method="post">
    <!-- FORM_FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_CORPORATION_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>" 
                               class="<?php echo $this->ReturnCorporationNameClass; ?>"
                               onblur="ValidateCorporation(null, '<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateCorporation(null, '<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_CORPORATION_NAME'); ?>"
                               value="<?php echo $this->InputValueCorporationName; ?>" maxlength="80" />
        </div>
    </div>
    <!-- FORM_FIELD_CORPORATION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('ACTIVE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="checkbox" 
			           name="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_ACTIVE; ?>" 
				       value="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_ACTIVE; ?>"
				        <?php echo $this->InputValueCorporationActive; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_FORM; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>',
									   '');"
				        />
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateCorporation(null, '<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>