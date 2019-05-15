<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
        {$RETURN_CORPORATION_ACTIVE_TEXT}
		{$RETURN_CORPORATION_NAME_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_CORPORATION_UPDT_FORM -->
<form name="{$FM_CORPORATION_UPDT_FORM}" id="{$FM_CORPORATION_UPDT_FORM}" method="post">
    <!-- FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_CORPORATION_NAME_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="text" name="{$FIELD_CORPORATION_NAME}" 
                               id="{$FIELD_CORPORATION_NAME}" 
                               class="{$RETURN_CORPORATION_NAME_CLASS}"
                               onblur="ValidateCorporationName(null, '{$FIELD_CORPORATION_NAME}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_CORPORATION_UPDT_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_CORPORATION_UPDT_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_CORPORATION_UPDT_SB}',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '{$FM_CORPORATION_UPDT_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_CORPORATION_UPDT_SB}',
                                                 '');"
                               onchange="ValidateCorporationName(null, '{$FIELD_CORPORATION_NAME}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_CORPORATION_UPDT_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_CORPORATION_UPDT_SB}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_CORPORATION_UPDT_SB}',
                                                 '');"
                               title="{$FIELD_CORPORATION_NAME_TEXT}"
                               value="{$FIELD_CORPORATION_NAME_VALUE}" maxlength="80" />
        </div>
    </div>
    <!-- ACTIVE -->
   <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
        <label>{$FIELD_CORPORATION_ACTIVE_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="checkbox" 
			           name="{$FIELD_CORPORATION_ACTIVE}" 
				       value="{$FIELD_CORPORATION_ACTIVE}" {$FIELD_CORPORATION_ACTIVE_VALUE}
					   onchange="ValidateMultiplyFields('{$FM_CORPORATION_UPDT_FORM}',
									                    'DivContentBodySubmitBigger',
									                    '{$FM_CORPORATION_UPDT_SB}', '');" />
        </div>
    </div>
    <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_REGISTER_DATE_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_REGISTER_DATE_VALUE}</label>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateCorporationName(null, '{$FIELD_CORPORATION_NAME}',
								   'DivContentBodySubmit',
								   '{$FM_CORPORATION_UPDT_SB}',
								   '', true);
                      ValidateMultiplyFields(
                                   '{$FM_CORPORATION_UPDT_FORM}',
                                   'DivContentBodySubmitBigger',
                                   '{$FM_CORPORATION_UPDT_SB}',
                                   '');">
        <input type="submit" name="{$FM_CORPORATION_UPDT_SB}" 
                                 id="{$FM_CORPORATION_UPDT_SB}"
                                 class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
                                 value="{$SUBMIT_UPDT}" {$SUBMIT_ENABLED} />
        <input type="submit" name="{$FM_CORPORATION_UPDT_CANCEL}" 
                                 id="{$FM_CORPORATION_UPDT_CANCEL}"
                                 class="DivContentBodySubmitBigger"
                                 value="{$SUBMIT_CANCEL}" />
    </div>
</form>