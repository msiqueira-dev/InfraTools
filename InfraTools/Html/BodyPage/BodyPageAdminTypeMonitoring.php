<!-- BODY PAGE ADMIN TYPE MONITORING -->
<div class="DivBody">
    <div class="DivContentBody">
    	<form name="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING; ?>" 
			  id="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING; ?>" method="post" >
			<!-- SUBMIT -->
			<div class="DivContentBodyOptions">
				<div class="DivContentBodyOptionsBox">
					<div class="DivContentBodyContainersBox">
						<input type="image" 
							   name="<?php echo ConfigInfraTools::FORM_SUBMIT_BACK; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_SUBMIT_BACK; ?>"
							   value="<?php echo ConfigInfraTools::FORM_SUBMIT_BACK; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_BACK'); ?>"
							   alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_BACK'); ?>"
							   src="<?php echo $this->Config->DefaultServerImage. 
											   'Icons/IconInfraToolsAdmin48x48.png'; ?>"
							   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdmin48x48Hover.png'; ?>'"
							   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdmin48x48.png'; ?>'" />
					</div>
					<div class="DivContentBodyContainersBox">
						<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN'); ?>" 
						   title="<?php echo $this->InstanceLanguageText->GetText('PAGE_ADMIN'); ?>">
							<img src="<?php echo $this->Config->DefaultServerImage. 
											   'Icons/IconInfraToolsAdmin.png'; ?>"
							   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdminHover.png'; ?>'"
							   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdmin.png'; ?>'" />
						</a>
					</div>
					<div class="DivContentBodyContainersBox">
						<input type="image" 
							   name="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING_SELECT; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING_SELECT; ?>"
							   value="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING_SELECT; ?>"
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
							   name="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING_REGISTER; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING_REGISTER; ?>"
							   value="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING_REGISTER; ?>"
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
							   name="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING_LIST; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING_LIST; ?>"
							   value="<?php echo ConfigInfraTools::FORM_TYPE_MONITORING_LIST; ?>"
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
		//TYPE_MONITORING LIST
		if($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_LIST)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_LIST)) . ".php");
		}
		//TYPE_MONITORING REGISTER
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_REGISTER)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_REGISTER)) . ".php");
		}
		//TYPE_MONITORING SELECT
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SELECT)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_SELECT)) . ".php");
		}
		//TYPE_MONITORING UPDATE
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_UPDATE)
		{
			 include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						  str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_UPDATE)) . ".php");
		}
		//TYPE_MONITORING VIEW
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_MONITORING_VIEW)) . ".php");
		}
		?>
    </div>
</div>