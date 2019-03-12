<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
    	<?php if(isset($this->ReturnEmptyText))                       echo $this->ReturnEmptyText ?>
	    <?php if(isset($this->ReturnServiceActiveText))               echo $this->ReturnServiceActiveText; ?>
	    <?php if(isset($this->ReturnServiceCorporationText))          echo $this->ReturnServiceCorporationText; ?>
	    <?php if(isset($this->ReturnServiceCorporationCanChangeText)) echo $this->ReturnServiceCorporationCanChangeText; ?>
	    <?php if(isset($this->ReturnServiceDepartmentText))           echo $this->ReturnServiceDepartmentText; ?>
	    <?php if(isset($this->ReturnServiceDepartmentCanChangeText))  echo $this->ReturnServiceDepartmentCanChangeText; ?>
	    <?php if(isset($this->ReturnServiceDescriptionText))          echo $this->ReturnServiceDescriptionText; ?>
	    <?php if(isset($this->ReturnServiceNameText))                 echo $this->ReturnServiceNameText; ?>
	    <?php if(isset($this->ReturnServiceTypeText))                 echo $this->ReturnServiceTypeText; ?>
		<?php if(isset($this->ReturnText))                            echo $this->ReturnText; ?>
	</label>
</div>
<div class="DivClearFloat"></div>
<form name="<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_FORM; ?>" method="<?php echo $this->InputValueFormMethod ?>" >
	<!-- SERVICE_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_NAME'); ?></label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_NAME'); ?>
				</label>
			</div>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>" 
						   class="<?php echo $this->ReturnServiceNameClass; ?>"
						   onblur="ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
								    ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>',
								   		       'DivContentBodySubmitBigger',
								   		       '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);
								    ValidateSelectOption(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>',
								   		       'DivContentBodySubmitBigger',
								   		       '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);"
						   onchange="ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
								    ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>',
								               'DivContentBodySubmitBigger',
								               '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);
								    ValidateSelectOption(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>',
								   		       'DivContentBodySubmitBigger',
								   		       '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);"
						   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_NAME'); ?>"
						   value="<?php echo $this->InputValueServiceName; ?>" maxlength="45" />
	</div>
	<div class="DivClearFloat"></div>
	<!-- SERVICE_DESCRIPTION -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_DESCRIPTION'); ?></label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_DESCRIPTION'); ?>
				</label>
			</div>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>" 
						   id="<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>" 
						   class="<?php echo $this->ReturnServiceDescriptionClass; ?>"
						   onblur="ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
								   ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
				                   ValidateSelectOption(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>',
								   		       'DivContentBodySubmitBigger',
								   		       '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);"
						   onchange="ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
								    ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
								    ValidateSelectOption(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>',
								   		       'DivContentBodySubmitBigger',
								   		       '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);"
						   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_DESCRIPTION'); ?>"
						   value="<?php echo $this->InputValueServiceDescription; ?>" maxlength="200" />
	 </div>
	 <div class="DivClearFloat"></div>
	<!-- FIELD_SERVICE_TYPE -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_TYPE'); ?></label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<div class="DivContentBodyContainerValue">
			<select 
				name="<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>" 
				id="<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>"
				onchange="ValidateSelectOption(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>',
								   		       'DivContentBodySubmitBigger',
								   		       '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);
						  ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
					      ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
                          SetSelectColor('<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>');
                                               document.getElementById('<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>')
                                               .disabled = false;
				                               document.getElementById('<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>')
                                               .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
				class="SelectTypeService">
				<option <?php if ($this->InputValueServiceType == "" 
								  || $this->InputValueServiceType == ConfigInfraTools::FIELD_SEL_NONE) 
					echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
						<?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
				</option>
				<?php 
				if(is_array($this->ArrayInstanceInfraToolsTypeService))
				{
					foreach($this->ArrayInstanceInfraToolsTypeService as $key=>$infraToolsTypeService)
					{
						echo "<option ";
						  if($this->InputValueServiceType == $infraToolsTypeService->GetTypeServiceName())
						  {
							  echo "selected='selected' ";
						  }
						echo "value='" . $infraToolsTypeService->GetTypeServiceName() . "'>" . 
										 $infraToolsTypeService->GetTypeServiceName() 
									   . "</option>";
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="DivClearFloat"></div>
	<!-- FIELD_CORPORATION_NAME -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<select 
				name="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>" 
				id="<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>"
				class="SelectCorporation"
				onchange="ValidateSelectOption(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>',
								   		       'DivContentBodySubmitBigger',
								   		       '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);
						  ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
					      ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
                          SetSelectColor('<?php echo ConfigInfraTools::FIELD_CORPORATION_NAME; ?>');
                                               document.getElementById('<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>')
                                               .disabled = false;
				                               document.getElementById('<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>')
                                               .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
				<option <?php if ($this->InputValueServiceCorporation == "" 
								  || $this->InputValueServiceCorporation == ConfigInfraTools::FIELD_SEL_NONE) 
					echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
						<?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
				</option>
				<?php 
				if(is_array($this->ArrayInstanceInfraToolsCorporation))
				{
					foreach($this->ArrayInstanceInfraToolsCorporation as $key=>$infraToolsCorporation)
					{
						echo "<option ";
						  if($this->InputValueServiceCorporation == $infraToolsCorporation->GetCorporationName())
						  {
							  echo "selected='selected' ";
						  }
						echo "value='" . $infraToolsCorporation->GetCorporationName() . "'>" . 
										 $infraToolsCorporation->GetCorporationName() 
									   . "</option>";
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="DivClearFloat"></div>
	<!-- FIELD_SERVICE_CORPORATION_CAN_CHANGE -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_CORPORATION_CAN_CHANGE').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="checkbox" 
				   name="<?php echo ConfigInfraTools::FIELD_SERVICE_CORPORATION_CAN_CHANGE; ?>" 
				   value="<?php echo ConfigInfraTools::FIELD_SERVICE_CORPORATION_CAN_CHANGE; ?>"
					<?php echo $this->InputValueServiceCorporationCanChange; ?>
					/>
		</div>
	</div>
	<div class="DivClearFloat"></div>
	<!-- FIELD_DEPARTMENT_NAME -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<select 
				name="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>" 
				id="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>"
				class="SelectDepartment"
				onchange="ValidateSelectOption(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>',
								   		       'DivContentBodySubmitBigger',
								   		       '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);
						  ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
					      ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
											   '', true);
                          SetSelectColor('<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>');
                                               document.getElementById('<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>')
                                               .disabled = false;
				                               document.getElementById('<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>')
                                               .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
				<option <?php if ($this->InputValueServiceDepartment == "" 
								  || $this->InputValueServiceDepartment == ConfigInfraTools::FIELD_SEL_NONE) 
					echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
						<?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
				</option>
				<?php 
				if(is_array($this->ArrayInstanceInfraToolsDepartment))
				{
					foreach($this->ArrayInstanceInfraToolsDepartment as $key=>$infraToolsDepartment)
					{
						echo "<option ";
						  if($this->InputValueServiceDepartment == $infraToolsDepartment->GetDepartmentName())
						  {
							  echo "selected='selected' ";
						  }
						echo "value='" . $infraToolsDepartment->GetDepartmentName() . "'>" . 
										 $infraToolsDepartment->GetDepartmentName() 
									   . "</option>";
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="DivClearFloat"></div>
	<!-- FIELD_SERVICE_DEPARTMENT_CAN_CHANGE -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_DEPARTMENT_CAN_CHANGE').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="checkbox" 
				   name="<?php echo ConfigInfraTools::FIELD_SERVICE_DEPARTMENT_CAN_CHANGE; ?>" 
				   value="<?php echo ConfigInfraTools::FIELD_SERVICE_DEPARTMENT_CAN_CHANGE; ?>"
					<?php echo $this->InputValueServiceDepartmentCanChange; ?>
					/>
		</div>
	</div>
	<div class="DivClearFloat"></div>
	<!-- SERVICE ACTIVE -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_ACTIVE'); ?></label>
			<label>:</label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="checkbox" 
				   name="<?php echo ConfigInfraTools::FIELD_SERVICE_ACTIVE; ?>" 
				   value="<?php echo ConfigInfraTools::FIELD_SERVICE_ACTIVE; ?>"
					<?php echo $this->InputValueServiceActive; ?>
					/>
		</div>
	</div>
	<div class="DivClearFloat"></div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer"
		 onmouseover="ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								   '', true);
					  ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								   '', true);
					  ValidateSelectOption(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>',
								   		       'DivContentBodySubmitBigger',
								   		       '<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>',
								               '', true);">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_SERVICE_REGISTER_SB; ?>"
								 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>
<div class="DivClearFloat"></div>