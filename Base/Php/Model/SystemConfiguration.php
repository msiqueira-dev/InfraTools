<?php

/************************************************************************
Class: SystemConfiguration
Creation: 2019/01/03
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class that treats the System Configuration.
Get / Set:
			public function GetRegisterDate();
			public function GetSystemConfigurationOptionActive();
			public function GetSystemConfigurationOptionDescription();
			public function GetSystemConfigurationOptionName();
			public function GetSystemConfigurationOptionNumber();
			public function GetSystemConfigurationOptionValue();
			public function SetSystemConfigurationOptionActive($SystemConfigurationOptionActive);
			public function SetSystemConfigurationOptionDescription($SystemConfigurationOptionDescription);
			public function SetSystemConfigurationOptionName($SystemConfigurationOptionName);
			public function SetSystemConfigurationOptionValue($SystemConfigurationOptionValue);
Methods:
			public function UpdateSystemConfiguration($RegisterDate, $SystemConfigurationOptionActive, SystemConfigurationOptionDescription,
							                          $SystemConfigurationOptionName, $SystemConfigurationOptionValue);
**************************************************************************/

class SystemConfiguration
{
	/* Properties */
	protected $RegisterDate                          = NULL;
	protected $SystemConfigurationOptionActive       = NULL;
	protected $SystemConfigurationOptionDescription  = NULL;
	protected $SystemConfigurationOptionName         = NULL;
	protected $SystemConfigurationOptionNumber       = NULL;
	protected $SystemConfigurationOptionValue        = NULL;

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	public function __construct($RegisterDate, $SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
							    $SystemConfigurationOptionName, $SystemConfigurationOptionNumber, $SystemConfigurationOptionValue) 
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($SystemConfigurationOptionActive))
			$this->SystemConfigurationOptionActive = $SystemConfigurationOptionActive;
		else throw new Exception(Config::EXCEPTION_SYSTEM_CONFIGURATION_OPTION_ACTIVE);
		if(!is_null($SystemConfigurationOptionDescription))
			$this->SystemConfigurationOptionDescription = $SystemConfigurationOptionDescription;
		else throw new Exception(Config::EXCEPTION_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION);
		if(!is_null($SystemConfigurationOptionName))
			$this->SystemConfigurationOptionName = $SystemConfigurationOptionName;
		else throw new Exception(Config::EXCEPTION_SYSTEM_CONFIGURATION_OPTION_NAME);
		if(!is_null($SystemConfigurationOptionNumber))
			$this->SystemConfigurationOptionNumber = $SystemConfigurationOptionNumber;
		else throw new Exception(Config::EXCEPTION_SYSTEM_CONFIGURATION_OPTION_NUMBER);
		if(!is_null($SystemConfigurationOptionValue))
			$this->SystemConfigurationOptionValue = $SystemConfigurationOptionValue;
	}
	
	/* GET */
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	public function GetSystemConfigurationOptionActive()
	{
		return $this->SystemConfigurationOptionActive;
	}
	
	public function GetSystemConfigurationOptionDescription()
	{
		return $this->SystemConfigurationOptionDescription;
	}
	
	public function GetSystemConfigurationOptionName()
	{
		return $this->SystemConfigurationOptionName;
	}

	public function GetSystemConfigurationOptionNumber()
	{
		return $this->SystemConfigurationOptionNumber;
	}
	
	public function GetSystemConfigurationOptionValue()
	{
		return $this->SystemConfigurationOptionValue;
	}
	
	/* SET */
	public function SetSystemConfigurationOptionActive($SystemConfigurationOptionActive)
	{
		if(!is_null($SystemConfigurationOptionActive))
			$this->SystemConfigurationOptionActive = $SystemConfigurationOptionActive;
	}
	
	public function SetSystemConfigurationOptionDescription($SystemConfigurationOptionDescription)
	{
		if(!is_null($SystemConfigurationOptionDescription))
			$this->SystemConfigurationOptionDescription = $SystemConfigurationOptionDescription;	
	}
	
	public function SetSystemConfigurationOptionName($SystemConfigurationOptionName)
	{
		if(!is_null($SystemConfigurationOptionName))
			$this->SystemConfigurationOptionName = $SystemConfigurationOptionName;
	}
	public function SetSystemConfigurationOptionValue($SystemConfigurationOptionValue)
	{
		$this->SystemConfigurationOptionValue = $SystemConfigurationOptionValue;
	}
	
	/* METHODS */
	public function UpdateSystemConfiguration($RegisterDate, $SystemConfigurationOptionActive, $SystemConfigurationOptionDescription,
							                  $SystemConfigurationOptionName, $SystemConfigurationOptionValue)	
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		if(!is_null($SystemConfigurationOptionActive))
			$this->SystemConfigurationOptionActive = $SystemConfigurationOptionActive;
		if(!is_null($SystemConfigurationOptionDescription))
			$this->SystemConfigurationOptionDescription = $SystemConfigurationOptionDescription;
		if(!is_null($SystemConfigurationOptionName))
			$this->SystemConfigurationOptionName = $SystemConfigurationOptionName;
		$this->SystemConfigurationOptionValue = $SystemConfigurationOptionValue;
	}
}
?>