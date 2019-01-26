<?php

/************************************************************************
Class: InfraToolsIpAddress
Creation: 2019/01/23
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Class that deals with ip address.
Get / Set: 
			public function GetIpAddressDescription();
			public function GetIpAddressIpv4();
			public function GetIpAddressIpv6();
			public function GetIpAddressNetwork();
			public function GetRegisterDate();
			public function SetIpAddressDescription($IpAddressDescription);
			public function SetIpAddressIpv4($IpAddressIpv4);
			public function SetIpAddressIpv6($IpAddressIpv6);
			public function SetIpAddressNetwork($IpAddressNetwork);
Methods:
			public function UpdateInfraToolsIpAddress($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $IpAddressNetwork);
**************************************************************************/

class InfraToolsIpAddress
{
	/* Properties */
	protected $IpAddressDescription = NULL;
	protected $IpAddressIpv4        = NULL;
	protected $IpAddressIpv6        = NULL;
	protected $IpAddressNetwork     = NULL;
	protected $RegisterDate         = NULL;

	/* Constructor */
	public function __construct($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $IpAddressNetmask, $RegisterDate) 
	{
		if(!is_null($IpAddressDescription))
			$this->IpAddressDescription = $IpAddressDescription;
		if(!is_null($IpAddressIpv4))
			$this->IpAddressIpv4 = $IpAddressIpv4;
		else throw new Exception(ConfigInfraTools::EXCEPTION_IP_ADDRESS_IPV4);
		if(!is_null($IpAddressIpv6))
			$this->IpAddressIpv6 = $IpAddressIpv6;
		if(!is_null($IpAddressNetmask))
			$this->IpAddressNetmask = $IpAddressNetmask;	
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
	
	public function GetIpAddressIpv4()
	{
		return $this->IpAddressIpv4;
	}
	
	public function GetIpAddressIpv6()
	{
		return $this->IpAddressIpv6;
	}
	
	public function GetIpAddressNetwork()
	{
		return $this->IpAddressNetwork;
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
	
	public function SetIpAddressNetwork($IpAddressNetwork)
	{
		if(!is_null($IpAddressNetwork))
			$this->IpAddressNetwork = $IpAddressNetwork;
	}
	
	/* METHODS */
	public function UpdateInfraToolsIpAddress($IpAddressDescription, $IpAddressIpv4, $IpAddressIpv6, $IpAddressNetwork)
	{
		if(!is_null($IpAddressDescription))
			$this->IpAddressDescription = $IpAddressDescription;
		if(!is_null($IpAddressIpv4))
			$this->IpAddressIpv4 = $IpAddressIpv4;
		if(!is_null($IpAddressIpv6))
			$this->IpAddressIpv6 = $IpAddressIpv6;
		if(!is_null($IpAddressNetwork))
			$this->IpAddressNetwork = $IpAddressNetwork;
	}
}
?>