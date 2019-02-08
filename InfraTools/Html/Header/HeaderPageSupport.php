<div class="DivHeaderContainerMenuPageContact" id="DivHeaderContainerMenuPageContact"
     onmouseover=" 
       var $image = document.getElementById('DivHeaderContainerMenuPageContactTopOrange').className = 
                                                                                    'DivHeaderContainerMenuPageContactTopOrange';
       var $image = document.getElementById('DivHeaderContainerMenuPageContact').className = 
                                                                                    'DivHeaderContainerMenuPageContactHover';
       ShowOrHideElement('DivHeaderSupport', true);"
     onmouseout="
       var $image = document.getElementById('DivHeaderContainerMenuPageContactTopOrange').className = 
                                                                                           'DivHeaderContainerMenuPageContactTop';
       var $image = document.getElementById('DivHeaderContainerMenuPageContact').className = 'DivHeaderContainerMenuPageContact';
       ShowOrHideElement('DivHeaderSupport', false);" >
    <div id="DivHeaderContainerMenuPageContactTopOrange" class="DivHeaderContainerMenuPageContactTop"></div>
    <div class="DivHeaderContainerMenuLink">
        <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SUPPORT'); ?>" id="PageSupport" 
           title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SUPPORT_TITLE'); ?>">
        	<span class="HeaderSpace">
            </span>
            <span> 
				<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SUPPORT_TEXT'); ?> 
            </span>
        </a>
	</div>
	<div class="Hidden DivHeaderContainerMenuLinkSub" id="DivHeaderSupport">
		<div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SUPPORT_CONTACT'); ?>" id="PageSupportContact" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SUPPORT_CONTACT_TITLE'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SUPPORT_CONTACT_TEXT'); ?> 
				</span>
			</a>
		</div>
		<div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SUPPORT_SEL'); ?>" id="PageSupportSelect" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SUPPORT_SEL_TITLE'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SUPPORT_SEL_TEXT'); ?> 
				</span>
			</a>
		</div>
		<div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_SUPPORT_LST'); ?>" id="PageSupportList" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SUPPORT_LST_TITLE'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_SUPPORT_LST_TEXT'); ?> 
				</span>
			</a>
		</div>
	</div>
</div>