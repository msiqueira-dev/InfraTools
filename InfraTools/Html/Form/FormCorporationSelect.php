<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_CORPORATION_NAME_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_CORPORATION_SEL_FORM -->
<form name="{$FM_CORPORATION_SEL_FORM}" id="{$FM_CORPORATION_SEL_FORM}" method="{$FORM_METHOD}" >
	<!-- FIELD_CORPORATION_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> {$FIELD_CORPORATION_NAME_TEXT} </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="{$FIELD_CORPORATION_NAME}" 
						   id="{$FIELD_CORPORATION_NAME}"
						   class="DivContentBodyContainerInputText {$RETURN_CORPORATION_NAME_CLASS}"
						   onkeyup="ValidateCorporationName('DivContentBodyContainerInputText', 
										       '{$FIELD_CORPORATION_NAME}',
											   'DivContentBodySubmit',
											   '{$FM_CORPORATION_SEL_SB}',
											   '', 'false');
									ValidateMultiplyFields(
											 '{$FM_CORPORATION_SEL_FORM}',
											 'DivContentBodySubmit',
											 '{$FM_CORPORATION_SEL_SB}',
											 '');"
						   onblur="ValidateCorporationName('DivContentBodyContainerInputText', 
										       '{$FIELD_CORPORATION_NAME}',
											   'DivContentBodySubmit',
											   '{$FM_CORPORATION_SEL_SB}',
											   '', true);
								   ValidateMultiplyFields(
											 '{$FM_CORPORATION_SEL_FORM}',
											 'DivContentBodySubmit',
											 '{$FM_CORPORATION_SEL_SB}',
											 '');"
						   onchange="ValidateCorporationName('DivContentBodyContainerInputText', 
										       '{$FIELD_CORPORATION_NAME}',
											   'DivContentBodySubmit',
											   '{$FM_CORPORATION_SEL_SB}',
											   '', true);
								   ValidateMultiplyFields(
											 '{$FM_CORPORATION_SEL_FORM}',
											 'DivContentBodySubmit',
											 '{$FM_CORPORATION_SEL_SB}',
											 '');"
						   title="{$FIELD_CORPORATION_NAME_TEXT}" 
						   value="{$FIELD_CORPORATION_NAME_VALUE}" maxlength="80" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateCorporationName('DivContentBodyContainerInputText', 
							       '{$FIELD_CORPORATION_NAME}',
								   'DivContentBodySubmit',
								   '{$FM_CORPORATION_SEL_SB}',
								   '', true);
					 ValidateMultiplyFields(
								   '{$FM_CORPORATION_SEL_FORM}',
								   'DivContentBodySubmit',
								   '{$FM_CORPORATION_SEL_SB}',
								   '');">
		<input type="submit" name="{$FM_CORPORATION_SEL_SB}" 
								 id="{$FM_CORPORATION_SEL_SB}"
								 class="DivContentBodySubmit {$SUBMIT_CLASS}"
								 value="{$SUBMIT_SEL}" {$SUBMIT_ENABLED} />
	</div>
</form>