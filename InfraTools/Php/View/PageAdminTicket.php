<?php
/************************************************************************
Class: PageAdminTicket.php
Creation: 2017/11/07
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for Ticket management.
Functions: 
			public    function LoadPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("Ticket"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Ticket.php"))
		include_once(BASE_PATH_PHP_MODEL . "Ticket.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Ticket');
}
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}

class PageAdminTicket extends PageAdmin
{
	public $ArrayInstanceTicket = NULL;
	public $ArrayInstanceInfraToolsUser   = NULL;
	public $InstanceTicket                = NULL;
	
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
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_SEL;
		$this->InputValueTicketIdRadio = ConfigInfraTools::CHECKBOX_CHECKED;
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
		//FM_TICKET_LST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TICKET_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TicketSelect', 
									  array(&$this->ArrayInstanceTicket),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_LST;
		}
		//FM_TICKET_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TICKET_REGISTER) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_REGISTER;
		//FM_TICKET_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TICKET_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_SEL;
		//FM_TICKET_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TICKET_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TicketInsert', 
									  array($_POST[ConfigInfraTools::FIELD_TICKET_DESCRIPTION],
										    $_POST[ConfigInfraTools::FIELD_TICKET_SUGGESTION],
										    $_POST[ConfigInfraTools::FIELD_TICKET_TITLE],
										    $_POST[ConfigInfraTools::FIELD_TICKET_STATUS],
										    $_POST[ConfigInfraTools::FIELD_TICKET_TYPE]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_REGISTER;
		}
		//FM_TICKET_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TICKET_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if(isset($_POST[ConfigInfraTools::FIELD_TICKET_RADIO]))
			{
				if($_POST[ConfigInfraTools::FIELD_TICKET_RADIO] == ConfigInfraTools::FIELD_TICKET_RADIO_NAME)
				{
					if($this->ExecuteFunction($_POST, 'TicketSelectByTicketTitle', 
											  array($_POST[ConfigInfraTools::FIELD_TICKET_TITLE],
													&$this->ArrayInstanceTicket),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					{

						if(count($this->ArrayInstanceTicket) > 1)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_LST;	
						else
						{
							$this->InstanceTicket = array_pop($this->ArrayInstanceTicket);
							if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TICKET, "TicketLoadData", 
														  $this->InstanceTicket) == ConfigInfraTools::RET_OK)
								$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;
						}
					}
				}
				else
				{
					if($this->ExecuteFunction($_POST, 'TicketSelectByTicketId', 
										  array($_POST[ConfigInfraTools::FIELD_TICKET_ID],
												&$this->InstanceTicket),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;
				}
			}
			else
			{
				if($this->ExecuteFunction($_POST, 'TicketSelectByTicketId', 
										  array($_POST[ConfigInfraTools::FIELD_TICKET_ID],
												&$this->InstanceTicket),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;
			}
		}
		//FM_TICKET_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TICKET_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TICKET, "TicketLoadData", 
										  $this->InstanceTicket) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'TicketDeleteByTicketId', 
										  array($this->InstanceTicket),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_SEL;
			}
		}
		//FM_TICKET_VIEW_LST_USERS_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TICKET_VIEW_LST_USERS_SB]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TICKET, $this->InstanceTicket) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByTicketId', 
										  array($this->InstanceTicket->GetTicketId(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW_LST_USERS;
			}
		}
		//FM_TICKET_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TICKET_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TICKET, "TicketLoadData", 
										  $this->InstanceTicket) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_UPDT;
		}
		//FM_TICKET_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TICKET_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TICKET, "TicketLoadData", 
										  $this->InstanceTicket) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;
		}
		//FM_TICKET_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TICKET_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TICKET, 
											   $this->InstanceTicket) == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'TicketUpdateByTicketId', 
									      array($_POST[ConfigInfraTools::FIELD_TICKET_DESCRIPTION],
					                            $_POST[ConfigInfraTools::FIELD_TICKET_TITLE],
					                            &$this->InstanceTicket),
									      $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;	
			}
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
									        &$this->InstanceInfraToolsTypeUser),
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