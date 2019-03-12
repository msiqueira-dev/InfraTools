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
<!-- FM_IP_ADDRESS_SEL_FORM -->
<form name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM; ?>" method="post" >
	<!-- FIELD_IP_ADDRESS_RADIO -->
	<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_IPV4; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_IPV4; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_DIV_IPV6; ?>', 
												 false);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_DIV_IPV4; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit',
														   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV4'); ?>"  
					   <?php echo $this->InputValueIpAddressIpv4Radio; ?> checked/>
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV4'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_IPV6; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_IPV6; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_DIV_IPV6; ?>', 
												 true);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_DIV_IPV4; ?>', 
												 false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV6'); ?>"  
					   <?php echo $this->InputValueIpAddressIpv6Radio; ?> />
				<div class="DivContentBodyContainerLabelIp">
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV6'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_IP_ADDRESS_IPV4 -->
		<div class="NotHidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_DIV_IPV4; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV4'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnIpAddressIpv4Class; ?>"
							   onkeyup="ValidateIpAddressIpv4('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												 '');"
							   onblur="ValidateIpAddressIpv4('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												 '');"
							   onchange="ValidateIpAddressIpv4('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV4'); ?>" 
							   value="<?php echo $this->InputValueIpAddressIpv4; ?>" maxlength="15" />
		</div>
		<!-- FIELD_IP_ADDRESS_IPV6 -->
		<div class="Hidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_RADIO_DIV_IPV6 ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV6'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV6; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV6; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnIpAddressIpv6Class; ?>"
							   onkeyup="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV6; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												 '');"
							   onblur="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV6; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												 '');"
							   onchange="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV6; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV6'); ?>" 
							   value="<?php echo $this->InputValueIpAddressIpv6; ?>" maxlength="38" />
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>