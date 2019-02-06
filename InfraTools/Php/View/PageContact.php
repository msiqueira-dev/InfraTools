<?php
/************************************************************************
Class: PageContact.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/Controller/InfraToolsFacedeBusiness.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for costumer contact. 
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

class PageContact extends PageInfraTools
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
		$PageForm = $this->Factory->CreatePageForm();
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
			$this->Session->GetSessionValue(ConfigInfraTools::FIELD_TICKET_CONTACT_CAPTCHA, $captcha);
			$FormValidator = $this->Factory->CreateFormValidator();
			$arrayConstants = array(); $arrayOptions = array(); $matrixConstants = array();
			
			//FIELD_USER_NAME
			$arrayElements[0]             = ConfigInfraTools::FIELD_USER_NAME;
			$arrayElementsClass[0]        = &$this->ReturnUserNameClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_NAME;
			$arrayElementsInput[0]        = $this->InputValueUserName; 
			$arrayElementsMinValue[0]     = 0; 
			$arrayElementsMaxValue[0]     = 45; 
			$arrayElementsNullable[0]     = FALSE;
			$arrayElementsText[0]         = &$this->ReturnUserNameText;
			array_push($arrayConstants, 'FM_INVALID_USER_NAME', 'FM_INVALID_USER_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, "");
			
			//FIELD_USER_EMAIL
			$arrayElements[1]             = ConfigInfraTools::FIELD_USER_EMAIL;
			$arrayElementsClass[1]        = &$this->ReturnUserEmailClass;
			$arrayElementsDefaultValue[1] = ""; 
			$arrayElementsForm[1]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_EMAIL;
			$arrayElementsInput[1]        = $this->InputValueUserEmail; 
			$arrayElementsMinValue[1]     = 0; 
			$arrayElementsMaxValue[1]     = 60; 
			$arrayElementsNullable[1]     = FALSE;
			$arrayElementsText[1]         = &$this->ReturnUserEmailText;
			array_push($arrayConstants, 'FM_INVALID_USER_EMAIL', 'FM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, "");
			
			//FIELD_TICKET_TYPE
			$arrayElements[2]             = ConfigInfraTools::FIELD_TICKET_TYPE;
			$arrayElementsClass[2]        = &$this->ReturnTicketTypeClass;
			$arrayElementsDefaultValue[2] = ""; 
			$arrayElementsForm[2]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_SUBJECT;
			$arrayElementsInput[2]        = $this->InputValueTicketType; 
			$arrayElementsMinValue[2]     = 0; 
			$arrayElementsMaxValue[2]     = 45; 
			$arrayElementsNullable[2]     = FALSE;
			$arrayElementsText[2]         = &$this->ReturnTicketTypeText;
			array_push($arrayConstants, 'FM_INVALID_TICKET_TYPE', 'FM_INVALID_TICKET_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, "");
			
			//FIELD_TICKET_TITLE
			$arrayElements[3]             = ConfigInfraTools::FIELD_TICKET_TITLE;
			$arrayElementsClass[3]        = &$this->ReturnTickeTitleClass;
			$arrayElementsDefaultValue[3] = ""; 
			$arrayElementsForm[3]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_TITLE;
			$arrayElementsInput[3]        = $this->InputValueTicketTitle; 
			$arrayElementsMinValue[3]     = 0; 
			$arrayElementsMaxValue[3]     = 90; 
			$arrayElementsNullable[3]     = FALSE;
			$arrayElementsText[3]         = &$this->ReturnTickeTitleText;
			array_push($arrayConstants, 'FM_INVALID_TICKET_TITLE', 'FM_INVALID_TICKET_TITLE_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, "");
			
			//FIELD_TICKET_DESCRIPTION
			$arrayElements[4]             = ConfigInfraTools::FIELD_TICKET_DESCRIPTION;
			$arrayElementsClass[4]        = &$this->ReturnTicketDescriptionClass;
			$arrayElementsDefaultValue[4] = ""; 
			$arrayElementsForm[4]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_MESSAGE;
			$arrayElementsInput[4]        = $this->InputValueTicketDescription; 
			$arrayElementsMinValue[4]     = 0; 
			$arrayElementsMaxValue[4]     = 500; 
			$arrayElementsNullable[4]     = FALSE;
			$arrayElementsText[4]         = &$this->ReturnTicketDescriptionText;
			array_push($arrayConstants, 'FM_INVALID_TICKET_DESCRIPTION', 'FM_INVALID_TICKET_DESCRIPTION_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, "");
			
			//FIELD_TICKET_CONTACT_CAPTCHA
			$arrayElements[5]             = ConfigInfraTools::FIELD_TICKET_CONTACT_CAPTCHA;
			$arrayElementsClass[5]        = &$this->ReturnCaptchaClass;
			$arrayElementsDefaultValue[5] = ""; 
			$arrayElementsForm[5]         = ConfigInfraTools::FM_VALIDATE_FUNCTION_COMPARE_STRING;
			$arrayElementsInput[5]        = $this->InputValueCaptcha; 
			$arrayElementsMinValue[5]     = 0; 
			$arrayElementsMaxValue[5]     = 0; 
			$arrayElementsNullable[5]     = FALSE;
			$arrayElementsText[5]         = &$this->ReturnCaptchaText;
			array_push($arrayConstants, 'FM_INVALID_CAPTCHA');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, $captcha);
			
			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
												$matrixConstants, $this->InputValueHeaderDebug, $arrayOptions);
			if($return == ConfigInfraTools::RET_OK)
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$return = $this->InstanceInfraToolsFacedeBusiness->SendEmailContact(ConfigInfraTools::APPLICATION_INFRATOOLS,
					                                                                $this->InputValueUserEmail,
																					$this->InputValueTicketDescription,
																					$this->InputValueUserName, 
																					$this->InputValueTicketDescription, 
																 					$this->InputValueTicketTitle,
																 					$this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::RET_OK)
					$this->ShowDivReturnSuccess("CONTACT_SUCCESS");
				elseif($return == ConfigInfraTools::SEND_EMAIL_ALREADY_SENT)
					$this->ShowDivReturnWarning("CONTACT_EMAIL_ALREADY_SENT");
				else $this->ShowDivReturnError("CONTACT_EMAIL_ERROR");
			}
			else $this->ShowDivReturnError("CONTACT_EMAIL_ERROR");
		}
		$this->CaptchaLoad(ConfigInfraTools::FIELD_TICKET_CONTACT_CAPTCHA, $this->InputValueHeaderDebug);
		$this->LoadHtml(FALSE);
	}
}
?>