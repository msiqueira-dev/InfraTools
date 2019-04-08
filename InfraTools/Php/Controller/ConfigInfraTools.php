<?php

/************************************************************************
Class: ConfigInfraTools.php
Creation: 2013/11/05
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe de configurcão Web do InfraTools.
			Padrões: Singleton.
Functions: 
			public static function GetPageConstant($Constant);
**************************************************************************/

if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Config');
}
if (!class_exists("Session"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Session.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Session.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Session');
}
if (!class_exists("AssocUserCorporation"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "AssocUserCorporation.php"))
		include_once(BASE_PATH_PHP_MODEL . "AssocUserCorporation.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class AssocUserCorporation');
}
if (!class_exists("AssocUserNotification"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "AssocUserNotification.php"))
		include_once(BASE_PATH_PHP_MODEL . "AssocUserNotification.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class AssocUserNotification');
}
if (!class_exists("AssocUserTeam"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "AssocUserTeam.php"))
		include_once(BASE_PATH_PHP_MODEL . "AssocUserTeam.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class AssocUserTeam');
}
if (!class_exists("Department"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Department.php"))
		include_once(BASE_PATH_PHP_MODEL . "Department.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Department');
}
if (!class_exists("Team"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Team.php"))
		include_once(BASE_PATH_PHP_MODEL . "Team.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Team');
}
if (!class_exists("TypeUser"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "TypeUser.php"))
		include_once(BASE_PATH_PHP_MODEL . "TypeUser.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class TypeUser');
}
if (!class_exists("InfraToolsCorporation"))
{
	if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsCorporation.php"))
		include_once(SITE_PATH_PHP_MODEL . "InfraToolsCorporation.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsCorporation');
}

if (!class_exists("InfraToolsUser"))
{
	if(file_exists(SITE_PATH_PHP_MODEL . "InfraToolsUser.php"))
		include_once(SITE_PATH_PHP_MODEL . "InfraToolsUser.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsUser');
}
	
class ConfigInfraTools extends Config
{	
	/* Constantes de Páginas */
	
	/* Constantes gerais usadas pelo site */
	const ADDRESS_INFRATOOLS_DOMAIN                                             = "";
	const APPLICATION_INFRATOOLS                                                = "InfraTools";
	const DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL                                 = "DbErrorAssocIpAddressServiceSel";
	const DB_ERROR_ASSOC_IP_ADDRESS_SERVICE_SEL_FETCH                           = "DbErrorAssocIpAddressServiceSelFetch";
	const DB_ERROR_ASSOC_USER_SERVICE_CHECK_USER_TYPE_ADMINISTRATOR             = "DbErrorAssocUserServiceCheckUserTypeAdministrator";
	const DB_ERROR_ASSOC_USER_SERVICE_CHECK_USER_TYPE_ADMINISTRATOR_FETCH       = "DbErrorAssocUserServiceCheckUserTypeAdministratorFetch";
	const DB_ERROR_ASSOC_USER_SERVICE_DEL_BY_ASSOC_USER_SERVICE_ID              = "DbErrorAssocUserServiceDeleteByAssocUserServiceId";
	const DB_ERROR_ASSOC_USER_SERVICE_DEL_BY_ASSOC_USER_SERVICE_ID_AND_EMAIL    = "DbErrorAssocUserServiceDeleteByAssocUserServiceIdAndEmail";
	const DB_ERROR_ASSOC_USER_SERVICE_INSERT                                    = "DbErrorAssocUserServiceInsert";
	const DB_ERROR_ASSOC_USER_SERVICE_SEL_BY_ASSOC_USER_SERVICE_ID              = "DbErrorAssocUserServiceSelByAssocUserServiceId";
	const DB_ERROR_ASSOC_USER_SERVICE_SEL_BY_ASSOC_USER_SERVICE_ID_FETCH        = "DbErrorAssocUserServiceSelByAssocUserServiceIdFetch";
	const DB_ERROR_IP_ADDRESS_DEL_BY_IP_ADDRESS_IPV4                            = "DbErrorIpAddressDeleteByIpAddressIpv4";
	const DB_ERROR_IP_ADDRESS_INSERT                                            = "DbErrorIpAddressInsert";
	const DB_ERROR_IP_ADDRESS_SEL                                               = "DbErrorIpAddressSelect";
	const DB_ERROR_IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4                            = "DbErrorIpAddressSelByIpAddressIpv4";
	const DB_ERROR_IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4_FETCH                      = "DbErrorIpAddressSelByIpAddressIpv4Fetch";
	const DB_ERROR_IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV6                            = "DbErrorIpAddressSelByIpAddressIpv6";
	const DB_ERROR_IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV6_FETCH                      = "DbErrorIpAddressSelByIpAddressIpv6Fetch";
	const DB_ERROR_IP_ADDRESS_SEL_FETCH                                         = "DbErrorIpAddressSelFetch";
	const DB_ERROR_IP_ADDRESS_UPDT_BY_IP_ADDRESS_IPV4                           = "DbErrorIpAddressUpdateByIpAddressIpv4";
	const DB_ERROR_IP_ADDRESS_UPDT_BY_IP_ADDRESS_IPV6                           = "DbErrorIpAddressUpdateByIpAddressIpv6";
	const DB_ERROR_NETWORK_DEL_BY_NETWORK_NAME                                  = "DbErrorNetworkDeleteByNetworkName";
	const DB_ERROR_NETWORK_INSERT                                               = "DbErrorNetworkInsert";
	const DB_ERROR_NETWORK_SEL                                                  = "DbErrorNetworkSel";
	const DB_ERROR_NETWORK_SEL_BY_NETWORK_IP                                    = "DbErrorNetworkSelByNetworkIp";
	const DB_ERROR_NETWORK_SEL_BY_NETWORK_IP_FETCH                              = "DbErrorNetworkSelByNetworkIpFetch";
	const DB_ERROR_NETWORK_SEL_BY_NETWORK_NAME                                  = "DbErrorNetworkSelByNetworkName";
	const DB_ERROR_NETWORK_SEL_BY_NETWORK_NAME_FETCH                            = "DbErrorNetworkSelByNetworkNameFetch";
	const DB_ERROR_NETWORK_SEL_BY_NETWORK_NETMASK                               = "DbErrorNetworkSelByNetworkNetmask";
	const DB_ERROR_NETWORK_SEL_BY_NETWORK_NETMASK_FETCH                         = "DbErrorNetworkSelByNetworkNetmaskFetch";
	const DB_ERROR_NETWORK_SEL_FETCH                                            = "DbErrorNetworkSelFetch";
	const DB_ERROR_NETWORK_UPDT_BY_NETWORK_NAME                                 = "DbErrorNetworkUpdateByNetworkName";
	const DB_ERROR_SERVICE_DEL_BY_SERVICE_ID                                    = "DbErrorServiceDeleteByServiceId";
	const DB_ERROR_SERVICE_INSERT                                               = "DbErrorServiceInsert";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE                                = "DbErrorServiceSelByServiceActive";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_ACTIVE_FETCH                          = "DbErrorServiceSelByServiceActiveFetch";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION                           = "DbErrorServiceSelByServiceCorporation";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_CORPORATION_FETCH                     = "DbErrorServiceSelByServiceCorporationFetch";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT                            = "DbErrorServiceSelByServiceDepartment";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_DEPARTMENT_FETCH                      = "DbErrorServiceSelByServiceDepartmentFetch";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_ID                                    = "DbErrorServiceSelByServiceId";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME                                  = "DbErrorServiceSelByServiceName";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_NAME_FETCH                            = "DbErrorServiceSelByServiceNameFetch";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE                                  = "DbErrorServiceSelByServiceType";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_TYPE_FETCH                            = "DbErrorServiceSelByServiceTypeFetch";
	const DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE                       = "DbErrorServiceSelByTypeAssocUserService";
	const DB_ERROR_SERVICE_SEL_BY_TYPE_ASSOC_USER_SERVICE_FETCH                 = "DbErrorServiceSelByTypeAssocUserServiceFetch";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_USER                                  = "DbErrorServiceSelByServiceUser";
	const DB_ERROR_SERVICE_SEL_BY_SERVICE_USER_FETCH                            = "DbErrorServiceSelByServiceUserFetch";
	const DB_ERROR_SERVICE_SEL                                                  = "DbErrorServiceSel";
	const DB_ERROR_SERVICE_SEL_FETCH                                            = "DbErrorServiceSelFetch";
	const DB_ERROR_SERVICE_UPDT_BY_SERVICE_ID                                   = "DbErrorServiceUpdtByServiceId";
	const DB_ERROR_SERVICE_UPDT_RESTRICT_BY_SERVICE_ID                          = "DbErrorServiceUpdtRestrictByServiceId";
	const DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL                                  = "DbErrorTypeAssocUserService";
	const DB_ERROR_TYPE_ASSOC_USER_SERVICE_SEL_FETCH                            = "DbErrorTypeAssocUserServiceSelFetch";
	const DB_ERROR_TYPE_SERVICE_SEL                                             = "DbErrorTypeServiceSel";
	const DB_ERROR_TYPE_SERVICE_SEL_FETCH                                       = "DbErrorTypeServiceSelFetch";
	const DIV_CHECK_BLACKLIST                                                   = "DivCheckBlackList";
	const DIV_CHECK_PING_SERVER                                                 = "DivCheckPingServer";
	const DIV_CHECK_PORT_STATUS                                                 = "DivCheckPortStatus";
	const DIV_GET_CALCULATION_NETMASK                                           = "DivGetCalculationNetMask";
	const DIV_GET_WHOIS                                                         = "DivGetWhois";
	const DIV_RADIO                                                             = "DivRadio";
	const DIV_RADIO_CORPORATION                                                 = "DivRadioCorporation";
	const DIV_RADIO_SERVICE_ID                                                  = "DivRadioServiceId";
	const DIV_RADIO_SERVICE_NAME                                                = "DivRadioServiceName";
	const EXCEPTION_ASSOC_IP_ADDRESS_SERVICE_SERVICE_ID                         = "ExceptionAssocIpAddressServiceServiceId";
	const EXCEPTION_ASSOC_IP_ADDRESS_SERVICE_SERVICE_IP                         = "ExceptionAssocIpAddressServiceServiceIp";
	const EXCEPTION_INFORMATION_SERVICE_DESCRIPTION                             = "ExceptionInformationServiceDescription";
	const EXCEPTION_INFORMATION_SERVICE_ID                                      = "ExceptionInformationServiceId";
	const EXCEPTION_INFORMATION_SERVICE_SERVICE                                 = "ExceptionInformationServiceService";
	const EXCEPTION_INFORMATION_SERVICE_VALUE                                   = "ExceptionInformationServiceValue";
	const EXCEPTION_MONITORING_DESCRITPION                                      = "ExceptionMonitoringDescription";
	const EXCEPTION_IP_ADDRESS_IPV4                                             = "ExceptionIpAddressIpv4";
	const EXCEPTION_MONITORING_ID                                               = "ExceptionMonitoringId";
	const EXCEPTION_MONITORING_NAME                                             = "ExceptionMonitoringName";
	const EXCEPTION_MONITORING_SERVICE                                          = "ExceptionMonitoringService";
	const EXCEPTION_MONITORING_STATUS                                           = "ExceptionMonitoringStatus";
	const EXCEPTION_MONITORING_TIME                                             = "ExceptionMonitoringTime";
	const EXCEPTION_MONITORING_TYPE                                             = "ExceptionMonitoringType";
	const EXCEPTION_NETWORK_IP                                                  = "ExceptionNetworkIp";
	const EXCEPTION_NETWORK_NAME                                                = "ExceptionNetworkName";
	const EXCEPTION_NETWORK_NETMASK                                             = "ExceptionNetworkNetmask";
	const EXCEPTION_SERVICE_ACTIVE                                              = "ExceptionServiceActive";
	const EXCEPTION_SERVICE_CORPORATION_CAN_CHANGE                              = "ExeceptionCorporationCanChange";
	const EXCEPTION_SERVICE_DEPARTMENT_CAN_CHANGE                               = "ExeceptionDepartmentCanChange";
	const EXCEPTION_SERVICE_DESCRIPTION                                         = "ExceptionServiceDescription";
	const EXCEPTION_SERVICE_ID                                                  = "ExceptionServiceId";
	const EXCEPTION_SERVICE_NAME                                                = "ExceptionServiceName";
	const EXCEPTION_SERVICE_TYPE                                                = "ExceptionServiceType";
	const EXCEPTION_TICKET_SERVICE                                              = "ExceptionTicketService";
	const EXCEPTION_TYPE_SERVICE_NAME                                           = "ExceptionTypeServiceName";
	const EXCEPTION_TYPE_ASSOC_USER_SERVICE_DESCRIPTION                         = "ExceptionTypeAssocUserServiceDescription";
	const EXCEPTION_TYPE_ASSOC_USER_SERVICE_ID                                  = "ExceptionTypeAssocUserServiceId";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY                             = "FieldDiagnosticToolsCheckAvailability";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_HOST                           = "FieldDiagnosticToolsCheckBlackListHost";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_IP                             = "FieldDiagnosticToolsCheckBlackListIp";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO                          = "FieldDiagnosticToolsCheckBlackListRadio";
    const FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO_HOST                     = "FieldDiagnosticToolsCheckBlackListRadioHost";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_RADIO_IP                       = "FieldDiagnosticToolsCheckBlackListRadioIp";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD                               = "FieldDiagnosticToolsCheckDnsRecord";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL                           = "FunctionCheckDnsRecordSel";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_A                         = "A";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_A6                        = "A6";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_AAAA                      = "AAAA";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_CNAME                     = "CNAME";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_MX                        = "MX";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_NAPTR                     = "NAPTR";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_NS                        = "NS";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_PTR                       = "PTR";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_SOA                       = "SOA";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_SRV                       = "SRV";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SEL_TXT                       = "TXT";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS                             = "FieldDiagnosticToolsCheckEmailExists";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_IP              = "FieldDiagnosticToolsCheckIpAddressIsInNetworkIp";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_MASK            = "FieldDiagnosticToolsCheckIpAddressIsInNetworkMask";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_NETWORK         = "FieldDiagnosticToolsCheckIpAddressIsInNetworkNetwork";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_HOST                         = "FieldDiagnosticToolsFunctionCheckPingServerHost";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_IP                           = "FieldDiagnosticToolsFunctionCheckPingServerIp";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO                        = "FieldDiagnosticToolsCheckPingServerRadio";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO_HOST                   = "FieldDiagnosticToolsCheckPingServerRadioHost";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_RADIO_IP                     = "FieldDiagnosticToolsCheckPingServerRadioIp";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST                         = "FieldDiagnosticToolsCheckPortStatusHost";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_HOST_PORT                    = "FieldDiagnosticToolsCheckPortStatusHostPort";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP                           = "FieldDiagnosticToolsCheckPortStatusIp";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_IP_PORT                      = "FieldDiagnosticToolsCheckPortStatusIpPort";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO                        = "FieldDiagnosticToolsCheckPortStatusRadio";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO_HOST                   = "FieldDiagnosticToolsCheckPortStatusRadioHost";
	const FIELD_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_RADIO_IP                     = "FieldDiagnosticToolsCheckPortStatusRadioIp";	
	const FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_IP                     = "FieldDiagnosticToolsGetCalculationNetMaskIp";
	const FIELD_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_MASK                   = "FieldDiagnosticToolsGetCalculationNetMaskMask";
	const FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_HOST                           = "FieldDiagnosticToolsGetDnsRecords";
	const FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL                            = "FieldDiagnosticToolsGetDnsRecordsSel";
	const FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL_MX                         = "FieldDiagnosticToolsGetDnsRecordsSelMx";
	const FIELD_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SEL_OTHER                      = "FieldDiagnosticToolsGetDnsRecordsSelOther";
	const FIELD_DIAGNOSTIC_TOOLS_GET_HOSTNAME                                   = "FieldDiagnosticToolsGetHostName"; 
	const FIELD_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES                               = "FieldDiagnosticToolsGetIpAddresses";
	const FIELD_DIAGNOSTIC_TOOLS_GET_LOCATION                                   = "FieldDiagnosticToolsGetLocation";
	const FIELD_DIAGNOSTIC_TOOLS_GET_PROTOCOL                                   = "FieldDiagnosticToolsGetProtocol";
	const FIELD_DIAGNOSTIC_TOOLS_GET_ROUTE                                      = "FieldDiagnosticToolsGetRoute";
	const FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE                                    = "FieldDiagnosticToolsGetService";
	const FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL                                = "FieldDiagnosticToolsGetServiceSel";
	const FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL_TCP                            = "FieldDiagnosticToolsGetServiceSelTcp";
	const FIELD_DIAGNOSTIC_TOOLS_GET_SERVICE_SEL_UDP                            = "FieldDiagnosticToolsGetServiceSelUdp";
	const FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE                                    = "FieldDiagnosticToolsGetWebSite";
	const FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL                                = "FieldDiagnosticToolsGetWebSiteSel";
	const FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL_CONTENT                        = "FieldDiagnosticToolsGetWebSiteSelContent";
	const FIELD_DIAGNOSTIC_TOOLS_GET_WEBSITE_SEL_HEADER                         = "FieldDiagnosticToolsGetWebSiteSelHeader";
	const FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_HOST                                 = "FieldDiagnosticToolsGetWhoisHost";
	const FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_IP                                   = "FieldDiagnosticToolsFunctionGetWhoisIp";
	const FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO                                = "FieldDiagnosticToolsGetWhoisRadio";
    const FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO_HOST                           = "FieldDiagnosticToolsGetWhoisRadioHost";
	const FIELD_DIAGNOSTIC_TOOLS_GET_WHOIS_RADIO_IP                             = "FieldDiagnosticToolsGetWhoisRadioIp";
	const FIELD_ID                                                              = "FieldId";
	const FIELD_IP_ADDRESS_DESCRIPTION                                          = "FieldIpAddressDescription";
	const FIELD_IP_ADDRESS_IPV4                                                 = "FieldIpAddressIpv4";
	const FIELD_IP_ADDRESS_IPV6                                                 = "FieldIpAddressIpv6";
	const FIELD_IP_ADDRESS_RADIO                                                = "FieldIpAddressRadio";
	const FIELD_IP_ADDRESS_RADIO_DIV_IPV4                                       = "FieldIpAddressRadioDivIpv4";
	const FIELD_IP_ADDRESS_RADIO_DIV_IPV6                                       = "FieldIpAddressRadioDivIpv6";
	const FIELD_IP_ADDRESS_RADIO_IPV4                                           = "FieldIpAddressRadioIpv4";
	const FIELD_IP_ADDRESS_RADIO_IPV6                                           = "FieldIpAddressRadioIpv6";
	const FIELD_NETWORK_IP                                                      = "NetworkIp";
	const FIELD_NETWORK_NAME                                                    = "FieldNetworkName";
	const FIELD_NETWORK_NETMASK                                                 = "FieldNetworkNetmask";
	const FIELD_SERVICE_ACTIVE                                                  = "FieldServiceActive";
	const FIELD_SERVICE_CORPORATION_CAN_CHANGE                                  = "FieldServiceCorporationCanChange";
	const FIELD_SERVICE_DEPARTMENT_CAN_CHANGE                                   = "FieldServiceDepartmentCanChange";
	const FIELD_SERVICE_DESCRIPTION                                             = "FieldServiceDescription";
	const FIELD_SERVICE_ID                                                      = "FieldServiceId";
	const FIELD_SERVICE_ID_RADIO                                                = "FieldServiceIdRadio";
	const FIELD_SERVICE_ID_RADIO_DIV                                            = "FieldServiceIdRadioDiv";
	const FIELD_SERVICE_NAME                                                    = "FieldServiceName";
	const FIELD_SERVICE_NAME_RADIO                                              = "FieldServiceNameRadio";
	const FIELD_SERVICE_NAME_RADIO_DIV                                          = "FieldServiceNameRadioDiv";
	const FIELD_SERVICE_RADIO                                                   = "FieldServiceRadio";
	const FIELD_SERVICE_TYPE                                                    = "FieldServiceType";
	const FIELD_TYPE_SERVICE_NAME                                               = "FieldTypeServiceName";
	const FIELD_TYPE_SERVICE_SLA                                                = "FieldTypeServiceSLA";
	const FM_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY                                = "FmDiagnosticToolsCheckAvailability";
	const FM_DIAGNOSTIC_TOOLS_CHECK_AVAILABILITY_SB                             = "FmDiagnosticToolsCheckAvailabilitySb";
	const FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST                                   = "FmDiagnosticToolsCheckBlackList";
	const FM_DIAGNOSTIC_TOOLS_CHECK_BLACKLIST_SB                                = "FmDiagnosticToolsCheckBlackListSb";
	const FM_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD                                  = "FmDiagnosticToolsCheckDnsRecord";
	const FM_DIAGNOSTIC_TOOLS_CHECK_DNS_RECORD_SB                               = "FmDiagnosticToolsCheckDnsRecordSb";
	const FM_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS                                = "FmDiagnosticToolsCheckEmailExists";
	const FM_DIAGNOSTIC_TOOLS_CHECK_EMAIL_EXISTS_SB                             = "FmDiagnosticToolsCheckEmailExistsSb";
	const FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK                    = "FmDiagnosticToolsCheckIpAddressIsInNetwork";
	const FM_DIAGNOSTIC_TOOLS_CHECK_IP_ADDRESS_IS_IN_NETWORK_SB                 = "FmDiagnosticToolsCheckIpAddressIsInNetworkSb";
	const FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER                                 = "FmDiagnosticToolsCheckPingServer";
	const FM_DIAGNOSTIC_TOOLS_CHECK_PING_SERVER_SB                              = "FmDiagnosticToolsCheckPingServerSb";
	const FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS                                 = "FmDiagnosticToolsCheckPortStatus";
	const FM_DIAGNOSTIC_TOOLS_CHECK_PORT_STATUS_SB                              = "FmDiagnosticToolsCheckPortStatusSb";
	const FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK                           = "FmDiagnosticToolsGetCalculationNetmask";
	const FM_DIAGNOSTIC_TOOLS_GET_CALCULATION_NETMASK_SB                        = "FmDiagnosticToolsGetCalculationNetmaskSb";
	const FM_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS                                   = "FmDiagnosticToolsGetDnsRecords";
	const FM_DIAGNOSTIC_TOOLS_GET_DNS_RECORDS_SB                                = "FmDiagnosticToolsGetDnsRecordsSb";
	const FM_DIAGNOSTIC_TOOLS_GET_HOSTNAME                                      = "FmDiagnosticToolsGetHostname";
	const FM_DIAGNOSTIC_TOOLS_GET_HOSTNAME_SB                                   = "FmDiagnosticToolsGetHostnameSb";
	const FM_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES                                  = "FmDiagnosticToolsGetIpAddresses";
	const FM_DIAGNOSTIC_TOOLS_GET_IP_ADDRESSES_SB                               = "FmDiagnosticToolsGetIpAddressesSb";
	const FM_DIAGNOSTIC_TOOLS_GET_LOCATION                                      = "FmDiagnosticToolsGetLocation";
	const FM_DIAGNOSTIC_TOOLS_GET_LOCATION_SB                                   = "FmDiagnosticToolsGetLocationSb";
	const FM_DIAGNOSTIC_TOOLS_GET_PROTOCOL                                      = "FmDiagnosticToolsGetProtocol";
	const FM_DIAGNOSTIC_TOOLS_GET_PROTOCOL_SB                                   = "FmDiagnosticToolsGetProtocolSb";
	const FM_DIAGNOSTIC_TOOLS_GET_ROUTE                                         = "FmDiagnosticToolsGetRoute";
	const FM_DIAGNOSTIC_TOOLS_GET_ROUTE_SB                                      = "FmDiagnosticToolsGetRouteSb";
	const FM_DIAGNOSTIC_TOOLS_GET_SERVICE                                       = "FmDiagnosticToolsGetService";
	const FM_DIAGNOSTIC_TOOLS_GET_SERVICE_SB                                    = "FmDiagnosticToolsGetServiceSb";
	const FM_DIAGNOSTIC_TOOLS_GET_WEBSITE                                       = "FmDiagnosticToolsGetWebSite";
	const FM_DIAGNOSTIC_TOOLS_GET_WEBSITE_SB                                    = "FmDiagnosticToolsGetWebSiteSb";
	const FM_DIAGNOSTIC_TOOLS_GET_WHOIS                                         = "FmDiagnosticToolsGetWhois";
	const FM_DIAGNOSTIC_TOOLS_GET_WHOIS_SB                                      = "FmDiagnosticToolsGetWhoisSb";
	const FM_GOOGLE_MAPS_LATITUDE                                               = "RegisterGoogleMapsLatitude";
	const FM_GOOGLE_MAPS_LONGITUDE                                              = "RegisterGoogleMapsLongitude";
	const FM_HEADER_PAGES                                                       = "PostBackFm";
	const FM_HEADER_LAYOUT                                                      = "FmHeaderLayout";
	const FM_HEADER_DEBUG                                                       = "FmHeaderDebug";
	const FM_INSTALL                                                            = "FmInstall";
	const FM_INSTALL_EXPORT_SB                                                  = "FmInstallExportSb";
	const FM_INSTALL_IMPORT_SB                                                  = "FmInstallImportSb";
	const FM_INSTALL_IMPORT_SB_HIDDEN                                           = "FmInstallImportSbHidden";
	const FM_INSTALL_NEW_SB                                                     = "FmInstallNewSb";
	const FM_INSTALL_REINSTALL_SB                                               = "FmInstallReinstallSb";
	const FM_INVALID_DNS_RECORD                                                 = "FmInvalidDnsRecord";
	const FM_INVALID_HOSTNAME                                                   = "FmInvalidHostName";
	const FM_INVALID_PORT                                                       = "FmInvalidPort";
	const FM_INVALID_PROTOCOL                                                   = "FmInvalidProtocol";
	const FM_INVALID_PROTOCOL_NUMBER                                            = "FmInvalidProtocolNumber";
	const FM_INVALID_WEBSITE                                                    = "FmInvalidWebSite";
	const FM_IP_ADDRESS                                                         = "FmIpAddress";
	const FM_IP_ADDRESS_LST                                                     = "FmIpAddressList";
	const FM_IP_ADDRESS_LST_BACK                                                = "FmIpAddressListBack";
	const FM_IP_ADDRESS_LST_FORM                                                = "FmIpAddressListFm";
	const FM_IP_ADDRESS_LST_FORWARD                                             = "FmIpAddressListForward";
	const FM_IP_ADDRESS_REGISTER                                                = "FmIpAddressRegister";
	const FM_IP_ADDRESS_REGISTER_CANCEL                                         = "FmIpAddressRegisterCancel";
	const FM_IP_ADDRESS_REGISTER_FORM                                           = "FmIpAddressRegisterFm";
	const FM_IP_ADDRESS_REGISTER_FORM_NETWORK                                   = "FmIpAddressRegisterFmNetwork";
	const FM_IP_ADDRESS_REGISTER_SB                                             = "FmIpAddressRegisterSb";
	const FM_IP_ADDRESS_RETURN_NOT_FOUND                                        = "FmIpAddressNotFound";
	const FM_IP_ADDRESS_SEL                                                     = "FmIpAddressSel";
	const FM_IP_ADDRESS_SEL_FORM                                                = "FmIpAddressSelFm";
	const FM_IP_ADDRESS_SEL_SB                                                  = "FmIpAddressSelSb";
	const FM_IP_ADDRESS_UPDT_FORM                                               = "FmIpAddressUpdateFm";
	const FM_IP_ADDRESS_UPDT_CANCEL                                             = "FmIpAddressUpdateCancel";
	const FM_IP_ADDRESS_UPDT_SB                                                 = "FmIpAddressUpdateSb";
	const FM_IP_ADDRESS_VIEW                                                    = "FmIpAddressView";
	const FM_IP_ADDRESS_VIEW_DEL                                                = "FmIpAddressViewDelete";
	const FM_IP_ADDRESS_VIEW_DEL_SB                                             = "FmIpAddressViewDeleteSb";
	const FM_IP_ADDRESS_VIEW_LST_USERS                                          = "FmIpAddressViewListUsers";
	const FM_IP_ADDRESS_VIEW_LST_USERS_FORM                                     = "FmIpAddressViewListUsersFm";
	const FM_IP_ADDRESS_VIEW_LST_USERS_SB                                       = "FmIpAddressViewListUsersSb";
	const FM_IP_ADDRESS_VIEW_LST_USERS_SB_BACK                                  = "FmIpAddressViewListUsersSbBack";
	const FM_IP_ADDRESS_VIEW_LST_USERS_SB_FORWARD                               = "FmIpAddressViewListUsersSbForward";
	const FM_IP_ADDRESS_VIEW_UPDT                                               = "FmIpAddressViewUpdate";
	const FM_IP_ADDRESS_VIEW_UPDT_SB                                            = "FmIpAddressViewUpdateSb";	
	const FM_SERVICE                                                            = "FmService";
	const FM_SERVICE_LST                                                        = "FmServiceList";
	const FM_SERVICE_LST_BACK                                                   = "FmServiceListBack";
	const FM_SERVICE_LST_FORWARD                                                = "FmServiceListForward";
	const FM_SERVICE_LST_SEL                                                    = "FmServiceListSel";
	const FM_SERVICE_LST_SEL_BY_ID                                              = "FmServiceListSelById";
	const FM_SERVICE_LST_SEL_BY_ID_SB                                           = "FmServiceListSelByIdSb";
	const FM_SERVICE_LST_SEL_BY_NAME_AND_ID                                     = "FmServiceListSelByNameAndId";
	const FM_SERVICE_LST_SEL_BY_NAME_AND_ID_SB                                  = "FmServiceListSelByNameAndIdSb";
	const FM_SERVICE_LST_SEL_SB                                                 = "FmServiceListSelSb";
	const FM_SERVICE_LST_BY_CORPORATION                                         = "FmServiceListByCorporation";
	const FM_SERVICE_LST_BY_CORPORATION_BACK                                    = "FmServiceListByCorporationBack";
	const FM_SERVICE_LST_BY_CORPORATION_FORWARD                                 = "FmServiceListByCorporationFoward";
	const FM_SERVICE_LST_BY_CORPORATION_SEL_BY_ID                               = "FmServiceListByCorporationSelById";
	const FM_SERVICE_LST_BY_CORPORATION_SEL_BY_ID_SB                            = "FmServiceListByCorporationSelByIdSb";
	const FM_SERVICE_LST_BY_CORPORATION_SEL_BY_NAME_AND_ID                      = "FmServiceListByCorporationSelByNameAndId";
	const FM_SERVICE_LST_BY_CORPORATION_SEL_BY_NAME_AND_ID_SB                   = "FmServiceListByCorporationSelByNameAndIdSb";
	const FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION                         = "FmServiceListByCorporationSelCorporation";
	const FM_SERVICE_LST_BY_CORPORATION_SEL_CORPORATION_SB                      = "FmServiceListByCorporationSelCorporationSb";
	const FM_SERVICE_LST_BY_DEPARTMENT                                          = "FmServiceListByDepartment";
	const FM_SERVICE_LST_BY_DEPARTMENT_BACK                                     = "FmServiceListByDepartmentBack";
	const FM_SERVICE_LST_BY_DEPARTMENT_FORWARD                                  = "FmServiceListByDepartmentForward";
	const FM_SERVICE_LST_BY_DEPARTMENT_SEL_BY_ID                                = "FmServiceListByDepartmentSelById";
	const FM_SERVICE_LST_BY_DEPARTMENT_SEL_BY_ID_SB                             = "FmServiceListByDepartmentSelByIdSb";
	const FM_SERVICE_LST_BY_DEPARTMENT_SEL_BY_NAME_AND_ID                       = "FmServiceListByDepartmentSelByNameAndId";
	const FM_SERVICE_LST_BY_DEPARTMENT_SEL_BY_NAME_AND_ID_SB                    = "FmServiceListByDepartmentSelByNameAndIdSb";
	const FM_SERVICE_LST_BY_DEPARTMENT_SEL_DEPARTMENT                           = "FmServiceListByDepartmentSelDepartment";
	const FM_SERVICE_LST_BY_DEPARTMENT_SEL_DEPARTMENT_SB                        = "FmServiceListByDepartmentSelDepartmentSb";
	const FM_SERVICE_LST_BY_NAME                                                = "FmServiceListByName";
	const FM_SERVICE_LST_BY_NAME_BACK                                           = "FmServiceListByNameBack";
	const FM_SERVICE_LST_BY_NAME_FORWARD                                        = "FmServiceListByNameForward";
	const FM_SERVICE_LST_BY_NAME_SEL_BY_ID                                      = "FmServiceListByNameSelById";
	const FM_SERVICE_LST_BY_NAME_SEL_BY_ID_SB                                   = "FmServiceListByNameSelByIdSb";
	const FM_SERVICE_LST_BY_NAME_SEL_BY_NAME_AND_ID                             = "FmServiceListByNameSelByNameAndId";
	const FM_SERVICE_LST_BY_NAME_SEL_BY_NAME_AND_ID_SB                          = "FmServiceListByNameSelByNameAndIdSb";
	const FM_SERVICE_LST_BY_NAME_SEL_DEPARTMENT                                 = "FmServiceListByNameSelDepartment";
	const FM_SERVICE_LST_BY_NAME_SEL_DEPARTMENT_SB                              = "FmServiceListByNameSelDepartmentSb";
	const FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE                             = "FmServiceListByTypeAssocUserService";
	const FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_BACK                        = "FmServiceListByTypeAssocUserServiceBack";
	const FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_FORWARD                     = "FmServiceListByTypeAssocUserServiceForward";
	const FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_BY_ID                   = "FmServiceListByTypeAssocUserServiceSelById";
	const FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_BY_ID_SB                = "FmServiceListByTypeAssocUserServiceSelByIdSb";
	const FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_BY_NAME_AND_ID          = "FmServiceListByTypeAssocUserServiceSelByNameAndId";
	const FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_BY_NAME_AND_ID_SB       = "FmServiceListByTypeAssocUserServiceSelByNameAndIdSb";
	const FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_TYPE_ASSOC_SERVICE      = "FmServiceListByTypeAssocUserServiceSelByTypeAssocService";
	const FM_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_SEL_TYPE_ASSOC_SERVICE_SB   = "FmServiceListByTypeAssocUserServiceSelByTypeAssocServiceSb";
	const FM_SERVICE_LST_BY_TYPE_SERVICE                                        = "FmServiceListByTypeService";
	const FM_SERVICE_LST_BY_TYPE_SERVICE_BACK                                   = "FmServiceListByTypeServiceBack";
	const FM_SERVICE_LST_BY_TYPE_SERVICE_FORWARD                                = "FmServiceListByTypeServiceForward";
	const FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_BY_ID                              = "FmServiceListByTypeServiceSelById";
	const FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_BY_ID_SB                           = "FmServiceListByTypeServiceSelById";
	const FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_BY_NAME_AND_ID                     = "FmServiceListByTypeServiceSelByNameAndId";
	const FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_BY_NAME_AND_ID_SB                  = "FmServiceListByTypeServiceSelByNameAndIdSb";
	const FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_TYPE_SERVICE                       = "FmServiceListByTypeServiceSelTypeService";
	const FM_SERVICE_LST_BY_TYPE_SERVICE_SEL_TYPE_SERVICE_SB                    = "FmServiceListByTypeServiceSelTypeServiceSb";     
	const FM_SERVICE_LST_BY_USER                                                = "FmServiceListByUser";
	const FM_SERVICE_LST_BY_USER_BACK                                           = "FmServiceListByUserBack";
	const FM_SERVICE_LST_BY_USER_FORWARD                                        = "FmServiceListByUserForward";
	const FM_SERVICE_LST_BY_USER_SEL_BY_ID                                      = "FmServiceListByUserSelById";
	const FM_SERVICE_LST_BY_USER_SEL_BY_ID_SB                                   = "FmServiceListByUserSelByIdSb";
	const FM_SERVICE_LST_BY_USER_SEL_BY_NAME_AND_ID                             = "FmServiceListByUserSelByNameAndId";
	const FM_SERVICE_LST_BY_USER_SEL_BY_NAME_AND_ID_SB                          = "FmServiceListByUserSelByNameAndIdSb";
	const FM_SERVIVE_VIEW_LST_USERS                                             = "FmServiceViewListUsers";
	const FM_SERVICE_VIEW_LST_USERS_FORM                                        = "FmServiceViewListUsersFm";
	const FM_SERVICE_VIEW_LST_USERS_SB                                          = "FmServiceViewListUsersSb";
	const FM_SERVICE_VIEW_LST_USERS_SB_BACK                                     = "FmServiceViewListUsersSbBack";
	const FM_SERVICE_VIEW_LST_USERS_SB_FORWARD                                  = "FmServiceViewListUsersSbForward";
	const FM_SERVICE_REGISTER                                                   = "FmServiceRegister";
	const FM_SERVICE_REGISTER_CANCEL                                            = "FmServiceRegisterCancel";
	const FM_SERVICE_REGISTER_FORM                                              = "FmServiceRegisterFm";
	const FM_SERVICE_REGISTER_SB                                                = "FmServiceRegisterSb";
	const FM_SERVICE_SEL                                                        = "FmServiceSel";
	const FM_SERVICE_SEL_FORM                                                   = "FmServiceSelFm";
	const FM_SERVICE_SEL_SB                                                     = "FmServiceSelSb";
	const FM_SERVICE_UPDT_CANCEL                                                = "FmServiceUpdateCancel";
	const FM_SERVICE_UPDT_FORM                                                  = "FmServiceUpdateFm";
	const FM_SERVICE_UPDT_SB                                                    = "FmServiceUpdateSb";
	const FM_SERVICE_VIEW                                                       = "FmServiceView";
	const FM_SERVICE_VIEW_CANCEL                                                = "FmServiceViewCancel";
	const FM_SERVICE_VIEW_DEL                                                   = "FmServiceViewDelete";
	const FM_SERVICE_VIEW_DEL_HIDDEN_ID                                         = "FmServiceViewDeleteHidden";
	const FM_SERVICE_VIEW_DEL_SB                                                = "FmServiceViewDeleteSb";
	const FM_SERVICE_VIEW_LST_USERS                                             = "FmServiceViewListUsers";
	const FM_SERVICE_VIEW_LST_USERS_BACK                                        = "FmServiceViewListUsersBack";
	const FM_SERVICE_VIEW_LST_USERS_FORWARD                                     = "FmServiceViewListUsersForward";
	const FM_SERVICE_VIEW_UPDT                                                  = "FmServiceViewUpdate";
	const FM_SERVICE_VIEW_UPDT_HIDDEN_ID                                        = "FmServiceViewUpdateHiddenId";
	const FM_SERVICE_VIEW_UPDT_SB                                               = "FmServiceViewUpdateSb";
	const FM_SB_BACK                                                            = "FmSbBack";
	const FM_TECH_INFO                                                          = "FmTechInfo";
	const FM_TECH_INFO_LST                                                      = "FmTechInfoList";	
	const FM_TYPE_MONITORING                                                    = "FmTypeMonitoring";
	const FM_TYPE_MONITORING_LST                                                = "FmTypeMonitoringList";
	const FM_TYPE_MONITORING_LST_BACK                                           = "FmTypeMonitoringListBack";
	const FM_TYPE_MONITORING_LST_FORM                                           = "FmTypeMonitoringListFm";
	const FM_TYPE_MONITORING_LST_FORWARD                                        = "FmTypeMonitoringListForward";
	const FM_TYPE_MONITORING_LST_SEL_SB                                         = "FmTypeMonitoringListSelSb";
	const FM_TYPE_MONITORING_REGISTER                                           = "FmTypeMonitoringReturnRegister";
	const FM_TYPE_MONITORING_REGISTER_CANCEL                                    = "FmTypeMonitoringReturnCancel";
	const FM_TYPE_MONITORING_REGISTER_FORM                                      = "FmTypeMonitoringReturnRegisterFm";
	const FM_TYPE_MONITORING_REGISTER_SB                                        = "FmTypeMonitoringReturnSb";
	const FM_TYPE_MONITORING_RETURN_NOT_FOUND                                   = "FmTypeMonitoringReturnNotFound";
	const FM_TYPE_MONITORING_SEL                                                = "FmTypeMonitoringSel";
	const FM_TYPE_MONITORING_SEL_FORM                                           = "FmTypeMonitoringSelFm";
	const FM_TYPE_MONITORING_SEL_SB                                             = "FmTypeMonitoringSelSb";
	const FM_TYPE_MONITORING_UPDT                                               = "FmTypeMonitoringUpdate";	
	const FM_TYPE_MONITORING_UPDT_CANCEL                                        = "FmTypeMonitoringUpdateCancel";
	const FM_TYPE_MONITORING_UPDT_FORM                                          = "FmTypeMonitoringUpdateFm";
	const FM_TYPE_MONITORING_UPDT_SB                                            = "FmTypeMonitoringUpdateSb";
	const FM_TYPE_MONITORING_VIEW                                               = "FmTypeMonitoringView";
	const FM_TYPE_MONITORING_VIEW_DEL                                           = "FmTypeMonitoringViewDelete";
	const FM_TYPE_MONITORING_VIEW_DEL_SB                                        = "FmTypeMonitoringViewDeleteSb";
	const FM_TYPE_MONITORING_VIEW_LST_USERS                                     = "FmTypeMonitoringViewListUsers";
	const FM_TYPE_MONITORING_VIEW_LST_USERS_FORM                                = "FmTypeMonitoringViewListUsersFm";
	const FM_TYPE_MONITORING_VIEW_LST_USERS_SB                                  = "FmTypeMonitoringViewListUsersSb";
	const FM_TYPE_MONITORING_VIEW_LST_USERS_SB_BACK                             = "FmTypeMonitoringViewListUsersSbBack";
	const FM_TYPE_MONITORING_VIEW_LST_USERS_SB_FORWARD                          = "FmTypeMonitoringViewListUsersSbForward";
	const FM_TYPE_MONITORING_VIEW_UPDT                                          = "FmTypeMonitoringViewUpdate";
	const FM_TYPE_MONITORING_VIEW_UPDT_SB                                       = "FmTypeMonitoringViewUpdateSb";
	const FM_TYPE_SERVICE                                                       = "FmTypeService";
	const FM_TYPE_SERVICE_LST                                                   = "FmTypeServiceList";
	const FM_TYPE_SERVICE_LST_BACK                                              = "FmTypeServiceListBack";
	const FM_TYPE_SERVICE_LST_FORWARD                                           = "FmTypeServiceListForward";
	const FM_TYPE_SERVICE_REGISTER                                              = "FmTypeServiceReturnRegister";
	const FM_TYPE_SERVICE_REGISTER_CANCEL                                       = "FmTypeServiceReturnCancel";
	const FM_TYPE_SERVICE_REGISTER_SB                                           = "FmTypeServiceReturnSb";
	const FM_TYPE_SERVICE_SEL                                                   = "FmTypeServiceSel";
	const FM_TYPE_SERVICE_SEL_FORM                                              = "FmTypeServiceSelFm";
	const FM_TYPE_SERVICE_SEL_SB                                                = "FmTypeServiceSelSb";
	const FM_TYPE_SERVICE_UPDT                                                  = "FmTypeServiceUpdate";	
	const FM_TYPE_SERVICE_UPDT_CANCEL                                           = "FmTypeServiceUpdateCancel";
	const FM_TYPE_SERVICE_UPDT_SB                                               = "FmTypeServiceUpdateSb";
	const FM_TYPE_SERVICE_VIEW                                                  = "FmTypeServiceView";
	const FM_TYPE_SERVICE_VIEW_LST_SERVICES                                     = "FmTypeServiceViewListServices";
	const FM_TYPE_SERVICE_VIEW_LST_SERVICES_BACK                                = "FmTypeServiceViewListServiceBack";
	const FM_TYPE_SERVICE_VIEW_LST_SERVICES_FORWARD                             = "FmTypeServiceViewListServiceForward";
	const FM_TYPE_SERVICE_VIEW_DEL_SB                                           = "FmTypeServiceViewDeleteSb";
	const FM_TYPE_SERVICE_VIEW_UPDT_SB                                          = "FmTypeServiceViewUpdateSb";
	const FM_TYPE_STATUS_MONITORING                                             = "FmTypeStatusMonitoring";
	const FM_TYPE_STATUS_MONITORING_LST                                         = "FmTypeStatusMonitoringList";
	const FM_TYPE_STATUS_MONITORING_LST_BACK                                    = "FmTypeStatusMonitoringListBack";
	const FM_TYPE_STATUS_MONITORING_LST_FORWARD                                 = "FmTypeStatusMonitoringListForward";
	const FM_TYPE_STATUS_MONITORING_LST_SEL_SB                                  = "FmTypeStatusMonitoringListSelSb";
	const FM_TYPE_STATUS_MONITORING_REGISTER                                    = "FmTypeStatusMonitoringReturnRegister";
	const FM_TYPE_STATUS_MONITORING_REGISTER_CANCEL                             = "FmTypeStatusMonitoringReturnCancel";
	const FM_TYPE_STATUS_MONITORING_REGISTER_SB                                 = "FmTypeStatusMonitoringReturnSb";
	const FM_TYPE_STATUS_MONITORING_RETURN_NOT_FOUND                            = "FmTypeStatusMonitoringReturnNotFound";
	const FM_TYPE_STATUS_MONITORING_SEL                                         = "FmTypeStatusMonitoringSel";
	const FM_TYPE_STATUS_MONITORING_SEL_SB                                      = "FmTypeStatusMonitoringSelSb";
	const FM_TYPE_STATUS_MONITORING_UPDT                                        = "FmTypeStatusMonitoringUpdate";	
	const FM_TYPE_STATUS_MONITORING_UPDT_CANCEL                                 = "FmTypeStatusMonitoringUpdateCancel";
	const FM_TYPE_STATUS_MONITORING_UPDT_SB                                     = "FmTypeStatusMonitoringUpdateSb";
	const FM_TYPE_STATUS_MONITORING_VIEW                                        = "FmTypeStatusMonitoringView";
	const FM_TYPE_STATUS_MONITORING_VIEW_DEL_SB                                 = "FmTypeStatusMonitoringViewDeleteSb";
	const FM_TYPE_STATUS_MONITORING_VIEW_UPDT_SB                                = "FmTypeStatusMonitoringViewUpdateSb";
	const PAGE_ADMIN_IP_ADDRESS                                                 = "Page_Admin_Ip_Address";
	const PAGE_ADMIN_IP_ADDRESS_LST                                             = "Page_Admin_Ip_Address_List";
	const PAGE_ADMIN_IP_ADDRESS_REGISTER                                        = "Page_Admin_Ip_Address_Register";
	const PAGE_ADMIN_IP_ADDRESS_SEL                                             = "Page_Admin_Ip_Address_Select";
	const PAGE_ADMIN_IP_ADDRESS_UPDT                                            = "Page_Admin_Ip_Address_Update";
	const PAGE_ADMIN_IP_ADDRESS_VIEW                                            = "Page_Admin_Ip_Address_View";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_USERS                                      = "Page_Admin_Ip_Address_View_Users";
	const PAGE_ADMIN_MONITORING                                                 = "Page_Admin_Monitoring";
	const PAGE_ADMIN_MONITORING_LST                                             = "Page_Admin_Monitoring_List";
	const PAGE_ADMIN_MONITORING_SEL                                             = "Page_Admin_Monitoring_Select";
	const PAGE_ADMIN_MONITORING_UPDT                                            = "Page_Admin_Monitoring_Update";
	const PAGE_ADMIN_MONITORING_VIEW                                            = "Page_Admin_Monitoring_View";
	const PAGE_ADMIN_MONITORING_VIEW_USERS                                      = "Page_Admin_Monitoring_View_Users";
	const PAGE_ADMIN_SERVICE                                                    = "Page_Admin_Service";
	const PAGE_ADMIN_SERVICE_LST                                                = "Page_Admin_Service_List";
	const PAGE_ADMIN_SERVICE_REGISTER                                           = "Page_Admin_Service_Register";
	const PAGE_ADMIN_SERVICE_SEL                                                = "Page_Admin_Service_Select";
	const PAGE_ADMIN_SERVICE_UPDT                                               = "Page_Admin_Service_Update";
	const PAGE_ADMIN_SERVICE_VIEW                                               = "Page_Admin_Service_View";
	const PAGE_ADMIN_SERVICE_VIEW_LST_USERS                                     = "Page_Admin_Service_View_List_Users";
	const PAGE_ADMIN_SERVICE_VIEW_ASSOCIATE                                     = "Page_Admin_Service_View_Associate";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_LST                                = "Page_Admin_Service_View_Monitoring_List";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_REGISTER                           = "Page_Admin_Service_View_Monitoring_Register";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_SEL                                = "Page_Admin_Service_View_Monitoring_Select";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_UPDT                               = "Page_Admin_Service_View_Monitoring_Update";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_VIEW                               = "Page_Admin_Service_View_Monitoring_View";
	const PAGE_ADMIN_TYPE_MONITORING                                            = "Page_Admin_Type_Monitoring";
	const PAGE_ADMIN_TYPE_MONITORING_LST                                        = "Page_Admin_Type_Monitoring_List";
	const PAGE_ADMIN_TYPE_MONITORING_REGISTER                                   = "Page_Admin_Type_Monitoring_Register";
	const PAGE_ADMIN_TYPE_MONITORING_SEL                                        = "Page_Admin_Type_Monitoring_Select";
	const PAGE_ADMIN_TYPE_MONITORING_UPDT                                       = "Page_Admin_Type_Monitoring_Update";
	const PAGE_ADMIN_TYPE_MONITORING_VIEW                                       = "Page_Admin_Type_Monitoring_View";
	const PAGE_ADMIN_TYPE_SERVICE                                               = "Page_Admin_Type_Service";
	const PAGE_ADMIN_TYPE_SERVICE_LST                                           = "Page_Admin_Type_Service_List";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER                                      = "Page_Admin_Type_Service_Register";
	const PAGE_ADMIN_TYPE_SERVICE_SEL                                           = "Page_Admin_Type_Service_Select";
	const PAGE_ADMIN_TYPE_SERVICE_UPDT                                          = "Page_Admin_Type_Service_Update";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW                                          = "Page_Admin_Type_Service_View";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_LST_SERVICES                             = "Page_Admin_Type_Service_View_List_Services";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING                                     = "Page_Admin_Type_Status_Monitoring";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_LST                                 = "Page_Admin_Type_Status_Monitoring_List";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_REGISTER                            = "Page_Admin_Type_Status_Monitoring_Register";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_SEL                                 = "Page_Admin_Type_Status_Monitoring_Select";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_UPDT                                = "Page_Admin_Type_Status_Monitoring_Update";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_VIEW                                = "Page_Admin_Type_Status_Monitoring_View";
	const PAGE_CHECK                                                            = "Page_Check";
	const PAGE_CHECK_AVAILABILITY                                               = "CheckAvailability";
	const PAGE_CHECK_BLACKLIST                                                  = "CheckBlackList";
	const PAGE_CHECK_DNS_RECORD                                                 = "CheckDnsRecord";
	const PAGE_CHECK_EMAIL_EXISTS                                               = "CheckEmailExists";
	const PAGE_CHECK_IP_ADDRESS_IS_IN_NETWORK                                   = "CheckIpAddressIsInNetwork";
	const PAGE_CHECK_PING_SERVER                                                = "CheckPingServer";
	const PAGE_CHECK_PORT_STATUS                                                = "CheckPortStatus";
	const PAGE_DIAGNOSTIC_TOOLS                                                 = "Page_Diagnostic_Tools";
	const PAGE_GET                                                              = "Page_Get";
	const PAGE_GET_CALCULATION_NETMASK                                          = "GetCalculationNetMask";
	const PAGE_GET_DNS_RECORDS                                                  = "GetDnsRecords";
	const PAGE_GET_HOSTNAME                                                     = "GetHostName";
	const PAGE_GET_IP_ADDRESSES                                                 = "GetIpAddresses";
	const PAGE_GET_LOCATION                                                     = "GetLocation";
	const PAGE_GET_PROTOCOL                                                     = "GetProtocol";
	const PAGE_GET_ROUTE   			                                            = "GetRoute";
	const PAGE_GET_SERVICE                                                      = "GetService";
	const PAGE_GET_WEBSITE                                                      = "GetWebSite";
	const PAGE_GET_WHOIS                                                        = "GetWhois";
	const PAGE_SERVICE                                                          = "Page_Service";
	const PAGE_SERVICE_LST                                                      = "Page_Service_List";
	const PAGE_SERVICE_LST_BY_CORPORATION                                       = "Page_Service_List_By_Corporation";
	const PAGE_SERVICE_LST_BY_DEPARTMENT                                        = "Page_Service_List_By_Department";
	const PAGE_SERVICE_LST_BY_NAME                                              = "Page_Service_List_By_Name";
	const PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE                           = "Page_Service_List_By_Type_Assoc_User_Service";
	const PAGE_SERVICE_LST_BY_TYPE_SERVICE                                      = "Page_Service_List_By_Type_Service";
	const PAGE_SERVICE_LST_BY_USER                                              = "Page_Service_List_By_User";
	const PAGE_SERVICE_REGISTER                                                 = "Page_Service_Register";
	const PAGE_SERVICE_SEL                                                      = "Page_Service_Select";
	const PAGE_SERVICE_UPDT                                                     = "Page_Service_Update";
	const PAGE_SERVICE_VIEW                                                     = "Page_Service_View";
	const PAGE_SERVICE_VIEW_ASSOCIATE                                           = "Page_Service_View_Associate";
	const PAGE_SERVICE_VIEW_MONITORING_LST                                      = "Page_Service_View_Monitoring_List";
	const PAGE_SERVICE_VIEW_MONITORING_REGISTER                                 = "Page_Service_View_Monitoring_Register";
	const PAGE_SERVICE_VIEW_MONITORING_SEL                                      = "Page_Service_View_Monitoring_Select";
	const PAGE_SERVICE_VIEW_MONITORING_UPDT                                     = "Page_Service_View_Monitoring_Update";
	const PAGE_SERVICE_VIEW_MONITORING_VIEW                                     = "Page_Service_View_Monitoring_View";
	const PAGE_SUPPORT                                                          = "Page_Support";
	const PAGE_SUPPORT_TICKET_ASSOCIATE                                         = "Page_Admin_Ticket_Associate";
	const PAGE_SUPPORT_TICKET_LST                                               = "Page_Admin_Ticket_List";
	const PAGE_SUPPORT_TICKET_REGISTER                                          = "Page_Admin_Ticket_Register";
	const PAGE_SUPPORT_TICKET_SEL                                               = "Page_Admin_Ticket_Select";
	const PAGE_SUPPORT_TICKET_UPDT                                              = "Page_Admin_Ticket_Update";
	const PAGE_SUPPORT_TICKET_VIEW                                              = "Page_Admin_Ticket_View";
	const RETURN_CHECK_HOST_BLACKLISTED                                         = "ReturnCheckHostBlackListed";
	const RETURN_CHECK_HOST_BLACKLIST_NO_IP_FOR_HOST                            = "ReturnCheckHostBlackListNoIpForHost";
	const RETURN_HOST_DNS_RECORD_TYPE_NOT_ALLOWED                               = "ReturnCheckHostDnsRecordTypeNotAllowed";
	const RETURN_CHECK_HOST_DNS_RECORD_TYPE_FAILED                              = "ReturnCheckHostDnsRecordTypeFailed";
	const RETURN_CHECK_HOST_PORT_FAILED_DISALLOWED                              = "ReturnCheckHostPortFailedDisallowed";
	const RETURN_CHECK_HOST_PORT_FAILED_REFUSED                                 = "ReturnCheckHostPortFailedRefused";
	const RETURN_CHECK_HOST_PORT_FAILED_TIMEOUT                                 = "ReturnCheckHostPortFailedTimeOut";
	const RETURN_CHECK_HOST_PORT_FAILED_UNKNOWN                                 = "ReturnCheckHostPortFailedUnknown";
	const RETURN_CHECK_IP_ADDRESS_IS_NOT_IN_NETWORK                             = "ReturnCheckIpAddressIsNotInNetwork";
	const RETURN_CHECK_PING_SERVER_FAILED                                       = "ReturnCheckPingServerFailed";
	const RETURN_CHECK_AVAILABILITY_NOT_AVAILABLE                               = "ReturnDomainNotAvailable";
	const RETURN_GET_BROWSER_CLIENT_INVALID_BROWSER                             = "ReturnInvalidBrowserClient";
	const RETURN_GET_DNS_MX_RECORDS_ERROR                                       = "ReturnGetDnsMxRecordsError";
	const RETURN_GET_DNS_RECORDS_ERROR                                          = "ReturnGetDnsRecordsError";
	const RETURN_GET_HOSTNAME_ERROR                                             = "ReturnGetHostNameError";
	const RETURN_GET_HOST_IP_ADDRESS_ERROR                                      = "ReturnGetHostIpAddressError";
	const RETURN_GET_LOCATION_BY_IP_ADDRESS_FAILED                              = "ReturnGetLocationByIpAddressError";
	const RETURN_GET_LOCATION_BY_IP_ADDRESS_FAILED_GET_CONTENTS                 = "ReturnGetLocationByIpAddressErrorGetContents";
	const RETURN_GET_PROTOCOL_ERROR                                             = "ReturnGEtProtocolError";
	const RETURN_GET_SERVICE_ERROR                                              = "ReturnGetServiceError";
	const RETURN_GET_WEBSITE_CONTENT_ERROR                                      = "ReturnGetWebSiteContentError";
	const RETURN_GET_WEBSITE_HEADERS_FAILED                                     = "ReturnGetWebSiteHeadersError";
	const RETURN_GET_WHOIS_ERROR                                                = "ReturnGetWhoisError";
	const RETURN_GET_WHOIS_PACKAGE_NET_WHOIS_NOT_FOUND                          = "ReturnPackageNetWhoisNotFound";
	const SESS_ADMIN_IP_ADDRESS                                                 = "SessionAdminIpAddress";
	const SESS_ADMIN_NETWORK                                                    = "SessionAdminNetwork";
	const SESS_ADMIN_SERVICE                                                    = "SessionAdminService";
	const SESS_ADMIN_TYPE_SERVICE                                               = "SessionAdminTypeService";
	const TB_ASSOC_IP_ADDRESS_SERVICE                                           = "ASSOC_IP_ADDRESS_SERVICE";
	const TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID                             = "AssocIpAddressServiceServiceId";
	const TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4                        = "AssocIpAddressServiceIp";
	const TB_ASSOC_URL_ADDRESS_SERVICE                                          = "ASSOC_URL_ADDRESS_SERVICE";
	const TB_ASSOC_URL_ADDRESS_SERVICE_FD_SERVICE_ID                            = "AssocUrlAddressServiceServiceId";
	const TB_ASSOC_URL_ADDRESS_SERVICE_FD_URL_ADDRESS_NAME                      = "AssocUrlAddressServiceUrlAddressName";
	const TB_ASSOC_USER_SERVICE                                                 = "ASSOC_USER_SERVICE";
	const TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                   = "AssocUserServiceServiceId";
	const TB_ASSOC_USER_SERVICE_FD_TYPE                                         = "AssocUserServiceType";
	const TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                   = "AssocUserServiceUserEmail";
	const TB_HISTORY_MONITORING                                                 = "HISTORY_MONITORING";
	const TB_HISTORY_MONITORING_FD_DESCRIPTION                                  = "HistoryMonitoringDescription";
	const TB_HISTORY_MONITORING_FD_ID                                           = "HistoryMonitoringId";
	const TB_HISTORY_MONITORING_FD_NAME                                         = "HistoryMonitoringName";
	const TB_HISTORY_MONITORING_FD_SERVICE                                      = "HistoryMonitoringService";
	const TB_HISTORY_MONITORING_FD_STATUS                                       = "HistoryMonitoringStatus";
	const TB_HISTORY_MONITORING_FD_TYPE                                         = "HistoryMonitoringType";
	const TB_HISTORY_MONITORING_FD_TIME                                         = "HistoryMonitoringTime";
	const TB_HISTORY_SERVICE                                                    = "HISTORY_SERVICE";
	const TB_HISTORY_SERVICE_FD_ACTIVE                                          = "ServiceActive";
	const TB_HISTORY_SERVICE_FD_DESCRIPTION                                     = "ServiceDescription";
	const TB_HISTORY_SERVICE_FD_HISTORY_SERVICE_ID                              = "ServiceId";
	const TB_HISTORY_SERVICE_FD_NAME                                            = "ServiceName";
	const TB_HISTORY_SERVICE_FD_TYPE                                            = "ServiceType";
	const TB_HISTORY_TICKET_FD_SERVICE                                          = "HistoryTicketService";
	const TB_INFORMATION_SERVICE                                                = "INFORMATION_SERVICE";
	const TB_INFORMATION_SERVICE_FD_ID                                          = "InformationServiceId";
	const TB_INFORMATION_SERVICE_FD_DESCRIPTION                                 = "InformationServiceDescription";
	const TB_INFORMATION_SERVICE_FD_SERVICE_ID                                  = "InformationServiceServiceId";
	const TB_INFORMATION_SERVICE_FD_VALUE                                       = "InformationServiceValue";
	const TB_IP_ADDRESS                                                         = "IP_ADDRESS";
	const TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION                               = "IpAddressDescription";
	const TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4                                      = "IpAddressIpv4";
	const TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6                                      = "IpAddressIpv6";
	const TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME                              = "IpAddressNetworkName";
	const TB_MONITORING                                                         = "MONITORING";
	const TB_MONITORING_FD_DESCRIPTION                                          = "MonitoringDescription";
	const TB_MONITORING_FD_ID                                                   = "MonitoringId";
	const TB_MONITORING_FD_NAME                                                 = "MonitoringName";
	const TB_MONITORING_FD_SERVICE                                              = "MonitoringService";
	const TB_MONITORING_FD_STATUS                                               = "MonitoringStatus";
	const TB_MONITORING_FD_TYPE                                                 = "MonitoringType";
	const TB_MONITORING_FD_TIME                                                 = "MonitoringTime";
	const TB_NETWORK                                                            = "NETWORK";
	const TB_NETWORK_FD_NETWORK_IP                                              = "NetworkIp";
	const TB_NETWORK_FD_NETWORK_NAME                                            = "NetworkName";
	const TB_NETWORK_FD_NETWORK_NETMASK                                         = "NetworkNetmask";
	const TB_SERVICE                                                            = "SERVICE";
	const TB_SERVICE_FD_ACTIVE                                                  = "ServiceActive";
	const TB_SERVICE_FD_CORPORATION                                             = "ServiceCorporation";
	const TB_SERVICE_FD_CORPORATION_CAN_CHANGE                                  = "ServiceCorporationCanChange";
	const TB_SERVICE_FD_DEPARTMENT                                              = "ServiceDepartment";
	const TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE                                   = "ServiceDepartmentCanChange";
	const TB_SERVICE_FD_DESCRIPTION                                             = "ServiceDescription";
	const TB_SERVICE_FD_NAME                                                    = "ServiceName";
	const TB_SERVICE_FD_SERVICE_ID                                              = "ServiceId";
	const TB_SERVICE_FD_TYPE                                                    = "ServiceType";	
	const TB_TICKET_FD_SERVICE                                                  = "TicketService";
	const TB_TYPE_ASSOC_USER_SERVICE                                            = "TYPE_ASSOC_USER_SERVICE";
	const TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION                             = "TypeAssocUserServiceDescription";
	const TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                      = "TypeAssocUserServiceId";
	const TB_TYPE_MONITORING                                                    = "TYPE_MONITORING";
	const TB_TYPE_MONITORING_FD_DESCRIPTION                                     = "TypeMonitoringDescription";
	const TB_TYPE_SERVICE                                                       = "TYPE_SERVICE";
	const TB_TYPE_SERVICE_FD_NAME                                               = "TypeServiceName";
	const TB_TYPE_SERVICE_FD_SLA                                                = "TypeServiceSLA";
	const TB_TYPE_STATUS_MONITORING                                             = "TYPE_STATUS_MONITORING";
	const TB_TYPE_STATUS_MONITORING_FD_DESCRIPTION                              = "TypeStatusMonitoringDescription";
	const TB_TYPE_TIME_MONITORING                                               = "TYPE_TIME_MONITORING";
	const TB_TYPE_TIME_MONITORING_FD_VALUE                                      = "TypeTimeMonitoringValue";
	const TB_TYPE_TIME_MONITORING_FD_DESCRIPTION                                = "TypeTimeMonitoringDescription";
	
	/* Funcionalidades Habilitadas / Desabilitadas */
	public $FunctionCheckAvailabilityEnabled                                    = TRUE;
	public $FunctionCheckBlacklistEnabled                                       = TRUE;
	public $FunctionCheckDnsRecordEnabled                                       = TRUE;
	public $FunctionCheckEmailExistsEnabled                                     = TRUE;
	public $FunctionCheckIpAddresIsInNetworkEnabled                             = TRUE;
	public $FunctionCheckPingServerEnabled                                      = TRUE;
	public $FunctionCheckPortStatusEnabled                                      = TRUE;
	public $FunctionGetCalculationNetMaskEnabled                                = TRUE;
	public $FunctionGetDnsRecordsEnabled                                        = TRUE;
	public $FunctionGetHostNameEnabled                                          = TRUE;
	public $FunctionGetIpAddressesEnabled                                       = TRUE;
	public $FunctionGetLocationEnabled                                          = TRUE;
	public $FunctionGetProtocolEnabled                                          = TRUE;
	public $FunctionGetRouteEnabled                                             = TRUE;
	public $FunctionGetServiceEnabled                                           = TRUE;
	public $FunctionGetWebSiteEnabled                                           = TRUE;
	public $FunctionGetWhoisEnabled                                             = TRUE;
	public $PageAboutEnabled                                                    = TRUE;
	public $PageAccountEnabled                                                  = TRUE;
	public $PageCorporationEnabled                                              = FALSE;
	public $PageAdminEnabled                                                    = TRUE;
	public $PageAdminCorporationEnabled                                         = TRUE;
	public $PageAdminCountryEnabled                                             = TRUE;
	public $PageAdminDepartmentEnabled                                          = TRUE;
	public $PageAdminMonitoringEnabled                                          = TRUE;
	public $PageAdminNotificationEnabled                                        = TRUE;
	public $PageAdminServiceEnabled                                             = TRUE;
	public $PageAdminSystemConfigurationEnabled                                 = TRUE;
	public $PageAdminTeamEnabled                                                = TRUE;
	public $PageAdminTechInfoEnabled                                            = TRUE;
	public $PageAdminTicketEnabled                                              = TRUE;
	public $PageAdminTypeAssocUserTeamEnabled                                   = TRUE;
	public $PageAdminTypeMonitoringEnabled                                      = TRUE;
	public $PageAdminTypeServiceEnabled                                         = TRUE;
	public $PageAdminTypeStatusMonitoringEnabled                                = TRUE;
	public $PageAdminTypeStatusTicketEnabled                                    = TRUE;
	public $PageAdminTypeTicketEnabled                                          = TRUE;
	public $PageAdminTypeUserEnabled                                            = TRUE;
	public $PageAdminUserEnabled                                                = TRUE;
	public $PageCheckEnabled                                                    = TRUE;
	public $PageDiagnosticToolsEnabled                                          = TRUE;
	public $PageGetEnabled                                                      = TRUE;
	public $PageHomeEnabled                                                     = TRUE;
	public $PageInstallEnabled                                                  = TRUE;
	public $PageLoginEnabled                                                    = TRUE;
	public $PageLoginTwoStepVerificationEnabled                                 = TRUE;
	public $PageNotFoundEnabled                                                 = TRUE;
	public $PageNotificationEnalbed                                             = TRUE;
	public $PagePasswordRecoveryEnabled                                         = TRUE;
	public $PagePasswordResetEnabled                                            = TRUE;
	public $PageRegisterEnabled                                                 = TRUE;
	public $PageRegisterConfirmationEnabled                                     = TRUE;
	public $PageResendConfirmationLinkEnabled                                   = TRUE;
	public $PageServiceEnabled                                                  = TRUE;
	public $PageServiceListEnabled                                              = TRUE;
	public $PageServiceListByCorporationEnabled                                 = TRUE;
	public $PageServiceListByDepartmentEnabled                                  = TRUE;
	public $PageServiceListByTypeAssocUserServiceEnabled                        = TRUE;
	public $PageServiceListByTypeServiceEnabled                                 = TRUE;
	public $PageServiceListByUserEnabled                                        = TRUE;
	public $PageServiceRegisterEnabled                                          = TRUE;
	public $PageServiceSelectEnabled                                            = TRUE;
	public $PageServiceUpdateEnabled                                            = TRUE;
	public $PageServiceViewEnabled                                              = TRUE;
	public $PageSupportEnabled                                                  = TRUE;
	public $PageSupportContactEnabled                                           = TRUE;
	public $PageTeamEnabled                                                     = TRUE;
	public $PageTeamListEnabled                                                 = TRUE;
	public $PageTeamRegisterEnabled                                             = TRUE;
	public $PageTeamSelectEnabled                                               = TRUE;
	public $PageTeamUpdateEnabled                                               = TRUE;
	public $PageTeamViewEnabled                                                 = TRUE;
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		parent::__construct();
		$this->SessionName = self::APPLICATION_INFRATOOLS;
    }
	
	//* Create */
	public static function __create()
    {
        if (!isset(self::$Instance) || strcmp(get_class(self::$Instance), __CLASS__) != 0) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
			if(self::$Instance->SetApplication() == ConfigInfraTools::RET_WARNING)
				echo '<script type="text/javascript">alert("A sessão terminou devido ao tempo inativo!");</script>';
        }
        return self::$Instance;
    }
	
	/**                               **/
	/************* METODOS *************/
	/**                               **/
	public static function GetPageConstant($Constant)
	{
		$Const = Parent::GetPageConstant($Constant);
		if($Const != ConfigInfraTools::RET_ERROR) return $Const;
		if(defined("ConfigInfraTools::" . strtoupper(implode(preg_split('/(?=[A-Z])/', $Constant, -1, PREG_SPLIT_NO_EMPTY), "_"))))
			return constant("ConfigInfraTools::" . strtoupper(implode(preg_split('/(?=[A-Z])/', $Constant, -1, PREG_SPLIT_NO_EMPTY), "_")));
	}
}
?>