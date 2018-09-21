<?php
	include_once("Php/Controller/InfraToolsFactory.php");
	include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");

	$Return = NULL; $SessionValue = NULL;
	$InfraToolsFactory = InfraToolsFactory::__create();
	$Session = $InfraToolsFactory->CreateSession();
	$Return = $Session->GetSessionValue(ConfigInfraTools::SESS_LANGUAGE, $SessionValue);
	if($Return == ConfigInfraTools::SUCCESS)
		include_once(SITE_PATH_PHP_VIEW . "PageNotFound.php");
	else
	{
		$Session->SetSessionValue(ConfigInfraTools::SESS_LANGUAGE, ConfigInfraTools::LANGUAGE_PORTUGUESE); 
		include_once(REL_PATH . "Pt/PageNotFound.php");
	}
?>