<?php
/************************************************************************
Class: PageAdminTypeAssocUserTeam.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Classe que trata da administração dos tipos de vínculos com equipes.
Functions: 
			protected function ExecuteTypeAssocUserTeamDelete();
			protected function ExecuteTypeAssocUserTeamInsert();
			protected function ExecuteTypeAssocUserTeamtSelectById($Id);
			protected function ExecuteTypeAssocUserTeamUpdate();
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
if (!class_exists("TypeAssocUserTeam"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php"))
		include_once(BASE_PATH_PHP_MODEL . "TypeAssocUserTeam.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeAssocUserTeam');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageAdminTypeAssocUserTeam extends PageInfraTools
{
	protected $TypeAssocUserTeam      = NULL;
	public    $ArrayTypeAssocUserTeam = NULL;

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	public function __construct() 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct();
	}
	
	protected function ExecuteTypeAssocUserTeamDelete()
	{
		if($this->TypeAssocUserTeam != NULL)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->TypeAssocUserTeamDelete($this->TypeAssocUserTeam->GetTypeAssocUserTeamTeamId(), 
																	        $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam);
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_SUCCESS', 
																				$this->Language); 
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return $return;
			}
			else
			{
				if($return == ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
					$this->ReturnText = $this->InstanceLanguageText->GetConstant
					                           ('ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_ERROR_DEPENDENCY_TEAM', 
												$this->Language);
				else $this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_ERROR', 
																				  $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
	}
	
	protected function ExecuteTypeAssocUserTeamInsert()
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeAssocUserTeamTeamDescription = $_POST[ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION];
		$arrayConstants = array(); $matrixConstants = array();
		
		//TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamTeamDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamTeamDescription; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamTeamDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_TEAM_TEAM_DESCRIPTION',
				                    'FORM_INVALID_TYPE_ASSOC_TEAM_TEAM_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->TypeAssocUserTeamInsert($this->InputValueTypeAssocUserTeamTeamDescription, 
																			$this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_ERROR', 
																			 $this->Language);
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
	
	protected function ExecuteTypeAssocUserTeamSelectByTeamId($TypeAssocUserTeamTeamId)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueTypeAssocUserTeamTeamId = $TypeAssocUserTeamTeamId;
		$arrayConstants = array(); $matrixConstants = array();
		
		//TYPE_ASSOC_USER_TEAM_TEAM_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamTeamIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamTeamId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamTeamIdText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_TEAM_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->TypeAssocUserTeamSelectByTeamId($this->InputValueTypeAssocUserTeamTeamId, 
																		           $this->TypeAssocUserTeam,
																		           $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam);
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnTypeAssocUserTeamTeamIdText = $this->InstanceLanguageText->
					                                                GetConstant('TYPE_ASSOC_USER_TEAM_NOT_FOUND', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_RETURN_NOT_FOUND;
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
	
	protected function ExecuteTypeAssocUserTeamUpdate()
	{
		if($this->TypeAssocUserTeam != NULL)
		{
			$PageForm = $this->Factory->CreatePageForm();
			$this->InputValueTypeAssocUserTeamTeamDescription  =
				$_POST[ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION];
			$this->InputFocus = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION;
			$arrayConstants = array(); $matrixConstants = array();
			
			//TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION
			$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION;
			$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserTeamTeamDescriptionClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
			$arrayElementsInput[0]        = $this->InputValueTypeAssocUserTeamTeamDescription; 
			$arrayElementsMinValue[0]     = 0; 
			$arrayElementsMaxValue[0]     = 45; 
			$arrayElementsNullable[0]     = FALSE;
			$arrayElementsText[0]         = &$this->ReturnTypeAssocUserTeamTeamDescriptionText;
			array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_TEAM_TEAM_DESCRIPTION',
										'FORM_INVALID_TYPE_ASSOC_TEAM_TEAM_DESCRIPTION_SIZE');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
												$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
												$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
				$return = $FacedePersistenceInfraTools->TypeAssocUserTeamUpdateByTeamId(
					                                                         $this->InputValueTypeAssocUserTeamTeamDescription,
					                                                         $this->TypeAssocUserTeam->GetTypeAssocUserTeamTeamId(),
																			 $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->TypeAssocUserTeam->SetTypeAssocUserTeamDescription($this->InputValueTypeAssocUserTeamTeamDescription);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam);
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_SUCCESS', 
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
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_ERROR', 
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
		//TYPE ASSOC USER TEAM LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->TypeAssocUserTeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayTypeAssocUserTeam, $rowCount,
																 $this->InputValueHeaderDebug);
		}
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		//TYPE ASSOC USER TEAM LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->TypeAssocUserTeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayTypeAssocUserTeam, $rowCount,
																 $this->InputValueHeaderDebug);
		}
		//TYPE ASSOC USER TEAM LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			if($this->InputLimitOne > 250)
				$this->InputLimitOne = 250;
			if($this->InputLimitTwo > 275)
				$this->InputLimitTwo = 275;
			$FacedePersistenceInfraTools->TypeAssocUserTeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayTypeAssocUserTeam, $rowCount,
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
				$FacedePersistenceInfraTools->TypeAssocUserTeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
																      $this->ArrayTypeAssocUserTeam, $rowCount,
																 $this->InputValueHeaderDebug);
			}
		}
		//TYPE ASSOC USER TEAM LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_SELECT_SUBMIT]))
		{
			if($this->ExecuteTypeAssocUserTeamSelectByTeamId
			   ($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_LIST_SELECT_SUBMIT]) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeAssocUserTeamLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		}
		//TYPE ASSOC USER TEAM REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER;
		//TYPE ASSOC USER TEAM REGISTER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER_CANCEL]))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		//TYPE ASSOC USER TEAM REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_REGISTER_SUBMIT]))
		{
			if($this->ExecuteTypeAssocUserTeamInsert() == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER;
		}
		//TYPE ASSOC USER TEAM SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_SELECT_SUBMIT]))
		{
			if($this->ExecuteTypeAssocUserTeamSelectByTeamId($_POST[ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID]) 
			    == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeAssocUserTeamLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		}
		//TYPE ASSOC USER TEAM VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam) 
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteTypeAssocUserTeamDelete() == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM);
				}
				else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam)  
					                                    == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeAssocUserTeamLoadData() == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
					}
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		}
		//TYPE ASSOC USER TEAM VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam)  == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeAssocUserTeamLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		}
		//TYPE ASSOC USER TEAM VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeAssocUserTeamLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		}
		//TYPE ASSOC USER TEAM VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_ASSOC_USER_TEAM_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_ASSOC_USER_TEAM, $this->TypeAssocUserTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteTypeAssocUserTeamUpdate() == ConfigInfraTools::SUCCESS)
				{
					if($this->TypeAssocUserTeamLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE;
				} 
				else 
				{
					if($this->TypeAssocUserTeamLoadData() == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_TYPE_ASSOC_USER_TEAM_SELECT;
		} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>