<?php
	if(!isset($ConfigInfraTools))
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
	if(!isset($FacedeBusinessInfraTools))
		$FacedeBusinessInfraTools =$this->Factory->CreateInfraToolsFacedeBusiness($this->InstanceLanguageText);
	$FacedeBusinessInfraTools->GetIpAddressClient(false, $returnMessageIp);
	$FacedeBusinessInfraTools->GetBrowserClient(false, $returnMessageBrowser);
	$FacedeBusinessInfraTools->GetOperationalSystem(false, $returnMessageOperationalSystem);
?>
<div class="DivHeader">
	<form name="<?php echo ConfigInfraTools::FORM_HEADER_PAGES; ?>"
  	      id="<?php echo ConfigInfraTools::FORM_HEADER_PAGES; ?>" method="post" class="DivHeader">
    	<div class="DivHidden">
        	<input type="hidden" name="HiddenTextForm" id="HiddenTextForm" class="DivHeader"/>
		</div>
        <div class="DivHeaderContainer">
            <div class="DivHeaderContainerLogo">
            	<!-- PÁGINA HOME -->
                <a href='<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_HOME') ?>' id='PageHome' 
                   title='<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_HOME_TITLE') ?>'>
                    <img src="<?php echo $this->Config->DefaultServerImage 
					. 'Logos/LogoInfraTools-2.png'; ?>"
                    alt="<?php echo $this->InstanceLanguageText->GetText('HEADER_PAGE_HOME_IMAGE_ALT') ?>" width='300' height='55' />
                </a>
            </div>
            <div class="DivHeaderContainerMenu">
              <!-- PAGE SERVICE -->
                <?php
				if($ConfigInfraTools->PageServiceEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . str_replace("_", "",  ConfigInfraTools::PAGE_SERVICE) . ".php");
				?>
               <!-- PAGE DIAGNOSTIC TOOLS -->
                <?php
				if($ConfigInfraTools->PageDiagnosticToolsEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . str_replace("_", "",  ConfigInfraTools::PAGE_DIAGNOSTIC_TOOLS) . ".php");
				?>
                <!-- PAGE ABOUT -->
                <?php
				if($ConfigInfraTools->PageAboutEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . str_replace("_", "",  ConfigInfraTools::PAGE_ABOUT) . ".php");
				?>
                <!-- PAGE CONTACT -->
                <?php
				if($ConfigInfraTools->PageContactEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . str_replace("_", "",  ConfigInfraTools::PAGE_CONTACT). ".php");
				?>
            </div>
        </div>
    </form>
</div>
<div class="DivHeaderDivision">
	<div class="DivHeaderDivisionContainer">
    	<div class="DivHeaderDivisionContainerInfos">
            <?php
				if($ConfigInfraTools->LanguagePortugueseEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . "ChangeLayout" . ".php"); 
			?>
			<div class="DivHeaderDivisionContainerLoginSeparator">
            	<label> | </label>
            </div>
			<?php
				if(isset($this->User))
				{
					if($this->User->CheckSuperUser())
					{
						if($ConfigInfraTools->LanguagePortugueseEnabled == true)
						{
							include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . "Debug" . ".php"); 
							?>
							<div class="DivHeaderDivisionContainerLoginSeparator">
								<label> | </label>
							</div>
							<?php
						}
					}
				}
			?>
            <!--
            <div class="DivHeaderDivisionContainerInfo">
                <label>
                    <?php //echo $returnMessageIp; ?>
                </label>
            </div>
            -->
            <div class="DivHeaderDivisionContainerInfo">
                <label>
                    <?php echo $returnMessageBrowser; ?>
                </label>
            </div>
            <!--
            <div class="DivHeaderDivisionContainerLoginSeparator">
            	<label> | </label>
            </div>
            
            <div class="DivHeaderDivisionContainerInfo">
                <label>
                    <?php //echo $returnMessageOperationalSystem; ?>
                </label>
            </div>
            -->
        </div>
    	<div class="DivHeaderDivisionContainerLanguage">
        	<form name="<?php echo ConfigInfraTools::FORM_HEADER_LANGUAGE; ?>" 
                  id="<?php echo ConfigInfraTools::FORM_HEADER_LANGUAGE; ?>" action="#" method="post">
                <!-- Language Portuguese -->
                <?php
                    if($ConfigInfraTools->LanguagePortugueseEnabled == true)
                        include_once(REL_PATH . ConfigInfraTools::PATH_HEADER .  "LanguagePt.php");
                ?>
                <!-- Language Spanish -->
                <?php
                    if($ConfigInfraTools->LanguageSpanishEnabled == true)
                        include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . "LanguageEs.php");
                ?>
                <!-- Language English -->
                <?php
                    if($ConfigInfraTools->LanguageEnglishEnabled == true)
                        include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . "LanguageEn.php");
                ?>
                <!-- Language German -->
                <?php
                    if($ConfigInfraTools->LanguageGermanEnabled == true)
                        include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . "LanguageDe.php");
                ?>
            </form>
    	</div>
        <!-- LOGIN AREA -->
        <div class="DivHeaderDivisionContainerLogin">
        	<div class="DivHeaderDivisionContainerLoginElements">
            	<?php
					if($this->CheckInstanceUser() != ConfigInfraTools::USER_NOT_LOGGED_IN && 
					   $this->CheckInstanceUser() != ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
					{
						if( $this->User->CheckSuperUser())
            			{
							?>
                                <div class="DivHeaderDivisionContainerLoginElement">
                                    <a href="<?php echo $this->InstanceLanguageText->GetText('HREF_PAGE_ADMIN') ?>" title=''>
                                        <h2> 
                                            <?php echo ucfirst (mb_strtolower(
								                                $this->InstanceLanguageText->GetText('HEADER_PAGE_ADMIN_TEXT'),'UTF-8')); ?>
                                        </h2>
                                     </a>
                                 </div>
                                 <div class='DivHeaderDivisionContainerLoginSeparator'> <label> | </label> </div>
                 			<?php
					
						}
						
						if($ConfigInfraTools->PageTeamEnabled == true)
						{
							include_once(REL_PATH . ConfigInfraTools::PATH_HEADER
										          . str_replace("_","",ConfigInfraTools::PAGE_TEAM) . ".php");
							echo "<div class='DivHeaderDivisionContainerLoginSeparator'> <label> | </label> </div>";
						}
						if($ConfigInfraTools->PageAccountEnabled == true)
						{
							include_once(REL_PATH . ConfigInfraTools::PATH_HEADER
										          . str_replace("_","",ConfigInfraTools::PAGE_ACCOUNT) . ".php");
						}
						echo "<div class='DivHeaderDivisionContainerLoginSeparator'> <label> | </label> </div>"; 
						include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . "Logout.php");
					}
					else
					{
						if($ConfigInfraTools->PageLoginEnabled == true)
							include_once(REL_PATH . ConfigInfraTools::PATH_HEADER 
										          . str_replace("_", "",  ConfigInfraTools::PAGE_LOGIN) . ".php");
						if($ConfigInfraTools->PageLoginEnabled == true 
						   && $ConfigInfraTools->PageRegisterEnabled == true)
						   	echo "<div class='DivHeaderDivisionContainerLoginSeparator'> <label> | </label> </div>";
						if($ConfigInfraTools->PageRegisterEnabled == true)
							include_once(REL_PATH . ConfigInfraTools::PATH_HEADER 
										          . str_replace("_", "",  ConfigInfraTools::PAGE_REGISTER) . ".php");
					}
				?>
        	</div>
        </div>
    </div>
</div>
<div class="DivClearFloat"></div>
<div class="DivHeaderPageTitle">
    <div class="DivHeaderPageTitleContent">
        <div class="DivHeaderPageTitleContentText">
            <h1>
                <?php
					echo $this->InstanceLanguageText->GetPageName($this->GetCurrentPage());
                ?>
            </h1>
        </div>
        <div class="DivHeaderPageTitleContentLine">
        </div>
  	</div>
</div>