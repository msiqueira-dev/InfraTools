<!-- BODY_PAGE_ADMIN_TECH_INFO -->z
<div class="DivBody">
    <div class="DivContentBody">
    <form name="<?php echo ConfigInfraTools::FORM_TECH_INFO; ?>" 
          id="<?php echo ConfigInfraTools::FORM_TECH_INFO; ?>" method="post">
		<div class="DivContentBodyOptions">
			<div class="DivContentBodyOptionsBox">
				<div class="DivContentBodyContainersBox">
					<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN'); ?>" 
					   title="<?php echo $this->InstanceLanguageText->GetText('PAGE_ADMIN'); ?>">
						<img src="<?php echo $this->Config->DefaultServerImage. 
										   'Icons/IconInfraToolsAdmin48x48.png'; ?>"
							   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdmin48x48Hover.png'; ?>'"
							   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsAdmin48x48.png'; ?>'" />
					</a>
				</div>
				<div class="DivContentBodyContainersBox">
					<input type="image" 
						   name="<?php echo ConfigInfraTools::FORM_SUBMIT_BACK; ?>"
						   value="<?php echo ConfigInfraTools::FORM_SUBMIT_BACK; ?>"
						   title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_BACK'); ?>"
						   alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_BACK'); ?>"
						   src="<?php echo $this->Config->DefaultServerImage. 
										   'Icons/IconInfraToolsArrowBack.png'; ?>"
						   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
														.'Icons/IconInfraToolsArrowBackHover.png'; ?>'"
						   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
														.'Icons/IconInfraToolsArrowBack.png'; ?>'"/>
				</div>
				<div class="DivContentBodyContainersBox">
					<input type="image" 
						   name="<?php echo ConfigInfraTools::FORM_TECH_INFO_LIST; ?>"
						   value="<?php echo ConfigInfraTools::FORM_TECH_INFO_LIST; ?>"
						   title="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
						   alt="<?php echo $this->InstanceLanguageText->GetText('SUBMIT_SELECT'); ?>"
						   src="<?php echo $this->Config->DefaultServerImage. 
										   'Icons/IconInfraToolsList.png'; ?>"
						   onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
														.'Icons/IconInfraToolsListHover.png'; ?>'"
						   onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
														.'Icons/IconInfraToolsList.png'; ?>'"/>
				</div>
			</div>
		</div>
    </form>
    <div class="DivContentBodySection">
    	<div class="DivContentBodySectionTitle">
			<div class="DivContentBodySectionTitleTextLanguage">
				<h2>
					<?php echo $this->InstanceLanguageText->GetText('LANGUAGES') ?>
				</h2>
			</div>
			<div class="DivContentBodySectionTitleLineLanguage">
			</div>
        </div>
		<div class="DivContentBodySummary">
			<div class="DivContentBodySummaryTitleLanguage">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('LANGUAGES_FILES') . ":"; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryValue">
				<label>
					<?php echo $this->InfraToolsLanguageFileCount;
					?>
				</label>
			</div>
		</div>
		<?php
		if(is_array($this->MatrixLanguageConstant))
		{
			echo "<table class='TableTechInfo'>";
			echo "<tr>";
			echo "<th>" . $this->InstanceLanguageText->GetText('LANGUAGES') . "</th>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_LANGUAGE_QUANTITY_CONSTANT') . "</th>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_LANGUAGE_CONSTANTS_PROBLEM') . "</th>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_LANGUAGE_QUANTITY_VALUE') . "</th>";
			echo "</tr>";
			$i=0;
			foreach($this->MatrixLanguageConstant as $key=>$array)
			{
				echo "<tr>";
				echo "<td>" . $array["Language"] . "</td>";
				echo "<td>" . $this->InfraToolsArrayLanguageConstants[$i] . "</td>";
				echo "<td>";
				for($j=0;$j<count($array);$j++)
				{
					if(isset($array[$j]))
						echo $array[$j] . "<br>";
				}
				echo "<td>" . $this->InfraToolsArrayLanguageValueCount[$i] . "</td>";
				$i++;
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		?>
	</div>
    <div class="DivContentBodySection">
    	<div class="DivContentBodySectionTitle">
			<div class="DivContentBodySectionTitleText">
				<h2>
					<?php echo $this->InstanceLanguageText->GetText('TECH_INFO_TITLE_BASE') ?>
				</h2>
			</div>
			<div class="DivContentBodySectionTitleLine">
			</div>
        </div>
		<div class="DivContentBodySummary">
			<div class="DivContentBodySummaryTitle">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('TECH_INFO_DIRECTORY_COUNT') . ":"; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryValue">
				<label>
					<?php echo $this->BaseDirectoryCount; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryTitle">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('TECH_INFO_FILE_COUNT') . ":"; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryValue">
				<label>
					<?php echo $this->BaseFileCount; ?>
				</label>
			</div>
		</div>
		<?php
		if(is_array($this->ArrayBaseFileType))
		{
			echo "<table class='TableTechInfo'>";
			echo "<tr>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_FILE_EXTENSION') . "</th>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_FILE_TYPE') . "</th>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_FILE_VALUE') . "</th>";
			echo "</tr>";
			foreach($this->ArrayBaseFileType as $key=>$ext)
			{
				echo "<tr>";
				echo "<td>." . $ext['Extension'] . "</td>";
				echo "<td>"  . $ext['Type']      . "</td>";
				echo "<td>"  . $ext['Count']     . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		?>
	</div>
    <div class="DivContentBodySection">
    	<div class="DivContentBodySectionTitle">
			<div class="DivContentBodySectionTitleText">
				<h2>
					<?php echo $this->InstanceLanguageText->GetText('TECH_INFO_TITLE_INFRATOOLS') ?>
				</h2>
			</div>
			<div class="DivContentBodySectionTitleLine">
			</div>
        </div>
		<div class="DivContentBodySummary">
			<div class="DivContentBodySummaryTitle">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('TECH_INFO_DIRECTORY_COUNT') . ":"; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryValue">
				<label>
					<?php echo $this->InfraToolsDirectoryCount; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryTitle">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('TECH_INFO_FILE_COUNT') . ":"; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryValue">
				<label>
					<?php echo $this->InfraToolsFileCount; ?>
				</label>
			</div>
		</div>
		<?php
		if(is_array($this->ArrayInfraToolsFileType))
		{
			echo "<table class='TableTechInfo'>";
			echo "<tr>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_FILE_EXTENSION') . "</th>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_FILE_TYPE') . "</th>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_FILE_VALUE') . "</th>";
			echo "</tr>";
			foreach($this->ArrayInfraToolsFileType as $key=>$ext)
			{
				echo "<tr>";
				echo "<td>." . $ext['Extension'] . "</td>";
				echo "<td>"  . $ext['Type']      . "</td>";
				echo "<td>"  . $ext['Count']     . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		?>
		</div>
		<div class="DivContentBodySection">
    	<div class="DivContentBodySectionTitle">
			<div class="DivContentBodySectionTitleText">
				<h2>
					<?php echo $this->InstanceLanguageText->GetText('TECH_INFO_TITLE_TOTAL') ?>
				</h2>
			</div>
			<div class="DivContentBodySectionTitleLine">
			</div>
        </div>
		<div class="DivContentBodySummary">
			<div class="DivContentBodySummaryTitle">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('TECH_INFO_DIRECTORY_COUNT') . ":"; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryValue">
				<label>
					<?php echo $this->TotalDirectoryCount; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryTitle">
				<label>
					<?php echo $this->InstanceLanguageText->GetText('TECH_INFO_FILE_COUNT') . ":"; ?>
				</label>
			</div>
			<div class="DivContentBodySummaryValue">
				<label>
					<?php echo $this->TotalFileCount; ?>
				</label>
			</div>
		</div>
		<?php
		if(is_array($this->ArrayTotalFileType))
		{
			echo "<table class='TableTechInfo'>";
			echo "<tr>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_FILE_EXTENSION') . "</th>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_FILE_TYPE') . "</th>";
			echo "<th>" . $this->InstanceLanguageText->GetText('TECH_INFO_FILE_VALUE') . "</th>";
			echo "</tr>";
			foreach($this->ArrayTotalFileType as $key=>$ext)
			{
				echo "<tr>";
				echo "<td>." . $ext['Extension'] . "</td>";
				echo "<td>"  . $ext['Type']      . "</td>";
				echo "<td>"  . $ext['Count']     . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		?>
		</div>
	</div>
</div>