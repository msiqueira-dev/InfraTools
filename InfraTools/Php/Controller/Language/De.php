<?php

/************************************************************************
Class: De
Creation: 17/03/2015
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe que contem constantes de textos e mensagens de tela em alemão,
			acessdas viada método.
Functions: 
			public function GetConstant($Constant);
Updates:
	
**************************************************************************/

class De
{
	/* Singleton */
	private static $Instance;
	
	/* Get Instance */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	/* Constructor */
	private function __construct() 
    {
	}
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	const ACTIVE                                                    = "";
	const ACTIVATED                                                 = "";
	const ACCOUNT_UPDATE_SUCCESS                                    = "";
	const ASSOC_USER_CORPORATION_UPDATE_SUCCESS                     = "";
	const BIRTH_DATE                                                = "";
	const BIRTH_DATE_DAY                                            = "";
	const BIRTH_DATE_MONTH                                          = "";
	const BIRTH_DATE_YEAR                                           = "";
	const CONFIRMED                                                 = "";
	const CORPORATION_NOT_FOUND                                     = "";
	const CORPORATION_UPDATE_ERROR                                  = "";
	const CORPORATION_UPDATE_ERROR_UNIQUE_EXISTS                    = "";
	const CORPORATION_UPDATE_SUCCESS                                = "";
	const CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS        = "";
	const CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR          = "";
	const COUNTRY                                                   = "";
	const COUNTRY_ABBREVIATION                                      = "";
	const COUNTRY_NOT_FOUND                                         = "";
	const DATABASE                                                  = "";
	const DATABASE_ROW_COUNT                                        = "";
	const DATABASE_TABLE_QUANTITY                                   = "";
	const DEACTIVATED                                               = "";
	const DEFAULT_VALUE                                             = "";
	const DEPARTMENT_INSERT_ERROR_NO_CORPORATION                    = "";
	const DEPARTMENT_NAME_AND_CORPORATION_NAME                      = "";
	const DEPARTMENT_NOT_FOUND                                      = "";
	const DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS         = "";
	const DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR           = "";
	const DESCRIPTION                                               = "";
	const EMAIL                                                     = "";
	const FILL_REQUIRED_FIELDS                                      = "";
	const FORM_FIELD_CORPORATION_ACTIVE                             = "";
	const FORM_FIELD_CORPORATION_NAME                               = "";
	const FORM_FIELD_DEPARTMENT_INITIALS                            = "";
	const FORM_FIELD_DEPARTMENT_NAME                                = "";
	const FORM_FIELD_EDIT                                           = "";
	const FORM_FIELD_LOGIN                                          = "";
	const FORM_FIELD_NOTIFICATION_ACTIVE                            = "";
	const FORM_FIELD_NOTIFICATION_ID                                = "";
	const FORM_FIELD_NOTIFICATION_TEXT                              = "";
	const FORM_FIELD_SELECT_NONE                                    = "";
	const FORM_FIELD_SERVICE_ACTIVE                                 = "";
	const FORM_FIELD_SERVICE_CORPORATION_CAN_CHANGE                 = "";
	const FORM_FIELD_SERVICE_DEPARTMENT_CAN_CHANGE                  = "";
	const FORM_FIELD_SERVICE_DESCRIPTION                            = "";
	const FORM_FIELD_SERVICE_ID                                     = "";
	const FORM_FIELD_SERVICE_NAME                                   = "";
	const FORM_FIELD_SERVICE_TYPE                                   = "";
	const FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE             = "";
	const FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION        = "";
	const FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NAME               = "";
	const FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER             = "";
	const FORM_FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE              = "";
	const FORM_FIELD_TEAM_DESCRIPTION                               = "";
	const FORM_FIELD_TEAM_ID                                        = "";
	const FORM_FIELD_TEAM_NAME                                      = "";
	const FORM_FIELD_TICKET_DESCRIPTION                             = "";
	const FORM_FIELD_TICKET_ID                                      = "";
	const FORM_FIELD_TICKET_SERVICE                                 = "";
	const FORM_FIELD_TICKET_STATUS                                  = "";
	const FORM_FIELD_TICKET_SUGGESTION                              = "";
	const FORM_FIELD_TICKET_TITLE                                   = "";
	const FORM_FIELD_TICKET_TYPE                                    = "";
	const FORM_FIELD_TYPE_SERVICE_NAME                              = "";
	const FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION                 = "";
	const FORM_FIELD_TYPE_STATUS_TICKET_ID                          = "";
	const FORM_FIELD_TYPE_TICKET_DESCRIPTION                        = "";
	const FORM_FIELD_TYPE_USER_DESCRIPTION                          = "";
	const FORM_FIELD_USER_TWO_STEP_VERIFICATION                     = "";
	const FORM_INVALID_CAPTCHA                                      = "";
	const FORM_INVALID_CORPORATION_NAME                             = "";
	const FORM_INVALID_CORPORATION_NAME_SIZE                        = "";
	const FORM_INVALID_COUNTRY                                      = "";
	const FORM_INVALID_DATE_DAY                                     = "";
	const FORM_INVALID_DATE_MONTH                                   = "";
	const FORM_INVALID_DATE_YEAR                                    = "";
	const FORM_INVALID_DEPARTMENT_INITIALS                          = "";
	const FORM_INVALID_DEPARTMENT_INITIALS_SIZE                     = "";
	const FORM_INVALID_DEPARTMENT_NAME                              = "";
	const FORM_INVALID_DEPARTMENT_NAME_SIZE                         = "";
	const FORM_INVALID_DESCRIPTION                                  = "";
	const FORM_INVALID_HOSTNAME                                     = "";
	const FORM_INVALID_ID                                           = "";
	const FORM_INVALID_NOTIFICATION_ACTIVE                          = "";
	const FORM_INVALID_NOTIFICATION_ID                              = "";
	const FORM_INVALID_NOTIFICATION_TEXT                            = "";
	const FORM_INVALID_REGISTRATION_ID                              = "";
	const FORM_INVALID_SERVICE_ACTIVE                               = "";
	const FORM_INVALID_SERVICE_CORPORATION_CAN_CHANGE               = "";
	const FORM_INVALID_SERVICE_DESCRIPTION                          = "";
	const FORM_INVALID_SERVICE_DESCRIPTION_SIZE                     = "";
	const FORM_INVALID_SERVICE_DEPARTMENT_CAN_CHANGE                = "";
	const FORM_INVALID_SERVICE_ID                                   = "";
	const FORM_INVALID_SERVICE_NAME                                 = "";
	const FORM_INVALID_SERVICE_NAME_SIZE                            = "";
	const FORM_INVALID_SERVICE_TYPE                                 = "";
	const FORM_INVALID_SERVICE_TYPE_SIZE                            = "";
	const FORM_INVALID_SYSTEM_CONFIGURATION_OPTION_ACTIVE           = "";
	const FORM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION      = "";
	const FORM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION_SIZE = "";
	const FORM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME             = "";
	const FORM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME_SIZE        = "";
	const FORM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE            = "";
	const FORM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE_SIZE       = "";
	const FORM_INVALID_TEAM_DESCRIPTION                             = "";
	const FORM_INVALID_TEAM_DESCRIPTION_SIZE                        = "";
	const FORM_INVALID_TEAM_ID                                      = "";
	const FORM_INVALID_TEAM_NAME                                    = "";
	const FORM_INVALID_TEAM_NAME_SIZE                               = "";
	const FORM_INVALID_TICKET_DESCRIPTION                           = "";
	const FORM_INVALID_TICKET_DESCRIPTION_SIZE                      = "";
	const FORM_INVALID_TICKET_ID                                    = "";
	const FORM_INVALID_TICKET_TITLE                                 = "";
	const FORM_INVALID_TICKET_TITLE_SIZE                            = "";
	const FORM_INVALID_TICKET_TYPE                                  = "";
	const FORM_INVALID_TICKET_TYPE_SIZE                             = "";
	const FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION          = "";
	const FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE     = "";
	const FORM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION             = "";
	const FORM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION_SIZE        = "";
	const FORM_INVALID_TYPE_ASSOC_USER_TEAM_ID                      = "";
	const FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION               = "";
	const FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE          = "";
	const FORM_INVALID_TYPE_STATUS_TICKET_ID                        = "";
	const FORM_INVALID_TYPE_TICKET_DESCRIPTION                      = "";
	const FORM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE                 = "";
	const FORM_INVALID_TYPE_TICKET_ID                               = "";
	const FORM_INVALID_TYPE_USER_DESCRIPTION                        = "";
	const FORM_INVALID_TYPE_USER_DESCRIPTION_SIZE                   = "";
	const FORM_INVALID_TYPE_USER_ID                                 = "";
	const FORM_INVALID_USER_BIRTH_DATE_DAY                          = "";
	const FORM_INVALID_USER_BIRTH_DATE_MONTH                        = "";
	const FORM_INVALID_USER_BIRTH_DATE_YEAR                         = "";
	const FORM_INVALID_USER_CONFIRMED                               = "";
	const FORM_INVALID_USER_EMAIL                                   = "";
	const FORM_INVALID_USER_EMAIL_SIZE                              = "";
	const FORM_INVALID_USER_GENDER                                  = "";
	const FORM_INVALID_USER_NAME                                    = "";
	const FORM_INVALID_USER_NAME_SIZE                               = "";
	const FORM_INVALID_USER_PASSWORD                                = "";
	const FORM_INVALID_USER_PASSWORD_MATCH                          = "";
	const FORM_INVALID_USER_PASSWORD_SIZE                           = "";
	const FORM_INVALID_USER_PHONE_PREFIX_PRIMARY                    = "";
	const FORM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE               = "";
	const FORM_INVALID_USER_PHONE_PREFIX_SECONDARY                  = "";
	const FORM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE             = "";
	const FORM_INVALID_USER_PHONE_PRIMARY                           = "";
	const FORM_INVALID_USER_PHONE_PRIMARY_SIZE                      = "";
	const FORM_INVALID_USER_PHONE_SECONDARY                         = "";
	const FORM_INVALID_USER_PHONE_SECONDARY_SIZE                    = "";
	const FORM_INVALID_USER_REGION                                  = "";
	const FORM_INVALID_USER_REGION_SIZE                             = "";
	const FORM_INVALID_USER_UNIQUE_ID                               = "";
	const FORM_INVALID_USER_UNIQUE_ID_SIZE                          = "";
	const FORM_SELECT_DEFAULT                                       = "";
	const FORM_SUBMIT_RESET_PASSWORD_EMAIL_TAG                      = "";
	const FORM_SUBMIT_RESET_PASSWORD_EMAIL_TEXT                     = "";
	const GENDER                                                    = "";
	const HREF_PAGE_ABOUT                                           = "/De/PageAbout";
	const HREF_PAGE_ACCOUNT                                         = "/De/PageAccount";
	const HREF_PAGE_ADMIN                                           = "/De/PageAdmin";
	const HREF_PAGE_ADMIN_CORPORATION                               = "/De/PageAdminCorporation";
	const HREF_PAGE_ADMIN_COUNTRY                                   = "/De/PageAdminCountry";
	const HREF_PAGE_ADMIN_DEPARTMENT                                = "/De/PageAdminDepartment";
	const HREF_PAGE_ADMIN_NOTIFICATION                              = "/De/PageAdminNotification";
	const HREF_PAGE_ADMIN_SERVICE                                   = "/De/PageAdminService";
	const HREF_PAGE_ADMIN_SYSTEM_CONFIGURATION                      = "/De/PageAdminSystemConfiguration";
	const HREF_PAGE_ADMIN_TEAM                                      = "/De/PageAdminTeam";
	const HREF_PAGE_ADMIN_TECH_INFO                                 = "/De/PageAdminTechInfo";
	const HREF_PAGE_ADMIN_TICKET                                    = "/De/PageAdminTicket";
	const HREF_PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                      = "/De/PageAdminTypeAssocUserTeam";
	const HREF_PAGE_ADMIN_TYPE_SERVICE                              = "/De/PageAdminTypeService";
	const HREF_PAGE_ADMIN_TYPE_STATUS_TICKET                        = "/De/PageAdminTypeStatusTicket";
	const HREF_PAGE_ADMIN_TYPE_TICKET                               = "/De/PageAdminTypeTicket";
	const HREF_PAGE_ADMIN_TYPE_USER                                 = "/De/PageAdminTypeUser";
	const HREF_PAGE_ADMIN_USER                                      = "/De/PageAdminUser";
	const HREF_PAGE_CHECK                                           = "/De/PageCheck";   
	const HREF_PAGE_CONTACT                                         = "/De/PageContact";
	const HREF_PAGE_DIAGNOSTIC_TOOLS                                = "/De/PageDiagnosticTools";
	const HREF_PAGE_GET                                             = "/De/PageGet";
	const HREF_PAGE_HOME                                            = "/De/PageHome";
	const HREF_PAGE_INSTALL                                         = "/De/PageInstall";
	const HREF_PAGE_LOGIN                                           = "/De/PageLogin";
	const HREF_PAGE_NOT_FOUND                                       = "/De/PageNotFound";
	const HREF_PAGE_NOTIFICATION                                    = "/De/PageNotification";
	const HREF_PAGE_PASSWORD_RECOVERY                               = "/De/PagePasswordRecovery";
	const HREF_PAGE_PASSWORD_RESET                                  = "/De/PagePasswordReset";
	const HREF_PAGE_REGISTER                                        = "/De/PageRegister";
	const HREF_PAGE_REGISTER_CONFIRMATION                           = "/De/PageRegisterConfirmation";
	const HREF_PAGE_RESEND_CONFIRMATION_LINK                        = "/De/PageResendConfirmationLink";
	const HREF_PAGE_SERVICE                                         = "/De/PageService";
	const HREF_PAGE_SERVICE_LIST                                    = "/De/PageServiceList";
	const HREF_PAGE_SERVICE_LIST_BY_CORPORATION                     = "/De/PageServiceListByCorporation";
	const HREF_PAGE_SERVICE_LIST_BY_DEPARTMENT                      = "/De/PageServiceListByDepartment";
	const HREF_PAGE_SERVICE_LIST_BY_NAME                            = "/De/PageServiceListByName";
	const HREF_PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE         = "/De/PageServiceListByTypeAssocUserService";
	const HREF_PAGE_SERVICE_LIST_BY_TYPE_SERVICE                    = "/De/PageServiceListByTypeService";
	const HREF_PAGE_SERVICE_LIST_BY_USER                            = "/De/PageServiceListByUser";
	const HREF_PAGE_SERVICE_REGISTER                                = "/De/PageServiceRegister";
	const HREF_PAGE_SERVICE_SELECT                                  = "/De/PageServiceSelect";
	const HREF_PAGE_SERVICE_VIEW                                    = "/De/PageServiceView";
	const HREF_PAGE_SUPPORT                                         = "/De/PageSupport";
	const HREF_PAGE_TEAM                                            = "/De/PageTeam";
	const HREF_PAGE_TEAM_LIST                                       = "/De/PageTeamList";
	const HREF_PAGE_TEAM_REGISTER                                   = "/De/PageTeamRegister";
	const HREF_PAGE_TEAM_SELECT                                     = "/De/PageTeamSelect";
	const HREF_PAGE_TEAM_VIEW                                       = "/De/PageTeamView";
	const ID                                                        = "";
	const INSERT_WARNING_EXISTS                                     = "";
	const INSTALL_EXPORT_SUCCESS                                    = "";
	const INSTALL_IMPORT_ERROR_FILE_EXTENSION                       = "";
	const INSTALL_IMPORT_ERROR_INSERTS                              = "";
	const INSTALL_IMPORT_ERROR_FILE_MOVE                            = "";
	const INSTALL_IMPORT_ERROR_FILE_READ                            = "";
	const INSTALL_IMPORT_SUCCESS                                    = "";
	const INSTALL_REINSTALL_ERROR_USER_PERMISSION                   = "";
	const INSTALL_REINSTALL_SUCCESS                                 = "";
	const INSTALL_ERROR                                             = "";
	const INSTALL_SUCCESS                                           = "";
	const INVALID_IP_ADDRESS                                        = "";
	const INVALID_MASK                                              = "";
	const INVALID_NETWORK_ADDRESS                                   = "";
	const INVALID_OPTION                                            = "";
	const INVALID_PORT                                              = "";
	const INVALID_PROTOCOL                                          = "";
	const INVALID_PROTOCOL_NUMBER                                   = "";
	const INVALID_WEBSITE                                           = "";
	const LANGUAGES                                                 = "";
	const LANGUAGES_CONSTANT_COUNT                                  = "";
	const LANGUAGES_FILES                                           = "";
	const MAPS_SEARCH                                               = "";
	const MAPS_TIP                                                  = "";
	const NAME                                                      = "";
	const NOT_LOGGED_IN                                             = "";
	const NOTIFICATION_DELETE_ERROR                                 = "";
	const NOTIFICATION_DELETE_SUCCESS                               = "";
	const NOTIFICATION_INSERT_ERROR                                 = "";
	const NOTIFICATION_INSERT_SUCCESS                               = "";
	const NOTIFICATION_NOT_FOUND                                    = "";
	const NOTIFICATION_UPDATE_ERROR                                 = "";
	const NOTIFICATION_UPDATE_SUCCESS                               = "";
	const NULL_EMPTY                                                = "";
	const NULL_OPTION                                               = "";
	const OPERATION_LIST                                            = "";
	const OPERATION_REGISTER                                        = "";
	const OPERATION_SEARCH                                          = "";
	const PAGE_ABOUT                                                = "";
	const PAGE_ABOUT_ROBOTS                                         = "noindex";
	const PAGE_ABOUT_TITLE                                          = "InfraTools -";
	const PAGE_ACCOUNT                                              = "";
	const PAGE_ACCOUNT_CHANGE_PASSWORD                              = "";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_ROBOTS                       = "noindex";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_TITLE                        = "InfraTools -";
	const PAGE_ACCOUNT_ROBOTS                                       = "noindex";
	const PAGE_ACCOUNT_TITLE                                        = "InfraTools -";
	const PAGE_ACCOUNT_UPDATE                                       = "";
	const PAGE_ACCOUNT_UPDATE_ROBOTS                                = "noindex";
	const PAGE_ACCOUNT_UPDATE_TITLE                                 = "InfraTools -";
	const PAGE_ADMIN                                                = "";
	const PAGE_ADMIN_ROBOTS                                         = "noindex";
	const PAGE_ADMIN_TITLE                                          = "InfraTools -";
	const PAGE_ADMIN_CORPORATION                                    = "";
	const PAGE_ADMIN_CORPORATION_LIST                               = "";
	const PAGE_ADMIN_CORPORATION_LIST_ROBOTS                        = "noindex";
	const PAGE_ADMIN_CORPORATION_LIST_TITLE                         = "InfraTools -";
	const PAGE_ADMIN_CORPORATION_REGISTER                           = "";
	const PAGE_ADMIN_CORPORATION_REGISTER_ROBOTS                    = "noindex";
	const PAGE_ADMIN_CORPORATION_REGISTER_TITLE                     = "InfraTools -";
	const PAGE_ADMIN_CORPORATION_ROBOTS                             = "noindex";
	const PAGE_ADMIN_CORPORATION_SELECT                             = "";
	const PAGE_ADMIN_CORPORATION_SELECT_ROBOTS                      = "noindex";
	const PAGE_ADMIN_CORPORATION_SELECT_TITLE                       = "InfraTools -";
	const PAGE_ADMIN_CORPORATION_TITLE                              = "InfraTools -";
	const PAGE_ADMIN_CORPORATION_UPDATE                             = "";
	const PAGE_ADMIN_CORPORATION_UPDATE_ROBOTS                      = "noindex";
	const PAGE_ADMIN_CORPORATION_UPDATE_TITLE                       = "InfraTools -";
	const PAGE_ADMIN_CORPORATION_VIEW                               = "";
	const PAGE_ADMIN_CORPORATION_VIEW_ROBOTS                        = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_TITLE                         = "InfraTools -";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS                         = "";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_ROBOTS                  = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_TITLE                   = "InfraTools -";
	const PAGE_ADMIN_COUNTRY                                        = "";
	const PAGE_ADMIN_COUNTRY_LIST                                   = "";
	const PAGE_ADMIN_COUNTRY_LIST_ROBOTS                            = "noindex";
	const PAGE_ADMIN_COUNTRY_LIST_TITLE                             = "InfraTools -";
	const PAGE_ADMIN_COUNTRY_ROBOTS                                 = "noindex";
	const PAGE_ADMIN_COUNTRY_TITLE                                  = "InfraTools -";
	const PAGE_ADMIN_DEPARTMENT                                     = "";
	const PAGE_ADMIN_DEPARTMENT_LIST                                = "";
	const PAGE_ADMIN_DEPARTMENT_LIST_ROBOTS                         = "noindex";
	const PAGE_ADMIN_DEPARTMENT_LIST_TITLE                          = "InfraTools -";
	const PAGE_ADMIN_DEPARTMENT_REGISTER                            = "";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_ROBOTS                     = "noindex";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_TITLE                      = "InfraTools -";
	const PAGE_ADMIN_DEPARTMENT_ROBOTS                              = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SELECT                              = "";
	const PAGE_ADMIN_DEPARTMENT_SELECT_ROBOTS                       = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SELECT_TITLE                        = "InfraTools -";
	const PAGE_ADMIN_DEPARTMENT_TITLE                               = "InfraTools -";
	const PAGE_ADMIN_DEPARTMENT_UPDATE                              = "";
	const PAGE_ADMIN_DEPARTMENT_UPDATE_ROBOTS                       = "noindex";
	const PAGE_ADMIN_DEPARTMENT_UPDATE_TITLE                        = "InfraTools -";
	const PAGE_ADMIN_DEPARTMENT_VIEW                                = "";
	const PAGE_ADMIN_DEPARTMENT_VIEW_ROBOTS                         = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_TITLE                          = "InfraTools -";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS                          = "";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_ROBOTS                   = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_TITLE                    = "InfraTools -";
	const PAGE_ADMIN_NOTIFICATION                                   = "";
	const PAGE_ADMIN_NOTIFICATION_LIST                              = "";
	const PAGE_ADMIN_NOTIFICATION_LIST_ROBOTS                       = "noindex";
	const PAGE_ADMIN_NOTIFICATION_LIST_TITLE                        = "InfraTools -";
	const PAGE_ADMIN_NOTIFICATION_REGISTER                          = "";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_ROBOTS                   = "noindex";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_TITLE                    = "InfraTools -";
	const PAGE_ADMIN_NOTIFICATION_ROBOTS                            = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SELECT                            = "";
	const PAGE_ADMIN_NOTIFICATION_SELECT_ROBOTS                     = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SELECT_TITLE                      = "InfraTools -";
	const PAGE_ADMIN_NOTIFICATION_TITLE                             = "InfraTools -";
	const PAGE_ADMIN_NOTIFICATION_UPDATE                            = "";
	const PAGE_ADMIN_NOTIFICATION_UPDATE_ROBOTS                   = "noindex";
	const PAGE_ADMIN_NOTIFICATION_UPDATE_TITLE                      = "InfraTools -";
	const PAGE_ADMIN_NOTIFICATION_VIEW                              = "";
	const PAGE_ADMIN_NOTIFICATION_VIEW_ROBOTS                       = "noindex";
	const PAGE_ADMIN_NOTIFICATION_VIEW_TITLE                        = "InfraTools -";
	const PAGE_ADMIN_SERVICE                                        = "";
	const PAGE_ADMIN_SERVICE_LIST                                   = "";
	const PAGE_ADMIN_SERVICE_LIST_ROBOTS                            = "noindex";
	const PAGE_ADMIN_SERVICE_LIST_TITLE                             = "InfraTools -";
	const PAGE_ADMIN_SERVICE_REGISTER                               = "";
	const PAGE_ADMIN_SERVICE_REGISTER_ROBOTS                        = "noindex";
	const PAGE_ADMIN_SERVICE_REGISTER_TITLE                         = "InfraTools -";
	const PAGE_ADMIN_SERVICE_ROBOTS                                 = "noindex";
	const PAGE_ADMIN_SERVICE_SELECT                                 = "";
	const PAGE_ADMIN_SERVICE_SELECT_ROBOTS                          = "noindex";
	const PAGE_ADMIN_SERVICE_SELECT_TITLE                           = "InfraTools -";
	const PAGE_ADMIN_SERVICE_TITLE                                  = "InfraTools -";
	const PAGE_ADMIN_SERVICE_UPDATE                                 = "";
	const PAGE_ADMIN_SERVICE_UPDATE_ROBOTS                          = "noindex";
	const PAGE_ADMIN_SERVICE_UPDATE_TITLE                           = "InfraTools -";
	const PAGE_ADMIN_SERVICE_VIEW                                   = "";
	const PAGE_ADMIN_SERVICE_VIEW_ROBOTS                            = "noindex";
	const PAGE_ADMIN_SERVICE_VIEW_TITLE                             = "InfraTools -";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION                           = "";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_LIST                      = "";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_LIST_ROBOTS               = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_LIST_TITLE                = "InfraTools -";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER                  = "";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER_ROBOTS           = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER_TITLE            = "InfraTools -";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_ROBOTS                    = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT                    = "";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT_ROBOTS             = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_SELECT_TITLE              = "InfraTools -";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_TITLE                     = "InfraTools -";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDATE                    = "";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDATE_ROBOTS             = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDATE_TITLE              = "InfraTools -";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW                      = "";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW_ROBOTS               = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW_TITLE                = "InfraTools -";
	const PAGE_ADMIN_TEAM                                           = "";
	const PAGE_ADMIN_TEAM_LIST                                      = "";
	const PAGE_ADMIN_TEAM_LIST_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TEAM_LIST_TITLE                                = "InfraTools -";
	const PAGE_ADMIN_TEAM_REGISTER                                  = "";
	const PAGE_ADMIN_TEAM_REGISTER_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TEAM_REGISTER_TITLE                            = "InfraTools -";
	const PAGE_ADMIN_TEAM_ROBOTS                                    = "noindex";
	const PAGE_ADMIN_TEAM_SELECT                                    = "";
	const PAGE_ADMIN_TEAM_SELECT_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TEAM_SELECT_TITLE                              = "InfraTools -";
	const PAGE_ADMIN_TEAM_TITLE                                     = "InfraTools -";
	const PAGE_ADMIN_TEAM_UPDATE                                    = "";
	const PAGE_ADMIN_TEAM_UPDATE_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TEAM_UPDATE_TITLE                              = "InfraTools -";
	const PAGE_ADMIN_TEAM_VIEW                                      = "";
	const PAGE_ADMIN_TEAM_VIEW_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TEAM_VIEW_TITLE                                = "InfraTools -";
	const PAGE_ADMIN_TEAM_VIEW_LIST_USERS                           = "";
	const PAGE_ADMIN_TEAM_VIEW_LIST_USERS_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TEAM_VIEW_LIST_USERS_TITLE                     = "InfraTools -";
	const PAGE_ADMIN_TECH_INFO                                      = "";
	const PAGE_ADMIN_TECH_INFO_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TECH_INFO_TITLE                                = "InfraTools -";
	const PAGE_ADMIN_TICKET                                         = "";
	const PAGE_ADMIN_TICKET_ASSOCIATE                               = "";
	const PAGE_ADMIN_TICKET_ASSOCIATE_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TICKET_ASSOCIATE_TITLE                         = "InfraTools -";
	const PAGE_ADMIN_TICKET_LIST                                    = "";
	const PAGE_ADMIN_TICKET_LIST_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TICKET_LIST_TITLE                              = "InfraTools -";
	const PAGE_ADMIN_TICKET_REGISTER                                = "";
	const PAGE_ADMIN_TICKET_REGISTER_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TICKET_REGISTER_TITLE                          = "InfraTools -";
	const PAGE_ADMIN_TICKET_ROBOTS                                  = "noindex";
	const PAGE_ADMIN_TICKET_SELECT                                  = "";
	const PAGE_ADMIN_TICKET_SELECT_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TICKET_SELECT_TITLE                            = "InfraTools -";
	const PAGE_ADMIN_TICKET_TITLE                                   = "InfraTools -";
	const PAGE_ADMIN_TICKET_UPDATE                                  = "";
	const PAGE_ADMIN_TICKET_UPDATE_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TICKET_UPDATE_TITLE                            = "InfraTools -";
	const PAGE_ADMIN_TICKET_VIEW                                    = "";
	const PAGE_ADMIN_TICKET_VIEW_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TICKET_VIEW_TITLE                              = "InfraTools -";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                           = "";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST                      = "";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST_TITLE                = "InfraTools -";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER                  = "";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_ROBOTS           = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_TITLE            = "InfraTools -";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT                    = "";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT_TITLE              = "InfraTools -";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_TITLE                     = "InfraTools -";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE                    = "";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_TITLE              = "InfraTools -";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW                      = "";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_TITLE                = "InfraTools -";
	const PAGE_ADMIN_TYPE_SERVICE                                   = "";
	const PAGE_ADMIN_TYPE_SERVICE_LIST                              = "";
	const PAGE_ADMIN_TYPE_SERVICE_LIST_ROBOTS                       = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_LIST_TITLE                        = "InfraTools -";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER                          = "";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_ROBOTS                   = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_TITLE                    = "InfraTools -";
	const PAGE_ADMIN_TYPE_SERVICE_ROBOTS                            = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT                            = "";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT_ROBOTS                     = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT_TITLE                      = "InfraTools -";
	const PAGE_ADMIN_TYPE_SERVICE_TITLE                             = "InfraTools -";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE                            = "";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE_ROBOTS                     = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE_TITLE                      = "InfraTools -";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW                              = "";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_ROBOTS                       = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_TITLE                        = "InfraTools -";
	const PAGE_ADMIN_TYPE_STATUS_TICKET                             = "";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LIST                        = "";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LIST_ROBOTS                 = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LIST_TITLE                  = "InfraTools -";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER                    = "";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_TITLE              = "InfraTools -";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT                      = "";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT_TITLE                = "InfraTools -";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_TITLE                       = "InfraTools -";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE                      = "";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE_TITLE                = "InfraTools -";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW                        = "";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_ROBOTS                 = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_TITLE                  = "InfraTools -";
	const PAGE_ADMIN_TYPE_TICKET                                    = "";
	const PAGE_ADMIN_TYPE_TICKET_LIST                               = "";
	const PAGE_ADMIN_TYPE_TICKET_LIST_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_LIST_TITLE                         = "InfraTools -";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER                           = "";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_TITLE                     = "InfraTools -";
	const PAGE_ADMIN_TYPE_TICKET_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SELECT                             = "";
	const PAGE_ADMIN_TYPE_TICKET_SELECT_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SELECT_TITLE                       = "InfraTools -";
	const PAGE_ADMIN_TYPE_TICKET_TITLE                              = "InfraTools -";
	const PAGE_ADMIN_TYPE_TICKET_UPDATE                             = "";
	const PAGE_ADMIN_TYPE_TICKET_UPDATE_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_UPDATE_TITLE                       = "InfraTools -";
	const PAGE_ADMIN_TYPE_TICKET_VIEW                               = "";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_TITLE                         = "InfraTools -";
	const PAGE_ADMIN_TYPE_USER                                      = "";
	const PAGE_ADMIN_TYPE_USER_LIST                                 = "";
	const PAGE_ADMIN_TYPE_USER_LIST_ROBOTS                          = "noindex";
	const PAGE_ADMIN_TYPE_USER_LIST_TITLE                           = "InfraTools -";
	const PAGE_ADMIN_TYPE_USER_REGISTER                             = "";
	const PAGE_ADMIN_TYPE_USER_REGISTER_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_USER_REGISTER_TITLE                       = "InfraTools -";
	const PAGE_ADMIN_TYPE_USER_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TYPE_USER_SELECT                               = "";
	const PAGE_ADMIN_TYPE_USER_SELECT_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_USER_SELECT_TITLE                         = "InfraTools -";
	const PAGE_ADMIN_TYPE_USER_TITLE                                = "InfraTools -";
	const PAGE_ADMIN_TYPE_USER_UPDATE                               = "";
	const PAGE_ADMIN_TYPE_USER_UPDATE_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_USER_UPDATE_TITLE                         = "InfraTools -";
	const PAGE_ADMIN_TYPE_USER_VIEW                                 = "";
	const PAGE_ADMIN_TYPE_USER_VIEW_ROBOTS                          = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_TITLE                           = "InfraTools -";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS                           = "";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_TITLE                     = "InfraTools -";
	const PAGE_ADMIN_USER                                           = "";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION             = "";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_ROBOTS      = "noindex";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_TITLE       = "InfraTools -";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION                        = "";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_ROBOTS                 = "noindex";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_TITLE                  = "InfraTools -";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE                          = "";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_ROBOTS                   = "noindex";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_TITLE                    = "InfraTools -";
	const PAGE_ADMIN_USER_LIST                                      = "";
	const PAGE_ADMIN_USER_LIST_ROBOTS                               = "noindex";
	const PAGE_ADMIN_USER_LIST_TITLE                                = "InfraTools -";
	const PAGE_ADMIN_USER_REGISTER                                  = "";
	const PAGE_ADMIN_USER_REGISTER_ROBOTS                           = "noindex";
	const PAGE_ADMIN_USER_REGISTER_TITLE                            = "InfraTools -";
	const PAGE_ADMIN_USER_ROBOTS                                    = "noindex";
	const PAGE_ADMIN_USER_SELECT                                    = "";
	const PAGE_ADMIN_USER_SELECT_ROBOTS                             = "noindex";
	const PAGE_ADMIN_USER_SELECT_TITLE                              = "InfraTools -";
	const PAGE_ADMIN_USER_TITLE                                     = "InfraTools -";
	const PAGE_ADMIN_USER_UPDATE                                    = "";
	const PAGE_ADMIN_USER_UPDATE_ROBOTS                             = "noindex";
	const PAGE_ADMIN_USER_UPDATE_TITLE                              = "InfraTools -";
	const PAGE_ADMIN_USER_VIEW                                      = "";
	const PAGE_ADMIN_USER_VIEW_ROBOTS                               = "noindex";
	const PAGE_ADMIN_USER_VIEW_TITLE                                = "InfraTools -";
	const PAGE_CHECK                                                = "";
	const PAGE_CHECK_ROBOTS                                         = "noindex";
	const PAGE_CHECK_TITLE                                          = "InfraTools -";
	const PAGE_CONTACT                                              = "";
	const PAGE_CONTACT_ROBOTS                                       = "noindex";
	const PAGE_CONTACT_TITLE                                        = "InfraTools -";
	const PAGE_CORPORATION                                          = "";
	const PAGE_CORPORATION_ROBOTS                                   = "noindex";
	const PAGE_CORPORATION_TITLE                                    = "InfraTools -";
	const PAGE_DIAGNOSTIC_TOOLS                                     = "";
	const PAGE_DIAGNOSTIC_TOOLS_ROBOTS                              = "noindex";
	const PAGE_DIAGNOSTIC_TOOLS_TITLE                               = "InfraTools -";
	const PAGE_GET                                                  = "";
	const PAGE_GET_ROBOTS                                           = "noindex";
	const PAGE_GET_TITLE                                            = "InfraTools -";
	const PAGE_HOME                                                 = "";
	const PAGE_HOME_ROBOTS                                          = "noindex";
	const PAGE_HOME_TITLE                                           = "InfraTools -";
	const PAGE_INSTALL                                              = "";
	const PAGE_INSTALL_ROBOTS                                       = "noindex";
	const PAGE_INSTALL_TITLE                                        = "InfraTools -";
	const PAGE_LOGIN                                                = "";
	const PAGE_LOGIN_ROBOTS                                         = "noindex";
	const PAGE_LOGIN_TITLE                                          = "InfraTools -";
	const PAGE_NOT_FOUND                                            = "";
	const PAGE_NOT_FOUND_ROBOTS                                     = "noindex";
	const PAGE_NOT_FOUND_TITLE                                      = "InfraTools -";
	const PAGE_NOTIFICATION                                         = "";
	const PAGE_NOTIFICATION_ROBOTS                                  = "noindex";
	const PAGE_NOTIFICATION_TITLE                                   = "InfraTools -";
	const PAGE_PASSWORD_RECOVERY                                    = "";
	const PAGE_PASSWORD_RECOVERY_ROBOTS                             = "noindex";
	const PAGE_PASSWORD_RECOVERY_TITLE                              = "InfraTools -";
	const PAGE_PASSWORD_RESET                                       = "";
	const PAGE_PASSWORD_RESET_ROBOTS                                = "noindex";
	const PAGE_PASSWORD_RESET_TITLE                                 = "InfraTools -";
	const PAGE_REGISTER                                             = "";
	const PAGE_REGISTER_ROBOTS                                      = "noindex";
	const PAGE_REGISTER_TITLE                                       = "InfraTools -";
	const PAGE_REGISTER_CONFIRMATION                                = "";
	const PAGE_REGISTER_CONFIRMATION_ROBOTS                         = "noindex";
	const PAGE_REGISTER_CONFIRMATION_TITLE                          = "InfraTools -";
	const PAGE_RESEND_CONFIRMATION_LINK                             = "";
	const PAGE_RESEND_CONFIRMATION_LINK_ROBOTS                      = "noindex";
	const PAGE_RESEND_CONFIRMATION_LINK_TITLE                       = "InfraTools -";
	const PAGE_SERVICE                                              = "";
	const PAGE_SERVICE_ROBOTS                                       = "noindex";
	const PAGE_SERVICE_TITLE                                        = "InfraTools -";
	const PAGE_SERVICE_LIST                                         = "";
	const PAGE_SERVICE_LIST_BY_CORPORATION                          = "";
	const PAGE_SERVICE_LIST_BY_CORPORATION_ROBOTS                   = "noindex";
	const PAGE_SERVICE_LIST_BY_CORPORATION_TITLE                    = "InfraTools -";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT                           = "";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT_ROBOTS                    = "noindex";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT_TITLE                     = "InfraTools -";
	const PAGE_SERVICE_LIST_BY_NAME                                 = "";
	const PAGE_SERVICE_LIST_BY_NAME_ROBOTS                          = "noindex";
	const PAGE_SERVICE_LIST_BY_NAME_TITLE                           = "InfraTools -";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE              = "";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_ROBOTS       = "noindex";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_TITLE        = "InfraTools -";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE                         = "";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE_ROBOTS                  = "noindex";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE_TITLE                   = "InfraTools -";
	const PAGE_SERVICE_LIST_BY_USER                                 = "";
	const PAGE_SERVICE_LIST_BY_USER_ROBOTS                          = "noindex";
	const PAGE_SERVICE_LIST_BY_USER_TITLE                           = "InfraTools -";
	const PAGE_SERVICE_LIST_ROBOTS                                  = "noindex";
	const PAGE_SERVICE_LIST_TITLE                                   = "InfraTools -";
	const PAGE_SERVICE_REGISTER                                     = "";
	const PAGE_SERVICE_REGISTER_ROBOTS                              = "noindex";
	const PAGE_SERVICE_REGISTER_TITLE                               = "InfraTools -";
	const PAGE_SERVICE_SELECT                                       = "";
	const PAGE_SERVICE_SELECT_ROBOTS                                = "noindex";
	const PAGE_SERVICE_SELECT_TITLE                                 = "InfraTools -";
	const PAGE_SERVICE_UPDATE                                       = "";
	const PAGE_SERVICE_UPDATE_ROBOTS                                = "noindex";
	const PAGE_SERVICE_UPDATE_TITLE                                 = "InfraTools -";
	const PAGE_SERVICE_VIEW                                         = "";
	const PAGE_SERVICE_VIEW_ROBOTS                                  = "noindex";
	const PAGE_SERVICE_VIEW_TITLE                                   = "InfraTools -";
	const PAGE_SUPPORT                                              = "";
	const PAGE_SUPPORT_ROBOTS                                       = "noindex";
	const PAGE_SUPPORT_TITLE                                        = "InfraTools -";
	const PAGE_TEAM                                                 = "";
	const PAGE_TEAM_ROBOTS                                          = "noindex";
	const PAGE_TEAM_TITLE                                           = "InfraTools -";
	const PAGE_TEAM_LIST                                            = "";
	const PAGE_TEAM_LIST_ROBOTS                                     = "noindex";
	const PAGE_TEAM_LIST_TITLE                                      = "InfraTools -";
	const PAGE_TEAM_REGISTER                                        = "";
	const PAGE_TEAM_REGISTER_ROBOTS                                 = "noindex";
	const PAGE_TEAM_REGISTER_TITLE                                  = "InfraTools -";
	const PAGE_TEAM_SELECT                                          = "";
	const PAGE_TEAM_SELECT_ROBOTS                                   = "noindex";
	const PAGE_TEAM_SELECT_TITLE                                    = "InfraTools -";
	const PAGE_TEAM_UPDATE                                          = "";
	const PAGE_TEAM_UPDATE_ROBOTS                                   = "noindex";
	const PAGE_TEAM_UPDATE_TITLE                                    = "InfraTools -";
	const PAGE_TEAM_VIEW                                            = "";
	const PAGE_TEAM_VIEW_ROBOTS                                     = "noindex";
	const PAGE_TEAM_VIEW_TITLE                                      = "InfraTools -";
	const PHONE_PREFIX                                              = "";
	const PHONE_PRIMARY                                             = "";
	const PHONE_SECONDARY                                           = "";
	const REGION                                                    = "";
	const REGION_CODE                                               = "";
	const REGISTER_DATE                                             = "";
	const REGISTRATION_DATE                                         = "";
	const REGISTRATION_DATE_TIP                                     = "";
	const REGISTRATION_ID                                           = "";
	const REGISTRATION_ID_TIP                                       = "";
	const ROW_COUNT                                                 = "";
	const SEND_EMAIL_ERROR                                          = "";
	const SERVICE_DELETE_ERROR                                      = "";
	const SERVICE_DELETE_ERROR_FOREIGN_KEY                          = "";
	const SERVICE_DELETE_SUCCESS                                    = "";
	const SERVICE_INSERT_ERROR                                      = "";
	const SERVICE_INSERT_SUCCESS                                    = "";
	const SERVICE_NOT_FOUND                                         = "";
	const SERVICE_NOT_FOUND_FOR_USER                                = "";
	const SERVICE_NOT_FOUND_FOR_USER_BY_CORPORATION                 = "";
	const SERVICE_NOT_FOUND_FOR_USER_BY_DEPARTMENT                  = "";
	const SERVICE_NOT_FOUND_FOR_USER_BY_TYPE_ASSOC_USER_SERVICE     = "";
	const SERVICE_NOT_FOUND_FOR_USER_BY_TYPE_SERVICE                = "";
	const SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR                    = "";
	const SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS                  = "";
	const SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR               = "";
	const SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS             = "";
	const SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR                = "";
	const SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS              = "";
	const SERVICE_SELECT_BY_SERVICE_ID_ERROR                        = "";
	const SERVICE_SELECT_BY_SERVICE_ID_SUCCESS                      = "";
	const SERVICE_SELECT_BY_SERVICE_NAME_ERROR                      = "";
	const SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS                    = "";
	const SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR   = "";
	const SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS = "";
	const SERVICE_SELECT_BY_SERVICE_TYPE_ERROR                      = "";
	const SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS                    = "";
	const SERVICE_SELECT_BY_SERVICE_USER_ERROR                      = "";
	const SERVICE_SELECT_BY_SERVICE_USER_SUCCESS                    = "";
	const SERVICE_SELECT_CORPORATION                                = "";
	const SERVICE_SELECT_DEPARTMENT                                 = "";
	const SERVICE_SELECT_ERROR                                      = "";
	const SERVICE_SELECT_SUCCESS                                    = "";
	const SERVICE_SELECT_TYPE                                       = "";
	const SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE                    = "";
	const SERVICE_TYPE                                              = "";
	const SERVICE_UPDATE_BY_ID_ERROR                                = "";
	const SERVICE_UPDATE_BY_ID_SUCCESS                              = "";
	const SERVICE_UPDATE_RESTRICTBY_ID_ERROR                        = "";
	const SERVICE_UPDATE_RESTRICT_BY_ID_SUCCESS                     = "";
	const SESSION_EXPIRES                                           = "";
	const SUBMIT_ACCOUNT_ACTIVATE                                   = "";
	const SUBMIT_ACCOUNT_DEACTIVATE                                 = "";
	const SUBMIT_BACK                                               = "";
	const SUBMIT_CANCEL                                             = "";
	const SUBMIT_CHANGE_ASSOC_USER_CORPORATION                      = "";
	const SUBMIT_CHANGE_CORPORATION                                 = "";
	const SUBMIT_CHANGE_PASSWORD                                    = "";
	const SUBMIT_CHANGE_USER_TYPE                                   = "";
	const SUBMIT_CONFIRM                                            = "";
	const SUBMIT_DELETE                                             = "";
	const SUBMIT_FORWARD                                            = "";
	const SUBMIT_INSERT                                             = "";
	const SUBMIT_INSTALL_EXPORT                                     = "";
	const SUBMIT_INSTALL_IMPORT                                     = "";
	const SUBMIT_INSTALL_NEW                                        = "";
	const SUBMIT_INSTALL_REINSTALL                                  = "";
	const SUBMIT_LIST                                               = "";
	const SUBMIT_LIST_USERS                                         = "";
	const SUBMIT_REGISTER                                           = "";
	const SUBMIT_RESET_PASSWORD                                     = "";
	const SUBMIT_SELECT                                             = "";
	const SUBMIT_TWO_STEP_VERIFICATION_ACTIVATE                     = "";
	const SUBMIT_TWO_STEP_VERIFICATION_DEACTIVATE                   = "";
	const SUBMIT_UPDATE                                             = "";
	const SUBMIT_VALIDATE                                           = "";
	const SYSTEM_CONFIGURATION_DELETE_ERROR                         = "";
	const SYSTEM_CONFIGURATION_DELETE_SUCCESS                       = "";
	const SYSTEM_CONFIGURATION_INSERT_ERROR                         = "";
	const SYSTEM_CONFIGURATION_INSERT_EXISTS                        = "";
	const SYSTEM_CONFIGURATION_INSERT_SUCCESS                       = "";
	const SYSTEM_CONFIGURATION_NOT_FOUND                            = "";
	const SYSTEM_CONFIGURATION_UPDATE_ERROR                         = "";
	const SYSTEM_CONFIGURATION_UPDATE_SUCCESS                       = "";
	const TABLE_PAGE_PREFIX                                         = "";
	const TABLE_PAGE                                                = "";
	const TEAM                                                      = "";
	const TEAM_NOT_FOUND                                            = "";
	const TEAMS                                                     = "";
	const TEXT_BUTTON_GET                                           = "";
	const TEXT_BUTTON_VERIFY                                        = "";
	const TEXT_HOSTNAME                                             = "";
	const TEXT_IP_ADDRESS                                           = "";
	const TEXT_MASK                                                 = "";
	const TEXT_NUMBER                                               = "";
	const TEXT_PORT                                                 = "";
	const TEXT_WEBSITE                                              = "";
	const TICKET_DELETE_ERROR                                       = "";
	const TICKET_DELETE_SUCCESS                                     = "";
	const TICKET_INSERT_ERROR                                       = "";
	const TICKET_INSERT_SUCCESS                                     = "";
	const TICKET_NOT_FOUND                                          = "";
	const TYPE                                                      = "";
	const TYPE_ASSOC_USER_SERVICE_SELECT_ERROR                      = "";
	const TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS                    = "";
	const TYPE_ASSOC_USER_TEAM_DESCRIPTION                          = "";
	const TYPE_ASSOC_USER_TEAM_NOT_FOUND                            = "";
	const TYPE_STATUS_TICKET_NOT_FOUND                              = "";
	const TYPE_TICKET_NOT_FOUND                                     = "";
	const TYPE_USER_ID                                              = "";
	const TYPE_USER_NOT_FOUND                                       = "";
	const UPDATE_ERROR_ASSOC_USER_CORPORATION                       = "";
	const UPDATE_ERROR_USER_UNIQUE_ID                               = "";
	const UPDATE_SUCCESS                                            = "";
	const UPDATE_WARNING_SAME_VALUE                                 = "";
	const USER_ACTIVE                                               = "";
	const USER_CONFIRMED                                            = "";
	const USER_DELETE_FAILED_RESTRICTION                            = "";
	const USER_INACTIVE                                             = "";
	const USER_NOT_CONFIRMED                                        = "";
	const USER_NOT_FOUND                                            = "";
	const USER_SELECT_BY_CORPORATION_NAME_ERROR                     = "";
	const USER_SELECT_BY_CORPORATION_NAME_WARNING                   = "";
	const USER_SELECT_BY_DEPARTMENT_NAME_ERROR                      = "";
	const USER_SELECT_BY_DEPARTMENT_NAME_WARNING                    = "";
	const USER_SELECT_BY_HASH_CODE_ERROR                            = "";
	const USER_SELECT_BY_HASH_CODE_SUCCESS                          = "";
	const USER_SELECT_BY_SERVICE_ID_ERROR                           = "";
	const USER_SELECT_BY_SERVICE_ID_WARNING                         = "";
	const USER_SELECT_BY_TEAM_ID_ERROR                              = "";
	const USER_SELECT_BY_TEAM_ID_WARNING                            = "";
	const USER_SELECT_BY_TICKET_ID_ERROR                            = "";
	const USER_SELECT_BY_TICKET_ID_WARNING                          = "";
	const USER_SELECT_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_ERROR     = "";
	const USER_SELECT_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_WARNING   = "";
	const USER_SELECT_BY_TYPE_TICKET_DESCRIPTION_ERROR              = "";
	const USER_SELECT_BY_TYPE_TICKET_DESCRIPTION_WARNING            = "";
	const USER_SELECT_BY_TYPE_USER_DESCRIPTION_ERROR                = "";
	const USER_SELECT_BY_TYPE_USER_DESCRIPTION_WARNING              = "";
	const USER_SELECT_BY_USER_EMAIL_ERROR                           = "";
	const USER_SELECT_BY_USER_EMAIL_SUCCESS                         = "";
	const USER_SELECT_BY_USER_UNIQUE_ID_ERROR                       = "";
	const USER_SELECT_BY_USER_UNIQUE_ID_SUCCESS                     = "";
	const USER_SELECT_EXISTS_BY_USER_EMAIL_ERROR                    = "";
	const USER_SELECT_EXISTS_BY_USER_EMAIL_SUCCESS                  = "";
	const USER_SELECT_HASH_CODE_BY_USER_EMAIL_ERROR                 = "";
	const USER_SELECT_HASH_CODE_BY_USER_EMAIL_SUCCESS               = ""; 
	const USER_SELECT_TEAM_BY_USER_EMAIL_ERROR                      = "";
	const USER_SELECT_TEAM_BY_USER_EMAIL_WARNING                    = "";
	const USER_TEAM_SELECT_ERROR                                    = "";
	const USER_TWO_STEP_VERIFICATION_CHANGE_ERROR                   = "";
	const USER_TWO_STEP_VERIFICATION_CHANGE_SUCCESS                 = "";
	const USER_UNIQUE_ID                                            = "";
	const USER_UNIQUE_ID_TIP                                        = "";
	const USER_UPDATE_USER_CONFIRMED_ERROR                          = "";
	const USER_UPDATE_USER_CONFIRMED_SUCCESS                        = "";
	const USER_UPDATE_USER_PASSWORD_ERROR                           = "";
	const USER_UPDATE_USER_PASSWORD_SUCCESS                         = "";
	const USER_UPDATE_USER_PASSWORD_WARNING                         = "";
 	
	/* Header */
	const HEADER_CHANGE_LAYOUT                                      = "";
	const HEADER_DEBUG                                              = "";
	const HEADER_PAGE_ABOUT_TITLE                                   = "";
	const HEADER_PAGE_ABOUT_TEXT                                    = "";
	const HEADER_PAGE_ACCOUNT_TITLE                                 = "";
	const HEADER_PAGE_ACCOUNT_TEXT                                  = "";
	const HEADER_PAGE_ADMIN_TITLE                                   = "";
	const HEADER_PAGE_ADMIN_TEXT                                    = "";
	const HEADER_PAGE_CHECK_TITLE                                   = "";
	const HEADER_PAGE_CHECK_TEXT                                    = "";
	const HEADER_PAGE_CONTACT_TITLE                                 = "";
	const HEADER_PAGE_CONTACT_TEXT                                  = "";
	const HEADER_PAGE_CORPORATION_TITLE                             = "";
	const HEADER_PAGE_CORPORATION_TEXT                              = "";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TITLE                        = "";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TEXT                         = "";
	const HEADER_PAGE_GET_TITLE                                     = "";
	const HEADER_PAGE_GET_TEXT                                      = "";
	const HEADER_PAGE_HOME_TITLE                                    = "InfraTools";
	const HEADER_PAGE_HOME_IMAGE_ALT                                = "InfraTools";
	const HEADER_PAGE_LOGIN_TITLE                                   = "";
	const HEADER_PAGE_LOGIN_TEXT                                    = "";
	const HEADER_PAGE_LOGOUT                                        = "";
	const HEADER_PAGE_NOTIFICATION_TITLE                            = "";
	const HEADER_PAGE_NOTIFICATION_TEXT                             = "";
	const HEADER_PAGE_REGISTER_TITLE                                = "";
	const HEADER_PAGE_REGISTER_TEXT                                 = "";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TITLE                = "";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TEXT                 = "";
	const HEADER_PAGE_SERVICE_TITLE                                 = "";
	const HEADER_PAGE_SERVICE_TEXT                                  = "";
	const HEADER_PAGE_SUPPORT_TITLE                                 = "";
	const HEADER_PAGE_SUPPORT_TEXT                                  = "";
	const HEADER_PAGE_TEAM_TITLE                                    = "";
	const HEADER_PAGE_TEAM_TEXT                                     = "";
	
	/* Body Page About */
	const ABOUT_DESCRIPTION_TITLE                                   = "";
	const ABOUT_DESCRIPTION_TEXT                                    = "";
	const ABOUT_SERVICE_TITLE                                       = "";
	const ABOUT_SERVICE_TEXT                                        = "";
	const ABOUT_PERSONALIZED_TITLE                                  = "";
	const ABOUT_PERSONALIZED_TEXT                                   = "";
	
	/* Body Page Account Update */
	const ACCOUNT_UPDATE_ERROR                                      = "";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE                         = "";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE_DAY                     = "";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE_MONTH                   = "";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE_YEAR                    = "";
	const ACCOUNT_UPDATE_INVALID_GENDER                             = "";
	const ACCOUNT_UPDATE_INVALID_NAME                               = "";
	const ACCOUNT_UPDATE_INVALID_NAME_SIZE                          = "";
	const ACCOUNT_UPDATE_INVALID_USER_UNIQUE_ID                     = "";
	const ACCOUNT_UPDATE_INVALID_USER_UNIQUE_ID_SIZE                = "";
	const ACCOUNT_UPDATE_NAME_TIP                                   = "";
	const ACCOUNT_UPDATE_SELECT_BIRTH_DATE_DAY                      = "";
	const ACCOUNT_UPDATE_SELECT_BIRTH_DATE_MONTH                    = "";
	const ACCOUNT_UPDATE_SELECT_BIRTH_DATE_YEAR                     = "";
	const ACCOUNT_UPDATE_SELECT_GENDER_MALE                         = "";
	const ACCOUNT_UPDATE_SELECT_GENDER_FEMALE                       = "";
	const ACCOUNT_UPDATE_TEXT_BIRTH_DATE                            = "";
	
	/* Body Page Account Change Password */
	const ACCOUNT_CHANGE_PASSWORD_ERROR                             = "";
	const ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD                  = "";
	const ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD_MATCH            = "";
	const ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD_SIZE             = "";
	const ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD                      = "";
	const ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD_TIP                  = "";
	const ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD_TITLE                = "";
	const ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD                   = "";
	const ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD_TIP               = "";
	const ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD_TITLE             = "";
	const ACCOUNT_CHANGE_PASSWORD_SUBMIT                            = "";
	const ACCOUNT_CHANGE_PASSWORD_SUBMIT_CANCEL                     = "";
	const ACCOUNT_CHANGE_PASSWORD_SUCCESS                           = "";
	
	/* Body Page Account Corporation */
	
	/* Body Page Admin */
	const ADMIN_OPTIONS_TITLE                                       = "";
	const ADMIN_TEXT_CORPORATION                                    = "";
	const ADMIN_TEXT_COUNTRY                                        = "";
	const ADMIN_TEXT_DEPARTMENT                                     = "";
	const ADMIN_TEXT_INSTALL                                        = "";
	const ADMIN_TEXT_NOTIFICATION                                   = "";
	const ADMIN_TEXT_SERVICE                                        = "";
	const ADMIN_TEXT_SYSTEM_CONFIGURATION                           = "";
	const ADMIN_TEXT_TEAM                                           = "";
	const ADMIN_TEXT_TECH_INFO                                      = "";
	const ADMIN_TEXT_TICKET                                         = "";
	const ADMIN_TEXT_TYPE_ASSOC_USER_TEAM                           = "";
	const ADMIN_TEXT_TYPE_SERVICE                                   = "";
	const ADMIN_TEXT_TYPE_STATUS_TICKET                             = "";
	const ADMIN_TEXT_TYPE_TICKET                                    = "";
	const ADMIN_TEXT_TYPE_USER                                      = "";
	const ADMIN_TEXT_USER                                           = "";
	
	/* Body Page AdminCorporation */
	const CORPORATION_DELETE_ERROR                                  = "";
	const CORPORATION_DELETE_ERROR_DEPENDENCY_DEPARTMENT            = "";
	const CORPORATION_DELETE_SUCCESS                                = "";
	const CORPORATION_INSERT_ERROR                                  = "";
	const CORPORATION_INSERT_SUCCESS                                = "";
	
	/* Body Page AdminCountry */
	
	/* Body Page AdminDepartment */
	const DEPARTMENT_DELETE_ERROR                             = "";
	const DEPARTMENT_DELETE_ERROR_DEPENDENCY_USERS            = "";
	const DEPARTMENT_DELETE_SUCCESS                           = "";
	const DEPARTMENT_INSERT_ERROR                             = "";
	const DEPARTMENT_INSERT_ERROR_DEPARTMENT_EXISTS           = "";
	const DEPARTMENT_INSERT_SUCCESS                           = "";
	const DEPARTMENT_UPDATE_ERROR                             = "";
	const DEPARTMENT_UPDATE_SUCCESS                           = "";
	
	/* Body Page AdminTeam */
	const TEAM_DELETE_ERROR                                   = "";
	const TEAM_DELETE_ERROR_DEPENDENCY_TEAM                   = "";
	const TEAM_DELETE_SUCCESS                                 = "";
	const TEAM_INVALID_DESCRIPTION                            = "";
	const TEAM_INVALID_DESCRIPTION_SIZE                       = "";
	const TEAM_INSERT_ERROR                                   = "";
	const TEAM_INSERT_SUCCESS                                 = "";
	const TEAM_UPDATE_ERROR                                   = "";
	const TEAM_UPDATE_SUCCESS                                 = "";
	
	/* Body Page Admin Tech Info */
	const TECH_INFO_DIRECTORY_COUNT                           = "";
	const TECH_INFO_FILE_COUNT                                = "";
	const TECH_INFO_FILE_EXTENSION                            = "";
	const TECH_INFO_FILE_TYPE                                 = "";
	const TECH_INFO_FILE_VALUE                                = "";
	const TECH_INFO_LANGUAGE_QUANTITY_CONSTANT                = "";
	const TECH_INFO_LANGUAGE_QUANTITY_VALUE                   = "";
	const TECH_INFO_LANGUAGE_CONSTANTS_PROBLEM                = "";
	const TECH_INFO_TITLE_BASE                                = "";
	const TECH_INFO_TITLE_INFRATOOLS                          = "InfraTools";
	const TECH_INFO_TITLE_TOTAL                               = "";
	
	/* Body Page AdminTypeAssocUserTeam */
	const TYPE_ASSOC_USER_TEAM_DELETE_ERROR                   = "";
	const TYPE_ASSOC_USER_TEAM_DELETE_ERROR_DEPENDENCY_TEAM   = "";
	const TYPE_ASSOC_USER_TEAM_DELETE_SUCCESS                 = "";
	const TYPE_ASSOC_USER_TEAM_INSERT_ERROR                   = "";
	const TYPE_ASSOC_USER_TEAM_INSERT_SUCCESS                 = "";
	const TYPE_ASSOC_USER_TEAM_UPDATE_ERROR                   = "";
	const TYPE_ASSOC_USER_TEAM_UPDATE_SUCCESS                 = "";
	
	/* Body Page AdminTypeStatusTicket */
	const TYPE_STATUS_TICKET_DELETE_ERROR                     = "";
	const TYPE_STATUS_TICKET_DELETE_ERROR_DEPENDENCY_TICKET   = "";
	const TYPE_STATUS_TICKET_DELETE_SUCCESS                   = "";
	const TYPE_STATUS_TICKET_INSERT_ERROR                     = "";
	const TYPE_STATUS_TICKET_INSERT_SUCCESS                   = "";
	const TYPE_STATUS_TICKET_UPDATE_ERROR                     = "";
	const TYPE_STATUS_TICKET_UPDATE_SUCCESS                   = "";
 	
	/* Body Page AdminTypeTicket */
	const TYPE_TICKET_DELETE_ERROR                            = "";
	const TYPE_TICKET_DELETE_ERROR_DEPENDENCY_TICKET          = "";
	const TYPE_TICKET_DELETE_SUCCESS                          = "";
	const TYPE_TICKET_INVALID_DESCRIPTION                     = "";
	const TYPE_TICKET_INVALID_DESCRIPTION_SIZE                = "";
	const TYPE_TICKET_INSERT_ERROR                            = "";
	const TYPE_TICKET_INSERT_SUCCESS                          = "";
	const TYPE_TICKET_UPDATE_ERROR                            = "";
	const TYPE_TICKET_UPDATE_SUCCESS                          = "";
 	 
	/* Body Page AdminTypeUser */
	const TYPE_USER_DELETE_ERROR                              = "";
	const TYPE_USER_DELETE_ERROR_DEPENDENCY_USER              = "";
	const TYPE_USER_DELETE_SUCCESS                            = "";
	const TYPE_USER_INVALID_DESCRIPTION                       = "";
	const TYPE_USER_INVALID_DESCRIPTION_SIZE                  = "";
	const TYPE_USER_INSERT_ERROR                              = "";
	const TYPE_USER_INSERT_SUCCESS                            = "";
	const TYPE_USER_UPDATE_ERROR                              = "";
	const TYPE_USER_UPDATE_SUCCESS                            = "";
	
	/* Body Page AdminUser */
	const USER_ACTIVATE_ERROR                                 = "";
	const USER_ACTIVATE_ERROR_NO_USER_SELECTED                = "";
	const USER_ACTIVATE_SUCCESS                               = "";
	const USER_CHANGE_CORPORATION_ERROR                       = "";
	const USER_CHANGE_CORPORATION_SUCCESS                     = "";
	const USER_CHANGE_USER_TYPE_ERROR                         = "";
	const USER_CHANGE_USER_TYPE_SUCCESS                       = "";
	const USER_DELETE_ERROR                                   = "";         
	const USER_DELETE_SUCCESS                                 = "";
	const USER_SEARCH_RESULT_NUMBER                           = "";
	const USER_SEARCH_RANGE_START                             = "";
	const USER_SEARCH_RANGE_END                               = "";
	
	/* Body Page Check */

	const CHECK_SUBMIT                                              = "";
	const CHECK_AVAILABILITY_INPUT_HOST_TITLE                       = "";
	const CHECK_AVAILABILITY_LABEL_HOST                             = "";
	const CHECK_AVAILABILITY_TITLE                                  = "";
	const CHECK_AVAILABILITY_TEXT                                   = "";
	const CHECK_AVAILABILITY_TEXT_TIP                               = "";
	const CHECK_BLACKLIST_LABEL_HOST                                = "";
	const CHECK_BLACKLIST_LABEL_IP                                  = "";
	const CHECK_BLACKLIST_RADIO_HOST_TITLE                          = "";
	const CHECK_BLACKLIST_RADIO_IP_TITLE                            = "";
	const CHECK_BLACKLIST_INPUT_HOST_TITLE                          = "";
	const CHECK_BLACKLIST_INPUT_IP_TITLE                            = "";
	const CHECK_BLACKLIST_TITLE                                     = "";
	const CHECK_BLACKLIST_TEXT                                      = "";
	const CHECK_BLACKLIST_TEXT_TIP                                  = "";
	const CHECK_DNS_INPUT_HOST_TITLE                                = "";
	const CHECK_DNS_LABEL_HOST                                      = "";
	const CHECK_DNS_TITLE                                           = "";
	const CHECK_DNS_TEXT                                            = "";
	const CHECK_DNS_TEXT_TIP                                        = "";
	const CHECK_EMAIL_EXISTS_INPUT_ADDRESS_TITLE                    = "";
	const CHECK_EMAIL_EXISTS_LABEL_ADDRESS                          = "";
	const CHECK_EMAIL_EXISTS_TITLE                                  = "";
	const CHECK_EMAIL_EXISTS_TEXT                                   = "";
	const CHECK_EMAIL_EXISTS_TEXT_TIP                               = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP                   = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK                 = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK              = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_IP                   = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_MASK                 = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_NETWORK              = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_TITLE                      = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT                       = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT_TIP                   = "";
	const CHECK_PING_INPUT_HOST_TITLE                               = "";
	const CHECK_PING_INPUT_IP_TITLE                                 = "";
	const CHECK_PING_LABEL_HOST                                     = "";
	const CHECK_PING_LABEL_IP                                       = "";
	const CHECK_PING_RADIO_HOST_TITLE                               = "";
	const CHECK_PING_RADIO_IP_TITLE                                 = "";
	const CHECK_PING_TITLE                                          = "";
	const CHECK_PING_TEXT                                           = "";
	const CHECK_PING_TEXT_TIP                                       = "";
	const CHECK_PORT_STATUS_INPUT_HOST_TITLE                        = "";
	const CHECK_PORT_STATUS_INPUT_HOST_PORT_TITLE                   = "";
	const CHECK_PORT_STATUS_INPUT_IP_TITLE                          = "";
	const CHECK_PORT_STATUS_INPUT_IP_PORT_TITLE                     = "";
	const CHECK_PORT_STATUS_LABEL_HOST                              = "";
	const CHECK_PORT_STATUS_LABEL_HOST_PORT                         = "";
	const CHECK_PORT_STATUS_LABEL_IP                                = "";
	const CHECK_PORT_STATUS_LABEL_IP_PORT                           = "";
	const CHECK_PORT_STATUS_RADIO_IP_TITLE                          = "";
	const CHECK_PORT_STATUS_RADIO_HOST_TITLE                        = "";
	const CHECK_PORT_STATUS_TITLE                                   = "";
	const CHECK_PORT_STATUS_TEXT                                    = "";
	const CHECK_PORT_STATUS_TEXT_TIP                                = "";
	
	/* Body Page Contact */
	const CONTACT_EMAIL_ALREADY_SENT                                = "";
	const CONTACT_EMAIL_ERROR                                       = "";
	const CONTACT_INVALID_EMAIL                                     = "";
	const CONTACT_INVALID_EMAIL_SIZE                                = "";
	const CONTACT_INVALID_NAME                                      = "";
	const CONTACT_INVALID_NAME_SIZE                                 = "";
	const CONTACT_INVALID_MESSAGE_SIZE                              = "";
	const CONTACT_INVALID_SUBJECT                                   = "";
	const CONTACT_INVALID_TITLE                                     = "";
	const CONTACT_INVALID_TITLE_SIZE                                = "";
	const CONTACT_SUCCESS                                           = "";
	const CONTACT_SELECT_COMMERCIAL                                 = "";
	const CONTACT_SELECT_DOUBT                                      = "";
	const CONTACT_SELECT_SUGGESTION                                 = "";
	const CONTACT_TEXT_CAPTCHA                                      = "";
	const CONTACT_TEXT_MESSAGE                                      = "";
	const CONTACT_TEXT_NAME                                         = "";
	const CONTACT_TEXT_NAME_TIP                                     = "";
	const CONTACT_TEXT_SEND                                         = "";
	const CONTACT_TEXT_SUBJECT                                      = "";
	const CONTACT_TEXT_TITLE                                        = "";
	const CONTACT_TEXT_TITLE_TIP                                    = "";
	
	/* Body Page Get */
	const GET_CALCULATION_NETMASK_TITLE                             = "";
	const GET_CALCULATION_NETMASK_TEXT                              = "";
	const GET_CALCULATION_NETMASK_TEXT_TIP                          = "";
	const GET_DNS_OPTION_MX                                         = "";
	const GET_DNS_OPTION_OTHER                                      = "";
	const GET_DNS_TITLE                                             = "";
	const GET_DNS_TEXT                                              = "";
	const GET_DNS_TEXT_TIP                                          = "";
	const GET_HOSTNAME_TITLE                                        = "";
	const GET_HOSTNAME_TEXT                                         = "";
	const GET_HOSTNAME_TEXT_TIP                                     = "";
	const GET_IP_ADDRESSES_TITLE                                    = "";
	const GET_IP_ADDRESSES_TEXT                                     = "";
	const GET_IP_ADDRESSES_TEXT_TIP                                 = "";
	const GET_LOCATION_TITLE                                        = "";
	const GET_LOCATION_TEXT                                         = "";
	const GET_LOCATION_TEXT_TIP                                     = "";
	const GET_PROTOCOL_TITLE                                        = "";
	const GET_PROTOCOL_TEXT                                         = "";
	const GET_PROTOCOL_TEXT_TIP                                     = "";
	const GET_ROUTE_TITLE                                           = "";
	const GET_ROUTE_TEXT                                            = "";
	const GET_ROUTE_TEXT_TIP                                        = "";
	const GET_SERVICE_TITLE                                         = "";
	const GET_SERVICE_TEXT                                          = "";
	const GET_SERVICE_TEXT_TIP                                      = "";
	const GET_WEBSITE_OPTION_CONTENT                                = "";
	const GET_WEBSITE_OPTION_HEADER                                 = "";
	const GET_WEBSITE_TITLE                                         = "";
	const GET_WEBSITE_TEXT                                          = "";
	const GET_WEBSITE_TEXT_TIP                                      = "";
	const GET_WHOIS_LABEL_HOST                                      = "";
	const GET_WHOIS_LABEL_IP                                        = "";
	const GET_WHOIS_RADIO_HOST_TITLE                                = "";
	const GET_WHOIS_RADIO_IP_TITLE                                  = "";
	const GET_WHOIS_INPUT_HOST_TITLE                                = "";
	const GET_WHOIS_INPUT_IP_TITLE                                  = "";
	const GET_WHOIS_TITLE                                           = "";
	const GET_WHOIS_TEXT                                            = "";
	const GET_WHOIS_TEXT_TIP                                        = "";
	
	/* Body Page Home */
	const HOME_CHECK_1                                              = "";
	const HOME_CHECK_2                                              = "";
	const HOME_CHECK_3                                              = "";
	const HOME_CHECK_BUTTON_TEXT                                    = "";
	const HOME_CLOUD_1                                              = "";
	const HOME_CLOUD_2                                              = "";
	const HOME_CLOUD_3                                              = "";
	const HOME_CLOUD_BUTTON_TEXT                                    = "";
	const HOME_GET_1                                                = "";
	const HOME_GET_2                                                = "";
	const HOME_GET_3                                                = "";
	const HOME_GET_BUTTON_TEXT                                      = "";
	const HOME_INSTALL_1                                            = "";
	const HOME_INSTALL_2                                            = "";
	const HOME_INSTALL_3                                            = "";
	const HOME_INSTALL_BUTTON_TEXT                                  = "";
	const HOME_API_1                                                = "";
	const HOME_API_2                                                = "";
	const HOME_API_3                                                = "";
	const HOME_API_BUTTON_TEXT                                      = "";
	const HOME_CERTIFICATION                                        = "";
	
	/* Body Page Login */
	const LOGIN_ERROR                                               = "";
	const LOGIN_FORGOT_PASSWORD_TEXT                                = "";
	const LOGIN_NEW_TEXT                                            = "";
	const LOGIN_PASSWORD                                            = "";
	const LOGIN_INVALID_LOGIN                                       = "";
	const LOGIN_SUCCESS                                             = "";
	const LOGIN_SEND                                                = "";
	const LOGIN_TWO_STEP_VERIFICATION_CODE                          = "";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_ERROR                    = "";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_FAILED             = "";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TAG                = "";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TEXT               = "";
	
	/* Body Page Not Found */
	
	/* Body Page Password Recovery */
	const PASSWORD_RECOVERY_EMAIL_ALREADY_SENT                      = "";
	const PASSWORD_RECOVERY_EMAIL_ERROR                             = "";
	const PASSWORD_RECOVERY_EMAIL_NOT_FOUND                         = "";
	const PASSWORD_RECOVERY_EMAIL_TAG                               = "";
	const PASSWORD_RECOVERY_EMAIL_TEXT                              = "";
	const PASSWORD_RECOVERY_ERROR                                   = "";
	const PASSWORD_RECOVERY_INVALID_CAPTCHA                         = "";
	const PASSWORD_RECOVERY_INVALID_EMAIL                           = "";
	const PASSWORD_RECOVERY_INVALID_EMAIL_SIZE                      = "";
	const PASSWORD_RECOVERY_SUCCESS                                 = "";
	const PASSWORD_RECOVERY_TEXT_CAPTCHA                            = "";
	const PASSWORD_RECOVERY_TEXT_SEND                               = "";
	
	/* Body Page Password Reset */
	const PASSWORD_RESET_INVALID_CODE                               = "";
	const PASSWORD_RESET_INVALID_PASSWORD                           = "";
	const PASSWORD_RESET_INVALID_PASSWORD_MATCH                     = "";
	const PASSWORD_RESET_INVALID_PASSWORD_SIZE                      = "";
	const PASSWORD_RESET_ERROR                                      = "";
	const PASSWORD_RESET_SUCCESS                                    = "";
	const PASSWORD_RESET_TEXT_CODE                                  = "";
	const PASSWORD_RESET_TEXT_NEW_PASSWORD                          = "";
	const PASSWORD_RESET_TEXT_NEW_PASSWORD_TIP                      = "";
	const PASSWORD_RESET_TEXT_REPEAT_PASSWORD                       = "";
	const PASSWORD_RESET_TEXT_REPEAT_PASSWORD_TIP                   = "";
	const PASSWORD_RESET_TEXT_SEND                                  = "";
	const PASSWORD_RESET_WARNING                                    = "";
	
	/* Body Page Register */
	const REGISTER_EMAIL_ALREADY_REGISTERED                         = "";
	const REGISTER_EMAIL_ALREADY_SENT                               = "";
	const REGISTER_EMAIL_ERROR                                      = "";
	const REGISTER_EMAIL_TAG                                        = "";
	const REGISTER_EMAIL_TEXT                                       = "";
	const REGISTER_INVALID_GENDER                                   = "";
	const REGISTER_INVALID_NAME                                     = "";
	const REGISTER_INVALID_NAME_SIZE                                = "";
	const REGISTER_INSERT_ERROR                                     = "";
	const REGISTER_SELECT_GENDER_FEMALE                             = "";
	const REGISTER_SELECT_GENDER_MALE                               = "";
	const REGISTER_SELECT_GENDER_OTHER                              = "";
	const REGISTER_SUCCESS                                          = "";
	const REGISTER_SUCCESS_NO_LINK                                  = "";
	const REGISTER_TEXT_BIRTH_DATE                                  = "";
	const REGISTER_TEXT_CAPTCHA                                     = "";
	const REGISTER_TEXT_GENDER                                      = "";
	const REGISTER_TEXT_NAME                                        = "";
	const REGISTER_TEXT_NAME_TIP                                    = "";
	const REGISTER_TEXT_NEW_PASSWORD                                = "";
	const REGISTER_TEXT_NEW_PASSWORD_TIP                            = "";
	const REGISTER_TEXT_NEW_PASSWORD_TITLE                          = "";
	const REGISTER_TEXT_REPEAT_PASSWORD                             = "";
	const REGISTER_TEXT_REPEAT_PASSWORD_TIP                         = "";
	const REGISTER_TEXT_REPEAT_PASSWORD_TITLE                       = "";
	
	/* Body Page Register Confirmation */
	const REGISTER_CONFIRMATION_ALREADY_CONFIRMED                   = "";
	const REGISTER_CONFIRMATION_SELECT_ERROR                        = "";
	const REGISTER_CONFIRMATION_SUCCESS                             = "";
	const REGISTER_CONFIRMATION_UPDATE_ERROR                        = "";
	const REGISTER_CONFIRMATION_WARNING                             = "";
	
	/* Body Page Resend Confirmation Link */
	const RESEND_CONFIRMATION_EMAIL_TAG                             = "";
	const RESEND_CONFIRMATION_EMAIL_TEXT                            = "";
	const RESEND_CONFIRMATION_LINK_ERROR                            = "";
	const RESEND_CONFIRMATION_LINK_SUCCESS                          = "";
		
	/* Footer */
	const FOOTER_TEXT                                               = "";
	
	/* Function: Check Availability */
	const CHECK_AVAILABILITY_FREE                                   = "";
	const CHECK_AVAILABILITY_TAKEN                                  = "";
	
	/* Function: Check Blacklist */
	const CHECK_BLACKLIST_HOST_NOT_LISTED                           = "";
	const CHECK_BLACKLIST_HOST_LISTED                               = "";
	const CHECK_BLACKLIST_HOST_FAILED_TO_GET_IP                     = "";
	const CHECK_BLACKLIST_IP_ADDRESS_NOT_LISTED                     = "";
	const CHECK_BLACKLIST_IP_ADDRESS_LISTED                         = "";
	const CHECK_BLACKLIST_ON_LIST                                   = "";
	
	/* Function: Check DNS Record */
	const CHECK_DNS_HAS_RECORD_TYPE                                 = "";
	const CHECK_DNS_HAS_NO_RECORD_TYPE                              = "";
	
	/* Function: Check Email Exists */
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_EXISTS                      = "";
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_AVAILABLE                   = "";
	const CHECK_EMAIL_EXISTS_FAILED                                 = "";
	const CHECK_EMAIL_EXISTS_SUCCESS                                = "";
	
	/* Function: Check Ip Address is in network */
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_FAILED                     = "";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_SUCCESS                    = "";
	
	/* Function: Check Ping Server */
	const CHECK_PING_SERVER_HOST_FAILED                             = "";
	const CHECK_PING_SERVER_IP_ADDRESS_FAILED                       = "";
	
	/* Function: Check Port Status */
	const CHECK_PORT_STATUS_HOST_BLOCKED                            = "";
	const CHECK_PORT_STATUS_HOST_DISALLOWED                         = "";
	const CHECK_PORT_STATUS_HOST_FAILED                             = "";
	const CHECK_PORT_STATUS_HOST_OPENED                             = "";
	const CHECK_PORT_STATUS_IP_ADDRESS_FAILED                       = "";
	const CHECK_PORT_STATUS_IP_ADDRESS_BLOCKED                      = "";
	const CHECK_PORT_STATUS_IP_ADDRESS_OPENED                       = "";
	const CHECK_PORT_STATUS_TIMEOUT                                 = "";
	
	/* Function: Check Web Site Exists*/
	const CHECK_WEBSITE_EXISTS_FAILED                               = "";
	const CHECK_WEBSITE_EXISTS_SUCCESS                              = "";
	
	/* Function: Get Browser Client */
	const GET_BROWSER_CLIENT_FAILED                                 = "";
	const GET_BROWSER_CLIENT_SUCCESS                                = "";
	
	/* Function: Get Calculation NetMask */
	const GET_CALCULATION_NETMASK_IP_ADDRESS                        = "";
	const GET_CALCULATION_NETMASK_MASK                              = "";
	const GET_CALCULATION_NETMASK_SUB_NETWORK                       = "";
	const GET_CALCULATION_NETMASK_BROADCAST                         = "";
	const GET_CALCULATION_NETMASK_SUB_MASK                          = "";
	const GET_CALCULATION_NETMASK_AVAILABLE_IP_ADDRESSES            = "";
	
	/* Function: Get Dns Records */
	const GET_DNS_MX_RECORDS_FAILED                                 = "";
	const GET_DNS_RECORDS_FAILED                                    = "";
	
	/* Function: Get Hostname */
	const GET_HOSTNAME_FAILED                                       = "";
	const GET_HOSTNAME_SUCCESS                                      = "";
	
	/* Function: Get Ip Address Client */
	const GET_ERROR_IP_ADDRESS_CLIENT                              = "";
	const GET_IP_ADDRESS_CLIENT_SUCCESS                             = "";
	
	/* Function: Get Ip Addresses */
	const GET_IP_ADDRESSES_FAILED                                   = "";
	const GET_IP_ADDRESSES_SUCCESS                                  = "";
	
	/* Function: Get Location */
	const GET_LOCATION_FAILED                                       = "";
	const GET_LOCATION_FAILED_GET_CONTENTS                          = "";
	
	/* Function: Get Operational System */
	const GET_OPERATIONAL_SYSTEM_FAILED                             = "";
	const GET_OPERATIONAL_SYSTEM_SUCCESS                            = "";
	
	/* Function: Get Protocol */
	const GET_PROTOCOL_FAILED                                       = "";
	const GET_PROTOCOL_SUCCESS                                      = "";
	
	/* Function: Get Route */
	const GET_ROUTE_FAILED                                          = "";
	const GET_ROUTE_SUCCESS                                         = "";
	
	/* Function: Get Service */
	const GET_SERVICE_FAILED                                        = "";
	const GET_SERVICE_SUCCESS                                       = "";
	
	/* Function: Get WebSite */
	const GET_WEBSITE_CONTENT_FAILED                                = "";
	const GET_WEBSITE_CONTENT_SUCCESS                               = "";
	const GET_WEBSITE_HEADER_FAILED                                 = "";
	const GET_WEBSITE_HEADER_SUCCESS                                = "";
	
	/* Function: Get Whois */
	const GET_WHOIS_FAILED                                          = "";
	const GET_WHOIS_SUCCESS                                         = "";
	
	public function GetText($Constant)
	{
		$text = constant("De::$Constant");
		if($text != NULL) return $text;
		else echo $text . "<br>";
	}
}