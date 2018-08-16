<!-- FORM TYPE USER VIEW -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_USER_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_USER_VIEW; ?>" method="post" >
    <!-- ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('TYPE_USER_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTypeUserId; ?></label>
        </div>
    </div>
    <!-- DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('TYPE_USER_DESCRIPTION').":"; ?></label>
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
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_USER_VIEW_UPDATE_SUBMIT; ?>" 
									 id="<?php echo ConfigInfraTools::FORM_TYPE_USER_VIEW_UPDATE_SUBMIT; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"/>
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_USER_VIEW_DELETE_SUBMIT; ?>" 
					   id="<?php echo ConfigInfraTools::FORM_TYPE_USER_VIEW_DELETE_SUBMIT; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DELETE'); ?>"
					   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_USER_VIEW_SELECT_USERS_SUBMIT; ?>" 
					   id="<?php echo ConfigInfraTools::FORM_TYPE_USER_VIEW_SELECT_USERS_SUBMIT; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LIST_USERS'); ?>"/>
		</div>
	<?php
	}
	?>
</form>
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass))  echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnText))  echo $this->ReturnText; ?>
	</label>
</div>