<?php
/************************************************************************
Class: PageInfraTools.php
Creation: 03/03/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php

Description: 
			Classe existente para a página de administração de usuário
Functions: 
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

class PageAdminUser extends PageAdmin
{
	/* Instance */
	public    $FacedeBusinessInfraTools    = NULL;
	public    $ArrayInstanceInfraToolsUser = NULL;
	protected $InstanceTypeUser            = NULL;
	
	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Language);
	}
	
	/**                               **/
	/************* METODOS *************/
	/**                               **/
	
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

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}
	
	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_USER_NAME;
		$this->ValidateCaptcha = FALSE;
		$this->EnableFieldSessionExpires = TRUE;
		$this->EnableFieldTwoStepVerification = TRUE;
		$this->EnableFieldUserActive = TRUE;
		$this->EnableFieldUserConfirmed = TRUE;
		$this->ShowTypeUserDescription = TRUE;
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageFormLoad();
			$PageFormBack = TRUE;
		}
		//USER LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_USER_LIST))
		{
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_USER);
			unset($this->ArrayInstanceInfraToolsUser);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->UserInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
															 $this->ArrayInstanceInfraToolsUser, $rowCount,
															 $this->InputValueHeaderDebug);
		}
		//USER LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_USER_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$FacedePersistenceInfraTools->UserInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
															 $this->ArrayInstanceInfraToolsUser, $rowCount,
															 $this->InputValueHeaderDebug);
		}
		//USER LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_USER_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			$FacedePersistenceInfraTools->UserInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
															   $this->ArrayInstanceInfraToolsUser, $rowCount,
															   $this->InputValueHeaderDebug);
			if($this->InputLimitOne > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
				$FacedePersistenceInfraTools->UserInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
															       $this->ArrayInstanceInfraToolsUser, $rowCount,
															       $this->InputValueHeaderDebug);
			}
			elseif($this->InputLimitTwo > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
			}
		}
		//USER LIST SELECT CORPORATION SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_LIST]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											  $this->InstanceCorporation,
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceCorporation) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
			}
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW)
			{
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_LIST;
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				$FacedePersistenceInfraTools->UserInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayInstanceInfraToolsUser, $rowCount,
																 $this->InputValueHeaderDebug);
			}
		}
		//USER LIST SELECT TYPE USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION]))
		{
			if($this->TypeUserSelectByTypeUserDescription($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION], 
														  $this->InstanceTypeUser,
														  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW)
			{
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_LIST;
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				$FacedePersistenceInfraTools->UserInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayInstanceInfraToolsUser, $rowCount,
																 $this->InputValueHeaderDebug);
			}
		}
		//USER LIST SELECT USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_LIST]))
		{
			if($this->UserInfraToolsSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_USER_EMAIL],
												      $this->InstanceInfraToolsUserAdmin, 
												      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_USER_VIEW)
			{
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_LIST;
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				$FacedePersistenceInfraTools->UserInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayInstanceInfraToolsUser, $rowCount,
																 $this->InputValueHeaderDebug);
			}
		}
		//USER REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_USER_REGISTER))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_REGISTER;
		//USER REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_REGISTER_SUBMIT]))
		{
			if($this->UserRegister(NULL, NULL, FALSE, NULL, NULL, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_REGISTER;
		}
		//USER SELECT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_USER_SELECT))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		//USER SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_SELECT_SUBMIT]))
		{
			if($this->UserInfraToolsSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_USER_EMAIL],
												      $this->InstanceInfraToolsUserAdmin, 
												      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		//USER VIEW ACTIVATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_ACTIVATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserUpdateActiveByUserEmail(true, $this->InstanceInfraToolsUserAdmin, $this->InputValueHeaderDebug);
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			}
		}
		//USER VIEW DEACTIVATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_DEACTIVATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserUpdateActiveByUserEmail(false, $this->InstanceInfraToolsUserAdmin, $this->InputValueHeaderDebug);
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			}
		}
		//USER VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_DELETE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->UserDeleteByUserEmail($this->InstanceInfraToolsUserAdmin, 
												$this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//USER VIEW RESET PASSWORD SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_RESET_PASSWORD_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				if($this->UserUpdatePasswordRandomByUserEmail($this->InstanceInfraToolsUserAdmin, 
															  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//USER VIEW CHANGE CORPORATION
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_CHANGE_CORPORATION_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				$FacedePersistenceInfraTools->CorporationSelectActiveNoLimit($this->ArrayInstanceInfraToolsCorporation,
																			   $this->InputValueHeaderDebug);
				$this->SubmitEnabled = 'disabled="disabled"';
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_CORPORATION;
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//USER VIEW CHANGE CORPORATION SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->UserUpdateCorporationByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
					                                   $this->InstanceInfraToolsUserAdmin, 
													   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->UserInfraToolsSelectByUserEmail($this->InstanceInfraToolsUserAdmin->GetEmail(),
												              $this->InstanceInfraToolsUserAdmin, 
														      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				}
				else 
				{
					$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
					$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
					$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_CORPORATION;
				}
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//USER VIEW CHANGE ASSOC USER CORPORATION 
		elseif(isset($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->DepartmentSelectByCorporationNameNoLimit($this->InstanceInfraToolsUserAdmin->GetCorporationName(),
					                                            $this->ArrayInstanceDepartment,
																$this->InputValueHeaderDebug);
				$this->SubmitEnabled = '';
				$this->SubmitClass = 'SubmitEnabled';
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION;
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//USER VIEW CHANGE ASSOC USER CORPORATION SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->UserUpdateCorporationInformation($this->InstanceInfraToolsUserAdmin, 
														   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->UserInfraToolsSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_USER_EMAIL],
												              $this->InstanceInfraToolsUserAdmin, 
														      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				}
				else 
				{
					$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
					$this->DepartmentSelectByCorporationNameNoLimit($this->InstanceInfraToolsUserAdmin->GetCorporationName(), 
					                                                $this->ArrayInstanceDepartment,
																    $this->InputValueHeaderDebug);
					$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION;
				}
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//USER VIEW CHANGE USER TYPE
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_CHANGE_USER_TYPE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				$FacedePersistenceInfraTools->TypeUserSelectNoLimit($this->ArrayInstanceInfraToolsTypeUser,
																	$this->InputValueHeaderDebug);
				$this->SubmitEnabled = 'disabled="disabled"';
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_USER_TYPE;
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//USER VIEW CHANGE USER TYPE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_CHANGE_USER_TYPE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->UserUpdateUserTypeByUserEmail($_POST[Config::FORM_FIELD_TYPE_USER_ID],
											        $this->InstanceInfraToolsUserAdmin,
											        $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->UserInfraToolsSelectByUserEmail($this->InstanceInfraToolsUserAdmin->GetEmail(),
												          $this->InstanceInfraToolsUserAdmin, 
														  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				}
				else 
				{
					$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
					$FacedePersistenceInfraTools->TypeUserSelectNoLimit($this->ArrayInstanceInfraToolsTypeUser,
																	    $this->InputValueHeaderDebug);
					$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_CHANGE_USER_TYPE;
				}
			}
			else $this->RedirectPage($domain . str_replace('Language/', '', $InstanceLoginInfraTools->Language) . "/" . 
									 ConfigInfraTools::PAGE_NOT_FOUND);
		}
		//USER VIEW TWO STEP VERIFICATION ACTIVATE
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->UserChangeTwoStepVerification($this->InstanceInfraToolsUserAdmin, TRUE, $this->InputValueHeaderDebug);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//PAGE_ACCOUNT_TWO_STEP_VERIFICATION_DEACTIVATE
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->UserChangeTwoStepVerification($this->InstanceInfraToolsUserAdmin, FALSE, $this->InputValueHeaderDebug);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//USER VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_VIEW_UPDATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_UPDATE;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//USER VIEW UPDATE CANCEL - USER VIEW CORPORATION CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_UPDATE_CANCEL]) ||
			   isset($_POST[ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_CANCEL]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		//USER VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_UPDATE_SUBMIT]))
		{
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $this->InstanceInfraToolsUserAdmin);
			if($this->InstanceInfraToolsUserAdmin != NULL)
			{
				if($this->UserUpdate(TRUE, $this->InstanceInfraToolsUserAdmin, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_UPDATE;
				$this->UserLoadData($this->InstanceInfraToolsUserAdmin);
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		}
		else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>