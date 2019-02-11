<?php

/************************************************************************
Class: InfraToolsAssocUserService
Creation: 2018/06/26
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Class for the association between InfraTools Service and InfraTools User.
Get / Set: 
			public function GetInfraToolsService();
			public function GetInfraToolsServiceId();
			public function GetInfraToolsServiceName();
			public function GetInfraToolsTypeAssocUserService();
			public function GetInfraToolsTypeAssocUserServiceDescription();
			public function GetInfraToolsTypeAssocUserServiceId();
			public function GetInfraToolsUser();
			public function GetInfraToolsUserEmail();
			public function GetRegisterDate();
			public function SetInfraToolsService($InfraToolsServiceInstance);
			public function SetInfraToolsTypeAssocUserService($InfraToolsTypeAssocUserServiceInstance);
			public function SetInfraToolsUser($InfraToolsUserInstance);
Methods:
			public function UpdateAssocUserService($InfraToolsServiceInstance, $InfraToolsTypeAssocUserServiceInstance, 
								                   $InfraToolsUserInstance);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsAssocUserService
{
	/* Properties */
	protected $InfraToolsFactory               = NULL;
	protected $InfraToolsService               = NULL;
	protected $InfraToolsTypeAssocUserService  = NULL;
	protected $InfraToolsUser                  = NULL;
	protected $RegisterDate                    = NULL;

	/* Constructor */
	public function __construct($InfraToolsServiceInstance, $InfraToolsTypeAssocUserServiceInstance, 
								$InfraToolsUserInstance, $RegisterDate) 
	{
		$this->InfraToolsFactory = InfraToolsFactory::__create();
		if(!is_null($InfraToolsServiceInstance))
			$this->InfraToolsService = $InfraToolsServiceInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_ASSOC_USER_SERVICE_SERVICE);
		if(!is_null($InfraToolsTypeAssocUserServiceInstance))
			$this->InfraToolsTypeAssocUserService = $InfraToolsTypeAssocUserServiceInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_ASSOC_USER_SERVICE_TYPE);
		if(!is_null($InfraToolsUserInstance))
			$this->InfraToolsUser = $InfraToolsUserInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_ASSOC_USER_SERVICE_USER);
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(ConfigInfraTools::EXCEPTION_REGISTER_DATE);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetInfraToolsService()
	{
		return $this->InfraToolsService;	
	}
	
	public function GetInfraToolsServiceId()
	{
		if(!is_null($this->InfraToolsService))
		{
			if(is_object($this->InfraToolsService))
				return $this->InfraToolsService->GetServiceId();
			else return $this->InfraToolsService;
		}
		else return NULL;
	}
	
	public function GetInfraToolsServiceName()
	{
		if(!is_null($this->InfraToolsService))
		{
			if(is_object($this->InfraToolsService))
				return $this->InfraToolsService->GetServiceName();
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetInfraToolsTypeAssocUserService()
	{
		return $this->InfraToolsTypeAssocUserService;
	}
	
	public function GetInfraToolsTypeAssocUserServiceDescription()
	{
		if(!is_null($this->InfraToolsTypeAssocUserService))
		{
			if(is_object($this->InfraToolsTypeAssocUserService))
				return $this->InfraToolsTypeAssocUserService->GetTypeAssocUserServiceDescription();
			else return $this->InfraToolsTypeAssocUserService;
		}
		else return NULL;
	}
	
	public function GetInfraToolsTypeAssocUserServiceId()
	{
		if(!is_null($this->InfraToolsTypeAssocUserService))
		{
			if(is_object($this->InfraToolsTypeAssocUserService))
				return $this->InfraToolsTypeAssocUserService->GetTypeAssocUserServiceId();
			else return $this->InfraToolsTypeAssocUserService;
		}
		else return NULL;
	}

	public function GetInfraToolsUser()
	{
		return $this->InfraToolsUser;
	}
	
	public function GetInfraToolsUserEmail()
	{
		if(!is_null($this->InfraToolsUser))
		{
			if(is_object($this->InfraToolsUser))
				return $this->InfraToolsUser->GetEmail();
			else return $this->InfraToolsUser;
		}
		else return NULL;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}

	/* SET */
	public function SetInfraToolsService($InfraToolsServiceInstance)
	{
		$this->InfraToolsService = $InfraToolsServiceInstance;
	}
	
	public function SetInfraToolsTypeAssocUserService($InfraToolsTypeAssocUserServiceInstance)
	{
		$this->InfraToolsTypeAssocUserService = $InfraToolsTypeAssocUserServiceInstance;
	}
	
	public function SetInfraToolsUser($InfraToolsUserInstance)
	{
		$this->InfraToolsUser = $InfraToolsUserInstance;	
	}
	
	/* METHODS */
	public function UpdateAssocUserService($InfraToolsServiceInstance, $InfraToolsTypeAssocUserServiceInstance, 
								           $InfraToolsUserInstance)
	{
		if(!is_null($InfraToolsServiceInstance))
			$this->InfraToolsService = $InfraToolsServiceInstance;
		if(!is_null($InfraToolsTypeAssocUserServiceInstance))
			$this->InfraToolsTypeAssocUserService = $InfraToolsTypeAssocUserServiceInstance;
		if(!is_null($InfraToolsUserInstance))
			$this->InfraToolsUser = $InfraToolsUserInstance;
	}
}
?>