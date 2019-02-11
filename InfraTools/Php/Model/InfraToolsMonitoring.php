<?php

/************************************************************************
Class: InfraToolsMonitoring
Creation: 2018/06/26
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Class for Monitoring
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

class InfraToolsMonitoring
{
	/* Properties */
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
		if(!is_null($InfraToolsService))
			$InfraToolsService = $InfraToolsServiceInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_SERVICE);
		if(!is_null($InfraToolsStatusMonitoringInstance))
			$InfraToolsStatusMonitoring = $InfraToolsStatusMonitoringInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_STATUS);
		if(!is_null($InfraToolsTypeMonitoringInstance))
			$InfraToolsTypeMonitoring = $InfraToolsTypeMonitoringInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_TYPE);
		if(!is_null($InfraToolsTypeTimeMonitoringInstance))
			$InfraToolsTypeTimeMonitoring = $InfraToolsTypeTimeMonitoringInstance;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_TIME);
		if(!is_null($MonitoringDescription))
			$MonitoringDescription = $MonitoringDescription;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_DESCRIPTION);
		if(!is_null($MonitoringId))
			$MonitoringId = $MonitoringId;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_ID);
		if(!is_null($MonitoringName))
			$MonitoringName = $MonitoringName;
		else throw new Exception(ConfigInfraTools::EXCEPTION_MONITORING_NAME);
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
		if(!is_null($InfraToolsServiceInstance))
			$this->InfraToolsService = $InfraToolsServiceInstance;
		if(!is_null($InfraToolsStatusMonitoringInstance))
			$this->InfraToolsTypeMonitoring = $InfraToolsStatusMonitoringInstance;
		if(!is_null($InfraToolsTypeMonitoringInstance))
			$this->InfraToolsTypeMonitoring = $InfraToolsTypeMonitoringInstance;
		if(!is_null($InfraToolsTypeTimeMonitoringInstance))
			$this->InfraToolsTypeTimeMonitoring = $InfraToolsTypeTimeMonitoringInstance;
		if(!is_null($MonitoringDescription))
			$this->MonitoringDescription = $MonitoringDescription;
		if(!is_null($MonitoringName))
			$this->MonitoringName = $MonitoringName;
	}
}
?>