<!-- PAGE_SUPPORT_CONTACT -->
<div class="DivBody">
 	<div class="DivContentBody">
		<?php 
			if($this->ReturnClass != ConfigInfraTools::FM_BACKGROUND_SUCCESS)
				include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
							 str_replace("Page", "", str_replace("_", "", ConfigInfraTools::PAGE_SUPPORT_CONTACT)) . ".php");
			else 
			{
				?>
				<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php echo $this->ReturnClass; ?>">
					<div>
						<div>
							<?php echo $this->ReturnImage; ?>
						</div>
					</div>
					<label>
						<?php echo $this->ReturnText; ?>
					</label>
				</div>
			<?php
			}
		?>
	</div>
</div>