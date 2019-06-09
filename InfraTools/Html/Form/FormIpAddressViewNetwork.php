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
<!-- FM_IP_ADDRESS_VIEW_NETWORK -->
<form name="{$FM_IP_ADDRESS_VIEW_NETWORK}" id="{$FM_IP_ADDRESS_VIEW_NETWORK}" method="{$FORM_METHOD}" >
    <!-- FIELD_NETWORK_IP -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_NETWORK_IP_TEXT} :</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_NETWORK_IP_VALUE}</label>
        </div>
    </div>
   	<!-- FIELD_NETWORK_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_NETWORK_NAME_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_NETWORK_NAME_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_NETWORK_NETMASK -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_NETWORK_NETMASK_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_NETWORK_NETMASK_VALUE}</label>
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
{if $CURRENT_PAGE eq $PAGE_ADMIN_IP_ADDRESS}
    <div class="DivContentBodyContainer">
		<!-- FM_IP_ADDRESS_VIEW_NETWORK_UPDT -->
		<form name="{$FM_IP_ADDRESS_VIEW_NETWORK_UPDT}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_UPDT}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
			<input type="submit" name="{$FM_IP_ADDRESS_VIEW_NETWORK_UPDT_SB}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_UPDT_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_UPDT_NETWORK}"/>
		</form>
		<!-- FM_IP_ADDRESS_VIEW_DEL -->
		<form name="{$FM_IP_ADDRESS_VIEW_NETWORK_DEL}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_DEL}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}">
			<input type="submit" name="{$FM_IP_ADDRESS_VIEW_NETWORK_DEL_SB}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_DEL_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_DEL}"
					onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
		</form>
		<!-- FM_IP_ADDRESS_VIEW_NETWORK_ST_USERS -->
		<form name="{$FM_IP_ADDRESS_VIEW_NETWORK_ST_USERS}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_ST_USERS}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}">
			<input type="submit" name="{$FM_IP_ADDRESS_VIEW_NETWORK_ST_USERS_SB}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_ST_USERS_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_LST_USERS}"/>
		</form>
	</div>
{/if}