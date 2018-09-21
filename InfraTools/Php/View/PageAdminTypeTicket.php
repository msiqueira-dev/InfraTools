<?php
/************************************************************************
Class: PageAdminTypeTicket.php
Creation: 07/11/2017
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/Controller/FacedePersistenceInfraTools.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for the page AdminTypeTicket
Functions: 
			protected function ExecuteTypeTicketDelete();
			protected function ExecuteTypeTicketInsert();
			protected function ExecuteTypeTicketSelectById($Id);
			protected function ExecuteTypeTicketUpdate();
			protected function LoadHtml();
			public    function GetCurrentPage();
			public    function LoadPage();
			
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("TypeTicket"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "TypeTicket.php"))
		include_once(BASE_PATH_PHP_MODEL . "TypeTicket.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeTicket');
}
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}


class PageAdminTypeTicket extends PageAdmin
{
	protected $TypeTicket      = NULL;
	public    $ArrayTypeTicket = NULL;

	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Language);
	}

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	protected function ExecuteTypeTicketDelete()
	{
		if($this->TypeTicket != NULL)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->TypeTicketDelete($this->TypeTicket->GetTypeTicketId(), 
																	 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket);
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_DELETE_SUCCESS', $this->Language); 
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return $return;
			}
			else
			{
				if($return == ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
					$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_DELETE_ERROR_DEPENDENCY_TICKET', 
																				 $this->Language);
				else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_DELETE_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
	}
	
	protected function ExecuteTypeTicketInsert()
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeTicketDescription = $_POST[ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION];
		$arrayConstants = array(); $matrixConstants = array();
		
		//TYPE_TICKET_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeTicketDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeTicketDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_TICKET_DESCRIPTION', 'FORM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return = ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->TypeTicketInsert($this->InputValueTypeTicketDescription, 
																	 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_REGISTER_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_REGISTER_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ExecuteTypeTicketSelectById($TypeTicketId)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeTicketId = $TypeTicketId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//TYPE_TICKET_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_TICKET_ID;
		$arrayElementsClass[0]        = &$this->ReturnTypeTicketIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeTicketId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeTicketIdText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_TICKET_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->TypeTicketSelectById($this->InputValueTypeTicketId, 
																		 $this->TypeTicket,
																		 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket);
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnTypeTicketIdText = $this->InstanceLanguageText->GetConstant('TYPE_TICKET_NOT_FOUND', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::FORM_TYPE_TICKET_RETURN_NOT_FOUND;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ExecuteTypeTicketUpdate()
	{
		if($this->TypeTicket != NULL)
		{
			$PageForm = $this->Factory->CreatePageForm();
			$this->InputValueTypeTicketDescription  = $_POST[ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION];
			$this->InputFocus = ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
			$arrayConstants = array(); $matrixConstants = array();

			//TYPE_TICKET_DESCRIPTION
			$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION;
			$arrayElementsClass[0]        = &$this->ReturnTypeTicketDescriptionClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
			$arrayElementsInput[0]        = $this->InputValueTypeTicketDescription; 
			$arrayElementsMinValue[0]     = 0; 
			$arrayElementsMaxValue[0]     = 45; 
			$arrayElementsNullable[0]     = FALSE;
			$arrayElementsText[0]         = &$this->ReturnTypeTicketDescriptionText;
			array_push($arrayConstants, 'FORM_INVALID_TYPE_TICKET_DESCRIPTION', 'FORM_INVALID_TYPE_TICKET_DESCRIPTION',
										'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);

			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
												$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
												$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
				$return = $FacedePersistenceInfraTools->TypeTicketUpdateById($this->InputValueTypeTicketDescription,
					                                                         $this->TypeTicket->GetTypeTicketId(),
																			 $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->TypeTicket->SetTypeTicketDescription($this->InputValueTypeTicketDescription);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket);
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_UPDATE_SUCCESS', 
																					$this->Language);
					return ConfigInfraTools::SUCCESS;
				}
				elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
				{
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
					return ConfigInfraTools::WARNING;
				}
				else
				{
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_TICKET_UPDATE_ERROR', 
																					$this->Language);
					return ConfigInfraTools::ERROR;
				}
			}
			else
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}	
		}
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
		$PageFormBack = FALSE;
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageFormLoad();
			$PageFormBack = TRUE;
		}
		//TYPE TICKET LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_TICKET_LIST))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->TypeTicketSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayTypeTicket, $rowCount,
																 $this->InputValueHeaderDebug);
		}
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_TICKET_SELECT))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		//TYPE TICKET LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_TICKET_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->TypeTicketSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayTypeTicket, $rowCount,
																 $this->InputValueHeaderDebug);
		}
		//TYPE TICKET LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_TICKET_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			if($this->InputLimitOne > 250)
				$this->InputLimitOne = 250;
			if($this->InputLimitTwo > 275)
				$this->InputLimitTwo = 275;
			$FacedePersistenceInfraTools->TypeTicketSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayTypeTicket, $rowCount,
																 $this->InputValueHeaderDebug);
			if($this->InputLimitTwo > $rowCount)
			{
				if(!is_numeric($rowCount))
				{
					$this->InputLimitOne = $this->InputLimitOne - 25;
					$this->InputLimitTwo = $this->InputLimitTwo - 25;
				}
				else
				{
					$this->InputLimitOne = $rowCount - 25;
					$this->InputLimitTwo = $rowCount;
				}
				$FacedePersistenceInfraTools->TypeTicketSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayTypeTicket, $rowCount,
																 $this->InputValueHeaderDebug);
			}
		}
		//TYPE TICKET LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_LIST_SELECT_SUBMIT]))
		{
			if($this->ExecuteTypeTicketSelectById($_POST[ConfigInfraTools::FORM_TYPE_TICKET_LIST_SELECT_SUBMIT]) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeTicketLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		//TYPE TICKET REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_TICKET_REGISTER))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_REGISTER;
		//TYPE TICKET CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_REGISTER_CANCEL]))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		//TYPE TICKET REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_REGISTER_SUBMIT]))
		{
			if($this->ExecuteTypeTicketInsert() == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_REGISTER;
		}
		//TYPE TICKET SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT]))
		{
			if($this->ExecuteTypeTicketSelectById($_POST[ConfigInfraTools::FORM_FIELD_TYPE_TICKET_ID]))
			{
				if($this->TypeTicketLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		//TYPE TICKET VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteTypeTicketDelete() == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET);
				}
				else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket)  
					                                    == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeTicketLoadData() == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
					}
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		//TYPE TICKET VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket)  == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeTicketLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_UPDATE;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		///TYPE TICKET VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeTicketLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		///TYPE TICKET VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteTypeTicketUpdate() == ConfigInfraTools::SUCCESS)
				{
					if($this->TypeTicketLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_UPDATE;
				} 
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->TypeTicket) 
					   == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeTicketLoadData() == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
					} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>