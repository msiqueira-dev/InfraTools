<?php

/************************************************************************
Class: TypeUser
Creation: 24/08/2017
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe para armazenamento de dados de permissões dos usuários.
Get / Set:
			public function GetTypeUserDescription();
			public function GetTypeUserId();
			public function GetRegisterDate();
			public function SetTypeUserDescription($Description);
			public function SetTypeUserId($Id);
Methods:
			public function UpdateTypeUser($Description, $Id);
**************************************************************************/

class TypeUser
{
	/* Properties */
	protected $TypeUserDescription  = NULL;
	protected $TypeUserId           = NULL;
	protected $RegisterDate         = NULL;

	/* Constructor */
	public function __construct($TypeUserDescription, $TypeUserId, $RegisterDate) 
	{
		if(!is_null($TypeUserDescription))
			$this->TypeUserDescription = $TypeUserDescription;
		else throw new Exception(Config::EXCEPTION_TYPE_USER_DESCRIPTION);
		if(!is_null($TypeUserId))
			$this->TypeUserId = $TypeUserId;
		else throw new Exception(Config::EXCEPTION_TYPE_USER_ID);
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
	
	public function GetTypeUserId()
	{
		return $this->TypeUserId;
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
	
	public function SetTypeUserId($TypeUserId)
	{
		$this->TypeUserId = $TypeUserId;
	}
	
	/* METHODS */
	public function UpdateTypeUser($TypeUserDescription, $TypeUserId)	
	{
		if($TypeUserId != NULL)	
			$this->TypeUserId = $TypeUserId;
		if($TypeUserDescription == NULL)
			$this->TypeUserDescription = $TypeUserDescription;
	}
}
?>