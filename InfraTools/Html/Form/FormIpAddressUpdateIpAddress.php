<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCorporationNameText)) echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_IP_ADDRESS_UPDT_FORM -->
<form name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_UPDT_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_UPDT_FORM; ?>" method="post">
    <!-- FIELD_IP_ADDRESS_DESCRIPTION -->
    <div class="DivContentBodyContainerTextArea">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <textarea name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION; ?>" 
                               class="FormFieldNotObligatory DivContentBodyContainerValueTextArea <?php echo $this->ReturnIpAddressClass; ?>"
                               onblur="ValidateDescription('DivContentBodyContainerValueTextArea', 
                                                   '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                 '');"
                               onchange="ValidateDescription('DivContentBodyContainerValueTextArea', 
                                                   '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_DESCRIPTION'); ?>"
                               maxlength="500"><?php echo $this->InputValueIpAddressDescription; ?></textarea>
        </div>
    </div>
    <!-- FIELD_IP_ADDRESS_IPV4 -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV4').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>" 
							   class="FormFieldNotObligatory <?php echo $this->ReturnIpAddressIpv4Class; ?>"
							   onblur="ValidateIpAddressIpv4(null, 
                                                   '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   onkeyup="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   onchange="ValidateIpAddressIpv4(null, 
                                                   '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
										 ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV4'); ?>"
							   value="<?php echo $this->InputValueIpAddressIpv4; ?>" maxlength="15" />
		</div>
	</div>
  	<!-- FIELD_IP_ADDRESS_IPV6 -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV6').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV6; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV6; ?>" 
							   class="FormFieldNotObligatory <?php echo $this->ReturnIpAddressIpv6Class; ?>"
							   onblur="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   onkeyup="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   onchange="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV6'); ?>"
							   value="<?php echo $this->InputValueIpAddressIpv6; ?>" maxlength="15" />
		</div>
	</div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateCorporation(null, '<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_CORPORATION_UPDT_SB; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FM_CORPORATION_UPDT_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FM_CORPORATION_UPDT_SB; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FM_CORPORATION_UPDT_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_CORPORATION_UPDT_SB; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_CORPORATION_UPDT_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_CORPORATION_UPDT_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>