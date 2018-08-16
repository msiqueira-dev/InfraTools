<div class="DivHeaderContainerMenuPageGet" id="DivHeaderContainerMenuPageGet"
     onmouseover="
       var $image = document.getElementById('DivHeaderContainerMenuPageGetTop').className = 'DivHeaderContainerMenuPageGetTopOrange';
       var $image = document.getElementById('DivHeaderContainerMenuPageGet').className    = 'DivHeaderContainerMenuPageGetHover';"
     onmouseout="
       var $image = document.getElementById('DivHeaderContainerMenuPageGetTop').className = 'DivHeaderContainerMenuPageGetTop';
       var $image = document.getElementById('DivHeaderContainerMenuPageGet').className = 'DivHeaderContainerMenuPageGet';" >
    <div id="DivHeaderContainerMenuPageGetTop" class="DivHeaderContainerMenuPageGetTop"></div>
    <div class="DivHeaderContainerMenuLink">
        <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_GET'); ?>" id="PageGet" 
           title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_GET_TITLE'); ?>">
        	<span class="HeaderSpace">
            </span>
            <span> 
				<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_GET_TEXT'); ?> 
           	</span>
        </a>
	</div>
</div>