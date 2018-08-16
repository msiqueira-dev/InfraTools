<!-- BODY PAGE DIAGNOSTIC TOOLS -->
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
            	<!-- CHECK AVAILABILITY -->
            	<?php
					if($ConfigInfraTools->FunctionCheckAvailabilityEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-1');
						                  SetFunctionUrl('" . ConfigInfraTools::CHECK_AVAILABILITY . "#tabs1');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-1" class="ui-state-default <?php echo $functionClass; ?>">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::CHECK_AVAILABILITY; ?>#tabs1" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- CHECK BLACKLIST -->
                <?php
					if($ConfigInfraTools->FunctionCheckBlacklistEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-2');
						                  SetFunctionUrl('" . ConfigInfraTools::CHECK_BLACKLIST . "#tabs2');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-2" class="ui-state-default <?php echo $functionClass; ?>">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::CHECK_BLACKLIST ?>#tabs2" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>" 
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- CHECK PING -->
                <?php
					if($ConfigInfraTools->FunctionCheckDnsRecordEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-3');
										  SetFunctionUrl('" . ConfigInfraTools::CHECK_DNS_RECORD . "#tabs3');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-3" class="ui-state-default <?php echo $functionClass; ?>">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::CHECK_DNS_RECORD ?>#tabs3" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- CHECK E-MAIL EXISTS -->
                <?php
					if($ConfigInfraTools->FunctionCheckEmailExistsEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-4');
										  SetFunctionUrl('" . ConfigInfraTools::CHECK_EMAIL_EXISTS . "#tabs4');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-4" class="ui-state-default <?php echo $functionClass; ?>">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::CHECK_EMAIL_EXISTS ?>#tabs4" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- CHECK IP ADDRESS IS IN NETWORK -->
                <?php
					if($ConfigInfraTools->FunctionCheckIpAddresIsInNetworkEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-5');
										  SetFunctionUrl('" . ConfigInfraTools::CHECK_IP_ADDRESS_IS_IN_NETWORK . "#tabs5');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-5" class="ui-state-default <?php echo $functionClass; ?>">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::CHECK_IP_ADDRESS_IS_IN_NETWORK ?>#tabs5" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- CHECK PING -->
                <?php
					if($ConfigInfraTools->FunctionCheckPingServerEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-6');
										  SetFunctionUrl('" . ConfigInfraTools::CHECK_PING_SERVER . "#tabs6');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-6" class="ui-state-default <?php echo $functionClass; ?>">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::CHECK_PING_SERVER ?>#tabs6" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_PING_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- CHECK PORT STATUS -->
                <?php
					if($ConfigInfraTools->FunctionCheckPortStatusEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-7');
										  SetFunctionUrl('" . ConfigInfraTools::CHECK_PORT_STATUS . "#tabs7');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-7" class="ui-state-default <?php echo $functionClass; ?>">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::CHECK_PORT_STATUS ?>#tabs7" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
     			<!-- GET CALCULATION NETMAST -->
				<?php
					if($ConfigInfraTools->FunctionGetCalculationNetMaskEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-8');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_CALCULATION_NETMASK . "#tabs8');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-8" class="ui-state-default">
                	<a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_CALCULATION_NETMASK ?>#tabs8" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_CALCULATION_NETMASK_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_CALCULATION_NETMASK_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET DNS RECORDS -->
                <?php
					if($ConfigInfraTools->FunctionGetDnsRecordsEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-9');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_DNS_RECORDS . "#tabs9');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-9" class="ui-state-default">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_DNS_RECORDS ?>#tabs9" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_DNS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_DNS_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET HOSTNAME -->
                <?php
					if($ConfigInfraTools->FunctionGetHostNameEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-10');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_HOSTNAME . "#tabs10');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-10" class="ui-state-default">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_HOSTNAME ?>#tabs10" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_HOSTNAME_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_HOSTNAME_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET IP ADDRESS -->
                <?php
					if($ConfigInfraTools->FunctionGetIpAddressesEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-11');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_IP_ADDRESSES . "#tabs11');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-11" class="ui-state-default">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_IP_ADDRESSES ?>#tabs11" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_IP_ADDRESSES_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_IP_ADDRESSES_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET LOCATION -->
                <?php
					if($ConfigInfraTools->FunctionGetLocationEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-12');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_LOCATION . "#tabs12');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-12" class="ui-state-default">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_LOCATION ?>#tabs12" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_LOCATION_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_LOCATION_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET PROTOCOL -->
                <?php
					if($ConfigInfraTools->FunctionGetProtocolEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-13');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_PROTOCOL . "#tabs13');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-13" class="ui-state-default">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_PROTOCOL ?>#tabs13" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_PROTOCOL_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_PROTOCOL_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET ROUTE -->
                <?php
					if($ConfigInfraTools->FunctionGetRouteEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-14');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_ROUTE . "#tabs14');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-14" class="ui-state-default">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_ROUTE ?>#tabs14" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_ROUTE_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_ROUTE_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET SERVICE -->
                <?php
					if($ConfigInfraTools->FunctionGetServiceEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-15');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_SERVICE . "#tabs15');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-15" class="ui-state-default">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_SERVICE ?>#tabs15" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_SERVICE_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_SERVICE_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
                <!-- GET WEB SITE -->
                <?php
					if($ConfigInfraTools->FunctionGetWebSiteEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-16');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_WEBSITE . "#tabs16');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-16" class="ui-state-default">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_WEBSITE ?>#tabs16" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                        <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_WEBSITE_TEXT'); ?> 
                        </span>
                    </a>
                </li>
                <!-- GET WHOIS -->
                <?php
					if($ConfigInfraTools->FunctionGetWhoisEnabled == true)
					{
						$functionId    = "onclick=\"TabsSelect('tabs-17');
						                  SetFunctionUrl('" . ConfigInfraTools::GET_WHOIS . "#tabs17');
										  \"";
						$functionClass = NULL; 
					}
					else {$functionId = ">"; $functionClass = "NotActive";}
				?>
                <li id="tabsLi-17" class="NoBorder ui-state-default">
                    <a href="PageDiagnosticTools?=<?php echo ConfigInfraTools::GET_WHOIS ?>#tabs17" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('GET_WHOIS_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
			</ul>
			<?php
				if($ConfigInfraTools->FunctionCheckAvailabilityEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::CHECK_AVAILABILITY . ".php");
				if($ConfigInfraTools->FunctionCheckBlacklistEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::CHECK_BLACKLIST . ".php");
                if($ConfigInfraTools->FunctionCheckDnsRecordEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::CHECK_DNS_RECORD . ".php");
				if($ConfigInfraTools->FunctionCheckEmailExistsEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::CHECK_EMAIL_EXISTS . ".php");
				if($ConfigInfraTools->FunctionCheckIpAddresIsInNetworkEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM 
								               . ConfigInfraTools::CHECK_IP_ADDRESS_IS_IN_NETWORK . ".php");
				if($ConfigInfraTools->FunctionCheckPingServerEnabled == true)
				    include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::CHECK_PING_SERVER . ".php");
				if($ConfigInfraTools->FunctionCheckPortStatusEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::CHECK_PORT_STATUS . ".php");
				if($ConfigInfraTools->FunctionGetCalculationNetMaskEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_CALCULATION_NETMASK . ".php");
				if($ConfigInfraTools->FunctionGetDnsRecordsEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_DNS_RECORDS . ".php");
				if($ConfigInfraTools->FunctionGetHostNameEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_HOSTNAME . ".php");
				if($ConfigInfraTools->FunctionGetIpAddressesEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_IP_ADDRESSES . ".php");
				if($ConfigInfraTools->FunctionGetLocationEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_LOCATION . ".php");
				if($ConfigInfraTools->FunctionGetProtocolEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_PROTOCOL . ".php");
				if($ConfigInfraTools->FunctionGetRouteEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_ROUTE . ".php");
				if($ConfigInfraTools->FunctionGetServiceEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_SERVICE . ".php");
				if($ConfigInfraTools->FunctionGetWebSiteEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_WEBSITE . ".php");
				if($ConfigInfraTools->FunctionGetWhoisEnabled == true)
					include_once(REL_PATH . ConfigInfraTools::PATH_FORM . ConfigInfraTools::GET_WHOIS . ".php");
			?>
            <div class="DivClearFloat"></div>
		</div>
	</div>
</div>