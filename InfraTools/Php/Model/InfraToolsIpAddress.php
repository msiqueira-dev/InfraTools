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
			public function GetIpAddressIpv4();
			public function GetIpAddressIpv6();
			public function GetRegisterDate();
			public function SetIpAddressIpv4($IpAddressIpv4);
			public function SetIpAddressIpv6($IpAddressIpv6);
Methods:
			public function UpdateInfraToolsIpAddress($IpAddressIpv4, $IpAddressIpv6);
**************************************************************************/

class InfraToolsIpAddress
{
	/* Properties */
	protected $IpAddressIpv4 = NULL;
	protected $IpAddressIpv6 = NULL;
	protected $RegisterDate  = NULL;

	/* Constructor */
	public function __construct($IpAddressIpv4, $IpAddressIpv6, $RegisterDate) 
	{
		if(!is_null($IpAddressIpv4))
			$this->IpAddressIpv4 = $IpAddressIpv4;
		else throw new Exception(ConfigInfraTools::EXCEPTION_IP_ADDRESS_IPV4);
		if(!is_null($IpAddressIpv6))
			$this->IpAddressIpv6 = $IpAddressIpv6;
		else throw new Exception(ConfigInfraTools::EXCEPTION_IP_ADDRESS_IPV6);
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
	public function UpdateInfraToolsIpAddress($IpAddressIpv4, $IpAddressIpv6)
	{
		if(!is_null($IpAddressIpv4))
			$this->IpAddressIpv4 = $IpAddressIpv4;
		if(!is_null($IpAddressIpv6))
			$this->IpAddressIpv6 = $IpAddressIpv6;
	}
}
?>