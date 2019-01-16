<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))              echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTicketIdText))           echo $this->ReturnTicketIdText; ?>
		<?php if(isset($this->ReturnTicketTitleText))        echo $this->ReturnTicketTitleText; ?>
		<?php if(isset($this->ReturnText))                   echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_TICKET_SELECT_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_TICKET_SELECT_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_TICKET_SELECT_FORM; ?>" method="post" >
	<!-- FORM_FIELD_TICKET_RADIO -->
	<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_ID; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_ID; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_DIV_TITLE; ?>', 
												 false);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_DIV_ID; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit',
														   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TICKET_ID'); ?>"  
					   <?php echo $this->InputValueTicketIdRadio; ?> checked/>
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TICKET_ID'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_ID; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_ID; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_DIV_TITLE; ?>', 
												 true);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_DIV_ID; ?>', 
												 false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TICKET_TITLE'); ?>"  
					   <?php echo $this->InputValueTicketTitleRadio; ?> />
				<div class="DivContentBodyContainerLabelIp">
					<i><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TICKET_TITLE'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FORM_FIELD_TICKET_ID -->
		<div class="NotHidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_DIV_ID; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TICKET_ID'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_ID; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_ID; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnTicketIdClass; ?>"
							   onkeyup="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TICKET_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												 '');"
							   onblur="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TICKET_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												 '');"
							   onchange="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TICKET_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TICKET_ID'); ?>" 
							   value="<?php echo $this->InputValueTicketId; ?>" maxlength="5" />
		</div>
		<!-- FORM_FIELD_TICKET_TITLE -->
		<div class="Hidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_RADIO_DIV_TITLE ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TICKET_TITLE'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TITLE; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TITLE; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnTicketTitleClass; ?>"
							   onkeyup="ValidateTitle('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TITLE; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												 '');"
							   onblur="ValidateTitle('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TITLE; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												 '');"
							   onchange="ValidateTitle('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TITLE; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TICKET_TITLE'); ?>" 
							   value="<?php echo $this->InputValueTicketTitle; ?>" maxlength="90" />
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>