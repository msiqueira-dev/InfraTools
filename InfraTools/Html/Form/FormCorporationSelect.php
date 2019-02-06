<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCorporationNameText)) echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_CORPORATION_SEL_FORM -->
<form name="<?php echo ConfigInfraTools::FM_CORPORATION_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_CORPORATION_SEL_FORM; ?>" method="post" >
	<!-- FIELD_CORPORATION_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>"
						   class="DivContentBodyContainerInputText <?php echo $this->ReturnCorporationNameClass; ?>"
						   onkeyup="ValidateCorporation('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>',
											   '', 'false');
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>',
											 '');"
						   onblur="ValidateCorporation('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>',
											 '');"
						   onchange="ValidateCorporation('DivContentBodyContainerInputText', 
										       '<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_FORM; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME'); ?>" 
						   value="<?php echo $this->InputValueCorporationName; ?>" maxlength="80" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateCorporation('DivContentBodyContainerInputText', 
							       '<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_FORM; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_CORPORATION_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>