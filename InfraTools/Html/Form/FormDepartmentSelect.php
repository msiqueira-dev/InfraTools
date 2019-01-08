<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCorporationNameText)) echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnDepartmentNameText))  echo $this->ReturnDepartmentNameText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM DEPARTMENT SELECT -->
<form name="<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT; ?>" method="post" >
	<!-- RADIO BUTTON -->
	<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<!-- FORM_FIELD_RADIO_DEPARTMENT_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT_NAME; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT_NAME; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_CORPORATION; ?>', 
												 false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>', 
														   'Department Name')"
					   title="<?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_NAME'); ?>"  
					   <?php echo $this->InputValueDepartmentNameRadio; ?>/>
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_NAME'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FORM_FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT; ?>"
					   id="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME; ?>"
					   value="<?php echo ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_CORPORATION; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>', 
														   'Corporation Name and Department Name')"
					   title="<?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_NAME_AND_CORPORATION_NAME'); ?>"  
					   <?php echo $this->InputValueDepartmentNameAndCorporationNameRadio; ?> />
				<div class="DivContentBodyContainerLabelIp">
					<i><?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_NAME_AND_CORPORATION_NAME'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- DEPARTMENT NAME -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_NAME'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>"
							   class="<?php echo $this->ReturnDepartmentNameClass; ?>"
							   onkeyup="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>',
												   '', 'false');
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>',
												 '');"
							   onblur="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>',
												 '');"
							   onchange="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('DEPARTMENT_NAME'); ?>" 
							   value="<?php echo $this->InputValueDepartmentName; ?>" maxlength="80" />
		</div>
		<!-- CORPORATION NAME -->
		<div class="Hidden DivContentBodyContainer" 
		     id="<?php echo ConfigInfraTools::DIV_RADIO_CORPORATION; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label><?php echo $this->InstanceLanguageText->GetText('CORPORATION').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<select 
					name="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>" 
					id="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>"
					class="<?php echo $this->ReturnCorporationNameClass; ?>"
					onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>');
							  document.getElementById('<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>')
											 .disabled = false;
							  document.getElementById('<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>')
											 .className = 'DivContentBodySubmit SubmitEnabled;'">
					<option <?php if ($this->InputValueCorporationName == "" 
									  || $this->InputValueCorporationName == ConfigInfraTools::FORM_FIELD_SELECT_NONE) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_SELECT_NONE; ?>" > 
							<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SELECT_NONE'); ?> 
					</option>
					<?php 
					if(is_array($this->ArrayInstanceInfraToolsCorporation))
					{
						foreach($this->ArrayInstanceInfraToolsCorporation as $key=>$corporation)
						{
							echo "<option ";
							  if($this->InputValueCorporationName == $corporation->GetCorporationName())
								echo "selected='selected' ";
							echo "value='" . $corporation->GetCorporationName() . "'>" . $corporation->GetCorporationName() 
										   . "</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateDepartmentName(null, '<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>',
								   '', true);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>