<?php 
	include_once("Php/Controller/InfraToolsFactory.php");
	include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	
	$InfraToolsFactory = InfraToolsFactory::__create();
	$ConfigInfraTools = $InfraToolsFactory->CreateConfigInfraTools();
	$ConfigInfraTools->AuthenticateServerBasic();
	phpinfo();
?>