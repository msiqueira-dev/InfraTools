<div class="DivHeaderContainerMenuPageDiagnosticTools" id="DivHeaderContainerMenuPageDiagnosticTools"
     onmouseover=" 
       var $image = document.getElementById('DivHeaderContainerMenuPageDiagnosticToolsTop').className = 'DivHeaderContainerMenuPageDiagnosticToolsTopOrange';
       var $image = document.getElementById('DivHeaderContainerMenuPageDiagnosticTools').className    = 'DivHeaderContainerMenuPageDiagnosticToolsHover';"
     onmouseout="
       var $image = document.getElementById('DivHeaderContainerMenuPageDiagnosticToolsTop').className = 'DivHeaderContainerMenuPageDiagnosticToolsTop';
       var $image = document.getElementById('DivHeaderContainerMenuPageDiagnosticTools').className = 'DivHeaderContainerMenuPageDiagnosticTools';" >
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
</div>