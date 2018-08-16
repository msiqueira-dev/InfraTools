<div class="DivHeaderContainerMenuPageService" id="DivHeaderContainerMenuPageService"
     onmouseover="
       var $image = document.getElementById('DivHeaderContainerMenuPageServiceTop').className = 'DivHeaderContainerMenuPageServiceTopOrange';
       var $image = document.getElementById('DivHeaderContainerMenuPageService').className    = 'DivHeaderContainerMenuPageServiceHover';"
     onmouseout="
       var $image = document.getElementById('DivHeaderContainerMenuPageServiceTop').className = 'DivHeaderContainerMenuPageServiceTop';
       var $image = document.getElementById('DivHeaderContainerMenuPageService').className = 'DivHeaderContainerMenuPageService';" >
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
</div>