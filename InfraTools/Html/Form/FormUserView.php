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
<div class="DivContentBodySided">
	<!-- FIELD_USER_NAME -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_NAME').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserName; ?></label>
		</div>
	</div>
	<!-- FIELD_USER_EMAIL -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_EMAIL').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided" id="BodyUserViewEmailDiv">
			<label id="BodyUserViewEmailLabel" class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserEmail; ?></label>
		</div>
	</div>
	<!-- FIELD_USER_UNIQUE_ID -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_UNIQUE_ID').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<div>
				<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserUniqueId; ?></label>
			</div>
			<div class="DivContentBodyContainerSubmitImage">
				<img   src="<?php echo $this->InputValueUserUniqueIdActive; ?>" 
					   name="<?php echo ConfigInfraTools::FM_ACCOUNT_VERIFIED_USER_UNIQUE_ID_SB; ?>"
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
	<!-- FIELD_USER_GENDER -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_GENDER').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueGender; ?></label>
		</div>
	</div>
	<!-- FIELD_COUNTRY_NAME -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_COUNTRY_NAME').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueCountry; ?></label>
		</div>
	</div>
	<!-- FIELD_USER_REGION -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_REGION').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueRegion; ?></label>
		</div>
	</div>
	<!-- FIELD_USER_PHONE_PRIMARY -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_PHONE_PRIMARY').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
			<label class="DivContentBodyContainerValueContent">
				 <?php echo "(". $this->InputValueUserPhonePrimaryPrefix .")&nbsp" ?>
			</label>
			<label class="DivContentBodyContainerValueContent"><?php echo $this->InputValueUserPhonePrimary; ?></label>
		</div>
	</div>
	<!-- FIELD_USER_PHONE_SECONDARY -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_PHONE_SECONDARY').":"; ?></label>
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
	<!-- FIELD_CORPORATION_NAME -->
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
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
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
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
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
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
	<div class="DivContentBodyContainerSided">
		<div class="DivContentBodyContainerLabelSided">
			<label><?php echo $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME').":"; ?></label>
		</div>
		<div class="DivContentBodyContainerValueSided">
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
		<!-- FIELD_TYPE_USER_DESCRIPTION -->
		<div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_TYPE_USER_DESCRIPTION').":"; ?></label>
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
		 <!-- FIELD_USER_SESSION_EXPIRES -->
		 <div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided" id="DivContentBodyContainerValueSidedFloat">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_SESSION_EXPIRES').":"; ?></label>
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
		 <!-- FIELD_USER_TWO_STEP_VERIFICATION -->
		 <div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_TWO_STEP_VERIFICATION').":"; ?></label>
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
		 <!-- FIELD_USER_ACTIVE -->
		 <div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided" id="DivContentBodyContainerValueSidedFloat">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_ACTIVE').":"; ?></label>
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
		 <!-- FIELD_USER_CONFIRMED -->
		 <div class="DivContentBodyContainerSided">
			<div class="DivContentBodyContainerLabelSided" id="DivContentBodyContainerValueSidedFloat">
				<label><?php echo $this->InstanceLanguageText->GetText('FIELD_USER_CONFIRMED').":"; ?></label>
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
<div class="DivContentBodyContainer">
	<?php 
	if($this->GetCurrentPage() == ConfigInfraTools::PAGE_ADMIN_USER || $this->GetCurrentPage() == ConfigInfraTools::PAGE_ACCOUNT)
	{ 
	?>
		<?php
		if($this->CheckInstanceUser() == ConfigInfraTools::RET_OK)
		{
		?>
			<!-- FM_USER_VIEW_UPDT -->
			<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_UPDT; ?>" 
				  id="<?php echo ConfigInfraTools::FM_USER_VIEW_UPDT; ?>" 
				  class="DivFormHorizontalButtons"
				  method="post" >
				<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_UPDT_SB; ?>" 
									 id="<?php echo ConfigInfraTools::FM_USER_VIEW_UPDT_SB; ?>"
									 class="DivContentBodySubmitBigger"
									 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_UPDT'); ?>"/>
			</form>
			<?php 
			if(!isset($this->InstanceInfraToolsUserAdmin))
			{
				?>
				<!-- FM_USER_VIEW_CHANGE_PASSWORD -->
				<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_PASSWORD; ?>" 
					  id="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_PASSWORD; ?>" 
					  class="DivFormHorizontalButtons"
					  method="post" >
					<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_PASSWORD_SB; ?>" 
										 id="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_PASSWORD_SB; ?>"
										 class="DivContentBodySubmitBigger"
										 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_PASSWORD'); ?>"/>
				</form>
				<?php
			}
			if(isset($this->InstanceInfraToolsUserAdmin))
				$ret = $this->InstanceInfraToolsUserAdmin->GetTwoStepVerification();
			else $ret = $this->User->GetTwoStepVerification();
			if($ret)
			{
			?>
				<!-- FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE -->
				<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE; ?>" 
					  id="<?php echo ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE; ?>" 
					  class="DivFormHorizontalButtons"
					  method="post" >
					<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SB; ?>" 
										 id="<?php echo ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_DEACTIVATE_SB; ?>"
										 class="DivContentBodySubmitBigger"
										 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_TWO_STEP_VERIFICATION_DEACTIVATE'); ?>"
										 onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
				</form>
			<?php
			}
			else
			{
			?>
				<!-- FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE -->
				<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE; ?>" 
					  id="<?php echo ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE; ?>" 
					  class="DivFormHorizontalButtons"
					  method="post" >
					<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SB; ?>" 
										 id="<?php echo ConfigInfraTools::FM_USER_VIEW_TWO_STEP_VERIFICATION_ACTIVATE_SB; ?>"
										 class="DivContentBodySubmitBigger"
										 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_TWO_STEP_VERIFICATION_ACTIVATE'); ?>"
										 onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
				</form>
			<?php
			}	
			if(!isset($this->InstanceInfraToolsUserAdmin) && $this->User->CheckSuperUser())
			{
				?>
				<!-- HREF_PAGE_ADMIN -->
				<form class="DivFormHorizontalButtons">
					<div class="DivContentBodyContainersBoxLink">
						<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN') ?>" title=''>
							<span> 
								<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_ADMIN_TEXT'); ?>
							</span>
						</a>
					</div>
				</form>
				<?php
			}
			if(isset($this->InstanceInfraToolsUserAdmin) && $this->User->CheckSuperUser())
			{
				?>
				<!-- FM_USER_VIEW_CHANGE_USER_TYPE -->
				<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_USER_TYPE; ?>" 
					  id="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_USER_TYPE; ?>" 
					  class="DivFormHorizontalButtons"
					  method="post" >
					<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_USER_TYPE_SB; ?>" 
										 id="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_USER_TYPE_SB; ?>"
										 class="DivContentBodySubmitBigger"
										 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_USER_TYPE'); ?>"/>
				</form>
				<!-- FM_USER_VIEW_CHANGE_CORPORATION_SB -->
				<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_CORPORATION; ?>" 
					  id="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_CORPORATION; ?>" 
					  class="DivFormHorizontalButtons"
					  method="post" >
					<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_CORPORATION_SB; ?>" 
										 id="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_CORPORATION_SB; ?>"
										 class="DivContentBodySubmitBigger"
										 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_CORPORATION'); ?>"/>
				</form>
				<?php if($this->InstanceInfraToolsUserAdmin->GetCorporation() != NULL)
						{
						?>
						<!-- FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION -->
						<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION; ?>" 
							  id="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION; ?>" 
							  class="DivFormHorizontalButtons"
							  method="post" >
							<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION_SB; ?>" 
												 id="<?php echo ConfigInfraTools::FM_USER_VIEW_CHANGE_ASSOC_USER_CORPORATION_SB; ?>"
												 class="DivContentBodySubmitBigger"
												 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CHANGE_ASSOC_USER_CORPORATION'); 
														?>"/>
						</form>
						<?php 
						} 
						?>
						<!-- FM_USER_VIEW_RESET_PASSWORD -->
						<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_RESET_PASSWORD; ?>" 
							  id="<?php echo ConfigInfraTools::FM_USER_VIEW_RESET_PASSWORD; ?>" 
							  class="DivFormHorizontalButtons"
							  method="post" >
							<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_RESET_PASSWORD_SB; ?>" 
												 id="<?php echo ConfigInfraTools::FM_USER_VIEW_RESET_PASSWORD_SB; ?>"
												 class="DivContentBodySubmitBigger"
												 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_RESET_PASSWORD'); ?>"
												 onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
						</form>
				<?php 
					if($this->InstanceInfraToolsUserAdmin->GetUserActive())
					{
						?>
						<!-- FM_USER_VIEW_DEACTIVATE -->
						<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_DEACTIVATE; ?>" 
							  id="<?php echo ConfigInfraTools::FM_USER_VIEW_DEACTIVATE; ?>" 
							  class="DivFormHorizontalButtons"
							  method="post" >
							<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_DEACTIVATE_SB; ?>" 
												 id="<?php echo ConfigInfraTools::FM_USER_VIEW_DEACTIVATE_SB; ?>"
												 class="DivContentBodySubmitBigger"
												 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_ACCOUNT_DEACTIVATE'); ?>"
												 onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
						</form>
						<?php
					}
					else
					{
						?>
						<!-- FM_USER_VIEW_ACTIVATE -->
						<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_ACTIVATE; ?>" 
							  id="<?php echo ConfigInfraTools::FM_USER_VIEW_ACTIVATE; ?>" 
							  class="DivFormHorizontalButtons"
							  method="post" >
							<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_ACTIVATE_SB; ?>" 
												 id="<?php echo ConfigInfraTools::FM_USER_VIEW_ACTIVATE_SB; ?>"
												 class="DivContentBodySubmitBigger"
												 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_ACCOUNT_ACTIVATE'); ?>"
												 onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
						</form>
						<?php
					}
					?>
					<!-- FM_USER_VIEW_DEL -->
						<form name="<?php echo ConfigInfraTools::FM_USER_VIEW_DEL; ?>" 
							  id="<?php echo ConfigInfraTools::FM_USER_VIEW_DEL; ?>" 
							  class="DivFormHorizontalButtons"
							  method="post" >
							<input type="submit" name="<?php echo ConfigInfraTools::FM_USER_VIEW_DEL_SB; ?>" 
												 id="<?php echo ConfigInfraTools::FM_USER_VIEW_DEL_SB; ?>"
												 class="DivContentBodySubmitBigger"
												 value="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_DEL'); ?>"
												 onclick="return confirm('<?php echo $this->InstanceLanguageText->GetText('SUBMIT_CONFIRM');?>');"/>
						</form>
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
</div>