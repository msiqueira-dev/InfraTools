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
		//TYPE USER LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_LIST))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$this->TypeUserSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceTypeUser, 
								  $rowCount, $this->InputValueHeaderDebug);
		}
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_SELECT))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		//TYPE USER LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$this->TypeUserSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceTypeUser, 
								  $rowCount, $this->InputValueHeaderDebug);
		}
		//TYPE USER LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			$this->TypeUserSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceTypeUser, 
								  $rowCount, $this->InputValueHeaderDebug);
			if($this->InputLimitOne > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
				$this->TypeUserSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceTypeUser, 
									  $rowCount, $this->InputValueHeaderDebug);
			}
			elseif($this->InputLimitTwo > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
			}
		}
		//TYPE USER LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_LIST]))
		{
			if($this->TypeUserSelectByTypeUserId($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_ID], $this->InstanceTypeUser, 
										         $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData($this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_REGISTER))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		//TYPE USER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_REGISTER_CANCEL]))
			$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		//TYPE USER REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_REGISTER_SUBMIT]))
		{
			if($this->TypeUserInsert($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION], $this->InputValueHeaderDebug) 
			                         == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_REGISTER;
		}
		//TYPE USER SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_SELECT_SUBMIT]))
		{
			if($this->TypeUserSelectByTypeUserId($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_ID], $this->InstanceTypeUser, 
										         $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData($this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_VIEW_DELETE_SUBMIT]))
		{				
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
										 $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserDelete($this->InstanceTypeUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_TYPE_USER);
				}
				else
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
												 $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					{
						if($this->TypeUserLoadData($this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
					}
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
										 $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData($this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDATE;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		///TYPE USER VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, 
										 $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData($this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		///TYPE USER VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) 
			                             == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserUpdateByTypeUserId($this->InstanceTypeUser, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->TypeUserLoadData($this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_UPDATE;
				} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW USERS
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_VIEW_SELECT_USERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->UserSelectByTypeUserId($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceTypeUser, $this->ArrayInstanceUser,
											   $rowCount, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
				else
				{
					if($this->TypeUserLoadData($this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW USERS LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_VIEW_USERS_LIST_BACK))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
				if($this->InputLimitOne < 0)
					$this->InputLimitOne = 0;
				if($this->InputLimitTwo <= 0)
					$this->InputLimitTwo = 25;
				if($this->UserSelectByTypeUserId($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceTypeUser, $this->ArrayInstanceUser,
											   $rowCount, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			}
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW USERS FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_TYPE_USER_VIEW_USERS_LIST_FORWARD))
		{
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE];
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO];
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_USER, $this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
			{
				if($this->UserSelectByTypeUserId($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceTypeUser, $this->ArrayInstanceUser,
											   $rowCount, $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
				else 
				{
					if($this->InputLimitTwo > $rowCount)
					{
						if(!is_numeric($rowCount))
						{
							$this->InputLimitOne = $this->InputLimitOne - 25;
							$this->InputLimitTwo = $this->InputLimitTwo - 25;
						}
						else
						{
							$this->InputLimitOne = $rowCount - 25;
							$this->InputLimitTwo = $rowCount;
						}
						if($this->UserSelectByTypeUserId($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceTypeUser, 
													   $this->ArrayInstanceUser, $rowCount, $this->InputValueHeaderDebug) 
						                               == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW_USERS;
						else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
					} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		//TYPE USER VIEW USERS SELECT CORPORATION
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_LIST]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											  $this->InstanceInfraToolsCorporation,
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
			}
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW)
			{
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_LIST;
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				$FacedePersistenceInfraTools->UserInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, 
																 $this->ArrayInstanceInfraToolsUser, $rowCount,
																 $this->InputValueHeaderDebug);
			}
		}
		//TYPE USER VIEW USERS SELECT TYPE USER
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_LIST]))
		{
			if($this->TypeUserSelectByTypeUserId($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_ID], $this->InstanceTypeUser, 
										         $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData($this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		}
		else $this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_SELECT;
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>