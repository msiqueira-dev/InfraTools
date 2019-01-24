<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))    echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTeamIdText))   echo $this->ReturnTeamIdText; ?>
		<?php if(isset($this->ReturnTeamNameText)) echo $this->ReturnTeamNameText; ?>
		<?php if(isset($this->ReturnText))         echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_TEAM_SELECT_FORM -->
<form name="<?php echo ConfigInfraTools::FORM_TEAM_SELECT_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_TEAM_SELECT_FORM; ?>" method="post" >
	<!-- FORM_FIELD_TEAM_RADIO -->
	<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_NAME; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_NAME; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_DIV_ID; ?>', 
												 false);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_DIV_NAME; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit',
														   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>', 
														   'Team Name')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_NAME'); ?>"  
					   <?php echo $this->InputValueTeamNameRadio; ?> checked/>
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_NAME'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_ID; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_ID; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_DIV_ID; ?>', 
												 true);
								 ShowOrHideElement('<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_DIV_NAME; ?>', 
												 false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>', 
														   'Team Id')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_ID'); ?>"  
					   <?php echo $this->InputValueTeamIdRadio; ?> />
				<div class="DivContentBodyContainerLabelIp">
					<i><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_ID'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FORM_FIELD_TEAM_NAME -->
		<div class="NotHidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_DIV_NAME; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_NAME'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnTeamNameClass; ?>"
							   onkeyup="ValidateTeamName('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												 '');"
							   onblur="ValidateTeamName('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												 '');"
							   onchange="ValidateTeamName('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_NAME'); ?>" 
							   value="<?php echo $this->InputValueTeamName; ?>" maxlength="45" />
		</div>
		<!-- FORM_FIELD_TEAM_ID -->
		<div class="Hidden DivContentBodyContainer" id="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_RADIO_DIV_ID ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_ID'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnTeamIdClass; ?>"
							   onkeyup="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												 '');"
							   onblur="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												 '');"
							   onchange="ValidateNumbersOnly('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_FORM; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_ID'); ?>" 
							   value="<?php echo $this->InputValueTeamId; ?>" maxlength="5" />
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>