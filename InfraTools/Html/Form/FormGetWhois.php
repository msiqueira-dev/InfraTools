<!-- FORM GET WHOIS -->
<a name="tabs17" id="tabs17"></a>
<div id="tabs-17" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetWhois; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_TEXT'); ?></h2>
    <div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_TEXT_TIP'); ?>
        </label>
    </div>
	<form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_WHOIS . '#tabs17';?>" 
          method="post" >
		<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_GET_WHOIS; ?>">
            <input type="radio" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO_HOST; ?>"
                                value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO_HOST; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility('<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP; ?>', 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST; ?>');
                                          MakeInputVisible('<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>');
                                          ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_GET_WHOIS; ?>', 
                                                                   'DivContentBodySubmit', 
                                                                   '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>', 
                                                                   'Host')"
                                title="<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_RADIO_HOST_TITLE'); ?>"  
								<?php echo $this->CheckedFunctionGetWhoisRadioHost; ?> />
            <div class="DivContentBodyContainerLabelHost">
				<label><?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_LABEL_HOST'); ?></label> 
			</div>
            <input type="radio" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO_IP; ?>"
                                value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO_IP; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility(
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST; ?>', 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP; ?>');
                                          MakeInputVisible('<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>');
                                          ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_GET_WHOIS; ?>', 
                                                                   'DivContentBodySubmit', 
                                                                   '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>', 
                                                                   'Ip')"
                                title="<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_RADIO_IP_TITLE'); ?>"  
								<?php echo $this->CheckedFunctionGetWhoisRadioIp; ?> />
			<div class="DivContentBodyContainerLabelIp">
				<label><?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_LABEL_IP'); ?></label>
			</div>
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST; ?>" 
                               onblur="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionGetWhoisHost; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_INPUT_HOST_TITLE'); ?>" />
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP; ?>" 
                               onblur="ValidateIpAddressIpv4(null, 
                                                           '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>',
                                                           '', true);"
                               onkeyup="ValidateIpAddressIpv4(null, 
                                                           '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>',
                                                           '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionGetWhoisIp; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_INPUT_IP_TITLE'); ?>" />
            <input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>"
            					 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB; ?>"
                                 class="DivContentBodySubmit <?php echo $this->VisibilityFunctionGetWhoisSubmit; ?>"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetWhoisMessage)) 
	                     echo $this->VisibilityFunctionGetWhoisMessage; ?> DivReturnForm">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO) 
                    echo $this->ExecutedFunctionReturnMessage;  
                ?>
            </label>
        </div>            
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetWhoisMessageBottom)) 
	                echo $this->VisibilityFunctionGetWhoisMessageBottom; ?>">
	</div>
</div>