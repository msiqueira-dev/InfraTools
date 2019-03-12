<div class="DivHeaderContainerMenuPageDiagnosticTools" id="DivHeaderContainerMenuPageDiagnosticTools"
     onmouseover=" 
       var $image = document.getElementById('DivHeaderContainerMenuPageDiagnosticToolsTop').className = 'DivHeaderContainerMenuPageDiagnosticToolsTopOrange';
       var $image = document.getElementById('DivHeaderContainerMenuPageDiagnosticTools').className = 'DivHeaderContainerMenuPageDiagnosticToolsHover';
       ShowOrHideElement('DivHeaderDiagnosticTools', true);"
     onmouseout="
       var $image = document.getElementById('DivHeaderContainerMenuPageDiagnosticToolsTop').className = 'DivHeaderContainerMenuPageDiagnosticToolsTop';
       var $image = document.getElementById('DivHeaderContainerMenuPageDiagnosticTools').className = 'DivHeaderContainerMenuPageDiagnosticTools'; 
       ShowOrHideElement('DivHeaderDiagnosticTools', false);" >
    <div id="DivHeaderContainerMenuPageDiagnosticToolsTop" class="DivHeaderContainerMenuPageDiagnosticToolsTop"></div>
    <div class="DivHeaderContainerMenuLink">
        <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_DIAGNOSTIC_TOOLS'); ?>" id="PageDiagnosticTools" 
           title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_DIAGNOSTIC_TOOLS_TITLE') ?>">
        	<span class="HeaderSpace">
            </span>
            <span>
            	<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_DIAGNOSTIC_TOOLS_TEXT'); ?> 
            </span>
        </a>
    </div>
    <div class="Hidden DivHeaderContainerMenuLinkSub" id="DivHeaderDiagnosticTools">
		<div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_CHECK'); ?>" id="PageService" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_CHECK_TITLE'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_CHECK_TEXT'); ?> 
				</span>
			</a>
		</div>
		<div class="DivHeaderContainerMenuLinkSubContainer">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_GET'); ?>" id="PageService" 
			   title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_GET_TITLE'); ?>">
				<span> 
					<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_GET_TEXT'); ?> 
				</span>
			</a>
		</div>
	</div>
</div>