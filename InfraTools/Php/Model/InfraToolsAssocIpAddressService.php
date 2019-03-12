<?php

/************************************************************************
Class: InfraToolsAssocIpAddressService
Creation: 2019/01/23
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Class for the association between InfraTools Ip Address and InfraTools Service.
Get / Set: 
			public function GetAssocIpAddressServiceServiceId();
			public function GetAssocIpAddressServiceServiceIp();
			public function GetRegisterDate();
			public function SetAssocIpAddressServiceServiceId($AssocIpAddressServiceServiceId);
			public function SetAssocIpAddressServiceServiceIp($AssocIpAddressServiceServiceIp);
Methods:
			public function UpdateInfraToolsAssocIpAddressService($AssocIpAddressServiceServiceId, $AssocIpAddressServiceServiceIp);
**************************************************************************/

class InfraToolsAssocIpAddressService
{
	/* Properties */
	protected $AssocIpAddressServiceServiceId = NULL;
	protected $AssocIpAddressServiceServiceIp = NULL;
	protected $RegisterDate  = NULL;

	/* Constructor */
	public function __construct($AssocIpAddressServiceServiceId, $AssocIpAddressServiceServiceIp, $RegisterDate) 
	{
		if(!is_null($AssocIpAddressServiceServiceId))
			$this->AssocIpAddressServiceServiceId = $AssocIpAddressServiceServiceId;
		else throw new Exception(ConfigInfraTools::EXCEPTION_ASSOC_IP_ADDRESS_SERVICE_SERVICE_ID);
		if(!is_null($AssocIpAddressServiceServiceIp))
			$this->AssocIpAddressServiceServiceIp = $AssocIpAddressServiceServiceIp;
		else throw new Exception(ConfigInfraTools::EXCEPTION_ASSOC_IP_ADDRESS_SERVICE_SERVICE_IP);
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
	public function GetAssocIpAddressServiceServiceId()
	{
		return $this->AssocIpAddressServiceServiceId;
	}
	
	public function GetAssocIpAddressServiceServiceIp()
	{
		return $this->AssocIpAddressServiceServiceIp;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetAssocIpAddressServiceServiceId($AssocIpAddressServiceServiceId)
	{
		if(!is_null($AssocIpAddressServiceServiceId))
			$this->AssocIpAddressServiceServiceId = $AssocIpAddressServiceServiceId;
	}
    
	public function SetAssocIpAddressServiceServiceIp($AssocIpAddressServiceServiceIp)
	{
		if(!is_null($AssocIpAddressServiceServiceIp))
			$this->AssocIpAddressServiceServiceIp = $AssocIpAddressServiceServiceIp;
	}
	
	/* METHODS */
	public function UpdateInfraToolsAssocIpAddressService($AssocIpAddressServiceServiceId, $AssocIpAddressServiceServiceIp)
	{
		if(!is_null($AssocIpAddressServiceServiceId))
			$this->AssocIpAddressServiceServiceId = $AssocIpAddressServiceServiceId;
		if(!is_null($AssocIpAddressServiceServiceIp))
			$this->AssocIpAddressServiceServiceIp = $AssocIpAddressServiceServiceIp;
	}
}
?>