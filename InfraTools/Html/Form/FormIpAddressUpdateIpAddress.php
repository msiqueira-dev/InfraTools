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
		{$RETURN_TEXT}
	</label>
</div>
<!-- FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM -->
<form name="{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}" id="{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}" method="{$FORM_METHOD}">
	<!-- FIELD_IP_ADDRESS_IPV4 -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label>{$FIELD_IP_ADDRESS_IPV4_TEXT}</label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="text" name="{$FIELD_IP_ADDRESS_IPV4}" id="{$FIELD_IP_ADDRESS_IPV4}" 
				   class="FormFieldNotObligatory {$RETURN_IP_ADDRESS_IPV4_CLASS}"
				   onblur="ValidateIpAddressIpv4(null, '{$FIELD_IP_ADDRESS_IPV4}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '', true);
						ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');"
				   onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');"
				   onchange="ValidateIpAddressIpv4(null, '{$FIELD_IP_ADDRESS_IPV4}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '', true);
							ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');"
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
				   onblur="ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');"
				   onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');"
				   onchange="ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');"
				   title="{$FIELD_IP_ADDRESS_IPV6_TEXT}"
			  	   value="{$FIELD_IP_ADDRESS_IPV6_VALUE}" maxlength="15" />
		</div>
	</div>
	<!-- FIELD_IP_ADDRESS_DESCRIPTION -->
	<div class="DivContentBodyContainerTextArea">
		<div class="DivContentBodyContainerLabel">
				<label>{$FIELD_IP_ADDRESS_DESCRIPTION_TEXT} : </label>
		</div>
		<div class="DivContentBodyContainerValue">
			<textarea name="{$FIELD_IP_ADDRESS_DESCRIPTION}" id="{$FIELD_IP_ADDRESS_DESCRIPTION}" 
					  class="FormFieldNotObligatory DivContentBodyContainerValueTextArea <?php echo $this->ReturnIpAddressClass; ?>"
					  onblur="ValidateDescription('DivContentBodyContainerValueTextArea', '{$FIELD_IP_ADDRESS_DESCRIPTION}', 'DivContentBodySubmitBigger ',
																			'{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '', true);
							ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');"
					  onkeyup="ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}','DivContentBodySubmitBigger ','{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');"
					  onchange="ValidateDescription('DivContentBodyContainerValueTextArea', '{$FIELD_IP_ADDRESS_DESCRIPTION}', 'DivContentBodySubmitBigger ',
																	'{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '', true);
								ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}', 'DivContentBodySubmitBigger ', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');"
					  title="{$FIELD_IP_ADDRESS_DESCRIPTION_TEXT}"
					  maxlength="500">{$FIELD_IP_ADDRESS_DESCRIPTION_VALUE}</textarea>
		</div>
	</div>
    <!-- SUBMIT -->
	<div class="DivContentBodyContainer"
				onmouseover="ValidateDescription('DivContentBodyContainerValueTextArea', '{$FIELD_IP_ADDRESS_DESCRIPTION}',
									             'DivContentBodySubmitBigger', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '', true);
							 ValidateMultiplyFields('{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_FORM}', 'DivContentBodySubmitBigger', '{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}', '');">
			<input type="submit" name="{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}" id="{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_SB}"
						 class="DivContentBodySubmitBigger {$SUBMIT_CLASS}"
						 value="{$SUBMIT_UPDT}" {$SUBMIT_ENABLED} />
			<input type="submit" name="{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_CANCEL}" id="{$FM_IP_ADDRESS_UPDT_IP_ADDRESS_CANCEL}"
						 class="DivContentBodySubmitBigger"
					   value="{$SUBMIT_CANCEL}" />
	</div>
</form>