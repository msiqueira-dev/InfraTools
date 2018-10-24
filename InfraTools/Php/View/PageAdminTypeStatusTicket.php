<?php
/************************************************************************
Class: PageAdminTypeStatusTicket.php
Creation: 07/11/2017
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/Controller/FacedePersistenceInfraTools.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for the page AdminTypeStatusTicket
Functions: 
			protected function LoadHtml();
			public    function GetCurrentPage();
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

	/* Constructor */
	public function __construct($Language) 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct($Language);
	}

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	protected function LoadHtml()
	{
		$return = NULL;
		echo ConfigInfraTools::HTML_TAG_DOCTYPE;
		echo ConfigInfraTools::HTML_TAG_START;
		$return = $this->IncludeHeadAll(basename(__FILE__, '.php'));
		if ($return == ConfigInfraTools::SUCCESS)
		{
			echo ConfigInfraTools::HTML_TAG_BODY_START;
			echo "<div class='Wrapper'>";
			include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . ".php");
			include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . ConfigInfraTools::PATH_FOOTER);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}
	
	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageFormLoad();
			$PageFormBack = TRUE;
		}
		//TYPE TICKET LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$this->TypeStatusTicketSelect($this->InputLimitOne, $this->InputLimitTwo, 
										  $this->ArrayInstanceTypeStatusTicket, $rowCount,
										  $this->InputValueHeaderDebug);
		}
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_STATUS_TICKET_SELECT))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		//TYPE TICKET LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$this->TypeStatusTicketSelect($this->InputLimitOne, $this->InputLimitTwo, 
										  $this->ArrayInstanceTypeStatusTicket, $rowCount,
										  $this->InputValueHeaderDebug);
		}
		//TYPE TICKET LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			if($this->InputLimitOne > 250)
				$this->InputLimitOne = 250;
			if($this->InputLimitTwo > 275)
				$this->InputLimitTwo = 275;
			$this->TypeStatusTicketSelect($this->InputLimitOne, $this->InputLimitTwo, 
										  $this->ArrayInstanceTypeStatusTicket, $rowCount,
										  $this->InputValueHeaderDebug);
			if($this->InputLimitOne > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
				$this->TypeStatusTicketSelect($this->InputLimitOne, $this->InputLimitTwo, 
											  $this->ArrayInstanceTypeStatusTicket, $rowCount,
							                  $this->InputValueHeaderDebug);
			}
			elseif($this->InputLimitTwo > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
			}
		}
		//TYPE TICKET LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_SELECT_SUBMIT]))
		{
			if($this->TypeStatusTicketSelectByTypeStatusTicketId($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_LIST_SELECT_SUBMIT],
																 $this->InstanceTypeStatusTicket, $this->InputValueHeaderDebug) 
			                                                     == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		//TYPE TICKET REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_STATUS_TICKET_REGISTER))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER;
		//TYPE TICKET CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_REGISTER_CANCEL]))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		//TYPE TICKET REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_REGISTER_SUBMIT]))
		{
			if($this->TypeStatusTicketInsert($_POST[ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
											 $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER;
		}
		//TYPE TICKET SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_SELECT_SUBMIT]))
		{
			if($this->TypeStatusTicketSelectByTypeStatusTicketId($_POST[ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_ID],
			                                                     $this->InstanceTypeStatusTicket, $this->InputValueHeaderDebug) 
			                                                     == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		//TYPE TICKET VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketDeleteByTypeStatusTicketId($this->InstanceTypeStatusTicket, 
														             $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
				else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket)  
					                                    == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
					}
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		//TYPE TICKET VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket)  
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		///TYPE TICKET VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		}
		///TYPE TICKET VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_STATUS_TICKET_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket) 
			   == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeStatusTicketUpdateByTypeStatusTicketId($_POST[ConfigInfraTools::FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION],
					                                                 $this->InstanceTypeStatusTicket, 
																	 $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE;
				} 
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_STATUS_TICKET, $this->InstanceTypeStatusTicket)  
					   == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeStatusTicketLoadData($this->InstanceTypeStatusTicket) == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
					} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>