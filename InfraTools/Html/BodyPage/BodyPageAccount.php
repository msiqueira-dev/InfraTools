<!-- BODY PAGE ACCOUNT -->
<div class="DivBody">
    <div class="DivContentBody">
		<?php
        if ($this->Page == ConfigInfraTools::PAGE_ACCOUNT_CHANGE_PASSWORD)
            include_once(REL_PATH . ConfigInfraTools::PATH_FORM . "UserChangePassword" . ".php");
        elseif ($this->Page == ConfigInfraTools::PAGE_ACCOUNT_UPDATE)
            include_once(REL_PATH . ConfigInfraTools::PATH_FORM . "UserUpdate" . ".php");
		else 
            include_once(REL_PATH . ConfigInfraTools::PATH_FORM . "UserView" . ".php");
		?>
	</div>
</div>