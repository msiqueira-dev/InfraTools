<?php

/************************************************************************
Class: Department
Creation: 2017/08/25
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for Departments.
Get / Set:		
			public function GetDepartmentCorporation();
			public function GetDepartmentCorporationName();
			public function GetDepartmentInitials();
			public function GetDepartmentName();
			public function GetRegisterDate();
			public function SetDepartmentCorporation($DepartmentCorporation);
			public function SetDepartmentInitials($DepartmentInitials);
			public function SetDepartmentName($DepartmentName);
			public function SetRegisterDate($RegisterDate);
Methods:
			public function UpdateDepartment($DepartmentCorporation, $DepartmentInitials, $DepartmentName);
**************************************************************************/

class Department
{
	/* Properties */
	protected $DepartmentCorporation  = NULL;
	protected $DepartmentInitials     = NULL;
	protected $DepartmentName         = NULL;
	protected $RegisterDate           = NULL;

	/* Constructor */
	public function __construct($DepartmentCorporation, $DepartmentInitials, $DepartmentName, $RegisterDate) 
	{
		if(!is_null($DepartmentCorporation))
			$this->DepartmentCorporation  = $DepartmentCorporation;
		else throw new Exception(Config::EXCEPTION_DEPARTMENT_DEPARTMENT_CORPORATION);
		$this->DepartmentInitials     = $DepartmentInitials;
		if(!is_null($DepartmentName))
			$this->DepartmentName         = $DepartmentName;
		else throw new Exception(Config::EXCEPTION_DEPARTMENT_DEPARTMENT_CORPORATION);
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
	public function GetDepartmentCorporation()
	{
		return $this->DepartmentCorporation;	
	}
	
	public function GetDepartmentCorporationName()
	{
		if(!is_null($this->DepartmentCorporation))
		{
			if(is_object($this->DepartmentCorporation))
				return $this->DepartmentCorporation->GetCorporationName();
		}
	}
	
	public function GetDepartmentInitials()
	{
		return $this->DepartmentInitials;
	}
	
	public function GetDepartmentName()
	{
		return $this->DepartmentName;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetDepartmentCorporation($DepartmentCorporation)
	{
		if(!is_null($DepartmentCorporation))
			$this->DepartmentCorporation = $DepartmentCorporation;
	}
	
	public function SetDepartmentInitials($DepartmentInitials)
	{
		if(!is_null($DepartmentInitials))
			$this->DepartmentInitials = $DepartmentInitials;
	}
	
	public function SetDepartmentName($DepartmentName)
	{
		if(!is_null($DepartmentName))
			$this->DepartmentName = $DepartmentName;
	}
	
	public function SetRegisterDate($RegisterDate)
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
	}
	
	/* METHODS */
	public function UpdateDepartment($DepartmentCorporation, $DepartmentInitials, $DepartmentName)
	{
		if(!is_null($DepartmentCorporation))
			$this->DepartmentCorporation = $DepartmentCorporation;
		if(!is_null($DepartmentInitials))
			$this->DepartmentInitials = $DepartmentInitials;
		if(!is_null($DepartmentName))
			$this->DepartmentName = $DepartmentName;
	}
}
?>