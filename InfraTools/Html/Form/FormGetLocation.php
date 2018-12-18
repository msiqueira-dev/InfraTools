<!-- FORM GET LOCATION -->
<a name="tabs12" id="tabs12"></a>
<div id="tabs-12" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetLocation; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_LOCATION_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_LOCATION_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_LOCATION; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_LOCATION; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::GET_LOCATION . '#tabs12';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_GET_LOCATION_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_GET_LOCATION_HIDDEN; ?>" />
        </div>
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_LOCATION_INPUT; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_GET_LOCATION_INPUT; ?>"
                               onblur="ValidateIpAddress(null, '<?php echo ConfigInfraTools::FUNCTION_GET_LOCATION_INPUT; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_LOCATION; ?>',
                                                           '', true);"
                               onkeyup="ValidateIpAddress(null, '<?php echo ConfigInfraTools::FUNCTION_GET_LOCATION_INPUT; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_LOCATION; ?>',
                                                           '', false);"
       			               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_LOCATION_INPUT]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_LOCATION_INPUT]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?>"
                               maxlength="15" />
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_LOCATION; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_LOCATION; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetLocationMessage))
	                     echo $this->VisibilityFunctionGetLocationMessage; ?> DivReturnForm">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_LOCATION_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetLocationMessageBottom))
	                     echo $this->VisibilityFunctionGetLocationMessageBottom; ?>"></div>
</div>