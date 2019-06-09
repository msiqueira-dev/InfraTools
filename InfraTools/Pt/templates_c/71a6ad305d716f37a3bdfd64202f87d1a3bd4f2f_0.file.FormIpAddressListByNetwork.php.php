<?php
/* Smarty version 3.1.33, created on 2019-06-09 08:55:40
  from 'C:\Web\Sites\Development\InfraTools\Html\Form\FormIpAddressListByNetwork.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfcf3bc835c75_13436252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71a6ad305d716f37a3bdfd64202f87d1a3bd4f2f' => 
    array (
      0 => 'C:\\Web\\Sites\\Development\\InfraTools\\Html\\Form\\FormIpAddressListByNetwork.php',
      1 => 1559775276,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfcf3bc835c75_13436252 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- FM_IP_ADDRESS_LST_FORM -->
<div id="<?php echo $_smarty_tpl->tpl_vars['DIV_RETURN']->value;?>
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

		<?php echo $_smarty_tpl->tpl_vars['RETURN_NETWORK_NAME_TEXT']->value;?>

		<?php echo $_smarty_tpl->tpl_vars['RETURN_TEXT']->value;?>

	</label>
</div>
<div class="DivTableGenericHeader">
	<div class="DivTableGenericHeaderRowCount">
		<label class='InputValueLimitTitle'>
			<?php echo $_smarty_tpl->tpl_vars['TB_PAGE_PREFIX']->value;?>

		</label>
		<label class='InputValueLimitValue'> 
			<?php echo $_smarty_tpl->tpl_vars['TB_PAGE_INPUT_VALUE_LIMIT_ONE']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['TB_PAGE']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['TB_PAGE_INPUT_VALUE_LIMIT_TWO']->value;?>

		</label>
	</div>
	<div class="DivTableGenericHeaderRowCount">
		<label class='DivTableGenericRowCountLabelTitle'>
			<?php echo $_smarty_tpl->tpl_vars['ROW_COUNT']->value;?>
 
		</label>
		<label class='DivTableGenericRowCountLabelValue'>
			<?php echo $_smarty_tpl->tpl_vars['INPUT_VALUE_ROW_COUNT']->value;?>

		</label>
	</div>
</div>
<table class='TableGeneric'>
	<tr>
		<form  name="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_LST_FORM']->value;?>
" method="<?php echo $_smarty_tpl->tpl_vars['FORM_METHOD']->value;?>
">
			<th class="TableGenericThArrow">
				<div class="TableGenericInputLeft">
					<input  type="image" class="TableGenericThArrowImage"
							name="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_LST_BACK']->value;?>
" 
							id="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_LST_BACK']->value;?>
" 
							value="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_LST_BACK']->value;?>
"
					        title="<?php echo $_smarty_tpl->tpl_vars['SUBMIT_BACK']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SUBMIT_BACK']->value;?>
"
					        src="<?php echo $_smarty_tpl->tpl_vars['SUBMIT_BACK_ICON']->value;?>
"
					        onmouseover="this.src='<?php echo $_smarty_tpl->tpl_vars['SUBMIT_BACK_ICON_HOVER']->value;?>
'"
					        onmouseout="this.src='<?php echo $_smarty_tpl->tpl_vars['SUBMIT_BACK_ICON']->value;?>
'" />
				</div>
				<div class="TableGenericThRight">
					<?php echo $_smarty_tpl->tpl_vars['FIELD_NETWORK_NAME_TEXT']->value;?>

				</div>
			</th>
			<th  class="TableGenericThDiv">
				<?php echo $_smarty_tpl->tpl_vars['FIELD_NETWORK_IP_TEXT']->value;?>

			</th>
			<th  class="TableGenericThDiv">
				<?php echo $_smarty_tpl->tpl_vars['FIELD_NETWORK_NETMASK_TEXT']->value;?>

			</th>
			<th  class="TableGenericThArrow">
				<div  class="TableGenericThLeft">
					<?php echo $_smarty_tpl->tpl_vars['FIELD_REGISTER_DATE_TEXT']->value;?>

				</div>
				<div class="TableGenericInputRight">
					<input  type="image" class="TableGenericThArrowImage"
							name="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_LST_FORWARD']->value;?>
" 
							id="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_LST_FORWARD']->value;?>
" 
							value="<?php echo $_smarty_tpl->tpl_vars['FM_IP_ADDRESS_LST_FORWARD']->value;?>
"
							title="<?php echo $_smarty_tpl->tpl_vars['SUBMIT_FORWARD']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['SUBMIT_FORWARD']->value;?>
"
							src="<?php echo $_smarty_tpl->tpl_vars['SUBMIT_FORWARD_ICON']->value;?>
"
							onmouseover="this.src='<?php echo $_smarty_tpl->tpl_vars['SUBMIT_FORWARD_ICON_HOVER']->value;?>
'"
							onmouseout="this.src='<?php echo $_smarty_tpl->tpl_vars['SUBMIT_FORWARD_ICON']->value;?>
'" />
				</div>
			</th>
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['TB_PAGE_INPUT_VALUE_LIMIT_ONE']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['FM_LST_INPUT_LIMIT_ONE']->value;?>
" />
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['TB_PAGE_INPUT_VALUE_LIMIT_TWO']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['FM_LST_INPUT_LIMIT_TWO']->value;?>
" />
		</form>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ARRAY_INSTANCE_INFRATOOLS_NETWORK']->value, 'INSTANCE_NETWORK', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['INSTANCE_NETWORK']->value) {
?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['INSTANCE_NETWORK']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
			<tr>
				<td class="TableGenericTdLink">
					<form  name="<?php echo $_smarty_tpl->tpl_vars['FM_NETWORK_SEL_SB']->value;?>
" method="<?php echo $_smarty_tpl->tpl_vars['FORM_METHOD']->value;?>
">
						<input type="hidden"
							name="<?php echo $_smarty_tpl->tpl_vars['FM_NETWORK_SEL_SB']->value;?>
" 
							id="<?php echo $_smarty_tpl->tpl_vars['FM_NETWORK_SEL_SB']->value;?>
"
							value="<?php echo $_smarty_tpl->tpl_vars['FM_NETWORK_SEL_SB']->value;?>
" />
						<input type="submit" 
							name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NETWORK_NAME']->value;?>
" 
							id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NETWORK_NAME']->value;?>
" 
							value="<?php echo $_smarty_tpl->tpl_vars['item']->value->GetNetworkName();?>
" 
							title="<?php echo $_smarty_tpl->tpl_vars['item']->value->GetNetworkName();?>
" />
					</form>
				</td>
				<td class="TableGenericTdLink">
					<form  name="<?php echo $_smarty_tpl->tpl_vars['FM_NETWORK_SEL_SB']->value;?>
" method="<?php echo $_smarty_tpl->tpl_vars['FORM_METHOD']->value;?>
">
						<input type="hidden"
							name="<?php echo $_smarty_tpl->tpl_vars['FM_NETWORK_SEL_SB']->value;?>
" 
							id="<?php echo $_smarty_tpl->tpl_vars['FM_NETWORK_SEL_SB']->value;?>
"
							value="<?php echo $_smarty_tpl->tpl_vars['FM_NETWORK_SEL_SB']->value;?>
" />
						<input type="hidden" 
							name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NETWORK_NAME']->value;?>
" 
							id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NETWORK_NAME']->value;?>
" 
							value="<?php echo $_smarty_tpl->tpl_vars['item']->value->GetNetworkName();?>
" 
							title="<?php echo $_smarty_tpl->tpl_vars['item']->value->GetNetworkName();?>
" />
						<input type="submit" 
							name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NETWORK_IP']->value;?>
" 
							id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NETWORK_IP']->value;?>
" 
							value="<?php echo $_smarty_tpl->tpl_vars['item']->value->GetNetworkIp();?>
" 
							title="<?php echo $_smarty_tpl->tpl_vars['item']->value->GetNetworkIp();?>
" />
					</form>
				</td>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['item']->value->GetNetworkNetmask();?>

				</td>
				<td class="TableGenericTdLink">
					<?php echo $_smarty_tpl->tpl_vars['item']->value->GetRegisterDate();?>

				</td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
