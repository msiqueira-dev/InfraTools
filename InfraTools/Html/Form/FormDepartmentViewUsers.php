<!-- FM_DEPARTMENT_VIEW_LST_USERS_FORM -->
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
		{$RETURN_TYPE_USER_DESCRIPTION_TEXT}
		{$RETURN_USER_EMAIL_TEXT}
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
		<form  name="{$FM_DEPARTMENT_VIEW_LST_USERS_FORM}" method='post'>
			<th class="TableGenericThArrow">
				<div class="TableGenericInputLeft">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_DEPARTMENT_VIEW_LST_USERS_SB_BACK}" 
							id="{$FM_DEPARTMENT_VIEW_LST_USERS_SB_BACK}" 
							value="{$FM_DEPARTMENT_VIEW_LST_USERS_SB_BACK}"
					        title="{$SUBMIT_BACK}" alt="{$SUBMIT_BACK}"
					        src="{$SUBMIT_BACK_ICON}"
					        onmouseover="this.src='{$SUBMIT_BACK_ICON_HOVER}'"
					        onmouseout="this.src='{$SUBMIT_BACK_ICON}'" />
				</div>
				<div class="TableGenericThRight">
					{$FIELD_USER_EMAIL_TEXT}
				</div>
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_USER_NAME_TEXT}
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_USER_TYPE_TEXT}
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_CORPORATION_NAME_TEXT}
			</th>
			<th  class="TableGenericThArrow">
				<div  class="TableGenericThLeft">
					{$FIELD_DEPARTMENT_NAME}
				</div>
				<div class="TableGenericInputRight">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_DEPARTMENT_VIEW_LST_USERS_SB_FORWARD}" 
							id="{$FM_DEPARTMENT_VIEW_LST_USERS_SB_FORWARD}" 
							value="{$FM_DEPARTMENT_VIEW_LST_USERS_SB_FORWARD}"
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
	{foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_USER item=INSTANCE_USER}
		{foreach key=key item=item from=$INSTANCE_USER}
			<tr>
				<td class="TableGenericTdLink">
					<form name="{$FM_USER_SEL_SB}" method="post">
						<input type="hidden" 
						       name="{$FM_USER_SEL_SB}" 
							   id="{$FM_USER_SEL_SB}"
							   value="{$FM_USER_SEL_SB}">
						<input type="submit" 
						       name="{$FIELD_USER_EMAIL}" 
							   id="{$FIELD_USER_EMAIL}"
							   value="{$item->GetEmail()}"
							   title="{$item->GetEmail()}"
							   maxlength="80" />	
					</form>
				</td>
				<td>
					$item->GetName()
				</td>
				<td class="TableGenericTdLink">
					<form name="{$FM_TYPE_USER_SEL_SB}" method="post">
						<input type="hidden" 
						       name="{$FM_TYPE_USER_SEL_SB}" 
							   id="{$FM_TYPE_USER_SEL_SB}"
							   value="{$FM_TYPE_USER_SEL_SB}">
						<input type="submit" 
						       name="{$FIELD_TYPE_USER_DESCRIPTION}" 
							   id="{$FIELD_TYPE_USER_DESCRIPTION}"
							   value="{$item->GetUserTypeDescription()}"
							   title="{$item->GetUserTypeDescription()}"
							   maxlength="80" />	
					</form>
				</td>
				<td class="TableGenericTdLink">
					<form name="{$FM_CORPORATION_SEL_SB}" method="post">
						<input type="hidden" 
						       name="{$FM_CORPORATION_SEL_SB}" 
							   id="{$FM_CORPORATION_SEL_SB}"
							   value="{$FM_CORPORATION_SEL_SB}">
						<input type="submit" 
						       name="{$FIELD_CORPORATION_NAME}" 
							   id="{$FIELD_CORPORATION_NAME}"
							   value="{$item->GetCorporationName()}"
							   title="{$item->GetCorporationName()}"
							   maxlength="80" />	
					</form>
				</td>
				{if isset($item->GetDepartmentName())}
					<td class="TableGenericTdLink">
						<form name="{$FM_DEPARTMENT_SEL_SB}" method="post">
							<input type="hidden" 
								name="{$FM_DEPARTMENT_SEL_SB}" 
								id="{$FM_DEPARTMENT_SEL_SB}"
								value="{$FM_DEPARTMENT_SEL_SB}">
								<input type="hidden" 
								name="{$FIELD_CORPORATION_NAME}" 
								id="{$FIELD_CORPORATION_NAME}"
								value="{$item->GetCorporationName()}">
							<input type="submit" 
								name="{$FIELD_DEPARTMENT_NAME}" 
								id="{$FIELD_DEPARTMENT_NAME}"
								value="{$item->GetDepartmentName()}"
								title="{$item->GetDepartmentName()}"
								maxlength="80" />	
						</form>
					</td>
					{else} 
						<td>
							<img src="{$item->GetDepartmentActiveIcon()}" />
						</td>
				{/if}
			</tr>
		{/foreach}
	{/foreach}
</table>