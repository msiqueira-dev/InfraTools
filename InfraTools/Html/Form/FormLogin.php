<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<?php
		if($this->ReturnLoginText == ConfigInfraTools::USER_NOT_CONFIRMED)
		{
			echo "<label>" . $this->InstanceLanguageText->GetText('USER_NOT_CONFIRMED') . "</label>";
			include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . str_replace("_","",ConfigInfraTools::PAGE_LOGIN) . "Link.php");
			$this->ReturnLoginText = "";
			$this->ReturnEmptyText = "";
			$this->ReturnText = "";
		} 
	?>
	<label>
		<?php if(isset($this->ReturnEmptyText)) echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnLoginText)) echo $this->ReturnLoginText; ?>
		<?php if(isset($this->ReturnText))      echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM LOGIN -->
<form name="<?php echo ConfigInfraTools::LOGIN_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::LOGIN_FORM; ?>" method="post" >
	<div class="DivContentBodyRight">
		<!-- USER -->
		<div class="DivContentBodyContainer">
			<img src="<?php echo $this->Config->DefaultServerImage. 
							  'Icons/IconInfraToolsUser.png'; ?>" 
						 alt="IconInfraToolsUser" width="32" height="32"/>
			<input type="text" name="<?php echo ConfigInfraTools::LOGIN_USER; ?>" 
							   id="<?php echo ConfigInfraTools::LOGIN_USER; ?>" 
							   class="<?php echo $this->ReturnLoginClass; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('LOGIN_USER'); ?>"
							   value="<?php echo $this->InputValueLoginEmail; ?>" maxlength="45"
							   onblur="ValidateNotNull(null, '<?php echo ConfigInfraTools::LOGIN_USER; ?>',
										   'DivContentBodySubmit',
										   '<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>',
										   '');
									   ValidateMultiplyFields('<?php echo ConfigInfraTools::LOGIN_FORM; ?>',
											'DivContentBodySubmit',
											'<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>',
											'');"
									   onkeyup="ValidateMultiplyFields('<?php echo ConfigInfraTools::LOGIN_FORM; ?>',
											'DivContentBodySubmit',
											'<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>',
											'');"/>
		</div>
		<!-- PASSWORD -->
		<div class="DivContentBodyContainer">
			<img src="<?php echo $this->Config->DefaultServerImage. 
							  'Icons/IconInfraToolsPassword.png'; ?>" 
						 alt="IconInfraToolsPassword" width="32" height="32"/>
			<input type="password" name="<?php echo ConfigInfraTools::LOGIN_PASSWORD; ?>" 
								   id="<?php echo ConfigInfraTools::LOGIN_PASSWORD; ?>"
								   class="<?php echo $this->ReturnLoginClass; ?>"
								   title="<?php echo $this->InstanceLanguageText->GetText('LOGIN_PASSWORD'); ?>" 
								   value="" maxlength="20" 
								   onblur="ValidateNotNull(null, '<?php echo ConfigInfraTools::LOGIN_PASSWORD; ?>',
										   'DivContentBodySubmit',
										   '<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>',
										   '');
								   ValidateMultiplyFields('<?php echo ConfigInfraTools::LOGIN_FORM; ?>',
											'DivContentBodySubmit',
											'<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>',
											'');"
								   onkeyup="ValidateMultiplyFields('<?php echo ConfigInfraTools::LOGIN_FORM; ?>',
											'DivContentBodySubmit',
											'<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>',
											'');"/>
		</div>
		<div class="DivClearFloat"></div>
		<!-- SUBMIT -->
		<div class="DivContentBodyContainer"
			 onmouseover="ValidateMultiplyFields('<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>',
												 '');">
			<input type="submit" name="<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>" 
									 id="<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT; ?>"
									 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
									 value="<?php echo $this->InstanceLanguageText->GetText('LOGIN_SEND'); ?>"
									 <?php echo $this->SubmitEnabled; ?> />
		</div>
	</div>
	<div class="DivContentBodyLeft">
		<div class="DivContentBodyLeftSpace">
		</div>
		<div class="DivContentBodyContainer">
			<input type="submit" name="<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT_FORGOT_PASSWORD; ?>" 
								 id="<?php echo ConfigInfraTools::LOGIN_FORM_SUBMIT_FORGOT_PASSWORD; ?>"
								 class="InputSubmitForgotPassword"
								 value="<?php echo $this->InstanceLanguageText->GetText('LOGIN_FORGOT_PASSWORD_TEXT'); ?>"/>
		</div>
		<div class="DivContentBodyContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_REGISTER'); ?>" 
			   id="PageLoginRegister" title="<?php echo $this->InstanceLanguageText->GetText('LOGIN_NEW_TEXT') ?>">
				<span>
					<?php echo $this->InstanceLanguageText->GetText('LOGIN_NEW_TEXT'); ?> 
				</span>
			</a>
		</div>
	</div>
	<div class="DivClearFloat"></div>
</form>