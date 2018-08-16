<div class="DivHeaderContainerMenuPageAbout" id="DivHeaderContainerMenuPageAbout"
     onmouseover="
       var $image = document.getElementById('DivHeaderContainerMenuPageAboutTop').className = 'DivHeaderContainerMenuPageAboutTopOrange';
       var $image = document.getElementById('DivHeaderContainerMenuPageAbout').className    = 'DivHeaderContainerMenuPageAboutHover';"
     onmouseout="
       var $image = document.getElementById('DivHeaderContainerMenuPageAboutTop').className = 'DivHeaderContainerMenuPageAboutTop';
       var $image = document.getElementById('DivHeaderContainerMenuPageAbout').className = 'DivHeaderContainerMenuPageAbout';" >
    <div id="DivHeaderContainerMenuPageAboutTop" class="DivHeaderContainerMenuPageAboutTop"></div>
    <div class="DivHeaderContainerMenuLink">
        <a href="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_ABOUT_HREF'); ?>" id="PageAbout" 
           title="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_ABOUT_TITLE'); ?>">
            <span class="HeaderSpace">
            </span>
            <span> 
                <?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_ABOUT_TEXT'); ?>
            </span>
        </a>
    </div>
</div>