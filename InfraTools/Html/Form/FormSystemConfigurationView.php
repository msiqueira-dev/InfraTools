<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText)) echo $this->ReturnEmptyText ?>	
		<?php if(isset($this->ReturnText))      echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_SYSTEM_CONFIGURATION_VIEW -->
<form name="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW; ?>" method="POST" >
    <!-- FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueSystemConfigurationOptionNumber; ?></label>
        </div>
    </div>
    <!-- FIELD_SYSTEM_CONFIGURATION_OPTION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueSystemConfigurationOptionName; ?></label>
        </div>
    </div>
    <!-- FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueSystemConfigurationOptionDescription; ?></label>
        </div>
    </div>
    <!-- FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <img src="
                    <?php  
						if($this->InputValueSystemConfigurationOptionActive)
							echo $this->Config->DefaultServerImage . 'Icons/IconInfraToolsVerified.png';
						else echo $this->Config->DefaultServerImage . 'Icons/IconInfraToolsNotVerified.png';
					?>" alt="SystemConfigurationOptionActive" 
                 width="20" height="20" />
        </div>
    </div>
    <!-- FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">
                   <?php 
                   		if($this->InputValueSystemConfigurationOptionValue != NULL)
							echo $this->InputValueSystemConfigurationOptionValue;
						else echo $this->InstanceLanguageText->GetText('NULL_EMPTY');
				   ?>
	        </label>
        </div>
    </div>
	<div class="DivClearFloat"></div>
     <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTER_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegisterDate; ?></label>
        </div>
    </div>
</form>
<!-- SUBMIT -->
<div class="DivContentBodyContainer">
	<!-- FM_SYSTEM_CONFIGURATION_VIEW_UPDT -->
	<form name="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_UPDT; ?>" 
		  id="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_UPDT; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		  <input type="submit" name="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_UPDT_SB; ?>" 
				 id="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_UPDT_SB; ?>"
				 class="DivContentBodySubmitBigger"
				 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"/>
	</form>
	<!-- FM_SYSTEM_CONFIGURATION_VIEW_DEL -->
	<form name="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_DEL; ?>" 
		  id="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_DEL; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		  <input type="submit" name="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_DEL_SB; ?>" 
				 id="<?php echo ConfigInfraTools::FM_SYSTEM_CONFIGURATION_VIEW_DEL_SB; ?>"
				 class="DivContentBodySubmitBigger"
				 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DEL'); ?>"
				 onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
	</form>
</div>
<div class="DivClearFloat"></div>