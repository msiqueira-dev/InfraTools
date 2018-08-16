<?php
/************************************************************************
Class: PageAdminDepartment.php
Creation: 28/02/2018
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
			protected function ExecuteDepartmentDelete();
			protected function ExecuteDepartmentInsert();
			protected function ExecuteDepartmentSelectUsers($Limit1, $Limit2, &$RowCount);
			protected function DepartmentUpdateDepartmentByDepartmentAndCorporation();
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

class PageAdminDepartment extends PageInfraTools
{
	protected $InstanceDepartment                     = NULL;
	protected $ArrayInstanceInfraToolsDepartmentUsers = NULL;
	

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
	
	protected function ExecuteDepartmentDelete()
	{
		if($this->InstanceDepartment != NULL)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->DepartmentDelete(
				$this->InstanceDepartment->GetDepartmentCorporationName(),
				$this->InstanceDepartment->GetDepartmentName(), 
				$this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_DELETE_SUCCESS', $this->Language); 
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return $return;
			}
			else
			{
				if($return == ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
					$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_DELETE_ERROR_DEPENDENCY_USERS', 
																				 $this->Language);	
				else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_DELETE_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
	}
	
	protected function ExecuteDepartmentInsert()
	{
		$this->InputValueCorporationName = $_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_SELECT];
		$this->InputValueDepartmentInitials = $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS];
		$this->InputValueDepartmentName = $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME];
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayElements = array(); $arrayElementsClass = array(); $arrayElementsDefaultValue = array(); $arrayElementsForm = array();
		$arrayElementsInput = array(); $arrayElementsMinValue = array(); $arrayElementsMaxValue = array();
		$arrayElementsNullable = array(); $arrayElementsText = array(); $arrayConstants = array(); $matrixConstants = array();
		
        //VALIDATE CORPORATION_NAME
		array_push($arrayElements, ConfigInfraTools::FORM_FIELD_CORPORATION_NAME);
		$arrayElementsClass[0] = &$this->ReturnCorporationNameClass;
		array_push($arrayElementsDefaultValue, ""); 
		array_push($arrayElementsForm, ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME);
		array_push($arrayElementsInput, $this->InputValueCorporationName); 
		array_push($arrayElementsMinValue, 0); 
		array_push($arrayElementsMaxValue, 45); 
		array_push($arrayElementsNullable, FALSE);
		$arrayElementsText[0] = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//VALIDATE DEPARTMENT_INITIALS
		array_push($arrayElements, ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS);
		$arrayElementsClass[1] = &$this->ReturnDepartmentInitialsClass;
		array_push($arrayElementsDefaultValue, ""); 
		array_push($arrayElementsForm, ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_INITIALS);
		array_push($arrayElementsInput, $this->InputValueDepartmentInitials); 
		array_push($arrayElementsMinValue, 0); 
		array_push($arrayElementsMaxValue, 8); 
		array_push($arrayElementsNullable, TRUE);
		$arrayElementsText[1] = &$this->ReturnDepartmentInitialsText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_INITIALS', 'FORM_INVALID_DEPARTMENT_INITIALS_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//VALIDATE DEPARTMENT_NAME
		array_push($arrayElements, ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME);
		$arrayElementsClass[2] = &$this->ReturnDepartmentNameClass;
		array_push($arrayElementsDefaultValue, ""); 
		array_push($arrayElementsForm, ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME); 
		array_push($arrayElementsInput, $this->InputValueDepartmentName);
		array_push($arrayElementsMinValue, 0); 
		array_push($arrayElementsMaxValue, 80); 
		array_push($arrayElementsNullable, FALSE); 
		$arrayElementsText[2] = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->DepartmentInsert($this->InputValueCorporationName,
																	 $this->InputValueDepartmentInitials,
																     $this->InputValueDepartmentName, 
																	 $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_REGISTER_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_REGISTER_ERROR_DEPARTMENT_EXISTS',
																			$this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				return ConfigInfraTools::WARNING;
			}
		}
		if($return != ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_REGISTER_ERROR', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function ExecuteDepartmentSelectUsers($Limit1, $Limit2, &$RowCount)
	{
		if($this->InstanceDepartment != NULL)
		{
			$this->ArrayInstanceInfraToolsDepartmentUsers = NULL;
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->UserSelectByDepartment(
				$this->InstanceDepartment->GetDepartmentName(),
				$Limit1, $Limit2,
				$this->ArrayInstanceInfraToolsDepartmentUsers, $RowCount, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
				return ConfigInfraTools::SUCCESS;
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_SELECT_USERS_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
	}
	
	protected function DepartmentUpdateDepartmentByDepartmentAndCorporation()
	{
		if($this->InstanceDepartment != NULL)
		{
			$PageForm = $this->Factory->CreatePageForm();
			$this->InputValueDepartmentInitials = $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS];
			$this->InputValueDepartmentName  = $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME];
			$this->InputFocus = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
			$arrayConstants = array(); $matrixConstants = array();
			
			//DEPARTMENT_INITIALS
			$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS;
			$arrayElementsClass[0]        = &$this->ReturnDepartmentInitialsClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_INITIALS;
			$arrayElementsInput[0]        = $this->InputValueDepartmentInitials; 
			$arrayElementsMinValue[0]     = 0; 
			$arrayElementsMaxValue[0]     = 8; 
			$arrayElementsNullable[0]     = TRUE;
			$arrayElementsText[0]         = &$this->ReturnDepartmentInitialsText;
			array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_INITIALS', 'FORM_INVALID_DEPARTMENT_INITIALS_SIZE');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			
			//DEPARTMENT_NAME
			$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME;
			$arrayElementsClass[1]        = &$this->ReturnDepartmentNameClass;
			$arrayElementsDefaultValue[1] = ""; 
			$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
			$arrayElementsInput[1]        = $this->InputValueDepartmentName; 
			$arrayElementsMinValue[1]     = 0; 
			$arrayElementsMaxValue[1]     = 80; 
			$arrayElementsNullable[1]     = FALSE;
			$arrayElementsText[1]         = &$this->ReturnDepartmentNameText;
			array_push($arrayConstants, 'ADMIN_DEPARTMENT_INVALID_NAME', 'ADMIN_DEPARTMENT_INVALID_NAME_SIZE');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			
			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
				$return = $FacedePersistenceInfraTools->DepartmentUpdateDepartmentByDepartmentAndCorporation(
					                                               $this->InstanceDepartment->GetDepartmentCorporationName(),
					                                               $this->InputValueDepartmentInitials,
					                                               $this->InputValueDepartmentName,
					                                               $this->InstanceDepartment->GetDepartmentName(), 
					                                               $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->InstanceDepartment->SetDepartmentName($this->InputValueDepartmentName);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, $this->InstanceDepartment);
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_UPDATE_SUCCESS', 
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
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_DEPARTMENT_UPDATE_ERROR', 
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
		//CORPORATION VIEW DELETE SUBMIT
		if(isset($_POST[ConfigInfraTools::FORM_CORPORATION_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteCorporationDelete() == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_CORPORATION);
				} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//CORPORATION VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDATE;
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
					{
						if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					    else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
					} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
										 $this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
										 $this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationUpdate() == ConfigInfraTools::SUCCESS)
				{
					if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDATE;
				} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDATE;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW USERS
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_VIEW_SELECT_USERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
										 $this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) 
				                                        == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
				else
				{
					if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW USERS LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_BACK))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
				if($this->InputLimitOne < 0)
					$this->InputLimitOne = 0;
				if($this->InputLimitTwo <= 0)
					$this->InputLimitTwo = 25;
				if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
			}
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW USERS LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_FORWARD))
		{
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE];
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO];
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
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
						if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) 
						   == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW USERS SELECT CORPORATION SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_SELECT_CORPORATION]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_SELECT_CORPORATION]) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
			}
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
															$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
					$this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount);
				}
			}
		}
		//CORPORATION VIEW USERS SELECT TYPE USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_LIST_SELECT]))
		{
			if($this->TypeUserSelectByDescription($_POST[ConfigInfraTools::FORM_TYPE_USER_LIST_SELECT]) 
			          == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			}
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
															$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
					$this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount);
				}
			}
		}
		//CORPORATION VIEW USERS SELECT USER SUBMIT || //DEPARTMENT VIEW USERS SELECT USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_LIST_SELECT_SUBMIT]))
		{
			$this->InputValueUserEmail = $_POST[ConfigInfraTools::FORM_USER_LIST_SELECT_SUBMIT];
			if($this->UserInfraToolsSelectByEmail($_POST[ConfigInfraTools::FORM_USER_LIST_SELECT_SUBMIT]) 
			                                      == ConfigInfraTools::SUCCESS)
			{
				$this->UserLoadData();
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			}
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_USER_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
					$this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount);
				}
				elseif($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
															$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
					$this->ExecuteDepartmentSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount);
				}
			}
		}
		//DEPARTMENT LIST
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_LIST))
		{
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->DepartmentSelect($this->InputLimitOne, $this->InputLimitTwo, 
																	$this->ArrayInstanceDepartment,
																	$rowCount,
																    $this->InputValueHeaderDebug);
		}
		//DEPARTMENT LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->DepartmentSelect($this->InputLimitOne, $this->InputLimitTwo, 
																	$this->ArrayInstanceDepartment,
																	$rowCount,
																    $this->InputValueHeaderDebug);
		}
		//DEPARTMENT LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			$FacedePersistenceInfraTools->DepartmentSelect($this->InputLimitOne, $this->InputLimitTwo, 
																	$this->ArrayInstanceDepartment,
																	$rowCount,
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
				$FacedePersistenceInfraTools->DepartmentSelect($this->InputLimitOne, $this->InputLimitTwo, 
																	$this->ArrayInstanceDepartment,
																	$rowCount,
																    $this->InputValueHeaderDebug);
			}
		}
		//DEPARTMENT LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT]))
		{
			if($this->DepartmentSelectByDepartmentNameAndCorporationName
			                                          ($_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION],
				                                       $_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT])
			                                           == ConfigInfraTools::SUCCESS)
			{
				if($this->DepartmentLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
				else
				{
					$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			} 
			else 
			{
				$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			}
		}
		//DEPARTMENT LIST SELECT CORPORATION SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION]) 
			                                           == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_ADMIN_REGISTER))
		{
			$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
		}
		//DEPARTMENT REGISTER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_REGISTER_CANCEL]))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT]))
		{
			if($this->ExecuteDepartmentInsert() == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			else 
			{
				$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
				$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
			}
		}
		//DEPARTMENT SELECT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_SELECT))
		{
			$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT]))
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT]))
				$radio = $_POST[ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT];
			if($radio == ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT_NAME)
			{
				if($this->DepartmentSelectByDepartmentName($_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME]) 
				                                            == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
				}
				else 
				{
					$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			}
			elseif($radio == ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME)
			{
				if($this->DepartmentSelectByDepartmentNameAndCorporationName($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_SELECT],
																			 $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME]))
				{
					if($this->DepartmentLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					else
					{
						$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
						$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
					}
				}
				else 
				{
					$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			}
			else
			{
				$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			}
		}
		//DEPARTMENT VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteDepartmentDelete() == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
				} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->DepartmentLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDATE;
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
					{
						if($this->DepartmentLoadData() == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					    else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
					} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->DepartmentLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->DepartmentUpdateDepartmentByDepartmentAndCorporation() == ConfigInfraTools::SUCCESS)
				{
					if($this->DepartmentLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDATE;
				} else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
						if($this->DepartmentLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDATE;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW USERS
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_SELECT_USERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->ExecuteDepartmentSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
				else
				{
					if($this->DepartmentLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW USERS LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS_LIST_BACK))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
				if($this->InputLimitOne < 0)
					$this->InputLimitOne = 0;
				if($this->InputLimitTwo <= 0)
					$this->InputLimitTwo = 25;
				if($this->ExecuteDepartmentSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
			}
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW USERS LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS_LIST_FORWARD))
		{
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE];
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO];
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteDepartmentSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
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
						if($this->ExecuteDepartmentSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount) 
						   == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW USERS SELECT CORPORATION SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS_SELECT_CORPORATION]))
		{
			if($this->DepartmentSelectByDepartmentName($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS_SELECT_CORPORATION]) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
			}
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
											 $this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
					$this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount);
				}
			}
		}
		//DEPARTMENT VIEW USERS SELECT TYPE USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_LIST_SELECT]))
		{
			if($this->TypeUserSelectByDescription($_POST[ConfigInfraTools::FORM_TYPE_USER_LIST_SELECT]) 
			          == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			}
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
															$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
					$this->ExecuteDepartmentSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $rowCount);
				}
			}
		}
		else
		{	
			$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			$return = $FacedePersistenceInfraTools->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
			$_POST[ConfigInfraTools::FORM_DEPARTMENT_SELECT . "_x"] = "1";
			$_POST[ConfigInfraTools::FORM_DEPARTMENT_SELECT . "_y"] = "1";
			$_POST[ConfigInfraTools::FORM_DEPARTMENT_SELECT] = ConfigInfraTools::FORM_DEPARTMENT_SELECT;
		}
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>