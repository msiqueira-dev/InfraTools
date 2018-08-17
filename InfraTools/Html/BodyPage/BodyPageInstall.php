<!-- BODY_PAGE_INSTALL -->
<div class="DivBody">
    <div class="DivContentBody">
    	<?php
			if($this->Install)
			{
				$return = $this->FacedePersistenceInfraTools->InfraToolsCreateDataBase(ConfigInfraTools::CHECKBOX_CHECKED);	
			}
		?>
	</div>
</div>