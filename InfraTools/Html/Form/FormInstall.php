<form name="<?php echo ConfigInfraTools::FORM_INSTALL; ?>" 
      id="<?php echo ConfigInfraTools::FORM_INSTALL; ?>"
      method="POST" enctype="multipart/form-data">
<!-- SUBMIT -->
	<div class="DivContentBodyContainer">
		<?php if($this->ButtonInstallEnabled)
			  {
		?>
					<input type="submit" name="<?php echo ConfigInfraTools::FORM_INSTALL_NEW_SUBMIT; ?>" 
										 id="<?php echo ConfigInfraTools::FORM_INSTALL_NEW_SUBMIT; ?>"
										 class="DivContentBodySubmitBigger"
										 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_NEW'); ?>"/>
			  <?php
			  }
			  ?>
		<?php if($this->ButtonImportEnabled)
			  {
		?>
					<input type="submit" name="<?php echo ConfigInfraTools::FORM_INSTALL_IMPORT_SUBMIT_HIDDEN; ?>" 
										 id="<?php echo ConfigInfraTools::FORM_INSTALL_IMPORT_SUBMIT_HIDDEN; ?>"
										 class="DivHidden"
										 />
					<input type="file" name="<?php echo ConfigInfraTools::FORM_INSTALL_IMPORT_SUBMIT; ?>" 
									   id="<?php echo ConfigInfraTools::FORM_INSTALL_IMPORT_SUBMIT; ?>"
									   class="DivContentBodySubmitBigger"
									   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_IMPORT'); ?>"
									   onchange="document.getElementById('<?php echo ConfigInfraTools::FORM_INSTALL_IMPORT_SUBMIT_HIDDEN; ?>').click();"
									   accept=".sql"/>
					<label for="file" onclick="document.getElementById('<?php echo ConfigInfraTools::FORM_INSTALL_IMPORT_SUBMIT; ?>').click();">
						<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_IMPORT'); ?>
					</label>
			  <?php
			  }
		      ?>
		<?php if($this->ButtonReinstallEnabled)
			  {
		?>
					<input type="submit" name="<?php echo ConfigInfraTools::FORM_INSTALL_REINSTALL_SUBMIT; ?>" 
									 id="<?php echo ConfigInfraTools::FORM_INSTALL_REINSTALL_SUBMIT; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_REINSTALL'); ?>"/>
		      <?php
			  }
		      ?>
	</div>
</form>
<!-- DIV_RETURN -->	
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))            echo $this->ReturnEmptyText ?>
		<?php if(isset($this->ReturnText))                 echo "<h2><b>" . $this->ReturnText . "</b></h2><br>"; ?>
		<?php if(isset($this->DataBaseReturnMessage))      echo $this->DataBaseReturnMessage ?>
		<?php if(isset($this->DataBaseImportErrorQueries))
			  {
				  if(is_array($this->DataBaseImportErrorQueries))
				  {
					  foreach($this->DataBaseImportErrorQueries as $key => $errorQuery)
						  echo $errorQuery . "<br>";
				  }
			  }
		?>	
	</label>
</div>