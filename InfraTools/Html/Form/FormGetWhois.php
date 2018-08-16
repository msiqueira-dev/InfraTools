<!-- FORM GET WHOIS -->
<a name="tabs17" id="tabs17"></a>
<div id="tabs-17" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetWhois; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_TEXT'); ?></h2>
    <div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_TEXT_TIP'); ?>
        </label>
    </div>
	<form name="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_WHOIS; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_WHOIS; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::GET_WHOIS . '#tabs17';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_HIDDEN; ?>" 
             	                id="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_HIDDEN; ?>" />
        </div>
		<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_GET_WHOIS; ?>">
            <input type="radio" name="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO_HOST; ?>"
                                value="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO_HOST; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility('<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP; ?>', 
                                                          '<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST; ?>');
                                          MakeInputVisible('<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>');
                                          ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_GET_WHOIS; ?>', 
                                                                   'DivContentBodySubmit', 
                                                                   '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>', 
                                                                   'Host')"
                                title="<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_RADIO_HOST_TITLE'); ?>"  
								<?php echo $this->CheckedFunctionGetWhoisRadioHost; ?> />
            <div class="DivContentBodyContainerLabelHost">
				<label><?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_LABEL_HOST'); ?></label> 
			</div>
            <input type="radio" name="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO_IP; ?>"
                                value="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_RADIO_IP; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility(
                                                          '<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST; ?>', 
                                                          '<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP; ?>');
                                          MakeInputVisible('<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>');
                                          ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_GET_WHOIS; ?>', 
                                                                   'DivContentBodySubmit', 
                                                                   '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>', 
                                                                   'Ip')"
                                title="<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_RADIO_IP_TITLE'); ?>"  
								<?php echo $this->CheckedFunctionGetWhoisRadioIp; ?> />
			<div class="DivContentBodyContainerLabelIp">
				<label><?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_LABEL_IP'); ?></label>
			</div>
            <input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST; ?>" 
                               onblur="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_HOST]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionGetWhoisHost; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_INPUT_HOST_TITLE'); ?>" />
            <input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP; ?>" 
                               onblur="ValidateIpAddress(null, 
                                                           '<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>',
                                                           '', true);"
                               onkeyup="ValidateIpAddress(null, 
                                                           '<?php echo ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>',
                                                           '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_WHOIS_INPUT_IP]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionGetWhoisIp; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_INPUT_IP_TITLE'); ?>" />
            <input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>"
            					 id="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_WHOIS; ?>"
                                 class="DivContentBodySubmit <?php echo $this->VisibilityFunctionGetWhoisSubmit; ?>"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetWhoisMessage)) 
	                     echo $this->VisibilityFunctionGetWhoisMessage; ?>">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_WHOIS_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage;  
                ?>
            </label>
        </div>            
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetWhoisMessageBottom)) 
	                echo $this->VisibilityFunctionGetWhoisMessageBottom; ?>">
	</div>
</div>