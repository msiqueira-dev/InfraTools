<!-- FORM GET IP ADDRESSES -->
<a name="tabs11" id="tabs11"></a>
<div id="tabs-11" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetIpAddresses; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_IP_ADDRESSES_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_IP_ADDRESSES_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_IP_ADDRESSES; ?>" 
          id="FormFunctionGe<?php echo ConfigInfraTools::FORM_FUNCTION_GET_IP_ADDRESSES; ?>tIpAddresses" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::GET_IP_ADDRESSES . '#tabs11';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_HIDDEN; ?>" />
        </div>
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_HOSTNAME'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_INPUT; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_INPUT; ?>" 
                               onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_INPUT; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_IP_ADDRESSES; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_INPUT; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_IP_ADDRESSES; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_INPUT]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_INPUT]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_HOSTNAME'); ?>" />
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_IP_ADDRESSES; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_IP_ADDRESSES; ?>"  
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetIpAddressesMessage))
	                     echo $this->VisibilityFunctionGetIpAddressesMessage; ?> DivReturnForm">
    	<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_IP_ADDRESSES_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetIpAddressesMessageBottom))
	                     echo $this->VisibilityFunctionGetIpAddressesMessageBottom; ?>"></div>
</div>