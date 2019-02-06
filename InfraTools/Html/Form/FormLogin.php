<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivLoginReturn">
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
<form name="<?php echo ConfigInfraTools::FM_LOGIN; ?>" 
	  id="<?php echo ConfigInfraTools::FM_LOGIN; ?>" method="post" >
	<div class="DivContentBodyRight">
		<!-- USER -->
		<div class="DivContentBodyContainerLogin">
			<img src="<?php echo $this->Config->DefaultServerImage. 
							  'Icons/IconInfraToolsUser.png'; ?>" 
						 alt="IconInfraToolsUser" width="32" height="32"/>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_LOGIN; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_LOGIN; ?>" 
							   class="<?php echo $this->ReturnLoginClass; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_LOGIN'); ?>"
							   value="<?php echo $this->InputValueLoginEmail; ?>" maxlength="45"
							   onblur="ValidateNotNull(null, '<?php echo ConfigInfraTools::FIELD_LOGIN; ?>',
										   'DivContentBodySubmit',
										   '<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>',
										   '');
									   ValidateMultiplyFields('<?php echo ConfigInfraTools::FM_LOGIN; ?>',
											'DivContentBodySubmit',
											'<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>',
											'');"
									   onkeyup="ValidateMultiplyFields('<?php echo ConfigInfraTools::FM_LOGIN; ?>',
											'DivContentBodySubmit',
											'<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>',
											'');"/>
		</div>
		<!-- PASSWORD -->
		<div class="DivContentBodyContainerLogin">
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
										   '<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>',
										   '');
								   ValidateMultiplyFields('<?php echo ConfigInfraTools::FM_LOGIN; ?>',
											'DivContentBodySubmit',
											'<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>',
											'');"
								   onkeyup="ValidateMultiplyFields('<?php echo ConfigInfraTools::FM_LOGIN; ?>',
											'DivContentBodySubmit',
											'<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>',
											'');"/>
		</div>
		<div class="DivClearFloat"></div>
		<!-- SUBMIT -->
		<div class="DivContentBodyContainerLogin"
			 onmouseover="ValidateMultiplyFields('<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>',
												 '');">
			<input type="submit" name="<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>" 
									 id="<?php echo ConfigInfraTools::LOGIN_FM_SB; ?>"
									 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
									 value="<?php echo $this->InstanceLanguageText->GetText('LOGIN_SEND'); ?>"
									 <?php echo $this->SubmitEnabled; ?> />
		</div>
	</div>
	<div class="DivContentBodyLeft">
		<div class="DivContentBodyLeftSpace">
		</div>
		<div class="DivContentBodyContainerLogin">
			<input type="submit" name="<?php echo ConfigInfraTools::LOGIN_FM_SB_FORGOT_PASSWORD; ?>" 
								 id="<?php echo ConfigInfraTools::LOGIN_FM_SB_FORGOT_PASSWORD; ?>"
								 class="InputSubmitForgotPassword"
								 value="<?php echo $this->InstanceLanguageText->GetText('LOGIN_FORGOT_PASSWORD_TEXT'); ?>"/>
		</div>
		<div class="DivContentBodyContainerLogin">
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