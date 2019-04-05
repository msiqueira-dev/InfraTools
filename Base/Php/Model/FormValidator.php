<?php

/************************************************************************
Class: FormValidator
Creation: 2014/07/18
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class with Singleton pattern for Form Validator
Functions: 
			public function ExecuteValidation($FunctionName, $Value, $DefaultValue, $ArrayOption = NULL);
			public function ValidateBool($Bool);
			public function ValidateCorporationName($CorporationName, $DefaultValue);
			public function ValidateCompareString($StringToCompare, $DefaultValue, $String);
			public function ValidateCountryName($Country, $DefaultValue);
			public function ValidateCountryRegionCode($RegionCode, $DefaultValue);
			public function ValidateCpf($Cpf, $DefaultValue);
			public function ValidateDate($Year, $Month, $Day, $DefaultValue);
			public function ValidateDateDay($Day, $DefaultValue);
			public function ValidateDateMonth($Month, $DefaultValue);
			public function ValidateDateYear($Year, $DefaultValue);
			public function ValidateDepartmentInitials($DepartmentInitials, $DefaultValue);
			public function ValidateDepartmentName($DepartmentName, $DefaultValue);
			public function ValidateDescription($Description, $DefaultValue);
			public function ValidateEmail($EmailAddress, $DefaultValue);
			public function ValidateGender($Gender, $DefaultValue);
			public function ValidateHost($Host);
			public function ValidateIsNotNumericValue($NonNumeric, $DefaultValue);
			public function ValidateIpAddressIpv4(IpAddressIpv4);
			public function ValidateIpMask($IpMask);
			public function ValidateMessage($Message, $DefaultValue);
			public function ValidateName($Name, $DefaultValue);
			public function ValidateNotNullOrEmpty($NotNullOrEmpty, $DefaultValue);
			public function ValidateNumericValue($Numeric, $DefaultValue);
			public function ValidatePassword($Password, $DefaultValue);
			public function ValidateRegistrationId($RegistrationId, $DefaultValue);
			public function ValidateStringSize($String, $Size);
			public function ValidateServiceName($Service, $DefaultValue);
			public function ValidateSubject($Subject, $DefaultValue, $ArrayOption);
			public function ValidateTeamName(TeamName, $DefaultValue);
			public function ValidateTitle($Title, $DefaultValue);
			public function ValidateTypeAssocUserService($TypeAssocUserServiceDescription, $DefaultValue);
			public function ValidateTypeService($TypeService, $DefaultValue);
			public function ValidateURL($Url, $DefaultValue);
			public function ValidateUserUniqueId($UserUniqueId, $DefaultValue);
**************************************************************************/
class FormValidator
{
	/* Constantes de Retorno */
	const ERROR                           = "ERROR";
	
	/* Singleton */
	private static $Instance;
	
	/* Get Instance */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	/* Constructor */
	protected function __construct() 
    {
    }
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	public function ExecuteValidation($FunctionName, $Value, $DefaultValue, $ArrayOption = NULL)
	{
		if($FunctionName == Config::FM_VALIDATE_FUNCTION_BOOL)
			return $this->ValidateBool($Value);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_CORPORATION_NAME)
			return $this->ValidateCorporationName($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_COMPARE_STRING)
			return $this->ValidateCompareString($Value, $DefaultValue, $ArrayOption);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_COUNTRY_NAME)
			return $this->ValidateCountryName($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE)
			return $this->ValidateCountryRegionCode($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_CPF)
			return $this->ValidateCpf($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_DATE)
			return $this->ValidateDate($Value[0], $Value[1], $Value[2], $DefaultValue[0], $DefaultValue[1], $DefaultValue[2]);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_DATE_DAY)
			return $this->ValidateDateDay($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_DATE_MONTH)
			return $this->ValidateDateMonth($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_DATE_YEAR)
			return $this->ValidateDateYear($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_DEPARTMENT_INITIALS)
			return $this->ValidateDepartmentInitials($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_DEPARTMENT_NAME)
			return $this->ValidateDepartmentName($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_DESCRIPTION)
			return $this->ValidateDescription($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_EMAIL)
			return $this->ValidateEmail($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_GENDER)
			return $this->ValidateGender($Value, $DefaultValue);	
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_HOST)
			return $this->ValidateHost($Value);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_IP_ADDRESS_IPV4)
			return $this->ValidateIpAddressIpv4($Value);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_IP_MASK)
			return $this->ValidateIpMask($Value);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_MESSAGE)
			return $this->ValidateMessage($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_NAME)
			return $this->ValidateName($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_NOT_NULL_OR_EMPTY)
			return $this->ValidateNotNullOrEmpty($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_NOT_NUMBER)
			return $this->ValidateIsNotNumericValue($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_NUMERIC)
			return $this->ValidateNumericValue($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_PASSWORD)
			return $this->ValidatePassword($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_REGISTRATION_ID)
			return $this->ValidateRegistrationId($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_SERVICE_NAME)
			return $this->ValidateServiceName($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_SUBJECT)
			return $this->ValidateSubject($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_TEAM_NAME)
			return $this->ValidateTeamName($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_TITLE)
			return $this->ValidateTitle($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE)
			return $this->ValidateTypeAssocUserService($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_TYPE_SERVICE)
			return $this->ValidateTypeService($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_URL)
			return $this->ValidateURL($Value, $DefaultValue);
		elseif($FunctionName == Config::FM_VALIDATE_FUNCTION_USER_UNIQUE_ID)
			return $this->ValidateUserUniqueId($Value, $DefaultValue);
		else return Config::RET_ERROR;
	}
	
	public function ValidateBool($Bool)
	{
		if(isset($Bool))
		{
			if(!empty($Bool))
			{
				if(is_bool($Bool))
					return Config::RET_OK;
				else return Config::INVALID_BOOL;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateCorporationName($CorporationName, $DefaultValue)
	{
		if(isset($CorporationName))
		{
			if(!is_null($CorporationName) && !empty($CorporationName) && $CorporationName != $DefaultValue)
			{
				if(preg_match(
	               '/(^([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[*]|[0-9]|[^\x{0000}\x{007F}])+(([ ])*([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[*]|[0-9]|[^\x{0000}\x{007F}])*)*$)/', 
				   $CorporationName) > 0)
					return Config::RET_OK;
				else return Config::INVALID_CORPORATION;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateCompareString($StringToCompare, $DefaultValue, $String)
	{
		if(isset($StringToCompare))
		{
			if(!is_null($StringToCompare) && !empty($StringToCompare) && $StringToCompare != $DefaultValue)
			{
				if($StringToCompare == $String)
				{
					return Config::RET_OK;
				}
				else return Config::INVALID_CAPTCHA;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateCountryName($Country, $DefaultValue)
	{
		if(isset($Country))
		{
			if(!is_null($Country) && !empty($Country) && $Country != $DefaultValue)
			{
				if(preg_match(
	               '/((([A-Z]|([Å])|([(][A-Z]))(([a-z])|([ç])|([ã])|([é])|([í])|([ô])|([(])|([)])|([&])|([’]))+)|([(DRC)])|([(FYROM)])|([U.S.])|([&])|([d’])|([-])|([of])|([ ]))+/', 
				   $Country) > 0)
					return Config::RET_OK;
				else return Config::INVALID_COUNTRY_NAME;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateCountryRegionCode($RegionCode, $DefaultValue)
	{
		if(isset($RegionCode))
		{
			if(!is_null($RegionCode) && !empty($RegionCode) && $RegionCode != $DefaultValue)
			{
				if(preg_match('/^[A-Z]{2}$/', $RegionCode) > 0)
					return Config::RET_OK;
				else return Config::INVALID_COUNTRY_REGION_CODE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateCpf($Cpf, $DefaultValue)
	{
		if(isset($Cpf))
		{
			if (!is_null($Cpf) && !empty($Cpf))
			{
				if ($Cpf != "")
				{
					if ($Cpf != $DefaultValue)
					{
						if(is_numeric($Cpf))
						{
							$Cpf = str_pad(ereg_replace('[^0-9]', '', $Cpf), 11, '0', STR_PAD_LEFT);
							if (strlen($Cpf) == 11)
							{
								if($Cpf != '00000000000' || $Cpf != '11111111111' || $Cpf != '22222222222' || $Cpf != '33333333333' 
								   || $Cpf != '44444444444' || $Cpf != '55555555555' 
								   || $Cpf != '66666666666' || $Cpf != '77777777777' 
								   || $Cpf != '88888888888' || $Cpf != '99999999999')
								{
									for ($t = 9; $t < 11; $t++) 
									{
										for ($d = 0, $c = 0; $c < $t; $c++) 
											$d += $Cpf{$c} * (($t + 1) - $c);
										$d = ((10 * $d) % 11) % 10;
										if ($Cpf{$c} != $d) 
											return Config::INVALID_CPF;
									}
									return Config::RET_OK;
								}
								else return Config::INVALID_CPF_SEQUENTIAL_NUMBER;
							}
							else return Config::INVALID_CPF_ELEVEN_NUMBER;
						}
						else return Config::INVALID_NUMERIC;
					}
					else return Config::INVALID_DEFAULT_VALUE;
				}
				else return Config::INVALID_WHITE_SPACE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateDate($Year, $Month, $Day, $DefaultValueYear, $DefaultValueMonth, $DefaultValueDay)
	{
		if(isset($Year) && isset($Month) && isset($Day))
		{
			if ((!is_null($Year) && !empty($Year))
			  &&(!is_null($Month) && !empty($Month)) 
			  &&(!is_null($Day)  && !empty($Day)))
			{
				if ($Year != $DefaultValueYear && $Month != $DefaultValueMonth && $Day != $DefaultValueDay)
				{
					if(checkdate($Month, $Day, $Year))
						return Config::RET_OK;
					else return Config::INVALID_DATE;
				}
				else return Config::INVALID_DEFAULT_VALUE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateDateDay($Day, $DefaultValue)
	{
		if(isset($Day))
		{
			if(!is_null($Day) && !empty($Day))
			{
				if($this->ValidateNumericValue($Day, "") == Config::RET_OK)
				{
					if($Day < 32 && $Day > 0)
						return Config::RET_OK;
					else return Config::INVALID_DATE_DAY;
				}
				else return Config::INVALID_DATE_DAY;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateDateMonth($Month, $DefaultValue)
	{
		if(isset($Month))
		{
			if(!is_null($Month) && !empty($Month))
			{
				if($this->ValidateNumericValue($Month, "") == Config::RET_OK)
				{
					if($Month < 12 && $Month > 0)
						return Config::RET_OK;
					else return Config::INVALID_DATE_MONTH;
				}
				else return Config::INVALID_DATE_MONTH;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateDateYear($Year, $DefaultValue)
	{
		if(isset($Year))
		{
			if(!is_null($Year) && !empty($Year))
			{
				if($this->ValidateNumericValue($Year, "") == Config::RET_OK)
				{
					if($Year < date("Y") && $Year >= 1940)
						return Config::RET_OK;
					else return Config::INVALID_DATE_YEAR;
				}
				else return Config::INVALID_DATE_YEAR;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateDepartmentInitials($DepartmentInitials, $DefaultValue)
	{
		if(isset($DepartmentInitials))
		{
			if(!is_null($DepartmentInitials) && !empty($DepartmentInitials))
			{
				if(preg_match(
	                '/(^([a-zA-Z]|[.]|[-]|[^\x{0000}-\x{007F}])+$)/', 
				   $DepartmentInitials) > 0)
					return Config::RET_OK;
				else return Config::INVALID_DEPARTMENT_INITIALS;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateDepartmentName($DepartmentName, $DefaultValue)
	{
		if(isset($DepartmentName))
		{
			if(!is_null($DepartmentName) && !empty($DepartmentName))
			{
				if(preg_match(
	                '/(^([a-zA-Z]|[.]|[-]|[0-9]|[^\x{0000}-\x{007F}])+(([ ])*([a-zA-Z]|[.]|[-]|[0-9]|[^\x{0000}-\x{007F}])*)*$)/', 
				   $DepartmentName) > 0)
					return Config::RET_OK;
				else return Config::INVALID_DEPARTMENT_NAME;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateDescription($Description, $DefaultValue)
	{
		if(isset($Description))
		{
			if(!is_null($Description) && !empty($Description))
			{
				if(preg_match('/(^([a-zA-Z]|[.]|[-]|[_]|[.]|[!]|[?]|[:]|[,]|["]|[\']|[(]|[)]|[ ]|[0-9])*)$/', $Description) > 0)
					return Config::RET_OK;
				else return Config::INVALID_DESCRIPTION;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateEmail($EmailAddress, $DefaultValue)
	{
		if(isset($EmailAddress))
		{
			if (!is_null($EmailAddress) && !empty($EmailAddress))
			{
				if ($EmailAddress != "")
				{
					if ($EmailAddress != $DefaultValue)
					{
						if(filter_var($EmailAddress, FILTER_VALIDATE_EMAIL))
							return Config::RET_OK;
						else return Config::INVALID_EMAIL_ADDRESS;
					}
					else return Config::INVALID_DEFAULT_VALUE;
				}
				else return Config::INVALID_NULL;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateGender($Gender, $DefaultValue)
	{
		if(isset($Gender))
		{
			if(!is_null($Gender) && !empty($Gender) && $Gender != $DefaultValue)
			{
				$arrayGender[0] = Config::FIELD_USER_GENDER_MALE; 
				$arrayGender[1] = Config::FIELD_USER_GENDER_FEMALE;
				$arrayGender[2] = Config::FIELD_USER_GENDER_OTHER;
				if(in_array($Gender, $arrayGender))
					return Config::RET_OK;
				else return Config::INVALID_GENDER;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateHost($Host)
	{
		if(isset($Host))
		{
			if(!is_null($Host) && !empty($Host))
			{
				if(strstr($Host, ".") && strlen($Host) > 3 && strlen($Host) < 255 && (!strstr($Host, "..")) && (!strstr($Host, " "))
				   && preg_match('/[a-zA-Z]+/', $Host) && (!strstr($Host, "@")) &&
				   !(preg_match('/([^.]*[.][0-9]*$)/', $Host)) && filter_var(FILTER_VALIDATE_URL) == true)
					return Config::RET_OK;
				else return Config::INVALID_HOST_NAME;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateIsNotNumericValue($NonNumeric, $DefaultValue)
	{
		if(isset($NonNumeric))
		{
			if (!is_null($NonNumeric) && !empty($NonNumeric))
			{
				if ($NonNumeric != "")
				{
					if ($NonNumeric != $DefaultValue)
					{
						if(!is_numeric($NonNumeric))
							return Config::RET_OK;
						else return Config::INVALID_NON_NUMERIC;
					}
					else return Config::INVALID_DEFAULT_VALUE;
				}
				else return Config::INVALID_WHITE_SPACE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateIpAddressIpv4($IpAddressIpv4)
	{
		if(isset($IpAddressIpv4))
		{
			if(!is_null($IpAddressIpv4) && !empty($IpAddressIpv4))
			{
				if(preg_match('/^(?=\d+\.\d+\.\d+\.\d+$)(?:(?:25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]|[0-9])\.?){4}$/', $IpAddressIpv4) > 0)
					return Config::RET_OK;
				else return Config::INVALID_IP_ADDRESS_IPV4;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateIpMask($IpMask)
	{
		if(isset($IpMask))
		{
			if(!is_null($IpMask) && !empty($IpMask))
			{
				if($this->ValidateNumericValue($IpMask, "") == Config::RET_OK)
				{
					if($IpMask < 31 && $IpMask > 0)
						return Config::RET_OK;
					else return Config::INVALID_IP_MASK;
				}
				else return Config::INVALID_IP_MASK;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateMessage($Message, $DefaultValue)
	{
		if(isset($Message))
		{
			if(!is_null($Message) && !empty($Message) && $Message != $DefaultValue)
				return Config::RET_OK;
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateName($Name, $DefaultValue)
	{
		if(isset($Name))
		{
			if(!is_null($Name) && !empty($Name) && $Name != $DefaultValue)
			{
				if(preg_match(
				'/(^([a-zA-Z]|[^\x{0000}-\x{007F}])+(([ ])+([a-zA-Z]|[^\x{0000}-\x{007F}]|(([a-zA-Z]|[^\x{0000}-\x{007F}])[.]))+)+$)/'
				, $Name) > 0)
					return Config::RET_OK;
				else return Config::INVALID_NAME;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateNotNullOrEmpty($NotNullOrEmpty, $DefaultValue)
	{
		if(isset($NotNullOrEmpty))
		{
			if (!is_null($NotNull) && !empty($NotNullOrEmpty))
			{
				if ($NotNull != "")
				{
					if ($NotNull != $DefaultValue)
						return Config::RET_OK;
					else return Config::INVALID_DEFAULT_VALUE;
				}
				else return Config::INVALID_WHITE_SPACE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}

	public function ValidateNumericValue($Numeric, $DefaultValue)
	{
		if(isset($Numeric))
		{
			if (!is_null($Numeric) && (!empty($Numeric) || $Numeric==0))
			{
				if ($Numeric != "")
				{
					if ($Numeric != $DefaultValue)
					{
						if(is_numeric($Numeric))
							return Config::RET_OK;
						else return Config::INVALID_NUMERIC;
					}
					else return Config::INVALID_DEFAULT_VALUE;
				}
				else return Config::INVALID_WHITE_SPACE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidatePassword($Password, $DefaultValue)
	{
		
		if(isset($Password))
		{
			if(!is_null($Password) && !empty($Password))
			{
				if(preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{8,18}$/', $Password) > 0)
					return Config::RET_OK;
				else return Config::INVALID_PASSWORD;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateRegistrationId($RegistrationId, $DefaultValue)
	{
		if(isset($RegistrationId))
		{
			if(!is_null($RegistrationId) && !empty($RegistrationId))
			{
				if(preg_match('/^(^([a-zA-Z]|[ ]|[0-9])+$)/', $RegistrationId) > 0)
					return Config::RET_OK;
				else return Config::INVALID_REGISTRATION_ID;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateServiceName($Service, $DefaultValue)
	{
		if(isset($Service))
		{
			if(!is_null($Service) && !empty($Service))
			{
				if(preg_match(
	                '/(^([a-zA-Z]|[.]|[-]|[_]|[0-9]|[^\x{0000}-\x{007F}])+(([ ])*([a-zA-Z]|[.]|[-]|[0-9]|[^\x{0000}-\x{007F}])*)*$)/', 
				   $Service) > 0)
					return Config::RET_OK;
				else return Config::INVALID_SERVICE_NAME;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateStringSize($String, $Size)
	{
		if(isset($String))
		{
			if(!is_null($String) && !empty($String))
			{
				if (strlen($String) <= $Size)
					return Config::RET_OK;
				else return Config::INVALID_STRING_SIZE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateSubject($Subject, $DefaultValue)
	{
		if(isset($Subject))
		{
			if(!is_null($Subject) && !empty($Subject) && $Subject != $DefaultValue)
			{
				if(preg_match('/(^([a-zA-Z]|[,]|[.]|[&]|[\']|[_]|[*])+(([ ])*([a-zA-Z]|[,]|[.]|[&]|[\']|[_]|[*])*)*$)/', $Subject) > 0)
					return Config::RET_OK;
				else return Config::INVALID_SUBJECT;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateTeamName($TeamName, $DefaultValue)
	{
		if(isset($TeamName))
		{
			if(!is_null($TeamName) && !empty($TeamName))
			{
				if(preg_match(
	               '/(^([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[_]|[*]|[0-9])+(([ ])*([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[_]|[*]|[0-9])*)*$)/', 
				   $TeamName) > 0)
					return Config::RET_OK;
				else return Config::INVALID_TEAM_NAME;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateTitle($Title, $DefaultValue)
	{
		if(isset($Title))
		{
			if(!is_null($Title) && !empty($Title))
			{
				if(preg_match('/(^([a-zA-Z]|[ ]|[^\x{0000}-\x{007F}])+$)/', $Title) > 0)
					return Config::RET_OK;
				else return Config::INVALID_TITLE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateTypeAssocUserService($TypeAssocUserServiceDescription, $DefaultValue)
	{
		if(isset($TypeAssocUserServiceDescription))
		{
			if(!is_null($TypeAssocUserServiceDescription) && !empty($TypeAssocUserServiceDescription))
			{
				if(preg_match('/(^([a-zA-Z])+$)/', $TypeAssocUserServiceDescription) > 0)
					return Config::RET_OK;
				else return Config::INVALID_TYPE_ASSOC_USER_SERVICE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateTypeService($TypeService, $DefaultValue)
	{
		if(isset($TypeService))
		{
			if(!is_null($TypeService) && !empty($TypeService))
			{
				if(preg_match('/(^([a-zA-Z]|[ ]|[_]|[^\x{0000}-\x{007F}])+$)/', $TypeService) > 0)
					return Config::RET_OK;
				else return Config::INVALID_TYPE_SERVICE;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateURL($Url, $DefaultValue)
	{
		if(isset($Url))
		{
			if(!is_null($Url) && !empty($Url))
			{
				if(strstr($Url, "http://") == FALSE && strstr($Url, "https://") == FALSE)
					$Url = "http://" . $Url;
				if (!filter_var($Url, FILTER_VALIDATE_URL) === false) 
					return Config::RET_OK;
				else return Config::INVALID_URL;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
	
	public function ValidateUserUniqueId($UserUniqueId, $DefaultValue)
	{
		if(isset($UserUniqueId))
		{
			if(!is_null($UserUniqueId) && !empty($UserUniqueId))
			{
				if(preg_match('/^[a-zA-Z_.-]{1,25}$/', $UserUniqueId) > 0)
					return Config::RET_OK;
				else return Config::INVALID_USER_UNIQUE_ID;
			}
			else return Config::INVALID_NULL;
		}
		else return Config::INVALID_NULL;
	}
}
?>