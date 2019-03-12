<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeServiceNameText)) echo $this->ReturnTypeServiceNameText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_TYPE_SERVICE_SEL_FORM -->
<form name="<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_FORM; ?>" method="post" >
	<!-- FIELD_TYPE_SERVICE_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_TYPE_SERVICE_NAME'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_TYPE_SERVICE_NAME; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_TYPE_SERVICE_NAME; ?>"
						   class="DivContentBodyContainerInputText <?php echo $this->ReturnTypeServiceNameClass; ?>"
						   onkeyup="ValidateDescription('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FIELD_TYPE_SERVICE_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>',
											 '');"
						   onblur="ValidateDescription('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FIELD_TYPE_SERVICE_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>',
											 '');"
						   onchange="ValidateDescription('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FIELD_TYPE_SERVICE_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_TYPE_SERVICE_NAME'); ?>" 
						   value="<?php echo $this->InputValueTypeServiceName; ?>" maxlength="80" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateDescription('DivContentBodyContainerInputText', 
							       '<?php echo ConfigInfraTools::FIELD_TYPE_SERVICE_NAME; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_TYPE_SERVICE_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>