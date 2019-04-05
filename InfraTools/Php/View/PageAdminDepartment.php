<?php
/************************************************************************
Class: PageAdminDepartment.php
Creation: 2018/02/28
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
	public    $ArrayInstanceDepartment         = NULL;
	protected $ArrayInstanceInfraToolsUser     = NULL;
	protected $InstanceDepartment              = NULL;
	protected $InputValueCorporationNameHidden = "Hidden";
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
		$this->InputValueDepartmentNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
		$this->AdminGoBack($PageFormBack);
		
		//FM_CORPORATION_SEL_SB
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
											&$this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FM_DEPARTMENT_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelect', 
									  array(&$this->ArrayInstanceDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LST;
		}
		//FM_DEPARTMENT_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_REGISTER) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
		}
		//FM_DEPARTMENT_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
		//FM_DEPARTMENT_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentInsert', 
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
									        $_POST[ConfigInfraTools::FIELD_DEPARTMENT_INITIALS],
									        $_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
			else 
			{
				if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_REGISTER;
			}
		}
		//FM_DEPARTMENT_SEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_SEL) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
		}
		//FM_DEPARTMENT_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FIELD_RADIO_DEPARTMENT]))
			{
				if($_POST[ConfigInfraTools::FIELD_RADIO_DEPARTMENT] == ConfigInfraTools::FIELD_RADIO_DEPARTMENT_NAME)
				{
					if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentName', 
											  array($_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
													&$this->ArrayInstanceDepartment),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					{
						if(count($this->ArrayInstanceDepartment) > 1)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LST;
						else
						{
							$this->InstanceDepartment = array_pop($this->ArrayInstanceDepartment);
							if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
														  $this->InstanceDepartment) == ConfigInfraTools::RET_OK)
								$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
						}
					}
				}
				else
				{
					$this->InputValueDepartmentNameAndCorporationNameRadio = ConfigInfraTools::CHECKBOX_CHECKED;
					if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName', 
											  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
													$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
													&$this->InstanceDepartment),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
					else
					{
						$this->InputValueCorporationNameSelectCss = "SelectColorBlack";
						$this->InputValueCorporationNameHidden = "NotHidden";
					}
				}
				if($this->PageBody != ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW && 
				   $this->PageBody != ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_LST)
				{
					if($this->ExecuteFunction($_POST, 'CorporationSelectNoLimit', 
										  array(&$this->ArrayInstanceInfraToolsCorporation),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
				}
			}
		}
		//FM_DEPARTMENT_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
										  $this->InstanceDepartment) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'DepartmentDelete', 
										  array($this->InstanceDepartment->GetDepartmentCorporationName(),
												$this->InstanceDepartment->GetDepartmentName()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_SEL;
			}
		}
		//FM_DEPARTMENT_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
										  $this->InstanceDepartment) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_UPDT;
		}
		//FM_DEPARTMENT_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, "DepartmentLoadData", 
										  $this->InstanceDepartment) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FM_DEPARTMENT_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'DepartmentUpdateDepartmentByDepartmentAndCorporation', 
									      array($_POST[ConfigInfraTools::FIELD_DEPARTMENT_INITIALS],
					                            $_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
					                            &$this->InstanceDepartment),
									      $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;	
			}
		}
		//FM_DEPARTMENT_VIEW_LST_USERS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_VIEW_LST_USERS_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_DEPARTMENT, 
														$this->InstanceDepartment) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByDepartmentName', 
									  array($this->InstanceDepartment->GetDepartmentCorporationName(),
						                    $this->InstanceDepartment->GetDepartmentName(),
											&$this->ArrayInstanceInfraToolsUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW_USERS;
			}
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
					                        &$this->InstanceTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FM_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByUserEmail', 
									  array($_POST[ConfigInfraTools::FIELD_USER_EMAIL],
											&$this->InstanceUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		else
		{
			$_POST[ConfigInfraTools::FM_DEPARTMENT_SEL] = ConfigInfraTools::FM_DEPARTMENT_SEL;
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