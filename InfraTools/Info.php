<?php 
	include_once("Php/Controller/InfraToolsFactory.php");
	include_once("Php/Controller/ConfigInfraTools.php");
	$InfraToolsFactory = InfraToolsFactory::__create();
	$InfraToolsConfig  = ConfigInfraTools::__create();
	phpinfo();
?>