<!-- FM_COUNTRY_LST_FORM -->
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
		<form  name="{$FM_CORPORATION_LST_FORM}" method='post'>
			<input type="hidden" value="{$INPUT_VALUE_LIMIT_ONE}" name="{$FM_LST_INPUT_LIMIT_ONE}" />
			<input type="hidden" value="{$INPUT_VALUE_LIMIT_TWO}" name="{$FM_LST_INPUT_LIMIT_TWO}" />
			<th class="TableGenericThArrow">
				<div class="TableGenericInputLeft">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_COUNTRY_LST_BACK}" 
							id="{$FM_COUNTRY_LST_BACK}" 
							value="{$FM_COUNTRY_LST_BACK}"
					        title="{$SUBMIT_BACK}" alt="{$SUBMIT_BACK}"
					        src="{$SUBMIT_BACK_ICON}"
					        onmouseover="this.src='{$SUBMIT_BACK_ICON_HOVER}'"
					        onmouseout="this.src='{$SUBMIT_BACK_ICON}'" />
				</div>
				<div class="TableGenericThRight">
					{$FIELD_COUNTRY_NAME_TEXT}
				</div>
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_COUNTRY_ABBREVIATION_TEXT}
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_REGION_CODE_TEXT}
			</th>
			<th  class="TableGenericThArrow">
				<div  class="TableGenericThLeft">
					{$FIELD_REGISTER_DATE_TEXT}
				</div>
				<div class="TableGenericInputRight">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_COUNTRY_LST_FORWARD}" 
							id="{$FM_COUNTRY_LST_FORWARD}" 
							value="{$FM_COUNTRY_LST_FORWARD}"
							title="{$SUBMIT_FORWARD}" alt="{$SUBMIT_FORWARD}"
							src="{$SUBMIT_FORWARD_ICON}"
							onmouseover="this.src='{$SUBMIT_FORWARD_ICON_HOVER}'"
							onmouseout="this.src='{$SUBMIT_FORWARD_ICON}'" />
				</div>
			</th>
		</form>
	</tr>
	{foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_COUNTRY item=INSTANCE_COUNTRY}
		{foreach key=key item=item from=$INSTANCE_COUNTRY}
			<tr>
				<td class="TableGenericTdLink">
					{$item->GetCountryName()}
				</td>
				<td class="TableGenericTdLink">
					{$item->GetCountryAbbreviation()}
				</td>
				<td class="TableGenericTdLink">
					{$item->GetRegionCode()}
				</td>
				<td class="TableGenericTdLink">
					{$item->GetRegisterDate()}
				</td>
			</tr>
		{/foreach}
	{/foreach}
</table>