<!-- FORM TYPE ASSOC USER TEAM VIEW -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW; ?>" method="post" >
    <!-- TYPE_ASSOC_USER_TEAM_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTypeAssocUserTeamDescription;?></label>
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
    <div class="DivContentBodyContainer">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_UPDATE_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_UPDATE_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"/>
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_DELETE_SUBMIT; ?>" 
                   id="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_DELETE_SUBMIT; ?>"
                   class="DivContentBodySubmitBigger"
                   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DELETE'); ?>"
                   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_LIST_USERS; ?>" 
                   id="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_LIST_USERS; ?>"
                   class="DivContentBodySubmitBigger"
                   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LIST_USERS'); ?>"/>
    </div>
</form>
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))                        echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeAssocUserTeamDescriptionText)) echo $this->ReturnTypeAssocUserTeamDescriptionText; ?>
		<?php if(isset($this->ReturnText))                             echo $this->ReturnText; ?>
	</label>
</div>