<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))         echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnIpAddressIpv4Text)) echo $this->ReturnIpAddressIpv4Text; ?>
		<?php if(isset($this->ReturnIpAddressIpv6Text)) echo $this->ReturnIpAddressIpv6Text; ?>
		<?php if(isset($this->ReturnText))              echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_IP_ADDRESS_SELECT_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_FORM; ?>" method="post" >
	<!-- FORM_FIELD_IP_ADDRESS_RADIO -->
	<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_IPV4; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_IPV4; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_DIV_IPV6; ?>', 
												 false);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_DIV_IPV4; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit',
														   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_IP_ADDRESS_IPV4'); ?>"  
					   <?php echo $this->InputValueIpAddressIpv4Radio; ?> checked/>
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_IP_ADDRESS_IPV4'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_IPV6; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_IPV6; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_DIV_IPV6; ?>', 
												 true);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_DIV_IPV4; ?>', 
												 false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_IP_ADDRESS_IPV6'); ?>"  
					   <?php echo $this->InputValueIpAddressIpv6Radio; ?> />
				<div class="DivContentBodyContainerLabelIp">
					<i><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_IP_ADDRESS_IPV6'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FORM_FIELD_IP_ADDRESS_IPV4 -->
		<div class="NotHidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_DIV_IPV4; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_IP_ADDRESS_IPV4'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV4; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV4; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnIpAddressIpv4Class; ?>"
							   onkeyup="ValidateIpAddress('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV4; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												 '');"
							   onblur="ValidateIpAddress('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV4; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												 '');"
							   onchange="ValidateIpAddress('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV4; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_IP_ADDRESS_IPV4'); ?>" 
							   value="<?php echo $this->InputValueIpAddressIpv4; ?>" maxlength="15" />
		</div>
		<!-- FORM_FIELD_IP_ADDRESS_IPV6 -->
		<div class="Hidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_RADIO_DIV_IPV6 ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_IP_ADDRESS_IPV6'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV6; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV6; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnIpAddressIpv6Class; ?>"
							   onkeyup="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV6; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												 '');"
							   onblur="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV6; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												 '');"
							   onchange="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_IP_ADDRESS_IPV6; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_IP_ADDRESS_IPV6'); ?>" 
							   value="<?php echo $this->InputValueIpAddressIpv6; ?>" maxlength="38" />
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_IP_ADDRESS_SELECT_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>