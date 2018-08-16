<!-- FORM TEAM VIEW -->
<form name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW; ?>" method="post" >
    <!-- TEAM_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('TEAM_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTeamId; ?></label>
        </div>
    </div>
    <!-- TEAM_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('TEAM_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTeamName; ?></label>
        </div>
    </div>
    <!-- TEAM_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('TEAM_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTeamDescription; ?></label>
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
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_UPDATE_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_UPDATE_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"/>
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_DELETE_SUBMIT; ?>" 
                   id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_DELETE_SUBMIT; ?>"
                   class="DivContentBodySubmitBigger"
                   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DELETE'); ?>"
                   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_MANAGE_MEMBERS_SUBMIT; ?>" 
                   id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_MANAGE_MEMBERS_SUBMIT; ?>"
                   class="DivContentBodySubmitBigger"
                   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_MANAGE_MEMBERS'); ?>"/>
    </div>
</form>
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
		<?php if(isset($this->ReturnTeamNameText))        echo $this->ReturnTeamNameText; ?>
		<?php if(isset($this->ReturnTeamDescriptionText)) echo $this->ReturnTeamDescriptionText; ?>
	</label>
</div>