<?php
	include_once("Php/Controller/InfraToolsFactory.php");
	include_once(BASE_PATH_PHP_CONTROLLER . "Session.php");
	include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	include_once(SITE_PATH_PHP_VIEW . "PageHome.php");

	$InfraToolsFactory = InfraToolsFactory::__create();
	$Session = $InfraToolsFactory->CreateSession();
    if(!$Session->GetSessionValue(ConfigInfraTools::SESS_LANGUAGE, $language) == ConfigInfraTools::RET_OK)
		$Session->SetSessionValue(ConfigInfraTools::SESS_LANGUAGE, ConfigInfraTools::LANGUAGE_PORTUGUESE);
	$pageObj = $InfraToolsFactory->CreatePage(str_replace("_", "",ConfigInfraTools::PAGE_HOME), $language);
?>