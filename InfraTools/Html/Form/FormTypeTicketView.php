<!-- FORM TYPE TICKET VIEW -->
<form name="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_VIEW; ?>" method="post" >
    <!-- ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('TYPE_TICKET_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTypeTicketId; ?></label>
        </div>
    </div>
    <!-- DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('TYPE_TICKET_DESCRIPTION').":"; ?></label>
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
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer">
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_VIEW_UPDATE_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_VIEW_UPDATE_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"/>
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_VIEW_DELETE_SUBMIT; ?>" 
                   id="<?php echo ConfigInfraTools::FORM_TYPE_TICKET_VIEW_DELETE_SUBMIT; ?>"
                   class="DivContentBodySubmitBigger"
                   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DELETE'); ?>"
                   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
    </div>
</form>
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div class="DivReturnMessageImage">
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnText))                      echo $this->ReturnText; ?>
		<?php if(isset($this->ReturnTypeTicketDescriptionText)) echo $this->ReturnTypeTicketDescriptionText; ?>
	</label>
</div>