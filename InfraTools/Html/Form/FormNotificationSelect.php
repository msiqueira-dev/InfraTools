<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_NOTIFICATION_ID_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_NOTIFICATION_SEL_FORM -->
<form name="{$FM_NOTIFICATION_SEL_FORM}" id="{$FM_NOTIFICATION_SEL_FORM}" method="{$FORM_METHOD}" >
	<!-- FIELD_NOTIFICATION_ID -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> {$FIELD_NOTIFICATION_ID_TEXT} </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="{$FIELD_NOTIFICATION_ID}" 
						   id="{$FIELD_NOTIFICATION_ID}"
						   class="DivContentBodyContainerInputText {$RETURN_NOTIFICATION_ID_CLASS}"
						   onkeyup="ValidateNumbersOnly('DivContentBodyContainerInputText', 
										       '{$FIELD_NOTIFICATION_ID}',
											   'DivContentBodySubmit',
											   '{$FM_NOTIFICATION_SEL_SB}',
											   '', 'false');
									ValidateMultiplyFields(
											 '{$FM_NOTIFICATION_SEL_FORM}',
											 'DivContentBodySubmit',
											 '{$FM_NOTIFICATION_SEL_SB}',
											 '');"
						   onblur="ValidateNumbersOnly('DivContentBodyContainerInputText', 
										       '{$FIELD_NOTIFICATION_ID}',
											   'DivContentBodySubmit',
											   '{$FM_NOTIFICATION_SEL_SB}',
											   '', true);
								   ValidateMultiplyFields(
											 '{$FM_NOTIFICATION_SEL_FORM}',
											 'DivContentBodySubmit',
											 '{$FM_NOTIFICATION_SEL_SB}',
											 '');"
						   onchange="ValidateNumbersOnly('DivContentBodyContainerInputText', 
										       '{$FIELD_NOTIFICATION_ID}',
											   'DivContentBodySubmit',
											   '{$FM_NOTIFICATION_SEL_SB}',
											   '', true);
								   ValidateMultiplyFields(
											 '{$FM_NOTIFICATION_SEL_FORM}',
											 'DivContentBodySubmit',
											 '{$FM_NOTIFICATION_SEL_SB}',
											 '');"
						   title="{$FIELD_NOTIFICATION_ID_TEXT}" 
						   value="{$FIELD_NOTIFICATION_ID_VALUE}" maxlength="5" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateNumbersOnly('DivContentBodyContainerInputText', 
							       '{$FIELD_NOTIFICATION_ID}',
								   'DivContentBodySubmit',
								   '{$FM_NOTIFICATION_SEL_SB}',
								   '', true);
					 ValidateMultiplyFields(
								   '{$FM_NOTIFICATION_SEL_FORM}',
								   'DivContentBodySubmit',
								   '{$FM_NOTIFICATION_SEL_SB}',
								   '');">
		<input type="submit" name="{$FM_NOTIFICATION_SEL_SB}" 
								 id="{$FM_NOTIFICATION_SEL_SB}"
								 class="DivContentBodySubmit {$SUBMIT_CLASS}"
								 value="{$SUBMIT_SEL}" {$SUBMIT_ENABLED} />
	</div>
</form>