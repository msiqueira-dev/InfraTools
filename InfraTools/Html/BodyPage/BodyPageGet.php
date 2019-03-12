<!-- BODY PAGE GET -->
<div class="DivBody">
    <div class="DivContentBody">
		<script type="text/javascript">
			function SetFunctionUrl(FunctionId)
			{
				var ua = window.navigator.userAgent;
				var msie = ua.indexOf("MSIE ");
				var $ocurrence = document.location.href.search('=Function');
				if(document.location.href.search(FunctionId) == -1)
				{
					if($ocurrence != -1)
						$url = document.location.href.substring(0, $ocurrence-1);
					else $url = document.location.href;
					
					if (msie > 0)
					{
						if(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))) == 7 
						|| parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))) == 8
						|| parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))) == 9)
							document.location.href = $url + "?=" + FunctionId;
						else window.history.pushState("Function", "InfraTools" + FunctionId, $url + "?=" + FunctionId);
					}
					else window.history.pushState("Function", "InfraTools" + FunctionId, $url + "?=" + FunctionId);
				}
			}
        </script>
        <div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-tabs-vertical">
            <ul id="tabsUl" class="ui-tabs-nav ui-widget-header">
     			<!-- GET CALCULATION NETMAST -->
				<?php
					if($this->Config->FunctionGetCalculationNetMaskEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-8');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_CALCULATION_NETMASK . "#tabs8');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-8" class="ui-state-default">
                	<a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_CALCULATION_NETMASK ?>#tabs8" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_CALCULATION_NETMASK_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_CALCULATION_NETMASK_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET DNS RECORDS -->
                <?php
					if($this->Config->FunctionGetDnsRecordsEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-9');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_DNS_RECORDS . "#tabs9');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-9" class="ui-state-default">
                    <a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_DNS_RECORDS ?>#tabs9" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_DNS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_DNS_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET HOSTNAME -->
                <?php
					if($this->Config->FunctionGetHostNameEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-10');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_HOSTNAME . "#tabs10');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-10" class="ui-state-default">
                    <a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_HOSTNAME ?>#tabs10" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_HOSTNAME_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_HOSTNAME_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET IP ADDRESS -->
                <?php
					if($this->Config->FunctionGetIpAddressesEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-11');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_IP_ADDRESSES . "#tabs11');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-11" class="ui-state-default">
                    <a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_IP_ADDRESSES ?>#tabs11" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_IP_ADDRESSES_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_IP_ADDRESSES_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET LOCATION -->
                <?php
					if($this->Config->FunctionGetLocationEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-12');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_LOCATION . "#tabs12');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-12" class="ui-state-default">
                    <a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_LOCATION ?>#tabs12" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_LOCATION_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_LOCATION_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET PROTOCOL -->
                <?php
					if($this->Config->FunctionGetProtocolEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-13');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_PROTOCOL . "#tabs13');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-13" class="ui-state-default">
                    <a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_PROTOCOL ?>#tabs13" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_PROTOCOL_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_PROTOCOL_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET ROUTE -->
                <?php
					if($this->Config->FunctionGetRouteEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-14');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_ROUTE . "#tabs14');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-14" class="ui-state-default">
                    <a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_ROUTE ?>#tabs14" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_ROUTE_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_ROUTE_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET SERVICE -->
                <?php
					if($this->Config->FunctionGetServiceEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-15');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_SERVICE . "#tabs15');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-15" class="ui-state-default">
                    <a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_SERVICE ?>#tabs15" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_SERVICE_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_SERVICE_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET WEB SITE -->
                <?php
					if($this->Config->FunctionGetWebSiteEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-16');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_WEBSITE . "#tabs16');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-16" class="ui-state-default">
                    <a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_WEBSITE ?>#tabs16" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                        <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_TEXT'); ?> 
                        </span>
                    </a>
                </li>
                <!-- GET WHOIS -->
                <?php
					if($this->Config->FunctionGetWhoisEnabled)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-17');
						                  SetFunctionUrl('" . ConfigInfraTools::PAGE_GET_WHOIS . "#tabs17');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-17" class="NoBorder ui-state-default">
                    <a href="PageGet?=<?php echo ConfigInfraTools::PAGE_GET_WHOIS ?>#tabs17" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
			</ul>
			<?php
				if($this->Config->FunctionGetCalculationNetMaskEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_CALCULATION_NETMASK . ".php");
				if($this->Config->FunctionGetDnsRecordsEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_DNS_RECORDS . ".php");
				if($this->Config->FunctionGetHostNameEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_HOSTNAME . ".php");
				if($this->Config->FunctionGetIpAddressesEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_IP_ADDRESSES . ".php");
				if($this->Config->FunctionGetLocationEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_LOCATION . ".php");
				if($this->Config->FunctionGetProtocolEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_PROTOCOL . ".php");
				if($this->Config->FunctionGetRouteEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_ROUTE . ".php");
				if($this->Config->FunctionGetServiceEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_SERVICE . ".php");
				if($this->Config->FunctionGetWebSiteEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_WEBSITE . ".php");
				if($this->Config->FunctionGetWhoisEnabled)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::PAGE_GET_WHOIS . ".php");
            ?>
            <div class="DivClearFloat"></div>
    	</div>
	</div>
</div>