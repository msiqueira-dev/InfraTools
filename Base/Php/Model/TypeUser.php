<?php

/************************************************************************
Class: TypeUser
Creation: 24/08/2017
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for Type User
Get / Set:
			public function GetTypeUserDescription();
			public function GetRegisterDate();
			public function SetTypeUserDescription($TypeUserDescription);
Methods:
			public function UpdateTypeUser($TypeUserDescription);
**************************************************************************/

class TypeUser
{
	/* Properties */
	protected $TypeUserDescription  = NULL;
	protected $RegisterDate         = NULL;

	/* Constructor */
	public function __construct($TypeUserDescription, $RegisterDate) 
	{
		if(!is_null($TypeUserDescription))
			$this->TypeUserDescription = $TypeUserDescription;
		else throw new Exception(Config::EXCEPTION_TYPE_USER_DESCRIPTION);
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
	public function GetTypeUserDescription()
	{
		return $this->TypeUserDescription;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
	
	/* SET */
	public function SetTypeUserDescription($TypeUserDescription)
	{
		$this->TypeUserDescription = $TypeUserDescription;
	}
	
	/* METHODS */
	public function UpdateTypeUser($TypeUserDescription)	
	{
		if(!is_null($TypeUserDescription))
			$this->TypeUserDescription = $TypeUserDescription;
	}
}
?>