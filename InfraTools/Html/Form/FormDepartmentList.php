<!-- FM_CORPORATION_LST_FORM -->
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
<div class="DivTableGenericHeader">
	<div class="DivTableGenericHeaderRowCount">
		<label class='InputValueLimitTitle'>
			{$TB_PAGE_PREFIX}
		</label>
		<label class='InputValueLimitValue'> 
			{$TB_PAGE_INPUT_VALUE_LIMIT_ONE} {$TB_PAGE} {$TB_PAGE_INPUT_VALUE_LIMIT_TWO}
		</label>
	</div>
	<div class="DivTableGenericHeaderRowCount">
		<label class='DivTableGenericRowCountLabelTitle'>
			{$ROW_COUNT} 
		</label>
		<label class='DivTableGenericRowCountLabelValue'>
			{$INPUT_VALUE_ROW_COUNT}
		</label>
	</div>
</div>
<table class='TableGeneric'>
	<tr>
		<form  name="{$FM_DEPARTMENT_LST_FORM}" method="{$FORM_METHOD}">
			<th class="TableGenericThArrow">
				<div class="TableGenericInputLeft">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_DEPARTMENT_LST_BACK}" 
							id="{$FM_DEPARTMENT_LST_BACK}" 
							value="{$FM_DEPARTMENT_LST_BACK}"
					        title="{$SUBMIT_BACK}" alt="{$SUBMIT_BACK}"
					        src="{$SUBMIT_BACK_ICON}"
					        onmouseover="this.src='{$SUBMIT_BACK_ICON_HOVER}'"
					        onmouseout="this.src='{$SUBMIT_BACK_ICON}'" />
				</div>
				<div class="TableGenericThRight">
					{$FIELD_CORPORATION_NAME_TEXT}
				</div>
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_DEPARTMENT_INITIALS_TEXT}
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_DEPARTMENT_NAME_TEXT}
			</th>
			<th  class="TableGenericThArrow">
				<div  class="TableGenericThLeft">
					{$FIELD_REGISTER_DATE_TEXT}
				</div>
				<div class="TableGenericInputRight">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_DEPARTMENT_LST_FORWARD}" 
							id="{$FM_DEPARTMENT_LST_FORWARD}" 
							value="{$FM_DEPARTMENT_LST_FORWARD}"
							title="{$SUBMIT_FORWARD}" alt="{$SUBMIT_FORWARD}"
							src="{$SUBMIT_FORWARD_ICON}"
							onmouseover="this.src='{$SUBMIT_FORWARD_ICON_HOVER}'"
							onmouseout="this.src='{$SUBMIT_FORWARD_ICON}'" />
				</div>
			</th>
			<input type="hidden" value="{$TB_PAGE_INPUT_VALUE_LIMIT_ONE}" name="{$FM_LST_INPUT_LIMIT_ONE}" />
			<input type="hidden" value="{$TB_PAGE_INPUT_VALUE_LIMIT_TWO}" name="{$FM_LST_INPUT_LIMIT_TWO}" />
		</form>
	</tr>
	{foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_DEPARTMENT item=INSTANCE_DEPARTMENT}
		{foreach key=key item=item from=$INSTANCE_DEPARTMENT}
			<tr>
				<td class="TableGenericTdLink">
					<form name="{$FM_CORPORATION_SEL_SB}" method="{$FORM_METHOD}">
						<input type="hidden" 
						       name="{$FM_CORPORATION_SEL_SB}" 
							   id="{$FM_CORPORATION_SEL_SB}"
							   value="{$FM_CORPORATION_SEL_SB}"/>
						<input type="submit" 
						       name="{$FIELD_CORPORATION_NAME}" 
							   id="{$FIELD_CORPORATION_NAME}"
							   value="{$item->GetDepartmentCorporationName()}"
							   title="{$item->GetDepartmentCorporationName()}"
							   maxlength="80" />	
					</form>
				</td>
				<td>
					<label>{$item->GetDepartmentInitials()}</label> 
				</td>
				<td class="TableGenericTdLink">
					<form name="{$FM_DEPARTMENT_SEL_SB}" method="{$FORM_METHOD}">
						<input type="hidden" 
						       name="{$FM_DEPARTMENT_SEL_SB}" 
							   id="{$FM_DEPARTMENT_SEL_SB}"
							   value="{$FM_DEPARTMENT_SEL_SB}"/>
						<input type="hidden" 
						       name="{$FIELD_CORPORATION_NAME}" 
							   id="{$FIELD_CORPORATION_NAME}"
							   value="{$item->GetDepartmentCorporationName()}"/>
						<input type="submit" 
						       name="{$FIELD_DEPARTMENT_NAME }" 
							   id="{$FIELD_DEPARTMENT_NAME }"
							   value="{$item->GetDepartmentName()}"
							   title="{$item->GetDepartmentName()}"
							   maxlength="80" />	
					</form>
				</td>
				<td class="TableGenericTdLink">
					{$item->GetRegisterDate()}
				</td>
			</tr>
		{/foreach}
	{/foreach}
</table>