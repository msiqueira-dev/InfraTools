<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->EmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnUserEmailText)) echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnText))          echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM USER SELECT -->
<form name="<?php echo ConfigInfraTools::FM_USER_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_USER_SEL_FORM; ?>" method="post" >
	<!-- SELECT_EMAIL -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>"
						   class="<?php echo $this->ReturnUserEmailClass; ?>"
						   onkeyup="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_USER_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>',
											 '');"
						   onblur="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_USER_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>',
											 '');"
						   onchange="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_USER_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL'); ?>" 
						   value="<?php echo $this->InputValueUserEmail; ?>" maxlength="60" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_USER_EMAIL; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_USER_SEL_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_USER_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>