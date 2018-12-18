<!-- FORM CHECK PING SERVER -->
<a name="tabs6" id="tabs6"></a>
<div id="tabs-6" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckPingServer; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_PING_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_PING_SERVER; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_PING_SERVER; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::CHECK_PING_SERVER . '#tabs6';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_HIDDEN; ?>" />
        </div>
        <div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_CHECK_PING_SERVER; ?>">
            <input type="radio" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO_HOST; ?>"
                                value="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO_HOST; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility(
                                                          '<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP; ?>', 
                                                          '<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST; ?>');
                                         MakeInputVisible('<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>');
                                         ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_CHECK_PING_SERVER; ?>', 
                                                                   'DivContentBodySubmit', 
                                                                   '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>', 
                                                                   'Host')"
                                title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_RADIO_HOST_TITLE'); ?>" 
								<?php echo $this->CheckedFunctionCheckPingServerRadioHost; ?> />
            <div class="DivContentBodyContainerLabelHost">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_PING_LABEL_HOST'); ?></label>
			</div>
            <input type="radio" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO; ?>"
                                id="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO_IP; ?>"
                                value="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_RADIO_IP; ?>"
                                onclick="this.blur();this.focus();"
                                onchange="SwitchElementVisibility(
                                                          '<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST; ?>', 
                                                          '<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP; ?>');
                                          MakeInputVisible('<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>');
                                          ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_CHECK_PING_SERVER; ?>', 
                                                                    'DivContentBodySubmit', 
                                                                    '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>', 
                                                                     'Ip')"
                                title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_RADIO_IP_TITLE'); ?>" 
								<?php echo $this->CheckedFunctionCheckPingServerRadioIp; ?> />
			<div class="DivContentBodyContainerLabelIp">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_PING_LABEL_IP'); ?></label>
			</div>
            <input type="text" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST; ?>" 
                               onblur="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, 
                                                          '<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_HOST]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionCheckPingServerHost; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_INPUT_HOST_TITLE'); ?>" />
            <input type="text" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP; ?>" 
                               onblur="ValidateIpAddress(null, 
                                                           '<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>',
                                                           '', true);"
                               onkeyup="ValidateIpAddress(null, 
                                                           '<?php echo ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP; ?>',
                                                           'DivContentBodySubmit',
                                                           '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>',
                                                           '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_INPUT_IP]; 
									  ?>"
                               class="<?php echo $this->VisibilityFunctionCheckPingServerIp; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_INPUT_IP_TITLE'); ?>" />
            <input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>" 
            					 id="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_PING_SERVER; ?>"
                                 class="DivContentBodySubmit <?php echo $this->VisibilityFunctionCheckPingServerSubmit; ?>"
				                 value="<?php echo $this->InstanceLanguageText->GetText('CHECK_SUBMIT'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckPingServerMessage))
	                     echo $this->VisibilityFunctionCheckPingServerMessage; ?> DivReturnForm">
    	<div>
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_PING_SERVER_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckPingServerMessageBottom))
	                     echo $this->VisibilityFunctionCheckPingServerMessageBottom; ?>"></div>
</div>