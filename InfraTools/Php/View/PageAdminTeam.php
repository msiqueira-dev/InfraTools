<?php
/************************************************************************
Class: PageAdminTeam.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class for team management.
Functions: 
			protected function ExecuteTeamUpdate();
			protected function ExecuteUserSelectByTeamId($Limit1, $Limit2, &$RowCount);
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
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}

class PageAdminTeam extends PageAdmin
{
	protected $InstanceTeam     = NULL;
	public    $ArrayTeam        = NULL;
	public    $ArrayTeamMembers = NULL;
	
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
	
	protected function ExecuteTeamUpdate()
	{
		if($this->InstanceTeam != NULL)
		{
			$PageForm = $this->Factory->CreatePageForm();
			$this->InputValueTeamDescription  = $_POST[ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION];
			$this->InputValueTeamName = $_POST[ConfigInfraTools::FORM_FIELD_TEAM_NAME];
			$this->InputFocus = ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION;
			$arrayConstants = array(); $matrixConstants = array();
			
			//TEAM_DESCRIPTION
			$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION;
			$arrayElementsClass[0]        = &$this->ReturnTeamDescriptionClass;
			$arrayElementsDefaultValue[0] = ""; 
			$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
			$arrayElementsInput[0]        = $this->InputValueTeamDescription; 
			$arrayElementsMinValue[0]     = 0; 
			$arrayElementsMaxValue[0]     = 120; 
			$arrayElementsNullable[0]     = FALSE;
			$arrayElementsText[0]         = &$this->ReturnTeamDescriptionText;
			array_push($arrayConstants, 'FORM_INVALID_TEAM_DESCRIPTION', 'FORM_INVALID_TEAM_DESCRIPTION_SIZE');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			
			//TEAM_NAME
			$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_TEAM_NAME;
			$arrayElementsClass[1]        = &$this->ReturnTeamNameClass;
			$arrayElementsDefaultValue[1] = ""; 
			$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TEAM_NAME;
			$arrayElementsInput[1]        = $this->InputValueTeamName; 
			$arrayElementsMinValue[1]     = 0; 
			$arrayElementsMaxValue[1]     = 120; 
			$arrayElementsNullable[1]     = FALSE;
			$arrayElementsText[1]         = &$this->ReturnTeamNameText;
			array_push($arrayConstants, 'FORM_INVALID_TEAM_NAME', 'FORM_INVALID_TEAM_NAME_SIZE');
			array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			
			$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
												$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
												$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
				$return = $FacedePersistenceInfraTools->TeamUpdateByTeamId($this->InputValueTeamDescription,
					                                                       $this->InstanceTeam->GetTeamId(),
																		   $this->InputValueTeamName,
																	       $this->InputValueHeaderDebug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					$this->InstanceTeam->SetTeamDescription($this->InputValueTeamDescription);
					$this->InstanceTeam->SetTeamName($this->InputValueTeamName);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam);
					$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
										   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_UPDATE_SUCCESS', 
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
					$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_TEAM_UPDATE_ERROR', 
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
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageFormLoad();
			$PageFormBack = TRUE;
		}
		//TEAM LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_LIST))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->TeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
													 $this->ArrayTeam, $rowCount,
													 $this->InputValueHeaderDebug);
		}
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_SELECT))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		//TEAM LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->TeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayTeam, $rowCount,
																 $this->InputValueHeaderDebug);
		}
		//TEAM LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			if($this->InputLimitOne > 250)
				$this->InputLimitOne = 250;
			if($this->InputLimitTwo > 275)
				$this->InputLimitTwo = 275;
			$FacedePersistenceInfraTools->TeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
													 $this->ArrayTeam, $rowCount,
													 $this->InputValueHeaderDebug);
			if($this->InputLimitOne > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
				$FacedePersistenceInfraTools->TeamSelect($this->InputLimitOne, $this->InputLimitTwo, 
													     $this->ArrayTeam, $rowCount,
													     $this->InputValueHeaderDebug);
			}
			elseif($this->InputLimitTwo > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
			}
		}
		//TEAM LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT]) || 
			   isset($_POST[ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT_NAME]))
		{
			if($this->TeamSelectByTeamId($_POST[ConfigInfraTools::FORM_TEAM_LIST_SELECT_SUBMIT],
										 $this->InstanceTeam, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TEAM_REGISTER))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_REGISTER;
		//TEAM REGISTER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_REGISTER_CANCEL]))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		//TEAM REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_REGISTER_SUBMIT]))
		{
			if($this->TeamInsert($_POST[ConfigInfraTools::FORM_FIELD_TEAM_DESCRIPTION],
								 $_POST[ConfigInfraTools::FORM_FIELD_TEAM_NAME],
								 $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_REGISTER;
		}
		//TEAM SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_SELECT_SUBMIT]))
		{
			if($this->TeamSelectByTeamId($_POST[ConfigInfraTools::FORM_FIELD_TEAM_ID],
										 $this->InstanceTeam, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;	
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->TeamDeleteByTeamId($this->InstanceTeam->GetTeamId(), $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_TEAM);
				}
				else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam)  
					                                    == ConfigInfraTools::SUCCESS)
					{
						if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
					}
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW MANAGE MEMBERS
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_VIEW_MANAGE_MEMBERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam)  == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->UserSelectByTeamId($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceTeam->GetTeamId(),
										     $this->ArrayTeamMembers, $rowCount, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_MANAGE_MEMBERS;
				else
				{
					if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW MANAGE MEMBERS SELECT USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_LIST]))
		{
			if($this->UserInfraToolsSelectByEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
												  $this->InstanceUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_USER_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, 
												   $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					if($this->UserInfraToolsSelectByEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
												          $this->InstanceUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_MANAGE_MEMBERS;
				}
			}
		}
		//FORM_CORPORATION_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											  $this->InstanceCorporation, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FORM_DEPARTMENT_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->DepartmentSelectByDepartmentNameAndCorporationName
			                                  ($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME], 
											   $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
											   $this->InstanceInfraToolsDepartment, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FORM_USER_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->UserInfraToolsSelectByEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL], 
												  $this->InstanceUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		//TEAM VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam)  == ConfigInfraTools::SUCCESS)
			{
				if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_UPDATE;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		}
		//TEAM VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TEAM_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TEAM, $this->InstanceTeam) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteTeamUpdate() == ConfigInfraTools::SUCCESS)
				{
					if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_UPDATE;
				} 
				else 
				{
					if($this->TeamLoadData($this->InstanceTeam) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_VIEW;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TEAM_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>