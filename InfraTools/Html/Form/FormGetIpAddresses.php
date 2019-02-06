<!-- FORM GET IP ADDRESSES -->
<a name="tabs11" id="tabs11"></a>
<div id="tabs-11" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetIpAddresses; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_IP_ADDRESSES_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_IP_ADDRESSES_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES; ?>" 
          id="FormFunctionGe<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES; ?>tIpAddresses" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_IP_ADDRESSES . '#tabs11';?>" 
          method="post" >
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_HOSTNAME'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES; ?>" 
                               onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES_SB; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES_SB; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_HOSTNAME'); ?>" />
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES_SB; ?>"  
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetIpAddressesMessage))
	                     echo $this->VisibilityFunctionGetIpAddressesMessage; ?> DivReturnForm">
    	<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetIpAddressesMessageBottom))
	                     echo $this->VisibilityFunctionGetIpAddressesMessageBottom; ?>"></div>
</div>