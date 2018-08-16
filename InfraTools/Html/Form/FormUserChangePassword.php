<!-- FORM USER CHANGE PASSWORD -->
<form name="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM; ?>" 
      id="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM; ?>" method="post">
    <!-- NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserName; ?></label>
        </div>
    </div>
    <!-- EMAIL -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('EMAIL').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserEmail; ?></label>
        </div>
    </div>
    <!-- BIRTH_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueBirthDateDay . " /"; ?></label>
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueBirthDateMonth . " /"; ?></label>
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueBirthDateYear; ?></label>
        </div>
    </div>
    <!-- GENDER -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('GENDER').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueGender; ?></label>
        </div>
    </div>
    <!-- CORPORATION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('CORPORATION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserCorporationName; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueCorporationActive; ?>" 
                       name="<?php echo ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
        </div>
    </div>
    <!-- ASSOC USER CORPORATION REGISTRATION DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTRATION_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueAssocUserCorporationRegistrationDate; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueAssocUserCorporationRegistrationDateActive; ?>" 
                       name="<?php echo ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
        </div>
    </div>
    <!-- ASSOC USER CORPORATION REGISTRATION ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTRATION_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueAssocUserCorporationRegistrationId; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueAssocUserCorporationRegistrationIdActive; ?>" 
                       name="<?php echo ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
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
    <!-- NEW PASSWORD -->
    <div class="DivContentBodyContainer">
        <div id="DivAccountChangePasswordNewPassword" class="DivContentBodyContainerLabelBig">
            <label> <?php echo $this->InstanceLanguageText->GetText('ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD'); ?> </label>
            <label class="RequiredField">&nbsp;*</label>
            <label>:</label>
            <div class="DivContentBodyContainerLabelTip">
                <label>
                    <?php echo $this->InstanceLanguageText->GetText('ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD_TIP'); ?>
                </label>
            </div>
        </div>
        <input type="password" name="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD; ?>"
                           id="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD; ?>"
                           class=" <?php echo $this->ReturnPasswordClass; ?>"
                           style="margin-right:0px !important;margin-left:23px;"
                           onblur="ValidatePassword(null, 
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '', false);
                                    ValidateMultiplyFields(
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '');"
                           onkeyup="ValidateMultiplyFields(
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '');"
                           onchange="ValidatePassword(null, 
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '', false);
                                     ValidateMultiplyFields(
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '');"
                           title="<?php echo $this->InstanceLanguageText->GetText('ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD_TITLE'); ?>" 
                           value="" maxlength="18" />
    </div>
    <!-- REPEAT PASSWORD -->
    <div class="DivContentBodyContainer">
        <div id="DivAccountChangePasswordRepeatPassword" class="DivContentBodyContainerLabelBig">
            <label> <?php echo $this->InstanceLanguageText->GetText('ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD'); ?> </label>
            <label class="RequiredField">&nbsp;*</label>
            <label>:</label>
            <div class="DivContentBodyContainerLabelTip">
                <label>
                    <?php echo $this->InstanceLanguageText->GetText('ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD_TIP'); ?>
                </label>
            </div>
        </div>
        <input type="password" name="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD; ?>" 
                           id="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD; ?>"
                           class="DivContentBodyContainerPassword <?php echo $this->ReturnPasswordClass; ?>"
                           style="margin-right:0px !important;margin-left:23px;"
                           onblur="ValidatePassword(null, 
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '', false);
                                    ValidateMultiplyFields(
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '');"
                           onkeyup="ValidateMultiplyFields(
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '');"
                           onchange="ValidatePassword(null, 
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '', false);
                                     ValidateMultiplyFields(
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                               '');"
                           title="<?php echo $this->InstanceLanguageText->GetText('ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD_TITLE'); ?>" 
                           value="" maxlength="18" />
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidatePassword(null, '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                   '', false);
                      ValidatePassword(null, '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                   '', false);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('ACCOUNT_CHANGE_PASSWORD_SUBMIT'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('ACCOUNT_CHANGE_PASSWORD_SUBMIT_CANCEL'); ?>" />
    </div>
</form>
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))    echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnPasswordText)) echo $this->ReturnPasswordText; ?>
		<?php if(isset($this->ReturnText))         echo $this->ReturnText; ?>
	</label>
</div>