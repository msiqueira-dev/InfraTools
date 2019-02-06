<div class="DivHeaderDivisionContainerInfo">
	<label>
		<?php
			if($this->Device == Page::DEVICE_DESKTOP)
				echo str_replace('[0]', Page::DEVICE_MOBILE, $this->InstanceLanguageText->GetText('HEADER_CHANGE_LAYOUT'));
			else echo str_replace('[0]', Page::DEVICE_DESKTOP, $this->InstanceLanguageText->GetText('HEADER_CHANGE_LAYOUT'));
		?>
	</label>
</div>
<form name="<?php echo ConfigInfraTools::FM_HEADER_LAYOUT; ?>" 
	  id="<?php echo ConfigInfraTools::FM_HEADER_LAYOUT; ?>" method="post" class="DivHeaderDivisionContainerInfo">
	<div class="DivHeaderDivisionContainerInfo" >
		<div class="<?php echo $this->ReturnHeaderLayoutClass; ?> round" id="DivSliderLayout"></div>
		<label id="SwitchToggle" class="SwitchToggle">
			<input type="hidden" 
				   name="<?php echo ConfigInfraTools::FIELD_HEADER_LAYOUT_HIDDEN ?>"
				   id="<?php echo ConfigInfraTools::FIELD_HEADER_LAYOUT_HIDDEN ?>" 
				   value="<?php echo ConfigInfraTools::FIELD_HEADER_LAYOUT_HIDDEN ?>"
				   onclick="ClickHiddenCheckBox('<?php echo ConfigInfraTools::FIELD_HEADER_LAYOUT ?>');"/>
			<input type="checkbox" 
				   name="<?php echo ConfigInfraTools::FIELD_HEADER_LAYOUT ?>"
				   Id="<?php echo ConfigInfraTools::FIELD_HEADER_LAYOUT ?>"
				   onChange="setTimeout(function(){ SubmitForm('<?php echo ConfigInfraTools::FM_HEADER_LAYOUT ?>'); }, 1000);
				             ChangeSliderCssClass('DivSliderLayout', 'SwitchToggleSlider', 'SwitchToggleSliderChange');"
				   <?php echo $this->InputValueHeaderLayout; ?>/>
		</label>
	</div>
</form>