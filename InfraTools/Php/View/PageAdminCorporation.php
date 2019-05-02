<?php
/************************************************************************
Class: PageAdminCorporation.php
Creation: 2016/30/09
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/AdminInfraTools.php
Description: 
			Class for corporation management.
Functions: 
			protected function BuildSmartyTags();
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
	protected $ArrayInstanceInfraToolsUser = NULL;
	protected $InstanceCorporation         = NULL;
	protected $InstanceTypeUser            = NULL;

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

	protected function BuildSmartyTags()
	{
		parent::BuildSmartyTags();
		$this->Smarty->assign('FIELD_CORPORATION_ACTIVE_TEXT', $this->InstanceLanguageText->GetText('FIELD_CORPORATION_ACTIVE'));
		$this->Smarty->assign('FM_CORPORATION', ConfigInfraTools::FM_CORPORATION);
		$this->Smarty->assign('FM_CORPORATION_SEL', ConfigInfraTools::FM_CORPORATION_SEL);
		$this->Smarty->assign('FM_CORPORATION_SEL_FORM', ConfigInfraTools::FM_CORPORATION_SEL_FORM);
		$this->Smarty->assign('FM_CORPORATION_SEL_SB', ConfigInfraTools::FM_CORPORATION_SEL_SB);
		$this->Smarty->assign('FM_CORPORATION_REGISTER', ConfigInfraTools::FM_CORPORATION_REGISTER);
		$this->Smarty->assign('FM_CORPORATION_LST', ConfigInfraTools::FM_CORPORATION_LST);
		$this->Smarty->assign('FM_CORPORATION_LST_BACK', ConfigInfraTools::FM_CORPORATION_LST_BACK);
		$this->Smarty->assign('FM_CORPORATION_LST_BACK', ConfigInfraTools::FM_CORPORATION_LST_FORWARD);
		$this->Smarty->assign('FM_CORPORATION_LST_FORM', ConfigInfraTools::FM_CORPORATION_LST_FORM);
		$this->Smarty->assign("ARRAY_INSTANCE_INFRATOOLS_CORPORATION", array($this->ArrayInstanceInfraToolsCorporation));
		if(isset($this->ReturnCorporationNameClass)) 
			$this->Smarty->assign('RETURN_CORPORATION_NAME_CLASS', $this->ReturnCorporationNameClass);
		else $this->Smarty->assign('RETURN_CORPORATION_NAME_CLASS', NULL);
		if(isset($this->ReturnCorporationNameText)) 
			$this->Smarty->assign('RETURN_CORPORATION_NAME_TEXT', $this->ReturnCorporationNameText);
		else $this->Smarty->assign('RETURN_CORPORATION_NAME_TEXT', NULL);
	}

	public function LoadPage()
	{
		$PageFormBack = FALSE;
		$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL;
		$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                           str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL)) . ".php";
		$this->AdminGoBack($PageFormBack);
		
		//FM_CORPORATION_LST
		if($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_LST) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsCorporationSelect', 
									  array(&$this->ArrayInstanceInfraToolsCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_LST;
				$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                                   str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_LST)) . ".php";
			}
		}
		//FM_CORPORATION_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_REGISTER) == ConfigInfraTools::RET_OK)
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
			$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                                str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER)) . ".php";
		}
		//FM_CORPORATION_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_REGISTER_CANCEL) == ConfigInfraTools::RET_OK)
		{
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL;
			$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL)) . ".php";
		}
		//FM_CORPORATION_REGISTER_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_REGISTER_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationInsert', 
									  array(@$_POST[ConfigInfraTools::FIELD_CORPORATION_ACTIVE],
				                            $_POST[ConfigInfraTools::FIELD_CORPORATION_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL;
				$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                                   str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL)) . ".php";
			}
			else 
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER;
				$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_REGISTER)) . ".php";
			}
		}
		//FM_CORPORATION_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'CorporationSelectByName', 
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME],
											&$this->InstanceCorporation),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW)) . ".php";
			}
		}
		//FM_CORPORATION_VIEW_DEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_VIEW_DEL_SB) == ConfigInfraTools::RET_OK)
		{				
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceCorporation)
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'CorporationDelete', 
									      array($this->InstanceCorporation->GetCorporationName()),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL;
					$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_SEL)) . ".php";
				}
				elseif($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_CORPORATION, "CorporationLoadData", 
												  $this->InstanceCorporation) == ConfigInfraTools::RET_OK)
				{
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW)) . ".php";
				}
			} 
		}
		//FM_CORPORATION_VIEW_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_VIEW_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_CORPORATION, "CorporationLoadData", 
										  $this->InstanceCorporation) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDT;
				$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDT)) . ".php";
			}
		}
		//FM_CORPORATION_UPDT_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_UPDT_CANCEL) == ConfigInfraTools::RET_OK)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_CORPORATION, "CorporationLoadData", 
										  $this->InstanceCorporation) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
				$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW)) . ".php";
			}
		}
		//FM_CORPORATION_UPDT_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_UPDT_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceCorporation) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'CorporationUpdateByName', 
										  array(@$_POST[ConfigInfraTools::FIELD_CORPORATION_ACTIVE],
					                            $_POST[ConfigInfraTools::FIELD_CORPORATION_NAME], 
										        &$this->InstanceCorporation),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW;
					$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
									str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW)) . ".php";
				}
				else 
				{
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDT;
					$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_UPDT)) . ".php";
				}
			}
		}
		//FM_CORPORATION_VIEW_LST_USERS_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_CORPORATION_VIEW_LST_USERS_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_CORPORATION, $this->InstanceCorporation) 
			                                   == ConfigInfraTools::RET_OK)
			{
				if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByCorporationName', 
										  array($this->InstanceCorporation->GetCorporationName(), 
										        &$this->ArrayInstanceInfraToolsUser),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
				{
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS;
					$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_CORPORATION_VIEW_USERS)) . ".php";
				}
			}
		}
		//FM_DEPARTMENT_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_DEPARTMENT_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'DepartmentSelectByDepartmentNameAndCorporationName',
									  array($_POST[ConfigInfraTools::FIELD_CORPORATION_NAME], 
											$_POST[ConfigInfraTools::FIELD_DEPARTMENT_NAME],
										    &$this->InstanceInfraToolsDepartment),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW;
				$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_DEPARTMENT_VIEW)) . ".php";
			}
		}
		//FM_TYPE_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_TYPE_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'TypeUserSelectByTypeUserDescription', 
									  array($_POST[ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION],
									        &$this->InstanceTypeUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW;
				$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_TYPE_USER_VIEW)) . ".php";
			}
		}
		//FM_USER_SEL_SB
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_USER_SEL_SB) == ConfigInfraTools::RET_OK)
		{
			if($this->ExecuteFunction($_POST, 'InfraToolsUserSelectByUserEmail', 
									  array($_POST[ConfigInfraTools::FIELD_USER_EMAIL],
									        &$this->InstanceUser),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::RET_OK)
			{
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_USER_VIEW;
				$this->ArrayPageBodyForm = REL_PATH . ConfigInfraTools::PATH_FORM.str_replace("PageAdmin", "",
		                               str_replace("_", "", ConfigInfraTools::PAGE_ADMIN_USER_VIEW)) . ".php";
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->BuildSmartyTags();
		$this->LoadHtmlSmarty(FALSE, $this->InputValueHeaderDebug, $this->ArrayPageBodyForm);
	}
}
?>