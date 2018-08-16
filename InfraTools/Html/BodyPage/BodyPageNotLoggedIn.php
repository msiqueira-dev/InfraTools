<!-- BODY PAGE NOT LOGGED IN -->
<div class="DivBody">
    <div class="DivContentBodyNotLoggedIn">
    	<h2> <?php echo $this->InstanceLanguageText->GetText('NOT_LOGGED_IN') ?> </h2>
    </div>
</div>
<?php include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . str_replace("_", "", ConfigInfraTools::PAGE_LOGIN) . ".php"); ?>