<?php
/************************************************************************
Class: PageForm.php
Creation: 2018/06/04
Creator: Marcus Siqueira
Dependencies:
			Base - Php/Controller/Factory.php
Description: 
			Class with Singleton pattern for PageForm
Functions: 
			public Validate();
			protected function ValidateField($FieldId, $FunctionName, $FieldValue, $FieldDefaultValue, 
			                                 InstanceLanguageText, $Language,
			                                 $MinSize, $MaxSize, $Nullable,
								             &$ReturnFieldText, &$ReturnEmptyText, &$ReturnFieldClass, &$ArrayConstants);
			public function ValidateFields($ArrayElements, $ArrayElementsDefaultValue, $ArrayElementsInput, 
							               $ArrayElementsMinValue, $ArrayElementsMaxValue, $ArrayElementsNullable, 
							               ArrayFormFunction, InstanceLanguageText, $Language,
										   &$ArrayElementsClass, &$ArrayElementsText, &$ElementEmptyText, &$MatrixConstants, $Debug
										   &$ArrayOptions = NULL, &$ArrayExtraFieldSameValue = NULL);
**************************************************************************/

if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Config');
}

if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

class PageForm
{
	protected static $Instance;
	protected        $Factory = NULL;

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	private function __construct() 
	{
		$this->Factory = Factory::__create();
	}
	
	/* Singleton */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	protected function ValidateField($FieldId, $FunctionName, $FieldValue, $FieldDefaultValue, $InstanceLanguageText, 
									 $Language, $MinSize, $MaxSize, $Nullable,
								     &$ReturnFieldText, &$ReturnEmptyText, &$ReturnFieldClass, &$ArrayConstants, 
								     &$ArrayOptions, $ExtraFieldSameValue)
	{
		if(empty($FieldValue))
		{
			if($Nullable) return Config::RET_OK;
			$this->InputFocus      = $FieldId;
			$ReturnEmptyText = $InstanceLanguageText->GetConstant(array_pop($ArrayConstants), $Language);
			return $ReturnFieldClass = Config::FIELD_RETURN_ERROR;
		} else array_pop($ArrayConstants);
		if($MaxSize != 0 || $MinSize != 0)
		{
			if(strlen($FieldValue) > $MaxSize || strlen($FieldValue) < $MinSize)
			{
				$this->InputFocus = $FieldId;
				$ReturnFieldText  = $InstanceLanguageText->GetConstant(array_pop($ArrayConstants), $Language);
				return $ReturnFieldClass = Config::FIELD_RETURN_ERROR;
			} else array_pop($ArrayConstants);
		}
		if($ExtraFieldSameValue != NULL)
		{
			if($FieldValue != $ExtraFieldSameValue)
			{
				$this->InputFocus = $FieldId;
				$ReturnFieldText  = $InstanceLanguageText->GetConstant(array_pop($ArrayConstants), $Language);
				return $ReturnFieldClass = Config::FIELD_RETURN_ERROR;
			} else array_pop($ArrayConstants);
		}
		$FormValidator = $this->Factory->CreateFormValidator();
		$return = $FormValidator->ExecuteValidation($FunctionName, $FieldValue, $FieldDefaultValue, $ArrayOptions);
		if($return != Config::RET_OK)
		{
			$this->InputFocus = $FieldId;
			$ReturnFieldText  = $InstanceLanguageText->GetConstant(array_pop($ArrayConstants), $Language);
			return $ReturnFieldClass  = Config::FIELD_RETURN_ERROR;
		}
		array_pop($ArrayConstants);
		return Config::RET_OK;
	}
	
	public function ValidateFields($ArrayElements, $ArrayElementsDefaultValue, $ArrayElementsInput, 
							       $ArrayElementsMinValue, $ArrayElementsMaxValue, $ArrayElementsNullable, 
							       $ArrayFormFunction, $InstanceLanguageText, $Language, 
								   &$ArrayElementsClass, &$ArrayElementsText, &$ElementEmptyText, &$MatrixConstants, $Debug,
								   &$MatrixOptions = NULL, &$ArrayExtraFieldSameValue = NULL)
	{
		$arrayReturn = array();
		if(count($ArrayElements) > 0 && count($ArrayElementsInput) > 0 && count($ArrayElementsClass) > 0 &&
		   count($ArrayElementsText) > 0 && count($ArrayFormFunction) > 0 && count($MatrixConstants) > 0)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
					echo "&emsp;&emsp;<b>ValidateFields</b>:<br>";
			for($index = 0; $index < count($ArrayElements); $index++)
			{
				$element             = $ArrayElements[$index];
				$elementClass        = $ArrayElementsClass[$index];
				$elementDefaultValue = $ArrayElementsDefaultValue[$index];
				$elementInput        = $ArrayElementsInput[$index];
				$elementMinValue     = $ArrayElementsMinValue[$index];
				$elementMaxValue     = $ArrayElementsMaxValue[$index];
				$elementNullable     = $ArrayElementsNullable[$index];
				if(isset($ArrayElementsText[$index]))
					$elementText         = $ArrayElementsText[$index];
				$formFunction        = $ArrayFormFunction[$index];
				$arrayConstants      = $MatrixConstants[$index];
				if(isset($MatrixOptions[$index]))
				{
					if(isset($MatrixOptions[$index][0]))
						$arrayOptions        = $MatrixOptions[$index];
				}
				else $arrayOptions = NULL;
				if($ArrayExtraFieldSameValue != NULL)
				{
					if(count($ArrayExtraFieldSameValue) > 0)
					{
						if(isset($ArrayExtraFieldSameValue[$index]))
						   $elementExtraFieldSameValue = $ArrayExtraFieldSameValue[$index];
						else $elementExtraFieldSameValue = NULL;
					} else $elementExtraFieldSameValue = NULL;
				} else $elementExtraFieldSameValue = NULL;
				$return = $this->ValidateField($element, $formFunction, $elementInput, $elementDefaultValue, 
											   $InstanceLanguageText, $Language, $elementMinValue, $elementMaxValue, 
											   $elementNullable, $ArrayElementsText[$index], $ElementEmptyText, 
											   $elementClass, $arrayConstants,
											   $MatrixOptions[$index], $elementExtraFieldSameValue);
				if($Debug == Config::CHECKBOX_CHECKED)
				{
					echo "&emsp;&#8195;&#8195;<b>$element</b>: $elementInput - $formFunction - $return - $ArrayElementsText[$index]";
					if(isset($ElementEmptyText))
					{
						if($ElementEmptyText != NULL)
							echo " - $ElementEmptyText";
					}
					if($MatrixOptions[$index] != NULL)
					{
						if(is_array($MatrixOptions[$index]))
						{
							foreach($MatrixOptions[$index] as $value)
								echo " - $value";
						}
						else echo " - $MatrixOptions[$index]";	
					}
					echo "<br>";
				}
				if($return != Config::RET_OK)
					$ArrayElementsText[$index] = $ArrayElementsText[$index] . "<br>"; 
				array_push($arrayReturn, $return);
			}
			if(isset($ElementEmptyText))
			{
				if($ElementEmptyText != "")
					$ElementEmptyText = $ElementEmptyText . "<br>";
			}
			if(count($arrayReturn) > 0)
			{
				for($index = 0; $index < count($arrayReturn); $index++)
				{
					if($arrayReturn[$index] != Config::RET_OK)
						return Config::RET_ERROR;
				}
				return Config::RET_OK;
			}
			else return Config::RET_ERROR;
		}
		else return Config::RET_ERROR;
	}
	
	public function ValidateSpecificField($FunctionName, $FieldValue, $FieldDefaultValue, $ArrayOptions)
	{
		$FormValidator = $this->Factory->CreateFormValidator();
		return $FormValidator->ExecuteValidation($FunctionName, $FieldValue, $FieldDefaultValue, $ArrayOptions);
	}
	
}
?>