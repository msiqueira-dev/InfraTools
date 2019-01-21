<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))              echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnNotificationActiveText)) echo $this->ReturnNotificationActiveText; ?>
		<?php if(isset($this->ReturnNotificationTextText))   echo $this->ReturnNotificationTextText; ?>
		<?php if(isset($this->ReturnText))                   echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_NOTIFICATION_REGISTER_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_FORM; ?>" method="post">
    <!-- FORM_FIELD_NOTIFICATION_TEXT -->
    <div class="DivContentBodyContainerTextArea">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_NOTIFICATION_TEXT').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <textarea name="<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_TEXT; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_TEXT; ?>" 
                               class="DivContentBodyContainerValueTextArea <?php echo $this->ReturnNotificationTextClass; ?>"
                               onblur="ValidateDescription('DivContentBodyContainerValueTextArea', 
                                                   '<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_TEXT; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDescription(DivContentBodyContainerValueTextArea, 
                                                   '<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_TEXT; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_NOTIFICATION_TEXT'); ?>"
                               value="<?php echo $this->InputValueNotificationText; ?>" maxlength="500"></textarea>
        </div>
    </div>
    <!-- FORM_FIELD_NOTIFICATION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_NOTIFICATION_ACTIVE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="checkbox" 
			           name="<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_ACTIVE; ?>" 
				       value="<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_ACTIVE; ?>"
				        <?php echo $this->InputValueNotificationActive; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_FORM; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>',
									   '');"
				        />
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDescription('DivContentBodyContainerValueTextArea', 
							       '<?php echo ConfigInfraTools::FORM_FIELD_NOTIFICATION_TEXT; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_REGISTER_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>