<!-- FORM GET CALCULATION NETMASK -->
<a name="tabs8" id="tabs8"></a>
<div id="tabs-8" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetCalculationNetMask; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_CALCULATION_NETMASK_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_CALCULATION_NETMASK_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_CALCULATION_NETMASK . '#tabs8';?>" 
          method="post" >
        <div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>">
			<div class="DivContentBodyContainerLabel">
				<label> <?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?> </label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP; ?>" 
                               onblur="ValidateIpAddressIpv4(null, 
                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>',
                                         '', true);
                                         ValidateMultiplyFields(
                                         '<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>',
                                         '');"
                               onkeyup="ValidateIpAddressIpv4(null, 
                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>',
                                         '', false);
                                         ValidateMultiplyFields(
                                         '<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?>"
                               maxlength="15" />
			<div class="DivContentBodyContainerLabelSmall">
				<label> <?php echo $this->InstanceLanguageText->GetText('TEXT_MASK'); ?> </label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_MASK; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_MASK; ?>" 
                               onblur="ValidateNumberSize('InputSmall', 
                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_MASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>',
                                         '', 30, true);
                                         ValidateMultiplyFields(
                                         '<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>',
                                         '');"
                               onkeyup="ValidateNumberSize('InputSmall', 
                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_MASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>',
                                         '', 30, false);
                                         ValidateMultiplyFields(
                                         '<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_MASK]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_MASK]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_MASK'); ?>"
                               maxlength="2"
				               class="InputSmall" />
            <input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB; ?>" 
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetCalculationNetMaskMessage))
	                     echo $this->VisibilityFunctionGetCalculationNetMaskMessage; ?> DivReturnForm">
 		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP) 
                    echo $this->ExecutedFunctionReturnMessage;
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetCalculationNetMaskMessageBottom))
	                     echo $this->VisibilityFunctionGetCalculationNetMaskMessageBottom; ?>"></div>
</div>