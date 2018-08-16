<?php
	if(!isset($ConfigInfraTools))
		$ConfigInfraTools = $this->Factory->CreateConfigInfraTools();
?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="Google" content="notranslate" />
<meta name="Google-site-verification" content="" />
<meta name="Author" content="Dual-Developers" />
<meta name="Reply-To" content="" />
<meta name="Keywords" content="Infrastructure, Networks, Technology, WebTools" />
<meta name="Copyright" content="2014 - InfraTools - Dual-Developers" />
<meta name="Description" content="InfraTools: <?php echo $this->InstanceLanguageText->GetPageName($this->Page); ?>" />
<meta name="Company" content="Dual-Developers" />
<meta name="Url" content="https://dual-developers.com" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="Distribution" content="global" />
<meta name="geo.position" content="latitude; longitude" /> 
<meta name="geo.region" content="BR-RJ" />
<meta name="geo.placename" content="Rio de Janeiro" />

<meta property="og:url"          content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
<meta property="og:type"         content="website" />
<meta property="og:title"        content="<?php echo $this->InstanceLanguageText->GetPageTitle($this->Page); ?>" />
<meta property="og:description"  content="<?php echo $this->InstanceLanguageText->GetPageName($this->Page); ?>" />
<meta property="og:image"        content="<?php echo $this->Config->DefaultServerImage 
                                         . 'Logos/LogoTypeInfraToolsBlack.png'; ?>" />
<meta property="fb:app_id" content="503426086535044" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@Dual-Developers" />
<meta name="twitter:creator" content="@Dual-Developers" />
<meta name="twitter:title" content="<?php echo $this->InstanceLanguageText->GetPageTitle($this->Page); ?>" />
<meta name="twitter:description" content="<?php echo $this->InstanceLanguageText->GetPageName($this->Page); ?>" />
<meta name="twitter:domain" content="https://dual-developers.com" />
<meta name="twitter:image" content="" />
<meta name="Robots" content="<?php echo $this->InstanceLanguageText->GetPageRobots($this->Page);  ?>" />
<meta name="DC.Title" content="<?php echo $this->InstanceLanguageText->GetPageTitle($this->Page); ?>" />
<meta name="DC.Source" content="https://dual-developers.com" />
<meta name="DC.Creator" content="Dual-Developers" />
<meta name="DC.Keywords" content="Infrastructure, Networks, Technology, WebTools" />
<meta name="DC.Subject" content="InfraTools - Infrastructure Web Tool" />
<meta name="DC.Description" content="<?php echo $this->InstanceLanguageText->GetPageName($this->Page); ?>" />
<title> <?php echo $this->InstanceLanguageText->GetPageTitle($this->Page); ?></title>
<link href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" rel="canonical" />
<link href="<?php echo $this->Config->DefaultServerImage. 'Icons/FavIconInfraTools.ico'; ?>" rel="icon" type="image/x-icon"/>
<?php
if($this->Device == Page::DEVICE_TABLET) 
{
	echo '<style>';
	include_once(REL_PATH . "Style/Desktop/Generic/Generic.css"); 
	echo '</style>';
	echo '<style>'; 
	include_once(REL_PATH . "Style/Desktop/Header/Header.css"); 
	echo '</style>';
	echo '<style>'; 
	include_once(REL_PATH . "Style/Desktop/Footer/Footer.css"); 
	echo '</style>';
}
elseif ($this->Device == Page::DEVICE_MOBILE)
{
	$this->LinkTarget = "target='_self'";
	echo '<style>';
	include_once(REL_PATH . "Style/Mobile/Generic/MobileGeneric.css"); 
	echo '</style>';
	echo '<style>'; 
	include_once(REL_PATH . "Style/Mobile/Header/MobileHeader.css"); 
	echo '</style>';
	echo '<style>'; 
	include_once(REL_PATH . "Style/Mobile/Footer/MobileFooter.css"); 
	echo '</style>';
}
else 
{
	echo '<style>';
	include_once(REL_PATH . "Style/Desktop/Generic/Generic.css"); 
	echo '</style>';
	echo '<style>'; 
	include_once(REL_PATH . "Style/Desktop/Header/Header.css"); 
	echo '</style>';
	echo '<style>'; 
	include_once(REL_PATH . "Style/Desktop/Footer/Footer.css"); 
	echo '</style>';
}
if($this->CheckInstanceUser() != ConfigInfraTools::SUCCESS)
{
	if($this->CheckPageRequiresLogin() == ConfigInfraTools::SUCCESS)
	{
		if(!($this->Page == ConfigInfraTools::PAGE_ACCOUNT && $this->CheckInstanceUser() == ConfigInfraTools::USER_NOT_CONFIRMED))
		{
			echo'<style>';
			if($this->Device == Page::DEVICE_MOBILE)
			{
				if(file_exists(REL_PATH . "Style/Mobile/Body/Mobile" . str_replace("Page_", "", ConfigInfraTools::PAGE_LOGIN) 
							   . ".css"))
					include_once(REL_PATH . "Style/Mobile/Body/Mobile" . str_replace("Page_", "", ConfigInfraTools::PAGE_LOGIN) 
								 . ".css");
			}
			else 
			{ 
				if(file_exists(REL_PATH . "Style/Desktop/Body/" . str_replace("Page_", "", ConfigInfraTools::PAGE_LOGIN) . ".css"))
						include_once(REL_PATH . "Style/Desktop/Body/" . str_replace("Page_", "", ConfigInfraTools::PAGE_LOGIN) 
									 . ".css");
			}
			echo '</style>';
		}
	}	
}
?>