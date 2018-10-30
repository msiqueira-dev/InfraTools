<?php
/************************************************************************
Class: PageRegisterConfirmation.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			InfraTools - Php/Controller/InfraToolsFacedeBusiness.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for recoverying the user password where it will send a code to the user's email. 
Functions: 
			public    function GetCurrentPage();
			public    function LoadPage();
			
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageRegisterConfirmation extends PageInfraTools
{	
	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = FALSE;
		parent::__construct($Language);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}

	public function LoadPage()
	{
		Page::GetCurrentURL($pageUrl);
		$hashCode = substr(strstr($pageUrl,  "?="), 2);
		if(!empty($hashCode))
		{
			$return = $this->UserSelectUserActiveByHashCode($hashCode, $active, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				if ($active)
				{		
					$this->ReturnText = $this->InstanceLanguageText->GetConstant('REGISTER_CONFIRMATION_ALREADY_CONFIRMED', $this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage = "<img src='" . $this->Config->DefaultServerImage . 
										                ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				}
				else
				{
					$return = $this->UserUpdateUserConfirmedByHashCode(TRUE, $hashCode, $this->InputValueHeaderDebug);
					if ($return == ConfigInfraTools::SUCCESS)
					{
						$return = $this->UserSelectByHashCode($hashCode, $this->User, $this->InputValueHeaderDebug);
						if ($return == ConfigInfraTools::SUCCESS)
						{
							$this->Session->SetSessionValue(ConfigInfraTools::SESS_USER, $this->User);
							$this->ReturnText = $this->InstanceLanguageText->GetConstant('REGISTER_CONFIRMATION_SUCCESS', 
																						 $this->Language);
						}
					}
				}
			}
		}
		else
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
								        . str_replace("_", "",ConfigInfraTools::PAGE_HOME));
		}
		$this->LoadHtml(FALSE);
	}
}
?>