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
<!-- FM_DEPARTMENT_REGISTER_FORM -->
<form name="<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM; ?>" method="post">
    <!-- FIELD_DEPARTMENT_INITIALS -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_INITIALS').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_INITIALS; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_INITIALS; ?>" 
                               class="<?php echo $this->ReturnDepartmentInitialsClass; ?>"
                               onblur="ValidateDepartmentInitials(null, 
                                                   '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_INITIALS; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                 '');"
                               onchange="ValidateDepartmentInitials(null, 
                                                  '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_INITIALS; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_INITIALS'); ?>"
                               value="<?php echo $this->InputValueDepartmentInitials; ?>" maxlength="8" />
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>" 
                               class="<?php echo $this->ReturnDepartmentNameClass; ?>"
                               onblur="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                 '');"
                               onchange="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME'); ?>"
                               value="<?php echo $this->InputValueDepartmentName; ?>" maxlength="80" />
        </div>
    </div>
   <!-- FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>"
                class="<?php echo $this->ReturnCorporationNameClass; ?>"
                onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>');
                          document.getElementById('<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
                <option <?php if ($this->InputValueCorporationName == "" 
                                  || $this->InputValueCorporationName == ConfigInfraTools::FIELD_SEL_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
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
								  '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_INITIALS; ?>',
								   'DivContentBodySubmitBigger ',
								   '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
								   '', true);
					  ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_DEPARTMENT_REGISTER_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>