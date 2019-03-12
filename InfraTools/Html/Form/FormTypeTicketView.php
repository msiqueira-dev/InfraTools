<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnText))                      echo $this->ReturnText; ?>
		<?php if(isset($this->ReturnTypeTicketDescriptionText)) echo $this->ReturnTypeTicketDescriptionText; ?>
	</label>
</div>
<!-- FM_TYPE_TICKET_VIEW -->
<form name="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW; ?>" method="post" >
    <!-- FIELD_TYPE_TICKET_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_TYPE_TICKET_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTypeTicketDescription; ?></label>
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
</form>
<!-- SUBMIT -->
<div class="DivContentBodyContainer">
	<!-- FM_TYPE_TICKET_VIEW_UPDT -->
	<form name="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_UPDT; ?>" 
		  id="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_UPDT; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		<input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_UPDT_SB; ?>" 
							 id="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_UPDT_SB; ?>"
							 class="DivContentBodySubmitBigger"
							 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"/>
	</form>
	<!-- FM_TYPE_TICKET_VIEW_DEL -->
	<form name="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_DEL; ?>" 
		  id="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_DEL; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		<input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_DEL_SB; ?>" 
				   id="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_DEL_SB; ?>"
				   class="DivContentBodySubmitBigger"
				   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DEL'); ?>"
			   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
	</form>
	<!-- FM_TYPE_TICKET_VIEW_LST_USERS -->
	<form name="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_LST_USERS; ?>" 
		  id="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_LST_USERS; ?>" 
		  class="DivFormHorizontalButtons"
		  method="post" >
		<input type="submit" name="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_LST_USERS_SB; ?>" 
				   id="<?php echo ConfigInfraTools::FM_TYPE_TICKET_VIEW_LST_USERS_SB; ?>"
				   class="DivContentBodySubmitBigger"
				   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LST_USERS'); ?>"/>
	</form>
</div>