<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_TYPE_USER_DESCRIPTION_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_TYPE_USER_REGISTER_FORM -->
<form name="{$FM_TYPE_USER_REGISTER_FORM}" id="{$FM_TYPE_USER_REGISTER_FORM}"  method="{$FORM_METHOD}" >
    <!-- FIELD_TYPE_USER_DESCRIPTION -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> {$FIELD_TYPE_USER_DESCRIPTION_TEXT} </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="{$FIELD_TYPE_USER_DESCRIPTION}" 
						   id="{$FIELD_TYPE_USER_DESCRIPTION}"
						   class="DivContentBodyContainerInputText {$RETURN_TYPE_USER_NAME_CLASS}"
						   onkeyup="ValidateDescription('DivContentBodyContainerInputText', 
										       '{$FIELD_TYPE_USER_DESCRIPTION}',
											   'DivContentBodySubmitBigger',
											   '{$FM_TYPE_USER_REGISTER_SB}',
											   '', 'false');
									ValidateMultiplyFields(
											 '{$FM_TYPE_USER_REGISTER_FORM}',
											 'DivContentBodySubmitBigger',
											 '{$FM_TYPE_USER_REGISTER_SB}',
											 '');"
						   onblur="ValidateDescription('DivContentBodyContainerInputText', 
										       '{$FIELD_TYPE_USER_DESCRIPTION}',
											   'DivContentBodySubmitBigger',
											   '{$FM_TYPE_USER_REGISTER_SB}',
											   '', true);
								   ValidateMultiplyFields(
											 '{$FM_TYPE_USER_REGISTER_FORM}',
											 'DivContentBodySubmitBigger',
											 '{$FM_TYPE_USER_REGISTER_SB}',
											 '');"
						   onchange="ValidateDescription('DivContentBodyContainerInputText', 
										       '{$FIELD_TYPE_USER_DESCRIPTION}',
											   'DivContentBodySubmitBigger',
											   '{$FM_TYPE_USER_REGISTER_SB}',
											   '', true);
								   ValidateMultiplyFields(
											 '{$FM_TYPE_USER_REGISTER_FORM}',
											 'DivContentBodySubmitBigger',
											 '{$FM_TYPE_USER_REGISTER_SB}',
											 '');"
						   title="{$FIELD_TYPE_USER_DESCRIPTION_TEXT}" 
						   value="{$FIELD_TYPE_USER_DESCRIPTION_VALUE}" maxlength="45" />
	</div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDescription('DivContentBodyContainerInputText', 
							       '{$FIELD_TYPE_USER_DESCRIPTION}',
								   'DivContentBodySubmitBigger',
								   '{$FM_TYPE_USER_REGISTER_SB}',
								   '', true);
					 ValidateMultiplyFields(
								   '{$FM_TYPE_USER_REGISTER_FORM}',
								   'DivContentBodySubmitBigger',
								   '{$FM_TYPE_USER_REGISTER_SB}',
								   '');">
        <input type="submit" name="{$FM_TYPE_USER_REGISTER_SB}" id="{$FM_TYPE_USER_REGISTER_SB}"
                             class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
                             value="{$SUBMIT_REGISTER}"
                             {$SUBMIT_ENABLED} />
        <input type="submit" name="{$FM_TYPE_USER_REGISTER_CANCEL}" id="{$FM_TYPE_USER_REGISTER_CANCEL}"
                             class="DivContentBodySubmitBigger"
                             value="{$SUBMIT_CANCEL}" />
    </div>
</form>