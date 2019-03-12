<?php

/************************************************************************
Class: Corporation
Creation: 2017/08/25
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for Corporation
Get / Set: 
			public function GetArrayDepartment();
			public function GetCorporationActive();
			public function GetCorporationName();
			public function GetRegisterDate();
			public function SetCorportaionActive($CorporationActive);
			public function SetArrayDepartment($ArrayInstanceDepartment);
			public function SetCorporationName($CorporationName);
Methods:
			public function UpdateCorporation($CorporationActive, $Department, $CorporationName);
**************************************************************************/

class Corporation
{
	/* Instances */
	protected $Factory                     = NULL;
	protected $ArrayDepartament            = NULL;
	
	/* Properties */
	protected $CorporationActive           = FALSE;
	protected $CorporationName             = NULL;
	protected $RegisterDate                = NULL;

	/* Constructor */
	public function __construct($ArrayInstanceDepartment, $CorporationActive, $CorporationName, $RegisterDate) 
	{
		$this->Factory           = Factory::__create();
		if(!is_null($ArrayInstanceDepartment))
			$this->ArrayDepartment = $ArrayInstanceDepartment;
		if(!is_null($CorporationActive))
			$this->CorporationActive = $CorporationActive;
		else throw new Exception(Config::EXCEPTION_CORPORATION_ACTIVE);
		if(!is_null($CorporationName))
			$this->CorporationName = $CorporationName;
		else throw new Exception(Config::EXCEPTION_CORPORATION_NAME);
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetArrayDepartment()
	{
		return $this->ArrayDepartament;
	}
	
	public function GetCorporationActive()
	{
		return $this->CorporationActive;
	}
	
	public function GetCorporationName()
	{
		return $this->CorporationName;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetArrayDepartment($ArrayInstanceDepartment)
	{
		if(!is_null($ArrayInstanceDepartment))
			$this->ArrayDepartament = $ArrayInstanceDepartment;
	}
	
	public function SetCorporationActive($CorporationActive)
	{
		if(!is_null($CorporationActive))
			$this->CorporationActive = $CorporationActive;
	}
	
	public function SetCorporationName($CorporationName)
	{
		if(!is_null($CorporationName))
			$this->CorporationName = $CorporationName;
	}
	
	/* METHODS */
	public function UpdateCorporation($CorporationActive, $ArrayInstanceDepartment, $CorporationName)
	{
		if(!is_null($CorporationActive))
		{
			if(is_bool($CorporationActive))
				$this->CorporationActive = $CorporationActive;
		}
		if(!is_null($ArrayInstanceDepartment))
			$this->ArrayDepartment = $ArrayInstanceDepartment;
		if(!is_null($CorporationName))
			$this->CorporationName = $CorporationName;
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
	}
}
?>