<!-- FORM GET HOSTNAME -->
<a name="tabs10" id="tabs10"></a>
<div id="tabs-10" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetHostname; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_HOSTNAME_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_HOSTNAME_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_HOSTNAME; ?>" 
          id="<?php echo ConfigInfraTools::FORM_FUNCTION_GET_HOSTNAME; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::GET_HOSTNAME . '#tabs10';?>" 
          method="post" >
    	<div class="DivHidden">
			<input type="hidden" name="<?php echo ConfigInfraTools::FUNCTION_GET_HOSTNAME_HIDDEN; ?>" 
            	                 id="<?php echo ConfigInfraTools::FUNCTION_GET_HOSTNAME_HIDDEN; ?>" />
        </div>
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label> <?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?> </label>
			</div>
			<input type="text" 
                   name="<?php echo ConfigInfraTools::FUNCTION_GET_HOSTNAME_INPUT; ?>" 
                   id="<?php echo ConfigInfraTools::FUNCTION_GET_HOSTNAME_INPUT; ?>"
                   onblur="ValidateIpAddress(null, '<?php echo ConfigInfraTools::FUNCTION_GET_HOSTNAME_INPUT; ?>',
                                               'DivContentBodySubmit',
                                               '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_HOSTNAME; ?>',
                                               '', true);"
                   onkeyup="ValidateIpAddress(null, '<?php echo ConfigInfraTools::FUNCTION_GET_HOSTNAME_INPUT; ?>',
                                               'DivContentBodySubmit',
                                               '<?php echo ConfigInfraTools::FORM_SUBMIT_GET_HOSTNAME; ?>',
                                               '', false);"
       			   value="<?php if(isset($GLOBALS[ConfigInfraTools::FUNCTION_GET_HOSTNAME_INPUT]))
							   			echo $GLOBALS[ConfigInfraTools::FUNCTION_GET_HOSTNAME_INPUT]; 
									  ?>"
                   title="<?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?>" 
                   maxlength="15" />
			<input type="submit" name="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_HOSTNAME; ?>"
                                 id="<?php echo ConfigInfraTools::FORM_SUBMIT_GET_HOSTNAME; ?>"  
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetHostnameMessage))
	                     echo $this->VisibilityFunctionGetHostnameMessage; ?>">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FUNCTION_GET_HOSTNAME_HIDDEN) 
                    echo $this->ExecutedFunctionReturnMessage;
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetHostnameMessageBottom))
	                     echo $this->VisibilityFunctionGetHostnameMessageBottom; ?>"></div>
</div>