<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php if(isset($this->ReturnEmptyText))                    echo $this->ReturnEmptyText; ?>
		<?php if(isset($this->ReturnNameText))                     echo $this->ReturnNameText; ?>
		<?php if(isset($this->ReturnUserEmailText))                echo $this->ReturnUserEmailText; ?>
		<?php if(isset($this->ReturnBirthDateDayText))             echo $this->ReturnBirthDateDayText; ?>
		<?php if(isset($this->ReturnBirthDateMonthText))           echo $this->ReturnBirthDateMonthText; ?>
		<?php if(isset($this->ReturnBirthDateYearText))            echo $this->ReturnBirthDateYearText; ?>
		<?php if(isset($this->ReturnUserPhonePrimaryText))         echo $this->ReturnUserPhonePrimaryText; ?>
		<?php if(isset($this->ReturnUserPhonePrimaryPrefixText))   echo $this->ReturnUserPhonePrimaryPrefixText; ?>
		<?php if(isset($this->ReturnUserPhoneSecondaryText))       echo $this->ReturnUserPhoneSecondaryText; ?>
		<?php if(isset($this->ReturnUserPhoneSecondaryPrefixText)) echo $this->ReturnUserPhoneSecondaryPrefixText; ?>
		<?php if(isset($this->ReturnGenderText))                   echo $this->ReturnGenderText; ?>
		<?php if(isset($this->ReturnPasswordText))                 echo $this->ReturnPasswordText; ?>
		<?php if(isset($this->ReturnCaptchaText))                  echo $this->ReturnCaptchaText; ?>
		<?php if(isset($this->ReturnText))                         echo $this->ReturnText; ?>
	</label>
</div>
<!-- FORM USER REGISTER -->
<form name="<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>" 
	  id="<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>" method="post" >
	<!-- FORM_FIELD_USER_NAME -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label><?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_NAME'); ?></label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_NAME_TIP'); ?>
				</label>
			</div>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_NAME; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_NAME; ?>" 
						   class="<?php echo $this->ReturnNameClass; ?>"
						   onblur="ValidateName(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   onchange="ValidateName(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_NAME; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_NAME'); ?>"
						   value="<?php echo $this->InputValueUserName; ?>" maxlength="45" />
	 </div>
	 <div class="DivClearFloat"></div>
	 <!-- REGISTER_EMAIL -->
	 <div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label> <?php echo $this->InstanceLanguageText->GetText('EMAIL'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>"
						   class="<?php echo $this->ReturnUserEmailClass; ?>"
						   onkeyup="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											   '', true);
									ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   onblur="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   onchange="ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
											   'DivContentBodySubmit',
											   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('EMAIL'); ?>" 
						   value="<?php echo $this->InputValueUserEmail; ?>" maxlength="60" />
	</div>
	<div class="DivClearFloat"></div>
	<!-- REGISTER_BIRTH_DATE -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label> <?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<!-- FORM_FIELD_USER_BIRTH_DATE_DAY -->
		<select style="
					   <?php if($this->InputValueBirthDateDay != ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY
								 && $this->InputValueBirthDateDay != "") 
							echo 'color:black;'
						?> " 
				name="<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY; ?>" 
				id="<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY; ?>"
				class="SelectBirthDateDay <?php echo $this->ReturnBirthDateDayClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY; ?>');
						  ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');">
			<option <?php if ($this->InputValueBirthDateDay == "" 
							  || $this->InputValueBirthDateDay == ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY; ?>" 
				disabled="disabled"> 
					<?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE_DAY'); ?> 
			</option>
			<?php for($i=1; $i<32; $i++)
				  {
					  echo "<option ";
					  if($this->InputValueBirthDateDay == $i)
						echo "selected='selected' ";
					   echo "value='$i'> $i </option>";
				  }
			?>
		</select>
		<!-- FORM_FIELD_USER_BIRTH_DATE_MONTH -->
		<select style="
						<?php if($this->InputValueBirthDateMonth != ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY
								 && $this->InputValueBirthDateMonth != "") 
							echo 'color:black;'
						?> "
				name="<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH; ?>" 
				id="<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH; ?>"
				class="SelectBirthDateMonth <?php echo $this->ReturnBirthDateMonthClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH; ?>');
						  ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');">
			<option <?php if ($this->InputValueBirthDateMonth == "" 
							  || $this->InputValueBirthDateMonth == ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY; ?>" 
				disabled="disabled"> 
					<?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE_MONTH'); ?> 
			</option>
			<?php for($i=1; $i<13; $i++)
				  {
					  echo "<option ";
					  if($this->InputValueBirthDateMonth == $i)
						echo "selected='selected' ";
					   echo "value='$i'> $i </option>";
				  }
			?>
		</select>
		<!-- FORM_FIELD_USER_BIRTH_DATE_YEAR -->
		<select style=";
					   <?php if($this->InputValueBirthDateYear != ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY
								 && $this->InputValueBirthDateYear != "") 
							echo 'color:black;'
						?> "
				name="<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_YEAR; ?>" 
				id="<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_YEAR; ?>"
				class="SelectBirthDateYear <?php echo $this->ReturnBirthDateYearClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_YEAR; ?>');
						  ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');">
			<option <?php if ($this->InputValueBirthDateYear == "" 
							  || $this->InputValueBirthDateYear == ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY; ?>" 
				disabled="disabled"> 
					<?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE_YEAR'); ?> 
			</option>
			<?php for($i=1940; $i<2016; $i++)
				  {
					  echo "<option ";
					  if($this->InputValueBirthDateYear == $i)
						echo "selected='selected' ";
					   echo "value='$i'> $i </option>";
				  }
			?>
		</select>
	</div>
	<div class="DivClearFloat"></div>
	<!-- REGISTER_USER_PHONE_PRIMARY -->
    <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabelBig">
            <label><?php echo $this->InstanceLanguageText->GetText('PHONE_PRIMARY'); ?></label>
            <label>:</label>
        </div>
        <div class="DivContentBodyContainerPhonePrefix">
        	<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX; ?>" 
							   class="<?php echo $this->ReturnUserPhonePrimaryPrefixClass; ?>"
							   onblur="ValidateNumbersOnly(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX; ?>',
												   'DivContentBodySubmitBigger',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   onkeyup="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   onclick="ValidateNumbersOnly(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX; ?>',
												   'DivContentBodySubmitBigger',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('PHONE_PREFIX'); ?>"
							   value="<?php echo $this->InputValueUserPhonePrimaryPrefix; ?>" maxlength="3" />
        </div>
        <div class="DivContentBodyContainerPhone">
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY; ?>" 
							   class="<?php echo $this->ReturnUserPhonePrimaryClass; ?>"
							   onblur="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY; ?>',
												   'DivContentBodySubmitBigger',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   onkeyup="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   onclick="ValidateNumbersOnly(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY; ?>',
												   'DivContentBodySubmitBigger',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('PHONE_PRIMARY'); ?>"
							   value="<?php echo $this->InputValueUserPhonePrimary; ?>" maxlength="9" />
		</div>
     </div>
     <div class="DivClearFloat"></div>
     <!-- REGISTER_USER_PHONE_SECONDARY -->
     <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabelBig">
            <label><?php echo $this->InstanceLanguageText->GetText('PHONE_SECONDARY'); ?></label>
            <label>:</label>
        </div>
        <div class="DivContentBodyContainerPhonePrefix">
        	<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX; ?>" 
							   class="<?php echo $this->ReturnUserPhoneSecondaryPrefixClass; ?>"
							   onblur="ValidateNumbersOnly(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX; ?>',
												   'DivContentBodySubmitBigger',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   onkeyup="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   onclick="ValidateNumbersOnly(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX; ?>',
												   'DivContentBodySubmitBigger',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('PHONE_PREFIX'); ?>"
							   value="<?php echo $this->InputValueUserPhoneSecondaryPrefix; ?>" maxlength="3" />
        </div>
        <div class="DivContentBodyContainerPhone">
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY; ?>" 
							   class="<?php echo $this->ReturnUserPhoneSecondaryClass; ?>"
							   onblur="ValidateNumbersOnly(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY; ?>',
												   'DivContentBodySubmitBigger',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   onkeyup="ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   onclick="ValidateNumbersOnly(null, 
											       '<?php echo ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY; ?>',
												   'DivContentBodySubmitBigger',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									   ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmitBigger',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   title="<?php echo $this->InstanceLanguageText->GetText('PHONE_PRIMARY'); ?>"
							   value="<?php echo $this->InputValueUserPhoneSecondary; ?>" maxlength="9" />
		</div>
     </div>
	<div class="DivClearFloat"></div>
	<!-- FORM_FIELD_USER_GENDER -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label> <?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_GENDER'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
		</div>
		<select name="<?php echo ConfigInfraTools::FORM_FIELD_USER_GENDER; ?>" 
				id="<?php echo ConfigInfraTools::FORM_FIELD_USER_GENDER; ?>"
				class="<?php echo $this->ReturnGenderClass; ?>"
				onchange="SetSelectColor('<?php echo ConfigInfraTools::FORM_FIELD_USER_GENDER; ?>');
						  ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
				style=" <?php if($this->InputValueGender != ConfigInfraTools::FORM_FIELD_SELECT_NONE
								 && $this->InputValueGender != "") 
							echo 'color:black;'
						?> " >
			<option <?php if ($this->InputValueGender == "" 
							  || $this->InputValueGender == ConfigInfraTools::FORM_FIELD_SELECT_NONE) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_SELECT_NONE; ?>" 
				disabled="disabled"> 
					<?php echo $this->InstanceLanguageText->GetText('FORM_SELECT_DEFAULT'); ?> 
			</option>
			<option <?php if ($this->InputValueGender == ConfigInfraTools::REGISTER_SELECT_GENDER_MALE) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::REGISTER_SELECT_GENDER_MALE; ?>"> 
					<?php echo $this->InstanceLanguageText->GetText('REGISTER_SELECT_GENDER_MALE'); ?> 
			</option>
			<option <?php if ($this->InputValueGender == ConfigInfraTools::REGISTER_SELECT_GENDER_FEMALE) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::REGISTER_SELECT_GENDER_FEMALE; ?>"> 
					<?php echo $this->InstanceLanguageText->GetText('REGISTER_SELECT_GENDER_FEMALE'); ?> 
			</option>
			<option <?php if ($this->InputValueGender == ConfigInfraTools::REGISTER_SELECT_GENDER_OTHER) 
				echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::REGISTER_SELECT_GENDER_OTHER; ?>"> 
					<?php echo $this->InstanceLanguageText->GetText('REGISTER_SELECT_GENDER_OTHER'); ?> 
			</option>
		</select>
	</div>
	<div class="DivClearFloat"></div>
	<!-- REGISTER_GOOGLE_MAPS -->
	<div class="DivHidden">
		<input type="hidden" name="<?php echo ConfigInfraTools::FORM_GOOGLE_MAPS_LATITUDE; ?>"  
							 id="<?php echo ConfigInfraTools::FORM_GOOGLE_MAPS_LATITUDE; ?>"/>
		<input type="hidden" name="<?php echo ConfigInfraTools::FORM_GOOGLE_MAPS_LONGITUDE; ?>" 
							 id="<?php echo ConfigInfraTools::FORM_GOOGLE_MAPS_LONGITUDE; ?>"/>
	</div>
	<div id="GoogleMapsDiv" class="DivContentBodyContainerGoogleMaps">
		<input type="text"   id="GoogleMapsSearch" name="searchInput" class="GoogleMapsSearch GoogleMapsSearchControls" value=""/>
		<input type="button" id="GoogleMapsSubmit" class="GoogleMapsSubmit" 
			   value="<?php echo $this->InstanceLanguageText->GetText('MAPS_SEARCH'); ?>"/>
	</div>
	<div class="DivContentBodyContainerSmall">
		<div class="DivContentBodyContainerLabelTipMaps">
			<label>
				<?php echo $this->InstanceLanguageText->GetText('MAPS_TIP'); ?>
			</label>
		</div>
	</div>
	<div class="DivContentBodyContainer DivContentBodyContainerMaps">
		<div class="DivContentBodyContainerLabelMapsCountry">
			<div class="DivContentBodyContainerLabel">
				<label> <?php echo $this->InstanceLanguageText->GetText('COUNTRY'); ?> </label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_COUNTRY; ?>"  
							   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_COUNTRY; ?>"
							   class="<?php echo $this->ReturnCountryClass; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('COUNTRY'); ?>"
							   onblur="ValidateNotNull(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_COUNTRY; ?>',
													  'DivContentBodySubmit',
													  '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
													  '', true);
									   ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
													 'DivContentBodySubmit',
													 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
													 '');"
									   onkeyup="ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
													 'DivContentBodySubmit',
													 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
													 '');"
									   onchange="ValidateNotNull(null, 
													'<?php echo ConfigInfraTools::FORM_FIELD_USER_COUNTRY; ?>',
													'DivContentBodySubmit',
													'<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
													'', true);
									   ValidateMultiplyFields(
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '');" 
									   value="<?php echo $this->InputValueCountry; ?>"/>
		</div>
		<div class="DivContentBodyContainerLabelMapsEstate">
			<div class="DivContentBodyContainerLabel DivContentBodyContainerLabelMapsLabel">
				<label class=""> 
					<?php echo $this->InstanceLanguageText->GetText('REGION') . ":"; ?> 
				</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_FIELD_USER_REGION; ?>"  
						   id="<?php echo ConfigInfraTools::FORM_FIELD_USER_REGION; ?>"
						   class="<?php echo $this->ReturnRegionClass; ?>"
						   title="<?php echo $this->InstanceLanguageText->GetText('REGION'); ?>"
						   onblur="ValidateNotNull(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_REGION; ?>',
													  'DivContentBodySubmit',
													  '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
													  '', true);
								   ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
													 'DivContentBodySubmit',
													 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
													 '');"
								   onkeyup="ValidateMultiplyFields(
													 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
													 'DivContentBodySubmit',
													 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
													 '');"
								   onchange="ValidateNotNull(null, 
													'<?php echo ConfigInfraTools::FORM_FIELD_USER_REGION; ?>',
													'DivContentBodySubmit',
													'<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
													'', true);
								   ValidateMultiplyFields(
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '');"
								   value="<?php echo $this->InputValueRegion; ?>"/>
		</div>                
	</div>
	<div class="DivClearFloat"></div>
	<!-- NEW PASSWORD -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label> <?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_NEW_PASSWORD'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_NEW_PASSWORD_TIP'); ?>
				</label>
			</div>
		</div>
		<input type="password" name="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>"
						   class="<?php echo $this->ReturnPasswordClass; ?>"
						   onblur="ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   onchange="ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_NEW_PASSWORD_TITLE'); ?>" 
						   value="" maxlength="18" />
	</div>
	<div class="DivClearFloat"></div>
	<!-- REPEAT PASSWORD -->
	<div class="DivContentBodyContainer">
		<div class="DivContentBodyContainerLabelBig">
			<label> <?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_REPEAT_PASSWORD'); ?> </label>
			<label class="RequiredField">&nbsp;*</label>
			<label>:</label>
			<div class="DivContentBodyContainerLabelTip">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_REPEAT_PASSWORD_TIP'); ?>
				</label>
			</div>
		</div>
		<input type="password" name="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>"
						   class="<?php echo $this->ReturnPasswordClass; ?>"
						   onblur="ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
								   ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   onkeyup="ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   onchange="ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>',
												   'DivContentBodySubmit',
												   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												   '', true);
									 ValidateMultiplyFields(
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
											 'DivContentBodySubmit',
											 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
											 '');"
						   title="<?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_REPEAT_PASSWORD_TITLE'); ?>" 
						   value="" maxlength="18" />
	</div>
	<?php if($this->ValidateCaptcha) 
	{
		?>
		<!-- CAPTCHA -->
		<div class="DivClearFloat"></div>
		<div class="DivContentBodyContainerCaptcha">
			<div class="DivContentBodyContainerLabel">
				<label> <?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_CAPTCHA'); ?> </label>
				<label class="RequiredField">&nbsp;*</label>
				<label>:</label>
			</div>
			<input type="text" name="<?php echo ConfigInfraTools::FORM_CAPTCHA_REGISTER; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_CAPTCHA_REGISTER; ?>"
							   class="<?php echo $this->ReturnCaptchaClass; ?>"
							   title="<?php echo $this->InstanceLanguageText->GetText('REGISTER_TEXT_CAPTCHA'); ?>" 
							   onblur="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FORM_CAPTCHA_REGISTER; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '', false);
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   onkeyup="ValidateHasCharacters(null, '<?php echo ConfigInfraTools::FORM_CAPTCHA_REGISTER; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '', false);
										ValidateMultiplyFields(
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
												 'DivContentBodySubmit',
												 '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
												 '');"
							   value="<?php echo $this->InputValueCaptcha; ?>" maxlength="8" />
			<img src="<?php echo REL_PATH . "Captcha/" . ConfigInfraTools::FORM_CAPTCHA_REGISTER ?>" 
				 id="RegisterCapcha" alt="Captcha" 
				 class="DivContentBodyContainerCaptchaImage" />
		</div>
	<?php } ?>
	<?php if($this->EnableFieldSessionExpires)
	{?>
		 <!-- SESSION_EXPIRES -->
		 <div class="DivClearFloat"></div>
		 <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('SESSION_EXPIRES').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="checkbox" 
					   name="<?php echo ConfigInfraTools::FORM_FIELD_USER_SESSION_EXPIRES; ?>" 
					   value="<?php echo ConfigInfraTools::FORM_FIELD_USER_SESSION_EXPIRES; ?>" <?php echo $this->InputValueSessionExpires; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
									   '');"
						/>
			</div>
		</div>
	<?php } ?>
	<?php if($this->EnableFieldTwoStepVerification)
	{?>
		 <!-- FORM_FIELD_USER_TWO_STEP_VERIFICATION -->
		 <div class="DivClearFloat"></div>
		 <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('TWO_STEP_VERIFICATION').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="checkbox" 
					   name="<?php echo ConfigInfraTools::FORM_FIELD_USER_TWO_STEP_VERIFICATION; ?>" 
					   value="<?php echo ConfigInfraTools::FORM_FIELD_USER_TWO_STEP_VERIFICATION; ?>" 
					          <?php echo $this->InputValueTwoStepVerification; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
									   '');"
						/>
			</div>
		</div>
	<?php } ?>
	<?php if($this->EnableFieldUserActive)
	{?>
		 <!-- FORM_FIELD_USER_ACTIVE -->
		 <div class="DivClearFloat"></div>
		 <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('USER_ACTIVE').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="checkbox" 
					   name="<?php echo ConfigInfraTools::FORM_FIELD_USER_ACTIVE; ?>" 
					   value="<?php echo ConfigInfraTools::FORM_FIELD_USER_ACTIVE; ?>" 
					          <?php echo $this->InputValueUserActive; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
									   '');"
						/>
			</div>
		</div>
	<?php } ?>
	<?php if($this->EnableFieldUserConfirmed)
	{?>
		 <!-- USER_CONFIRMED-->
		 <div class="DivClearFloat"></div>
		 <div class="DivContentBodyContainer">
			<div class="DivContentBodyContainerLabel">
				<label><?php echo $this->InstanceLanguageText->GetText('USER_CONFIRMED').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValue">
				<input type="checkbox" 
					   name="<?php echo ConfigInfraTools::FORM_FIELD_USER_CONFIRMED; ?>" 
					   value="<?php echo ConfigInfraTools::FORM_FIELD_USER_CONFIRMED; ?>" <?php echo $this->InputValueUserConfirmed; ?>
					   onchange="ValidateMultiplyFields(
									   '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
									   'DivContentBodySubmitBigger',
									   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
									   '');"
						/>
			</div>
		</div>
	<?php } ?>
	<!-- SUBMIT -->
	<div class="DivClearFloat"></div>
	<div class="DivContentBodyContainerSubmit"
		 onmouseover="ValidateName(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_NAME; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
								   '', true);
					 ValidateEmail(null, '<?php echo ConfigInfraTools::FORM_FIELD_USER_EMAIL; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
								   '', true);
					 ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_NEW; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
								   '', false);
					 ValidatePassword(null, '<?php echo ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
								   '', false);
					 ValidateMultiplyFields(
								   '<?php echo ConfigInfraTools::FORM_USER_REGISTER; ?>',
								   'DivContentBodySubmit',
								   '<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>',
								   '');">
		<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>" 
								 id="<?php echo ConfigInfraTools::FORM_USER_REGISTER_SUBMIT; ?>"
								 class="DivContentBodySubmit <?php echo $this->SubmitClass ?>"
								 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_REGISTER'); ?>"
								 <?php echo $this->SubmitEnabled; ?> />
	</div>
</form>