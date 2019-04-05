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
<!-- FM_NOTIFICATION_UPDT_FORM -->
<form name="<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_FORM; ?>" method="post">
    <!-- FIELD_NOTIFICATION_TEXT -->
    <div class="DivContentBodyContainerTextArea">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_TEXT').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <textarea name="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_TEXT; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_TEXT; ?>" 
                               class="DivContentBodyContainerValueTextArea <?php echo $this->ReturnNotificationTextClass; ?>"
                               onblur="ValidateDescription('DivContentBodyContainerValueTextArea', 
                                                   '<?php echo ConfigInfraTools::FIELD_NOTIFICATION_TEXT; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>',
                                                 '');"
                               onchange="ValidateDescription('DivContentBodyContainerValueTextArea', 
                                                   '<?php echo ConfigInfraTools::FIELD_NOTIFICATION_TEXT; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_TEXT'); ?>"
                               maxlength="500"><?php echo $this->InputValueNotificationText; ?></textarea>
        </div>
    </div>
    <!-- FIELD_NOTIFICATION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NOTIFICATION_ACTIVE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="checkbox" 
			           name="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ACTIVE; ?>" 
				       value="<?php echo ConfigInfraTools::FIELD_NOTIFICATION_ACTIVE; ?>"
				        <?php echo $this->InputValueNotificationActive; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_FORM; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>',
									   '');"
				        />
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDescription('DivContentBodyContainerValueTextArea', 
							       '<?php echo ConfigInfraTools::FIELD_NOTIFICATION_TEXT; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_SB; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_NOTIFICATION_UPDT_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>