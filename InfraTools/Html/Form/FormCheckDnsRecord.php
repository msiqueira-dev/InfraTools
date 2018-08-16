<!-- FORM CHECK DNS RECORD -->
<a name="tabs3" id="tabs3"></a>
<div id="tabs-3" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckDnsRecord; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_DNS_RECORD; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_DNS_RECORD; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::CHECK_DNS_RECORD . '#tabs3';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_HIDDEN; ?>" />
        </div>
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_LABEL_HOST'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_INPUT; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_INPUT; ?>"
                               onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_INPUT; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_DNS_RECORD; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_INPUT; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_DNS_RECORD; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_INPUT]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_INPUT]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_INPUT_HOST_TITLE'); ?>" />
			<div class="DivContentBodyContainerSelect">
				<select name="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT; ?>" 
                        id="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT; ?>">
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_A) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_A; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_A; ?>
                   	</option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_MX) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_MX; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_MX; ?>
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_NS) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_NS; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_NS; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_SOA) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_SOA; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_SOA; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_PTR) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_PTR; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_PTR; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_CNAME) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_CNAME; ?>">  
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_CNAME; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_AAAA) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_AAAA; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_AAAA; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_A6) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_A6; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_A6; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_SRV) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_SRV; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_SRV; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                   == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_NAPTR) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_NAPTR; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_NAPTR; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT] 
					                  == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_TXT) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_TXT; ?>"> 
                        <?php echo ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_SELECT_TXT; ?> 
                    </option>
				</select>
			</div>
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_DNS_RECORD; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_DNS_RECORD; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('CHECK_SUBMIT'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckDnsRecordMessage))
	                     echo $this->VisibilityFunctionCheckDnsRecordMessage; ?>">
		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_DNS_RECORD_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage;  
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckDnsRecordMessageBottom))
	                     echo $this->VisibilityFunctionCheckDnsRecordMessageBottom; ?>"></div>
</div>