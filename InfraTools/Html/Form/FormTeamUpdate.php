<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTeamNameText))        echo $this->ReturnTeamNameText; ?>
		<?php if(isset($this->ReturnTeamDescriptionText)) echo $this->ReturnTeamDescriptionText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_TEAM_UPDATE_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_FORM; ?>" method="post">
    <!-- FORM_FIELD_TEAM_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
        	<label><?php echo $this->InputValueTeamId; ?></label>
		</div>
	</div>
   <!-- FORM_FIELD_TEAM_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>" 
                               class="<?php echo $this->ReturnTeamNameClass; ?>"
                               onblur="ValidateTeamName(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateTeamName(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_NAME'); ?>"
                               value="<?php echo $this->InputValueTeamName; ?>" maxlength="45" />
        </div>
    </div>
    <!-- FORM_FIELD_TEAM_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION; ?>" 
                               class="<?php echo $this->ReturnTeamDescriptionClass; ?>"
                               onblur="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_DESCRIPTION'); ?>"
                               value="<?php echo $this->InputValueTeamDescription; ?>" maxlength="120" />
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
         onmouseover="ValidateTeamName(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_TEAM_REGISTER_SUBMIT; ?>',
								   '', true);
					  ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_TEAM_UPDATE_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>