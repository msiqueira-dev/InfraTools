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
	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		$this->Page = $this->GetCurrentPage();
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
		$FacedeBusinessInfraTools = $this->Factory->CreateInfraToolsFacedeBusiness($this->InstanceLanguageText);
		if(isset($this->User))
		{
			$return = $this->UserSelectHashCodeByUserEmail($this->User->GetEmail(), $UniqueHash, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				Page::GetCurrentDomain($domain);
				$link = $domain . str_replace('Language/', '', $this->Language) . "/" .
								  str_replace("_", "",ConfigInfraTools::PAGE_REGISTER_CONFIRMATION) . "?=" . $UniqueHash;
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$return = $FacedeBusinessInfraTools->SendEmailResendConfirmationLink(ConfigInfraTools::APPLICATION_INFRATOOLS,
																					 $this->User->GetName(),
																					 $this->User->GetEmail(),
																					 $link, $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
					$this->ShowDivReturnSuccess("RESEND_CONFIRMATION_LINK_SUCCESS");
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