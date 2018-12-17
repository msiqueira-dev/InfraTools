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
<form name="<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>" 
      id="<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>" method="POST" >
    <!-- SERVICE ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceId; ?></label>
        </div>
    </div>
    <!-- SERVICE_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label><?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?></label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?>
				</label>
			</div>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>" 
						   class="<?php echo $this->ReturnServiceNameClass; ?>"
						   onblur="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											 '');"
						   onchange="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_NAME'); ?>"
						   value="<?php echo $this->InputValueServiceName; ?>" maxlength="45" />
	</div>
	<div class="DivClearFloat"></div>
    <!-- SERVICE_DESCRIPTION -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label><?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_DESCRIPTION'); ?></label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_DESCRIPTION'); ?>
				</label>
			</div>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION; ?>" 
						   class="<?php echo $this->ReturnServiceDescriptionClass; ?>"
						   onblur="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											 '');"
						   onchange="ValidateDescription(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION; ?>',
											   'DivContentBodySubmitBigger',
											   '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>',
											 'DivContentBodySubmitBigger',
											 '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_DESCRIPTION'); ?>"
						   value="<?php echo $this->InputValueServiceDescription; ?>" maxlength="200" />
	 </div>
	 <div class="DivClearFloat"></div>
    <!-- TYPE SERVICE -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('SERVICE_TYPE').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<select 
				name="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_TYPE; ?>" 
				id="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_TYPE; ?>"
				class="SelectTypeService">
				<option <?php if ($this->InputValueServiceType == "" 
								  || $this->InputValueServiceType == ConfigInfraTools::FORM_SELECT_NONE) 
					echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_SELECT_NONE; ?>" > 
						<?php echo $this->InstanceLanguageText->GetText('FORM_SELECT_NONE'); ?> 
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
			<!-- SERVICE CORPORATION -->
			<div class="DivContentBodyContainer">
				<div class="DivContentBodyContainerLabel">
					<label><?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_CORPORATION').":"; ?></label>
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
			<!-- SERVICE DEPARTMENT -->
			<div class="DivContentBodyContainer">
				<div class="DivContentBodyContainerLabel">
					<label><?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_DEPARTMENT').":"; ?></label>
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
			<label><?php echo $this->InstanceLanguageText->GetText('SERVICE_FIELD_ACTIVE').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="checkbox" 
				   name="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE; ?>" 
				   value="<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE; ?>"
					<?php echo $this->InputValueServiceActive; ?>
				   onchange="ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
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
		 onmouseover="ValidateServiceName(null, '<?php echo ConfigInfraTools::FORM_FIELD_SERVICE_NAME; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
								   '', true);
					  ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_SUBMIT; ?>"
								 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_CANCEL; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_SERVICE_UPDATE_CANCEL; ?>"
								 class="DivContentBodySubmitBigger"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
	</div>
</form>
<div class="DivClearFloat"></div>