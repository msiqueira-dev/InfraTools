<?php
/************************************************************************
Class: PageAdminTypeStatusTicket.php
Creation: 07/11/2017
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for type status ticket management.
Functions: 
			public    function LoadPage();		
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("TypeStatusTicket"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "TypeStatusTicket.php"))
		include_once(BASE_PATH_PHP_MODEL . "TypeStatusTicket.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeStatusTicket');
}
if (!class_exists("PageAdmin"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageAdmin.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageAdmin.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageAdmin');
}


class PageAdminTypeStatusTicket extends PageAdmin
{
	protected $InstanceTypeStatusTicket      = NULL;
	public    $ArrayInstanceTypeStatusTicket = NULL;

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
		if($this->CheckPostContainsKey(ConfigInfraTools::FORM_SUBMIT_BACK) == ConfigInfraTools::SUCCESS)
		{
			$this->PageStackSessionLoad();
			$PageFormBack = TRUE;
		}
		//FORM_TYPE_STATUS_TICKET_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeStatusTicketSelect', 
									  array(&$this->ArrayInstanceTypeStatusTicket),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_LIST;
		}
		//FORM_TYPE_STATUS_TICKET_SELECT_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_SELECT_SUBMIT]))
		{
			if($this->TypeStatusTicketSelectByTypeStatusTicketDescription($_POST[ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
																          $this->InstanceTypeStatusTicket, $this->InputValueHeaderDebug) 
			                                                              == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		//FORM_TYPE_STATUS_TICKET_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_STATUS_TICKET_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER;
		//FORM_TYPE_STATUS_TICKET_REGISTER_CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_REGISTER_CANCEL]))
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		//FORM_TYPE_STATUS_TICKET_REGISTER_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_REGISTER_SUBMIT]))
		{
			if($this->TypeStatusTicketInsert($_POST[ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
											 $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER;
		}
		//FORM_TYPE_STATUS_TICKET_SELECT_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_SELECT_SUBMIT]))
		{
			if($this->TypeStatusTicketSelectByTypeStatusTicket($_POST[ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
			                                                   $this->InstanceTypeStatusTicket, $this->InputValueHeaderDebug) 
			                                                   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		//FORM_TYPE_STATUS_TICKET_VIEW_DELETE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketDeleteByTypeStatusTicketDescription($this->InstanceTypeStatusTicket, 
														                      $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
				else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket)  
					                                    == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
						else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
					}
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		//FORM_TYPE_STATUS_TICKET_VIEW_UPDATE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket)  
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		///FORM_TYPE_STATUS_TICKET_UPDATE_CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		///FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketUpdateByTypeStatusTicketDescription(
					                                            $_POST[ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
					                                            $this->InstanceTypeStatusTicket, 
																$this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE;
				} 
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket)  
					   == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
						else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
					} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>