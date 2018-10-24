<?php

/************************************************************************
Class: Config.php
Creation: 05/11/2013
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe de configurcão Web Base.
			Padroes: Singleton.
Functions: 
			public function SetApplication();
			public function AuthenticateServerBasic();
**************************************************************************/
if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

class Config
{
	/* Constantes de Retorno */
	const EMPTY_AMBIENT_VARIABLE                                        = "EmptyAmbientVariable";
	const ERROR                                                         = "Error";
	const PARAMETERS_NULL                                               = "ParametersNull";
	const POST_IS_NULL                                                  = "PostIsNull";
	const SUCCESS                                                       = "Success";
	const SESSION_IS_NULL                                               = "SessionIsNUll";
	const WARNING                                                       = "Warning";
	
	/* Constantes gerais usadas pelo site */
	const CHECKBOX_CHECKED                                              = "checked";
	const CHECKBOX_UNCHECKED                                            = "";
	const DIV_RETURN                                                    = "DivReturn";
	const ENABLED                                                       = "Enabled";
	const EXCEPTION_ASSOC_TICKET_USER_REQUESTING_TICKET                 = "ExceptionAssocTicketUserRequestingTicket";
	const EXCEPTION_ASSOC_TICKET_USER_REQUESTING_TYPE                   = "ExceptionAssocTicketUserRequestingType";
	const EXCEPTION_ASSOC_TICKET_USER_REQUESTING_USER                   = "ExceptionAssocTicketUserRequestingUser";
	const EXCEPTION_ASSOC_USER_TEAM_TEAM                                = "ExceptionAssocUserTeamTeam";
	const EXCEPTION_ASSOC_USER_TEAM_USER                                = "ExceptionAssocUserTeamUser";
	const EXCEPTION_CORPORATION                                         = "ExceptionCorporation";
	const EXCEPTION_DEPARTMENT_DEPARTMENT_CORPORATION                   = "ExceptionDepartmentDepartmentCorporation";
	const EXCEPTION_DEPARTMENT_DEPARTMENT_NAME                          = "ExceptionDepartmentDepartmentName";
	const EXCEPTION_REGISTER_DATE                                       = "ExceptionRegisterDate";
	const EXCEPTION_TYPE_ASSOC_USER_TEAM_DESCRIPTION                    = "ExceptionTypeAssocUserTeamDescription";
	const EXCEPTION_TYPE_ASSOC_USER_TEAM_ID                             = "ExceptionTypeAssocUserTeamId";
	const EXCEPTION_USER                                                = "ExceptionUser";
	const FORM_BACKGROUND_ERROR                                         = "DivReturnMessageError";
	const FORM_BACKGROUND_SUCCESS                                       = "DivReturnMessageSuccess";
	const FORM_BACKGROUND_WARNING                                       = "DivReturnMessageWarning";
	const FORM_FIELD_ERROR                                              = "InputAlertText";
	const FORM_FIELD_CORPORATION_SELECT                                 = "FormFieldCorporationSelect";
	const FORM_FIELD_CORPORATION_ACITVE                                 = "InputCorporationActive";
	const FORM_FIELD_CORPORATION_NAME                                   = "InputCorporationName";
	const FORM_FIELD_DEPARTMENT_INITIALS                                = "FormFieldDepartmentInitials";
	const FORM_FIELD_DEPARTMENT_NAME                                    = "FormFieldDepartmentName";
	const FORM_FIELD_DEPARTMENT_SELECT                                  = "FormFieldDepartmentSelect";
	const FORM_FIELD_EMAIL                                              = "FormInputEmail";
	const FORM_FIELD_HEADER_DEBUG                                       = "FormFieldHeaderDebug";
	const FORM_FIELD_HEADER_DEBUG_HIDDEN                                = "FormFieldHeaderDebugHidden";
	const FORM_FIELD_HEADER_LAYOUT                                      = "FormFieldHeaderLayout";
	const FORM_FIELD_HEADER_LAYOUT_HIDDEN                               = "FormFieldHeaderLayoutHidden";
	const FORM_FIELD_PASSWORD_NEW                                       = "FormFieldPasswordNew";
	const FORM_FIELD_PASSWORD_REPEAT                                    = "FormFieldPasswordRepeat";
	const FORM_FIELD_HEADER_LOG_OUT                                     = "FormFieldHeaderLogOut";
	const FORM_FIELD_TEAM_DESCRIPTION                                   = "FormFieldTeamDescription";
	const FORM_FIELD_TEAM_ID                                            = "FormFieldTeamId";
	const FORM_FIELD_TEAM_NAME                                          = "FormFieldTeamName";
	const FORM_FIELD_TICKET_DESCRIPTION                                 = "FormFieldTicketDescription";
	const FORM_FIELD_TICKET_ID                                          = "FormFieldTicketId";
	const FORM_FIELD_TICKET_TITLE                                       = "FormFieldTicketTitle";
	const FORM_FIELD_TICKET_TYPE                                        = "FormFieldTicketType";
	const FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION                = "FormFieldTypeAssocUserServiceDescription";
	const FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_ID                       = "FormFieldTypeAssocUserTeamTeamId";
	const FORM_FIELD_TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION              = "FormFieldTypeAssocUserTeamTeamDescription";
	const FORM_FIELD_TYPE_STATUS_TICKET_DESCRIPTION                     = "FormFieldTypeStatusTicketDescription";
	const FORM_FIELD_TYPE_STATUS_TICKET_ID                              = "FormFieldTypeStatusTicketId";
	const FORM_FIELD_TYPE_TICKET_DESCRIPTION                            = "FormFieldTypeTicketDescription";
	const FORM_FIELD_TYPE_TICKET_ID                                     = "FormFieldTypeTicketId";
	const FORM_FIELD_TYPE_USER_DESCRIPTION                              = "FormFieldTypeUserDescription";
	const FORM_FIELD_TYPE_USER_ID                                       = "FormFieldTypeUserId";
	const FORM_IMAGE_ERROR                                              = "Icons/IconFormError.png";
	const FORM_IMAGE_SUCCESS                                            = "Icons/IconFormSuccess.png";
	const FORM_IMAGE_WARNING                                            = "Icons/IconFormWarning.png";
	const FORM_LOGIN_TWO_STEP_VERIFICATION_CODE_SUBMIT                  = "FormLoginTwoStepVerificationCodeSubmit";
	const FORM_SELECT_NONE                                              = "None";
	const FORM_TYPE_ASSOC_USER_TEAM_RETURN_NOT_FOUND                    = "FormTypeAssocUserTeamReturnNotFound";
	const FORM_TYPE_USER_RETURN_NOT_FOUND                               = "FormTypeUserReturnNotFound";
	const FORM_TEAM_RETURN_NOT_FOUND                                    = "FormTeamReturnNotFound";
	const FORM_VALIDATE_FUNCTION_BOOL                                   = "VALIDATE_BOOL";
	const FORM_VALIDATE_FUNCTION_CORPORATION_NAME                       = "VALIDATE_CORPORATION_NAME";
	const FORM_VALIDATE_FUNCTION_COUNTRY_NAME                           = "VALIDATE_COUNTRY_NAME";
	const FORM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE                    = "VALIDATE_COUNTRY_REGION_CODE";
	const FORM_VALIDATE_FUNCTION_COMPARE_STRING                         = "VALIDATE_COMPARE_STRING";
	const FORM_VALIDATE_FUNCTION_CPF                                    = "VALIDATE_CPF";
	const FORM_VALIDATE_FUNCTION_DATE                                   = "VALIDATE_DATE";
	const FORM_VALIDATE_FUNCTION_DATE_DAY                               = "VALIDATE_DATE_DAY";
	const FORM_VALIDATE_FUNCTION_DATE_MONTH                             = "VALIDATE_DATE_MONTH";
	const FORM_VALIDATE_FUNCTION_DATE_YEAR                              = "VALIDATE_DATE_YEAR";
	const FORM_VALIDATE_FUNCTION_DEPARTMENT_INITIALS                    = "VALIDATE_DEPARTMENT_INITIALS";
	const FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME                        = "VALIDATE_DEPARTMENT_NAME";
	const FORM_VALIDATE_FUNCTION_DESCRIPTION                            = "VALIDATE_DESCRIPTION";
	const FORM_VALIDATE_FUNCTION_EMAIL                                  = "VALIDATE_EMAIL";
	const FORM_VALIDATE_FUNCTION_HOST                                   = "VALIDATE_HOST";
	const FORM_VALIDATE_FUNCTION_GENDER                                 = "VALIDATE_GENDER";
	const FORM_VALIDATE_FUNCTION_IP_ADDRESS                             = "VALIDATE_IP_ADDRESS";
	const FORM_VALIDATE_FUNCTION_IP_MASK                                = "VALIDATE_IP_MASK";
	const FORM_VALIDATE_FUNCTION_MESSAGE                                = "VALIDATE_MESSAGE";
	const FORM_VALIDATE_FUNCTION_NAME                                   = "VALIDATE_NAME";
	const FORM_VALIDATE_FUNCTION_NOT_NULL_OR_EMPTY                      = "VALIDATE_NOT_NULL_OR_EMPTY";
	const FORM_VALIDATE_FUNCTION_NOT_NUMBER                             = "VALIDATE_NOT_NUMBER";
	const FORM_VALIDATE_FUNCTION_NUMERIC                                = "VALIDATE_NUMERIC";
	const FORM_VALIDATE_FUNCTION_PASSWORD                               = "VALIDATE_PASSWORD";
	const FORM_VALIDATE_FUNCTION_REGISTRATION_ID                        = "VALIDATE_REGISTRATION_ID";
	const FORM_VALIDATE_FUNCTION_SERVICE_NAME                           = "VALIDATE_SERVICE_NAME";
	const FORM_VALIDATE_FUNCTION_SUBJECT                                = "VALIDATE_SUBJECT";
	const FORM_VALIDATE_FUNCTION_TEAM_NAME                              = "VALIDATE_TEAM_NAME";
	const FORM_VALIDATE_FUNCTION_TITLE                                  = "VALIDATE_TITLE";
	const FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE                = "VALIDATE_TYPE_ASSOC_USER_SERVICE";
	const FORM_VALIDATE_FUNCTION_TYPE_SERVICE                           = "VALIDATE_TYPE_SERVICE";
	const FORM_VALIDATE_FUNCTION_URL                                    = "VALIDATE_URL";
	const FORM_VALIDATE_FUNCTION_USER_UNIQUE_ID                         = "VALIDATE_USER_UNIQUE_ID";
	const GET_IP_ADDRESS_CLIENT_FAILED                                  = "ReturnGetIpAddressClientFailed";
	const GET_OPERATIONAL_SYSTEM_INVALID_OS                             = "ReturnGetOperationalSystemInvalidOs";
	const HEAD_GENERIC                                                  = "HeadGeneric.php";
	const HEAD_JAVASCRIPT                                               = "HeadJavaScript.php";
	const HTML_TAG_BODY_START                                           = "<body>";
	const HTML_TAG_BODY_END                                             = "</body>";
	const HTML_TAG_DOCTYPE                                              = "<!DOCTYPE html>";
	const HTML_TAG_END                                                  = "</html>";
	const HTML_TAG_HEAD_START                                           = "<head>";
	const HTML_TAG_HEAD_END              	                            = "</head>";
	const HTML_TAG_START                                                = "<html xmlns='http://www.w3.org/1999/xhtml' lang='pt'>";
	const LANGUAGE_ENGLISH                                              = "Language/En";
	const LANGUAGE_GERMAN                                               = "Language/De";
	const LANGUAGE_PORTUGUESE                                           = "Language/Pt";
	const LANGUAGE_SPANISH                                              = "Language/Es";
	const LOGIN_FORM                                                    = "LoginForm";
	const LOGIN_FORM_SUBMIT                                             = "LoginFormSubmit";
	const LOGIN_FORM_SUBMIT_FORGOT_PASSWORD                             = "LoginFormSubmitForgotPassword";
	const LOGIN_PASSWORD                                                = "LoginPassword";
	const LOGIN_TWO_STEP_VERIFICATION_ACTIVATED                         = "LoginTwoStepVerificationActivated";
	const LOGIN_TWO_STEP_VERIFICATION_CODE                              = "LoginTwoStepVerificationCode";
	const LOGIN_TWO_STEP_VERIFICATION_FORM                              = "LoginTwoStepVerificationForm";
	const LOGIN_USER                                                    = "LoginUser";
	const PAGE_ABOUT                                                    = "Page_About";
	const PAGE_ACCOUNT                                                  = "Page_Account";
	const PAGE_ACCOUNT_CHANGE_PASSWORD                                  = "Page_Account_Change_Password";
	const PAGE_ACCOUNT_UPDATE                                           = "Page_Account_Update";
	const PAGE_ADMIN                                                    = "Page_Admin";
	const PAGE_CONTACT                                                  = "Page_Contact";
	const PAGE_HOME                                                     = "Page_Home";
	const PAGE_LOGIN                                                    = "Page_Login";
	const PAGE_NOT_FOUND                                                = "Page_Not_Found";
	const POST_BACK_FORM                                                = "HiddenTextForm";
	const SESS_ADMIN_CORPORATION                                        = "SessionAdminCorporation";
	const SESS_ADMIN_DEPARTMENT                                         = "SessionAdminDepartment";
	const SESS_ADMIN_TEAM                                               = "SessionAdminTeam";
	const SESS_ADMIN_TICKET                                             = "SessionAdminTicket";
	const SESS_ADMIN_TYPE_ASSOC_USER_TEAM                               = "SessionAdminTypeAssocUserTeam";
	const SESS_ADMIN_TYPE_STATUS_TICKET                                 = "SessionAdminTypeStatusTicket";
	const SESS_ADMIN_TYPE_TICKET                                        = "SessionAdminTypeTicket";
	const SESS_ADMIN_TYPE_USER                                          = "SessionAdminTypeUser";
	const SESS_ADMIN_USER                                               = "SessionAdminUser";
	const SESS_LAST_ACTIVITY                                            = "SessionLastActivity";
	const SESS_LANGUAGE                                                 = "SessionLanguage";
	const SESS_LOGIN_TWO_STEP_VERIFICATION                              = "SessionLoginTwoStepVerification";
	const SESS_DEBUG                                                    = "SessionDebug";
	const SESS_DEVICE_LAYOUT                                            = "SessionDeviceLayout";
	const SESS_UNLIMITED                                                = "SessionUnlimited";
	const SESS_USER                                                     = "SessionUser";
	const TYPE_USER_SUPER                                               = "Super Administrator";
	const USER_ACTIVE                                                   = 1;
	const USER_NOT_CONFIRMED                                            = "UserNotConfirmed";
	const USER_NOT_LOGGED_IN                                            = "UserNotLoggedIn";
	
	/* DataBase Errors */
	const MYSQL_ASSOC_USER_CORPORATION_DELETE_FAILED                    = "RetMySqlAssocUserCorporationDeleteFailed";
	const MYSQL_ASSOC_USER_CORPORATION_INSERT_FAILED                    = "RetMySqlAssocUserCorporationInsertFailed";
	const MYSQL_CONNECTION_FAILED                                       = "RetMySqlConnectionFailed";
	const MYSQL_CORPORATION_DELETE_FAILED                               = "RetMySqlCorporationDeleteFailed";
	const MYSQL_CORPORATION_INSERT_FAILED                               = "RetMySqlCorporationInsertFailed";
	const MYSQL_CORPORATION_SELECT_BY_NAME_FAILED                       = "RetMySqlCorporationSelectByNameFailed";
	const MYSQL_CORPORATION_SELECT_BY_NAME_FETCH_FAILED                 = "RetMySqlCorporationSelectByNameFetchFailed";
	const MYSQL_CORPORATION_SELECT_FAILED                               = "RetMySqlCorporationInsertFailed";
	const MYSQL_CORPORATION_SELECT_FETCH_FAILED                         = "RetMySqlCorporationInsertFetchFailed";
	const MYSQL_CORPORATION_UPDATE_FAILED                               = "RetMySqlCorporationUpdateFailed";
	const MYSQL_COUNTRY_SELECT_FAILED                                   = "RetMySqlCountrySelectFailed";
	const MYSQL_COUNTRY_SELECT_FETCH_FAILED                             = "RetMySqlCountrySelectFetchFailed";
	const MYSQL_DEPARTMENT_DELETE_FAILED                                = "RetMySqlDepartmentDeleteFailed";
	const MYSQL_DEPARTMENT_INSERT_FAILED                                = "RetMySqlDepartmentInsertFailed";
	const MYSQL_DEPARTMENT_SELECT_BY_CORP_DEP_FAILED                    = "RetMySqlDepartmentSelectByCorpDepFailed";
	const MYSQL_DEPARTMENT_SELECT_BY_CORP_DEP_FETCH_FAILED              = "RetMySqlDepartmentSelectByCorpDepFetchFailed";
	const MYSQL_DEPARTMENT_SELECT_BY_CORPORATION_NAME_FAILED            = "RetMySqlDepartmentSelectByCorporationFailed";
	const MYSQL_DEPARTMENT_SELECT_BY_CORPORATION_NAME_FETCH_FAILED      = "RetMySqlDepartmentSelectByCorporationFetchFailed";
	const MYSQL_DEPARTMENT_SELECT_BY_DEPARTMENT_NAME_FAILED             = "RetMySqlDepartmentSelectByDepartmentNameFailed";
	const MYSQL_DEPARTMENT_SELECT_BY_DEPARTMENT_NAME_FETCH_FAILED       = "RetMySqlDepartmentSelectByDepartmentNameFetchFailed";
	const MYSQL_DEPARTMENT_SELECT_FAILED                                = "RetMySqlDepartmentSelectFailed";
	const MYSQL_DEPARTMENT_SELECT_FETCH_FAILED                          = "RetMySqlDepartmentSelectFetchFailed";
	const MYSQL_DEPARTMENT_UPDATE_CORPORATION_FAILED                    = "RetMySqlDepartmentUpdateCorporationFailed";
	const MYSQL_DEPARTMENT_UPDATE_FAILED                                = "RetMySqlDepartmentUpdateFailed";
	const MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT                       = "1451";
	const MYSQL_ERROR_UNIQUE_KEY_DUPLICATE                              = "1062";
	const MYSQL_TEAM_DELETE_BY_TEAM_DESCRIPTION_FAILED                  = "RetMySqlTeamDeleteByTeamDescriptionFailed";
	const MYSQL_TEAM_DELETE_BY_TEAM_DESCRIPTION_FAILED_NOT_FOUND        = "RetMySqlTeamDeleteByTeamDescriptionFailedNotFound";
	const MYSQL_TEAM_DELETE_BY_TEAM_ID_FAILED                           = "RetMySqlTeamDeleteByTeamIdFailed";
	const MYSQL_TEAM_DELETE_BY_TEAM_ID_FAILED_NOT_FOUND                 = "RetMySqlTeamDeleteByTeamIdFailedNotFound";
	const MYSQL_TEAM_SELECT_BY_TEAM_DESCRIPTION_FAILED                  = "RetMySqlTeamSelectByDescriptionFailed";
	const MYSQL_TEAM_SELECT_BY_TEAM_DESCRIPTION_FETCH_FAILED            = "RetMySqlTeamSelectByDescriptionFetchFailed";
	const MYSQL_TEAM_SELECT_BY_TEAM_ID_FAILED                           = "RetMySqlTeamSelectByTeamIdFailed";
	const MYSQL_TEAM_SELECT_BY_TEAM_ID_FETCH_FAILED                     = "RetMySqlTeamSelectByTeamIdFetchFailed";
	const MYSQL_TEAM_SELECT_BY_TEAM_NAME_FAILED                         = "RetMySqlTeamSelectByTeamNameFailed";
	const MYSQL_TEAM_SELECT_BY_TEAM_NAME_FETCH_FAILED                   = "RetMySqlTeamSelectByTeamNameFetchFailed";
	const MYSQL_TEAM_SELECT_FAILED                                      = "RetMySqlTeamSelectFailed";
	const MYSQL_TEAM_SELECT_FETCH_FAILED                                = "RetMySqlTeamSelectFetchFailed";
	const MYSQL_TEAM_UPDATE_FAILED                                      = "RetMySqlTeamUpdateFailed";
	const MYSQL_QUERY_PREPARE_FAILED                                    = "RetMySqlQueryPrepareFailed";
	const MYSQL_UPDATE_SAME_VALUE                                       = "RetMySqlUpdateSameValue";
	const MYSQL_TYPE_ASSOC_USER_TEAM_DELETE_FAILED                      = "RetMySqlTypeAssocUserTeamDeleteFailed";
	const MYSQL_TYPE_ASSOC_USER_TEAM_DELETE_FAILED_NOT_FOUND            = "RetMySqlTypeAssocUserTeamDeleteFailedNotFound";
	const MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_BY_DESCRIPTION_FAILED       = "RetMySqlTypeAssocUserTeamSelectByDescriptionFailed";
	const MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_BY_DESCRIPTION_FETCH_FAILED = "RetMySqlTypeAssocUserTeamSelectByDescriptionFetchFailed";
	const MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_BY_ID_FAILED                = "RetMySqlTypeAssocUserTeamSelectByIdFailed";
	const MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_BY_ID_FETCH_FAILED          = "RetMySqlTypeAssocUserTeamSelectByIdFetchFailed";
	const MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_FAILED                      = "RetMySqlTypeAssocUserTeamSelectFailed";
	const MYSQL_TYPE_ASSOC_USER_TEAM_SELECT_FETCH_FAILED                = "RetMySqlTypeAssocUserTeamSelectFetchFailed";
	const MYSQL_TYPE_ASSOC_USER_TEAM_UPDATE_FAILED                      = "RetMySqlTypeAssocUserTeamUpdateFailed";
	const MYSQL_TYPE_TICKET_DELETE_FAILED                               = "RetMySqlTypeTicketDeleteFailed";
	const MYSQL_TYPE_TICKET_DELETE_FAILED_NOT_FOUND                     = "RetMySqlTypeTicketDeleteFailedNotFound";
	const MYSQL_TYPE_TICKET_SELECT_BY_DESCRIPTION_FAILED                = "RetMySqlTypeTicketSelectByDescriptionFailed";
	const MYSQL_TYPE_TICKET_SELECT_BY_DESCRIPTION_FETCH_FAILED          = "RetMySqlTypeTicketSelectByDescriptionFetchFailed";
	const MYSQL_TYPE_TICKET_SELECT_BY_ID_FAILED                         = "RetMySqlTypeTicketSelectByIdFailed";
	const MYSQL_TYPE_TICKET_SELECT_BY_ID_FETCH_FAILED                   = "RetMySqlTypeTicketSelectByIdFetchFailed";
	const MYSQL_TYPE_TICKET_SELECT_FAILED                               = "RetMySqlTypeTicketSelectFailed";
	const MYSQL_TYPE_TICKET_SELECT_FETCH_FAILED                         = "RetMySqlTypeTicketSelectFetchFailed";
	const MYSQL_TYPE_TICKET_UPDATE_FAILED                               = "RetMySqlTypeTicketUpdateFailed";
	const MYSQL_TYPE_USER_DELETE_FAILED                                 = "RetMySqlTypeUserDeleteFailed";
	const MYSQL_TYPE_USER_DELETE_FAILED_NOT_FOUND                       = "RetMySqlTypeUserDeleteFailedNotFound";
	const MYSQL_TYPE_USER_SELECT_BY_DESCRIPTION_FAILED                  = "RetMySqlTypeUserSelectByDescriptionFailed";
	const MYSQL_TYPE_USER_SELECT_BY_DESCRIPTION_FETCH_FAILED            = "RetMySqlTypeUserSelectByDescriptionFetchFailed";
	const MYSQL_TYPE_USER_SELECT_BY_ID_FAILED                           = "RetMySqlTypeUserSelectByIdFailed";
	const MYSQL_TYPE_USER_SELECT_BY_ID_FETCH_FAILED                     = "RetMySqlTypeUserSelectByIdFetchFailed";
	const MYSQL_TYPE_USER_SELECT_FAILED                                 = "RetMySqlTypeUserSelectFailed";
	const MYSQL_TYPE_USER_SELECT_FETCH_FAILED                           = "RetMySqlTypeUserSelectFetchFailed";
	const MYSQL_TYPE_USER_UPDATE_FAILED                                 = "RetMySqlTypeUserUpdateFailed";
	const MYSQL_USER_CHECK_EMAIL_FAILED                                 = "RetMySqlUserCheckEmailFailed";
	const MYSQL_USER_CHECK_HASH_ACTIVE_ACCOUNT_FAILED                   = "RetMySqlUserCheckHasActiveAccountFailed";
	const MYSQL_USER_CHECK_PASSWORD_BY_EMAIL_FAILED                     = "RetMySqlUserCheckPasswordByEmailFailed";
	const MYSQL_USER_CHECK_PASSWORD_BY_USER_UNIQUE_ID_FAILED            = "RetMySqlUserCheckPasswordByUserUniqueIdFailed";
	const MYSQL_USER_INSERT_FAILED                                      = "RetMySqlUserInsertFailed";
	const MYSQL_USER_DELETE_FAILED                                      = "RetMySqlUserDeleteFailed";
	const MYSQL_USER_DELETE_FAILED_NOT_FOUND                            = "RetMySqlUserDeleteFailedNotFound";
	const MYSQL_USER_SELECT_FAILED                                      = "RetMySqlUserSelectFailed";
	const MYSQL_USER_SELECT_FETCH_FAILED                                = "RetMySqlUserSelectFetchFailed";
	const MYSQL_USER_SELECT_BY_EMAIL_FAILED                             = "RetMySqlUserSelectByEmailFailed";
	const MYSQL_USER_SELECT_BY_EMAIL_FETCH_FAILED                       = "RetMySqlUserSelectByEmailFetchFailed";
	const MYSQL_USER_SELECT_BY_USER_UNIQUE_ID_FAILED                    = "RetMySqlUserSelectByUserUniqueIdFailed";
	const MYSQL_USER_SELECT_BY_USER_UNIQUE_ID_FETCH_FAILED              = "RetMySqlUserSelectByUserUNiqueIdFetchFailed";
	const MYSQL_USER_SELECT_HASH_BY_EMAIL_FAILED                  		= "RetMySqlUserSelectHashByEmailFailed";
	const MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_EMPTY                    = "RetMySqlUserSelectTeamByUserEmailEmpty";
	const MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_FAILED                   = "RetMySqlUserSelectTeamByUserEmailFailed";
	const MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_FETCH_FAILED             = "RetMySqlUserSelectTeamByUserEmailFetchFailed";
	const MYSQL_USER_UPDATE_ASSOC_USER_CORPORATION_BY_EMAIL_FAILED      = "RetMySqlUpdateAssocUserCorporationByEmailFailed";
	const MYSQL_USER_UPDATE_BY_EMAIL_FAILED                             = "RetMySqlUserUpdateByEmailFailed";
	const MYSQL_USER_UPDATE_CORPORATION_BY_EMAIL_FAILED                 = "RetMySqlUserUpdateCorporationByEmail";
	const MYSQL_USER_UPDATE_DEPARTMENT_BY_CORPORATION_EMAIL_FAILED      = "RetMySqlUserUpdateDepartmentByCorporationEmailFailed";
	const MYSQL_USER_UPDATE_PASSWORD_BY_EMAIL_FAILED                    = "RetMySqlUserUpdatePasswordByEmailFailed";
	const MYSQL_USER_UPDATE_TWO_STEP_VERIFICATION_BY_EMAIL_FAILED       = "RetMySqlUserUpdateTwoStepVerificationByEmailFailed";
	const MYSQL_USER_UPDATE_USER_TYPE_BY_EMAIL_FAILED                   = "RetMySqlUserUpdateUserTypeByEmailFailed";
	const MYSQL_USER_UPDATE_UNIQUE_ID_BY_EMAIL_FAILED                   = "RetMySqlUserUpdateUniqueIdByEmailFailed";
 	const MYSQL_REQUIRED_OBJECTS_NOT_FILLED                             = "RetMySqlRequiredObjectsNotFilled";
	const TYPE_USER_DEFAULT_ID                                          = "3";
	
	/* Database Tables and Fields */
	const TABLE_ASSOC_TICKET_USER_REQUESTING                            = "ASSOC_TICKET_USER_REQUESTING";
	const TABLE_ASSOC_TICKET_USER_FIELD_REQUESTING_USER_BOND            = "RequestingUserBond";
	const TABLE_ASSOC_TICKET_USER_FIELD_REQUESTING_USER_EMAIL           = "ResponsibleUserEmail"; 
	const TABLE_ASSOC_TICKET_USER_FIELD_REQUESTING_TICKET_ID            = "RequestingTicketId";
	const TABLE_ASSOC_TICKET_USER_RESPONSIBLE                           = "ASSOC_TICKET_USER_RESPONSIBLE";
	const TABLE_ASSOC_TICKET_USER_FIELD_RESPONSIBLE_USER_EMAIL          = "ResponsibleUserEmail";
	const TABLE_ASSOC_TICKET_USER_FIELD_RESPONSIBLE_TICKET_ID           = "ResponsibleTicketId";
	const TABLE_ASSOC_USER_CORPORATION                                  = "ASSOC_USER_CORPORATION";
	const TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME           = "AssocUserCorporationCorporationName";
	const TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME            = "AssocUserCorporationDepartmentName";
	const TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE          = "AssocUserCorporationRegistrationDate";
	const TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID            = "AssocUserCorporationRegistrationId";
	const TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL                 = "AssocUserCorporationUserEmail";
	const TABLE_ASSOC_USER_TEAM                                         = "ASSOC_USER_TEAM";
	const TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID                           = "AssocUserTeamTeamId";
	const TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL                        = "AssocUserTeamUserEmail";
	const TABLE_ASSOC_USER_TEAM_FIELD_USER_TYPE                         = "AssocUserTeamUserType";
	const TABLE_SYSTEM_CONFIGURATION                                    = "SYSTEM_CONFIGURATION";
	const TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_ACTIVE                = "SystemConfigurationOptionActive";
	const TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_DESCRIPTION           = "SystemConfigurationOptionDescription";
	const TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME                  = "SystemConfigurationOptionName";
	const TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER                = "SystemConfigurationOptionNumber";
	const TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_VALUE                 = "SystemConfigurationOptionValue";
	const TABLE_CORPORATION                                             = "CORPORATION";
	const TABLE_CORPORATION_FIELD_ACTIVE                                = "CorporationActive";
	const TABLE_CORPORATION_FIELD_NAME                                  = "CorporationName";
	const TABLE_COUNTRY                                                 = "COUNTRY";
	const TABLE_COUNTRY_FIELD_NAME                                      = "CountryName";
	const TABLE_COUNTRY_FIELD_ABBREVIATION                              = "CountryAbbreviation";
	const TABLE_COUNTRY_FIELD_REGION_CODE                               = "CountryRegionCode";
	const TABLE_FIELD_REGISTER_DATE                                     = "RegisterDate";
	const TABLE_DEPARTMENT                                              = "DEPARTMENT";
	const TABLE_DEPARTMENT_FIELD_CORPORATION                            = "DepartmentCorporation";
	const TABLE_DEPARTMENT_FIELD_INITIALS                               = "DepartmentInitials";
	const TABLE_DEPARTMENT_FIELD_NAME                                   = "DepartmentName";
	const TABLE_HISTORY_TICKET                                          = "HISTORY_TICKET";
	const TABLE_HISTORY_TICKET_FIELD_DESCRIPTION                        = "HistoryTicketDescription";
	const TABLE_HISTORY_TICKET_FIELD_ID                                 = "HistoryTicketId";
	const TABLE_HISTORY_TICKET_FIELD_STATUS                             = "HistoryTicketStatus";
	const TABLE_HISTORY_TICKET_FIELD_USER_EMAIL                         = "UserEmail";
	const TABLE_HISTORY_TICKET_FIELD_SUGGESTION                         = "Suggestion";
	const TABLE_HISTORY_TICKET_FIELD_TICKET_ID                          = "TicketId";
	const TABLE_NOTIFICATION                                            = "NOTIFICATION";
	const TABLE_NOTIFICATION_FIELD_ACTIVE                               = "NotificationActive";
	const TABLE_NOTIFICATION_FIELD_ID                                   = "NotificationId";
	const TABLE_NOTIFICATION_FIELD_TEXT                                 = "NotificationText";
	const TABLE_NOTIFICATION_FIELD_USER_EMAIL                           = "NotificationUserEmail";
	const TABLE_TEAM                                                    = "TEAM";
	const TABLE_TEAM_FIELD_TEAM_DESCRIPTION                             = "TeamDescription";
	const TABLE_TEAM_FIELD_TEAM_ID                                      = "TeamId";
	const TABLE_TEAM_FIELD_TEAM_NAME                                    = "TeamName";
	const TABLE_TICKET                                                  = "TICKET";
	const TABLE_TICKET_FIELD_DESCRIPTION                                = "TicketDescription";
	const TABLE_TICKET_FIELD_ID                                         = "TicketId";
	const TABLE_TICKET_FIELD_NUMBER                                     = "TicketNumber";
	const TABLE_TICKET_FIELD_STATUS                                     = "TicketStatus";
	const TABLE_TICKET_FIELD_SUGGESTION                                 = "TicketSuggestion";
	const TABLE_TICKET_FIELD_TITLE                                      = "TicketTitle";
	const TABLE_TICKET_FIELD_TYPE                                       = "TicketType";
	const TABLE_TYPE_ASSOC_USER_REQUESTING                              = "TYPE_ASSOC_USER_REQUESTING";
	const TABLE_TYPE_ASSOC_USER_REQUESTING_FIELD_TYPE_BOND              = "TypeAssocUserRequestingTypeBond";
	const TABLE_TYPE_ASSOC_USER_TEAM                                    = "TYPE_ASSOC_USER_TEAM";
	const TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION                  = "TypeAssocUserTeamDescription";
	const TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID                           = "TypeAssocUserTeamId";
	const TABLE_TYPE_STATUS_TICKET                                      = "TYPE_STATUS_TICKET";
	const TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION                    = "TypeStatusTicketDescription";
	const TABLE_TYPE_STATUS_TICKET_FIELD_ID                             = "TypeStatusTicketId";
	const TABLE_TYPE_TICKET                                             = "TYPE_TICKET";
	const TABLE_TYPE_TICKET_FIELD_DESCRIPTION                           = "TypeTicketDescription";
	const TABLE_TYPE_TICKET_FIELD_ID                                    = "TypeTicketId";
	const TABLE_TYPE_USER                                               = "TYPE_USER";
	const TABLE_TYPE_USER_FIELD_DESCRIPTION                             = "TypeUserDescription";
	const TABLE_TYPE_USER_FIELD_ID                                      = "TypeUserId";
	const TABLE_USER                                                    = "USER";
	const TABLE_USER_FIELD_BIRTH_DATE                                   = "BirthDate";
	const TABLE_USER_FIELD_CORPORATION                                  = "Corporation";
	const TABLE_USER_FIELD_COUNTRY                                      = "Country";
	const TABLE_USER_FIELD_EMAIL                                        = "Email";
	const TABLE_USER_FIELD_GENDER                                       = "Gender";
	const TABLE_USER_FIELD_HASH_CODE                                    = "HashCode";
	const TABLE_USER_FIELD_NAME                                         = "Name";
	const TABLE_USER_FIELD_PASSWORD                                     = "Password";
	const TABLE_USER_FIELD_REGION                                       = "Region";
	const TABLE_USER_FIELD_SESSION_EXPIRES                              = "SessionExpires";
	const TABLE_USER_FIELD_TWO_STEP_VERIFICATION                        = "TwoStepVerification";
	const TABLE_USER_FIELD_USER_ACTIVE                                  = "UserActive";
	const TABLE_USER_FIELD_USER_CONFIRMED                               = "UserConfirmed";
	const TABLE_USER_FIELD_USER_PHONE_PRIMARY                           = "UserPhonePrimary";
	const TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX                    = "UserPhonePrimaryPrefix";
	const TABLE_USER_FIELD_USER_PHONE_SECONDARY                         = "UserPhoneSecondary";
	const TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX                  = "UserPhoneSecondaryPrefix";
	const TABLE_USER_FIELD_TYPE                                         = "UserType";
	const TABLE_USER_FIELD_USER_UNIQUE_ID                               = "UserUniqueID";
	
	
	/* Constantes de caminhos de diretorios e arquivos */
	const PATH_BODY_PAGE                                                = "Html/BodyPage/Body";
	const PATH_FOOTER                                                   = "Html/Footer/Footer.php";
	const PATH_FORM                                                     = "Html/Form/Form";
	const PATH_HEAD                                                     = "Html/Head/";
	const PATH_HEADER                                                   = "Html/Header/Header";
	
	/* Instances */
	protected static $Instance;
	protected        $Factory = NULL;
	public           $Session = NULL;
	
	/* Propriedades de Classe */
	public $DefaultApplicationAddress        = NULL;
	public $DefaultApplicationName           = "Base";
	public $DefaultGoogleMapsApiKey          = NULL;
	public $DefaultEmailNoReplyFormAddress   = NULL;
	public $DefaultEmailNoReplyFormPassword  = NULL;
	public $DefaultEmailSupportFormAddress   = NULL;
	public $DefaultLanguage                  = NULL;
	public $DefaultLogPath                   = NULL;
	public $DefaultMySqlAddress              = NULL;
	public $DefaultMySqlPort                 = NULL;
	public $DefaultMySqlDataBase             = NULL;
	public $DefaultMySqlUser                 = NULL;
	public $DefaultMySqlPassword             = NULL;
	public $DefaultServerFile                = NULL;
	public $DefaultServerImage               = NULL;
	public $DefaultServerJavaScript          = NULL;
	public $EnableLogMySqlQuery              = FALSE;
	public $EnableLogMySqlError              = FALSE;
	public $SessionTime                      = 3600;
	
	/* Linguas Habilitadas / Desabilitadas */
	public $LanguageEnglishEnabled       = TRUE;
	public $LanguageGermanEnabled        = FALSE;
	public $LanguagePortugueseEnabled    = TRUE;
	public $LanguageSpanishEnabled       = FALSE;
	
	/**                               **/
	/************* METODOS *************/
	/**                               **/
	
	/* Clone */
	protected function __clone()
    {
        exit(get_class($this) . ": Error! Clone Not Allowed!");
    }
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
    }
	
	/* Singleton */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	public function SetApplication()
	{
		if(class_exists("ProjectConfig"))
		{
			ini_set("display_errors", ProjectConfig::$DisplayErrors);
			error_reporting(E_ALL);
			date_default_timezone_set(ProjectConfig::$TimeZone);
			setlocale(LC_ALL, 'UTF8');
			$this->Session = $this->Factory->CreateSession();
			$this->DefaultApplicationAddress             = ProjectConfig::$AddressApplication;
			$this->DefaultApplicationName                = ProjectConfig::$ApplicationName;
			$this->DefaultMySqlAddress                   = ProjectConfig::$MySqlDataBaseAddress;
			$this->DefaultMySqlPort                      = ProjectConfig::$MySqlDataBasePort;
			$this->DefaultMySqlDataBase                  = ProjectConfig::$MySqlDataBaseName;
			$this->DefaultMySqlUser                      = ProjectConfig::$MySqlDataBaseUser;
			$this->DefaultMySqlPassword                  = ProjectConfig::$MySqlDataBasePassword;
			$this->DefaultServerFile                     = ProjectConfig::$AddressFileServer;
			$this->DefaultServerImage                    = ProjectConfig::$AddressImageServer;
			$this->DefaultServerJavaScript               = ProjectConfig::$AddressJavaScriptServer;
			$this->DefaultEmailNoReplyFormAddress        = ProjectConfig::$EmailNoReplyAccount;
			$this->DefaultEmailNoReplyFormAddressReplyTo = ProjectConfig::$EmailNoReplyAccountReplyTo;
			$this->DefaultEmailNoReplyFormPassword       = ProjectConfig::$EmailNoReplyPassword;
			$this->DefaultEmailSupportFormAddress        = ProjectConfig::$EmailSupportAccount;
			$this->DefaultGoogleMapsApiKey               = ProjectConfig::$GoogleMapsApiKey;
			$this->DefaultLanguage                       = ProjectConfig::$DefaultLanguage;
			$this->DefaultLogPath                        = ProjectConfig::$LogApplication;
			$this->Session->CreateBasic($this->DefaultApplicationName, $this->SessionTime);
			return $this->Session->CheckActivity(self::SESS_LAST_ACTIVITY, self::SESS_USER, 
												 $this->SessionTime, self::SESS_UNLIMITED);
			
		}
		else exit ("Config: Project Config Class Not found");
	}
}
?>