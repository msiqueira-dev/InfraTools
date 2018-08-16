<?php
	include_once("Php/Controller/InfraToolsFactory.php");
	include_once(BASE_PATH_PHP_CONTROLLER . "Session.php");
	include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	include_once(SITE_PATH_PHP_VIEW . "PageHome.php");

	$InfraToolsFactory = InfraToolsFactory::__create();
	$pageObj = $InfraToolsFactory->CreatePage(str_replace("_", "",ConfigInfraTools::PAGE_HOME));
	$Session = $InfraToolsFactory->CreateSession();
	$Session->SetSessionValue(ConfigInfraTools::SESSION_LANGUAGE, ConfigInfraTools::LANGUAGE_PORTUGUESE);
	$pageObj->LoadPageInfraToolsDependencies();
	$pageObj->LoadPage();
?>