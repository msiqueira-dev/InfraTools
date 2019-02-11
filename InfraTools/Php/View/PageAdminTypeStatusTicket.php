<?php
/************************************************************************
Class: PageAdminTypeStatusTicket.php
Creation: 2017/11/07
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
		$this->AdminGoBack($PageFormBack);
		
		//FM_TYPE_STATUS_TICKET_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_STATUS_TICKET_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeStatusTicketSelect', 
									  array(&$this->ArrayInstanceTypeStatusTicket),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_LST;
		}
		//FM_TYPE_STATUS_TICKET_SEL_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_STATUS_TICKET_SEL_SB]))
		{
			if($this->TypeStatusTicketSelectByTypeStatusTicketDescription($_POST[ConfigInfraTools::FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
																          $this->InstanceTypeStatusTicket, $this->InputValueHeaderDebug) 
			                                                              == ConfigInfraTools::RET_OK)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
		}
		//FM_TYPE_STATUS_TICKET_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_STATUS_TICKET_REGISTER) == ConfigInfraTools::RET_OK)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER;
		//FM_TYPE_STATUS_TICKET_REGISTER_CANCEL
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_STATUS_TICKET_REGISTER_CANCEL]))
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
		//FM_TYPE_STATUS_TICKET_REGISTER_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_STATUS_TICKET_REGISTER_SB]))
		{
			if($this->TypeStatusTicketInsert($_POST[ConfigInfraTools::FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
											 $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER;
		}
		//FM_TYPE_STATUS_TICKET_SEL_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_STATUS_TICKET_SEL_SB]))
		{
			if($this->TypeStatusTicketSelectByTypeStatusTicket($_POST[ConfigInfraTools::FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
			                                                   $this->InstanceTypeStatusTicket, $this->InputValueHeaderDebug) 
			                                                   == ConfigInfraTools::RET_OK)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
		}
		//FM_TYPE_STATUS_TICKET_VIEW_DEL_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_STATUS_TICKET_VIEW_DEL_SB]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket) 
			   == ConfigInfraTools::RET_OK)
			{
				if($this->TypeStatusTicketDeleteByTypeStatusTicketDescription($this->InstanceTypeStatusTicket, 
														                      $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
				else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket)  
					                                    == ConfigInfraTools::RET_OK)
					{
						if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
						else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
					}
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
		}
		//FM_TYPE_STATUS_TICKET_VIEW_UPDT_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_STATUS_TICKET_VIEW_UPDT_SB]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket)  
			   == ConfigInfraTools::RET_OK)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
		}
		///FM_TYPE_STATUS_TICKET_UPDT_CANCEL
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_STATUS_TICKET_UPDT_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket) 
			   == ConfigInfraTools::RET_OK)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::RET_OK)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
				else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
		}
		///FM_TYPE_STATUS_TICKET_UPDT_SB
		elseif(isset($_POST[ConfigInfraTools::FM_TYPE_STATUS_TICKET_UPDT_SB]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket) 
			   == ConfigInfraTools::RET_OK)
			{
				if($this->TypeStatusTicketUpdateByTypeStatusTicketDescription(
					                                            $_POST[ConfigInfraTools::FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
					                                            $this->InstanceTypeStatusTicket, 
																$this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::RET_OK)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT;
				} 
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket)  
					   == ConfigInfraTools::RET_OK)
					{
						if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::RET_OK)
							$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
						else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
					} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
		} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SEL;
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>