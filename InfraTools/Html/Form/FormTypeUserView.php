<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass))  echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnText))  echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_TYPE_USER_VIEW -->
<form name="<?php echo ConfigInfraTools::FM_TYPE_USER_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FM_TYPE_USER_VIEW; ?>" method="post" >
    <!-- FIELD_TYPE_USER_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_TYPE_USER_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTypeUserDescription; ?></label>
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
	if($this->GetCurrentPage() == ConfigInfraTools::PAGE_ADMIN_TYPE_USER)
	{ 
	?>
		<div class="DivContentBodyContainer">
			<input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_USER_VIEW_UPDT_SB; ?>" 
									 id="<?php echo ConfigInfraTools::FM_TYPE_USER_VIEW_UPDT_SB; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"/>
			<input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_USER_VIEW_DEL_SB; ?>" 
					   id="<?php echo ConfigInfraTools::FM_TYPE_USER_VIEW_DEL_SB; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DEL'); ?>"
					   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
			<input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS; ?>" 
					   id="<?php echo ConfigInfraTools::FM_TYPE_USER_VIEW_LST_USERS; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LST_USERS'); ?>"/>
		</div>
	<?php
	}
	?>
</form>