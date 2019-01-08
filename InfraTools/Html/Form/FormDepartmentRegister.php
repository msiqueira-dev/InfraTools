<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))              echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCorporationNameText))    echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnDepartmentInitialsText)) echo $this->ReturnDepartmentInitialsText; ?>
		<?php if(isset($this->ReturnDepartmentNameText))     echo $this->ReturnDepartmentNameText; ?>
		<?php if(isset($this->ReturnText))                   echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM DEPARTMENT REGISTER -->
<form name="<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER; ?>" 
      id="<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER; ?>" method="post">
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
                                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDepartmentInitials(null, 
                                                  '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_INITIALS'); ?>"
                               value="<?php echo $this->InputValueDepartmentInitials; ?>" maxlength="8" />
        </div>
    </div>
    <!-- DEPARTMENT NAME -->
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
                                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                 '');"
                               onchange="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_NAME'); ?>"
                               value="<?php echo $this->InputValueDepartmentName; ?>" maxlength="80" />
        </div>
    </div>
   <!-- CORPORATION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('CORPORATION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>" 
                id="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>"
                class="<?php echo $this->ReturnCorporationNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
                <option <?php if ($this->InputValueCorporationName == "" 
                                  || $this->InputValueCorporationName == ConfigInfraTools::FORM_FIELD_SELECT_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_SELECT_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SELECT_NONE'); ?> 
                </option>
                <?php 
                if(is_array($this->ArrayInstanceInfraToolsCorporation))
                {
                    foreach($this->ArrayInstanceInfraToolsCorporation as $key=>$corporation)
                    {
                        echo "<option ";
                          if($this->InputValueCorporationName == $corporation->GetCorporationName())
                            echo "selected='selected' ";
                        echo "value='" . $corporation->GetCorporationName() . "'>" . $corporation->GetCorporationName() 
							           . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDepartmentInitials(null, 
								  '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS; ?>',
								   'DivContentBodySubmitBigger ',
								   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
								   '', true);
					  ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_DEPARTMENT_REGISTER_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>