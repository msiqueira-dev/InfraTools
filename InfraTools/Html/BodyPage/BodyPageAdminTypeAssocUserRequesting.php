<!-- BODY_PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING -->
<div class="DivBody">
    <div class="DivContentBody">
    	<form name="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING; ?>" 
			  id="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING; ?>" method="post" >
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
							   name="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING_SEL; ?>"
							   id="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING_SEL; ?>"
							   value="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING_SEL; ?>"
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
							   name="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING_REGISTER; ?>"
							   id="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING_REGISTER; ?>"
							   value="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING_REGISTER; ?>"
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
							   name="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING_LST; ?>"
							   id="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING_LST; ?>"
							   value="<?php echo ConfigInfraTools::FM_TYPE_ASSOC_USER_REQUESTING_LST; ?>"
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
		//TYPE_ASSOC_USER_REQUESTING LIST
		if($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_LST)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_LST)) . ".php");
		}
		//TYPE_ASSOC_USER_REQUESTING REGISTER
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_REGISTER)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_REGISTER)) . ".php");
		}
		//TYPE_ASSOC_USER_REQUESTING SELECT
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_SEL)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_SEL)) . ".php");
		}
		//TYPE_ASSOC_USER_REQUESTING UPDATE
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_UPDT)
		{
			 include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						  str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_UPDT)) . ".php");
		}
		//TYPE_ASSOC_USER_REQUESTING_VIEW
		elseif($this->PageBody == ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_VIEW)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_REQUESTING_VIEW)) . ".php");
		}
		?>
    </div>
</div>