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
	public $ArrayInstanceTypeTicket     = NULL;
	public $ArrayInstanceInfraToolsUser = NULL;
	public $InstanceTypeTicket          = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SEL;
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
		//FM_DEPARTMENT_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName',
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME], 
											$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
										    &$this->InstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
		}
		//FM_TYPE_TICKET_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_TICKET_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeTicketSelect', 
									  array(&$this->ArrayInstanceTypeTicket),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_LST;
		}
		//FM_TYPE_TICKET_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_TICKET_REGISTER) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_REGISTER;
		//FM_TYPE_TICKET_REGISTER_CANCEL
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_TICKET_REGISTER_CANCEL]))
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SEL;
		//FM_TYPE_TICKET_REGISTER_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_TICKET_REGISTER_SB]))
		{
			if($this->TypeTicketInsert($_POST[ConfigInfraTools::FIELD_TYPE_TICKET_DESCRIPTION],
									   $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_REGISTER;
		}
		//FM_TYPE_TICKET_SEL_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_TICKET_SEL_SB]))
		{
			if($this->TypeTicketSelectByTypeTicketDescription($_POST[ConfigInfraTools::FIELD_TYPE_TICKET_DESCRIPTION],
										                      $this->InstanceTypeTicket, $this->InputValueHeaderDebug)
			                                                  == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SEL;
		}
		//FM_TYPE_TICKET_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_TICKET_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, "TypeTicketLoadData", 
										  $this->InstanceTypeTicket) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'TypeTicketDeleteByTypeTicketDescription', 
										  array($this->InstanceTypeTicket),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SEL;
			}
		}
		//FM_TYPE_TICKET_VIEW_LST_USERS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_TICKET_VIEW_LST_USERS_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->InstanceTypeTicket) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByTypeTicketDescription', 
										  array($this->InstanceTypeTicket->GetTypeTicketDescription(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW_LST_USERS;
			}
		}
		//FM_TYPE_TICKET_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_TICKET_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, "TypeTicketLoadData", 
										  $this->InstanceTypeTicket) == ConfigInfraTools::TypeTicketLoadData)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_UPDT;
		}
		//FM_TYPE_TICKET_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_TICKET_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, "TypeTicketLoadData", 
										  $this->InstanceTypeTicket) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
		}
		//FM_TYPE_TICKET_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_TICKET_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, 
											   $this->InstanceTypeTicket) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'TypeTicketUpdateByTypeTicketDescription', 
									      array($_POST[ConfigInfraTools::FIELD_TYPE_TICKET_DESCRIPTION],
					                            &$this->InstanceTypeTicket),
									      $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;	
			}
		}
		//FM_TYPE_USER_SEL
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
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>