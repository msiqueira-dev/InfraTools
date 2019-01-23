<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))                     echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnUserNameText))                  echo $this->ReturnUserNameText; ?>
		<?php if(isset($this->ReturnUserEmailText))                 echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnTicketTypeText))                echo $this->ReturnTicketTypeText; ?>
		<?php if(isset($this->ReturnTickeTitleText))                echo $this->ReturnTickeTitleText; ?>
		<?php if(isset($this->ReturnTicketDescriptionText))         echo $this->ReturnTicketDescriptionText; ?>
		<?php if(isset($this->ReturnCaptchaText))                   echo $this->ReturnCaptchaText; ?>
		<?php if(isset($this->ReturnEmptyText))                     echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM CONTACT -->
<form name="<?php echo ConfigInfraTools::CONTACT_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::CONTACT_FORM; ?>" method="post">
	<!-- FORM_FIELD_USER_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_NAME').":"; ?></label>
		</div>
		<?php 
		if($this->User != NULL) 
		{
		?>
			<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserName; ?></label>
			</div>
		<?php
		}
		else
		{
		?>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_NAME; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_NAME; ?>" 
						   class="<?php echo $this->ReturnUserNameClass; ?>"
						   onblur="ValidateName(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
						   onclick="ValidateName(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_NAME'); ?>"
						   value="<?php echo $this->InputValueUserName; ?>" maxlength="45" />
		<?php
		}
		?>
	</div>
	<!-- FORM_FIELD_USER_EMAIL -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_EMAIL').":"; ?></label>
		</div>
		<?php 
		if($this->User != NULL) 
		{
		?>
			<div class="DivContentBodyContainerValue">
					<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserEmail; ?></label>
			</div>
		<?php
		}
		else
		{
		?>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>"
						   class="<?php echo $this->ReturnUserEmailClass; ?>"
						   onkeyup="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '', false);
								   ValidateMultiplyFields(
											   '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '');"
						   onblur="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											   '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '');"
						  onclick="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											   '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_EMAIL'); ?>" 
						   value="<?php echo $this->InputValueUserEmail; ?>" maxlength="60" />
		<?php
		}
		?>
	</div>
	
	<!-- FORM_FIELD_TICKET_TYPE -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_SUBJECT'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<select name="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TYPE; ?>" 
				id="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TYPE; ?>"
				class="<?php echo $this->ReturnTicketTypeClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TYPE; ?>');
						  ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
				style=" <?php if($this->InputValueTicketType != ConfigInfraTools::FORM_FIELD_SELECT_NONE
								 && $this->InputValueTicketType != "") 
							echo 'color:black;'
						?> " >
			<option <?php if ($this->InputValueTicketType == "" 
							  || $this->InputValueTicketType == ConfigInfraTools::FORM_FIELD_SELECT_NONE) 
				echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FORM_FIELD_SELECT_NONE; ?>" 
				disabled="disabled"> 
					<?php echo $this->InstanceLanguageText->GetText('FORM_SELECT_DEFAULT'); ?> 
			</option>
			<option <?php if ($this->InputValueTicketType == ConfigInfraTools::CONTACT_SELECT_COMMERCIAL) 
				echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::CONTACT_SELECT_COMMERCIAL; ?>"> 
					<?php echo $this->InstanceLanguageText->GetText('CONTACT_SELECT_COMMERCIAL'); ?> 
			</option>
			<option <?php if ($this->InputValueTicketType == ConfigInfraTools::CONTACT_SELECT_DOUBT) 
				echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::CONTACT_SELECT_DOUBT; ?>"> 
					<?php echo $this->InstanceLanguageText->GetText('CONTACT_SELECT_DOUBT'); ?> 
			</option>
			<option <?php if ($this->InputValueTicketType == ConfigInfraTools::CONTACT_SELECT_SUGGESTION) 
				echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::CONTACT_SELECT_SUGGESTION; ?>"> 
					<?php echo $this->InstanceLanguageText->GetText('CONTACT_SELECT_SUGGESTION'); ?> 
			</option>
		</select>
	</div>
	<!-- FORM_FIELD_TICKET_TITLE -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label> <?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_TITLE'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_TITLE_TIP'); ?>
				</label>
			</div>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TITLE; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TITLE; ?>"
						   class="<?php echo $this->ReturnTicketTitleClass; ?>"
						   onblur="ValidateTitle(null, '<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TITLE; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '', true);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
						   onclick="ValidateTitle(null, '<?php echo ConfigInfraTools::FORM_FIELD_TICKET_TITLE; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '', true);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_TITLE'); ?>" 
						   value="<?php echo $this->InputValueTicketTitle; ?>" maxlength="90" />
	</div>
	<div class="DivClearFloat"></div>
	<!-- FORM_FIELD_TICKET_DESCRIPTION -->
	<div class="DivContentBodyContainerTextArea">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_MESSAGE'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<textarea name="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION; ?>" 
				  id="<?php echo ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION; ?>"
				  class="<?php echo $this->ReturnTickeDescriptionClass; ?>"
				  cols="2" rows="2"
				  onblur="ValidateNotNull(null, '<?php echo ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											   '');
						  ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
				  onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
				  title="<?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_MESSAGE'); ?>"
				  	><?php echo $this->InputValueTicketDescription; ?></textarea>
	</div>
	<!-- FORM_CAPTCHA_CONTACT -->
	<div class="DivContentBodyContainerCaptcha">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_CAPTCHA'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_CAPTCHA_CONTACT; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_CAPTCHA_CONTACT; ?>"
						   class="<?php echo $this->ReturnCaptchaClass; ?>"
						   title="<?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_CAPTCHA'); ?>" 
						   onblur="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FORM_CAPTCHA_CONTACT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FORM_CAPTCHA_CONTACT; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '', false);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
											 '');"
						   value="<?php echo $this->InputValueCaptcha; ?>" maxlength="8" />
		<img src="<?php echo REL_PATH . "Captcha/" . ConfigInfraTools::FORM_CAPTCHA_CONTACT ?>" 
			 id="ContactCapcha" alt="Captcha" 
			 class="DivContentBodyContainerCaptchaImage" />
	</div>
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
								   '', true);
					  ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::CONTACT_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::CONTACT_FORM_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('CONTACT_TEXT_SEND'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>