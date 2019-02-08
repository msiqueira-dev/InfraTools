<!-- FORM GET WEBSITE -->
<a name="tabs16" id="tabs16"></a>
<div id="tabs-16" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetWebSite; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WEBSITE; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WEBSITE; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_WEBSITE . '#tabs16';?>" 
          method="post" >
        <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_WEBSITE'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE; ?>" 
                   id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE; ?>" 
                   onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE; ?>',
                                               'DivContentBodySubmit',
                                               '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WEBSITE_SB; ?>',
                                               '', true);"
                   onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE; ?>',
                                               'DivContentBodySubmit',
                                               '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WEBSITE_SB; ?>',
                                               '', false);"
                   value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE]))
                          	echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE]; 
                          ?>"
                   title="<?php echo $this->InstanceLanguageText->GetText('TEXT_WEBSITE'); ?>" />
			<div class="DivContentBodyContainerSelect DivContentBodyContainerSelectLarger">
				<select name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL; ?>" 
                        id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL; ?>">
                    <option <?php if ($this->SelectedFunctionGetWebSite == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL_CONTENT) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL_CONTENT; ?>"> 
                        	<?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_OPTION_CONTENT'); ?> 
                   	</option>
                    <option <?php if ($this->SelectedFunctionGetWebSite == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL_HEADER) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL_HEADER; ?>"> 
                        	<?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_OPTION_HEADER'); ?> 
                   	</option>
				</select>
			</div>
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WEBSITE_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WEBSITE_SB; ?>" 
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetWebSiteMessage))
	                     echo $this->VisibilityFunctionGetWebSiteMessage; ?> DivReturnForm">
    	<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>      
        </div>      
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetWebSiteMessageBottom))
	                     echo $this->VisibilityFunctionGetWebSiteMessageBottom; ?>"></div>
</div>