<?php

/************************************************************************
Class: InfraToolsTypeAssocUserService
Creation: 25/06/2018
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Classe para armazenamento de dados de um tipo de associação entre usuário e serviço.
Get / Set: 
			GetRegisterDate();
			GetTypeAssocUserServiceDescription();
			GetTypeAssocUserServiceId();
			SetTypeAssocUserDescription();
Methods:
			public function UpdateTypeAssocUserService($TypeAssocUserServiceDescription, $TypeAssocUserServiceId);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsTypeAssocUserService
{
	/* Properties */
	protected $InfraToolsFactory                  = NULL;
	protected $RegisterDate                       = NULL;
	protected $TypeAssocUserServiceDescription    = NULL;
	protected $TypeAssocUserServiceId             = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TypeAssocUserServiceDescription, $TypeAssocUserServiceId) 
	{
		$this->InfraToolsFactory = InfraToolsFactory::__create();
		
		if($RegisterDate != NULL)
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(ConfigInfraTools::EXCEPTION_REGISTER_DATE);
		if($TypeAssocUserServiceDescription != NULL)
			$this->TypeAssocUserServiceDescription = $TypeAssocUserServiceDescription;
		else throw new Exception(ConfigInfraTools::EXCEPTION_TYPE_ASSOC_USER_SERVICE_DESCRIPTION);
		if($TypeAssocUserServiceId != NULL)
			$this->TypeAssocUserServiceId = $TypeAssocUserServiceId;
		else throw new Exception(ConfigInfraTools::EXCEPTION_TYPE_ASSOC_USER_SERVICE_ID);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetRegisterDate()
	{
		return $this->RegisterDate();
	}
	
	public function GetTypeAssocUserServiceDescription()
	{
		return $this->TypeAssocUserServiceDescription;
	}
	public function GetTypeAssocUserServiceId()
	{
		return $this->TypeAssocUserServiceId;
	}
	
	/* SET */
	public function SetTypeAssocUserDescription($TypeAssocUserDescription)
	{
		$this->TypeAssocUserServiceDescription = $TypeAssocUserDescription;
	}
	
	/* METHODS */
	public function UpdateTypeAssocUserService($TypeAssocUserServiceDescription, $TypeAssocUserServiceId)
	{
		if($TypeAssocUserServiceDescription != NULL)
			$this->TypeAssocUserServiceDescription = $TypeAssocUserServiceDescription;
		if($TypeAssocUserServiceId != NULL)
			$this->TypeAssocUserServiceId = $TypeAssocUserServiceId;
	}
}
?>