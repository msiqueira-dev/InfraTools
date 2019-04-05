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
<!-- FM_DEPARTMENT_SEL_FORM -->
<form name="<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_FORM; ?>" 
	  id="<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_FORM; ?>" method="post" >
	<!-- RADIO BUTTON -->
	<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_RADIO; ?>">
		<!-- FIELD_RADIO_DEPARTMENT_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_RADIO_DEPARTMENT; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_RADIO_DEPARTMENT_NAME; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_RADIO_DEPARTMENT_NAME; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_CORPORATION; ?>', 
												 false);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>', 
														   'Department Name')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME'); ?>"  
					   <?php echo $this->InputValueDepartmentNameRadio; ?>/>
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo ConfigInfraTools::FIELD_RADIO_DEPARTMENT; ?>"
					   id="<?php echo ConfigInfraTools::FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME; ?>"
					   value="<?php echo ConfigInfraTools::FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME; ?>"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('<?php echo ConfigInfraTools::DIV_RADIO_CORPORATION; ?>', 
												 true);
								 MakeInputVisible('<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>');
								 ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_RADIO; ?>', 
														   'DivContentBodySubmit', 
														   '<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>', 
														   'Corporation Name and Department Name')"
					   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME'); ?>"  
					   <?php echo $this->InputValueDepartmentNameAndCorporationNameRadio; ?> />
				<div class="DivContentBodyContainerLabelIp">
					<i><?php echo $this->InstanceLanguageText->GetText('FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME'); ?></i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_DEPARTMENT_NAME -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>"
							   class="DivContentBodyContainerInputText <?php echo $this->ReturnDepartmentNameClass; ?>"
							   onkeyup="ValidateDepartmentName('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>',
												   '', 'false');"
							   onblur="ValidateDepartmentName('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>',
												   '', true);"
							   onchange="ValidateDepartmentName('DivContentBodyContainerInputText', 
											       '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>',
												   '', true);"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME'); ?>" 
							   value="<?php echo $this->InputValueDepartmentName; ?>" maxlength="80" />
		</div>
		<!-- FIELD_CORPORATION_NAME -->
		<div class="<?php echo $this->InputValueCorporationNameHidden; ?> DivContentBodyContainer" 
		     id="<?php echo ConfigInfraTools::DIV_RADIO_CORPORATION; ?>">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<select 
					name="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>" 
					id="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>"
					class="DivContentBodyContainerInputText <?php echo $this->ReturnCorporationNameClass . 
	                       $this->InputValueCorporationNameSelectCss; ?>"
					onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>');
							  document.getElementById('<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>')
											 .disabled = false;
							  document.getElementById('<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>')
											 .className = 'DivContentBodySubmit SubmitEnabled;'">
					<option <?php if ($this->InputValueCorporationName == "" 
									  || $this->InputValueCorporationName == ConfigInfraTools::FIELD_SEL_NONE) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
							<?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
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
		 onmouseover="ValidateDepartmentName('DivContentBodyContainerInputText', 
							       '<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>',
								   '', true);">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_DEPARTMENT_SEL_SB; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>