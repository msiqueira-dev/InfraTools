<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText)) echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCodeText))  echo $this->ReturnCodeText; ?>
		<?php if(isset($this->ReturnText))      echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM LOGIN TWO STEP VERIFICATION -->
<form name="<?php echo ConfigInfraTools::FM_USER_TWO_STEP_VERIFICATION; ?>" 
	  id="<?php echo ConfigInfraTools::FM_USER_TWO_STEP_VERIFICATION; ?>" method="post" >
	  <!-- CODE -->
	<div class="DivContentBodyContainer" id="DivContentBodyContainerLoginTwoStepVerificationCode">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('LOGIN_TWO_STEP_VERIFICATION_CODE').":"; ?> </label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_CODE; ?>" 
						   id="<?php echo ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_CODE; ?>"
						   class="<?php echo $this->ReturnCodeClass; ?>"
						   title="<?php echo $this->InstanceLanguageText->GetText('LOGIN_TWO_STEP_VERIFICATION_CODE'); ?>" 
						   onblur="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_CODE; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>',
											 '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_USER_TWO_STEP_VERIFICATION; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>',
											 '');"
						   onkeyup="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_CODE; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>',
											 '', false);
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_USER_TWO_STEP_VERIFICATION; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>',
											 '');"
						   onchange="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_CODE; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>',
											 '', false);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_USER_TWO_STEP_VERIFICATION; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>',
											 '');"
						   value="<?php echo $this->InputValueLoginTwoStepVerificationCode; ?>" maxlength="16" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer"
		 onmouseover="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_CODE; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>',
								   '', false);     
					  ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_LOGIN_TWO_STEP_VERIFICATION_CODE_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_VALIDATE'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>