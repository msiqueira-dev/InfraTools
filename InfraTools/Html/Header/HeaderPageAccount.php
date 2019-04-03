<div class="DivHeaderDivisionContainerLoginElement">
    <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ACCOUNT'); ?>" id="PageAccount" 
       title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_ACCOUNT_TITLE') ?>">
        <span>
            <?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_ACCOUNT_TEXT'); ?> 
        </span>
    </a>
</div>
<div class='DivHeaderDivisionContainerLoginSeparator'> <label> | </label> </div>
<div class="DivHeaderDivisionContainerLoginElement">
    <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_NOTIFICATION'); ?>" id="PageNotification" 
       title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_NOTIFICATION_TITLE') ?>">
       <img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsEmail26x26.png';?>"
            onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsEmail26x26Hover.png'; ?>'"
    		onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsEmail26x26.png'; ?>'" 
            title=" <?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_NOTIFICATION_TITLE'); ?>"
            alt="UnReadNotifications" />
    	<span>
            <?php echo "(" . $this->User->GetAssocUserNotificationCountUnRead() . ")" ?> 
        <span>
    </a>
</div>