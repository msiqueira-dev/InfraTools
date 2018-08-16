<div class="DivHeaderContainerMenuPageContact" id="DivHeaderContainerMenuPageContact"
     onmouseover=" 
 var $image = document.getElementById('DivHeaderContainerMenuPageContactTopOrange').className = 
                                                                                    'DivHeaderContainerMenuPageContactTopOrange';
       var $image = document.getElementById('DivHeaderContainerMenuPageContact').className = 
                                                                                    'DivHeaderContainerMenuPageContactHover';"
     onmouseout="
       var $image = document.getElementById('DivHeaderContainerMenuPageContactTopOrange').className = 
                                                                                           'DivHeaderContainerMenuPageContactTop';
       var $image = document.getElementById('DivHeaderContainerMenuPageContact').className = 'DivHeaderContainerMenuPageContact';" >
    <div id="DivHeaderContainerMenuPageContactTopOrange" class="DivHeaderContainerMenuPageContactTop"></div>
    <div class="DivHeaderContainerMenuLink">
        <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_CONTACT'); ?>" id="PageContact" 
           title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_CONTACT_TITLE'); ?>">
        	<span class="HeaderSpace">
            </span>
            <span> 
				<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_CONTACT_TEXT'); ?> 
            </span>
        </a>
	</div>
</div>