<!-- BODY PAGE ADMIN -->
<div class="DivBody">
    <div class="DivContentBody">
    	<div class="DivContentBodySecondTitle">
			<img src="<?php echo $this->Config->DefaultServerImage. 'Icons/IconInfraToolsAdmin100x100.png'; ?>" 
				 alt="IconInfraToolsSearch" class="DivContentBodySecondTitleImage" width="100" height="100"/>
		</div>
		<div class="DivContentBodySecondTitleLine"></div>
		<div class="DivContentBodyContainers">
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_COUNTRY'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_COUNTRY') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsWorld48x48.png';?>"
						     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsWorld48x48Hover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsWorld48x48.png'; ?>'" 
                             alt="World" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_COUNTRY'); ?>
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_CORPORATION'); ?>"
			   title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_CORPORATION') ?>"> 
				<div class="DivContentBodyContainersBox">                    
					<div class="DivContentBodyContainersBoxIcon">  
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsCorporation.png';?>"
						     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsCorporationHover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsCorporation.png'; ?>'" 
                             alt="Corporation" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_CORPORATION'); ?> 
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_DEPARTMENT'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_DEPARTMENT') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsDepartment.png';?>"
							 onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsDepartmentHover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsDepartment.png'; ?>'" 
                             alt="Department" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_DEPARTMENT'); ?> 
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_USER'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_USER') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">			   
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeUser48x48.png';?>"
						     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTypeUser48x48Hover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTypeUser48x48.png'; ?>'" 
                             alt="Department" />
				</div>
				<div class="DivContentBodyContainersBoxText">
					<i>
						<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_USER'); ?> 
					</i>
				</div>
			</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_USER'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_USER') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
							<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsUser.png';?>" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_USER'); ?> 
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_ASSOC_USER_TEAM'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_ASSOC_USER_TEAM') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeAssocUserTeam.png';?>" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_ASSOC_USER_TEAM'); ?> 
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TEAM'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TEAM') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsTeam.png';?>" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_TEAM'); ?> 
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_TICKET'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_TICKET') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeTicket48x48.png';?>"
						     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTypeTicket48x48Hover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTypeTicket48x48.png'; ?>'" 
                             alt="TypeTicket" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_TICKET'); ?> 
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_STATUS_TICKET'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_STATUS_TICKET') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeStatusTicket48x48.png';?>"
						     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTypeStatusTicket48x48Hover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTypeStatusTicket48x48.png'; ?>'" 
                             alt="TypeStatusTicket" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_STATUS_TICKET'); ?> 
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TICKET'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TICKET') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsTicket48x48.png';?>"
						     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTicket48x48Hover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTicket48x48.png'; ?>'" 
                             alt="Ticket" />	
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_TICKET'); ?> 
						</i>
					</div>
				</div>
			</a>
     	    <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_SERVICE'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TYPE_SERVICE') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsTypeService48x48.png';?>"
						     onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTypeService48x48Hover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTypeService48x48.png'; ?>'" 
                             alt="TypeService" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_TYPE_SERVICE'); ?> 
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_SERVICE'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_SERVICE') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsService48x48.png';?>"
							 onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsService48x48Hover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsService48x48.png'; ?>'" 
                             alt="Services" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_SERVICE'); ?> 
						</i>
					</div>
				</div>
			</a>
			<a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TECH_INFO'); ?>" 
					  title="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN_TECH_INFO') ?>">
				<div class="DivContentBodyContainersBox">
					<div class="DivContentBodyContainersBoxIcon">
						<img src="<?php echo $this->Config->DefaultServerImage.'Icons/IconInfraToolsTechInfo48x48.png';?>"
							 onmouseover="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTechInfo48x48Hover.png'; ?>'"
    			             onmouseout="this.src='<?php echo $this->Config->DefaultServerImage
															.'Icons/IconInfraToolsTechInfo48x48.png'; ?>'" 
                             alt="TechInfo" />
					</div>
					<div class="DivContentBodyContainersBoxText">
						<i>
							<?php echo $this->InstanceLanguageText->GetText('ADMIN_TEXT_TECH_INFO'); ?> 
						</i>
					</div>
				</div>
			</a>
			<div class="DivClearFloat"></div>
		</div>
    </div>
</div>