<?php
/************************************************************************
Class: PageAdminCorporation.php
Creation: 30/09/2016
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			Base       - Php/Controller/Session.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for corporation management.
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

class PageAdminCorporation extends PageAdmin
{
	protected $ArrayInstanceInfraToolsCorporationUsers = NULL;
	protected $InstanceInfraToolsCorporation           = NULL;
	protected $InstanceTypeUser                        = NULL;

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

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
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
			include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php'). ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . ConfigInfraTools::PATH_FOOTER);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		//FORM SUBMIT BACK
		if($this->CheckInputImage(ConfigInfraTools::FORM_SUBMIT_BACK))
		{
			$this->PageFormLoad();
			$PageFormBack = TRUE;
		}
		//CORPORATION LIST
		if($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_LIST))
		{
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_CORPORATION);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_LIST;
			$this->InputLimitOne = 0;
			$this->InputLimitTwo = 25;
			$this->CorporationInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceInfraToolsCorporation,
									           $rowCount, $this->InputValueHeaderDebug);
		}
		//CORPORATION LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_LIST_BACK))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
			if($this->InputLimitOne < 0)
				$this->InputLimitOne = 0;
			if($this->InputLimitTwo <= 0)
				$this->InputLimitTwo = 25;
			$this->CorporationInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceInfraToolsCorporation,
									           $rowCount, $this->InputValueHeaderDebug);
		}
		//CORPORATION LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_LIST_FORWARD))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_LIST;
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			$this->CorporationInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceInfraToolsCorporation,
									           $rowCount, $this->InputValueHeaderDebug);
			if($this->InputLimitOne > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
				$this->CorporationInfraToolsSelect($this->InputLimitOne, $this->InputLimitTwo, $this->ArrayInstanceInfraToolsCorporation,
										           $rowCount, $this->InputValueHeaderDebug);
			}
			elseif($this->InputLimitTwo > $rowCount)
			{
				$this->InputLimitOne = $this->InputLimitOne - 25;
				$this->InputLimitTwo = $this->InputLimitTwo - 25;
			}
		}
		//CORPORATION LIST SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_LIST_SELECT]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_CORPORATION_LIST_SELECT],
											  $this->InstanceInfraToolsCorporation,
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION REGISTER
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_REGISTER))
		{
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_CORPORATION);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
		}
		//CORPORATION REGISTER CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_REGISTER_CANCEL]))
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION REGISTER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_REGISTER_SUBMIT]))
		{
			$this->InputValueCorporationName = $_POST[Config::FORM_FIELD_CORPORATION_NAME];
			if(isset($_POST[Config::FORM_FIELD_CORPORATION_ACITVE]))
				$this->InputValueCorporationActive = TRUE;
			else $this->InputValueCorporationActive = FALSE;
			if($this->CorporationInsert($this->InputValueCorporationActive,
									    $this->InputValueCorporationName,
									    $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
		}
		//CORPORATION SELECT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_SELECT))
		{
			$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_CORPORATION);
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION SELECT SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_SELECT_SUBMIT]))
		{
			if($this->CorporationSelectByName($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME],
											  $this->InstanceInfraToolsCorporation,
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW DELETE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_VIEW_DELETE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationDelete($this->InstanceInfraToolsCorporation->GetCorporationName(),
											$this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
					$this->Session->RemoveSessionVariable(ConfigInfraTools::SESS_ADMIN_CORPORATION);
				} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW UPDATE
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_VIEW_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
											   $this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDATE;
				else 
				{
					if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
													   $this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
					{
						if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
							$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					    else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
					} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW UPDATE CANCEL
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_UPDATE_CANCEL]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
											   $this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW UPDATE SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_UPDATE_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueCorporationName = $_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_NAME];
				if(isset($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_ACITVE]))
					$this->InputValueCorporationActive = TRUE;
				else $this->InputValueCorporationActive = FALSE;
				if($this->CorporationUpdate($this->InputValueCorporationActive,
										    $this->InputValueCorporationName,
											$this->InstanceInfraToolsCorporation,
										    $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				{
					if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDATE;
				} 
				else
				{
					if(isset($_POST[ConfigInfraTools::FORM_FIELD_CORPORATION_ACITVE]))
						$this->InputValueCorporationActive = "checked";
					else $this->InputValueCorporationActive = "";
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDATE;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW USERS
		elseif(isset($_POST[ConfigInfraTools::FORM_CORPORATION_VIEW_SELECT_USERS_SUBMIT]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceInfraToolsCorporation,
												 $this->ArrayInstanceInfraToolsCorporationUsers, $rowCount,
												 $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
				else
				{
					if($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW USERS LIST BACK SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_BACK))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] - 25;
				$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] - 25;
				if($this->InputLimitOne < 0)
					$this->InputLimitOne = 0;
				if($this->InputLimitTwo <= 0)
					$this->InputLimitTwo = 25;
				if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceInfraToolsCorporation,
												 $this->ArrayInstanceInfraToolsCorporationUsers, $rowCount,
												 $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
				else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
			}
			else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW USERS LIST FORWARD SUBMIT
		elseif($this->CheckInputImage(ConfigInfraTools::FORM_CORPORATION_VIEW_USERS_LIST_FORWARD))
		{
			$this->InputLimitOne = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE] + 25;
			$this->InputLimitTwo = $_POST[ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO] + 25;
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
														$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
			{
				$this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, $this->InstanceInfraToolsCorporation,
											  $this->ArrayInstanceInfraToolsCorporationUsers, $rowCount,
											  $this->InputValueHeaderDebug);
				$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
				if($this->InputLimitOne > $rowCount)
				{
					$this->InputLimitOne = $this->InputLimitOne - 25;
					$this->InputLimitTwo = $this->InputLimitTwo - 25;
					if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, 
													 $this->InstanceInfraToolsCorporation,
											         $this->ArrayInstanceInfraToolsCorporationUsers, $rowCount,
											         $this->InputValueHeaderDebug) != ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				}
				elseif($this->InputLimitTwo > $rowCount)
				{
					$this->InputLimitOne = $this->InputLimitOne - 25;
					$this->InputLimitTwo = $this->InputLimitTwo - 25;
				}
			} else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
		}
		//CORPORATION VIEW USERS SELECT CORPORATION SUBMIT
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
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
											       $this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, 
													 $this->InstanceInfraToolsCorporation,
												     $this->ArrayInstanceInfraToolsCorporationUsers, $rowCount,
												     $this->InputValueHeaderDebug, FALSE) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
					elseif($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				}
			}
		}
		//CORPORATION VIEW USERS SELECT TYPE USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_USER_LIST]))
		{
			if($this->TypeUserSelectByTypeUserDescription($_POST[ConfigInfraTools::FORM_FIELD_TYPE_USER_DESCRIPTION], 
														  $this->InstanceTypeUser,
														  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
				if($this->TypeUserLoadData($this->InstanceTypeUser) == ConfigInfraTools::SUCCESS)
					$this->Page = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
			}
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
															$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, 
													 $this->InstanceInfraToolsCorporation,
												     $this->ArrayInstanceInfraToolsCorporationUsers, $rowCount,
												     $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
					elseif($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				}
			}
		}
		//CORPORATION VIEW USERS SELECT USER SUBMIT
		elseif(isset($_POST[ConfigInfraTools::FORM_USER_LIST]))
		{
			if($this->UserInfraToolsSelectByEmail($_POST[ConfigInfraTools::FORM_FIELD_USER_EMAIL]) == ConfigInfraTools::SUCCESS)
			{
				$this->UserLoadData();
				$this->Page = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
			}
			if($this->Page != ConfigInfraTools::PAGE_ADMIN_USER_VIEW)
			{
				if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, 
															$this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
				{
					$this->InputLimitOne = 0;
					$this->InputLimitTwo = 25;
					if($this->CorporationSelectUsers($this->InputLimitOne, $this->InputLimitTwo, 
													 $this->InstanceInfraToolsCorporation,
												     $this->ArrayInstanceInfraToolsCorporationUsers, $rowCount,
												     $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
					elseif($this->CorporationLoadData($this->InstanceInfraToolsCorporation) == ConfigInfraTools::SUCCESS)
						$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					else $this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
				}
			}
		}
		else 
		{
			$this->Page = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SELECT;
			$_POST[ConfigInfraTools::FORM_CORPORATION_SELECT . "_x"] = "1";
			$_POST[ConfigInfraTools::FORM_CORPORATION_SELECT . "_y"] = "1";
			$_POST[ConfigInfraTools::FORM_CORPORATION_SELECT] = ConfigInfraTools::FORM_CORPORATION_SELECT;
		}
		if(!$PageFormBack != FALSE)
			$this->PageFormSave();
		$this->LoadHtml();
	}
}
?>