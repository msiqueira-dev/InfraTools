<?php
/************************************************************************
Class: PageAdminTypeUser.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/Controller/FacedePersistenceInfraTools.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Classe que trata da administração dos tipos de usuários.
Functions: 
			protected function ExecuteTypeUserDelete();
			protected function ExecuteTypeUserInsert();
			protected function ExecuteTypeUserSelectById($Id);
			protected function ExecuteTypeUserUpdate();
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
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageAdminTypeUser extends PageInfraTools
{
	protected $ArrayInstanceInfraToolsTypeUserUsers = NULL;
	protected $InstanceInfraToolsTypeUser           = NULL;

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
	
	protected function ExecuteTypeUserDelete()
	{
		if($this->InstanceInfraToolsTypeUser != NULL)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->TypeUserDelete($this->InstanceInfraToolsTypeUser->GetTypeUserId(), 
																   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceInfraToolsTypeUser);
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_DELETE_SUCCESS', $this->Language); 
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return $return;
			}
			else
			{
				if($return == ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
					$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_DELETE_ERROR_DEPENDENCY_USER', 
																				 $this->Language);
				else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_DELETE_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
	}
	
	protected function ExecuteTypeUserInsert()
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeUserDescription = $_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION];
		$arrayConstants = array(); $matrixConstants = array();
		
		//TYPE_USER_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeUserDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_USER_ID', 'FORM_INVALID_TYPE_USER_ID_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->TypeUserInsert($this->InputValueTypeUserDescription, 
																   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_REGISTER_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_REGISTER_ERROR', $this->Language);
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
	
	protected function ExecuteTypeUserSelectById($TypeUserId)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeUserId = $TypeUserId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//TYPE_USER_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_USER_ID;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeUserId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserIdText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_USER_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigINfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->TypeUserSelectById($this->InputValueTypeUserId, 
																	   $this->InstanceInfraToolsTypeUser,
																	   $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceInfraToolsTypeUser);
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnIdText = $this->InstanceLanguageText->GetConstant('TYPE_USER_NOT_FOUND', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::FORM_TYPE_USER_RETURN_NOT_FOUND;
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
	
	protected function ExecuteTypeUserUpdate()
	{
		if($this->InstanceInfraToolsTypeUser != NULL)
		{
			$PageForm = $this->Factory->CreatePageForm();
			$this->InputValueTypeUserDescription  = $_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION];
			$this->InputFocus = ConfigInfraTools::FORM_FIELD_DESCRIPTION;
			$arrayConstants = array(); $matrixConstants = array();
			//TYPE_USER_DESCRIPTION
			$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION;
			$arrayElementsClass[0]        = &$this->ReturnTypeUserDescriptionClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
			$arrayElementsInput[0]        = $this->InputValueTypeUserDescription; 
			$arrayElementsMinValue[0]     = 0; 
			$arrayElementsMaxValue[0]     = 45; 
			$arrayElementsNullable[0]     = FALSE;
			$arrayElementsText[0]         = &$this->ReturnTypeUserDescriptionText;
			array_push($arrayConstants, 'FORM_INVALID_TYPE_USER_DESCRIPTION', 'FORM_INVALID_TYPE_USER_DESCRIPTION_SIZE',
										'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);

			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
												$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);			
			if($return == ConfigInfraTools::SUCCESS)
			{
				$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
				$return = $FacedePersistenceInfraTools->TypeUserUpdateById($this->InstanceInfraToolsTypeUser->GetTypeUserId(),
																		   $this->InputValueTypeUserDescription,
																		   $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->InstanceInfraToolsTypeUser->SetTypeUserDescription($this->InputValueTypeUserDescription);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceInfraToolsTypeUser);
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_UPDATE_SUCCESS', 
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
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_USER_UPDATE_ERROR', 
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
	
	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
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
		//TYPE USER LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_LIST))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->TypeUserSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayInstanceTypeUser, $rowCount,
																 $this->InputValueHeaderDebug);
		}
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_SELECT))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		//TYPE USER LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->TypeUserSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayInstanceTypeUser, $rowCount,
																 $this->InputValueHeaderDebug);
		}
		//TYPE USER LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			if($this->InputLimitOne > 250)
				$this->InputLimitOne = 250;
			if($this->InputLimitTwo > 275)
				$this->InputLimitTwo = 275;
			$FacedePersistenceInfraTools->TypeUserSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayInstanceTypeUser, $rowCount,
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
				$FacedePersistenceInfraTools->TypeUserSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayInstanceTypeUser, $rowCount,
																 $this->InputValueHeaderDebug);
			}
		}
		//TYPE USER LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_LIST_SELECT]))
		{
			if($this->ExecuteTypeUserSelectById($_POST[ConfigInfraTools::FORM_TYPE_USER_LIST_SELECT_ID]) 
			                                    == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_REGISTER))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		//TYPE USER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_REGISTER_CANCEL]))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		//TYPE USER REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_REGISTER_SUBMIT]))
		{
			if($this->ExecuteTypeUserInsert() == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		}
		//TYPE USER SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT]))
		{
			if($this->ExecuteTypeUserSelectById($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_ID]))
			{
				if($this->TypeUserLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_VIEW_DELETE_SUBMIT]))
		{				
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
										 $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteTypeUserDelete() == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_TYPE_USER);
				}
				else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
												 $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeUserLoadData() == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
					}
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
										 $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDATE;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		///TYPE USER VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
										 $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		///TYPE USER VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceInfraToolsTypeUser) 
			                             == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteTypeUserUpdate() == ConfigInfraTools::SUCCESS)
				{
					if($this->TypeUserLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDATE;
				} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW USERS
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_VIEW_SELECT_USERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
										 $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->TypeUserSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
				else
				{
					if($this->TypeUserLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW USERS LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_VIEW_USERS_LIST_BACK))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
										 $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
				if($this->InputLimitOne < 0)
					$this->InputLimitOne = 0;
				if($this->InputLimitTwo <= 0)
					$this->InputLimitTwo = 25;
				if($this->TypeUserSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			}
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW USERS FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_VIEW_USERS_LIST_FORWARD))
		{
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE];
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO];
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
										 $this->InstanceInfraToolsTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
				else 
				{
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
						if($this->TypeUserSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) 
						   == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
					} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>