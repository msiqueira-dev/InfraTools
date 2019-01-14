<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnText)) echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_CORPORATION_VIEW -->
<form name="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW; ?>" method="post" >
    <!-- NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_CORPORATION_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueCorporationName; ?></label>
        </div>
    </div>
    <!-- ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_CORPORATION_ACTIVE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">
				<?php
						if($this->InstanceCorporation->GetCorporationActive())
							echo "<img src='"   . $this->Config->DefaultServerImage.'Icons/IconInfraToolsVerified.png' . "' 
                                   name='"  . ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION . "'
                                   alt='CorporationVerification' width='20' height='20' />";
						else
							echo "<img src='"   . $this->Config->DefaultServerImage.'Icons/IconInfraToolsNotVerified.png' . "' 
                                   name='"  . ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION . "'
                                   alt='CorporationVerification' width='20' height='20' />";
				?>
        	</label>
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
	if($this->GetCurrentPage() == ConfigInfraTools::PAGE_ADMIN_CORPORATION)
	{ 
	?>
		<div class="DivContentBodyContainer">
			<!-- FORM_CORPORATION_VIEW_UPDATE -->
			<form name="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_UPDATE; ?>" 
				  id="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_UPDATE; ?>" 
				  class="DivFormHorizontalButtons"
				  method="post" >
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_UPDATE_SUBMIT; ?>" 
									 id="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_UPDATE_SUBMIT; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"/>
			</form>
			<!-- FORM_CORPORATION_VIEW_DELETE -->
			<form name="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_DELETE; ?>" 
				  id="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_DELETE; ?>" 
				  class="DivFormHorizontalButtons"
				  method="post" >
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_DELETE_SUBMIT; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_DELETE_SUBMIT; ?>"
						   class="DivContentBodySubmitBigger"
						   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DELETE'); ?>"
					   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
			</form>
			<!-- FORM_CORPORATION_VIEW_LIST_USERS -->
			<form name="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_LIST_USERS; ?>" 
				  id="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_LIST_USERS; ?>" 
				  class="DivFormHorizontalButtons"
				  method="post" >
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_LIST_USERS_SUBMIT; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_CORPORATION_VIEW_LIST_USERS_SUBMIT; ?>"
						   class="DivContentBodySubmitBigger"
						   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_LIST_USERS'); ?>"/>
			</form>
		</div>
	<?php
	}
	?>
</form>