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
<!-- FORM_SYSTEM_CONFIGURATION_SELECT_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM; ?>" method="post" >
	<!-- RADIO BUTTON -->
	<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<!-- FORM_FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_SYSTEM_CONFIGURATION; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>', 
												 false);
								 ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?>"  
					   <?php echo $this->InputValueSystemConfigurationOptionNameRadio; ?> />
				<div>
					<i><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FORM_FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_SYSTEM_CONFIGURATION; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>', 
												 true);
								 ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>', 
												 false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER'); ?>"  
					   <?php echo $this->InputValueSystemConfigurationOptionNumberRadio; ?>/>
				<div>
					<i><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME -->
		<div class="<?php echo $this->ReturnSystemConfigurationOptionNameRadioClass ?> DivContentBodyContainer"
		     id="<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>"
							   class="<?php echo $this->ReturnSystemConfigurationOptionNameClass; ?>"
							   onkeyup="ValidateDescription(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>',
												   '', 'false');"
							   onblur="ValidateDescription(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>',
												   '', true);"
							   onchange="ValidateDescription(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>',
												   '', true);"
							   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME'); ?>" 
							   value="<?php echo $this->InputValueSystemConfigurationOptionName; ?>" maxlength="45" />
		</div>
		<!-- FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER -->
		<div class="<?php echo $this->ReturnSystemConfigurationOptionNumberRadioClass ?> DivContentBodyContainer"
		     id="<?php echo ConfigInfraTools::DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>"
							   class="<?php echo $this->ReturnSystemConfigurationOptionNumberClass; ?>"
							   onkeyup="ValidateNumbersOnly(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>',
												   '', 'false');"
							   onblur="ValidateNumbersOnly(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>',
												   '', true);"
							   onchange="ValidateNumbersOnly(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>',
												   '', true);"
							   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER'); ?>" 
							   value="<?php echo $this->InputValueSystemConfigurationOptionNumber; ?>" maxlength="4" />
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT_FORM_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>