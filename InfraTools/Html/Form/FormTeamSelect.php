<!-- FORM TEAM SELECT -->
<form name="<?php echo ConfigInfraTools::FORM_TEAM_SELECT; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_TEAM_SELECT; ?>" method="post" >
	<!-- SELECT_ID-->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo "Id" ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>"
						   class="<?php echo $this->ReturnTeamIdClass; ?>"
						   onkeyup="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
											 '');"
						   onblur="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
											 '');"
						   onchange="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('TEAM_ID'); ?>" 
						   value="<?php echo $this->InputValueTeamId; ?>" maxlength="45" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_TEAM_ID; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_TEAM_SELECT; ?>',
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
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))  echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTeamIdText)) echo $this->ReturnTeamIdText; ?>
		<?php if(isset($this->ReturnTeamIdText)) echo $this->ReturnText; ?>
	</label>
</div>