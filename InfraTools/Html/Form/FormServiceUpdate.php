<!-- DIV_RETURN -->	
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
<!-- FORM SERVICE UPDATE -->
<form name="<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>" method="<?php echo $this->InputValueFormMethod ?>" >
    <!-- FIELD_SERVICE_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceId; ?></label>
        </div>
    </div>
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
											   '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											 '');"
						   onchange="ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											 '');"
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
											   '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											 '');"
						   onchange="ValidateDescription(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_DESCRIPTION; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_DESCRIPTION'); ?>"
						   value="<?php echo $this->InputValueServiceDescription; ?>" maxlength="200" />
	 </div>
	 <div class="DivClearFloat"></div>
    <!-- FIELD_SERVICE_TYPE -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_TYPE').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<select 
				name="<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>" 
				id="<?php echo ConfigInfraTools::FIELD_SERVICE_TYPE; ?>"
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
    <?php 
	if(isset($this->InputServiceCorporation))
	{
		 if($this->InputServiceCorporation != NULL) 
		 {
			?>
			<!-- FIELD_CORPORATION_NAME -->
			<div class="DivContentBodyContainer">
				<div class="DivContentBodyContainerLabel">
					<label><?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME').":"; ?></label>
				</div>
				<div class="DivContentBodyContainerValue">
					<div>
						<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceCorporation; ?>
						</label>
					</div>
					<div class="DivContentBodyContainerSubmitImage">
						<img   src="<?php echo $this->InputValueServiceCorporationActive; ?>"
							   alt="ServiceCorporation" width="20" height="20" />
					</div>
				</div>
			</div>
			<div class="DivClearFloat"></div>
		<?php
		 }	
	}
	?>
    <?php 
	if(isset($this->InputServiceDepartment))
	{
		 if($this->InputServiceDepartment != NULL) 
		 {
			?>
			<!-- FIELD_DEPARTMENT_NAME -->
			<div class="DivContentBodyContainer">
				<div class="DivContentBodyContainerLabel">
					<label><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME').":"; ?></label>
				</div>
				<div class="DivContentBodyContainerValue">
					<div>
						<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceDepartment; ?>
						</label>
					</div>
					<div class="DivContentBodyContainerSubmitImage">
						<img   src="<?php echo $this->InputValueServiceDepartmentActive; ?>"
							   alt="ServiceDepartment" width="20" height="20" />
					</div>
				</div>
			</div>
			<div class="DivClearFloat"></div>
			<?php
		 }	
	}
	?>
    <!-- SERVICE ACTIVE -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_SERVICE_ACTIVE').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="checkbox" 
				   name="<?php echo ConfigInfraTools::FIELD_SERVICE_ACTIVE; ?>" 
				   value="<?php echo ConfigInfraTools::FIELD_SERVICE_ACTIVE; ?>"
					<?php echo $this->InputValueServiceActive; ?>
				   onchange="ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
								   '');"
					/>
		</div>
	</div>
     <!-- SERVICE REGISTER DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTER_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegisterDate; ?></label>
        </div>
    </div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer"
		 onmouseover="ValidateServiceName(null, '<?php echo ConfigInfraTools::FIELD_SERVICE_NAME; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
								   '', true);
					  ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_FORM; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>" 
								 id="<?php echo ConfigInfraTools::FM_SERVICE_UPDT_SB; ?>"
								 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
		<input type="submit" name="<?php echo ConfigInfraTools::FM_SERVICE_UPDT_CANCEL; ?>" 
								 id="<?php echo ConfigInfraTools::FM_SERVICE_UPDT_CANCEL; ?>"
								 class="DivContentBodySubmitBigger"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
	</div>
</form>
<div class="DivClearFloat"></div>