<!-- FORM CHECK AVAILABILITY -->
<a name="tabs1" id="tabs1"></a>
<div id="tabs-1" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckAvailability; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_CHECK_AVAILABILITY . '#tabs1';?>" 
          method="post" >
        <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_LABEL_HOST'); ?></label> 
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY; ?>" 
                               onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY; ?>',
                                                          'DivContentBodySubmit', 
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY_SB; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY; ?>',
                                                          'DivContentBodySubmit', 
                                                          '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY_SB; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_INPUT_HOST_TITLE'); ?> " />
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY_SB; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('CHECK_SB'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckAvailabilityMessage)) 
	                  	 echo $this->VisibilityFunctionCheckAvailabilityMessage; ?> DivReturnForm">
 		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckAvailabilityMessageBottom)) 
	                     echo $this->VisibilityFunctionCheckAvailabilityMessageBottom; ?>"></div>
</div>