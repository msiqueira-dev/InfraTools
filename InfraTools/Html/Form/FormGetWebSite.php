<!-- FORM GET WEBSITE -->
<a name="tabs16" id="tabs16"></a>
<div id="tabs-16" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetWebSite; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_WEBSITE; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_WEBSITE; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::GET_WEBSITE . '#tabs16';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_HIDDEN; ?>" />
        </div>
        <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_WEBSITE'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_INPUT; ?>" 
                   id="<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_INPUT; ?>" 
                   onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_INPUT; ?>',
                                               'DivContentBodySubmit',
                                               '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WEBSITE; ?>',
                                               '', true);"
                   onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_INPUT; ?>',
                                               'DivContentBodySubmit',
                                               '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WEBSITE; ?>',
                                               '', false);"
                   value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_WEBSITE_INPUT]))
                          	echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_WEBSITE_INPUT]; 
                          ?>"
                   title="<?php echo $this->InstanceLanguageText->GetText('TEXT_WEBSITE'); ?>" />
			<div class="DivContentBodyContainerSelect DivContentBodyContainerSelectLarger">
				<select name="<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_SELECT; ?>" 
                        id="<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_SELECT; ?>">
                    <option <?php if ($this->SelectedFunctionGetWebSite == ConfigInfraTools::FUNCTION_GET_WEBSITE_SELECT_CONTENT) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_SELECT_CONTENT; ?>"> 
                        	<?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_OPTION_CONTENT'); ?> 
                   	</option>
                    <option <?php if ($this->SelectedFunctionGetWebSite == ConfigInfraTools::FUNCTION_GET_WEBSITE_SELECT_HEADER) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FUNCTION_GET_WEBSITE_SELECT_HEADER; ?>"> 
                        	<?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_OPTION_HEADER'); ?> 
                   	</option>
				</select>
			</div>
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WEBSITE; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WEBSITE; ?>" 
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetWebSiteMessage))
	                     echo $this->VisibilityFunctionGetWebSiteMessage; ?>">
    	<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_WEBSITE_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>      
        </div>      
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetWebSiteMessageBottom))
	                     echo $this->VisibilityFunctionGetWebSiteMessageBottom; ?>"></div>
</div>