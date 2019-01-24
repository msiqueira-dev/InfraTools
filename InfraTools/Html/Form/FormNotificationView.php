<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnText))             echo $this->ReturnText; ?>
		<?php if(isset($this->ReturnNotificationId))   echo $this->ReturnNotificationId; ?>
		<?php if(isset($this->ReturnNotificationText)) echo $this->ReturnNotificationText; ?>
		<?php if(isset($this->ReturnNotificationActive)) echo $this->ReturnNotificationActive; ?>
	</label>
</div>
<!-- FORM_NOTIFICATION_VIEW -->
<form name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW; ?>" method="post" >
    <!-- FORM_FIELD_NOTIFICATION_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_NOTIFICATION_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNotificationId; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_NOTIFICATION_TEXT -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_NOTIFICATION_TEXT').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNotificationText; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_NOTIFICATION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_NOTIFICATION_ACTIVE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">
				<?php
						if($this->InstanceNotification->GetNotificationActive())
							echo "<img src='"   . $this->Config->DefaultServerImage.'Icons/IconInfraToolsVerified.png' . "' 
                                   name='"  . ConfigInfraTools::FORM_FIELD_NOTIFICATION_ACTIVE . "'
                                   alt='NotificationActive' width='20' height='20' />";
						else
							echo "<img src='"   . $this->Config->DefaultServerImage.'Icons/IconInfraToolsNotVerified.png' . "' 
                                   name='"  . ConfigInfraTools::FORM_FIELD_NOTIFICATION_ACTIVE . "'
                                   alt='NotificationDeactive' width='20' height='20' />";
				?>
        	</label>
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
	<!-- FORM_NOTIFICATION_VIEW_UPDATE -->
	<form name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_UPDATE; ?>" 
		  id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_UPDATE; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_UPDATE_SUBMIT; ?>" 
							 id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_UPDATE_SUBMIT; ?>"
							 class="DivContentBodySubmitBigger"
							 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"/>
	</form>
	<!-- FORM_NOTIFICATION_VIEW_DELETE -->
	<form name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_DELETE; ?>" 
		  id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_DELETE; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_DELETE_SUBMIT; ?>" 
				   id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_DELETE_SUBMIT; ?>"
				   class="DivContentBodySubmitBigger"
				   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DELETE'); ?>"
			   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
	</form>
	<!-- FORM_NOTIFICATION_VIEW_LIST_USERS -->
	<form name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_LIST_USERS; ?>" 
		  id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_LIST_USERS; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_LIST_USERS_SUBMIT; ?>" 
				   id="<?php echo ConfigInfraTools::FORM_NOTIFICATION_VIEW_LIST_USERS_SUBMIT; ?>"
				   class="DivContentBodySubmitBigger"
				   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LIST_USERS'); ?>"/>
	</form>
</div>