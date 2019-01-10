<!-- BODY_PAGE_ADMIN_SYSTEM_CONFIGURATION -->
<div class="DivBody">
    <div class="DivContentBody">
    	<form name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION; ?>" 
			  id="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION; ?>" method="post" >
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
							   name="<?php echo ConfigInfraTools::FORM_SUBMIT_BACK; ?>"
							   value="<?php echo ConfigInfraTools::FORM_SUBMIT_BACK; ?>"
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
							   name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT; ?>"
							   value="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_SELECT; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
							   alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
							   src="<?php echo $this->Config->DefaultServerImage. 
											   'Icons/IconInfraToolsFind.png'; ?>"
							   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsFindHover.png'; ?>'"
							   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsFind.png'; ?>'"/>
					</div>
					<div class="DivContentBodyContainersBox">
						<input type="image" 
							   name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER; ?>"
							   value="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_REGISTER; ?>"
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
							   name="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST; ?>"
							   value="<?php echo ConfigInfraTools::FORM_SYSTEM_CONFIGURATION_LIST; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LIST'); ?>"
							   alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LIST'); ?>"
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
		//PAGE_ADMIN_SYSTEM_CONFIGURATION_LIST
		if($this->PageBody == ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_LIST)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", 
																  ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_LIST)) . ".php");
		}
		//PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", 
																  ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER)) . ".php");
		}
		//PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", 
																  ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT)) . ".php");
		}
		//PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDATE
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDATE)
		{
			 include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						  str_replace("PageAdmin", "", str_replace("_", "", 
																   ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDATE)) . ".php");
		}
		//PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", 
																  ConfigInfraTools::PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW)) . ".php");
		}
		?>
    </div>
</div>