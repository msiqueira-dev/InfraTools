<!-- FM_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS -->
<a name="tabs4" id="tabs4"></a>
<div id="tabs-4" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionCheckEmailExists; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_CHECK_EMAIL_EXISTS . '#tabs4';?>" 
          method="post" >
    	<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_LABEL_ADDRESS'); ?></label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS; ?>"
                               onkeyup="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS; ?>',
                                                       'DivContentBodySubmit',
                                                       '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS_SB; ?>',
                                                       '', false);"
                               onblur="ValidateEmail(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS; ?>',
                                                       'DivContentBodySubmit',
                                                       '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS_SB; ?>',
                                                       '', true);"
                               value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS]; 
									  ?>"
                               title="<?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_INPUT_ADDRESS_TITLE'); ?>" />
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS_SB; ?>" 
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('CHECK_SB'); ?>"/>
    	</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionCheckEmailExistsMessage))
	                     echo $this->VisibilityFunctionCheckEmailExistsMessage; ?> DivReturnForm">
		<div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionCheckEmailExistsMessageBottom))
	                    echo $this->VisibilityFunctionCheckEmailExistsMessageBottom; ?>"></div>
</div>