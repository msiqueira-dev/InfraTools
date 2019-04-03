<?php

/************************************************************************
Class: InfraToolsCorporation
Creation: 2015/07/12
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Model/Corporation.php
		    InfraTools - Php/Controller/ConfigInfraTools.php
Description: 
			Class for Corporation.
Get / Set:  
			public function GetCorporationActiveImage();
**************************************************************************/

if (!class_exists("Corporation"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Corporation.php"))
		include_once(BASE_PATH_PHP_MODEL . "Corporation.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Corporation');
}

class InfraToolsCorporation extends Corporation
{
	/* Properties */

	/* Constructor */
	public function __construct($ArrayInstanceDepartment, $CorporationActive, $CorporationName, $RegisterDate) 
	{
		parent::__construct($ArrayInstanceDepartment, $CorporationActive, $CorporationName, $RegisterDate);
	}
	
	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* GET */
	public function GetCorporationActiveImage()
	{
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
		if($this->CorporationActive)
			return $ConfigInfraTools->DefaultServerImage . 'Icons/IconVerified.png';
		else return $ConfigInfraTools->DefaultServerImage . 'Icons/IconNotVerified.png';
	}
}
?>