<!-- BODY_PAGE_ADMIN_COUNTRY -->
<div class="DivBody">
    <div class="DivContentBody">
    	<form name="<?php echo ConfigInfraTools::FORM_COUNTRY; ?>" 
       	      id="<?php echo ConfigInfraTools::FORM_COUNTRY; ?>" method="post">
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
                               name="<?php echo ConfigInfraTools::FORM_COUNTRY_LIST; ?>"
                               id="<?php echo ConfigInfraTools::FORM_COUNTRY_LIST; ?>"
                               value="<?php echo ConfigInfraTools::FORM_COUNTRY_LIST; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
                               alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
                               src="<?php echo $this->Config->DefaultServerImage. 
                                               'Icons/IconInfraToolsList.png'; ?>"
                               onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
                                                            .'Icons/IconInfraToolsListHover.png'; ?>'"
                               onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
                                                            .'Icons/IconInfraToolsList.png'; ?>'"/>
                    </div>
            	</div>
            </div>
		</fom>
		<?php 
		//PAGE_ADMIN_COUNTRY_LIST
		if($this->PageBody == ConfigInfraTools::PAGE_ADMIN_COUNTRY_LIST)
		{
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
						 str_replace("PageAdmin", "", str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_COUNTRY_LIST)) 
						                                                   . ".php");
		}
        ?>
    </div>
</div>