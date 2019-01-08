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
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//FORM_TYPE_TICKET_LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_TICKET_LIST))
		{
			if($this->ExecuteFunction($_POST, 'TypeTicketSelect', 
									  array(&$this->ArrayInstanceTypeTicket),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_LIST;
		}
		//FORM_TYPE_TICKET_REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_TICKET_REGISTER))
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
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->InstanceTypeTicket) 
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeTicketDeleteByTypeTicketDescription($this->InstanceTypeTicket, $this->InputValueHeaderDebug) 
				                                                  == ConfigInfraTools::SUCCESS)
				{
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET);
				}
				else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->InstanceTypeTicket)  
					                                    == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeTicketLoadData($this->InstanceTypeTicket) == ConfigInfraTools::SUCCESS)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
						else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
					}
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		//FORM_TYPE_TICKET_VIEW_LIST_USERS_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_VIEW_LIST_USERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->InstanceTypeTicket)  
			                                   == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->InfraToolsUserSelectByTypeTicketDescription($this->InputLimitOne, $this->InputLimitTwo, 
															          $this->InstanceTypeTicket->GetTypeTicketDescription(),
										                              $this->ArrayInstanceUser, $rowCount, $this->InputValueHeaderDebug) 
				                                                      == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW_LIST_USERS;
				else
				{
					if($this->TypeTicketLoadData($this->InstanceTypeTicket) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		//FORM_TYPE_TICKET_VIEW_UPDATE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->InstanceTypeTicket)  
			                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeTicketLoadData($this->InstanceTypeTicket) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_UPDATE;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		//FORM_TYPE_TICKET_UPDATE_CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->InstanceTypeTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeTicketLoadData($this->InstanceTypeTicket) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		}
		//FORM_TYPE_TICKET_UPDATE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_TICKET_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->InstanceTypeTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeTicketUpdateByTypeTicketDescription($_POST[ConfigInfraTools::FORM_FIELD_TYPE_TICKET_DESCRIPTION],
														          $this->InstanceTypeTicket, $this->InputValueHeaderDebug) 
				                                                  == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_TICKET, $this->InstanceTypeTicket) 
					   == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeTicketLoadData($this->InstanceTypeTicket) == ConfigInfraTools::SUCCESS)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_VIEW;
						else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
					} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_TICKET_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>