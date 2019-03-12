<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText)) echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnText))      echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM DEPARRTMENT VIEW -->
<form name="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW; ?>" method="post" >
    <!--FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueCorporationName; ?></label>
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_INITIALS -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_INITIALS').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueDepartmentInitials; ?></label>
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueDepartmentName; ?></label>
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
    <!-- SUBMIT -->
    <?php 
	if($this->GetCurrentPage() == ConfigInfraTools::PAGE_ADMIN_DEPARTMENT)
	{ 
	?>
		<div class="DivContentBodyContainer">
			<!-- FM_DEPARTMENT_VIEW_UPDT -->
			<form name="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_UPDT; ?>" 
				  id="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_UPDT; ?>" 
				  class="DivFormHorizontalButtons"
				  method="post" >
				<input type="submit" name="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_UPDT_SB; ?>" 
									 id="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_UPDT_SB; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"/>
			</form>
			<!-- FM_DEPARTMENT_VIEW_DEL -->
			<form name="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_DEL; ?>" 
				  id="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_DEL; ?>" 
				  class="DivFormHorizontalButtons"
				  method="post" >
				<input type="submit" name="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_DEL_SB; ?>" 
						   id="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_DEL_SB; ?>"
						   class="DivContentBodySubmitBigger"
						   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DEL'); ?>"
					   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
			</form>
			<!-- FM_DEPARTMENT_VIEW_LST_USERS -->
			<form name="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS; ?>" 
				  id="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS; ?>" 
				  class="DivFormHorizontalButtons"
				  method="post" >
				<input type="submit" name="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS_SB; ?>" 
						   id="<?php echo ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS_SB; ?>"
						   class="DivContentBodySubmitBigger"
						   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LST_USERS'); ?>"/>
			</form>
		</div>
    <?php
	}
	?>
</form>