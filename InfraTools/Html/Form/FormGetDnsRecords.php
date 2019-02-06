<!-- FORM GET DNS RECORDS -->
<a name="tabs9" id="tabs9"></a>
<div id="tabs-9" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetDnsRecords; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_DNS_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_DNS_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_DNS_RECORDS . '#tabs9';?>" 
          method="post" >
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label> <?php echo $this->InstanceLanguageText->GetText('TEXT_HOSTNAME'); ?> </label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST; ?>" 
                               onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SB; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SB; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_HOSTNAME'); ?>" />
			<div class="DivContentBodyContainerSelect">
				<select name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL; ?>" 
                        id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL; ?>">
                    <option <?php if ($this->SelectedFunctionGetDnsRecords == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL_MX) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL_MX; ?>"> 
                        	<?php echo $this->InstanceLanguageText->GetText('GET_DNS_OPTION_MX'); ?> 
                   	</option>
					<option <?php if ($this->SelectedFunctionGetDnsRecords == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL_OTHER) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL_OTHER; ?>"> 
                        	<?php echo $this->InstanceLanguageText->GetText('GET_DNS_OPTION_OTHER'); ?>
                    </option>
				</select>
			</div>
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SB; ?>"   
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetDnsRecordsMessage))
	                     echo $this->VisibilityFunctionGetDnsRecordsMessage; ?> DivReturnForm">
		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetDnsRecordsMessageBottom))
	                     echo $this->VisibilityFunctionGetDnsRecordsMessageBottom; ?>"></div>
</div>