<?php
/************************************************************************
Class: PageAdminDepartment.php
Creation: 28/02/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for department management.
Functions: 
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
	
	/* __create */
	public static function __create($Page, $Language)
	{
		$class = __CLASS__;
		return new $class($Page, $Language);
	}
	
	/* Constructor */
	protected function __construct($Page, $Language) 
	{
		parent::__construct($Page, $Language);
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//DEPARTMENT VIEW USERS SELECT USER SUBMIT
		if(isset($_POST[ConfigInfraTools::FORM_USER_LIST]))
		{
			if($this->InfraToolsUserSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
												      $this->InstanceUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			if($this->PageBody != ConfigInfraTools::PAGE_ADMIN_USER_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
												   $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
					$this->UserSelectByDepartment($this->InstanceDepartment->GetDepartmentCorporationName(),
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
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$this->DepartmentSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceDepartment,
									$rowCount, $this->InputValueHeaderDebug);
		}
		//DEPARTMENT LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_LIST_BACK))
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$this->DepartmentSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceDepartment,
									$rowCount, $this->InputValueHeaderDebug);
		}
		//DEPARTMENT LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_LIST_FORWARD))
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			$this->DepartmentSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceDepartment,
									$rowCount, $this->InputValueHeaderDebug);
			if($this->InputLimitOne > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
				$this->DepartmentSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceDepartment,
									    $rowCount, $this->InputValueHeaderDebug);
			}
			elseif($this->InputLimitTwo > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
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
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
				else
				{
					$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			} 
			else 
			{
				$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			}
		}
		//DEPARTMENT LIST SELECT CORPORATION SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_DEPARTMENT_LIST_SELECT_CORPORATION],
			                                  $this->InstanceCorporation,
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceCorporation) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_ADMIN_REGISTER))
		{
			$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, 
													  $this->InputValueHeaderDebug);
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
		}
		//DEPARTMENT REGISTER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_REGISTER_CANCEL]))
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT]))
		{
			if($this->DepartmentInsert($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_SELECT],
									   $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS],
									   $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME], 
									   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			else 
			{
				$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, 
														  $this->InputValueHeaderDebug);
				$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
			}
		}
		//DEPARTMENT SELECT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_SELECT))
		{
			$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, 
													  $this->InputValueHeaderDebug);
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
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
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
				}
				else 
				{
					$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, 
															  $this->InputValueHeaderDebug);
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
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
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					else
					{
						$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, 
															                $this->InputValueHeaderDebug);
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
					}
				}
				else 
				{
					$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			}
			else
			{
				$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
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
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_DEPARTMENT);
				} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
											   $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDATE;
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
					{
						if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					    else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
					} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
											   $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
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
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDATE;
				} else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
													   $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
						if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDATE;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW USERS
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_SELECT_USERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->UserSelectByDepartment($this->InstanceDepartment->GetDepartmentCorporationName(),
						                        $this->InstanceDepartment->GetDepartmentName(), 
												$this->InputLimitOne, $this->InputLimitTwo, 
												$this->ArrayInstanceDepartmentUsers, 
												$rowCount, $this->InputValueHeaderDebug)
				                                == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
				else
				{
					if($this->DepartmentLoadData($this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
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
				if($this->UserSelectByDepartment($this->InstanceDepartment->GetDepartmentCorporationName(),
						                        $this->InstanceDepartment->GetDepartmentName(), 
												$this->InputLimitOne, $this->InputLimitTwo, 
												$this->ArrayInstanceDepartmentUsers, $rowCount, $this->InputValueHeaderDebug)
				                                == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
			}
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW USERS LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS_LIST_FORWARD))
		{
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] +25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] +25;
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
											   $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				$this->UserSelectByDepartment($this->InstanceDepartment->GetDepartmentCorporationName(),
						                     $this->InstanceDepartment->GetDepartmentName(), 
											 $this->InputLimitOne, $this->InputLimitTwo, 
											 $this->ArrayInstanceDepartmentUsers, 
											 $rowCount, $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
				if($this->InputLimitOne > $rowCount)
				{
					$this->InputLimitOne = $this->InputLimitOne - 25;
					$this->InputLimitTwo = $this->InputLimitTwo - 25;
					if($this->UserSelectByDepartment($this->InstanceDepartment->GetDepartmentCorporationName(),
						                            $this->InstanceDepartment->GetDepartmentName(), 
												    $this->InputLimitOne, $this->InputLimitTwo, 
												    $this->ArrayInstanceDepartmentUsers, 
												    $rowCount, $this->InputValueHeaderDebug) != ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				}
				elseif($this->InputLimitTwo > $rowCount)
				{
					$this->InputLimitOne = $this->InputLimitOne - 25;
					$this->InputLimitTwo = $this->InputLimitTwo - 25;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//DEPARTMENT VIEW USERS SELECT CORPORATION SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS_SELECT_CORPORATION]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_DEPARTMENT_VIEW_USERS_SELECT_CORPORATION],
											  $this->InstanceCorporation,
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceCorporation) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
			}
		}
		//DEPARTMENT VIEW USERS SELECT TYPE USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION]))
		{
			if($this->TypeUserSelectByTypeUserDescription($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION], 
														  $this->InstanceTypeUser,
														  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			if($this->PageBody != ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
															$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
					$this->UserSelectByDepartment($this->InstanceDepartment->GetDepartmentCorporationName(),
						                         $this->InstanceDepartment->GetDepartmentName(), 
												 $this->InputLimitOne, $this->InputLimitTwo, 
												 $this->ArrayInstanceDepartmentUsers, 
												 $rowCount, $this->InputValueHeaderDebug);
				}
			}
		}
		else
		{	
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			$this->CorporationSelectNoLimit($this->ArrayInstanceInfraToolsCorporation, $this->InputValueHeaderDebug);
			$_POST[ConfigInfraTools::FORM_DEPARTMENT_SELECT . "_x"] = "1";
			$_POST[ConfigInfraTools::FORM_DEPARTMENT_SELECT . "_y"] = "1";
			$_POST[ConfigInfraTools::FORM_DEPARTMENT_SELECT] = ConfigInfraTools::FORM_DEPARTMENT_SELECT;
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>