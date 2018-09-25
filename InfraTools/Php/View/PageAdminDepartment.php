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

class PageAdminDepartment extends PageAdmin
{
	public    $ArrayInstanceDepartment      = NULL;
	protected $ArrayInstanceDepartmentUsers = NULL;
	protected $InstanceDepartment           = NULL;

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
		//DEPARTMENT VIEW USERS SELECT USER SUBMIT
		if(isset($_POST[ConfigInfraTools::FORM_USER_LIST_SELECT_SUBMIT]))
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
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
															$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
					$this->DepartmentSelectUsers($this->InstanceDepartment->GetDepartmentCorporationName(),
						                         $this->InstanceDepartment->GetDepartmentName(), 
												 $this->InputLimitOne, $this->InputLimitTwo, 
												 $this->ArrayInstanceDepartmentUsers, $rowCount,
												 $this->InputValueHeaderDebug);
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
				                                       $_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT],
													   $this->InstanceDepartment, $this->InputValueHeaderDebug)
			                                           == ConfigInfraTools::SUCCESS)
			{
				if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
				else
				{
					$return = $this->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			} 
			else 
			{
				$return = $this->CorporationSelectNoLimit(
				                                              $this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			}
		}
		//DEPARTMENT LIST SELECT CORPORATION SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION],
			                                  $this->InstanceInfraToolsCorporation,
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_ADMIN_REGISTER))
		{
			$return = $this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, 
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
			if($this->DepartmentInsert($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_SELECT],
									   $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS],
									   $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME], 
									   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			else 
			{
				$return = $this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, 
														  $this->InputValueHeaderDebug);
				$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
			}
		}
		//DEPARTMENT SELECT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_SELECT))
		{
			$return = $this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, 
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
				if($this->DepartmentSelectByDepartmentName($_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
														   $this->ArrayInstanceDepartment,
														   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
				}
				else 
				{
					$return = $this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			}
			elseif($radio == ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME)
			{
				if($this->DepartmentSelectByDepartmentNameAndCorporationName($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_SELECT],
																			 $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
																			 $this->InstanceDepartment,
																			 $this->InputValueHeaderDebug))
				{
					if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
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
				if($this->DepartmentDelete($this->InstanceDepartment->GetDepartmentCorporationName(),
					                       $this->InstanceDepartment->GetDepartmentName(),
										   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
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
				if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDATE;
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
					{
						if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
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
				if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
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
				if($this->DepartmentUpdateDepartmentByDepartmentAndCorporation(
					                   $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS],
					                   $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
					                   $this->InstanceDepartment,
					                   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDATE;
				} else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
													   $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
						if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
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
				if($this->DepartmentSelectUsers($this->InstanceDepartment->GetDepartmentCorporationName(),
						                        $this->InstanceDepartment->GetDepartmentName(), 
												$this->InputLimitOne, $this->InputLimitTwo, 
												$this->ArrayInstanceDepartmentUsers, 
												$rowCount, $this->InputValueHeaderDebug)
				                                == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
				else
				{
					if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
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
				if($this->DepartmentSelectUsers($this->InstanceDepartment->GetDepartmentCorporationName(),
						                        $this->InstanceDepartment->GetDepartmentName(), 
												$this->InputLimitOne, $this->InputLimitTwo, 
												$this->ArrayInstanceDepartmentUsers, $rowCount)
				                                == ConfigInfraTools::SUCCESS)
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
				if($this->DepartmentSelectUsers($this->InstanceDepartment->GetDepartmentCorporationName(),
						                        $this->InstanceDepartment->GetDepartmentName(), 
												$this->InputLimitOne, $this->InputLimitTwo, 
												$this->ArrayInstanceDepartmentUsers, 
												$rowCount, $this->InputValueHeaderDebug)
				                                == ConfigInfraTools::SUCCESS)
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
						if($this->DepartmentSelectUsers($this->InstanceDepartment->GetDepartmentCorporationName(),
						                        $this->InstanceDepartment->GetDepartmentName(), 
												$this->InputLimitOne, $this->InputLimitTwo, 
												$this->ArrayInstanceDepartmentUsers, 
												$rowCount, $this->InputValueHeaderDebug)
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
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS_SELECT_CORPORATION],
											  $this->InstanceInfraToolsCorporation,
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
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
					$this->DepartmentSelectUsers($this->InstanceDepartment->GetDepartmentCorporationName(),
						                         $this->InstanceDepartment->GetDepartmentName(), 
												 $this->InputLimitOne, $this->InputLimitTwo, 
												 $this->ArrayInstanceDepartmentUsers, 
												 $rowCount, $this->InputValueHeaderDebug);
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