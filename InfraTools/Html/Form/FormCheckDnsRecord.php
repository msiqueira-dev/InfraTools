<!-- FORM CHECK DNS RECORD -->
<a name="tabs3" id="tabs3"></a>
<div id="tabs-3" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckDnsRecord; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_CHECK_DNS_RECORD . '#tabs3';?>" 
          method="post" >
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_LABEL_HOST'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD; ?>"
                               onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SB; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD; ?>',
                                                          'DivContentBodySubmit',
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SB; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_INPUT_HOST_TITLE'); ?>" />
			<div class="DivContentBodyContainerSelect">
				<select name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL; ?>" 
                        id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL; ?>">
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_A) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_A; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_A; ?>
                   	</option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_MX) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_MX; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_MX; ?>
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_NS) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_NS; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_NS; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_SOA) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_SOA; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_SOA; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_PTR) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_PTR; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_PTR; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_CNAME) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_CNAME; ?>">  
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_CNAME; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_AAAA) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_AAAA; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_AAAA; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_A6) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_A6; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_A6; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_SRV) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_SRV; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_SRV; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                   == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_NAPTR) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_NAPTR; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_NAPTR; ?> 
                    </option>
					<option <?php if ($_POST[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL] 
					                  == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_TXT) 
						echo "selected='selected' "; ?>value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_TXT; ?>"> 
                        <?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_TXT; ?> 
                    </option>
				</select>
			</div>
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SB; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHECK'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckDnsRecordMessage))
	                     echo $this->VisibilityFunctionCheckDnsRecordMessage; ?> DivReturnForm">
		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD) 
                    echo $this->ExecutedFunctionReturnMessage;  
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckDnsRecordMessageBottom))
	                     echo $this->VisibilityFunctionCheckDnsRecordMessageBottom; ?>"></div>
</div>