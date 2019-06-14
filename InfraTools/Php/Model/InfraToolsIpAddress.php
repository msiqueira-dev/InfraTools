<?php

/************************************************************************
Class: InfraToolsIpAddress
Creation: 2019/01/23
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Class for ip address.
Get / Set: 
			public function GetIpAddressDescription();
			public function GetIpAddressInstanceInfraToolsNetwork();
			public function GetIpAddressInstanceInfraToolsNetworkNetworkIp();
			public function GetIpAddressInstanceInfraToolsNetworkNetworkName();
			public function GetIpAddressInstanceInfraToolsNetworkNetworkNetmask();
			public function GetIpAddressIpv4();
			public function GetIpAddressIpv6();
			public function GetRegisterDate();
			public function SetIpAddressDescription($IpAddressDescription);
			public function SetIpAddressInstanceInfraToolsNetwork($InstanceInfraToolsNetwork);
			public function SetIpAddressIpv4($IpAddressIpv4);
			public function SetIpAddressIpv6($IpAddressIpv6);
Methods:
			public function UpdateInfraToolsIpAddress($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $InstanceInfraToolsNetwork);
**************************************************************************/

class InfraToolsIpAddress
{
	/* Properties */
	protected $IpAddressDescription      = NULL;
	protected $IpAddressIpv4             = NULL;
	protected $IpAddressIpv6             = NULL;
	protected $InstanceInfraToolsNetwork = NULL;
	protected $RegisterDate              = NULL;

	/* Constructor */
	public function __construct($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $InstanceInfraToolsNetwork, $RegisterDate) 
	{
		if(!is_null($IpAddressDescription))
			$this->IpAddressDescription = $IpAddressDescription;
		if(!is_null($IpAddressIpv4))
			$this->IpAddressIpv4 = $IpAddressIpv4;
		else throw new Exception(ConfigInfraTools::EXCEPTION_IP_ADDRESS_IPV4);
		if(!is_null($IpAddressIpv6))
			$this->IpAddressIpv6 = $IpAddressIpv6;
		if(!is_null($InstanceInfraToolsNetwork))
			$this->InstanceInfraToolsNetwork = $InstanceInfraToolsNetwork;	
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
	public function GetIpAddressDescription()
	{
		return $this->IpAddressDescription;
	}
	
	public function GetIpAddressInstanceInfraToolsNetwork()
	{
		return $this->InstanceInfraToolsNetwork;
	}
	
	public function GetIpAddressInstanceInfraToolsNetworkNetworkIp()
	{
		if(!is_null($this->InstanceInfraToolsNetwork))
		{
			if(is_object($this->InstanceInfraToolsNetwork))
				return $this->InstanceInfraToolsNetwork->GetNetworkIp();
		}
		else return NULL;
	}
	
	public function GetIpAddressInstanceInfraToolsNetworkNetworkName()
	{
		if(!is_null($this->InstanceInfraToolsNetwork))
		{
			if(is_object($this->InstanceInfraToolsNetwork))
				return $this->InstanceInfraToolsNetwork->InstanceInfraToolsNetwork();
			else return $this->InstanceInfraToolsNetwork;
		}
		else return NULL;
	}
	
	public function GetIpAddressInstanceInfraToolsNetworkNetworkNetmask()
	{
		if(!is_null($this->InstanceInfraToolsNetwork))
		{
			if(is_object($this->InstanceInfraToolsNetwork))
				return $this->InstanceInfraToolsNetwork->GetNetworkNetmask();
		}
		else return NULL;
	}
	
	public function GetIpAddressIpv4()
	{
		return $this->IpAddressIpv4;
	}
	
	public function GetIpAddressIpv6()
	{
		return $this->IpAddressIpv6;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetIpAddressDescription($IpAddressDescription)
	{
		if(!is_null($IpAddressDescription))
			$this->IpAddressDescription = $IpAddressDescription;
	}
	
	public function SetIpAddressInstanceInfraToolsNetwork($InstanceInfraToolsNetwork)
	{
		if(!is_null($InstanceInfraToolsNetwork))
			$this->InstanceInfraToolsNetwork = $InstanceInfraToolsNetwork;
	}
	
	public function SetIpAddressIpv4($IpAddressIpv4)
	{
		if(!is_null($IpAddressIpv4))
			$this->IpAddressIpv4 = $IpAddressIpv4;
	}
    
	public function SetIpAddressIpv6($IpAddressIpv6)
	{
		if(!is_null($IpAddressIpv6))
			$this->IpAddressIpv6 = $IpAddressIpv6;
	}
	
	/* METHODS */
	public function UpdateInfraToolsIpAddress($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $InstanceInfraToolsNetwork)
	{
		if(!is_null($IpAddressDescription))
			$this->IpAddressDescription = $IpAddressDescription;
		if(!is_null($IpAddressIpv4))
			$this->IpAddressIpv4 = $IpAddressIpv4;
		if(!is_null($IpAddressIpv6))
			$this->IpAddressIpv6 = $IpAddressIpv6;
		if(!is_null($InstanceInfraToolsNetwork))
			$this->InstanceInfraToolsNetwork = $InstanceInfraToolsNetwork;
	}
}
?>