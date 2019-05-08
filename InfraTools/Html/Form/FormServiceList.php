<!-- BODY SERVICE LIST -->
<div class="DivTableGenericHeader">
	<div class="DivTableGenericHeaderRowCount">
		<?php 
		     if(isset($this->InputValueLimit1) && isset($this->InputValueLimit2)) 
			 {
				 if($this->InputValueLimit1 != "" || $this->InputValueLimit2 != "") 
					  echo "<label class='InputValueLimitTitle'>" . 
					           $this->InstanceLanguageText->GetText('TB_PAGE_PREFIX') . 
					       "</label>" .
						   "<label class='InputValueLimitValue'>" . 
					           $this->InputValueLimit1 . " " . $this->InstanceLanguageText->GetText('TB_PAGE') 
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
if(!empty($this->ArrayInstanceInfraToolsService))
{
	echo "<form  name='" . ConfigInfraTools::FM_SERVICE_LST . "' method='" . $this->InputValueFormMethod . "' />";
	echo "<input type='hidden' value='$this->InputLimitOne' 
				 name='" . ConfigInfraTools::FM_LST_INPUT_LIMIT_ONE . "'/>";
	echo "<input type='hidden' value='$this->InputLimitTwo'
				 name='" . ConfigInfraTools::FM_LST_INPUT_LIMIT_TWO . "'/>";
	echo "<table class='TableGeneric'>";
	echo "<tr>";
	echo "<th class='TableGenericThArrow'>" .
		 "<div class='TableGenericInputLeft'>
		  <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FM_SERVICE_LST_BACK . "' 
				  id='"    . ConfigInfraTools::FM_SERVICE_LST_BACK . "'
				  value='" . ConfigInfraTools::FM_SERVICE_LST_BACK . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_BACK') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowBack28x28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28x28Hover.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowBack28x28.png'\" /></div>" .
		 "<div class='TableGenericThRight'>" . $this->InstanceLanguageText->GetText('FIELD_SERVICE_ID') . "</div></th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_SERVICE_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_SERVICE_TYPE') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_CORPORATION_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_DEPARTMENT_NAME') . "</th>";
	echo "<th  class='TableGenericThDiv'>"   . $this->InstanceLanguageText->GetText('FIELD_SERVICE_ACTIVE') . "</th>";
	echo "<th  class= 'TableGenericThArrow'> 
	      <div  class='TableGenericThLeft'>" . $this->InstanceLanguageText->GetText('REGISTER_DATE') . "</div>" .
		 "<div class='TableGenericInputRight'>
		          <input  type='image'
				  class='TableGenericThArrowImage'
				  name='"  . ConfigInfraTools::FM_SERVICE_LST_FORWARD . "' 
				  id='"    . ConfigInfraTools::FM_SERVICE_LST_FORWARD . "'
				  value='" . ConfigInfraTools::FM_SERVICE_LST_FORWARD . "'
				  title='" . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
				  alt='"   . $this->InstanceLanguageText->GetText('SUBMIT_FORWARD') . "'
				  src='"   . $this->Config->DefaultServerImage 
						   . "Icons/IconInfraToolsArrowForward28x28.png'
				  onmouseover=\"this.src='" . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowForward28x28Hover.png'\"
				  onmouseout=\"this.src='"  . $this->Config->DefaultServerImage
						   . "Icons/IconInfraToolsArrowForward28x28.png'\" /></div>";
	echo "</th>";
	echo "</tr>";
	echo "</form>";
	foreach($this->ArrayInstanceInfraToolsService as $key=>$infraToolsService)
	{
		echo "<tr>";
		echo "<td class='TableGenericTdLink'>
			  	<form  name='" . ConfigInfraTools::FM_SERVICE_SEL_SB . "' method='" . $this->InputValueFormMethod . "' />
					<input type='hidden' name='" . ConfigInfraTools::FM_SERVICE_SEL_SB . "' 
			  					   id='"   . ConfigInfraTools::FM_SERVICE_SEL_SB . "' 
								   value='" . $ConfigInfraTools::FM_SERVICE_SEL_SB . "' />
					<input type='submit' name='" . ConfigInfraTools::FIELD_SERVICE_ID . "' 
									   id='"   . ConfigInfraTools::FIELD_SERVICE_ID . "' 
									   value='" . $infraToolsService->GetServiceId() . "' 
									   title='" . $infraToolsService->GetServiceId() . "' />
			  	</form>
		      </td>";
		echo "<td class='TableGenericTdLink'>
			  	<form  name='" . ConfigInfraTools::FM_SERVICE_SEL_SB . "' method='" . $this->InputValueFormMethod . "' />
					<input type='hidden' name='" . ConfigInfraTools::FM_SERVICE_SEL_SB . "' 
			  					   id='"   . ConfigInfraTools::FM_SERVICE_SEL_SB . "' 
								   value='" . ConfigInfraTools::FM_SERVICE_SEL_SB . "' />
			    	<input type='hidden' name='" . ConfigInfraTools::FIELD_SERVICE_ID . "' 
			  					   id='"   . ConfigInfraTools::FIELD_SERVICE_ID . "' 
								   value='" . $infraToolsService->GetServiceId() . "' />
								   
		      		<input type='submit' name='" . ConfigInfraTools::FIELD_SERVICE_NAME . "' 
		                           id='"   . ConfigInfraTools::FIELD_SERVICE_NAME . "' 
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
			                                     . 'Icons/IconNotVerified.png' . "'/></td>";
		if($infraToolsService->GetServiceDepartment())
			echo "<td class='TableGenericTdLink'>"   . 
			 	     "<p class='TableTdParagraph'>" .  $infraToolsService->GetServiceDepartmentName()  . "</p></td>";
		else echo "<td class='TableGenericTdLink'>"   . 
			         "<img class='TableGenericTdLinkImage' src='" . $this->Config->DefaultServerImage 
			                                     . 'Icons/IconNotVerified.png' . "'/></td>";
		echo "<td class='TableGenericTdLink'>"   . 
			"<img class='TableGenericTdLinkImage' src='" . $infraToolsService->GetServiceActiveIcon() . "'/>"  . "</td>";
		echo "<td class= 'TableGenericTdLink'>" . $infraToolsService->GetRegisterDate() . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else
{
	echo "<div class='DivContentBodyServiceSubTitle'><h2>" . 
		$this->InstanceLanguageText->GetText('SERVICE_NOT_FOUND_FOR_USER') . "</h2></div>";
}
?>