<!-- FORM GET ROUTE -->
<a name="tabs14" id="tabs14"></a>
<div id="tabs-14" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetRoute; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_ROUTE_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_ROUTE_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_ROUTE; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_ROUTE; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::GET_ROUTE . '#tabs14';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_GET_ROUTE_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_GET_ROUTE_HIDDEN; ?>" />
        </div>
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_ROUTE_INPUT; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_GET_ROUTE_INPUT; ?>"
                               onblur="ValidateIpAddress(null, '<?php echo ConfigInfraTools::FUNCTION_GET_ROUTE_INPUT; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_ROUTE; ?>',
                                                           '', true);"
                               onkeyup="ValidateIpAddress(null, '<?php echo ConfigInfraTools::FUNCTION_GET_ROUTE_INPUT; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_ROUTE; ?>',
                                                           '', false);"
       			               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_ROUTE_INPUT]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_ROUTE_INPUT]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?>" 
                               maxlength="15" />
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_ROUTE; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_ROUTE; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetRouteMessage))
	                     echo $this->VisibilityFunctionGetRouteMessage; ?> DivReturnForm">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_ROUTE_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetRouteMessageBottom))
	                     echo $this->VisibilityFunctionGetRouteMessageBottom; ?>"></div>
</div>