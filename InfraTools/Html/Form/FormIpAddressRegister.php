<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))            echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnIpAddressDescription)) echo $this->ReturnIpAddressDescription; ?>
		<?php if(isset($this->ReturnIpAddressIpv4))        echo $this->ReturnIpAddressIpv4; ?>
		<?php if(isset($this->ReturnIpAddressIpv6))        echo $this->ReturnIpAddressIpv6; ?>
		<?php if(isset($this->ReturnNetworkIp))            echo $this->ReturnNetworkIp; ?>
		<?php if(isset($this->ReturnNetworkName))          echo $this->ReturnNetworkName; ?>
		<?php if(isset($this->ReturnNetworkNetmask))       echo $this->ReturnNetworkNetmask; ?>
		<?php if(isset($this->ReturnText))                 echo $this->ReturnText; ?>
	</label>
</div>
<?php if(is_array($this->ArrayInstanceInfraToolsNetwork))
{?>
	<!-- FM_IP_ADDRESS_REGISTER_FORM_NETWORK -->
	<form name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM_NETWORK; ?>" 
		  id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM_NETWORK; ?>" method="post">

		<input type="hidden" name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM_NETWORK; ?>" 
						 id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM_NETWORK; ?>"
						 value="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM_NETWORK; ?>"/>
		<!-- FIELD_NETWORK_NAME -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_NAME').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<select 
					name="<?php echo ConfigInfraTools::FIELD_NETWORK_NAME; ?>" 
					id="<?php echo ConfigInfraTools::FIELD_NETWORK_NAME; ?>"
					class="<?php echo $this->ReturnNetworkNameClass; ?>"
					onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_NETWORK_NAME; ?>');
							  document.getElementById('<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>')
											 .disabled = false;
							  document.getElementById('<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>')
											 .className = 'DivContentBodySubmitBigger SubmitEnabled;'
							  this.form.submit()">
					<option <?php if ($this->InputValueNetworkName == "" 
									  || $this->InputValueNetworkName == ConfigInfraTools::FIELD_SEL_NONE) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
							<?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
					</option>
					<?php 
					foreach($this->ArrayInstanceInfraToolsNetwork as $key=>$network)
					{
						echo "<option ";
						  if($this->InputValueNetworkName == $network->GetNetworkName())
							echo "selected='selected' ";
						echo "value='" . $network->GetNetworkName() . "'>" . $network->GetNetworkName() . " - " . $network->GetNetworkIp() 
									   . "/" . $network->GetNetworkNetmask() . "</option>";
					}
					?>
				</select>
			</div>
		</div>
	</form>
<?php } ?>
<!-- FM_IP_ADDRESS_REGISTER_FORM -->
<form name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>" 
      id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>" method="post">
	<?php if(is_object($this->InstanceInfraToolsNetwork)) 
	{?>
		<!-- FIELD_NETWORK_IP -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_IP').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNetworkIp; ?></label>
			</div>
		</div>
		<!-- FIELD_NETWORK_NAME -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_NAME').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNetworkName; ?></label>
			</div>
		</div>
		<!-- FIELD_NETWORK_NETMASK -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_NETMASK').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueNetworkNetmask; ?></label>
			</div>
		</div>
    <?php }
	else {?>
    <!-- FIELD_NETWORK_IP -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_IP').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="text" name="<?php echo ConfigInfraTools::FIELD_NETWORK_IP; ?>" 
								   id="<?php echo ConfigInfraTools::FIELD_NETWORK_IP; ?>" 
								   class="<?php echo $this->ReturnNetworkIpClass; ?>"
								   onblur="ValidateIpAddressIpv4(null, 
                                                   '<?php echo ConfigInfraTools::FIELD_NETWORK_IP; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
										   ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
													 'DivContentBodySubmitBigger ',
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													 '');"
								   onkeyup="ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
													 'DivContentBodySubmitBigger ',
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													 '');"
								   onchange="ValidateIpAddressIpv4(null, 
                                                   '<?php echo ConfigInfraTools::FIELD_NETWORK_IP; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
											 ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
													 'DivContentBodySubmitBigger ',
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													 '');"
								   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_IP'); ?>"
								   value="<?php echo $this->InputValueNetworkIp; ?>" maxlength="15" />
			</div>
		</div>
		<!-- FIELD_NETWORK_NAME -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_NAME').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="text" name="<?php echo ConfigInfraTools::FIELD_NETWORK_NAME; ?>" 
								   id="<?php echo ConfigInfraTools::FIELD_NETWORK_NAME; ?>" 
								   class="<?php echo $this->ReturnNetworkNameClass; ?>"
								   onblur="ValidateDescription(null, 
													   '<?php echo ConfigInfraTools::FIELD_NETWORK_NAME; ?>',
													   'DivContentBodySubmitBigger ',
													   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													   '', true);
										   ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
													 'DivContentBodySubmitBigger ',
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													 '');"
								   onkeyup="ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
													 'DivContentBodySubmitBigger ',
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													 '');"
								   onchange="ValidateDescription(null, 
													  '<?php echo ConfigInfraTools::FIELD_NETWORK_NAME; ?>',
													   'DivContentBodySubmitBigger ',
													   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													   '', true);
										   ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
													 'DivContentBodySubmitBigger ',
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													 '');"
								   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_NAME'); ?>"
								   value="<?php echo $this->InputValueNetworkName; ?>" maxlength="60" />
			</div>
		</div>
   		<!-- FIELD_NETWORK_NETMASK -->
		<div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_NETMASK').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="text" name="<?php echo ConfigInfraTools::FIELD_NETWORK_NETMASK; ?>" 
								   id="<?php echo ConfigInfraTools::FIELD_NETWORK_NETMASK; ?>" 
								   class="<?php echo $this->ReturnNetworkNetmaskClass; ?>"
								   onblur="ValidateNetmask(null, 
													   '<?php echo ConfigInfraTools::FIELD_NETWORK_NETMASK; ?>',
													   'DivContentBodySubmitBigger ',
													   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													   '', true);
										   ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
													 'DivContentBodySubmitBigger ',
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													 '');"
								   onkeyup="ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
													 'DivContentBodySubmitBigger ',
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													 '');"
								   onchange="ValidateNetmask(null, 
													   '<?php echo ConfigInfraTools::FIELD_NETWORK_NETMASK; ?>',
													   'DivContentBodySubmitBigger ',
													   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													   '', true);
											 ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
													 'DivContentBodySubmitBigger ',
													 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
													 '');"
								   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_NETWORK_NETMASK'); ?>"
								   value="<?php echo $this->InputValueNetworkNetmask; ?>" maxlength="2" />
			</div>
		</div>
    <?php } ?>
    <!-- FIELD_IP_ADDRESS_DESCRIPTION -->
    <div class="DivContentBodyContainerTextArea">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <textarea name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION; ?>" 
                               id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION; ?>" 
                               class="FormFieldNotObligatory DivContentBodyContainerValueTextArea <?php echo $this->ReturnIpAddressClass; ?>"
                               onblur="ValidateDescription('DivContentBodyContainerValueTextArea', 
                                                   '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                 '');"
                               onkeyup="ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                 '');"
                               onchange="ValidateDescription('DivContentBodyContainerValueTextArea', 
                                                   '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
                                       ValidateMultiplyFields(
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
                                                 'DivContentBodySubmitBigger ',
                                                 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                 '');"
                               title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_DESCRIPTION'); ?>"
                               maxlength="500"><?php echo $this->InputValueIpAddressDescription; ?></textarea>
        </div>
    </div>
    <!-- FIELD_IP_ADDRESS_IPV4 -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV4').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>" 
							   class="FormFieldNotObligatory <?php echo $this->ReturnIpAddressIpv4Class; ?>"
							   onblur="ValidateIpAddressIpv4(null, 
                                                   '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   onkeyup="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   onchange="ValidateIpAddressIpv4(null, 
                                                   '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV4; ?>',
                                                   'DivContentBodySubmitBigger ',
                                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                                   '', true);
										 ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV4'); ?>"
							   value="<?php echo $this->InputValueIpAddressIpv4; ?>" maxlength="15" />
		</div>
	</div>
  	<!-- FIELD_IP_ADDRESS_IPV6 -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV6').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValue">
			<input type="text" name="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV6; ?>" 
							   id="<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_IPV6; ?>" 
							   class="FormFieldNotObligatory <?php echo $this->ReturnIpAddressIpv6Class; ?>"
							   onblur="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   onkeyup="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   onchange="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
												 'DivContentBodySubmitBigger ',
												 '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('FIELD_IP_ADDRESS_IPV6'); ?>"
							   value="<?php echo $this->InputValueIpAddressIpv6; ?>" maxlength="15" />
		</div>
	</div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer"
         onmouseover="ValidateDescription('DivContentBodyContainerValueTextArea', 
							       '<?php echo ConfigInfraTools::FIELD_IP_ADDRESS_DESCRIPTION; ?>',
								   'DivContentBodySubmitBigger',
								   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
								   '', true);
                      ValidateMultiplyFields(
                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_FORM; ?>',
                                   'DivContentBodySubmitBigger',
                                   '<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>',
                                   '');">
        <input type="submit" name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_SB; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_CANCEL; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_IP_ADDRESS_REGISTER_CANCEL; ?>"
                                 class="DivContentBodySubmitBigger"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>