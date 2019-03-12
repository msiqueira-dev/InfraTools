<!-- BODY_PAGE_ADMIN_TYPE_STATUS_TICKET -->
<div class="DivBody">
    <div class="DivContentBody">
    	<form name="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET; ?>" 
			  id="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET; ?>" method="post" >
			<!-- SUBMIT -->
			<div class="DivContentBodyOptions">
				<div class="DivContentBodyOptionsBox">
					<div class="DivContentBodyContainersBox">
						<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN'); ?>" 
						   title="<?php echo $this->InstanceLanguageText->GetText('PAGE_ADMIN'); ?>">
							<img src="<?php echo $this->Config->DefaultServerImage. 
											   'Icons/IconInfraToolsAdmin48x48.png'; ?>"
							   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdmin48x48Hover.png'; ?>'"
							   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdmin48x48.png'; ?>'" />
						</a>
					</div>
					<div class="DivContentBodyContainersBox">
						<input type="image" 
							   name="<?php echo ConfigInfraTools::FM_SB_BACK; ?>"
							   value="<?php echo ConfigInfraTools::FM_SB_BACK; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_BACK'); ?>"
							   alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_BACK'); ?>"
							   src="<?php echo $this->Config->DefaultServerImage. 
											   'Icons/IconInfraToolsArrowBack.png'; ?>"
							   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsArrowBackHover.png'; ?>'"
							   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsArrowBack.png'; ?>'"/>
					</div>
					<div class="DivContentBodyContainersBox">
						<input type="image" 
							   name="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET_SEL; ?>"
							   id="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET_SEL; ?>"
							   value="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET_SEL; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
							   alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SEL'); ?>"
							   src="<?php echo $this->Config->DefaultServerImage. 
											   'Icons/IconInfraToolsFind.png'; ?>"
							   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsFindHover.png'; ?>'"
							   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsFind.png'; ?>'"/>
					</div>
					<div class="DivContentBodyContainersBox">
						<input type="image" 
							   name="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET_REGISTER; ?>"
							   id="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET_REGISTER; ?>"
							   value="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET_REGISTER; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSERT'); ?>"
							   alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSERT'); ?>"
							   src="<?php echo $this->Config->DefaultServerImage. 
											   'Icons/IconInfraToolsAdd.png'; ?>"
							   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAddHover.png'; ?>'"
							   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdd.png'; ?>'"/>
					</div>
					<div class="DivContentBodyContainersBox">
						<input type="image" 
							   name="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET_LST; ?>"
							   id="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET_LST; ?>"
							   value="<?php echo ConfigInfraTools::FM_TYPE_STATUS_TICKET_LST; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LST'); ?>"
							   alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LST'); ?>"
							   src="<?php echo $this->Config->DefaultServerImage. 
											   'Icons/IconInfraToolsList.png'; ?>"
							   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsListHover.png'; ?>'"
							   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsList.png'; ?>'"/>
					</div>
				</div>
			</div>
		</form>
		<?php 
		//PAGE_ADMIN_TYPE_STATUS_TICKET_LST
		if($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_LST)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", 
																  ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_LST)) . ".php");
		}
		//PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", 
																  ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER)) . ".php");
		}
		//PAGE_ADMIN_TYPE_STATUS_TICKET_SEL
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL)) . ".php");
		}
		//PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT)
		{
			 include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						  str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT))                                            . ".php");
		}
		//PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", 
																  ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW)) . ".php");
		}
		?>
    </div>
</div>