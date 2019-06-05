<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_IP_ADDRESS_DESCRIPTION_TEXT}
		{$RETURN_IP_ADDRESS_IPV4_TEXT}
		{$RETURN_IP_ADDRESS_IPV6_TEXT}
		{$RETURN_NETWORK_IP_TEXT}
		{$RETURN_NETWORK_NAME_TEXT}
		{$RETURN_NETWORK_NETMASK_TEXT}
		{$RETURN_NETWORK_NAME_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_IP_ADDRESS_REGISTER_FORM_NETWORK -->
<form name="{$FM_IP_ADDRESS_REGISTER_FORM_NETWORK}" id="{$FM_IP_ADDRESS_REGISTER_FORM_NETWORK}" method="{$FORM_METHOD}">
	<input type="hidden" name="{$FM_IP_ADDRESS_REGISTER_FORM_NETWORK}" id="{$FM_IP_ADDRESS_REGISTER_FORM_NETWORK}" value="{$FM_IP_ADDRESS_REGISTER_FORM_NETWORK}"/>
	<!-- FIELD_NETWORK_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label>{$FIELD_NETWORK_NAME_TEXT} : </label>
		</div>
		<select name="{$FIELD_NETWORK_NAME}" id="{$FIELD_NETWORK_NAME}" class="{$RETURN_NETWORK_NAME_CLASS}"
				    onchange="SetSelectColor('{$FIELD_NETWORK_NAME}');
				              document.getElementById('{$FM_IP_ADDRESS_REGISTER_SB}').disabled = false;
				              document.getElementById('{$FM_IP_ADDRESS_REGISTER_SB}').className = 'DivContentBodySubmitBigger SubmitEnabled'; this.form.submit()">
			{if $FIELD_SEL_NONE neq FALSE}
						<option value="{$FIELD_SEL_NONE}" selected='selected' >
								{$FIELD_SEL_NONE_TEXT}
						</option>
				{else}
						<option value="{$FIELD_SEL_NONE}">
								{$FIELD_SEL_NONE_TEXT}
						</option>
				{/if}
				{foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_NETWORK item=INSTANCE_NETWORK}
					{foreach key=key item=item from=$INSTANCE_NETWORK}
							{if $FIELD_NETWORK_NAME_VALUE eq $item->GetNetworkName()}
									<option  selected='selected' value="{$item->GetNetworkName()}">
											{$item->GetNetworkName()}
									</option>
							{else}
									<option  value="{$item->GetNetworkName()}">
											{$item->GetNetworkName()}
									</option>
							{/if}
					{/foreach}
				{/foreach}
			</select>
		</div>
	</div>
</form>
<!-- FM_IP_ADDRESS_REGISTER_FORM -->
<form name="{$FM_IP_ADDRESS_REGISTER_FORM}" id="{$FM_IP_ADDRESS_REGISTER_FORM}" method="{$FORM_METHOD}">
	{if $FIELD_NETWORK_NAME_VALUE neq ""}
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
	{if $FIELD_NETWORK_NAME_VALUE eq ""}
		<!-- FIELD_NETWORK_IP -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_NETWORK_IP_TEXT} : </label>
			</div>
			<div class="DivContentBodyContainerValue">
			<input type="text" name="{$FIELD_NETWORK_IP}" id="{$FIELD_NETWORK_IP}" 
						 class="FormFieldNotObligatory {$RETURN_NETWORK_IP_CLASS}"
						 onblur="ValidateIpAddressIpv4(null, '{$FIELD_NETWORK_IP}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
										 ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
						 onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
						 onchange="ValidateIpAddressIpv4(null, '{$FIELD_NETWORK_IP}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
											 ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ','{$FM_IP_ADDRESS_REGISTER_SB}', '');"
						 title="{$FIELD_NETWORK_IP_TEXT}" value="{$FIELD_NETWORK_IP_VALUE}" maxlength="15" />
			</div>
		</div>
		<!-- FIELD_NETWORK_NAME -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_NETWORK_NAME_TEXT} : </label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="text" name="{$FIELD_NETWORK_NAME}" id="{$FIELD_NETWORK_NAME}" 
										class="FormFieldNotObligatory {$RETURN_NETWORK_NAME_TEXT}"
										onblur="ValidateDescription(null, '{$FIELD_NETWORK_NAME}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
												ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
										onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ','{$FM_IP_ADDRESS_REGISTER_SB}', '');"
										onchange="ValidateDescription(null, '{$FIELD_NETWORK_NAME}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
												ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
										title="{$FIELD_NETWORK_NAME_TEXT}"
										value="{$FIELD_NETWORK_NAME_VALUE}" maxlength="60" />
			</div>
		</div>
		<!-- FIELD_NETWORK_NETMASK -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_NETWORK_NETMASK_TEXT} : </label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="text" name="{$FIELD_NETWORK_NETMASK}" id="{$FIELD_NETWORK_NETMASK}" 
										class="FormFieldNotObligatory {$RETURN_NETWORK_NETMASK_CLASS}"
										onblur="ValidateNetmask(null, '{$FIELD_NETWORK_NETMASK}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
														ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
										onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
										onchange="ValidateNetmask(null, '{$FIELD_NETWORK_NETMASK}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
															ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
										title="{$FIELD_NETWORK_NETMASK_TEXT}"
										value="{$FIELD_NETWORK_NETMASK_VALUE}" maxlength="2" />
			</div>
		</div>
	{/if}
	<!-- FIELD_IP_ADDRESS_DESCRIPTION -->
	<div class="DivContentBodyContainerTextArea">
			<div class="DivContentBodyContainerLabel">
					<label>{$FIELD_IP_ADDRESS_DESCRIPTION_TEXT} : </label>
			</div>
			<div class="DivContentBodyContainerValue">
					<textarea name="{$FIELD_IP_ADDRESS_DESCRIPTION}" id="{$FIELD_IP_ADDRESS_DESCRIPTION}" 
										class="FormFieldNotObligatory DivContentBodyContainerValueTextArea <?php echo $this->ReturnIpAddressClass; ?>"
										onblur="ValidateDescription('DivContentBodyContainerValueTextArea', '{$FIELD_IP_ADDRESS_DESCRIPTION}', 'DivContentBodySubmitBigger ',
																								'{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
														ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
										onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}','DivContentBodySubmitBigger ','{$FM_IP_ADDRESS_REGISTER_SB}', '');"
										onchange="ValidateDescription('DivContentBodyContainerValueTextArea', '{$FIELD_IP_ADDRESS_DESCRIPTION}', 'DivContentBodySubmitBigger ',
															                              '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
															ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
										title="{$FIELD_IP_ADDRESS_DESCRIPTION_TEXT}"
										maxlength="500">{$FIELD_IP_ADDRESS_DESCRIPTION_VALUE}</textarea>
			</div>
	</div>
	<!-- FIELD_IP_ADDRESS_IPV4 -->
<div class="DivContentBodyContainer">
	<div class="DivContentBodyContainerLabel">
		<label>{$FIELD_IP_ADDRESS_IPV4}</label>
	</div>
	<div class="DivContentBodyContainerValue">
		<input type="text" name="{$FIELD_IP_ADDRESS_IPV4}" id="{$FIELD_IP_ADDRESS_IPV4}" 
					 class="FormFieldNotObligatory {$RETURN_IP_ADDRESS_IPV4_CLASS}"
					 onblur="ValidateIpAddressIpv4(null, '{$FIELD_IP_ADDRESS_IPV4}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
									 ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
					 onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
					 onchange="ValidateIpAddressIpv4(null, '{$FIELD_IP_ADDRESS_IPV4}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
										      ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
					 title="{$FIELD_IP_ADDRESS_IPV4_TEXT}"
					 value="{$FIELD_IP_ADDRESS_IPV4_VALUE}" maxlength="15" />
	</div>
</div>
	<!-- FIELD_IP_ADDRESS_IPV6 -->
<div class="DivContentBodyContainer">
	<div class="DivContentBodyContainerLabel">
		<label>{$FIELD_IP_ADDRESS_IPV6_TEXT} : </label>
	</div>
	<div class="DivContentBodyContainerValue">
		<input type="text" name="{$FIELD_IP_ADDRESS_IPV6}" id="{$FIELD_IP_ADDRESS_IPV6}" 
					 class="FormFieldNotObligatory {$RETURN_IP_ADDRESS_IPV6_CLASS}"
					 onblur="ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
					 onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
					 onchange="ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_REGISTER_SB}', '');"
					 title="{$FIELD_IP_ADDRESS_IPV6_TEXT}"
					 value="{$FIELD_IP_ADDRESS_IPV6_VALUE}" maxlength="15" />
	</div>
</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainer"
				onmouseover="ValidateDescription('DivContentBodyContainerValueTextArea', '{$FIELD_IP_ADDRESS_DESCRIPTION}',
									                       'DivContentBodySubmitBigger', '{$FM_IP_ADDRESS_REGISTER_SB}', '', true);
										 ValidateMultiplyFields('{$FM_IP_ADDRESS_REGISTER_FORM}', 'DivContentBodySubmitBigger', '{$FM_IP_ADDRESS_REGISTER_SB}', '');">
			<input type="submit" name="{$FM_IP_ADDRESS_REGISTER_SB}" id="{$FM_IP_ADDRESS_REGISTER_SB}"
						 class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
						 value="{$SUBMIT_REGISTER}" {$SUBMIT_ENABLED} />
			<input type="submit" name="{$FM_IP_ADDRESS_REGISTER_CANCEL}" id="{$FM_IP_ADDRESS_REGISTER_CANCEL}"
						 class="DivContentBodySubmitBigger"
					   value="{$SUBMIT_CANCEL}" />
	</div>
</form>