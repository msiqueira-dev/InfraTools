<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass))  echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage))  echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))                 echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnRegistrationDateDayText))   echo $this->ReturnRegistrationDateDayText; ?>
		<?php if(isset($this->ReturnRegistrationDateMonthText)) echo $this->ReturnRegistrationDateMonthText; ?>
		<?php if(isset($this->ReturnRegistrationDateYearText))  echo $this->ReturnRegistrationDateYearText; ?>
		<?php if(isset($this->ReturnRegistrationIdText))        echo $this->ReturnRegistrationIdText; ?>
		<?php if(isset($this->ReturnDepartmentNameText))        echo $this->ReturnDepartmentNameText; ?>
		<?php if(isset($this->ReturnText))                      echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_USER_CHANGE_ASSOC_USER_CORPORATION -->
<form name="<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION; ?>" 
      id="<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION; ?>" method="post" >
	<!-- FIELD_USER_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserName; ?></label>
        </div>
    </div>
    <!-- FIELD_USER_EMAIL -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserEmail; ?></label>
        </div>
    </div>
    <!-- BIRTH_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueBirthDateDay . " /"; ?></label>
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueBirthDateMonth . " /"; ?></label>
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueBirthDateYear; ?></label>
        </div>
    </div>
    <!-- FIELD_USER_GENDER -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_GENDER').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueGender; ?></label>
        </div>
    </div>
    <!-- FIELD_COUNTRY_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_COUNTRY_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueCountry; ?></label>
        </div>
    </div>
    <!-- FIELD_USER_REGION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_REGION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegion; ?></label>
        </div>
    </div>
    <!-- FIELD_USER_PHONE_PRIMARY -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_PHONE_PRIMARY').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
           	<label class="DivContentBodyContainerValueContent">
           	     <?php echo "(". $this->InputValueUserPhonePrimaryPrefix .")&nbsp" ?>
           	</label>
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserPhonePrimary; ?></label>
        </div>
    </div>
    <!-- FIELD_USER_PHONE_SECONDARY -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_PHONE_SECONDARY').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
           	<label class="DivContentBodyContainerValueContent">
           	     <?php echo "(". $this->InputValueUserPhoneSecondaryPrefix .")&nbsp" ?>
           	</label>
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserPhoneSecondary; ?></label>
        </div>
    </div>
    <!-- FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserCorporationName; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueCorporationActive; ?>" 
                       name="<?php echo ConfigInfraTools::ACCOUNT_FM_SB_VERIFIED_CORPORATION; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
        </div>
    </div>
    <!-- FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE'); ?> </label>
			<label>:</label>
		</div>
		<!-- REGISTRATION_DATE_BIRTH_DATE_DAY -->
		<select style="
					   <?php if($this->InputValueRegistrationDateDay != ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY
								 && $this->InputValueRegistrationDateDay != "") 
							echo 'color:black;'
						?> " 
				name="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>" 
				id="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>"
				class="SelectBirthDateDay <?php echo $this->ReturnRegistrationDateDayClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>');">
			<option <?php if ($this->InputValueRegistrationDateDay == "" 
							  || $this->InputValueRegistrationDateDay == ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>" 
				disabled="disabled"> 
					<?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE_DAY'); ?> 
			</option>
			<?php for($i=1; $i<32; $i++)
				  {
					  echo "<option ";
					  if($this->InputValueRegistrationDateDay == $i)
						echo "selected='selected' ";
					   echo "value='$i'> $i </option>";
				  }
			?>
		</select>
		<!-- REGISTRATION_DATE_DATE_MONTH -->
		<select style="
						<?php if($this->InputValueRegistrationDateMonth != ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY
								 && $this->InputValueRegistrationDateMonth != "") 
							echo 'color:black;'
						?> "
				name="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH; ?>" 
				id="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH; ?>"
				class="SelectBirthDateMonth <?php echo $this->ReturnRegistrationDateMonthClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH; ?>');">
			<option <?php if ($this->InputValueRegistrationDateMonth == "" 
							  || $this->InputValueRegistrationDateMonth == ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>" 
				disabled="disabled"> 
					<?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE_MONTH'); ?> 
			</option>
			<?php for($i=1; $i<13; $i++)
				  {
					  echo "<option ";
					  if($this->InputValueRegistrationDateMonth == $i)
						echo "selected='selected' ";
					   echo "value='$i'> $i </option>";
				  }
			?>
		</select>
		<!-- REGISTRATION_DATE_DATE_YEAR -->
		<select style=";
					   <?php if($this->InputValueRegistrationDateYear != ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY
								 && $this->InputValueRegistrationDateYear != "") 
							echo 'color:black;'
						?> "
				name="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR; ?>" 
				id="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR; ?>"
				class="SelectBirthDateYear <?php echo $this->ReturnRegistrationDateYearClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR; ?>');">
			<option <?php if ($this->InputValueRegistrationDateYear == "" 
							  || $this->InputValueRegistrationDateYear == ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>" 
				disabled="disabled"> 
					<?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE_YEAR'); ?> 
			</option>
			<?php for($i=1940; $i<2016; $i++)
				  {
					  echo "<option ";
					  if($this->InputValueRegistrationDateYear == $i)
						echo "selected='selected' ";
					   echo "value='$i'> $i </option>";
				  }
			?>
		</select>
	</div>
    <!-- FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID'); ?></label>
            <label>:</label>
        </div>
        <input type="text" name="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID; ?>" 
                           id="<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID; ?>" 
                           class="<?php echo $this->ReturnRegistrationIdClass; ?>"
                           onblur="ValidateRegistrationId(null, '<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION_SB; ?>',
                                               '', true);"
                           onclick="ValidateRegistrationId(null, '<?php echo ConfigInfraTools::FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION_SB; ?>',
                                               '', true);"
                           title="<?php echo $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID'); ?>"
                           value="<?php echo $this->InputValueRegistrationId; ?>" maxlength="12" />
     </div>
     <!-- FIELD_DEPARTMENT_NAME -->
     <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_DEPARTMENT_NAME; ?>"
                class="SelectCorporation"
                onchange="document.getElementById(
                                        '<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION_SB; ?>')
                                         .disabled = false;
				          document.getElementById(
                                        '<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION_SB; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
                <option <?php if ($this->InputValueDepartmentName == "" 
                                  || $this->InputValueDepartmentName == ConfigInfraTools::FIELD_SEL_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
                </option>
                <?php 
                if(is_array($this->ArrayInstanceDepartment))
                {
                    foreach($this->ArrayInstanceDepartment as $key=>$department)
                    {
                        echo "<option ";
                          if($this->InputValueDepartmentName == $department->GetDepartmentName() ||
							 $this->InputValueDepartmentName == $department->GetDepartmentInitials() . " - " .
							                                    $department->GetDepartmentName())
                            echo "selected='selected' ";
                        echo "value='" . $department->GetDepartmentName() . "'>" . $department->GetDepartmentName() 
							           . "</option>";
                    }
                }
                ?>
            </select>
        </div>
     </div>
	 <?php
	 if($this->ShowTypeUserDescription)
	 {
		?>
        <!-- FIELD_TYPE_USER_DESCRIPTION -->
        <div class="DivContentBodyContainer">
            <div class="DivContentBodyContainerLabel">
                <label><?php echo $this->InstanceLanguageText->GetText('FIELD_TYPE_USER_DESCRIPTION').":"; ?></label>
            </div>
            <div class="DivContentBodyContainerValue">
            	<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTypeUserDescription; ?></label>
        	</div>
        </div>
        <?php
	 }
	 ?>
     <?php if($this->EnableFieldSessionExpires)
	 {?>
	 	 <!-- FIELD_USER_SESSION_EXPIRES -->
		 <div class="DivContentBodyContainer">
        	<div class="DivContentBodyContainerLabel">
            	<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_SESSION_EXPIRES').":"; ?></label>
        	</div>
        	<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent">
					<?php  if($this->InputValueSessionExpires)
								$this->InputValueSessionExpires = $this->Config->DefaultServerImage .
																		'Icons/IconInfraToolsVerified.png';
							else $this->InputValueSessionExpires = $this->Config->DefaultServerImage .
																		'Icons/IconInfraToolsNotVerified.png';
					?>
					<img	src="<?php echo $this->InputValueSessionExpires; ?>"
                       	    alt="CorporationVerification" width="20" height="20" />
				</label>
			</div>
		</div>
	 <?php } ?>
     <?php if($this->EnableFieldUserActive)
	 {?>
	 	 <!-- FIELD_USER_ACTIVE -->
		 <div class="DivContentBodyContainer">
        	<div class="DivContentBodyContainerLabel">
            	<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_ACTIVE').":"; ?></label>
        	</div>
        	<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent">
					<?php  if($this->InputValueUserActive)
								$this->InputValueUserActive = $this->Config->DefaultServerImage .
																		'Icons/IconInfraToolsVerified.png';
							else $this->InputValueUserActive = $this->Config->DefaultServerImage .
																		'Icons/IconInfraToolsNotVerified.png';
					?>
					<img	src="<?php echo $this->InputValueUserActive; ?>"
                       	    alt="UserActive" width="20" height="20" />
				</label>
			</div>
		</div>
	<?php } ?>
    <?php if($this->EnableFieldUserActive)
	{?>
	 	 <!-- FIELD_USER_CONFIRMED -->
		 <div class="DivContentBodyContainer">
        	<div class="DivContentBodyContainerLabel">
            	<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_CONFIRMED').":"; ?></label>
        	</div>
        	<div class="DivContentBodyContainerValue">
				<label class="DivContentBodyContainerValueContent">
					<?php  if($this->InputValueUserConfirmed)
								$this->InputValueUserConfirmed = $this->Config->DefaultServerImage .
																		'Icons/IconInfraToolsVerified.png';
							else $this->InputValueUserConfirmed = $this->Config->DefaultServerImage .
																		'Icons/IconInfraToolsNotVerified.png';
					?>
					<img	src="<?php echo $this->InputValueUserConfirmed; ?>"
                       	    alt="UserConfirmed" width="20" height="20" />
				</label>
			</div>
		</div>
	<?php } ?>
    <!-- REGISTER_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTER_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegisterDate; ?></label>
        </div>
    </div>
    <!-- SUBMIT -->
    <div class="DivContentBodyContainer">
        <input type="submit" name="<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION_SB; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION_CANCEL; ?>" 
                             id="<?php echo ConfigInfraTools::FM_USER_CHANGE_ASSOC_USER_CORPORATION_CANCEL; ?>"
                             class="DivContentBodySubmitBigger"
                             value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
	</div>
</form>