<?php
	if (file_exists("../Php/Controller/InfraToolsFactory.php"))
		include_once("../Php/Controller/InfraToolsFactory.php");
	else include_once("Php/Controller/InfraToolsFactory.php");
	include_once(BASE_PATH_PHP_CONTROLLER . "Session.php");
	include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	include_once(SITE_PATH_PHP_VIEW . basename(__FILE__, '.php')  . ".php");

	$InfraToolsFactory = InfraToolsFactory::__create();
	$pageObj = $InfraToolsFactory->CreatePage(basename(__FILE__, '.php'));
	if(get_class ($pageObj) != basename(__FILE__, '.php'))
		exit("PageObject: " . get_class ($pageObj) . "<br>" . "Expected: " . basename(__FILE__, '.php'));
	$Session = $InfraToolsFactory->CreateSession();
	$Session->SetSessionValue(ConfigInfraTools::SESSION_LANGUAGE, $pageObj->GetPageFileDefaultLanguageByDir(basename(__DIR__)));
	if (strpos($_SERVER['REQUEST_URI'],'Login') == TRUE)
	{
		$pageObj->DisableGenericHtml = FALSE;
		$pageObj->LoadPageInfraToolsDependencies();
		$return = $pageObj->CheckLogin();
		if($return == ConfigInfraTools::SUCCESS && $pageObj->CheckInstanceUser() == ConfigInfraTools::SUCCESS)
		{
			Page::GetCurrentDomain($domain);
			$pageObj->RedirectPage($domain . str_replace('Language/', '', $pageObj->Language) . "/" .
											 str_replace("_","",ConfigInfraTools::PAGE_HOME));
		}
		else $pageObj->LoadPage();
	}
?>