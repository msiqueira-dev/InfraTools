<?php

/************************************************************************
Class: InfraToolsAssocUserService
Creation: 26/06/2018
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Classe para armazenamento de dados de um tipo de associação entre usuário e serviço.
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
		if($InfraToolsServiceInstance != NULL)
			$this->InfraToolsService = $InfraToolsServiceInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_ASSOC_USER_SERVICE_SERVICE);
		if($InfraToolsTypeAssocUserServiceInstance != NULL)
			$this->InfraToolsTypeAssocUserService = $InfraToolsTypeAssocUserServiceInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_ASSOC_USER_SERVICE_TYPE);
		if($InfraToolsUserInstance != NULL)
			$this->InfraToolsUser = $InfraToolsUserInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_ASSOC_USER_SERVICE_USER);
		if($RegisterDate != NULL)
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
		if($this->InfraToolsService != NULL)
		{
			if(is_object($this->InfraToolsService))
				return $this->InfraToolsService->GetServiceId();
			else return $this->InfraToolsService;
		}
		else return NULL;
	}
	
	public function GetInfraToolsServiceName()
	{
		if($this->InfraToolsService != NULL)
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
		if($this->InfraToolsTypeAssocUserService != NULL)
		{
			if(is_object($this->InfraToolsTypeAssocUserService))
				return $this->InfraToolsTypeAssocUserService->GetTypeAssocUserServiceDescription();
			else return $this->InfraToolsTypeAssocUserService;
		}
		else return NULL;
	}
	
	public function GetInfraToolsTypeAssocUserServiceId()
	{
		if($this->InfraToolsTypeAssocUserService != NULL)
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
		if($this->InfraToolsUser != NULL)
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
		if($InfraToolsServiceInstance != NULL)
			$this->InfraToolsService    = $InfraToolsServiceInstance;
		if($InfraToolsTypeAssocUserServiceInstance != NULL)
			$this->InfraToolsTypeAssocUserService = $InfraToolsTypeAssocUserServiceInstance;
		if($InfraToolsUserInstance != NULL)
			$this->InfraToolsUser  = $InfraToolsUserInstance;
	}
}
?>