<div class="DivHeaderContainerMenuPageCheck" id="DivHeaderContainerMenuPageCheck"
     onmouseover=" 
       var $image = document.getElementById('DivHeaderContainerMenuPageCheckTop').className = 'DivHeaderContainerMenuPageCheckTopOrange';
       var $image = document.getElementById('DivHeaderContainerMenuPageCheck').className    = 'DivHeaderContainerMenuPageCheckHover';"
     onmouseout="
       var $image = document.getElementById('DivHeaderContainerMenuPageCheckTop').className = 'DivHeaderContainerMenuPageCheckTop';
       var $image = document.getElementById('DivHeaderContainerMenuPageCheck').className = 'DivHeaderContainerMenuPageCheck';" >
    <div id="DivHeaderContainerMenuPageCheckTop" class="DivHeaderContainerMenuPageCheckTop"></div>
    <div class="DivHeaderContainerMenuLink">
        <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_CHECK'); ?>" id="PageCheck" 
           title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_CHECK_TITLE') ?>">
        	<span class="HeaderSpace">
            </span>
            <span>
            	<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_CHECK_TEXT'); ?> 
            </span>
        </a>
    </div>
</div>