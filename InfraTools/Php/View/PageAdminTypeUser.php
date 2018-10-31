<?php
/************************************************************************
Class: PageAdminTypeUser.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Classe que trata da administração dos tipos de usuários.
Functions: 
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

class PageAdminTypeUser extends PageAdmin
{
	protected $ArrayInstanceUser = NULL;
	protected $InstanceTypeUser  = NULL;

	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Language);
	}
	
	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
		$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
	
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageFormLoad();
			$PageFormBack = TRUE;
		}
		
		//FORM_TYPE_USER_LIST
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelect', NULL, $this->ArrayInstanceTypeUser, $this->InputValueHeaderDebug)
			                               == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LIST;
		}
		//FORM_TYPE_USER_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserId', $_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_ID],
									  $this->InstanceTypeUser,  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FORM_TYPE_USER_LIST_VIEW_USERS
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_LIST_VIEW_USERS) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'UserSelectByTypeUserId', $this->InstanceTypeUser->GetTypeUserId(), 
											   $this->ArrayInstanceUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
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
		//FORM_TYPE_USER_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserId', $_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_ID],
										   $this->InstanceTypeUser,  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FORM_USER_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->UserInfraToolsSelectByUserEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_USER_EMAIL], 
												      $this->InstanceUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
		}
		//TYPE USER REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		//TYPE USER CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		//TYPE USER REGISTER SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->TypeUserInsert($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION], $this->InputValueHeaderDebug) 
			                         == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		}
		//TYPE USER VIEW DELETE SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{				
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserDeleteByTypeUserId($this->InstanceTypeUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
				elseif($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
												  $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			} 
		}
		//FORM_TYPE_USER_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
										  $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDATE;
		}
		//FORM_TYPE_USER_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_USER, "TypeUserLoadData", 
										  $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
		}
		//FORM_TYPE_USER_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) 
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserUpdateByTypeUserId($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION],
					                                 $this->InstanceTypeUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDATE;
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml(FALSE);
	}
}
?>