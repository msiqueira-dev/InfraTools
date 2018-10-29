<?php

/************************************************************************
Class: En
Creation: 17/03/2015
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe que contem constantes de textos e mensagens de tela em inglês,
			acessdas viada método.
Functions: 
			public function GetConstant($Constant);
Updates:
	
**************************************************************************/

class En
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
	
	/* Generic */
	const ACTIVE                                                  = "Active";
	const ACTIVATED                                               = "Activated";
	const BIRTH_DATE                                              = "Birth date";
	const BIRTH_DATE_DAY                                          = "Day";
	const BIRTH_DATE_MONTH                                        = "Month";
	const BIRTH_DATE_YEAR                                         = "Year";
	const CONFIRMED                                               = "Confirmed";
	const CORPORATION                                             = "Corporation";
	const CORPORATION_NAME                                        = "Corporation name";
	const CORPORATION_NOT_FOUND                                   = "Corporation not found";
	const CORPORATION_UPDATE_ERROR                                = "Error updating corporation";
	const CORPORATION_UPDATE_ERROR_UNIQUE_EXISTS                  = "A corporation with the same name exists";
	const CORPORATION_UPDATE_SUCCESS                              = "Corporation updated successfully";
	const CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS      = "Corporations obtained successfully";
	const CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR        = "Error obtaing corporations";
	const COUNTRY                                                 = "Country";
	const COUNTRY_ABBREVIATION                                    = "Country Initials";
	const DEACTIVATED                                             = "Deactivated";
	const DEFAULT_VALUE                                           = "Please fill the necessary fields";
	const DEPARTMENT                                              = "Department";
	const DEPARTMENT_INITIALS                                     = "Department Initials";
	const DEPARTMENT_NAME                                         = "Department name";
	const DEPARTMENT_NAME_AND_CORPORATION_NAME                    = "Department name and corporation name";
	const DEPARTMENT_NOT_FOUND                                    = "Department not found";
	const DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS       = "Departments obtained successfully";
	const DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR         = "Error obtaineg departments";
	const DESCRIPTION                                             = "Description";
	const EMAIL                                                   = "E-mail";
	const FILL_REQUIRED_FIELDS                                    = "Please fill the necessary fields";
	const FORM_FIELD_CORPORATION_ACTIVE                           = "Active";
	const FORM_FIELD_EDIT                                         = "Edit";
	const FORM_INVALID_CAPTCHA                                    = "The captcha value does not match";
	const FORM_INVALID_CORPORATION_NAME                           = "Invalid Corporation Name";
	const FORM_INVALID_CORPORATION_NAME_SIZE                      = "Quantity of characters exceeds the maximum allowed for "
	                                                              . "corporation name";
	const FORM_INVALID_COUNTRY                                    = "Invalid country, use the Google Maps";
	const FORM_INVALID_DATE_DAY                                   = "Invalid day";
	const FORM_INVALID_DATE_MONTH                                 = "Invalid month";
	const FORM_INVALID_DATE_YEAR                                  = "Invalid year";
	const FORM_INVALID_DEPARTMENT_INITIALS                        = "Invalid department initials";
	const FORM_INVALID_DEPARTMENT_INITIALS_SIZE                   = "Quantity of characters exceeds the maximum allowed for "
	                                                              . "department initials";
	const FORM_INVALID_DEPARTMENT_NAME                            = "Invalid department name";
	const FORM_INVALID_DEPARTMENT_NAME_SIZE                       = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "department name" ;
	const FORM_INVALID_DESCRIPTION                                = "Invalid description";
	const FORM_INVALID_HOSTNAME                                   = "Invalid domain";
	const FORM_INVALID_ID                                         = "Invalid id";
	const FORM_INVALID_REGISTRATION_ID                            = "Invalid registration id";
	const FORM_INVALID_SERVICE_ACTIVE                             = "Invalid value for checkbox service active service";
	const FORM_INVALID_SERVICE_CORPORATION_CAN_CHANGE             = "Invalid value for checkbox corporation can change";
	const FORM_INVALID_SERVICE_DESCRIPTION                        = "Inválid service description";
	const FORM_INVALID_SERVICE_DESCRIPTION_SIZE                   = "Quantity of characters exceeds the maximum allowed for service "
	                                                              . "description";
	const FORM_INVALID_SERVICE_DEPARTMENT_CAN_CHANGE              = "Invalid value for checkbox department can change";
	const FORM_INVALID_SERVICE_ID                                 = "Invalid service id";
	const FORM_INVALID_SERVICE_NAME                               = "Invalid service name";
	const FORM_INVALID_SERVICE_NAME_SIZE                          = "Quantity of characters exceeds the maximum allowed for service "
	                                                              . "name";
	const FORM_INVALID_SERVICE_TYPE                               = "Invalid service type";
	const FORM_INVALID_SERVICE_TYPE_SIZE                          = "Quantity of characters exceeds the maximum allowed for service "
		                                                          . "description";
	const FORM_INVALID_TEAM_DESCRIPTION                           = "Invalid team descritpion";
	const FORM_INVALID_TEAM_DESCRIPTION_SIZE                      = "Quantity of characters exceeds the maximum allowed for team "
	                                                              . "description";
	const FORM_INVALID_TEAM_ID                                    = "Team id";
	const FORM_INVALID_TEAM_NAME                                  = "Invalid team name";
	const FORM_INVALID_TEAM_NAME_SIZE                             = "Quantity of characters exceeds the maximum allowed for team "
		                                                          . "name";
	const FORM_INVALID_TICKET_DESCRIPTION                         = "Invalid ticket description";
	const FORM_INVALID_TICKET_DESCRIPTION_SIZE                    = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "ticket description";
	const FORM_INVALID_TICKET_TITLE                               = "Invalid ticket title";
	const FORM_INVALID_TICKET_TITLE_SIZE                          = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "ticket title";
	const FORM_INVALID_TICKET_TYPE                                = "Invalid ticket type";
	const FORM_INVALID_TICKET_TYPE_SIZE                           = "Quantity of characters exceeds the maximum allowed for"
		                                                          . "ticket type";
	const FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION        = "Invalid description for type of association between user "
	                                                              . "and service";
	const FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE   = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "type association description";
	const FORM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION           = "Invalid type assoc user team description";
	const FORM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION_SIZE      = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "type association user team description";
	const FORM_INVALID_TYPE_ASSOC_USER_TEAM_ID                    = "Invalid team id for association between user and team";
	const FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION             = "Invalid type status ticket description";
	const FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE        = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "type status ticket description";
	const FORM_INVALID_TYPE_STATUS_TICKET_ID                      = "Invalid type status ticket id";
	const FORM_INVALID_TYPE_TICKET_DESCRIPTION                    = "Invalid type ticket description";
	const FORM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE               = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "type ticket description";
	const FORM_INVALID_TYPE_TICKET_ID                             = "Invalid type ticket id";
	const FORM_INVALID_TYPE_USER_DESCRIPTION                      = "Invalid type user description";
	const FORM_INVALID_TYPE_USER_DESCRIPTION_SIZE                 = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "type user description";
	const FORM_INVALID_TYPE_USER_ID                               = "Invalid type user id";
	const FORM_INVALID_USER_BIRTH_DATE_DAY                        = "Invalid day of birth";
	const FORM_INVALID_USER_BIRTH_DATE_MONTH                      = "Invalid month of birth";
	const FORM_INVALID_USER_BIRTH_DATE_YEAR                       = "Invalid year of birth";
	const FORM_INVALID_USER_CONFIRMED                             = "Invalid value for user confirmed";
	const FORM_INVALID_USER_EMAIL                                 = "Invalid user e-mail";
	const FORM_INVALID_USER_EMAIL_SIZE                            = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "user e-mail";
	const FORM_INVALID_USER_GENDER                                = "Invalid gender";
	const FORM_INVALID_USER_NAME                                  = "Invalid user name";
	const FORM_INVALID_USER_NAME_SIZE                             = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "user name";
	const FORM_INVALID_USER_PASSWORD                              = "Password does not match the criteria";
	const FORM_INVALID_USER_PASSWORD_MATCH                        = "Passwords does not match";
	const FORM_INVALID_USER_PASSWORD_SIZE                         = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "user password";
	const FORM_INVALID_USER_PHONE_PREFIX_PRIMARY                  = "Invalid user phone prefix primary";
	const FORM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE             = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "user phone prefix primary";
	const FORM_INVALID_USER_PHONE_PREFIX_SECONDARY                = "Invalid user phone prefix secondary";
	const FORM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE           = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "user phone prefix secondary";
	const FORM_INVALID_USER_PHONE_PRIMARY                         = "Invalid user phone primary";
	const FORM_INVALID_USER_PHONE_PRIMARY_SIZE                    = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "user phone primary";
	const FORM_INVALID_USER_PHONE_SECONDARY                       = "Invalid user phone secondary";
	const FORM_INVALID_USER_PHONE_SECONDARY_SIZE                  = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "user phone secondary";
	const FORM_INVALID_USER_REGION                                = "Invalid user region";
	const FORM_INVALID_USER_REGION_SIZE                           = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "user region";
	const FORM_INVALID_USER_UNIQUE_ID                             = "Invalid user unique id";
	const FORM_INVALID_USER_UNIQUE_ID_SIZE                        = "Quantity of characters exceeds the maximum allowed for "
		                                                          . "user unique id";
	const FORM_SELECT_DEFAULT                                     = "Select";
	const FORM_SELECT_NONE                                        = "None";             
	const FORM_SUBMIT_RESET_PASSWORD_EMAIL_TAG                    = "InfraTools - Your password has been reseted";
	const FORM_SUBMIT_RESET_PASSWORD_EMAIL_TEXT                   = "Your password was reset and your new password is: ";
	const GENDER                                                  = "Gender";
	const HREF_PAGE_ABOUT                                         = "/En/PageAbout";
	const HREF_PAGE_ACCOUNT                                       = "/En/PageAccount";
	const HREF_PAGE_ADMIN                                         = "/En/PageAdmin";
	const HREF_PAGE_ADMIN_CORPORATION                             = "/En/PageAdminCorporation";
	const HREF_PAGE_ADMIN_COUNTRY                                 = "/En/PageAdminCountry";
	const HREF_PAGE_ADMIN_DEPARTMENT                              = "/En/PageAdminDepartment";
	const HREF_PAGE_ADMIN_SERVICE                                 = "/En/PageAdminService";
	const HREF_PAGE_ADMIN_TEAM                                    = "/En/PageAdminTeam";
	const HREF_PAGE_ADMIN_TECH_INFO                               = "/En/PageAdminTechInfo";
	const HREF_PAGE_ADMIN_TICKET                                  = "/En/PageAdminTicket";
	const HREF_PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                    = "/En/PageAdminTypeAssocUserTeam";
	const HREF_PAGE_ADMIN_TYPE_SERVICE                            = "/En/PageAdminTypeService";
	const HREF_PAGE_ADMIN_TYPE_STATUS_TICKET                      = "/En/PageAdminTypeStatusTicket";
	const HREF_PAGE_ADMIN_TYPE_TICKET                             = "/En/PageAdminTypeTicket";
	const HREF_PAGE_ADMIN_TYPE_USER                               = "/En/PageAdminTypeUser";
	const HREF_PAGE_ADMIN_USER                                    = "/En/PageAdminUser";
	const HREF_PAGE_CHECK                                         = "/En/PageCheck";   
	const HREF_PAGE_CONTACT                                       = "/En/PageContact";
	const HREF_PAGE_DIAGNOSTIC_TOOLS                              = "/En/PageDiagnosticTools";
	const HREF_PAGE_GET                                           = "/En/PageGet";
	const HREF_PAGE_HOME                                          = "/En/PageHome";
	const HREF_INSTALL_INFRATOOLS                                 = "/En/PageInstall";
	const HREF_PAGE_LOGIN                                         = "/En/PageLogin";
	const HREF_PAGE_NOT_FOUND                                     = "/En/PageNotFound";
	const HREF_PAGE_NOTIFICATION                                  = "/En/PageNotification";
	const HREF_PAGE_PASSWORD_RECOVERY                             = "/En/PagePasswordRecovery";
	const HREF_PAGE_PASSWORD_RESET                                = "/En/PagePasswordReset";
	const HREF_PAGE_REGISTER                                      = "/En/PageRegister";
	const HREF_PAGE_REGISTER_CONFIRMATION                         = "/En/PageRegisterConfirmation";
	const HREF_PAGE_RESEND_CONFIRMATION_LINK                      = "/En/PageResendConfirmationLink";
	const HREF_PAGE_SERVICE                                       = "/En/PageService";
	const HREF_PAGE_SERVICE_LIST                                  = "/En/PageServiceList";
	const HREF_PAGE_SERVICE_LIST_BY_CORPORATION                   = "/En/PageServiceListByCorporation";
	const HREF_PAGE_SERVICE_LIST_BY_DEPARTMENT                    = "/En/PageServiceListByDepartment";
	const HREF_PAGE_SERVICE_LIST_BY_NAME                          = "/En/PageServiceListByName";
	const HREF_PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE       = "/En/PageServiceListByTypeAssocUserService";
	const HREF_PAGE_SERVICE_LIST_BY_TYPE_SERVICE                  = "/En/PageServiceListByTypeService";
	const HREF_PAGE_SERVICE_LIST_BY_USER                          = "/En/PageServiceListByUser";
	const HREF_PAGE_SERVICE_REGISTER                              = "/En/PageServiceRegister";
	const HREF_PAGE_SERVICE_SELECT                                = "/En/PageServiceSelect";
	const HREF_PAGE_SERVICE_VIEW                                  = "/En/PageServiceView";
	const HREF_PAGE_SUPPORT                                       = "/En/PageSupport";
	const HREF_PAGE_TEAM                                          = "/En/PageTeam";
	const ID                                                      = "Id";
	const INVALID_IP_ADDRESS                                      = "Invalid ip address";
	const INVALID_MASK                                            = "Invalid network mask";
	const INVALID_NETWORK_ADDRESS                                 = "Invalid network address";
	const INVALID_OPTION                                          = "Invalid option";
	const INVALID_PORT                                            = "Invalid port";
	const INVALID_PROTOCOL                                        = "Invalid protocol";
	const INVALID_PROTOCOL_NUMBER                                 = "Invalid protocol number";
	const INVALID_WEBSITE                                         = "Invalid website";
	const MAPS_SEARCH                                             = "Search";
	const LANGUAGES                                               = "Languages";
	const LANGUAGES_CONSTANT_COUNT                                = "Quantity of constants";
	const LANGUAGES_FILES                                         = "Language files";
	const MAPS_TIP                                                = "Type your location in the text field or click on the map, "
                                                                  . "the fields above will be filled with your country "
                                                                  . "and a location that can be either a estate or a county.";
	const NAME                                                    = "Name";
	const NOT_LOGGED_IN                                           = "You must be authenticated to access this page";
	const NULL_OPTION                                             = "Please select an option";
	const PAGE_ABOUT                                              = "About";
	const PAGE_ABOUT_ROBOTS                                       = "ALL";
	const PAGE_ABOUT_TITLE                                        = "InfraTools - About";
	const PAGE_ACCOUNT                                            = "My Account";
	const PAGE_ACCOUNT_CHANGE_PASSWORD                            = "My Account - Change Password";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_ROBOTS                     = "noindex";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_TITLE                      = "InfraTools - My Account - Change Password";
	const PAGE_ACCOUNT_ROBOTS                                     = "noindex";
	const PAGE_ACCOUNT_TITLE                                      = "InfraTools - My cccount";
	const PAGE_ACCOUNT_UPDATE                                     = "My Account - Update Information";
	const PAGE_ACCOUNT_UPDATE_ROBOTS                              = "noindex";
	const PAGE_ACCOUNT_UPDATE_TITLE                               = "InfraTools - My Account - Update Information";
	const PAGE_ADMIN                                              = "Admin";
	const PAGE_ADMIN_ROBOTS                                       = "noindex";
	const PAGE_ADMIN_TITLE                                        = "InfraTools - Admin";
	const PAGE_ADMIN_CORPORATION                                  = "Admin Corporation";
	const PAGE_ADMIN_CORPORATION_LIST                             = "Admin Corporation - List";
	const PAGE_ADMIN_CORPORATION_LIST_ROBOTS                      = "noindex";
	const PAGE_ADMIN_CORPORATION_LIST_TITLE                       = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_REGISTER                         = "Admin Corporation - Register";
	const PAGE_ADMIN_CORPORATION_REGISTER_ROBOTS                  = "noindex";
	const PAGE_ADMIN_CORPORATION_REGISTER_TITLE                   = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_ROBOTS                           = "noindex";
	const PAGE_ADMIN_CORPORATION_SELECT                           = "Admin Corporation - Select";
	const PAGE_ADMIN_CORPORATION_SELECT_ROBOTS                    = "noindex";
	const PAGE_ADMIN_CORPORATION_SELECT_TITLE                     = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_TITLE                            = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_UPDATE                           = "Admin Corporation - Update";
	const PAGE_ADMIN_CORPORATION_UPDATE_ROBOTS                    = "noindex";
	const PAGE_ADMIN_CORPORATION_UPDATE_TITLE                     = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_VIEW                             = "Admin Corporation - View";
	const PAGE_ADMIN_CORPORATION_VIEW_ROBOTS                      = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_TITLE                       = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS                       = "Admin Corporation - View Users";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_ROBOTS                = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_TITLE                 = "Admin Corporation - View Users";
	const PAGE_ADMIN_COUNTRY                                      = "Admin Country";
	const PAGE_ADMIN_COUNTRY_LIST                                 = "Admin Country - List";
	const PAGE_ADMIN_COUNTRY_LIST_ROBOTS                          = "noindex";
	const PAGE_ADMIN_COUNTRY_LIST_TITLE                           = "InfraTools - Admin Country"; 
	const PAGE_ADMIN_COUNTRY_ROBOTS                               = "noindex";
	const PAGE_ADMIN_COUNTRY_TITLE                                = "InfraTools - Admin Country";
	const PAGE_ADMIN_DEPARTMENT                                   = "Admin Department";
	const PAGE_ADMIN_DEPARTMENT_LIST                              = "Admin Department - List";
	const PAGE_ADMIN_DEPARTMENT_LIST_ROBOTS                       = "noindex";
	const PAGE_ADMIN_DEPARTMENT_LIST_TITLE                        = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_REGISTER                          = "Admin Department - Register";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_ROBOTS                   = "noindex";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_TITLE                    = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_ROBOTS                            = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SELECT                            = "Admin Department - Select";
	const PAGE_ADMIN_DEPARTMENT_SELECT_ROBOTS                     = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SELECT_TITLE                      = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_TITLE                             = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_UPDATE                            = "Admin Department - Update";
	const PAGE_ADMIN_DEPARTMENT_UPDATE_ROBOTS                     = "noindex";
	const PAGE_ADMIN_DEPARTMENT_UPDATE_TITLE                      = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_VIEW                              = "Admin Department - View";
	const PAGE_ADMIN_DEPARTMENT_VIEW_ROBOTS                       = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_TITLE                        = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS                        = "Admin Department - View Users";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_ROBOTS                 = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_TITLE                  = "InfraTools - Admin Department";
	const PAGE_ADMIN_SERVICE                                      = "Admin Service";
	const PAGE_ADMIN_SERVICE_LIST                                 = "Admin Service - List";
	const PAGE_ADMIN_SERVICE_LIST_ROBOTS                          = "noindex";
	const PAGE_ADMIN_SERVICE_LIST_TITLE                           = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_REGISTER                             = "Admin Notification - Register";
	const PAGE_ADMIN_SERVICE_REGISTER_ROBOTS                      = "noindex";
	const PAGE_ADMIN_SERVICE_REGISTER_TITLE                       = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_ROBOTS                               = "noindex";
	const PAGE_ADMIN_SERVICE_SELECT                               = "Admin Notification - Select";
	const PAGE_ADMIN_SERVICE_SELECT_ROBOTS                        = "noindex";
	const PAGE_ADMIN_SERVICE_SELECT_TITLE                         = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_TITLE                                = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_UPDATE                               = "Admin Notification - Update";
	const PAGE_ADMIN_SERVICE_UPDATE_ROBOTS                        = "noindex";
	const PAGE_ADMIN_SERVICE_UPDATE_TITLE                         = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_VIEW                                 = "Admin Notification - View";
	const PAGE_ADMIN_SERVICE_VIEW_ROBOTS                          = "noindex";
	const PAGE_ADMIN_SERVICE_VIEW_TITLE                           = "InfraTools - Admin Service";
	const PAGE_ADMIN_NOTIFICATION                                 = "Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_LIST                            = "Admin Notification - List";
	const PAGE_ADMIN_NOTIFICATION_LIST_ROBOTS                     = "noindex";
	const PAGE_ADMIN_NOTIFICATION_LIST_TITLE                      = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_REGISTER                        = "Admin Notification - Register";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_ROBOTS                 = "noindex";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_TITLE                  = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_ROBOTS                          = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SELECT                          = "Admin Notification - Select";
	const PAGE_ADMIN_NOTIFICATION_SELECT_ROBOTS                   = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SELECT_TITLE                    = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_TITLE                           = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_UPDATE                          = "Admin Notification - Update";
	const PAGE_ADMIN_NOTIFICATION_UPDATE_ROBOTS                   = "noindex";
	const PAGE_ADMIN_NOTIFICATION_UPDATE_TITLE                    = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_VIEW                            = "Admin Notification - View";
	const PAGE_ADMIN_NOTIFICATION_VIEW_ROBOTS                     = "noindex";
	const PAGE_ADMIN_NOTIFICATION_VIEW_TITLE                      = "InfraTools - Admin Notification";
	const PAGE_ADMIN_TEAM                                         = "Admin Team";
	const PAGE_ADMIN_TEAM_LIST                                    = "Admin Team - List";
	const PAGE_ADMIN_TEAM_LIST_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TEAM_LIST_TITLE                              = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_MANAGE_MEMBERS                          = "Admin Manage Members";
	const PAGE_ADMIN_TEAM_MANAGE_MEMBERS_ROBOTS                   = "noindex";
	const PAGE_ADMIN_TEAM_MANAGE_MEMBERS_TITLE                    = "InfraTools - Admin Manage Members";
	const PAGE_ADMIN_TEAM_REGISTER                                = "Admin Team - Register";
	const PAGE_ADMIN_TEAM_REGISTER_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TEAM_REGISTER_TITLE                          = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_ROBOTS                                  = "noindex";
	const PAGE_ADMIN_TEAM_SELECT                                  = "Admin Team - Select";
	const PAGE_ADMIN_TEAM_SELECT_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TEAM_SELECT_TITLE                            = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_TITLE                                   = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_UPDATE                                  = "Admin Team - Update";
	const PAGE_ADMIN_TEAM_UPDATE_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TEAM_UPDATE_TITLE                            = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_VIEW                                    = "Admin Team - View";
	const PAGE_ADMIN_TEAM_VIEW_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TEAM_VIEW_TITLE                              = "InfraTools - Admin Team";
	const PAGE_ADMIN_TECH_INFO                                    = "Admin Technical Informations";
	const PAGE_ADMIN_TECH_INFO_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TECH_INFO_TITLE                              = "InfraTools - Admin Technical Informations";
	const PAGE_ADMIN_TICKET                                       = "Admin Ticket";
	const PAGE_ADMIN_TICKET_ASSOCIATE                             = "Admin Ticket - Associate";
	const PAGE_ADMIN_TICKET_ASSOCIATE_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TICKET_ASSOCIATE_TITLE                       = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_LIST                                  = "Admin Ticket - List";
	const PAGE_ADMIN_TICKET_LIST_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TICKET_LIST_TITLE                            = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_REGISTER                              = "Admin Ticket - Register";
	const PAGE_ADMIN_TICKET_REGISTER_ROBOTS                       = "noindex";
	const PAGE_ADMIN_TICKET_REGISTER_TITLE                        = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_ROBOTS                                = "noindex";
	const PAGE_ADMIN_TICKET_SELECT                                = "Admin Ticket - Select";
	const PAGE_ADMIN_TICKET_SELECT_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TICKET_SELECT_TITLE                          = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_TITLE                                 = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_UPDATE                                = "Admin Ticket Update";
	const PAGE_ADMIN_TICKET_UPDATE_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TICKET_UPDATE_TITLE                          = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_VIEW                                  = "Admin Ticket - View";
	const PAGE_ADMIN_TICKET_VIEW_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TICKET_VIEW_TITLE                            = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                         = "Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST                    = "Admin type of association between user and team - List";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST_TITLE              = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER                = "Admin type of association between user and team - Register";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_ROBOTS         = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_TITLE          = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT                  = "Admin type of association between user and team - Select";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT_ROBOTS           = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT_TITLE            = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_TITLE                   = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE                  = "Admin type of association between user and team - Update";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_ROBOTS           = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_TITLE            = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW                    = "Admin type of association between user and team - View";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_TITLE              = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_SERVICE                                 = "Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_LIST                            = "Admin Serivce Type - List";
	const PAGE_ADMIN_TYPE_SERVICE_LIST_ROBOTS                     = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_LIST_TITLE                      = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER                        = "Admin Service Type - Register";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_ROBOTS                 = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_TITLE                  = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_ROBOTS                          = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT                          = "Admin Service Type - Select";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT_ROBOTS                   = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT_TITLE                    = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_TITLE                           = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE                          = "Admin Service Type - Update";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE_ROBOTS                   = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE_TITLE                    = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW                            = "Admin Service Type -  View";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_ROBOTS                     = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_TITLE                      = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_STATUS_TICKET                           = "Admin Ticket Type Status";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LIST                      = "Admin Ticket Type Status - List";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LIST_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LIST_TITLE                = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER                  = "Admin Ticket Status Type - Register";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_ROBOTS           = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_TITLE            = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT                    = "Admin Ticket Status Type - Select";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT_TITLE              = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_TITLE                     = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE                    = "Admin Ticket Status Type - Update";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE_TITLE              = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW                      = "Admin Ticket Status Type - View";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_TITLE                = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_TICKET                                  = "Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_LIST                             = "Admin Ticket Type - List";
	const PAGE_ADMIN_TYPE_TICKET_LIST_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_LIST_TITLE                       = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER                         = "Admin Ticket Type - Register";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_TITLE                   = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SELECT                           = "Admin Ticket Type - Select";
	const PAGE_ADMIN_TYPE_TICKET_SELECT_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SELECT_TITLE                     = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_TITLE                            = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_UPDATE                           = "Admin Ticket Type - Update";
	const PAGE_ADMIN_TYPE_TICKET_UPDATE_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_UPDATE_TITLE                     = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_VIEW                             = "Admin Ticket Type - View";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_TITLE                       = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_USER                                    = "Admin User Type";
	const PAGE_ADMIN_TYPE_USER_LIST                               = "Admin User Type - List";
	const PAGE_ADMIN_TYPE_USER_LIST_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_USER_LIST_TITLE                         = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_REGISTER                           = "Admin User Type - Register";
	const PAGE_ADMIN_TYPE_USER_REGISTER_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_USER_REGISTER_TITLE                     = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TYPE_USER_SELECT                             = "Admin User Type - Select";
	const PAGE_ADMIN_TYPE_USER_SELECT_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_USER_SELECT_TITLE                       = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_TITLE                              = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_UPDATE                             = "Admin User Type - Update";
	const PAGE_ADMIN_TYPE_USER_UPDATE_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_USER_UPDATE_TITLE                       = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_VIEW                               = "Admin User Type - View";
	const PAGE_ADMIN_TYPE_USER_VIEW_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_TITLE                         = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS                         = "Admin User Type - View Users";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_TITLE                   = "InfraTools - Admin User Type";
	const PAGE_ADMIN_USER                                         = "Admin User";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION           = "Admin User - Change User Informations with Corporation ";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_ROBOTS    = "noindex";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_TITLE     = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION                      = "Admin User - Change Corporation";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_ROBOTS               = "noindex";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_TITLE                = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE                        = "Admin User - Change User Type";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_ROBOTS                 = "noindex";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_TITLE                  = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_LIST                                    = "Admin User - List";
	const PAGE_ADMIN_USER_LIST_ROBOTS                             = "noindex";
	const PAGE_ADMIN_USER_LIST_TITLE                              = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_REGISTER                                = "Admin User - Register";
	const PAGE_ADMIN_USER_REGISTER_ROBOTS                         = "noindex";
	const PAGE_ADMIN_USER_REGISTER_TITLE                          = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_ROBOTS                                  = "noindex";
	const PAGE_ADMIN_USER_SELECT                                  = "Admin User - Select";
	const PAGE_ADMIN_USER_SELECT_ROBOTS                           = "noindex";
	const PAGE_ADMIN_USER_SELECT_TITLE                            = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_TITLE                                   = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_UPDATE                                  = "Admin User - Update";
	const PAGE_ADMIN_USER_UPDATE_ROBOTS                           = "noindex";
	const PAGE_ADMIN_USER_UPDATE_TITLE                            = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_VIEW                                    = "Admin User - View";
	const PAGE_ADMIN_USER_VIEW_ROBOTS                             = "noindex";
	const PAGE_ADMIN_USER_VIEW_TITLE                              = "InfraTools - Admin User";
	const PAGE_CHECK                                              = "Checking Functions";
	const PAGE_CHECK_ROBOTS                                       = "ALL";
	const PAGE_CHECK_TITLE                                        = "InfraTools - Checking Functions";
	const PAGE_CONTACT                                            = "Contact";
	const PAGE_CONTACT_ROBOTS                                     = "ALL";
	const PAGE_CONTACT_TITLE                                      = "InfraTools - Contact";
	const PAGE_CORPORATION                                        = "My Corporation";
	const PAGE_CORPORATION_ROBOTS                                 = "noindex";
	const PAGE_CORPORATION_TITLE                                  = "InfraTools - My Corporation";
	const PAGE_DIAGNOSTIC_TOOLS                                   = "Diagnostic Tools";
	const PAGE_DIAGNOSTIC_TOOLS_ROBOTS                            = "noindex";
	const PAGE_DIAGNOSTIC_TOOLS_TITLE                             = "InfraTools - Diagnostic Tools";
	const PAGE_GET                                                = "Obtaining Functions";
	const PAGE_GET_ROBOTS                                         = "ALL";
	const PAGE_GET_TITLE                                          = "InfraTools - Obtaining Functions";
	const PAGE_HOME                                               = "InfraTools";
	const PAGE_HOME_ROBOTS                                        = "ALL";
	const PAGE_HOME_TITLE                                         = "InfraTools - Home";
	const PAGE_INSTALL                                            = "InfraTools";
	const PAGE_INSTALL_ROBOTS                                     = "noindex";
	const PAGE_INSTALL_TITLE                                      = "InfraTools - Install InfraTools";
	const PAGE_LOGIN                                              = "Login";
	const PAGE_LOGIN_ROBOTS                                       = "ALL";
	const PAGE_LOGIN_TITLE                                        = "InfraTools - Login";
	const PAGE_NOT_FOUND                                          = "Error";
	const PAGE_NOT_FOUND_ROBOTS                                   = "noindex";
	const PAGE_NOT_FOUND_TITLE                                    = "InfraTools - Not Found";
	const PAGE_NOTIFICATION                                	      = "Notification";
	const PAGE_NOTIFICATION_ROBOTS                                = "ALL";
	const PAGE_NOTIFICATION_TITLE                                 = "InfraTools - Notification";
	const PAGE_PASSWORD_RECOVERY                                  = "Password Recovery";
	const PAGE_PASSWORD_RECOVERY_ROBOTS                           = "noindex";
	const PAGE_PASSWORD_RECOVERY_TITLE                            = "InfraTools - Password Recovery";
	const PAGE_PASSWORD_RESET                                     = "Password Reset";
	const PAGE_PASSWORD_RESET_ROBOTS                              = "noindex";
	const PAGE_PASSWORD_RESET_TITLE                               = "InfraTools - Password Reset";
	const PAGE_REGISTER                                           = "Register";
	const PAGE_REGISTER_ROBOTS                                    = "ALL";
	const PAGE_REGISTER_TITLE                                     = "InfraTools - Register";
	const PAGE_REGISTER_CONFIRMATION                              = "Register Confirmation";
	const PAGE_REGISTER_CONFIRMATION_ROBOTS                       = "noindex";
	const PAGE_REGISTER_CONFIRMATION_TITLE                        = "InfraTools - Register Confirmation";
	const PAGE_RESEND_CONFIRMATION_LINK                           = "Resend Confirmation Link";
	const PAGE_RESEND_CONFIRMATION_LINK_ROBOTS                    = "noindex";
	const PAGE_RESEND_CONFIRMATION_LINK_TITLE                     = "InfraTools - Resend Confirmation Link";
	const PAGE_SERVICE                                    	      = "Service";
	const PAGE_SERVICE_ROBOTS                                     = "ALL";
	const PAGE_SERVICE_TITLE                                      = "InfraTools - Service";
	const PAGE_SERVICE_LIST                                       = "List Services";
	const PAGE_SERVICE_LIST_BY_CORPORATION                        = "List Services by Corporations";
	const PAGE_SERVICE_LIST_BY_CORPORATION_ROBOTS                 = "noindex";
	const PAGE_SERVICE_LIST_BY_CORPORATION_TITLE                  = "InfraTools - List Service by Corporation";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT                         = "List Services by Departments";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT_ROBOTS                  = "noindex";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT_TITLE                   = "InfraTools - List Service by Department";
	const PAGE_SERVICE_LIST_BY_NAME                               = "List Services by Name";
	const PAGE_SERVICE_LIST_BY_NAME_ROBOTS                        = "noindex";
	const PAGE_SERVICE_LIST_BY_NAME_TITLE                         = "InfraTools - List Service by Name";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE            = "List Service by Type of association";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_ROBOTS     = "noindex";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_TITLE      = "InfraTools - List Service by Type of association";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE                       = "List Services By Type";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE_ROBOTS                = "noindex";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE_TITLE                 = "InfraTools - List Service by Type";
	const PAGE_SERVICE_LIST_BY_USER                               = "List Services By User";
	const PAGE_SERVICE_LIST_BY_USER_ROBOTS                        = "noindex";
	const PAGE_SERVICE_LIST_BY_USER_TITLE                         = "InfraTools - List Service by User";
	const PAGE_SERVICE_LIST_ROBOTS                                = "noindex";
	const PAGE_SERVICE_LIST_TITLE                                 = "InfraTools - List Service";
	const PAGE_SERVICE_REGISTER                                   = "Register Service";
	const PAGE_SERVICE_REGISTER_ROBOTS                            = "noindex";
	const PAGE_SERVICE_REGISTER_TITLE                             = "InfraTools - Register Service";
	const PAGE_SERVICE_SELECT                                     = "Select Service";
	const PAGE_SERVICE_SELECT_ROBOTS                              = "noindex";
	const PAGE_SERVICE_SELECT_TITLE                               = "InfraTools - Select Service";
	const PAGE_SERVICE_UPDATE                                     = "Update Service";
	const PAGE_SERVICE_UPDATE_ROBOTS                              = "noindex";
	const PAGE_SERVICE_UPDATE_TITLE                               = "InfraTools - Update Service";
	const PAGE_SERVICE_VIEW                                       = "View Service";
	const PAGE_SERVICE_VIEW_ROBOTS                                = "noindex";
	const PAGE_SERVICE_VIEW_TITLE                                 = "InfraTools - View Service";
	const PAGE_SUPPORT                                            = "Support";
	const PAGE_SUPPORT_ROBOTS                                     = "noindex";
	const PAGE_SUPPORT_TITLE                                      = "InfraTools - Support";
	const PAGE_TEAM                                               = "Team";
	const PAGE_TEAM_ROBOTS                                        = "noindex";
	const PAGE_TEAM_TITLE                                         = "InfraTools - Team";
	const PHONE_PREFIX                                            = "Prefix";
	const PHONE_PRIMARY                                           = "Phone Primary";
	const PHONE_SECONDARY                                         = "Phone Secondary";
	const REGION                                                  = "Location";
	const REGION_CODE                                             = "Region Code";
	const REGISTER_DATE                                           = "Register date";
	const REGISTRATION_DATE                                       = "Registration date";
	const REGISTRATION_DATE_TIP                                   = "(Hiring date)";
	const REGISTRATION_ID                                         = "Registration ID";
	const REGISTRATION_ID_TIP                                     = "Registration ID";
	const SEND_EMAIL_ERROR                                        = "Error while sending email to user";
	const SERVICE_DELETE_ERROR                                    = "Error deleting service";
	const SERVICE_DELETE_ERROR_FOREIGN_KEY                        = "Error deleting service, delete associations first";
	const SERVICE_DELETE_SUCCESS                                  = "Service deleted successfully";
	const SERVICE_FIELD_ACTIVE                                    = "Active";
	const SERVICE_FIELD_CORPORATION                               = "Corporation";
	const SERVICE_FIELD_CORPORATION_CAN_CHANGE                    = "Corporation can change?";
	const SERVICE_FIELD_DEPARTMENT                                = "Department";
	const SERVICE_FIELD_DEPARTMENT_CAN_CHANGE                     = "Department can change?";
	const SERVICE_FIELD_DESCRIPTION                               = "Description";
	const SERVICE_FIELD_ID                                        = "Id";
	const SERVICE_FIELD_NAME                                      = "Name";
	const SERVICE_FIELD_TYPE                                      = "Type";
	const SERVICE_INSERT_ERROR                                    = "Error inserting service";
	const SERVICE_INSERT_SUCCESS                                  = "Service inserted successfully";
	const SERVICE_NOT_FOUND_FOR_USER                              = "There is no service associated to your user";
	const SERVICE_NOT_FOUND_FOR_USER_BY_CORPORATION               = "There is no service associated to your user for your "
		                                                          . "corporation";
	const SERVICE_NOT_FOUND_FOR_USER_BY_DEPARTMENT                = "There is no service associated to your user for the "
		                                                          . "selected department";
	const SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR                  = "No service was found";
	const SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS                = "Service was found";
	const SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR             = "No service was found";
	const SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS           = "Service was found";
	const SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR              = "No service was found";
	const SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS            = "Service was found";
	const SERVICE_SELECT_BY_SERVICE_ID_ERROR                      = "No service was found";
	const SERVICE_SELECT_BY_SERVICE_ID_SUCCESS                    = "Service was found";
	const SERVICE_SELECT_BY_SERVICE_NAME_ERROR                    = "No service was found";
	const SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS                  = "Service was found";
	const SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR         
		                                       = "Service was found";
	const SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS       
		                                       = "No service was found";
	const SERVICE_SELECT_BY_SERVICE_TYPE_ERROR                    = "No service was found";
	const SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS                  = "Service was found";
	const SERVICE_SELECT_BY_SERVICE_USER_ERROR                    = "No service was found";
	const SERVICE_SELECT_BY_SERVICE_USER_SUCCESS                  = "Service was found";
	const SERVICE_SELECT_CORPORATION                              = "Select a corporation";
	const SERVICE_SELECT_DEPARTMENT                               = "Select a department";
	const SERVICE_SELECT_ERROR                                    = "No service was found";
	const SERVICE_SELECT_SUCCESS                                  = "Service was found";
	const SERVICE_SELECT_TYPE                                     = "Select a service type";
	const SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE                  = "Select a service by the type of association";
	const SERVICE_TYPE                                            = "Type of Service";
	const SERVICE_UPDATE_BY_ID_ERROR                              = "Error updating service";
	const SERVICE_UPDATE_BY_ID_SUCCESS                            = "Service updated succesfully";
	const SERVICE_UPDATE_RESTRICTBY_ID_ERROR                      = "Error updating service";
	const SERVICE_UPDATE_RESTRICT_BY_ID_SUCCESS                   = "Service updated succesfully";
	const SESSION_EXPIRES                                         = "Session Expires";
	const SUBMIT_ACCOUNT_ACTIVATE                                 = "ACTIVATE ACCOUNT";
	const SUBMIT_ACCOUNT_DEACTIVATE                               = "DEACTIVATE ACCOUNT";
	const SUBMIT_BACK                                             = "BACK";
	const SUBMIT_CANCEL                                           = "CANCEL";
	const SUBMIT_CHANGE_ASSOC_USER_CORPORATION                    = "CHANGE USER CORPORATION INFO";
	const SUBMIT_CHANGE_CORPORATION                               = "CHANGE CORPORATION";
	const SUBMIT_CHANGE_PASSWORD                                  = "CHANGE PASSWORD";
	const SUBMIT_CHANGE_USER_TYPE                                 = "CHANGE USER TYPE";
	const SUBMIT_CONFIRM                                          = "Confirm?";
	const SUBMIT_DELETE                                           = "DELETE";
	const SUBMIT_FORWARD                                          = "NEXT";
	const SUBMIT_LIST                                             = "LIST";
	const SUBMIT_LIST_USERS                                       = "LIST USERS";
	const SUBMIT_MANAGE_MEMBERS                                   = "MANAGE MEMBERS";
	const SUBMIT_INSERT                                           = "INSERT";
	const SUBMIT_REGISTER                                         = "REGISTER";
	const SUBMIT_RESET_PASSWORD                                   = "RESET PASSWORD";
	const SUBMIT_SELECT                                           = "SELECT";
	const SUBMIT_TWO_STEP_VERIFICATION_ACTIVATE                   = "ACTIVATE TWO STEP VERIFICATION";
	const SUBMIT_TWO_STEP_VERIFICATION_DEACTIVATE                 = "DEACTIVATE TWO STEP VERIFICATION";
	const SUBMIT_UPDATE                                           = "UPDATE";
	const SUBMIT_VALIDATE                                         = "VALIDATE";
	const TEAM                                                    = "Team";
	const TEAM_DESCRIPTION                                        = "Team description";
	const TEAM_ID                                                 = "Team id";
	const TEAM_NAME                                               = "Team name";
	const TEAM_NOT_FOUND                                          = "Team not found";
	const TEAMS                                                   = "Teams";
	const TEXT_BUTTON_GET                                         = "GET";
	const TEXT_BUTTON_VERIFY                                      = "VERIFY";
	const TEXT_HOSTNAME                                           = "Hostname";
	const TEXT_IP_ADDRESS                                         = "Ip address";
	const TEXT_MASK                                               = "Mask";
	const TEXT_NUMBER                                             = "Number";
	const TEXT_PORT                                               = "Port";
	const TEXT_WEBSITE                                            = "Web Site";
	const TWO_STEP_VERIFICATION                                   = "Two step verification";
	const TYPE                                                    = "Type";
	const TYPE_ASSOC_USER_SERVICE_SELECT_ERROR                    = "Error obtaining types of association";
	const TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS                  = "Types of association obtained succefully";
	const TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION                   = "Description";
	const TYPE_ASSOC_USER_TEAM_TEAM_ID                            = "Id";
	const TYPE_ASSOC_USER_TEAM_NOT_FOUND                          = "Type of association between a user and a team not found";
	const TYPE_SERVICE_NAME                                       = "Type Service Name";
	const TYPE_STATUS_TICKET_DESCRIPTION                          = "Description";
	const TYPE_STATUS_TICKET_ID                                   = "Id";
	const TYPE_STATUS_TICKET_NOT_FOUND                            = "Type status ticket not found";
	const TYPE_TICKET_DESCRIPTION                                 = "Description";
	const TYPE_TICKET_ID                                          = "Id";
	const TYPE_TICKET_NOT_FOUND                                   = "Type ticket not found";
	const TYPE_USER_DESCRIPTION                                   = "Description";
	const TYPE_USER_ID                                            = "Id";
	const TYPE_USER_NOT_FOUND                                     = "User type not found";
	const UPDATE_ERROR_ASSOC_USER_CORPORATION                     = "Error while trying to update user's corporation information";
	const UPDATE_ERROR_USER_UNIQUE_ID                             = "Unique Id already picked by another user, "
	                                                              . "please choose another";
	const UPDATE_SUCCESS                                          = "Information updated";
	const UPDATE_WARNING_SAME_VALUE                               = "Information with same value as the old one";
	const USER_ACTIVE                                             = "Account active";
	const USER_CONFIRMED                                          = "Account confirmed";
	const USER_INACTIVE                                           = "This account has been deactivated by an administrator";
	const USER_NOT_FOUND                                          = "User not found";  
	const USER_SAME_AS_ADMIN                                      = "User is the same as the Admin!";
	const USER_SELECT_BY_HASH_CODE_ERROR                          = "Error trying to obtain user with the given hash code";
	const USER_SELECT_BY_HASH_CODE_SUCCESS                        = "User obtained sucessfully";
	const USER_SELECT_BY_USER_EMAIL_ERROR                         = "Error trying to obtain user with the given e-mail";
	const USER_SELECT_BY_USER_EMAIL_SUCCESS                       = "User obtained sucessfully";
	const USER_TEAM_SELECT_ERROR                                  = "Error trying to get the user teams";
	const USER_TWO_STEP_VERIFICATION_CHANGE_ERROR                 = "Error changing two step verification";
	const USER_TWO_STEP_VERIFICATION_CHANGE_SUCCESS               = "Two step verification changed succesfully";
	const USER_UNIQUE_ID                                          = "Unique ID";
	const USER_UNIQUE_ID_TIP                                      = "(Unique login)";
	const USER_UPDATE_USER_CONFIRMED_ERROR                        = "User confirmed updated succesfully";
	const USER_UPDATE_USER_CONFIRMED_SUCCESS                      = "Error trying to update value for user confirmed";
	
	/* Header */
	const HEADER_CHANGE_LAYOUT                                    = "Request [0] Layout:";
	const HEADER_DEBUG                                            = "Debug:";
	const HEADER_PAGE_ABOUT_TITLE                                 = "About";
	const HEADER_PAGE_ABOUT_TEXT                                  = "ABOUT";
	const HEADER_PAGE_ACCOUNT_TITLE                               = "My Account";
	const HEADER_PAGE_ACCOUNT_TEXT                                = "My Account";
	const HEADER_PAGE_ADMIN_TITLE                                 = "Admin";
	const HEADER_PAGE_ADMIN_TEXT                                  = "ADMIN";
	const HEADER_PAGE_CHECK_TITLE                                 = "Checking Functions";
	const HEADER_PAGE_CHECK_TEXT                                  = "CHECKING FUNCTIONS";
	const HEADER_PAGE_CONTACT_TITLE                               = "Contact";
	const HEADER_PAGE_CONTACT_TEXT                                = "CONTACT";
	const HEADER_PAGE_CORPORATION_TITLE                           = "My corporation";
	const HEADER_PAGE_CORPORATION_TEXT                            = "My corporation";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TITLE                      = "Diagnostic Tools";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TEXT                       = "DIAGNOSTIC TOOLS";
	const HEADER_PAGE_GET_TITLE                                   = "Obtaining Functions";
	const HEADER_PAGE_GET_TEXT                                    = "OBTAINING FUNCTIONS";
	const HEADER_PAGE_HOME_TITLE                                  = "InfraTools";
	const HEADER_PAGE_HOME_IMAGE_ALT                              = "InfraTools";
	const HEADER_PAGE_LOGIN_TITLE                                 = "Login";
	const HEADER_PAGE_LOGIN_TEXT                                  = "Login";
	const HEADER_PAGE_LOGOUT                                      = "Log out";
	const HEADER_PAGE_NOTIFICATION_TITLE                          = "Notification";
	const HEADER_PAGE_NOTIFICATION_TEXT                           = "NOTIFICATION";
	const HEADER_PAGE_REGISTER_TITLE                              = "Register";
	const HEADER_PAGE_REGISTER_TEXT                               = "Register";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TITLE              = "Resend Confirmation Link";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TEXT               = "here";
	const HEADER_PAGE_SERVICE_TITLE                               = "Service";
	const HEADER_PAGE_SERVICE_TEXT                                = "SERVICE";
	const HEADER_PAGE_SUPPORT_TITLE                               = "Requests";
	const HEADER_PAGE_SUPPORT_TEXT                                = "REQUESTS";
	const HEADER_PAGE_TEAM_TITLE                                  = "My Teams";
	const HEADER_PAGE_TEAM_TEXT                                   = "My Teams";
	
	/* Body Page About */
	const ABOUT_DESCRIPTION_TITLE                                 = "About the System";
	const ABOUT_DESCRIPTION_TEXT                                  = "The InfraTools System offers functions to help in "
																  . "infrastructure and is based on cloud computing.<br/> "
																  . "For corporations we can offer specific services with a "
																  . "planned schedule If you want a specific service enter in "
																  . "contact.";
	const ABOUT_SERVICE_TITLE                                     = "Corporate Aid";
	const ABOUT_SERVICE_TEXT                                      = "We work directly in the concept of cloud computing, and "
	                                                              . "we offer services for organizations that wish solutions in   "
																  . "cloud computing";
	const ABOUT_PERSONALIZED_TITLE                                = "Custom Functions";
	const ABOUT_PERSONALIZED_TEXT                                 = "We can offer monitoring routines and scheduling of specific "
	                                                              . "functions as well as personalized functions";
	
	/* Body Page Account */
	
	/* Body Page Account Update */
	const ACCOUNT_UPDATE_ERROR                                   = "Error updating information";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE                      = "Invalid birth date";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE_DAY                  = "Invalid birth day";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE_MONTH                = "Invalid birth month";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE_YEAR                 = "Invalid birth year";
	const ACCOUNT_UPDATE_INVALID_GENDER                          = "Invalid gender, chose a valid gender from the given list";
	const ACCOUNT_UPDATE_INVALID_NAME                            = "Please fill a valid name";
	const ACCOUNT_UPDATE_INVALID_NAME_SIZE                       = "Quantity of characters exceeds the maximum allowed on name";
	const ACCOUNT_UPDATE_INVALID_USER_UNIQUE_ID                  = "Please fill a valid unique ID";
	const ACCOUNT_UPDATE_INVALID_USER_UNIQUE_ID_SIZE             = "Quantity of characters exceeds the maximum allowed on "
		                                                         . "unique ID";
	const ACCOUNT_UPDATE_NAME_TIP                                = "(Name and surname)";
	const ACCOUNT_UPDATE_SELECT_BIRTH_DATE_DAY                   = "Day";
	const ACCOUNT_UPDATE_SELECT_BIRTH_DATE_MONTH                 = "Month";
	const ACCOUNT_UPDATE_SELECT_BIRTH_DATE_YEAR                  = "Year";
	const ACCOUNT_UPDATE_SELECT_GENDER_MALE                      = "Male";
	const ACCOUNT_UPDATE_SELECT_GENDER_FEMALE                    = "Female";
	const ACCOUNT_UPDATE_TEXT_BIRTH_DATE                         = "Birth Date";
	
	/* Body Page Account Change Password */
	const ACCOUNT_CHANGE_PASSWORD_ERROR                          = "Error updating password";
	const ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD               = "Invalid password, type a valid password that matches the criteria";
	const ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD_MATCH         = "Passwords do not match";
	const ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD_SIZE          = "Password must be at least 8 character long and a maximum of 16 "                                                                . "characaters";
	const ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD                   = "New password";
	const ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD_TIP               = "(At least 1 number and 1 capital letter, between 8 and 18 digits)";
	const ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD_TITLE             = "The password must have at least 1 number and 1 capital letter, "
	                                                             . "having between 8 and 18 digits";
	const ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD                = "Repeat password";
	const ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD_TIP            = "(At least 1 number and 1 capital letter, between 8 and 18 digits)";
	const ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD_TITLE          = "The password must have at least 1 number and 1 capital letter, "
	                                                             . "having between 8 and 18 digits";
	const ACCOUNT_CHANGE_PASSWORD_SUBMIT                         = "UPDATE";
	const ACCOUNT_CHANGE_PASSWORD_SUBMIT_CANCEL                  = "CANCEL";
	const ACCOUNT_CHANGE_PASSWORD_SUCCESS                        = "Success";
	
	/* Body Page Account Corporation */
	
	/* Body Page Admin */
	const ADMIN_OPTIONS_TITLE                                     = "Admin Options";
	const ADMIN_TEXT_CORPORATION                                  = "Insert, delete, update and select corporations";
	const ADMIN_TEXT_COUNTRY                                      = "Select countries";
	const ADMIN_TEXT_DEPARTMENT                                   = "Insert, delete, update and select departments";
	const ADMIN_TEXT_SERVICE                                      = "Insert, delete, update and select services";
	const ADMIN_TEXT_TEAM                                         = "Insert, delete, update and select teams";
	const ADMIN_TEXT_TECH_INFO                                    = "View technical details about InfraTools"; 
	const ADMIN_TEXT_TICKET                                       = "Insert, delete, update and select tickets";
	const ADMIN_TEXT_TYPE_ASSOC_USER_TEAM                         = "Insert, delete, update and select team association types";
	const ADMIN_TEXT_TYPE_SERVICE                                 = "Insert, delete, update and select service types";
	const ADMIN_TEXT_TYPE_STATUS_TICKET                           = "Insert, delete, update and select ticket status types";
	const ADMIN_TEXT_TYPE_TICKET                                  = "Insert, delete, update and select ticket types";
	const ADMIN_TEXT_TYPE_USER                                    = "Insert, delete, update and select user types";
	const ADMIN_TEXT_USER                                         = "Insert, delete, update and select users";
	
	/* Body Page AdminCorporation */
	const ADMIN_CORPORATION_DELETE_ERROR                          = "Error deleting corporation";
	const ADMIN_CORPORATION_DELETE_ERROR_DEPENDENCY_DEPARTMENT    = "Corporation has departments associated, delete them first";
	const ADMIN_CORPORATION_DELETE_SUCCESS                        = "Corporation deleted succesfully";
	const ADMIN_CORPORATION_REGISTER_ERROR                        = "Error while trying to register corporation";
	const ADMIN_CORPORATION_REGISTER_SUCCESS                      = "Corporation registered succesfully";
	const ADMIN_CORPORATION_SELECT_USERS_ERROR                    = "Error while trying to select users from corporation";
	
	/* Body Page AdminCountry */
	
	/* Body Page AdminDepartment */
	const ADMIN_DEPARTMENT_DELETE_ERROR                           = "Error deleting department";
	const ADMIN_DEPARTMENT_DELETE_ERROR_DEPENDENCY_USERS          = "Department has users associated, remove them first";
	const ADMIN_DEPARTMENT_DELETE_SUCCESS                         = "Department deleted succesfully";
	const ADMIN_DEPARTMENT_REGISTER_ERROR                         = "Error while trying to register department";
	const ADMIN_DEPARTMENT_REGISTER_ERROR_DEPARTMENT_EXISTS       = "Department already exists for that corporation";
	const ADMIN_DEPARTMENT_REGISTER_SUCCESS                       = "Department registered succesfully";
	const ADMIN_DEPARTMENT_SELECT_USERS_ERROR                     = "Error while trying to select users from department";
	const ADMIN_DEPARTMENT_UPDATE_ERROR                           = "Error updating department";
	const ADMIN_DEPARTMENT_UPDATE_SUCCESS                         = "Department updated succesfully";
	
	/* Body Page AdminNotification */
	const ADMIN_NOTIFICATION_DELETE_ERROR                         = "Error deleting notification";
	const ADMIN_NOTIFICATION_DELETE_SUCCESS                       = "Notification deleted succefully";
	const ADMIN_NOTIFICATION_INVALID_TEXT                         = "Invalid text";
	const ADMIN_NOTIFICATION_INVALID_TEXT_SIZE                    = "Quantity of characters exceeds the maximum allowed on text";
	const ADMIN_NOTIFICATION_REGISTER_ERROR                       = "Error while inserting notification";
	const ADMIN_NOTIFICATION_REGISTER_SUCCESS                     = "Notification inserted succesfully";
	const ADMIN_NOTIFICATION_UPDATE_ERROR                         = "Error updating notification";
	const ADMIN_NOTIFICATION_UPDATE_SUCCESS                       = "Notification updated succesfully";
	
	/* Body Page AdminTeam */
	const ADMIN_TEAM_DELETE_ERROR                                 = "Error deleting team";
	const ADMIN_TEAM_DELETE_ERROR_DEPENDENCY_TEAM                 = "Team has users associated, delete them first";
	const ADMIN_TEAM_DELETE_SUCCESS                               = "Team deleted succesfully";
	const ADMIN_TEAM_INVALID_DESCRIPTION                          = "Invalid description";
	const ADMIN_TEAM_INVALID_DESCRIPTION_SIZE                     = "Quantity of characters exceeds the maximum allowed on "
		                                                          . "description";
	const ADMIN_TEAM_REGISTER_ERROR                               = "Error while trying to register team";
	const ADMIN_TEAM_REGISTER_SUCCESS                             = "Team registered succesfully";
	const ADMIN_TEAM_SELECT_USERS_ERROR                           = "Error while trying to select users from team";
	const ADMIN_TEAM_UPDATE_ERROR                                 = "Error while trying to update team";
	const ADMIN_TEAM_UPDATE_SUCCESS                               = "Team updated succesfully";
	
	/* Body Page Admin Tech Info */
	const ADMIN_TECH_INFO_DIRECTORY_COUNT                         = "Number of Directories";
	const ADMIN_TECH_INFO_FILE_COUNT                              = "Number of Files";
	const ADMIN_TECH_INFO_FILE_EXTENSION                          = "Extension";
	const ADMIN_TECH_INFO_FILE_TYPE                               = "Type";
	const ADMIN_TECH_INFO_FILE_VALUE                              = "Value";
	const ADMIN_TECH_INFO_LANGUAGE_QUANTITY_CONSTANT              = "Quantity of constants";
	const ADMIN_TECH_INFO_LANGUAGE_QUANTITY_VALUE                 = "Quantity of texts";
	const ADMIN_TECH_INFO_LANGUAGE_CONSTANTS_PROBLEM              = "Constants with possible problem";
	const ADMIN_TECH_INFO_TITLE_BASE                              = "Base";
	const ADMIN_TECH_INFO_TITLE_INFRATOOLS                        = "InfraTools";
	const ADMIN_TECH_INFO_TITLE_TOTAL                             = "Total";
		
	
	/* Body Page AdminTypeAssocUserTeam */
	const ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_ERROR                 = "Error deleting type of association";
	const ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_ERROR_DEPENDENCY_TEAM = "Type of associations is used between users and teams,"
		                                                          . "delete them first";
	const ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_SUCCESS               = "Type of association deleted succesfully";
	const ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_ERROR               = "Error while inserting type of association between user "
		                                                          . "and teams";
	const ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_SUCCESS             = "Type of association inserted succesfully";
	const ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_ERROR                 = "Error updating type of association";
	const ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_SUCCESS               = "Type of association updated succesfully";
	
	/* Body Page AdminTypeStatusTicket */
	const ADMIN_TYPE_STATUS_TICKET_DELETE_ERROR                   = "Error deleting ticket status type";
	const ADMIN_TYPE_STATUS_TICKET_DELETE_ERROR_DEPENDENCY_TICKET = "Type of status ticket is associated,"
		                                                          . "delete the associations first";
	const ADMIN_TYPE_STATUS_TICKET_DELETE_SUCCESS                 = "Type status ticket deleted succefully";
	const ADMIN_TYPE_STATUS_TICKET_REGISTER_ERROR                 = "Error while inserting type status ticket";
	const ADMIN_TYPE_STATUS_TICKET_REGISTER_SUCCESS               = "Type status ticket inserted succesfully";
	const ADMIN_TYPE_STATUS_TICKET_UPDATE_ERROR                   = "Error updating type status ticket";
	const ADMIN_TYPE_STATUS_TICKET_UPDATE_SUCCESS                 = "Type status ticket updated succesfully";
	
	/* Body Page AdminTypeTicket */
	const ADMIN_TYPE_TICKET_DELETE_ERROR                          = "Error deleting ticket type";
	const ADMIN_TYPE_TICKET_DELETE_ERROR_DEPENDENCY_TICKET        = "Ticket type has ticket associated, delete them first";
	const ADMIN_TYPE_TICKET_DELETE_SUCCESS                        = "Ticket type deleted succesfully";
	const ADMIN_TYPE_TICKET_INVALID_DESCRIPTION                   = "Invalid description";
	const ADMIN_TYPE_TICKET_INVALID_DESCRIPTION_SIZE              = "Quantity of characters exceeds the maximum allowed on"
		                                                          . "description";
	const ADMIN_TYPE_TICKET_REGISTER_ERROR                        = "Error while inserting ticket type";
	const ADMIN_TYPE_TICKET_REGISTER_SUCCESS                      = "Ticket type inserted succesfully";
	const ADMIN_TYPE_TICKET_UPDATE_ERROR                          = "Error updating ticket type";
	const ADMIN_TYPE_TICKET_UPDATE_SUCCESS                        = "Ticket type updated succesfully";
	
	/* Body Page AdminTypeUser */
	const ADMIN_TYPE_USER_DELETE_ERROR                            = "Error deleting user type";
	const ADMIN_TYPE_USER_DELETE_ERROR_DEPENDENCY_USER            = "User type has user associated, delete them first";
	const ADMIN_TYPE_USER_DELETE_SUCCESS                          = "User type deleted succesfully";
	const ADMIN_TYPE_USER_INVALID_DESCRIPTION                     = "Invalid description";
	const ADMIN_TYPE_USER_INVALID_DESCRIPTION_SIZE                = "Quantity of characters exceeds the maximum allowed on"
		                                                          . "description";
	const ADMIN_TYPE_USER_REGISTER_ERROR                          = "Error while inserting user type";
	const ADMIN_TYPE_USER_REGISTER_SUCCESS                        = "User type inserted succesfully";
	const ADMIN_TYPE_USER_SELECT_USERS_ERROR                      = "Error while trying to select users from user type";
	const ADMIN_TYPE_USER_UPDATE_ERROR                            = "Error while updating user type";
	const ADMIN_TYPE_USER_UPDATE_SUCCESS                          = "User type updated succesfully";

	/* Body Page AdminUser */
	const ADMIN_USER_ACTIVATE_ERROR                              = "Error while trying to [0] user";
	const ADMIN_USER_ACTIVATE_ERROR_NO_USER_SELECTED             = "No user were selected";
	const ADMIN_USER_ACTIVATE_SUCCESS                            = "User [0] successfully";
	const ADMIN_USER_CHANGE_CORPORATION_ERROR                    = "Error while trying to change user corporation";
	const ADMIN_USER_CHANGE_CORPORATION_SUCCESS                  = "User corporation updated successfully";
	const ADMIN_USER_CHANGE_USER_TYPE_ERROR                      = "Error while trying to change user type";
	const ADMIN_USER_CHANGE_USER_TYPE_SUCCESS                    = "User type updated successfully";
	const ADMIN_USER_DELETE_ERROR                                = "Error while trying to delete user";           
	const ADMIN_USER_DELETE_SUCCESS                              = "User deleted successfully";
	const ADMIN_USER_SEARCH_RESULT_NUMBER                        = "Max search result is 20";
	const ADMIN_USER_SEARCH_RANGE_START                          = "Start Range";
	const ADMIN_USER_SEARCH_RANGE_END                            = "End Range";
	
	/* Body Page Check */
	const CHECK_SUBMIT                                           = "CHECK";
	const CHECK_AVAILABILITY_INPUT_HOST_TITLE                    = "Hostname";
	const CHECK_AVAILABILITY_LABEL_HOST                          = "Hostname";
	const CHECK_AVAILABILITY_TITLE                               = "Verify hostname availability";
	const CHECK_AVAILABILITY_TEXT                                = "Verify hostname availability";
	const CHECK_AVAILABILITY_TEXT_TIP                            = "Fill the field with a valid hostname and it will check if the "
	                                                             . "hostname is available or if it is taken.";
	const CHECK_BLACKLIST_LABEL_HOST                             = "Hostname";
	const CHECK_BLACKLIST_LABEL_IP                               = "Ip address";
	const CHECK_BLACKLIST_RADIO_HOST_TITLE                       = "Hostname";
	const CHECK_BLACKLIST_RADIO_IP_TITLE                         = "Ip address";
	const CHECK_BLACKLIST_INPUT_HOST_TITLE                       = "Hostname";
	const CHECK_BLACKLIST_INPUT_IP_TITLE                         = "Ip address";
	const CHECK_BLACKLIST_TITLE                                  = "Verify black list";
	const CHECK_BLACKLIST_TEXT                                   = "Verify black list";
	const CHECK_BLACKLIST_TEXT_TIP                               = "Fill the field with a valid hostname or ip address and the function "
	                                                             . "will check if the given address is blacklisted on the following "
																 . "lists: uceprotect, dronebl, sorbs, spamhaus, aupads, "
																 . "barracudacentral, unsubscore,  abuseat.";
	const CHECK_DNS_INPUT_HOST_TITLE                             = "Hostname";
	const CHECK_DNS_LABEL_HOST                                   = "Hostname";
	const CHECK_DNS_TITLE                                        = "Verify dns record";
	const CHECK_DNS_TEXT                                         = "Verify dns record";
	const CHECK_DNS_TEXT_TIP                                     = "Fill the field with a valid hostname and select an option of DNS "
	                                                             . "record and the function will try to check if the given hostname has "
																 . "the given DNS record.";
	const CHECK_EMAIL_EXISTS_INPUT_ADDRESS_TITLE                 = "E-mail";
	const CHECK_EMAIL_EXISTS_LABEL_ADDRESS                       = "E-mail";
	const CHECK_EMAIL_EXISTS_TITLE                               = "Verify e-mail address";
	const CHECK_EMAIL_EXISTS_TEXT                                = "Verify e-mail address";
	const CHECK_EMAIL_EXISTS_TEXT_TIP                            = "Fill the field with a valid e-mail address and the function will "
	                                                             . "check if the given e-mail exists.";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP                = "Ip address";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK              = "Mask";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK           = "Network address";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_IP                = "Ip address";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_MASK              = "Mask";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_NETWORK           = "Network address";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_TITLE                   = "Verify if ip address is in a network";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT                    = "Verify if ip address is in a network";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT_TIP                = "Fill the fields with a ip address, a network address and a valid "
	                                                             . "netmask. The function will check if the given ip address is in the "
																 . "given network with the given netmask.";
	const CHECK_PING_INPUT_HOST_TITLE                            = "Hostname";
	const CHECK_PING_INPUT_IP_TITLE                              = "Ip address";
	const CHECK_PING_LABEL_HOST                                  = "Hostname";
	const CHECK_PING_LABEL_IP                                    = "Ip address";
	const CHECK_PING_RADIO_HOST_TITLE                            = "Hostname";
	const CHECK_PING_RADIO_IP_TITLE                              = "Ip address";
	const CHECK_PING_TITLE                                       = "Verify ping";
	const CHECK_PING_TEXT                                        = "Verify ping";
	const CHECK_PING_TEXT_TIP                                    = "Fill the field with a valid hostname or ip address and the function "
	                                                             . "will try to sent packages to that address and see it it answers.";
	const CHECK_PORT_STATUS_INPUT_HOST_TITLE                     = "Hostname";
	const CHECK_PORT_STATUS_INPUT_HOST_PORT_TITLE                = "Port";
	const CHECK_PORT_STATUS_INPUT_IP_TITLE                       = "Ip address";
	const CHECK_PORT_STATUS_INPUT_IP_PORT_TITLE                  = "Port";
	const CHECK_PORT_STATUS_LABEL_HOST                           = "Hostname";
	const CHECK_PORT_STATUS_LABEL_HOST_PORT                      = "Port";
	const CHECK_PORT_STATUS_LABEL_IP                             = "Ip address";
	const CHECK_PORT_STATUS_LABEL_IP_PORT                        = "Port";
	const CHECK_PORT_STATUS_RADIO_IP_TITLE                       = "Ip address";
	const CHECK_PORT_STATUS_RADIO_HOST_TITLE                     = "Hostname";
	const CHECK_PORT_STATUS_TITLE                                = "Verify port status";
	const CHECK_PORT_STATUS_TEXT                                 = "Verify port status";
	const CHECK_PORT_STATUS_TEXT_TIP                             = "Fill the field with a valid hostname or ip address and a port number. "
	                                                             . "The function will check if the port if open or closed. This function "
																 . "can return a timeout if it can't reach the given address, and "
																 . "can also return a failure if the given address could not be found.";
	/* Body Page Cloud Service */
	
	/* Body Page Contact */
	const CONTACT_EMAIL_ALREADY_SENT                             = "Your message was already sent before, please wait contact";
	const CONTACT_EMAIL_ERROR                                    = "An error has occurred while trying to send the message";
	const CONTACT_INVALID_EMAIL                                  = "Please fill a valid e-mail";
	const CONTACT_INVALID_EMAIL_SIZE                             = "Quantity of characters exceeds the maximum allowed on e-mail";
	const CONTACT_INVALID_NAME                                   = "Please fill a valid name";
	const CONTACT_INVALID_NAME_SIZE                              = "Quantity of characters exceeds the maximum allowed on name";
	const CONTACT_INVALID_MESSAGE_SIZE                           = "Quantity of characters exceeds the maximum allowed on message";
	const CONTACT_INVALID_SUBJECT                                = "Please select a valid topic";
	const CONTACT_INVALID_TITLE                                  = "Please fill a valid title";
	const CONTACT_INVALID_TITLE_SIZE                             = "Quantity of characters exceeds the maximum allowed on title";
	const CONTACT_SUCCESS                                        = "Message sent successfully";
	const CONTACT_SELECT_COMMERCIAL                              = "Commercial";
	const CONTACT_SELECT_DOUBT                                   = "Doubt";
	const CONTACT_SELECT_SUGGESTION                              = "Suggestion";
	const CONTACT_TEXT_CAPTCHA                                   = "Type the word";
	const CONTACT_TEXT_MESSAGE                                   = "Message";
	const CONTACT_TEXT_NAME                                      = "Name";
	const CONTACT_TEXT_NAME_TIP                                  = "(Name and surname)";
	const CONTACT_TEXT_SEND                                      = "SEND";
	const CONTACT_TEXT_SUBJECT                                   = "Subject";
	const CONTACT_TEXT_TITLE                                     = "Title";
	const CONTACT_TEXT_TITLE_TIP                                 = "(Numbers not allowed)";
	
	/* Body Page Get */
	const GET_CALCULATION_NETMASK_TITLE                          = "Get calculation netmask";
	const GET_CALCULATION_NETMASK_TEXT                           = "Get calculation netmask";
	const GET_CALCULATION_NETMASK_TEXT_TIP                       = "Fill the field with a valid ip address and a netmask. The function "
	                                                             . "calculate the values for that network based on the given values.";
	const GET_DNS_OPTION_MX                                      = "MX";
	const GET_DNS_OPTION_OTHER                                   = "Other";
	const GET_DNS_TITLE                                          = "Get dns record";
	const GET_DNS_TEXT                                           = "Get dns record";
	const GET_DNS_TEXT_TIP                                       = "Fill the field with a valid hostname and select a DNS option. The "
	                                                             . "function will try to get any dns records that exists for that "
																 . "with the given option, consulting the records on our servers.";
	const GET_HOSTNAME_TITLE                                     = "Get hostname";
	const GET_HOSTNAME_TEXT                                      = "Get hostname";
	const GET_HOSTNAME_TEXT_TIP                                  = "Fill the field with a valid ip address and the function will try "
	                                                             . "to get a hostname associated with the given address.";
	const GET_IP_ADDRESSES_TITLE                                 = "Get ip addresses";
	const GET_IP_ADDRESSES_TEXT                                  = "Get ip addresses";
	const GET_IP_ADDRESSES_TEXT_TIP                              = "Fill the field with a valid hostname and the function will "
	                                                             . "get any ip address associated with that hostname.";
	const GET_LOCATION_TITLE                                     = "Get location";
	const GET_LOCATION_TEXT                                      = "Get location";
	const GET_LOCATION_TEXT_TIP                                  = "Fill the field with a valid ip address and the function will try "
	                                                             . "to discover the approximate physical location for the given ip "
																 . " address.";
	const GET_PROTOCOL_TITLE                                     = "Get protocol";
	const GET_PROTOCOL_TEXT                                      = "Get protocol";
	const GET_PROTOCOL_TEXT_TIP                                  = "Fill the field with a valid number and the function will show "
	                                                             . "the default protocol associated with the given number if there is "
																 . "any.";
	const GET_ROUTE_TITLE                                        = "Get route";
	const GET_ROUTE_TEXT                                         = "Get route";
	const GET_ROUTE_TEXT_TIP                                     = "Fill the field with a valid ip address and the function will trace "
	                                                             . "a route from our servers to the given ip address and them "
																 . "the route will be displayed.";
	const GET_SERVICE_TITLE                                      = "Get service";
	const GET_SERVICE_TEXT                                       = "Get service";
	const GET_SERVICE_TEXT_TIP                                   = "Fill the filed with a valid port number and select a type of "
	                                                             . "protocol. The function will display the default service that runs "
																 . "on the given port number with the selected protocol if there is any.";
	const GET_WEBSITE_OPTION_CONTENT                             = "Content";
	const GET_WEBSITE_OPTION_HEADER                              = "Header";
	const GET_WEBSITE_TITLE                                      = "Get website data";
	const GET_WEBSITE_TEXT                                       = "Get website data";
	const GET_WEBSITE_TEXT_TIP                                   = "Fill the field with a valid web site address and select an option. "
	                                                             . "The function will try to get the desired information about a website "
																 . "if it exists.";
	const GET_WHOIS_LABEL_HOST                                   = "Hostname";
	const GET_WHOIS_LABEL_IP                                     = "Ip address";
	const GET_WHOIS_RADIO_HOST_TITLE                             = "Hostname";
	const GET_WHOIS_RADIO_IP_TITLE                               = "Ip address";
	const GET_WHOIS_INPUT_HOST_TITLE                             = "Hostname";
	const GET_WHOIS_INPUT_IP_TITLE                               = "Ip address";
	const GET_WHOIS_TITLE                                        = "Get information from hostname or ip";
	const GET_WHOIS_TEXT                                         = "Get information from hostname or ip";
	const GET_WHOIS_TEXT_TIP                                     = "Fill the field with a valid ip address or a valid hostname and the "
	                                                             . "function will try to obtain any associated information from the "
																 . "given value. If the given value is a registered hostname the "
																 . "function will provid the information associated for that host.";
	
	/* Body Page Home */
	const HOME_CHECK_1                                           = "Group of functions dedicated to";
	const HOME_CHECK_2                                           = "verify network and";
	const HOME_CHECK_3                                           = "diagnostic problems";
	const HOME_CHECK_BUTTON_TEXT                                 = "Go";
	const HOME_CLOUD_1                                           = "Page dedicated to";
	const HOME_CLOUD_2                                           = "documentation and monitoring";
	const HOME_CLOUD_3                                           = "services on the web";
	const HOME_CLOUD_BUTTON_TEXT                                 = "Go";
	const HOME_GET_1                                             = "Group of functions dedicated for";
	const HOME_GET_2                                             = "gathering data about";
	const HOME_GET_3                                             = "network and web.";
	const HOME_GET_BUTTON_TEXT                                   = "Go";
	const HOME_API_1                                             = "Group of functions that focus on";
	const HOME_API_2                                             = "cloud services to provide";
	const HOME_API_3                                             = "additional informations";
	const HOME_API_BUTTON_TEXT                                   = "Go";
	const HOME_CERTIFICATION                                     = "Certifications";
	
	/* Body Page Login */
	const LOGIN_ERROR                                            = "Error trying to log in";
	const LOGIN_FORGOT_PASSWORD_TEXT                             = "Forgot password ?";
	const LOGIN_NEW_TEXT                                         = "New? Register";
	const LOGIN_PASSWORD                                         = "Password";
	const LOGIN_INVALID_LOGIN                                    = "Invalid login or password";
	const LOGIN_SUCCESS                                          = "Success";
	const LOGIN_SEND                                             = "LOGIN";
	const LOGIN_TWO_STEP_VERIFICATION_CODE                       = "Verification Code";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_ERROR                 = "Verification code is wrong!";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_FAILED          = "Falied to send the code to your e-mail, please try again";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TAG             = "InfraTools - Login Two Step Verification";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TEXT            = "Here is the code needed to login";
	const LOGIN_USER                                             = "Login (E-mail or Unique ID)";
	const USER_NOT_CONFIRMED                                     = "Your account has not been confirmed, please confirm it through the "
	                                                             . "e-mail that was sent to you. If you lost the e-email or didn't "
															     . "receive it, another one can be sent";
	
	/* Body Page Not Found */
	
	/* Body Page Password Recovery */
	const PASSWORD_RECOVERY_EMAIL_ALREADY_SENT                    = "The password was already sent for this e-mail, "
	                                                              . "please wait a moment to sent it again";
	const PASSWORD_RECOVERY_EMAIL_ERROR                           = "An error has occurred when trying to send the e-mail";
	const PASSWORD_RECOVERY_EMAIL_NOT_FOUND                       = "E-mail address not found";
	const PASSWORD_RECOVERY_EMAIL_TAG                             = "InfraTools - Password Recovery";
	const PASSWORD_RECOVERY_EMAIL_TEXT                            = "Here is the code needed to change your password.<br/><br/>Code:";
	const PASSWORD_RECOVERY_ERROR                                 = "Error validating fields";
	const PASSWORD_RECOVERY_INVALID_CAPTCHA                       = "The captcha value does not match";
	const PASSWORD_RECOVERY_INVALID_EMAIL                         = "Please fill a valid e-mail";
	const PASSWORD_RECOVERY_INVALID_EMAIL_SIZE                    = "Quantity of characters exceeds the maximum allowed on e-mail";
	const PASSWORD_RECOVERY_SUCCESS                               = "Password sent to the e-mail address.";
	const PASSWORD_RECOVERY_TEXT_CAPTCHA                          = "Type the word";
	const PASSWORD_RECOVERY_TEXT_SEND                             = "Send";
	
	/* Body Page Password Reset */
	const PASSWORD_RESET_INVALID_CODE                            = "Invalid code";
	const PASSWORD_RESET_INVALID_PASSWORD                        = "Invalid password, type a valid password that matches the criteria";
	const PASSWORD_RESET_INVALID_PASSWORD_MATCH                  = "Passwords do not match";
	const PASSWORD_RESET_INVALID_PASSWORD_SIZE                   = "Password must be at least 8 character long and a maximum of 16 "                                                                . "characaters";
	const PASSWORD_RESET_ERROR                                   = "Error while trying to change password";
	const PASSWORD_RESET_SUCCESS                                 = "Password updated successfully";
	const PASSWORD_RESET_TEXT_CODE                               = "Change code";
	const PASSWORD_RESET_TEXT_NEW_PASSWORD                       = "New Password";
	const PASSWORD_RESET_TEXT_NEW_PASSWORD_TIP                   = "(At least 1 number and 1 capital letter, between 8 and 18 digits)";
	const PASSWORD_RESET_TEXT_REPEAT_PASSWORD                    = "Repeat new Password";
	const PASSWORD_RESET_TEXT_REPEAT_PASSWORD_TIP                = "(At least 1 number and 1 capital letter, between 8 and 18 digits)";
	const PASSWORD_RESET_TEXT_SEND                               = "CHANGE";
	const PASSWORD_RESET_WARNING                                 = "Password not changed, the typed password is the current one";
	
	/* Body Page Register */
	const REGISTER_EMAIL_ALREADY_REGISTERED                      = "E-mail already registered";
	const REGISTER_EMAIL_ALREADY_SENT                            = "The password was already sent for this e-mail, "
	                                                             . "please wait a moment to sent it again";
	const REGISTER_EMAIL_ERROR                                   = "An error has occurred when trying to send the e-mail";
	const REGISTER_EMAIL_TAG                                     = "InfraTools - Register";
	const REGISTER_EMAIL_TEXT                                    = "click in the link bellow to finish your register.<br/><br/>Link:";
	const REGISTER_INVALID_GENDER                                = "Invalid gender, chose a valid gender from the given list";
	const REGISTER_INVALID_NAME                                  = "Invalid name, type a valid name and sir name";
	const REGISTER_INVALID_NAME_SIZE                             = "Invalid name size";
	const REGISTER_INSERT_ERROR                                  = "Error while trying to register user";

	const REGISTER_SELECT_GENDER_FEMALE                          = "Female";
	const REGISTER_SELECT_GENDER_MALE                            = "Male";
	const REGISTER_SELECT_GENDER_OTHER                           = "Other";
	const REGISTER_SUCCESS                                       = "Registration successfully complete. A link has been sent "
	                                                             . "for your e-mail to activate your account";
	const REGISTER_SUCCESS_NO_LINK                               = "Registration successfully complete";
	const REGISTER_TEXT_BIRTH_DATE                               = "Birth date";
	const REGISTER_TEXT_CAPTCHA                                  = "Type the word";
	const REGISTER_TEXT_GENDER                                   = "Gender";
	const REGISTER_TEXT_NAME                                     = "Name";
	const REGISTER_TEXT_NAME_TIP                                 = "(Name and sir name)";
	const REGISTER_TEXT_NEW_PASSWORD                             = "Password";
	const REGISTER_TEXT_NEW_PASSWORD_TIP                         = "(At least 1 number and 1 capital letter, between 8 and 18 digits)";
	const REGISTER_TEXT_NEW_PASSWORD_TITLE                       = "The password must have at least 1 number and 1 capital letter, "
	                                                             . "having between 8 and 18 characters";
	const REGISTER_TEXT_REPEAT_PASSWORD                          = "Repeat password";
	const REGISTER_TEXT_REPEAT_PASSWORD_TIP                      = "(At least 1 number and 1 capital letter, between 8 and 18 digits)";
	const REGISTER_TEXT_REPEAT_PASSWORD_TITLE                    = "The password must have at least 1 number and 1 capital letter, "
	                                                             . "having   between 8 and 18 characters";
	
	/* Body Page Register Confirmation */
	const REGISTER_CONFIRMATION_ALREADY_CONFIRMED                = "This account is already active";
	const REGISTER_CONFIRMATION_SELECT_ERROR                     = "It was not possible to get an account associated with the provided "
	                                                             .  "code";
	const REGISTER_CONFIRMATION_SUCCESS                          = "Account activated successfully";
	const REGISTER_CONFIRMATION_UPDATE_ERROR                     = "Error trying to activate account";
	const REGISTER_CONFIRMATION_WARNING                          = "Was not necessary to activate this account";
	
	/* Body Page Resend Confirmation Link */
	const RESEND_CONFIRMATION_EMAIL_TAG                          = "InfraTools - Resend Confirmation Link";
	const RESEND_CONFIRMATION_EMAIL_TEXT                         = "click in the link bellow to finish your register.<br/><br/>Link:";
	const RESEND_CONFIRMATION_LINK_ERROR                         = "An error has occurred, please try again or contact us";
	const RESEND_CONFIRMATION_LINK_SUCCESS                       = "Confirmation link resent successfully";
	
	/* Footer */
	const FOOTER_TEXT                                            = "The Infratools System is a technology from the organization";
	
	/* Function: Check Availability */
	const CHECK_AVAILABILITY_FREE                                = "Domain is free";
	const CHECK_AVAILABILITY_TAKEN                               = "Domain already taken";
	
	/* Function: Check Blacklist */
	const CHECK_BLACKLIST_HOST_NOT_LISTED                        = "Domain [0] is not on the following black lists: uceprotect, dronebl, "
	                                                             . "sorbs, spamhaus, aupads, barracudacentral, unsubscore, abuseat";
	const CHECK_BLACKLIST_HOST_LISTED                            = "Domain [0] is black listed<br>";
	const CHECK_BLACKLIST_HOST_FAILED_TO_GET_IP                  = "Failed to get any ip address associated to this domain";
	const CHECK_BLACKLIST_IP_ADDRESS_NOT_LISTED                  = "Ip address [0] is not on the following black lists: uceprotect, "
                                                                 . "dronebl, sorbs, spamhaus, aupads, barracudacentral, unsubscore, "
		                                                         . "abuseat";
	const CHECK_BLACKLIST_IP_ADDRESS_LISTED                      = "Ip address [0] is black listed<br>";
	const CHECK_BLACKLIST_ON_LIST                                = "Is on the black list: [0]<br>";
	
	/* Function: Check DNS Record */
	const CHECK_DNS_HAS_RECORD_TYPE                              = "Domain [0] has dns record type [1]";
	const CHECK_DNS_HAS_NO_RECORD_TYPE                           = "Domain [0] does not have the record [1]";
	
	/* Function: Check Email Exists */
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_EXISTS                   = "Domain does not exist or the e-mail[0] does not exist";
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_AVAILABLE                = "Domain for the e-mail address [0] not available";
	const CHECK_EMAIL_EXISTS_FAILED                              = "E-mail address [0] does not exists";
	const CHECK_EMAIL_EXISTS_SUCCESS                             = "E-mail address [0] exists";
	
	/* Function: Check Ip Address is in network */
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_FAILED                  = "Ip address [0] is not on network [1]";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_SUCCESS                 = "Ip address [0] is on network [1]";
	
	/* Function: Check Ping Server */
	const CHECK_PING_SERVER_HOST_FAILED                          = "Error while trying to ping for the domain [0]";
	const CHECK_PING_SERVER_IP_ADDRESS_FAILED                    = "Error while trying to ping for the ip address [0]";
	
	/* Function: Check Port Status */
	const CHECK_PORT_STATUS_HOST_BLOCKED                         = "Port [0] is closed for the host [1]";
	const CHECK_PORT_STATUS_HOST_DISALLOWED                      = "Host [1] disallowed connection socket on port [0]";
	const CHECK_PORT_STATUS_HOST_FAILED                          = "Failed to check the port [0] for the host [1]";
	const CHECK_PORT_STATUS_HOST_OPENED                          = "Port [0] is open for the host [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_FAILED                    = "Failed to check port [0] for the ip address [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_BLOCKED                   = "Port [0] is closed for the ip address";
	const CHECK_PORT_STATUS_IP_ADDRESS_OPENED                    = "Port [0] is open for the ip address [1]";
	const CHECK_PORT_STATUS_TIMEOUT                              = "Time out";
	
	/* Function: Check Web Site Exists*/
	const CHECK_WEBSITE_EXISTS_FAILED                            = "Website [0] does not exists or a problem has ocurred";
	const CHECK_WEBSITE_EXISTS_SUCCESS                           = "Website [0] exists";
	
	/* Function: Get Browser Client */
	const GET_BROWSER_CLIENT_FAILED                              = "Unknown browser";
	const GET_BROWSER_CLIENT_SUCCESS                             = "Your browser: [0]";
		
	/* Function: Get Calculation NetMask */
	const GET_CALCULATION_NETMASK_IP_ADDRESS                     = "Ip address: [0]<br>";
	const GET_CALCULATION_NETMASK_MASK                           = "Mask: [0]<br>";
	const GET_CALCULATION_NETMASK_SUB_NETWORK                    = "Network address: [0]<br>";
	const GET_CALCULATION_NETMASK_BROADCAST                      = "Broadcast address: [0]<br>";
	const GET_CALCULATION_NETMASK_SUB_MASK                       = "Network mask: [0]<br>";
	const GET_CALCULATION_NETMASK_AVAILABLE_IP_ADDRESSES         = "Available ip addresses: [0]<br>";
	
	/* Function: Get Dns Records */
	const GET_DNS_MX_RECORDS_FAILED                              = "Error when trying to get the mx records for the domain [0]";
	const GET_DNS_RECORDS_FAILED                                 = "Error when trying to get the dns records for the domain [0]";
	
	/* Function: Get Hostname */
	const GET_HOSTNAME_FAILED                                    = "Failed to get hostname for the ip address [0]";
	const GET_HOSTNAME_SUCCESS                                   = "The hostname for the ip address [0] is [1]";
	
	/* Function: Get Ip Address Client */
	const GET_IP_ADDRESS_CLIENT_FAILED                           = "Unknown client ip address";
	const GET_IP_ADDRESS_CLIENT_SUCCESS                          = "Your ip address: [0]";
	
	/* Function: Get Ip Addresses */
	const GET_IP_ADDRESSES_FAILED                                = "Failed to get the ip addresses for the hostname [0]";
	const GET_IP_ADDRESSES_SUCCESS                               = "Ip Addresses: [0]<br>";
	
	/* Function: Get Location */
	const GET_LOCATION_FAILED                                    = "Failed to get location for the ip address [0]";
	const GET_LOCATION_FAILED_GET_CONTENTS                       = "Failed to get contents from the external address";
	
	/* Function: Get Operational System */
	const GET_OPERATIONAL_SYSTEM_FAILED                          = "Unknown operational system";
	const GET_OPERATIONAL_SYSTEM_SUCCESS                         = "Operational system: [0]";
	
	/* Function: Get Protocol */
	const GET_PROTOCOL_FAILED                                    = "Failed to get protocol for the number [0]";
	const GET_PROTOCOL_SUCCESS                                   = "Protocol for the number [0] is [1]";
	
	/* Function: Get Route */
	const GET_ROUTE_FAILED                                       = "Failed to get route for the ip address [0]";
	const GET_ROUTE_SUCCESS                                      = "Tracing route from our system to the ip address [0]<br><br>";
	
	/* Function: Get Service */
	const GET_SERVICE_FAILED                                     = "Failed to get the service for the port [0] and the protocol [1]";
	const GET_SERVICE_SUCCESS                                    = "For the port [0] and the protocol [1] the default service is [2]";
	
	/* Function: Get WebSite */
	const GET_WEBSITE_CONTENT_FAILED                             = "Failed to get the content for the website [0]";
	const GET_WEBSITE_CONTENT_SUCCESS                            = "Web site content [0]<br><br>";
	const GET_WEBSITE_HEADER_FAILED                              = "Failed to get the header for the website [0]";
	const GET_WEBSITE_HEADER_SUCCESS                             = "Web site header [0]<br><br>";
	
	/* Function: Get Whois */
	const GET_WHOIS_FAILED                                       = "Failed to get address information [0]";
	const GET_WHOIS_SUCCESS                                      = "Information for the address [0] is:<br><br>[1]";
	
	public function GetText($Constant)
	{
		$text = constant("En::$Constant");
		if($text != NULL) return $text;
		else echo "CONSTANT: " . $Constant . "<br>";
	}
}