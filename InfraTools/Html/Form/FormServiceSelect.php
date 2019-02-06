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
<form name="<?php echo ConfigInfraTools::FM_SERVICE_SEL; ?>" 
	  id="<?php echo ConfigInfraTools::FM_SERVICE_SEL; ?>" method="<?php echo $this->InputValueFormMethod ?>" >
	<!-- FIELD_SERVICE_RADIO -->
	<div class="DivContentBodyContainerService" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<!-- FIELD_SERVICE_ID_RADIO -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_SERVICE_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_SERVICE_ID_RADIO; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_SERVICE_ID_RADIO; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>', 
												  true);
								 ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_NAME; ?>', 
												  false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>', 
														   'Service Id')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_ID'); ?>"  
					   <?php echo $this->InputValueServiceIdRadio; ?> />
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_ID'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_SERVICE_NAME_RADIO -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_SERVICE_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_SERVICE_NAME_RADIO; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_SERVICE_NAME_RADIO; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>', 
												 false);
								ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_NAME; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>', 
														   'Service Name')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_NAME'); ?>"  
					   <?php echo $this->InputValueServiceNameRadio; ?> />
				<div class="DivContentBodyContainerLabelIp">
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_NAME'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_SERVICE_ID -->
		<div class="<?php echo $this->ReturnServiceIdRadioClass ?> DivContentBodyContainer"
		     id="<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_ID; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_ID'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_SERVICE_ID; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_SERVICE_ID; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnServiceIdClass; ?>"
							   onkeyup="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
												   '', 'true');
										KeyEnterClickButton('<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>');
										ValidateMultiplyFields(
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_FORM; ?>',
								                   'DivContentBodySubmit',
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
								                   '');"
							   onblur="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
												   '', true);
										ValidateMultiplyFields(
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_FORM; ?>',
								                   'DivContentBodySubmit',
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
								                   '');"
							   onchange="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
												   '', true);
										ValidateMultiplyFields(
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_FORM; ?>',
								                   'DivContentBodySubmit',
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
								                   '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_ID'); ?>" 
							   value="<?php echo $this->InputValueServiceId; ?>" maxlength="4" />
		</div>
		<!-- FIELD_SERVICE_NAME -->
		<div class="<?php echo $this->ReturnServiceNameRadioClass ?> DivContentBodyContainer" 
		     id="<?php echo ConfigInfraTools::DIV_RADIO_SERVICE_NAME; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_NAME'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnServiceNameClass; ?>"
							   onkeyup="ValidateServiceName('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
												   '', 'true');
										KeyEnterClickButton('<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>');
										ValidateMultiplyFields(
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_FORM; ?>',
								                   'DivContentBodySubmit',
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
								                   '');"
							   onblur="ValidateServiceName('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
												   '', true);
										ValidateMultiplyFields(
								   				   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_FORM; ?>',
								                   'DivContentBodySubmit',
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
								                   '');"
							   onchange="ValidateServiceName('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
												   '', true);
										 ValidateMultiplyFields(
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_FORM; ?>',
								                   'DivContentBodySubmit',
								                   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
								                   '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_NAME'); ?>" 
							   value="<?php echo $this->InputValueServiceName; ?>" maxlength="45" />
		</div>	
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
	     onmouseover="ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_SERVICE_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>