<?php
/* Smarty version 3.1.33, created on 2019-06-09 08:55:38
  from 'C:\Web\Sites\Development\InfraTools\Html\Form\FormIpAddressSelect.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfcf3badbba41_55288849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e5a235f6090bce9b18f465ca5c6cbfc194fbb2c' => 
    array (
      0 => 'C:\\Web\\Sites\\Development\\InfraTools\\Html\\Form\\FormIpAddressSelect.php',
      1 => 1559874235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfcf3badbba41_55288849 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="<?php echo $_smarty_tpl->tpl_vars['DIV_RETURN']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['RETURN_CLASS']->value;?>
">
	<div>
		<div>
			<?php echo $_smarty_tpl->tpl_vars['RETURN_IMAGE']->value;?>

		</div>
	</div>
	<label>
		<?php echo $_smarty_tpl->tpl_vars['RETURN_EMPTY_TEXT']->value;?>

		<?php echo $_smarty_tpl->tpl_vars['RETURN_IP_ADDRESS_IPV4_TEXT']->value;?>

		<?php echo $_smarty_tpl->tpl_vars['RETURN_IP_ADDRESS_IPV6_TEXT']->value;?>

		<?php echo $_smarty_tpl->tpl_vars['RETURN_TEXT']->value;?>

	</label>
</div>
<!-- FM_IP_ADDRESS_SEL_FORM -->
<form name="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_FORM']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_FORM']->value;?>
" method="<?php echo $_smarty_tpl->tpl_vars['FORM_METHOD']->value;?>
">
	<div class="DivContentBodyContainer" id="<?php echo $_smarty_tpl->tpl_vars['DIV_RADIO']->value;?>
">
		<!-- FIELD_RADIO_IP_ADDRESS_IPV4 -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_RADIO_IP_ADDRESS']->value;?>
"
						id="<?php echo $_smarty_tpl->tpl_vars['FIELD_RADIO_IP_ADDRESS_IPV4']->value;?>
"
						value="<?php echo $_smarty_tpl->tpl_vars['FIELD_RADIO_IP_ADDRESS_IPV4']->value;?>
"
						onclick="this.blur();this.focus();"
						onchange="ShowOrHideElement('<?php echo $_smarty_tpl->tpl_vars['DIV_RADIO_IP_ADDRESS_IPV4']->value;?>
', true);
								  ShowOrHideElement('<?php echo $_smarty_tpl->tpl_vars['DIV_RADIO_IP_ADDRESS_IPV6']->value;?>
', false);	
								  MakeInputVisible('<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
');
								  ValidateInputChangedRadio('<?php echo $_smarty_tpl->tpl_vars['DIV_RADIO']->value;?>
', 'DivContentBodySubmit', '<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
', 'Ip Address')"
						title="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4_TEXT']->value;?>
"  
						<?php echo $_smarty_tpl->tpl_vars['FIELD_RADIO_IP_ADDRESS_IPV4_VALUE']->value;?>
/>
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4_TEXT']->value;?>
</i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_RADIO_IP_ADDRESS_IPV6 -->
		<div class="DivContentBodyContainerRadio">
			<label>
				<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_RADIO_IP_ADDRESS']->value;?>
"
						id="<?php echo $_smarty_tpl->tpl_vars['FIELD_RADIO_IP_ADDRESS_IPV6']->value;?>
"
						value="<?php echo $_smarty_tpl->tpl_vars['FIELD_RADIO_IP_ADDRESS_IPV6']->value;?>
"
						onclick="this.blur();this.focus();"
						onchange="ShowOrHideElement('<?php echo $_smarty_tpl->tpl_vars['DIV_RADIO_IP_ADDRESS_IPV4']->value;?>
', false);
								  ShowOrHideElement('<?php echo $_smarty_tpl->tpl_vars['DIV_RADIO_IP_ADDRESS_IPV6']->value;?>
', true);
								  MakeInputVisible('<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
');
							  	  ValidateInputChangedRadio('<?php echo $_smarty_tpl->tpl_vars['DIV_RADIO']->value;?>
', 'DivContentBodySubmit', '<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
', 'Ip Address')"
						title="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6_TEXT']->value;?>
"  
						<?php echo $_smarty_tpl->tpl_vars['FIELD_RADIO_IP_ADDRESS_IPV6_VALUE']->value;?>
/>
				<div class="DivContentBodyContainerLabelHost">
					<i><?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6_TEXT']->value;?>
</i>
				</div>
			</label>
		</div>
		<div class="DivClearFloat"></div>
		<div class="DivClearFloat"></div>
		<!-- FIELD_IP_ADDRESS_IPV4 -->
		<div class="<?php echo $_smarty_tpl->tpl_vars['HIDE_IP_ADDRESS_IPV4_CLASS']->value;?>
 DivContentBodyContainer" id="<?php echo $_smarty_tpl->tpl_vars['DIV_RADIO_IP_ADDRESS_IPV4']->value;?>
">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label><?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4_TEXT']->value;?>
</label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4']->value;?>
" 
							   id="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4']->value;?>
"
							   class="DivContentBodyContainerInputText <?php echo $_smarty_tpl->tpl_vars['RETURN_IP_ADDRESS_IPV4_CLASS']->value;?>
"
							   onkeyup="ValidateIpAddressIpv4('DivContentBodyContainerInputText', '<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4']->value;?>
',
												              'DivContentBodySubmit', '<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
', '', false);"
							   onblur="ValidateIpAddressIpv4('DivContentBodyContainerInputText', 
											       '<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4']->value;?>
',
												   'DivContentBodySubmit',
												   '<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
','', true);"
							   onchange="ValidateIpAddressIpv4('DivContentBodyContainerInputText', 
											                    '<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4']->value;?>
',
												                'DivContentBodySubmit',
												                '<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
','', true);"
							   title="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4_TEXT']->value;?>
" 
							   value="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV4_VALUE']->value;?>
" maxlength="15" />
		</div>
		<!-- FIELD_IP_ADDRESS_IPV6 -->
		<div class="<?php echo $_smarty_tpl->tpl_vars['HIDE_IP_ADDRESS_IPV6_CLASS']->value;?>
 DivContentBodyContainer" id="<?php echo $_smarty_tpl->tpl_vars['DIV_RADIO_IP_ADDRESS_IPV6']->value;?>
">
			<div class="DivContentBodyContainerLabelExtraWidth">
				<label><?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6_TEXT']->value;?>
</label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6']->value;?>
" 
							   id="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6']->value;?>
"
							   class="DivContentBodyContainerInputText <?php echo $_smarty_tpl->tpl_vars['RETURN_IP_ADDRESS_IPV6_CLASS']->value;?>
"
							   onkeyup="ValidateIpAddressIpv6('DivContentBodyContainerInputText', 
											       '<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6']->value;?>
',
												   'DivContentBodySubmit',
												   '<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
', '', false);"
							   onblur="ValidateIpAddressIpv6('DivContentBodyContainerInputText', 
											       '<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6']->value;?>
',
												   'DivContentBodySubmit',
												   '<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
','', true);"
							   onchange="ValidateIpAddressIpv6('DivContentBodyContainerInputText', 
											                    '<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6']->value;?>
',
												                'DivContentBodySubmit',
												                '<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
','', true);"
							   title="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6_TEXT']->value;?>
" 
							   value="<?php echo $_smarty_tpl->tpl_vars['FIELD_IP_ADDRESS_IPV6_VALUE']->value;?>
" maxlength="38" />
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="DivContentBodyContainerSubmit">
		<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
" 
			   id="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_SEL_SB']->value;?>
" class="DivContentBodySubmit <?php echo $_smarty_tpl->tpl_vars['SUBMIT_CLASS']->value;?>
"
			   value="<?php echo $_smarty_tpl->tpl_vars['SUBMIT_SEL']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['SUBMIT_ENABLED']->value;?>
 />
	</div>
</form><?php }
}
