<?php

/************************************************************************
Class: Corporation
Creation: 25/08/2017
Creator: Marcus Siqueira
Dependencies:
Description: 
			Classe para armazenamento de dados de uma corporação.
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
		if($ArrayInstanceDepartment != NULL)
			$this->ArrayDepartment = $ArrayInstanceDepartment;
		$this->CorporationActive = $CorporationActive;
		$this->CorporationName   = $CorporationName;
		$this->RegisterDate      = $RegisterDate;
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
		$this->ArrayDepartament = $ArrayInstanceDepartment;
	}
	
	public function SetCorporationActive($CorporationActive)
	{
		$this->CorporationActive = $CorporationActive;
	}
	
	public function SetCorporationName($CorporationName)
	{
		$this->CorporationName = $CorporationName;
	}
	
	/* METHODS */
	public function UpdateCorporation($CorporationActive, $ArrayInstanceDepartment, $CorpotaionName)
	{
		if(is_bool($CorporationActive))
			$this->CorporationActive = $CorporationActive;
		if($ArrayInstanceDepartment != NULL)
			$this->ArrayDepartment   = $ArrayInstanceDepartment;
		if($Name != NULL)
			$this->CorporationName   = $CorporationName;
		if($RegisterDate != NULL)
			$this->RegisterDate      = $RegisterDate;
	}
}
?>