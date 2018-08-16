<?php

/************************************************************************
Class: InfraToolsMonitoring
Creation: 26/06/2018
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Classe para armazenamento de dados de um serviço.
Get / Set: 
			public function GetInfraToolsService();
			public function GetInfraToolsStatusMonitoring();
			public function GetInfraToolsTypeMonitoring();
			public function GetInfraToolsTypeTimeMonitoring();
			public function GetMonitoringDescription();
			public function GetMonitoringId();
			public function GetMonitoringName();
			public function GetRegisterDate();
			public function SetInfraToolsService($InfraToolsServiceInstance);
			public function SetInfraToolsStatusMonitoring($InfraToolsStatusMonitoringInstance);
			public function SetInfraToolsTypeMonitoring($InfraToolsTypeMonitoringInstance);
			public function SetInfraToolsTypeTimeMonitoring($InfraToolsTypeTimeMonitoringInstance);
			public function SetMonitoringDescription($MonitoringDescription);
			public function SetMonitoringName($MonitoringName);
Methods:
			public function UpdateMonitoring($InfraToolsServiceInstance, $InfraToolsStatusMonitoringInstance,
			                                 $InfraToolsTypeMonitoringInstance, $InfraToolsTypeTimeMonitoringInstance,
											 $MonitoringDescription, $MonitoringName) 
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsMonitoring
{
	/* Properties */
	protected $InfraToolsFactory            = NULL;
	protected $InfraToolsService            = NULL;
	protected $InfraToolsStatusMonitoring   = NULL;
	protected $InfraToolsTypeMonitoring     = NULL;
	protected $InfraToolsTypeTimeMonitoring = NULL;
	protected $MonitoringDescription        = NULL;
	protected $MonitoringId                 = NULL;
	protected $MonitoringName               = NULL;
	protected $RegisterDate                 = NULL;

	/* Constructor */
	public function __construct($InfraToolsServiceInstance, $InfraToolsStatusMonitoringInstance, $InfraToolsTypeMonitoringInstance,
							    $InfraToolsTypeTimeMonitoringInstance, $MonitoringDescription, $MonitoringId, $MonitoringName,
							    $RegisterDate) 
	{
		$this->InfraToolsFactory  = InfraToolsFactory::__create();
		if($InfraToolsService != NULL)
			$InfraToolsService = $InfraToolsServiceInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_SERVICE);
		if($InfraToolsStatusMonitoringInstance != NULL)
			$InfraToolsStatusMonitoring = $InfraToolsStatusMonitoringInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_STATUS);
		if($InfraToolsTypeMonitoringInstance != NULL)
			$InfraToolsTypeMonitoring = $InfraToolsTypeMonitoringInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_TYPE);
		if($InfraToolsTypeTimeMonitoringInstance != NULL)
			$InfraToolsTypeTimeMonitoring = $InfraToolsTypeTimeMonitoringInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_TIME);
		if($MonitoringDescription != NULL)
			$MonitoringDescription = $MonitoringDescription;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_DESCRIPTION);
		if($MonitoringId != NULL)
			$MonitoringId = $MonitoringId;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_ID);
		if($MonitoringName != NULL)
			$MonitoringName = $MonitoringName;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_NAME);
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
	
	public function GetInfraToolsStatusMonitoring()
	{
		return $this->InfraToolsStatusMonitoring;
	}
	
	public function GetInfraToolsTypeMonitoring()
	{
		return $this->InfraToolsTypeMonitoring;
	}
	
	public function GetInfraToolsTypeTimeMonitoring()
	{
		return $this->InfraToolsTypeTimeMonitoring;
	}
	
	public function GetMonitoringDescription()
	{
		return $this->MonitoringDescription;
	}
	
	public function GetMonitoringId()
	{
		return $this->MonitoringId;
	}
	
	public function GetMonitoringName()
	{
		return $this->MonitoringName;
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
	
	public function SetInfraToolsStatusMonitoring($InfraToolsStatusMonitoringInstance)
	{
		$this->InfraToolsStatusMonitoring = $InfraToolsStatusMonitoringInstance;
	}
	
	public function SetInfraToolsTypeMonitoring($InfraToolsTypeMonitoringInstance)
	{
		$this->InfraToolsTypeMonitoring = $InfraToolsTypeMonitoringInstance;
	}
	
	public function SetInfraToolsTypeTimeMonitoring($InfraToolsTypeTimeMonitoringInstance)
	{
		$this->InfraToolsTypeTimeMonitoring = $InfraToolsTypeTimeMonitoringInstance;
	}
	
	public function SetMonitoringDescription($MonitoringDescription)
	{
		$this->MonitoringDescription = $MonitoringDescription;
	}
	
	public function SetMonitoringName($MonitoringName)
	{
		$this->MonitoringName = $MonitoringName;	
	}
	
	/* METHODS */
	public function UpdateMonitoring($InfraToolsServiceInstance, $InfraToolsStatusMonitoringInstance,
			                         $InfraToolsTypeMonitoringInstance, $InfraToolsTypeTimeMonitoringInstance,
									 $MonitoringDescription, $MonitoringName) 
	{
		if($InfraToolsServiceInstance != NULL)
			$this->InfraToolsService = $InfraToolsServiceInstance;
		if($InfraToolsStatusMonitoringInstance != NULL)
			$this->InfraToolsTypeMonitoring = $InfraToolsStatusMonitoringInstance;
		if($InfraToolsTypeMonitoringInstance != NULL)
			$this->InfraToolsTypeMonitoring = $InfraToolsTypeMonitoringInstance;
		if($InfraToolsTypeTimeMonitoringInstance != NULL)
			$this->InfraToolsTypeTimeMonitoring = $InfraToolsTypeTimeMonitoringInstance;
		if($MonitoringDescription != NULL)
			$this->MonitoringDescription = $MonitoringDescription;
		if($MonitoringName != NULL)
			$this->MonitoringName = $MonitoringName;
	}
}
?>