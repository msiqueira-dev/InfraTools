<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_CORPORATION_NAME_TEXT}
		{$RETURN_DEPARTMENT_NAME_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_DEPARTMENT_SEL_FORM -->
<form name="{$FM_DEPARTMENT_SEL_FORM}" id="{$FM_DEPARTMENT_SEL_FORM}" method="{$FORM_METHOD}" >
	<!-- RADIO BUTTON -->
	<div class="DivContentBodyContainer" id="{$DIV_RADIO}">
		<!-- FIELD_RADIO_DEPARTMENT_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="{$FIELD_RADIO_DEPARTMENT}"
					   id="{$FIELD_RADIO_DEPARTMENT_NAME}"
					   value="{$FIELD_RADIO_DEPARTMENT_NAME}"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('{$DIV_RADIO_CORPORATION_NAME}', false);
								 ShowOrHideElement('{$DIV_RADIO_DEPARTMENT_INITIALS}', false);
								 ShowOrHideElement('{$DIV_RADIO_DEPARTMENT_NAME}', true);	
								 MakeInputVisible('{$FM_DEPARTMENT_SEL_SB}');
								 ValidateInputChangedRadio('{$DIV_RADIO}', 'DivContentBodySubmit', '{$FM_DEPARTMENT_SEL_SB}', 'Department Name')"
					   title="{$FIELD_DEPARTMENT_NAME_TEXT}"  
					   {$FIELD_RADIO_DEPARTMENT_NAME_VALUE}/>
				<div class="DivContentBodyContainerLabelHost">
					<i>{$FIELD_DEPARTMENT_NAME_TEXT}</i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_RADIO_DEPARTMENT_INITIALS -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="{$FIELD_RADIO_DEPARTMENT}"
					   id="{$FIELD_RADIO_DEPARTMENT_INITIALS}"
					   value="{$FIELD_RADIO_DEPARTMENT_INITIALS}"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('{$DIV_RADIO_CORPORATION_NAME}', false);
					             ShowOrHideElement('{$DIV_RADIO_DEPARTMENT_INITIALS}', true);
					             ShowOrHideElement('{$DIV_RADIO_DEPARTMENT_NAME}', false);
								 MakeInputVisible('{$FM_DEPARTMENT_SEL_SB}');
								 ValidateInputChangedRadio('{$DIV_RADIO}', 'DivContentBodySubmit', '{$FM_DEPARTMENT_SEL_SB}', 'Department Initials')"
					   title="{$FIELD_DEPARTMENT_INITIALS_TEXT}"  
					   {$FIELD_RADIO_DEPARTMENT_INITIALS_VALUE}/>
				<div class="DivContentBodyContainerLabelHost">
					<i>{$FIELD_DEPARTMENT_INITIALS_TEXT}</i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="{$FIELD_RADIO_DEPARTMENT}"
					   id="{$FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME}"
					   value="{$FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME}"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('{$DIV_RADIO_CORPORATION_NAME}', true);
					             ShowOrHideElement('{$DIV_RADIO_DEPARTMENT_NAME}', false);
					             ShowOrHideElement('{$DIV_RADIO_DEPARTMENT_INITIALS}', true);
								 MakeInputVisible('{$FM_DEPARTMENT_SEL_SB}');
								 ValidateInputChangedRadio('{$DIV_RADIO}', 'DivContentBodySubmit', '{$FM_DEPARTMENT_SEL_SB}', '')"
					   title="{$FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME_TEXT}"  
					   {$FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME_VALUE} />
				<div class="DivContentBodyContainerLabelIp">
					<i>{$FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME_TEXT}</i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="{$FIELD_RADIO_DEPARTMENT}"
					   id="{$FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME}"
					   value="{$FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME}"
					   onclick="this.blur();this.focus();"
					   onchange="ShowOrHideElement('{$DIV_RADIO_CORPORATION_NAME}', true);
					             ShowOrHideElement('{$DIV_RADIO_DEPARTMENT_NAME}', true);
					             ShowOrHideElement('{$DIV_RADIO_DEPARTMENT_INITIALS}', false);
								 MakeInputVisible('{$FM_DEPARTMENT_SEL_SB}');
								 ValidateInputChangedRadio('{$DIV_RADIO}', 'DivContentBodySubmit', '{$FM_DEPARTMENT_SEL_SB}', '')"
					   title="{$FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME_TEXT}"  
					   {$FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME_VALUE} />
				<div class="DivContentBodyContainerLabelIp">
					<i>{$FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME_TEXT}</i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_DEPARTMENT_NAME -->
		<div class="{$HIDE_DEPARTMENT_NAME_CLASS} DivContentBodyContainer" id="{$DIV_RADIO_DEPARTMENT_NAME}">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label>{$FIELD_DEPARTMENT_NAME_TEXT}</label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="{$FIELD_DEPARTMENT_NAME}" 
							   id="{$FIELD_DEPARTMENT_NAME}"
							   class="DivContentBodyContainerInputText {$RETURN_DEPARTMENT_NAME_CLASS}"
							   onkeyup="ValidateDepartmentName('DivContentBodyContainerInputText', 
											       '{$FIELD_DEPARTMENT_NAME}',
												   'DivContentBodySubmit',
												   '{$FM_DEPARTMENT_SEL_SB}', '', false);"
							   onblur="ValidateDepartmentName('DivContentBodyContainerInputText', 
											       '{$FIELD_DEPARTMENT_NAME}',
												   'DivContentBodySubmit',
												   '{$FM_DEPARTMENT_SEL_SB}','', true);"
							   onchange="ValidateDepartmentName('DivContentBodyContainerInputText', 
											                    '{$FIELD_DEPARTMENT_NAME}',
												                'DivContentBodySubmit',
												                '{$FM_DEPARTMENT_SEL_SB}','', true);"
							   title="{$FIELD_DEPARTMENT_NAME_TEXT}" 
							   value="{$FIELD_DEPARTMENT_NAME_VALUE}" maxlength="80" />
		</div>
		<!-- FIELD_DEPARTMENT_INITIALS -->
		<div class="{$HIDE_DEPARTMENT_INITIALS_CLASS} DivContentBodyContainer" id="{$DIV_RADIO_DEPARTMENT_INITIALS}">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label>{$FIELD_DEPARTMENT_INITIALS_TEXT}</label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="{$FIELD_DEPARTMENT_INITIALS}" 
							   id="{$FIELD_DEPARTMENT_INITIALS}"
							   class="DivContentBodyContainerInputText {$RETURN_DEPARTMENT_INITIALS_CLASS}"
							   onkeyup="ValidateDepartmentInitials('DivContentBodyContainerInputText', 
											       '{$FIELD_DEPARTMENT_INITIALS}',
												   'DivContentBodySubmit',
												   '{$FM_DEPARTMENT_SEL_SB}', '', false);"
							   onblur="ValidateDepartmentInitials('DivContentBodyContainerInputText', 
											       '{$FIELD_DEPARTMENT_INITIALS}',
												   'DivContentBodySubmit',
												   '{$FM_DEPARTMENT_SEL_SB}','', true);"
							   onchange="ValidateDepartmentInitials('DivContentBodyContainerInputText', 
											                    '{$FIELD_DEPARTMENT_INITIALS}',
												                'DivContentBodySubmit',
												                '{$FM_DEPARTMENT_SEL_SB}','', true);"
							   title="{$FIELD_DEPARTMENT_INITIALS_TEXT}" 
							   value="{$FIELD_DEPARTMENT_INITIALS_VALUE}" maxlength="8" />
		</div>
		<!-- FIELD_CORPORATION_NAME -->
		<div class="{$HIDE_CORPORATION_NAME_CLASS} DivContentBodyContainer" id="{$DIV_RADIO_CORPORATION_NAME}">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label>{$FIELD_CORPORATION_NAME_TEXT} :</label>
			</div>
			<div class="DivContentBodyContainerValue">
				<select 
					name="{$FIELD_CORPORATION_NAME}" 
					id="{$FIELD_CORPORATION_NAME}"
					class="DivContentBodyContainerInputText {$RETURN_CORPORATION_NAME_CLASS}"
					onchange="SetSelectColor('{$FIELD_CORPORATION_NAME}');
							  document.getElementById('{$FM_DEPARTMENT_SEL_SB}').disabled = false;
							  document.getElementById('{$FM_DEPARTMENT_SEL_SB}').className = 'DivContentBodySubmit SubmitEnabled;'">
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
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit">
		<input type="submit" name="{$FM_DEPARTMENT_SEL_SB}" 
			   id="{$FM_DEPARTMENT_SEL_SB}" class="DivContentBodySubmit {$SUBMIT_CLASS}"
			   value="{$SUBMIT_SEL}" {$SUBMIT_ENABLED} />
	</div>
</form>