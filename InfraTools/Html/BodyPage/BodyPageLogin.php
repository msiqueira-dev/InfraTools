<!-- BODY PAGE LOGIN -->
<div class="DivBodyLogin">
    <div class="DivContentBodyLogin">
    <?php
		$Session = $this->Factory->CreateSession();
		if($this->Session->GetSessionValue(ConfigInfraTools::SESS_LOGIN_TWO_STEP_VERIFICATION, $variable) == ConfigInfraTools::SUCCESS)
			include_once(REL_PATH . ConfigInfraTools::PATH_FORM . "LoginTwoStepVerification" . ".php");
		else include_once(REL_PATH . ConfigInfraTools::PATH_FORM . 
					 str_replace("Page", "", str_replace("_", "", ConfigInfraTools::PAGE_LOGIN)) . ".php");
	?>
	</div>
</div>