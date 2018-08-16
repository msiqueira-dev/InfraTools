<form name="<?php echo ConfigInfraTools::FORM_CORPORATION; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_CORPORATION; ?>" method="post" >
	<!-- SUBMIT -->
	<div class="DivContentBodyOptions">
		<div class="DivContentBodyOptionsBox">
			<div class="DivContentBodyContainersBox">
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
					   name="<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT; ?>"
					   value="<?php echo ConfigInfraTools::FORM_CORPORATION_SELECT; ?>"
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
					   name="<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER; ?>"
					   value="<?php echo ConfigInfraTools::FORM_CORPORATION_REGISTER; ?>"
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
					   name="<?php echo ConfigInfraTools::FORM_CORPORATION_LIST; ?>"
					   value="<?php echo ConfigInfraTools::FORM_CORPORATION_LIST; ?>"
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