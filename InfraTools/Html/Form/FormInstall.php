<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))       echo $this->ReturnEmptyText ?>
		<?php if(isset($this->DataBaseReturnMessage)) echo $this->DataBaseReturnMessage ?>	
		<?php if(isset($this->ReturnText))            echo $this->ReturnText; ?>
	</label>
</div>
<form name="<?php echo ConfigInfraTools::FORM_INSTALL; ?>" 
      id="<?php echo ConfigInfraTools::FORM_INSTALL; ?>"
      method="POST">
<!-- SUBMIT -->
	<div class="DivContentBodyContainer">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_INSTALL_NEW_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_INSTALL_NEW_SUBMIT; ?>"
								 class="DivContentBodySubmitBigger"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_NEW'); ?>"/>
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_INSTALL_IMPORT_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_INSTALL_IMPORT_SUBMIT; ?>"
								 class="DivContentBodySubmitBigger"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_IMPORT'); ?>"/>
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_INSTALL_REINSTALL_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_INSTALL_REINSTALL_SUBMIT; ?>"
								 class="DivContentBodySubmitBigger"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_REINSTALL'); ?>"/>
	</div>
</form>