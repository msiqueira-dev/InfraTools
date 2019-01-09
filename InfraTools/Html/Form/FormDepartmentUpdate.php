<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))              echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnDepartmentInitialsText)) echo $this->ReturnDepartmentInitialsText; ?>
		<?php if(isset($this->ReturnDepartmentNameText))     echo $this->ReturnDepartmentNameText; ?>
		<?php if(isset($this->ReturnText))                   echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM DEPARTMENT UPDATE -->
<form name="<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_FORM; ?>" method="post">
    <!-- CORPORATION NAME -->
    <div class="DivContentBodyContainer">
       <div class="DivContentBodyContainerLabel">
           <label><?php echo $this->InstanceLanguageText->GetText('CORPORATION_NAME').":"; ?></label>
       </div>
       <div class="DivContentBodyContainerValue">
           <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueCorporationName; ?></label>
       </div>
    </div>
    <!-- DEPARTMENT_INITIALS -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_INITIALS').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS; ?>" 
                               class="<?php echo $this->ReturnDepartmentInitialsClass; ?>"
                               onblur="ValidateDepartmentInitials(null, 
                                                  '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDepartmentInitials(null, 
                                                  '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_INITIALS'); ?>"
                               value="<?php echo $this->InputValueDepartmentInitials; ?>" maxlength="80" />
        </div>
    </div>
    <!-- DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>" 
                               id="<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>" 
                               class="<?php echo $this->ReturnDepartmentNameClass; ?>"
                               onblur="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_NAME'); ?>"
                               value="<?php echo $this->InputValueDepartmentName; ?>" maxlength="80" />
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
         onmouseover="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_DEPARTMENT_UPDATE_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>