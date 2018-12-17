<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))       echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnServiceIdText))   echo $this->ReturnServiceIdText; ?>
		<?php if(isset($this->ReturnServiceNameText)) echo $this->ReturnServiceNameText; ?>
		<?php if(isset($this->ReturnText))            echo $this->ReturnText; ?>
	</label>
</div>
<div class="DivClearFloat"></div>
<!-- RADIO BUTTON -->
<div class="DivContentBodyContainerService" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
	<!-- RADIO BUTTON ID -->
	<div class="DivContentBodyContainerRadio">
		<label>
			<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_RADIO; ?>"
				   id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO; ?>"
				   value="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO; ?>"
				   onclick="this.blur();this.focus();"
				   onchange="ShowOrHideElementByRadioSelection('<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO_DIV; ?>', 
				                                               '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO; ?>', 
				                                               '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME_RADIO_DIV; ?>', 
				                                               '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME_RADIO; ?>');
							 MakeInputVisible('<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>');
							 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
													   'DivContentBodySubmit', 
													   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>', 
													   'Host')"
				   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_ID'); ?>"  
				   <?php echo $this->InputValueServiceIdRadio; ?>/>
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
				   onchange="ShowOrHideElementByRadioSelection('<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO_DIV; ?>', 
				                                               '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO; ?>', 
				                                               '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME_RADIO_DIV; ?>', 
				                                               '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME_RADIO; ?>');
							 MakeInputVisible('<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>');
							 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
													   'DivContentBodySubmit', 
													   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>', 
													   'Ip')"
				   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?>"  
				   <?php echo $this->InputValueServiceNameRadio; ?> />
			<div class="DivContentBodyContainerLabelIp">
				<i><?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?></i>
			</div>
		</label>
	</div>
	<div class="DivClearFloat"></div>
	<!-- SERVICE ID -->
	<div class="<?php echo $this->ReturnServiceIdRadioClass; ?> DivContentBodyContainerServiceInput" 
		 id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID_RADIO_DIV; ?>"
							  onmouseover="
									ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>',
											   '', true);"
							   onmouseover="
									ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>',
											   '', true);">
			<form name="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_BY_ID; ?>" 
                  id="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_BY_ID; ?>" method="get" >
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
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>',
												   '', 'true');
										KeyEnterClickButton('<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>');"
							   onblur="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>',
												   '', true);"
							   onchange="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>',
												   '', true);"
							   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_ID'); ?>" 
							   value="<?php echo $this->InputValueServiceId; ?>" maxlength="4" />
			<!-- SUBMIT ID -->
			<div class="DivContentBodyContainerSubmit">
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>" 
										 id="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_ID; ?>"
										 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
										 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
										 <?php echo $this->SubmitEnabled; ?> />
			</div>
		</form>
	</div>
	<!-- SERVICE NAME -->
	<div class="<?php echo $this->ReturnServiceNameRadioClass; ?>  DivContentBodyContainerServiceInput" 
		 id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME_RADIO_DIV; ?>"
						   onmouseover="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>',
											   '', true);"
						   onmouseout="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>',
											   '', true);">
		<form name="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_BY_NAME; ?>" 
			  id="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_BY_NAME; ?>" method="get" >
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
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>',
												   '', 'true');
										KeyEnterClickButton('<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>');"
							   onblur="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>',
												   '', true);"
							   onchange="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>',
												   '', true);"
							   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?>" 
							   value="<?php echo $this->InputValueServiceName; ?>" maxlength="45" />
			<!-- SUBMIT NAME -->
			<div class="DivContentBodyContainerSubmit">
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>" 
										 id="<?php echo ConfigInfraTools::FORM_SERVICE_SELECT_SUBMIT_NAME; ?>"
										 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
										 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
										 <?php echo $this->SubmitEnabled; ?> />
			</div>
		</form>
	</div>
</div>