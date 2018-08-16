<?php
/************************************************************************
Class: PageAdminCorporation.php
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
			protected function ExecuteCorporationInsert();
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

class PageAdminCorporation extends PageInfraTools
{
	protected $ArrayInstanceInfraToolsCorporationUsers = NULL;
	protected $InstanceInfraToolsCorporation           = NULL;

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
	
	protected function ExecuteCorporationInsert()
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueCorporationName = $_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME];
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_ACITVE]))
				$this->InputValueCorporationActive = TRUE;
			else $this->InputValueCorporationActive = FALSE;
		$arrayConstants = array(); $matrixConstants = array();

		//CORPORATION_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_CORPORATION_NAME;
		$arrayElementsClass[0]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->CorporationInsert($this->InputValueCorporationActive, 
																			  $this->InputValueCorporationName, 
																			  $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_CORPORATION_REGISTER_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('ADMIN_CORPORATION_REGISTER_ERROR', $this->Language);
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
			include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php'). ".php");
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
		//CORPORATION LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_LIST))
		{
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_CORPORATION);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->CorporationInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
																	$this->ArrayInstanceInfraToolsCorporation,
																	$rowCount,
																    $this->InputValueHeaderDebug);
		}
		//CORPORATION LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->CorporationInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
																	$this->ArrayInstanceInfraToolsCorporation,
																	$rowCount,
																    $this->InputValueHeaderDebug);
		}
		//CORPORATION LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			$FacedePersistenceInfraTools->CorporationInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
																	$this->ArrayInstanceInfraToolsCorporation,
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
				$FacedePersistenceInfraTools->CorporationInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
																	$this->ArrayInstanceInfraToolsCorporation,
																	$rowCount,
																    $this->InputValueHeaderDebug);
			}
		}
		//CORPORATION LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_LIST_SELECT]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_CORPORATION_LIST_SELECT]) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_REGISTER))
		{
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_CORPORATION);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
		}
		//CORPORATION REGISTER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_REGISTER_CANCEL]))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT]))
		{
			if($this->ExecuteCorporationInsert() == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
		}
		//CORPORATION SELECT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_SELECT))
		{
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_CORPORATION);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME]) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData() == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteCorporationDelete() == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_CORPORATION);
				} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
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
		//CORPORATION VIEW USERS SELECT USER SUBMIT
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
		else 
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			$_POST[ConfigInfraTools::FORM_CORPORATION_SELECT . "_x"] = "1";
			$_POST[ConfigInfraTools::FORM_CORPORATION_SELECT . "_y"] = "1";
			$_POST[ConfigInfraTools::FORM_CORPORATION_SELECT] = ConfigInfraTools::FORM_CORPORATION_SELECT;
		}
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>