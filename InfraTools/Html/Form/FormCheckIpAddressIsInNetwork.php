<!-- FORM CHECK IP ADDRESS IS IN NETWORK -->
<a name="tabs5" id="tabs5"></a>
<div id="tabs-5" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckIpAddressIsInNetwork; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()).'?='.ConfigInfraTools::CHECK_IP_ADDRESS_IS_IN_NETWORK.'#tabs5';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_HIDDEN; ?>" />
        </div>
        <div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>">
			<div class="DivContentBodyContainerLabelBig">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_IP'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP; ?>" 
                               onblur="ValidateIpAddress(null, 
                                         '<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '', true);
                                         ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '');"
                               onkeyup="ValidateIpAddress(null, 
                                         '<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '', false);
                                         ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP'); ?>"
                               maxlength="15" />
		</div>
        <div class="DivContentBodyContainer DivCheckIpAddressNetwork">
			<div class="DivContentBodyContainerLabelBig">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_NETWORK'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK; ?>" 
                               onblur="ValidateIpAddress(null, 
                                         '<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '', true);
                                         ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '');"
                               onkeyup="ValidateIpAddress(null, 
                                         '<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '', false);
                               			ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK'); ?>"
                               maxlength="15" />
			<div class="DivContentBodyContainerLabelSmall">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_MASK'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK; ?>" 
                               onblur="ValidateNumberSize('InputSmall', 
                                         '<?php echo ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '', 30);
                                          ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '');"
                               onkeyup="ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK'); ?>"
                               maxlength="2"
				               class="InputSmall" />
            <input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('CHECK_SUBMIT'); ?>"/>
        </div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckIpAddressIsInNetworkMessage))
	                     echo $this->VisibilityFunctionCheckIpAddressIsInNetworkMessage; ?> DivReturnForm">
    	<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage;   
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckIpAddressIsInNetworkMessageBottom))
	                     echo $this->VisibilityFunctionCheckIpAddressIsInNetworkMessageBottom; ?>"></div>
</div>