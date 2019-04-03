<?php

/************************************************************************
Class: InfraToolsUser
Creation: 2015/12/02
Creator: Marcus Siqueira
Dependencies:
		    InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Model/User.php
Description: 
			Classe para armazenamento de dados do usuário do sistema e funcionalidades do mesmo.
Functions: 
			public function GetArrayAssocUserService()
			public function GetCorporationActiveIcon();
			public function GetDepartmentActiveIcon();
			public function GetUserActiveImage();
			public function GetUserUniqueIdImage();
			public function SetArrayAssocUserService($ArrayAssocUserService)
**************************************************************************/

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

if (!class_exists("User"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "User.php"))
		include_once(BASE_PATH_PHP_MODEL . "User.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class User');
}

class InfraToolsUser extends User
{
	/* Properties */
	protected $InfraToolsFactory           = NULL;
	protected $ArrayAssocUserService       = NULL;
	public    $ArrayInstanceInfraToolsUser = NULL;

	/* Constructor */
	public function __construct($ArrayAssocUserNotification, $ArrayAssocUserTeam, $AssocUserCorporation,
								$BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, 
								$Gender, $HashCode, $UserName, $Region, $RegisterDate, $SessionExpires, 
								$TwoStepVerification, $UserActive, $UserConfirmed, 
								$UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
								$UserTypeInstance, $UserUniqueId) 
	{
		parent::__construct($ArrayAssocUserNotification, $ArrayAssocUserTeam, $AssocUserCorporation,
							$BirthDate, $CorporationInstance, $Country, $DepartmentInstance, $UserEmail, 
							$Gender, $HashCode, $UserName, $Region, $RegisterDate, $SessionExpires, 
							$TwoStepVerification, $UserActive, $UserConfirmed, 
							$UserPhonePrimary, $UserPhonePrimaryPrefix, $UserPhoneSecondary, $UserPhoneSecondaryPrefix, 
							$UserTypeInstance, $UserUniqueId);
		$this->InfraToolsFactory = InfraToolsFactory::__create();
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetArrayAssocUserService()
	{
		return $this->ArrayAssocUserService;
	}
	public function GetCorporationActiveIcon()
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		if($this->Corporation == NULL)
			return $ConfigInfraTools->DefaultServerImage . 'Icons/IconNotVerified.png';
		else return $ConfigInfraTools->DefaultServerImage . 'Icons/IconVerified.png';
	}
	
	public function GetDepartmentActiveIcon()
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		if($this->Department == NULL)
			return $ConfigInfraTools->DefaultServerImage . 'Icons/IconNotVerified.png';
		else return $ConfigInfraTools->DefaultServerImage . 'Icons/IconVerified.png';
	}
	
	public function GetTwoStepVerificationImage()
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		if($this->TwoStepVerification)
			return $ConfigInfraTools->DefaultServerImage . 'Icons/IconVerified.png';
		else return $ConfigInfraTools->DefaultServerImage . 'Icons/IconNotVerified.png';
	}
	
	public function GetUserActiveImage()
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		if($this->UserActive)
			return $ConfigInfraTools->DefaultServerImage . 'Icons/IconVerified.png';
		else return $ConfigInfraTools->DefaultServerImage . 'Icons/IconNotVerified.png';
	}
	
	public function GetUserUniqueIdImage()
	{
		$ConfigInfraTools = $this->InfraToolsFactory->CreateConfigInfraTools();
		if(!is_null($this->UserUniqueId))
			return $ConfigInfraTools->DefaultServerImage . 'Icons/IconVerified.png';
		else return $ConfigInfraTools->DefaultServerImage . 'Icons/IconNotVerified.png';
	}
	
	/* SET */
	public function SetArrayAssocUserService($ArrayAssocUserService)
	{
		$this->ArrayAssocUserService = $ArrayAssocUserService;
	}
}
?>