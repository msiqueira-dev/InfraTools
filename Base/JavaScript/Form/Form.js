function ClearDivInitialFieldText(InputId)
{
	var $input = document.getElementsByName(InputId)[0];
	if ($input != null)
	{
		if($input.tagName == 'INPUT')
		{
			$input.value = "";
			$input.className = "DivContentBodyElementsFieldInput InputAfterText";
			return true;
		}
		else return false;
	}
	else return false;
}

function ChangeSliderCssClass(Id, CssClass1, CssClass2)
{
	var $ele = document.getElementById(Id);
	if($ele.className.search(CssClass2) != -1)
		$ele.className = $ele.className.replace(CssClass2, CssClass1);
	else $ele.className = CssClass1 + " " + CssClass2 + " " + "round";
}

function ClickHiddenCheckBox(CheckBoxId)
{
	document.getElementById(CheckBoxId).click();
}

function InputTitleTextToValue(InputId)
{
	var $input = document.getElementsByName(InputId)[0];
	if ($input.value == "" || $input.value == $input.title)
	{
		$input.value = $input.title;
		$input.className = "DivContentBodyElementsFieldInput InputBeforeText";
	}
}

function KeyEnterClickButton(BtnId)
{
	if (event.keyCode === 13) 
    	document.getElementById(BtnId).click();
}

function MakeInputVisible(InputIdToSee)
{
	var $inputToSee = document.getElementsByName(InputIdToSee)[0];
	$inputToSee.className = $inputToSee.className.replace("Hidden", "NotHidden");
}

function ShowOrHideElement(ElementToShowOrHide, Show)
{
	var $elementToShowOrHide = document.getElementById(ElementToShowOrHide);
	var $inputs = $elementToShowOrHide.getElementsByTagName('INPUT');
	if(Show)
	{
		if(!$elementToShowOrHide.className.search("NotHidden") != -1)
		{
			$elementToShowOrHide.className = $elementToShowOrHide.className.replace("Hidden", "NotHidden");
			for (var $index = 0; $index < $inputs.length; $index++) 
			{
				if($inputs[$index].type == "hidden")
				{
					$inputs[$index].type = "input";
				}
			}
		}
	}
	else
	{
		if($elementToShowOrHide.className.search("NotHidden") != -1)
		{
			$elementToShowOrHide.className = $elementToShowOrHide.className.replace("NotHidden", "Hidden");	
			for (var $index = 0; $index < $inputs.length; $index++) 
			{
				if($inputs[$index].type == "text")
				{
					$inputs[$index].type = "hidden";
				}
			}
		}
	}
}

function ShowOrHideElementByRadioSelection(Element1, Element1Radio, Element2, Element2Radio)
{
	var $radio1 = document.getElementById(Element1Radio);
	var $radio2 = document.getElementById(Element2Radio);
	var $Element1 = document.getElementById(Element1);
	var $Element2 = document.getElementById(Element2);
	if($radio1.checked == true)
	{
		if(!$Element1.className.search("NotHidden") != -1)
			$Element1.className = $Element1.className.replace("Hidden", "NotHidden");
		if(!$Element2.className.search("Hidden") != -1)
			$Element2.className = $Element2.className.replace("NotHidden", "Hidden");
	}
	else
	{
		if(!$Element2.className.search("NotHidden") != -1)
			$Element2.className = $Element2.className.replace("Hidden", "NotHidden");
		if(!$Element1.className.search("Hidden") != -1)
			$Element1.className = $Element1.className.replace("NotHidden", "Hidden");
	}
}

function SetFocusOnField(Field)
{
	document.getElementById(Field).focus();
}

function SetSelectColor(SelectId)
{
	var $select = document.getElementsByName(SelectId)[0];
	if($select.selectedIndex != 0)
	{
		$select.style.color = "black";
		$select.className = $select.className.replace("InputAlertText" , "");
	}
}

function SubmitNewForm(Id, Method, Name)
{
	var form = document.createElement("form");
	var element = document.createElement("input");
	form.method = Method;
	form.id = Id;
	form.name = Name
	element.value = Id;
    element.name = Name;
    form.appendChild(element);  
	document.body.appendChild(form);
	form.submit();
}

function SubmitForm(Form)
{
	document.getElementsByName('HiddenTextForm')[0].value = Form;
	document.forms[Form].submit();
}

function SwitchElementVisibility(ElementIdToHideId, ElementIdToSeeId, InputId)
{
	var $elementToHide = document.getElementById(ElementIdToHideId);
	var $elementToSee = document.getElementById(ElementIdToSeeId);
	if($elementToHide.className.search("NotHidden") != -1)
		$elementToHide.className = $elementToHide.className.replace("NotHidden", "Hidden");
	else if($elementToHide.className.search("null") != -1)
		$elementToHide.className = $elementToHide.className.replace("null", "Hidden");
	else if($elementToHide.className.search("Hidden") == -1)
		$elementToHide.className = $elementToHide.className + " " + "Hidden";
	if($elementToSee.className.search("Hidden") != -1)
		$elementToSee.className = $elementToSee.className.replace("Hidden", "NotHidden");
	else if($elementToSee.className.search("null") != -1)
		$elementToSee.className = $elementToSee.className.replace("null", "NotHidden");
	else if($elementToSee.className.search("NotHidden") == -1)
		$elementToSee.className = $elementToHide.className + " " + "NotHidden";
	if(InputId != null)
	{
		var $input = document.getElementById(InputId);
		$input.className = $input.className.replace("NotHidden", "Hidden");
	}
}

function ValidateCorporation(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /(^([a-zA-Z]|[,]|[.]|[&]|[']|[-]|[*]|[0-9]|[^\u0000-\u007F])+(([ ])*([a-zA-Z]|[,]|[.]|[&]|[']|[-]|[*]|[0-9]|[^\u0000-\u007F])*)*$)/;
	if ($input.value != $input.title && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateCpf(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $soma = 0; 
	var $resto;
	var $input = document.getElementsByName(InputId)[0];
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if ($input.value == "00000000000")
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false; 
		}
		for (i=1; i<=9; i++)
		{
			$soma = $soma + parseInt($input.value.substring(i-1, i)) * (11 - i);
		}
		$resto = ($soma * 10) % 11;
		if (($resto == 10) || ($resto == 11)) 
		{
			$resto = 0;
		}
		if ($resto != parseInt($input.value.substring(9, 10)))
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		$soma = 0;
		for (i = 1; i <= 10; i++)
		{
			$soma = $soma + parseInt($input.value.substring(i-1, i)) * (12 - i);
		}
		$resto = ($soma * 10) % 11;
		if (($resto == 10) || ($resto == 11)) 
		{
			$resto = 0;
		}
		if ($resto != parseInt($input.value.substring(10, 11) )) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		$input.className = DefaultInputClass + " InputAfterText";
		return true;
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateDepartmentInitials(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /(^([a-zA-Z]|[.]|[-]|[^\u0000-\u007F])+$)/;
	if ($input.value != $input.title && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateDepartmentName(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /(^([a-zA-Z]|[.]|[-]|[0-9]|[^\u0000-\u007F])+(([ ])*([a-zA-Z]|[.]|[-]|[0-9]|[^\u0000-\u007F])*)*$)/;
	if ($input.value != $input.title && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateDescription(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
    var $filter = /(^([a-zA-Z]|[.]|[-]|[_]|[ ]|[0-9])*)$/;
	
	if($input.className == "Hidden ")
		return false;
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			$input.focus;
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateEmail(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
    var $filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if($input != null)
	{
		if($input.className == "Hidden ")
			return false;
		if($input.className.search('FormFieldNotObligatory') != -1)
			DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
		if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
		{
			if (!$filter.test($input.value)) 
			{
				$input.focus;
				if(HighlightInput == true)
					$input.className = DefaultInputClass + " InputAlertText";
				$submit.className = DefaultSubmitClass + " SubmitDisabled";
				$submit.disabled = true;
				return false;
			}
			else
			{
				$input.className = DefaultInputClass + " InputAfterText";
				$submit.className = DefaultSubmitClass + " SubmitEnabled";
				$submit.disabled = false;
				return true;
			}
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
	}
}

function ValidateHasCharacters(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $value = $input.value;
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitEnabled";
		$submit.disabled = false;
		return true;
	}
	else
	{
		if(HighlightInput == true)
			$input.className = DefaultInputClass + " InputAlertText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateHostAndPort(DefaultInputHostClass, DefaultInputHostPortClass, InputHostId, InputHostPortId, DefaultSubmitClass,  
                             SubmitId, DefaultValue, HighlightFirstInput, HighlightSecondtInput)
{
	var $returnHost;
	var $returnHostPort;
	var $submit = document.getElementsByName(SubmitId)[0];
	$returnHost = ValidateHostName(DefaultInputHostClass, InputHostId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightFirstInput);
	$returnHostPort = ValidateNumbersOnly(DefaultInputHostPortClass, InputHostPortId, DefaultSubmitClass, SubmitId, DefaultValue,
	                                      HighlightSecondtInput);
	if($returnHost == false || $returnHostPort == false)
	{
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
	
}

function ValidateHostName(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $value = $input.value;
	if($value.search("http://") != -1)
		$value = $value.replace("http://", "");
	else if($value.search("https://") != -1)
		$value = $value.replace("https://", "");
	if($value[$value.length-1] == "/")
		$value = $value.slice(0, $value.length-1);
	var $filter = /([.][.])|([.]$)|([.].$)|([@])|([|])|([ ])|([^.]*[.][0-9]*$)/;
	if ($value != $input.title && $value != "" && $input.value != DefaultValue)
	{
		if($value.length < 3 || $value.length > 255 || $value.indexOf('.') == -1 
	      || $filter.test($value) || $value[0] == ".")
		{
			$input.focus;
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateInputChangedRadio(DivId, DefaultSubmitClass, SubmitId, SearchField)
{
	var $div = document.getElementById(DivId);
	var $submit = document.getElementsByName(SubmitId)[0];
	if($div.hasChildNodes())
	{
		for(var $x = 0; $x < $div.childNodes.length; $x++)
		{
			var $child = $div.childNodes[$x];
			if($child.tagName == 'INPUT')
			{
				if(SearchField != null)
				{
					if($child.id.search(SearchField) != -1)
					{
						if($child.className.search('InputAlertText') != -1)
						{
							$submit.className = DefaultSubmitClass + " SubmitDisabled";
							$submit.disabled = true;
							return;
						}
						else if($child.value == "")
						{
							$submit.className = DefaultSubmitClass + " SubmitDisabled";
							$submit.disabled = true;
							return;
						}
						else
						{
							$submit.className = DefaultSubmitClass + " SubmitEnabled";
							$submit.disabled = false;
						}
					}
				}
				else
				{
					if($child.className.search('InputAlertText') != -1)
					{
						$submit.className = DefaultSubmitClass + " SubmitDisabled";
						$submit.disabled = true;
						return;
					}
					else if($child.value == "")
					{
						$submit.className = DefaultSubmitClass + " SubmitDisabled";
						$submit.disabled = true;
						return;
					}
					else
					{
						$submit.className = DefaultSubmitClass + " SubmitEnabled";
						$submit.disabled = false;
					}
				}
			}
		}
	}
}

function ValidateInputsOnlyOneFilled(DefaultInputClass,InputId1, InputId2, DefaultSubmitClass, SubmitId)
{
	var $input1 = document.getElementsByName(InputId1)[0];
	var $input2 = document.getElementsByName(InputId2)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	if($input1.value.length > 0 && $input2.value.length > 0)
	{
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
	else
	{
		if($input1.className.includes("InputAlertText") == false && $input2.className.includes("InputAlertText"))
		{
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
}

function ValidateIpAddressIpv4(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /^(?=\d+\.\d+\.\d+\.\d+$)(?:(?:25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]|[0-9])\.?){4}$/;
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			$input.focus();
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateIpAndPort(DefaultInputIpClass, DefaultInputIpPortClass, InputIpId, InputIpPortId, DefaultSubmitClass, SubmitId, 
                           DefaultValue, HighlightFirstInput, HighlightSecondtInput)
{
	var $returnIp;
	var $returnIpPort;
	var $submit = document.getElementsByName(SubmitId)[0];
	$returnIp = ValidateIpAddressIpv4(DefaultInputIpClass, InputIpId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightFirstInput);
	$returnIpPort = ValidateNumbersOnly(DefaultInputIpPortClass, InputIpPortId, DefaultSubmitClass, SubmitId, DefaultValue,
	                                      HighlightSecondtInput);
	if($returnIp == false || $returnIpPort == false)
	{
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
	
}

function ValidateLettersOnly(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (!isNaN($input.value))
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateMultiplyFields(Id, DefaultSubmitClass, SubmitId, DefaultValue)
{
	var $element = document.getElementsByName(Id)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $inputs = $element.getElementsByTagName('INPUT');
	var $selects = $element.getElementsByTagName('SELECT');
	var $textAreas = $element.getElementsByTagName('TEXTAREA');
	for (var $index = 0; $index < $selects.length; $index++) 
	{
		if($selects[$index].selectedIndex == 0)
		{
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
		}
	}
	for (var $index = 0; $index < $inputs.length; $index++) 
	{
		if($inputs[$index].type != "submit" && $inputs[$index].type != "hidden" && $inputs[$index].type != "radio"
		   && $inputs[$index].id != "")
		{
			if(($inputs[$index].className.search('InputAlertText') != -1 
			|| $inputs[$index].value == ""
			|| $inputs[$index].value == DefaultValue
			|| $inputs[$index].value == $inputs[$index].title
			|| $inputs[$index].value.length == 0)
			&& $inputs[$index].className.search('FormFieldNotObligatory') == -1)
			{
				$submit.className = DefaultSubmitClass + " SubmitDisabled";
				$submit.disabled = true;
				return false;
			}
			else
			{
				$submit.className = DefaultSubmitClass + " SubmitEnabled";
				$submit.disabled = false;
			}
		}
	}
	for (var $index = 0; $index < $textAreas.length; $index++) 
	{
		if($textAreas[$index].type != 'submit' && $textAreas[$index].type != 'hidden')
		{
			if($textAreas[$index].className.search('InputAlertText') != -1 
			|| $textAreas[$index].value == ""
			|| $textAreas[$index].value == DefaultValue
			|| $textAreas[$index].value == $textAreas[$index].title)
			{
				$submit.className = DefaultSubmitClass + " SubmitDisabled";
				$submit.disabled = true;
				return false;
			}
			else
			{
				$submit.className = DefaultSubmitClass + " SubmitEnabled";
				$submit.disabled = false;
			}
		}
	}
	return true;
}

function ValidateName(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /(^([a-zA-Z]|[^\u0000-\u007F])+(([ ])+([a-zA-Z]|[^\u0000-\u007F]|(([a-zA-Z]|[^\u0000-\u007F])[.]))+)+$)/;
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateNotNull(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitEnabled";
		$submit.disabled = false;
		return true;
	}
	else
	{
		$input.className = DefaultInputClass + " InputAlertText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateNumberSize(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, NumberSize, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (isNaN($input.value))
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			if($input.value > NumberSize || $input.value < 0)
			{
				$input.className = DefaultInputClass + " InputAlertText";
				$submit.className = DefaultSubmitClass + " SubmitDisabled";
				$submit.disabled = true;
				return false;
			}
			else
			{
				$input.className = DefaultInputClass + " InputAfterText";
				$submit.className = DefaultSubmitClass + " SubmitEnabled";
				$submit.disabled = false;
				return true;
			}
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateNumbersOnly(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (isNaN($input.value))
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidatePassword(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{8,18}$/;
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateRegistrationId(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{	
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /(^([a-zA-Z]|[ ]|[0-9])+$)/;
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateSelectOption(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $select = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	if ($select.value != $select.title && $select.value != DefaultValue && $select.selectedIndex != 0)
	{
		$select.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitEnabled";
		$submit.disabled = false;
		return true;
	}
	else
	{
		$select.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateServiceName(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /(^([a-zA-Z]|[,]|[.]|[&]|[']|[-]|[_]|[*]|[0-9]|[^\u0000-\u007F])+(([ ])*([a-zA-Z]|[,]|[.]|[&]|[']|[-]|[*]|[0-9]|[^\u0000-\u007F])*)*$)/;
	if ($input.value != $input.title && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateTeamName(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /^([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[_]|[*]|[0-9])+(([ ])*([a-zA-Z]|[,]|[.]|[&]|[\']|[-]|[_]|[*]|[0-9])*)*$/;
	if ($input.value != $input.title && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateTitle(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{	
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
	var $filter = /(^([a-zA-Z]|[ ]|[^\u0000-\u007F])+$)/;
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}

function ValidateUserUniqueId(DefaultInputClass, InputId, DefaultSubmitClass, SubmitId, DefaultValue, HighlightInput)
{
	var $input = document.getElementsByName(InputId)[0];
	var $submit = document.getElementsByName(SubmitId)[0];
    var $filter = /^[a-zA-Z_.-]{2,45}$/;
	
	if($input.className == "Hidden ")
		return false;
	if($input.className.search('FormFieldNotObligatory') != -1)
		DefaultInputClass = DefaultInputClass + " " + "FormFieldNotObligatory" + " ";
	if ($input.value != $input.title && $input.value != "" && $input.value != DefaultValue)
	{
		if (!$filter.test($input.value)) 
		{
			$input.focus;
			if(HighlightInput == true)
				$input.className = DefaultInputClass + " InputAlertText";
			$submit.className = DefaultSubmitClass + " SubmitDisabled";
			$submit.disabled = true;
			return false;
		}
		else
		{
			$input.className = DefaultInputClass + " InputAfterText";
			$submit.className = DefaultSubmitClass + " SubmitEnabled";
			$submit.disabled = false;
			return true;
		}
	}
	else
	{
		$input.className = DefaultInputClass + " InputAfterText";
		$submit.className = DefaultSubmitClass + " SubmitDisabled";
		$submit.disabled = true;
		return false;
	}
}