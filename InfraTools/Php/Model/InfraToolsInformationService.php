<?php

/************************************************************************
Class: InfraToolsInformationService
Creation: 09/07/2018
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Classe para armazenamento de dados de um tipo de serviço.
Get / Set: 
			public function GetInformationServiceId();
			public function GetInformationServiceDescription();
			public function GetInformationServiceValue();
			public function GetInformationServiceService();
			public function GetInformationServiceServiceId();
			public function GetInformationServiceServiceName();
			public function GetRegisterDate();
			public function SetInformationServiceDescription(InformationServiceDescription);
			public function SetInformationServiceValue(InformationServiceValue);
Methods:
			public function UpdateInformationService($InformationServiceDescription, $InformationServiceValue);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsInformationService
{
	/* Properties */
	protected $InfraToolsFactory             = NULL;
	protected $InformationServiceDescription = NULL;
	protected $InformationServiceId          = NULL;
	protected $InformationServiceValue       = NULL;
	protected $InfraToolsService             = NULL;
	protected $RegisterDate                  = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $InformationServiceDescription, $InformationServiceId, 
								$InformationServiceValue, $Service) 
	{
		$this->InfraToolsFactory = InfraToolsFactory::__create();		
		if($RegisterDate != NULL)
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(ConfigInfraTools::EXCEPTION_REGISTER_DATE);
		if($InformationServiceDescription != NULL)
			$this->InformationServiceDescription    = $InformationServiceDescription;
		else throw new Exception(Config::EXCEPTION_INFORMATION_SERVICE_DESCRIPTION);
		if($InformationServiceId != NULL)
			$this->InformationServiceId    = $InformationServiceId;
		else throw new Exception(Config::EXCEPTION_INFORMATION_SERVICE_ID);
		if($InformationServiceValue != NULL)
			$this->InformationServiceVaalue    = $InformationServiceValue;
		else throw new Exception(Config::EXCEPTION_INFORMATION_SERVICE_VALUE);
		if($Service != NULL)
			$this->InfraToolsService    = $InfraToolsService;
		else throw new Exception(Config::EXCEPTION_INFORMATION_SERVICE_SERVICE);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetInformationServiceId()
	{
		return $this->InformationServiceId;
	}
	
	public function GetInformationServiceDescription()
	{
		return $this->InformationServiceDescription;	
	}
	
	public function GetInformationServiceValue()
	{
		return $this->InformationServiceValue;
	}
	
	public function GetInformationServiceService()
	{
		return $this->InfraToolsService;
	}
	
	public function GetInformationServiceServiceId()
	{
		if($this->InfraToolsService != NULL)
			return $this->InfraToolsService->GetServiceId();
	}
	
	public function GetInformationServiceServiceName()
	{
		if($this->InfraToolsService != NULL)
			return $this->InfraToolsService->GetServiceName();
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate();
	}
	
	/* SET */
	public function SetInformationServiceDescription($InformationServiceDescription)
	{
		$this->InformationServiceDescription = $InformationServiceDescription;	
	}
	
	public function SetInformationServiceValue($InformationServiceValue)
	{
		$this->InformationServiceValue = $InformationServiceValue;
	}
	
	/* METHODS */
	public function UpdateServiceInformation($InformationServiceDescription, $InformationServiceValue)
	{
		if ($InformationServiceDescription != NULL)
			$this->InformationServiceDescription = $InformationServiceDescription;
		if($InformationServiceValue != NULL)
			$this->InformationServiceValue = $InformationServiceValue;
	}	
}
?>