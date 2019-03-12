<?php

/************************************************************************
Class: InfraToolsNetwork
Creation: 2019/01/28
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Class for Network
Get / Set: 
			public function GetNetworkIp();
			public function GetNetworkName();
			public function GetNetworkNetmask();
			public function GetRegisterDate();
			public function SetNetworkIp($NetworkIp);
			public function SetNetworkName($NetworkName);
			public function SetNetworkNetmask($NetworkNetmask);
Methods:
			public function UpdateNetwork($NetworkIp, $NetworkName, $NetworkNetmask);
**************************************************************************/

class InfraToolsNetwork
{
	/* Properties */
	protected $NetworkIp      = NULL;
	protected $NetworkName    = NULL;
	protected $NetworkNetmask = NULL;
	protected $RegisterDate   = NULL;

	/* Constructor */
	public function __construct($NetworkIp, $NetworkName, $NetworkNetmask, $RegisterDate) 
	{
		if(!is_null($NetworkIp))
			$this->NetworkIp = $NetworkIp;
		else throw new Exception(ConfigInfraTools::EXCEPTION_NETWORK_IP);
		if(!is_null($NetworkName))
			$this->NetworkName = $NetworkName;
		else throw new Exception(ConfigInfraTools::EXCEPTION_NETWORK_NAME);
		if(!is_null($NetworkNetmask))
			$this->NetworkNetmask = $NetworkNetmask;
		else throw new Exception(ConfigInfraTools::EXCEPTION_NETWORK_NETMASK);
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
	public function GetNetworkIp()
	{
		return $this->NetworkIp;	
	}
	
	public function GetNetworkName()
	{
		return $this->NetworkName;
	}
	
	public function GetNetworkNetmask()
	{
		return $this->NetworkNetmask;	
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetNetworkIp($NetworkIp)
	{
		if(!is_null($NetworkIp))
			$this->NetworkIp = $NetworkIp;
	}
	
	public function SetNetworkName($NetworkName)
	{
		if(!is_null($NetworkName))
			$this->NetworkName = $NetworkName;
	}
    
	public function SetNetworkNetmask($NetworkNetmask)
	{
		if(!is_null($NetworkNetmask))
			$this->NetworkNetmask = $NetworkNetmask;
	}
	
	/* METHODS */
	public function UpdateNetwork($NetworkIp, $NetworkName, $NetworkNetmask)
	{
		if(!is_null($NetworkIp))
			$this->NetworkIp = $NetworkIp;
		if(!is_null($NetworkName))
			$this->NetworkName = $NetworkName;
		if(!is_null($NetworkNetmask))
			$this->NetworkNetmask = $NetworkNetmask;
	}
}
?>