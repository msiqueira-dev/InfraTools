<!-- FORM GET CALCULATION NETMASK -->
<a name="tabs8" id="tabs8"></a>
<div id="tabs-8" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetCalculationNetMask; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_CALCULATION_NETMASK_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_CALCULATION_NETMASK_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_CALCULATION_NETMASK; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_CALCULATION_NETMASK; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::GET_CALCULATION_NETMASK . '#tabs8';?>" 
          method="post" >
		<div class="DivHidden">
            <input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_HIDDEN; ?>" 
                                 id="<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_HIDDEN; ?>" />
        </div>
        <div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>">
			<div class="DivContentBodyContainerLabel">
				<label> <?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?> </label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_IP; ?>" 
                               onblur="ValidateIpAddress(null, 
                                         '<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_IP; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>',
                                         '', true);
                                         ValidateMultiplyFields(
                                         '<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>',
                                         '');"
                               onkeyup="ValidateIpAddress(null, 
                                         '<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_IP; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>',
                                         '', false);
                                         ValidateMultiplyFields(
                                         '<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_IP]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?>"
                               maxlength="15" />
			<div class="DivContentBodyContainerLabelSmall">
				<label> <?php echo $this->InstanceLanguageText->GetText('TEXT_MASK'); ?> </label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_MASK; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_MASK; ?>" 
                               onblur="ValidateNumberSize('InputSmall', 
                                         '<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_MASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>',
                                         '', 30, true);
                                         ValidateMultiplyFields(
                                         '<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>',
                                         '');"
                               onkeyup="ValidateNumberSize('InputSmall', 
                                         '<?php echo ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_MASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>',
                                         '', 30, false);
                                         ValidateMultiplyFields(
                                         '<?php echo ConfigInfraTools::DIV_GET_CALCULATION_NETMASK; ?>',
                                         'DivContentBodySubmit',
                                         '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>',
                                         '');"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_MASK]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_INPUT_MASK]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_MASK'); ?>"
                               maxlength="2"
				               class="InputSmall" />
            <input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_CALCULATION_NETMASK; ?>" 
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetCalculationNetMaskMessage))
	                     echo $this->VisibilityFunctionGetCalculationNetMaskMessage; ?>">
 		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_CALCULATION_NETMASK_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage;
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetCalculationNetMaskMessageBottom))
	                     echo $this->VisibilityFunctionGetCalculationNetMaskMessageBottom; ?>"></div>
</div>