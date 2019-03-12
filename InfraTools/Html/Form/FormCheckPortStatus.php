<!-- FORM CHECK PORT STATUS -->
<a name="tabs7" id="tabs7"></a>
<div id="tabs-7" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckPortStatus; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_CHECK_PORT_STATUS . '#tabs7';?>" 
          method="post" >
		<div class="DivContentBodyContainer" id="<?php echo ConfigInfraTools::DIV_CHECK_PORT_STATUS; ?>">
        	<input type="radio" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO; ?>"
                   id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO_HOST; ?>"
                   value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO_HOST; ?>"
                   onclick="this.blur();this.focus();"
                   onchange="SwitchElementVisibility('<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP; ?>', 
                                             '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST; ?>');
                             SwitchElementVisibility('Div<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>', 
                                             'Div<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>');
                             SwitchElementVisibility('<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>', 
                                             '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>');
                             MakeInputVisible('<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>');
                             ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_CHECK_PORT_STATUS; ?>', 
                                                       'DivContentBodySubmit', 
                                                       '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                       'Host')"
                   title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_RADIO_HOST_TITLE'); ?>"  
				   <?php echo $this->CheckedFunctionCheckPortStatusRadioHost; ?> />
            <div class="DivContentBodyContainerLabelHost">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_LABEL_HOST'); ?></label>
			</div>
            <input type="radio" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO; ?>"
                   id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO_IP; ?>"
                   value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO_IP; ?>"
                   onclick="this.blur();this.focus();"
                   onchange="SwitchElementVisibility('<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST; ?>', 
                                             '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP; ?>');
                             SwitchElementVisibility('Div<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>', 
                                             'Div<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>');
                             SwitchElementVisibility('<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>', 
                                             '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>');
                             MakeInputVisible('<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>');
                             ValidateInputChangedRadio('<?php echo ConfigInfraTools::DIV_CHECK_PORT_STATUS; ?>', 
                                                       'DivContentBodySubmit', 
                                                       '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                       'Ip')"
                   title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_RADIO_IP_TITLE'); ?>"  
				   <?php echo $this->CheckedFunctionCheckPortStatusRadioIp; ?> />
			<div class="DivContentBodyContainerLabelIp">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_LABEL_IP'); ?></label>
			</div>
            <!-- INPUT HOSTNAME -->
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST; ?>"
                               onblur="ValidateHostAndPort('InputTextMedium', 'InputSmall', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST; ?>', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>', 
                                                         'DivContentBodySubmit', 
                                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                         '', true, false);"
                               onkeyup="ValidateHostAndPort('InputTextMedium', 'InputSmall',
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST; ?>', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>', 
                                                         'DivContentBodySubmit', 
                                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                         '', false, false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST]; 
									  ?>"
                               class="InputTextMedium <?php echo $this->VisibilityFunctionCheckPortStatusHost; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_INPUT_HOST_TITLE'); ?>" />
            <div id="Div<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>" 
                 class="DivContentBodyContainerLabelSmallPort <?php echo $this->VisibilityFunctionCheckPortStatusHost; ?>">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_LABEL_HOST_PORT'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>"
                               onblur="ValidateHostAndPort('InputTextMedium', 'InputSmall',
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST; ?>', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>', 
                                                         'DivContentBodySubmit', 
                                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                         '', false, true);"
                               onkeyup="ValidateHostAndPort('InputTextMedium', 'InputSmall',
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST; ?>', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT; ?>', 
                                                         'DivContentBodySubmit', 
                                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                         '', false, false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT]; 
									  ?>"
                               class="InputSmall <?php echo $this->VisibilityFunctionCheckPortStatusHost; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_INPUT_HOST_PORT_TITLE'); ?>"
                               maxlength="5" />
            
            <!-- INPUT IP ADDRESS -->
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP; ?>"
                               onblur="ValidateIpAndPort('InputTextMedium', 'InputSmall',
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP; ?>', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>', 
                                                         'DivContentBodySubmit', 
                                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                         '', true, false);"
                               onkeyup="ValidateIpAndPort('InputTextMedium', 'InputSmall',
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP; ?>', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>', 
                                                         'DivContentBodySubmit', 
                                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                         '', false, false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP]; 
									  ?>"
                               class="InputTextMedium <?php echo $this->VisibilityFunctionCheckPortStatusIp; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_INPUT_IP_TITLE'); ?>"
                               maxlength="15"  /> 
			<div id="Div<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>" 
                 class="DivContentBodyContainerLabelSmallPort <?php echo $this->VisibilityFunctionCheckPortStatusIp; ?>">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_LABEL_IP_PORT'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>" 
				               onblur="ValidateIpAndPort('InputTextMedium', 'InputSmall', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP; ?>', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>', 
                                                         'DivContentBodySubmit', 
                                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                         '', false, true);"
                               onkeyup="ValidateIpAndPort('InputTextMedium', 'InputSmall', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP; ?>', 
                                                         '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT; ?>', 
                                                         'DivContentBodySubmit', 
                                                         '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>', 
                                                         '', false, false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT]; 
									  ?>"
                               class="InputSmall <?php echo $this->VisibilityFunctionCheckPortStatusIp; ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_INPUT_IP_PORT_TITLE'); ?>"
                               maxlength="5" />
            <input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>"
            					 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB; ?>"
                                 class="DivContentBodySubmit <?php echo $this->VisibilityFunctionCheckPortStatusSubmit; ?>"
				                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHECK'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckPortStatusMessage))
	                     echo $this->VisibilityFunctionCheckPortStatusMessage; ?> DivReturnForm">
		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckPortStatusMessageBottom))
	                     echo $this->VisibilityFunctionCheckPortStatusMessageBottom; ?>"></div>
</div>