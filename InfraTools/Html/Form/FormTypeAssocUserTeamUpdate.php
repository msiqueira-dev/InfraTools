<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))                        echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeAssocUserTeamDescriptionText)) echo $this->ReturnTypeAssocUserTeamDescriptionText; ?>
		<?php if(isset($this->ReturnText))                             echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_TYPE_ASSOC_USER_TEAM_UPDT_FORM -->
<form name="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_FORM; ?>" method="post">
    <!-- TYPE_ASSOC_USER_TEAM_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('TYPE_ASSOC_USER_TEAM_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>" 
                               class="<?php echo $this->ReturnTypeAssocUserTeamDescriptionClass; ?>"
                               onblur="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB; ?>',
                                                 '');"
                               onchange="ValidateDescription(null, 
                                                 '<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB; ?>',
                                                 '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('TYPE_ASSOC_USER_TEAM_DESCRIPTION'); ?>"
                               value="<?php echo $this->InputValueTypeAssocUserTeamDescription; ?>" maxlength="120" />
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
							       '<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_SB; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_UPDT_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>