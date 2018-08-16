<!-- BODY PAGE ADMIN TYPE USER -->
<div class="DivBody">
    <div class="DivContentBody">
    	<form name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM; ?>" 
			  id="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM; ?>" method="post" >
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
							   name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT; ?>"
							   value="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT; ?>"
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
							   name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER; ?>"
							   value="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER; ?>"
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
							   name="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST; ?>"
							   value="<?php echo ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST; ?>"
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
		//LIST
		if($this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST)) . ".php");
		}
		//REGISTER
		elseif($this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER)) . ".php");
		}
		//SELECT
		elseif($this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT)) . ".php");
		}
		//UPDATE
		elseif($this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE)
		{
			 include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						  str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE)) . ".php");
		}
		//VIEW
		elseif($this->Page == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW)) . ".php");
		}
		?>
    </div>
</div>