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
<!-- FM_CORPORATION_REGISTER_FORM -->
<form name="<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_FORM; ?>" method="post">
    <!-- FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>" 
                               class="<?php echo $this->ReturnCorporationNameClass; ?>"
                               onblur="ValidateCorporation(null, '<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>',
                                                 '');"
                               onchange="ValidateCorporation(null, '<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME'); ?>"
                               value="<?php echo $this->InputValueCorporationName; ?>" maxlength="80" />
        </div>
    </div>
    <!-- FIELD_CORPORATION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('ACTIVE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="checkbox" 
			           name="<?php echo ConfigInfraTools::FIELD_CORPORATION_ACTIVE; ?>" 
				       value="<?php echo ConfigInfraTools::FIELD_CORPORATION_ACTIVE; ?>"
				        <?php echo $this->InputValueCorporationActive; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_FORM; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>',
									   '');"
				        />
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateCorporation(null, '<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_SB; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_CORPORATION_REGISTER_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>