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
<!-- FM_NOTIFICATION_ASSOCIATE_USERS_FORM -->
<form name="{$FM_NOTIFICATION_ASSOCIATE_USERS_FORM}" id="{$FM_NOTIFICATION_ASSOCIATE_USERS_FORM}" method="{$FORM_METHOD}">
    <!-- FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabelBig">
            <label>{$FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="{$FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL}" id="{$FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL}"
                class=""
                onchange="SetSelectColor('{$FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL}');
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('{$FM_NOTIFICATION_ASSOCIATE_USERS_FORM}', '{$FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL}');">
                {if $FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_VALUE eq ""}
                    <option selected='selected' value="{$FIELD_SEL_NONE}" >
                        {$FIELD_SEL_NONE}
                    </option>
                {elseif $FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_VALUE eq $FIELD_SEL_NONE}
                    <option selected='selected' value="{$FIELD_SEL_NONE}" >
                        {$FIELD_SEL_NONE}
                    </option>
                </option>
                {elseif $FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_VALUE eq $FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL}
                    <option selected='selected' value="{$FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_VALUE_ALL}" > 
                        {$FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_VALUE_ALL_TEXT} 
                    </option>
                {/if}
            </select>
        </div>
    </div>
    <!-- FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabelBig">
            <label>{$FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="{$FIELD_CORPORATION_NAME}" id="{$FIELD_CORPORATION_NAME}"
                class=""
                onchange="SetSelectColor('{$FIELD_CORPORATION_NAME}');
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('{$FM_NOTIFICATION_ASSOCIATE_USERS_FORM}','{$FIELD_CORPORATION_NAME}');">
                {if $FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION_VALUE eq ""}
                    <option selected='selected' value="{$FIELD_SEL_NONE}" >
                        {$FIELD_SEL_NONE}
                    </option>
                {else}
                    {foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_NOTIFICATION_BY_CORPORATION item=INSTANCE_CORPORATION}
		                {foreach key=key item=item from=$INSTANCE_CORPORATION}
                            {if $FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION_VALUE eq {$item->GetCorporationName()}}
                                <option selected='selected' value="{$item->GetCorporationName()}" >
                                    $item->GetCorporationName()
                                </option>
                            {else}
                                <option>
                                    $item->GetCorporationName()
                                </option>
                            {/if}
                        {/foreach}
	                {/foreach}
                {/if}
            </select>
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabelBig">
            <label>{$FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="{$FIELD_DEPARTMENT_NAME}" id="{$FIELD_DEPARTMENT_NAME}"
                class=""
                onchange="SetSelectColor('{$FIELD_DEPARTMENT_NAME}');
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('{$FM_NOTIFICATION_ASSOCIATE_USERS_FORM}', '{$FIELD_DEPARTMENT_NAME}');">
                {if $FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT_VALUE eq ""}
                    <option selected='selected' value="{$FIELD_SEL_NONE}" >
                        {$FIELD_SEL_NONE}
                    </option>
                {else}
                    {foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_NOTIFICATION_BY_DEPARTMENT item=INSTANCE_DEPARTMENT}
		                {foreach key=key item=item from=$INSTANCE_DEPARTMENT}
                            {if $FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT_VALUE eq {$item->GetDepartmentName()}}
                                <option selected='selected' value="{$item->GetDepartmentName() - $item->GetDepartmentCorporationName()}" >
                                    $item->GetDepartmentName() - $item->GetDepartmentCorporationName()
                                </option>
                            {else}
                                <option>
                                    $item->GetDepartmentName() - $item->GetDepartmentCorporationName()
                                </option>
                            {/if}
                        {/foreach}
	                {/foreach}
                {/if}
            </select>
        </div>
    </div>
    <!-- FIELD_ROLE_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabelBig">
            <label>{$FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE_TEXT}</label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="{$FIELD_ROLE_NAME}" id="{$FIELD_ROLE_NAME}"
                class=""
                onchange="SetSelectColor('{$FIELD_ROLE_NAME}');
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('{$FM_NOTIFICATION_ASSOCIATE_USERS_FORM}', '{$FIELD_ROLE_NAME}');">
                {if $FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE_VALUE eq ""}
                    <option selected='selected' value="{$FIELD_SEL_NONE}" >
                        {$FIELD_SEL_NONE}
                    </option>
                {else}
                    {foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_NOTIFICATION_BY_ROLE item=INSTANCE_ROLE}
		                {foreach key=key item=item from=$INSTANCE_ROLE}
                            {if $FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE_VALUE eq {$item->GetRoleName()}}
                                <option selected='selected' value="{$item->GetRoleName()}" >
                                    $item->GetRoleName()
                                </option>
                            {else}
                                <option>
                                    $item->GetRoleName()
                                </option>
                            {/if}
                        {/foreach}
	                {/foreach}
                {/if}
            </select>
        </div>
    </div>
    <!-- FIELD_TEAM_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabelBig">
            <label>{$FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM_TEXT} : </label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="{$FIELD_TEAM_NAME}" id="{$FIELD_TEAM_NAME}"
                class=""
                onchange="SetSelectColor('{$FIELD_TEAM_NAME}');
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').disabled = false;
				          document.getElementById('{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}').className = 'DivContentBodySubmitBigger SubmitEnabled;'
                          ResetOtherSelectValuesByForm('{$FM_NOTIFICATION_ASSOCIATE_USERS_FORM}', '{$FIELD_TEAM_NAME}');">
                {if $FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM_VALUE eq ""}
                    <option selected='selected' value="{$FIELD_SEL_NONE}" >
                        {$FIELD_SEL_NONE}
                    </option>
                {else}
                    {foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_NOTIFICATION_BY_TEAM item=INSTANCE_TEAM}
		                {foreach key=key item=item from=$INSTANCE_TEAM}
                            {if $FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM_VALUE eq {$item->GetTeamName()}}
                                <option selected='selected' value="{$item->GetTeamName() - $item->GetTeamId()}" >
                                    $item->GetTeamName() - $item->GetTeamId()
                                </option>
                            {else}
                                <option>
                                    $item->GetTeamName() - $item->GetTeamId()
                                </option>
                            {/if}
                        {/foreach}
	                {/foreach}
                {/if}
            </select>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer">
        <input type="submit" name="{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}" id="{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_ASSOCIATE}"
               class="DivContentBodySubmitBigger {$SUBMIT_CLASS}" value="{$SUBMIT_ASSOCIATE_USERS}" {$SUBMIT_ENABLED} />
        <input type="submit" name="{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}" id="{$FM_NOTIFICATION_ASSOCIATE_USERS_SB_DISASSOCIATE}"
               class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
               value="{$SUBMIT_ASSOCIATE_USERS_DISASSOCIATE}" {$SUBMIT_ENABLED} />
        <input type="submit" name="{$FM_NOTIFICATION_ASSOCIATE_USERS_CANCEL}" id="{$FM_NOTIFICATION_ASSOCIATE_USERS_CANCEL}"
               class="DivContentBodySubmitBigger" value="{$SUBMIT_CANCEL}" />
    </div>
</form>