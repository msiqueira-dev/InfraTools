<div class="DivHeaderDivisionContainerLoginElement">
    <a href="javascript: SubmitPostBackFormForm('<?php echo ConfigInfraTools::FORM_FIELD_HEADER_LOG_OUT; ?>')" 
       title="" id="ButtonLogOut" >
       <img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsLogOut.png';?>"
            onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsLogOutHover.png'; ?>'"
    		onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsLogOut.png'; ?>'" 
            title=" <?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_LOGOUT'); ?>"
            alt="LogOut" />
    </a>
</div>