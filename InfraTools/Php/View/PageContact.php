<?php
/************************************************************************
Class: PageContact.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
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
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageContact extends PageInfraTools
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
		$PageForm = $this->Factory->CreatePageForm();
		if($this->CheckInstanceUser() != ConfigInfraTools::USER_NOT_LOGGED_IN)
		{
			$this->InputFocus      = ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION;
			$this->InputValueUserName  = $this->User->GetName();
			$this->InputValueUserEmail = $this->User->GetEmail();
		}
		else $this->InputFocus      = ConfigInfraTools::FORM_FIELD_USER_NAME;
		if (isset($_POST[ConfigInfraTools::CONTACT_FORM_SUBMIT]))
		{
			$this->InputFocus = NULL;
			if($this->CheckInstanceUser() != ConfigInfraTools::USER_NOT_LOGGED_IN)
			{
				$this->InputValueUserName = $this->User->GetName();
				if(isset($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL]))
				{
					if($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL] != $this->User->GetEmail())
						$this->InputValueUserEmail   = $_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL];
					else $this->InputValueUserEmail  = $this->User->GetEmail();
				}
				else $this->InputValueUserEmail  = $this->User->GetEmail();
			}
			else
			{
				$this->InputValueUserName    = $_POST[ConfigInfraTools::FORM_FIELD_USER_NAME];
				$this->InputValueUserEmail   = $_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL];
			}
			if (isset($_POST[ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION]))
				$this->InputValueTicketDescription = $_POST[ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION];
			$this->InputValueTicketType    = $_POST[ConfigInfraTools::FORM_FIELD_TICKET_TYPE];
			$this->InputValueTicketTitle   = $_POST[ConfigInfraTools::FORM_FIELD_TICKET_TITLE];
			$this->InputValueTicketDescription = $_POST[ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION];
			$this->InputValueCaptcha = $_POST[ConfigInfraTools::FORM_CAPTCHA_CONTACT];
			$this->Session->GetSessionValue(ConfigInfraTools::FORM_CAPTCHA_CONTACT, $captcha);
			$FormValidator = $this->Factory->CreateFormValidator();
			$arrayConstants = array(); $arrayOptions = array(); $matrixConstants = array(); $matrixOptions = array();
			
			//FORM_FIELD_USER_NAME
			$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_USER_NAME;
			$arrayElementsClass[0]        = &$this->ReturnUserNameClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NAME;
			$arrayElementsInput[0]        = $this->InputValueUserName; 
			$arrayElementsMinValue[0]     = 0; 
			$arrayElementsMaxValue[0]     = 45; 
			$arrayElementsNullable[0]     = FALSE;
			$arrayElementsText[0]         = &$this->ReturnUserNameText;
			array_push($arrayConstants, 'FORM_INVALID_USER_NAME', 'FORM_INVALID_USER_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($matrixOptions, $arrayOptions);
			
			//FORM_FIELD_USER_EMAIL
			$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_USER_EMAIL;
			$arrayElementsClass[1]        = &$this->ReturnUserEmailClass;
			$arrayElementsDefaultValue[1] = ""; 
			$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
			$arrayElementsInput[1]        = $this->InputValueUserEmail; 
			$arrayElementsMinValue[1]     = 0; 
			$arrayElementsMaxValue[1]     = 60; 
			$arrayElementsNullable[1]     = FALSE;
			$arrayElementsText[1]         = &$this->ReturnUserEmailText;
			array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($matrixOptions, $arrayOptions);
			
			//FORM_FIELD_TICKET_TYPE
			$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_TICKET_TYPE;
			$arrayElementsClass[2]        = &$this->ReturnTicketTypeClass;
			$arrayElementsDefaultValue[2] = ""; 
			$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SUBJECT;
			$arrayElementsInput[2]        = $this->InputValueTicketType; 
			$arrayElementsMinValue[2]     = 0; 
			$arrayElementsMaxValue[2]     = 45; 
			$arrayElementsNullable[2]     = FALSE;
			$arrayElementsText[2]         = &$this->ReturnTicketTypeText;
			array_push($arrayConstants, 'FORM_INVALID_TICKET_TYPE', 'FORM_INVALID_TICKET_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, ConfigInfraTools::CONTACT_SELECT_COMMERCIAL);
			array_push($arrayOptions, ConfigInfraTools::CONTACT_SELECT_DOUBT);
			array_push($arrayOptions, ConfigInfraTools::CONTACT_SELECT_SUGGESTION);
			array_push($matrixOptions, $arrayOptions);
			$arrayOptions = array();
			
			//FORM_FIELD_TICKET_TITLE
			$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_TICKET_TITLE;
			$arrayElementsClass[3]        = &$this->ReturnTickeTitleClass;
			$arrayElementsDefaultValue[3] = ""; 
			$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TITLE;
			$arrayElementsInput[3]        = $this->InputValueTicketTitle; 
			$arrayElementsMinValue[3]     = 0; 
			$arrayElementsMaxValue[3]     = 90; 
			$arrayElementsNullable[3]     = FALSE;
			$arrayElementsText[3]         = &$this->ReturnTickeTitleText;
			array_push($arrayConstants, 'FORM_INVALID_TICKET_TITLE', 'FORM_INVALID_TICKET_TITLE_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($matrixOptions, $arrayOptions);
			
			//FORM_FIELD_TICKET_DESCRIPTION
			$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION;
			$arrayElementsClass[4]        = &$this->ReturnTicketDescriptionClass;
			$arrayElementsDefaultValue[4] = ""; 
			$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_MESSAGE;
			$arrayElementsInput[4]        = $this->InputValueTicketDescription; 
			$arrayElementsMinValue[4]     = 0; 
			$arrayElementsMaxValue[4]     = 500; 
			$arrayElementsNullable[4]     = FALSE;
			$arrayElementsText[4]         = &$this->ReturnTicketDescriptionText;
			array_push($arrayConstants, 'FORM_INVALID_TICKET_DESCRIPTION', 'FORM_INVALID_TICKET_DESCRIPTION_SIZE',
					                    'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($matrixOptions, $arrayOptions);
			
			//FORM_CAPTCHA_CONTACT
			$arrayElements[5]             = ConfigInfraTools::FORM_CAPTCHA_CONTACT;
			$arrayElementsClass[5]        = &$this->ReturnCaptchaClass;
			$arrayElementsDefaultValue[5] = ""; 
			$arrayElementsForm[5]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_COMPARE_STRING;
			$arrayElementsInput[5]        = $this->InputValueCaptcha; 
			$arrayElementsMinValue[5]     = 0; 
			$arrayElementsMaxValue[5]     = 0; 
			$arrayElementsNullable[5]     = FALSE;
			$arrayElementsText[5]         = &$this->ReturnCaptchaText;
			array_push($arrayConstants, 'FORM_INVALID_CAPTCHA');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, $captcha);
			array_push($matrixOptions, $arrayOptions);
			$arrayOptions = array();
			
			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
												$matrixConstants, $Debug, $matrixOptions);
			if($return == ConfigInfraTools::SUCCESS)
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
				if($return == ConfigInfraTools::SUCCESS)
				{ 
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('CONTACT_SUCCESS', 
																						  $this->Language);
				}
				elseif($return == ConfigInfraTools::SEND_EMAIL_ALREADY_SENT)
				{
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																	   'CONTACT_EMAIL_ALREADY_SENT', 
																		$this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
				else
				{
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																	   'CONTACT_EMAIL_ERROR', 
																		$this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
			}
			else
			{
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		$this->CaptchaLoad(ConfigInfraTools::FORM_CAPTCHA_CONTACT, $this->InputValueHeaderDebug);
		$this->LoadHtml(FALSE);
	}
}
?>