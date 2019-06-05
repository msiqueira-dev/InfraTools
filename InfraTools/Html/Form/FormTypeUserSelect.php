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
<!-- FM_TYPE_USER_SEL_FORM -->
<form name="{$FM_TYPE_USER_SEL_FORM}" id="{$FM_TYPE_USER_SEL_FORM}" method="{$FORM_METHOD}" >
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
											   'DivContentBodySubmit',
											   '{$FM_TYPE_USER_SEL_SB}',
											   '', 'false');
									ValidateMultiplyFields(
											 '{$FM_TYPE_USER_SEL_FORM}',
											 'DivContentBodySubmit',
											 '{$FM_TYPE_USER_SEL_SB}',
											 '');"
						   onblur="ValidateDescription('DivContentBodyContainerInputText', 
										       '{$FIELD_TYPE_USER_DESCRIPTION}',
											   'DivContentBodySubmit',
											   '{$FM_TYPE_USER_SEL_SB}',
											   '', true);
								   ValidateMultiplyFields(
											 '{$FM_TYPE_USER_SEL_FORM}',
											 'DivContentBodySubmit',
											 '{$FM_TYPE_USER_SEL_SB}',
											 '');"
						   onchange="ValidateDescription('DivContentBodyContainerInputText', 
										       '{$FIELD_TYPE_USER_DESCRIPTION}',
											   'DivContentBodySubmit',
											   '{$FM_TYPE_USER_SEL_SB}',
											   '', true);
								   ValidateMultiplyFields(
											 '{$FM_TYPE_USER_SEL_FORM}',
											 'DivContentBodySubmit',
											 '{$FM_TYPE_USER_SEL_SB}',
											 '');"
						   title="{$FIELD_TYPE_USER_DESCRIPTION_TEXT}" 
						   value="{$FIELD_TYPE_USER_DESCRIPTION_VALUE}" maxlength="45" />
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateDescription('DivContentBodyContainerInputText', 
							       '{$FIELD_TYPE_USER_DESCRIPTION}',
								   'DivContentBodySubmit',
								   '{$FM_TYPE_USER_SEL_SB}',
								   '', true);
					 ValidateMultiplyFields(
								   '{$FM_TYPE_USER_SEL_FORM}',
								   'DivContentBodySubmit',
								   '{$FM_TYPE_USER_SEL_SB}',
								   '');">
		<input type="submit" name="{$FM_TYPE_USER_SEL_SB}" 
								 id="{$FM_TYPE_USER_SEL_SB}"
								 class="DivContentBodySubmit {$SUBMIT_CLASS}"
								 value="{$SUBMIT_SEL}" {$SUBMIT_ENABLED} />
	</div>
</form>