<div class="DivHeaderDivisionContainerInfo">
	<label>
		<?php
			echo str_replace('[0]', $this->Device, $this->InstanceLanguageText->GetText('HEADER_DEBUG')); 
		?>
	</label>
</div>
<form name="<?php echo ConfigInfraTools::FM_HEADER_DEBUG; ?>" 
	  id="<?php echo ConfigInfraTools::FM_HEADER_DEBUG; ?>" method="post" class="DivHeaderDivisionContainerInfo">
	<div class="DivHeaderDivisionContainerInfo" >
		<div class="<?php echo $this->ReturnHeaderDebugClass; ?> round" id="DivSliderDebug"></div>
		<label id="SwitchToggle" class="SwitchToggle">
			<input type="hidden" 
				   name="<?php echo ConfigInfraTools::FIELD_HEADER_DEBUG_HIDDEN ?>"
				   id="<?php echo ConfigInfraTools::FIELD_HEADER_DEBUG_HIDDEN ?>" 
				   value="<?php echo ConfigInfraTools::FIELD_HEADER_DEBUG_HIDDEN ?>"
				   onclick="ClickHiddenCheckBox('<?php echo ConfigInfraTools::FIELD_HEADER_DEBUG ?>');"/>
			<input type="checkbox" 
				   name="<?php echo ConfigInfraTools::FIELD_HEADER_DEBUG ?>"
				   Id="<?php echo ConfigInfraTools::FIELD_HEADER_DEBUG ?>"
				   onChange="setTimeout(function(){ SubmitForm('<?php echo ConfigInfraTools::FM_HEADER_DEBUG ?>'); }, 1000);
				             ChangeSliderCssClass('DivSliderDebug', 'SwitchToggleSlider', 'SwitchToggleSliderChange');"
				   <?php echo $this->InputValueHeaderDebug; ?>/>
		</label>
	</div>
</form>