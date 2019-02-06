<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))                        echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeAssocUserTeamDescriptionText)) echo $this->ReturnTypeAssocUserTeamDescriptionText; ?>
		<?php if(isset($this->ReturnUserEmailText))                    echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnText))                             echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_TYPE_ASSOC_USER_TEAM_SEL_FORM -->
<form name="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_FORM; ?>" method="post" >
	<!-- TYPE_ASSOC_USER_TEAM_DESCRIPTION -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('TYPE_ASSOC_USER_TEAM_DESCRIPTION'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>"
						   class="<?php echo $this->ReturnTypeAssocUserTeamDescriptionClass; ?>"
						   onkeyup="ValidateDescription(null, 
										     '<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>',
											 '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>',
											 '');"
						   onblur="ValidateDescription(null, 
										     '<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>',
											 '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>',
											 '');"
						   onchange="ValidateDescription(null, 
										     '<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>',
											 '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('TYPE_ASSOC_USER_TEAM_DESCRIPTION'); ?>" 
						   value="<?php echo $this->InputValueTypeAssocUserTeamDescription; ?>" maxlength="45" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateDescription(null, 
							       '<?php echo ConfigInfraTools::FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_TEAM_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>