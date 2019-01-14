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
<!-- FORM USER CHANGE ASSOC USER CORPORATION -->
<form name="<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION; ?>" 
      id="<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION; ?>" method="post" >
	<!-- NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserName; ?></label>
        </div>
    </div>
    <!-- EMAIL -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('EMAIL').":"; ?></label>
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
    <!-- GENDER -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('GENDER').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueGender; ?></label>
        </div>
    </div>
    <!-- COUNTRY -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('COUNTRY').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueCountry; ?></label>
        </div>
    </div>
    <!-- REGION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegion; ?></label>
        </div>
    </div>
    <!-- PHONE PRIMARY -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('PHONE_PRIMARY').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
           	<label class="DivContentBodyContainerValueContent">
           	     <?php echo "(". $this->InputValueUserPhonePrimaryPrefix .")&nbsp" ?>
           	</label>
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserPhonePrimary; ?></label>
        </div>
    </div>
    <!-- PHONE SECONDARY -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('PHONE_SECONDARY').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
           	<label class="DivContentBodyContainerValueContent">
           	     <?php echo "(". $this->InputValueUserPhoneSecondaryPrefix .")&nbsp" ?>
           	</label>
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserPhoneSecondary; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_CORPORATION_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserCorporationName; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueCorporationActive; ?>" 
                       name="<?php echo ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
        </div>
    </div>
    <!-- REGISTRATION_DATE -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabel">
			<label> <?php echo $this->InstanceLanguageText->GetText('REGISTRATION_DATE'); ?> </label>
			<label>:</label>
		</div>
		<!-- REGISTRATION_DATE_BIRTH_DATE_DAY -->
		<select style="
					   <?php if($this->InputValueRegistrationDateDay != ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY
								 && $this->InputValueRegistrationDateDay != "") 
							echo 'color:black;'
						?> " 
				name="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>" 
				id="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>"
				class="SelectBirthDateDay <?php echo $this->ReturnRegistrationDateDayClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>');">
			<option <?php if ($this->InputValueRegistrationDateDay == "" 
							  || $this->InputValueRegistrationDateDay == ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>" 
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
						<?php if($this->InputValueRegistrationDateMonth != ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY
								 && $this->InputValueRegistrationDateMonth != "") 
							echo 'color:black;'
						?> "
				name="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH; ?>" 
				id="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH; ?>"
				class="SelectBirthDateMonth <?php echo $this->ReturnRegistrationDateMonthClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_MONTH; ?>');">
			<option <?php if ($this->InputValueRegistrationDateMonth == "" 
							  || $this->InputValueRegistrationDateMonth == ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>" 
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
					   <?php if($this->InputValueRegistrationDateYear != ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY
								 && $this->InputValueRegistrationDateYear != "") 
							echo 'color:black;'
						?> "
				name="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR; ?>" 
				id="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR; ?>"
				class="SelectBirthDateYear <?php echo $this->ReturnRegistrationDateYearClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_YEAR; ?>');">
			<option <?php if ($this->InputValueRegistrationDateYear == "" 
							  || $this->InputValueRegistrationDateYear == ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE_DAY; ?>" 
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
    <!-- REGISTRATION_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('REGISTRATION_ID'); ?></label>
            <label>:</label>
        </div>
        <input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID; ?>" 
                           id="<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID; ?>" 
                           class="<?php echo $this->ReturnRegistrationIdClass; ?>"
                           onblur="ValidateRegistrationId(null, '<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT; ?>',
                                               '', true);"
                           onclick="ValidateRegistrationId(null, '<?php echo ConfigInfraTools::FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID; ?>',
                                               'DivContentBodySubmitBigger',
                                               '<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT; ?>',
                                               '', true);"
                           title="<?php echo $this->InstanceLanguageText->GetText('REGISTRATION_ID'); ?>"
                           value="<?php echo $this->InputValueRegistrationId; ?>" maxlength="12" />
     </div>
     <!-- FORM_FIELD_DEPARTMENT_NAME -->
     <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_DEPARTMENT_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>" 
                id="<?php echo ConfigInfraTools::FORM_FIELD_DEPARTMENT_NAME; ?>"
                class="SelectCorporation"
                onchange="document.getElementById(
                                        '<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT; ?>')
                                         .disabled = false;
				          document.getElementById(
                                        '<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
                <option <?php if ($this->InputValueDepartmentName == "" 
                                  || $this->InputValueDepartmentName == ConfigInfraTools::FORM_FIELD_SELECT_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_SELECT_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SELECT_NONE'); ?> 
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
        <!-- TYPE USER DESCRIPTION -->
        <div class="DivContentBodyContainer">
            <div class="DivContentBodyContainerLabel">
                <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TYPE_USER_DESCRIPTION').":"; ?></label>
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
	 	 <!-- SESSION_EXPIRES -->
		 <div class="DivContentBodyContainer">
        	<div class="DivContentBodyContainerLabel">
            	<label><?php echo $this->InstanceLanguageText->GetText('SESSION_EXPIRES').":"; ?></label>
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
	 	 <!-- USER_ACTIVE -->
		 <div class="DivContentBodyContainer">
        	<div class="DivContentBodyContainerLabel">
            	<label><?php echo $this->InstanceLanguageText->GetText('USER_ACTIVE').":"; ?></label>
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
	 	 <!-- USER_CONFIRMED -->
		 <div class="DivContentBodyContainer">
        	<div class="DivContentBodyContainerLabel">
            	<label><?php echo $this->InstanceLanguageText->GetText('USER_ACTIVE').":"; ?></label>
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
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_CANCEL; ?>" 
                             id="<?php echo ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_CANCEL; ?>"
                             class="DivContentBodySubmitBigger"
                             value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>
</div>