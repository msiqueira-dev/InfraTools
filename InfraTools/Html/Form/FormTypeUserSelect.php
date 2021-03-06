<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))               echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeUserDescriptionText)) echo $this->ReturnTypeUserDescriptionText; ?>
		<?php if(isset($this->ReturnText))                    echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_TYPE_USER_SEL_FORM -->
<form name="<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_FORM; ?>" method="post" >
	<!-- FIELD_TYPE_USER_DESCRIPTION -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_TYPE_USER_DESCRIPTION'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION; ?>"
						   class="<?php echo $this->ReturnTypeUserDescriptionClass; ?>"
						   onkeyup="ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>',
											 '');"
						   onblur="ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>',
											 '');"
						   onchange="ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_TYPE_USER_DESCRIPTION'); ?>" 
						   value="<?php echo $this->InputValueTypeUserDescription; ?>" maxlength="45" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_TYPE_USER_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>