<!-- FORM GET ROUTE -->
<a name="tabs14" id="tabs14"></a>
<div id="tabs-14" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetRoute; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_ROUTE_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_ROUTE_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_ROUTE; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_ROUTE; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_ROUTE . '#tabs14';?>" 
          method="post" >
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE; ?>"
                               onblur="ValidateIpAddressIpv4(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_ROUTE_SB; ?>',
                                                           '', true);"
                               onkeyup="ValidateIpAddressIpv4(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_ROUTE_SB; ?>',
                                                           '', false);"
       			               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?>" 
                               maxlength="15" />
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_ROUTE_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_ROUTE_SB; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetRouteMessage))
	                     echo $this->VisibilityFunctionGetRouteMessage; ?> DivReturnForm">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetRouteMessageBottom))
	                     echo $this->VisibilityFunctionGetRouteMessageBottom; ?>"></div>
</div>