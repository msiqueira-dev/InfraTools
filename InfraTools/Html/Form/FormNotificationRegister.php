<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_NOTIFICATION_ACTIVE_TEXT}
		{$RETURN_NOTIFICATION_TEXT_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_NOTIFICATION_REGISTER_FORM -->
<form name="{$FM_NOTIFICATION_REGISTER_FORM}" id="{$FM_NOTIFICATION_REGISTER_FORM}" method="{$FORM_METHOD}">
    <!-- FIELD_NOTIFICATION_TEXT -->
    <div class="DivContentBodyContainerTextArea">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_NOTIFICATION_TEXT_TEXT} </label>
            <label class="RequiredField">&nbsp;*</label>
			<label>:</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <textarea name="{$FIELD_NOTIFICATION_TEXT}" id="{$FIELD_NOTIFICATION_TEXT}" 
                      class="DivContentBodyContainerValueTextArea {$RETURN_NOTIFICATION_TEXT_CLASS}"
                      onblur="ValidateDescription('DivContentBodyContainerValueTextArea', 
                                                  '{$FIELD_NOTIFICATION_TEXT}', 'DivContentBodySubmitBigger ',
                                                  '{$FM_NOTIFICATION_REGISTER_SB}', '', true);
                              ValidateMultiplyFields('{$FM_NOTIFICATION_REGISTER_FORM}', 'DivContentBodySubmitBigger ',
                                                     '{$FM_NOTIFICATION_REGISTER_SB}', '');"
                      onkeyup="ValidateMultiplyFields('{$FM_NOTIFICATION_REGISTER_FORM}', 'DivContentBodySubmitBigger ',
                                                      '{$FM_NOTIFICATION_REGISTER_SB}', '');"
                      onchange="ValidateDescription('DivContentBodyContainerValueTextArea', '{$FIELD_NOTIFICATION_TEXT}',
                                                    'DivContentBodySubmitBigger ', '{$FM_NOTIFICATION_REGISTER_SB}', '', true);
                                ValidateMultiplyFields(
                                                 '{$FM_NOTIFICATION_REGISTER_FORM}',
                                                 'DivContentBodySubmitBigger ',
                                                 '{$FM_NOTIFICATION_REGISTER_SB}',
                                                 '');"
                      title="{$FIELD_NOTIFICATION_TEXT_TEXT}" maxlength="500">{$FIELD_NOTIFICATION_TEXT_VALUE}</textarea>
        </div>
    </div>
    <!-- FIELD_NOTIFICATION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_NOTIFICATION_ACTIVE_TEXT} </label>
            <label class="RequiredField">&nbsp;*</label>
			<label>:</label>
        </div>
        <div class="DivContentBodyContainerValue">
        <input type="checkbox" name="{$FIELD_NOTIFICATION_ACTIVE}" value="{$FIELD_NOTIFICATION_ACTIVE}" {$FIELD_NOTIFICATION_ACTIVE_VALUE}
				   onchange="ValidateMultiplyFields('{$FM_NOTIFICATION_REGISTER_FORM}',
									                'DivContentBodySubmitBigger',
									                '{$FM_NOTIFICATION_REGISTER_SB}','');"/>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDescription('DivContentBodyContainerValueTextArea', '{$FIELD_NOTIFICATION_TEXT}','DivContentBodySubmitBigger',
								          '{$FM_NOTIFICATION_REGISTER_SB}', '', true);
                      ValidateMultiplyFields('{$FM_NOTIFICATION_REGISTER_FORM}', 'DivContentBodySubmitBigger',
                                             '{$FM_NOTIFICATION_REGISTER_SB}', '');">
        <input type="submit" name="{$FM_NOTIFICATION_REGISTER_SB}" id="{$FM_NOTIFICATION_REGISTER_SB}"
               class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
               value="{$SUBMIT_REGISTER}" {$SUBMIT_ENABLED} />
        <input type="submit" name="{$FM_NOTIFICATION_REGISTER_CANCEL}" id="{$FM_NOTIFICATION_REGISTER_CANCEL}"
               class="DivContentBodySubmitBigger" value="{$SUBMIT_CANCEL}" />
    </div>
</form>