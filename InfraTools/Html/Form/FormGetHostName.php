<!-- FORM GET HOSTNAME -->
<a name="tabs10" id="tabs10"></a>
<div id="tabs-10" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetHostname; ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_HOSTNAME_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_HOSTNAME_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_HOSTNAME; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_HOSTNAME; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_HOSTNAME . '#tabs10';?>" 
          method="post" >
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label> <?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?> </label>
			</div>
			<input type="text" 
                   name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME; ?>" 
                   id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME; ?>"
                   onblur="ValidateIpAddressIpv4(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME; ?>',
                                               'DivContentBodySubmit',
                                               '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_HOSTNAME_SB; ?>',
                                               '', true);"
                   onkeyup="ValidateIpAddressIpv4(null, '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME; ?>',
                                               'DivContentBodySubmit',
                                               '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_HOSTNAME_SB; ?>',
                                               '', false);"
       			   value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME]; 
									  ?>"
                   title="<?php echo $this->InstanceLanguageText->GetText('TEXT_IP_ADDRESS'); ?>" 
                   maxlength="15" />
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_HOSTNAME_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_HOSTNAME_SB; ?>"  
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetHostnameMessage))
	                     echo $this->VisibilityFunctionGetHostnameMessage; ?> DivReturnForm">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME) 
                    echo $this->ExecutedFunctionReturnMessage;
                ?>
            </label>            
		</div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetHostnameMessageBottom))
	                     echo $this->VisibilityFunctionGetHostnameMessageBottom; ?>"></div>
</div>