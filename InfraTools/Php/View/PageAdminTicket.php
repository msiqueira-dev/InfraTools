<?php
/************************************************************************
Class: PageAdminTicket.php
Creation: 07/11/2017
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for the page AdminTicket
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
	public $ArrayInstanceTicket        = NULL;
	public $ArrayInstanceTicketMembers = NULL;
	public $InstanceTicket             = NULL;
	
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
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
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
		//FORM_TICKET_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TICKET_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TicketSelect', 
									  array(&$this->ArrayInstanceTicket),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_LIST;
		}
		//FORM_TICKET_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TICKET_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_REGISTER;
		//FORM_TICKET_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TICKET_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_SELECT;
		//FORM_TICKET_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TICKET_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TicketInsert', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION],
										    $_POST[ConfigInfraTools::FORM_FIELD_TICKET_SUGGESTION],
										    $_POST[ConfigInfraTools::FORM_FIELD_TICKET_TITLE],
										    $_POST[ConfigInfraTools::FORM_FIELD_TICKET_STATUS],
										    $_POST[ConfigInfraTools::FORM_FIELD_TICKET_TYPE]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_REGISTER;
		}
		//FORM_TICKET_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TICKET_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if(isset($_POST[ConfigInfraTools::FORM_FIELD_TICKET_RADIO]))
			{
				if($_POST[ConfigInfraTools::FORM_FIELD_TICKET_RADIO] == ConfigInfraTools::FORM_FIELD_TICKET_RADIO_NAME)
				{
					if($this->ExecuteFunction($_POST, 'TicketSelectByTicketTitle', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_TICKET_TITLE],
													&$this->ArrayInstanceTicket),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					{

						if(count($this->ArrayInstanceTicket) > 1)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_LIST;	
						else
						{
							$this->InstanceTicket = array_pop($this->ArrayInstanceTicket);
							if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TICKET, "TicketLoadData", 
														  $this->InstanceTicket) == ConfigInfraTools::SUCCESS)
								$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;
						}
					}
				}
				else
				{
					if($this->ExecuteFunction($_POST, 'TicketSelectByTicketId', 
										  array($_POST[ConfigInfraTools::FORM_FIELD_TICKET_ID],
												&$this->InstanceTicket),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;
				}
			}
			else
			{
				if($this->ExecuteFunction($_POST, 'TicketSelectByTicketId', 
										  array($_POST[ConfigInfraTools::FORM_FIELD_TICKET_ID],
												&$this->InstanceTicket),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;
			}
		}
		//FORM_TICKET_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TICKET_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TICKET, "TicketLoadData", 
										  $this->InstanceTicket) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'TicketDeleteByTicketId', 
										  array($this->InstanceTicket),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_SELECT;
			}
		}
		//FORM_TICKET_VIEW_LIST_USERS
		elseif(isset($_POST[ConfigInfraTools::FORM_TICKET_VIEW_LIST_USERS]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TICKET, $this->InstanceTicket)  == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->UserSelectByTicketId($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceTicket->GetTicketId(),
										       $this->ArrayInstanceTicketMembers, $rowCount, $this->InputValueHeaderDebug) 
				                               == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW_LIST_USERS;
				else
				{
					if($this->TicketLoadData($this->InstanceTicket) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_SELECT;
		}
		//FORM_TICKET_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TICKET_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TICKET, "TicketLoadData", 
										  $this->InstanceTicket) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_UPDATE;
		}
		//FORM_TICKET_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TICKET_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TICKET, "TicketLoadData", 
										  $this->InstanceTicket) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;
		}
		//FORM_TICKET_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TICKET_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TICKET, 
											   $this->InstanceTicket) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'TicketUpdateByTicketId', 
									      array($_POST[ConfigInfraTools::FORM_FIELD_TICKET_DESCRIPTION],
					                            $_POST[ConfigInfraTools::FORM_FIELD_TICKET_TITLE],
					                            &$this->InstanceTicket),
									      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TICKET_VIEW;	
			}
		}
		//FORM_TYPE_USER_SELECT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserId', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_ID],
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