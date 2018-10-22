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
			private function UserChangeUserType($InstanceInfraToolsUser);
			private function UserDelete(&$InstanceInfraToolsUser);
			private function UserResetPassword($InstanceSelectedUser);
			private function UserUpdateActive(&$InstanceSelectedUser, $UserActive);

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
	
	private function UserChangeUserType($InstanceInfraToolsUser)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeUserId = $_POST[ConfigInfraTools::FORM_USER_CHANGE_USER_TYPE_SELECT];	
		$arrayConstants = array(); $matrixConstants = array();
			
		//USER_TYPE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_USER_CHANGE_USER_TYPE_SELECT;
		$arrayElementsClass[0]        = &$this->ReturnTypeUserIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $this->InputValueTypeUserId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeUserIdText;
		array_push($arrayConstants, 'FORM_INVALID_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			if($this->InputValueTypeUserId == ConfigInfraTools::FORM_SELECT_NONE)
				$this->InputValueTypeUserId = NULL;
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->UserUpdateUserTypeByEmail($InstanceInfraToolsUser->GetEmail(),
																			  $this->InputValueTypeUserId,
																			  $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_USER_CHANGE_USER_TYPE_SUCCESS', 
																				 $this->Language);
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
			}
			else
			{
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('ADMIN_USER_CHANGE_USER_TYPE_ERROR', 
																				$this->Language);			
			}
			return $return;
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return $return;
		}
	}
	
	private function UserDelete(&$InstanceInfraToolsUser)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserEmail  = $InstanceInfraToolsUser->GetEmail();
		$arrayConstants = array(); $matrixConstants = array();
			
		//VALIDA E-MAIL
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 60; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->UserDelete($this->InputValueUserEmail, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				unset($InstanceInfraToolsUser);
				$this->InputValueUserEmail = "";
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('ADMIN_USER_DELETE_SUCCESS', 
																$this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_USER_DELETE_FAILED_NOT_FOUND)
			{
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('USER_NOT_FOUND', 
																$this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::FORM_USER_RETURN_NOT_FOUND;
			}
			else
			{
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('ADMIN_USER_DELETE_ERROR', 
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
			return $return;
		}
	}
	
	private function UserResetPassword($InstanceSelectedUser)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness($this->InstanceLanguageText);
		$newPassword = $this->InstanceInfraToolsFacedeBusiness->GenerateRandomPassword();
		$return = $FacedePersistenceInfraTools->UserUpdatePasswordByEmail($InstanceSelectedUser->GetEmail(), 
		                                                                          $newPassword,
																				  $this->InputValueHeaderDebug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $this->InstanceInfraToolsFacedeBusiness->SendEmailPasswordReset(
										  $InstanceSelectedUser->GetName(),
										  $InstanceSelectedUser->GetEmail(),
										  $newPassword, $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('PASSWORD_RESET_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			}
			else
			{
				$this->ReturnText  = $this->InstanceLanguageText->GetConstant('SEND_EMAIL_ERROR', 
																		                $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		else
		{
			$this->ReturnText  = $this->InstanceLanguageText->GetConstant('PASSWORD_RESET_SUCCESS', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}
	}
	
	private function UserUpdateActive(&$InstanceSelectedUser, $UserActive)
	{
		if(isset($InstanceSelectedUser))
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->UserUpdateActiveByEmail($InstanceSelectedUser->GetEmail(),
																					$UserActive,
																				    $this->InputValueHeaderDebug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$InstanceSelectedUser->SetUserActive($UserActive);
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				if($UserActive)
					$this->ReturnText =	str_replace('[0]',  
								    strtolower($this->InstanceLanguageText->GetConstant('ACTIVATED', $this->Language)), 
									$this->InstanceLanguageText->GetConstant('ADMIN_USER_ACTIVATE_SUCCESS', $this->Language));
				else 
					$this->ReturnText = str_replace('[0]', 
								    strtolower($this->InstanceLanguageText->GetConstant('DEACTIVATED', $this->Language)), 
									$this->InstanceLanguageText->GetConstant('ADMIN_USER_ACTIVATE_SUCCESS', $this->Language));
					
				$this->InputFocus = ConfigInfraTools::DIV_RETURN;
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
			}
			else
			{
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																				 'ADMIN_USER_ACTIVATE_ERROR', 
																				  $this->Language);		
				return ConfigInfraTools::ERROR;
			}
		}
		else 
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																			 'ADMIN_USER_ACTIVATE_ERROR_NO_USER_SELECTED', 
																			  $this->Language);		
			return ConfigInfraTools::ERROR;
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
			if($this->UserInfraToolsSelectByEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
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
			if($this->UserRegister(NULL, NULL, FALSE, NULL, NULL) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_USER_REGISTER;
		}
		//USER SELECT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_USER_SELECT))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_SELECT;
		//USER SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_SELECT_SUBMIT]))
		{
			if($this->UserInfraToolsSelectByEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
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
				$this->UserUpdateActive($this->InstanceInfraToolsUserAdmin, true);
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
				$this->UserUpdateActive($this->InstanceInfraToolsUserAdmin, false);
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
				if($this->UserDelete($this->InstanceInfraToolsUserAdmin) == ConfigInfraTools::SUCCESS)
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
				$this->UserResetPassword($this->InstanceInfraToolsUserAdmin);
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
				if($this->UserUpdateCorporationByEmail($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
					                                   $this->InstanceInfraToolsUserAdmin, 
													   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->UserInfraToolsSelectByEmail($this->InstanceInfraToolsUserAdmin->GetEmail(),
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
				if($this->UserUpdateCorporationInformation($this->InstanceInfraToolsUserAdmin) == ConfigInfraTools::SUCCESS)
				{
					if($this->UserInfraToolsSelectByEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
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
				if($this->UserChangeUserType($this->InstanceInfraToolsUserAdmin) == ConfigInfraTools::SUCCESS)
				{
					if($this->UserInfraToolsSelectByEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
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
				$this->UserChangeTwoStepVerification($this->InstanceInfraToolsUserAdmin, TRUE);
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
				$this->UserChangeTwoStepVerification($this->InstanceInfraToolsUserAdmin, FALSE);
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
				if($this->UserUpdate(TRUE, $this->InstanceInfraToolsUserAdmin) == ConfigInfraTools::SUCCESS)
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