<!-- BODY PAGE CHECK -->
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
                    <a href="PageCheck?=<?php echo ConfigInfraTools::CHECK_AVAILABILITY; ?>#tabs1" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_AVAILABILITY_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
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
                    <a href="PageCheck?=<?php echo ConfigInfraTools::CHECK_BLACKLIST ?>#tabs2" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>" 
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_BLACKLIST_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
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
                    <a href="PageCheck?=<?php echo ConfigInfraTools::CHECK_DNS_RECORD ?>#tabs3" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_DNS_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
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
                    <a href="PageCheck?=<?php echo ConfigInfraTools::CHECK_EMAIL_EXISTS ?>#tabs4" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_EMAIL_EXISTS_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
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
                    <a href="PageCheck?=<?php echo ConfigInfraTools::CHECK_IP_ADDRESS_IS_IN_NETWORK ?>#tabs5" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
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
                    <a href="PageCheck?=<?php echo ConfigInfraTools::CHECK_PING_SERVER ?>#tabs6" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_PING_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_PING_TEXT'); ?> 
                        </span> 
                    </a>
                </li>
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
                <li id="tabsLi-7" class="NoBorder ui-state-default <?php echo $functionClass; ?>">
                    <a href="PageCheck?=<?php echo ConfigInfraTools::CHECK_PORT_STATUS ?>#tabs7" 
                       class="ui-tabs-anchor <?php echo $functionClass; ?>"
                       <?php echo $functionId; ?>>
                        <span title='<?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_TITLE'); ?>'> 
                            <?php echo $this->InstanceLanguageText->GetText('CHECK_PORT_STATUS_TEXT'); ?> 
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
			?>
            <div class="DivClearFloat"></div>
		</div>
	</div>
</div>