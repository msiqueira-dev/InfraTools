<?php
/************************************************************************
Class: PageAdminTypeService.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Classe que trata da administração dos equipes.
Functions: 
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

class PageAdminTypeService extends PageAdmin
{
	public $ArrayInstanceTypeServiceServices = NULL;
	public $InstanceTypeService              = NULL;
	
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
		//FORM_TYPE_SERVICE_LIST
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_SERVICE_LIST) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeServiceSelect', 
									  array(&$this->ArrayInstanceTypeService),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_LIST;
		}
		//FORM_TYPE_SERVICE_REGISTER
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_REGISTER;
		//FORM_TYPE_SERVICE_REGISTER_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_CANCEL) == ConfigInfraTools::SUCCESS)
			$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SELECT;
		//FORM_TYPE_SERVICE_REGISTER_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_SERVICE_REGISTER_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeServiceInsert', 
									  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_NAME]),
									  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SELECT;
			else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_REGISTER;
		}
		//FORM_TYPE_SERVICE_SELECT_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_SERVICE_SELECT_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->ExecuteFunction($_POST, 'TypeServiceSelectByTypeServiceName', 
											  array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_NAME],
													&$this->InstanceTypeService),
											  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
			{
					if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "TypeServiceLoadData", 
												  $this->InstanceTypeService) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;
			}
		}
		//FORM_TYPE_SERVICE_VIEW_DELETE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_SERVICE_VIEW_DELETE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "TypeServiceLoadData", 
										  $this->InstanceTypeService) == ConfigInfraTools::SUCCESS)
			{
				if($this->ExecuteFunction($_POST, 'TypeServiceDeleteByTypeTypeServiceName', 
										  array($this->InstanceTypeService),
										  $this->InputValueHeaderDebug) == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SELECT;
			}
		}
		//FORM_TYPE_SERVICE_VIEW_LIST_SERVICES
		elseif(isset($_POST[ConfigInfraTools::FORM_TYPE_SERVICE_VIEW_LIST_SERVICES]))
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, $this->InstanceTypeService)  
			                                   == ConfigInfraTools::SUCCESS)
			{
				$this->InputLimitOne = 0;
				$this->InputLimitTwo = 25;
				if($this->ServiceSelectByServiceType($this->InputLimitOne, $this->InputLimitTwo, 
													 $this->InstanceTypeService->GetTypeServiceName(),
										             $this->ArrayInstanceTypeServiceServices, $rowCount, 
													 $this->InputValueHeaderDebug) 
				                                        == ConfigInfraTools::SUCCESS)
					$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW_LIST_SERVICES;
				else
				{
					if($this->TypeServiceLoadData($this->InstanceTypeService) == ConfigInfraTools::SUCCESS)
						$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;
					else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SELECT;
				}
			} else $this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_SELECT;
		}
		//FORM_TYPE_SERVICE_VIEW_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_SERVICE_VIEW_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "TypeServiceLoadData", 
										  $this->InstanceTypeService) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_UPDATE;
		}
		//FORM_TYPE_SERVICE_UPDATE_CANCEL
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_SERVICE_UPDATE_CANCEL) == ConfigInfraTools::SUCCESS)
		{
			if($this->LoadDataFromSession(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, "TypeServiceLoadData", 
										  $this->InstanceTypeService) == ConfigInfraTools::SUCCESS)
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;
		}
		//FORM_TYPE_SERVICE_UPDATE_SUBMIT
		elseif($this->CheckPostContainsKey(ConfigInfraTools::FORM_TYPE_SERVICE_UPDATE_SUBMIT) == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_ADMIN_TYPE_SERVICE, 
														$this->InstanceTypeService) == ConfigInfraTools::SUCCESS)
			{
				$this->ExecuteFunction($_POST, 'TypeServiceUpdateByTypeServiceName', 
									   array($_POST[ConfigInfraTools::FORM_FIELD_TYPE_SERVICE_NAME],
					                         &$this->InstanceTypeService),
									   $this->InputValueHeaderDebug);
				$this->PageBody = ConfigInfraTools::PAGE_ADMIN_TYPE_SERVICE_VIEW;	
			}
		}
		if(!$PageFormBack != FALSE)
			$this->PageStackSessionSave();
		$this->LoadHtml(FALSE);
	}
}
?>