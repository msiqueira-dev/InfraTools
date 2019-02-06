<!-- FORM GET PROTOCOL -->
<a name="tabs13" id="tabs13"></a>
<div id="tabs-13" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetProtocol; ?>">
    <h2><?php echo $this->InstanceLanguageText->GetText('GET_PROTOCOL_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_PROTOCOL_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_PROTOCOL; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_PROTOCOL; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_PROTOCOL . '#tabs13';?>" 
          method="post" >
       	<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_NUMBER'); ?></label>
			</div>
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL; ?>" 
                   id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL; ?>" 
                   onblur="ValidateNumberSize('InputSmall', '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL; ?>',
                                                 'DivContentBodySubmit',
                                                 '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_PROTOCOL_SB; ?>',
                                         		 '', 255, true);"
                   onkeyup="ValidateNumberSize('InputSmall', '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL; ?>',
                                                 'DivContentBodySubmit',
                                                 '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_PROTOCOL_SB; ?>',
                                         		 '', 255, false);"
                   value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL]; 
									  ?>"
                   title="<?php echo $this->InstanceLanguageText->GetText('TEXT_NUMBER'); ?>" maxlength="5"
                   class="InputSmall" />
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_PROTOCOL_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_PROTOCOL_SB; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetProtocolMessage))
	                     echo $this->VisibilityFunctionGetProtocolMessage; ?> DivReturnForm">
        <div class="">
 	       <label>
    	        <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL) 
        	        echo $this->ExecutedFunctionReturnMessage; 
        	    ?>
       	 	</label>            
    	</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetProtocolMessageBottom))
	                     echo $this->VisibilityFunctionGetProtocolMessageBottom; ?>"></div>
</div>