<!-- BODY_PAGE_INSTALL -->
<div class="DivBody">
    <div class="DivContentBody">
    	<?php
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->InfraToolsCreateDataBase(ConfigInfraTools::CHECKBOX_CHECKED);
		?>
	</div>
</div>