<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Sao_Paulo");
if(defined('SITE_PATH_PHP_CONTROLLER'))
	include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
else include_once("../Php/Controller/InfraToolsFactory.php");
include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");

$InstanceBaseCaptcha = NULL; $Session = NULL; $ConfigInfraTools = NULL; $InfraToolsFactory = NULL;
$InfraToolsFactory = InfraToolsFactory::__create();
$ConfigInfraTools = $InfraToolsFactory->CreateConfigInfraTools();
$InstanceBaseCaptcha = $InfraToolsFactory->CreateCaptcha();
$Session = $InfraToolsFactory->CreateSession();
$Session->GetSessionValue(ConfigInfraTools::FORM_CAPTCHA_CONTACT, $stringCaptcha);
$InstanceBaseCaptcha->CreateAndWriteCaptchaImage($stringCaptcha); 
?>