<!-- FORM GET SERVICE -->
<a name="tabs15" id="tabs15"></a>
<div id="tabs-15" class="ui-tabs-panel ui-widget-content <?php echo $this->VisibilityFunctionGetService ?>">
	<h2><?php echo $this->InstanceLanguageText->GetText('GET_SERVICE_TEXT'); ?></h2>
	<div class="DivContentBodyContainerLabelTipTabs">
    	<label>
        	<?php echo $this->InstanceLanguageText->GetText('GET_SERVICE_TEXT_TIP'); ?>
        </label>
    </div>
    <form name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_SERVICE; ?>" 
          id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_SERVICE; ?>" 
          action="<?php echo str_replace("_", "", $this->GetCurrentPage()) . '?=' .  ConfigInfraTools::PAGE_GET_SERVICE . '#tabs15';?>" 
          method="post" >
        <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TEXT_PORT'); ?></label>
			</div>
            <input type="text" name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE; ?>" 
                   id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE; ?>"
                   onblur="ValidateNumberSize('InputSmall', '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE; ?>',
                                                 'DivContentBodySubmit',
                                                 '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_SERVICE_SB; ?>',
                                                 '', 65535, true);"
                   onkeyup="ValidateNumberSize('InputSmall', '<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE; ?>',
                                                 'DivContentBodySubmit',
                                                 '<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_SERVICE_SB; ?>',
                                                 '', 65535, false);"
                   value="<?php if(isset($GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE]))
							   			echo $GLOBALS[ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE]; 
									  ?>"
                   title="<?php echo $this->InstanceLanguageText->GetText('TEXT_PORT'); ?>" maxlength="5"
                   class="InputSmall" />
			<div class="DivContentBodyContainerSelect">
				<select name="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL; ?>" 
                        id="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL; ?>">
                    <option <?php if ($this->SelectedFunctionGetService == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL_TCP) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL_TCP; ?>"> 
                        	<?php echo "TCP"; ?> 
                   	</option>
                    <option <?php if ($this->SelectedFunctionGetService == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL_UDP) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL_UDP; ?>"> 
                        	<?php echo "UDP" ?> 
                   	</option>
				</select>
			</div>
			<input type="submit" name="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_SERVICE_SB; ?>"
                                 id="<?php echo ConfigInfraTools::FM_DIAGNOSTIC_TOOLS_GET_SERVICE_SB; ?>"
                                 class="DivContentBodySubmit"
				                 value="<?php echo $this->InstanceLanguageText->GetText('TEXT_BUTTON_GET'); ?>"/>
		</div>
	</form>
    <div class="<?php if(isset($this->VisibilityFunctionGetServiceMessage))
	                     echo $this->VisibilityFunctionGetServiceMessage; ?> DivReturnForm">
        <div class="">
            <label>
                <?php if($this->ExecutedFunction == ConfigInfraTools::FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE) 
                    echo $this->ExecutedFunctionReturnMessage; 
                ?>
            </label>
        </div>
    </div>
    <div class="<?php if(isset($this->VisibilityFunctionGetServiceMessageBottom))
	                     echo $this->VisibilityFunctionGetServiceMessageBottom; ?>"></div>
</div>