<!-- FORM CHECK BLACKLIST -->
<a name="tabs2" id="tabs2"></a>
<div id="tabs-2" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckBlackList; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_CHECK_BLACKLIST . '#tabs2';?>" 
          method="post" >
		<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_CHECK_BLACKLIST; ?>">
            <input type="radio" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO_HOST; ?>"
                                value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO_HOST; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility('<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP; ?>', 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST; ?>');
                                          MakeInputVisible('<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>');
                                          ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_CHECK_BLACKLIST; ?>', 
                                                                   'DivContentBodySubmit', 
                                                                   '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>', 
                                                                   'Host')"
                                title="<?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_RADIO_HOST_TITLE'); ?>"  
								<?php echo $this->CheckedFunctionCheckBlackListRadioHost; ?> />
            <div class="DivContentBodyContainerLabelHost">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_LABEL_HOST'); ?></label> 
			</div>
            <input type="radio" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO_IP; ?>"
                                value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO_IP; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility(
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST; ?>', 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP; ?>');
                                          MakeInputVisible('<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>');
                                          ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_CHECK_BLACKLIST; ?>', 
                                                                   'DivContentBodySubmit', 
                                                                   '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>', 
                                                                   'Ip')"
                                title="<?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_RADIO_IP_TITLE'); ?>"  
								<?php echo $this->CheckedFunctionCheckBlackListRadioIp; ?> />
			<div class="DivContentBodyContainerLabelIp">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_LABEL_IP'); ?></label>
			</div>
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST; ?>" 
                               onblur="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionCheckBlackListHost; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_INPUT_HOST_TITLE'); ?>" />
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP; ?>" 
                               onblur="ValidateIpAddressIpv4(null, 
                                                           '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>',
                                                           '', true);"
                               onkeyup="ValidateIpAddressIpv4(null, 
                                                           '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>',
                                                           '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionCheckBlackListIp; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_INPUT_IP_TITLE'); ?>" />
            <input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>"
            					 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB; ?>"
                                 class="DivContentBodySubmit <?php echo $this->VisibilityFunctionCheckBlackListSubmit; ?>"
				                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHECK'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckBlackListMessage)) 
	                  	 echo $this->VisibilityFunctionCheckBlackListMessage; ?> DivReturnForm">
		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO) 
                    echo $this->ExecutedFunctionReturnMessage;  
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckBlackListMessageBottom)) 
	                     echo $this->VisibilityFunctionCheckBlackListMessageBottom; ?>"></div>
</div>