<?php

/************************************************************************
Class: En
Creation: 2015/03/17
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class for English language
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
	const ACTIVE                                                    = "Active";
	const ACTIVATED                                                 = "Activated";
	const ACCOUNT_UPDT_ERROR                                        = "Error updating information";
	const ACCOUNT_UPDT_SUCCESS                                      = "Account updated succesfully";
	const ADMIN_TEXT_CORPORATION                                    = "Corporation Management";
	const ADMIN_TEXT_COUNTRY                                        = "Select countries";
	const ADMIN_TEXT_DEPARTMENT                                     = "Departments Management";
	const ADMIN_TEXT_INSTALL                                        = "Page for instalation, importation, and reinstalation of the system";
	const ADMIN_TEXT_IP_ADDRESS                                     = "Ip Address Management";
	const ADMIN_TEXT_NOTIFICATION                                   = "Notification Management";
	const ADMIN_TEXT_ROLE                                           = "User's Role Management";
	const ADMIN_TEXT_SERVICE                                        = "Service Management";
	const ADMIN_TEXT_SYSTEM_CONFIGURATION                           = "System Configuration Management";
	const ADMIN_TEXT_TEAM                                           = "Team Management";
	const ADMIN_TEXT_TECH_INFO                                      = "View technical details about InfraTools"; 
	const ADMIN_TEXT_TICKET                                         = "Ticket Management";
	const ADMIN_TEXT_TYPE_ASSOC_USER_TEAM                           = "Team Association Type Management";
	const ADMIN_TEXT_TYPE_SERVICE                                   = "Service Type Management";
	const ADMIN_TEXT_TYPE_STATUS_TICKET                             = "Ticket Status Type Management";
	const ADMIN_TEXT_TYPE_TICKET                                    = "Ticket Types Management";
	const ADMIN_TEXT_TYPE_USER                                      = "User Type Management";
	const ADMIN_TEXT_USER                                           = "User Management";
	const ASSOC_IP_ADDRESS_SERVICE_NOT_FOUND                        = "Association between ip address and service was not found";
	const ASSOC_USER_CORPORATION_UPDT_ERROR                         = "Error updating corporation information";
	const ASSOC_USER_CORPORATION_UPDT_SUCCESS                       = "Corporation information updated succesfully";
	const ASSOC_USER_NOTIFICATION_DELETE_ERROR                      = "Association between user and notification delete error";
	const ASSOC_USER_NOTIFICATION_DELETE_SUCCESS                    = "Association between user and notification delete succesfully";
	const ASSOC_USER_NOTIFICATION_INSERT_ERROR                      = "Association between user and notification insert error";
	const ASSOC_USER_NOTIFICATION_INSERT_SUCCESS                    = "Association between user and notification insert succesfully";
	const ASSOC_USER_NOTIFICATION_UPDT_ERROR                        = "Association between user and notification update error";
	const ASSOC_USER_NOTIFICATION_UPDT_SUCCESS                      = "Association between user and notification updated succesfully";
	const CHECK_AVAILABILITY_FREE                                   = "Domain is free";
	const CHECK_AVAILABILITY_TAKEN                                  = "Domain already taken";
	const CHECK_BLACKLIST_HOST_NOT_LSTED                            = "Domain [0] is not on the following black lists: uceprotect, dronebl, "
	                                                                . "sorbs, spamhaus, aupads, barracudacentral, unsubscore, abuseat";
	const CHECK_BLACKLIST_HOST_LSTED                                = "Domain [0] is black listed<br>";
	const CHECK_BLACKLIST_HOST_FAILED_TO_GET_IP                     = "Failed to get any ip address associated to this domain";
	const CHECK_BLACKLIST_IP_ADDRESS_NOT_LSTED                      = "Ip address [0] is not on the following black lists: uceprotect, "
                                                                    . "dronebl, sorbs, spamhaus, aupads, barracudacentral, unsubscore, "
		                                                            . "abuseat";
	const CHECK_BLACKLIST_IP_ADDRESS_LSTED                          = "Ip address [0] is black listed<br>";
	const CHECK_BLACKLIST_ON_LST                                    = "Is on the black list: [0]<br>";
	const CHECK_DNS_HAS_RECORD_TYPE                                 = "Domain [0] has dns record type [1]";
	const CHECK_DNS_HAS_NO_RECORD_TYPE                              = "Domain [0] does not have the record [1]";
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_EXISTS                      = "Domain does not exist or the e-mail[0] does not exist";
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_AVAILABLE                   = "Domain for the e-mail address [0] not available";
	const CHECK_EMAIL_EXISTS_FAILED                                 = "E-mail address [0] does not exists";
	const CHECK_EMAIL_EXISTS_SUCCESS                                = "E-mail address [0] exists";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_FAILED                     = "Ip address [0] is not on network [1]";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_SUCCESS                    = "Ip address [0] is on network [1]";
	const CHECK_PING_SERVER_HOST_FAILED                             = "Error while trying to ping for the domain [0]";
	const CHECK_PING_SERVER_IP_ADDRESS_FAILED                       = "Error while trying to ping for the ip address [0]";
	const CHECK_PORT_STATUS_HOST_BLOCKED                            = "Port [0] is closed for the host [1]";
	const CHECK_PORT_STATUS_HOST_DISALLOWED                         = "Host [1] disallowed connection socket on port [0]";
	const CHECK_PORT_STATUS_HOST_FAILED                             = "Failed to check the port [0] for the host [1]";
	const CHECK_PORT_STATUS_HOST_OPENED                             = "Port [0] is open for the host [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_FAILED                       = "Failed to check port [0] for the ip address [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_BLOCKED                      = "Port [0] is closed for the ip address";
	const CHECK_PORT_STATUS_IP_ADDRESS_OPENED                       = "Port [0] is open for the ip address [1]";
	const CHECK_PORT_STATUS_TIMEOUT                                 = "Time out";
	const CHECK_WEBSITE_EXISTS_FAILED                               = "Website [0] does not exists or a problem has ocurred";
	const CHECK_WEBSITE_EXISTS_SUCCESS                              = "Website [0] exists";
	const CORPORATION_DEL_ERROR                                     = "Error deleting corporation";
	const CORPORATION_DEL_ERROR_DEPENDENCY_DEPARTMENT               = "Corporation has departments associated, delete them first";
	const CORPORATION_DEL_SUCCESS                                   = "Corporation deleted succesfully";
	const CORPORATION_INSERT_ERROR                                  = "Error while trying to register corporation";
	const CORPORATION_INSERT_SUCCESS                                = "Corporation registered succesfully";
	const CORPORATION_NOT_FOUND                                     = "Corporation not found";
	const CORPORATION_UPDT_ERROR                                    = "Error updating corporation";
	const CORPORATION_UPDT_ERROR_UNIQUE_EXISTS                      = "A corporation with the same name exists";
	const CORPORATION_UPDT_SUCCESS                                  = "Corporation updated successfully";
	const CORPORATION_SEL_ON_USER_SERVICE_CONTEXT_SUCCESS           = "Corporations obtained successfully";
	const CORPORATION_SEL_ON_USER_SERVICE_CONTEXT_ERROR             = "Error obtaing corporations";
	const COUNTRY_NOT_FOUND                                         = "Country not found";
	const DATABASE                                                  = "Database";
	const DATABASE_ROW_COUNT                                        = "Total ammount of Rows";
	const DATABASE_TB_QUANTITY                                      = "Tables quantity";
	const DEACTIVATED                                               = "Deactivated";
	const DEFAULT_VALUE                                             = "Please fill the necessary fields";
	const DEPARTMENT_DEL_ERROR                                      = "Error deleting department";
	const DEPARTMENT_DEL_ERROR_DEPENDENCY_USERS                     = "Department has users associated, remove them first";
	const DEPARTMENT_DEL_SUCCESS                                    = "Department deleted succesfully";
	const DEPARTMENT_INSERT_ERROR                                   = "Error while trying to register department";
	const DEPARTMENT_INSERT_ERROR_DEPARTMENT_EXISTS                 = "Department already exists for that corporation";
	const DEPARTMENT_INSERT_ERROR_NO_CORPORATION                    = "A department must be associated with a corporation";
	const DEPARTMENT_INSERT_SUCCESS                                 = "Department registered succesfully";
	const DEPARTMENT_NOT_FOUND                                      = "Department not found";
	const DEPARTMENT_SEL_ON_USER_SERVICE_CONTEXT_SUCCESS            = "Departments obtained successfully";
	const DEPARTMENT_SEL_ON_USER_SERVICE_CONTEXT_ERROR              = "Error obtaineg departments";
	const DEPARTMENT_UPDT_ERROR                                     = "Error updating department";
	const DEPARTMENT_UPDT_SUCCESS                                   = "Department updated succesfully";
	const FILL_REQUIRED_FIELDS                                      = "Please fill the necessary fields";
	const FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE            = "Registration date";
	const FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID              = "Registration ID";
	const FIELD_ASSOC_USER_NOTIFICATION_READ                        = "Notification read";
	const FIELD_CORPORATION_ACTIVE                                  = "Active";
	const FIELD_CORPORATION_NAME                                    = "Corporation name";
	const FIELD_COUNTRY_ABBREVIATION                                = "Country Initials";
	const FIELD_COUNTRY_NAME                                        = "Country";
	const FIELD_REGION_CODE                                         = "Region Code";
	const FIELD_DEPARTMENT_INITIALS                                 = "Department Initials";
	const FIELD_DEPARTMENT_NAME                                     = "Department name";
	const FIELD_IP_ADDRESS_DESCRIPTION                              = "Description";
	const FIELD_IP_ADDRESS_IPV4                                     = "Ipv4";
	const FIELD_IP_ADDRESS_IPV6                                     = "Ipv6";
	const FIELD_EDIT                                                = "Edit";
	const FIELD_LOGIN                                               = "Login (E-mail or Unique ID)";
	const FIELD_NETWORK_IP                                          = "Network Ip";
	const FIELD_NETWORK_NAME                                        = "Network Name";
	const FIELD_NETWORK_NETMASK                                     = "Network Netmask";
	const FIELD_NOTIFICATION_ACTIVE                                 = "Active";
	const FIELD_NOTIFICATION_ASSOCIATE_BY_CORPORATION               = "Associate by Corporation";
	const FIELD_NOTIFICATION_ASSOCIATE_BY_DEPARTMENT                = "Associate by Department";
	const FIELD_NOTIFICATION_ASSOCIATE_BY_ROLE                      = "Associate by Role";
	const FIELD_NOTIFICATION_ASSOCIATE_BY_TEAM                      = "Associate by Team";
	const FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL                      = "Associate for all or none";
	const FIELD_NOTIFICATION_ASSOCIATE_FOR_ALL_VALUE_ALL            = "All";
	const FIELD_NOTIFICATION_ID                                     = "Id";
	const FIELD_NOTIFICATION_TEXT                                   = "Text";
	const FIELD_ROLE_DESCRIPTION                                    = "Description";
	const FIELD_RADIO_DEPARTMENT_INITIALS_AND_CORPORATION_NAME      = "Department initials and corporation name";
	const FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME          = "Department name and corporation name";
	const FIELD_SEL_NONE                                            = "Select";
	const FIELD_SERVICE_ACTIVE                                      = "Active";
	const FIELD_SERVICE_CORPORATION_CAN_CHANGE                      = "Corporation can change?";
	const FIELD_SERVICE_DEPARTMENT_CAN_CHANGE                       = "Department can change?";
	const FIELD_SERVICE_DESCRIPTION                                 = "Description";
	const FIELD_SERVICE_ID                                          = "Id";
	const FIELD_SERVICE_NAME                                        = "Name";
	const FIELD_SERVICE_TYPE                                        = "Type";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE                  = "Active";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION             = "Description";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_NAME                    = "Name";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER                  = "Number";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE                   = "Value";
	const FIELD_TEAM_DESCRIPTION                                    = "Team description";
	const FIELD_TYPE_STATUS_TICKET_DESCRIPTION                      = "Description";
	const FIELD_TYPE_STATUS_TICKET_ID                               = "Id";
	const FIELD_TYPE_TICKET_DESCRIPTION                             = "Description";
	const FIELD_TEAM_ID                                             = "Team id";
	const FIELD_TEAM_NAME                                           = "Team name";
	const FIELD_TICKET_DESCRIPTION                                  = "Ticket Description";
	const FIELD_TICKET_ID                                           = "Ticket Id";
	const FIELD_TICKET_SERVICE                                      = "Service";
	const FIELD_TICKET_STATUS                                       = "Ticket State";
	const FIELD_TICKET_SUGGESTION                                   = "Suggestion";
	const FIELD_TICKET_TITLE                                        = "Title";
	const FIELD_TICKET_TYPE                                         = "Ticket Type";
	const FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION                    = "Description";
	const FIELD_TYPE_SERVICE_NAME                                   = "Type service";
	const FIELD_TYPE_USER_DESCRIPTION                               = "Description";
	const FIELD_USER_ACTIVE                                         = "Account active";
	const FIELD_USER_BIRTH_DATE                                     = "Birth date";
	const FIELD_USER_BIRTH_DATE_DAY                                 = "Day";
	const FIELD_USER_BIRTH_DATE_MONTH                               = "Month";
	const FIELD_USER_BIRTH_DATE_YEAR                                = "Year";
	const FIELD_USER_CONFIRMED                                      = "Account confirmed";
	const FIELD_USER_EMAIL                                          = "E-mail";
	const FIELD_USER_GENDER                                         = "Gender";
	const FIELD_USER_GENDER_FEMALE                                  = "Female";
	const FIELD_USER_GENDER_MALE                                    = "Male";
	const FIELD_USER_GENDER_OTHER                                   = "Other";
	const FIELD_USER_NAME                                           = "Name";
	const FIELD_USER_NAME_TIP                                       = "(Name and surname)";
	const FIELD_USER_PASSWORD                                       = "Password";
	const FIELD_USER_PASSWORD_NEW                                   = "New Password";
	const FIELD_USER_PASSWORD_REPEAT                                = "Repeat Password";
	const FIELD_USER_PASSWORD_TIP                                   = "(At least 1 number and 1 capital letter, between 8 and 18 digits)";
	const FIELD_USER_PASSWORD_TITLE                                 = "The password must have at least 1 number and 1 capital letter, and be "
		                                                            . "between 8 and 18 digits";
	const FIELD_USER_PHONE_PRIMARY                                  = "Phone Primary";
	const FIELD_USER_PHONE_SECONDARY                                = "Phone Secondary";
	const FIELD_USER_REGION                                         = "Location";
	const FIELD_USER_SESSION_EXPIRES                                = "Session Expires";
	const FIELD_USER_TYPE                                           = "Type";
	const FIELD_USER_TWO_STEP_VERIFICATION                          = "Two step verification";
	const FIELD_USER_UNIQUE_ID                                      = "Unique ID";
	const FM_INVALID_ASSOC_USER_NOTIFICATION_READ                   = "Invalid value for field read";
	const FM_INVALID_CAPTCHA                                        = "The captcha value does not match";
	const FM_INVALID_CORPORATION_NAME                               = "Invalid Corporation Name";
	const FM_INVALID_CORPORATION_NAME_SIZE                          = "Quantity of characters exceeds the maximum allowed for "
	                                                                . "corporation name";
	const FM_INVALID_COUNTRY                                        = "Invalid country, use the Google Maps";
	const FM_INVALID_DATE_DAY                                       = "Invalid day";
	const FM_INVALID_DATE_MONTH                                     = "Invalid month";
	const FM_INVALID_DATE_YEAR                                      = "Invalid year";
	const FM_INVALID_DEPARTMENT_INITIALS                            = "Invalid department initials";
	const FM_INVALID_DEPARTMENT_INITIALS_SIZE                       = "Quantity of characters exceeds the maximum allowed for "
	                                                                . "department initials";
	const FM_INVALID_DEPARTMENT_NAME                                = "Invalid department name";
	const FM_INVALID_DEPARTMENT_NAME_SIZE                           = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "department name" ;
	const FM_INVALID_DESCRIPTION                                    = "Invalid description";
	const FM_INVALID_HOSTNAME                                       = "Invalid domain";
	const FM_INVALID_IP_ADDRESS_DESCRIPTION                         = "Invalid value for ip address description";
	const FM_INVALID_IP_ADDRESS_DESCRIPTION_SIZE                    = "Quantity of characters exceeds the maximum allowed for "
	                                                                . "ip address description";
	const FM_INVALID_IP_ADDRESS_IPV4                                = "Invalid value for ipv4";
	const FM_INVALID_IP_ADDRESS_IPV6                                = "Invalid value for ipv6";
	const FM_INVALID_NETWORK_IP                                     = "Invalid value for network ip";
	const FM_INVALID_NETWORK_NAME                                   = "Invalid value for network name";
	const FM_INVALID_NETWORK_NAME_SIZE                              = "Quantity of characters exceeds the maximum allowed for "
	                                                                . "network name";
	const FM_INVALID_NETWORK_NETMASK                                = "Invalid value for network netmask";
	const FM_INVALID_NOTIFICATION_ACTIVE                            = "Invalid notification active";
	const FM_INVALID_NOTIFICATION_ID                                = "Invalid notification id";
	const FM_INVALID_NOTIFICATION_TEXT                              = "Invalid notification text";
	const FM_INVALID_NOTIFICATION_TEXT_SIZE                         = "Quantity of characters exceeds the maximum allowed for notification "
	                                                                . "text";
	const FM_INVALID_PORT                                           = "Invalid port";
	const FM_INVALID_PROTOCOL                                       = "Invalid protocol";
	const FM_INVALID_PROTOCOL_NUMBER                                = "Invalid protocol number";
	const FM_INVALID_ROLE_DESCRIPTION                               = "Invalid role description";
	const FM_INVALID_ROLE_DESCRIPTION_SIZE                          = "Quantity of characters exceeds the maximum allowed for role description";
	const FM_INVALID_REGISTRATION_ID                                = "Invalid registration id";
	const FM_INVALID_SERVICE_ACTIVE                                 = "Invalid value for checkbox service active service";
	const FM_INVALID_SERVICE_CORPORATION_CAN_CHANGE                 = "Invalid value for checkbox corporation can change";
	const FM_INVALID_SERVICE_DESCRIPTION                            = "Invalid service description";
	const FM_INVALID_SERVICE_DESCRIPTION_SIZE                       = "Quantity of characters exceeds the maximum allowed for service "
	                                                                . "description";
	const FM_INVALID_SERVICE_DEPARTMENT_CAN_CHANGE                  = "Invalid value for checkbox department can change";
	const FM_INVALID_SERVICE_ID                                     = "Invalid service id";
	const FM_INVALID_SERVICE_NAME                                   = "Invalid service name";
	const FM_INVALID_SERVICE_NAME_SIZE                              = "Quantity of characters exceeds the maximum allowed for service "
	                                                                . "name";
	const FM_INVALID_SERVICE_TYPE                                   = "Invalid service type";
	const FM_INVALID_SERVICE_TYPE_SIZE                              = "Quantity of characters exceeds the maximum allowed for service "
		                                                            . "description";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_ACTIVE             = "Invalid value for checkbox option active service";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION        = "Invalid value for system configuration option description";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION_SIZE   = "Quantity of characters exceeds the maximum allowed for system "
	                                                                . "configuration option description";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME               = "Invalid value for system configuration option name";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME_SIZE          = "Quantity of characters exceeds the maximum allowed for system "
	                                                                . "configuration option name";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE              = "Invalid value for system configuration option value";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE_SIZE         = "Quantity of characters exceeds the maximum allowed for system "
	                                                                . "configuration option value";
	const FM_INVALID_TEAM_DESCRIPTION                               = "Invalid team descritpion";
	const FM_INVALID_TEAM_DESCRIPTION_SIZE                          = "Quantity of characters exceeds the maximum allowed for team "
	                                                                . "description";
	const FM_INVALID_TEAM_ID                                        = "Team id";
	const FM_INVALID_TEAM_NAME                                      = "Invalid team name";
	const FM_INVALID_TEAM_NAME_SIZE                                 = "Quantity of characters exceeds the maximum allowed for team "
		                                                            . "name";
	const FM_INVALID_TICKET_DESCRIPTION                             = "Invalid ticket description";
	const FM_INVALID_TICKET_DESCRIPTION_SIZE                        = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "ticket description";
	const FM_INVALID_TICKET_ID                                      = "Inválid ticket id";
	const FM_INVALID_TICKET_TITLE                                   = "Invalid ticket title";
	const FM_INVALID_TICKET_TITLE_SIZE                              = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "ticket title";
	const FM_INVALID_TICKET_TYPE                                    = "Invalid ticket type";
	const FM_INVALID_TICKET_TYPE_SIZE                               = "Quantity of characters exceeds the maximum allowed for"
  		                                                            . "ticket type";
	const FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION            = "Invalid description for type of association between user "
	                                                                . "and service";
	const FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE       = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "type association description";
	const FM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION               = "Invalid type assoc user team description";
	const FM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION_SIZE          = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "type association user team description";
	const FM_INVALID_TYPE_ASSOC_USER_TEAM_ID                        = "Invalid team id for association between user and team";
	const FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION                 = "Invalid type status ticket description";
	const FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE            = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "type status ticket description";
	const FM_INVALID_TYPE_STATUS_TICKET_ID                          = "Invalid type status ticket id";
	const FM_INVALID_TYPE_TICKET_DESCRIPTION                        = "Invalid type ticket description";
	const FM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE                   = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "type ticket description";
	const FM_INVALID_TYPE_TICKET_ID                                 = "Invalid type ticket id";
	const FM_INVALID_TYPE_USER_DESCRIPTION                          = "Invalid type user description";
	const FM_INVALID_TYPE_USER_DESCRIPTION_SIZE                     = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "type user description";
	const FM_INVALID_TYPE_USER_ID                                   = "Invalid type user id";
	const FM_INVALID_USER_BIRTH_DATE_DAY                            = "Invalid day of birth";
	const FM_INVALID_USER_BIRTH_DATE_MONTH                          = "Invalid month of birth";
	const FM_INVALID_USER_BIRTH_DATE_YEAR                           = "Invalid year of birth";
	const FM_INVALID_USER_CONFIRMED                                 = "Invalid value for user confirmed";
	const FM_INVALID_USER_EMAIL                                     = "Invalid user e-mail";
	const FM_INVALID_USER_EMAIL_SIZE                                = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "user e-mail";
	const FM_INVALID_USER_GENDER                                    = "Invalid gender";
	const FM_INVALID_USER_NAME                                      = "Invalid user name";
	const FM_INVALID_USER_NAME_SIZE                                 = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "user name";
	const FM_INVALID_USER_PASSWORD                                  = "Password does not match the criteria";
	const FM_INVALID_USER_PASSWORD_MATCH                            = "Passwords does not match";
	const FM_INVALID_USER_PASSWORD_SIZE                             = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "user password";
	const FM_INVALID_USER_PHONE_PREFIX_PRIMARY                      = "Invalid user phone prefix primary";
	const FM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE                 = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "user phone prefix primary";
	const FM_INVALID_USER_PHONE_PREFIX_SECONDARY                    = "Invalid user phone prefix secondary";
	const FM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE               = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "user phone prefix secondary";
	const FM_INVALID_USER_PHONE_PRIMARY                             = "Invalid user phone primary";
	const FM_INVALID_USER_PHONE_PRIMARY_SIZE                        = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "user phone primary";
	const FM_INVALID_USER_PHONE_SECONDARY                           = "Invalid user phone secondary";
	const FM_INVALID_USER_PHONE_SECONDARY_SIZE                      = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "user phone secondary";
	const FM_INVALID_USER_REGION                                    = "Invalid user region";
	const FM_INVALID_USER_REGION_SIZE                               = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "user region";
	const FM_INVALID_USER_UNIQUE_ID                                 = "Invalid user unique id";
	const FM_INVALID_USER_UNIQUE_ID_SIZE                            = "Quantity of characters exceeds the maximum allowed for "
		                                                            . "user unique id";
	const FM_INVALID_WEBSITE                                        = "Invalid website";
	const FM_SEL_DEFAULT                                            = "Select";             
	const FM_SB_RESET_PASSWORD_EMAIL_TAG                            = "InfraTools - Your password has been reseted";
	const FM_SB_RESET_PASSWORD_EMAIL_TEXT                           = "Your password was reset and your new password is: ";
	const GET_BROWSER_CLIENT_ERROR                                  = "Unknown browser";
	const GET_BROWSER_CLIENT_SUCCESS                                = "Your browser: [0]";
	const GET_CALCULATION_NETMASK_IP_ADDRESS                        = "Ip address: [0]<br>";
	const GET_CALCULATION_NETMASK_MASK                              = "Mask: [0]<br>";
	const GET_CALCULATION_NETMASK_SUB_NETWORK                       = "Network address: [0]<br>";
	const GET_CALCULATION_NETMASK_BROADCAST                         = "Broadcast address: [0]<br>";
	const GET_CALCULATION_NETMASK_SUB_MASK                          = "Network mask: [0]<br>";
	const GET_CALCULATION_NETMASK_AVAILABLE_IP_ADDRESSES            = "Available ip addresses: [0]<br>";
	const GET_DNS_MX_RECORDS_ERROR                                  = "Error when trying to get the mx records for the domain [0]";
	const GET_DNS_RECORDS_ERROR                                     = "Error when trying to get the dns records for the domain [0]";
	const GET_HOSTNAME_ERROR                                        = "Failed to get hostname for the ip address [0]";
	const GET_HOSTNAME_SUCCESS                                      = "The hostname for the ip address [0] is [1]";
	const GET_IP_ADDRESS_CLIENT_ERROR                               = "Unknown client ip address";
    const GET_IP_ADDRESS_CLIENT_SUCCESS                             = "Your ip address: [0]";
	const GET_IP_ADDRESSES_ERROR                                    = "Failed to get the ip addresses for the hostname [0]";
	const GET_IP_ADDRESSES_SUCCESS                                  = "Ip Addresses: [0]<br>";
	const GET_LOCATION_ERROR                                        = "Failed to get location for the ip address [0]";
	const GET_LOCATION_ERROR_GET_CONTENTS                           = "Failed to get contents from the external address";
	const GET_OPERATIONAL_SYSTEM_ERROR                              = "Unknown operational system";
	const GET_OPERATIONAL_SYSTEM_SUCCESS                            = "Operational system: [0]";
	const GET_PROTOCOL_ERROR                                        = "Failed to get protocol for the number [0]";
	const GET_PROTOCOL_SUCCESS                                      = "Protocol for the number [0] is [1]";
	const GET_ROUTE_ERROR                                           = "Failed to get route for the ip address [0]";
	const GET_ROUTE_SUCCESS                                         = "Tracing route from our system to the ip address [0]<br><br>";
	const GET_SERVICE_ERROR                                         = "Failed to get the service for the port [0] and the protocol [1]";
	const GET_SERVICE_SUCCESS                                       = "For the port [0] and the protocol [1] the default service is [2]";
	const GET_WEBSITE_CONTENT_ERROR                                 = "Failed to get the content for the website [0]";
	const GET_WEBSITE_CONTENT_SUCCESS                               = "Web site content [0]<br><br>";
	const GET_WEBSITE_HEADER_ERROR                                  = "Failed to get the header for the website [0]";
	const GET_WEBSITE_HEADER_SUCCESS                                = "Web site header [0]<br><br>";
	const GET_WHOIS_ERROR                                           = "Failed to get address information [0]";
	const GET_WHOIS_SUCCESS                                         = "Information for the address [0] is:<br><br>[1]";
	const HEADER_CHANGE_LAYOUT                                      = "Request [0] Layout:";
	const HEADER_DEBUG                                              = "Debug:";
	const HEADER_PAGE_ABOUT_TITLE                                   = "About";
	const HEADER_PAGE_ABOUT_TEXT                                    = "ABOUT";
	const HEADER_PAGE_ACCOUNT_TITLE                                 = "My Account";
	const HEADER_PAGE_ACCOUNT_TEXT                                  = "My Account";
	const HEADER_PAGE_ADMIN_TITLE                                   = "Admin";
	const HEADER_PAGE_ADMIN_TEXT                                    = "ADMIN";
	const HEADER_PAGE_CHECK_TITLE                                   = "Checking Functions";
	const HEADER_PAGE_CHECK_TEXT                                    = "CHECKING FUNCTIONS";
	const HEADER_PAGE_CONTACT_TITLE                                 = "Contact";
	const HEADER_PAGE_CONTACT_TEXT                                  = "CONTACT";
	const HEADER_PAGE_CORPORATION_TITLE                             = "My corporation";
	const HEADER_PAGE_CORPORATION_TEXT                              = "My corporation";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TITLE                        = "Diagnostic Tools";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TEXT                         = "DIAGNOSTIC TOOLS";
	const HEADER_PAGE_GET_TITLE                                     = "Obtaining Functions";
	const HEADER_PAGE_GET_TEXT                                      = "OBTAINING FUNCTIONS";
	const HEADER_PAGE_HOME_TITLE                                    = "InfraTools";
	const HEADER_PAGE_HOME_IMAGE_ALT                                = "InfraTools";
	const HEADER_PAGE_LOGIN_TITLE                                   = "Login";
	const HEADER_PAGE_LOGIN_TEXT                                    = "Login";
	const HEADER_PAGE_LOGOUT                                        = "Log out";
	const HEADER_PAGE_NOTIFICATION_TITLE                            = "Notification";
	const HEADER_PAGE_NOTIFICATION_TEXT                             = "NOTIFICATION";
	const HEADER_PAGE_REGISTER_TITLE                                = "Register";
	const HEADER_PAGE_REGISTER_TEXT                                 = "Register";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TITLE                = "Resend Confirmation Link";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TEXT                 = "here";
	const HEADER_PAGE_SERVICE_TITLE                                 = "Service";
	const HEADER_PAGE_SERVICE_TEXT                                  = "SERVICE";
	const HEADER_PAGE_SERVICE_ASSOCIATE_IP_ADDRESS_TITLE            = "Association of Services and Ip Addresses";
	const HEADER_PAGE_SERVICE_ASSOCIATE_IP_ADDRESS_TEXT             = "ASSOCIATION OF SERVICES AND IP ADDRESSES";
	const HEADER_PAGE_SERVICE_LST_TITLE                             = "List Services";
	const HEADER_PAGE_SERVICE_LST_TEXT                              = "LIST SERVICES";
	const HEADER_PAGE_SERVICE_LST_BY_CORPORATION_TITLE              = "List Services by Corporation";
	const HEADER_PAGE_SERVICE_LST_BY_CORPORATION_TEXT               = "LIST SERVICES bY CORPORATION";
	const HEADER_PAGE_SERVICE_LST_BY_DEPARTMENT_TITLE               = "List Services by Department";
	const HEADER_PAGE_SERVICE_LST_BY_DEPARTMENT_TEXT                = "LIST SERVICES BY DEPARTMENT";
	const HEADER_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_TITLE  = "List Services by Type of association";
	const HEADER_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_TEXT   = "LIST SERVICES BY TYPE OF ASSOCIATION";
	const HEADER_PAGE_SERVICE_LST_BY_TYPE_SERVICE_TITLE             = "List Services by Type";
	const HEADER_PAGE_SERVICE_LST_BY_TYPE_SERVICE_TEXT              = "LIST SERVICES BY TYPE";
	const HEADER_PAGE_SERVICE_REGISTER_TITLE                        = "Register Service";
	const HEADER_PAGE_SERVICE_REGISTER_TEXT                         = "REGISTER SERVICE";
	const HEADER_PAGE_SERVICE_SEL_TITLE                             = "Select Service";
	const HEADER_PAGE_SERVICE_SEL_TEXT                              = "SELECT SERVICE";
	const HEADER_PAGE_SUPPORT_TITLE                                 = "Requests";
	const HEADER_PAGE_SUPPORT_TEXT                                  = "REQUESTS";
	const HEADER_PAGE_SUPPORT_CONTACT_TITLE                         = "New Request";
	const HEADER_PAGE_SUPPORT_CONTACT_TEXT                          = "NEW REQUESTS";
	const HEADER_PAGE_SUPPORT_LST_TITLE                             = "List Requests";
	const HEADER_PAGE_SUPPORT_LST_TEXT                              = "LIST REQUESTS";
	const HEADER_PAGE_SUPPORT_REGISTER_TITLE                        = "Register Request";
	const HEADER_PAGE_SUPPORT_REGISTER_TEXT                         = "REGISTER REQUEST";
	const HEADER_PAGE_SUPPORT_SEL_TITLE                             = "Select Request";
	const HEADER_PAGE_SUPPORT_SEL_TEXT                              = "SELECT REQUEST";
	const HEADER_PAGE_TEAM_TITLE                                    = "My Teams";
	const HEADER_PAGE_TEAM_TEXT                                     = "My Teams";
	const HEADER_PAGE_TEAM_LST_TITLE                                = "List Teams";
	const HEADER_PAGE_TEAM_LST_TEXT                                 = "LIST TEAMS";
	const HEADER_PAGE_TEAM_REGISTER_TITLE                           = "Register Team";
	const HEADER_PAGE_TEAM_REGISTER_TEXT                            = "REGISTER TEAM";
	const HEADER_PAGE_TEAM_SEL_TITLE                                = "Select Team";
	const HEADER_PAGE_TEAM_SEL_TEXT                                 = "SELECT TEAM";
	const HREF_PAGE_ABOUT                                           = "/En/PageAbout";
	const HREF_PAGE_ACCOUNT                                         = "/En/PageAccount";
	const HREF_PAGE_ADMIN                                           = "/En/PageAdmin";
	const HREF_PAGE_ADMIN_CORPORATION                               = "/En/PageAdminCorporation";
	const HREF_PAGE_ADMIN_COUNTRY                                   = "/En/PageAdminCountry";
	const HREF_PAGE_ADMIN_DEPARTMENT                                = "/En/PageAdminDepartment";
	const HREF_PAGE_ADMIN_IP_ADDRESS                                = "/En/PageAdminIpAddress";
	const HREF_PAGE_ADMIN_NOTIFICATION                              = "/En/PageAdminNotification";
	const HREF_PAGE_ADMIN_ROLE                                      = "/En/PageAdminRole";
	const HREF_PAGE_ADMIN_SERVICE                                   = "/En/PageAdminService";
	const HREF_PAGE_ADMIN_SYSTEM_CONFIGURATION                      = "/En/PageAdminSystemConfiguration";
	const HREF_PAGE_ADMIN_TEAM                                      = "/En/PageAdminTeam";
	const HREF_PAGE_ADMIN_TECH_INFO                                 = "/En/PageAdminTechInfo";
	const HREF_PAGE_ADMIN_TICKET                                    = "/En/PageAdminTicket";
	const HREF_PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                      = "/En/PageAdminTypeAssocUserTeam";
	const HREF_PAGE_ADMIN_TYPE_SERVICE                              = "/En/PageAdminTypeService";
	const HREF_PAGE_ADMIN_TYPE_STATUS_TICKET                        = "/En/PageAdminTypeStatusTicket";
	const HREF_PAGE_ADMIN_TYPE_TICKET                               = "/En/PageAdminTypeTicket";
	const HREF_PAGE_ADMIN_TYPE_USER                                 = "/En/PageAdminTypeUser";
	const HREF_PAGE_ADMIN_USER                                      = "/En/PageAdminUser";
	const HREF_PAGE_CHECK                                           = "/En/PageCheck";   
	const HREF_PAGE_CONTACT                                         = "/En/PageContact";
	const HREF_PAGE_DIAGNOSTIC_TOOLS                                = "/En/PageDiagnosticTools";
	const HREF_PAGE_GET                                             = "/En/PageGet";
	const HREF_PAGE_HOME                                            = "/En/PageHome";
	const HREF_PAGE_INSTALL                                         = "/En/PageInstall";
	const HREF_PAGE_LOGIN                                           = "/En/PageLogin";
	const HREF_PAGE_NOT_FOUND                                       = "/En/PageNotFound";
	const HREF_PAGE_NOTIFICATION                                    = "/En/PageNotification";
	const HREF_PAGE_NOTIFICATION_VIEW                               = "/En/PageNotificationView";
	const HREF_PAGE_PASSWORD_RECOVERY                               = "/En/PagePasswordRecovery";
	const HREF_PAGE_PASSWORD_RESET                                  = "/En/PagePasswordReset";
	const HREF_PAGE_REGISTER                                        = "/En/PageRegister";
	const HREF_PAGE_REGISTER_CONFIRMATION                           = "/En/PageRegisterConfirmation";
	const HREF_PAGE_RESEND_CONFIRMATION_LINK                        = "/En/PageResendConfirmationLink";
	const HREF_PAGE_SERVICE                                         = "/En/PageService";
	const HREF_PAGE_SERVICE_ASSOCIATE_IP_ADDRESS                    = "/En/PageServiceAssociateIpAddress";
	const HREF_PAGE_SERVICE_LST                                     = "/En/PageServiceList";
	const HREF_PAGE_SERVICE_LST_BY_CORPORATION                      = "/En/PageServiceListByCorporation";
	const HREF_PAGE_SERVICE_LST_BY_DEPARTMENT                       = "/En/PageServiceListByDepartment";
	const HREF_PAGE_SERVICE_LST_BY_NAME                             = "/En/PageServiceListByName";
	const HREF_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE          = "/En/PageServiceListByTypeAssocUserService";
	const HREF_PAGE_SERVICE_LST_BY_TYPE_SERVICE                     = "/En/PageServiceListByTypeService";
	const HREF_PAGE_SERVICE_LST_BY_USER                             = "/En/PageServiceListByUser";
	const HREF_PAGE_SERVICE_REGISTER                                = "/En/PageServiceRegister";
	const HREF_PAGE_SERVICE_SEL                                     = "/En/PageServiceSelect";
	const HREF_PAGE_SERVICE_VIEW                                    = "/En/PageServiceView";
	const HREF_PAGE_SUPPORT                                         = "/En/PageSupport";
	const HREF_PAGE_SUPPORT_CONTACT                                 = "/En/PageSupportContact";
	const HREF_PAGE_SUPPORT_LST                                     = "/En/PageSupportList";
	const HREF_PAGE_SUPPORT_REGISTER                                = "/En/PageSupportRegister";
	const HREF_PAGE_SUPPORT_SEL                                     = "/En/PageSupportSelect";
	const HREF_PAGE_SUPPORT_VIEW                                    = "/En/PageSupportView";
	const HREF_PAGE_SUPPORT_UPDT                                    = "/En/PageSupportUpdate";
	const HREF_PAGE_TEAM                                            = "/En/PageTeam";
	const HREF_PAGE_TEAM_LST                                        = "/En/PageTeamList";
	const HREF_PAGE_TEAM_REGISTER                                   = "/En/PageTeamRegister";
	const HREF_PAGE_TEAM_SEL                                        = "/En/PageTeamSelect";
	const HREF_PAGE_TEAM_VIEW                                       = "/En/PageTeamView";
	const INSERT_WARNING_EXISTS                                     = "A similar register was already registered";
	const INSTALL_EXPORT_SUCCESS                                    = "System data exported succesfully";
	const INSTALL_IMPORT_ERROR_FILE_EXTENSION                       = "Invalid valid Extension";
	const INSTALL_IMPORT_ERROR_INSERTS                              = "Error while trying to insert data into the system database";
	const INSTALL_IMPORT_ERROR_FILE_MOVE                            = "File could not be moved to the upload folder";
	const INSTALL_IMPORT_ERROR_FILE_READ                            = "File could not be read";
	const INSTALL_IMPORT_SUCCESS                                    = "Data imported succesfully";
	const INSTALL_REINSTALL_ERROR_USER_PERMISSION                   = "You do not have permission to reinstall the system database";
	const INSTALL_REINSTALL_SUCCESS                                 = "System database reinstalled successfully";
	const INSTALL_ERROR                                             = "It was not possible to install the system database, please check "
		                                                            . "the system configuration file (ProjectConfig.php)";
	const INSTALL_SUCCESS                                           = "System database installed succesfully";
	const INVALID_NETWORK_ADDRESS                                   = "Invalid network address";
	const INVALID_OPTION                                            = "Invalid option";
	const IP_ADDRESS_DEL_ERROR                                      = "Error deleting ip address";
	const IP_ADDRESS_DEL_ERROR_DEPENDENCY_SERVICE                   = "Ip address has services associated, delete them first";
	const IP_ADDRESS_DEL_SUCCESS                                    = "Ip address deleted succesfully";
	const IP_ADDRESS_INSERT_ERROR                                   = "Error while trying to register ip address";
	const IP_ADDRESS_INSERT_SUCCESS                                 = "Ip address registered succesfully";
	const IP_ADDRESS_NOT_FOUND                                      = "Ip address not found";
	const IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4_ERROR                   = "Error trying to obtain ip address with given ipv4";
	const IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4_SUCCESS                 = "Ip Address obtained successfully";
	const IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV6_ERROR                   = "Error trying to obtain ip address with given ipv6";
	const IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV6_SUCCESS                 = "Ip Address obtained successfully";
	const IP_ADDRESS_UPDT_ERROR                                     = "Error updating ip address";
	const IP_ADDRESS_UPDT_ERROR_UNIQUE_EXISTS                       = "A ip address with the same value exists";
	const IP_ADDRESS_UPDT_SUCCESS                                   = "Ip address updated successfully";
	const LANGUAGES                                                 = "Languages";
	const LANGUAGES_CONSTANT_COUNT                                  = "Quantity of constants";
	const LANGUAGES_FILES                                           = "Language files";
	const MAPS_SEARCH                                               = "Search";
	const MAPS_TIP                                                  = "Type your location in the text field or click on the map, "
                                                                    . "the fields above will be filled with your country "
                                                                    . "and a location that can be either a estate or a county.";
	const NETWORK_INSERT_ERROR                                      = "Error while trying to register network";
	const NETWORK_INSERT_SUCCESS                                    = "Network registered succesfully";
	const NETWORK_NOT_FOUND                                         = "Network not found";
	const NETWORK_SEL_BY_NETWORK_NAME_ERROR                         = "Error while trying to obtain network with given network name";
    const NETWORK_SEL_BY_NETWORK_NAME_SUCCESS                       = "Network obtained successfully";	
	const NETWORK_SEL_ERROR                                         = "Error trying to obtain network";
	const NETWORK_SEL_SUCCESS                                       = "Network obtained successfully";
	const NOT_LOGGED_IN                                             = "You must be authenticated to access this page";
	const NOTIFICATION_DEL_ERROR                                    = "Error deleting notification";
	const NOTIFICATION_DEL_SUCCESS                                  = "Notification deleted successfully";
	const NOTIFICATION_INSERT_ERROR                                 = "Error inserting notification";
	const NOTIFICATION_INSERT_SUCCESS                               = "Notification inserted successfully";
	const NOTIFICATION_NOT_FOUND                                    = "System configuration not found";
	const NOTIFICATION_UPDT_ERROR                                   = "Error updating notification";
	const NOTIFICATION_UPDT_SUCCESS                                 = "Notification updated successfully";
	const NULL_EMPTY                                                = "No value associated";
	const NULL_OPTION                                               = "Please select an option";
	const OPERATION_CONTACT                                         = "Contact";
	const OPERATION_LST                                             = "Listing";
	const OPERATION_REGISTER                                        = "Register";
	const OPERATION_SEARCH                                          = "Search";	
	const PAGE_ABOUT                                                = "About";
	const PAGE_ABOUT_ROBOTS                                         = "ALL";
	const PAGE_ABOUT_TITLE                                          = "InfraTools - About";
	const PAGE_ACCOUNT                                              = "My Account";
	const PAGE_ACCOUNT_CHANGE_PASSWORD                              = "My Account - Change Password";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_ROBOTS                       = "noindex";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_TITLE                        = "InfraTools - My Account - Change Password";
	const PAGE_ACCOUNT_ROBOTS                                       = "noindex";
	const PAGE_ACCOUNT_TITLE                                        = "InfraTools - My cccount";
	const PAGE_ACCOUNT_UPDT                                         = "My Account - Update Information";
	const PAGE_ACCOUNT_UPDT_ROBOTS                                  = "noindex";
	const PAGE_ACCOUNT_UPDT_TITLE                                   = "InfraTools - My Account - Update Information";
	const PAGE_ADMIN                                                = "Admin";
	const PAGE_ADMIN_ROBOTS                                         = "noindex";
	const PAGE_ADMIN_TITLE                                          = "InfraTools - Admin";
	const PAGE_ADMIN_CORPORATION                                    = "Admin Corporation";
	const PAGE_ADMIN_CORPORATION_LST                                = "Admin Corporation - List";
	const PAGE_ADMIN_CORPORATION_LST_ROBOTS                         = "noindex";
	const PAGE_ADMIN_CORPORATION_LST_TITLE                          = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_REGISTER                           = "Admin Corporation - Register";
	const PAGE_ADMIN_CORPORATION_REGISTER_ROBOTS                    = "noindex";
	const PAGE_ADMIN_CORPORATION_REGISTER_TITLE                     = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_ROBOTS                             = "noindex";
	const PAGE_ADMIN_CORPORATION_SEL                                = "Admin Corporation - Select";
	const PAGE_ADMIN_CORPORATION_SEL_ROBOTS                         = "noindex";
	const PAGE_ADMIN_CORPORATION_SEL_TITLE                          = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_TITLE                              = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_UPDT                               = "Admin Corporation - Update";
	const PAGE_ADMIN_CORPORATION_UPDT_ROBOTS                        = "noindex";
	const PAGE_ADMIN_CORPORATION_UPDT_TITLE                         = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_VIEW                               = "Admin Corporation - View";
	const PAGE_ADMIN_CORPORATION_VIEW_ROBOTS                        = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_TITLE                         = "InfraTools - Admin Corporation";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS                         = "Admin Corporation - View Users";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_ROBOTS                  = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_TITLE                   = "Admin Corporation - View Users";
	const PAGE_ADMIN_COUNTRY                                        = "Admin Country";
	const PAGE_ADMIN_COUNTRY_LST                                    = "Admin Country - List";
	const PAGE_ADMIN_COUNTRY_LST_ROBOTS                             = "noindex";
	const PAGE_ADMIN_COUNTRY_LST_TITLE                              = "InfraTools - Admin Country"; 
	const PAGE_ADMIN_COUNTRY_ROBOTS                                 = "noindex";
	const PAGE_ADMIN_COUNTRY_TITLE                                  = "InfraTools - Admin Country";
	const PAGE_ADMIN_DEPARTMENT                                     = "Admin Department";
	const PAGE_ADMIN_DEPARTMENT_LST                                 = "Admin Department - List";
	const PAGE_ADMIN_DEPARTMENT_LST_ROBOTS                          = "noindex";
	const PAGE_ADMIN_DEPARTMENT_LST_TITLE                           = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_REGISTER                            = "Admin Department - Register";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_ROBOTS                     = "noindex";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_TITLE                      = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_ROBOTS                              = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SEL                                 = "Admin Department - Select";
	const PAGE_ADMIN_DEPARTMENT_SEL_ROBOTS                          = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SEL_TITLE                           = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_TITLE                               = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_UPDT                                = "Admin Department - Update";
	const PAGE_ADMIN_DEPARTMENT_UPDT_ROBOTS                         = "noindex";
	const PAGE_ADMIN_DEPARTMENT_UPDT_TITLE                          = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_VIEW                                = "Admin Department - View";
	const PAGE_ADMIN_DEPARTMENT_VIEW_ROBOTS                         = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_TITLE                          = "InfraTools - Admin Department";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS                          = "Admin Department - View Users";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_ROBOTS                   = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_TITLE                    = "InfraTools - Admin Department";
	const PAGE_ADMIN_IP_ADDRESS                                     = "Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_LST                                 = "Admin Ip Address - List";
	const PAGE_ADMIN_IP_ADDRESS_LST_BY_IP_ADDRESS                   = "Admin Ip Address - List By Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_LST_BY_IP_ADDRESS_ROBOTS            = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_LST_BY_IP_ADDRESS_TITLE             = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_LST_BY_NETWORK                      = "Admin Ip Address - List By Network";
	const PAGE_ADMIN_IP_ADDRESS_LST_BY_NETWORK_ROBOTS               = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_LST_BY_NETWORK_TITLE                = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_LST_ROBOTS                          = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_LST_TITLE                           = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_REGISTER                            = "Admin Ip Address - Register";
	const PAGE_ADMIN_IP_ADDRESS_REGISTER_ROBOTS                     = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_REGISTER_TITLE                      = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_ROBOTS                              = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_SEL                                 = "Admin Ip Address - Select";
	const PAGE_ADMIN_IP_ADDRESS_SEL_ROBOTS                          = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_SEL_TITLE                           = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_TITLE                               = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_UPDT_IP_ADDRESS                     = "Admin Ip Address - Update Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_UPDT_IP_ADDRESS_ROBOTS              = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_UPDT_IP_ADDRESS_TITLE               = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_UPDT_NETWORK                        = "Admin Ip Address - Update Network";
	const PAGE_ADMIN_IP_ADDRESS_UPDT_NETWORK_ROBOTS                 = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_UPDT_NETWORK_TITLE                  = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_IP_ADDRESS                     = "Admin Ip Address - View Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_IP_ADDRESS_ROBOTS              = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_IP_ADDRESS_TITLE               = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_NETWORK                        = "Admin Ip Address - View Network";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_NETWORK_ROBOTS                 = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_NETWORK_TITLE                  = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_USERS                          = "Admin Ip Address - View Users";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_USERS_ROBOTS                   = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_USERS_TITLE                    = "InfraTools - Admin Ip Address";
	const PAGE_ADMIN_NOTIFICATION                                   = "Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_ASSOCIATE_USER                    = "Admin Notification - Associate Users";
	const PAGE_ADMIN_NOTIFICATION_ASSOCIATE_USER_ROBOTS             = "noindex";
	const PAGE_ADMIN_NOTIFICATION_ASSOCIATE_USER_TITLE              = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_LST                               = "Admin Notification - List";
	const PAGE_ADMIN_NOTIFICATION_LST_ROBOTS                        = "noindex";
	const PAGE_ADMIN_NOTIFICATION_LST_TITLE                         = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_REGISTER                          = "Admin Notification - Register";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_ROBOTS                   = "noindex";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_TITLE                    = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_ROBOTS                            = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SEL                               = "Admin Notification - Select";
	const PAGE_ADMIN_NOTIFICATION_SEL_ROBOTS                        = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SEL_TITLE                         = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_TITLE                             = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_UPDT                              = "Admin Notification - Update";
	const PAGE_ADMIN_NOTIFICATION_UPDT_ROBOTS                       = "noindex";
	const PAGE_ADMIN_NOTIFICATION_UPDT_TITLE                        = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_VIEW                              = "Admin Notification - View";
	const PAGE_ADMIN_NOTIFICATION_VIEW_ROBOTS                       = "noindex";
	const PAGE_ADMIN_NOTIFICATION_VIEW_TITLE                        = "InfraTools - Admin Notification";
	const PAGE_ADMIN_NOTIFICATION_VIEW_USERS                        = "Admin Notification - View Users";
	const PAGE_ADMIN_NOTIFICATION_VIEW_USERS_ROBOTS                 = "noindex";
	const PAGE_ADMIN_NOTIFICATION_VIEW_USERS_TITLE                  = "InfraTools - Admin Notification";
	const PAGE_ADMIN_ROLE                                           = "Admin User's Role";
	const PAGE_ADMIN_ROLE_LST                                       = "Admin User's Role - List";
	const PAGE_ADMIN_ROLE_LST_ROBOTS                                = "noindex";
	const PAGE_ADMIN_ROLE_LST_TITLE                                 = "InfraTools - Admin User's Role";
	const PAGE_ADMIN_ROLE_REGISTER                                  = "Admin User's Role - Register";
	const PAGE_ADMIN_ROLE_REGISTER_ROBOTS                           = "noindex";
	const PAGE_ADMIN_ROLE_REGISTER_TITLE                            = "InfraTools - Admin User's Role";
	const PAGE_ADMIN_ROLE_ROBOTS                                    = "noindex";
	const PAGE_ADMIN_ROLE_SEL                                       = "Admin User's Role - Select";
	const PAGE_ADMIN_ROLE_SEL_ROBOTS                                = "noindex";
	const PAGE_ADMIN_ROLE_SEL_TITLE                                 = "InfraTools - Admin User's Role";
	const PAGE_ADMIN_ROLE_TITLE                                     = "InfraTools - Admin User's Role";
	const PAGE_ADMIN_ROLE_UPDT                                      = "Admin User's Role - Update";
	const PAGE_ADMIN_ROLE_UPDT_ROBOTS                               = "noindex";
	const PAGE_ADMIN_ROLE_UPDT_TITLE                                = "InfraTools - Admin User's Role";
	const PAGE_ADMIN_ROLE_VIEW                                      = "Admin User's Role - View";
	const PAGE_ADMIN_ROLE_VIEW_ROBOTS                               = "noindex";
	const PAGE_ADMIN_ROLE_VIEW_TITLE                                = "InfraTools - Admin User's Role";
	const PAGE_ADMIN_ROLE_VIEW_USERS                                = "Admin User's Role - View Users";
	const PAGE_ADMIN_ROLE_VIEW_USERS_ROBOTS                         = "noindex";
	const PAGE_ADMIN_ROLE_VIEW_USERS_TITLE                          = "InfraTools - Admin User's Role";
	const PAGE_ADMIN_SERVICE                                        = "Admin Service";
	const PAGE_ADMIN_SERVICE_LST                                    = "Admin Service - List";
	const PAGE_ADMIN_SERVICE_LST_ROBOTS                             = "noindex";
	const PAGE_ADMIN_SERVICE_LST_TITLE                              = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_REGISTER                               = "Admin Service - Register";
	const PAGE_ADMIN_SERVICE_REGISTER_ROBOTS                        = "noindex";
	const PAGE_ADMIN_SERVICE_REGISTER_TITLE                         = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_ROBOTS                                 = "noindex";
	const PAGE_ADMIN_SERVICE_SEL                                    = "Admin Service - Select";
	const PAGE_ADMIN_SERVICE_SEL_ROBOTS                             = "noindex";
	const PAGE_ADMIN_SERVICE_SEL_TITLE                              = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_TITLE                                  = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_UPDT                                   = "Admin Service - Update";
	const PAGE_ADMIN_SERVICE_UPDT_ROBOTS                            = "noindex";
	const PAGE_ADMIN_SERVICE_UPDT_TITLE                             = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_VIEW                                   = "Admin Service - View";
	const PAGE_ADMIN_SERVICE_VIEW_ROBOTS                            = "noindex";
	const PAGE_ADMIN_SERVICE_VIEW_TITLE                             = "InfraTools - Admin Service";
	const PAGE_ADMIN_SERVICE_VIEW_USERS                             = "Admin Service - View Users";
	const PAGE_ADMIN_SERVICE_VIEW_USERS_ROBOTS                      = "noindex";
	const PAGE_ADMIN_SERVICE_VIEW_USERS_TITLE                       = "InfraTools - Admin Service";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION                           = "Admin System Configuration";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_LST                       = "Admin System Configuration - List";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_LST_ROBOTS                = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_LST_TITLE                 = "InfraTools - Admin System Configuration";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER                  = "Admin System Configuration - Register";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER_ROBOTS           = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER_TITLE            = "InfraTools - Admin System Configuration";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_ROBOTS                    = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL                       = "Admin System Configuration - Select";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL_ROBOTS                = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL_TITLE                 = "InfraTools - Admin System Configuration";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_TITLE                     = "InfraTools - Admin System Configuration";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDT                      = "Admin System Configuration - Update";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDT_ROBOTS               = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDT_TITLE                = "InfraTools - Admin System Configuration";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW                      = "Admin System Configuration - View";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW_ROBOTS               = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW_TITLE                = "InfraTools - Admin System Configuration";
	const PAGE_ADMIN_TEAM                                           = "Admin Team";
	const PAGE_ADMIN_TEAM_LST                                       = "Admin Team - List";
	const PAGE_ADMIN_TEAM_LST_ROBOTS                                = "noindex";
	const PAGE_ADMIN_TEAM_LST_TITLE                                 = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_REGISTER                                  = "Admin Team - Register";
	const PAGE_ADMIN_TEAM_REGISTER_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TEAM_REGISTER_TITLE                            = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_ROBOTS                                    = "noindex";
	const PAGE_ADMIN_TEAM_SEL                                       = "Admin Team - Select";
	const PAGE_ADMIN_TEAM_SEL_ROBOTS                                = "noindex";
	const PAGE_ADMIN_TEAM_SEL_TITLE                                 = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_TITLE                                     = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_UPDT                                      = "Admin Team - Update";
	const PAGE_ADMIN_TEAM_UPDT_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TEAM_UPDT_TITLE                                = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_VIEW                                      = "Admin Team - View";
	const PAGE_ADMIN_TEAM_VIEW_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TEAM_VIEW_TITLE                                = "InfraTools - Admin Team";
	const PAGE_ADMIN_TEAM_VIEW_LST_USERS                            = "Admin Manage Members";
	const PAGE_ADMIN_TEAM_VIEW_LST_USERS_ROBOTS                     = "noindex";
	const PAGE_ADMIN_TEAM_VIEW_LST_USERS_TITLE                      = "InfraTools - Admin Manage Members";
	const PAGE_ADMIN_TECH_INFO                                      = "Admin Technical Informations";
	const PAGE_ADMIN_TECH_INFO_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TECH_INFO_TITLE                                = "InfraTools - Admin Technical Informations";
	const PAGE_ADMIN_TICKET                                         = "Admin Ticket";
	const PAGE_ADMIN_TICKET_ASSOCIATE                               = "Admin Ticket - Associate";
	const PAGE_ADMIN_TICKET_ASSOCIATE_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TICKET_ASSOCIATE_TITLE                         = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_LST                                     = "Admin Ticket - List";
	const PAGE_ADMIN_TICKET_LST_ROBOTS                              = "noindex";
	const PAGE_ADMIN_TICKET_LST_TITLE                               = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_REGISTER                                = "Admin Ticket - Register";
	const PAGE_ADMIN_TICKET_REGISTER_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TICKET_REGISTER_TITLE                          = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_ROBOTS                                  = "noindex";
	const PAGE_ADMIN_TICKET_SEL                                     = "Admin Ticket - Select";
	const PAGE_ADMIN_TICKET_SEL_ROBOTS                              = "noindex";
	const PAGE_ADMIN_TICKET_SEL_TITLE                               = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_TITLE                                   = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_UPDT                                    = "Admin Ticket Update";
	const PAGE_ADMIN_TICKET_UPDT_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TICKET_UPDT_TITLE                              = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TICKET_VIEW                                    = "Admin Ticket - View";
	const PAGE_ADMIN_TICKET_VIEW_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TICKET_VIEW_TITLE                              = "InfraTools - Admin ticket";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                           = "Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LST                       = "Admin type of association between user and team - List";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LST_ROBOTS                = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LST_TITLE                 = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER                  = "Admin type of association between user and team - Register";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_ROBOTS           = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_TITLE            = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL                       = "Admin type of association between user and team - Select";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL_ROBOTS                = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL_TITLE                 = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_TITLE                     = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDT                      = "Admin type of association between user and team - Update";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDT_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDT_TITLE                = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW                      = "Admin type of association between user and team - View";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_LST_USERS            = "Admin type of association between user and team - List Users";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_TITLE                = "InfraTools - Admin type of association between user and team";
	const PAGE_ADMIN_TYPE_SERVICE                                   = "Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_LST                               = "Admin Service Type - List";
	const PAGE_ADMIN_TYPE_SERVICE_LST_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_LST_TITLE                         = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER                          = "Admin Service Type - Register";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_ROBOTS                   = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_TITLE                    = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_ROBOTS                            = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SEL                               = "Admin Service Type - Select";
	const PAGE_ADMIN_TYPE_SERVICE_SEL_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SEL_TITLE                         = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_TITLE                             = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_UPDT                              = "Admin Service Type - Update";
	const PAGE_ADMIN_TYPE_SERVICE_UPDT_ROBOTS                       = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_UPDT_TITLE                        = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW                              = "Admin Service Type -  View";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_ROBOTS                       = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_TITLE                        = "InfraTools - Admin Service Type";
	const PAGE_ADMIN_TYPE_STATUS_TICKET                             = "Admin Ticket Type Status";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LST                         = "Admin Ticket Type Status - List";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LST_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LST_TITLE                   = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER                    = "Admin Ticket Status Type - Register";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_TITLE              = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SEL                         = "Admin Ticket Status Type - Select";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SEL_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SEL_TITLE                   = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_TITLE                       = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT                        = "Admin Ticket Status Type - Update";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT_ROBOTS                 = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT_TITLE                  = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW                        = "Admin Ticket Status Type - View";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_ROBOTS                 = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_TITLE                  = "InfraTools - Admin type status ticket";
	const PAGE_ADMIN_TYPE_TICKET                                    = "Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_LST                                = "Admin Ticket Type - List";
	const PAGE_ADMIN_TYPE_TICKET_LST_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_LST_TITLE                          = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER                           = "Admin Ticket Type - Register";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_TITLE                     = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SEL                                = "Admin Ticket Type - Select";
	const PAGE_ADMIN_TYPE_TICKET_SEL_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SEL_TITLE                          = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_TITLE                              = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_UPDT                               = "Admin Ticket Type - Update";
	const PAGE_ADMIN_TYPE_TICKET_UPDT_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_UPDT_TITLE                         = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_TICKET_VIEW                               = "Admin Ticket Type - View";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_TITLE                         = "InfraTools - Admin Ticket Type";
	const PAGE_ADMIN_TYPE_USER                                      = "Admin User Type";
	const PAGE_ADMIN_TYPE_USER_LST                                  = "Admin User Type - List";
	const PAGE_ADMIN_TYPE_USER_LST_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TYPE_USER_LST_TITLE                            = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_REGISTER                             = "Admin User Type - Register";
	const PAGE_ADMIN_TYPE_USER_REGISTER_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_USER_REGISTER_TITLE                       = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TYPE_USER_SEL                                  = "Admin User Type - Select";
	const PAGE_ADMIN_TYPE_USER_SEL_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TYPE_USER_SEL_TITLE                            = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_TITLE                                = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_UPDT                                 = "Admin User Type - Update";
	const PAGE_ADMIN_TYPE_USER_UPDT_ROBOTS                          = "noindex";
	const PAGE_ADMIN_TYPE_USER_UPDT_TITLE                           = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_VIEW                                 = "Admin User Type - View";
	const PAGE_ADMIN_TYPE_USER_VIEW_ROBOTS                          = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_TITLE                           = "InfraTools - Admin User Type";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS                           = "Admin User Type - View Users";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_TITLE                     = "InfraTools - Admin User Type";
	const PAGE_ADMIN_USER                                           = "Admin User";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION             = "Admin User - Change User Informations with Corporation ";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_ROBOTS      = "noindex";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_TITLE       = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION                        = "Admin User - Change Corporation";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_ROBOTS                 = "noindex";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_TITLE                  = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE                          = "Admin User - Change User Type";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_ROBOTS                   = "noindex";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_TITLE                    = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_LST                                       = "Admin User - List";
	const PAGE_ADMIN_USER_LST_ROBOTS                                = "noindex";
	const PAGE_ADMIN_USER_LST_TITLE                                 = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_REGISTER                                  = "Admin User - Register";
	const PAGE_ADMIN_USER_REGISTER_ROBOTS                           = "noindex";
	const PAGE_ADMIN_USER_REGISTER_TITLE                            = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_ROBOTS                                    = "noindex";
	const PAGE_ADMIN_USER_SEL                                       = "Admin User - Select";
	const PAGE_ADMIN_USER_SEL_ROBOTS                                = "noindex";
	const PAGE_ADMIN_USER_SEL_TITLE                                 = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_TITLE                                     = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_UPDT                                      = "Admin User - Update";
	const PAGE_ADMIN_USER_UPDT_ROBOTS                               = "noindex";
	const PAGE_ADMIN_USER_UPDT_TITLE                                = "InfraTools - Admin User";
	const PAGE_ADMIN_USER_VIEW                                      = "Admin User - View";
	const PAGE_ADMIN_USER_VIEW_ROBOTS                               = "noindex";
	const PAGE_ADMIN_USER_VIEW_TITLE                                = "InfraTools - Admin User";
	const PAGE_CHECK                                                = "Checking Functions";
	const PAGE_CHECK_ROBOTS                                         = "ALL";
	const PAGE_CHECK_TITLE                                          = "InfraTools - Checking Functions";
	const PAGE_CONTACT                                              = "Contact";
	const PAGE_CONTACT_ROBOTS                                       = "ALL";
	const PAGE_CONTACT_TITLE                                        = "InfraTools - Contact";
	const PAGE_CORPORATION                                          = "My Corporation";
	const PAGE_CORPORATION_ROBOTS                                   = "noindex";
	const PAGE_CORPORATION_TITLE                                    = "InfraTools - My Corporation";
	const PAGE_DIAGNOSTIC_TOOLS                                     = "Diagnostic Tools";
	const PAGE_DIAGNOSTIC_TOOLS_ROBOTS                              = "noindex";
	const PAGE_DIAGNOSTIC_TOOLS_TITLE                               = "InfraTools - Diagnostic Tools";
	const PAGE_GET                                                  = "Obtaining Functions";
	const PAGE_GET_ROBOTS                                           = "ALL";
	const PAGE_GET_TITLE                                            = "InfraTools - Obtaining Functions";
	const PAGE_HOME                                                 = "InfraTools";
	const PAGE_HOME_ROBOTS                                          = "ALL";
	const PAGE_HOME_TITLE                                           = "InfraTools - Home";
	const PAGE_INSTALL                                              = "InfraTools - Instalation";
	const PAGE_INSTALL_ROBOTS                                       = "noindex";
	const PAGE_INSTALL_TITLE                                        = "InfraTools - Install InfraTools";
	const PAGE_LOGIN                                                = "Login";
	const PAGE_LOGIN_ROBOTS                                         = "ALL";
	const PAGE_LOGIN_TITLE                                          = "InfraTools - Login";
	const PAGE_NOT_FOUND                                            = "Error";
	const PAGE_NOT_FOUND_ROBOTS                                     = "noindex";
	const PAGE_NOT_FOUND_TITLE                                      = "InfraTools - Not Found";
	const PAGE_NOTIFICATION                                  	    = "Notifications";
	const PAGE_NOTIFICATION_ROBOTS                                  = "ALL";
	const PAGE_NOTIFICATION_TITLE                                   = "InfraTools - Notifications";
	const PAGE_NOTIFICATION_LST                                     = "List Notifications";
	const PAGE_NOTIFICATION_LST_ROBOTS                              = "noindex";
	const PAGE_NOTIFICATION_LST_TITLE                               = "InfraTools - List Notifications";
	const PAGE_NOTIFICATION_VIEW                                    = "View Notification";
	const PAGE_NOTIFICATION_VIEW_ROBOTS                             = "noindex";
	const PAGE_NOTIFICATION_VIEW_TITLE                              = "InfraTools - View Notification";
	const PAGE_PASSWORD_RECOVERY                                    = "Password Recovery";
	const PAGE_PASSWORD_RECOVERY_ROBOTS                             = "noindex";
	const PAGE_PASSWORD_RECOVERY_TITLE                              = "InfraTools - Password Recovery";
	const PAGE_PASSWORD_RESET                                       = "Password Reset";
	const PAGE_PASSWORD_RESET_ROBOTS                                = "noindex";
	const PAGE_PASSWORD_RESET_TITLE                                 = "InfraTools - Password Reset";
	const PAGE_REGISTER                                             = "Register";
	const PAGE_REGISTER_ROBOTS                                      = "ALL";
	const PAGE_REGISTER_TITLE                                       = "InfraTools - Register";
	const PAGE_REGISTER_CONFIRMATION                                = "Register Confirmation";
	const PAGE_REGISTER_CONFIRMATION_ROBOTS                         = "noindex";
	const PAGE_REGISTER_CONFIRMATION_TITLE                          = "InfraTools - Register Confirmation";
	const PAGE_RESEND_CONFIRMATION_LINK                             = "Resend Confirmation Link";
	const PAGE_RESEND_CONFIRMATION_LINK_ROBOTS                      = "noindex";
	const PAGE_RESEND_CONFIRMATION_LINK_TITLE                       = "InfraTools - Resend Confirmation Link";
	const PAGE_SERVICE                                      	    = "Service";
	const PAGE_SERVICE_ROBOTS                                       = "ALL";
	const PAGE_SERVICE_TITLE                                        = "InfraTools - Service";
	const PAGE_SERVICE_ASSOCIATE_IP_ADDRESS                         = "Association of Service and Ip Address";
	const PAGE_SERVICE_ASSOCIATE_IP_ADDRESS_ROBOTS                  = "noindex";
	const PAGE_SERVICE_ASSOCIATE_IP_ADDRESS_TITLE                   = "InfraTools - Association of Service and Ip Address";
	const PAGE_SERVICE_LST                                          = "List Services";
	const PAGE_SERVICE_LST_BY_CORPORATION                           = "List Services by Corporations";
	const PAGE_SERVICE_LST_BY_CORPORATION_ROBOTS                    = "noindex";
	const PAGE_SERVICE_LST_BY_CORPORATION_TITLE                     = "InfraTools - List Service by Corporation";
	const PAGE_SERVICE_LST_BY_DEPARTMENT                            = "List Services by Departments";
	const PAGE_SERVICE_LST_BY_DEPARTMENT_ROBOTS                     = "noindex";
	const PAGE_SERVICE_LST_BY_DEPARTMENT_TITLE                      = "InfraTools - List Service by Department";
	const PAGE_SERVICE_LST_BY_NAME                                  = "List Services by Name";
	const PAGE_SERVICE_LST_BY_NAME_ROBOTS                           = "noindex";
	const PAGE_SERVICE_LST_BY_NAME_TITLE                            = "InfraTools - List Service by Name";
	const PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE               = "List Service by Type of association";
	const PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_ROBOTS        = "noindex";
	const PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_TITLE         = "InfraTools - List Service by Type of association";
	const PAGE_SERVICE_LST_BY_TYPE_SERVICE                          = "List Services By Type";
	const PAGE_SERVICE_LST_BY_TYPE_SERVICE_ROBOTS                   = "noindex";
	const PAGE_SERVICE_LST_BY_TYPE_SERVICE_TITLE                    = "InfraTools - List Service by Type";
	const PAGE_SERVICE_LST_BY_USER                                  = "List Services By User";
	const PAGE_SERVICE_LST_BY_USER_ROBOTS                           = "noindex";
	const PAGE_SERVICE_LST_BY_USER_TITLE                            = "InfraTools - List Service by User";
	const PAGE_SERVICE_LST_ROBOTS                                   = "noindex";
	const PAGE_SERVICE_LST_TITLE                                    = "InfraTools - List Service";
	const PAGE_SERVICE_REGISTER                                     = "Register Service";
	const PAGE_SERVICE_REGISTER_ROBOTS                              = "noindex";
	const PAGE_SERVICE_REGISTER_TITLE                               = "InfraTools - Register Service";
	const PAGE_SERVICE_SEL                                          = "Select Service";
	const PAGE_SERVICE_SEL_ROBOTS                                   = "noindex";
	const PAGE_SERVICE_SEL_TITLE                                    = "InfraTools - Select Service";
	const PAGE_SERVICE_UPDT                                         = "Update Service";
	const PAGE_SERVICE_UPDT_ROBOTS                                  = "noindex";
	const PAGE_SERVICE_UPDT_TITLE                                   = "InfraTools - Update Service";
	const PAGE_SERVICE_VIEW                                         = "View Service";
	const PAGE_SERVICE_VIEW_ROBOTS                                  = "noindex";
	const PAGE_SERVICE_VIEW_TITLE                                   = "InfraTools - View Service";
	const PAGE_SUPPORT                                              = "Support";
	const PAGE_SUPPORT_ROBOTS                                       = "noindex";
	const PAGE_SUPPORT_TITLE                                        = "InfraTools - Support";
	const PAGE_SUPPORT_CONTACT                                      = "New Support Ticket";
	const PAGE_SUPPORT_CONTACT_ROBOTS                               = "noindex";
	const PAGE_SUPPORT_CONTACT_TITLE                                = "InfraTools - New Support Ticket";
	const PAGE_SUPPORT_LST                                          = "List Tickets";
	const PAGE_SUPPORT_LST_ROBOTS                                   = "noindex";
	const PAGE_SUPPORT_LST_TITLE                                    = "InfraTools - List Tickets";
	const PAGE_SUPPORT_SEL                                          = "Select Tickets";
	const PAGE_SUPPORT_SEL_ROBOTS                                   = "noindex";
	const PAGE_SUPPORT_SEL_TITLE                                    = "InfraTools - Select Tickets";
	const PAGE_TEAM                                                 = "Team";
	const PAGE_TEAM_ROBOTS                                          = "noindex";
	const PAGE_TEAM_TITLE                                           = "InfraTools - Team";
	const PAGE_TEAM_LST                                             = "Team List";
	const PAGE_TEAM_LST_ROBOTS                                      = "noindex";
	const PAGE_TEAM_LST_TITLE                                       = "InfraTools - Team List";
	const PAGE_TEAM_REGISTER                                        = "Team Register";
	const PAGE_TEAM_REGISTER_ROBOTS                                 = "noindex";
	const PAGE_TEAM_REGISTER_TITLE                                  = "InfraTools - Team Register";
	const PAGE_TEAM_SEL                                             = "Team Select";
	const PAGE_TEAM_SEL_ROBOTS                                      = "noindex";
	const PAGE_TEAM_SEL_TITLE                                       = "InfraTools - Team Select";
	const PAGE_TEAM_UPDT                                            = "Team Update";
	const PAGE_TEAM_UPDT_ROBOTS                                     = "noindex";
	const PAGE_TEAM_UPDT_TITLE                                      = "InfraTools - Team Update";
	const PAGE_TEAM_VIEW                                            = "Team View";
	const PAGE_TEAM_VIEW_ROBOTS                                     = "noindex";
	const PAGE_TEAM_VIEW_TITLE                                      = "InfraTools - Team View";
	const PHONE_PREFIX                                              = "Prefix";
	const REGISTER_DATE                                             = "Register date";
	const REGISTER_EMAIL_ALREADY_REGISTERED                         = "E-mail already registered";
	const REGISTER_EMAIL_ERROR                                      = "An error has occurred when trying to send the e-mail";
	const REGISTER_EMAIL_TAG                                        = "InfraTools - Register";
	const REGISTER_EMAIL_TEXT                                       = "click in the link bellow to finish your register.<br/><br/>Link:";
	const REGISTER_INSERT_ERROR                                     = "Error while trying to register user";
	const REGISTER_SUCCESS                                          = "Registration successfully complete. A link has been sent "
	                                                                . "for your e-mail to activate your account";
	const REGISTER_SUCCESS_NO_LINK                                  = "Registration successfully complete";
	const REGISTER_TEXT_CAPTCHA                                     = "Type the word";
	const REGISTER_CONFIRMATION_ALREADY_CONFIRMED                   = "This account is already active";
	const REGISTER_CONFIRMATION_SEL_ERROR                           = "It was not possible to get an account associated with the provided "
	                                                                .  "code";
	const REGISTER_CONFIRMATION_SUCCESS                             = "Account activated successfully";
	const RESEND_CONFIRMATION_EMAIL_TAG                             = "InfraTools - Resend Confirmation Link";
	const RESEND_CONFIRMATION_EMAIL_TEXT                            = "click in the link bellow to finish your register.<br/><br/>Link:";
	const RESEND_CONFIRMATION_LINK_ERROR                            = "An error has occurred, please try again or contact us";
	const RESEND_CONFIRMATION_LINK_SUCCESS                          = "Confirmation link resent successfully";
	const ROLE_NOT_FOUND                                            = "Role not found";
	const ROW_COUNT                                                 = "Total Amount: ";
	const SEND_EMAIL_ERROR                                          = "Error while sending email to user";
	const SERVICE_DEL_ERROR                                         = "Error deleting service";
	const SERVICE_DEL_ERROR_FOREIGN_KEY                             = "Error deleting service, delete associations first";
	const SERVICE_DEL_SUCCESS                                       = "Service deleted successfully";
	const SERVICE_INSERT_ERROR                                      = "Error inserting service";
	const SERVICE_INSERT_SUCCESS                                    = "Service inserted successfully";
	const SERVICE_NOT_FOUND                                         = "No services were found";
	const SERVICE_NOT_FOUND_FOR_USER                                = "There are no service associated to your user";
	const SERVICE_NOT_FOUND_FOR_USER_BY_CORPORATION                 = "There are no service associated to your user for your corporation";
	const SERVICE_NOT_FOUND_FOR_USER_BY_DEPARTMENT                  = "There is no service associated to your user for the selected department";
	const SERVICE_NOT_FOUND_FOR_USER_BY_TYPE_ASSOC_USER_SERVICE     = "There are no service associated to the type of association selected";
	const SERVICE_NOT_FOUND_FOR_USER_BY_TYPE_SERVICE                = "There are no service associated to the type service selected";
	const SERVICE_SEL_BY_SERVICE_ACTIVE_ERROR                       = "No service was found";
	const SERVICE_SEL_BY_SERVICE_ACTIVE_SUCCESS                     = "Service was found";
	const SERVICE_SEL_BY_SERVICE_CORPORATION_ERROR                  = "No service was found";
	const SERVICE_SEL_BY_SERVICE_CORPORATION_SUCCESS                = "Service was found";
	const SERVICE_SEL_BY_SERVICE_DEPARTMENT_ERROR                   = "No service was found";
	const SERVICE_SEL_BY_SERVICE_DEPARTMENT_SUCCESS                 = "Service was found";
	const SERVICE_SEL_BY_SERVICE_ID_ERROR                           = "No service was found";
	const SERVICE_SEL_BY_SERVICE_ID_SUCCESS                         = "Service was found";
	const SERVICE_SEL_BY_SERVICE_NAME_ERROR                         = "No service was found";
	const SERVICE_SEL_BY_SERVICE_NAME_SUCCESS                       = "Service was found";
	const SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR      = "Service was found";
	const SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS    = "No service was found";
	const SERVICE_SEL_BY_SERVICE_TYPE_ERROR                         = "No service was found";
	const SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS                       = "Service was found";
	const SERVICE_SEL_BY_SERVICE_USER_ERROR                         = "No service was found";
	const SERVICE_SEL_BY_SERVICE_USER_SUCCESS                       = "Service was found";
	const SERVICE_SEL_CORPORATION                                   = "Select a corporation";
	const SERVICE_SEL_DEPARTMENT                                    = "Select a department";
	const SERVICE_SEL_ERROR                                         = "No service was found";
	const SERVICE_SEL_SUCCESS                                       = "Service was found";
	const SERVICE_SEL_TYPE                                          = "Select a service type";
	const SERVICE_SEL_TYPE_ASSOC_USER_SERVICE                       = "Select a service by the type of association";
	const SERVICE_UPDT_BY_ID_ERROR                                  = "Error updating service";
	const SERVICE_UPDT_BY_ID_SUCCESS                                = "Service updated succesfully";
	const SERVICE_UPDT_RESTRICTBY_ID_ERROR                          = "Error updating service";
	const SERVICE_UPDT_RESTRICT_BY_ID_SUCCESS                       = "Service updated succesfully";
	const SUBMIT_ACCOUNT_ACTIVATE                                   = "ACTIVATE ACCOUNT";
	const SUBMIT_ACCOUNT_DEACTIVATE                                 = "DEACTIVATE ACCOUNT";
	const SUBMIT_ASSOCIATE_USER                                     = "ASSOCIATE TO USERS";
	const SUBMIT_ASSOCIATE_USER_DISASSOCIATE                        = "DISASSOCIATE TO USERS";
	const SUBMIT_BACK                                               = "BACK";
	const SUBMIT_CANCEL                                             = "CANCEL";
	const SUBMIT_CHANGE_ASSOC_USER_CORPORATION                      = "CHANGE USER CORPORATION INFO";
	const SUBMIT_CHANGE_CORPORATION                                 = "CHANGE CORPORATION";
	const SUBMIT_CHANGE_PASSWORD                                    = "CHANGE PASSWORD";
	const SUBMIT_CHANGE_USER_TYPE                                   = "CHANGE USER TYPE";
	const SUBMIT_CHECK                                              = "CHECK";
	const SUBMIT_CONFIRM                                            = "Confirm?";
	const SUBMIT_DEL                                                = "DELETE";
	const SUBMIT_FORWARD                                            = "NEXT";
	const SUBMIT_GET                                                = "GET";
	const SUBMIT_GO                                                 = "GO";
	const SUBMIT_INSERT                                             = "INSERT";
	const SUBMIT_INSTALL_EXPORT                                     = "Export System data";
	const SUBMIT_INSTALL_IMPORT                                     = "Import Data into System";
	const SUBMIT_INSTALL_NEW                                        = "Install System";
	const SUBMIT_INSTALL_REINSTALL                                  = "Reinstall System";
	const SUBMIT_LST                                                = "LIST";
	const SUBMIT_LST_BY_IP_ADDRESS                                  = "LIST BY IP ADDRESS";
	const SUBMIT_LST_BY_NETWORK                                     = "LIST BY NETWORK";
	const SUBMIT_LST_USERS                                          = "LIST USERS";
	const SUBMIT_REGISTER                                           = "REGISTER";
	const SUBMIT_RESET_PASSWORD                                     = "RESET PASSWORD";
	const SUBMIT_SEL                                                = "SELECT";
	const SUBMIT_SEND                                               = "SEND";
	const SUBMIT_TWO_STEP_VERIFICATION_ACTIVATE                     = "ACTIVATE TWO STEP VERIFICATION";
	const SUBMIT_TWO_STEP_VERIFICATION_DEACTIVATE                   = "DEACTIVATE TWO STEP VERIFICATION";
	const SUBMIT_UPDT                                               = "UPDATE";
	const SUBMIT_UPDT_IP_ADDRESS                                    = "UPDATE IP ADDRESS";
	const SUBMIT_UPDT_NETWORK                                       = "UPDATE NETWORK";
	const SUBMIT_VALIDATE                                           = "VALIDATE";
	const SYSTEM_CONFIGURATION_DEL_ERROR                            = "Error deleting system configuration";
	const SYSTEM_CONFIGURATION_DEL_SUCCESS                          = "System configuration deleted succesfully";
	const SYSTEM_CONFIGURATION_INSERT_ERROR                         = "Error inserting system configuration";
	const SYSTEM_CONFIGURATION_INSERT_EXISTS                        = "A system configuration with that name an description already exists";
	const SYSTEM_CONFIGURATION_INSERT_SUCCESS                       = "System configuration inserted succesfully";
	const SYSTEM_CONFIGURATION_NOT_FOUND                            = "System configuration not found";
	const SYSTEM_CONFIGURATION_UPDT_ERROR                           = "Error updating system configuration";
	const SYSTEM_CONFIGURATION_UPDT_SUCCESS                         = "System configuration updated successfully";
	const TABLE_EMPTY                                               = "No records were found for the search performed";
	const TB_PAGE_PREFIX                                            = "From:";
	const TB_PAGE                                                   = "of";
	const TEAM                                                      = "Team";
	const TEAM_DEL_ERROR                                            = "Error deleting team";
	const TEAM_DEL_ERROR_DEPENDENCY_TEAM                            = "Team has users associated, delete them first";
	const TEAM_DEL_SUCCESS                                          = "Team deleted succesfully";
	const TEAM_NOT_FOUND                                            = "Team not found";
	const TEAM_INSERT_ERROR                                         = "Error while trying to register team";
	const TEAM_INSERT_SUCCESS                                       = "Team registered succesfully";
	const TEAM_UPDT_ERROR                                           = "Error while trying to update team";
	const TEAM_UPDT_SUCCESS                                         = "Team updated succesfully";
	const TEAMS                                                     = "Teams";
	const TEXT_HOSTNAME                                             = "Hostname";
	const TEXT_IP_ADDRESS                                           = "Ip address";
	const TEXT_MASK                                                 = "Mask";
	const TEXT_NUMBER                                               = "Number";
	const TEXT_PORT                                                 = "Port";
	const TEXT_WEBSITE                                              = "Web Site";
	const TICKET_DEL_ERROR                                          = "Error while trying to delete ticket";
	const TICKET_DEL_SUCCESS                                        = "Ticket deleted succesfully";
	const TICKET_INSERT_ERROR                                       = "Error while trying to register ticket";
	const TICKET_INSERT_SUCCESS                                     = "Ticket registered succesfully";
	const TICKET_NOT_FOUND                                          = "Ticket not found";
	const TYPE_ASSOC_USER_SERVICE_SEL_ERROR                         = "Error obtaining types of association";
	const TYPE_ASSOC_USER_SERVICE_SEL_SUCCESS                       = "Types of association obtained successfully";
	const TYPE_ASSOC_USER_TEAM_DESCRIPTION                          = "Description";
	const TYPE_ASSOC_USER_TEAM_NOT_FOUND                            = "Type of association between a user and a team not found";
	const TYPE_STATUS_TICKET_DEL_ERROR                              = "Error deleting ticket status type";
	const TYPE_STATUS_TICKET_DEL_ERROR_DEPENDENCY_TICKET            = "Type of status ticket is associated,"
		                                                            . "delete the associations first";
	const TYPE_STATUS_TICKET_DEL_SUCCESS                            = "Type status ticket deleted succefully";
	const TYPE_STATUS_TICKET_INSERT_ERROR                           = "Error while inserting type status ticket";
	const TYPE_STATUS_TICKET_INSERT_SUCCESS                         = "Type status ticket inserted succesfully";
	const TYPE_STATUS_TICKET_NOT_FOUND                              = "Type status ticket not found";
	const TYPE_STATUS_TICKET_UPDT_ERROR                             = "Error updating type status ticket";
	const TYPE_STATUS_TICKET_UPDT_SUCCESS                           = "Type status ticket updated succesfully";
	const TYPE_TICKET_NOT_FOUND                                     = "Type ticket not found";
	const TYPE_USER_NOT_FOUND                                       = "User type not found";
	const UPDATE_ERROR_ASSOC_USER_CORPORATION                       = "Error while trying to update user's corporation information";
	const UPDATE_ERROR_USER_UNIQUE_ID                               = "Unique Id already picked by another user, "
	                                                                . "please choose another";
	const UPDATE_SUCCESS                                            = "Information updated";
	const UPDATE_WARNING_SAME_VALUE                                 = "Information with same value as the old one";
	const USER_INACTIVE                                             = "This account has been deactivated by an administrator";
	const USER_NOT_CONFIRMED                                        = "Your account has not been confirmed, please confirm it through the "
	                                                                . "e-mail that was sent to you. If you lost the e-email or didn't "
								  							        . "receive it, another one can be sent";
	const USER_NOT_FOUND                                            = "User not found"; 
	const USER_SEL_BY_CORPORATION_NAME_ERROR                        = "Error trying to obtain users associated with this corporation";
	const USER_SEL_BY_CORPORATION_NAME_WARNING                      = "No user is associated with this corporation";
	const USER_SEL_BY_DEPARTMENT_NAME_ERROR                         = "Error trying to obtain users associated with this department";
	const USER_SEL_BY_DEPARTMENT_NAME_WARNING                       = "No user is associated with this department";
	const USER_SEL_BY_HASH_CODE_ERROR                               = "Error trying to obtain user with the given hash code";
	const USER_SEL_BY_HASH_CODE_SUCCESS                             = "User obtained sucessfully";
	const USER_SEL_BY_IP_ADDRESS_IPV4_ERROR                         = "Error trying to obtain users associated with this ip address";
	const USER_SEL_BY_IP_ADDRESS_IPV4_WARNING                       = "No user is associated with this ip address";
	const USER_SEL_BY_NOTIFICATION_ID_ERROR                         = "Error trying to obtain users associated with this notification";
	const USER_SEL_BY_NOTIFICATION_ID_WARNING                       = "No user is associated with this notification";
	const USER_SEL_BY_ROLE_NAME_ERROR                               = "Error trying to obtain users associated with this role";
	const USER_SEL_BY_ROLE_NAME_WARNING                             = "No user is associated with this role";
	const USER_SEL_BY_SERVICE_ID_ERROR                              = "Error trying to obtain users associated with this service";
	const USER_SEL_BY_SERVICE_ID_WARNING                            = "No user is associated with this service";
	const USER_SEL_BY_TEAM_ID_ERROR                                 = "Error while trying to obtain users from this team";
	const USER_SEL_BY_TEAM_ID_WARNING                               = "No users were found for this team";
	const USER_SEL_BY_TICKET_ID_ERROR                               = "Error while trying to obtain users associated with this ticket";
	const USER_SEL_BY_TICKET_ID_WARNING                             = "No user is associated with this ticket";
	const USER_SEL_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_ERROR        = "Error while trying to obtain users associated with this type of "
		                                                            . "association between user and team";
	const USER_SEL_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_WARNING      = "No user is associated with this type of association between user and "
		                                                            . "team";
	const USER_SEL_BY_TYPE_TICKET_DESCRIPTION_ERROR                 = "Error while trying to obtain users associated with this ticket type";
	const USER_SEL_BY_TYPE_TICKET_DESCRIPTION_WARNING               = "No user is associated with this ticket type";
	const USER_SEL_BY_TYPE_USER_DESCRIPTION_ERROR                   = "Error while trying to obtain users associated with this user type";
	const USER_SEL_BY_TYPE_USER_DESCRIPTION_WARNING                 = "No user is associated with this user type";
	const USER_SEL_BY_USER_EMAIL_ERROR                              = "Error trying to obtain user with the given e-mail";
	const USER_SEL_BY_USER_EMAIL_SUCCESS                            = "User obtained sucessfully";
	const USER_SEL_BY_USER_UNIQUE_ID_ERROR                          = "Error trying to obtain user with the given unique id";
	const USER_SEL_BY_USER_UNIQUE_ID_SUCCESS                        = "User obtained sucessfully";
	const USER_SEL_EXISTS_BY_USER_EMAIL_ERROR                       = "User with specified e-mail does not exists";
	const USER_SEL_EXISTS_BY_USER_EMAIL_SUCCESS                     = "User exists";
	const USER_SEL_HASH_CODE_BY_USER_EMAIL_ERROR                    = "Error trying to obtain user's hash code with the given e-mail";
	const USER_SEL_HASH_CODE_BY_USER_EMAIL_SUCCESS                  = "Hash code obtained sucessfully";
	const USER_SEL_NOTIFICATION_BY_USER_EMAIL_ERROR                 = "Error trying to obtain user's notifications with the given e-mail";
	const USER_SEL_NOTIFICATION_BY_USER_EMAIL_SUCCESS               = "Notifications obtained sucessfully";
	const USER_SEL_TEAM_BY_USER_EMAIL_ERROR                         = "Error trying to obtain teams associated with this e-mail";
	const USER_SEL_TEAM_BY_USER_EMAIL_WARNING                       = "This user has not team";
	const USER_TEAM_SEL_ERROR                                       = "Error trying to get the user teams";
	const USER_TWO_STEP_VERIFICATION_CHANGE_ERROR                   = "Error changing two step verification";
	const USER_TWO_STEP_VERIFICATION_CHANGE_SUCCESS                 = "Two step verification changed succesfully";
	const USER_UNIQUE_ID_TIP                                        = "(Unique login)";
	const USER_UPDT_USER_CONFIRMED_ERROR                            = "Error trying to update value for user confirmed";
	const USER_UPDT_USER_CONFIRMED_SUCCESS                          = "User confirmed updated succesfully";
	const USER_UPDT_USER_PASSWORD_ERROR                             = "Error trying to update value for user password";
	const USER_UPDT_USER_PASSWORD_SUCCESS                           = "User password updated succesfully";
	const USER_UPDT_USER_PASSWORD_WARNING                           = "Password not changed, the typed password is the current one";
	
	/* Body Page AdminTeam */
	
	/* Body Page Admin Tech Info */
	const TECH_INFO_DIRECTORY_COUNT                         = "Number of Directories";
	const TECH_INFO_FILE_COUNT                              = "Number of Files";
	const TECH_INFO_FILE_EXTENSION                          = "Extension";
	const TECH_INFO_FILE_TYPE                               = "Type";
	const TECH_INFO_FILE_VALUE                              = "Value";
	const TECH_INFO_LANGUAGE_QUANTITY_CONSTANT              = "Quantity of constants";
	const TECH_INFO_LANGUAGE_QUANTITY_VALUE                 = "Quantity of texts";
	const TECH_INFO_LANGUAGE_CONSTANTS_PROBLEM              = "Constants with possible problem";
	const TECH_INFO_TITLE_BASE                              = "Base";
	const TECH_INFO_TITLE_INFRATOOLS                        = "InfraTools";
	const TECH_INFO_TITLE_TOTAL                             = "Total";
		
	
	/* Body Page AdminTypeAssocUserTeam */
	const TYPE_ASSOC_USER_TEAM_DEL_ERROR                 = "Error deleting type of association";
	const TYPE_ASSOC_USER_TEAM_DEL_ERROR_DEPENDENCY_TEAM = "Type of associations is used between users and teams,"
		                                                    . "delete them first";
	const TYPE_ASSOC_USER_TEAM_DEL_SUCCESS               = "Type of association deleted succesfully";
	const TYPE_ASSOC_USER_TEAM_INSERT_ERROR                 = "Error while inserting type of association between user "
		                                                    . "and teams";
	const TYPE_ASSOC_USER_TEAM_INSERT_SUCCESS               = "Type of association inserted succesfully";
	const TYPE_ASSOC_USER_TEAM_UPDT_ERROR                 = "Error updating type of association";
	const TYPE_ASSOC_USER_TEAM_UPDT_SUCCESS               = "Type of association updated succesfully";
	
	/* Body Page AdminTypeStatusTicket */
	
	/* Body Page AdminTypeTicket */
	const TYPE_TICKET_DEL_ERROR                          = "Error deleting ticket type";
	const TYPE_TICKET_DEL_ERROR_DEPENDENCY_TICKET        = "Ticket type has ticket associated, delete them first";
	const TYPE_TICKET_DEL_SUCCESS                        = "Ticket type deleted succesfully";
	const TYPE_TICKET_INVALID_DESCRIPTION                   = "Invalid description";
	const TYPE_TICKET_INVALID_DESCRIPTION_SIZE              = "Quantity of characters exceeds the maximum allowed on description";
	const TYPE_TICKET_INSERT_ERROR                          = "Error while inserting ticket type";
	const TYPE_TICKET_INSERT_SUCCESS                        = "Ticket type inserted succesfully";
	const TYPE_TICKET_UPDT_ERROR                          = "Error updating ticket type";
	const TYPE_TICKET_UPDT_SUCCESS                        = "Ticket type updated succesfully";
	
	/* Body Page AdminTypeUser */
	const TYPE_USER_DEL_ERROR                            = "Error deleting user type";
	const TYPE_USER_DEL_ERROR_DEPENDENCY_USER            = "User type has user associated, delete them first";
	const TYPE_USER_DEL_SUCCESS                          = "User type deleted succesfully";
	const TYPE_USER_INVALID_DESCRIPTION                     = "Invalid description";
	const TYPE_USER_INVALID_DESCRIPTION_SIZE                = "Quantity of characters exceeds the maximum allowed on description";
	const TYPE_USER_INSERT_ERROR                            = "Error while inserting user type";
	const TYPE_USER_INSERT_SUCCESS                          = "User type inserted succesfully";
	const TYPE_USER_UPDT_ERROR                            = "Error while updating user type";
	const TYPE_USER_UPDT_SUCCESS                          = "User type updated succesfully";

	/* Body Page AdminUser */
	const USER_ACTIVATE_ERROR                              = "Error while trying to [0] user";
	const USER_ACTIVATE_ERROR_NO_USER_SELED             = "No user were selected";
	const USER_ACTIVATE_SUCCESS                            = "User [0] successfully";
	const USER_CHANGE_CORPORATION_ERROR                    = "Error while trying to change user corporation";
	const USER_CHANGE_CORPORATION_SUCCESS                  = "User corporation updated successfully";
	const USER_CHANGE_USER_TYPE_ERROR                      = "Error while trying to change user type";
	const USER_CHANGE_USER_TYPE_SUCCESS                    = "User type updated successfully";
	const USER_DEL_ERROR                                = "Error while trying to delete user";      
	const USER_DEL_ERROR_DEPENDENCY                          = "User has associations delete them first";
	const USER_DEL_SUCCESS                              = "User deleted successfully";
	
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
	const FIELD_TICKET_CONTACT_SEL_COMMERCIAL                              = "Commercial";
	const FIELD_TICKET_CONTACT_SEL_DOUBT                                   = "Doubt";
	const FIELD_TICKET_CONTACT_SEL_SUGGESTION                              = "Suggestion";
	const CONTACT_TEXT_CAPTCHA                                   = "Type the word";
	const CONTACT_TEXT_MESSAGE                                   = "Message";
	const CONTACT_TEXT_NAME                                      = "Name";
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
	const HOME_CHECK_1                                            = "Group of functions dedicated to";
	const HOME_CHECK_2                                            = "verify network and";
	const HOME_CHECK_3                                            = "diagnostic problems";
	const HOME_CLOUD_1                                            = "Page dedicated to";
	const HOME_CLOUD_2                                            = "documentation and monitoring";
	const HOME_CLOUD_3                                            = "services on the web";
	const HOME_GET_1                                              = "Group of functions dedicated for";
	const HOME_GET_2                                              = "gathering data about";
	const HOME_GET_3                                              = "network and web.";
	const HOME_INSTALL_1                                          = "Page that installs,";
	const HOME_INSTALL_2                                          = "import data or reinstalls";
	const HOME_INSTALL_3                                          = "the database system";
	const HOME_CERTIFICATION                                      = "Certifications";
	
	/* Body Page Login */
	const LOGIN_FORGOT_PASSWORD_TEXT                             = "Forgot password ?";
	const LOGIN_NEW_TEXT                                         = "New? Register";
	const LOGIN_INVALID_LOGIN                                    = "Invalid login or password";
	const LOGIN_SEND                                             = "LOGIN";
	const LOGIN_TWO_STEP_VERIFICATION_CODE                       = "Verification Code";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_ERROR                 = "Verification code is wrong!";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_FAILED          = "Falied to send the code to your e-mail, please try again";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TAG             = "InfraTools - Login Two Step Verification";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TEXT            = "Here is the code needed to login";
	
	/* Body Page Not Found */
	
	/* Body Page Password Recovery */
	const PASSWORD_RECOVERY_EMAIL_ALREADY_SENT                    = "The password was already sent for this e-mail, "
	                                                              . "please wait a moment to sent it again";
	const PASSWORD_RECOVERY_EMAIL_ERROR                           = "An error has occurred when trying to send the e-mail";
	const PASSWORD_RECOVERY_EMAIL_NOT_FOUND                       = "E-mail address not found";
	const PASSWORD_RECOVERY_EMAIL_TAG                             = "InfraTools - Password Recovery";
	const PASSWORD_RECOVERY_EMAIL_TEXT                            = "Here is the code needed to change your password.<br/><br/>Code:";
	const PASSWORD_RECOVERY_ERROR                                 = "Error validating fields";
	const PASSWORD_RECOVERY_SUCCESS                               = "Password sent to the e-mail address.";
	const PASSWORD_RECOVERY_TEXT_CAPTCHA                          = "Type the word";
	
	/* Body Page Password Reset */
	const PASSWORD_RESET_INVALID_CODE                            = "Invalid code";
	const PASSWORD_RESET_ERROR                                   = "Error while trying to change password";
	const PASSWORD_RESET_SUCCESS                                 = "Password updated successfully";
	const PASSWORD_RESET_TEXT_CODE                               = "Change code";
	const PASSWORD_RESET_TEXT_SEND                               = "CHANGE";
	
	/* Body Page Register */
	
	/* Body Page Register Confirmation */
	
	
	/* Body Page Resend Confirmation Link */
}