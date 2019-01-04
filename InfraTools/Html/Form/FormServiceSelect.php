<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnServiceIdText))       echo $this->ReturnServiceIdText; ?>
		<?php if(isset($this->ReturnServiceNameText))     echo $this->ReturnServiceNameText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM SERVICE SELECT -->
<form name="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT; ?>" method="<?php echo $this->InputValueFormMethod ?>" >
	<!-- RADIO BUTTON -->
	<div class="DivContentBodyContainerService" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<!-- RADIO BUTTON ID -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>', 
												  true);
								 ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_NAME; ?>', 
												  false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>', 
														   'Service Id')"
					   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_ID'); ?>"  
					   <?php echo $this->InputValueServiceIdRadio; ?> />
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_ID'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- RADIO BUTTON NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME_RADIO; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME_RADIO; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>', 
												 false);
								ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_NAME; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>', 
														   'Service Name')"
					   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?>"  
					   <?php echo $this->InputValueServiceNameRadio; ?> />
				<div class="DivContentBodyContainerLabelIp">
					<i><?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FORM_FIELD_SERVICE_ID -->
		<div class="<?php echo $this->ReturnServiceIdRadioClass ?> DivContentBodyContainer"
		     id="<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_ID'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>"
							   class="<?php echo $this->ReturnServiceIdClass; ?>"
							   onkeyup="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>',
												   '', 'true');
										KeyEnterClickButton('<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>');"
							   onblur="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>',
												   '', true);"
							   onchange="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>',
												   '', true);"
							   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_ID'); ?>" 
							   value="<?php echo $this->InputValueServiceId; ?>" maxlength="4" />
		</div>
		<!-- FORM_FIELD_SERVICE_NAME -->
		<div class="<?php echo $this->ReturnServiceNameRadioClass ?> DivContentBodyContainer" 
		     id="<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_NAME; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>"
							   class="<?php echo $this->ReturnServiceNameClass; ?>"
							   onkeyup="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>',
												   '', 'true');
										KeyEnterClickButton('<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>');"
							   onblur="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>',
												   '', true);"
							   onchange="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>',
												   '', true);"
							   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?>" 
							   value="<?php echo $this->InputValueServiceName; ?>" maxlength="45" />
		</div>	
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>