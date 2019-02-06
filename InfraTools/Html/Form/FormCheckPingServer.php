<!-- FORM CHECK PING SERVER -->
<a name="tabs6" id="tabs6"></a>
<div id="tabs-6" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckPingServer; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_PING_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_CHECK_PING_SERVER . '#tabs6';?>" 
          method="post" >
        <div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_CHECK_PING_SERVER; ?>">
            <input type="radio" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO_HOST; ?>"
                                value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO_HOST; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility(
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP; ?>', 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST; ?>');
                                         MakeInputVisible('<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>');
                                         ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_CHECK_PING_SERVER; ?>', 
                                                                   'DivContentBodySubmit', 
                                                                   '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>', 
                                                                   'Host')"
                                title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_RADIO_HOST_TITLE'); ?>" 
								<?php echo $this->CheckedFunctionCheckPingServerRadioHost; ?> />
            <div class="DivContentBodyContainerLabelHost">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_PING_LABEL_HOST'); ?></label>
			</div>
            <input type="radio" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO_IP; ?>"
                                value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO_IP; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility(
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST; ?>', 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP; ?>');
                                          MakeInputVisible('<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>');
                                          ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_CHECK_PING_SERVER; ?>', 
                                                                    'DivContentBodySubmit', 
                                                                    '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>', 
                                                                     'Ip')"
                                title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_RADIO_IP_TITLE'); ?>" 
								<?php echo $this->CheckedFunctionCheckPingServerRadioIp; ?> />
			<div class="DivContentBodyContainerLabelIp">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_PING_LABEL_IP'); ?></label>
			</div>
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST; ?>" 
                               onblur="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionCheckPingServerHost; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_INPUT_HOST_TITLE'); ?>" />
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP; ?>" 
                               onblur="ValidateIpAddressIpv4(null, 
                                                           '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>',
                                                           '', true);"
                               onkeyup="ValidateIpAddressIpv4(null, 
                                                           '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>',
                                                           '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionCheckPingServerIp; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_INPUT_IP_TITLE'); ?>" />
            <input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>" 
            					 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB; ?>"
                                 class="DivContentBodySubmit <?php echo $this->VisibilityFunctionCheckPingServerSubmit; ?>"
				                 value="<?php echo $this->InstanceLanguageText->GetText('CHECK_SB'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckPingServerMessage))
	                     echo $this->VisibilityFunctionCheckPingServerMessage; ?> DivReturnForm">
    	<div>
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckPingServerMessageBottom))
	                     echo $this->VisibilityFunctionCheckPingServerMessageBottom; ?>"></div>
</div>