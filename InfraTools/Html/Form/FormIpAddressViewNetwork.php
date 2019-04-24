<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass))  echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnText))  echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_IP_ADDRESS_VIEW_NETWORK -->
<form name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK; ?>" 
      id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_VIEW_NETWORK; ?>" method="post" >
    <!-- FIELD_NETWORK_IP -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_IP').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNetworkIp; ?></label>
        </div>
    </div>
   	<!-- FIELD_NETWORK_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNetworkName; ?></label>
        </div>
    </div>
    <!-- FIELD_NETWORK_NETMASK -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_NETMASK').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNetworkNetmask; ?></label>
        </div>
    </div>
    <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTER_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegisterDate; ?></label>
        </div>
    </div>
    <!-- SUBMIT -->
    <?php 
	if($this->GetCurrentPage() == ConfigInfraTools::PAGE_ADMIN_IP_ADDRESS)
	{ 
	?>
		<div class="DivContentBodyContainer">
		    <input type="submit" name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_VIEW_UPDT_NETWORK_SB; ?>" 
									 id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_VIEW_UPDT_NETWORK_SB; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT_NETWORK'); ?>"/>
			<input type="submit" name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_VIEW_DEL_SB; ?>" 
					   id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_VIEW_DEL_SB; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DEL'); ?>"
					   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
			<input type="submit" name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_VIEW_LST_USERS; ?>" 
					   id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_VIEW_LST_USERS; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LST_USERS'); ?>"/>
		</div>
	<?php
	}
	?>
</form>