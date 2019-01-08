<!-- DIV_RETURN -->
<div id="<?php echo ConfigInfraTools::DIV_RETURN; ?>" class="<?php if(isset($this->ReturnClass)) echo $this->ReturnClass; ?>">
	<div>
		<div>
			<?php if(isset($this->ReturnImage)) echo $this->ReturnImage; ?>
		</div>
	</div>
	<label>
		<?php 
			if($this->ReturnLoginText == ConfigInfraTools::USER_NOT_CONFIRMED)
			{
				echo $this->InstanceLanguageText->GetText('USER_NOT_CONFIRMED');
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . str_replace("_", "", ConfigInfraTools::PAGE_LOGIN) 
							          . "Link.php");
			}
			else
			{
				if(isset($this->ReturnText)) echo $this->ReturnText;
			}
		?>
	</label>
</div>
<!-- WEB SITE BODY USER VIEW -->
<form name="<?php echo ConfigInfraTools::FORM_USER_VIEW; ?>" 
      id="<?php echo ConfigInfraTools::FORM_USER_VIEW; ?>" method="post" >
    <div class="DivContentBodySided">
		<!-- NAME -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('NAME').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserName; ?></label>
			</div>
		</div>
		<!-- EMAIL -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('EMAIL').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided" id="BodyUserViewEmailDiv">
				<label id="BodyUserViewEmailLabel" class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserEmail; ?></label>
			</div>
		</div>
		<!-- USER_UNIQUE_ID -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('USER_UNIQUE_ID').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<div>
					<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserUniqueId; ?></label>
				</div>
				<div class="DivContentBodyContainerSubmitImage">
					<img   src="<?php echo $this->InputValueUserUniqueIdActive; ?>" 
						   name="<?php echo ConfigInfraTools::ACCOUNT_FORM_SUBMIT_VERIFIED_USER_UNIQUE_ID; ?>"
						   alt="UserUniqueIdVerification" width="20" height="20" />
				</div>
			</div>
		</div>
		<div class="DivClearFloat"></div>
		<!-- BIRTH_DATE -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('BIRTH_DATE').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueBirthDateDay . " /"; ?></label>
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueBirthDateMonth . " /"; ?></label>
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueBirthDateYear; ?></label>
			</div>
		</div>
		<!-- GENDER -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('GENDER').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueGender; ?></label>
			</div>
		</div>
		<!-- COUNTRY -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('COUNTRY').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueCountry; ?></label>
			</div>
		</div>
		<!-- REGION -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('REGION').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegion; ?></label>
			</div>
		</div>
		<!-- PHONE PRIMARY -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('PHONE_PRIMARY').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent">
					 <?php echo "(". $this->InputValueUserPhonePrimaryPrefix .")&nbsp" ?>
				</label>
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserPhonePrimary; ?></label>
			</div>
		</div>
		<!-- PHONE SECONDARY -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('PHONE_SECONDARY').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent">
					 <?php echo "(". $this->InputValueUserPhoneSecondaryPrefix .")&nbsp" ?>
				</label>
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserPhoneSecondary; ?></label>
			</div>
		</div>
	</div>
    <div class="DivContentBodySided">
		<!-- CORPORATION -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('CORPORATION').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
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
		<!-- ASSOC USER CORPORATION REGISTRATION DATE -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('REGISTRATION_DATE').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
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
		<!-- ASSOC USER CORPORATION REGISTRATION ID -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('REGISTRATION_ID').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
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
		<!-- DEPARTMENT -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('DEPARTMENT').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
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
		<!-- TEAM -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('TEAMS').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserTeam; ?></label>
			</div>
		</div>
		<?php
		if($this->ShowTypeUserDescription)
		{
			?>
			<!-- TYPE USER DESCRIPTION -->
			<div class="DivContentBodyContainerSided">
				<div class="DivContentBodyContainerLabelSided">
					<label><?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_TYPE_USER_DESCRIPTION').":"; ?></label>
				</div>
				<div class="DivContentBodyContainerValueSided">
					<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueTypeUserDescription; ?></label>
				</div>
			</div>
			<?php
		}
		?>
	   <?php if($this->EnableFieldSessionExpires)
		{?>
			 <!-- SESSION_EXPIRES -->
			 <div class="DivContentBodyContainerSided">
				<div class="DivContentBodyContainerLabelSided" id="DivContentBodyContainerValueSidedFloat">
					<label><?php echo $this->InstanceLanguageText->GetText('SESSION_EXPIRES').":"; ?></label>
				</div>
				<div class="DivContentBodyContainerValueSided">
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
	   <?php if($this->EnableFieldTwoStepVerification)
		{?>
			 <!-- FORM_FIELD_USER_TWO_STEP_VERIFICATION -->
			 <div class="DivContentBodyContainerSided">
				<div class="DivContentBodyContainerLabelSided">
					<label><?php echo $this->InstanceLanguageText->GetText('TWO_STEP_VERIFICATION').":"; ?></label>
				</div>
				<div class="DivContentBodyContainerValueSided">
					<div class="DivContentBodyContainerSubmitImage">
						<?php  if($this->InputValueTwoStepVerification)
									$this->InputValueTwoStepVerification = $this->Config->DefaultServerImage.'Icons/IconInfraToolsVerified.png';
								else $this->InputValueTwoStepVerification = $this->Config->DefaultServerImage.'Icons/IconInfraToolsNotVerified.png';
						?>
						<img	src="<?php echo $this->InputValueTwoStepVerification; ?>"
									alt="TwoStepVerification" width="20" height="20" />
					</div>
				 </div>
			</div>
		<?php } ?>
		<?php if($this->EnableFieldUserActive)
		{?>
			 <!-- USER_ACTIVE -->
			 <div class="DivContentBodyContainerSided">
				<div class="DivContentBodyContainerLabelSided" id="DivContentBodyContainerValueSidedFloat">
					<label><?php echo $this->InstanceLanguageText->GetText('USER_ACTIVE').":"; ?></label>
				</div>
				<div class="DivContentBodyContainerValueSided">
					<label class="DivContentBodyContainerValueContent">
						<?php  if($this->InputValueUserActive)
									$this->InputValueUserActive = $this->Config->DefaultServerImage.'Icons/IconInfraToolsVerified.png';
								else $this->InputValueUserActive = $this->Config->DefaultServerImage.'Icons/IconInfraToolsNotVerified.png';
						?>
						<img src="<?php echo $this->InputValueUserActive; ?>" alt="UserActive" width="20" height="20" />
					</label>
				</div>
			</div>
		<?php } ?>
	   <?php if($this->EnableFieldUserConfirmed)
		{?>
			 <!-- USER_CONFIRMED -->
			 <div class="DivContentBodyContainerSided">
				<div class="DivContentBodyContainerLabelSided" id="DivContentBodyContainerValueSidedFloat">
					<label><?php echo $this->InstanceLanguageText->GetText('USER_CONFIRMED').":"; ?></label>
				</div>
				<div class="DivContentBodyContainerValueSided">
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
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('REGISTER_DATE').":"; ?></label>
			</div>
			<div class="DivContentBodyContainerValueSided">
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegisterDate; ?></label>
			</div>
		</div>
	</div>
   	<div class="DivClearFloat"></div>
    <!-- SUBMIT -->
    <?php 
	if($this->GetCurrentPage() == ConfigInfraTools::PAGE_ADMIN_USER || $this->GetCurrentPage() == ConfigInfraTools::PAGE_ACCOUNT)
	{ 
	?>
		<?php
		if($this->CheckInstanceUser() == ConfigInfraTools::SUCCESS)
		{
		?>
			<!-- FORM_USER_VIEW_UPDATE_SUBMIT -->
			<div class="DivContentBodyContainerSubmits">
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_UPDATE_SUBMIT; ?>" 
									 id="<?php echo ConfigInfraTools::FORM_USER_VIEW_UPDATE_SUBMIT; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDATE'); ?>"/>
			<?php 
			if(!isset($this->InstanceInfraToolsUserAdmin))
			{
				?>
				<!-- FORM_USER_VIEW_CHANGE_PASSWORD_SUBMIT -->
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_CHANGE_PASSWORD_SUBMIT; ?>" 
					   id="<?php echo ConfigInfraTools::FORM_USER_VIEW_CHANGE_PASSWORD_SUBMIT; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_PASSWORD'); ?>"/>
				<?php
			}
			if(isset($this->InstanceInfraToolsUserAdmin))
				$ret = $this->InstanceInfraToolsUserAdmin->GetTwoStepVerification();
			else $ret = $this->User->GetTwoStepVerification();
			if($ret)
			{
			?>
				<!-- FORM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE -->
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE; ?>" 
					   id="<?php echo ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_TWO_STEP_VERIFICATION_DEACTIVATE'); ?>"
					   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
			<?php
			}
			else
			{
			?>
				<!-- FORM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE -->
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE; ?>" 
					   id="<?php echo ConfigInfraTools::FORM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_TWO_STEP_VERIFICATION_ACTIVATE'); ?>"
					   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
			<?php
			}	
			if(!isset($this->InstanceInfraToolsUserAdmin) && $this->User->CheckSuperUser())
			{
				?>
				<!-- HREF_PAGE_ADMIN -->
				<div class="DivContentBodyContainersBoxLink">
					<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN') ?>" title=''>
						<span> 
							<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_ADMIN_TEXT'); ?>
						</span>
					</a>
				</div>
				<?php
			}
			if(isset($this->InstanceInfraToolsUserAdmin) && $this->User->CheckSuperUser())
			{
				?>
				<!-- FORM_USER_VIEW_CHANGE_USER_TYPE_SUBMIT -->
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_CHANGE_USER_TYPE_SUBMIT; ?>" 
					   id="<?php echo ConfigInfraTools::FORM_USER_VIEW_CHANGE_USER_TYPE_SUBMIT; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_USER_TYPE'); ?>"/>
				<!-- FORM_USER_VIEW_CHANGE_CORPORATION_SUBMIT -->
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_CHANGE_CORPORATION_SUBMIT; ?>" 
					   id="<?php echo ConfigInfraTools::FORM_USER_VIEW_CHANGE_CORPORATION_SUBMIT; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_CORPORATION'); ?>"/>
				<?php if($this->InstanceInfraToolsUserAdmin->GetCorporation() != NULL)
						{
						?>
						<!-- FORM_FIELD_CORPORATION_NAME -->
						<input type="submit" name="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_FIELD_CORPORATION_NAME; ?>"
							   class="DivContentBodySubmitBigger"
							   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_ASSOC_USER_CORPORATION'); ?>"/>
						<?php 
						} 
						?>
				<!-- FORM_USER_VIEW_RESET_PASSWORD_SUBMIT -->
				<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_RESET_PASSWORD_SUBMIT; ?>" 
					   id="<?php echo ConfigInfraTools::FORM_USER_VIEW_RESET_PASSWORD_SUBMIT; ?>"
					   class="DivContentBodySubmitBigger"
					   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_RESET_PASSWORD'); ?>"
					   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
				<?php 
					if($this->InstanceInfraToolsUserAdmin->GetUserActive())
					{
						?>
						<!-- FORM_USER_VIEW_DEACTIVATE_SUBMIT -->
						<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_DEACTIVATE_SUBMIT; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_USER_VIEW_DEACTIVATE_SUBMIT; ?>"
							   class="DivContentBodySubmitBigger"
							   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_ACCOUNT_DEACTIVATE'); ?>"
							   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
						<?php
					}
					else
					{
						?>
						<!-- FORM_USER_VIEW_ACTIVATE_SUBMIT -->
						<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_ACTIVATE_SUBMIT; ?>" 
							   id="<?php echo ConfigInfraTools::FORM_USER_VIEW_ACTIVATE_SUBMIT; ?>"
							   class="DivContentBodySubmitBigger"
							   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_ACCOUNT_ACTIVATE'); ?>"
							   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
						<?php
					}
					?>
					<!-- FORM_USER_VIEW_DELETE_SUBMIT -->
					<input type="submit" name="<?php echo ConfigInfraTools::FORM_USER_VIEW_DELETE_SUBMIT; ?>" 
						   id="<?php echo ConfigInfraTools::FORM_USER_VIEW_DELETE_SUBMIT; ?>"
						   class="DivContentBodySubmitBigger"
						   value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DELETE'); ?>"
						   onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
					<?php
				}
				?>
			</div>
		<?php
		}
		else { if(!isset($this->InstanceInfraToolsUserAdmin)) $this->LoadNotConfirmedToolTip();}
		?>
	<?php
	}
	?>
</form>