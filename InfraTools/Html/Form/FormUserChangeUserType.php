<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))               echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnTypeUserDescriptionText)) echo $this->ReturnTypeUserDescriptionText; ?>
		<?php if(isset($this->ReturnText))                    echo $this->ReturnText; ?>
	</label>
</div>
<!-- FM_USER_CHANGE_USER_TYPE -->
<form name="<?php echo ConfigInfraTools::FM_USER_CHANGE_USER_TYPE; ?>" 
      id="<?php echo ConfigInfraTools::FM_USER_CHANGE_USER_TYPE; ?>" method="post" >
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
    <!-- FIELD_USER_BIRTH_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_BIRTH_DATE').":"; ?></label>
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
                       name="<?php echo ConfigInfraTools::FM_ACCOUNT_VERIFIED_CORPORATION_SB; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
        </div>
    </div>
    <!-- FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueAssocUserCorporationRegistrationDate; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueAssocUserCorporationRegistrationDateActive; ?>" 
                       name="<?php echo ConfigInfraTools::FM_ACCOUNT_VERIFIED_CORPORATION_SB; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
        </div>
    </div>
    <!-- FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueAssocUserCorporationRegistrationId; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueAssocUserCorporationRegistrationIdActive; ?>" 
                       name="<?php echo ConfigInfraTools::FM_ACCOUNT_VERIFIED_CORPORATION_SB; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
        </div>
    </div>
    <!-- FIELD_DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueDepartmentName; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueDepartmentActive; ?>" 
                       name="<?php echo ConfigInfraTools::FM_ACCOUNT_VERIFIED_DEPARTMENT_SB; ?>"
                       alt="DepartmentVerification" width="20" height="20" />
            </div>
        </div>
    </div>
	<!-- FIELD_TYPE_USER_DESCRIPTION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FIELD_TYPE_USER_DESCRIPTION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION; ?>" 
                id="<?php echo ConfigInfraTools::FIELD_TYPE_USER_DESCRIPTION; ?>"
                class="SelectCorporation"
                onchange="document.getElementById('<?php echo ConfigInfraTools::FM_USER_CHANGE_USER_TYPE_SB; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FM_USER_CHANGE_USER_TYPE_SB; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
                <option <?php if ($this->InputValueTypeUserDescription == "" 
                                  || $this->InputValueTypeUserDescription == ConfigInfraTools::FIELD_SEL_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FIELD_SEL_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FIELD_SEL_NONE'); ?> 
                </option>
                <?php 
                if(is_array($this->ArrayInstanceInfraToolsTypeUser))
                {
                    foreach($this->ArrayInstanceInfraToolsTypeUser as $key=>$userType)
                    {
                        echo "<option ";
                          if($this->InputValueTypeUserDescription == $userType->GetTypeUserDescription())
                            echo "selected='selected' ";
                        echo "value='" . $userType->GetTypeUserDescription() . "'>" . $userType->GetTypeUserDescription() 
							           . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
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
        <input type="submit" name="<?php echo ConfigInfraTools::FM_USER_CHANGE_USER_TYPE_SB; ?>" 
                                 id="<?php echo ConfigInfraTools::FM_USER_CHANGE_USER_TYPE_SB; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_USER_TYPE'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FM_USER_CHANGE_USER_TYPE_CANCEL; ?>" 
                             id="<?php echo ConfigInfraTools::FM_USER_CHANGE_USER_TYPE_CANCEL; ?>"
                             class="DivContentBodySubmitBigger"
                             value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>