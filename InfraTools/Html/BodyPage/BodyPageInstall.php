<!-- BODY_PAGE_INSTALL -->
<div class="DivBody">
    <div class="DivContentBody">
    <div class="DivContentBodySecondTitle">
			<img src="<?php echo $this->Config->DefaultServerImage. 'Icons/IconInfraToolsInstall100x100.png'; ?>" 
				 alt="IconInfraToolsInstall" class="DivContentBodySecondTitleImage" width="100" height="100"/>
		</div>
		<div class="DivContentBodySecondTitleLine"></div>
    	<?php
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("Page", "", str_replace("_", "", ConfigInfraTools::PAGE_INSTALL)) . ".php");
		?>
	</div>
</div>