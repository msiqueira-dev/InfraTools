<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_DEPARTMENT_INITIALS_TEXT}
		{$RETURN_DEPARTMENT_NAME_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_DEPARTMENT_UPDT_FORM -->
<form name="{$FM_DEPARTMENT_UPDT_FORM}" id="{$FM_DEPARTMENT_UPDT_FORM}" method="{$FORM_METHOD}">
    <!-- FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
       <div class="DivContentBodyContainerLabel">
           <label>{$FIELD_CORPORATION_NAME_TEXT} : </label>
       </div>
       <div class="DivContentBodyContainerValue">
           <label class="DivContentBodyContainerValueContent">{$FIELD_CORPORATION_NAME_VALUE}</label>
       </div>
    </div>
    <!-- FIELD_DEPARTMENT_INITIALS -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_DEPARTMENT_INITIALS_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="{$FIELD_DEPARTMENT_INITIALS}" 
                               id="{$FIELD_DEPARTMENT_INITIALS}" 
                               class="{$RETURN_DEPARTMENT_INITIALS_CLASS}"
                               onblur="ValidateDepartmentInitials(null, 
                                                  '{$FIELD_DEPARTMENT_INITIALS}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_DEPARTMENT_UPDT_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_UPDT_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_UPDT_SB}',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_UPDT_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_UPDT_SB}',
                                                 '');"
                               onchange="ValidateDepartmentInitials(null, 
                                                  '{$FIELD_DEPARTMENT_INITIALS}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_DEPARTMENT_UPDT_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_UPDT_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_UPDT_SB}',
                                                 '');"
                               title="{$FIELD_DEPARTMENT_INITIALS_TEXT}"
                               value="{$FIELD_DEPARTMENT_INITIALS_VALUE}" maxlength="8" />
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_DEPARTMENT_NAME_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="{$FIELD_DEPARTMENT_NAME}" 
                               id="{$FIELD_DEPARTMENT_NAME}" 
                               class="{$RETURN_DEPARTMENT_NAME_CLASS}"
                               onblur="ValidateDepartmentName(null, '{$FIELD_DEPARTMENT_NAME}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_DEPARTMENT_UPDT_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_UPDT_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_UPDT_SB}',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_UPDT_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_UPDT_SB}',
                                                 '');"
                               onchange="ValidateDepartmentName(null, '{$FIELD_DEPARTMENT_NAME}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_DEPARTMENT_UPDT_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_UPDT_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_UPDT_SB}',
                                                 '');"
                               title="{$FIELD_DEPARTMENT_NAME_TEXT}"
                               value="{$FIELD_DEPARTMENT_NAME_VALUE}" maxlength="80" />
        </div>
    </div>
    <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_REGISTER_DATE_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_REGISTER_DATE_VALUE}</label>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDepartmentName(null, '{$FIELD_DEPARTMENT_NAME}',
								   'DivContentBodySubmit',
								   '{$FM_DEPARTMENT_UPDT_SB}',
								   '', true);
                      ValidateMultiplyFields(
                                   '{$FM_DEPARTMENT_UPDT_FORM}',
                                   'DivContentBodySubmitBigger',
                                   '{$FM_DEPARTMENT_UPDT_SB}',
                                   '');">
        <input type="submit" name="{$FM_DEPARTMENT_UPDT_SB}" 
                                 id="{$FM_DEPARTMENT_UPDT_SB}"
                                 class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
                                 value="{$SUBMIT_UPDT}"
                                 {$SUBMIT_ENABLED} />
        <input type="submit" name="{$FM_DEPARTMENT_UPDT_CANCEL}" 
                                 id="{$FM_DEPARTMENT_UPDT_CANCEL}"
                                 class="DivContentBodySubmitBigger"
                                 value="{$SUBMIT_CANCEL}" />
    </div>
</form>