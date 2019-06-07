<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_IP_ADDRESS_IPV4_TEXT}
		{$RETURN_IP_ADDRESS_IPV6_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_IP_ADDRESS_SEL_FORM -->
<form name="{$FM_IP_ADDRESS_SEL_FORM}" id="{$FM_IP_ADDRESS_SEL_FORM}" method="{$FORM_METHOD}">
	<div class="DivContentBodyContainer" id="{$DIV_RADIO}">
		<!-- FIELD_RADIO_IP_ADDRESS_IPV4 -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="{$FIELD_RADIO_IP_ADDRESS}"
						id="{$FIELD_RADIO_IP_ADDRESS_IPV4}"
						value="{$FIELD_RADIO_IP_ADDRESS_IPV4}"
						onclick="this.blur();this.focus();"
						onchange="ShowOrHideElement('{$DIV_RADIO_IP_ADDRESS_IPV4}', true);
								  ShowOrHideElement('{$DIV_RADIO_IP_ADDRESS_IPV6}', false);	
								  MakeInputVisible('{$FM_IP_ADDRESS_SEL_SB}');
								  ValidateInputChangedRadio('{$DIV_RADIO}', 'DivContentBodySubmit', '{$FM_IP_ADDRESS_SEL_SB}', 'Ip Address')"
						title="{$FIELD_IP_ADDRESS_IPV4_TEXT}"  
						{$FIELD_RADIO_IP_ADDRESS_IPV4_VALUE}/>
				<div class="DivContentBodyContainerLabelHost">
					<i>{$FIELD_IP_ADDRESS_IPV4_TEXT}</i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_RADIO_IP_ADDRESS_IPV6 -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="{$FIELD_RADIO_IP_ADDRESS}"
						id="{$FIELD_RADIO_IP_ADDRESS_IPV6}"
						value="{$FIELD_RADIO_IP_ADDRESS_IPV6}"
						onclick="this.blur();this.focus();"
						onchange="ShowOrHideElement('{$DIV_RADIO_IP_ADDRESS_IPV4}', false);
								  ShowOrHideElement('{$DIV_RADIO_IP_ADDRESS_IPV6}', true);
								  MakeInputVisible('{$FM_IP_ADDRESS_SEL_SB}');
							  	  ValidateInputChangedRadio('{$DIV_RADIO}', 'DivContentBodySubmit', '{$FM_IP_ADDRESS_SEL_SB}', 'Ip Address')"
						title="{$FIELD_IP_ADDRESS_IPV6_TEXT}"  
						{$FIELD_RADIO_IP_ADDRESS_IPV6_VALUE}/>
				<div class="DivContentBodyContainerLabelHost">
					<i>{$FIELD_IP_ADDRESS_IPV6_TEXT}</i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_IP_ADDRESS_IPV4 -->
		<div class="{$HIDE_IP_ADDRESS_IPV4_CLASS} DivContentBodyContainer" id="{$DIV_RADIO_IP_ADDRESS_IPV4}">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label>{$FIELD_IP_ADDRESS_IPV4_TEXT}</label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="{$FIELD_IP_ADDRESS_IPV4}" 
							   id="{$FIELD_IP_ADDRESS_IPV4}"
							   class="DivContentBodyContainerInputText {$RETURN_IP_ADDRESS_IPV4_CLASS}"
							   onkeyup="ValidateIpAddressIpv4('DivContentBodyContainerInputText', '{$FIELD_IP_ADDRESS_IPV4}',
												              'DivContentBodySubmit', '{$FM_IP_ADDRESS_SEL_SB}', '', false);"
							   onblur="ValidateIpAddressIpv4('DivContentBodyContainerInputText', 
											       '{$FIELD_IP_ADDRESS_IPV4}',
												   'DivContentBodySubmit',
												   '{$FM_IP_ADDRESS_SEL_SB}','', true);"
							   onchange="ValidateIpAddressIpv4('DivContentBodyContainerInputText', 
											                    '{$FIELD_IP_ADDRESS_IPV4}',
												                'DivContentBodySubmit',
												                '{$FM_IP_ADDRESS_SEL_SB}','', true);"
							   title="{$FIELD_IP_ADDRESS_IPV4_TEXT}" 
							   value="{$FIELD_IP_ADDRESS_IPV4_VALUE}" maxlength="15" />
		</div>
		<!-- FIELD_IP_ADDRESS_IPV6 -->
		<div class="{$HIDE_IP_ADDRESS_IPV6_CLASS} DivContentBodyContainer" id="{$DIV_RADIO_IP_ADDRESS_IPV6}">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label>{$FIELD_IP_ADDRESS_IPV6_TEXT}</label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="{$FIELD_IP_ADDRESS_IPV6}" 
							   id="{$FIELD_IP_ADDRESS_IPV6}"
							   class="DivContentBodyContainerInputText {$RETURN_IP_ADDRESS_IPV6_CLASS}"
							   onkeyup="ValidateIpAddressIpv6('DivContentBodyContainerInputText', 
											       '{$FIELD_IP_ADDRESS_IPV6}',
												   'DivContentBodySubmit',
												   '{$FM_IP_ADDRESS_SEL_SB}', '', false);"
							   onblur="ValidateIpAddressIpv6('DivContentBodyContainerInputText', 
											       '{$FIELD_IP_ADDRESS_IPV6}',
												   'DivContentBodySubmit',
												   '{$FM_IP_ADDRESS_SEL_SB}','', true);"
							   onchange="ValidateIpAddressIpv6('DivContentBodyContainerInputText', 
											                    '{$FIELD_IP_ADDRESS_IPV6}',
												                'DivContentBodySubmit',
												                '{$FM_IP_ADDRESS_SEL_SB}','', true);"
							   title="{$FIELD_IP_ADDRESS_IPV6_TEXT}" 
							   value="{$FIELD_IP_ADDRESS_IPV6_VALUE}" maxlength="38" />
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit">
		<input type="submit" name="{$FM_IP_ADDRESS_SEL_SB}" 
			   id="{$FM_IP_ADDRESS_SEL_SB}" class="DivContentBodySubmit {$SUBMIT_CLASS}"
			   value="{$SUBMIT_SEL}" {$SUBMIT_ENABLED} />
	</div>
</form>