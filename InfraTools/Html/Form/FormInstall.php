<form name="<?php echo ConfigInfraTools::FM_INSTALL; ?>" 
      id="<?php echo ConfigInfraTools::FM_INSTALL; ?>"
      method="POST" enctype="multipart/form-data">
<!-- SUBMIT -->
	<div class="DivContentBodyContainer">
		<?php if($this->ButtonInstallEnabled)
			  {
		?>
					<input type="submit" name="<?php echo ConfigInfraTools::FM_INSTALL_NEW_SB; ?>" 
										 id="<?php echo ConfigInfraTools::FM_INSTALL_NEW_SB; ?>"
										 class="DivContentBodySubmitBigger"
										 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_NEW'); ?>"
										 />
			  <?php
			  }
			  ?>
		<?php if($this->ButtonImportEnabled)
			  {
		?>
					<input type="submit" name="<?php echo ConfigInfraTools::FM_INSTALL_IMPORT_SB_HIDDEN; ?>" 
										 id="<?php echo ConfigInfraTools::FM_INSTALL_IMPORT_SB_HIDDEN; ?>"
										 class="DivHidden"
										 />
					<input type="file" name="<?php echo ConfigInfraTools::FM_INSTALL_IMPORT_SB; ?>" 
									   id="<?php echo ConfigInfraTools::FM_INSTALL_IMPORT_SB; ?>"
									   class="DivContentBodySubmitBigger"
									   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_IMPORT'); ?>"
									   onchange="document.getElementById('<?php echo ConfigInfraTools::FM_INSTALL_IMPORT_SB_HIDDEN; ?>').click();"
									   accept=".sql"/>
					<label for="file" onclick="document.getElementById('<?php echo ConfigInfraTools::FM_INSTALL_IMPORT_SB; ?>').click();">
						<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_IMPORT'); ?>
					</label>
			  <?php
			  }
		      ?>
		<?php if($this->ButtonReinstallEnabled)
			  {
		?>
					<input type="submit" name="<?php echo ConfigInfraTools::FM_INSTALL_REINSTALL_SB; ?>" 
									 id="<?php echo ConfigInfraTools::FM_INSTALL_REINSTALL_SB; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_REINSTALL'); ?>"
									 onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
		      <?php
			  }
		      ?>
		<?php if($this->ButtonExportEnabled)
			  {
		?>
					<input type="submit" name="<?php echo ConfigInfraTools::FM_INSTALL_EXPORT_SB; ?>" 
									 id="<?php echo ConfigInfraTools::FM_INSTALL_EXPORT_SB; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_INSTALL_EXPORT'); ?>"
									 />
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