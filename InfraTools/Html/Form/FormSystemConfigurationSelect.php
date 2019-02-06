<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))                           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnSystemConfigurationOptionNameText))   echo $this->ReturnSystemConfigurationOptionNameText; ?>
		<?php if(isset($this->ReturnSystemConfigurationOptionNumberText)) echo $this->ReturnSystemConfigurationOptionNumberText; ?>
		<?php if(isset($this->ReturnText))                                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_SYSTEM_CONFIGURATION_SEL_FORM -->
<form name="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_FORM; ?>" method="post" >
	<!-- RADIO BUTTON -->
	<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<!-- FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_RADIO_SYSTEM_CONFIGURATION; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>', 
												 false);
								 ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?>"  
					   <?php echo $this->InputValueSystemConfigurationOptionNameRadio; ?> />
				<div>
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_RADIO_SYSTEM_CONFIGURATION; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>', 
												 true);
								 ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>', 
												 false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER'); ?>"  
					   <?php echo $this->InputValueSystemConfigurationOptionNumberRadio; ?>/>
				<div>
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_SYSTEM_CONFIGURATION_OPTION_NAME -->
		<div class="<?php echo $this->ReturnSystemConfigurationOptionNameRadioClass ?> DivContentBodyContainer"
		     id="<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnSystemConfigurationOptionNameClass; ?>"
							   onkeyup="ValidateDescription('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												   '', 'false');
									    ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												 '');"
							   onblur="ValidateDescription('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												   '', true);
									    ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												 '');"
							   onchange="ValidateDescription('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												   '', true);
										  ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?>" 
							   value="<?php echo $this->InputValueSystemConfigurationOptionName; ?>" maxlength="45" />
		</div>
		<!-- FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER -->
		<div class="<?php echo $this->ReturnSystemConfigurationOptionNumberRadioClass ?> DivContentBodyContainer"
		     id="<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnSystemConfigurationOptionNumberClass; ?>"
							   onkeyup="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												   '', 'false');
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												 '');"
							   onblur="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												   '', true);
										 ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												 '');"
							   onchange="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												   '', true);
										 ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER'); ?>" 
							   value="<?php echo $this->InputValueSystemConfigurationOptionNumber; ?>" maxlength="4" />
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
	    onmouseover="ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>