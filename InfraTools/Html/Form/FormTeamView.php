<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
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
<!-- FORM_TEAM_VIEW -->
<form name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW; ?>" method="post" >
    <!-- FORM_FIELD_TEAM_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTeamId; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_TEAM_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTeamName; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_TEAM_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TEAM_DESCRIPTION').":"; ?></label>
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
 </form>
<!-- SUBMIT -->
<div class="DivContentBodyContainer">
	<!-- FORM_TEAM_VIEW_UPDATE -->
	<form name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_UPDATE; ?>" 
		  id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_UPDATE; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_UPDATE_SUBMIT; ?>" 
							 id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_UPDATE_SUBMIT; ?>"
							 class="DivContentBodySubmitBigger"
							 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"/>
	</form>
	<!-- FORM_TEAM_VIEW_DELETE -->
	<form name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_DELETE; ?>" 
		  id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_DELETE; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_DELETE_SUBMIT; ?>" 
				   id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_DELETE_SUBMIT; ?>"
				   class="DivContentBodySubmitBigger"
				   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DELETE'); ?>"
			   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
	</form>
	<!-- FORM_TEAM_VIEW_LIST_USERS -->
	<form name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_LIST_USERS; ?>" 
		  id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_LIST_USERS; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_LIST_USERS_SUBMIT; ?>" 
				   id="<?php echo ConfigInfraTools::FORM_TEAM_VIEW_LIST_USERS_SUBMIT; ?>"
				   class="DivContentBodySubmitBigger"
				   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LIST_USERS'); ?>"/>
	</form>
</div>