<?php
/************************************************************************
Class: PageSupportContact.php
Creation: 2019/02/08
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/Controller/InfraToolsFacedeBusiness.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for costumer to open a ticket. 
Functions: 
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("InfraToolsFacedeBusiness"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedeBusiness.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedeBusiness.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedeBusiness');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageSupportContact extends PageInfraTools
{	
	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}

	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		$this->Page = $Page;
		$this->PageCheckLogin = FALSE;
		parent::__construct($Config, $Language, $Page);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	public function LoadPage()
	{
		if($this->CheckInstanceUser() != ConfigInfraTools::USER_NOT_LOGGED_IN)
		{
			$this->InputFocus      = ConfigInfraTools::FIELD_TICKET_DESCRIPTION;
			$this->InputValueUserName  = $this->User->GetName();
			$this->InputValueUserEmail = $this->User->GetEmail();
		}
		else $this->InputFocus      = ConfigInfraTools::FIELD_USER_NAME;
		if (isset($_POST[ConfigInfraTools::FM_TICKET_CONTACT_SB]))
		{
			$this->InputFocus = NULL;
			if($this->CheckInstanceUser() != ConfigInfraTools::USER_NOT_LOGGED_IN)
			{
				$this->InputValueUserName = $this->User->GetName();
				if(isset($_POST[ConfigInfraTools::FIELD_USER_EMAIL]))
				{
					if($_POST[ConfigInfraTools::FIELD_USER_EMAIL] != $this->User->GetEmail())
						$this->InputValueUserEmail   = $_POST[ConfigInfraTools::FIELD_USER_EMAIL];
					else $this->InputValueUserEmail  = $this->User->GetEmail();
				}
				else $this->InputValueUserEmail  = $this->User->GetEmail();
			}
			else
			{
				$this->InputValueUserName    = $_POST[ConfigInfraTools::FIELD_USER_NAME];
				$this->InputValueUserEmail   = $_POST[ConfigInfraTools::FIELD_USER_EMAIL];
			}
			if (isset($_POST[ConfigInfraTools::FIELD_TICKET_DESCRIPTION]))
				$this->InputValueTicketDescription = $_POST[ConfigInfraTools::FIELD_TICKET_DESCRIPTION];
			$this->InputValueTicketType    = $_POST[ConfigInfraTools::FIELD_TICKET_TYPE];
			$this->InputValueTicketTitle   = $_POST[ConfigInfraTools::FIELD_TICKET_TITLE];
			$this->InputValueTicketDescription = $_POST[ConfigInfraTools::FIELD_TICKET_DESCRIPTION];
			$this->InputValueCaptcha = $_POST[ConfigInfraTools::FIELD_TICKET_CONTACT_CAPTCHA];
			$return = $this->SupportContact(ConfigInfraTools::APPLICATION_INFRATOOLS,
											$this->InputValueCaptcha,
											$this->InputValueTicketTitle,
											$this->InputValueTicketType,
											$this->InputValueTicketDescription,
											$this->InputValueUserEmail,
											$this->InputValueUserName,
											$this->InputValueHeaderDebug);
		}
		$this->CaptchaLoad(ConfigInfraTools::FIELD_TICKET_CONTACT_CAPTCHA, $this->InputValueHeaderDebug);
		$this->LoadHtml(FALSE);
	}
}
?>