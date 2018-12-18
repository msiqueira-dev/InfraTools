<!-- FORM GET DNS RECORDS -->
<a name="tabs9" id="tabs9"></a>
<div id="tabs-9" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetDnsRecords; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_DNS_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_DNS_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_DNS_RECORDS; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_DNS_RECORDS; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::GET_DNS_RECORDS . '#tabs9';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_HIDDEN; ?>" />
        </div>
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label> <?php echo $this->InstanceLanguageText->GetText('TEXT_HOSTNAME'); ?> </label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_INPUT; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_INPUT; ?>" 
                               onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_INPUT; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_DNS_RECORDS; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_INPUT; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_DNS_RECORDS; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_INPUT]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_INPUT]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('TEXT_HOSTNAME'); ?>" />
			<div class="DivContentBodyContainerSelect">
				<select name="<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_SELECT; ?>" 
                        id="<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_SELECT; ?>">
                    <option <?php if ($this->SelectedFunctionGetDnsRecords == ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_SELECT_MX) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_SELECT_MX; ?>"> 
                        	<?php echo $this->InstanceLanguageText->GetText('GET_DNS_OPTION_MX'); ?> 
                   	</option>
					<option <?php if ($this->SelectedFunctionGetDnsRecords == ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_SELECT_OTHER) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_SELECT_OTHER; ?>"> 
                        	<?php echo $this->InstanceLanguageText->GetText('GET_DNS_OPTION_OTHER'); ?>
                    </option>
				</select>
			</div>
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_DNS_RECORDS; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_DNS_RECORDS; ?>"   
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetDnsRecordsMessage))
	                     echo $this->VisibilityFunctionGetDnsRecordsMessage; ?> DivReturnForm">
		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_DNS_RECORDS_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetDnsRecordsMessageBottom))
	                     echo $this->VisibilityFunctionGetDnsRecordsMessageBottom; ?>"></div>
</div>