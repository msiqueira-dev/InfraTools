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
<!-- FM_TICKET_SEL_FORM -->
<form name="<?php echo ConfigInfraTools::FM_TICKET_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_TICKET_SEL_FORM; ?>" method="post" >
	<!-- FIELD_TICKET_RADIO -->
	<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_TICKET_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_ID; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_ID; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_DIV_TITLE; ?>', 
												 false);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_DIV_ID; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit',
														   '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_TICKET_ID'); ?>"  
					   <?php echo $this->InputValueTicketIdRadio; ?> checked/>
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_TICKET_ID'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_TICKET_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_ID; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_ID; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_DIV_TITLE; ?>', 
												 true);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_DIV_ID; ?>', 
												 false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>', 
														   '')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_TICKET_TITLE'); ?>"  
					   <?php echo $this->InputValueTicketTitleRadio; ?> />
				<div class="DivContentBodyContainerLabelIp">
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_TICKET_TITLE'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_TICKET_ID -->
		<div class="NotHidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_DIV_ID; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_TICKET_ID'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_TICKET_ID; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_TICKET_ID; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnTicketIdClass; ?>"
							   onkeyup="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_TICKET_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												 '');"
							   onblur="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_TICKET_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												 '');"
							   onchange="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_TICKET_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_TICKET_ID'); ?>" 
							   value="<?php echo $this->InputValueTicketId; ?>" maxlength="5" />
		</div>
		<!-- FIELD_TICKET_TITLE -->
		<div class="Hidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FIELD_TICKET_RADIO_DIV_TITLE ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_TICKET_TITLE'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_TICKET_TITLE; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_TICKET_TITLE; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnTicketTitleClass; ?>"
							   onkeyup="ValidateTitle('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_TICKET_TITLE; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												 '');"
							   onblur="ValidateTitle('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_TICKET_TITLE; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												 '');"
							   onchange="ValidateTitle('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_TICKET_TITLE; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_TICKET_TITLE'); ?>" 
							   value="<?php echo $this->InputValueTicketTitle; ?>" maxlength="90" />
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_TICKET_SEL_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_TICKET_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>