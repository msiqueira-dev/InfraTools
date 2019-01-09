<?php
/************************************************************************
Class: PageAdminDepartment.php
Creation: 28/02/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
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
	public static function __create($Config, $Language, $Page)
	{
		$class = __CLASS__;
		return new $class($Config, $Language, $Page);
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		parent::__construct($Config, $Language, $Page);
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		$this->InputValueDepartmentNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//FORM_CORPORATION_LIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
					                        $this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FORM_CORPORATION_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											&$this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FORM_DEPARTMENT_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelect', 
									  array(&$this->ArrayInstanceDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;
		}
		//FORM_DEPARTMENT_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_REGISTER) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
		}
		//FORM_DEPARTMENT_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		//FORM_DEPARTMENT_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentInsert', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
									        $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS],
									        $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			else 
			{
				if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
			}
		}
		//FORM_DEPARTMENT_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_SELECT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
		}
		//FORM_DEPARTMENT_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT]))
			{
				if($_POST[ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT] == ConfigInfraTools::FORM_FIELD_RADIO_DEPARTMENT_NAME)
				{
					if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentName', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
													&$this->ArrayInstanceDepartment),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					{
						if(count($this->ArrayInstanceDepartment) > 1)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LIST;	
						else
						{
							$this->InstanceDepartment = array_pop($this->ArrayInstanceDepartment);
							if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
														  $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
								$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
						}
					}
				}
				else
				{
					$this->InputValueDepartmentNameAndCorporationNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
					if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
													$_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
													&$this->InstanceDepartment),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
				}
			}
			else
			{
				$this->InputValueDepartmentNameAndCorporationNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
				if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName', 
										  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
												$_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
												&$this->InstanceDepartment),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
			}
		}
		//FORM_DEPARTMENT_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
										  $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'DepartmentDelete', 
										  array($this->InstanceDepartment->GetDepartmentCorporationName(),
												$this->InstanceDepartment->GetDepartmentName()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SELECT;
			}
		}
		//FORM_DEPARTMENT_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
										  $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDATE;
		}
		//FORM_DEPARTMENT_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
										  $this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FORM_DEPARTMENT_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'DepartmentUpdateDepartmentByDepartmentAndCorporation', 
									      array($_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_INITIALS],
					                            $_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
					                            &$this->InstanceDepartment),
									      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;	
			}
		}
		//FORM_DEPARTMENT_VIEW_LIST_USERS_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_VIEW_LIST_USERS_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'UserSelectByDepartment', 
									  array($this->InstanceDepartment->GetDepartmentCorporationName(),
						                    $this->InstanceDepartment->GetDepartmentName(),
											&$this->ArrayInstanceDepartmentUsers),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
			}
		}
		//FORM_TYPE_USER_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION],
					                        &$this->InstanceTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FORM_USER_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByUserEmail', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL],
											&$this->InstanceUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		else
		{
			$_POST[ConfigInfraTools::FORM_DEPARTMENT_SELECT] = ConfigInfraTools::FORM_DEPARTMENT_SELECT;
			$this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug);
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>