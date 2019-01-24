<?php
	if (file_exists("../Php/Controller/InfraToolsFactory.php"))
		include_once("../Php/Controller/InfraToolsFactory.php");
	else include_once("Php/Controller/InfraToolsFactory.php");
	include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	$InfraToolsFactory = InfraToolsFactory::__create();
	$InfraToolsFactory->CreatePage(basename(__FILE__, '.php'), Config::GetDefaultLanguageByDir(basename(__DIR__)));
?>