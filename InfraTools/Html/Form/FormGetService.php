<!-- FORM GET SERVICE -->
<a name="tabs15" id="tabs15"></a>
<div id="tabs-15" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetService ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_SERVICE_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_SERVICE_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_SERVICE; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_SERVICE; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::GET_SERVICE . '#tabs15';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_HIDDEN; ?>" />
        </div>
        <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_PORT'); ?></label>
			</div>
            <input type="text" name="<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_INPUT; ?>" 
                   id="<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_INPUT; ?>"
                   onblur="ValidateNumberSize('InputSmall', '<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_INPUT; ?>',
                                                 'DivContentBodySubmit',
                                                 '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_SERVICE; ?>',
                                                 '', 65535, true);"
                   onkeyup="ValidateNumberSize('InputSmall', '<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_INPUT; ?>',
                                                 'DivContentBodySubmit',
                                                 '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_SERVICE; ?>',
                                                 '', 65535, false);"
                   value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_SERVICE_INPUT]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_SERVICE_INPUT]; 
									  ?>"
                   title="<?php echo $this->InstanceLanguageText->GetText('TEXT_PORT'); ?>" maxlength="5"
                   class="InputSmall" />
			<div class="DivContentBodyContainerSelect">
				<select name="<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_SELECT; ?>" 
                        id="<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_SELECT; ?>">
                    <option <?php if ($this->SelectedFunctionGetService == ConfigInfraTools::FUNCTION_GET_SERVICE_SELECT_TCP) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_SELECT_TCP; ?>"> 
                        	<?php echo "TCP"; ?> 
                   	</option>
                    <option <?php if ($this->SelectedFunctionGetService == ConfigInfraTools::FUNCTION_GET_SERVICE_SELECT_UDP) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FUNCTION_GET_SERVICE_SELECT_UDP; ?>"> 
                        	<?php echo "UDP" ?> 
                   	</option>
				</select>
			</div>
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_SERVICE; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_SERVICE; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetServiceMessage))
	                     echo $this->VisibilityFunctionGetServiceMessage; ?> DivReturnForm">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_SERVICE_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>
        </div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetServiceMessageBottom))
	                     echo $this->VisibilityFunctionGetServiceMessageBottom; ?>"></div>
</div>