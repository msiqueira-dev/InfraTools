<?php

/************************************************************************
Class: InfraToolsTypeService
Creation: 22/05/2018
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/InfraToolsFactory.php
Description: 
			Classe para armazenamento de dados de um tipo de serviço.
Get / Set: 
			public function GetRegisterDate();
			public function GetTypeServiceName();
			public function GetTypeServiceSLA();
			public function SetRegisterDate($RegisterDate);
			public function SetTypeServiceName($TypeServiceName);
			public function SetTypeServiceSLA($TypeServiceSLA);
Methods:
			public function UpdateTypeService($TypeServiceName, $TypeServiceSLA);
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsTypeService
{
	/* Properties */
	protected $InfraToolsFactory  = NULL;
	protected $RegisterDate       = NULL;
	protected $TypeServiceName    = NULL;
	protected $TypeServiceSLA     = NULL;

	/* Constructor */
	public function __construct($RegisterDate, $TypeServiceName, $TypeServiceSLA) 
	{
		$this->InfraToolsFactory = InfraToolsFactory::__create();		
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
		else throw new Exception(Config::EXCEPTION_REGISTER_DATE);
		if(!is_null($TypeServiceName))
			$this->TypeServiceName    = $TypeServiceName;
		else throw new Exception(Config::EXCEPTION_TYPE_SERVICE_NAME);
		$this->TypeServiceSLA     = $TypeServiceSLA;
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetRegisterDate()
	{
		return $this->RegisterDate();
	}
	
	public function GetTypeServiceName()
	{
		return $this->TypeServiceName;
	}
	
	public function GetTypeServiceSLA()
	{
		return $this->TypeServiceSLA;
	}
	
	/* SET */
	public function SetRegisterDate($RegisterDate)
	{
		if(!is_null($RegisterDate))
			$this->RegisterDate = $RegisterDate;
	}
	
	public function SetTypeServiceName($TypeServiceName)
	{
		if(!is_null($TypeServiceName))
			$this->TypeServiceName = $TypeServiceName;
	}
	
	public function SetTypeServiceSLA($TypeServiceSLA)
	{
		$this->TypeServiceSLA = $TypeServiceSLA;
	}
	
	/* METHODS */
	public function UpdateTypeService($TypeServiceName, $TypeServiceSLA)
	{
		if(!is_null($TypeServiceName))
			$this->TypeServiceName = $TypeServiceName;
		$this->TypeServiceSLA  = $TypeServiceSLA;
	}
}
?>