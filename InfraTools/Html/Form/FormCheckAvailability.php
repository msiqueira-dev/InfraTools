<!-- FORM CHECK AVAILABILITY -->
<a name="tabs1" id="tabs1"></a>
<div id="tabs-1" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckAvailability; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_AVAILABILITY; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_AVAILABILITY; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::CHECK_AVAILABILITY . '#tabs1';?>" 
          method="post" >
		<div class="DivHidden">
            <input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_HIDDEN; ?>" 
                                 id="<?php echo ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_HIDDEN; ?>" />
		</div>
        <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_LABEL_HOST'); ?></label> 
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_INPUT; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_INPUT; ?>" 
                               onblur="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_INPUT; ?>',
                                                          'DivContentBodySubmit', 
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_AVAILABILITY; ?>',
                                                          '', true);"
                               onkeyup="ValidateHostName(null, '<?php echo ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_INPUT; ?>',
                                                          'DivContentBodySubmit', 
                                                          '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_AVAILABILITY; ?>',
                                                          '', false);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_INPUT]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_INPUT]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_INPUT_HOST_TITLE'); ?> " />
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_AVAILABILITY; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_AVAILABILITY; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('CHECK_SUBMIT'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckAvailabilityMessage)) 
	                  	 echo $this->VisibilityFunctionCheckAvailabilityMessage; ?>">
 		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_AVAILABILITY_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckAvailabilityMessageBottom)) 
	                     echo $this->VisibilityFunctionCheckAvailabilityMessageBottom; ?>"></div>
</div>