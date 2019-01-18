<?php
/************************************************************************
Class: PageAdminTypeTicket.php
Creation: 07/11/2017
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for type ticket management.
Functions: 
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("TypeTicket"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "TypeTicket.php"))
		include_once(BASE_PATH_PHP_MODEL . "TypeTicket.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeTicket');
}
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}


class PageAdminTypeTicket extends PageAdmin
{
	public $ArrayInstanceTypeTicket = NULL;
	public $ArrayInstanceUser       = NULL;
	public $InstanceTypeTicket      = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
		//FORM_SUBMIT_BACK
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_SUBMIT_BACK) == ConfigInfraTools::SUCCESS)
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//FORM_CORPORATION_SELECT_SUBMIT
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											&$this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
		}
		//FORM_DEPARTMENT_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_DEPARTMENT_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName',
									  array($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME], 
											$_POST[ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME],
										    &$this->InstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FORM_TYPE_TICKET_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_TICKET_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeTicketSelect', 
									  array(&$this->ArrayInstanceTypeTicket),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_LIST;
		}
		//FORM_TYPE_TICKET_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_TICKET_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_REGISTER;
		//FORM_TYPE_TICKET_REGISTER_CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_REGISTER_CANCEL]))
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		//FORM_TYPE_TICKET_REGISTER_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_REGISTER_SUBMIT]))
		{
			if($this->TypeTicketInsert($_POST[ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION],
									   $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_REGISTER;
		}
		//FORM_TYPE_TICKET_SELECT_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_SELECT_SUBMIT]))
		{
			if($this->TypeTicketSelectByTypeTicketDescription($_POST[ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION],
										                      $this->InstanceTypeTicket, $this->InputValueHeaderDebug)
			                                                  == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		//FORM_TYPE_TICKET_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_TICKET_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, "TypeTicketLoadData", 
										  $this->InstanceTypeTicket) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'TypeTicketDeleteByTypeTicketDescription', 
										  array($this->InstanceTypeTicket),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
			}
		}
		//FORM_TYPE_TICKET_VIEW_LIST_USERS_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_TICKET_VIEW_LIST_USERS_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->InstanceTypeTicket)  
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByTypeTicketDescription', 
										  array($this->InstanceTypeTicket->GetTypeTicketDescription(),
												&$this->ArrayInstanceUser), 
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW_LIST_USERS;
				else
				{
					if($this->TypeTicketLoadData($this->InstanceTypeTicket) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
				}
			}
		}
		//FORM_TYPE_TICKET_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_TICKET_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, "TypeTicketLoadData", 
										  $this->InstanceTypeTicket) == ConfigInfraTools::TypeTicketLoadData)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_UPDATE;
		}
		//FORM_TYPE_TICKET_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_TICKET_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, "TypeTicketLoadData", 
										  $this->InstanceTypeTicket) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
		}
		//FORM_TYPE_TICKET_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_TICKET_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, 
											   $this->InstanceTypeTicket) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'TypeTicketUpdateByTypeTicketDescription', 
									      array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION],
					                            &$this->InstanceTypeTicket),
									      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;	
			}
		}
		//FORM_TYPE_USER_SELECT
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
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>