<div class="DivBody">
    <div class="DivContentBody">
		<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php echo $this->ReturnClass; ?>">
			<div class="">
				<div>
					<?php echo $this->ReturnImage; ?>
				</div>
			</div>
			<label>
				<?php 
					echo $this->InstanceLanguageText->GetText('USER_NOT_CONFIRMED');
					include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . str_replace("_", "", ConfigInfraTools::PAGE_LOGIN) . "Link.php");
				?>
			</label>
		</div>
	</div>
</div>