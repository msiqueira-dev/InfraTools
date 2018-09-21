<?php
	if (file_exists("../Php/Controller/InfraToolsFactory.php"))
		include_once("../Php/Controller/InfraToolsFactory.php");
	else include_once("Php/Controller/InfraToolsFactory.php");
	include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	include_once(SITE_PATH_PHP_VIEW . basename(__FILE__, '.php')  . ".php");
	$InfraToolsFactory = InfraToolsFactory::__create();
	$InfraToolsFactory->CreatePage(basename(__FILE__, '.php'), Page::GetPageFileDefaultLanguageByDir(basename(__DIR__)));
?>