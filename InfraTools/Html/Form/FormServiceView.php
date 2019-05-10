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
<!-- FM_SERVICE_VIEW -->
<form name="{$FM_SERVICE_VIEW}" id="{$FM_SERVICE_VIEW}" class="DivFormServiceView" method="{$FORM_METHOD}" >
    <!-- FIELD_SERVICE_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_SERVICE_ID_TEXT}</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_SERVICE_ID_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_SERVICE_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_SERVICE_NAME_TEXT}</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_SERVICE_NAME_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_SERVICE_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_SERVICE_DESCRIPTION_TEXT}</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_SERVICE_DESCRIPTION_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_SERVICE_TYPE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_SERVICE_TYPE_TEXT}</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_SERVICE_TYPE_VALUE}</label>
        </div>
    </div>
	{if $ARRAY_INSTANCE_INFRATOOLS_ASSOC_IP_ADDRESS_SERVICE eq true}
		<!-- FIELD_SERVICE_TYPE -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_IP_ADDRESS_IPV4_TEXT}</label>
			</div>
			{foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_ASSOC_IP_ADDRESS_SERVICE item=INSTANCE_ASSOC_IP_ADDRESS_SERVICE}
				{foreach key=key item=item from=$INSTANCE_ASSOC_IP_ADDRESS_SERVICE}
						<div class="DivContentBodyContainerValue">
							<label class="DivContentBodyContainerValueContent">{$item->GetAssocIpAddressServiceServiceIp()}</label>
						</div>
				{/foreach}
			{/foreach}
		</div>
	{/if}
    <!-- FIELD_CORPORATION_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label>{$FIELD_CORPORATION_NAME_TEXT}</label>
		</div>
		<div class="DivContentBodyContainerValue">
			<div>
				<label class="DivContentBodyContainerValueContent">{$FIELD_CORPORATION_NAME_VALUE}</label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img   src="{$FIELD_CORPORATION_ACTIVE_ICON}"
					   alt="ServiceCorporation" width="20" height="20" />
			</div>
		</div>
	</div>
	<div class="DivClearFloat"></div>
    <!-- FIELD_DEPARTMENT_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label>{$FIELD_DEPARTMENT_NAME_TEXT}</label>
		</div>
		<div class="DivContentBodyContainerValue">
			<div>
				<label class="DivContentBodyContainerValueContent">{$FIELD_DEPARTMENT_NAME_VALUE}</label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img   src="{$FIELD_DEPARTMENT_ACTIVE_ICON}"
					   alt="ServiceDepartment" width="20" height="20" />
			</div>
		</div>
	</div>
	<div class="DivClearFloat"></div>
    <!-- FIELD_SERVICE_ACTIVE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_SERVICE_ACTIVE_TEXT}</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <img src="{$FIELD_SERVICE_ACTIVE_VALUE}" alt="ServiceActive" width="20" height="20" />
        </div>
    </div>
     <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_REGISTER_DATE_TEXT}</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_REGISTER_DATE_VALUE}</label>
        </div>
    </div>
</form>
{if $FIELD_TYPE_ASSOC_USER_SERVICE_SERVICE_ID <= 2}
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer">
		<!-- FORM SERVICE VIEW UPDATE -->
		<form name="{$FM_SERVICE_VIEW_UPDT}" id="{$FM_SERVICE_VIEW_UPDT}" 
			  class="DivFormHorizontalButtons" method="post" >
			  <input type="submit" name="{$FM_SERVICE_VIEW_UPDT_SB}" id="{$FM_SERVICE_VIEW_UPDT_SB}"
					 class="DivContentBodySubmitBigger"
					 value="{$SUBMIT_UPDT}"/>
			  <input type="hidden" name="{$FM_SERVICE_VIEW_UPDT_HIDDEN_ID}" id="{$FM_SERVICE_VIEW_UPDT_HIDDEN_ID}"
					 value="{$FIELD_SERVICE_ID_VALUE}"/>
		</form>
		<!-- FORM SERVICE VIEW DELETE -->
		<form name="{$FM_SERVICE_VIEW_DEL}" id="{$FM_SERVICE_VIEW_DEL}" 
			  class="DivFormHorizontalButtons" method="post" >
			  <input type="submit" name="{$FM_SERVICE_VIEW_DEL_SB}" id="{$FM_SERVICE_VIEW_DEL_SB}"
					 class="DivContentBodySubmitBigger"
					 value="{$SUBMIT_DEL}"
					 onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
			  <input type="hidden" name="{$FM_SERVICE_VIEW_DEL_HIDDEN_ID}" id="{$FM_SERVICE_VIEW_DEL_HIDDEN_ID}"
					value="{$FIELD_SERVICE_ID_VALUE}"/>
		</form>
		{if $SUPER_USER eq true}
			<!-- FM_SERVICE_VIEW_LST_USERS -->
			<form name="{$FM_SERVICE_VIEW_LST_USERS}" id="{$FM_SERVICE_VIEW_LST_USERS}" 
				  class="DivFormHorizontalButtons" method="post" >
				<input type="submit" name="{$FM_SERVICE_VIEW_LST_USERS_SB}" id="{$FM_SERVICE_VIEW_LST_USERS_SB}"
						   class="DivContentBodySubmitBigger"
						   value="{$SUBMIT_LST_USERS}"/>
			</form>
		{/if}
	</div>
{/if}
<div class="DivClearFloat"></div>