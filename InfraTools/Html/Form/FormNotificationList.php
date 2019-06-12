<!-- FM_NOTIFICATION_LST_FORM -->
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
		<form  name="{$FM_NOTIFICATION_LST_FORM}" method="{$FORM_METHOD}">
			<th class="TableGenericThArrow">
				<div class="TableGenericInputLeft">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_NOTIFICATION_LST_BACK}" 
							id="{$FM_NOTIFICATION_LST_BACK}" 
							value="{$FM_NOTIFICATION_LST_BACK}"
					        title="{$SUBMIT_BACK}" alt="{$SUBMIT_BACK}"
					        src="{$SUBMIT_BACK_ICON}"
					        onmouseover="this.src='{$SUBMIT_BACK_ICON_HOVER}'"
					        onmouseout="this.src='{$SUBMIT_BACK_ICON}'" />
				</div>
				<div class="TableGenericThRight">
					{$FIELD_NOTIFICATION_ID_TEXT}
				</div>
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_NOTIFICATION_ACTIVE_TEXT}
			</th>
			<th  class="TableGenericThArrow">
				<div  class="TableGenericThLeft">
					{$FIELD_REGISTER_DATE_TEXT}
				</div>
				<div class="TableGenericInputRight">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_NOTIFICATION_LST_FORWARD}" 
							id="{$FM_NOTIFICATION_LST_FORWARD}" 
							value="{$FM_NOTIFICATION_LST_FORWARD}"
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
	{foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_NOTIFICATION item=INSTANCE_NOTIFICATION}
		{foreach key=key item=item from=$INSTANCE_NOTIFICATION}
			<tr>
				<td class='TableGenericTdLink'>
					<form  name="{$FM_NOTIFICATION_SEL_SB}" method="{$FORM_METHOD}">
						<input type='hidden'
								 name="{$FM_NOTIFICATION_SEL_SB}"
								 id="{$FM_NOTIFICATION_SEL_SB}"
								 value="{$FM_NOTIFICATION_SEL_SB}" />
							{if $item|is_a:'Notification'}
								<input type='submit' name="{$FIELD_NOTIFICATION_ID}" id="{$FIELD_NOTIFICATION_ID}" 
										value="{$item->GetNotificationId()}" 
										title="{$item->GetNotificationId()}"/>
							{/if}
							{if $item|is_a:'AssocUserNotification'}
								<a href="{$HREF_PAGE_NOTIFICATION_VIEW}{$item->GetAssocUserNotificationNotificationId()}"
								   target='' title=''>
									<i>
										{$item->GetAssocUserNotificationNotificationId()}
									</i>
								</a>
							{/if}
					</form>
				</td>
				<td class="TableGenericTdLink">
					{if $item|is_a:'AssocUserNotification'}
						{if $item->GetAssocUserNotificationRead() eq true}
							<img src="{$ICON_INFRATOOLS_VERIFIED}" 
								 alt='Verified' />
							
						{else}
							<img src="{$ICON_INFRATOOLS_VERIFIED_NOT}" 
								 alt='NotVerified' />
							
						{/if}
					{/if}
				</td>
				<td class="TableGenericTdLink">
					{$item->GetRegisterDate()}
				</td>
			</tr>
		{/foreach}
	{/foreach}
</table>