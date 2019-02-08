<div class="DivHeaderDivisionContainerLoginElement">
    <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ACCOUNT'); ?>" id="PageAccount" 
       title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_ACCOUNT_TITLE') ?>">
        <span>
            <?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_ACCOUNT_TEXT'); ?> 
        </span>
    </a>
    <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_NOTIFICATION'); ?>" id="PageNotification" 
       title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_NOTIFICATION_TITLE') ?>">
        <span>
            <?php echo "(" . count($this->User->GetArrayAssocUserNotificationUnRead()) . ")" ?> 
        <span>
    </a>
</div>