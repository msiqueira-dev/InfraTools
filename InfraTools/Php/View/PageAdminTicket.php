<?php
/************************************************************************
Class: PageAdminTicket.php
Creation: 07/11/2017
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for the page AdminTicket
Functions: 
			public    function LoadPage();
			
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("Ticket"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Ticket.php"))
		include_once(BASE_PATH_PHP_MODEL . "Ticket.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Ticket');
}
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}

class PageAdminTicket extends PageAdmin
{
	public $ArrayTicket  = NULL;
	
	/* __create */
	public static function __create($Page, $Language)
	{
		$class = __CLASS__;
		return new $class($Page, $Language);
	}
	
	/* Constructor */
	protected function __construct($Page, $Language) 
	{
		parent::__construct($Page, $Language);
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>