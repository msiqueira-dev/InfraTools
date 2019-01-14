<!-- BODY SERVICE LIST BY TYPE ASSOC USER SERVICE -->
<!-- TYPE -->
     <div class="DivContentBodyContainer">
        <div class="DivContentBodyContainerLabel">
            <label><?php echo $this->InstanceLanguageText->GetText('SERVICE_TYPE').":"; ?></label>
        </div>
        <div class="DivContentBodyContainerValue">
           	<form name='<?php echo ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE; ?>' 
           	      method="<?php echo $this->InputValueFormMethod ?>" >
				<select 
					name="<?php echo ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE_SUBMIT; ?>" 
					id="<?php echo ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE_SUBMIT; ?>"
					class="SelectTypeAssocUserService"
					onchange="this.form.submit()">
					<option <?php if ($this->InputValueServiceType == "" 
									  || $this->InputValueServiceType == ConfigInfraTools::FORM_FIELD_SELECT_NONE) 
						echo "selected='selected' "; ?> value="<?php echo ConfigInfraTools::FORM_FIELD_SELECT_NONE; ?>" > 
							<?php echo $this->InstanceLanguageText->GetText('FORM_FIELD_SELECT_NONE'); ?> 
					</option>
					<?php 
					if(is_array($this->ArrayInstanceInfraToolsTypeAssocUserService))
					{
						foreach($this->ArrayInstanceInfraToolsTypeAssocUserService as $key=>$infraToolsTypeAssocUserService)
						{
							echo "<option ";
							  if($this->InputValueTypeAssocUserServiceDescription == $infraToolsTypeAssocUserService->GetTypeAssocUserServiceDescription())
							  {
								  echo "selected='selected' ";
							  }
							echo "value='" . $infraToolsTypeAssocUserService->GetTypeAssocUserServiceDescription() . "'>" . 
											 $infraToolsTypeAssocUserService->GetTypeAssocUserServiceDescription()
										   . "</option>";
						}
					}
					?>
				</select>
			</form>
        </div>
     </div>
<?php
if(!empty($this->ArrayInstanceInfraToolsService))
{
	?>
	<div class="DivTableGenericHeader">
		<div class="DivTableGenericHeaderRowCount">
			<?php 
				 if(isset($this->InputValueLimit1) && isset($this->InputValueLimit2)) 
				 {
					 if($this->InputValueLimit1 != "" || $this->InputValueLimit2 != "") 
						  echo "<label class='InputValueLimitTitle'>" . 
								   $this->InstanceLanguageText->GetText('TABLE_PAGE_PREFIX') . 
							   "</label>" .
							   "<label class='InputValueLimitValue'>" . 
								   $this->InputValueLimit1 . " " . $this->InstanceLanguageText->GetText('TABLE_PAGE') 
														   . " " . $this->InputValueLimit2 . 
							   "</label>";
				 }
			?>
		</div>
		<div class="DivTableGenericHeaderRowCount">
			<?php
				 if(isset($this->InputValueRowCount)) 
				  {
					  if($this->InputValueRowCount != "") 
						  echo "<label class='DivTableGenericRowCountLabelTitle'>" . 
								   $this->InstanceLanguageText->GetText('ROW_COUNT') . 
							   "</label>" .
							   "<label class='DivTableGenericRowCountLabelValue'>" . 
								   $this->InputValueRowCount . 
							   "</label>";
				  } 
			?>
		</div>
	</div>
	<?php
	echo "<form  name='" . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE . "' 
	                       method='" . $this->InputValueFormMethod . "' />";
	echo "<input type='hidden' value='$this->InputLimitOne' 
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_ONE . "'/>";
	echo "<input type='hidden' value='$this->InputLimitTwo'
				 name='" . ConfigInfraTools::FORM_LIST_INPUT_LIMIT_TWO . "'/>";
	echo "<table class='TableGeneric'>";
	echo "<tr>";
	echo "<th class='TableGenericThArrow'>" .
		 "<div class='TableGenericInputLeft'>
		  <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_BACK . "' 
				  id='"    . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_BACK . "'
				  value='" . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBackHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_ID') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>" . $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>" . $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_TYPE') . "</th>";
	echo "<th  class='TableGenericThDiv'>" . $this->InstanceLanguageText->GetText('FORM_FIELD_CORPORATION_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>" . $this->InstanceLanguageText->GetText('FORM_FIELD_DEPARTMENT_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>" . $this->InstanceLanguageText->GetText('FORM_FIELD_SERVICE_ACTIVE') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
	      <div  class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		          <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_FORWARD . "' 
				  id='"    . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_FORWARD . "'
				  value='" . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_FORWARD . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowForward28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowForwardHover28.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowForward28.png'\" /></div>";
	echo "</th>";
	echo "</tr>";
	echo "</form>";
	foreach($this->ArrayInstanceInfraToolsService as $key=>$infraToolsService)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
			  	<form  name='" . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID . "' method='post' />
					<input type='submit' name='" . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT . "' 
									   id='"   . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT . "' 
									   value='" . $infraToolsService->GetServiceId() . "' 
									   title='" . $infraToolsService->GetServiceId() . "' />
			  	</form>
		      </td>";
		echo "<td class='TableGenericTdLink'>
			  	<form  name='" . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_NAME_AND_ID . "' method='post' />
			    	<input type='hidden' name='" . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT . "' 
			  					   id='"   . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT . "' 
								   value='" . $infraToolsService->GetServiceId() . "' />
								   
		      		<input type='submit' name='" . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_NAME_AND_ID_SUBMIT . "' 
		                           id='"   . ConfigInfraTools::FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_NAME_AND_ID_SUBMIT . "' 
							       value='" . $infraToolsService->GetServiceName() . "' 
								   title='" . $infraToolsService->GetServiceName() . "' />
				</form>
		      </td>";
		echo "<td class='TableGenericTdLink'>"   . 
			 $infraToolsService->GetServiceTypeName()  . "</td>";
		if($infraToolsService->GetServiceCorporation())
			echo "<td class='TableGenericTdLink'>"   . 
			 	     "<p class='TableTdParagraph'>" .  $infraToolsService->GetServiceCorporationName()  . "</p></td>";
		else echo "<td class='TableGenericTdLink'>"   . 
			         "<img class='TableGenericTdLinkImage' src='" . $this->Config->DefaultServerImage 
			                                     . 'Icons/IconInfraToolsNotVerified.png' . "'/></td>";
		if($infraToolsService->GetServiceDepartment())
			echo "<td class='TableGenericTdLink'>"   . 
			 	     "<p class='TableTdParagraph'>" .  $infraToolsService->GetServiceDepartmentName()  . "</p></td>";
		else echo "<td class='TableGenericTdLink'>"   . 
			         "<img class='TableGenericTdLinkImage' src='" . $this->Config->DefaultServerImage 
			                                     . 'Icons/IconInfraToolsNotVerified.png' . "'/></td>";
		echo "<td class='TableGenericTdLink'>"   . 
			"<img class='TableGenericTdLinkImage' src='" . $infraToolsService->GetServiceActiveIcon() . "'/>"  . "</td>";
		echo "<td class= 'TableGenericTdLink'>" . $infraToolsService->GetRegisterDate() . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else
{
	if(is_array($this->ArrayInstanceInfraToolsTypeAssocUserService) && (count($this->ArrayInstanceInfraToolsTypeAssocUserService)>0))
		echo "<div class='DivContentBodyServiceSubTitle'><h2>" . 
			$this->InstanceLanguageText->GetText('SERVICE_NOT_FOUND_FOR_USER_BY_TYPE_ASSOC_USER_SERVICE') . "</h2></div>";
	else echo "<div class='DivContentBodyServiceSubTitle'><h2>" . 
			$this->InstanceLanguageText->GetText('SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE') . "</h2></div>";
}
?>