<?php

/************************************************************************
Class: Country
Creation: 24/08/2017
Creator: Marcus Siqueira
Dependencies:
Description: 
			Classe para controle dos países obtidos pelo Google Maps.
Get / Set:		
			public function GetCountryAbbreviation();
			public function GetCountryName();
			public function GetRegionCode();
			public function GetRegisterDate();
**************************************************************************/

class Country
{
	/* Properties */
	protected $CountryAbbreviation = NULL;
	protected $CountryName         = NULL;
	protected $RegionCode          = NULL;
	protected $RegisterDate        = NULL;

	/* Constructor */
	public function __construct($CountryAbbreviation, $CountryName, $RegionCode, $RegisterDate) 
	{
		if(!is_null($CountryAbbreviation))
			$this->CountryAbbreviation = $CountryAbbreviation;
		else throw new Exception(Config::EXCEPTION_COUNTRY_ABBREVIATION);
		if(!is_null($CountryName))
			$this->CountryName = $CountryName;
		else throw new Exception(Config::EXCEPTION_COUNTRY_NAME);
		if(!is_null($RegionCode))
			$this->RegionCode = $RegionCode;
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
	public function GetCountryAbbreviation()
	{
		return $this->CountryAbbreviation;	
	}
	
	public function GetCountryName()
	{
		return $this->CountryName;
	}
	
	public function GetRegionCode()
	{
		return $this->RegionCode;
	}
	
	public function GetRegisterDate()
	{
		return $this->RegisterDate;
	}
}
?>