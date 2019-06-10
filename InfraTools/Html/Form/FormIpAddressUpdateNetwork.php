<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_NETWORK_IP_TEXT}
		{$RETURN_NETWORK_NAME_TEXT}
		{$RETURN_NETWORK_NETMASK_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_IP_ADDRESS_UPDT_NETWORK_FORM -->
<form name="{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}" id="{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}" method="{$FORM_METHOD}">
    <!-- FIELD_NETWORK_IP -->
    <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_NETWORK_IP_TEXT} : </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<div class="DivContentBodyContainerValue">
			<input type="text" name="{$FIELD_NETWORK_IP}" id="{$FIELD_NETWORK_IP}" 
						 class="FormFieldNotObligatory {$RETURN_NETWORK_IP_CLASS}"
						 onblur="ValidateIpAddressIpv4(null, '{$FIELD_NETWORK_IP}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '', true);
										 ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');"
						 onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');"
						 onchange="ValidateIpAddressIpv4(null, '{$FIELD_NETWORK_IP}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '', true);
											 ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger ','{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');"
						 title="{$FIELD_NETWORK_IP_TEXT}" value="{$FIELD_NETWORK_IP_VALUE}" maxlength="15" />
			</div>
		</div>
		<!-- FIELD_NETWORK_NAME -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_NETWORK_NAME_TEXT} : </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="text" name="{$FIELD_NETWORK_NAME}" id="{$FIELD_NETWORK_NAME}" 
										class="FormFieldNotObligatory {$RETURN_NETWORK_NAME_TEXT}"
										onblur="ValidateDescription(null, '{$FIELD_NETWORK_NAME}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '', true);
												ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');"
										onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger ','{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');"
										onchange="ValidateDescription(null, '{$FIELD_NETWORK_NAME}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '', true);
												ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');"
										title="{$FIELD_NETWORK_NAME_TEXT}"
										value="{$FIELD_NETWORK_NAME_VALUE}" maxlength="60" />
			</div>
		</div>
		<!-- FIELD_NETWORK_NETMASK -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_NETWORK_NETMASK_TEXT} : </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="text" name="{$FIELD_NETWORK_NETMASK}" id="{$FIELD_NETWORK_NETMASK}" 
										class="FormFieldNotObligatory {$RETURN_NETWORK_NETMASK_CLASS}"
										onblur="ValidateNetmask(null, '{$FIELD_NETWORK_NETMASK}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '', true);
														ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');"
										onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');"
										onchange="ValidateNetmask(null, '{$FIELD_NETWORK_NETMASK}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '', true);
															ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');"
										title="{$FIELD_NETWORK_NETMASK_TEXT}"
										value="{$FIELD_NETWORK_NETMASK_VALUE}" maxlength="2" />
			</div>
		</div>
    <!-- SUBMIT -->
	<div class="DivContentBodyContainer"
				onmouseover="ValidateDescription('', '{$FIELD_NETWORK_NAME}',
									             'DivContentBodySubmitBigger', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '', true);
							 ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_NETWORK_FORM}', 'DivContentBodySubmitBigger', '{$FM_IP_ADDRESS_UPDT_NETWORK_SB}', '');">
			<input type="submit" name="{$FM_IP_ADDRESS_UPDT_NETWORK_SB}" id="{$FM_IP_ADDRESS_UPDT_NETWORK_SB}"
						 class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
						 value="{$SUBMIT_UPDT}" {$SUBMIT_ENABLED} />
			<input type="submit" name="{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_CANCEL}" id="{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_CANCEL}"
						 class="DivContentBodySubmitBigger"
					   value="{$SUBMIT_CANCEL}" />
	</div>
</form>