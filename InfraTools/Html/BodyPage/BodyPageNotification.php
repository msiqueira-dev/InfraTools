<!-- BODY_PAGE_NOTIFICATION -->
<div class="DivBody">
    <div class="DivContentBody">
		<div class="DivContentBodySecondTitle">
			<img src="<?php echo $this->Config->DefaultServerImage. 'Icons/IconInfraToolsSupport136x90.png'; ?>" 
				 alt="IconInfraToolsSearch" class="DivContentBodySecondTitleImage" width="136" height="90"/>
		</div>
		<div class="DivContentBodySecondTitleLine"></div>
		<?php include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("Page", "", str_replace("_", "", ConfigInfraTools::PAGE_NOTIFICATION_LST)) . ".php"); ?>
	</div>
</div>