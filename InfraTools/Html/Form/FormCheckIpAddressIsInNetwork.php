<!-- FORM CHECK IP ADDRESS IS IN NETWORK -->
<a name="tabs5" id="tabs5"></a>
<div id="tabs-5" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckIpAddressIsInNetwork; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()).'?='.ConfigInfraTools::PAGE_CHECK_IP_ADDRESS_IS_IN_NETWORK.'#tabs5';?>" 
          method="post" >
        <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabelBig">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_IP'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP; ?>" 
                               onblur="ValidateIpAddressIpv4(null, 
                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '', true);
                                         ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '');"
                               onkeyup="ValidateIpAddressIpv4(null, 
                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '', false);
                                         ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP'); ?>"
                               maxlength="15" />
		</div>
        <div class="DivContentBodyContainer DivCheckIpAddressNetwork">
			<div class="DivContentBodyContainerLabelBig">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_NETWORK'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_NETWORK; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_NETWORK; ?>" 
                               onblur="ValidateIpAddressIpv4(null, 
                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_NETWORK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '', true);
                                         ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '');"
                               onkeyup="ValidateIpAddressIpv4(null, 
                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_NETWORK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '', false);
                               			ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_NETWORK]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_NETWORK]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK'); ?>"
                               maxlength="15" />
			<div class="DivContentBodyContainerLabelSmall">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_MASK'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_MASK; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_MASK; ?>" 
                               onblur="ValidateNumberSize('InputSmall', 
                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_MASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '', 30);
                                          ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '');"
                               onkeyup="ValidateMultiplyFields(
                                         'FormFunctionCheckIpAddressIsInNetwork',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_MASK]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_MASK]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK'); ?>"
                               maxlength="2"
				               class="InputSmall" />
            <input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHECK'); ?>"/>
        </div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckIpAddressIsInNetworkMessage))
	                     echo $this->VisibilityFunctionCheckIpAddressIsInNetworkMessage; ?> DivReturnForm">
    	<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP) 
                    echo $this->ExecutedFunctionReturnMessage;   
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckIpAddressIsInNetworkMessageBottom))
	                     echo $this->VisibilityFunctionCheckIpAddressIsInNetworkMessageBottom; ?>"></div>
</div>