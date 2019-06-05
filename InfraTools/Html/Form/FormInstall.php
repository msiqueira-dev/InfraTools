<form name="{$FM_INSTALL}" id="{$FM_INSTALL}" method="{$FORM_METHOD}" enctype="multipart/form-data">
<!-- SUBMIT -->
	<div class="DivContentBodyContainer">
		{if $BUTTON_INSTALL_ENABLED eq TRUE}
			<input type="submit" name="{FM_INSTALL_NEW_SB}" id="{$FM_INSTALL_NEW_SB}"
				   class="DivContentBodySubmitBigger" value="{$SUBMIT_INSTALL_NEW}" />
		{/if}
		{if $BUTTON_IMPORT_ENABLED eq TRUE}
			<input type="submit" name="{$FM_INSTALL_IMPORT_SB_HIDDEN}" id="{$FM_INSTALL_IMPORT_SB_HIDDEN}"
			       class="DivHidden" />
			<input type="file" name="{$FM_INSTALL_IMPORT_SB}" id="{$FM_INSTALL_IMPORT_SB}"
							   class="DivContentBodySubmitBigger" value="{$SUBMIT_INSTALL_IMPORT}"
							   onchange="document.getElementById('{$FM_INSTALL_IMPORT_SB_HIDDEN}').click();"
							   accept=".sql"/>
					<label for="file" onclick="document.getElementById('{$FM_INSTALL_IMPORT_SB}').click();">
						{$SUBMIT_INSTALL_IMPORT}
					</label>
		{/if}
		{if $FM_INSTALL_REINSTALL_SB eq TRUE}
			<input type="submit" name="{$FM_INSTALL_REINSTALL_SB}" id="{$FM_INSTALL_REINSTALL_SB}"
			       class="DivContentBodySubmitBigger" value="{$SUBMIT_INSTALL_REINSTALL}"
				   onclick="return confirm('{$SUBMIT_CONFIRM}');"/>
		{/if}
		{if $BUTTON_EXPORT_ENABLED eq TRUE}
			<input type="submit" name="{$FM_INSTALL_EXPORT_SB}" id="{$FM_INSTALL_EXPORT_SB}"
				   class="DivContentBodySubmitBigger" value="{$SUBMIT_INSTALL_EXPORT'}" />
		{/if}
	</div>
</form>
<div id="{$DIV_RETURN}" class="{$RETURN_CLASS}">
	<div>
		<div>
			{$RETURN_IMAGE}
		</div>
	</div>
	<label>
		{$RETURN_EMPTY_TEXT}
		{$RETURN_TEXT}
		{$DATABASE_RETURN_MESSAGE}
		<?php if(isset($this->DataBaseReturnMessage))      echo $this->DataBaseReturnMessage ?>
		<?php if(isset($this->DataBaseImportErrorQueries))
			  {
				  if(is_array($this->DataBaseImportErrorQueries))
				  {
					  foreach($this->DataBaseImportErrorQueries as $key => $errorQuery)
						  echo $errorQuery . "<br>";
				  }
			  }
		?>	
	</label>
</div>