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