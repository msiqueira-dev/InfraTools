<!-- FM_IP_ADDRESS_LST_FORM -->
<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_IP_ADDRESS_IPV4_TEXT}
		{$RETURN_NETWORK_NAME_TEXT}
		{$RETURN_TEXT}
	</label>
</div>
<div class="DivTableGenericHeader">
	<div class="DivTableGenericHeaderRowCount">
		<label class='InputValueLimitTitle'>
			{$TB_PAGE_PREFIX}
		</label>
		<label class='InputValueLimitValue'> 
			{$TB_PAGE_INPUT_VALUE_LIMIT_ONE} {$TB_PAGE} {$TB_PAGE_INPUT_VALUE_LIMIT_TWO}
		</label>
	</div>
	<div class="DivTableGenericHeaderRowCount">
		<label class='DivTableGenericRowCountLabelTitle'>
			{$ROW_COUNT} 
		</label>
		<label class='DivTableGenericRowCountLabelValue'>
			{$INPUT_VALUE_ROW_COUNT}
		</label>
	</div>
</div>
<table class='TableGeneric'>
	<tr>
		<form  name="{$FM_IP_ADDRESS_LST_FORM}" method="{$FORM_METHOD}">
			<th class="TableGenericThArrow">
				<div class="TableGenericInputLeft">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_IP_ADDRESS_LST_BACK}" 
							id="{$FM_IP_ADDRESS_LST_BACK}" 
							value="{$FM_IP_ADDRESS_LST_BACK}"
					        title="{$SUBMIT_BACK}" alt="{$SUBMIT_BACK}"
					        src="{$SUBMIT_BACK_ICON}"
					        onmouseover="this.src='{$SUBMIT_BACK_ICON_HOVER}'"
					        onmouseout="this.src='{$SUBMIT_BACK_ICON}'" />
				</div>
				<div class="TableGenericThRight">
					{$FIELD_IP_ADDRESS_IPV4_TEXT}
				</div>
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_IP_ADDRESS_IPV6_TEXT}
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_IP_ADDRESS_DESCRIPTION_TEXT}
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_NETWORK_NAME_TEXT}
			</th>
			<th  class="TableGenericThDiv">
				{$FIELD_NETWORK_IP_TEXT}
			</th>
			<th  class="TableGenericThArrow">
				<div  class="TableGenericThLeft">
					{$FIELD_REGISTER_DATE_TEXT}
				</div>
				<div class="TableGenericInputRight">
					<input  type="image" class="TableGenericThArrowImage"
							name="{$FM_IP_ADDRESS_LST_FORWARD}" 
							id="{$FM_IP_ADDRESS_LST_FORWARD}" 
							value="{$FM_IP_ADDRESS_LST_FORWARD}"
							title="{$SUBMIT_FORWARD}" alt="{$SUBMIT_FORWARD}"
							src="{$SUBMIT_FORWARD_ICON}"
							onmouseover="this.src='{$SUBMIT_FORWARD_ICON_HOVER}'"
							onmouseout="this.src='{$SUBMIT_FORWARD_ICON}'" />
				</div>
			</th>
			<input type="hidden" value="{$TB_PAGE_INPUT_VALUE_LIMIT_ONE}" name="{$FM_LST_INPUT_LIMIT_ONE}" />
			<input type="hidden" value="{$TB_PAGE_INPUT_VALUE_LIMIT_TWO}" name="{$FM_LST_INPUT_LIMIT_TWO}" />
		</form>
	</tr>
	{foreach name=outer from=$ARRAY_INSTANCE_INFRATOOLS_NETWORK_IP item=INSTANCE_NETWORK_IP}
		{foreach key=key item=item from=$INSTANCE_NETWORK_IP}
			<tr>
				<td class="TableGenericTdLink">
					{if $item|is_a:'InfraToolsIpAddress'}
						<form  name="{$FM_IP_ADDRESS_SEL_SB}" method="{$FORM_METHOD}">
							<input type="hidden"
								name="{$FM_IP_ADDRESS_SEL_SB}" 
								id="{$FM_IP_ADDRESS_SEL_SB}"
								value="{$FM_IP_ADDRESS_SEL_SB}" />
							<input type="submit" 
								name="{$FIELD_IP_ADDRESS_IPV4}" 
								id="{$FIELD_IP_ADDRESS_IPV4}" 
								value="{$item->GetIpAddressIpv4()}"
								title="{$item->GetIpAddressIpv4()}" />
						</form>
					{/if}
				</td>
				<td class="TableGenericTdLink">
					{if $item|is_a:'InfraToolsIpAddress'}
						<form  name="{$FM_IP_ADDRESS_SEL_SB}" method="{$FORM_METHOD}">
							<input type="hidden"
								name="{$FM_IP_ADDRESS_SEL_SB}" 
								id="{$FM_IP_ADDRESS_SEL_SB}"
								value="{$FM_IP_ADDRESS_SEL_SB}" />
							<input type="submit" 
								name="{$FIELD_IP_ADDRESS_IPV6}" 
								id="{$FIELD_IP_ADDRESS_IPV6}" 
								value="{$item->GetIpAddressIpv6()}" 
								title="{$item->GetIpAddressIpv6()}" />
						</form>
					{/if}
				</td>
				<td class="TableGenericTdLink"> 
					{if $item|is_a:'InfraToolsIpAddress'}
						{$item->GetIpAddressDescription()}
					{/if}
				</td>
				<td class="TableGenericTdLink">
					{if $item|is_a:'InfraToolsIpAddress'}
						<form  name="{$FM_NETWORK_SEL_SB}" method="{$FORM_METHOD}">
							<input type="hidden"
								name="{$FM_NETWORK_SEL_SB}" 
								id="{$FM_NETWORK_SEL_SB}"
								value="{$FM_NETWORK_SEL_SB}" />
							<input type="submit" 
								name="{$FIELD_NETWORK_NAME}" 
								id="{$FIELD_NETWORK_NAME}" 
								value="{$item->GetIpAddressInstanceInfraToolsNetworkNetworkName()}" 
								title="{$item->GetIpAddressInstanceInfraToolsNetworkNetworkName()}" />
						</form>
					{/if}
					{if $item|is_a:'InfraToolsNetwork'}
						<form  name="{$FM_NETWORK_SEL_SB}" method="{$FORM_METHOD}">
							<input type="hidden"
								name="{$FM_NETWORK_SEL_SB}" 
								id="{$FM_NETWORK_SEL_SB}"
								value="{$FM_NETWORK_SEL_SB}" />
							<input type="submit" 
								name="{$FIELD_NETWORK_NAME}" 
								id="{$FIELD_NETWORK_NAME}" 
								value="{$item->GetNetworkName()}" 
								title="{$item->GetNetworkName()}" />
						</form>
					{/if}
				</td>
				<td>
					{if $item|is_a:'InfraToolsIpAddress'}
						{$item->GetIpAddressInstanceInfraToolsNetworkNetworkIp()}
					{/if}
					{if $item|is_a:'InfraToolsNetwork'}
						{$item->GetNetworkIp()}
					{/if}
				</td>
				<td class="TableGenericTdLink">
					{$item->GetRegisterDate()}
				</td>
			</tr>
		{/foreach}
	{/foreach}
</table>