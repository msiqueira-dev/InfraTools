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
<!-- FM_CORPORATION_REGISTER_FORM -->
<form name="{$FM_CORPORATION_REGISTER_FORM}" 
      id="{$FM_CORPORATION_REGISTER_FORM}" method="post">
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
                                                   '{$FM_CORPORATION_REGISTER_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_CORPORATION_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_CORPORATION_REGISTER_SB}',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '{$FM_CORPORATION_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_CORPORATION_REGISTER_SB}',
                                                 '');"
                               onchange="ValidateCorporationName(null, '{$FIELD_CORPORATION_NAME}',
                                                   'DivContentBodySubmitBigger ',
                                                   '{$FM_CORPORATION_REGISTER_SB}',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '{$FM_CORPORATION_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_CORPORATION_REGISTER_SB}',
                                                 '');"
                               title="{$FIELD_CORPORATION_NAME_TEXT}"
                               value="{$FIELD_CORPORATION_NAME_VALUE}" maxlength="80" />
        </div>
    </div>
    <!-- FIELD_CORPORATION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_CORPORATION_ACTIVE_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <input type="checkbox" name="{$FIELD_CORPORATION_ACTIVE}" value="{$FIELD_CORPORATION_ACTIVE}" {$FIELD_CORPORATION_ACTIVE_VALUE}
				   onchange="ValidateMultiplyFields('{$FM_CORPORATION_REGISTER_FORM}',
									                'DivContentBodySubmitBigger',
									                '{$FM_CORPORATION_REGISTER_SB}','');"/>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateCorporationName(null, '{$FIELD_CORPORATION_NAME}',
								   'DivContentBodySubmitBigger',
								   '{$FM_CORPORATION_REGISTER_SB}',
								   '', true);
                      ValidateMultiplyFields(
                                   '{$FM_CORPORATION_REGISTER_FORM}',
                                   'DivContentBodySubmitBigger',
                                   '{$FM_CORPORATION_REGISTER_SB}',
                                   '');">
        <input type="submit" name="{$FM_CORPORATION_REGISTER_SB}" 
                                 id="{$FM_CORPORATION_REGISTER_SB}"
                                 class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
                                 value="{$SUBMIT_REGISTER}" {$SUBMIT_ENABLED} />
        <input type="submit" name="{$FM_CORPORATION_REGISTER_CANCEL}" 
                                 id="{$FM_CORPORATION_REGISTER_CANCEL}"
                                 class="DivContentBodySubmitBigger"
                                 value="{$SUBMIT_CANCEL}" />
    </div>
</form>