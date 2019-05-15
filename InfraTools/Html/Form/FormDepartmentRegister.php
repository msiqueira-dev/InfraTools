<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
        {$RETURN_CORPORATION_NAME_TEXT}
        {$RETURN_DEPARTMENT_INITIALS_TEXT}
		{$RETURN_DEPARTMENT_NAME_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_DEPARTMENT_REGISTER_FORM -->
<form name="{$FM_DEPARTMENT_REGISTER_FORM}" 
      id="{$FM_DEPARTMENT_REGISTER_FORM}" method="post">
    <!-- FIELD_DEPARTMENT_INITIALS -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_DEPARTMENT_INITIALS_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="{$FIELD_DEPARTMENT_INITIALS}" 
                               id="{$FIELD_DEPARTMENT_INITIALS}" 
                               class="{$RETURN_DEPARTMENT_INITIALS_CLASS}"
                               onblur="ValidateDepartmentInitials(null, '{$FIELD_DEPARTMENT_INITIALS}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_DEPARTMENT_REGISTER_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_REGISTER_SB}',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_REGISTER_SB}',
                                                 '');"
                               onchange="ValidateDepartmentInitials(null, '{$FIELD_DEPARTMENT_INITIALS}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_DEPARTMENT_REGISTER_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_REGISTER_SB}',
                                                 '');"
                               title="{$FIELD_DEPARTMENT_INITIALS_TEXT}"
                               value="{$FIELD_DEPARTMENT_INITIALS_VALUE}" maxlength="80" />
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_DEPARTMENT_NAME_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="{$FIELD_DEPARTMENT_NAME}" 
                               id="{$FIELD_DEPARTMENT_NAME}" 
                               class="{$RETURN_DEPARTMENT_NAME_CLASS}"
                               onblur="ValidateDepartmentName(null, '{$FIELD_DEPARTMENT_NAME}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_DEPARTMENT_REGISTER_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_REGISTER_SB}',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_REGISTER_SB}',
                                                 '');"
                               onchange="ValidateDepartmentName(null, '{$FIELD_DEPARTMENT_NAME}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_DEPARTMENT_REGISTER_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_DEPARTMENT_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_DEPARTMENT_REGISTER_SB}',
                                                 '');"
                               title="{$FIELD_DEPARTMENT_NAME_TEXT}"
                               value="{$FIELD_DEPARTMENT_NAME_VALUE}" maxlength="80" />
        </div>
    </div>
    <!-- FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_CORPORATION_NAME}</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="{$FIELD_CORPORATION_NAME}" 
                id="{$FIELD_CORPORATION_NAME}"
                class="{$RETURN_CORPORATION_NAME_CLASS}"
                onchange="SetSelectColor('{$FIELD_CORPORATION_NAME}');
                          document.getElementById('{$FM_DEPARTMENT_REGISTER_SB}').disabled = false;
				          document.getElementById('{$FM_DEPARTMENT_REGISTER_SB}').className = 'DivContentBodySubmitBigger SubmitEnabled;'">
                {if $FIELD_SEL_NONE neq FALSE}
                    <option value="{$FIELD_SEL_NONE}" selected='selected' >
                        {$FIELD_SEL_NONE_TEXT}
                    </option>
                {else}
                    <option value="{$FIELD_SEL_NONE}">
                        {$FIELD_SEL_NONE_TEXT}
                    </option>
                {/if}
                {foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_CORPORATION item=INSTANCE_CORPORATION}
                    {foreach key=key item=item from=$INSTANCE_CORPORATION}
                        {if FIELD_CORPORATION_NAME_VALUE eq $item->GetCorporationName()}
                            <option  selected='selected' value="{$item->GetCorporationName()}">
                                {$item->GetCorporationName()}
                            </option>
                        {else}
                            <option  value="{$item->GetCorporationName()}">
                                {$item->GetCorporationName()}
                            </option>
                        {/if}
                    {/foreach}
	            {/foreach}
            </select>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateCorporationName(null, '{$FIELD_CORPORATION_NAME}',
								   'DivContentBodySubmitBigger',
								   '{$FM_DEPARTMENT_REGISTER_SB}',
                                   '', true);
                      ValidateDepartmentInitials(null, '{$FIELD_DEPARTMENT_INITIALS}',
                                   'DivContentBodySubmitBigger',
                                   '{$FM_DEPARTMENT_REGISTER_SB}',
                                   '', true);
                     ValidateDepartmentName(null, '{$FIELD_DEPARTMENT_NAME}',
                                   'DivContentBodySubmitBigger',
                                   '{$FM_DEPARTMENT_REGISTER_SB}',
                                   '', true);
                      ValidateMultiplyFields(
                                   '{$FM_DEPARTMENT_REGISTER_FORM}',
                                   'DivContentBodySubmitBigger',
                                   '{$FM_DEPARTMENT_REGISTER_SB}',
                                   '');">
        <input type="submit" name="{$FM_DEPARTMENT_REGISTER_SB}" 
                                 id="{$FM_DEPARTMENT_REGISTER_SB}"
                                 class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
                                 value="{$SUBMIT_REGISTER}" {$SUBMIT_ENABLED} />
        <input type="submit" name="{$FM_DEPARTMENT_REGISTER_CANCEL}" 
                                 id="{$FM_DEPARTMENT_REGISTER_CANCEL}"
                                 class="DivContentBodySubmitBigger"
                                 value="{$SUBMIT_CANCEL}" />
    </div>
</form>