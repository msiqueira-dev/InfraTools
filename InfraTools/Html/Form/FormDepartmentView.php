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
<!-- FORM DEPARRTMENT VIEW -->
<form name="{$FM_DEPARTMENT_VIEW}" id="{$FM_DEPARTMENT_VIEW}" method="{$FORM_METHOD}" >
    <!--FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_CORPORATION_NAME_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_CORPORATION_NAME_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_INITIALS -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_DEPARTMENT_INITIALS_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_DEPARTMENT_INITIALS_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_DEPARTMENT_NAME_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_DEPARTMENT_NAME_VALUE}</label>
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
{if $CURRENT_PAGE eq $PAGE_ADMIN_DEPARTMENT}
	<div class="DivContentBodyContainer">
		<!-- FM_DEPARTMENT_VIEW_UPDT -->
		<form name="{$FM_DEPARTMENT_VIEW_UPDT}" id="{$FM_DEPARTMENT_VIEW_UPDT}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
			<input type="submit" name="{$FM_DEPARTMENT_VIEW_UPDT_SB}" id="{$FM_DEPARTMENT_VIEW_UPDT_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_UPDT}"/>
		</form>
		<!-- FM_DEPARTMENT_VIEW_DEL -->
		<form name="{$FM_DEPARTMENT_VIEW_DEL}" id="{$FM_DEPARTMENT_VIEW_DEL}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}">
			<input type="submit" name="{$FM_DEPARTMENT_VIEW_DEL_SB}" id="{$FM_DEPARTMENT_VIEW_DEL_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_DEL}"
					onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
		</form>
		<!-- FM_DEPARTMENT_VIEW_LST_USERS -->
		<form name="{$FM_DEPARTMENT_VIEW_LST_USERS}" id="{$FM_DEPARTMENT_VIEW_LST_USERS}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}">
			<input type="submit" name="{$FM_DEPARTMENT_VIEW_LST_USERS_SB}" id="{$FM_DEPARTMENT_VIEW_LST_USERS_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_LST_USERS}"/>
		</form>
	</div>
{/if}