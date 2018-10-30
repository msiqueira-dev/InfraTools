<?php
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

class PageResendConfirmationLink extends PageInfraTools
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
		$FacedeBusinessInfraTools = $this->Factory->CreateInfraToolsFacedeBusiness($this->InstanceLanguageText);
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		if(isset($this->User))
		{
			$return = $FacedePersistenceInfraTools->UserSelectHashCodeByUserEmail($this->User->GetEmail(), 
																			      $UniqueHash, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				Page::GetCurrentDomain($domain);
				$link = $domain . str_replace('Language/', '', $this->Language) . "/" .
								  str_replace("_", "",ConfigInfraTools::PAGE_REGISTER_CONFIRMATION) . "?=" . $UniqueHash;
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$return = $FacedeBusinessInfraTools->SendEmailResendConfirmationLink($this->User->GetName(),
																					 $this->User->GetEmail(),
																					 $link, $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->ReturnText  = $this->InstanceLanguageText->GetConstant('RESEND_CONFIRMATION_LINK_SUCCESS', 
																	$this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
											   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				}
				else
				{
					$this->ReturnText  = $this->InstanceLanguageText->GetConstant('RESEND_CONFIRMATION_LINK_ERROR', 
																	$this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
											   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
			}
			else
			{
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('RESEND_CONFIRMATION_LINK_ERROR', 
																	$this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
											   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
			$this->LoadHtml(FALSE);
		}
		else
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace('Language/', '', $this->Language) . "/" 
								        . str_replace("_", "",ConfigInfraTools::PAGE_HOME));
		}
	}
}
?>