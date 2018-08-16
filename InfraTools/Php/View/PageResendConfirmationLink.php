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
	public function __construct() 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct();
	}

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}

	protected function LoadHtml()
	{
		$return = NULL;
		echo ConfigInfraTools::HTML_TAG_DOCTYPE;
		echo ConfigInfraTools::HTML_TAG_START;
		$return = $this->IncludeHeadAll(basename(__FILE__, '.php'));
		if ($return == ConfigInfraTools::SUCCESS)
		{
			echo ConfigInfraTools::HTML_TAG_BODY_START;
			echo "<div class='Wrapper'>";
			include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . ".php");
			include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . ConfigInfraTools::PATH_FOOTER);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		$FacedeBusinessInfraTools = $this->Factory->CreateInfraToolsFacedeBusiness($this->InstanceLanguageText);
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		if(isset($this->InstanceInfraToolsUser))
		{
			$return = $FacedePersistenceInfraTools->UserSelectHashCodeByEmail($this->InstanceInfraToolsUser->GetEmail(), 
																					  $UniqueHash, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				Page::GetCurrentDomain($domain);
				$link = $domain . str_replace('Language/', '', $this->Language) . "/" .
								  str_replace("_", "",ConfigInfraTools::PAGE_REGISTER_CONFIRMATION) . "?=" . $UniqueHash;
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$return = $FacedeBusinessInfraTools->SendEmailResendConfirmationLink($this->InstanceInfraToolsUser->GetName(),
																							 $this->InstanceInfraToolsUser->GetEmail(),
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
			$this->LoadHtml();
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