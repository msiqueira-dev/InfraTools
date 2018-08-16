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

class PageContact extends PageInfraTools
{	
	/* Propiedades de página */
	public $InputValueMessage            = "";
	public $InputValueSubject            = "";
	public $InputValueTitle              = "";
	public $ReturnMessageClass           = "";
	public $ReturnMessageText            = "";
	public $ReturnSubjectClass           = "";
	public $ReturnSubjectText            = "";
	public $ReturnTitleClass             = "";
	public $ReturnTitleText              = "";

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
	
	protected function LoadCaptcha()
	{
		$InstanceBaseCaptcha = $this->Factory->CreateCaptcha();
		$stringCaptcha = $InstanceBaseCaptcha->GenerateRandomString();
		$this->Session->SetSessionValue(ConfigInfraTools::FORM_CAPTCHA_CONTACT, $stringCaptcha);
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
			echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::CONTACT_FORM, $this->InputFocus);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		$PageForm = $this->Factory->CreatePageForm();
		if($this->CheckInstanceUser() != ConfigInfraTools::USER_NOT_LOGGED_IN)
		{
			$this->InputFocus      = ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
			$this->InputValueUserName  = $this->InstanceInfraToolsUser->GetName();
			$this->InputValueUserEmail = $this->InstanceInfraToolsUser->GetEmail();
		}
		else $this->InputFocus      = ConfigInfraTools::FORM_FIELD_USER_NAME;
		if (isset($_POST[ConfigInfraTools::CONTACT_FORM_SUBMIT]))
		{
			$this->InputFocus = NULL;
			if($this->CheckInstanceUser() != ConfigInfraTools::USER_NOT_LOGGED_IN)
			{
				$this->InputValueUserName = $this->InstanceInfraToolsUser->GetName();
				if(isset($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL]))
				{
					if($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL] != $this->InstanceInfraToolsUser->GetEmail())
						$this->InputValueUserEmail   = $_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL];
					else $this->InputValueUserEmail  = $this->InstanceInfraToolsUser->GetEmail();
				}
				else $this->InputValueUserEmail  = $this->InstanceInfraToolsUser->GetEmail();
			}
			else
			{
				$this->InputValueUserName    = $_POST[ConfigInfraTools::FORM_FIELD_USER_NAME];
				$this->InputValueUserEmail   = $_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL];
			}
			if (isset($_POST[ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION]))
				$this->InputValueTypeTickeDescription = $_POST[ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION];
			$this->InputValueTickeTitle   = $_POST[ConfigInfraTools::FORM_FIELD_TICKET_TITLE];
			$this->InputValueTickeDescription = $_POST[ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION];
			$this->InputValueCaptcha = $_POST[ConfigInfraTools::FORM_CAPTCHA_CONTACT];
			$this->InstanceBaseSession->GetSessionValue(ConfigInfraTools::FORM_CAPTCHA_CONTACT, $captcha);
			$FormValidator = $this->Factory->CreateFormValidator();
			$arrayConstants = array(); $matrixConstants = array(); $arrayOptions = array();
			
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
			
			//FORM_FIELD_TYPE_TICKET_DESCRIPTION
			$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
			$arrayElementsClass[2]        = &$this->ReturnTypeTickeDescriptionClass;
			$arrayElementsDefaultValue[2] = ""; 
			$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TITLE;
			$arrayElementsInput[2]        = $this->InputValueTypeTickeDescription; 
			$arrayElementsMinValue[2]     = 0; 
			$arrayElementsMaxValue[2]     = 45; 
			$arrayElementsNullable[2]     = FALSE;
			$arrayElementsText[2]         = &$this->ReturnTickeTypeTickeDescriptionText;
			array_push($arrayConstants, 'FORM_INVALID_TYPE_TICKET_DESCRIPTION', 
					                    'FORM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			
			//FORM_FIELD_TICKET_TITLE
			$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_TICKET_TITLE;
			$arrayElementsClass[3]        = &$this->ReturnTypeTickeTitleClass;
			$arrayElementsDefaultValue[3] = ""; 
			$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TITLE;
			$arrayElementsInput[3]        = $this->InputValueTickeTitle; 
			$arrayElementsMinValue[3]     = 0; 
			$arrayElementsMaxValue[3]     = 90; 
			$arrayElementsNullable[3]     = FALSE;
			$arrayElementsText[3]         = &$this->ReturnTickeTitleText;
			array_push($arrayConstants, 'FORM_INVALID_TICKET_TITLE', 'FORM_INVALID_TICKET_TITLE_SIZE', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			
			//FORM_FIELD_TICKET_DESCRIPTION
			$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION;
			$arrayElementsClass[4]        = &$this->ReturnTypeTicketDescriptionClass;
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
			
			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
												$matrixConstants, $arrayOptions);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
					                                                                        ($this->InstanceLanguageText);
				$return = $this->InstanceInfraToolsFacedeBusiness->SendEmailContact($this->InputValueUserEmail,
																							  $this->InputValueTickeDescription,
																							  $this->InputValueUserName, 
																							  $this->InputValueTypeTickeDescription, 
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
		$this->LoadCaptcha();
		$this->LoadHtml();
	}
}
?>