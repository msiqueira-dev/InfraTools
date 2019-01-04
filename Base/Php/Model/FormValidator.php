<?php

/************************************************************************
Class: FormValidator
Creation: 18/07/2014
Creator: Marcus Siqueira
Dependencies:
	
Description: 
			Classe FormValidator
			Classe existente para validar formulários e campos específicos.
			Exemplo: Validar um Id, que deve apenas ser constituido de números.
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
			public function ValidateIpAddress($IpAddress);
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
	const SUCCESS                         = "Success";
	const INVALID_BOOL                    = "ReturnInvalidBool";
	const INVALID_CORPORATION             = "ReturnInvalidCorporation";
	const INVALID_COUNTRY_NAME            = "ReturnInvalidCountryName";
	const INVALID_COUNTRY_REGION_CODE     = "ReturnInvalidCountryRegionCode";
	const INVALID_CAPTCHA                 = "ReturnInvalidCaptcha";
	const INVALID_CPF                     = "ReturnInvalidCpf";
	const INVALID_CPF_ELEVEN_NUMBER       = "ReturnInvalidCpfNotElevenNumber";
	const INVALID_CPF_SEQUENTIAL_NUMBER   = "ReturnInvalidCpfSequentialNumber";
	const INVALID_DATE                    = "ReturnInvalidDate";
	const INVALID_DATE_DAY                = "ReturnInvalidDateDay";
	const INVALID_DATE_MONTH              = "ReturnInvalidDateDay";
	const INVALID_DATE_YEAR               = "ReturnInvalidDateDay";
	const INVALID_DEFAULT_VALUE           = "ReturnInvalidDefaultValue";
	const INVALID_DEPARTMENT_INITIALS     = "ReturnInvalidDepartmentInitials";
	const INVALID_DEPARTMENT_NAME         = "ReturnInvalidDepartmentName";
	const INVALID_DESCRIPTION             = "ReturnInvalidDescription";
	const INVALID_EMAIL_ADDRESS           = "ReturnInvalidEmailAddress";
	const INVALID_HOST_NAME               = "ReturnInvalidHostName";
	const INVALID_GENDER                  = "ReturnInvalidGender";
	const INVALID_IP_ADDRESS              = "ReturnInvalidIpAddress";
	const INVALID_IP_MASK                 = "ReturnInvalidIpMask";
	const INVALID_NAME                    = "ReturnInvalidName";
	const INVALID_NON_NUMERIC             = "ReturnInvalidNonNumeric";
	const INVALID_NULL                    = "ReturnInvalidNull";
	const INVALID_NUMERIC                 = "ReturnInvalidNumeric";
	const INVALID_PASSWORD                = "ReturnInvalidPassword";
	const INVALID_REGISTRATION_ID         = "ReturnInvalidRegistrationId";
	const INVALID_SERVICE_NAME            = "ReturnInvalidServiceName";
	const INVALID_STRING_SIZE             = "ReturnInvalidStringSize";
	const INVALID_SUBJECT                 = "ReturnInvalidSubject";
	const INVALID_TEAM_NAME               = "ReturnInvalidTeamName";
	const INVALID_TITLE                   = "ReturnInvalidTitle";
	const INVALID_TYPE_ASSOC_USER_SERVICE = "ReturnInvalidTypeAssocUserService";
	const INVALID_TYPE_SERVICE            = "ReturnInvalidTypeService";
	const INVALID_URL                     = "ReturnInvalidUrl";
	const INVALID_USER_UNIQUE_ID          = "ReturnInvalidUniqueId";
	const INVALID_WHITE_SPACE             = "ReturnInvalidWhiteSpace";
	
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
		if($FunctionName == Config::FORM_VALIDATE_FUNCTION_BOOL)
			return $this->ValidateBool($Value);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_CORPORATION_NAME)
			return $this->ValidateCorporationName($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_COMPARE_STRING)
			return $this->ValidateCompareString($Value, $DefaultValue, $ArrayOption[0]);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_COUNTRY_NAME)
			return $this->ValidateCountryName($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE)
			return $this->ValidateCountryRegionCode($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_CPF)
			return $this->ValidateCpf($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_DATE)
			return $this->ValidateDate($Value[0], $Value[1], $Value[2], $DefaultValue[0], $DefaultValue[1], $DefaultValue[2]);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_DATE_DAY)
			return $this->ValidateDateDay($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_DATE_MONTH)
			return $this->ValidateDateMonth($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_DATE_YEAR)
			return $this->ValidateDateYear($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_INITIALS)
			return $this->ValidateDepartmentInitials($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME)
			return $this->ValidateDepartmentName($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_DESCRIPTION)
			return $this->ValidateDescription($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_EMAIL)
			return $this->ValidateEmail($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_GENDER)
			return $this->ValidateGender($Value, $DefaultValue);	
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_HOST)
			return $this->ValidateHost($Value);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_IP_ADDRESS)
			return $this->ValidateIpAddress($Value);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_IP_MASK)
			return $this->ValidateIpMask($Value);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_MESSAGE)
			return $this->ValidateMessage($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_NAME)
			return $this->ValidateName($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_NOT_NULL_OR_EMPTY)
			return $this->ValidateNotNullOrEmpty($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_NOT_NUMBER)
			return $this->ValidateIsNotNumericValue($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_NUMERIC)
			return $this->ValidateNumericValue($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_PASSWORD)
			return $this->ValidatePassword($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_REGISTRATION_ID)
			return $this->ValidateRegistrationId($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_SERVICE_NAME)
			return $this->ValidateServiceName($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_SUBJECT)
			return $this->ValidateSubject($Value, $DefaultValue, $ArrayOption);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_TEAM_NAME)
			return $this->ValidateTeamName($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_TITLE)
			return $this->ValidateTitle($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE)
			return $this->ValidateTypeAssocUserService($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_TYPE_SERVICE)
			return $this->ValidateTypeService($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_URL)
			return $this->ValidateURL($Value, $DefaultValue);
		elseif($FunctionName == Config::FORM_VALIDATE_FUNCTION_USER_UNIQUE_ID)
			return $this->ValidateUserUniqueId($Value, $DefaultValue);
		else return self::ERROR;
	}
	
	public function ValidateBool($Bool)
	{
		if(isset($Bool))
		{
			if($Bool != NULL && !empty($Bool))
			{
				if($Bool == TRUE || $Bool == FALSE)
					return self::SUCCESS;
				else return self::INVALID_BOOL;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateCorporationName($CorporationName, $DefaultValue)
	{
		if(isset($CorporationName))
		{
			if($CorporationName != NULL && !empty($CorporationName) && $CorporationName != $DefaultValue)
			{
				if(preg_match(
	               '/(^([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[*]|[0-9]|[^\x{0000}\x{007F}])+(([ ])*([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[*]|[0-9]|[^\x{0000}\x{007F}])*)*$)/', 
				   $CorporationName) > 0)
					return self::SUCCESS;
				else return self::INVALID_CORPORATION;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateCompareString($StringToCompare, $DefaultValue, $String)
	{
		if(isset($StringToCompare))
		{
			if($StringToCompare != NULL && !empty($StringToCompare) && $StringToCompare != $DefaultValue)
			{
				if($StringToCompare == $String)
					return self::SUCCESS;
				else return self::INVALID_CAPTCHA;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateCountryName($Country, $DefaultValue)
	{
		if(isset($Country))
		{
			if($Country != NULL && !empty($Country) && $Country != $DefaultValue)
			{
				if(preg_match(
	               '/((([A-Z]|([Å])|([(][A-Z]))(([a-z])|([ç])|([ã])|([é])|([í])|([ô])|([(])|([)])|([&])|([’]))+)|([(DRC)])|([(FYROM)])|([U.S.])|([&])|([d’])|([-])|([of])|([ ]))+/', 
				   $Country) > 0)
					return self::SUCCESS;
				else return self::INVALID_COUNTRY_NAME;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateCountryRegionCode($RegionCode, $DefaultValue)
	{
		if(isset($RegionCode))
		{
			if($RegionCode != NULL && !empty($RegionCode) && $RegionCode != $DefaultValue)
			{
				if(preg_match('/^[A-Z]{2}$/', $RegionCode) > 0)
					return self::SUCCESS;
				else return self::INVALID_COUNTRY_REGION_CODE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateCpf($Cpf, $DefaultValue)
	{
		if(isset($Cpf))
		{
			if ($Cpf != NULL && !empty($Cpf))
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
											return self::INVALID_CPF;
									}
									return self::SUCCESS;
								}
								else return self::INVALID_CPF_SEQUENTIAL_NUMBER;
							}
							else return self::INVALID_CPF_ELEVEN_NUMBER;
						}
						else return self::INVALID_NUMERIC;
					}
					else return self::INVALID_DEFAULT_VALUE;
				}
				else return self::INVALID_WHITE_SPACE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateDate($Year, $Month, $Day, $DefaultValueYear, $DefaultValueMonth, $DefaultValueDay)
	{
		if(isset($Year) && isset($Month) && isset($Day))
		{
			if (($Year != NULL  && !empty($Year))
			  &&($Month != NULL && !empty($Month)) 
			  &&($Day != NULL   && !empty($Day)))
			{
				if ($Year != $DefaultValueYear && $Month != $DefaultValueMonth && $Day != $DefaultValueDay)
				{
					if(checkdate($Month, $Day, $Year))
						return self::SUCCESS;
					else return self::INVALID_DATE;
				}
				else return self::INVALID_DEFAULT_VALUE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateDateDay($Day, $DefaultValue)
	{
		if(isset($Day))
		{
			if($Day != NULL && !empty($Day))
			{
				if($this->ValidateNumericValue($Day, "") == self::SUCCESS)
				{
					if($Day < 32 && $Day > 0)
						return self::SUCCESS;
					else return self::INVALID_DATE_DAY;
				}
				else return self::INVALID_DATE_DAY;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateDateMonth($Month, $DefaultValue)
	{
		if(isset($Month))
		{
			if($Month != NULL && !empty($Month))
			{
				if($this->ValidateNumericValue($Month, "") == self::SUCCESS)
				{
					if($Month < 12 && $Month > 0)
						return self::SUCCESS;
					else return self::INVALID_DATE_MONTH;
				}
				else return self::INVALID_DATE_MONTH;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateDateYear($Year, $DefaultValue)
	{
		if(isset($Year))
		{
			if($Year != NULL && !empty($Year))
			{
				if($this->ValidateNumericValue($Year, "") == self::SUCCESS)
				{
					if($Year < date("Y") && $Year >= 1940)
						return self::SUCCESS;
					else return self::INVALID_DATE_YEAR;
				}
				else return self::INVALID_DATE_YEAR;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateDepartmentInitials($DepartmentInitials, $DefaultValue)
	{
		if(isset($DepartmentInitials))
		{
			if($DepartmentInitials != NULL && !empty($DepartmentInitials))
			{
				if(preg_match(
	                '/(^([a-zA-Z]|[.]|[-]|[^\x{0000}-\x{007F}])+$)/', 
				   $DepartmentInitials) > 0)
					return self::SUCCESS;
				else return self::INVALID_DEPARTMENT_INITIALS;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateDepartmentName($DepartmentName, $DefaultValue)
	{
		if(isset($DepartmentName))
		{
			if($DepartmentName != NULL && !empty($DepartmentName))
			{
				if(preg_match(
	                '/(^([a-zA-Z]|[.]|[-]|[0-9]|[^\x{0000}-\x{007F}])+(([ ])*([a-zA-Z]|[.]|[-]|[0-9]|[^\x{0000}-\x{007F}])*)*$)/', 
				   $DepartmentName) > 0)
					return self::SUCCESS;
				else return self::INVALID_DEPARTMENT_NAME;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateDescription($Description, $DefaultValue)
	{
		if(isset($Description))
		{
			if($Description != NULL && !empty($Description))
			{
				if(preg_match('/(^([a-zA-Z]|[.]|[-]|[_]|[ ]|[0-9])*)$/', $Description) > 0)
					return self::SUCCESS;
				else return self::INVALID_DESCRIPTION;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateEmail($EmailAddress, $DefaultValue)
	{
		if(isset($EmailAddress))
		{
			if ($EmailAddress != NULL && !empty($EmailAddress))
			{
				if ($EmailAddress != "")
				{
					if ($EmailAddress != $DefaultValue)
					{
						if(filter_var($EmailAddress, FILTER_VALIDATE_EMAIL))
							return self::SUCCESS;
						else return self::INVALID_EMAIL_ADDRESS;
					}
					else return self::INVALID_DEFAULT_VALUE;
				}
				else return self::INVALID_NULL;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateGender($Gender, $DefaultValue)
	{
		if(isset($Gender))
		{
			if($Gender != NULL && !empty($Gender) && $Gender != $DefaultValue)
			{
				$arrayGender[0] = "M"; 
				$arrayGender[1] = "F";
				$arrayGender[2] = "O";
				if(in_array($Gender, $arrayGender))
					return self::SUCCESS;
				else return self::INVALID_GENDER;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateHost($Host)
	{
		if(isset($Host))
		{
			if($Host != NULL && !empty($Host))
			{
				if(strstr($Host, ".") && strlen($Host) > 3 && strlen($Host) < 255 && (!strstr($Host, "..")) && (!strstr($Host, " "))
				   && preg_match('/[a-zA-Z]+/', $Host) && (!strstr($Host, "@")) &&
				   !(preg_match('/([^.]*[.][0-9]*$)/', $Host)) && filter_var(FILTER_VALIDATE_URL) == true)
					return self::SUCCESS;
				else return self::INVALID_HOST_NAME;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateIsNotNumericValue($NonNumeric, $DefaultValue)
	{
		if(isset($NonNumeric))
		{
			if ($NonNumeric != NULL && !empty($NonNumeric))
			{
				if ($NonNumeric != "")
				{
					if ($NonNumeric != $DefaultValue)
					{
						if(!is_numeric($NonNumeric))
							return self::SUCCESS;
						else return self::INVALID_NON_NUMERIC;
					}
					else return self::INVALID_DEFAULT_VALUE;
				}
				else return self::INVALID_WHITE_SPACE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateIpAddress($IpAddress)
	{
		if(isset($IpAddress))
		{
			if($IpAddress != NULL && !empty($IpAddress))
			{
				if(preg_match('/^(?=\d+\.\d+\.\d+\.\d+$)(?:(?:25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]|[0-9])\.?){4}$/', $IpAddress) > 0)
					return self::SUCCESS;
				else return self::INVALID_IP_ADDRESS;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateIpMask($IpMask)
	{
		if(isset($IpMask))
		{
			if($IpMask != NULL && !empty($IpMask))
			{
				if($this->ValidateNumericValue($IpMask, "") == self::SUCCESS)
				{
					if($IpMask < 31 && $IpMask > 0)
						return self::SUCCESS;
					else return self::INVALID_IP_MASK;
				}
				else return self::INVALID_IP_MASK;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateMessage($Message, $DefaultValue)
	{
		if(isset($Message))
		{
			if($Message != NULL && !empty($Message) && $Message != $DefaultValue)
				return self::SUCCESS;
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateName($Name, $DefaultValue)
	{
		if(isset($Name))
		{
			if($Name != NULL && !empty($Name) && $Name != $DefaultValue)
			{
				if(preg_match(
				'/(^([a-zA-Z]|[^\x{0000}-\x{007F}])+(([ ])+([a-zA-Z]|[^\x{0000}-\x{007F}]|(([a-zA-Z]|[^\x{0000}-\x{007F}])[.]))+)+$)/'
				, $Name) > 0)
					return self::SUCCESS;
				else return self::INVALID_NAME;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateNotNullOrEmpty($NotNullOrEmpty, $DefaultValue)
	{
		if(isset($NotNullOrEmpty))
		{
			if ($NotNull != NULL && !empty($NotNullOrEmpty))
			{
				if ($NotNull != "")
				{
					if ($NotNull != $DefaultValue)
						return self::SUCCESS;
					else return self::INVALID_DEFAULT_VALUE;
				}
				else return self::INVALID_WHITE_SPACE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}

	public function ValidateNumericValue($Numeric, $DefaultValue)
	{
		if(isset($Numeric))
		{
			if ($Numeric != NULL && (!empty($Numeric) || $Numeric==0))
			{
				if ($Numeric != "")
				{
					if ($Numeric != $DefaultValue)
					{
						if(is_numeric($Numeric))
							return self::SUCCESS;
						else return self::INVALID_NUMERIC;
					}
					else return self::INVALID_DEFAULT_VALUE;
				}
				else return self::INVALID_WHITE_SPACE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidatePassword($Password, $DefaultValue)
	{
		
		if(isset($Password))
		{
			if($Password != NULL && !empty($Password))
			{
				if(preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{8,18}$/', $Password) > 0)
					return self::SUCCESS;
				else return self::INVALID_PASSWORD;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateRegistrationId($RegistrationId, $DefaultValue)
	{
		if(isset($RegistrationId))
		{
			if($RegistrationId != NULL && !empty($RegistrationId))
			{
				if(preg_match('/^(^([a-zA-Z]|[ ]|[0-9])+$)/', $RegistrationId) > 0)
					return self::SUCCESS;
				else return self::INVALID_REGISTRATION_ID;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateServiceName($Service, $DefaultValue)
	{
		if(isset($Service))
		{
			if($Service != NULL && !empty($Service))
			{
				if(preg_match(
	                '/(^([a-zA-Z]|[.]|[-]|[_]|[0-9]|[^\x{0000}-\x{007F}])+(([ ])*([a-zA-Z]|[.]|[-]|[0-9]|[^\x{0000}-\x{007F}])*)*$)/', 
				   $Service) > 0)
					return self::SUCCESS;
				else return self::INVALID_SERVICE_NAME;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateStringSize($String, $Size)
	{
		if(isset($String))
		{
			if($String != NULL && !empty($String))
			{
				if (strlen($String) <= $Size)
					return self::SUCCESS;
				else return self::INVALID_STRING_SIZE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateSubject($Subject, $DefaultValue, $ArrayOption)
	{
		if(isset($Subject))
		{
			if($Subject != NULL && !empty($Subject) && $Subject != $DefaultValue)
			{
				if(in_array($Subject, $ArrayOption))
					return self::SUCCESS;
				else return self::INVALID_SUBJECT;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateTeamName($TeamName, $DefaultValue)
	{
		if(isset($TeamName))
		{
			if($TeamName != NULL && !empty($TeamName))
			{
				
				if(preg_match(
	               '/(^([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[_]|[*]|[0-9])+(([ ])*([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[_]|[*]|[0-9])*)*$)/', 
				   $TeamName) > 0)
					return self::SUCCESS;
				else return self::INVALID_TEAM_NAME;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateTitle($Title, $DefaultValue)
	{
		
		if(isset($Title))
		{
			if($Title != NULL && !empty($Title))
			{
				if(preg_match('/(^([a-zA-Z]|[ ]|[^\x{0000}-\x{007F}])+$)/', $Title) > 0)
					return self::SUCCESS;
				else return self::INVALID_TITLE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateTypeAssocUserService($TypeAssocUserServiceDescription, $DefaultValue)
	{
		if(isset($TypeAssocUserServiceDescription))
		{
			if($TypeAssocUserServiceDescription != NULL && !empty($TypeAssocUserServiceDescription))
			{
				if(preg_match('/(^([a-zA-Z])+$)/', $TypeAssocUserServiceDescription) > 0)
					return self::SUCCESS;
				else return self::INVALID_TYPE_ASSOC_USER_SERVICE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateTypeService($TypeService, $DefaultValue)
	{
		
		if(isset($TypeService))
		{
			if($TypeService != NULL && !empty($TypeService))
			{
				if(preg_match('/(^([a-zA-Z]|[ ]|[_]|[^\x{0000}-\x{007F}])+$)/', $TypeService) > 0)
					return self::SUCCESS;
				else return self::INVALID_TYPE_SERVICE;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateURL($Url, $DefaultValue)
	{
		if(isset($Url))
		{
			if($Url != NULL && !empty($Url))
			{
				if(strstr($Url, "http://") == FALSE && strstr($Url, "https://") == FALSE)
					$Url = "http://" . $Url;
				if (!filter_var($Url, FILTER_VALIDATE_URL) === false) 
					return self::SUCCESS;
				else return self::INVALID_URL;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
	
	public function ValidateUserUniqueId($UserUniqueId, $DefaultValue)
	{
		if(isset($UserUniqueId))
		{
			if($UserUniqueId != NULL && !empty($UserUniqueId))
			{
				if(preg_match('/^[a-zA-Z_.-]{1,25}$/', $UserUniqueId) > 0)
					return self::SUCCESS;
				else return self::INVALID_USER_UNIQUE_ID;
			}
			else return self::INVALID_NULL;
		}
		else return self::INVALID_NULL;
	}
}
?>