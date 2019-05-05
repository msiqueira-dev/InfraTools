<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_CORPORATION_VIEW -->
<form name="{$FM_CORPORATION_VIEW}" id="{$FM_CORPORATION_VIEW}" method="post" >
    <!-- FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_CORPORATION_NAME_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_CORPORATION_NAME_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_CORPORATION_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_CORPORATION_ACTIVE_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">
				<img src="{$FIELD_CORPORATION_ACTIVE_ICON}" 
                     alt='CorporationVerification' width='20' height='20' />
        	</label>
        </div>
    </div>
    <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_REGISTER_DATE_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_REGISTER_DATE_VALUE}</label>
        </div>
    </div>
    <!-- SUBMIT -->
	{if $CURRENT_PAGE eq $PAGE_ADMIN_CORPORATION}
		<div class="DivContentBodyContainer">
			<!-- FM_CORPORATION_VIEW_UPDT -->
			<form name="{$FM_CORPORATION_VIEW_UPDT}" id="{$FM_CORPORATION_VIEW_UPDT}" 
				  class="DivFormHorizontalButtons" method="post" >
				<input type="submit" name="{$FM_CORPORATION_VIEW_UPDT_SB}" 
									 id="{$FM_CORPORATION_VIEW_UPDT_SB}"
									 class="DivContentBodySubmitBigger"
									 value="{$SUBMIT_UPDT}"/>
			</form>
			<!-- FM_CORPORATION_VIEW_DEL -->
			<form name="{$FM_CORPORATION_VIEW_DEL}" id="{$FM_CORPORATION_VIEW_DEL}" 
				  class="DivFormHorizontalButtons" method="post" >
				<input type="submit" 
					   name="{$FM_CORPORATION_VIEW_DEL_SB}" 
					   id="{$FM_CORPORATION_VIEW_DEL_SB}"
					   class="DivContentBodySubmitBigger"
					   value="{$SUBMIT_DEL}"
					   onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
			</form>
			<!-- FM_CORPORATION_VIEW_LST_USERS -->
			<form name="{$FM_CORPORATION_VIEW_LST_USERS}" id="{$FM_CORPORATION_VIEW_LST_USERS}" 
				  class="DivFormHorizontalButtons"method="post" >
				<input type="submit" 
				       name="{$FM_CORPORATION_VIEW_LST_USERS_SB}" 
					   id="{$FM_CORPORATION_VIEW_LST_USERS_SB}"
					   class="DivContentBodySubmitBigger"
					   value="{$SUBMIT_LST_USERS}"/>
			</form>
		</div>
	{/if}
</form>