<?php

/************************************************************************
Class: InfraToolsInformationService
Creation: 2018/07/09
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Class for Information Service
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
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(ConfigInfraTools::EXCEPTION_REGISTER_DATE);
		if(!is_null($InformationServiceDescription))
			$this->InformationServiceDescription = $InformationServiceDescription;
		else throw new Exception(ConfigInfraTools::EXCEPTION_INFORMATION_SERVICE_DESCRIPTION);
		if(!is_null($InformationServiceId))
			$this->InformationServiceId = $InformationServiceId;
		else throw new Exception(ConfigInfraTools::EXCEPTION_INFORMATION_SERVICE_ID);
		if(!is_null($InformationServiceValue))
			$this->InformationServiceVaalue    = $InformationServiceValue;
		else throw new Exception(ConfigInfraTools::EXCEPTION_INFORMATION_SERVICE_VALUE);
		if(!is_null($Service))
			$this->InfraToolsService    = $InfraToolsService;
		else throw new Exception(ConfigInfraTools::EXCEPTION_INFORMATION_SERVICE_SERVICE);
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
		if(!is_null($this->InfraToolsService))
			return $this->InfraToolsService->GetServiceId();
	}
	
	public function GetInformationServiceServiceName()
	{
		if(!is_null($this->InfraToolsService))
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
		if (!is_null($InformationServiceDescription))
			$this->InformationServiceDescription = $InformationServiceDescription;
		if(!is_null($InformationServiceValue))
			$this->InformationServiceValue = $InformationServiceValue;
	}	
}
?>