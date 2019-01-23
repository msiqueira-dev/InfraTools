<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText)) echo $this->ReturnEmptyText ?>	
		<?php if(isset($this->ReturnText))      echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_SERVICE_VIEW -->
<form name="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW; ?>" 
      class="DivFormServiceView" method="<?php echo $this->InputValueFormMethod ?>" >
    <!-- FORM_FIELD_SERVICE_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceId; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_SERVICE_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceName; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_SERVICE_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceDescription; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_SERVICE_TYPE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_TYPE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceType; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_CORPORATION_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_CORPORATION_NAME').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<div>
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceCorporation; ?></label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img   src="<?php echo $this->InputValueServiceCorporationActive; ?>"
					   alt="ServiceCorporation" width="20" height="20" />
			</div>
		</div>
	</div>
	<div class="DivClearFloat"></div>
    <!-- FORM_FIELD_DEPARTMENT_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_DEPARTMENT_NAME').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<div>
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueServiceDepartment; ?></label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img   src="<?php echo $this->InputValueServiceDepartmentActive; ?>"
					   alt="ServiceDepartment" width="20" height="20" />
			</div>
		</div>
	</div>
	<div class="DivClearFloat"></div>
    <!-- FORM_FIELD_SERVICE_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_ACTIVE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <img src="<?php echo $this->InputValueServiceActive; ?>" alt="ServiceDepartment" width="20" height="20" />
        </div>
    </div>
     <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTER_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegisterDate; ?></label>
        </div>
    </div>
</form>
<?php if($this->InputValueTypeAssocUserServiceId <= 2) 
{
?>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer">
		<!-- FORM SERVICE VIEW UPDATE -->
		<form name="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE; ?>" 
			  id="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE; ?>" 
			  class="DivFormHorizontalButtons"
			  method="post" >
			  <input type="submit" name="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE_SUBMIT; ?>" 
					 id="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE_SUBMIT; ?>"
					 class="DivContentBodySubmitBigger"
					 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"/>
			  <input type="hidden" name="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE_HIDDEN_ID; ?>" 
					 id="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_UPDATE_HIDDEN_ID; ?>"
					 value="<?php echo $this->InputValueServiceId; ?>"/>
		</form>
		<!-- FORM SERVICE VIEW DELETE -->
		<form name="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_DELETE; ?>" 
			  id="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_DELETE; ?>" 
			  class="DivFormHorizontalButtons"
			  method="post" >
			  <input type="submit" name="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_SUBMIT; ?>" 
					 id="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_SUBMIT; ?>"
					 class="DivContentBodySubmitBigger"
					 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DELETE'); ?>"
					 onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
			  <input type="hidden" name="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID; ?>" 
					 id="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_DELETE_HIDDEN_ID; ?>"
					 value="<?php echo $this->InputValueServiceId; ?>"/>
		</form>
		<?php
 		if($this->User->CheckSuperUser())
		{?>
			<!-- FORM_SERVICE_VIEW_LIST_USERS -->
			<form name="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS; ?>" 
				  id="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS; ?>" 
				  class="DivFormHorizontalButtons"
				  method="post" >
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_SUBMIT; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_SERVICE_VIEW_LIST_USERS_SUBMIT; ?>"
						   class="DivContentBodySubmitBigger"
						   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LIST_USERS'); ?>"/>
			</form>
		<?php
		}?>
	</div>
<?php
}
?>
<div class="DivClearFloat"></div>