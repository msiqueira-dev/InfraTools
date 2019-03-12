<!-- BODY_PAGE_INSTALL -->
<div class="DivBody">
    <div class="DivContentBody">
    <div class="DivContentBodySecondTitle">
    		<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_INSTALL') ?>" title=''>
				<img src="<?php echo $this->Config->DefaultServerImage. 'Icons/IconInfraToolsInstall100x100.png'; ?>" 
					 onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsInstall100x100Hover.png'; ?>'"
					 onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
													.'Icons/IconInfraToolsInstall100x100.png'; ?>'" 
					 alt="Install" />
			</a>
		</div>
		<div class="DivContentBodySecondTitleLine"></div>
    	<?php
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("Page", "", str_replace("_", "", ConfigInfraTools::PAGE_INSTALL)) . ".php");
		?>
	</div>
</div>