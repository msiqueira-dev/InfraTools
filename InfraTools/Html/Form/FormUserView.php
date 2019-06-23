<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{if $USER_NOT_CONFIRMED}
			{$USER_NOT_CONFIRMED}
		{/if}
		{$RETURN_TEXT}
	</label>
</div>
<div class="DivContentBodySided">
	<!-- FIELD_USER_NAME -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_USER_NAME_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">{$FIELD_USER_NAME_VALUE}</label>
		</div>
	</div>
	<!-- FIELD_USER_EMAIL -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_USER_EMAIL_TEXT} :</label>
		</div>
		<div class="DivContentBodyContainerValueSided" id="BodyUserViewEmailDiv">
			<label id="BodyUserViewEmailLabel" class="DivContentBodyContainerValueContent">{$FIELD_USER_EMAIL_VALUE}</label>
		</div>
	</div>
	<!-- FIELD_USER_UNIQUE_ID -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_USER_UNIQUE_ID_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<div>
				<label class="DivContentBodyContainerValueContent">{$FIELD_USER_UNIQUE_ID_VALUE}</label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img src="{$FIELD_USER_UNIQUE_ID_ICON}"
					 name="{$FM_ACCOUNT_VERIFIED_USER_UNIQUE_ID_SB}"
					alt="UserUniqueIdVerification" width="20" height="20" />
			</div>
		</div>
	</div>
	<div class="DivClearFloat"></div>
	<!-- FIELD_USER_BIRTH_DATE -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_USER_BIRTH_DATE_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">{$FIELD_USER_BIRTH_DATE_DAY_VALUE}</label>
			<label class="DivContentBodyContainerValueContent">{$FIELD_USER_BIRTH_DATE_MONTH_VALUE}</label>
			<label class="DivContentBodyContainerValueContent">{$FIELD_USER_BIRTH_DATE_YEAR_VALUE}</label>
		</div>
	</div>
	<!-- FIELD_USER_GENDER -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_USER_GENDER_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">{$FIELD_USER_GENDER_VALUE}</label>
		</div>
	</div>
	<!-- FIELD_COUNTRY_NAME -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_COUNTRY_NAME_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">{$FIELD_COUNTRY_NAME_VALUE}</label>
		</div>
	</div>
	<!-- FIELD_USER_REGION -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_USER_REGION_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">{$FIELD_USER_REGION_VALUE}</label>
		</div>
	</div>
	<!-- FIELD_USER_PHONE_PRIMARY -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_USER_PHONE_PRIMARY_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">
				( {$FIELD_USER_PHONE_PRIMARY_PREFIX_VALUE} )&nbsp
			</label>
			<label class="DivContentBodyContainerValueContent">{$FIELD_USER_PHONE_PRIMARY_VALUE}</label>
		</div>
	</div>
	<!-- FIELD_USER_PHONE_SECONDARY -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_USER_PHONE_SECONDARY_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">
				( {$FIELD_USER_PHONE_SECONDARY_PREFIX_VALUE} )&nbsp
			</label>
			<label class="DivContentBodyContainerValueContent">{$FIELD_USER_PHONE_SECONDARY_VALUE}</label>
		</div>
	</div>
</div>
<div class="DivContentBodySided">
	<!-- FIELD_CORPORATION_NAME -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_CORPORATION_NAME_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<div>
				<label class="DivContentBodyContainerValueContent">{$FIELD_CORPORATION_NAME_VALUE}</label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img   src="{$FIELD_CORPORATION_ACTIVE_ICON}" 
					   name="{$FM_ACCOUNT_VERIFIED_CORPORATION_SB}"
					   alt="CorporationVerification" width="20" height="20" />
			</div>
		</div>
	</div>
	<!-- FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<div>
				<label class="DivContentBodyContainerValueContent">{$FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_VALUE}</label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img   src="{$FIELD_ASSOC_USER_CORPORATION_USER_REGISTRATION_DATE_ACTIVE_ICON}" 
					   name="{$FM_ACCOUNT_VERIFIED_CORPORATION_SB}"
					   alt="CorporationVerification" width="20" height="20" />
			</div>
		</div>
	</div>
	<!-- FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<div>
				<label class="DivContentBodyContainerValueContent">{$FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID_VALUE}</label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img   src="{$FIELD_ASSOC_USER_CORPORATION_USER_REGISTRATION_ID_ACTIVE_ICON}" 
					   name="{$FM_ACCOUNT_VERIFIED_CORPORATION_SB}"
					   alt="CorporationVerification" width="20" height="20" />
			</div>
		</div>
	</div>
	<!-- FIELD_DEPARTMENT_NAME -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_DEPARTMENT_NAME_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<div>
				<label class="DivContentBodyContainerValueContent">{$FIELD_DEPARTMENT_NAME_VALUE}</label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img src="{$FIELD_DEPARTMENT_ACTIVE_ICON}" name="{$FM_ACCOUNT_VERIFIED_DEPARTMENT_SB}"
					 alt="DepartmentVerification" width="20" height="20" />
			</div>
		</div>
	</div>
	<!-- FIELD_TEAM_NAME -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_TEAM_NAME_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">{$FIELD_USER_TEAM_VALUE}</label>
		</div>
	</div>
	{if $FIELD_USER_TYPE_USER_DESCRIPTION_VALUE_SHOW eq TRUE}
		<!-- FIELD_TYPE_USER_DESCRIPTION -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label>{$FIELD_TYPE_USER_DESCRIPTION_TEXT} : </label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent">{$FIELD_TYPE_USER_DESCRIPTION_VALUE}></label>
			</div>
		</div>
	{/if}
	{if $FIELD_USER_SESSION_EXPIRES_VALUE_ENABLE eq TRUE}
		 <!-- FIELD_USER_SESSION_EXPIRES -->
		 <div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided" id="DivContentBodyContainerValueSidedFloat">
				<label>{$FIELD_USER_SESSION_EXPIRES_TEXT} : </label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent">
					<img src="{$FIELD_USER_SESSION_EXPIRES_ICON}" name="{$FIELD_USER_SESSION_EXPIRES}"
						 alt="CorporationVerification" width="20" height="20" />
				</label>
			</div>
		</div>
	{/if}
    {if $FIELD_USER_TWO_STEP_VERIFICATION_VALUE_ENABLE eq TRUE}
		 <!-- FIELD_USER_TWO_STEP_VERIFICATION -->
		 <div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label>{$FIELD_USER_TWO_STEP_VERIFICATION_TEXT} : </label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<div class="DivContentBodyContainerSubmitImage">
					<img src="{$FIELD_USER_TWO_STEP_VERIFICATION_ICON}" name="{$FIELD_USER_TWO_STEP_VERIFICATION}"
						 alt="UserTwoStepVerification" width="20" height="20" />
				</div>
			 </div>
		</div>
	{/if}
	{if $FIELD_USER_ACTIVE_VALUE_ENABLE eq TRUE}
	<!-- FIELD_USER_ACTIVE -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided" id="DivContentBodyContainerValueSidedFloat">
			<label>{$FIELD_USER_ACTIVE_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">
				<img src="{$FIELD_USER_ACTIVE_ICON}" name="{$FIELD_USER_ACTIVE}"
				     alt="UserActive" width="20" height="20" />
			</label>
		</div>
	</div>
	{/if}
    {if $FIELD_USER_CONFIRMED_VALUE_ENABLE eq TRUE}
		 <!-- FIELD_USER_CONFIRMED -->
		 <div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided" id="DivContentBodyContainerValueSidedFloat">
				<label>{$FIELD_USER_CONFIRMED_TEXT} : </label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent">
					<img src="{$FIELD_USER_CONFIRMED_ICON}" name="{$FIELD_USER_CONFIRMED}"
					     alt="UserConfirmed" width="20" height="20" />
				</label>
			</div>
		</div>
	{/if}
	<!-- REGISTER_DATE -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label>{$FIELD_REGISTER_DATE_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">{$FIELD_REGISTER_DATE_VALUE}</label>
		</div>
	</div>
</div>
<div class="DivClearFloat"></div>
<!-- SUBMIT -->
<div class="DivContentBodyContainer">
	{if $CURRENT_PAGE eq $PAGE_ADMIN_USER or $CURRENT_PAGE eq $PAGE_ACCOUNT}
		{if $INSTANCE_USER_CHECK eq TRUE}
			<!-- FM_USER_VIEW_UPDT -->
			<form name="{$FM_USER_VIEW_UPDT}" id="{$FM_USER_VIEW_UPDT}" 
				  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
				<input type="submit" name="{$FM_USER_VIEW_UPDT_SB}" id="{$FM_USER_VIEW_UPDT_SB}"
					   class="DivContentBodySubmitBigger" value="{$SUBMIT_UPDT}"/>
			</form>
			{if $CURRENT_PAGE eq $PAGE_ACCOUNT}
				<!-- FM_USER_VIEW_CHANGE_PASSWORD -->
				<form name="{$FM_USER_VIEW_CHANGE_PASSWORD}" id="{$FM_USER_VIEW_CHANGE_PASSWORD}" 
					  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
					<input type="submit" name="{$FM_USER_VIEW_CHANGE_PASSWORD_SB}" id="{$FM_USER_VIEW_CHANGE_PASSWORD_SB}"
						   class="DivContentBodySubmitBigger" value="{$SUBMIT_CHANGE_PASSWORD}"/>
				</form>
			{/if}
			{if $FIELD_USER_TWO_STEP_VERIFICATION_VALUE eq TRUE}
				<!-- FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE -->
				<form name="{$FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE}" id="{$FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE}" 
					  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
					<input type="submit" name="{$FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SB}" 
					       id="{$FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SB}"
						   class="DivContentBodySubmitBigger" value="{$SUBMIT_TWO_STEP_VERIFICATION_DEACTIVATE}"
						   onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
				</form>
			{else}
				<!-- FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE -->
				<form name="{$FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE}" id="{$FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE}" 
					  class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
					<input type="submit" name="{$FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SB}" 
						   id="{$FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SB}"
						   class="DivContentBodySubmitBigger" value="{$SUBMIT_TWO_STEP_VERIFICATION_ACTIVATE}"
						   onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
				</form>
			{/if}
			{if $SUPER_USER eq true}
				{if $CURRENT_PAGE eq $PAGE_ACCOUNT}
					<!-- HREF_PAGE_ADMIN -->
					<form class="DivFormHorizontalButtons">
						<div class="DivContentBodyContainersBoxLink">
							<a href="{$HREF_PAGE_ADMIN}" title='{$HEADER_PAGE_ADMIN_TEXT}'>
								<span> 
									{$HEADER_PAGE_ADMIN_TEXT}
								</span>
							</a>
						</div>
					</form>
				{else}
					<!-- FM_USER_VIEW_CHANGE_USER_TYPE -->
					<form name="{$FM_USER_VIEW_CHANGE_USER_TYPE}" id="{$FM_USER_VIEW_CHANGE_USER_TYPE}" 
						class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
						<input type="submit" name="{$FM_USER_VIEW_CHANGE_USER_TYPE_SB}" id="{$FM_USER_VIEW_CHANGE_USER_TYPE_SB}"
							class="DivContentBodySubmitBigger" value="{$SUBMIT_CHANGE_USER_TYPE}"/>
					</form>
					<!-- FM_USER_VIEW_CHANGE_CORPORATION_SB -->
					<form name="{$FM_USER_VIEW_CHANGE_CORPORATION}" id="{$FM_USER_VIEW_CHANGE_CORPORATION}" 
						class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
						<input type="submit" name="{$FM_USER_VIEW_CHANGE_CORPORATION_SB}" id="{$FM_USER_VIEW_CHANGE_CORPORATION_SB}"
							class="DivContentBodySubmitBigger" value="{$SUBMIT_CHANGE_CORPORATION}"/>
					</form>
					{if $FIELD_USER_CORPORATION_NAME_VALUE}
						<!-- FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION -->
						<form name="{$FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION}" id="{$FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION}" 
							class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
							<input type="submit" name="{$FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION_SB}" 
								id="{$FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION_SB}"
								class="DivContentBodySubmitBigger"
								value="{$SUBMIT_CHANGE_ASSOC_USER_CORPORATION}"/>
						</form>
					{/if}
					<!-- FM_USER_VIEW_RESET_PASSWORD -->
					<form name="{$FM_USER_VIEW_RESET_PASSWORD}" id="{$FM_USER_VIEW_RESET_PASSWORD}" 
						class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
						<input type="submit" name="{$FM_USER_VIEW_RESET_PASSWORD_SB}" id="{$FM_USER_VIEW_RESET_PASSWORD_SB}"
							class="DivContentBodySubmitBigger" value="{$SUBMIT_RESET_PASSWORD}"
							onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
					</form>
					{if $FIELD_USER_ACTIVE_VALUE eq TRUE}
						<!-- FM_USER_VIEW_DEACTIVATE -->
						<form name="{$FM_USER_VIEW_DEACTIVATE}" id="{$FM_USER_VIEW_DEACTIVATE}" 
							class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
							<input type="submit" name="{$FM_USER_VIEW_DEACTIVATE_SB}" id="{$FM_USER_VIEW_DEACTIVATE_SB}"
								class="DivContentBodySubmitBigger" value="{$SUBMIT_ACCOUNT_DEACTIVATE}"
								onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
						</form>
					{else}
						<!-- FM_USER_VIEW_ACTIVATE -->
						<form name="{$FM_USER_VIEW_ACTIVATE}" id="{$FM_USER_VIEW_ACTIVATE}" 
							class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
							<input type="submit" name="{$FM_USER_VIEW_ACTIVATE_SB}" id="{$FM_USER_VIEW_ACTIVATE_SB}"
								class="DivContentBodySubmitBigger" value="{$SUBMIT_ACCOUNT_ACTIVATE}"
								onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
						</form>
					{/if}
					<!-- FM_USER_VIEW_DEL -->
					<form name="{$FM_USER_VIEW_DEL}" id="{$FM_USER_VIEW_DEL}" 
						class="DivFormHorizontalButtons" method="{$FORM_METHOD}" >
						<input type="submit" name="{$FM_USER_VIEW_DEL_SB}" id="{$FM_USER_VIEW_DEL_SB}"
							class="DivContentBodySubmitBigger" value="{$SUBMIT_DEL}"
							onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
					</form>
				{/if}
			{/if}
		{else}
			if(!isset($this->InstanceUserAdmin)) $this->LoadNotConfirmedToolTip();
		{/if}
	{/if}
</div>