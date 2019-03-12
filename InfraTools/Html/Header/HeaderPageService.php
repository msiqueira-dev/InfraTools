<div class="DivHeaderContainerMenuPageService" id="DivHeaderContainerMenuPageService"
     onmouseover="
       var $image = document.getElementById('DivHeaderContainerMenuPageServiceTop').className = 'DivHeaderContainerMenuPageServiceTopOrange';
       var $image = document.getElementById('DivHeaderContainerMenuPageService').className    = 'DivHeaderContainerMenuPageServiceHover';
       ShowOrHideElement('DivHeaderService', true);"
     onmouseout="
       var $image = document.getElementById('DivHeaderContainerMenuPageServiceTop').className = 'DivHeaderContainerMenuPageServiceTop';
       var $image = document.getElementById('DivHeaderContainerMenuPageService').className = 'DivHeaderContainerMenuPageService';
       ShowOrHideElement('DivHeaderService', false);" >
    <div id="DivHeaderContainerMenuPageServiceTop" class="DivHeaderContainerMenuPageServiceTop"></div>
    <div class="DivHeaderContainerMenuLink">
        <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE'); ?>" id="PageService" 
           title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SERVICE_TITLE'); ?>">
        	<span class="HeaderSpace">
            </span>
            <span> 
				<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SERVICE_TEXT'); ?> 
           	</span>
        </a>
	</div>
	<div class="Hidden DivHeaderContainerMenuLinkSub" id="DivHeaderService">
		<div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_SEL'); ?>" id="PageService" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_SEL'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('PAGE_SERVICE_SEL'); ?> 
				</span>
			</a>
		</div>
		<div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_REGISTER'); ?>" id="PageService" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_REGISTER'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('PAGE_SERVICE_REGISTER'); ?> 
				</span>
			</a>
		</div>
        <div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST'); ?>" id="PageService" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST'); ?> 
				</span>
			</a>
		</div>
       	<div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_CORPORATION'); ?>" id="PageService" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_CORPORATION'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST_BY_CORPORATION'); ?> 
				</span>
			</a>
		</div>
	    <div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_DEPARTMENT'); ?>" id="PageService" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_DEPARTMENT'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST_BY_DEPARTMENT'); ?> 
				</span>
			</a>
		</div>
        <div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE'); ?>" id="PageService" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE'); ?> 
				</span>
			</a>
		</div>
        <div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_TYPE_SERVICE'); ?>" id="PageService" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SERVICE_LST_BY_TYPE_SERVICE'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('PAGE_SERVICE_LST_BY_TYPE_SERVICE'); ?> 
				</span>
			</a>
		</div>
	</div>
</div>