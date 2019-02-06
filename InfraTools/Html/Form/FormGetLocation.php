<!-- FORM GET LOCATION -->
<a name="tabs12" id="tabs12"></a>
<div id="tabs-12" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetLocation; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_LOCATION_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_LOCATION_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_LOCATION; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_LOCATION; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_LOCATION . '#tabs12';?>" 
          method="post" >
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION; ?>"
                               onblur="ValidateIpAddressIpv4(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_LOCATION_SB; ?>',
                                                           '', true);"
                               onkeyup="ValidateIpAddressIpv4(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_LOCATION_SB; ?>',
                                                           '', false);"
       			               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?>"
                               maxlength="15" />
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_LOCATION_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_LOCATION_SB; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetLocationMessage))
	                     echo $this->VisibilityFunctionGetLocationMessage; ?> DivReturnForm">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetLocationMessageBottom))
	                     echo $this->VisibilityFunctionGetLocationMessageBottom; ?>"></div>
</div>