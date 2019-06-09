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
<!-- FM_IP_ADDRESS_VIEW_IP_ADDRESS -->
<form name="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS}" id="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS}" method="{$FORM_METHOD}" >
    <!-- FIELD_IP_ADDRESS_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_IP_ADDRESS_DESCRIPTION_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_IP_ADDRESS_DESCRIPTION_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_IP_ADDRESS_IPV4 -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_IP_ADDRESS_IPV4_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_IP_ADDRESS_IPV4_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_IP_ADDRESS_IPV6 -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_IP_ADDRESS_IPV6_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_IP_ADDRESS_IPV6_VALUE}</label>
        </div>
    </div>
    {if isset($FIELD_NETWORK_NAME_TEXT) }
		<!-- FIELD_NETWORK_IP -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_NETWORK_IP_TEXT} : </label>
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
   	{/if}
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
		<!-- FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT -->
		<form name="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT}" id="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT}"
			  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
			<input type="submit" name="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT_SB}" id="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS_UPDT_SB}"
				   class="DivContentBodySubmitBigger" value="{$SUBMIT_UPDT_IP_ADDRESS}"/>
		</form>
		{if isset($FIELD_NETWORK_NAME_TEXT) }
			<!-- FM_IP_ADDRESS_VIEW_NETWORK_UPDT -->
			<form name="{$FM_IP_ADDRESS_VIEW_NETWORK_UPDT}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_UPDT}"
			  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
				<input type="submit" name="{$FM_IP_ADDRESS_VIEW_NETWORK_UPDT_SB}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_UPDT_SB}"
					   class="DivContentBodySubmitBigger" value="{$SUBMIT_UPDT_NETWORK}"/>
			</form>
		{/if}
		<!-- FM_IP_ADDRESS_VIEW_DEL -->
		<form name="{$FM_IP_ADDRESS_VIEW_DEL}" id="{$FM_IP_ADDRESS_VIEW_DEL}" 
			  class="DivFormHorizontalButtons" method="{$FORM_METHOD}">
			<input type="submit" name="{$FM_IP_ADDRESS_VIEW_DEL_SB}" id="{$FM_IP_ADDRESS_VIEW_DEL_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_DEL}"
					onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
		</form>
		<!-- FM_IP_ADDRESS_VIEW_LST_USERS_IP_ADDRESS -->
		<form name="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS}" id="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS}" 
			  class="DivFormHorizontalButtons" method="{$FORM_METHOD}">
			<input type="submit" name="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_SB}" id="{$FM_IP_ADDRESS_VIEW_IP_ADDRESS_LST_USERS_SB}"
					class="DivContentBodySubmitBigger" value="{$SUBMIT_LST_USERS}"/>
		</form>
		{if isset($FIELD_NETWORK_NAME_TEXT) }
			<!-- FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS -->
			<form name="{$FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS}" 
				class="DivFormHorizontalButtons" method="{$FORM_METHOD}">
				<input type="submit" name="{$FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_SB}" id="{$FM_IP_ADDRESS_VIEW_NETWORK_LST_USERS_SB}"
						class="DivContentBodySubmitBigger" value="{$SUBMIT_LST_USERS}"/>
			</form>
		{/if}
	</div>
{/if}