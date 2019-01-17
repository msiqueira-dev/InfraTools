<?php

/************************************************************************
Class: ConfigInfraTools.php
Creation: 05/11/2013
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
	const PAGE_ADMIN_MONITORING                                         = "Page_Admin_Monitoring";
	const PAGE_ADMIN_MONITORING_LIST                                    = "Page_Admin_Monitoring_List";
	const PAGE_ADMIN_MONITORING_SELECT                                  = "Page_Admin_Monitoring_Select";
	const PAGE_ADMIN_MONITORING_UPDATE                                  = "Page_Admin_Monitoring_Update";
	const PAGE_ADMIN_MONITORING_VIEW                                    = "Page_Admin_Monitoring_View";
	const PAGE_ADMIN_SERVICE                                            = "Page_Admin_Service";
	const PAGE_ADMIN_SERVICE_LIST                                       = "Page_Admin_Service_List";
	const PAGE_ADMIN_SERVICE_REGISTER                                   = "Page_Admin_Service_Register";
	const PAGE_ADMIN_SERVICE_SELECT                                     = "Page_Admin_Service_Select";
	const PAGE_ADMIN_SERVICE_UPDATE                                     = "Page_Admin_Service_Update";
	const PAGE_ADMIN_SERVICE_VIEW                                       = "Page_Admin_Service_View";
	const PAGE_ADMIN_SERVICE_VIEW_LIST_USERS                            = "Page_Admin_Service_View_List_Users";
	const PAGE_ADMIN_SERVICE_VIEW_ASSOCIATE                             = "Page_Admin_Service_View_Associate";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_LIST                       = "Page_Admin_Service_View_Monitoring_List";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_REGISTER                   = "Page_Admin_Service_View_Monitoring_Register";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_SELECT                     = "Page_Admin_Service_View_Monitoring_Select";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_UPDATE                     = "Page_Admin_Service_View_Monitoring_Update";
	const PAGE_ADMIN_SERVICE_VIEW_MONITORING_VIEW                       = "Page_Admin_Service_View_Monitoring_View";
	const PAGE_ADMIN_TYPE_MONITORING                                    = "Page_Admin_Type_Monitoring";
	const PAGE_ADMIN_TYPE_MONITORING_LIST                               = "Page_Admin_Type_Monitoring_List";
	const PAGE_ADMIN_TYPE_MONITORING_REGISTER                           = "Page_Admin_Type_Monitoring_Register";
	const PAGE_ADMIN_TYPE_MONITORING_SELECT                             = "Page_Admin_Type_Monitoring_Select";
	const PAGE_ADMIN_TYPE_MONITORING_UPDATE                             = "Page_Admin_Type_Monitoring_Update";
	const PAGE_ADMIN_TYPE_MONITORING_VIEW                               = "Page_Admin_Type_Monitoring_View";
	const PAGE_ADMIN_TYPE_SERVICE                                       = "Page_Admin_Type_Service";
	const PAGE_ADMIN_TYPE_SERVICE_LIST                                  = "Page_Admin_Type_Service_List";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER                              = "Page_Admin_Type_Service_Register";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT                                = "Page_Admin_Type_Service_Select";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE                                = "Page_Admin_Type_Service_Update";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW                                  = "Page_Admin_Type_Service_View";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_LIST_SERVICES                    = "Page_Admin_Type_Service_View_List_Services";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING                             = "Page_Admin_Type_Status_Monitoring";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_LIST                        = "Page_Admin_Type_Status_Monitoring_List";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_REGISTER                    = "Page_Admin_Type_Status_Monitoring_Register";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_SELECT                      = "Page_Admin_Type_Status_Monitoring_Select";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_UPDATE                      = "Page_Admin_Type_Status_Monitoring_Update";
	const PAGE_ADMIN_TYPE_STATUS_MONITORING_VIEW                        = "Page_Admin_Type_Status_Monitoring_View";
	const PAGE_CHECK                                                    = "Page_Check";
	const PAGE_DIAGNOSTIC_TOOLS                                         = "Page_Diagnostic_Tools";
	const PAGE_GET                                                      = "Page_Get";
	const PAGE_SERVICE                                                  = "Page_Service";
	const PAGE_SERVICE_LIST                                             = "Page_Service_List";
	const PAGE_SERVICE_LIST_BY_CORPORATION                              = "Page_Service_List_By_Corporation";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT                               = "Page_Service_List_By_Department";
	const PAGE_SERVICE_LIST_BY_NAME                                     = "Page_Service_List_By_Name";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE                  = "Page_Service_List_By_Type_Assoc_User_Service";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE                             = "Page_Service_List_By_Type_Service";
	const PAGE_SERVICE_LIST_BY_USER                                     = "Page_Service_List_By_User";
	const PAGE_SERVICE_REGISTER                                         = "Page_Service_Register";
	const PAGE_SERVICE_SELECT                                           = "Page_Service_Select";
	const PAGE_SERVICE_UPDATE                                           = "Page_Service_Update";
	const PAGE_SERVICE_VIEW                                             = "Page_Service_View";
	const PAGE_SERVICE_VIEW_ASSOCIATE                                   = "Page_Service_View_Associate";
	const PAGE_SERVICE_VIEW_MONITORING_LIST                             = "Page_Service_View_Monitoring_List";
	const PAGE_SERVICE_VIEW_MONITORING_REGISTER                         = "Page_Service_View_Monitoring_Register";
	const PAGE_SERVICE_VIEW_MONITORING_SELECT                           = "Page_Service_View_Monitoring_Select";
	const PAGE_SERVICE_VIEW_MONITORING_UPDATE                           = "Page_Service_View_Monitoring_Update";
	const PAGE_SERVICE_VIEW_MONITORING_VIEW                             = "Page_Service_View_Monitoring_View";
	const PAGE_SUPPORT                                                  = "Page_Support";
	const PAGE_SUPPORT_TICKET_ASSOCIATE                                 = "Page_Admin_Ticket_Associate";
	const PAGE_SUPPORT_TICKET_LIST                                      = "Page_Admin_Ticket_List";
	const PAGE_SUPPORT_TICKET_REGISTER                                  = "Page_Admin_Ticket_Register";
	const PAGE_SUPPORT_TICKET_SELECT                                    = "Page_Admin_Ticket_Select";
	const PAGE_SUPPORT_TICKET_UPDATE                                    = "Page_Admin_Ticket_Update";
	const PAGE_SUPPORT_TICKET_VIEW                                      = "Page_Admin_Ticket_View";
	
	/* Constantes gerais usadas pelo site */
	const ADDRESS_INFRATOOLS_DOMAIN                                     = "";
	const APPLICATION_INFRATOOLS                                        = "InfraTools";
	const DIV_RADIO                                                     = "DivRadio";
	const DIV_RADIO_CORPORATION                                         = "DivRadioCorporation";
	const DIV_RADIO_SERVICE_ID                                          = "DivRadioServiceId";
	const DIV_RADIO_SERVICE_NAME                                        = "DivRadioServiceName";
	const DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NUMBER                  = "DivRadioSystemConfigurationOptionNumber";
	const DIV_RADIO_SYSTEM_CONFIGURATION_OPTION_NAME                    = "DivRadioSystemConfigurationOptionName";
	const EMAIL_INFRATOOLS_LOCAL_PASSWORD                               = "";
	const EMAIL_INFRATOOLS_TEST_PASSWORD                                = "";
	const EMAIL_INFRATOOLS_PRODUCTION_PASSWORD                          = "";
	const EXCEPTION_INFORMATION_SERVICE_DESCRIPTION                     = "ExceptionInformationServiceDescription";
	const EXCEPTION_INFORMATION_SERVICE_ID                              = "ExceptionInformationServiceId";
	const EXCEPTION_INFORMATION_SERVICE_SERVICE                         = "ExceptionInformationServiceService";
	const EXCEPTION_INFORMATION_SERVICE_VALUE                           = "ExceptionInformationServiceValue";
	const EXCEPTION_MONITORING_DESCRITPION                              = "ExceptionMonitoringDescription";
	const EXCEPTION_MONITORING_ID                                       = "ExceptionMonitoringId";
	const EXCEPTION_MONITORING_NAME                                     = "ExceptionMonitoringName";
	const EXCEPTION_MONITORING_SERVICE                                  = "ExceptionMonitoringService";
	const EXCEPTION_MONITORING_STATUS                                   = "ExceptionMonitoringStatus";
	const EXCEPTION_MONITORING_TIME                                     = "ExceptionMonitoringTime";
	const EXCEPTION_MONITORING_TYPE                                     = "ExceptionMonitoringType";
	const EXCEPTION_SERVICE_ACTIVE                                      = "ExceptionServiceActive";
	const EXCEPTION_SERVICE_CORPORATION_CAN_CHANGE                      = "ExeceptionCorporationCanChange";
	const EXCEPTION_SERVICE_DEPARTMENT_CAN_CHANGE                       = "ExeceptionDepartmentCanChange";
	const EXCEPTION_SERVICE_DESCRIPTION                                 = "ExceptionServiceDescription";
	const EXCEPTION_SERVICE_ID                                          = "ExceptionServiceId";
	const EXCEPTION_SERVICE_NAME                                        = "ExceptionServiceName";
	const EXCEPTION_SERVICE_TYPE                                        = "ExceptionServiceType";
	const EXCEPTION_TICKET_SERVICE                                      = "ExceptionTicketService";
	const EXCEPTION_TYPE_SERVICE_NAME                                   = "ExceptionTypeServiceName";
	const EXCEPTION_TYPE_ASSOC_USER_SERVICE_DESCRIPTION                 = "ExceptionTypeAssocUserServiceDescription";
	const EXCEPTION_TYPE_ASSOC_USER_SERVICE_ID                          = "ExceptionTypeAssocUserServiceId";
	const FORM_FIELD_ID                                                 = "FormInputId";
	const FORM_FIELD_SERVICE_ACTIVE                                     = "FormFieldServiceActive";
	const FORM_FIELD_SERVICE_CORPORATION_CAN_CHANGE                     = "FormFieldServiceCorporationCanChange";
	const FORM_FIELD_SERVICE_DEPARTMENT_CAN_CHANGE                      = "FormFieldServiceDepartmentCanChange";
	const FORM_FIELD_SERVICE_DESCRIPTION                                = "FormFieldServiceDescription";
	const FORM_FIELD_SERVICE_ID                                         = "FormFieldServiceId";
	const FORM_FIELD_SERVICE_ID_RADIO                                   = "FormFieldServiceIdRadio";
	const FORM_FIELD_SERVICE_ID_RADIO_DIV                               = "FormFieldServiceIdRadioDiv";
	const FORM_FIELD_SERVICE_NAME                                       = "FormFieldServiceName";
	const FORM_FIELD_SERVICE_NAME_RADIO                                 = "FormFieldServiceNameRadio";
	const FORM_FIELD_SERVICE_NAME_RADIO_DIV                             = "FormFieldServiceNameRadioDiv";
	const FORM_FIELD_SERVICE_RADIO                                      = "FormFieldServiceRadio";
	const FORM_FIELD_SERVICE_TYPE                                       = "FormFieldServiceType";
	const FORM_FIELD_TYPE_SERVICE_NAME                                  = "FormFieldTypeServiceName";
	const FORM_FIELD_TYPE_SERVICE_SLA                                   = "FormFieldTypeServiceSLA";
	const FORM_GOOGLE_MAPS_LATITUDE                                     = "RegisterGoogleMapsLatitude";
	const FORM_GOOGLE_MAPS_LONGITUDE                                    = "RegisterGoogleMapsLongitude";
	const FORM_HEADER_LANGUAGE                                          = "FormHeaderLanguage";
	const FORM_HEADER_PAGES                                             = "PostBackForm";
	const FORM_HEADER_LAYOUT                                            = "FormHeaderLayout";
	const FORM_HEADER_DEBUG                                             = "FormHeaderDebug";
	const FORM_INSTALL                                                  = "FormInstall";
	const FORM_INSTALL_EXPORT_SUBMIT                                    = "FormInstallExportSubmit";
	const FORM_INSTALL_IMPORT_SUBMIT                                    = "FormInstallImportSubmit";
	const FORM_INSTALL_IMPORT_SUBMIT_HIDDEN                             = "FormInstallImportSubmitHidden";
	const FORM_INSTALL_NEW_SUBMIT                                       = "FormInstallNewSubmit";
	const FORM_INSTALL_REINSTALL_SUBMIT                                 = "FormInstallReinstallSubmit";
	const FORM_SERVICE                                                  = "FormService";
	const FORM_SERVICE_LIST                                             = "FormServiceList";
	const FORM_SERVICE_LIST_BACK                                        = "FormServiceListBack";
	const FORM_SERVICE_LIST_FORWARD                                     = "FormServiceListForward";
	const FORM_SERVICE_LIST_SELECT                                      = "FormServiceListSelect";
	const FORM_SERVICE_LIST_SELECT_BY_ID                                = "FormServiceListSelectById";
	const FORM_SERVICE_LIST_SELECT_BY_ID_SUBMIT                         = "FormServiceListSelectByIdSubmit";
	const FORM_SERVICE_LIST_SELECT_BY_NAME_AND_ID                       = "FormServiceListSelectByNameAndId";
	const FORM_SERVICE_LIST_SELECT_BY_NAME_AND_ID_SUBMIT                = "FormServiceListSelectByNameAndIdSubmit";
	const FORM_SERVICE_LIST_SELECT_SUBMIT                               = "FormServiceListSelectSubmit";
	const FORM_SERVICE_LIST_BY_CORPORATION                              = "FormServiceListByCorporation";
	const FORM_SERVICE_LIST_BY_CORPORATION_BACK                         = "FormServiceListByCorporationBack";
	const FORM_SERVICE_LIST_BY_CORPORATION_FORWARD                      = "FormServiceListByCorporationFoward";
	const FORM_SERVICE_LIST_BY_CORPORATION_SELECT_BY_ID                 = "FormServiceListByCorporationSelectById";
	const FORM_SERVICE_LIST_BY_CORPORATION_SELECT_BY_ID_SUBMIT          = "FormServiceListByCorporationSelectByIdSubmit";
	const FORM_SERVICE_LIST_BY_CORPORATION_SELECT_BY_NAME_AND_ID        = "FormServiceListByCorporationSelectByNameAndId";
	const FORM_SERVICE_LIST_BY_CORPORATION_SELECT_BY_NAME_AND_ID_SUBMIT = "FormServiceListByCorporationSelectByNameAndIdSubmit";
	const FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION           = "FormServiceListByCorporationSelectCorporation";
	const FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT    = "FormServiceListByCorporationSelectCorporationSubmit";
	const FORM_SERVICE_LIST_BY_DEPARTMENT                               = "FormServiceListByDepartment";
	const FORM_SERVICE_LIST_BY_DEPARTMENT_BACK                          = "FormServiceListByDepartmentBack";
	const FORM_SERVICE_LIST_BY_DEPARTMENT_FORWARD                       = "FormServiceListByDepartmentForward";
	const FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_BY_ID                  = "FormServiceListByDepartmentSelectById";
	const FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_BY_ID_SUBMIT           = "FormServiceListByDepartmentSelectByIdSubmit";
	const FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_BY_NAME_AND_ID         = "FormServiceListByDepartmentSelectByNameAndId";
	const FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_BY_NAME_AND_ID_SUBMIT  = "FormServiceListByDepartmentSelectByNameAndIdSubmit";
	const FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_DEPARTMENT             = "FormServiceListByDepartmentSelectDepartment";
	const FORM_SERVICE_LIST_BY_DEPARTMENT_SELECT_DEPARTMENT_SUBMIT      = "FormServiceListByDepartmentSelectDepartmentSubmit";
	const FORM_SERVICE_LIST_BY_NAME                                     = "FormServiceListByName";
	const FORM_SERVICE_LIST_BY_NAME_BACK                                = "FormServiceListByNameBack";
	const FORM_SERVICE_LIST_BY_NAME_FORWARD                             = "FormServiceListByNameForward";
	const FORM_SERVICE_LIST_BY_NAME_SELECT_BY_ID                        = "FormServiceListByNameSelectById";
	const FORM_SERVICE_LIST_BY_NAME_SELECT_BY_ID_SUBMIT                 = "FormServiceListByNameSelectByIdSubmit";
	const FORM_SERVICE_LIST_BY_NAME_SELECT_BY_NAME_AND_ID               = "FormServiceListByNameSelectByNameAndId";
	const FORM_SERVICE_LIST_BY_NAME_SELECT_BY_NAME_AND_ID_SUBMIT        = "FormServiceListByNameSelectByNameAndIdSubmit";
	const FORM_SERVICE_LIST_BY_NAME_SELECT_DEPARTMENT                   = "FormServiceListByNameSelectDepartment";
	const FORM_SERVICE_LIST_BY_NAME_SELECT_DEPARTMENT_SUBMIT            = "FormServiceListByNameSelectDepartmentSubmit";
	const FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE                  = "FormServiceListByTypeAssocUserService";
	const FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_BACK             = "FormServiceListByTypeAssocUserServiceBack";
	const FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_FORWARD          = "FormServiceListByTypeAssocUserServiceForward";
	const FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID     = "FormServiceListByTypeAssocUserServiceSelectById";
	const FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_ID_SUBMIT          
		  = "FormServiceListByTypeAssocUserServiceSelectByIdSubmit";
	const FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_NAME_AND_ID        
		  = "FormServiceListByTypeAssocUserServiceSelectByNameAndId";
	const FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_BY_NAME_AND_ID_SUBMIT 
		  = "FormServiceListByTypeAssocUserServiceSelectByNameAndIdSubmit";
	const FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE
		  ="FormServiceListByTypeAssocUserServiceSelectByTypeAssocUserService";
	const FORM_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE_SUBMIT
		  ="FormServiceListByTypeAssocUserServiceSelectByTypeAssocUserServiceSubmit";
	const FORM_SERVICE_LIST_BY_TYPE_SERVICE                             = "FormServiceListByTypeService";
	const FORM_SERVICE_LIST_BY_TYPE_SERVICE_BACK                        = "FormServiceListByTypeServiceBack";
	const FORM_SERVICE_LIST_BY_TYPE_SERVICE_FORWARD                     = "FormServiceListByTypeServiceForward";
	const FORM_SERVICE_LIST_BY_TYPE_SERVICE_SELECT_BY_ID                = "FormServiceListByTypeServiceSelectById";
	const FORM_SERVICE_LIST_BY_TYPE_SERVICE_SELECT_BY_ID_SUBMIT         = "FormServiceListByTypeServiceSelectById";
	const FORM_SERVICE_LIST_BY_TYPE_SERVICE_SELECT_BY_NAME_AND_ID       = "FormServiceListByTypeServiceSelectByNameAndId";
	const FORM_SERVICE_LIST_BY_TYPE_SERVICE_SELECT_BY_NAME_AND_ID_SUBMIT= "FormServiceListByTypeServiceSelectByNameAndIdSubmit";
	const FORM_SERVICE_LIST_BY_TYPE_SERVICE_SELECT_TYPE_SERVICE         = "FormServiceListByTypeServiceSelectTypeService";
	const FORM_SERVICE_LIST_BY_TYPE_SERVICE_SELECT_TYPE_SERVICE_SUBMIT  = "FormServiceListByTypeServiceSelectTypeServiceSubmit";     
	const FORM_SERVICE_LIST_BY_USER                                     = "FormServiceListByUser";
	const FORM_SERVICE_LIST_BY_USER_BACK                                = "FormServiceListByUserBack";
	const FORM_SERVICE_LIST_BY_USER_FORWARD                             = "FormServiceListByUserForward";
	const FORM_SERVICE_LIST_BY_USER_SELECT_BY_ID                        = "FormServiceListByUserSelectById";
	const FORM_SERVICE_LIST_BY_USER_SELECT_BY_ID_SUBMIT                 = "FormServiceListByUserSelectByIdSubmit";
	const FORM_SERVICE_LIST_BY_USER_SELECT_BY_NAME_AND_ID               = "FormServiceListByUserSelectByNameAndId";
	const FORM_SERVICE_LIST_BY_USER_SELECT_BY_NAME_AND_ID_SUBMIT        = "FormServiceListByUserSelectByNameAndIdSubmit";
	const FORM_SERVIVE_VIEW_LIST_USERS                                  = "FormServiceViewListUsers";
	const FORM_SERVICE_VIEW_LIST_USERS_FORM                             = "FormServiceViewListUsersForm";
	const FORM_SERVICE_VIEW_LIST_USERS_SUBMIT                           = "FormServiceViewListUsersSubmit";
	const FORM_SERVICE_VIEW_LIST_USERS_SUBMIT_BACK                      = "FormServiceViewListUsersSubmitBack";
	const FORM_SERVICE_VIEW_LIST_USERS_SUBMIT_FORWARD                   = "FormServiceViewListUsersSubmitForward";
	const FORM_SERVICE_REGISTER                                         = "FormServiceRegister";
	const FORM_SERVICE_REGISTER_CANCEL                                  = "FormServiceRegisterCancel";
	const FORM_SERVICE_REGISTER_FORM                                    = "FormServiceRegisterForm";
	const FORM_SERVICE_REGISTER_SUBMIT                                  = "FormServiceRegisterSubmit";
	const FORM_SERVICE_SELECT                                           = "FormServiceSelect";
	const FORM_SERVICE_SELECT_FORM                                      = "FormServiceSelectForm";
	const FORM_SERVICE_SELECT_SUBMIT                                    = "FormServiceSelectSubmit";
	const FORM_SERVICE_UPDATE_CANCEL                                    = "FormServiceUpdateCancel";
	const FORM_SERVICE_UPDATE_FORM                                      = "FormServiceUpdateForm";
	const FORM_SERVICE_UPDATE_SUBMIT                                    = "FormServiceUpdateSubmit";
	const FORM_SERVICE_VIEW                                             = "FormServiceView";
	const FORM_SERVICE_VIEW_CANCEL                                      = "FormServiceViewCancel";
	const FORM_SERVICE_VIEW_DELETE                                      = "FormServiceViewDelete";
	const FORM_SERVICE_VIEW_DELETE_HIDDEN_ID                            = "FormServiceViewDeleteHidden";
	const FORM_SERVICE_VIEW_DELETE_SUBMIT                               = "FormServiceViewDeleteSubmit";
	const FORM_SERVICE_VIEW_LIST_USERS                                  = "FormServiceViewListUsers";
	const FORM_SERVICE_VIEW_LIST_USERS_BACK                             = "FormServiceViewListUsersBack";
	const FORM_SERVICE_VIEW_LIST_USERS_FORWARD                          = "FormServiceViewListUsersForward";
	const FORM_SERVICE_VIEW_UPDATE                                      = "FormServiceViewUpdate";
	const FORM_SERVICE_VIEW_UPDATE_HIDDEN_ID                            = "FormServiceViewUpdateHiddenId";
	const FORM_SERVICE_VIEW_UPDATE_SUBMIT                               = "FormServiceViewUpdateSubmit";
	const FORM_SUBMIT_BACK                                              = "FormSubmitBack";
	const FORM_TECH_INFO                                                = "FormTechInfo";
	const FORM_TECH_INFO_LIST                                           = "FormTechInfoList";	
	const FORM_TYPE_MONITORING                                          = "FormTypeMonitoring";
	const FORM_TYPE_MONITORING_LIST                                     = "FormTypeMonitoringList";
	const FORM_TYPE_MONITORING_LIST_BACK                                = "FormTypeMonitoringListBack";
	const FORM_TYPE_MONITORING_LIST_FORM                                = "FormTypeMonitoringListForm";
	const FORM_TYPE_MONITORING_LIST_FORWARD                             = "FormTypeMonitoringListForward";
	const FORM_TYPE_MONITORING_LIST_SELECT_SUBMIT                       = "FormTypeMonitoringListSelectSubmit";
	const FORM_TYPE_MONITORING_REGISTER                                 = "FormTypeMonitoringReturnRegister";
	const FORM_TYPE_MONITORING_REGISTER_CANCEL                          = "FormTypeMonitoringReturnCancel";
	const FORM_TYPE_MONITORING_REGISTER_FORM                            = "FormTypeMonitoringReturnRegisterForm";
	const FORM_TYPE_MONITORING_REGISTER_SUBMIT                          = "FormTypeMonitoringReturnSubmit";
	const FORM_TYPE_MONITORING_RETURN_NOT_FOUND                         = "FormTypeMonitoringReturnNotFound";
	const FORM_TYPE_MONITORING_SELECT                                   = "FormTypeMonitoringSelect";
	const FORM_TYPE_MONITORING_SELECT_FORM                              = "FormTypeMonitoringSelectForm";
	const FORM_TYPE_MONITORING_SELECT_SUBMIT                            = "FormTypeMonitoringSelectSubmit";
	const FORM_TYPE_MONITORING_UPDATE                                   = "FormTypeMonitoringUpdate";	
	const FORM_TYPE_MONITORING_UPDATE_CANCEL                            = "FormTypeMonitoringUpdateCancel";
	const FORM_TYPE_MONITORING_UPDATE_FORM                              = "FormTypeMonitoringUpdateForm";
	const FORM_TYPE_MONITORING_UPDATE_SUBMIT                            = "FormTypeMonitoringUpdateSubmit";
	const FORM_TYPE_MONITORING_VIEW                                     = "FormTypeMonitoringView";
	const FORM_TYPE_MONITORING_VIEW_DELETE                              = "FormTypeMonitoringViewDelete";
	const FORM_TYPE_MONITORING_VIEW_DELETE_SUBMIT                       = "FormTypeMonitoringViewDeleteSubmit";
	const FORM_TYPE_MONITORING_VIEW_LIST_USERS                          = "FormTypeMonitoringViewListUsers";
	const FORM_TYPE_MONITORING_VIEW_LIST_USERS_FORM                     = "FormTypeMonitoringViewListUsersForm";
	const FORM_TYPE_MONITORING_VIEW_LIST_USERS_SUBMIT                   = "FormTypeMonitoringViewListUsersSubmit";
	const FORM_TYPE_MONITORING_VIEW_LIST_USERS_SUBMIT_BACK              = "FormTypeMonitoringViewListUsersSubmitBack";
	const FORM_TYPE_MONITORING_VIEW_LIST_USERS_SUBMIT_FORWARD           = "FormTypeMonitoringViewListUsersSubmitForward";
	const FORM_TYPE_MONITORING_VIEW_UPDATE                              = "FormTypeMonitoringViewUpdate";
	const FORM_TYPE_MONITORING_VIEW_UPDATE_SUBMIT                       = "FormTypeMonitoringViewUpdateSubmit";
	const FORM_TYPE_SERVICE                                             = "FormTypeService";
	const FORM_TYPE_SERVICE_LIST                                        = "FormTypeServiceList";
	const FORM_TYPE_SERVICE_LIST_BACK                                   = "FormTypeServiceListBack";
	const FORM_TYPE_SERVICE_LIST_FORWARD                                = "FormTypeServiceListForward";
	const FORM_TYPE_SERVICE_REGISTER                                    = "FormTypeServiceReturnRegister";
	const FORM_TYPE_SERVICE_REGISTER_CANCEL                             = "FormTypeServiceReturnCancel";
	const FORM_TYPE_SERVICE_REGISTER_SUBMIT                             = "FormTypeServiceReturnSubmit";
	const FORM_TYPE_SERVICE_SELECT                                      = "FormTypeServiceSelect";
	const FORM_TYPE_SERVICE_SELECT_FORM                                 = "FormTypeServiceSelectForm";
	const FORM_TYPE_SERVICE_SELECT_SUBMIT                               = "FormTypeServiceSelectSubmit";
	const FORM_TYPE_SERVICE_UPDATE                                      = "FormTypeServiceUpdate";	
	const FORM_TYPE_SERVICE_UPDATE_CANCEL                               = "FormTypeServiceUpdateCancel";
	const FORM_TYPE_SERVICE_UPDATE_SUBMIT                               = "FormTypeServiceUpdateSubmit";
	const FORM_TYPE_SERVICE_VIEW                                        = "FormTypeServiceView";
	const FORM_TYPE_SERVICE_VIEW_LIST_SERVICES                          = "FormTypeServiceViewListServices";
	const FORM_TYPE_SERVICE_VIEW_LIST_SERVICES_BACK                     = "FormTypeServiceViewListServiceBack";
	const FORM_TYPE_SERVICE_VIEW_LIST_SERVICES_FORWARD                  = "FormTypeServiceViewListServiceForward";
	const FORM_TYPE_SERVICE_VIEW_DELETE_SUBMIT                          = "FormTypeServiceViewDeleteSubmit";
	const FORM_TYPE_SERVICE_VIEW_UPDATE_SUBMIT                          = "FormTypeServiceViewUpdateSubmit";
	const FORM_TYPE_STATUS_MONITORING                                   = "FormTypeStatusMonitoring";
	const FORM_TYPE_STATUS_MONITORING_LIST                              = "FormTypeStatusMonitoringList";
	const FORM_TYPE_STATUS_MONITORING_LIST_BACK                         = "FormTypeStatusMonitoringListBack";
	const FORM_TYPE_STATUS_MONITORING_LIST_FORWARD                      = "FormTypeStatusMonitoringListForward";
	const FORM_TYPE_STATUS_MONITORING_LIST_SELECT_SUBMIT                = "FormTypeStatusMonitoringListSelectSubmit";
	const FORM_TYPE_STATUS_MONITORING_REGISTER                          = "FormTypeStatusMonitoringReturnRegister";
	const FORM_TYPE_STATUS_MONITORING_REGISTER_CANCEL                   = "FormTypeStatusMonitoringReturnCancel";
	const FORM_TYPE_STATUS_MONITORING_REGISTER_SUBMIT                   = "FormTypeStatusMonitoringReturnSubmit";
	const FORM_TYPE_STATUS_MONITORING_RETURN_NOT_FOUND                  = "FormTypeStatusMonitoringReturnNotFound";
	const FORM_TYPE_STATUS_MONITORING_SELECT                            = "FormTypeStatusMonitoringSelect";
	const FORM_TYPE_STATUS_MONITORING_SELECT_SUBMIT                     = "FormTypeStatusMonitoringSelectSubmit";
	const FORM_TYPE_STATUS_MONITORING_UPDATE                            = "FormTypeStatusMonitoringUpdate";	
	const FORM_TYPE_STATUS_MONITORING_UPDATE_CANCEL                     = "FormTypeStatusMonitoringUpdateCancel";
	const FORM_TYPE_STATUS_MONITORING_UPDATE_SUBMIT                     = "FormTypeStatusMonitoringUpdateSubmit";
	const FORM_TYPE_STATUS_MONITORING_VIEW                              = "FormTypeStatusMonitoringView";
	const FORM_TYPE_STATUS_MONITORING_VIEW_DELETE_SUBMIT                = "FormTypeStatusMonitoringViewDeleteSubmit";
	const FORM_TYPE_STATUS_MONITORING_VIEW_UPDATE_SUBMIT                = "FormTypeStatusMonitoringViewUpdateSubmit";
	const FORM_USER                                                     = "FormUser";
	const FORM_USER_CHANGE_ASSOC_USER_CORPORATION                       = "FormUserChangeAssocUserCorporation";
	const FORM_USER_CHANGE_ASSOC_USER_CORPORATION_CANCEL                = "FormUserChangeAssocUserCorporationCancel";
	const FORM_USER_CHANGE_ASSOC_USER_CORPORATION_SUBMIT                = "FormUserChangeAssocUserCorporationSubmit";
	const FORM_USER_CHANGE_CORPORATION                                  = "FormUserChangeCorporation";
	const FORM_USER_CHANGE_CORPORATION_CANCEL                           = "FormUserChangeCorporationCancel";
	const FORM_USER_CHANGE_CORPORATION_SUBMIT                           = "FormUserChangeCorporationSubmit";
	const FORM_USER_CHANGE_USER_TYPE                                    = "FormUserChangeUserType";
	const FORM_USER_CHANGE_USER_TYPE_CANCEL                             = "FormUserChangeUserTypeCancel";
	const FORM_USER_CHANGE_USER_TYPE_SELECT                             = "FormUserChangeUserTypeSelect";
	const FORM_USER_CHANGE_USER_TYPE_SUBMIT                             = "FormUserChangeUserTypeSubmit";
	const MYSQL_ASSOC_USER_SERVICE_CHECK_USER_TYPE_ADMINISTRATOR_FAILED 
		  = "RetMySqlAssocUserServiceCheckUserTypeAdministratorFailed";
	const MYSQL_ASSOC_USER_SERVICE_CHECK_USER_TYPE_ADMINISTRATOR_FETCH_FAILED 
		  = "RetMySqlAssocUserServiceCheckUserTypeAdministratorFetchFailed";
	const MYSQL_ASSOC_USER_SERVICE_DELETE_BY_ASSOC_USER_SERVICE_ID_FAILED          
		  = "RetMySqlAssocUserServiceDeleteByAssocUserServiceId";
	const MYSQL_ASSOC_USER_SERVICE_DELETE_BY_ASSOC_USER_SERVICE_ID_FAILED_NOT_FOUND          
		  = "RetMySqlAssocUserServiceDeleteByAssocUserServiceIdNotFound";
	const MYSQL_ASSOC_USER_SERVICE_DELETE_BY_ASSOC_USER_SERVICE_ID_AND_USER_EMAIL_FAILED          
		  = "RetMySqlAssocUserServiceDeleteByAssocUserServiceIdAndUserEmail";
	const MYSQL_ASSOC_USER_SERVICE_DELETE_BY_ASSOC_USER_SERVICE_ID_AND_USER_EMAIL_FAILED_NOT_FOUND          
		  = "RetMySqlAssocUserServiceDeleteByAssocUserServiceIdAndUserEmailNotFound";
	const MYSQL_ASSOC_USER_SERVICE_SELECT_BY_ASSOC_USER_SERVICE_ID_FAILED                 
		  = "RetMySqlAssocUserServiceSelectByAssocUserServiceIdFailed";
	const MYSQL_ASSOC_USER_SERVICE_SELECT_BY_ASSOC_USER_SERVICE_ID_FETCH_FAILED           
		  = "RetMySqlAssocUserServiceSelectByAssocUserServiceIdFetchFailed";
	const MYSQL_SERVICE_DELETE_BY_SERVICE_ID_FAILED                     = "RetMySqlServiceDeleteByServiceIdFailed";
	const MYSQL_SERVICE_DELETE_BY_SERVICE_ID_FAILED_NOT_FOUND           = "RetMySqlServiceDeleteByServiceIdFailedNotFound";
	const MYSQL_SERVICE_INSERT_FAILED                                   = "RetMySqlServiceInsertFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FAILED                 = "RetMySqlServiceSelectByServiceActiveFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_FETCH_FAILED           = "RetMySqlServiceSelectByServiceActiveFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_USER_FAILED            = "RetMySqlServiceSelectByServiceActiveUserFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_ACTIVE_USER_FETCH_FAILED      = "RetMySqlServiceSelectByServiceActiveUserFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_FAILED            = "RetMySqlServiceSelectByServiceCorporationFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_FETCH_FAILED      = "RetMySqlServiceSelectByServiceCorporationFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_USER_FAILED       = "RetMySqlServiceSelectByServiceCorporationUserFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_CORPORATION_USER_FETCH_FAILED = "RetMySqlServiceSelectByServiceCorporationUserFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FAILED             = "RetMySqlServiceSelectByServiceDepartmentFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_FETCH_FAILED       = "RetMySqlServiceSelectByServiceDepartmentFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_USER_FAILED        = "RetMySqlServiceSelectByServiceDepartmentUserFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_DEPARTMENT_USER_FETCH_FAILED  = "RetMySqlServiceSelectByServiceDepartmentUserFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_ID_FAILED                     = "RetMySqlServiceSelectByServiceIdFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FAILED                   = "RetMySqlServiceSelectByServiceNameFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_FETCH_FAILED             = "RetMySqlServiceSelectByServiceNameFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_USER_FAILED              = "RetMySqlServiceSelectByServiceNameUserFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_NAME_USER_FETCH_FAILED        = "RetMySqlServiceSelectByServiceNameUserFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FAILED                   = "RetMySqlServiceSelectByServiceTypeFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_FETCH_FAILED             = "RetMySqlServiceSelectByServiceTypeFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FAILED        = "RetMySqlServiceSelectByTypeAssocUserServiceFailed";
	const MYSQL_SERVICE_SELECT_BY_TYPE_ASSOC_USER_SERVICE_FETCH_FAILED  = "RetMySqlServiceSelectByTypeAssocUserServiceFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_USER_FAILED              = "RetMySqlServiceSelectByServiceTypeUserFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_TYPE_USER_FETCH_FAILED        = "RetMySqlServiceSelectByServiceTypeUserFetchFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_USER_FAILED                   = "RetMySqlServiceSelectByServiceUserFailed";
	const MYSQL_SERVICE_SELECT_BY_SERVICE_USER_FETCH_FAILED             = "RetMySqlServiceSelectByServiceUserFetchFailed";
	const MYSQL_SERVICE_SELECT_FAILED                                   = "RetMySqlServiceSelectFailed";
	const MYSQL_SERVICE_SELECT_FETCH_FAILED                             = "RetMySqlServiceSelectFetchFailed";
	const MYSQL_SERVICE_UPDATE_BY_SERVICE_ID_FAILED                     = "RetMySqlServiceUpdateByServiceIdFailed";
	const MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FAILED                   = "RetMySqlTypeAssocUserServiceSelectFailed";
	const MYSQL_TYPE_ASSOC_USER_SERVICE_SELECT_FETCH_FAILED             = "RetMySqlTypeAssocUserServiceSelectFetchFailed";
	const MYSQL_TYPE_SERVICE_SELECT_FAILED                              = "RetMySqlTypeServiceSelectFailed";
	const MYSQL_TYPE_SERVICE_SELECT_FETCH_FAILED                        = "RetMySqlTypeServiceSelectFetchFailed";
	const SESS_ADMIN_SERVICE                                            = "SessionAdminService";
	const SESS_ADMIN_TYPE_SERVICE                                       = "SessionAdminTypeService";
	const TABLE_ASSOC_IP_ADDRESS_SERVICE                                = "ASSOC_IP_ADDRESS_SERVICE";
	const TABLE_ASSOC_IP_ADDRESS_SERVICE_FIELD_SERVICE_ID               = "AssocIpAddressServiceServiceId";
	const TABLE_ASSOC_IP_ADDRESS_SERVICE_FIELD_IP                       = "AssocIpAddressServiceIp";
	const TABLE_ASSOC_URL_ADDRESS_SERVICE                               = "ASSOC_URL_ADDRESS_SERVICE";
	const TABLE_ASSOC_URL_ADDRESS_SERVICE_FIELD_SERVICE_ID              = "AssocUrlAddressServiceServiceId";
	const TABLE_ASSOC_URL_ADDRESS_SERVICE_FIELD_URL_ADDRESS_NAME        = "AssocUrlAddressServiceUrlAddressName";
	const TABLE_ASSOC_USER_SERVICE                                      = "ASSOC_USER_SERVICE";
	const TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                     = "AssocUserServiceServiceId";
	const TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                           = "AssocUserServiceType";
	const TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                     = "AssocUserServiceUserEmail";
	const TABLE_HISTORY_MONITORING                                      = "HISTORY_MONITORING";
	const TABLE_HISTORY_MONITORING_FIELD_DESCRIPTION                    = "HistoryMonitoringDescription";
	const TABLE_HISTORY_MONITORING_FIELD_ID                             = "HistoryMonitoringId";
	const TABLE_HISTORY_MONITORING_FIELD_NAME                           = "HistoryMonitoringName";
	const TABLE_HISTORY_MONITORING_FIELD_SERVICE                        = "HistoryMonitoringService";
	const TABLE_HISTORY_MONITORING_FIELD_STATUS                         = "HistoryMonitoringStatus";
	const TABLE_HISTORY_MONITORING_FIELD_TYPE                           = "HistoryMonitoringType";
	const TABLE_HISTORY_MONITORING_FIELD_TIME                           = "HistoryMonitoringTime";
	const TABLE_HISTORY_SERVICE                                         = "HISTORY_SERVICE";
	const TABLE_HISTORY_SERVICE_FIELD_ACTIVE                            = "ServiceActive";
	const TABLE_HISTORY_SERVICE_FIELD_DESCRIPTION                       = "ServiceDescription";
	const TABLE_HISTORY_SERVICE_FIELD_HISTORY_SERVICE_ID                = "ServiceId";
	const TABLE_HISTORY_SERVICE_FIELD_NAME                              = "ServiceName";
	const TABLE_HISTORY_SERVICE_FIELD_TYPE                              = "ServiceType";
	const TABLE_HISTORY_TICKET_FIELD_SERVICE                            = "HistoryTicketService";
	const TABLE_INFORMATION_SERVICE                                     = "INFORMATION_SERVICE";
	const TABLE_INFORMATION_SERVICE_FIELD_ID                            = "InformationServiceId";
	const TABLE_INFORMATION_SERVICE_FIELD_DESCRIPTION                   = "InformationServiceDescription";
	const TABLE_INFORMATION_SERVICE_FIELD_SERVICE_ID                    = "InformationServiceServiceId";
	const TABLE_INFORMATION_SERVICE_FIELD_VALUE                         = "InformationServiceValue";
	const TABLE_MONITORING                                              = "MONITORING";
	const TABLE_MONITORING_FIELD_DESCRIPTION                            = "MonitoringDescription";
	const TABLE_MONITORING_FIELD_ID                                     = "MonitoringId";
	const TABLE_MONITORING_FIELD_NAME                                   = "MonitoringName";
	const TABLE_MONITORING_FIELD_SERVICE                                = "MonitoringService";
	const TABLE_MONITORING_FIELD_STATUS                                 = "MonitoringStatus";
	const TABLE_MONITORING_FIELD_TYPE                                   = "MonitoringType";
	const TABLE_MONITORING_FIELD_TIME                                   = "MonitoringTime";
	const TABLE_SERVICE                                                 = "SERVICE";
	const TABLE_SERVICE_FIELD_ACTIVE                                    = "ServiceActive";
	const TABLE_SERVICE_FIELD_CORPORATION                               = "ServiceCorporation";
	const TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE                    = "ServiceCorporationCanChange";
	const TABLE_SERVICE_FIELD_DEPARTMENT                                = "ServiceDepartment";
	const TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE                     = "ServiceDepartmentCanChange";
	const TABLE_SERVICE_FIELD_DESCRIPTION                               = "ServiceDescription";
	const TABLE_SERVICE_FIELD_NAME                                      = "ServiceName";
	const TABLE_SERVICE_FIELD_SERVICE_ID                                = "ServiceId";
	const TABLE_SERVICE_FIELD_TYPE                                      = "ServiceType";	
	const TABLE_STATUS_MONITORING                                       = "STATUS_MONITORING";
	const TABLE_STATUS_MONITORING_FIELD_NAME                            = "StatusMonitoringName";
	const TABLE_TICKET_FIELD_SERVICE                                    = "TicketService";
	const TABLE_TYPE_ASSOC_USER_SERVICE                                 = "TYPE_ASSOC_USER_SERVICE";
	const TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION               = "TypeAssocUserServiceDescription";
	const TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                        = "TypeAssocUserServiceId";
	const TABLE_TYPE_MONITORING                                         = "TYPE_MONITORING";
	const TABLE_TYPE_MONITORING_FIELD_DESCRIPTION                       = "TypeMonitoringDescription";
	const TABLE_TYPE_MONITORING_FIELD_NAME                              = "TypeMonitoringName";
	const TABLE_TYPE_SERVICE                                            = "TYPE_SERVICE";
	const TABLE_TYPE_SERVICE_FIELD_NAME                                 = "TypeServiceName";
	const TABLE_TYPE_SERVICE_FIELD_SLA                                  = "TypeServiceSLA";
	const TABLE_TYPE_TIME_MONITORING                                    = "TYPE_TIME_MONITORING";
	const TABLE_TYPE_TIME_MONITORING_FIELD_VALUE                        = "TypeTimeMonitoringValue";
	const TABLE_TYPE_TIME_MONITORING_FIELD_DESCRIPTION                  = "TypeTimeMonitoringDescription";
	 
	/* Constantes de Formulário de Funcionalidades */
	const CHECK_AVAILABILITY                                        = "CheckAvailability";
	const CHECK_BLACKLIST                                           = "CheckBlackList";
	const CHECK_DNS_RECORD                                          = "CheckDnsRecord";
	const CHECK_EMAIL_EXISTS                                        = "CheckEmailExists";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK                            = "CheckIpAddressIsInNetwork";
	const CHECK_PING_SERVER                                         = "CheckPingServer";
	const CHECK_PORT_STATUS                                         = "CheckPortStatus";
	const DIV_CHECK_BLACKLIST                                       = "DivCheckBlackList";
	const DIV_CHECK_IP_ADDRESS_IS_IN_NETWORK                        = "DivCheckIpAddressIsInNetwork";
	const DIV_CHECK_PING_SERVER                                     = "DivCheckPingServer";
	const DIV_CHECK_PORT_STATUS                                     = "DivCheckPortStatus";
	const DIV_GET_CALCULATION_NETMASK                               = "DivGetCalculationNetMask";
	const DIV_GET_WHOIS                                             = "DivGetWhois";
	const FORM_FUNCTION_CHECK_AVAILABILITY                          = "FormFunctionCheckAvailability";
	const FORM_FUNCTION_CHECK_AVAILABILITY_SUBMIT                   = "FormFunctionCheckAvailabilitySubmit";
	const FORM_FUNCTION_CHECK_BLACKLIST                             = "FormFunctionCheckBlackList";
	const FORM_FUNCTION_CHECK_BLACKLIST_SUBMIT                      = "FormFunctionCheckBlackListSubmit";
	const FORM_FUNCTION_CHECK_DNS_RECORD                            = "FormFunctionCheckDnsRecord";
	const FORM_FUNCTION_CHECK_DNS_RECORD_SUBMIT                     = "FormFunctionCheckDnsRecordSubmit";
	const FORM_FUNCTION_CHECK_EMAIL_EXISTS                          = "FormFunctionCheckEmailExists";
	const FORM_FUNCTION_CHECK_EMAIL_EXISTS_SUBMIT                   = "FormFunctionCheckEmailExistsSubmit";
	const FORM_FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK              = "FormFunctionCheckIpAddressIsInNetwork";
	const FORM_FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_SUBMIT       = "FormFunctionCheckIpAddressIsInNetworkSubmit";
	const FORM_FUNCTION_CHECK_PING_SERVER                           = "FormFunctionCheckPingServer";
	const FORM_FUNCTION_CHECK_PING_SERVER_SUBMIT                    = "FormFunctionCheckPingServerSubmit";
	const FORM_FUNCTION_CHECK_PORT_STATUS                           = "FormFunctionCheckPortStatus";
	const FORM_FUNCTION_CHECK_PORT_STATUS_SUBMIT                    = "FormFunctionCheckPortStatusSubmit";
	const FORM_FUNCTION_GET_CALCULATION_NETMASK                     = "FormFunctionGetCalculationNetmask";
	const FORM_FUNCTION_GET_CALCULATION_NETMASK_SUBMIT              = "FormFunctionGetCalculationNetmaskSubmit";
	const FORM_FUNCTION_GET_DNS_RECORDS                             = "FormFunctionGetDnsRecords";
	const FORM_FUNCTION_GET_DNS_RECORDS_SUBMIT                      = "FormFunctionGetDnsRecordsSubmit";
	const FORM_FUNCTION_GET_HOSTNAME                                = "FormFunctionGetHostName";
	const FORM_FUNCTION_GET_HOSTNAME_SUBMIT                         = "FormFunctionGetHostNameSubmit";
	const FORM_FUNCTION_GET_IP_ADDRESSES                            = "FormFunctionGetIpAddresses";
	const FORM_FUNCTION_GET_IP_ADDRESSES_SUBMIT                     = "FormFunctionGetIpAddressesSubmit";
	const FORM_FUNCTION_GET_LOCATION                                = "FormFunctionGetLocation";
	const FORM_FUNCTION_GET_LOCATION_SUBMIT                         = "FormFunctionGetLocationSubmit";
	const FORM_FUNCTION_GET_PROTOCOL                                = "FormFunctionGetProtocol";
	const FORM_FUNCTION_GET_PROTOCOL_SUBMIT                         = "FormFunctionGetProtocolSubmit";
	const FORM_FUNCTION_GET_ROUTE                                   = "FormFunctionGetRoute";
	const FORM_FUNCTION_GET_ROUTE_SUBMIT                            = "FormFunctionGetRouteSubmit";
	const FORM_FUNCTION_GET_SERVICE                                 = "FormFunctionGetService";
	const FORM_FUNCTION_GET_SERVICE_SUBMIT                          = "FormFunctionGetServiceSubmit";
	const FORM_FUNCTION_GET_WEBSITE                                 = "FormFunctionGetWebSite";
	const FORM_FUNCTION_GET_WEBSITE_SUBMIT                          = "FormFunctionGetWebSiteSubmit";
	const FORM_FUNCTION_GET_WHOIS                                   = "FormFunctionGetWhois";
	const FORM_FUNCTION_GET_WHOIS_SUBMIT                            = "FormFunctionGetWhoisSubmit";
	const FORM_SUBMIT_CHECK_AVAILABILITY                            = "FormSubmitCheckAvailability";
	const FORM_SUBMIT_CHECK_BLACKLIST                               = "FormSubmitCheckBlackList";
	const FORM_SUBMIT_CHECK_DNS_RECORD                              = "FormSubmitCheckDnsRecord";
	const FORM_SUBMIT_CHECK_EMAIL_EXISTS                            = "FormSubmitCheckEmailExists";
	const FORM_SUBMIT_CHECK_IP_ADDRESS_IS_IN_NETWORK                = "FormSubmitCheckIpAddressIsInNetwork";
	const FORM_SUBMIT_CHECK_PING_SERVER                             = "FormSubmitCheckPingServer";
	const FORM_SUBMIT_CHECK_PORT_STATUS                             = "FormSubmitCheckPortStatus";
	const FORM_SUBMIT_GET_CALCULATION_NETMASK                       = "FormSubmitGetCalculationNetMask";
	const FORM_SUBMIT_GET_DNS_RECORDS                               = "FormSubmitGetGetDnsRecords";
	const FORM_SUBMIT_GET_HOSTNAME                                  = "FormSubmitGetHostName";
	const FORM_SUBMIT_GET_IP_ADDRESSES                              = "FormSubmitGetIpAddresses";
	const FORM_SUBMIT_GET_PROTOCOL                                  = "FormSubmitGetProtocol";
	const FORM_SUBMIT_GET_LOCATION                                  = "FormSubmitGetLOCATION";
	const FORM_SUBMIT_GET_ROUTE                                     = "FormSubmitGetRoute";
	const FORM_SUBMIT_GET_SERVICE                                   = "FormSubmitGetService";
	const FORM_SUBMIT_GET_WEBSITE                                   = "FormSubmitGetWebSite";
	const FORM_SUBMIT_GET_WHOIS                                     = "FormSubmitGetWhoIs";
	const GET_CALCULATION_NETMASK                                   = "GetCalculationNetMask";
	const GET_DNS_RECORDS                                           = "GetDnsRecords";
	const GET_HOSTNAME                                              = "GetHostName";
	const GET_IP_ADDRESSES                                          = "GetIpAddresses";
	const GET_LOCATION                                              = "GetLocation";
	const GET_PROTOCOL                                              = "GetProtocol";
	const GET_ROUTE   			                                    = "GetRoute";
	const GET_SERVICE                                               = "GetService";
	const GET_WEBSITE                                               = "GetWebSite";
	const GET_WHOIS                                                 = "GetWhois";
	const FUNCTION_CHECK_AVAILABILITY_HIDDEN                        = "FunctionCheckAvailabilityHidden";
	const FUNCTION_CHECK_AVAILABILITY_INPUT                         = "FunctionCheckAvailabilityInput";
	const FUNCTION_CHECK_BLACKLIST_HIDDEN                           = "FunctionCheckBlackListHidden";
	const FUNCTION_CHECK_BLACKLIST_INPUT_HOST                       = "FunctionCheckBlackListInputHost";
	const FUNCTION_CHECK_BLACKLIST_INPUT_IP                         = "FunctionCheckBlackListInputIp";
	const FUNCTION_CHECK_BLACKLIST_RADIO                            = "FunctionCheckBlackListRadio";
    const FUNCTION_CHECK_BLACKLIST_RADIO_HOST                       = "FunctionCheckBlackListRadioHost";
	const FUNCTION_CHECK_BLACKLIST_RADIO_IP                         = "FunctionCheckBlackListRadioIp";
	const FUNCTION_CHECK_DNS_RECORD_HIDDEN                          = "FunctionCheckDnsRecordHidden";
	const FUNCTION_CHECK_DNS_RECORD_INPUT                           = "FunctionCheckDnsRecordInput";
	const FUNCTION_CHECK_DNS_RECORD_SELECT                          = "FunctionCheckDnsRecordSelect";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_A                        = "A";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_MX                       = "MX";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_NS                       = "NS";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_SOA                      = "SOA";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_PTR                      = "PTR";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_CNAME                    = "CNAME";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_AAAA                     = "AAAA";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_A6                       = "A6";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_SRV                      = "SRV";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_NAPTR                    = "NAPTR";
	const FUNCTION_CHECK_DNS_RECORD_SELECT_TXT                      = "TXT";
	const FUNCTION_CHECK_EMAIL_EXISTS_HIDDEN                        = "FunctionCheckEmailExistsHidden";
	const FUNCTION_CHECK_EMAIL_EXISTS_INPUT                         = "FunctionCheckEmailExistsInput";
	const FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_HIDDEN            = "FunctionCheckIpAddressIsInNetworkHidden";
	const FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP          = "FunctionCheckIpAddressIsInNetworkInputIp";
	const FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK        = "FunctionCheckIpAddressIsInNetworkInputMask";
	const FUNCTION_CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK     = "FunctionCheckIpAddressIsInNetworkInputNetwork";
	const FUNCTION_CHECK_PING_SERVER_HIDDEN                         = "FunctionCheckPingServerHidden";
	const FUNCTION_CHECK_PING_SERVER_INPUT_HOST                     = "FunctionCheckPingServerInputHost";
	const FUNCTION_CHECK_PING_SERVER_INPUT_IP                       = "FunctionCheckPingServerInputIp";
	const FUNCTION_CHECK_PING_SERVER_RADIO                          = "FunctionCheckPingServerRadio";
	const FUNCTION_CHECK_PING_SERVER_RADIO_HOST                     = "FunctionCheckPingServerRadioHost";
	const FUNCTION_CHECK_PING_SERVER_RADIO_IP                       = "FunctionCheckPingServerRadioIp";
	const FUNCTION_CHECK_PORT_STATUS_HIDDEN                         = "FunctionCheckPortStatusHidden";
	const FUNCTION_CHECK_PORT_STATUS_INPUT_HOST                     = "FunctionCheckPortStatusInputHost";
	const FUNCTION_CHECK_PORT_STATUS_INPUT_HOST_PORT                = "FunctionCheckPortStatusInputHostPort";
	const FUNCTION_CHECK_PORT_STATUS_INPUT_IP                       = "FunctionCheckPortStatusInputIp";
	const FUNCTION_CHECK_PORT_STATUS_INPUT_IP_PORT                  = "FunctionCheckPortStatusInputIpPort";
	const FUNCTION_CHECK_PORT_STATUS_RADIO                          = "FunctionCheckPortStatusRadio";
	const FUNCTION_CHECK_PORT_STATUS_RADIO_HOST                     = "FunctionCheckPortStatusRadioHost";
	const FUNCTION_CHECK_PORT_STATUS_RADIO_IP                       = "FunctionCheckPortStatusRadioIp";
	const FUNCTION_GET_CALCULATION_NETMASK_HIDDEN                   = "FunctionGetCalculationNetMaskHidden";
	const FUNCTION_GET_CALCULATION_NETMASK_INPUT_IP                 = "FunctionGetCalculationNetMaskInputIp";
	const FUNCTION_GET_CALCULATION_NETMASK_INPUT_MASK               = "FunctionGetCalculationNetMaskInputMask";
	const FUNCTION_GET_DNS_RECORDS_HIDDEN                           = "FunctionGetDnsRecordsHidden";
	const FUNCTION_GET_DNS_RECORDS_INPUT                            = "FunctionGetDnsRecordsInput";
	const FUNCTION_GET_DNS_RECORDS_SELECT                           = "FunctionGetDnsRecordsSelect";
	const FUNCTION_GET_DNS_RECORDS_SELECT_MX                        = "FunctionGetDnsRecordsSelectMx";
	const FUNCTION_GET_DNS_RECORDS_SELECT_OTHER                     = "FunctionGetDnsRecordsSelectOther";
	const FUNCTION_GET_HOSTNAME_HIDDEN                              = "FunctionGetHostNameHidden";
	const FUNCTION_GET_HOSTNAME_INPUT                               = "FunctionGetHostNameInput"; 
	const FUNCTION_GET_IP_ADDRESSES_HIDDEN                          = "FunctionGetIpAddressesHidden";
	const FUNCTION_GET_IP_ADDRESSES_INPUT                           = "FunctionGetIpAddressesInput";
	const FUNCTION_GET_PROTOCOL_HIDDEN                              = "FunctionGetProtocolHidden";
	const FUNCTION_GET_PROTOCOL_INPUT                               = "FunctionGetProtocolInput";
	const FUNCTION_GET_LOCATION_HIDDEN                              = "FunctionGetLocationHidden";
	const FUNCTION_GET_LOCATION_INPUT                               = "FunctionGetLocationInput";
	const FUNCTION_GET_ROUTE_HIDDEN                                 = "FunctionGetRouteHidden";
	const FUNCTION_GET_ROUTE_INPUT                                  = "FunctionGetRouteInput";
	const FUNCTION_GET_SERVICE_HIDDEN                               = "FunctionGetServiceHidden";
	const FUNCTION_GET_SERVICE_INPUT                                = "FunctionGetServiceInput";
	const FUNCTION_GET_SERVICE_SELECT                               = "FunctionGetServiceSelect";
	const FUNCTION_GET_SERVICE_SELECT_TCP                           = "FunctionGetServiceSelectTcp";
	const FUNCTION_GET_SERVICE_SELECT_UDP                           = "FunctionGetServiceSelectUdp";
	const FUNCTION_GET_WEBSITE_HIDDEN                               = "FunctionGetWebSiteHidden";
	const FUNCTION_GET_WEBSITE_INPUT                                = "FunctionGetWebSiteInput";
	const FUNCTION_GET_WEBSITE_SELECT                               = "FunctionGetWebSiteSelect";
	const FUNCTION_GET_WEBSITE_SELECT_CONTENT                       = "FunctionGetWebSiteSelectContent";
	const FUNCTION_GET_WEBSITE_SELECT_HEADER                        = "FunctionGetWebSiteSelectHeader";
	const FUNCTION_GET_WHOIS_HIDDEN                                 = "FunctionGetWhoisHidden";
	const FUNCTION_GET_WHOIS_INPUT_HOST                             = "FunctionGetWhoisInputHost";
	const FUNCTION_GET_WHOIS_INPUT_IP                               = "FunctionGetWhoisInputIp";
	const FUNCTION_GET_WHOIS_RADIO                                  = "FunctionGetWhoisRadio";
    const FUNCTION_GET_WHOIS_RADIO_HOST                             = "FunctionGetWhoisRadioHost";
	const FUNCTION_GET_WHOIS_RADIO_IP                               = "FunctionGetWhoisRadioIp";
	
	/* Constantes de Formulário da Página Account */
	const ACCOUNT_FORM                                              = "AccountForm";
	const ACCOUNT_FORM_SUBMIT_VERIFIED_CORPORATION                  = "AccountFormSubmitVerifiedCorporation";
	const ACCOUNT_FORM_SUBMIT_VERIFIED_DEPARTMENT                   = "AccountFormSubmitVerifiedDepartment";
	const ACCOUNT_FORM_SUBMIT_VERIFIED_USER_UNIQUE_ID               = "AccountFormSubmitVerifiedUserUniqueId";
	const ACCOUNT_FORM_SUBMIT_VERIFIED_TRUE                         = "AccountFormSubmitVerifiedTrue";
	const ACCOUNT_FORM_SUBMIT_VERIFIED_FALSE                        = "AccountFormSubmitVerifiedFalse";
	
	/* Constantes de Formulário da Página AccountUpdate */
	const ACCOUNT_UPDATE_CORPORATION                                = "AccountUpdateCorporation";
	const ACCOUNT_UPDATE_FORM                                       = "AccountUpdateForm";
	const ACCOUNT_UPDATE_SELECT_GENDER_FEMALE                       = "F";
	const ACCOUNT_UPDATE_SELECT_GENDER_MALE                         = "M";
	
	/* Constantes de formulário da Página AccountChangePassword */
	const ACCOUNT_CHANGE_PASSWORD_FORM                              = "AccountChangePasswordForm";
	const ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT                       = "AccountChangePasswordFormSubmit";
	const ACCOUNT_CHANGE_PASSWORD_FORM_SUBMIT_CANCEL                = "AccountChangePasswordFormSubmitCancel";
	
	/* Constantes de Formulário da Página Contact */
	const CONTACT_EMAIL_LABEL                                       = "ContactEmailLabel";
	const CONTACT_FORM                                              = "ContactForm";
	const CONTACT_FORM_SUBMIT                                       = "ContactFormSubmit";
	const CONTACT_MESSAGE                                           = "ContactMessage";
	const CONTACT_NAME                                              = "ContactName";
	const CONTACT_SELECT_COMMERCIAL                                 = "Comercial";
	const CONTACT_SELECT_DOUBT                                      = "Doubt";
	const CONTACT_SELECT_SUGGESTION                                 = "Suggestion";
	const CONTACT_SUBJECT                                           = "ContactSubject";
	const CONTACT_TITLE                                             = "ContactTitle";
  
	/* Constantes de Formulário da Página PasswordRecovery */
	const PASSWORD_RECOVERY_FORM                                    = "PasswordRecoveryForm";
	const PASSWORD_RECOVERY_FORM_SUBMIT                             = "PasswordRecoveryFormSubmit";
	  
	/* Constantes de Formulário da Página PasswordReset */
	const PASSWORD_RESET_FORM                                       = "PasswordResetForm";
	const PASSWORD_RESET_FORM_SUBMIT                                = "PasswordResetFormSubmit";

	/* Constantes de Formulário da Página Register */
	const REGISTER_CODE                                             = "RegisterCode";
	const REGISTER_SELECT_GENDER_FEMALE                             = "F";
	const REGISTER_SELECT_GENDER_MALE                               = "M";
	const REGISTER_SELECT_GENDER_OTHER                              = "O";
	
	/* Constantes de Formulário da Página ResendConfirmationLink */
	const RESEND_CONFIRMATION_LINK_USER                             = "ResendConfirmationLinkUser";
	const RESEND_CONFIRMATION_LINK_FORM                             = "ResendLinkConfirmationForm";
	const RESEND_CONFIRMATION_LINK_FORM_SUBMIT                      = "FormSubmitResendConfirmationLink";
	const RESEND_CONFIRMATION_LINK_PASSWORD                         = "ResendConfirmationLinkPassword";
	
	/* Constantes de Retornos Funcionalidades: Fachada Negócio */
	const INVALID_HOSTNAME                                          = "ReturnInvalidHostName";
	const INVALID_IP_ADDRESS                                        = "ReturnInvalidIpAddress";
	const INVALID_IP_MASK                                           = "ReturnInvalidIpMask";
	const INVALID_NULL                                              = "ReturnInvalidNull";
	const INVALID_PORT                                              = "ReturnInvalidPort";
	const INVALID_PROTOCOL                                          = "ReturnInvalidProtocol";
	const INVALID_PROTOCOL_NUMBER                                   = "ReturnInvalidProtocolNumber";
	const INVALID_WEBSITE                                           = "ReturnInvalidWebSite";
	const INVALID_DNS_RECORD                                        = "ReturnInvalidDnsRecord";
	
	/* Constantes de Retornos Funcionalidades: Network */
	const CHECK_HOST_BLACKLISTED                                    = "ReturnCheckHostBlackListed";
	const CHECK_HOST_BLACKLIST_NO_IP_FOR_HOST                       = "ReturnCheckHostBlackListNoIpForHost";
	const CHECK_HOST_DNS_RECORD_TYPE_NOT_ALLOWED                    = "ReturnCheckHostDnsRecordTypeNotAllowed";
	const CHECK_HOST_DNS_RECORD_TYPE_FAILED                         = "ReturnCheckHostDnsRecordTypeFailed";
	const CHECK_HOST_PORT_FAILED_DISALLOWED                         = "ReturnCheckHostPortFailedDisallowed";
	const CHECK_HOST_PORT_FAILED_REFUSED                            = "ReturnCheckHostPortFailedRefused";
	const CHECK_HOST_PORT_FAILED_TIMEOUT                            = "ReturnCheckHostPortFailedTimeOut";
	const CHECK_HOST_PORT_FAILED_UNKNOWN                            = "ReturnCheckHostPortFailedUnknown";
	const CHECK_IP_ADDRESS_IS_NOT_IN_NETWORK                        = "ReturnCheckIpAddressIsNotInNetwork";
	const CHECK_PING_SERVER_FAILED                                  = "ReturnCheckPingServerFailed";
	const CHECK_AVAILABILITY_NOT_AVAILABLE                          = "ReturnDomainNotAvailable";
	const GET_BROWSER_CLIENT_INVALID_BROWSER                        = "ReturnInvalidBrowserClient";
	const GET_DNS_MX_RECORDS_FAILED                                 = "ReturnGetDnsMxRecordsFailed";
	const GET_DNS_RECORDS_FAILED                                    = "ReturnGetDnsRecordsFailed";
	const GET_HOSTNAME_FAILED                                       = "ReturnGetHostNameFaileds";
	const GET_HOST_IP_ADDRESS_FAILED                                = "ReturnGetHostIpAddressFailed";
	const GET_LOCATION_BY_IP_ADDRESS_FAILED                         = "ReturnGetLocationByIpAddressFailed";
	const GET_LOCATION_BY_IP_ADDRESS_FAILED_GET_CONTENTS            = "ReturnGetLocationByIpAddressFailedGetContents";
	const GET_PROTOCOL_FAILED                                       = "ReturnGEtProtocolFailed";
	const GET_SERVICE_FAILED                                        = "ReturnGetServiceFailed";
	const GET_WEBSITE_CONTENT_FAILED                                = "ReturnGetWebSiteContentFailed";
	const GET_WEBSITE_HEADERS_FAILED                                = "ReturnGetWebSiteHeadersFailed";
	const GET_WHOIS_FAILED                                          = "ReturnGetWhoisFailed";
	const GET_WHOIS_PACKAGE_NET_WHOIS_NOT_FOUND                     = "ReturnPackageNetWhoisNotFound";
	
	
	/* Constantes de E-mail */
	const SEND_EMAIL_ALREADY_SENT                                   = "SEND_EMAIL_ALREADY_SENT";
	
	/* Funcionalidades Habilitadas / Desabilitadas */
	public $FunctionCheckAvailabilityEnabled                        = TRUE;
	public $FunctionCheckBlacklistEnabled                           = TRUE;
	public $FunctionCheckDnsRecordEnabled                           = TRUE;
	public $FunctionCheckEmailExistsEnabled                         = TRUE;
	public $FunctionCheckIpAddresIsInNetworkEnabled                 = TRUE;
	public $FunctionCheckPingServerEnabled                          = TRUE;
	public $FunctionCheckPortStatusEnabled                          = TRUE;
	public $FunctionGetCalculationNetMaskEnabled                    = TRUE;
	public $FunctionGetDnsRecordsEnabled                            = TRUE;
	public $FunctionGetHostNameEnabled                              = TRUE;
	public $FunctionGetIpAddressesEnabled                           = TRUE;
	public $FunctionGetLocationEnabled                              = TRUE;
	public $FunctionGetProtocolEnabled                              = TRUE;
	public $FunctionGetRouteEnabled                                 = TRUE;
	public $FunctionGetServiceEnabled                               = TRUE;
	public $FunctionGetWebSiteEnabled                               = TRUE;
	public $FunctionGetWhoisEnabled                                 = TRUE;

	/* Páginas Habilitadas / Desabilitadas */
	public $PageAboutEnabled                                        = TRUE;
	public $PageAccountEnabled                                      = TRUE;
	public $PageCorporationEnabled                                  = FALSE;
	public $PageAdminEnabled                                        = TRUE;
	public $PageAdminCorporationEnabled                             = TRUE;
	public $PageAdminCountryEnabled                                 = TRUE;
	public $PageAdminDepartmentEnabled                              = TRUE;
	public $PageAdminMonitoringEnabled                              = TRUE;
	public $PageAdminNotificationEnabled                            = TRUE;
	public $PageAdminServiceEnabled                                 = TRUE;
	public $PageAdminSystemConfigurationEnabled                     = TRUE;
	public $PageAdminTeamEnabled                                    = TRUE;
	public $PageAdminTechInfoEnabled                                = TRUE;
	public $PageAdminTicketEnabled                                  = TRUE;
	public $PageAdminTypeAssocUserTeamEnabled                       = TRUE;
	public $PageAdminTypeMonitoringEnabled                          = TRUE;
	public $PageAdminTypeServiceEnabled                             = TRUE;
	public $PageAdminTypeStatusMonitoringEnabled                    = TRUE;
	public $PageAdminTypeStatusTicketEnabled                        = TRUE;
	public $PageAdminTypeTicketEnabled                              = TRUE;
	public $PageAdminTypeUserEnabled                                = TRUE;
	public $PageAdminUserEnabled                                    = TRUE;
	public $PageCheckEnabled                                        = TRUE;
	public $PageContactEnabled                                      = TRUE;
	public $PageDiagnosticToolsEnabled                              = TRUE;
	public $PageGetEnabled                                          = TRUE;
	public $PageHomeEnabled                                         = TRUE;
	public $PageInstallEnabled                                      = TRUE;
	public $PageLoginEnabled                                        = TRUE;
	public $PageLoginTwoStepVerificationEnabled                     = TRUE;
	public $PageNotFoundEnabled                                     = TRUE;
	public $PageNotificationEnalbed                                 = TRUE;
	public $PagePasswordRecoveryEnabled                             = TRUE;
	public $PagePasswordResetEnabled                                = TRUE;
	public $PageRegisterEnabled                                     = TRUE;
	public $PageRegisterConfirmationEnabled                         = TRUE;
	public $PageResendConfirmationLinkEnabled                       = TRUE;
	public $PageServiceEnabled                                      = TRUE;
	public $PageServiceListEnabled                                  = TRUE;
	public $PageServiceListByCorporationEnabled                     = TRUE;
	public $PageServiceListByDepartmentEnabled                      = TRUE;
	public $PageServiceListByTypeAssocUserServiceEnabled            = TRUE;
	public $PageServiceListByTypeServiceEnabled                     = TRUE;
	public $PageServiceListByUserEnabled                            = TRUE;
	public $PageServiceRegisterEnabled                              = TRUE;
	public $PageServiceSelectEnabled                                = TRUE;
	public $PageServiceUpdateEnabled                                = TRUE;
	public $PageServiceViewEnabled                                  = TRUE;
	public $PageSupportEnabled                                      = TRUE;
	public $PageTeamEnabled                                         = TRUE;
	public $PageTeamListEnabled                                     = TRUE;
	public $PageTeamRegisterEnabled                                 = TRUE;
	public $PageTeamSelectEnabled                                   = TRUE;
	public $PageTeamUpdateEnabled                                   = TRUE;
	public $PageTeamViewEnabled                                     = TRUE;
	
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
			if(self::$Instance->SetApplication() == ConfigInfraTools::RETURN_WARNING)
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
		if($Const != ConfigInfraTools::RETURN_ERROR) return $Const;
		if(defined("ConfigInfraTools::" . strtoupper(implode(preg_split('/(?=[A-Z])/', $Constant, -1, PREG_SPLIT_NO_EMPTY), "_"))))
			return constant("ConfigInfraTools::" . strtoupper(implode(preg_split('/(?=[A-Z])/', $Constant, -1, PREG_SPLIT_NO_EMPTY), "_")));
	}
}
?>