<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_NOTIFICATION_ACTIVE_TEXT}
		{$RETURN_NOTIFICATION_ID_TEXT}
		{$RETURN_NOTIFICATION_TEXT_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_NOTIFICATION_VIEW -->
<form name="{$FM_NOTIFICATION_VIEW}" id="{$FM_NOTIFICATION_VIEW}" method="{$FORM_METHOD}">
    <!-- FIELD_NOTIFICATION_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_NOTIFICATION_ID_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_NOTIFICATION_ID_VALUE}</label>
        </div>
    </div>
    <!-- FIELD_NOTIFICATION_TEXT -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label>{$FIELD_NOTIFICATION_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent">{$FIELD_NOTIFICATION_TEXT_VALUE}</label>
        </div>
    </div>
    {if $CURRENT_PAGE eq $PAGE_ADMIN_NOTIFICATION}
		<!-- FIELD_NOTIFICATION_ACTIVE -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_NOTIFICATION_ACTIVE} : </label>
			</div>
			<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent">
					{if $FIELD_NOTIFICATION_ACTIVE_VALUE eq true}	
						<img src="{$ICON_INFRATOOLS_VERIFIED}" 
							 name="{$FIELD_NOTIFICATION_ACTIVE_TEXT}"
							 alt='NotificationActive' width='20' height='20' />
					{else}
						<img src="{$ICON_INFRATOOLS_VERIFIED_NOT}" 
							 name="{$FIELD_NOTIFICATION_ACTIVE_TEXT}"
							 alt='NotificationActive' width='20' height='20' />
					{/if}
				</label>
			</div>
		</div>
	{else}
    	<!-- FIELD_ASSOC_USER_NOTIFICATION_READ -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_ASSOC_USER_NOTIFICATION_READ_TEXT} : </label>
			</div>
			<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent">
					{if $FIELD_ASSOC_USER_NOTIFICATION_READ_VALUE eq true}	
						<img src="{$ICON_INFRATOOLS_VERIFIED}" 
							 name="{$FIELD_ASSOC_USER_NOTIFICATION_READ_TEXT}"
							 alt='NotificationActive' width='20' height='20' />
					{else}
						<img src="{$ICON_INFRATOOLS_VERIFIED_NOT}" 
							 name="{$FIELD_ASSOC_USER_NOTIFICATION_READ_TEXT}"
							 alt='NotificationActive' width='20' height='20' />
					{/if}
				</label>
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
{if $CURRENT_PAGE eq $PAGE_ADMIN_NOTIFICATION}
	<div class="DivContentBodyContainer">
		<!-- FM_NOTIFICATION_VIEW_UPDT -->
		<form name="{$FM_NOTIFICATION_VIEW_UPDT}" id="{$FM_NOTIFICATION_VIEW_UPDT}" 
			  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
			<input type="submit" name="{$FM_NOTIFICATION_VIEW_UPDT_SB}" id="{$FM_NOTIFICATION_VIEW_UPDT_SB}" 
			       class="DivContentBodySubmitBigger" value="{$SUBMIT_UPDT}"/>
		</form>
		<!-- FM_NOTIFICATION_VIEW_DEL -->
		<form name="{$FM_NOTIFICATION_VIEW_DEL}" id="{$FM_NOTIFICATION_VIEW_DEL}" 
			  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
			<input type="submit" name="{$FM_NOTIFICATION_VIEW_DEL_SB}" id="{$FM_NOTIFICATION_VIEW_DEL_SB}"
				   class="DivContentBodySubmitBigger" value="{$SUBMIT_DEL}" 
				   onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
		</form>
		<!-- FM_NOTIFICATION_VIEW_LST_USERS -->
		<form name="{$FM_NOTIFICATION_VIEW_LST_USERS}" id="{$FM_NOTIFICATION_VIEW_LST_USERS}" 
			  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
			<input type="submit" name="{$FM_NOTIFICATION_VIEW_LST_USERS_SB}" id="{$FM_NOTIFICATION_VIEW_LST_USERS_SB}"
				   class="DivContentBodySubmitBigger" value="{$SUBMIT_LST_USERS}"/>
		</form>
		<!-- FM_NOTIFICATION_VIEW_ASSOCIATE_USER -->
		<form name="{$FM_NOTIFICATION_VIEW_ASSOCIATE_USER}" id="{$FM_NOTIFICATION_VIEW_ASSOCIATE_USER}" 
			  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
			<input type="submit" name="{$FM_NOTIFICATION_VIEW_ASSOCIATE_USER_SB}" id="{$FM_NOTIFICATION_VIEW_ASSOCIATE_USER_SB}"
				   class="DivContentBodySubmitBigger" value="{$SUBMIT_ASSOCIATE_USER}"/>
		</form>
	</div>
{/if}