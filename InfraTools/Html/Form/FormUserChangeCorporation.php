<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))           echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnCorporationNameText)) echo $this->ReturnCorporationNameText; ?>
		<?php if(isset($this->ReturnText))                echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM_USER_CHANGE_CORPORATION -->
<form name="<?php echo ConfigInfraTools::FORM_USER_CHANGE_CORPORATION; ?>" 
      id="<?php echo ConfigInfraTools::FORM_USER_CHANGE_CORPORATION; ?>" method="post" >
	<!-- FORM_FIELD_USER_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserName; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_USER_EMAIL -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_EMAIL').":"; ?></label>
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
    <!-- FORM_FIELD_USER_GENDER -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_GENDER').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueGender; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_COUNTRY_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_COUNTRY_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueCountry; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_USER_REGION -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_REGION').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegion; ?></label>
        </div>
    </div>
    <!-- FORM_FIELD_CORPORATION_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_CORPORATION_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <select 
                name="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>" 
                id="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>"
                class="SelectCorporation"
                onchange="document.getElementById('<?php echo ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_SUBMIT; ?>')
                                         .disabled = false;
				          document.getElementById('<?php echo ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_SUBMIT; ?>')
                                         .className = 'DivContentBodySubmitBigger SubmitEnabled;'">
                <option <?php if ($this->InputValueUserCorporationName == "" 
                                  || $this->InputValueUserCorporationName == ConfigInfraTools::FORM_FIELD_SELECT_NONE) 
                    echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_SELECT_NONE; ?>" > 
                        <?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SELECT_NONE'); ?> 
                </option>
                <?php 
                if(is_array($this->ArrayInstanceInfraToolsCorporation))
                {
                    foreach($this->ArrayInstanceInfraToolsCorporation as $key=>$corporation)
                    {
                        echo "<option ";
                          if($this->InputValueUserCorporationName == $corporation->GetCorporationName())
                            echo "selected='selected' ";
                        echo "value='" . $corporation->GetCorporationName() . "'>" . $corporation->GetCorporationName() 
							           . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueAssocUserCorporationRegistrationDate; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueAssocUserCorporationRegistrationDateActive; ?>" 
                       name="<?php echo ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
        </div>
    </div>
    <!-- FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueAssocUserCorporationRegistrationId; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueAssocUserCorporationRegistrationIdActive; ?>" 
                       name="<?php echo ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION; ?>"
                       alt="CorporationVerification" width="20" height="20" />
            </div>
        </div>
    </div>
    <!-- FORM_FIELD_DEPARTMENT_NAME -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_DEPARTMENT_NAME').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
            <div>
                <label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueDepartmentName; ?></label>
            </div>
            <div class="DivContentBodyContainerSubmitImage">
                <img   src="<?php echo $this->InputValueDepartmentActive; ?>" 
                       name="<?php echo ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_DEPARTMENT; ?>"
                       alt="DepartmentVerification" width="20" height="20" />
            </div>
        </div>
    </div>
	<?php
	if($this->ShowTypeUserDescription)
	{
		?>
        <!-- FORM_FIELD_TYPE_USER_DESCRIPTION -->
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
	 	 <!-- FORM_FIELD_USER_SESSION_EXPIRES -->
		 <div class="DivContentBodyContainer">
        	<div class="DivContentBodyContainerLabel">
            	<label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_SESSION_EXPIRES').":"; ?></label>
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
	 	 <!-- FORM_FIELD_USER_ACTIVE -->
		 <div class="DivContentBodyContainer">
        	<div class="DivContentBodyContainerLabel">
            	<label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_ACTIVE').":"; ?></label>
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
	 	 <!-- FORM_FIELD_USER_CONFIRMED -->
		 <div class="DivContentBodyContainer">
        	<div class="DivContentBodyContainerLabel">
            	<label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_USER_CONFIRMED').":"; ?></label>
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
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_SUBMIT; ?>" 
                                 id="<?php echo ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_SUBMIT; ?>"
                                 class="DivContentBodySubmitBigger <?php echo $this->SubmitClass ?>"
                                 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_CORPORATION'); ?>"
                                 <?php echo $this->SubmitEnabled; ?> />
        <input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_CANCEL; ?>" 
                             id="<?php echo ConfigInfraTools::FORM_USER_CHANGE_CORPORATION_CANCEL; ?>"
                             class="DivContentBodySubmitBigger"
                             value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CANCEL'); ?>" />
    </div>
</form>