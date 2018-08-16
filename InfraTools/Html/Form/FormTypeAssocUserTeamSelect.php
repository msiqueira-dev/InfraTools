<!-- FORM TYPE ASSOC USER TEAM SELECT -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT; ?>" method="post" >
	<!-- ASSOC_USER_TEAM_ID -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('TYPE_ASSOC_USER_TEAM_TEAM_ID'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID; ?>"
						   class="<?php echo $this->ReturnTypeAssocUserTeamTeamIdClass; ?>"
						   onkeyup="ValidateNumbersOnly(null, 
										     '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>',
											 '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>',
											 '');"
						   onblur="ValidateNumbersOnly(null, 
										     '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>',
											 '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>',
											 '');"
						   onchange="ValidateNumbersOnly(null, 
										     '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>',
											 '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('TYPE_ASSOC_USER_TEAM_TEAM_ID'); ?>" 
						   value="<?php echo $this->InputValueTypeAssocUserTeamTeamId; ?>" maxlength="4" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateNumbersOnly(null, 
							       '<?php echo ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT; ?>"
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
		<?php if(isset($this->ReturnEmptyText))                   echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeAssocUserTeamTeamIdText)) echo $this->ReturnTypeAssocUserTeamTeamIdText; ?>
		<?php if(isset($this->ReturnText))                        echo $this->ReturnText; ?>
	</label>
</div>