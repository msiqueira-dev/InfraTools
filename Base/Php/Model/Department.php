<?php

/************************************************************************
Class: Department
Creation: 25/08/2017
Creator: Marcus Siqueira
Dependencies:
Description: 
			Corporations Departments.
Get / Set:		
			public function GetDepartmentCorporation();
			public function GetDepartmentInitials();
			public function GetDepartmentCorporationName();
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
		if($DepartmentCorporation != NULL)
			$this->DepartmentCorporation  = $DepartmentCorporation;
		else throw new Exception(Config::EXCEPTION_DEPARTMENT_DEPARTMENT_CORPORATION);
		$this->DepartmentInitials     = $DepartmentInitials;
		if($DepartmentName != NULL)
			$this->DepartmentName         = $DepartmentName;
		else throw new Exception(Config::EXCEPTION_DEPARTMENT_DEPARTMENT_CORPORATION);
		if($RegisterDate != NULL)
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
		if($this->DepartmentCorporation != NULL)
			return $this->DepartmentCorporation->GetCorporationName();
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
	public function SetDerpartmentCorporation($DepartmentCorporation)
	{
		$this->DepartmentCorporation = $DepartmentCorporation;
	}
	
	public function SetDepartmentInitials($DepartmentInitials)
	{
		$this->DepartmentInitials = $DepartmentInitials;
	}
	
	public function SetDepartmentName($DepartmentName)
	{
		$this->DepartmentName = $DepartmentName;
	}
	
	public function SetRegisterDate($RegisterDate)
	{
		$this->RegisterDate = $RegisterDate;
	}
	
	/* METHODS */
	public function UpdateDepartment($DepartmentCorporation, $DepartmentInitials, $DepartmentName)
	{
		if($DepartmentCorporation != NULL)
			$this->DepartmentCorporation = $DepartmentCorporation;
		if($DepartmentInitials != NULL)
			$this->DepartmentInitials    = $DepartmentInitials;
		if($DepartmentName != NULL)
			$this->DepartmentName        = $DepartmentName;
	}
}
?>