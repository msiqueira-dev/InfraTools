<?php

/************************************************************************
Class: InfraToolsService
Creation: 22/05/2018
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Class that deals with services.
Get / Set: 
			public function GetRegisterDate();
			public function GetServiceActive();
			public function GetServiceActiveIcon();
			public function GetServiceCorporation();
			public function GetServiceCorporationIcon()
			public function GetServiceCorporationName();
			public function GetServiceDepartment();
			public function GetServiceDepartmentIcon()
			public function GetServiceDepartmentInitials()
			public function GetServiceDepartmentName();
			public function GetServiceDescription();
			public function GetServiceId();
			public function GetServiceName();
			public function GetServiceType();
			public function GetServiceTypeName();
			public function GetServiceTypeRegisterDate();
			public function GetServiceTypeSLA();
			public function SetServiceActive($ServiceActive);
			public function SetServiceDescription($ServiceDescription);
			public function SetServiceId($ServiceId);
			public function SetServiceName($ServiceName);
			public function SetServiceType($InfraToolsTypeService);
Methods:
			public function UpdateService($ServiceActive, $ServiceDescription, $ServiceId, $ServiceName, $InfraToolsTypeService);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsService
{
	/* Properties */
	protected $InfraToolsFactory           = NULL;
	protected $RegisterDate                = NULL;
	protected $ServiceActive               = NULL;
	protected $ServiceCorporation          = NULL;
	protected $ServiceCorporationCanChange = NULL;
	protected $ServiceDepartment           = NULL;
	protected $ServiceDeparmentCanChange   = NULL;
	protected $ServiceDescription          = NULL;
	protected $ServiceId                   = NULL;
	protected $ServiceName                 = NULL;
	protected $InfraToolsTypeService       = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
								$ServiceDepartment, $ServiceDepartmentCanChange, 
								$ServiceDescription, $ServiceId, $ServiceName, $InfraToolsTypeServiceInstance) 
	{
		$this->InfraToolsFactory  = InfraToolsFactory::__create();
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(ConfigInfraTools::EXCEPTION_REGISTER_DATE);
		if(isset($ServiceActive))
			$this->ServiceActive = $ServiceActive;
		else throw new Exception(ConfigInfraTools::EXCEPTION_SERVICE_ACTIVE);
		$this->ServiceCorporation = $ServiceCorporation;
		if(isset($ServiceCorporationCanChange))
			$this->ServiceCorporationCanChange = $ServiceCorporationCanChange;
		else throw new Exception(ConfigInfraTools::EXCEPTION_SERVICE_CORPORATION_CAN_CHANGE);
		$this->ServiceDepartment = $ServiceDepartment;
		if(isset($ServiceDepartmentCanChange))
			$this->ServiceDepartmentCanChange = $ServiceDepartmentCanChange;
		else throw new Exception(ConfigInfraTools::EXCEPTION_SERVICE_DEPARTMENT_CAN_CHANGE);
		if(!is_null($ServiceDescription))
			$this->ServiceDescription = $ServiceDescription;
		else throw new Exception(ConfigInfraTools::EXCEPTION_SERVICE_DESCRIPTION);
		if(!is_null($ServiceId))
			$this->ServiceId = $ServiceId;
		else throw new Exception(ConfigInfraTools::EXCEPTION_SERVICE_ID);
		if(!is_null($ServiceName))
			$this->ServiceName = $ServiceName;
		else throw new Exception(ConfigInfraTools::EXCEPTION_SERVICE_NAME);
		if(!is_null($InfraToolsTypeServiceInstance))
		{
			if(is_object($InfraToolsTypeServiceInstance))
				$this->InfraToolsTypeService = $InfraToolsTypeServiceInstance;
			else throw new Exception(ConfigInfraTools::EXCEPTION_SERVICE_TYPE);
		}
		else throw new Exception(ConfigInfraTools::EXCEPTION_SERVICE_TYPE);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	public function GetServiceActive()
	{
		return $this->ServiceActive;
	}
	
	public function GetServiceActiveIcon()
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		if($this->ServiceActive == FALSE)
			return $ConfigInfraTools->DefaultServerImage . 'Icons/IconInfraToolsNotVerified.png';
		else return $ConfigInfraTools->DefaultServerImage . 'Icons/IconInfraToolsVerified.png';
	}
	
	public function GetServiceCorporation()
	{
		return $this->ServiceCorporation;
	}
	
	public function GetServiceCorporationIcon()
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		if($this->ServiceCorporation == NULL)
			return $ConfigInfraTools->DefaultServerImage . 'Icons/IconInfraToolsNotVerified.png';
		else return $ConfigInfraTools->DefaultServerImage . 'Icons/IconInfraToolsVerified.png';
	}
	
	public function GetServiceCorporationName()
	{
		if(!is_null($this->ServiceCorporation))
		{
			if(is_object($this->ServiceCorporation))
				return $this->ServiceCorporation->GetCorporationName();
			else return $this->ServiceCorporation;
		}
		else return NULL;
	}
	
	public function GetServiceDepartment()
	{
		return $this->ServiceDepartment;
	}
	
	public function GetServiceDepartmentIcon()
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		if($this->ServiceDepartment == NULL)
			return $ConfigInfraTools->DefaultServerImage . 'Icons/IconInfraToolsNotVerified.png';
		else return $ConfigInfraTools->DefaultServerImage . 'Icons/IconInfraToolsVerified.png';
	}
	
	public function GetServiceDepartmentInitials()
	{
		if(!is_null($this->ServiceDepartment))
		{
			if(is_object($this->ServiceDepartment))
				return $this->ServiceDepartment->GetDepartmentInitials();
			else return NULL;
		}
		else return NULL;
	}
	
	public function GetServiceDepartmentName()
	{
		if(!is_null($this->ServiceDepartment))
		{
			if(is_object($this->ServiceDepartment))
				return $this->ServiceDepartment->GetDepartmentName();
			else return $this->ServiceDepartment;
		}
		else return NULL;
	}
	
	public function GetServiceDescription()
	{
		return $this->ServiceDescription;
	}
	
	public function GetServiceId()
	{
		return $this->ServiceId;
	}
	
	public function GetServiceName()
	{
		return $this->ServiceName;
	}
	
	public function GetServiceType()
	{
		return $this->InfraToolsTypeService;	
	}
	
	public function GetServiceTypeName()
	{
		if(!is_null($this->InfraToolsTypeService))
		{
			if(is_object($this->InfraToolsTypeService))
				return $this->InfraToolsTypeService->GetTypeServiceName();
			else return $this->InfraToolsTypeService;
		}
		else return NULL;
	}
	
	public function GetServiceTypeRegisterDate()
	{
		return $this->InfraToolsTypeService->GetTypeRegisterDate();
	}
	
	public function GetServiceTypeSLA()
	{
		return $this->InfraToolsTypeService->GetTypeServiceSLA();
	}
	
	/* SET */
	public function SetServiceActive($ServiceActive)
	{
		if(!is_null($ServiceActive))
			$this->ServiceActive = $ServiceActive;
	}
	
	public function SetServiceDescription($ServiceDescription)
	{
		if(!is_null($ServiceDescription))
			$this->ServiceDescription = $ServiceDescription;	
	}
	
	public function SetServiceName($ServiceName)
	{
		if(!is_null($ServiceName))
			$this->ServiceName = $ServiceName;
	}
	
	public function SetServiceType($InfraToolsTypeServiceInstance)
	{
		if(!is_null($InfraToolsTypeServiceInstance))
		{
			if(is_object($InfraToolsTypeServiceInstance))
				$this->InfraToolsTypeService = $InfraToolsTypeServiceInstance;
		}
	}
	
	/* METHODS */
	public function UpdateService($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange, 
								  $ServiceDepartment, $ServiceDepartmentCanChange, $ServiceDescription,
								  $ServiceId, $ServiceName, $InfraToolsTypeServiceInstance)
	{
		if(!is_null($ServiceActive))
			$this->ServiceActive = $ServiceActive;
		$this->ServiceCorporation = $ServiceCorporation;
		if(!is_null($ServiceCorporationCanChange))
			$this->ServiceCorporationCanChange = $ServiceCorporationChange;
		if(!is_null($ServiceDepartmentCanChange))
			$this->ServiceDepartmentCanChange = $ServiceDepartmentCanChange;
		$this->ServiceDepartment = $ServiceDepartment;
		if(!is_null($ServiceDescription))
			$this->ServiceDescription = $ServiceDescription;
		if(!is_null($ServiceName))
			$this->ServiceName = $ServiceName;
		if(!is_null($InfraToolsTypeServiceInstance))
		{
			if(is_object($InfraToolsTypeServiceInstance))
			$this->InfraToolsTypeService = $InfraToolsTypeServiceInstance;
		}
	}
}
?>