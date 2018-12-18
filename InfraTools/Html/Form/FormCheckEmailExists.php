<!-- FORM CHECK EMAIL EXISTS -->
<a name="tabs4" id="tabs4"></a>
<div id="tabs-4" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckEmailExists; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_EMAIL_EXISTS; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_CHECK_EMAIL_EXISTS; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::CHECK_EMAIL_EXISTS . '#tabs4';?>" 
          method="post" >
    	<div class="DivHidden">
    		<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_HIDDEN; ?>" />
        </div>
    	<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_LABEL_ADDRESS'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_INPUT; ?>" 
                               id="<?php echo ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_INPUT; ?>"
                               onkeyup="ValidateEmail(null, '<?php echo ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_INPUT; ?>',
                                                       'DivContentBodySubmit',
                                                       '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_EMAIL_EXISTS; ?>',
                                                       '', false);"
                               onblur="ValidateEmail(null, '<?php echo ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_INPUT; ?>',
                                                       'DivContentBodySubmit',
                                                       '<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_EMAIL_EXISTS; ?>',
                                                       '', true);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_INPUT]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_INPUT]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_INPUT_ADDRESS_TITLE'); ?>" />
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_EMAIL_EXISTS; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_CHECK_EMAIL_EXISTS; ?>" 
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('CHECK_SUBMIT'); ?>"/>
    	</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckEmailExistsMessage))
	                     echo $this->VisibilityFunctionCheckEmailExistsMessage; ?> DivReturnForm">
		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_CHECK_EMAIL_EXISTS_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckEmailExistsMessageBottom))
	                    echo $this->VisibilityFunctionCheckEmailExistsMessageBottom; ?>"></div>
</div>