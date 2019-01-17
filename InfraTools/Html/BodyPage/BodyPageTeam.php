<!-- BODY_PAGE_TEAM -->
<div class="DivBody">
    <div class="DivContentBody">
		<div class="DivContentBodySecondTitle">
			<img src="<?php echo $this->Config->DefaultServerImage. 'Icons/IconInfraToolsTeam136x90.png'; ?>" 
				 alt="IconInfraToolsSearch" class="DivContentBodySecondTitleImage" width="136" height="90"/>
		</div>
		<div class="DivContentBodySecondTitleLine"></div>
		<div class="DivContentBodyOptions">
			<div class="DivContentBodyOptionsBox">
				<div class="DivContentBodyContainersBox">
					<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_TEAM_SELECT'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_TEAM_SELECT') ?>">
						<div class="DivContentBodyContainersBoxIcon">
							<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsFind.png';?>"
							     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsFindHover.png'; ?>'"
    			                 onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsFind.png'; ?>'" />
						</div>
						<div class="DivContentBodyContainersBoxText">
							<i>
								<?php echo $this->InstanceLanguageText->GetText('OPERATION_SEARCH'); ?>
							</i>
						</div>
					</a>
				</div>
				<div class="DivContentBodyContainersBox">
					<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_TEAM_REGISTER'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_TEAM_REGISTER') ?>">
						<div class="DivContentBodyContainersBoxIcon">
							<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsAdd.png';?>"
							     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAddHover.png'; ?>'"
    			                 onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdd.png'; ?>'" />
						</div>
						<div class="DivContentBodyContainersBoxText">
							<i>
								<?php echo $this->InstanceLanguageText->GetText('OPERATION_REGISTER'); ?>
							</i>
						</div>
					</a>
				</div>
				<div class="DivContentBodyContainersBox">
					<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_TEAM_LIST'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_TEAM_LIST') ?>">
						<div class="DivContentBodyContainersBoxIcon">
							<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsList.png';?>"
							     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsListHover.png'; ?>'"
    			                 onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsList.png'; ?>'" />
						</div>
						<div class="DivContentBodyContainersBoxText">
							<i>
								<?php echo $this->InstanceLanguageText->GetText('OPERATION_LIST'); ?>
							</i>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>