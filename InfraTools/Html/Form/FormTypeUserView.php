<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_TYPE_USER_VIEW -->
<form name="{$FM_TYPE_USER_VIEW}" id="{$FM_TYPE_USER_VIEW}" method="{$FORM_METHOD}">
    <!-- FIELD_TYPE_USER_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_TYPE_USER_DESCRIPTION_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_TYPE_USER_DESCRIPTION_VALUE}</label>
        </div>
    </div>
    <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_REGISTER_DATE_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_REGISTER_DATE_VALUE}</label>
        </div>
	</div>
</form>
<!-- SUBMIT -->
{if $CURRENT_PAGE eq $PAGE_ADMIN_TYPE_USER}
	<div class="DivContentBodyContainer">
		<!-- FM_TYPE_USER_VIEW_UPDT -->
		<form name="{$FM_TYPE_USER_VIEW_UPDT}" id="{$FM_TYPE_USER_VIEW_UPDT}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
			<input type="submit" name="{$FM_TYPE_USER_VIEW_UPDT_SB}" id="{$FM_TYPE_USER_VIEW_UPDT_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_UPDT}"/>
		</form>
		<!-- FM_TYPE_USER_VIEW_DEL -->
		<form name="{$FM_TYPE_USER_VIEW_DEL}" id="{$FM_TYPE_USER_VIEW_DEL}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}">
			<input type="submit" name="{$FM_TYPE_USER_VIEW_DEL_SB}" id="{$FM_TYPE_USER_VIEW_DEL_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_DEL}"
					onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
		</form>
		<!-- FM_TYPE_USER_VIEW_LST_USERS -->
		<form name="{$FM_TYPE_USER_VIEW_LST_USERS}" id="{$FM_TYPE_USER_VIEW_LST_USERS}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}">
			<input type="submit" name="{$FM_TYPE_USER_VIEW_LST_USERS_SB}" id="{$FM_TYPE_USER_VIEW_LST_USERS_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_LST_USERS}"/>
		</form>
	</div>
{/if}