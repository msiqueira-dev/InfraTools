<?php
/************************************************************************
Class: PageRegister.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for registering a new user. 
Functions: 
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


class PageRegister extends PageInfraTools
{	
	/* __create */
	public static function __create($Page, $Language)
	{
		$class = __CLASS__;
		return new $class($Page, $Language);
	}
	
	/* Constructor */
	protected function __construct($Page, $Language) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = FALSE;
		parent::__construct($Page, $Language);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_LOGIN));
		}
	}

	public function LoadPage()
	{
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_USER_NAME;
		if (isset($_POST[ConfigInfraTools::FORM_USER_REGISTER_SUBMIT]))
		{
			$this->ValidateCaptcha = TRUE;
			$this->UserInsert(ConfigInfraTools::APPLICATION_INFRATOOLS,
							  TRUE,
				              @$_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY], 
					  		  @$_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH], 
							  @$_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_YEAR],
							  NULL,
							  $_POST[ConfigInfraTools::FORM_FIELD_USER_COUNTRY],
							  $_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
							  @$_POST[ConfigInfraTools::FORM_FIELD_USER_GENDER],
						      NULL,
							  $_POST[ConfigInfraTools::FORM_FIELD_USER_NAME],
						      $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_NEW],
							  $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT],
							  $_POST[ConfigInfraTools::FORM_FIELD_USER_REGION],
					  		  @$_POST[ConfigInfraTools::FORM_FIELD_USER_SESSION_EXPIRES], 
						      @$_POST[ConfigInfraTools::FORM_FIELD_USER_TWO_STEP_VERIFICATION], 
						      @$_POST[ConfigInfraTools::FORM_FIELD_USER_ACTIVE], 
						      @$_POST[ConfigInfraTools::FORM_FIELD_USER_CONFIRMED],
   							  $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY], 
						      $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX], 
						      $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY],
							  $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX], 
							  ConfigInfraTools::TYPE_USER_DEFAULT_ID, 
							  NULL,
							  $this->InputValueHeaderDebug);	
		}
		$this->CaptchaLoad(ConfigInfraTools::FORM_CAPTCHA_REGISTER, FALSE);
		$this->LoadHtml(FALSE);
	}
}
?>